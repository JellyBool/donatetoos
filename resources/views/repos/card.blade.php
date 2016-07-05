@extends('app')
@section('content')
    <div class="repo-card">
        <div class="route" id="buy"></div>
        <section class="giftcard">
            <section class="giftcard-cover">
                <i class="fa fa-apple"></i>
            </section>
            <div class="giftcard-content">
                <h2>Your order will be shipped to:</h2>
                <address>
                    <h3>David Khourshid</h3>
                    <a href="http://www.github.com/davidkpiano" target="_blank">www.github.com/davidkpiano</a>
                    <a href="http://www.twitter.com/davidkpiano" target="_blank">www.twitter.com/davidkpiano</a>
                </address>
                <div class="subtext">Available to ship: 1 business day</div>
            </div>
            <footer class="giftcard-footer">
                <div class="giftcard-text">
                    <h1>Gift Card</h1>
                    <h2>$25.00</h2>
                </div>
                <div class="ribbon">
                    <div class="giftwrap">
                        <a href="#buy" class="button">Buy</a>
                    </div>
                    <div class="bow">
                        <i class="fa fa-bookmark"></i>
                        <i class="fa fa-bookmark"></i>
                    </div>
                </div>
                <div class="giftcard-info">
                    <div>
                        <input type="text" name="" id="" placeholder="Enter a gift message" />
                    </div>
                    <div>
                        <a href="#" class="button secondary">Checkout</a>
                    </div>
                </div>
            </footer>
        </section>


    </div>
    <link rel="stylesheet" href="/css/card.css">
@stop