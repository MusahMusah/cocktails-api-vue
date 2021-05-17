<template>
  <!-- <div class="p-3 my-5 bg-white rounded hello" style="color:black !important"> -->
  <mdb-container class="p-3 my-5 rounded bg-dark hello">
    <mdb-row>
      <mdb-col class="float-right">
        <mdb-btn
          color="indigo"
          @click="goToAddIngredient"
          class="mb-4"
          style="border-radius: 2em; float: right"
          rounded
          ><mdb-icon icon="plus-circle" /> New Ingredient</mdb-btn
        >
      </mdb-col>
    </mdb-row>
    <mdb-row class="mb-4 font-weight-bold">
      <mdb-col col="1"> </mdb-col>
      <mdb-col col="10">
        <mdb-row>
          <mdb-col col="4"> Ingredient </mdb-col>
          <mdb-col col="4"> Level </mdb-col>
          <mdb-col col="4"> Last Clean </mdb-col>
        </mdb-row>
      </mdb-col>
      <mdb-col col="1"> </mdb-col>
    </mdb-row>

    <mdb-row class="mb-2" v-for="(ingredient, index) in allIngredients" :key="index">
      <mdb-col col="1" style="background-color: grey; text-align: center">
        <div style="font-size: 1.2em" class="font-weight-bold">{{++index}}</div>
      </mdb-col>
      <mdb-col col="10">
        <mdb-row>
          <mdb-col col="4">
            <span>{{ ingredient.name }}</span>
          </mdb-col>
          <mdb-col col="4">
            <span>{{ ingredient.price }}</span>
          </mdb-col>
          <mdb-col col="4">
            <span>{{ ingredient.created_at }}</span>
          </mdb-col>
        </mdb-row>
        <mdb-row>
          <mdb-col class="mt-2 progress-wrapper">
            <div
              v-bind:style="{
                backgroundColor: levelClass,
                height: '.2rem',
                width: ingredient.percentage + '%',
              }"
            ></div>
          </mdb-col>
        </mdb-row>
      </mdb-col>
      <mdb-col col="1" style="color: blue; text-align: center">
        <mdb-icon
          class="my-3"
          icon="tools"
          @click.native="view(ingredient.id)"
        />
          <!-- @click.native="modal = true" -->
      </mdb-col>
    </mdb-row>

    <mdb-modal :show="modal" @close="modal = false" class="hello">
      <mdb-modal-header class="text-center">
        <mdb-modal-title tag="h4" bold class="w-100">Sign in</mdb-modal-title>
      </mdb-modal-header>
      <mdb-modal-body class="mx-3 grey-text">
        <mdb-input
          label="Ingredient name"
          icon="wine-bottle"
          v-model="selectedIngredient.name"
          type="text"
          validate
          error="wrong"
          success="right"
        />
        <mdb-input
          label="Price"
          icon="hourglass-half"
          v-model="selectedIngredient.price"
          type="number"
          validate
          error="wrong"
          success="right"
        />
      </mdb-modal-body>
      <mdb-modal-footer center>
        <mdb-btn @click.native="updateIngredient(selectedIngredient.id)" outline="indigo">Update</mdb-btn>
        <mdb-btn color="indigo" class="ml-auto" @click.native="modal = false"
          >Close</mdb-btn
        >
      </mdb-modal-footer>
    </mdb-modal>
  </mdb-container>
  <!-- </div> -->
</template>

<script>
import {
  mdbBtn,
  mdbInput,
  mdbContainer,
  mdbRow,
  mdbCol,
  mdbIcon,
  mdbModal,
  mdbModalHeader,
  mdbModalTitle,
  mdbModalBody,
  mdbModalFooter,
} from "mdbvue";
import { mapState } from 'vuex'
export default {
  name: "Ingredients",
  components: {
    mdbInput,
    mdbIcon,
    mdbBtn,
    mdbContainer,
    mdbRow,
    mdbCol,
    mdbIcon,
    mdbModal,
    mdbModalHeader,
    mdbModalTitle,
    mdbModalBody,
    mdbModalFooter,
  },
  data() {
    return {
      modal: false,
      ingredient: {
        name: "Fanta",
        percentage: 100,
        offset: 60,
        date: "01/01/2020",
      },
      selectedIngredient: {},
    }
  },
  methods: {
    popup: function (item) {
      this.selectedIngredient = { ...item };
    },
    goToAddIngredient() {
      return this.$router.push({ name: "create-ingredient" });
    },
    view(id) {
      axios.defaults.headers.common.Authorization = `Bearer ${localStorage.getItem(
        "token"
        )}`;
        axios.get(`/api/ingredients/edit/${id}`)
        .then((response) => {
            this.selectedIngredient = response.data.data
            this.modal = true
        })
        .catch(() => {

        })
    },
    updateIngredient(id) {
        this.modal = false
        const payload = {name: this.selectedIngredient.name, price: this.selectedIngredient.price}
        const loader = this.$loading.show()
        axios.defaults.headers.common.Authorization = `Bearer ${localStorage.getItem(
        "token"
        )}`;
        axios.put(`/api/ingredients/${id}`, payload)
        .then(() => {
            loader.hide()
            this.fetAllIngredients()
            this.$toast.success("Ingredient Updated Successfully", { timeout: 4000});
        })
        .catch(() => {
            loader.hide()
        })
    },
    fetAllIngredients() {
        axios.defaults.headers.common.Authorization = `Bearer ${localStorage.getItem(
        "token"
        )}`;
        axios
        .get("/api/ingredients")
        .then((response) => {
            this.$store.commit("setIngredients", response.data);
        })
        .catch((e) => {
            console.log(e);
        });
    }
  },
  computed: {
    ...mapState(['allIngredients']),
    levelClass: function () {
      if (this.ingredient.percentage > 80) {
        return "green";
      } else if (this.ingredient.percentage > 60) {
        return "teal";
      } else if (this.ingredient.percentage > 40) {
        return "yellow";
      } else if (this.ingredient.percentage > 20) {
        return "orange";
      } else {
        return "red";
      }
    },
  },
  created() {
    this.fetAllIngredients()
  },
};
</script>

<style scoped>
.hello {
  box-shadow: 0px 0px 5px 0.5px rgba(0, 0, 0, 0.1);
  color: white;
  font-size: 0.9em !important;
}
</style>
