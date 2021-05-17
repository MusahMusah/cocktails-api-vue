<template>
    <mdb-container class="my-5">
        <mdb-row>
            <mdb-col col="10" class="mx-auto">
                <mdb-card>
                    <mdb-card-body>
                        <form class="pl-2 pr-2">
                            <p class="mb-4 text-center h4">Update Pump Settings</p>
                            <div class="grey-text">
                                 <!-- <h4>Ingredient</h4>
                                <p>Select An Ingredient to replace in the pump</p>
                                <mdb-row>
                                    <mdb-col md="6" class="mb-3">
                                        <label for="" class="text-dark">Ingredient</label>
                                        <v-select :options="['Canada', 'United States']"></v-select>
                                    </mdb-col>
                                </mdb-row> -->
                                <!-- <hr> -->
                                <h4>Sizes</h4>
                                <p>Enter Capacity Of the bottle / Bag in box so as to update level</p>
                                <mdb-row>
                                    <mdb-col col="6">
                                         <label class="text-dark" for="example1">Capacity (ml)</label>
                                        <input type="text" value="1000" readonly class="form-control">
                                    </mdb-col>
                                    <mdb-col col="6">
                                        <label class="text-dark" for="example1">Ingredient Level</label>
                                        <input type="text" v-model="level" class="form-control">
                                    </mdb-col>
                                </mdb-row>
                            </div>
                        <div class="text-center mt-4 pt-2">
                            <mdb-btn @click="clean" outline="indigo" class="mb-5" style="border-radius:2em;">Clean<mdb-icon far icon="check-circle" class="ml-1"/></mdb-btn>
                            <mdb-btn @click="refill" outline="indigo" class="mb-5" style="border-radius:2em;">Refill<mdb-icon far icon="check-circle" class="ml-1"/></mdb-btn>
                        </div>
                        </form>
                    </mdb-card-body>
                </mdb-card>
            </mdb-col>
        </mdb-row>
    </mdb-container>
</template>

<script>
import { mdbIcon,mdbRow,mdbCard, mdbCardBody, mdbContainer, mdbInput, mdbBtn, mdbCol } from 'mdbvue';

export default {
    name: "EditIngredient",
    data () {
        return {
            level: '',
        }
    },
    components: {
        mdbCard,
        mdbCardBody,
        mdbRow,
        mdbContainer,
        mdbCol,
        mdbIcon,
        mdbInput,
        mdbBtn
    },
    methods :{
        clean() {
            this.level = 0
        },
        refill() {
            this.level = 1000
        }
    }
};
</script>

<style scoped>

</style>
