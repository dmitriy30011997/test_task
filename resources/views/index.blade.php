@extends('layouts.app')

@section('content')
    <div id="app">
        <h1>Главная страница</h1>
        <p>Список пицц:</p>
        <ul>
            <li v-for="pizza in pizzas" :key="pizza.id">
                {{ pizza.name }} - {{ pizza.price }}
            </li>
        </ul>
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
@endsection
