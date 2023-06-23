<template>
    <div>
      <h1>Главная страница</h1>
      <p>Список пицц:</p>
      <ul>
        <li v-for="pizza in pizzas" :key="pizza.id">
          {{ pizza.name }} - {{ pizza.price }}
        </li>
      </ul>
    </div>
  </template>
  
  <script>
  import { reactive, onMounted } from 'vue';
  import axios from 'axios';
  
  export default {
    setup() {
      const pizzas = reactive([]);
  
      onMounted(() => {
        axios.get('/api/pizzas')
          .then(response => {
            pizzas = response.data;
          })
          .catch(error => {
            console.log(error);
          });
      });
  
      return { pizzas };
    }
  }
  </script>
  