@extends('layouts.app')

@section('content')
    <div id="app">
        <h1>Корзина</h1>
        <p>Список пицц в корзине:</p>
        <ul>
            <li v-for="item in cartItems" :key="item.id">
                {{ item.name }} - {{ item.quantity }}
                <button @click="removeFromCart(item.id)">Удалить</button>
            </li>
        </ul>
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
                removeFromCart(itemId) {
                    // Удаление пиццы из корзины
                    axios.post('/api/cart/remove', { item_id: itemId })
                        .then(response => {
                            // Обновление списка пицц в корзине после удаления
                            this.cartItems = response.data;
                        })
                        .catch(error => {
                            console.log(error);
                        });
                }
            }
        });
    </script>
@endsection
