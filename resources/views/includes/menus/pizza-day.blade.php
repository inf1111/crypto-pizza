<div class="pizzaBox module module--sidebar">
    <div class="pizzaBox__header">
        <div class="pizzaBox__title">Пицца Laszlo</div>
        <a href="https://www.coindesk.com/learn/what-is-bitcoin-pizza-day/" target="_blank">
            <div class="pizzaBox__info">
                <svg class="icon icon-info ">
                    <use xlink:href="/images/sprite.svg#info"></use>
                </svg>
            </div>
        </a>
    </div>
    <div class="pizzaBox__btc">10 000 BTC</div>
    <div class="pizzaBox__text">Стоимость пиццы Ласло на сегодняшний день составляет:</div>
    <div class="pizzaBox__price">$ {{ $pizzaPrice }}</div>
    <div class="pizzaBox__counter">До Bitcoin Pizza Day еще {{ trans_choice("main.days_to_pizza", $daysToPizzaDay) }}</div>
</div>
