<template>
  <div class="container">
    <div class="content">
      <h2>Crie um novo produto</h2>
      <form @submit.prevent="submit">
        <div>
          <label for="name">Nome</label>
          <input type="text" id="name" v-model="form.name" />
        </div>

        <div>
          <label for="desc">Descrição</label>
          <input type="text" id="desc" v-model="form.desc" />
        </div>

        <div>
          <label for="voltage">Voltagem</label>
          <input type="text" id="voltage" v-model="form.voltage" />
        </div>

        <div>
          <label for="brand">Marca</label>
          <input type="text" id="brand" v-model="form.brand" />
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
  name: "Modal",
  data() {
    return {
      form: {
        name: null,
        desc: null,
        brand: null,
        voltage: null,
      },
    };
  },
  methods: {
    submit() {
      api
        .post("", this.$data)
        .then(() => {
          toast.success("Produto criado com sucesso", {
            autoClose: 2000,
          });
        })
        .catch((error) => {
          console.log(error);
          toast.error("Falha ao criar produto", {
            autoClose: 2000,
          });
        });
    },
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
  }

  if (!showMenuMobile) {
    container!.style.display = "none";
  }
}
</script>

<style scoped>
.container {
  width: 100vw;
  height: 100vh;
  position: absolute;
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

input {
  width: 80%;
  border: solid 1px var(--color-brand-1);
  border-radius: var(--radius-1);
  height: 30px;
}

#desc {
  height: 60px;
}

button {
  width: 80%;
  border: solid 1px var(--color-brand-2);
  color: var(--white);
  background-color: var(--color-brand-2);
  border-radius: var(--radius-1);
  height: 30px;
  font-size: var(--font-md);
}
</style>
