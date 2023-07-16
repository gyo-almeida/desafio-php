<template>
    <section>
      <ul>
        <li v-for="(product, index) in products" :key="index">
          <h3>{{ product.name }}</h3>
          <p class="desc">{{ product.description }}</p>
          <img src="../assets/menubr.png" alt="" @click="toggleUpdate()">
          <a :href="product.url" target="_blank">Conheça o produto</a>
          <div>
            <span class="brand">{{ product.brand }}</span>
            <span class="voltage">{{ product.voltage }}</span>
          </div>
          <UpdateProductModal :showUpdateModal="showUpdateModal" :idProduct="product.id"/>
        </li>
      </ul>
    </section>
  </template>
  ;
  
<script lang="ts">
  import api from "@/request/api";
  import UpdateProductModal from "./UpdateModal.vue"
  
  interface Product {
    id: number
    name: string;
    description: string;
    voltage: string;
    brand: string;
    url: string;
  }
  
  export default {
    name: "ProductsPage",
    components: {
      UpdateProductModal
    },
    methods: {
      toggleUpdate() {
        this.showUpdateModal = !this.showUpdateModal;
      },
    },
    data() {
      return {
        products: [] as Product[],
        showUpdateModal: false
      };
    },
    mounted() {
      api.get("").then((response) => (this.products = response.data));
    },
    updated() {
      api.get("").then((response) => (this.products = response.data));
    }
  };

</script>
  
  <style scoped>
  section {
    margin: 20px 0;
    box-shadow: rgba(17, 17, 26, 0.05) 0px 4px 16px,
      rgba(17, 17, 26, 0.05) 0px 8px 32px;
    padding: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 75%;
  }
  
  ul {
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    gap: 30px;
    margin-left: 5px;
  }
  
  li {
    display: flex;
    flex-direction: column;
    width: clamp(80%, 30%, 50%);
    gap: 10px;
    position: static;
  }

  img {
    position: relative;

    bottom: 73%;
    left: 97%;
    width: 25px;
  }
  
  h3 {
    min-height: 6rem;
  }
  .desc {
    min-height: 8.5rem;
  }

  a {
    color: var(--grey);
    font-size: var(--font-sm);
    font-weight: bolder;
  }
  
  div {
    margin-top: 5px;
    display: flex;
    justify-content: space-between;
  }
  
  .brand {
    background-color: var(--color-brand-2);
    min-width: 5rem;
    color: var(--white);
    padding: 8px;
    border-radius: var(--radius-2);
    text-align: center;
  }
  
  .voltage {
    background-color: var(--color-brand-1);
    color: var(--white);
    padding: 8px;
    border-radius: var(--radius-2);
    text-align: center;
  }
  
  @media (min-width: 600px) {
    li {
      width: 60%;
    }
  }
  
  @media (min-width: 750px) {
    li {
      width: 45%;
    }
  }
  
  @media (min-width: 1125px) {
    li {
      width: 30%;
    }
  }
  </style>
  