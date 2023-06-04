<template>
    <AlertTop :alertIcon="'/img/icon/'+successIcon" :active="successAlert" :content="successMessage" v-if="successAlert" @close="closeAlert" />
    <PageLayout pageName="Intelligence">
        <div class="grid grid-cols-12 gap-3 mb-6 pt-4">
            <div class="col-span-12 col-start-1 md:col-span-10 col md:col-start-2">
                <ContentCard cardTitle="Ticket Information">
                    <div class="block p-2">
                        <div class="grid grid-cols-2 gap-y-5 gap-x-3">
                            <div class="col-span-2">
                                <div class="relative w-full">
                                    <label for="productservice" class="text-base text-blue-grey text-xs font-inter-700">Product/Service</label>
                                  <search-input-dropdown v-model="product_service"
                                                         :data-list="products"
                                                         :free-text=true
                                                         @update-value="updateValue($event)"
                                                         @clear-input="clearInput()"/>
                                  <p class="text-red pt-2 text-xs" v-if="errors && errors.product_service">{{ errors.product_service[0]}}</p>
                                </div>
                            </div>
                            <div class="col-span-2">
                                <div class="relative w-full">
                                    <label for="complaint" class="text-base text-blue-grey text-xs font-inter-700">Write Complaint</label>
                                    <textarea type="text" v-model="complaint" placeholder="Write complaint" name="complaint" id="complaint" class="mt-2 w-full secondary-textarea"></textarea>
                                  <p class="text-red pt-2 text-xs" v-if="errors && errors.complaint">{{ errors.complaint[0]}}</p>
                                </div>
                            </div>
                            <div class="col-span-2">
                                <label for="platform" class="text-base text-blue-grey text-xs font-inter-700">Platform</label>
                                <div class="grid grid-rows-3 grid-flow-col">
                                  <div class="flex items-center justify-start my-1" v-for="(data, index) in platforms">
                                    <label :for="data.id" class="text-base cursor-pointer text-blue-grey text-xs font-inter-700">
                                      <input type="radio" v-model="platform" :value="data.value" :id="data.id" class="mr-2.5"/>
                                      {{ data.value }}
                                    </label>
                                    <p class="text-red pt-2 text-xs" v-if="errors && errors.platform">{{ errors.platform[0]}}</p>
                                  </div>
                                </div>
                            </div>
                            <div class="col-span-2">
                                <div class="relative w-full">
                                    <label for="link" class="text-base text-blue-grey text-xs font-inter-700">Link</label>
                                    <input type="text" v-model="link" name="link" id="link" class="mt-2 w-full secondary-input">
                                  <p class="text-red pt-2 text-xs" v-if="errors && errors.link">{{ errors.link[0]}}</p>
                                </div>
                            </div>
                            <div class="col-span-2">
                                <div class="relative w-full">
                                    <label for="documents" class="text-base text-blue-grey text-xs font-inter-700">Upload Additional Documents</label>
                                    <div class="flex items-start mt-4 ">
                                        <label class="cursor-pointer w-fit bg-blue text-sm font-opensans-600 py-2.5 px-5 shadow-main text-white rounded-lg flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-3.5" width="13" height="14" viewBox="0 0 13 14" fill="none">
                                                <path d="M8.48223 3.875L4.36612 7.99112C3.87796 8.47927 3.87796 9.27073 4.36612 9.75888C4.85427 10.247 5.64573 10.247 6.13388 9.75888L10.1428 5.64277C11.1191 4.66646 11.1191 3.08354 10.1428 2.10723C9.16646 1.13092 7.58354 1.13092 6.60723 2.10723L2.59835 6.22335C1.13388 7.68782 1.13388 10.0622 2.59835 11.5267C4.06282 12.9911 6.43718 12.9911 7.90165 11.5267L11.8125 7.625" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg> Upload
                                            <input type="file" name="documents" @change="onFileChange()" id="documents" hidden multiple="multiple" ref="documents">
                                        </label>
                                        <div class="block w-100 overflow-auto">
                                            <div v-for="item in docu_name" class="w-100 overflow-auto">
                                            <p class="text-blue-grey text-base ml-2 font-inter-400 truncate w-100">{{ item.file }}</p>
                                            </div>
                                        </div>
                                        <p class="text-red pt-2 text-xs" v-if="errors && errors.additional_documents_file">{{ errors.additional_documents_file[0]}}</p>
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
                                    <input type="text" v-model="vendor_name" placeholder="Vendor Name" name="vendor_name" id="vendor_name" class="mt-2 w-full secondary-input"/>
                                </div>
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <div class="relative w-full">
                                    <label for="email_address" class="text-base text-blue-grey text-xs font-inter-700">Email Address</label>
                                    <input type="email" v-model="email_address" placeholder="Email Address" name="email_address" id="email_address" class="mt-2 w-full secondary-input">
                                </div>
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <div class="relative w-full">
                                    <label for="mobile_number" class="text-base text-blue-grey text-xs font-inter-700">Mobile Number</label>
                                    <input type="text" v-model="mobile_number" name="mobile_number" placeholder="Mobile Number" id="mobile_number" class="mt-2 w-full secondary-input">
                                </div>
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <div class="relative w-full">
                                    <div class="mt-2 w-full secondary-input" style="padding: 4px 0 0 0">
                                        <v-select :filter="fuseSearch" :options="cities" :get-option-label="(option) => option.name" :placeholder="city" v-model="city"  :reduce="cities => cities.name">
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
                            <div class="col-span-2 sm:col-span-1">
                                <div class="relative w-full">
                                    <label for="reported_first_name" class="text-base text-blue-grey text-xs font-inter-700">First Name</label>
                                    <input type="text" v-model="reported_first_name" placeholder="First Name" name="reported_first_name" id="reported_first_name" class="mt-2 w-full secondary-input"/>
                                  <p class="text-red pt-2 text-xs" v-if="errors && errors.reported_first_name">{{ errors.reported_first_name[0]}}</p>
                                </div>
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <div class="relative w-full">
                                    <label for="reported_last_name" class="text-base text-blue-grey text-xs font-inter-700">Last Name</label>
                                    <input type="text" v-model="reported_last_name" placeholder="Last Name" name="reported_last_name" id="reported_last_name" class="mt-2 w-full secondary-input">
                                  <p class="text-red pt-2 text-xs" v-if="errors && errors.reported_last_name">{{ errors.reported_last_name[0]}}</p>
                                </div>
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <div class="relative w-full">
                                    <label for="reported_email_address" class="text-base text-blue-grey text-xs font-inter-700">Email Address</label>
                                    <input type="email" v-model="reported_email_address" placeholder="Email Address" name="reported_email_address" id="reported_email_address" class="mt-2 w-full secondary-input">
                                  <p class="text-red pt-2 text-xs" v-if="errors && errors.reported_email_address">{{ errors.reported_email_address[0]}}</p>
                                </div>
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <div class="relative w-full">
                                    <label for="reported_mobile_number" class="text-base text-blue-grey text-xs font-inter-700">Mobile Number</label>
                                    <input type="text" v-model="reported_mobile_number" name="reported_mobile_number" placeholder="Mobile Number" id="reported_mobile_number" class="mt-2 w-full secondary-input">
                                  <p class="text-red pt-2 text-xs" v-if="errors && errors.reported_mobile_number">{{ errors.reported_mobile_number[0]}}</p>
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
                                                        <p class="font-inter-400 text-base text-black ellipsis-2" style="height: 41px">{{ violation.violation }}</p>
                                                    </div>
                                                </td>
                                                <td class="cursor-pointer flex items-center ml-10 flex-nowrap h-15">
                                                    <svg v-if="violation.amount" @click.prevent="openModal('modalEditAmount', violation.id);" class="mr-2" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M10.5858 0.585786C11.3668 -0.195262 12.6332 -0.195262 13.4142 0.585786C14.1953 1.36683 14.1953 2.63316 13.4142 3.41421L12.6213 4.20711L9.79289 1.37868L10.5858 0.585786Z" fill="#1267E5"/>
                                                        <path d="M8.37868 2.79289L0 11.1716V14H2.82842L11.2071 5.62132L8.37868 2.79289Z" fill="#1267E5"/>
                                                    </svg>
                                                    <p v-if="violation.amount" class="font-inter-400 text-base text-black whitespace-nowrap">Php {{ violation.amount }}</p>
                                                    <p v-if="!violation.amount" @click.prevent="openModal('modalAddAmount', violation.id);" class="font-opensans-600 text-base whitespace-nowrap" style="color:#5E72E4;">Add Amount</p>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </ContentCard>
            </div>
            <div class="col-span-12 col-start-1 md:col-span-10 col md:col-start-2">
                <ContentCard cardTitle="Assigned Agencies">
                    <div class="block px-2 py-4">
                        <div class="grid grid-cols-5 gap-y-5 gap-x-5 mt-2">
                            <div v-for="item in selectedAgencies" class="col-span-2 sm:col-span-1">
                                <div>
                                    <img :src="item.logo" class="w-full mx-auto max-w-30 max-h-30 object-center rounded-full object-contain border-light border" style="max-height: 7.5rem;">
                                    <p class="text-blue-grey font-opensans-600 text-xxs text-center my-3 ellipsis-2" style="height: 34px;">{{ item.agency }}</p>
                                    <p @click="removeChecked(item.code)" class="cursor-pointer font-opensans-600 text-xxs text-center my-3" style="color: #EB5757">Remove</p>
                                </div>
                            </div>
                            <div @click="openModal('modalAgencies')" class="cursor-pointer col-span-2 sm:col-span-1">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 120 120" fill="none" class="w-full mx-auto max-w-30 rounded-full">
                                    <circle cx="60" cy="60" r="59.5" stroke="#1267E5"/>
                                    <path d="M60 48V60M60 60V72M60 60H72M60 60L48 60" stroke="#1267E6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
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
                                    <textarea type="text" v-model="remarks" placeholder="Write your remark" name="remarks" id="remarks" class="w-full secondary-textarea"></textarea>
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
                <form onsubmit="return false"  class="block">
                    <div class="grid grid-cols-2 gap-y-6 gap-x-3">
                        <div class="col-span-2">
                            <p class="text-black font-inter-400 text-sm">Once ticket is submitted, we’ll automatically send a notification to the assigned agencies</p>
                        </div>
                        <div class="col-span-2">
                            <div class="relative w-full">
                                <input type="text" v-model="filterSearchAgency" placeholder="Search" name="selectagencies" id="selectagencies" class="my-2 w-full secondary-input" style="padding-left: 35px;"/>
                                <img src="/img/icon/search.svg" class="search-img" style="top: 23px;">
                            </div>
                            <div v-for="(agency, index) in allAgencies" ref="allAgencies" class="py-2">
                                <label class="cursor-pointer flex items-center">
                                    <input type="checkbox" @change.prevent="agencyChecked(agency.code, agency.index, $event)" :value="agency.id" v-model="chosenAgencies">
                                    <img :src="agency.logo" class="w-15 h-15 mx-4 rounded-full object-contain border border-light">
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
                    <button @click="addCheckedAgencies()" class="mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-blue text-sm font-opensans-600 py-2.5 px-5 shadow-main text-white rounded-lg flex items-center justify-center">
                        Add
                    </button>
                </div>
            </template>
        </Modal>

        <Modal modalTitle="Add Violation" v-show="modalActive && showModal == 'modalViolation'" @close="closeModal">
            <template v-slot:body>
                <form onsubmit="return false"  class="block">
                    <div class="grid grid-cols-2 gap-y-6 gap-x-3">
                        <div class="col-span-2">
                            <div class="relative w-full">
                                <input type="text" v-model="filterSearchViolation" placeholder="Search" name="selectviolations" id="selectviolations" class="my-2 w-full secondary-input" style="padding-left: 35px;"/>
                                <img src="/img/icon/search.svg" class="search-img" style="top: 23px;">
                            </div>
                            <div class="py-2">
                                <label class="cursor-pointer flex items-start" v-for="(violation, index) in allViolations">
                                    <input type="checkbox" class="mt-1" @change.prevent="violationChecked(violation.id, violation.index, $event)" :value="violation.id" v-model="chosenViolations">
                                    <p class="font-inter-400 text-black font-base mx-4 truncate">{{ violation.violation }}</p>
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
                <form onsubmit="return false"  class="block">
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
                <form onsubmit="return false"  class="block">
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
                <img src="/img/icon/modal-send.svg" class="mb-6">
                <h5 class="font-exo-600 text-xl text-dark2 mb-4">Submit & notify assigned agencies</h5>
                <p class="font-inter-400 text-lg text-dark2 mb-11">After submitting your ticket, all assigned agencies will be immediately notified.</p>
            </template>
            <template v-slot:footer>
                <div class="flex items-center justify-end w-full">
                    <button @click="closeModal" class="border border-blue mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-white text-sm font-opensans-600 mx-0 sm:mx-2 py-2.5 px-5 text-blue rounded-lg flex items-center justify-center">
                        Cancel
                    </button>
                    <button @click="updateTicket()" class="mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-blue text-sm font-opensans-600 mx-0 sm:mx-2 py-2.5 px-5 shadow-main text-white rounded-lg flex items-center justify-center">
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
import AlertTop from '../../utilities/alertTop.vue'
import Fuse from 'fuse.js'
import SearchInputDropdown from "../../utilities/searchInputDropdown.vue";

export default {
    setup: () => ({
        title: 'Edit Ticket'
    }),
    data () {
        return{
            id: this.$route.params.id,
            vendorcity: null,
            //Create Ticket
            product_service: '',
            complaint: '',
            platform: '',
            link: '',
            docu_name: [],
            additional_documents_file: [],
            selected_docu: [],
            vendor_name: '',
            email_address: '',
            mobile_number: '',
            city: '',
            reported_first_name: '',
            reported_last_name: '',
            reported_email_address: '',
            reported_mobile_number: '',
            remarks: '',
            //Agencies
            allAgencies: [],
            filterSearchAgency: '',
            selectedAgencies: [],
            currentAgencies: [],
            arrayAgencies: [],
            chosenAgencies: [],
            //Cities
            filteredCities: [],
            cityDD: false,
            cities: [{name: 'Alaminos'}, {name: 'Angeles City'}, {name: 'Antipolo'}, {name: 'Bacolod'}, {name: 'Bacoor'}, {name: 'Bago'}, {name: 'Baguio'}, {name: 'Bais'}, {name: 'Balanga'}, {name: 'Baliwag'}, {name: 'Batac'}, {name: 'Batangas City'}, {name: 'Bayawan'}, {name: 'Baybay'}, {name: 'Bayugan'}, {name: 'Biñan'}, {name: 'Bislig'}, {name: 'Bogo'}, {name: 'Borongan'}, {name: 'Butuan'}, {name: 'Cabadbaran'}, {name: 'Cabanatuan'}, {name: 'Cabuyao'}, {name: 'Cadiz'}, {name: 'Cagayan de Oro'}, {name: 'Calaca'}, {name: 'Calamba'}, {name: 'Calapan'}, {name: 'Calbayog'}, {name: 'Caloocan'}, {name: 'Candon'}, {name: 'Canlaon'}, {name: 'Carcar'}, {name: 'Catbalogan'}, {name: 'Cauayan'}, {name: 'Cavite City'}, {name: 'Cebu City'}, {name: 'Cotabato City'}, {name: 'Dagupan'}, {name: 'Danao'}, {name: 'Dapitan'}, {name: 'Dasmariñas'}, {name: 'Davao City'}, {name: 'Digos'}, {name: 'Dipolog'}, {name: 'Dumaguete'}, {name: 'El Salvador'}, {name: 'Escalante'}, {name: 'Gapan'}, {name: 'General Santos'}, {name: 'General Trias'}, {name: 'Gingoog'}, {name: 'Guihulngan'}, {name: 'Himamaylan'}, {name: 'Ilagan'}, {name: 'Iligan'}, {name: 'Iloilo City'}, {name: 'Imus'}, {name: 'Iriga'}, {name: 'Isabela'}, {name: 'Kabankalan'}, {name: 'Kidapawan'}, {name: 'Koronadal'}, {name: 'La Carlota'}, {name: 'Lamitan'}, {name: 'Laoag'}, {name: 'Lapu-Lapu City'}, {name: 'Las Piñas'}, {name: 'Legazpi'}, {name: 'Ligao'}, {name: 'Lipa'}, {name: 'Lucena'}, {name: 'Maasin'}, {name: 'Mabalacat'}, {name: 'Makati'}, {name: 'Malabon'}, {name: 'Malaybalay'}, {name: 'Malolos'}, {name: 'Mandaluyong'}, {name: 'Mandaue'}, {name: 'Manila'}, {name: 'Marawi'}, {name: 'Marikina'}, {name: 'Masbate City'}, {name: 'Mati'}, {name: 'Meycauayan'}, {name: 'Muñoz'}, {name: 'Muntinlupa'}, {name: 'Naga'}, {name: 'Naga'}, {name: 'Navotas'}, {name: 'Olongapo'}, {name: 'Ormoc'}, {name: 'Oroquieta'}, {name: 'Ozamiz'}, {name: 'Pagadian'}, {name: 'Palayan'}, {name: 'Panabo'}, {name: 'Parañaque'}, {name: 'Pasay'}, {name: 'Pasig'}, {name: 'Passi'}, {name: 'Puerto Princesa'}, {name: 'Quezon City'}, {name: 'Roxas'}, {name: 'Sagay'}, {name: 'Samal'}, {name: 'San Carlos'}, {name: 'San Carlos'}, {name: 'San Fernando'}, {name: 'San Fernando'}, {name: 'San Jose'}, {name: 'San Jose del Monte'}, {name: 'San Juan'}, {name: 'San Pablo'}, {name: 'San Pedro'}, {name: 'Santa Rosa'}, {name: 'Santo Tomas'}, {name: 'Santiago'}, {name: 'Silay'}, {name: 'Sipalay'}, {name: 'Sorsogon City'}, {name: 'Surigao City'}, {name: 'Tabaco'}, {name: 'Tabuk'}, {name: 'Tacloban'}, {name: 'Tacurong'}, {name: 'Tagaytay'}, {name: 'Tagbilaran'}, {name: 'Taguig'}, {name: 'Tagum'}, {name: 'Talisay'}, {name: 'Talisay'}, {name: 'Tanauan'}, {name: 'Tandag'}, {name: 'Tangub'}, {name: 'Tanjay'}, {name: 'Tarlac City'}, {name: 'Tayabas'}, {name: 'Toledo'}, {name: 'Trece Martires'}, {name: 'Tuguegarao'}, {name: 'Urdaneta'}, {name: 'Valencia'}, {name: 'Valenzuela'}, {name: 'Victorias'}, {name: 'Vigan'}, {name: 'Zamboanga City'}],
            //Modal
            showModal: '',
            modalActive: false,
            successAlert: false,
            successMessage: '',
            successIcon: null,
            //Products Services
            products: [],
            //Violations
            allViolations: [],
            filterSearchViolation: '',
            checkedViolations: [],
            selectedViolations: [],
            chosenViolations: [],
            arrayViolations: [],
            violationAmount: '',
            violationID: null,
            //Ticket info
            ticketInfo: [],
            platforms: [
              {
                id: "facebook",
                value: "Facebook"
              },
              {
                id: "shopee",
                value: "Shopee"
              },
              {
                id: "lazada",
                value: "Lazada"
              },
              {
                id: "youtube",
                value: "Youtube"
              },
              {
                id: "twitter",
                value: "Twitter"
              },
              {
                id: "instagram",
                value: "Instagram"
              },
              {
                id: "google",
                value: "Google"
              },
            ],
          errors: null
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
    components: {SearchInputDropdown, PageLayout, ContentCard, vSelect, Modal, AlertTop },
    async mounted(){
        this.getAgencies()
        this.getProducts()
        this.getViolations()
        this.getTicket()
    },
    computed: {
        total: function(){
            return this.selectedViolations.reduce(function(total, item){
                return total + parseInt(item.amount);
            },0);
        },
    },
    methods: {
        prodChange(){
            product_service.push({'product_service': this.product_service});
        },
        //Get Ticket
        async getTicket(){
            const response = await axios.get('api/v1/tickets/'+this.id);
            //Filter Ticket Data
            this.ticketInfo = response.data.data;
            console.log(this.ticketInfo)

            this.product_service = this.ticketInfo.product_service
            this.complaint = this.ticketInfo.complaint
            this.platform = this.ticketInfo.platform
            this.link = this.ticketInfo.link
            this.additional_documents_file = this.ticketInfo.additional_documents_file
            this.docu_name = this.ticketInfo.additional_documents_file
            this.vendor_name = this.ticketInfo.vendor.map(function(value, key) { return value.vendor_name });
            this.email_address = this.ticketInfo.vendor.map(function(value, key) { return value.email });
            this.mobile_number = this.ticketInfo.vendor.map(function(value, key) { return value.mobile_number });
            // this.city = this.ticketInf.vendor.map(function(value, key) { return value.city });
            this.reported_first_name = this.ticketInfo.reported_by.map(function(value, key) { return value.first_name });
            this.reported_last_name = this.ticketInfo.reported_by.map(function(value, key) { return value.last_name });
            this.reported_email_address = this.ticketInfo.reported_by.map(function(value, key) { return value.email });
            this.reported_mobile_number = this.ticketInfo.reported_by.map(function(value, key) { return value.mobile_number });
            this.remarks = this.ticketInfo.remarks

            //clone Ticket Agencies to Selected Agencies
            const selectedAgencies = []
            const checkedAgencies = []
            const chosenAgencies = []
            const arrayAgencies = []
            this.ticketInfo.assigned_agencies.map(function(value, key) {
                selectedAgencies.push(value);
                checkedAgencies.push(value);
                chosenAgencies.push(value.id);
                arrayAgencies.push({agency_id: value.id});
            });
            this.chosenAgencies = chosenAgencies
            this.arrayAgencies = arrayAgencies
            this.checkedAgencies = checkedAgencies
            this.selectedAgencies = selectedAgencies


            //clone Ticket Violations to Selected Violations
            const selectedViolations = []
            const checkedViolations = []
            const chosenViolations = []
            const arrayViolations = []
            this.ticketInfo.violations['0'].map(function(value, key) {
                selectedViolations.push(value);
                chosenViolations.push(value.id);
                checkedViolations.push(value);
                arrayViolations.push({violation: value.violation, amount: value.amount});
            });
            this.checkedViolations = checkedViolations
            this.arrayViolations = arrayViolations
            this.chosenViolations = chosenViolations
            this.selectedViolations = selectedViolations
        },
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
        agencyChecked(code, index, $event){
            const checked = $event.target.checked;
            const agencies = this.allAgencies.filter((a) => (a.code == code));

            if(checked){
                this.checkedAgencies.push(agencies['0']);
            }else{
                this.checkedAgencies.splice(agencies['0'], 1);
            }
        },
        //Add checked agencies
        addCheckedAgencies(){
            //clone checked Agencies to selected Agencies
            this.selectedAgencies = this.checkedAgencies

            //clone
            const checkedAgencies = []
            const chosenAgencies = []
            this.selectedAgencies.map(function(value, key) {
                checkedAgencies.push(value);
                chosenAgencies.push(value.id);
            });
            this.chosenAgencies = chosenAgencies
            this.checkedAgencies = checkedAgencies


            const arrayAgencies = []
            this.selectedAgencies.map(function(value, key) {
                arrayAgencies.push({agency_id: value.id});
            });
            this.arrayAgencies = arrayAgencies

            this.closeModal();

            console.log(this.selectedAgencies)
        },
        //Remove checked agencies
        removeChecked(code){
            const index = this.selectedAgencies.findIndex(item => item.code === code)
            if (index !== -1) {
                this.selectedAgencies.splice(index, 1)
            }

            //clone
            const checkedAgencies = []
            const chosenAgencies = []
            this.selectedAgencies.map(function(value, key) {
                checkedAgencies.push(value);
                chosenAgencies.push(value.id);
            });
            this.chosenAgencies = chosenAgencies
            this.checkedAgencies = checkedAgencies
        },
        //Get Violations
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
            this.checkedViolations.map(function(value, key) {
                arrayViolations.push({violation: value.violation, amount: value.amount});
            });
            this.arrayViolations = arrayViolations

            this.selectedViolations = this.checkedViolations

            this.closeModal();
        },
        editAmount(){
            const violation = this.selectedViolations.filter((a) => (a.id == this.violationID));
            violation['0'].amount = this.violationAmount

            const arrayViolations = []
            this.selectedViolations.map(function(value, key) {
                arrayViolations.push({violation: value.violation, amount: value.amount});
            });
            this.arrayViolations = arrayViolations

            this.closeModal();
            this.violationAmount = null
        },
        addAmount(){
            const violation = this.selectedViolations.filter((a) =>  (a.id == this.violationID));
            violation['0'].amount = this.violationAmount

            const arrayViolations = []
            this.selectedViolations.map(function(value, key) {
                arrayViolations.push({violation: value.violation, amount: value.amount});
            });
            this.arrayViolations = arrayViolations

            this.closeModal();
            this.violationAmount = null
        },
        //Cities Search
        fuseSearch(options, search) {
            const fuse = new Fuse(options, {
                keys: ['product_service'],
                shouldSort: true,
            })
            return search.length ? fuse.search(search).map(({ item }) => item) : fuse.list
        },
        // Search Input Dropdown
        updateValue(value) {
          this.product_service = value.product_service
        },
        clearInput(type) {
          this.product_service = null
        },
        //Modals
        openModal(itemID, dataID = null){
            document.querySelector('body').style.overflow = 'hidden';
            this.showModal = itemID;
            if(itemID === 'modalEditAmount' || itemID === 'modalAddAmount') {
              this.violationID = dataID
              const violation = this.selectedViolations.filter((a) => (a.id == dataID));
              this.violationAmount = violation[0].amount
            }

            this.modalActive = true;
        },
        closeModal() {
            if(this.modalActive == true){
                document.querySelector('body').style.overflow = 'auto';
                this.modalActive = false;
            }
        },
        //Input File
        onFileChange() {
          this.docu_name = [];
          this.documents = this.$refs.documents.files;
          if (this.documents.length <= 0)
              return;

            for (var i = 0; i < this.documents.length; i++) {
                this.selected_docu.push(this.documents[i]);
                this.docu_name.push({file: this.documents[i].name});
            }
        },
        //Create
        async updateTicket() {
            //Post Agencies
            await axios.post('api/v1/ticket/assigned_agencies', {
                ticket_id: this.id,
                agencies: this.arrayAgencies
            })
            .then((success) => {
                //Alert Content
                this.successAlert = true;
                this.successMessage = 'Successfully updated';
                this.successIcon = 'like.svg';
            })
            .catch((error) => {
                console.log(error)
            })

            //Post
            await axios.post('api/v1/ticket/violations', {
                ticket_id: this.id,
                violations: this.arrayViolations
            })
            .then((success) => {
                //Alert Content
                this.successAlert = true;
                this.successMessage = 'Successfully updated';
                this.successIcon = 'like.svg';
                console.log(this.arrayViolations)
            })
            .catch((error) => {
                console.log(error)
            })

            const formData = new FormData();
            formData.append('product_service', this.product_service);
            formData.append('complaint', this.complaint);
            formData.append('platform', this.platform);
            formData.append('link', this.link);
            for (var i = 0; i < this.$refs.documents.files.length; i++ ){
                let file = this.$refs.documents.files[i];
                formData.append('additional_documents_file', file);
            }
            formData.append('additional_documents_file', this.selected_docu);
            formData.append('reported_first_name', String(this.reported_first_name[0]));
            formData.append('reported_last_name', String(this.reported_last_name[0]));
            formData.append('reported_email_address', String(this.reported_email_address));
            formData.append('reported_mobile_number', String(this.reported_mobile_number));
            formData.append('remarks', this.remarks);
            const headers = { 'Content-Type': 'multipart/form-data' };
                await axios.post('api/v1/ticket/update/'+this.id, formData, { headers })
                .then((response) => {
                if (response.data && response.data.message && response.data.message.validationFailed) {
                    this.errors = response.data.message.errors
                    this.successAlert = true;
                    this.successMessage = 'Error occured. Please try again';
                    this.successIcon = 'warning-red.svg';
                } else {
                    this.errors = null
                    //Alert Content
                    this.successAlert = true;
                    this.successMessage = 'Ticket submitted & assigned agencies notified';
                    this.successIcon = 'like.svg';
                    this.closeModal();
                }
                })
                .catch((error) => {
                    this.successAlert = true;
                    this.successMessage = "Error";
                    this.successIcon = 'warning-red.svg';
                    console.log(error.response.data.errors)
                })

            this.closeModal();
        },
        //Alert
        async closeAlert() {
            this.successAlert = false
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
