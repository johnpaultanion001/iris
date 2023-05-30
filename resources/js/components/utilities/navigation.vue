<template>
    <div class="navigation grid gap-1 grid-cols-5 xl:grid-cols-6 mb-4">
        <div class="col-span-1 flex items-center">
            <router-link to="/"><img src="/img/icon/home-white.png"> </router-link>
        </div>
        <div class="col-span-1 flex items-center">
            <button @click="setMenu"><img src="/img/icon/menu-white.png"> </button>
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
            client_secret: 'kMAUXaAjjgTPI2BJtNXZyIyRW9xYWNtEb5bIuDgZ',
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
