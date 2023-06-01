<template>
    <Layout headerBg="/img/background-login.svg" headerTitle="Welcome back!" headerText="Enter your email & password to login" page="login">
        <form class="block" @submit.prevent="submitLogin">
            <div class="block pt-4 pb-2">
               <label for="username" class="text-base text-blue-grey text-xs font-inter-700">Username</label>
               <input type="email" v-model="username" name="username" id="username" class="mt-1 w-full main-input"/>
            </div>
            <div class="block relative py-2">
                <label for="password" class="text-base text-blue-grey text-xs font-inter-700">Password</label>
                <input v-if="showPassword" type="text" name="password" id="password" class="mt-1 w-full main-input" v-model="password"/>
                <input v-else type="password" name="password" id="password" class="mt-1 w-full main-input" v-model="password"/>
                <button type="button" class="show-icon" @click="{showPassword = !showPassword;}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none" :style="showPassword ? 'fill: #1267E5' : 'fill: #CED4DA'">
                        <path d="M10 12.9697C11.1046 12.9697 12 12.0743 12 10.9697C12 9.86516 11.1046 8.96973 10 8.96973C8.89544 8.96973 8.00001 9.86516 8.00001 10.9697C8.00001 12.0743 8.89544 12.9697 10 12.9697Z"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0.457764 10.9698C1.73202 6.91264 5.52232 3.96973 9.99997 3.96973C14.4776 3.96973 18.2679 6.91261 19.5422 10.9697C18.2679 15.0268 14.4776 17.9697 9.99995 17.9697C5.52232 17.9697 1.73204 15.0269 0.457764 10.9698ZM14 10.9697C14 13.1789 12.2091 14.9697 10 14.9697C7.79087 14.9697 6.00001 13.1789 6.00001 10.9697C6.00001 8.76059 7.79087 6.96973 10 6.96973C12.2091 6.96973 14 8.76059 14 10.9697Z"/>
                    </svg>
                </button>
            </div>
            <div class="flex items-center pt-2 pb-4">
                <input @click="isRemember = !isRemember" v-model="isRemember" type="checkbox" id="remember-me" :class="isRemember ? 'checked' : 'unchecked'" name="remember-me">
                <label for="remember-me" class="ml-2 text-blue-grey text-xs font-inter-400">Remember me</label>
            </div>
            <div class="block py-4">
                <input type="submit" id="" value="Login" class="cursor-pointer shadow-main rounded-lg w-full p-3 bg-blue text-white font-opensans-600 text-sm">
            </div>
            <div class="block pb-1 w-full">
                <router-link to="/reset-password" class="mt-2 text-blue font-opensans-600 text-sm block text-center hover:underline">Forgot Password</router-link>
            </div>
        </form>
    </Layout>
</template>

<script>
import { onMounted } from 'vue';
import Layout from './layout.vue'
import axios from 'axios'

export default {
    setup: () => ({
        title: 'Login'
    }),
    components: { Layout },
    data() {
        return {
            showPassword: false,
            isRemember: false,
            grant_type: 'password',
            client_id: '2',
            client_secret: 'NG9cF4LP3pttCZdipGszpmPHvnyg8rwwfuVLHRsr',
            scope: '',
            username: '',
            password: ''
        };
    },
    async mounted(){
        this.username = localStorage.getItem('iris-username');
        this.password = localStorage.getItem('iris-password');
    },
    methods: {
        toggleShow() {
            this.showPassword = !this.showPassword;
        },
        async submitLogin(){
            const inputs =  {
                grant_type: this.grant_type,
                client_id: this.client_id,
                client_secret: this.client_secret,
                scope: "",
                username: this.username,
                password: this.password
            };

            await axios.post('api/v1/auth/oauth/token', inputs, {
                withCredentials: true,
                header: {
                    'Accept': 'application/json, multipart/form-data',
                    'Content-Type': 'application/json; charset=UTF-8',
                    'Access-Control-Allow-Origin': '*',
                    'Access-Control-Allow-Headers': 'Content-Type, x-xsrf-token'
                },
            })
            .then((res) => {
                localStorage.setItem('token', res.data['access_token']);
                if(this.isRemember){
                    localStorage.setItem('iris-username', this.username);
                    localStorage.setItem('iris-password', this.password);
                }else{
                    localStorage.setItem('iris-username', '');
                    localStorage.setItem('iris-password', '');
                }
                // this.$router.push("/");
                window.location.href = "/";
            })
            .catch((error) => {
                console.log(error.message)
            })
        },
    }
}
</script>

<style scoped>
/* Switch Toggle */
.unchecked[type="checkbox"] {
    position: relative;
    width: 40px;
    height: 24px;
    -webkit-appearance: none;
    background: #c6c6c6;
    outline: none;
    border-radius: 20px;
    box-shadow: inset 0 0 5px rgba(255, 0, 0, 0.2);
    transition: 0.2s;
}
.unchecked[type="checkbox"]:before {
    content: '';
    position: absolute;
    width: 18px;
    height: 18px;
    border-radius: 20px;
    top: 3px;
    left: 4px;
    background: #ffffff;
    transition: .2s;
}
.checked[type="checkbox"] {
    position: relative;
    width: 40px;
    height: 24px;
    -webkit-appearance: none;
    background: #c6c6c6;
    outline: none;
    border-radius: 20px;
    box-shadow: inset 0 0 5px rgba(255, 0, 0, 0.2);
    transition: 0.2s;
}
.checked:checked[type="checkbox"] {
    background: #54A581;
}
.checked[type="checkbox"]:before {
    content: '';
    position: absolute;
    width: 18px;
    height: 18px;
    border-radius: 20px;
    top: 3px;
    left: 4px;
    background: #ffffff;
    transition: .2s;
}
.checked:checked[type="checkbox"]:before {
    left: 19px;
}
</style>
