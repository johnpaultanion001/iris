<template>
    <PageLayout :pageName="title">
        <div class="grid grid-cols-12 gap-3 py-4">
            <div class="col-span-12 md:col-span-6">
                <h1>Vendor Name {{ id }} </h1>
            </div>
            <div class="col-span-12 md:col-span-6 flex items-center justify-end flex-col md:flex-row">
                <button @click="openModal('filterModal')" class="mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-transparent hover:bg-white-25 text-sm font-opensans-600 mx-0 sm:mx-2 py-2.5 px-5 border border-white text-white rounded-lg flex items-center justify-center">
                    Update
                </button>
            </div>
        </div>
        <div class="grid grid-cols-5 gap-3 py-4">
            <div class="col-span-5 md:col-span-3 lg:col-span-4">
                <ContentCard cardTitle="Vendor Information">
                    <table class="table-fixed w-full">
                        <tbody>
                            <tr class="border-b border-light relative">
                                <td class="py-3 text-blue-grey text-base font-exo-400 w-1/2 sm:w-1/3 lg:w-1/4">Vendor Name</td>
                                <td class="py-3 text-black text-xl font-exo-400">Value</td>
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
                                <td class="py-3 text-blue-grey text-base font-exo-400 w-1/2 sm:w-1/3 lg:w-1/4">City</td>
                                <td class="py-3 text-black text-base font-exo-400">Value</td>
                            </tr>
                        </tbody>
                    </table>
                </ContentCard>
            </div>
            <div class="col-span-5 md:col-span-2 lg:col-span-1">
                <p class="font-opensans-600 text-xs text-white mb-2">Quick Stats</p>
                <div class="grid grid-rows-2 gap-2" style="height: calc(100% - 28px)">
                    <div class="row-span-1 content-card bg-white rounded-xl p-3 shadow-main flex items-center justify-between">
                        <div>
                            <h6 class="font-opensans-600 text-xs text-darker flex items-center">No. of Tickets</h6>
                            <p class="font-exo-400 text-darker text-2xl">value</p>
                        </div>
                        <div class="p-1 lg:p-3 rounded bg-light-blue">
                            <img src="/img/icon/flag-yellow.png">
                        </div>
                    </div>
                    <div class="row-span-1 content-card bg-white rounded-xl p-3 shadow-main flex items-center justify-between">
                        <div>
                            <h6 class="font-opensans-600 text-xs text-darker flex items-center">No. of Violations</h6>
                            <p class="font-exo-400 text-darker text-2xl">value</p>
                        </div>
                        <div class="p-1 lg:p-3 rounded bg-light-blue">
                            <img src="/img/icon/warning-red.png">
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
</template>


<script>

import PageLayout from '../../pageLayout.vue'
import TicketsList from '../tickets/ticketsList.vue'
import ContentCard from '../../utilities/contentCard.vue'
import ButtonCard from '../../utilities/buttonCard.vue'

export default {
    setup: () => ({
        title: 'Vendor Profile'
    }),
    components: { PageLayout, TicketsList, ContentCard, ButtonCard },
    data(){
        return {
            id: this.$route.params.id
        }
    },
}
</script>