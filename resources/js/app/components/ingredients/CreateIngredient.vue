<template>
  <mdb-container class="bg-dark my-5">
    <mdb-row>
      <mdb-col md="8" class="mx-auto">
        <form class="pl-2 pr-2" @submit.prevent="createIngredient">
          <p class="mb-4 text-center h4">Add an ingredient</p>
          <div class="grey-text">
            <mdb-input
              label="Ingredient name"
              v-model="payload.name"
              icon="wine-bottle"
              group
              type="text"
              validate
              error="wrong"
              success="right"
            />
            <mdb-input
              label="Price"
              v-model="payload.price"
              icon="hourglass-half"
              group
              type="number"
              validate
              error="wrong"
              success="right"
            />
            <!-- <mdb-textarea :rows="2" label="Your message" icon="pencil"/> -->
          </div>
          <div class="text-center mt-4 pt-2">
            <mdb-btn
              type="submit"
              color="indigo"
              class="mb-5 btn-block"
              style="border-radius: 2em"
              >Add <mdb-icon far icon="check-circle" class="ml-1"
            /></mdb-btn>
          </div>
        </form>
      </mdb-col>
    </mdb-row>
  </mdb-container>
</template>

<script>
import {
  mdbIcon,
  mdbRow,
  mdbContainer,
  mdbInput,
  mdbBtn,
  mdbCol,
} from "mdbvue";
import axios from 'axios'

export default {
  name: "EditIngredient",
  data() {
    return {
      payload: {
          name: '',
          price: '',
      },
    };
  },
  components: {
    mdbRow,
    mdbContainer,
    mdbCol,
    mdbIcon,
    mdbInput,
    mdbBtn,
  },
  computed: {

  },
  methods: {
    createIngredient() {
    const loader = this.$loading.show()
    axios.defaults.headers.common.Authorization = `Bearer ${localStorage.getItem('token')}`
    axios.post('/api/ingredients/create', this.payload)
    .then(() => {
        this.$router.push({name: 'ingredients'})
        .then(() => {
            loader.hide()
            this.$toast.success("Ingredient Created Successfully", { timeout: 4000});
        })
    })
    .catch(e => {
        loader.hide()
        console.log(e.response.data.errors)
        const errors = e.response.data.errors
        Object.entries(errors).forEach(
            ([, value]) => {
                this.$toast.error(value[0], { timeout: 4000});
            },
        )
        // for (let index = 0; index < e.response.data.errors.length; index++) {
        //     this.$toast.error(e.response.data.errors[index], { timeout: 4000});
        // }
    })
    },
  },
};
</script>

<style scoped>
</style>
