<template>
  <section>
    <ul>
      <li v-for="(product, index) in products" :key="index">
        <h3>{{ product.name }}</h3>
        <p class="desc">{{ product.description }}</p>
        <div>
          <span class="brand">{{ product.brand }}</span>
          <span class="voltage">{{ product.voltage }}</span>
        </div>
      </li>
    </ul>
  </section>
</template>
;

<script lang="ts">
import api from "@/request/api";

interface Product {
  name: string;
  description: string;
  voltage: string;
  brand: string;
}

export default {
  name: "ProductsPage",
  data() {
    return {
      products: [] as Product[],
    };
  },
  mounted() {
    api.get("").then((response) => (this.products = response.data));
  },
};
</script>

<style scoped>
section {
  margin-top: 20px;
  box-shadow: rgba(17, 17, 26, 0.05) 0px 4px 16px,
    rgba(17, 17, 26, 0.05) 0px 8px 32px;
  padding: 15px;
  display: flex;
  align-items: center;
  justify-content: space-evenly;
  width: 75%;
}

ul {
  width: 100%;
  display: flex;
  flex-wrap: wrap;
  gap: 30px;
  justify-content: center;
}

li {
  display: flex;
  flex-direction: column;
  width: clamp(80%, 30%, 50%);
  gap: 10px;
}

h3 {
  min-height: 6rem;
}
.desc {
  min-height: 8.5rem;
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
