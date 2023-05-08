<template>
    <PageLayout :pageName="title">
        <div class="grid grid-cols-12 gap-3 mb-6 pt-4">
            <div class="col-span-12 md:col-span-6">
                <h1>{{ title }}</h1>
            </div>
            <div class="col-span-12 md:col-span-6 flex items-center justify-end flex-col md:flex-row">
                <div @click="filterDaysDropdown = !filterDaysDropdown" class="cursor-pointer w-full md:w-fit relative bg-transparent hover:bg-white-25 text-sm font-opensans-600 mx-2 py-2.5 px-5 border border-white text-white rounded-lg flex items-center justify-between">
                    {{ filterDays }} <img src="/img/icon/down-white.png" class="ml-4">
                    <div v-if="filterDaysDropdown" class="dropdown absolute border border-white rounded-b-lg bg-white shadow-secondary overflow-hidden">
                        <div to="/user-profile" class="py-3 px-5 text-sm font-opensans-600 flex items-center hover:bg-lighter">
                            <p class="font-inter-400 text-sm text-black">Last 10 Days</p>
                        </div>
                        <div to="/" class="py-3 px-5 text-sm font-opensans-600 flex items-center hover:bg-lighter">
                            <p class="font-inter-400 text-sm text-black">Last Week</p>
                        </div>
                    </div>
                </div>
                <button class="mt-1 md:mt-0 w-full md:w-fit bg-transparent hover:bg-white-25 text-sm font-opensans-600 mx-2 py-2.5 px-5 border border-white text-white rounded-lg flex items-center justify-center">
                    Export <img src="/img/icon/export-white.png" class="ml-4">
                </button>
            </div>
        </div>
        <div class="grid grid-cols-12 gap-3">
            <div class="col-span-12 md:col-span-7">
                <ContentCard cardTitle="Complaints Trend">
                </ContentCard>
            </div>
            <div class="col-span-12 md:col-span-5">
                <ContentCard cardTitle="Tickets">
                    <div class="grid grid-cols-7 gap-4">
                        <div class="col-span-12 lg:col-span-3">
                            <router-link to="/tickets" class="cursor-pointer shadow-main rounded block text-center w-full p-3 bg-blue text-white font-opensans-600 text-sm">
                                View All Tickets
                            </router-link>
                        </div>
                        <div class="col-span-12 lg:col-span-4 pr-9">
                            <table class="table-auto mb-5 w-full">
                                <tbody>
                                    <tr class="border-b border-light">
                                        <td class="flex items-center">
                                            <img src="/img/dti-logo.png" class="rounded-full w-10 py-2.5">
                                            <p class="p-2.5 text-center font-opensans-600 text-sm text-black">DTI</p>
                                        </td>
                                        <td class="p-2.5 text-right font-opensans-600 text-sm text-blue-grey">80</td>
                                    </tr>
                                    <tr class="border-b border-light">
                                        <td class="flex items-center">
                                            <img src="/img/dti-logo.png" class="rounded-full w-10 py-2.5">
                                            <p class="p-2.5 text-center font-opensans-600 text-sm text-black">DTI</p>
                                        </td>
                                        <td class="p-2.5 text-right font-opensans-600 text-sm text-blue-grey">80</td>
                                    </tr>
                                    <tr class="border-b border-light">
                                        <td class="flex items-center">
                                            <img src="/img/dti-logo.png" class="rounded-full w-10 py-2.5">
                                            <p class="p-2.5 text-center font-opensans-600 text-sm text-black">DTI</p>
                                        </td>
                                        <td class="p-2.5 text-right font-opensans-600 text-sm text-blue-grey">80</td>
                                    </tr>
                                    <tr class="border-b border-light">
                                        <td class="flex items-center">
                                            <img src="/img/dti-logo.png" class="rounded-full w-10 py-2.5">
                                            <p class="p-2.5 text-center font-opensans-600 text-sm text-black">DTI</p>
                                        </td>
                                        <td class="p-2.5 text-right font-opensans-600 text-sm text-blue-grey">80</td>
                                    </tr>
                                    <tr class="border-b border-light">
                                        <td class="flex items-center">
                                            <img src="/img/dti-logo.png" class="rounded-full w-10 py-2.5">
                                            <p class="p-2.5 text-center font-opensans-600 text-sm text-black">DTI</p>
                                        </td>
                                        <td class="p-2.5 text-right font-opensans-600 text-sm text-blue-grey">80</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </ContentCard>
            </div>
            <div class="col-span-12 md:col-span-6">
                <ContentCard cardTitle="Platforms">
                    <div class="platforms pt-2.5 mb-5">
                        <div class="platform py-2">
                            <div class="flex items-center justify-between mt-1.5 mb-2">
                                <div class="flex items-center mb-1">
                                    <img src="/img/icon/settings.png" class="">
                                    <p class="text-sm font-opensans-600 text-blue-grey ml-1">Facebook</p>
                                </div>
                                <div>
                                    <p class="text-sm font-opensans-600 text-blue-grey">80%</p>
                                </div>
                            </div>
                            <div class="progress">
                                <div class="w-full bg-light rounded-lg h-2">
                                    <div style="width: 50%;" class="bg-black rounded-lg h-2"></div>
                                </div>
                            </div>
                        </div>
                        <div class="platform py-2">
                            <div class="flex items-center justify-between mt-1.5 mb-2">
                                <div class="flex items-center mb-1">
                                    <img src="/img/icon/settings.png" class="">
                                    <p class="text-sm font-opensans-600 text-blue-grey ml-1">Facebook</p>
                                </div>
                                <div>
                                    <p class="text-sm font-opensans-600 text-blue-grey">80%</p>
                                </div>
                            </div>
                            <div class="progress">
                                <div class="w-full bg-light rounded-lg h-2">
                                    <div style="width: 50%;" class="bg-black rounded-lg h-2"></div>
                                </div>
                            </div>
                        </div>
                        <div class="platform py-2">
                            <div class="flex items-center justify-between mt-1.5 mb-2">
                                <div class="flex items-center mb-1">
                                    <img src="/img/icon/settings.png" class="">
                                    <p class="text-sm font-opensans-600 text-blue-grey ml-1">Facebook</p>
                                </div>
                                <div>
                                    <p class="text-sm font-opensans-600 text-blue-grey">80%</p>
                                </div>
                            </div>
                            <div class="progress">
                                <div class="w-full bg-light rounded-lg h-2">
                                    <div style="width: 50%;" class="bg-black rounded-lg h-2"></div>
                                </div>
                            </div>
                        </div>
                        <div class="platform py-2">
                            <div class="flex items-center justify-between mt-1.5 mb-2">
                                <div class="flex items-center mb-1">
                                    <img src="/img/icon/settings.png" class="">
                                    <p class="text-sm font-opensans-600 text-blue-grey ml-1">Facebook</p>
                                </div>
                                <div>
                                    <p class="text-sm font-opensans-600 text-blue-grey">80%</p>
                                </div>
                            </div>
                            <div class="progress">
                                <div class="w-full bg-light rounded-lg h-2">
                                    <div style="width: 50%;" class="bg-black rounded-lg h-2"></div>
                                </div>
                            </div>
                        </div>
                        <div class="platform py-2">
                            <div class="flex items-center justify-between mt-1.5 mb-2">
                                <div class="flex items-center mb-1">
                                    <img src="/img/icon/settings.png" class="">
                                    <p class="text-sm font-opensans-600 text-blue-grey ml-1">Facebook</p>
                                </div>
                                <div>
                                    <p class="text-sm font-opensans-600 text-blue-grey">80%</p>
                                </div>
                            </div>
                            <div class="progress">
                                <div class="w-full bg-light rounded-lg h-2">
                                    <div style="width: 50%;" class="bg-black rounded-lg h-2"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </ContentCard>
            </div>
            <div class="col-span-12 md:col-span-6">
                <ContentCard cardTitle="Violations">
                    <table class="table-auto mb-5 w-full">
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
                                <td class="p-2.5 text-center font-opensans-600 text-xxs">80</td>
                            </tr>
                            <tr class="border-b border-light">
                                <td class="p-2.5 font-opensans-600 text-xxs text-dark2">2. Violation will be placed here</td>
                                <td class="p-2.5 text-center font-opensans-600 text-xxs">80</td>
                            </tr>
                            <tr class="border-b border-light">
                                <td class="p-2.5 font-opensans-600 text-xxs text-dark2">3. Violation will be placed here</td>
                                <td class="p-2.5 text-center font-opensans-600 text-xxs">60</td>
                            </tr>
                            <tr class="border-b border-light">
                                <td class="p-2.5 font-opensans-600 text-xxs text-dark2">4. Violation will be placed here</td>
                                <td class="p-2.5 text-center font-opensans-600 text-xxs">80</td>
                            </tr>
                            <tr class="border-b border-light">
                                <td class="p-2.5 font-opensans-600 text-xxs text-dark2">5. Violation will be placed here</td>
                                <td class="p-2.5 text-center font-opensans-600 text-xxs">70</td>
                            </tr>
                            <tr class="border-b border-light">
                                <td class="p-2.5 font-opensans-600 text-xxs text-dark2">6. Violation will be placed here</td>
                                <td class="p-2.5 text-center font-opensans-600 text-xxs">90</td>
                            </tr>
                            <tr class="border-b border-light">
                                <td class="p-2.5 font-opensans-600 text-xxs text-dark2">7. Violation will be placed here</td>
                                <td class="p-2.5 text-center font-opensans-600 text-xxs">80</td>
                            </tr>
                        </tbody>
                    </table>
                </ContentCard>
            </div>
        </div>
        <div class="pt-8 pb-2">
            <p class="font-opensans-600 text-xs text-blue-grey">Ticket Status</p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-5 gap-3">
            <div class="col-span-2 md:col-span-1">
                <ButtonCard link="/tickets" arrow="true" cardTitle="For Review" value="10" icon="/img/icon/eye-active.png" />
            </div>
            <div class="col-span-2 md:col-span-1">
                <ButtonCard link="/tickets" arrow="true" cardTitle="Acknowledged" value="10" icon="/img/icon/like-active.png" />
            </div>
            <div class="col-span-2 md:col-span-1">
                <ButtonCard link="/tickets" arrow="true" cardTitle="On-going" value="10" icon="/img/icon/clock-active.png" />
            </div>
            <div class="col-span-2 md:col-span-1">
                <ButtonCard link="/tickets" arrow="true" cardTitle="Resolved" value="10" icon="/img/icon/party-active.png" />
            </div>
            <div class="col-span-2 md:col-span-1">
                <ButtonCard link="/tickets" arrow="true" cardTitle="Invalid" value="10" icon="/img/icon/warning-active.png" />
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
