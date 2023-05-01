<template>
    <div class="py-4 pl-2 h-screen">
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
                    <div class="mr-3.5 relative">
                        <img v-if="pageName === 'Dashboard'" src="/img/icon/home-active.png" class="absolute">
                        <img src="/img/icon/home.png"> 
                    </div>
                    <p :class="pageName === 'Dashboard' ? 'text-blue' : 'text-blue-grey'">Dashboard</p>
                </router-link>
                <router-link class="w-full flex items-center p-5 text-sm font-opensans-600 hover:bg-lighter" :class="pageName === 'Inbox' ? 'bg-lighter' : 'bg-white'" to="/inbox">
                    <div class="mr-3.5 relative">
                        <img v-if="pageName === 'Inbox'" src="/img/icon/inbox-active.png" class="absolute"> 
                        <img src="/img/icon/inbox.png" class="mr-3.5"> 
                    </div>
                    <p :class="pageName === 'Inbox' ? 'text-blue' : 'text-blue-grey'">Inbox</p>
                </router-link>
                <router-link class="w-full flex items-center p-5 text-sm font-opensans-600 hover:bg-lighter" :class="pageName === 'Tickets' ? 'bg-lighter' : 'bg-white'" to="/tickets">
                    <div class="mr-3.5 relative">
                        <img v-if="pageName === 'Tickets'" src="/img/icon/tickets-active.png" class="absolute"> 
                        <img src="/img/icon/tickets.png" class="mr-3.5"> 
                    </div>
                    <p :class="pageName === 'Tickets' ? 'text-blue' : 'text-blue-grey'">Tickets</p>
                </router-link>
                <router-link class="w-full flex items-center p-5 text-sm font-opensans-600 hover:bg-lighter" :class="pageName === 'Reported Vendors' ? 'bg-lighter' : 'bg-white'" to="/reported-vendors">
                    <div class="mr-3.5 relative">
                        <img v-if="pageName === 'Reported Vendors'" src="/img/icon/reported-vendors-active.png" class="absolute"> 
                        <img src="/img/icon/reported-vendors.png" class="mr-3.5"> 
                    </div>
                    <p :class="pageName === 'Reported Vendors' ? 'text-blue' : 'text-blue-grey'">Reported Vendors</p>
                </router-link>
                <router-link class="w-full flex items-center p-5 text-sm font-opensans-600 hover:bg-lighter" :class="pageName === 'Users' ? 'bg-lighter' : 'bg-white'" to="/users">
                    <div class="mr-3.5 relative">
                        <img v-if="pageName === 'Users'" src="/img/icon/users-active.png" class="absolute"> 
                        <img src="/img/icon/users.png" class="mr-3.5"> 
                    </div>
                    <p :class="pageName === 'Users' ? 'text-blue' : 'text-blue-grey'">Users</p>
                </router-link>
                <router-link class="w-full flex items-center p-5 text-sm font-opensans-600 hover:bg-lighter" :class="pageName === 'Reports' ? 'bg-lighter' : 'bg-white'" to="/reports">
                    <div class="mr-3.5 relative">
                        <img v-if="pageName === 'Reports'" src="/img/icon/reports-active.png" class="absolute"> 
                        <img src="/img/icon/reports.png" class="mr-3.5"> 
                    </div>
                    <p :class="pageName === 'Reports' ? 'text-blue' : 'text-blue-grey'">Reports</p>
                </router-link>
                <router-link class="w-full flex items-center p-5 text-sm font-opensans-600 hover:bg-lighter" :class="pageName === 'Settings' ? 'bg-lighter' : 'bg-white'" to="/settings">
                    <div class="mr-3.5 relative">
                        <img v-if="pageName === 'Settings'" src="/img/icon/settings-active.png" class="absolute"> 
                        <img src="/img/icon/settings.png" class="mr-3.5"> 
                    </div>
                    <p :class="pageName === 'Settings' ? 'text-blue' : 'text-blue-grey'">Settings</p>
                </router-link>
                <router-link class="w-full flex items-center p-5 text-sm font-opensans-600 hover:bg-lighter" :class="pageName === 'Activity' ? 'bg-lighter' : 'bg-white'" to="/activity">
                    <div class="mr-3.5 relative">
                        <img v-if="pageName === 'Activity'" src="/img/icon/activity-active.png" class="absolute"> 
                        <img src="/img/icon/activity.png" class="mr-3.5"> 
                    </div>
                    <p :class="pageName === 'Activity' ? 'text-blue' : 'text-blue-grey'">Activity</p>
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
    props: ['pageName', 'show'],
    data() {
        return {
            agencyName: "Department of Trade & Industry",
            agencyImg: "/img/dti-logo.png",
        };
    },
}
</script>
