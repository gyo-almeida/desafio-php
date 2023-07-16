<template>
    <div class="container">
      <div class="content">
        <div class="header">
          <h2>Adicione um novo produto</h2>
          <span @click="toggle(false)">X</span>   
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
  
          <button type="submit">Criar</button>
        </form>
      </div>
    </div>
  </template>
  
  <script lang="ts">
  import { toast } from "vue3-toastify";
  import "vue3-toastify/dist/index.css";
  import api from "@/request/api";
  
  export default {
    name: "CreateProductModal",
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
    methods: {
      submit() {
        api
          .post("", this.$data.form)
          .then(() => {
            toast.success("Produto criado com sucesso", {
              autoClose: 2000,
            });
          })
          .then(() => toggle(false))
          .catch((error) => {
            console.log(error);
            toast.error("Falha ao criar produto", {
              autoClose: 2000,
            });
            toggle(false)
          });
      },
      toggle
    },
    props: {
      showMenuMobile: { type: Boolean },
    },
    watch: {
      showMenuMobile: (val) => toggle(val),
    },
  };
  
  function toggle(showMenuMobile: boolean) {
    const container: HTMLElement = document.querySelector(".container")!;
  
    if (showMenuMobile) {
      container!.style.display = "flex";
    
      container.addEventListener("click", modalClickHandler);
    } else {
      container.style.display = "none";

      container.removeEventListener("click", modalClickHandler);
    }
}

function modalClickHandler(event: MouseEvent) {
  const container: HTMLElement = document.querySelector(".container")!;
  const target: HTMLElement = event.target as HTMLElement;

  if (!container.contains(target)) {
    toggle(false);
  }
}
  
</script>
  
  <style scoped>
  .container {
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
    justify-content: center;
  }

  h2 {
    text-align: center;
  }

  span {
    position: relative;
    left: 95%;
    bottom: 55%;
    cursor: pointer;
  }
  
  form {
    display: flex;
    flex-direction: column;
    gap: 14px;
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
  
  button {
    width: 96%;
    border: solid 1px var(--color-brand-2);
    color: var(--white);
    background-color: var(--color-brand-2);
    border-radius: var(--radius-1);
    height: 40px;
    font-size: var(--font-md);
  }
  </style>
  