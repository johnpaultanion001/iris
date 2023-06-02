<template>
    <AlertTop :alertIcon="'/img/icon/'+successIcon" :active="successAlert" :content="successMessage" v-if="successAlert" @close="closeAlert" />
    <PageLayout :pageName="title">
        <div class="grid grid-cols-12 gap-3 py-4">
            <div class="col-span-12 md:col-span-6">
                <h1>{{ vendor.vendor_name }}</h1>
            </div>
            <div class="col-span-12 md:col-span-6 flex items-center justify-end flex-col md:flex-row">
                <button @click="openModal('updateModal')" class="mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-transparent hover:bg-white-25 text-sm font-opensans-600 mx-0 sm:mx-2 py-2.5 px-5 border border-white text-white rounded-lg flex items-center justify-center">
                    Update
                </button>
            </div>
        </div>
        <div class="grid grid-cols-5 gap-3 py-4">
            <div class="col-span-5 md:col-span-3 lg:col-span-4">
                <ContentCard cardTitle="Vendor Information">
                    <div class="px-3 pb-2">
                        <table class="table-fixed w-full">
                            <tbody>
                                <tr class="border-b border-light relative">
                                    <td class="py-3 text-blue-grey text-base font-exo-400 w-1/2 sm:w-1/3 lg:w-1/4">Vendor Name</td>
                                    <td class="py-3 text-black text-xl font-exo-400">{{ vendor.vendor_name }}</td>
                                </tr>
                                <tr class="border-b border-light relative">
                                    <td class="py-3 text-blue-grey text-base font-exo-400 w-1/2 sm:w-1/3 lg:w-1/4">Email Address</td>
                                    <td class="py-3 text-black text-base font-exo-400">{{ vendor.email }}</td>
                                </tr>
                                <tr class="border-b border-light relative">
                                    <td class="py-3 text-blue-grey text-base font-exo-400 w-1/2 sm:w-1/3 lg:w-1/4">Mobile Number</td>
                                    <td class="py-3 text-black text-base font-exo-400">{{ vendor.mobile_number }}</td>
                                </tr>
                                <tr class="relative">
                                    <td class="py-3 text-blue-grey text-base font-exo-400 w-1/2 sm:w-1/3 lg:w-1/4">City</td>
                                    <td class="py-3 text-black text-base font-exo-400">{{ vendor.city }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </ContentCard>
            </div>
            <div class="col-span-5 md:col-span-2 lg:col-span-1">
                <p class="font-opensans-600 text-xs text-white mb-2">Quick Stats</p>
                <div class="grid grid-rows-2 gap-2" style="height: calc(100% - 28px)">
                    <div class="row-span-1 content-card bg-white rounded-xl p-3 shadow-main flex items-center justify-between">
                        <div>
                            <h6 class="font-opensans-600 text-xs text-darker flex items-center">No. of Tickets</h6>
                            <div v-for="(item, index) in vendor.quick_stats">
                                <p v-if="index == 'no_of_tickets'" class="font-exo-400 text-darker text-2xl">{{ item }}</p>
                            </div>
                        </div>
                        <div class="p-1 lg:p-3 rounded bg-light-blue">
                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="19" viewBox="0 0 17 19" fill="none" class="ml-1.5">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.0999756 3.9501C0.0999756 1.96187 1.71175 0.350098 3.69997 0.350098H15.6999C16.1545 0.350098 16.57 0.606901 16.7733 1.01344C16.9765 1.41998 16.9327 1.90648 16.6599 2.2701L13.5999 6.3501L16.6599 10.4301C16.9327 10.7937 16.9765 11.2802 16.7733 11.6868C16.57 12.0933 16.1545 12.3501 15.6999 12.3501H3.69997C3.03723 12.3501 2.49997 12.8874 2.49997 13.5501V17.1501C2.49997 17.8128 1.96271 18.3501 1.29997 18.3501C0.637233 18.3501 0.0999756 17.8128 0.0999756 17.1501V3.9501Z" fill="#FFD600"/>
                            </svg>  
                        </div>
                    </div>
                    <div class="row-span-1 content-card bg-white rounded-xl p-3 shadow-main flex items-center justify-between">
                        <div>
                            <h6 class="font-opensans-600 text-xs text-darker flex items-center">No. of Violations</h6>
                            <div v-for="(item, index) in vendor.quick_stats">
                                <p v-if="index == 'no_of_violations'" class="font-exo-400 text-darker text-2xl">{{ item }}</p>
                            </div>
                        </div>
                        <div class="p-1 lg:p-3 rounded bg-light-blue">
                            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="18" viewBox="0 0 19 18" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.40835 1.96849C8.32588 0.337327 10.6744 0.337326 11.5919 1.96849L18.2883 13.8731C19.1882 15.473 18.0321 17.4498 16.1965 17.4498H2.80376C0.968179 17.4498 -0.187934 15.473 0.711981 13.8731L7.40835 1.96849ZM10.7 13.8499C10.7 14.5126 10.1628 15.0499 9.50002 15.0499C8.83728 15.0499 8.30002 14.5126 8.30002 13.8499C8.30002 13.1872 8.83728 12.6499 9.50002 12.6499C10.1628 12.6499 10.7 13.1872 10.7 13.8499ZM9.50002 4.2499C8.83728 4.2499 8.30002 4.78716 8.30002 5.4499V9.0499C8.30002 9.71264 8.83728 10.2499 9.50002 10.2499C10.1628 10.2499 10.7 9.71264 10.7 9.0499V5.4499C10.7 4.78716 10.1628 4.2499 9.50002 4.2499Z" fill="#EC0C38"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-12 gap-3 py-4">
            <div class="col-span-12 md:col-span-6">
                <h5 class="text-blue-grey font-exo-600 text-xl">Tickets</h5>
            </div>
        </div>
        <TicketsList :vendorID="id" colVendor="off" colSeverity="off" />
    </PageLayout>
    <Modal modalTitle="Vendor Information" v-show="modalActive && showModal == 'updateModal'" @close="closeModal">
        <template v-slot:body>
            <form onsubmit="return false"  class="block">
                <div class="grid grid-cols-2 gap-y-6 gap-x-3">
                    <div class="col-span-2">
                        <div class="relative w-full">
                            <label for="vendorname" class="text-base text-blue-grey text-xs font-inter-700">Vendor Name</label>
                            <input type="text" v-model="vname" placeholder="Name" name="vendorname" id="vendorname" class="mt-2 w-full secondary-input"/>
                        </div>
                    </div>
                    <div class="col-span-2">
                        <div class="relative w-full">
                            <label for="email" class="text-base text-blue-grey text-xs font-inter-700">Email Address</label>
                            <input type="email" v-model="vemail" placeholder="Email" name="email" id="email" class="mt-2 w-full secondary-input"/>
                        </div>
                    </div>
                    <div class="col-span-2">
                        <div class="relative w-full">
                            <label for="mobile" class="text-base text-blue-grey text-xs font-inter-700">Mobile Number</label>
                            <input type="text" v-model="vmobile" placeholder="Mobile Number" name="mobile" id="mobile" class="mt-2 w-full secondary-input"/>
                        </div>
                    </div>
                    <div class="col-span-2">
                        <label for="city" class="text-base text-blue-grey text-xs font-inter-700">City</label>
                        <div class="mt-2 w-full secondary-input" style="padding: 4px 0 0 0">
                            <v-select :filter="fuseSearch" :options="cities" :get-option-label="(option) => option.name" placeholder="Choose" v-model="vcity"  :reduce="cities => cities.name">
                                <template #option="{ name }">
                                    {{ name }} 
                                </template>
                            </v-select>
                        </div>
                    </div> 
                </div>
            </form>
        </template>
        <template v-slot:footer>
            <div class="flex items-center justify-end w-full">
                <button @click="closeModal" class="border border-blue mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-white text-sm font-opensans-600 mr-4 py-2.5 px-5 text-blue rounded-lg flex items-center justify-center">
                    Close
                </button>
                <button @click="updateVendor" class="mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-blue text-sm font-opensans-600 py-2.5 px-5 shadow-main text-white rounded-lg flex items-center justify-center">
                    Update
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
import vSelect from 'vue-select'
import TicketsList from '../tickets/ticketsList.vue'
import ButtonCard from '../../utilities/buttonCard.vue'
import Fuse from 'fuse.js'

export default {
    setup: () => ({
        title: 'Vendor Profile'
    }),
    components: { PageLayout, TicketsList, ContentCard, ButtonCard, Modal, vSelect, AlertTop },
    data(){
        return {
            id: this.$route.params.id,
            //Modal
            showModal: '',
            modalActive: false,
            modalTicketID: '',
            successAlert: false,
            successMessage: '',
            successIcon: null,
            //Cities
            filteredCities: [],
            cityDD: false,
            cities: [{name: 'Alaminos'}, {name: 'Angeles City'}, {name: 'Antipolo'}, {name: 'Bacolod'}, {name: 'Bacoor'}, {name: 'Bago'}, {name: 'Baguio'}, {name: 'Bais'}, {name: 'Balanga'}, {name: 'Baliwag'}, {name: 'Batac'}, {name: 'Batangas City'}, {name: 'Bayawan'}, {name: 'Baybay'}, {name: 'Bayugan'}, {name: 'Biñan'}, {name: 'Bislig'}, {name: 'Bogo'}, {name: 'Borongan'}, {name: 'Butuan'}, {name: 'Cabadbaran'}, {name: 'Cabanatuan'}, {name: 'Cabuyao'}, {name: 'Cadiz'}, {name: 'Cagayan de Oro'}, {name: 'Calaca'}, {name: 'Calamba'}, {name: 'Calapan'}, {name: 'Calbayog'}, {name: 'Caloocan'}, {name: 'Candon'}, {name: 'Canlaon'}, {name: 'Carcar'}, {name: 'Catbalogan'}, {name: 'Cauayan'}, {name: 'Cavite City'}, {name: 'Cebu City'}, {name: 'Cotabato City'}, {name: 'Dagupan'}, {name: 'Danao'}, {name: 'Dapitan'}, {name: 'Dasmariñas'}, {name: 'Davao City'}, {name: 'Digos'}, {name: 'Dipolog'}, {name: 'Dumaguete'}, {name: 'El Salvador'}, {name: 'Escalante'}, {name: 'Gapan'}, {name: 'General Santos'}, {name: 'General Trias'}, {name: 'Gingoog'}, {name: 'Guihulngan'}, {name: 'Himamaylan'}, {name: 'Ilagan'}, {name: 'Iligan'}, {name: 'Iloilo City'}, {name: 'Imus'}, {name: 'Iriga'}, {name: 'Isabela'}, {name: 'Kabankalan'}, {name: 'Kidapawan'}, {name: 'Koronadal'}, {name: 'La Carlota'}, {name: 'Lamitan'}, {name: 'Laoag'}, {name: 'Lapu-Lapu City'}, {name: 'Las Piñas'}, {name: 'Legazpi'}, {name: 'Ligao'}, {name: 'Lipa'}, {name: 'Lucena'}, {name: 'Maasin'}, {name: 'Mabalacat'}, {name: 'Makati'}, {name: 'Malabon'}, {name: 'Malaybalay'}, {name: 'Malolos'}, {name: 'Mandaluyong'}, {name: 'Mandaue'}, {name: 'Manila'}, {name: 'Marawi'}, {name: 'Marikina'}, {name: 'Masbate City'}, {name: 'Mati'}, {name: 'Meycauayan'}, {name: 'Muñoz'}, {name: 'Muntinlupa'}, {name: 'Naga'}, {name: 'Naga'}, {name: 'Navotas'}, {name: 'Olongapo'}, {name: 'Ormoc'}, {name: 'Oroquieta'}, {name: 'Ozamiz'}, {name: 'Pagadian'}, {name: 'Palayan'}, {name: 'Panabo'}, {name: 'Parañaque'}, {name: 'Pasay'}, {name: 'Pasig'}, {name: 'Passi'}, {name: 'Puerto Princesa'}, {name: 'Quezon City'}, {name: 'Roxas'}, {name: 'Sagay'}, {name: 'Samal'}, {name: 'San Carlos'}, {name: 'San Carlos'}, {name: 'San Fernando'}, {name: 'San Fernando'}, {name: 'San Jose'}, {name: 'San Jose del Monte'}, {name: 'San Juan'}, {name: 'San Pablo'}, {name: 'San Pedro'}, {name: 'Santa Rosa'}, {name: 'Santo Tomas'}, {name: 'Santiago'}, {name: 'Silay'}, {name: 'Sipalay'}, {name: 'Sorsogon City'}, {name: 'Surigao City'}, {name: 'Tabaco'}, {name: 'Tabuk'}, {name: 'Tacloban'}, {name: 'Tacurong'}, {name: 'Tagaytay'}, {name: 'Tagbilaran'}, {name: 'Taguig'}, {name: 'Tagum'}, {name: 'Talisay'}, {name: 'Talisay'}, {name: 'Tanauan'}, {name: 'Tandag'}, {name: 'Tangub'}, {name: 'Tanjay'}, {name: 'Tarlac City'}, {name: 'Tayabas'}, {name: 'Toledo'}, {name: 'Trece Martires'}, {name: 'Tuguegarao'}, {name: 'Urdaneta'}, {name: 'Valencia'}, {name: 'Valenzuela'}, {name: 'Victorias'}, {name: 'Vigan'}, {name: 'Zamboanga City'}], 
            //Vendor Info
            vendor: [],
            vname: '',
            vemail: '',
            vmobile: '',
            vcity: ''
        }
    },
    async mounted() {
        this.getVendor();
    },
    methods: {
        //Get Vendor
        async getVendor(){
            const response = await axios.get('api/v1/reported_vendors/'+this.id);
            //Filter Vendor Data
            this.vendor = response.data.data;
        },
        //Scroll to Div
        scrollToDiv(section) {
            this.$refs[section].scrollIntoView({ behavior: "smooth" });
            this.sectionName = section;
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
        //Cities Search
        fuseSearch(options, search) {
            const fuse = new Fuse(options, {
                keys: ['name'],
                shouldSort: true,
            })
            return search.length ? fuse.search(search).map(({ item }) => item): fuse.list
        },
        //Update Vendor
        async updateVendor() {
            await axios.put('api/v1/reported_vendors/1', {
                vendor_name: this.vname,
                email: this.vemail,
                mobile_number: this.vmobile,
                city: this.vcity
            })
            .then((success) => {
                //Alert Content
                this.successAlert = true;
                this.successMessage = 'Successfully updated';
                this.successIcon = 'like.svg';
                this.closeModal()
            })
            .catch((error) => {
                this.successAlert = true;
                this.successMessage = "Please enter a valid Email or Mobile Number";
                this.successIcon = 'warning-red.svg';
            })
        },
    },
}
</script>