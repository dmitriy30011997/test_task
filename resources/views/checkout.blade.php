@extends('layouts.app')

@section('content')
    <div id="app">
        <h1>Оформление заказа</h1>
        <p>Список пицц в корзине:</p>
        <ul>
            <li v-for="item in cartItems" :key="item.id">
                {{ item.name }} - {{ item.quantity }}
            </li>
        </ul>
        <button @click="placeOrder">Оформить заказ</button>
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
    <script>
        new Vue({
            el: '#app',
            data: {
                cartItems: []
            },
            mounted() {
                // Получение списка пицц в корзине с сервера
                axios.get('/api/cart')
                    .then(response => {
                        this.cartItems = response.data;
                    })
                    .catch(error => {
                        console.log(error);
                    });
            },
            methods: {
                placeOrder() {
                    // Оформление заказа
                    axios.post('/api/checkout/place-order')
                        .then(response => {
                            // Обработка успешного оформления заказа
                            console.log(response.data);
                        })
                        .catch(error => {
                            console.log(error);
                        });
                }
            }
        });
    </script>
@endsection
