<template>
  <mdb-container style="margin-top: 8em">
    <mdb-row>
      <mdb-col md="6" offsetMd="3">
        <!-- Card -->
        <mdb-card style="background-color: #000000">
          <mdb-card-body class="text-white">
            <form @submit.prevent="login">
              <p class="py-4 text-center text-white h4">Login</p>
              <div class="text-white">
                <mdb-input
                  label="Your email"
                  v-model="credentials.email"
                  icon="envelope"
                  group
                  type="email"
                  validate
                  error="wrong"
                  success="right"
                />
                <mdb-input
                  label="Your password"
                  v-model="credentials.password"
                  icon="lock"
                  group
                  type="password"
                  validate
                />
              </div>
              <div class="py-4 mt-3 text-center">
                <mdb-btn
                  color="white"
                  rounded
                  type="submit"
                  style="border-radius: 5em; width: 100%"
                  >Login</mdb-btn
                >
              </div>
            </form>
          </mdb-card-body>
        </mdb-card>
        <!-- Card -->
      </mdb-col>
    </mdb-row>
  </mdb-container>
</template>

<script>
import axios from "axios";
import {
  mdbContainer,
  mdbRow,
  mdbCol,
  mdbInput,
  mdbBtn,
  mdbCard,
  mdbCardBody,
} from "mdbvue";
export default {
  name: "Login",
  data() {
    return {
      credentials: {
        email: "",
        password: "",
      },
      loading: true,
    };
  },
  methods: {
    login() {
      const loader = this.$loading.show()
      axios
        .post("/api/login", this.credentials)
        .then((res) => {
          if (res.data.success) {
            // Update the Store
            this.$store.commit("setToken", res.data.token);
            this.$router.push("/dashboard")
            .then(() => {
                loader.hide()
                this.$toast.success("User Logged In Successfully", { timeout: 4000});
            })
            .catch(() => {
                loader.hide()
            })
          }
        })
        .catch((error) => {
            loader.hide()
            console.log(error);
        });
    },
  },
  components: {
    mdbContainer,
    mdbRow,
    mdbCol,
    mdbInput,
    mdbBtn,
    mdbCard,
    mdbCardBody,
  },
};
</script>

<style>
</style>
