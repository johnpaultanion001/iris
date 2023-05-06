<template>
    <PageLayout :pageName="title">
        <div class="grid grid-cols-12 gap-3 mb-6 pt-4">
            <div class="col-span-6">
                <h1>{{ title }}</h1>
            </div>
            <div @click="filterDaysDropdown = !filterDaysDropdown" class="col-span-6 flex items-center justify-end">
                <div class="cursor-pointer relative bg-transparent hover:bg-white-25 text-sm font-opensans-600 mx-2 py-2.5 px-5 border border-white text-white rounded-lg flex items-center">
                    {{ filterDays }} <img src="/img/icon/down-white.png" class="ml-4">
                    <div v-if="filterDaysDropdown" class="dropdown absolute border border-white rounded-b-lg bg-white shadow-secondary overflow-hidden">
                        <div to="/user-profile" class="py-3 px-5 text-sm font-opensans-600 flex items-center hover:bg-lighter">
                            <p class="font-inter-400 text-sm text-black">Profile & Settings</p>
                        </div>
                        <div to="/" class="py-3 px-5 text-sm font-opensans-600 flex items-center hover:bg-lighter">
                            <p class="font-inter-400 text-sm text-black">Logout</p>
                        </div>
                    </div>
                </div>
                <button class="bg-transparent hover:bg-white-25 text-sm font-opensans-600 mx-2 py-2.5 px-5 border border-white text-white rounded-lg flex items-center">
                    Export <img src="/img/icon/export-white.png" class="ml-4">
                </button>
            </div>
        </div>
        <div class="grid grid-cols-12 gap-3">
            <div class="col-span-7">
                <ContentCard cardTitle="Complaints Trend">
                </ContentCard>
            </div>
            <div class="col-span-5">
                <ContentCard cardTitle="Tickets">
                </ContentCard>
            </div>
            <div class="col-span-6">
                <ContentCard cardTitle="Platforms">
                </ContentCard>
            </div>
            <div class="col-span-6">
                <ContentCard cardTitle="Violations">
                    <table class="table-fixed mb-5">
                        <thead>
                            <tr class="border-b border-light">
                                <th class="p-2.5">
                                    <button class="filter-btn">Violation<img src="/img/icon/filter.png" class="ml-1.5"></button>
                                </th>
                                <th class="p-2.5 text-center">
                                    <button class="filter-btn m-auto">Frequency<img src="/img/icon/filter.png" class="ml-1.5"></button>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b border-light">
                                <td class="p-2.5 font-opensans-600 text-xxs text-dark2">1. Violation will be placed here</td>
                                <td class="p-2.5 text-center">80</td>
                            </tr>
                            <tr class="border-b border-light">
                                <td class="p-2.5 font-opensans-600 text-xxs text-dark2">2. Violation will be placed here</td>
                                <td class="p-2.5 text-center">80</td>
                            </tr>
                            <tr class="border-b border-light">
                                <td class="p-2.5 font-opensans-600 text-xxs text-dark2">3. Sample Long violation text here. Violation will be placed here. Violation will be placed here</td>
                                <td class="p-2.5 text-center">60</td>
                            </tr>
                            <tr class="border-b border-light">
                                <td class="p-2.5 font-opensans-600 text-xxs text-dark2">4. Violation will be placed here</td>
                                <td class="p-2.5 text-center">80</td>
                            </tr>
                            <tr class="border-b border-light">
                                <td class="p-2.5 font-opensans-600 text-xxs text-dark2">5. Violation will be placed here</td>
                                <td class="p-2.5 text-center">70</td>
                            </tr>
                            <tr class="border-b border-light">
                                <td class="p-2.5 font-opensans-600 text-xxs text-dark2">6. Violation will be placed here</td>
                                <td class="p-2.5 text-center">90</td>
                            </tr>
                            <tr class="border-b border-light">
                                <td class="p-2.5 font-opensans-600 text-xxs text-dark2">7. Violation will be placed here</td>
                                <td class="p-2.5 text-center">80</td>
                            </tr>
                        </tbody>
                    </table>
                </ContentCard>
            </div>
        </div>
        <div class="pt-8 pb-2">
            <p class="font-opensans-600 text-13 text-blue-grey">Ticket Status</p>
        </div>
        <div class="grid grid-cols-5 gap-3">
            <div class="col-span-1">
                <ButtonCard cardTitle="For Review" value="10" icon="/img/icon/eye-active.png" />
            </div>
            <div class="col-span-1">
                <ButtonCard cardTitle="Acknowledged" value="10" icon="/img/icon/like-active.png" />
            </div>
            <div class="col-span-1">
                <ButtonCard cardTitle="On-going" value="10" icon="/img/icon/clock-active.png" />
            </div>
            <div class="col-span-1">
                <ButtonCard cardTitle="Resolved" value="10" icon="/img/icon/party-active.png" />
            </div>
            <div class="col-span-1">
                <ButtonCard cardTitle="Invalid" value="10" icon="/img/icon/warning-active.png" />
            </div>
        </div>
    </PageLayout>
</template>

<style scoped>
.dropdown{
    right: -1px;
    left: -1px;
    top: 36px;
}
</style>

<script>

import PageLayout from '../../pageLayout.vue'
import ContentCard from '../../utilities/contentCard.vue'
import ButtonCard from '../../utilities/buttonCard.vue'

export default {
    setup: () => ({
        title: 'Dashboard'
    }),
    data () {
        return{
            filterDays: 'Last 30 Days',
            filterDaysDropdown: false
        };
    },
    components: { PageLayout, ContentCard, ButtonCard },
}
</script>
