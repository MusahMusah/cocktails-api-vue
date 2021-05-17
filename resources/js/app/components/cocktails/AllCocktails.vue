<template>
    <mdb-container class="mt-5">
        <mdb-row>
            <mdb-col col="6" md="3">
                <div @click="orderCocktail">
                    <mdb-card class="mb-2 bg-dark">
                        <mdb-card-image src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20%286%29.jpg" alt="Card image cap"></mdb-card-image>
                        <mdb-card-title class="p-2 text-white">Jungle Bird</mdb-card-title>
                    </mdb-card>
                </div>
            </mdb-col>
            <mdb-col col="6" md="3">
                <div @click="orderCocktail">

                <mdb-card class="mb-2 bg-dark">
                    <mdb-card-image src="https://images.unsplash.com/photo-1591243315780-978fd00ff9db?ixid=MXwxMjA3fDB8MHxzZWFyY2h8Mnx8Y29ja3RhaWxzfGVufDB8fDB8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="Card image cap"></mdb-card-image>
                    <mdb-card-title class="p-2 text-white">El Diablo</mdb-card-title>
                </mdb-card>
                </div>
            </mdb-col>
            <mdb-col col="6" md="3">
                <div @click="orderCocktail">

                <mdb-card class="mb-2 bg-dark">
                    <mdb-card-image src="https://images.unsplash.com/photo-1596463989140-3b600dab72e5?ixid=MXwxMjA3fDB8MHxzZWFyY2h8N3x8Y29ja3RhaWxzfGVufDB8fDB8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60"
                    alt="Card image cap"></mdb-card-image>
                    <mdb-card-title class="p-2 text-white">Martini</mdb-card-title>
                </mdb-card>
                </div>
            </mdb-col>
            <mdb-col col="6" md="3">
                <div @click="orderCocktail">

                <mdb-card class="mb-2 bg-dark">
                    <mdb-card-image src="https://images.unsplash.com/photo-1596463989140-3b600dab72e5?ixid=MXwxMjA3fDB8MHxzZWFyY2h8N3x8Y29ja3RhaWxzfGVufDB8fDB8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60"
                    alt="Card image cap"></mdb-card-image>
                    <mdb-card-title class="p-2 text-white">Irish Coffee</mdb-card-title>
                </mdb-card>
                </div>
            </mdb-col>
            <mdb-col col="6" md="3">
                <div @click="orderCocktail">

                <mdb-card class="mb-2 bg-dark">
                    <mdb-card-image src="https://images.unsplash.com/photo-1596463989140-3b600dab72e5?ixid=MXwxMjA3fDB8MHxzZWFyY2h8N3x8Y29ja3RhaWxzfGVufDB8fDB8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60"
                    alt="Card image cap"></mdb-card-image>
                    <mdb-card-title class="p-2 text-white">Pina Colada</mdb-card-title>
                </mdb-card>
                </div>
            </mdb-col>
        </mdb-row>
    </mdb-container>
</template>

<script>
import { mdbContainer, mdbRow, mdbCol, mdbInput, mdbBtn, mdbCard, mdbCardBody, mdbCardImage, mdbCardTitle, mdbCardText } from 'mdbvue';
export default {
    data () {
        return {
            data: [1,2,3]
        }
    },
    components: {
    mdbContainer,
    mdbRow,
    mdbCol,
    mdbInput,
    mdbBtn,
    mdbCard,
    mdbCardBody,
    mdbCardImage,
    mdbCardTitle,
    mdbCardText,
    },
    methods: {
      orderCocktail() {
        return this.$router.push({name: 'order-cocktails'})
      }
    },
}
</script>

<style>

</style>
