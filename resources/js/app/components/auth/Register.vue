<template>
  <mdb-container>
    <mdb-row>
        <mdb-col md="6" offsetMd="3">
            <!-- Card -->
            <mdb-card>
                <mdb-card-body>
                <form>
                    <p class="h4 text-center py-4">Sign up</p>
                    <div class="grey-text">
                    <mdb-input label="Your name" icon="user" group type="text" validate error="wrong" success="right"/>
                    <mdb-input label="Your email" icon="envelope" group type="email" validate error="wrong" success="right"/>
                    <mdb-input label="Confirm your email" icon="exclamation-triangle" group type="text" validate error="wrong" success="right"/>
                    <mdb-input label="Your password" icon="lock" group type="password" validate/>
                    </div>
                    <div class="text-center py-4 mt-3">
                    <mdb-btn color="cyan" type="submit">Register</mdb-btn>
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
  import { mdbContainer, mdbRow, mdbCol, mdbInput, mdbBtn, mdbCard, mdbCardBody } from 'mdbvue';
  export default {
    name: 'Login',
    components: {
      mdbContainer,
      mdbRow,
      mdbCol,
      mdbInput,
      mdbBtn,
      mdbCard,
      mdbCardBody
    }
  }
</script>

<style>

</style>
