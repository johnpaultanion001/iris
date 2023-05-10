<template>
    <Layout headerBg="/img/background-login.png" headerTitle="Welcome back!" headerText="Enter your email & password to login">
        <form class="block" @submit.prevent="submitLogin">
            <div class="block pt-4 pb-2">
               <label for="username" class="text-base text-blue-grey text-xs font-inter-700">Username</label>
               <input type="email" v-model="username" name="username" id="username" class="mt-1 w-full main-input"/>
            </div>
            <div class="block relative py-2">
                <label for="password" class="text-base text-blue-grey text-xs font-inter-700">Password</label>
                <input v-if="showPassword" type="text" name="password" id="password" class="mt-1 w-full main-input" v-model="password"/>
                <input v-else type="password" name="password" id="password" class="mt-1 w-full main-input" v-model="password"/>
                <button type="button" class="show-icon" @click="{this.showPassword = !this.showPassword;}">
                    <img src="/img/icon/show.png" class="w-5">
                </button>
                <button v-if="showPassword" type="button" class="show-icon" @click="{this.showPassword = !this.showPassword;}">
                    <img src="/img/icon/show-active.png" class="w-5">
                </button>
            </div>
            <div class="flex items-center pt-2 pb-4">
                <input type="checkbox" id="remember-me" class="switch-toggle" name="remember-me">
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
import Layout from './layout.vue'
import axios from 'axios'

export default {
    setup: () => ({
        title: 'Login'
    }),
    components: { Layout },
    data() {
        return {
            username: '',
            showPassword: false,
            password: null,
        };
    },
    methods: {
        toggleShow() {
            this.showPassword = !this.showPassword;
        },
        async submitLogin(){
            const inputs =  {
                grant_type: "password",
                client_id: "2",
                client_secret: "PpwoA8Ef1K6jMDlx5TxHeHr4g5EEsQDHv30dizP0",
                scope: "",
                username: "admin@gmail.com",
                password: "password"
            };

            // const {data} = await axios.post('oauth/token', {
            //         'Accept': 'application/json, multipart/form-data', 
            //         'Content-Type': 'application/json; charset=UTF-8', 
            //         'Access-Control-Allow-Origin': '*',
            // }, inputs, {
            //     withCredentials: true
            // });

            await axios.post('https://iris.supsofttech.com/oauth/token', inputs, {
                withCredentials: true,
                header: {
                    'Accept': 'application/json, multipart/form-data', 
                    'Content-Type': 'application/json; charset=UTF-8', 
                    'Access-Control-Allow-Origin': '*',
                    'Access-Control-Allow-Headers': 'Content-Type, x-xsrf-token'
                },
            })
            .then((res) => {
                console.log(res.data['refresh_token'])
                axios.defaults.headers.common['Authorization'] = `Bearer ${res.data['refresh_token']}`;
                success = true
            })
            .catch((error) => {
                error = error.data
            })

            await this.$router.push("/new-password");
        }
    }
}
</script>

<style scoped>
/* Switch Toggle */
.switch-toggle[type="checkbox"] {
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
.switch-toggle:checked[type="checkbox"] {
    background: #54A581;
}
.switch-toggle[type="checkbox"]:before {
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
.switch-toggle:checked[type="checkbox"]:before {
    left: 19px;
}
</style>