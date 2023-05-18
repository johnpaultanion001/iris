<template>
    <PageLayout :pageName="title">
        <div class="grid grid-cols-12 gap-3 mb-6 pt-4">
            <div class="col-span-12 col-start-1 md:col-span-10 col md:col-start-2">
                <h1>User Name {{ id }} </h1>
            </div>

            <div class="col-span-12 col-start-1 md:col-span-10 col md:col-start-2">
                <ContentCard cardTitle="">
                    <div class="flex justify-start">
                        <div class="mr-4">
                            <div class="rounded-2xl w-36 h-36">
                                <img src="/img/icon/search.png" class="w-full h-full object-cover">
                            </div>
                        </div>
                        <div class="ml-4">
                            <table class="table-fixed w-full">
                                <tbody>
                                    <tr class="border-b border-light relative">
                                        <td class="py-3 text-blue-grey text-base font-exo-400 w-1/2 sm:w-1/3 lg:w-1/4">Name</td>
                                        <td class="py-3 text-black text-xl font-exo-400">Value</td>
                                    </tr>
                                    <tr class="border-b border-light relative">
                                        <td class="py-3 text-blue-grey text-base font-exo-400 w-1/2 sm:w-1/3 lg:w-1/4">Username</td>
                                        <td class="py-3 text-black text-base font-exo-400">Value</td>
                                    </tr>
                                    <tr class="border-b border-light relative">
                                        <td class="py-3 text-blue-grey text-base font-exo-400 w-1/2 sm:w-1/3 lg:w-1/4">Account Status</td>
                                        <td class="py-3 text-black text-base font-exo-400">Value</td>
                                    </tr>
                                    <tr class="border-b border-light relative">
                                        <td class="py-3 text-blue-grey text-base font-exo-400 w-1/2 sm:w-1/3 lg:w-1/4">User Type</td>
                                        <td class="py-3 text-black text-base font-exo-400">Value</td>
                                    </tr>
                                    <tr class="border-b border-light relative">
                                        <td class="py-3 text-blue-grey text-base font-exo-400 w-1/2 sm:w-1/3 lg:w-1/4">Email Address</td>
                                        <td class="py-3 text-black text-base font-exo-400">Value</td>
                                    </tr>
                                    <tr class="border-b border-light relative">
                                        <td class="py-3 text-blue-grey text-base font-exo-400 w-1/2 sm:w-1/3 lg:w-1/4">Mobile Number</td>
                                        <td class="py-3 text-black text-base font-exo-400">Value</td>
                                    </tr>
                                    <tr class="border-b border-light relative">
                                        <td class="py-3 text-blue-grey text-base font-exo-400 w-1/2 sm:w-1/3 lg:w-1/4">Agency</td>
                                        <td class="py-3 text-black text-base font-exo-400">Value</td>
                                    </tr>
                                    <tr class="border-b border-light relative">
                                        <td class="py-3 text-blue-grey text-base font-exo-400 w-1/2 sm:w-1/3 lg:w-1/4">Date Updated</td>
                                        <td class="py-3 text-black text-base font-exo-400">Value</td>
                                    </tr>
                                    <tr class="border-b border-light relative">
                                        <td class="py-3 text-blue-grey text-base font-exo-400 w-1/2 sm:w-1/3 lg:w-1/4">Date Created</td>
                                        <td class="py-3 text-black text-base font-exo-400">Value</td>
                                    </tr>
                                    <tr class="border-b border-light relative">
                                        <td class="py-3 text-blue-grey text-base font-exo-400 w-1/2 sm:w-1/3 lg:w-1/4">Created By</td>
                                        <td class="py-3 text-black text-base font-exo-400">Value</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </ContentCard>
            </div>

            <div class="col-span-12 col-start-1 md:col-span-10 col md:col-start-2">
                <ContentCard cardTitle="Assigned Agencies">
                    <div class="block p-2 scroll-style overflow-auto" style="max-height: 390px;">
                        <div class="grid grid-cols-2 gap-y-5 gap-x-3">
                            <div class="col-span-2">
                                <div class="relative w-full">
                                    <input type="text" v-model="filterSearchAgency" placeholder="Search" name="selectagencies" id="selectagencies" class="mt-4 w-full secondary-input" style="padding-left: 35px;"/>
                                    <img src="/img/icon/search.png" class="search-img" style="top: 31px">
                                </div>
                                <div v-for="(agency, index) in agencies" ref="agencies" class="my-4">
                                    <label class="flex items-center">
                                        <input type="radio" v-model="filterAgencyValue" :value="agency.id" name="filterAgencyValue">
                                        <img :src="'/img/' + agency.logo" class="w-15 h-15 mx-4 rounded-full">
                                        <p class="font-inter-400 text-black font-base">{{ agency.agency }}</p>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </ContentCard>
            </div>
        </div>
    </PageLayout>
</template>

<script>

import PageLayout from '../../pageLayout.vue'
import ContentCard from '../../utilities/contentCard.vue'
import Modal from '../../utilities/modal.vue'
import axios from 'axios'
import 'vue-select/dist/vue-select.css';

export default {
    setup: () => ({
        title: 'User Profile'
    }),
    data () {
        return{
            //Modal
            showModal: '',
            modalActive: false,
        };
    },
    components: { PageLayout, ContentCard, Modal },
    methods: {
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