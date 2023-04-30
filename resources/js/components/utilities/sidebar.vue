<template>
    <div class="p-4 h-screen">
        <div class="sidebar bg-lighter rounded-2xl h-full w-full overflow-hidden shadow-secondary">
            <div class="sidebar-header p-4 border border-t-0 border-x-0 border-b-1-light">
                <img src="/img/iris-logo-blue.png" class="mx-auto"> 
            </div>
            <div class="sidebar-body bg-white py-0 px-2.5 h-full">  
                <div class="agency-title w-full flex items-center pt-4 pb-3">
                    <div class="rounded-full border mr-3">
                        <img :src="agencyImg" class="w-15 h-15"> 
                    </div>
                    <p class="text-sm text-blue-grey font-opensans-600">{{ agencyName }}</p>
                </div>
                <router-link class="w-full flex items-center p-5 text-sm font-opensans-600 hover:bg-lighter" :class="pageName === 'Dashboard' ? 'bg-lighter' : 'bg-white'" to="/">
                    <img v-if="pageName === 'Dashboard'" src="/img/icon/home-active.png" class="mr-3.5">
                    <img v-else src="/img/icon/home.png" class="mr-3.5"> 
                    <p :class="pageName === 'Dashboard' ? 'text-blue' : 'text-blue-grey'">Dashboard</p>
                </router-link>
                <router-link class="w-full flex items-center p-5 text-sm font-opensans-600 hover:bg-lighter" :class="pageName === 'Inbox' ? 'bg-lighter' : 'bg-white'" to="/inbox">
                    <img v-if="pageName === 'Inbox'" src="/img/icon/inbox-active.png" class="mr-3.5"> 
                    <img v-else src="/img/icon/inbox.png" class="mr-3.5"> 
                    Inbox
                </router-link>
                <router-link class="w-full flex items-center p-5 text-sm font-opensans-600 hover:bg-lighter" :class="pageName === 'Tickets' ? 'bg-lighter' : 'bg-white'" to="/tickets">
                    <img v-if="pageName === 'Tickets'" src="/img/icon/tickets-active.png" class="mr-3.5"> 
                    <img v-else src="/img/icon/tickets.png" class="mr-3.5"> 
                    Tickets
                </router-link>
                <router-link class="w-full flex items-center p-5 text-sm font-opensans-600 hover:bg-lighter" :class="pageName === 'Reported Vendors' ? 'bg-lighter' : 'bg-white'" to="/reported-vendors">
                    <img v-if="pageName === 'Reported Vendors'" src="/img/icon/reported-vendors-active.png" class="mr-3.5"> 
                    <img v-else src="/img/icon/reported-vendors.png" class="mr-3.5"> 
                    Reported Vendors
                </router-link>
                <router-link class="w-full flex items-center p-5 text-sm font-opensans-600 hover:bg-lighter" :class="pageName === 'Users' ? 'bg-lighter' : 'bg-white'" to="/users">
                    <img v-if="pageName === 'Users'" src="/img/icon/users-active.png" class="mr-3.5"> 
                    <img v-else src="/img/icon/users.png" class="mr-3.5"> 
                    Users
                </router-link>
                <router-link class="w-full flex items-center p-5 text-sm font-opensans-600 hover:bg-lighter" :class="pageName === 'Reports' ? 'bg-lighter' : 'bg-white'" to="/reports">
                    <img v-if="pageName === 'Reports'" src="/img/icon/reports-active.png" class="mr-3.5"> 
                    <img v-else src="/img/icon/reports.png" class="mr-3.5"> 
                    Reports
                </router-link>
                <router-link class="w-full flex items-center p-5 text-sm font-opensans-600 hover:bg-lighter" :class="pageName === 'Settings' ? 'bg-lighter' : 'bg-white'" to="/settings">
                    <img v-if="pageName === 'Settings'" src="/img/icon/settings-active.png" class="mr-3.5"> 
                    <img v-else src="/img/icon/settings.png" class="mr-3.5"> 
                    Settings
                </router-link>
                <router-link class="w-full flex items-center p-5 text-sm font-opensans-600 hover:bg-lighter" :class="pageName === 'Activity' ? 'bg-lighter' : 'bg-white'" to="/activity">
                    <img v-if="pageName === 'Activity'" src="/img/icon/activity-active.png" class="mr-3.5"> 
                    <img v-else src="/img/icon/activity.png" class="mr-3.5"> 
                    Activity
                </router-link>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    setup: () => ({
        title: 'Sidebar'
    }),
    props: ['pageName'],
    data() {
        return {
            agencyName: "Department of Trade & Industry",
            agencyImg: "/img/dti-logo.png",
        };
    },
}
</script>
