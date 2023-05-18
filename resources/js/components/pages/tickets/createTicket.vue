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
                                    <input type="text" v-model="productservice" placeholder="" name="productservice" id="productservice" class="mt-2 w-full secondary-input"/>
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
                                            <input type="checkbox" v-model="platform" value="Facebook" id="facebook" class="mr-2.5"/> Facebook
                                        </label>
                                    </div>
                                    <div class="flex items-center justify-start my-1">
                                        <label for="shopee" class="text-base cursor-pointer text-blue-grey text-xs font-inter-700">
                                            <input type="checkbox" v-model="platform" value="Shopee" id="shopee" class="mr-2.5"/> Shopee
                                        </label>
                                    </div>
                                    <div class="flex items-center justify-start my-1">
                                        <label for="shopee" class="text-base cursor-pointer text-blue-grey text-xs font-inter-700">
                                            <input type="checkbox" v-model="platform" value="Shopee" id="shopee" class="mr-2.5"/> Shopee
                                        </label>
                                    </div>
                                    <div class="flex items-center justify-start my-1">
                                        <label for="lazada" class="text-base cursor-pointer text-blue-grey text-xs font-inter-700">
                                            <input type="checkbox" v-model="platform" value="Lazada" id="lazada" class="mr-2.5"/> Lazada
                                        </label>
                                    </div>
                                    <div class="flex items-center justify-start my-1">
                                        <label for="shopee" class="text-base cursor-pointer text-blue-grey text-xs font-inter-700">
                                            <input type="checkbox" v-model="platform" value="Shopee" id="shopee" class="mr-2.5"/> Shopee
                                        </label>
                                    </div>
                                    <div class="flex items-center justify-start my-1">
                                        <label for="facebook" class="text-base cursor-pointer text-blue-grey text-xs font-inter-700">
                                            <input type="checkbox" v-model="platform" value="Facebook" id="facebook" class="mr-2.5"/> Facebook
                                        </label>
                                    </div>
                                    <div class="flex items-center justify-start my-1">
                                        <label for="shopee" class="text-base cursor-pointer text-blue-grey text-xs font-inter-700">
                                            <input type="checkbox" v-model="platform" value="Shopee" id="shopee" class="mr-2.5"/> Shopee
                                        </label>
                                    </div>
                                    <div class="flex items-center justify-start my-1">
                                        <label for="shopee" class="text-base cursor-pointer text-blue-grey text-xs font-inter-700">
                                            <input type="checkbox" v-model="platform" value="Shopee" id="shopee" class="mr-2.5"/> Shopee
                                        </label>
                                    </div>
                                    <div class="flex items-center justify-start my-1">
                                        <label for="lazada" class="text-base cursor-pointer text-blue-grey text-xs font-inter-700">
                                            <input type="checkbox" v-model="platform" value="Lazada" id="lazada" class="mr-2.5"/> Lazada
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
                                    <label class="cursor-pointer w-fit mt-4 bg-blue text-sm font-opensans-600 py-2.5 px-5 shadow-main text-white rounded-lg flex items-center justify-center">
                                        <img src="/img/icon/upload.png" class="mr-3.5"> Upload
                                        <input type="file" name="documents" id="documents" hidden>
                                    </label>
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
                                    <label for="vendorname" class="text-base text-blue-grey text-xs font-inter-700">Vendor Name</label>
                                    <input type="text" v-model="vendorname" placeholder="" name="vendorname" id="vendorname" class="mt-2 w-full secondary-input"/>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div class="relative w-full">
                                    <label for="vendoremail" class="text-base text-blue-grey text-xs font-inter-700">Email Address</label>
                                    <input type="email" v-model="vendoremail" placeholder="Write comment" name="vendoremail" id="vendoremail" class="mt-2 w-full secondary-input">
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div class="relative w-full">
                                    <label for="vendormobilenumber" class="text-base text-blue-grey text-xs font-inter-700">Mobile Number</label>
                                    <input type="number" v-model="vendormobilenumber" name="vendormobilenumber" id="vendormobilenumber" class="mt-2 w-full secondary-input">
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div class="relative w-full">
                                    <div class="mt-2 w-full secondary-input" style="padding: 4px 0 0 0">
                                        <v-select :filter="fuseSearch" :options="cities" :get-option-label="(option) => option.name" placeholder="Choose" >
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
                                    <label for="firstname" class="text-base text-blue-grey text-xs font-inter-700">First Name</label>
                                    <input type="text" v-model="firstname" placeholder="" name="firstname" id="firstname" class="mt-2 w-full secondary-input"/>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div class="relative w-full">
                                    <label for="lastname" class="text-base text-blue-grey text-xs font-inter-700">Last Name</label>
                                    <input type="text" v-model="lastname" placeholder="Write comment" name="lastname" id="lastname" class="mt-2 w-full secondary-input">
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div class="relative w-full">
                                    <label for="reporteremail" class="text-base text-blue-grey text-xs font-inter-700">Email Address</label>
                                    <input type="email" v-model="reporteremail" placeholder="Write comment" name="reporteremail" id="reporteremail" class="mt-2 w-full secondary-input">
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div class="relative w-full">
                                    <label for="reportermobilenumber" class="text-base text-blue-grey text-xs font-inter-700">Mobile Number</label>
                                    <input type="number" v-model="reportermobilenumber" name="reportermobilenumber" id="reportermobilenumber" class="mt-2 w-full secondary-input">
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
                                            <tr class="border-b border-light relative">
                                                <td class="flex items-start h-15">
                                                    <p class="font-inter-400 text-base text-blue-grey w-fit">1</p>
                                                </td>
                                                <td>
                                                    <div class="flex items-center flex-nowrap h-15">
                                                        <p class="font-inter-400 text-sm text-black ellipsis-2" style="height: 40px">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sit elit, eu dignissim vitae cras. </p>
                                                    </div>
                                                </td>
                                                <td @click="openModal('modalEditAmount')"  class="cursor-pointer flex items-center ml-10 flex-nowrap h-15">
                                                    <img src="/img/icon/edit-blue.png" class="mr-2">
                                                    <p class="font-inter-400 text-base text-black whitespace-nowrap">Php 5,000.00</p>
                                                </td>
                                            </tr>
                                            <tr class="border-b border-light relative">
                                                <td class="flex items-start h-15">
                                                    <p class="font-inter-400 text-base text-blue-grey w-5">1</p>
                                                </td>
                                                <td>
                                                    <div class="flex items-center flex-nowrap h-15">
                                                        <p class="font-inter-400 text-sm text-black ellipsis-2" style="height: 40px">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sit elit, eu dignissim vitae cras. </p>
                                                    </div>
                                                </td>
                                                <td @click="openModal('modalAddAmount')" class="cursor-pointer flex items-center ml-10 flex-nowrap h-15">
                                                    <img src="/img/icon/edit-blue.png" class="mr-2">
                                                    <p class="font-opensans-600 text-base whitespace-nowrap" style="color:#5E72E4;">Add Amount</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="flex items-center justify-between h-15">
                                        <p class="font-inter-700 text-base text-black">Total Fine</p>
                                        <p class="font-inter-700 text-base text-black">Php 10,000.00</p>
                                    </div>
                                </div>
                                <div class="flex items-center justify-start w-full">
                                    <button @click="openModal('modalViolation')" class="mt-1 md:mt-0 min-w-0 md:min-w-110 w-full md:w-fit bg-blue text-sm font-opensans-600 mr-2 py-2.5 px-5 shadow-main text-white rounded-full flex items-center justify-center">
                                        Add
                                    </button>
                                    <button class="border border-blue mt-1 md:mt-0 min-w-0 md:min-w-110 w-full md:w-fit bg-white text-sm font-opensans-600 py-2.5 px-5 text-blue rounded-full flex items-center justify-center">
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
                    <div class="block p-2">
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
                                <label class="cursor-pointer flex items-start">
                                    <input type="checkbox" class="mt-1">
                                    <p class="font-inter-400 text-black font-base mx-4 ellipsis-2" style="height: 46px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sit elit, eu dignissim vitae cras. </p>
                                </label>
                            </div>
                            <div class="py-2">
                                <label class="cursor-pointer flex items-start">
                                    <input type="checkbox" class="mt-1">
                                    <p class="font-inter-400 text-black font-base mx-4 ellipsis-2" style="height: 46px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sit elit, eu dignissim vitae cras. </p>
                                </label>
                            </div>
                            <div class="py-2">
                                <label class="cursor-pointer flex items-start">
                                    <input type="checkbox" class="mt-1">
                                    <p class="font-inter-400 text-black font-base mx-4 ellipsis-2" style="height: 46px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sit elit, eu dignissim vitae cras. </p>
                                </label>
                            </div>
                            <div class="py-2">
                                <label class="cursor-pointer flex items-start">
                                    <input type="checkbox" class="mt-1">
                                    <p class="font-inter-400 text-black font-base mx-4 ellipsis-2" style="height: 46px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sit elit, eu dignissim vitae cras. </p>
                                </label>
                            </div>
                            <div class="py-2">
                                <label class="cursor-pointer flex items-start">
                                    <input type="checkbox" class="mt-1">
                                    <p class="font-inter-400 text-black font-base mx-4 ellipsis-2" style="height: 46px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sit elit, eu dignissim vitae cras. </p>
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
                                <input type="text" v-model="filterSearchViolation" placeholder="Search" name="selectviolations" id="selectviolations" class="my-2 w-full secondary-input" style="padding-left: 47px;"/>
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
                                <input type="text" v-model="filterSearchViolation" placeholder="Search" name="selectviolations" id="selectviolations" class="my-2 w-full secondary-input" style="padding-left: 47px;"/>
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
                    <button class="mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-blue text-sm font-opensans-600 mx-0 sm:mx-2 py-2.5 px-5 shadow-main text-white rounded-lg flex items-center justify-center">
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

            //Agencies
            allAgencies: [],
            filterSearchAgency: '',
            selectedAgencies: [],
            currentAgencies: [],
            //Cities
            filteredCities: [],
            cityDD: false,
            cities: [{name: 'Alaminos'}, {name: 'Angeles City'}, {name: 'Antipolo'}, {name: 'Bacolod'}, {name: 'Bacoor'}, {name: 'Bago'}, {name: 'Baguio'}, {name: 'Bais'}, {name: 'Balanga'}, {name: 'Baliwag'}, {name: 'Batac'}, {name: 'Batangas City'}, {name: 'Bayawan'}, {name: 'Baybay'}, {name: 'Bayugan'}, {name: 'Biñan'}, {name: 'Bislig'}, {name: 'Bogo'}, {name: 'Borongan'}, {name: 'Butuan'}, {name: 'Cabadbaran'}, {name: 'Cabanatuan'}, {name: 'Cabuyao'}, {name: 'Cadiz'}, {name: 'Cagayan de Oro'}, {name: 'Calaca'}, {name: 'Calamba'}, {name: 'Calapan'}, {name: 'Calbayog'}, {name: 'Caloocan'}, {name: 'Candon'}, {name: 'Canlaon'}, {name: 'Carcar'}, {name: 'Catbalogan'}, {name: 'Cauayan'}, {name: 'Cavite City'}, {name: 'Cebu City'}, {name: 'Cotabato City'}, {name: 'Dagupan'}, {name: 'Danao'}, {name: 'Dapitan'}, {name: 'Dasmariñas'}, {name: 'Davao City'}, {name: 'Digos'}, {name: 'Dipolog'}, {name: 'Dumaguete'}, {name: 'El Salvador'}, {name: 'Escalante'}, {name: 'Gapan'}, {name: 'General Santos'}, {name: 'General Trias'}, {name: 'Gingoog'}, {name: 'Guihulngan'}, {name: 'Himamaylan'}, {name: 'Ilagan'}, {name: 'Iligan'}, {name: 'Iloilo City'}, {name: 'Imus'}, {name: 'Iriga'}, {name: 'Isabela'}, {name: 'Kabankalan'}, {name: 'Kidapawan'}, {name: 'Koronadal'}, {name: 'La Carlota'}, {name: 'Lamitan'}, {name: 'Laoag'}, {name: 'Lapu-Lapu City'}, {name: 'Las Piñas'}, {name: 'Legazpi'}, {name: 'Ligao'}, {name: 'Lipa'}, {name: 'Lucena'}, {name: 'Maasin'}, {name: 'Mabalacat'}, {name: 'Makati'}, {name: 'Malabon'}, {name: 'Malaybalay'}, {name: 'Malolos'}, {name: 'Mandaluyong'}, {name: 'Mandaue'}, {name: 'Manila'}, {name: 'Marawi'}, {name: 'Marikina'}, {name: 'Masbate City'}, {name: 'Mati'}, {name: 'Meycauayan'}, {name: 'Muñoz'}, {name: 'Muntinlupa'}, {name: 'Naga'}, {name: 'Naga'}, {name: 'Navotas'}, {name: 'Olongapo'}, {name: 'Ormoc'}, {name: 'Oroquieta'}, {name: 'Ozamiz'}, {name: 'Pagadian'}, {name: 'Palayan'}, {name: 'Panabo'}, {name: 'Parañaque'}, {name: 'Pasay'}, {name: 'Pasig'}, {name: 'Passi'}, {name: 'Puerto Princesa'}, {name: 'Quezon City'}, {name: 'Roxas'}, {name: 'Sagay'}, {name: 'Samal'}, {name: 'San Carlos'}, {name: 'San Carlos'}, {name: 'San Fernando'}, {name: 'San Fernando'}, {name: 'San Jose'}, {name: 'San Jose del Monte'}, {name: 'San Juan'}, {name: 'San Pablo'}, {name: 'San Pedro'}, {name: 'Santa Rosa'}, {name: 'Santo Tomas'}, {name: 'Santiago'}, {name: 'Silay'}, {name: 'Sipalay'}, {name: 'Sorsogon City'}, {name: 'Surigao City'}, {name: 'Tabaco'}, {name: 'Tabuk'}, {name: 'Tacloban'}, {name: 'Tacurong'}, {name: 'Tagaytay'}, {name: 'Tagbilaran'}, {name: 'Taguig'}, {name: 'Tagum'}, {name: 'Talisay'}, {name: 'Talisay'}, {name: 'Tanauan'}, {name: 'Tandag'}, {name: 'Tangub'}, {name: 'Tanjay'}, {name: 'Tarlac City'}, {name: 'Tayabas'}, {name: 'Toledo'}, {name: 'Trece Martires'}, {name: 'Tuguegarao'}, {name: 'Urdaneta'}, {name: 'Valencia'}, {name: 'Valenzuela'}, {name: 'Victorias'}, {name: 'Vigan'}, {name: 'Zamboanga City'}], 
            //Modal
            showModal: '',
            modalActive: false,
        };
    },
    watch: {
        filterSearchAgency: function() {
            this.getAgencies();
        }
    },
    components: { PageLayout, ContentCard, vSelect, Modal },
    async mounted(){
        this.getAgencies()
    },
    methods: {
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
            this.currentAgencies = this.selectedAgencies;
            this.closeModal();
        },
        //Cities Search
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