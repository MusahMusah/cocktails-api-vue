<template>
    <mdb-row>
        <mdb-col col="6" class="mx-auto">
            <form>
                <p class="mb-4 text-center h4">Add an ingredient</p>
                <div class="grey-text">
                    <mdb-input label="Ingredient name" v-model="ingredient.name" icon="wine-bottle" group type="text" validate error="wrong" success="right"/>
                    <mdb-input label="Quantity(%)" v-model="ingredient.percentage" icon="hourglass-half" group type="number" validate error="wrong" success="right"/>
                    <div class="p-3 ml-3 input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Picture</span>
                        </div>
                        <div class="custom-file">
                            <input type="image" v-model="ingredient.picture" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="inputGroupFile01">Choose picture</label>
                        </div>
                    </div>
                    <!-- <mdb-textarea :rows="2" label="Your message" icon="pencil"/> -->
                </div>
                <div class="text-center">
                    <mdb-btn>Add <mdb-icon far icon="check-circle" class="ml-1"/></mdb-btn>
                </div>
            </form>
        </mdb-col>
    </mdb-row>

</template>

<script>
import { mdbIcon, mdbInput, mdbBtn, mdbCol } from 'mdbvue';

export default {
    name: "EditIngredient",
    data () {
        return {
            ingredient: [
                {
                    name: '',
                    picture: '',
                    percentage: '',
                    picture: ''
                },
            ],
        }
    },
    components: {
        // mdbRow,
        mdbCol,
        mdbIcon,
        mdbInput,
        mdbBtn
    },
};
</script>

<style scoped>

</style>
