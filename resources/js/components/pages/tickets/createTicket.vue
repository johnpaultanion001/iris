<template>
    <PageLayout :pageName="title">
        <div class="grid grid-cols-12 gap-3 mb-6 pt-4">
            <div class="col-span-12 col-start-1 md:col-span-10 col md:col-start-2">
                <ContentCard cardTitle="Ticket Information">
                    <div class="block p-2">
                        <div class="grid grid-cols-2 gap-y-5 gap-x-3">
                            <div class="col-span-2">
                                <div class="relative w-full">
                                    <label for="productservice" class="text-base text-blue-grey text-xs font-inter-700">Product/Service</label>
                                    <div class="mt-2 w-full secondary-input" style="padding: 4px 0 0 0">
                                        <v-select :filter="fuseSearch" :options="products" :get-option-label="option => option.product_service" placeholder="Product/Service" v-model="product_service" :reduce="products => products.product_service">
                                            <template #option="{ product_service }" >
                                                {{ product_service }} 
                                            </template>
                                        </v-select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-2">
                                <div class="relative w-full">
                                    <label for="complaint" class="text-base text-blue-grey text-xs font-inter-700">Write Complaint</label>
                                    <textarea type="text" v-model="complaint" placeholder="Write comment" name="complaint" id="complaint" class="mt-2 w-full secondary-textarea"></textarea>
                                </div>
                            </div>
                            <div class="col-span-2">
                                <label for="platform" class="text-base text-blue-grey text-xs font-inter-700">Platform</label>
                                <div class="grid grid-rows-3 grid-flow-col">
                                    <div class="flex items-center justify-start my-1">
                                        <label for="facebook" class="text-base cursor-pointer text-blue-grey text-xs font-inter-700">
                                            <input type="radio" v-model="platform" value="Facebook" id="facebook" class="mr-2.5"/> Facebook
                                        </label>
                                    </div>
                                    <div class="flex items-center justify-start my-1">
                                        <label for="shopee" class="text-base cursor-pointer text-blue-grey text-xs font-inter-700">
                                            <input type="radio" v-model="platform" value="Shopee" id="shopee" class="mr-2.5"/> Shopee
                                        </label>
                                    </div>
                                    <div class="flex items-center justify-start my-1">
                                        <label for="shopee" class="text-base cursor-pointer text-blue-grey text-xs font-inter-700">
                                            <input type="radio" v-model="platform" value="Shopee" id="shopee" class="mr-2.5"/> Shopee
                                        </label>
                                    </div>
                                    <div class="flex items-center justify-start my-1">
                                        <label for="lazada" class="text-base cursor-pointer text-blue-grey text-xs font-inter-700">
                                            <input type="radio" v-model="platform" value="Lazada" id="lazada" class="mr-2.5"/> Lazada
                                        </label>
                                    </div>
                                    <div class="flex items-center justify-start my-1">
                                        <label for="shopee" class="text-base cursor-pointer text-blue-grey text-xs font-inter-700">
                                            <input type="radio" v-model="platform" value="Shopee" id="shopee" class="mr-2.5"/> Shopee
                                        </label>
                                    </div>
                                    <div class="flex items-center justify-start my-1">
                                        <label for="facebook" class="text-base cursor-pointer text-blue-grey text-xs font-inter-700">
                                            <input type="radio" v-model="platform" value="Facebook" id="facebook" class="mr-2.5"/> Facebook
                                        </label>
                                    </div>
                                    <div class="flex items-center justify-start my-1">
                                        <label for="shopee" class="text-base cursor-pointer text-blue-grey text-xs font-inter-700">
                                            <input type="radio" v-model="platform" value="Shopee" id="shopee" class="mr-2.5"/> Shopee
                                        </label>
                                    </div>
                                    <div class="flex items-center justify-start my-1">
                                        <label for="shopee" class="text-base cursor-pointer text-blue-grey text-xs font-inter-700">
                                            <input type="radio" v-model="platform" value="Shopee" id="shopee" class="mr-2.5"/> Shopee
                                        </label>
                                    </div>
                                    <div class="flex items-center justify-start my-1">
                                        <label for="lazada" class="text-base cursor-pointer text-blue-grey text-xs font-inter-700">
                                            <input type="radio" v-model="platform" value="Lazada" id="lazada" class="mr-2.5"/> Lazada
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-2">
                                <div class="relative w-full">
                                    <label for="link" class="text-base text-blue-grey text-xs font-inter-700">Link</label>
                                    <input type="text" v-model="link" name="link" id="link" class="mt-2 w-full secondary-input">
                                </div>
                            </div>
                            <div class="col-span-2">
                                <div class="relative w-full">
                                    <label for="documents" class="text-base text-blue-grey text-xs font-inter-700">Upload Additional Documents</label>
                                    <div class="flex items-center mt-4 ">
                                        <label class="cursor-pointer w-fit bg-blue text-sm font-opensans-600 py-2.5 px-5 shadow-main text-white rounded-lg flex items-center justify-center">
                                            <img src="/img/icon/upload.png" class="mr-3.5"> Upload
                                            <input type="file" name="documents" @change="onFileChange($event)" id="documents" hidden>
                                        </label>
                                        <p class="text-blue-grey text-base ml-2 font-inter-400">{{ additional_documents_file }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </ContentCard>
            </div>
            <div class="col-span-12 col-start-1 md:col-span-10 col md:col-start-2">
                <ContentCard cardTitle="Vendor Information">
                    <div class="block p-2">
                        <div class="grid grid-cols-2 gap-y-5 gap-x-3">
                            <div class="col-span-2">
                                <div class="relative w-full">
                                    <label for="vendor_name" class="text-base text-blue-grey text-xs font-inter-700">Vendor Name</label>
                                    <input type="text" v-model="vendor_name" placeholder="" name="vendor_name" id="vendor_name" class="mt-2 w-full secondary-input"/>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div class="relative w-full">
                                    <label for="email_address" class="text-base text-blue-grey text-xs font-inter-700">Email Address</label>
                                    <input type="email" v-model="email_address" placeholder="Write comment" name="email_address" id="email_address" class="mt-2 w-full secondary-input">
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div class="relative w-full">
                                    <label for="mobile_number" class="text-base text-blue-grey text-xs font-inter-700">Mobile Number</label>
                                    <input type="text" v-model="mobile_number" name="mobile_number" id="mobile_number" class="mt-2 w-full secondary-input">
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div class="relative w-full">
                                    <div class="mt-2 w-full secondary-input" style="padding: 4px 0 0 0">
                                        <v-select :filter="fuseSearch" :options="cities" :get-option-label="(option) => option.name" placeholder="Choose" v-model="city"  :reduce="cities => cities.name">
                                            <template #option="{ name }">
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
                <ContentCard cardTitle="Reported By">
                    <div class="block p-2">
                        <div class="grid grid-cols-2 gap-y-5 gap-x-3">
                            <div class="col-span-1">
                                <div class="relative w-full">
                                    <label for="reported_first_name" class="text-base text-blue-grey text-xs font-inter-700">First Name</label>
                                    <input type="text" v-model="reported_first_name" placeholder="" name="reported_first_name" id="reported_first_name" class="mt-2 w-full secondary-input"/>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div class="relative w-full">
                                    <label for="reported_last_name" class="text-base text-blue-grey text-xs font-inter-700">Last Name</label>
                                    <input type="text" v-model="reported_last_name" placeholder="Write comment" name="reported_last_name" id="reported_last_name" class="mt-2 w-full secondary-input">
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div class="relative w-full">
                                    <label for="reported_email_address" class="text-base text-blue-grey text-xs font-inter-700">Email Address</label>
                                    <input type="email" v-model="reported_email_address" placeholder="Write comment" name="reported_email_address" id="reported_email_address" class="mt-2 w-full secondary-input">
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div class="relative w-full">
                                    <label for="reported_mobile_number" class="text-base text-blue-grey text-xs font-inter-700">Mobile Number</label>
                                    <input type="text" v-model="reported_mobile_number" name="reported_mobile_number" id="reported_mobile_number" class="mt-2 w-full secondary-input">
                                </div>
                            </div>
                        </div>
                    </div>
                </ContentCard>
            </div>
            <div class="col-span-12 col-start-1 md:col-span-10 col md:col-start-2">
                <ContentCard cardTitle="Violations">
                    <div class="block p-2">
                        <div class="grid grid-cols-2 gap-y-5 gap-x-3">
                            <div class="col-span-2">
                                <div class="scroll-style overflow-auto mb-4">
                                    <table class="table-auto w-full">
                                        <tbody>
                                            <tr class="border-b border-light relative" v-for="(violation, index) in selectedViolations">
                                                <td>
                                                    <div class="flex items-center flex-nowrap h-15">
                                                        <p class="font-inter-400 text-base text-blue-grey w-fit mr-4">{{ index + 1 }}</p>
                                                        <p class="font-inter-400 text-base text-black">{{ violation.violation }}</p>
                                                    </div>
                                                </td>
                                                <td class="cursor-pointer flex items-center ml-10 flex-nowrap h-15">
                                                    <img v-if="!violation.amount" @click.prevent="openModal('modalAddAmount'); modalTicketID = violation.id" src="/img/icon/edit-blue.png" class="mr-2">
                                                    <img v-if="violation.amount" @click.prevent="openModal('modalEditAmount'); modalTicketID = violation.id" src="/img/icon/edit-blue.png" class="mr-2">
                                                    <p v-if="violation.amount" class="font-inter-400 text-base text-black whitespace-nowrap">Php {{ violation.amount }}</p>
                                                    <p v-if="!violation.amount" @click.prevent="openModal('modalAddAmount'); modalTicketID = violation.id" class="font-opensans-600 text-base whitespace-nowrap" style="color:#5E72E4;">Add Amount</p>
                                                </td>
                                            </tr>
                                            <tr class="relative">
                                                <td>
                                                    <div class="flex items-center flex-nowrap h-15">
                                                        <p class="font-inter-700 text-base text-black">Total Fine</p>
                                                    </div>
                                                </td>
                                                <td class="cursor-pointer flex items-center ml-10 flex-nowrap h-15">
                                                    <p class="font-inter-700 text-base text-black">Php {{ total }}</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="flex items-center justify-start w-full">
                                    <button @click="openModal('modalViolation');" class="mt-1 md:mt-0 min-w-0 md:min-w-110 w-full md:w-fit bg-blue text-sm font-opensans-600 mr-2 py-2.5 px-5 shadow-main text-white rounded-full flex items-center justify-center">
                                        Add
                                    </button>
                                    <button @click="updateViolation()" class="border border-blue mt-1 md:mt-0 min-w-0 md:min-w-110 w-full md:w-fit bg-white text-sm font-opensans-600 py-2.5 px-5 text-blue rounded-full flex items-center justify-center">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </ContentCard>
            </div>
            <div class="col-span-12 col-start-1 md:col-span-10 col md:col-start-2">
                <ContentCard cardTitle="Assigned Agencies">
                    <div class="block p-2 py-4 ">
                        <div class="grid grid-cols-5 gap-y-5 gap-x-5">
                            <div v-for="agency in currentAgencies" class="col-span-1">
                                <div v-for="item in agency">
                                    <img :src="'/img/' + item.logo" class="w-full mx-auto max-w-30 rounded-full">
                                    <p class="text-blue-grey font-opensans-600 text-xxs text-center my-3 ellipsis-2" style="height: 34px;">{{ item.agency }}</p>
                                    <p class="cursor-pointer font-opensans-600 text-xxs text-center my-3" style="color: #EB5757">Remove</p>
                                </div>
                            </div>
                            <div @click="openModal('modalAgencies')" class="cursor-pointer col-span-1">
                                <img src="/img/icon/addphoto.png" class="w-full mx-auto max-w-30 rounded-full">
                                <p class="text-blue font-opensans-600 text-xxs text-center my-3">ADD AGENCY</p>
                            </div>
                        </div>
                    </div>
                </ContentCard>
            </div>
            <div class="col-span-12 col-start-1 md:col-span-10 col md:col-start-2">
                <ContentCard cardTitle="Remarks">
                    <div class="block p-2">
                        <div class="grid grid-cols-2 gap-y-5 gap-x-3">
                            <div class="col-span-2">
                                <div class="relative w-full">
                                    <textarea type="text" v-model="remarks" placeholder="Write comment" name="remarks" id="remarks" class="w-full secondary-textarea"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </ContentCard>
            </div>
            <div class="col-span-12 col-start-1 md:col-span-10 col md:col-start-2 mt-10 flex items-center justify-end">
                <button @click="openModal('modalSubmit')" class="mt-1 md:mt-0 w-full md:w-40 bg-blue text-sm font-opensans-600 mx-0 py-2.5 px-5 shadow-main text-white rounded-lg">
                    Submit
                </button>
            </div>
        </div>
        
        <Modal modalTitle="Add Agencies" v-show="modalActive && showModal == 'modalAgencies'" @close="closeModal">
            <template v-slot:body>
                <form class="block">
                    <div class="grid grid-cols-2 gap-y-6 gap-x-3 mt-2">
                        <div class="col-span-2">
                            <p class="text-black font-inter-400 text-sm">Once ticket is submitted, we’ll automatically send a notification to the assigned agencies</p>
                        </div>
                        <div class="col-span-2">
                            <div class="relative w-full">
                                <input type="text" v-model="filterSearchAgency" placeholder="Search" name="selectagencies" id="selectagencies" class="my-2 w-full secondary-input" style="padding-left: 35px;"/>
                                <img src="/img/icon/search.png" class="search-img" style="top: 23px;">
                            </div>
                            <div v-for="(agency, index) in allAgencies" ref="allAgencies" class="py-2">
                                <label class="cursor-pointer flex items-center">
                                    <input type="checkbox" @change.prevent="agencyChecked(agency.id, agency.index, $event)">
                                    <img :src="'/img/' + agency.logo" class="w-15 h-15 mx-4 rounded-full">
                                    <p class="font-inter-400 text-black font-base">{{ agency.agency }}</p>
                                </label>
                            </div>
                        </div>
                    </div>
                </form>
            </template>
            <template v-slot:footer>
                <div class="flex items-center justify-end w-full">
                    <button @click="closeModal" class="border border-blue mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-white text-sm font-opensans-600 mr-2 py-2.5 px-5 text-blue rounded-lg flex items-center justify-center">
                        Close
                    </button>
                    <button @click="addChecked()" class="mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-blue text-sm font-opensans-600 py-2.5 px-5 shadow-main text-white rounded-lg flex items-center justify-center">
                        Add
                    </button>
                </div>
            </template>
        </Modal>
        
        <Modal modalTitle="Add Violation" v-show="modalActive && showModal == 'modalViolation'" @close="closeModal">
            <template v-slot:body>
                <form class="block">
                    <div class="grid grid-cols-2 gap-y-6 gap-x-3">
                        <div class="col-span-2">
                            <div class="relative w-full">
                                <input type="text" v-model="filterSearchViolation" placeholder="Search" name="selectviolations" id="selectviolations" class="my-2 w-full secondary-input" style="padding-left: 35px;"/>
                                <img src="/img/icon/search.png" class="search-img" style="top: 23px;">
                            </div>
                            <div class="py-2">
                                <label class="cursor-pointer flex items-start" v-for="(violation, index) in allViolations">
                                    <input type="checkbox" class="mt-1" @change.prevent="violationChecked(violation.id, violation.index, $event)" :value="violation.id" v-model="chosenViolations">
                                    <p class="font-inter-400 text-black font-base mx-4 ellipsis-2" style="height: 46px;">{{ violation.violation }}</p>
                                </label>
                            </div>
                        </div>
                    </div>
                </form>
            </template>
            <template v-slot:footer>
                <div class="flex items-center justify-end w-full">
                    <button @click="closeModal" class="border border-blue mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-white text-sm font-opensans-600 mr-2 py-2.5 px-5 text-blue rounded-lg flex items-center justify-center">
                        Close
                    </button>
                    <button @click="addCheckedViolation()" class="mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-blue text-sm font-opensans-600 py-2.5 px-5 shadow-main text-white rounded-lg flex items-center justify-center">
                        Update
                    </button>
                </div>
            </template>
        </Modal>
        
        <Modal modalTitle="Add Amount" v-show="modalActive && showModal == 'modalAddAmount'" @close="closeModal">
            <template v-slot:body>
                <form class="block">
                    <div class="grid grid-cols-2 gap-y-6 gap-x-3">
                        <div class="col-span-2">
                            <div class="relative w-full">
                                <input type="text" v-model="violationAmount" placeholder="Search" name="selectviolations" id="selectviolations" class="my-2 w-full secondary-input" style="padding-left: 47px;"/>
                                <p class="php font-inter-700 text-blue-grey">Php</p>
                            </div>
                        </div>
                    </div>
                </form>
            </template>
            <template v-slot:footer>
                <div class="flex items-center justify-end w-full">
                    <button @click="closeModal" class="border border-blue mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-white text-sm font-opensans-600 mr-2 py-2.5 px-5 text-blue rounded-lg flex items-center justify-center">
                        Cancel
                    </button>
                    <button class="mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-blue text-sm font-opensans-600 py-2.5 px-5 shadow-main text-white rounded-lg flex items-center justify-center">
                        Add
                    </button>
                </div>
            </template>
        </Modal>
        
        
        <Modal modalTitle="Edit Amount" v-show="modalActive && showModal == 'modalEditAmount'" @close="closeModal">
            <template v-slot:body>
                <form class="block">
                    <div class="grid grid-cols-2 gap-y-6 gap-x-3">
                        <div class="col-span-2">
                            <div class="relative w-full">
                                <input type="text" v-model="violationAmount" placeholder="Enter amount" name="selectviolations" id="selectviolations" class="my-2 w-full secondary-input" style="padding-left: 47px;"/>
                                <p class="php font-inter-700 text-blue-grey">Php</p>
                            </div>
                        </div>
                    </div>
                </form>
            </template>
            <template v-slot:footer>
                <div class="flex items-center justify-end w-full">
                    <button @click="closeModal" class="border border-blue mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-white text-sm font-opensans-600 mr-2 py-2.5 px-5 text-blue rounded-lg flex items-center justify-center">
                        Cancel
                    </button>
                    <button @click="editAmount()" class="mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-blue text-sm font-opensans-600 py-2.5 px-5 shadow-main text-white rounded-lg flex items-center justify-center">
                        Save
                    </button>
                </div>
            </template>
        </Modal>

        <Modal v-show="modalActive && showModal == 'modalSubmit'" @close="closeModal">
            <template v-slot:body>
                <img src="/img/icon/modal-send.png" class="mb-6">
                <h5 class="font-exo-600 text-xl text-dark2 mb-4">Submit & notify assigned agencies</h5>
                <p class="font-inter-400 text-lg text-dark2 mb-11">After submitting your ticket, all assigned agencies will be immediately notified.</p> 
            </template>
            <template v-slot:footer>
                <div class="flex items-center justify-end w-full">
                    <button @click="closeModal" class="border border-blue mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-white text-sm font-opensans-600 mx-0 sm:mx-2 py-2.5 px-5 text-blue rounded-lg flex items-center justify-center">
                        Cancel
                    </button>
                    <button @click="createTicket()" class="mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-blue text-sm font-opensans-600 mx-0 sm:mx-2 py-2.5 px-5 shadow-main text-white rounded-lg flex items-center justify-center">
                        Submit
                    </button>
                </div>
            </template>
        </Modal>
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

export default {
    setup: () => ({
        title: 'Create Ticket'
    }),
    data () {
        return{
            vendorcity: null,
            //Create Ticket
            product_service: '',
            complaint: '',
            platform: '',
            link: '',
            additional_documents_file: '',
            vendor_name: '',
            email_address: '',
            mobile_number: '',
            city: '',
            reported_first_name: '',
            reported_last_name: '',
            reported_email_address: '',
            reported_mobile_number: '',
            remarks: '',
            violationAmount: '',
            //Agencies
            allAgencies: [],
            filterSearchAgency: '',
            selectedAgencies: [],
            currentAgencies: [],
            arrayAgencies: [],
            //Cities
            filteredCities: [],
            cityDD: false,
            cities: [{name: 'Alaminos'}, {name: 'Angeles City'}, {name: 'Antipolo'}, {name: 'Bacolod'}, {name: 'Bacoor'}, {name: 'Bago'}, {name: 'Baguio'}, {name: 'Bais'}, {name: 'Balanga'}, {name: 'Baliwag'}, {name: 'Batac'}, {name: 'Batangas City'}, {name: 'Bayawan'}, {name: 'Baybay'}, {name: 'Bayugan'}, {name: 'Biñan'}, {name: 'Bislig'}, {name: 'Bogo'}, {name: 'Borongan'}, {name: 'Butuan'}, {name: 'Cabadbaran'}, {name: 'Cabanatuan'}, {name: 'Cabuyao'}, {name: 'Cadiz'}, {name: 'Cagayan de Oro'}, {name: 'Calaca'}, {name: 'Calamba'}, {name: 'Calapan'}, {name: 'Calbayog'}, {name: 'Caloocan'}, {name: 'Candon'}, {name: 'Canlaon'}, {name: 'Carcar'}, {name: 'Catbalogan'}, {name: 'Cauayan'}, {name: 'Cavite City'}, {name: 'Cebu City'}, {name: 'Cotabato City'}, {name: 'Dagupan'}, {name: 'Danao'}, {name: 'Dapitan'}, {name: 'Dasmariñas'}, {name: 'Davao City'}, {name: 'Digos'}, {name: 'Dipolog'}, {name: 'Dumaguete'}, {name: 'El Salvador'}, {name: 'Escalante'}, {name: 'Gapan'}, {name: 'General Santos'}, {name: 'General Trias'}, {name: 'Gingoog'}, {name: 'Guihulngan'}, {name: 'Himamaylan'}, {name: 'Ilagan'}, {name: 'Iligan'}, {name: 'Iloilo City'}, {name: 'Imus'}, {name: 'Iriga'}, {name: 'Isabela'}, {name: 'Kabankalan'}, {name: 'Kidapawan'}, {name: 'Koronadal'}, {name: 'La Carlota'}, {name: 'Lamitan'}, {name: 'Laoag'}, {name: 'Lapu-Lapu City'}, {name: 'Las Piñas'}, {name: 'Legazpi'}, {name: 'Ligao'}, {name: 'Lipa'}, {name: 'Lucena'}, {name: 'Maasin'}, {name: 'Mabalacat'}, {name: 'Makati'}, {name: 'Malabon'}, {name: 'Malaybalay'}, {name: 'Malolos'}, {name: 'Mandaluyong'}, {name: 'Mandaue'}, {name: 'Manila'}, {name: 'Marawi'}, {name: 'Marikina'}, {name: 'Masbate City'}, {name: 'Mati'}, {name: 'Meycauayan'}, {name: 'Muñoz'}, {name: 'Muntinlupa'}, {name: 'Naga'}, {name: 'Naga'}, {name: 'Navotas'}, {name: 'Olongapo'}, {name: 'Ormoc'}, {name: 'Oroquieta'}, {name: 'Ozamiz'}, {name: 'Pagadian'}, {name: 'Palayan'}, {name: 'Panabo'}, {name: 'Parañaque'}, {name: 'Pasay'}, {name: 'Pasig'}, {name: 'Passi'}, {name: 'Puerto Princesa'}, {name: 'Quezon City'}, {name: 'Roxas'}, {name: 'Sagay'}, {name: 'Samal'}, {name: 'San Carlos'}, {name: 'San Carlos'}, {name: 'San Fernando'}, {name: 'San Fernando'}, {name: 'San Jose'}, {name: 'San Jose del Monte'}, {name: 'San Juan'}, {name: 'San Pablo'}, {name: 'San Pedro'}, {name: 'Santa Rosa'}, {name: 'Santo Tomas'}, {name: 'Santiago'}, {name: 'Silay'}, {name: 'Sipalay'}, {name: 'Sorsogon City'}, {name: 'Surigao City'}, {name: 'Tabaco'}, {name: 'Tabuk'}, {name: 'Tacloban'}, {name: 'Tacurong'}, {name: 'Tagaytay'}, {name: 'Tagbilaran'}, {name: 'Taguig'}, {name: 'Tagum'}, {name: 'Talisay'}, {name: 'Talisay'}, {name: 'Tanauan'}, {name: 'Tandag'}, {name: 'Tangub'}, {name: 'Tanjay'}, {name: 'Tarlac City'}, {name: 'Tayabas'}, {name: 'Toledo'}, {name: 'Trece Martires'}, {name: 'Tuguegarao'}, {name: 'Urdaneta'}, {name: 'Valencia'}, {name: 'Valenzuela'}, {name: 'Victorias'}, {name: 'Vigan'}, {name: 'Zamboanga City'}], 
            //Modal
            showModal: '',
            modalActive: false,
            //Products Services
            products: [],
            //Violations
            allViolations: [],
            filterSearchViolation: '',
            checkedViolations: [],
            selectedViolations: [],
            chosenViolations: [],
            arrayViolations: [],
        };
    },
    watch: {
        filterSearchAgency: function() {
            this.getAgencies();
        },
        filterSearchViolation: function() {
            this.getViolations();
        }
    },
    components: { PageLayout, ContentCard, vSelect, Modal },
    async mounted(){
        this.getAgencies()
        this.getProducts()
        this.getViolations()
    },
    computed: {
        total: function(){
            return this.selectedViolations.reduce(function(total, item){
                return total + parseInt(item.amount); 
            },0);
        },
    },
    methods: {
        //Get Product Services
        async getProducts(){
            this.pageNumber = 0;
            const response = await axios.get('api/v1/ticket/product_service');
            //Filter Products
            this.products = response.data.data;
        },
        //Get Agencies
        async getAgencies(){
            const response = await axios.get('api/v1/agencies');
            //Filter Agencies Ticket
            this.allAgencies = response.data.data.filter((a) => (a.agency.includes(this.filterSearchAgency) ||  a.agency.toLowerCase().includes(this.filterSearchAgency)));
        },
        //Get checked agencies
        agencyChecked(id, index, $event){
            console.log(this.selectedAgencies)
            const checked = $event.target.checked;
            const agencies = this.allAgencies.filter((a) => (a.id == id));
            if(checked){
                this.selectedAgencies.push(agencies);
            }else{
                this.selectedAgencies.splice(agencies, 1);
            }
        },
        //Add checked agencies
        addChecked(){
            const arrayAgencies = []
            this.selectedAgencies.map(function(value, key) {
                value.map(function(value, key) {
                    arrayAgencies.push({agency_id: value.id});
                });
            });
            this.arrayAgencies = arrayAgencies
            console.log(this.arrayAgencies)
            console.log(this.selectedAgencies)
            this.currentAgencies = this.selectedAgencies;
            this.closeModal();
        },//Get Violations
        async getViolations(){
            const response = await axios.get('api/v1/list_violations');
            //Filter Agencies Ticket
            this.allViolations = response.data.data.filter((a) => (a.violation.includes(this.filterSearchViolation) ||  a.violation.toLowerCase().includes(this.filterSearchViolation)));
        },
        //Get checked Violations
        violationChecked(id, index, $event){
            const checked = $event.target.checked;
            const violations = this.allViolations.filter((a) => (a.id == id));
            
            if(checked){
                this.checkedViolations.push(violations['0']); 
            }else{
                this.checkedViolations.splice(violations['0'], 1);
            }

            console.log(this.checkedViolations)
            console.log(this.selectedViolations)
        },
        //Add checked Violations
        addCheckedViolation(){
            const arrayViolations = []
            this.selectedViolations.map(function(value, key) {
                arrayViolations.push({violation: value.violation, amount: value.amount});
            });
            this.arrayViolations = arrayViolations

            this.selectedViolations = this.checkedViolations
            
            this.closeModal();
        },
        editAmount(){
            const violation = this.selectedViolations.filter((a) => (a.id == this.modalTicketID));
            violation['0'].amount = this.violationAmount

            const arrayViolations = []
            this.selectedViolations.map(function(value, key) {
                arrayViolations.push({violation: value.violation, amount: value.amount});
            });
            this.arrayViolations = arrayViolations

            this.closeModal();
        },
        addAmount(){
            const violation = this.selectedViolations.filter((a) => (a.id == this.modalTicketID));
            violation['0'].amount = this.violationAmount
            
            const arrayViolations = []
            this.selectedViolations.map(function(value, key) {
                arrayViolations.push({violation: value.violation, amount: value.amount});
            });
            this.arrayViolations = arrayViolations
            
            this.closeModal();
        },
        //Cities Search
        fuseSearch(options, search) {
        const fuse = new Fuse(options, {
            keys: ['product_service'],
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
        //Input File
        onFileChange($event) {
            var files = $event.target.files || $event.dataTransfer.files;
            if (!files.length)
                return;
            this.additional_documents_file = files['0']['name'];
        },
        //Create
        async createTicket() {
            await axios.post('api/v1/tickets', {
                product_service: this.product_service,
                complaint: this.complaint,
                platform: this.platform,
                link: this.link,
                additional_documents_file: this.additional_documents_file,
                vendor_name: this.vendor_name,
                email_address: this.email_address,
                mobile_number: this.mobile_number,
                city: this.city,
                reported_first_name: this.reported_first_name,
                reported_last_name: this.reported_last_name,
                reported_email_address: this.reported_email_address,
                reported_mobile_number: this.reported_mobile_number,
                remarks: this.remarks,
                agencies: this.arrayAgencies,
                violations: this.arrayViolations,

            })
            .then((success) => {
                //Alert Content
                this.successAlert = true;
                this.successMessage = 'Ticket submitted & assigned agencies notified';
                this.successIcon = 'like.png';
                this.closeModal();
                console.log(success)
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
<style scope>
.php {
    top: 18px;
    bottom: 0;
    position: absolute;
    left: 10px;
}
</style>