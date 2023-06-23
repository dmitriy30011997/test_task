<template>
    <div>
      <h1>My Pizza Delivery App</h1>
      <PizzaList />
    </div>
  </template>
  
  <script>
  import PizzaList from '@/components/PizzaList.vue';
  
  export default {
    name: 'App',
    components: {
      PizzaList,
    },
  };
  </script>
  
  <style>
  /* Стили для App.vue */
  </style>
  