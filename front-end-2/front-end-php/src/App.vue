<template>
  <div id="app">
    <HomeHeader />

    <main>
      <ProductsPage />
    </main>
  </div>
</template>

<script lang="ts">
import "./styles/global.css";
import HomeHeader from "./components/Header.vue";
import ProductsPage from "./components/Products.vue";

export default {
  name: "App",
  components: {
    HomeHeader,
    ProductsPage,
  },
};
</script>

<style scoped>
  main {
    display: flex;
    justify-content: center;
    align-items: center;
  }
</style>
