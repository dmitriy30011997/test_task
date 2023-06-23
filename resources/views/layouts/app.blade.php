<!DOCTYPE html>
<html>
<head>
    <title>Сайт доставки пиццы</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/">Логотип</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/cart">Корзина</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/checkout">Оформление заказа</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
    <script>
        new Vue({
            el: '#app',
            data: {
                pizzas: []
            },
            mounted() {
                // Получение списка пицц с сервера
                axios.get('/api/pizzas')
                    .then(response => {
                        this.pizzas = response.data;
                    })
                    .catch(error => {
                        console.log(error);
                    });
            }
        });
    </script>
</body>
</html>
