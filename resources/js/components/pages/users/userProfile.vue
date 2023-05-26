<template>
    <AlertTop :alertIcon="'/img/icon/'+successIcon" :active="successAlert" :content="successMessage" v-if="successAlert" @close="closeAlert" />
    <PageLayout :pageName="title">
        <div class="grid grid-cols-12 gap-3 mb-6 pt-4">
            <div class="col-span-12 col-start-1 md:col-span-10 col md:col-start-2">
                <h1>{{ user.name }}</h1>
            </div>

            <div class="col-span-12 col-start-1 md:col-span-10 col md:col-start-2">
                <ContentCard cardTitle="">
                    <div class="block md:flex justify-start p-3.5">
                        <div class="mx-0 mb-4 md:my-0 md:mr-4">
                            <div class="w-36 h-36">
                                <img :src="user.profile" class="rounded-2xl w-full h-full object-cover">
                            </div>
                        </div>
                        <div class="mx-0 mt-4 md:my-0 md:ml-4">
                            <table class="table-fixed w-full">
                                <tbody>
                                    <tr class="border-b border-light relative">
                                        <td class="py-3 text-blue-grey text-base font-exo-400 w-1/2 sm:w-1/2 xl:w-1/4 whitespace-nowrap">Name</td>
                                        <td class="py-3 text-black text-xl font-exo-600">{{ user.name }} {{ user.last_name }}</td>
                                    </tr>
                                    <tr class="border-b border-light relative">
                                        <td class="py-3 text-blue-grey text-base font-exo-400 w-1/2 sm:w-1/2 xl:w-1/4 whitespace-nowrap">Username</td>
                                        <td class="py-3 text-black text-base font-exo-400">{{ user.email }}</td>
                                    </tr>
                                    <tr class="border-b border-light relative">
                                        <td class="py-3 text-blue-grey text-base font-exo-400 w-1/2 sm:w-1/2 xl:w-1/4 whitespace-nowrap">Account Status</td>
                                        <td class="py-3 text-white text-xxs font-exo-400">
                                            <div class="whitespace-nowrap">
                                                <span v-if="user.status == 'ACTIVE'" class="px-2 py-1 rounded-full mr-1 inline-block text-center w-auto min-w-52" style="background-color:#54DAA1;">{{ user.status }}</span>
                                                <span v-if="user.status == 'INACTIVE'" class="px-2 py-1 rounded-full mr-1 inline-block text-center w-auto min-w-52" style="background-color: #F2994A;">{{ user.status }}</span>
                                                <span v-if="user.status == 'DEACTIVATED'" class="px-2 py-1 rounded-full mr-1 inline-block text-center w-auto min-w-52" style="background-color: #FA3A0E;">{{ user.status }}</span>
                                                <span v-if="user.status == 'NONE'" class="px-2 py-1 rounded-full mr-1 inline-block text-center w-auto min-w-52" style="background-color: #CED4DA;">{{ user.status }}</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="border-b border-light relative">
                                        <td class="py-3 text-blue-grey text-base font-exo-400 w-1/2 sm:w-1/2 xl:w-1/4 whitespace-nowrap">User Type</td>
                                        <td class="py-3 text-black text-base font-exo-400">{{ user.role }}</td>
                                    </tr>
                                    <tr class="border-b border-light relative">
                                        <td class="py-3 text-blue-grey text-base font-exo-400 w-1/2 sm:w-1/2 xl:w-1/4 whitespace-nowrap">Email Address</td>
                                        <td class="py-3 text-black text-base font-exo-400">{{ user.email }}</td>
                                    </tr>
                                    <tr class="border-b border-light relative">
                                        <td class="py-3 text-blue-grey text-base font-exo-400 w-1/2 sm:w-1/2 xl:w-1/4 whitespace-nowrap">Mobile Number</td>
                                        <td class="py-3 text-black text-base font-exo-400">{{ user.mobile_number }}</td>
                                    </tr>
                                    <tr class="border-b border-light relative">
                                        <td class="py-3 text-blue-grey text-base font-exo-400 w-1/2 sm:w-1/2 xl:w-1/4 whitespace-nowrap">Agency</td>
                                        <td class="py-3 text-black text-base font-exo-400 flex items-center justify-start">
                                            <div v-for="(item, index) in user.assigned_agencies">
                                                <img v-if="index == 'logo'" :src="'/img/'+item" class="rounded-full" style="max-height: 42px">
                                                <span v-if="index == 'code'" class="px-3">{{ item }}</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="border-b border-light relative">
                                        <td class="py-3 text-blue-grey text-base font-exo-400 w-1/2 sm:w-1/2 xl:w-1/4 whitespace-nowrap">Date Updated</td>
                                        <td class="py-3 text-black text-base font-exo-400">{{ format_date(user.created_at) }}</td>
                                    </tr>
                                    <tr class="border-b border-light relative">
                                        <td class="py-3 text-blue-grey text-base font-exo-400 w-1/2 sm:w-1/2 xl:w-1/4 whitespace-nowrap">Date Created</td>
                                        <td class="py-3 text-black text-base font-exo-400">{{ format_date(user.updated_at) }}</td>
                                    </tr>
                                    <tr class="border-b border-light relative">
                                        <td class="py-3 text-blue-grey text-base font-exo-400 w-1/2 sm:w-1/2 xl:w-1/4 whitespace-nowrap">Created By</td>
                                        <td class="py-3 text-black text-base font-exo-400">NA</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </ContentCard>
            </div>

            <div class="col-span-12 col-start-1 md:col-span-10 col md:col-start-2">
                <ContentCard cardTitle="Account Actions">
                    <div class="block p-2" style="max-height: 390px;">
                        <div class="block lg:flex items-center justify-start">
                            <div class="">
                                <button @click="openModal('resendInvite')" class="border border-blue mt-1 lg:mt-0 min-w-160 w-full lg:w-fit bg-white text-sm font-opensans-600 mr-4 py-2.5 px-5 text-blue rounded-lg flex items-center justify-center">
                                    Resend Invite
                                </button>
                            </div>
                            <div class="">
                                <router-link :to="'/edit-user/'+id" class="border border-blue mt-1 lg:mt-0 min-w-160 w-full lg:w-fit bg-white text-sm font-opensans-600 mr-4 py-2.5 px-5 text-blue rounded-lg flex items-center justify-center">
                                    Edit User
                                </router-link>
                            </div>
                            <div class="">
                                <button v-if="user.status == 'ACTIVE'" @click="openModal('deactivate')" class="border border-red mt-1 lg:mt-0 min-w-160 w-full lg:w-fit bg-white text-sm font-opensans-600 mr-4 py-2.5 px-5 text-red rounded-lg flex items-center justify-center">
                                    Deactivate
                                </button>
                                <button v-if="user.status == 'INACTIVE'" @click="openModal('activate')" class="border border-green mt-1 lg:mt-0 min-w-160 w-full lg:w-fit bg-white text-sm font-opensans-600 mr-4 py-2.5 px-5 text-green rounded-lg flex items-center justify-center">
                                    Activate
                                </button>
                            </div>
                        </div>
                    </div>
                </ContentCard>
            </div>
        </div>
    </PageLayout>
    
    <Modal v-show="modalActive && showModal == 'resendInvite'" @close="closeModal">
        <template v-slot:body>
            <img src="/img/icon/invite-modal.png" class="mb-6">
            <h5 class="font-exo-600 text-xl text-dark2 mb-4">Resend Account Invite to {{ user.name }}</h5>
            <p class="font-inter-400 text-lg text-dark2 mb-11">Are you sure you want to send an account invite?</p> 
        </template>
        <template v-slot:footer>
            <div class="flex items-center justify-end w-full">
                <button @click="closeModal()" class="border border-blue mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-white text-sm font-opensans-600 mr-4 py-2.5 px-5 text-blue rounded-lg flex items-center justify-center">
                    Cancel
                </button>
                <button class="mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-blue text-sm font-opensans-600 py-2.5 px-5 shadow-main text-white rounded-lg flex items-center justify-center">
                    Resend
                </button>
            </div>
        </template>
    </Modal>
    
    <Modal v-show="modalActive && showModal == 'deactivate'" @close="closeModal">
        <template v-slot:body>
            <img src="/img/icon/invite-modal.png" class="mb-6">
            <h5 class="font-exo-600 text-xl text-dark2 mb-4">Deactivate {{ user.name }}</h5>
            <p class="font-inter-400 text-lg text-dark2 mb-11">Once you deactivate this account, the user can no longer access the system. Do you wish to continue?</p> 
        </template>
        <template v-slot:footer>
            <div class="flex items-center justify-end w-full">
                <button @click="closeModal()" class="border border-blue mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-white text-sm font-opensans-600 mr-4 py-2.5 px-5 text-blue rounded-lg flex items-center justify-center">
                    Cancel
                </button>
                <button @click="deactivate()" class="mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-red text-sm font-opensans-600 py-2.5 px-5 shadow-main text-white rounded-lg flex items-center justify-center">
                    Yes, Deactive
                </button>
            </div>
        </template>
    </Modal>
    
    <Modal v-show="modalActive && showModal == 'activate'" @close="closeModal">
        <template v-slot:body>
            <img src="/img/icon/invite-modal.png" class="mb-6">
            <h5 class="font-exo-600 text-xl text-dark2 mb-4">Activate {{ user.name }}</h5>
            <p class="font-inter-400 text-lg text-dark2 mb-11">Once you activate this account, the user can access the system. Do you wish to continue?</p> 
        </template>
        <template v-slot:footer>
            <div class="flex items-center justify-end w-full">
                <button @click="closeModal()" class="border border-blue mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-white text-sm font-opensans-600 mr-4 py-2.5 px-5 text-blue rounded-lg flex items-center justify-center">
                    Cancel
                </button>
                <button @click="activate()" class="mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-green text-sm font-opensans-600 py-2.5 px-5 shadow-main text-white rounded-lg flex items-center justify-center">
                    Yes, Active
                </button>
            </div>
        </template>
    </Modal>
</template>

<script>

import PageLayout from '../../pageLayout.vue'
import ContentCard from '../../utilities/contentCard.vue'
import Modal from '../../utilities/modal.vue'
import axios from 'axios'
import moment from 'moment'
import 'vue-select/dist/vue-select.css';
import AlertTop from '../../utilities/alertTop.vue'

export default {
    setup: () => ({
        title: 'User Profile'
    }),
    data () {
        return{
            id: this.$route.params.id,
            //Modal
            showModal: '',
            modalActive: false,
            modalTicketID: '',
            successAlert: false,
            successMessage: '',
            successIcon: null,
            //User Info
            user: [],
        };
    },
    components: { PageLayout, ContentCard, Modal, AlertTop },
    async mounted() {
        this.getUser();
    },
    methods: {
        //Get User
        async getUser(){
            const response = await axios.get('api/v1/user/'+this.id);
            //Filter User Data
            this.user = response.data.data;
        },
        //Alert
        async closeAlert() {
            this.successAlert = false
        },
        //Modals
        openModal(itemID){
            document.querySelector('body').style.overflow = 'hidden';
            this.showModal = itemID;
            this.modalActive = true;
        },
        closeModal() {
            if(this.modalActive == true){
                document.querySelector('body').style.overflow = 'auto';
                this.modalActive = false;
            }
        },
        //Format Display Settings
        format_date(value){
            if (value) {
                return moment(String(value)).format('LL')
            }
        },
        //Deactivate
        async deactivate() {
            await axios.post('api/v1/user/account_status', {
                user_id: this.id,
                status: 'INACTIVE',
            })
            .then((success) => {
                //Alert Content
                this.successAlert = true;
                this.successMessage = 'User successfully deactivated';
                this.successIcon = 'like.png';
                this.getUser();
                this.closeModal();
            })
            .catch((error) => {
                this.successAlert = true;
                this.successMessage = 'Error occured. Please try again';
                this.successIcon = 'warning-red.png';
            })
        },
        async activate() {
            await axios.post('api/v1/user/account_status', {
                user_id: this.id,
                status: 'ACTIVE',
            })
            .then((success) => {
                //Alert Content
                this.successAlert = true;
                this.successMessage = 'User successfully activated';
                this.successIcon = 'like.png';
                this.getUser();
                this.closeModal();
            })
            .catch((error) => {
                this.successAlert = true;
                this.successMessage = 'Error occured. Please try again';
                this.successIcon = 'warning-red.png';
            })
        },
    },
}
</script>