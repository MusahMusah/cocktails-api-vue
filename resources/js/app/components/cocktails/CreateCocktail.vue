<template>
  <mdbContainer>
    <mdb-card class="mt-2">
      <mdb-card-body>
        <mdb-row>
          <mdb-col md="6">
            <div
              id="profile-pic-demo"
              class="my-3 text-center hello"
              style="color: white !important"
            >
              <!-- <VueFileAgent :uploadUrl="uploadUrl" :multiple="false" v-model="fileRecords"></VueFileAgent> -->
              <VueFileAgent
                class="profile-pic-upload-block"
                ref="profilePicRef"
                :multiple="false"
                :deletable="false"
                :meta="false"
                :compact="true"
                :accept="'image/*'"
                :helpText="'Drag an image file here'"
                :errorText="{
                  type: 'Please select an image',
                }"
                v-model="profilePic"
                @select="onSelect($event)"
              >
              </VueFileAgent>
              <!-- <button type="button" class="btn btn-sm btn-primary" :class="{'': uploaded || !profilePic}" @click="upload()">Upload</button>
                    <button type="button" style="margin-top: -1em !important" class="btn btn-sm" :class="[uploaded ? 'btn-danger' : 'btn-primary ml-4']" v-if="profilePic" @click="removePic()">Remove</button> -->
            </div>
          </mdb-col>
          <mdb-col md="6">
            <mdb-input placeholder="Name" label="Name" class="pb-1" />
            <mdb-input
              type="textarea"
              class="pb-1"
              placeholder="Preparation"
              label="Preparation"
            />
            <mdb-input
              type="textarea"
              placeholder="Garnish"
              class="pb-1"
              label="Garnish"
            />
            <mdb-input label="Selling Price" class="pb-1" />
          </mdb-col>
        </mdb-row>
        <hr />
        <h4 class="mx-auto text-primary">Ingredients</h4>
        <mdb-row>
            <mdb-col md="6">
                <label for="" >Ingredients</label>
                <v-select :options="['Canada', 'United States']"></v-select>
            </mdb-col>
            <mdb-col md="6">
                <label for="" >Quantity</label>
               <input type="number" class="form-control mx-auto">
            </mdb-col>
        </mdb-row>
        <mdb-row>
            <mdb-col>
                <mdb-btn outline="indigo" class="float-right mt-4"><mdb-icon icon="plus-circle" />  Add Ingredient</mdb-btn>
            </mdb-col>
        </mdb-row>
        <mdb-row>
          <mdb-col col="12" class="text-center mt-2">
            <mdb-btn
              @click="redirectToDashboard"
              color="danger"
              style="border-radius: 2em"
              rounded
              >Cancel</mdb-btn
            >
            <mdb-btn color="success" style="border-radius: 2em" rounded
              >Save</mdb-btn
            >
          </mdb-col>
        </mdb-row>
      </mdb-card-body>
    </mdb-card>
  </mdbContainer>
</template>

<script>
import {
  mdbCard,
  mdbBtn,
  mdbCardBody,
  mdbCardHeader,
  mdbContainer,
  mdbRow,
  mdbInput,
  mdbCol,
  mdbIcon,
  mdbModal,
  mdbModalHeader,
  mdbModalTitle,
  mdbModalBody,
  mdbModalFooter,
} from "mdbvue";
export default {
  name: "Ingredients",
  components: {
    mdbCard,
    mdbBtn,
    mdbCardHeader,
    mdbCardBody,
    mdbContainer,
    mdbInput,
    mdbRow,
    mdbCol,
    mdbIcon,
    mdbModal,
    mdbModalHeader,
    mdbModalTitle,
    mdbModalBody,
    mdbModalFooter,
  },
  methods: {
    popup: function (item) {
      this.selectedIngredient = { ...item };
    },
  },
  data() {
    return {
      ingredients: [
        {
          name: "",
        },
      ],
      modal: false,
      ingredient: {
        name: "Fanta",
        percentage: 100,
        offset: 9,
        date: "01/01/2020",
      },
      selectedIngredient: {},
      // fileRecords: [],
      // uploadUrl: 'https://example.com',
      profilePic: null,
      uploaded: false,
      uploadUrl: "/api/me",
      uploadHeaders: {},
    };
  },
  methods: {
    redirectToDashboard() {
      return this.$router.push({ name: "dashboard" });
    },
    addIngredient() {
      this.ingredients.push({ name: "" });
    },
    removeIngredient(index) {
      this.ingredients.splice(index, 1);
    },
    removePic: function () {
      var profilePic = this.profilePic;
      this.$refs.profilePicRef.deleteUpload(
        this.uploadUrl,
        this.uploadHeaders,
        [profilePic]
      );
      this.profilePic = null;
      this.uploaded = false;
    },

    upload: function () {
      var self = this;
      this.$refs.profilePicRef
        .upload(this.uploadUrl, this.uploadHeaders, [this.profilePic])
        .then(function () {
          self.uploaded = true;
          setTimeout(function () {
            // self.profilePic.progress(0);
          }, 500);
        });
    },

    onSelect: function (fileRecords) {
      console.log("onSelect", fileRecords);
      this.uploaded = false;
    },
  },
  computed: {},
};
</script>

<style scoped>
.hello {
  color: white;
  text-align: center !important;
}
#profile-pic-demo .is-drag-over .drop-help-text {
  display: block;
}
#profile-pic-demo .profile-pic-upload-block {
  border: 2px dashed transparent;
  width: 210px;
  padding: 20px;
  padding-left: 8px !important;
  padding-top: 0;
  margin-left: auto;
  margin-right: auto;
}

#profile-pic-demo .is-drag-over.profile-pic-upload-block {
  border-color: #aaa;
}
#profile-pic-demo .vue-file-agent {
  width: 180px;
  float: left;
  margin: 0 15px 5px 0;
  border: 0;
  box-shadow: none;
}
</style>
