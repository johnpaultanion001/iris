<template>
    <div class="py-4 pl-2 h-full">
        <div class="sidebar bg-lighter rounded-2xl h-full w-full overflow-hidden shadow-secondary">
            <div class="sidebar-header p-4 border border-t-0 border-x-0 border-b-1-light">
                <img src="/img/iris-logo-blue.png" class="mx-auto"> 
            </div>
            <div class="sidebar-body bg-white py-0 px-2.5 h-full">  
                <div class="agency-title w-full flex items-center pt-4 pb-3">
                    <div class="rounded-full border mr-3 block">
                        <img :src="agencyImg" style="width: 50px; height: 50px;max-width: 50px;max-height: 50px;padding: 7px;"> 
                    </div>
                    <p class="text-sm text-blue-grey font-opensans-600">{{ agencyName }}</p>
                </div>
                <router-link class="rounded w-full flex items-center mb-1 py-4.5 px-5 text-sm font-opensans-600  border-l-4 hover:bg-lighter" :class="pageName === 'Dashboard' ? 'border-blue bg-lighter' : 'bg-white border-transparent'" to="/">
                    <div class="mr-3.5 relative">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                            <path d="M8.70711 0.292893C8.31658 -0.0976311 7.68342 -0.0976311 7.29289 0.292893L0.292893 7.29289C-0.0976311 7.68342 -0.0976311 8.31658 0.292893 8.70711C0.683417 9.09763 1.31658 9.09763 1.70711 8.70711L2 8.41421V15C2 15.5523 2.44772 16 3 16H5C5.55228 16 6 15.5523 6 15V13C6 12.4477 6.44772 12 7 12H9C9.55229 12 10 12.4477 10 13V15C10 15.5523 10.4477 16 11 16H13C13.5523 16 14 15.5523 14 15V8.41421L14.2929 8.70711C14.6834 9.09763 15.3166 9.09763 15.7071 8.70711C16.0976 8.31658 16.0976 7.68342 15.7071 7.29289L8.70711 0.292893Z" :fill="pageName === 'Dashboard' ? '#1267E6' : '#525F7F'"/>
                        </svg>
                    </div>
                    <p :class="pageName === 'Dashboard' ? 'text-blue' : 'text-blue-grey'">Dashboard</p>
                </router-link>
                <router-link class="rounded w-full flex items-center mb-1 py-4.5 px-5 text-sm font-opensans-600  border-l-4 hover:bg-lighter" :class="pageName === 'Inbox' ? 'border-blue bg-lighter' : 'bg-white border-transparent'" to="/inbox">
                    <div class="mr-3.5 relative">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="12" viewBox="0 0 16 12" fill="none">
                            <path d="M0.00300002 1.884L8 5.882L15.997 1.884C15.9674 1.37444 15.7441 0.895488 15.3728 0.545227C15.0016 0.194965 14.5104 -9.35847e-05 14 3.36834e-08H2C1.48958 -9.35847e-05 0.998447 0.194965 0.627178 0.545227C0.255908 0.895488 0.0326041 1.37444 0.00300002 1.884Z" :fill="pageName === 'Inbox' ? '#1267E6' : '#525F7F'"/>
                            <path d="M16 4.118L8 8.118L0 4.118V10C0 10.5304 0.210714 11.0391 0.585786 11.4142C0.960859 11.7893 1.46957 12 2 12H14C14.5304 12 15.0391 11.7893 15.4142 11.4142C15.7893 11.0391 16 10.5304 16 10V4.118Z" :fill="pageName === 'Inbox' ? '#1267E6' : '#525F7F'"/>
                        </svg>
                    </div>
                    <p :class="pageName === 'Inbox' ? 'text-blue' : 'text-blue-grey'">Inbox</p>
                </router-link>
                <router-link class="rounded w-full flex items-center mb-1 py-4.5 px-5 text-sm font-opensans-600  border-l-4 hover:bg-lighter" :class="pageName === 'Tickets' ? 'border-blue bg-lighter' : 'bg-white border-transparent'" to="/tickets">
                    <div class="mr-3.5 relative">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="18" viewBox="0 0 16 18" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8 0.944336C5.91528 2.81021 3.17437 3.95797 0.166107 3.99878C0.0568637 4.64956 0 5.31809 0 5.99991C0 11.2248 3.33923 15.6697 8 17.317C12.6608 15.6697 16 11.2248 16 5.99991C16 5.31809 15.9431 4.64956 15.8339 3.99878C12.8256 3.95797 10.0847 2.81021 8 0.944336ZM9 5.99988C9 5.44759 8.55229 4.99988 8 4.99988C7.44772 4.99988 7 5.44759 7 5.99988C7 6.55216 7.44772 6.99988 8 6.99988C8.55229 6.99988 9 6.55216 9 5.99988ZM9 12.9999C9 13.5522 8.55229 13.9999 8 13.9999C7.44772 13.9999 7 13.5522 7 12.9999V9.99988C7 9.44759 7.44772 8.99988 8 8.99988C8.55229 8.99988 9 9.44759 9 9.99988V12.9999Z" :fill="pageName === 'Tickets' ? '#1267E6' : '#525F7F'"/>
                        </svg>
                    </div>
                    <p :class="pageName === 'Tickets' ? 'text-blue' : 'text-blue-grey'">Intelligence</p>
                </router-link>
                <!-- <router-link class="rounded w-full flex items-center mb-1 py-4.5 px-5 text-sm font-opensans-600  border-l-4 hover:bg-lighter" :class="pageName === 'Tickets' ? 'border-blue bg-lighter' : 'bg-white border-transparent'" to="/tickets">
                    <div class="mr-3.5 relative">
                        <img v-if="pageName === 'Tickets'" src="/img/icon/tickets-active.svg" class="absolute"> 
                        <img src="/img/icon/tickets.svg"> 
                    </div>
                    <p :class="pageName === 'Tickets' ? 'text-blue' : 'text-blue-grey'">Tickets</p>
                </router-link> -->
                <router-link class="rounded w-full flex items-center mb-1 py-4.5 px-5 text-sm font-opensans-600  border-l-4 hover:bg-lighter" :class="pageName === 'Reported Vendors' ? 'border-blue bg-lighter' : 'bg-white border-transparent'" to="/reported-vendors">
                    <div class="mr-3.5 relative">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="15" viewBox="0 0 18 15" fill="none">
                            <path d="M12 3C12 4.65685 10.6569 6 9 6C7.34315 6 6 4.65685 6 3C6 1.34315 7.34315 0 9 0C10.6569 0 12 1.34315 12 3Z" :fill="pageName === 'Reported Vendors' ? '#1267E6' : '#525F7F'"/>
                            <path d="M17 5C17 6.10457 16.1046 7 15 7C13.8954 7 13 6.10457 13 5C13 3.89543 13.8954 3 15 3C16.1046 3 17 3.89543 17 5Z" :fill="pageName === 'Reported Vendors' ? '#1267E6' : '#525F7F'"/>
                            <path d="M13 12C13 9.79086 11.2091 8 9 8C6.79086 8 5 9.79086 5 12V15H13V12Z" :fill="pageName === 'Reported Vendors' ? '#1267E6' : '#525F7F'"/>
                            <path d="M5 5C5 6.10457 4.10457 7 3 7C1.89543 7 1 6.10457 1 5C1 3.89543 1.89543 3 3 3C4.10457 3 5 3.89543 5 5Z" :fill="pageName === 'Reported Vendors' ? '#1267E6' : '#525F7F'"/>
                            <path d="M15 15V12C15 10.9459 14.7282 9.9552 14.2507 9.09432C14.4902 9.03275 14.7413 9 15 9C16.6569 9 18 10.3431 18 12V15H15Z" :fill="pageName === 'Reported Vendors' ? '#1267E6' : '#525F7F'"/>
                            <path d="M3.74926 9.09432C3.27185 9.9552 3 10.9459 3 12V15H0V12C0 10.3431 1.34315 9 3 9C3.25871 9 3.50977 9.03275 3.74926 9.09432Z" :fill="pageName === 'Reported Vendors' ? '#1267E6' : '#525F7F'"/>
                        </svg>
                    </div>
                    <p :class="pageName === 'Reported Vendors' ? 'text-blue' : 'text-blue-grey'">Reported Vendors</p>
                </router-link>
                <router-link class="rounded w-full flex items-center mb-1 py-4.5 px-5 text-sm font-opensans-600  border-l-4 hover:bg-lighter" :class="pageName === 'Users' ? 'border-blue bg-lighter' : 'bg-white border-transparent'" to="/users">
                    <div class="mr-3.5 relative">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="14" viewBox="0 0 18 14" fill="none">
                            <path d="M8 3C8 4.65685 6.65685 6 5 6C3.34315 6 2 4.65685 2 3C2 1.34315 3.34315 0 5 0C6.65685 0 8 1.34315 8 3Z" :fill="pageName === 'Users' ? '#1267E6' : '#525F7F'"/>
                            <path d="M16 3C16 4.65685 14.6569 6 13 6C11.3431 6 10 4.65685 10 3C10 1.34315 11.3431 0 13 0C14.6569 0 16 1.34315 16 3Z" :fill="pageName === 'Users' ? '#1267E6' : '#525F7F'"/>
                            <path d="M11.9291 14C11.9758 13.6734 12 13.3395 12 13C12 11.3648 11.4393 9.86059 10.4998 8.66907C11.2352 8.24355 12.0892 8 13 8C15.7614 8 18 10.2386 18 13V14H11.9291Z" :fill="pageName === 'Users' ? '#1267E6' : '#525F7F'"/>
                            <path d="M5 8C7.76142 8 10 10.2386 10 13V14H0V13C0 10.2386 2.23858 8 5 8Z" :fill="pageName === 'Users' ? '#1267E6' : '#525F7F'"/>
                        </svg>
                    </div>
                    <p :class="pageName === 'Users' ? 'text-blue' : 'text-blue-grey'">Users</p>
                </router-link>
                <router-link class="rounded w-full flex items-center mb-1 py-4.5 px-5 text-sm font-opensans-600  border-l-4 hover:bg-lighter" :class="pageName === 'Reports' ? 'border-blue bg-lighter' : 'bg-white border-transparent'" to="/reports">
                    <div class="mr-3.5 relative">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="16" viewBox="0 0 12 16" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M2 0C0.89543 0 0 0.895432 0 2V14C0 15.1046 0.89543 16 2 16H10C11.1046 16 12 15.1046 12 14V5.41421C12 4.88378 11.7893 4.37507 11.4142 4L8 0.585786C7.62493 0.210714 7.11622 0 6.58579 0H2ZM4 10C4 9.44771 3.55228 9 3 9C2.44772 9 2 9.44771 2 10V13C2 13.5523 2.44772 14 3 14C3.55228 14 4 13.5523 4 13V10ZM6 7C6.55228 7 7 7.44772 7 8V13C7 13.5523 6.55228 14 6 14C5.44772 14 5 13.5523 5 13V8C5 7.44772 5.44772 7 6 7ZM10 6C10 5.44772 9.55229 5 9 5C8.44771 5 8 5.44772 8 6V13C8 13.5523 8.44771 14 9 14C9.55229 14 10 13.5523 10 13V6Z" :fill="pageName === 'Reports' ? '#1267E6' : '#525F7F'"/>
                        </svg>
                    </div>
                    <p :class="pageName === 'Reports' ? 'text-blue' : 'text-blue-grey'">Reports</p>
                </router-link>
                <router-link class="rounded w-full flex items-center mb-1 py-4.5 px-5 text-sm font-opensans-600  border-l-4 hover:bg-lighter" :class="pageName === 'Settings' ? 'border-blue bg-lighter' : 'bg-white border-transparent'" to="/settings">
                    <div class="mr-3.5 relative">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.48922 1.17094C9.1102 -0.390313 6.8898 -0.390314 6.51078 1.17094C6.26594 2.17949 5.11045 2.65811 4.22416 2.11809C2.85218 1.28212 1.28212 2.85218 2.11809 4.22416C2.65811 5.11045 2.17949 6.26593 1.17094 6.51078C-0.390314 6.8898 -0.390313 9.1102 1.17094 9.48922C2.17949 9.73407 2.65811 10.8896 2.11809 11.7758C1.28212 13.1478 2.85218 14.7179 4.22417 13.8819C5.11045 13.3419 6.26594 13.8205 6.51078 14.8291C6.8898 16.3903 9.1102 16.3903 9.48922 14.8291C9.73407 13.8205 10.8896 13.3419 11.7758 13.8819C13.1478 14.7179 14.7179 13.1478 13.8819 11.7758C13.3419 10.8896 13.8205 9.73407 14.8291 9.48922C16.3903 9.1102 16.3903 6.8898 14.8291 6.51078C13.8205 6.26593 13.3419 5.11045 13.8819 4.22416C14.7179 2.85218 13.1478 1.28212 11.7758 2.11809C10.8896 2.65811 9.73407 2.17949 9.48922 1.17094ZM8 11C9.65685 11 11 9.65685 11 8C11 6.34315 9.65685 5 8 5C6.34315 5 5 6.34315 5 8C5 9.65685 6.34315 11 8 11Z" :fill="pageName === 'Settings' ? '#1267E6' : '#525F7F'"/>
                        </svg>
                    </div>
                    <p :class="pageName === 'Settings' ? 'text-blue' : 'text-blue-grey'">Settings</p>
                </router-link>
                <router-link class="rounded w-full flex items-center mb-1 py-4.5 px-5 text-sm font-opensans-600  border-l-4 hover:bg-lighter" :class="pageName === 'Activity' ? 'border-blue bg-lighter' : 'bg-white border-transparent'" to="/activity">
                    <div class="mr-3.5 relative">
                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="17" viewBox="0 0 13 17" fill="none">
                            <path d="M1 2C1 0.895432 1.89543 0 3 0H7.58579C8.11622 0 8.62493 0.210714 9 0.585786L12.4142 4C12.7893 4.37507 13 4.88378 13 5.41421V14C13 15.1046 12.1046 16 11 16H9.47221C10.4223 14.9385 11 13.5367 11 12C11 8.68629 8.31371 6 5 6C3.46329 6 2.06151 6.57771 1 7.52779V2Z" :fill="pageName === 'Activity' ? '#1267E6' : '#525F7F'"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M5 8C2.79086 8 1 9.79086 1 12C1 12.7414 1.20229 13.4364 1.55397 14.0318L0.292893 15.2929C-0.097631 15.6834 -0.0976311 16.3166 0.292893 16.7071C0.683417 17.0976 1.31658 17.0976 1.70711 16.7071L2.96818 15.446C3.56362 15.7977 4.25862 16 5 16C7.20914 16 9 14.2091 9 12C9 9.79086 7.20914 8 5 8ZM3 12C3 10.8954 3.89543 10 5 10C6.10457 10 7 10.8954 7 12C7 13.1046 6.10457 14 5 14C4.44744 14 3.94881 13.7772 3.58579 13.4142C3.22276 13.0512 3 12.5526 3 12Z" :fill="pageName === 'Activity' ? '#1267E6' : '#525F7F'"/>
                        </svg>
                    </div>
                    <p :class="pageName === 'Activity' ? 'text-blue' : 'text-blue-grey'">Activity</p>
                </router-link>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    setup: () => ({
        title: 'Sidebar'
    }),
    props: ['pageName', 'show'],
    async mounted() {
        this.getUser();
    },
    data() {
        return {
            agencyName: "",
            agencyImg: "",
        };
    },
    methods: {
        //Get User
        async getUser(){
            this.pageNumber = 0;
            const response = await axios.get('api/v1/profile');
            //Filter User Data
            this.agencyName = response.data.data.assigned_agencies.agency;
            this.agencyImg = response.data.data.assigned_agencies.logo;
        },
    },
}
</script>
