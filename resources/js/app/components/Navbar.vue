<template>
  <!-- <mdb-container fluid class="mb-5"> -->
    <div>
        <mdb-navbar color="indigo" class="mb4" style="height: 60px !important;">
            <mdb-navbar-nav nav class="font-weight-bold">
                <!-- <mdb-nav-item href="#" active anchorClass="white-text"><mdb-icon icon="bookmark" />FAVORITES</mdb-nav-item> -->
                <mdb-nav-item href="#" :to="{name: 'all-cocktails'}" anchorClass="white-text"><mdb-icon icon="cocktail" />COCKTAILS</mdb-nav-item>
            </mdb-navbar-nav>
            <mdb-navbar-nav nav right class="font-weight-bold">
                <mdb-nav-item v-if="token" @click="goBack" href="#" active anchorClass="white-text"><mdb-icon icon="arrow-left" /> Back </mdb-nav-item>
                <mdb-nav-item v-if="token" :to="{name: 'dashboard'}" href="#" active anchorClass="white-text"><mdb-icon icon="home" /></mdb-nav-item>
            </mdb-navbar-nav>
        </mdb-navbar>
    </div>
  <!-- </mdb-container> -->
</template>

<script>
import { mapState } from 'vuex'
import {  mdbIcon, mdbNavbar, mdbContainer, mdbNavbarBrand, mdbNavbarToggler, mdbNavbarNav, mdbNavItem, mdbDropdown, mdbDropdownMenu, mdbDropdownToggle, mdbInput, mdbDropdownItem } from 'mdbvue';
export default {
  name: 'NavbarPage',
  components: {
    mdbIcon,
    mdbNavbar,
    mdbNavbarBrand,
    mdbNavbarToggler,
    mdbNavbarNav,
    mdbNavItem,
    mdbDropdown,
    mdbDropdownMenu,
    mdbDropdownToggle,
    mdbDropdownItem,
    mdbInput,
    mdbContainer
  },
  computed: {
    ...mapState(['token']),
  },
  methods: {
    goBack() {
        return this.$router.go(-1)
    }
  }
}
</script>

<style>

</style>
