<template>
    <mdbContainer class="mt-2" fluid>
        <mdb-card style="height: 100%">
            <mdb-card-body>
                <mdb-row>
                    <mdb-col md="4" class="text-center text-md-left">
                        <h3>Barcadi Cocktail</h3>
                        <img src="https://mdbootstrap.com/img/Others/documentation/img%20(75)-mini.jpg"
                         alt="thumbnail" class="img-thumbnail" style="width: 200px; height:210px; object-fit: cover">
                    </mdb-col>
                    <mdb-col md="4">
                        <mdb-input  placeholder="Name" label="Name" class="pb-2"/>
                        <mdb-input type="textarea" class="pb-2" placeholder="Preparation" label="Preparation" />
                        <mdb-input type="textarea" placeholder="Garnish" class="pb-2" label="Garnish" />
                        <mdb-input  value="700" label="Selling Price" disabled class="pb-2"/>
                    </mdb-col>
                    <mdb-col md="4">
                         <mdb-row>
                             <mdb-col col="6">
                                <label for="" class="p-2">Favorite Cocktail:</label>
                             </mdb-col>
                             <mdb-col col="6" class="pt-1 pr-5">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="radio1" id="defaultUnchecked">
                                    <label class="custom-control-label" for="defaultUnchecked">Yes</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="radio1" id="defaultUnchecked">
                                    <label class="custom-control-label" for="defaultUnchecked">No</label>
                                </div>
                             </mdb-col>
                         </mdb-row>
                         <hr>
                         <mdb-row class="mt-3">
                             <mdb-col col="6">
                                <label for="" class="p-2">Hide Cocktail:</label>
                             </mdb-col>
                             <mdb-col col="6" class="pt-1 pr-5">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="radio1" id="defaultUnchecked">
                                    <label class="custom-control-label" for="defaultUnchecked">Yes</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="radio1" id="defaultUnchecked">
                                    <label class="custom-control-label" for="defaultUnchecked">No</label>
                                </div>
                             </mdb-col>
                         </mdb-row>
                    </mdb-col>
                </mdb-row>
                <hr>
                <mdb-row>
                    <mdb-col md="6">
                        <h6 class="font-weight-bold">Make New Ingredient</h6>
                        <hr>
                         <mdb-tbl style="color: black !important; text-align:center">
                            <mdb-tbl-head>
                                <tr>
                                    <th style="width: 30%">Name</th>
                                    <th>Quantity</th>
                                    <th>Options</th>
                                </tr>
                            </mdb-tbl-head>
                            <mdb-tbl-body>
                                <tr>
                                    <td>
                                        <v-select :options="['Canada', 'United States']"></v-select>
                                    </td>
                                    <td>
                                       <input type="number" style="width:50%" value="20" class="form-control mx-auto">
                                    </td>
                                    <td>
                                        <mdb-btn color="indigo" class="btn-sm"><mdb-icon icon="plus-circle" />  Add</mdb-btn>
                                    </td>
                                </tr>
                            </mdb-tbl-body>
                        </mdb-tbl>
                    </mdb-col>
                    <mdb-col md="6">
                        <h6 class="font-weight-bold">Ingredients</h6>
                        <hr>
                        <mdb-tbl style="color: black !important; text-align:center">
                            <mdb-tbl-head>
                                <tr>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Options</th>
                                </tr>
                            </mdb-tbl-head>
                            <mdb-tbl-body>
                                <tr>
                                    <td>Mark</td>
                                    <td>
                                       <input type="number" style="width:50%" value="20" class="form-control mx-auto">
                                    </td>
                                    <td>
                                        <mdb-btn color="indigo" class="btn-sm"><mdb-icon icon="trash" /> Delete</mdb-btn>
                                    </td>
                                </tr>
                            </mdb-tbl-body>
                        </mdb-tbl>
                    </mdb-col>
                </mdb-row>
                <hr>
                <mdb-row>
                    <mdb-col class="text-center">
                        <mdb-btn outline="indigo" class="btn-sm"> Save</mdb-btn>
                        <mdb-btn outline="danger" class="btn-sm" @click="redirectToDashboard"> Cancel</mdb-btn>
                    </mdb-col>
                </mdb-row>
            </mdb-card-body>
        </mdb-card>
    </mdbContainer>
</template>

<script>
import { mdbCard,mdbBtn, mdbTbl,mdbTblHead, mdbTblBody, mdbCardBody, mdbCardHeader, mdbContainer,mdbRow, mdbInput, mdbCol, mdbIcon, mdbModal, mdbModalHeader, mdbModalTitle, mdbModalBody, mdbModalFooter } from 'mdbvue';
export default {
    name: "Ingredients",
    components: {
        mdbCard,mdbBtn,mdbCardHeader, mdbCardBody,
        mdbContainer,
        mdbTbl,
        mdbTblHead,
        mdbTblBody,
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
