<template>
    <div class="container__update">
      <div class="content">
        <div class="header">
          <h2>Atualize o produto</h2>
          <span @click="toggleUpdate(false)">X</span>   
        </div>
        
        <form @submit.prevent="submit">
          <div>
            <label for="name">Nome</label>
            <input type="text" id="name" v-model="form.name" />
          </div>
  
          <div>
            <label for="desc">Descrição</label>
            <input type="text" id="desc" v-model="form.description" />
            <p>Apenas 255 caracteres permitidos</p>
          </div>
  
          <div>
            <label for="voltage">Voltagem</label>
            <input type="text" id="voltage" v-model="form.voltage" />
          </div>
  
          <div>
            <label for="brand">Marca</label>
            <select type="text" id="brand" v-model="form.brand">
              <option value="Electrolux">Electrolux</option>
              <option value="LG">LG</option>
              <option value="Fischer">Fischer</option>
              <option value="Samsung">Samsung</option>
              <option value="Brastemp">Brastemp</option>
            </select>
          </div>
  
          <button type="submit">Atualizar</button>
        </form>
        <button type="button" @click="deleteProduct">Deletar Produto</button>
      </div>
    </div>
  </template>
  
  <script lang="ts">
  import { toast } from "vue3-toastify";
  import "vue3-toastify/dist/index.css";
  import api from "@/request/api";
  
  export default {
    name: "UpdateProductModal",
    data() {
      return {
        form: {
          name: null,
          description: null,
          brand: null,
          voltage: null,
        },
      };
    },
    props: {
      showUpdateModal: { type: Boolean },
      idProduct: { type: Number}
    },
    methods: {
      submit() {
          api
          .patch(`${this.idProduct}`, this.$data.form)
          .then(() => {
            toast.success("Produto atualizdo com sucesso", {
              autoClose: 2000,
            });
          })
          .then(() => toggleUpdate(false))
          .catch((error) => {
            console.log(error);
            toast.error("Falha ao atualizar produto", {
              autoClose: 2000,
            });
            toggleUpdate(false)
          });
      },
      deleteProduct() {
        api
          .delete(`${this.idProduct}`)
          .then(() => {
            toast.success("Produto deletado", {
              autoClose: 2000,
            });
          })
          .then(() => toggleUpdate(false))
          .catch((error) => {
            console.log(error);
            toast.error("Falha ao deletar produto", {
              autoClose: 2000,
            });
            toggleUpdate(false)
          });
      },
      toggleUpdate
    },
    watch: {
      showUpdateModal: (val) => toggleUpdate(val),
    },
  };
  
  function toggleUpdate(showUpdateModal: boolean) {
    const container__update: HTMLElement = document.querySelector(".container__update")!;
  
    if (showUpdateModal) {
      container__update!.style.display = "flex";
    } else {
      container__update.style.display = "none";
    }
}
  
</script>
  
<style scoped>
  .container__update {
    width: 98vw;
    height: 150%;
    position: absolute;
    left: 0px;
    top: 0px;
    z-index: 1;
    background-color: rgba(0, 0, 0, 0.244);
    display: none;
    justify-content: center;
    align-items: center;
  }
  
  .content {
    display: flex;
    flex-direction: column;
    gap: 8px;
    background-color: var(--white);
    border-radius: var(--radius-2);
    width: 400px;
    padding: 15px;
  }

  h2 {
    text-align: center;
  }

  span {
    position: relative;
    left: 90%;
    bottom: 55%;
    cursor: pointer;
  }

  form {
    display: flex;
    flex-direction: column;
    gap: 14px;
    width: 100%;
  }
  
  div {
    display: flex;
    flex-direction: column;
    gap: 5px;
  }
  
  input, select {
    width: 96%;
    border: solid 1px var(--color-brand-1);
    border-radius: var(--radius-1);
    height: 30px;
    padding-left: 5px;
    font-size: var(--font-sm);
  }

  p {
    font-size: var(--font-sm);
    color: var(--alert);
  }
  
  #desc {
    height: 60px;
  }
  
  form > button {
    width: 96%;
    border: solid 1px var(--color-brand-2);
    color: var(--white);
    background-color: var(--color-brand-2);
    border-radius: var(--radius-1);
    height: 30px;
    font-size: var(--font-md);
  }

  button {
    width: 96%;
    border: solid 1px var(--alert);
    color: var(--alert);
    background-color: var(--white);
    border-radius: var(--radius-1);
    height: 30px;
    font-size: var(--font-md);
  }
</style>
  