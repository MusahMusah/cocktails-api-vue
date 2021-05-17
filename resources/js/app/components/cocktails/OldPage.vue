<template>
    <mdbContainer>
        <mdb-row>
            <mdb-col lg="6" md="12">
                <div id="profile-pic-demo" class="my-3 text-center hello" style="color:white !important">

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
                    <!-- <button type="button" class="btn btn-sm btn-primary" :class="{'disabled': uploaded || !profilePic}" @click="upload()">Upload</button>
                    <button type="button" style="margin-top: -1em !important" class="btn btn-sm" :class="[uploaded ? 'btn-danger' : 'btn-primary ml-4']" v-if="profilePic" @click="removePic()">Remove</button> -->
                </div>
            </mdb-col>
            <mdb-col lg="6" md="12" class="pl4">
                <mdb-input  placeholder="Name" label="Name" />
                <mdb-input style="color:white !important" placeholder="Input 1" label="Input 1" />
                <mdb-input style="color:white !important" placeholder="Input 2" label="Input 2" />
            </mdb-col>
        </mdb-row>
            <h2 class="mx-auto text-primary">
                Ingredients
            </h2>
        <mdb-row>
            <mdb-col md="4" v-for="(ingredient, index) in ingredients" :key="index">
                <mdb-card class="mb-4 text-center text-white bg-dark">
                    <mdb-card-header>

                        Ingredient # {{index}}
                    <span @click="removeIngredient(index)" style="float:right; font-size: 2em"><mdb-icon icon="backspace" /></span>
                    </mdb-card-header>
                    <mdb-card-body style="margin-top: -1.6em">
                        <select class="browser-default custom-select">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                       <!-- <v-select class="text-white" :options="['Canada', 'United', 'musah']"></v-select> -->
                       <div class="mt-4" style="height: 44px !important; background-color:blue;">
                           <span style="padding : .6em;display: block; margin-left:auto;margin-right:auto; width:80px; background-color:white; color:black">
                               30
                           </span>
                       </div>
                    </mdb-card-body>
                </mdb-card>
            </mdb-col>
            <mdb-col md="4">
                <div @click.prevent="addIngredient">
                    <mdb-card style="height: 194px" class="mb-3 text-center text-white bg-dark">
                        <mdb-card-header>
                            Add New
                        </mdb-card-header>
                        <mdb-card-body>
                            <mdb-icon class="mt-4" style="font-size: 3em" icon="plus-circle" />
                        </mdb-card-body>
                    </mdb-card>
                </div>
            </mdb-col>
        </mdb-row>
        <mdb-row>
            <mdb-col col="12" class="text-center">
             <mdb-btn @click="redirectToDashboard" color="danger" style="border-radius:2em" rounded>Cancel</mdb-btn>
             <mdb-btn color="success" style="border-radius:2em" rounded>Save</mdb-btn>
            </mdb-col>
        </mdb-row>
    </mdbContainer>
</template>

<script>
import { mdbCard,mdbBtn, mdbCardBody, mdbCardHeader, mdbContainer,mdbRow, mdbInput, mdbCol, mdbIcon, mdbModal, mdbModalHeader, mdbModalTitle, mdbModalBody, mdbModalFooter } from 'mdbvue';
export default {
    name: "Ingredients",
    components: {
        mdbCard,mdbBtn,mdbCardHeader, mdbCardBody,
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
            this.selectedIngredient = {...item};
        }
    },
    data() {
        return {
            ingredients: [
                {
                    name: ''
                },
            ],
            modal: false,
            ingredient: {name: "Fanta", percentage: 100, offset: 9, date: "01/01/2020"},
            selectedIngredient: {},
            // fileRecords: [],
            // uploadUrl: 'https://example.com',
            profilePic: null,
            uploaded: false,
            uploadUrl: '/api/me',
            uploadHeaders: {},

        }
    },
    methods : {
        redirectToDashboard () {
            return this.$router.push({ name: 'dashboard'})
        },
        addIngredient() {
            this.ingredients.push({ name: '' });
        },
        removeIngredient(index) {
            this.ingredients.splice(index, 1);
        },
        removePic: function(){
            var profilePic = this.profilePic;
            this.$refs.profilePicRef.deleteUpload(this.uploadUrl, this.uploadHeaders, [profilePic]);
            this.profilePic = null;
            this.uploaded = false;
        },

        upload: function(){
            var self = this;
            this.$refs.profilePicRef.upload(this.uploadUrl, this.uploadHeaders, [this.profilePic]).then(function(){
                self.uploaded = true;
                setTimeout(function(){
                // self.profilePic.progress(0);
                }, 500);
            });
        },

        onSelect: function(fileRecords){
            console.log('onSelect', fileRecords);
            this.uploaded = false;
        }
    },
    computed: {
    }
}
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
    border-color: #AAA;
  }
  #profile-pic-demo .vue-file-agent {
    width: 180px;
    float: left;
    margin: 0 15px 5px 0;
    border: 0;
    box-shadow: none;
  }
</style>
