<template>
    <AlertTop alertIcon="/img/icon/like.png" :active="sendSuccessful" content="Reset link sent to your email" v-if="sendSuccessful" @close="closeAlert">
    </AlertTop>
    <Layout headerBg="/img/background-login.png" headerTitle="Reset Password" headerText="We’ll send a reset link to your email">
        <form class="block" @submit.prevent="submitEmail">
            <div class="block pt-4 pb-2">
               <label for="username" class="text-base text-blue-grey text-xs font-inter-700">Username</label>
               <input type="email" name="username" id="username" class="mt-1 w-full main-input"/>
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

export default {
    setup: () => ({
        title: 'Reset Password'
    }),
    components: { Layout, AlertTop },
    data() {
        return {
            sendSuccessful: false,
        };
    },
    methods: {
        async submitEmail() {
            this.sendSuccessful = true
        },
        async closeAlert() {
            this.sendSuccessful = false
        }
    }
}
</script>

<style scoped>
</style>