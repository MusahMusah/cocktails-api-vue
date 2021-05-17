<template>
  <!-- <div class="p-3 my-5 bg-white rounded hello" style="color:black !important"> -->
  <mdb-container class="p-3 my-5 rounded bg-dark hello">
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

    <mdb-row class="mb-2" v-for="(items, index) in allIngredients" :key="index">
      <mdb-col col="1" style="background-color: grey; text-align: center">
        <div style="font-size: 1.2em" class="font-weight-bold">{{ ++index}}</div>
      </mdb-col>
      <mdb-col col="9">
        <mdb-row>
          <mdb-col col="4">
            <span>{{ items.name }}</span>
          </mdb-col>
          <mdb-col col="4">
            <span>{{ 400 }}%</span>
          </mdb-col>
          <mdb-col col="4">
            <span>{{ items.created_at }}</span>
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
      <mdb-col col="2" style="color: blue">
        <mdb-btn @click="updateSettings" class="btn-sm"> Update</mdb-btn>
      </mdb-col>
    </mdb-row>

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
      pumpSetting: {
          ingredient: [
            {number: '1', capacity:'1000', level: '635', ingredient: ''},
            {number: '1', capacity:'1000', level: '635', ingredient: ''},
            {number: '1', capacity:'1000', level: '635', ingredient: ''},
          ]
      }
    };
  },
  methods: {
    popup: function (item) {
      this.selectedIngredient = { ...item };
    },
    updateSettings() {
      return this.$router.push({ name: "update-settings" });
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
    },
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
    this.fetAllIngredients();
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
