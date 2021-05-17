<template>
    <mdb-container>
        <!-- <div style="color: white">
            Hello {{getUserData.name}} You are now Logged in successfully!
        </div> -->
        <mdb-row class="mt-5">
            <mdb-col col="6" md="4">
                <div @click="pumpSettings">
                <mdb-card class="mb-3 bg-dark">
                     <mdb-card-title style="font-size: 1em" class="p-2 mt-4 text-center text-white">PUMP SETTINGS</mdb-card-title>
                    <mdb-icon style="font-size:5em" class="p-2 mb-3 text-center text-danger" icon="gas-pump" />
                </mdb-card>
                </div>
            </mdb-col>
            <mdb-col col="6" md="4">
                <div @click="ingredients">
                    <mdb-card class="mb-5 bg-dark">
                        <mdb-card-title style="font-size: 1em"  class="p-2 mt-4 text-center text-white">INGREDIENTS</mdb-card-title>
                        <mdb-icon style="font-size:5em" class="p-2 mb-3 text-center text-success" icon="mug-hot" />
                    </mdb-card>
                </div>
            </mdb-col>
            <mdb-col col="6" md="4">
                <div @click="cocktail">
                    <mdb-card class="mb-5 bg-dark">
                        <mdb-card-title style="font-size: 1em"  class="p-2 mt-4 text-center text-white">NEW COCKTAIL</mdb-card-title>
                        <mdb-icon style="font-size:5em" class="p-2 mb-3 text-center text-primary" icon="cocktail" />
                    </mdb-card>
                </div>
            </mdb-col>
            <mdb-col col="6" md="4">
                <div @click="stats">
                    <mdb-card class="mb-3 bg-dark">
                    <mdb-card-title style="font-size: 1em"  class="p-2 mt-4 text-center text-white">STATS</mdb-card-title>
                    <mdb-icon style="font-size:5em" class="p-2 mb-3 text-center text-success" icon="search" />
                    </mdb-card>
                </div>
            </mdb-col>
            <mdb-col col="6" md="4">
                <div @click="users">
                    <mdb-card class="mb-3 bg-dark">
                        <mdb-card-title style="font-size: 1em"  class="p-2 mt-4 text-center text-white">USERS</mdb-card-title>
                        <mdb-icon style="font-size:5em" class="p-2 mb-3 text-center text-primary" icon="users-cog" />
                    </mdb-card>
                </div>
            </mdb-col>
            <mdb-col col="6" md="4">
               <div @click="logout">
                    <mdb-card class="mb-3 bg-dark">
                        <mdb-card-title style="font-size: 1em" class="p-2 mt-4 text-center text-white">LOGOUT</mdb-card-title>
                        <mdb-icon style="font-size:5em" class="p-2 mb-3 text-center text-danger" icon="sign-out-alt" />
                    </mdb-card>
               </div>
            </mdb-col>
        </mdb-row>
    </mdb-container>
</template>

<script>
import {mdbContainer,mdbIcon, mdbRow, mdbCol, mdbBtn, mdbCard,mdbCardHeader, mdbCardBody, mdbCardImage, mdbCardTitle, mdbCardText} from 'mdbvue';
export default {
    name: 'Dashboard',
    data () {
        return {

        }
    },
    methods : {
        logout () {
          return this.$router.push({ name: 'logout'})
        },
        ingredients () {
          return this.$router.push({ name: 'ingredients'})
        },
        cocktail () {
          return this.$router.push({ name: 'create-cocktail'})
        },
        stats () {
          return this.$router.push({ name: 'stats'})
        },
        users () {
          return this.$router.push({ name: 'users'})
        },
        pumpSettings () {
          return this.$router.push({ name: 'pump-settings'})
        },
    },
    computed : {
        getUserData () {
            return this.$store.getters.getUserData
        }
    },
    mounted () {
       axios.post('/api/me', {token : this.$store.state.token})
            .then((res) => {
                if (res.data) {
                    this.$store.commit('setUserData', res.data.user)
                }else if(res.status != 200) {
                    localStorage.removeItem("token")
                    return this.$router.push({ name: 'login'})
                }
            })
            .catch((error) => {
            localStorage.removeItem("token")
            return this.$router.push({ name: 'login'})
            console.log(error)
        })
    },
    components: {
        mdbIcon,
        mdbContainer,
        mdbRow,
        mdbCol,
        mdbBtn,
        mdbCard,
        mdbCardHeader,
        mdbCardBody,
        mdbCardImage,
        mdbCardTitle,
        mdbCardText,
    },
}
</script>

<style>

</style>
