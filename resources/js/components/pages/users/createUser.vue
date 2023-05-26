<template>
    <AlertTop :alertIcon="'/img/icon/'+successIcon" :active="successAlert" :content="successMessage" v-if="successAlert" @close="closeAlert" />
    <PageLayout :pageName="title">
        <div class="grid grid-cols-12 gap-3 mb-6 pt-4">
            <div class="col-span-12 col-start-1 md:col-span-10 col md:col-start-2">
                <h1>{{ title }}</h1>
            </div>
            <div class="col-span-12 col-start-1 md:col-span-10 col md:col-start-2">
                <ContentCard cardTitle="User Info">
                    <div class="block p-2">
                        <div class="grid grid-cols-2 gap-y-5 gap-x-3">
                            <div class="col-span-1">
                                <div class="relative w-full">
                                    <label for="firstname" class="text-base text-blue-grey text-xs font-inter-700">First Name</label>
                                    <input type="text" v-model="firstname" placeholder="" name="firstname" id="firstname" class="mt-2 w-full secondary-input"/>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div class="relative w-full">
                                    <label for="lastname" class="text-base text-blue-grey text-xs font-inter-700">Last Name</label>
                                    <input type="text" v-model="lastname" placeholder="" name="lastname" id="lastname" class="mt-2 w-full secondary-input"/>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div class="relative w-full">
                                    <label for="useremail" class="text-base text-blue-grey text-xs font-inter-700">Email Address</label>
                                    <input type="email" v-model="useremail" placeholder="Write comment" name="useremail" id="useremail" class="mt-2 w-full secondary-input">
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div class="relative w-full">
                                    <label for="usermobile" class="text-base text-blue-grey text-xs font-inter-700">Mobile Number</label>
                                    <input type="number" v-model="usermobile" name="usermobile" id="usermobile" class="mt-2 w-full secondary-input">
                                </div>
                            </div>
                            <div class="col-span-2">
                                <div class="relative w-full">
                                    <div class="mt-2 w-full secondary-input" style="padding: 4px 0 0 0">
                                        <v-select :filter="fuseSearch" :options="roles" :get-option-label="(option) => option.name" placeholder="Choose" v-model="userrole" :reduce="roles => roles.value" >
                                            <template #option="{ name }" >
                                                {{ name }} 
                                            </template>
                                        </v-select>
                                    </div>
                                </div>
                            </div>
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
                                        <input type="radio" v-model="useragency" :value="''+agency.id+''" name="filterAgencyValue">
                                        <img :src="'/img/' + agency.logo" class="w-15 h-15 mx-4 rounded-full">
                                        <p class="font-inter-400 text-black font-base">{{ agency.agency }}</p>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </ContentCard>
            </div>
            <div class="col-span-12 col-start-1 md:col-span-10 col md:col-start-2 mt-5 flex items-center justify-end">
                <button @click="createUser()" class="mt-1 md:mt-0 w-full md:w-40 bg-blue text-sm font-opensans-600 mx-0 py-2.5 px-5 shadow-main text-white rounded-lg">
                    Create User
                </button>
            </div>
        </div>
    </PageLayout>
</template>

<script>

import PageLayout from '../../pageLayout.vue'
import ContentCard from '../../utilities/contentCard.vue'
import Modal from '../../utilities/modal.vue'
import axios from 'axios'
import vSelect from 'vue-select'
import 'vue-select/dist/vue-select.css';
import Fuse from 'fuse.js'
import AlertTop from '../../utilities/alertTop.vue'

export default {
    setup: () => ({
        title: 'Create User'
    }),
    data () {
        return{
            //Agencies
            agencies: [],
            filterSearchAgency: '',
            //Roles
            filteredRoles: [],
            roleDD: false,
            roles: [{name: 'Super Admin', value: 'SUPER_ADMIN'}, {name: 'Admin', value: 'ADMIN'}, {name: 'Moderator', value: 'MODERATOR'}], 
            //Modal
            showModal: '',
            modalActive: false,
            modalTicketID: '',
            successAlert: false,
            successMessage: '',
            successIcon: null,
            //User info
            firtname: null,
            lastname: null,
            useremail: null,
            usermobile: null,
            useragency: null,
            userrole: null
        };
    },
    watch: {
        filterSearchAgency: function() {
            this.getAgencies();
        }
    },
    components: { PageLayout, ContentCard, vSelect, Modal, AlertTop },
    async mounted(){
        this.getAgencies()
    },
    methods: {
        //Create User
        async createUser(){
            const inputs =  {
                name: this.firstname,
                last_name: this.lastname,
                email: this.useremail,
                mobile_number: ''+this.usermobile+'',
                role: this.userrole.toUpperCase(),
                agency_id: this.useragency,
                profile: '/img/profile.jpg',
                password: 'password',
                password_confirmation: 'password',
            };

            await axios.post('api/v1/register', inputs, {
                header: {
                    'Accept': 'application/json', 
                    'Content-Type': 'application/json', 
                },
            })
            .then((res) => {
                this.successAlert = true;
                this.successMessage = 'New user created';
                this.successIcon = 'like.png';
            })
            .catch((error) => {
                console.log(inputs)
            })
        },
        //Get Agencies
        async getAgencies(){
            this.pageNumber = 0;
            const response = await axios.get('api/v1/agencies');
            //Filter Agencies Ticket
            this.agencies = response.data.data.filter((a) => (a.agency.includes(this.filterSearchAgency) ||  a.agency.toLowerCase().includes(this.filterSearchAgency)));
        },
        //Roles Search
        fuseSearch(options, search) {
        const fuse = new Fuse(options, {
            keys: ['0'],
            shouldSort: true,
        })
        return search.length
            ? fuse.search(search).map(({ item }) => item)
            : fuse.list
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
        //Alert
        async closeAlert() {
            this.successAlert = false
        },
    },
}
</script>