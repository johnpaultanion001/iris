<template>
    <PageLayout :pageName="title">
        <div class="grid grid-cols-12 gap-3 mb-6 pt-4">
            <div class="col-span-12 col-start-1 md:col-span-10 col md:col-start-2">
                <h1>User Name {{ id }} </h1>
            </div>

            <div class="col-span-12 col-start-1 md:col-span-10 col md:col-start-2">
                <ContentCard cardTitle="">
                    <div class="block md:flex justify-start p-3.5">
                        <div class="mx-0 mb-4 md:my-0 md:mr-4">
                            <div class="w-36 h-36">
                                <img src="/img/icon/search.png" class="rounded-2xl w-full h-full object-cover">
                            </div>
                        </div>
                        <div class="mx-0 mt-4 md:my-0 md:ml-4">
                            <table class="table-fixed w-full">
                                <tbody>
                                    <tr class="border-b border-light relative">
                                        <td class="py-3 text-blue-grey text-base font-exo-400 w-1/2 sm:w-1/2 xl:w-1/4 whitespace-nowrap">Name</td>
                                        <td class="py-3 text-black text-xl font-exo-400">Value</td>
                                    </tr>
                                    <tr class="border-b border-light relative">
                                        <td class="py-3 text-blue-grey text-base font-exo-400 w-1/2 sm:w-1/2 xl:w-1/4 whitespace-nowrap">Username</td>
                                        <td class="py-3 text-black text-base font-exo-400">Value</td>
                                    </tr>
                                    <tr class="border-b border-light relative">
                                        <td class="py-3 text-blue-grey text-base font-exo-400 w-1/2 sm:w-1/2 xl:w-1/4 whitespace-nowrap">Account Status</td>
                                        <td class="py-3 text-black text-base font-exo-400">Value</td>
                                    </tr>
                                    <tr class="border-b border-light relative">
                                        <td class="py-3 text-blue-grey text-base font-exo-400 w-1/2 sm:w-1/2 xl:w-1/4 whitespace-nowrap">User Type</td>
                                        <td class="py-3 text-black text-base font-exo-400">Value</td>
                                    </tr>
                                    <tr class="border-b border-light relative">
                                        <td class="py-3 text-blue-grey text-base font-exo-400 w-1/2 sm:w-1/2 xl:w-1/4 whitespace-nowrap">Email Address</td>
                                        <td class="py-3 text-black text-base font-exo-400">Value</td>
                                    </tr>
                                    <tr class="border-b border-light relative">
                                        <td class="py-3 text-blue-grey text-base font-exo-400 w-1/2 sm:w-1/2 xl:w-1/4 whitespace-nowrap">Mobile Number</td>
                                        <td class="py-3 text-black text-base font-exo-400">Value</td>
                                    </tr>
                                    <tr class="border-b border-light relative">
                                        <td class="py-3 text-blue-grey text-base font-exo-400 w-1/2 sm:w-1/2 xl:w-1/4 whitespace-nowrap">Agency</td>
                                        <td class="py-3 text-black text-base font-exo-400">Value</td>
                                    </tr>
                                    <tr class="border-b border-light relative">
                                        <td class="py-3 text-blue-grey text-base font-exo-400 w-1/2 sm:w-1/2 xl:w-1/4 whitespace-nowrap">Date Updated</td>
                                        <td class="py-3 text-black text-base font-exo-400">Value</td>
                                    </tr>
                                    <tr class="border-b border-light relative">
                                        <td class="py-3 text-blue-grey text-base font-exo-400 w-1/2 sm:w-1/2 xl:w-1/4 whitespace-nowrap">Date Created</td>
                                        <td class="py-3 text-black text-base font-exo-400">Value</td>
                                    </tr>
                                    <tr class="border-b border-light relative">
                                        <td class="py-3 text-blue-grey text-base font-exo-400 w-1/2 sm:w-1/2 xl:w-1/4 whitespace-nowrap">Created By</td>
                                        <td class="py-3 text-black text-base font-exo-400">Value</td>
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
                                <router-link to="/create-user/1" class="border border-blue mt-1 lg:mt-0 min-w-160 w-full lg:w-fit bg-white text-sm font-opensans-600 mr-4 py-2.5 px-5 text-blue rounded-lg flex items-center justify-center">
                                    Edit User
                                </router-link>
                            </div>
                            <div class="">
                                <button @click="openModal('deactivate')" class="border border-red mt-1 lg:mt-0 min-w-160 w-full lg:w-fit bg-white text-sm font-opensans-600 mr-4 py-2.5 px-5 text-red rounded-lg flex items-center justify-center">
                                    Deactivate
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
            <h5 class="font-exo-600 text-xl text-dark2 mb-4">Resend Account Invite to NAME</h5>
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
            <h5 class="font-exo-600 text-xl text-dark2 mb-4">Deactivate NAME</h5>
            <p class="font-inter-400 text-lg text-dark2 mb-11">Once you deactivate this account, the user can no longer access the system. Do you wish to continue?</p> 
        </template>
        <template v-slot:footer>
            <div class="flex items-center justify-end w-full">
                <button @click="closeModal()" class="border border-blue mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-white text-sm font-opensans-600 mr-4 py-2.5 px-5 text-blue rounded-lg flex items-center justify-center">
                    Cancel
                </button>
                <button class="mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-red text-sm font-opensans-600 py-2.5 px-5 shadow-main text-white rounded-lg flex items-center justify-center">
                    Yes, Deactive
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
import 'vue-select/dist/vue-select.css';
import AlertTop from '../../utilities/alertTop.vue'

export default {
    setup: () => ({
        title: 'User Profile'
    }),
    data () {
        return{
            //Modal
            showModal: '',
            modalActive: false,
            modalTicketID: '',
            successAlert: false,
            successMessage: '',
            successIcon: null,
        };
    },
    components: { PageLayout, ContentCard, Modal },
    methods: {
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
    },
}
</script>