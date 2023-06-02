<template>
    <div class="navigation grid gap-1 grid-cols-5 xl:grid-cols-6 mb-4">
        <div class="col-span-1 flex items-center">
            <router-link to="/">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                    <path d="M8.70711 0.292893C8.31658 -0.0976311 7.68342 -0.0976311 7.29289 0.292893L0.292893 7.29289C-0.0976311 7.68342 -0.0976311 8.31658 0.292893 8.70711C0.683417 9.09763 1.31658 9.09763 1.70711 8.70711L2 8.41421V15C2 15.5523 2.44772 16 3 16H5C5.55228 16 6 15.5523 6 15V13C6 12.4477 6.44772 12 7 12H9C9.55229 12 10 12.4477 10 13V15C10 15.5523 10.4477 16 11 16H13C13.5523 16 14 15.5523 14 15V8.41421L14.2929 8.70711C14.6834 9.09763 15.3166 9.09763 15.7071 8.70711C16.0976 8.31658 16.0976 7.68342 15.7071 7.29289L8.70711 0.292893Z" fill="#ffffff"/>
                </svg>
            </router-link>
        </div>
        <div class="col-span-1 flex items-center">
            <button @click="setMenu">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="14" viewBox="0 0 18 14" fill="none">
                    <path d="M1 1H17M1 7H17M1 13H17" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
        </div>
        <div class="col-span-3 xl:col-span-4 flex items-center relative">
            <div @click="dropdown = !dropdown" class="w-full flex items-center justify-end">
                <img :src="userImg" class="mr-2 w-9 h-9 rounded-full">
                <p class="text-base text-white font-inter-700">Hi, {{ userFirstName }} 👋</p>
            </div>
            <div v-if="dropdown" class="dropdown absolute top-14 right-0 rounded-lg bg-white shadow-secondary overflow-hidden">
                <router-link to="/settings" class="p-5 flex items-center hover:bg-lighter">
                    <div class="w-7 relative">
                        <img src="/img/icon/user.png">
                    </div>
                    <p class="font-inter-400 text-sm text-black">Profile & Settings</p>
                </router-link>
                <div @click="logout()" class="p-5 flex items-center hover:bg-lighter">
                    <div class="w-7 relative">
                        <img src="/img/icon/logout.png">
                    </div>
                    <p class="font-inter-400 text-sm text-black">Logout</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    setup: () => ({
        title: 'Navigation'
    }),
    data() {
        return {
            userFirstName: "",
            userImg: "",
            dropdown: false,
            grant_type: 'password',
            client_id: '2',
            client_secret: 'NG9cF4LP3pttCZdipGszpmPHvnyg8rwwfuVLHRsr',
            scope: '',
            username: '',
            password: ''
        };
    },
    emits: ["menu"],
    async mounted() {
        this.getUser();
    },
    methods: {
        setMenu() {
            this.$emit("menu", true);
        },
        //Get User
        async getUser(){
            this.pageNumber = 0;
            const response = await axios.get('api/v1/profile');
            //Filter User Data
            this.userFirstName = response.data.data.name;
            this.userImg = response.data.data.profile;
        },
        async logout(){
            await axios.post('api/v1/logout', {}, {
                withCredentials: true,
                header: {
                    'Accept': 'application/json, multipart/form-data',
                    'Content-Type': 'application/json; charset=UTF-8',
                    'Access-Control-Allow-Origin': '*',
                    'Access-Control-Allow-Headers': 'Content-Type, x-xsrf-token'
                },
            })
            .then((res) => {
                localStorage.setItem('token', '');
                window.location.href = "/login";
            })
            .catch((error) => {
                console.log(error.message)
            })
        }
    },
}
</script>
