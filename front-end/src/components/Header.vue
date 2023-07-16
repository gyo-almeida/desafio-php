<template>
  <header>
    <h1>EletroPHP</h1>
    <button @click="toggle()">Adicionar produto</button>

    <Modal :showMenuMobile="showMenuMobile"/>
  </header>
</template>

<script lang="ts">
import Modal from "./Modal.vue";

export default {
  name: "HomeHeader",
  components: {
    Modal,
  },
  data() {
    return {
      showMenuMobile: false,
    };
  },
  methods: {
    toggle() {
      this.showMenuMobile = !this.showMenuMobile;
    },
  },
};
</script>

<style scoped>
header {
  display: flex;
  justify-content: space-between;
  width: 100%;
  gap: 25px;
  padding: 20px;
  box-shadow: rgba(17, 17, 26, 0.1) 0px 0px 16px;
}

h1 {
  color: var(--color-brand-1);
}

button {
  background-color: var(--color-brand-2);
  color: var(--white);
  border: solid 2px var(--color-brand-2);
  border-radius: var(--radius-2);
  padding: 5px;
  font-size: var(--font-sd);
}
</style>
