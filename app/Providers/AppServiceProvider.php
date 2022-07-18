<?php

namespace App\Providers;

use App\Category;
use App\Option;
use DateTime;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(
            ['layouts.main'],
            function ($view) {
                $cats = Category::all();
                $view->with('cats', $cats);
            }
        );

        View::composer(
            ['includes.home-category-menu'],
            function ($view) {

                $pizzaPrice = number_format(Option::first()->btc_usd_rate * 10000, 0, ".", " ");
                $daysToPizzaDay = $this->getDaysLeft();

                $view->with(
                    [
                        "pizzaPrice" => $pizzaPrice,
                        "daysToPizzaDay" => $daysToPizzaDay
                    ]
                );

            }
        );
    }

    /**
     * Возвращает кол-во дней до ближайшего Pizza Day (22 мая)
     */
    private function getDaysLeft() : int
    {
        $today = new DateTime();

        //Have we already passed this year's Pizza Day?
        if(date("m") > 5 || (date("m") == 5 && date("d") > 22)){
            //Use next year's Pizza Day date.
            $closestPizzaDay = (date("Y") + 1) . "-05-22";
        } else {
            //Use this year's Pizza Day date.
            $closestPizzaDay = date("Y") . "-05-22";
        }

        $closestPizzaDay = new DateTime($closestPizzaDay);

        $interval = $today->diff($closestPizzaDay);

        return $interval->days;
    }
}
