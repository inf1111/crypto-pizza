<?php

namespace App\Console;

use App\Option;
use App\View;
use GuzzleHttp\Client;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Carbon;
use Throwable;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // Удаление данных о просмотрах страниц старше 7 дней
        $schedule->call(function () {
            View::where('date', '<', Carbon::now()->subDays(7))->delete();
        })->cron('0 10 * * *'); // daily at 10.00

        // Обновление курса биткоина к доллару для блока pizza day
        $schedule->call(function () {

            $client = new Client();

            try {

                $response = $client->request('GET', 'https://min-api.cryptocompare.com/data/price?fsym=BTC&tsyms=USD');

                $usdRate = json_decode($response->getBody()->getContents())->USD;

                Option::first()->update(["btc_usd_rate" => $usdRate]);

            } catch (Throwable $e) {

            }

        })->cron('0 11 * * *');



    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
