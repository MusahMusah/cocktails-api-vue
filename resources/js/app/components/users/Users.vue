<template>
    <mdbContainer>
        <mdb-row>
            <mdb-col>
                <mdb-card class="mt-5">
                     <h3 class="py-4 bg-white card-header dark-text font-weight-bold text-uppercase">List of all users
                        <mdb-btn color="indigo" style="border-radius:2em; float:right" rounded><mdb-icon icon="plus-circle" /> New User</mdb-btn>
                     </h3>
                    <mdb-card-body class="bg-dar">
                        <div class="text-whit">
                            <mdb-input class="mt-0 text-whit" v-model="search" label="Search for User" />
                            <mdb-datatable-2  striped bordered :display="1" class="text-white" v-model="data" :searching="{value: search, field: 'name,email,'}" />
                        </div>
                    </mdb-card-body>
                </mdb-card>
            </mdb-col>
        </mdb-row>
    </mdbContainer>
</template>

<script>
import { mdbBtn, mdbContainer, mdbCardHeader, mdbCard, mdbCardBody, mdbDatatable2, mdbRow, mdbInput, mdbCol, mdbIcon, mdbModal, mdbModalHeader, mdbModalTitle, mdbModalBody, mdbModalFooter } from 'mdbvue';
export default {
    name: "Users",
    components: {
        mdbCard,mdbBtn, mdbCardHeader, mdbCardBody,
        mdbContainer,
        mdbDatatable2,
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

    },
    data() {
        return {
            search: '',
            data: {
                columns: [
                    {
                    label: 'Name',
                    field: 'name',
                    sort: true
                    },
                    {
                    label: 'Email',
                    field: 'email',
                    sort: true
                    },
                    {
                    label: 'Role',
                    field: 'role',
                    sort: true
                    },
                    {
                    label: 'Action',
                    field: 'action',
                    },
                ],
                rows: [
                    {
                    name: 'Tiger Nixon',
                    email: 'System Architect',
                    role: 'Edinburgh',
                    action: '<i data-toggle="tooltip" data-placement="top" title="" class="waves-effect mdb-icon-copy fas fa-edit" style="font-size:1.8em;" data-original-title="Click here to copy"></i> <span style="margin:10px"></span> <i data-toggle="tooltip" data-placement="top" title="" style="font-size:1.8em;" class="waves-effect mdb-icon-copy fas fa-backspace" data-original-title="Click here to copy"></i>'
                    },
                    {
                    name: 'Tisjdkmsj',
                    email: 'System Architect',
                    role: 'Edinburgh',
                    action: '<i data-toggle="tooltip" data-placement="top" title="" class="waves-effect mdb-icon-copy fas fa-edit" style="font-size:1.8em;" data-original-title="Click here to copy"></i> <span style="margin:10px"></span> <i data-toggle="tooltip" data-placement="top" title="" style="font-size:1.8em;" class="waves-effect mdb-icon-copy fas fa-backspace" data-original-title="Click here to copy"></i>'
                    },
                    {
                    name: 'Tisjdkmsj',
                    email: 'System Architect',
                    role: 'Edinburgh',
                    action: '<i data-toggle="tooltip" data-placement="top" title="" class="waves-effect mdb-icon-copy fas fa-edit" style="font-size:1.8em;" data-original-title="Click here to copy"></i> <span style="margin:10px"></span> <i data-toggle="tooltip" data-placement="top" title="" style="font-size:1.8em;" class="waves-effect mdb-icon-copy fas fa-backspace" data-original-title="Click here to copy"></i>'
                    },
                    {
                    name: 'Tisjdkmsj',
                    email: 'System Architect',
                    role: 'Edinburgh',
                    action: '<i data-toggle="tooltip" data-placement="top" title="" class="waves-effect mdb-icon-copy fas fa-edit" style="font-size:1.8em;" data-original-title="Click here to copy"></i> <span style="margin:10px"></span> <i data-toggle="tooltip" data-placement="top" title="" style="font-size:1.8em;" class="waves-effect mdb-icon-copy fas fa-backspace" data-original-title="Click here to copy"></i>'
                    },
                    {
                    name: 'Tisjdkmsj',
                    email: 'System Architect',
                    role: 'Edinburgh',
                    action: '<i data-toggle="tooltip" data-placement="top" title="" class="waves-effect mdb-icon-copy fas fa-edit" style="font-size:1.8em;" data-original-title="Click here to copy"></i> <span style="margin:10px"></span> <i data-toggle="tooltip" data-placement="top" title="" style="font-size:1.8em;" class="waves-effect mdb-icon-copy fas fa-backspace" data-original-title="Click here to copy"></i>'
                    },
                    {
                    name: 'Tisjdkmsj',
                    email: 'System Architect',
                    role: 'Edinburgh',
                    action: '<i data-toggle="tooltip" data-placement="top" title="" class="waves-effect mdb-icon-copy fas fa-edit" style="font-size:1.8em;" data-original-title="Click here to copy"></i> <span style="margin:10px"></span> <i data-toggle="tooltip" data-placement="top" title="" style="font-size:1.8em;" class="waves-effect mdb-icon-copy fas fa-backspace" data-original-title="Click here to copy"></i>'
                    },
                    {
                    name: 'Tisjdkmsj',
                    email: 'System Architect',
                    role: 'Edinburgh',
                    action: '<i data-toggle="tooltip" data-placement="top" title="" class="waves-effect mdb-icon-copy fas fa-edit" style="font-size:1.8em;" data-original-title="Click here to copy"></i> <span style="margin:10px"></span> <i data-toggle="tooltip" data-placement="top" title="" style="font-size:1.8em;" class="waves-effect mdb-icon-copy fas fa-backspace" data-original-title="Click here to copy"></i>'
                    },
                    {
                    name: 'Tisjdkmsj',
                    email: 'System Architect',
                    role: 'Edinburgh',
                    action: '<i data-toggle="tooltip" data-placement="top" title="" class="waves-effect mdb-icon-copy fas fa-edit" style="font-size:1.8em;" data-original-title="Click here to copy"></i> <span style="margin:10px"></span> <i data-toggle="tooltip" data-placement="top" title="" style="font-size:1.8em;" class="waves-effect mdb-icon-copy fas fa-backspace" data-original-title="Click here to copy"></i>'
                    },
                    {
                    name: 'Tisjdkmsj',
                    email: 'System Architect',
                    role: 'Edinburgh',
                    action: '<i data-toggle="tooltip" data-placement="top" title="" class="waves-effect mdb-icon-copy fas fa-edit" style="font-size:1.8em;" data-original-title="Click here to copy"></i> <span style="margin:10px"></span> <i data-toggle="tooltip" data-placement="top" title="" style="font-size:1.8em;" class="waves-effect mdb-icon-copy fas fa-backspace" data-original-title="Click here to copy"></i>'
                    },
                    {
                    name: 'Tisjdkmsj',
                    email: 'System Architect',
                    role: 'Edinburgh',
                    action: '<i data-toggle="tooltip" data-placement="top" title="" class="waves-effect mdb-icon-copy fas fa-edit" style="font-size:1.8em;" data-original-title="Click here to copy"></i> <span style="margin:10px"></span> <i data-toggle="tooltip" data-placement="top" title="" style="font-size:1.8em;" class="waves-effect mdb-icon-copy fas fa-backspace" data-original-title="Click here to copy"></i>'
                    },
                    {
                    name: 'Tisjdkmsj',
                    email: 'System Architect',
                    role: 'Edinburgh',
                    action: '<i data-toggle="tooltip" data-placement="top" title="" class="waves-effect mdb-icon-copy fas fa-edit" style="font-size:1.8em;" data-original-title="Click here to copy"></i> <span style="margin:10px"></span> <i data-toggle="tooltip" data-placement="top" title="" style="font-size:1.8em;" class="waves-effect mdb-icon-copy fas fa-backspace" data-original-title="Click here to copy"></i>'
                    },
                    {
                    name: 'Tisjdkmsj',
                    email: 'System Architect',
                    role: 'Edinburgh',
                    action: '<i data-toggle="tooltip" data-placement="top" title="" class="waves-effect mdb-icon-copy fas fa-edit" style="font-size:1.8em;" data-original-title="Click here to copy"></i> <span style="margin:10px"></span> <i data-toggle="tooltip" data-placement="top" title="" style="font-size:1.8em;" class="waves-effect mdb-icon-copy fas fa-backspace" data-original-title="Click here to copy"></i>'
                    },
                    {
                    name: 'Tisjdkmsj',
                    email: 'System Architect',
                    role: 'Edinburgh',
                    action: '<i data-toggle="tooltip" data-placement="top" title="" class="waves-effect mdb-icon-copy fas fa-edit" style="font-size:1.8em;" data-original-title="Click here to copy"></i> <span style="margin:10px"></span> <i data-toggle="tooltip" data-placement="top" title="" style="font-size:1.8em;" class="waves-effect mdb-icon-copy fas fa-backspace" data-original-title="Click here to copy"></i>'
                    },
                    {
                    name: 'Tisjdkmsj',
                    email: 'System Architect',
                    role: 'Edinburgh',
                    action: '<i data-toggle="tooltip" data-placement="top" title="" class="waves-effect mdb-icon-copy fas fa-edit" style="font-size:1.8em;" data-original-title="Click here to copy"></i> <span style="margin:10px"></span> <i data-toggle="tooltip" data-placement="top" title="" style="font-size:1.8em;" class="waves-effect mdb-icon-copy fas fa-backspace" data-original-title="Click here to copy"></i>'
                    },
                    {
                    name: 'Musah',
                    email: 'Programmer',
                    role: 'Kansho',
                    action: '<i data-toggle="tooltip" data-placement="top" title="" class="waves-effect mdb-icon-copy fas fa-edit" style="font-size:1.8em;" data-original-title="Click here to copy"></i> <span style="margin:10px"></span> <i data-toggle="tooltip" data-placement="top" title="" style="font-size:1.8em;" class="waves-effect mdb-icon-copy fas fa-backspace" data-original-title="Click here to copy"></i>'
                    },
                ],
            }
        }
    },
    methods : {

    },
    computed: {
    }
}
</script>

<style scoped>
table {
    color: white !important;
}
.hello {
    color: white;
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
