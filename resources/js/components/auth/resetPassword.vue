<template>
    <AlertTop :alertIcon="'/img/icon/'+successIcon" :active="successAlert" :content="successMessage" v-if="successAlert" @close="successAlert = false"/>
    <Layout headerBg="/img/background-login.svg" headerTitle="Reset Password" headerText="We’ll send a reset link to your email" page="reset_password">
        <form onsubmit="return false"  class="block" @submit.prevent="submitEmail">
            <div class="block pt-4 pb-2">
               <label for="username" class="text-base text-blue-grey text-xs font-inter-700">Username</label>
               <input type="email" name="username" id="username" class="mt-1 w-full main-input" v-model="userEmail"/>
            </div>
            <div class="block py-4">
                <input type="submit" id="" value="Reset Password" class="cursor-pointer shadow-main rounded-lg w-full p-3 bg-blue text-white font-opensans-600 text-sm">
            </div>
            <div class="block pb-1 w-full">
                <router-link to="/login" class="mt-2 text-blue font-opensans-600 text-sm block text-center hover:underline">Go back</router-link>
            </div>
        </form>
    </Layout>
</template>

<script>
import Layout from './layout.vue'
import AlertTop from '../utilities/alertTop.vue'
import axios from 'axios'

export default {
    setup: () => ({
        title: 'Reset Password'
    }),
    components: { Layout, AlertTop },
    data() {
        return {
            sendSuccessful: false,
            userEmail: '',
            successAlert: false,
            successMessage: '',
            successIcon: null,
        };
    },
    methods: {
        //New Pass
        async submitEmail() {
            await axios.post('api/v1/auth/forgot-password', {
                email: this.userEmail,
            })
            .then((success) => {
                //Alert Content
                console.log(success.data.message)
                this.successAlert = true;
                this.successMessage = success.data.message;
                this.successIcon = 'like.svg';
            })
            .catch((error) => {
                console.log(error.response.data.errors)
                this.successAlert = true;
                this.successMessage = error.response.data.errors.email['0'];
                this.successIcon = 'warning-red.svg';
            })
        },
        async closeAlert() {
            this.successAlert = false
        }
    }
}
</script>

<style scoped>
</style>
