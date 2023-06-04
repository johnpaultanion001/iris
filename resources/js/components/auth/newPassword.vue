<template>
    <AlertTop :alertIcon="'/img/icon/'+successIcon" :active="successAlert" :content="successMessage" v-if="successAlert" @close="successAlert = false"/>
    <Layout headerBg="/img/background-password.svg" :headerTitle="'Hi, ' + userFirstName" headerText="Secure your account by creating a new password">
        <div class="block">
            <div class="block relative pt-4 pb-2">
                <label for="password" class="text-base text-blue-grey text-xs font-inter-700">New password</label>
                <input @input="checkPassword" v-if="showPassword" type="text" name="newpassword" id="newpassword" class="mt-1 w-full main-input" v-model="password"/>
                <input @input="checkPassword" v-else type="password" name="newpassword" id="newpassword" class="mt-1 w-full main-input" v-model="password"/>
                <button type="button" class="show-icon" @click="{showPassword = !showPassword;}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none" :style="showPassword ? 'fill: #1267E5' : 'fill: #CED4DA'">
                        <path d="M10 12.9697C11.1046 12.9697 12 12.0743 12 10.9697C12 9.86516 11.1046 8.96973 10 8.96973C8.89544 8.96973 8.00001 9.86516 8.00001 10.9697C8.00001 12.0743 8.89544 12.9697 10 12.9697Z"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0.457764 10.9698C1.73202 6.91264 5.52232 3.96973 9.99997 3.96973C14.4776 3.96973 18.2679 6.91261 19.5422 10.9697C18.2679 15.0268 14.4776 17.9697 9.99995 17.9697C5.52232 17.9697 1.73204 15.0269 0.457764 10.9698ZM14 10.9697C14 13.1789 12.2091 14.9697 10 14.9697C7.79087 14.9697 6.00001 13.1789 6.00001 10.9697C6.00001 8.76059 7.79087 6.96973 10 6.96973C12.2091 6.96973 14 8.76059 14 10.9697Z"/>
                    </svg>
                </button>
            </div>
            <div class="block relative py-2">
                <label for="password" class="text-base text-blue-grey text-xs font-inter-700">Re-enter new password</label>
                <input @input="checkPassword" v-if="showCPassword" type="text" name="c-password" id="c-password" class="mt-1 w-full main-input" v-model="cPassword"/>
                <input @input="checkPassword" v-else type="password" name="c-password" id="c-password" class="mt-1 w-full main-input" v-model="cPassword"/>
                <button type="button" class="show-icon" @click="{showCPassword = !showCPassword;}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none" :style="showCPassword ? 'fill: #1267E5' : 'fill: #CED4DA'">
                        <path d="M10 12.9697C11.1046 12.9697 12 12.0743 12 10.9697C12 9.86516 11.1046 8.96973 10 8.96973C8.89544 8.96973 8.00001 9.86516 8.00001 10.9697C8.00001 12.0743 8.89544 12.9697 10 12.9697Z"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0.457764 10.9698C1.73202 6.91264 5.52232 3.96973 9.99997 3.96973C14.4776 3.96973 18.2679 6.91261 19.5422 10.9697C18.2679 15.0268 14.4776 17.9697 9.99995 17.9697C5.52232 17.9697 1.73204 15.0269 0.457764 10.9698ZM14 10.9697C14 13.1789 12.2091 14.9697 10 14.9697C7.79087 14.9697 6.00001 13.1789 6.00001 10.9697C6.00001 8.76059 7.79087 6.96973 10 6.96973C12.2091 6.96973 14 8.76059 14 10.9697Z"/>
                    </svg>
                </button>
            </div>
            <div class="password-checklist mt-2.5">
                <p class="flex items-center mb-3 font-inter-400 text-xs" :class="{ 'opacity-40': !verCharacters }">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="11" viewBox="0 0 14 11" fill="none" class="w-3.5 h-2.5 mr-2.5">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M13.7071 1.26262C14.0976 1.65314 14.0976 2.28631 13.7071 2.67683L5.70711 10.6768C5.31658 11.0674 4.68342 11.0674 4.29289 10.6768L0.292893 6.67683C-0.0976311 6.28631 -0.0976311 5.65314 0.292893 5.26262C0.683417 4.8721 1.31658 4.8721 1.70711 5.26262L5 8.55551L12.2929 1.26262C12.6834 0.872095 13.3166 0.872095 13.7071 1.26262Z" fill="#1267E5"/>
                    </svg> 
                    Use 8-32 characters</p>
                <p class="flex items-center mb-3 font-inter-400 text-xs" :class="{ 'opacity-40': !verOneNumber }">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="11" viewBox="0 0 14 11" fill="none" class="w-3.5 h-2.5 mr-2.5">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M13.7071 1.26262C14.0976 1.65314 14.0976 2.28631 13.7071 2.67683L5.70711 10.6768C5.31658 11.0674 4.68342 11.0674 4.29289 10.6768L0.292893 6.67683C-0.0976311 6.28631 -0.0976311 5.65314 0.292893 5.26262C0.683417 4.8721 1.31658 4.8721 1.70711 5.26262L5 8.55551L12.2929 1.26262C12.6834 0.872095 13.3166 0.872095 13.7071 1.26262Z" fill="#1267E5"/>
                    </svg> 
                    Use at least one number</p>
                <p class="flex items-center mb-3 font-inter-400 text-xs" :class="{ 'opacity-40': !verOneSymbol }">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="11" viewBox="0 0 14 11" fill="none" class="w-3.5 h-2.5 mr-2.5">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M13.7071 1.26262C14.0976 1.65314 14.0976 2.28631 13.7071 2.67683L5.70711 10.6768C5.31658 11.0674 4.68342 11.0674 4.29289 10.6768L0.292893 6.67683C-0.0976311 6.28631 -0.0976311 5.65314 0.292893 5.26262C0.683417 4.8721 1.31658 4.8721 1.70711 5.26262L5 8.55551L12.2929 1.26262C12.6834 0.872095 13.3166 0.872095 13.7071 1.26262Z" fill="#1267E5"/>
                    </svg> 
                    Use at least one symbol</p>
                <p class="flex items-center mb-3 font-inter-400 text-xs" :class="{ 'opacity-40': !verOneLower }">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="11" viewBox="0 0 14 11" fill="none" class="w-3.5 h-2.5 mr-2.5">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M13.7071 1.26262C14.0976 1.65314 14.0976 2.28631 13.7071 2.67683L5.70711 10.6768C5.31658 11.0674 4.68342 11.0674 4.29289 10.6768L0.292893 6.67683C-0.0976311 6.28631 -0.0976311 5.65314 0.292893 5.26262C0.683417 4.8721 1.31658 4.8721 1.70711 5.26262L5 8.55551L12.2929 1.26262C12.6834 0.872095 13.3166 0.872095 13.7071 1.26262Z" fill="#1267E5"/>
                    </svg> 
                    Use at least one lower case letter</p>
                <p class="flex items-center mb-3 font-inter-400 text-xs" :class="{ 'opacity-40': !verOneUpper }">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="11" viewBox="0 0 14 11" fill="none" class="w-3.5 h-2.5 mr-2.5">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M13.7071 1.26262C14.0976 1.65314 14.0976 2.28631 13.7071 2.67683L5.70711 10.6768C5.31658 11.0674 4.68342 11.0674 4.29289 10.6768L0.292893 6.67683C-0.0976311 6.28631 -0.0976311 5.65314 0.292893 5.26262C0.683417 4.8721 1.31658 4.8721 1.70711 5.26262L5 8.55551L12.2929 1.26262C12.6834 0.872095 13.3166 0.872095 13.7071 1.26262Z" fill="#1267E5"/>
                    </svg> 
                    Use at least one upper case letter</p>
                <p class="flex items-center mb-4.5 font-inter-400 text-xs" :class="{ 'opacity-40': !verUniqueMatche }">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="11" viewBox="0 0 14 11" fill="none" class="w-3.5 h-2.5 mr-2.5">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M13.7071 1.26262C14.0976 1.65314 14.0976 2.28631 13.7071 2.67683L5.70711 10.6768C5.31658 11.0674 4.68342 11.0674 4.29289 10.6768L0.292893 6.67683C-0.0976311 6.28631 -0.0976311 5.65314 0.292893 5.26262C0.683417 4.8721 1.31658 4.8721 1.70711 5.26262L5 8.55551L12.2929 1.26262C12.6834 0.872095 13.3166 0.872095 13.7071 1.26262Z" fill="#1267E5"/>
                    </svg> 
                    New & confirm password matches
                </p>
            </div>
            <div class="block pt-4">
                <button @click="newPassword" :class="validPassword ? 'opacity-100' : 'opacity-50'" class="cursor-pointer shadow-main rounded-lg w-full p-3 bg-blue text-white font-opensans-600 text-sm">Update password</button>
            </div>
        </div>
    </Layout>
</template>

<script>
import Layout from './layout.vue'
import axios from 'axios'
import AlertTop from '../utilities/alertTop.vue'

export default {
    setup: () => ({
        title: 'New Password'
    }),
    components: { Layout, AlertTop },
    data() {
        return {
            token: this.$route.params.token,
            id: this.$route.params.id,
            userFirstName: this.$route.params.name,
            userEmail: this.$route.params.email,
            showPassword: false,
            showCPassword: false,
            password: null,
            passwordLength: 0,
            cPassword: null,
            verCharacters: false,
            verOneNumber: false,
            verOneSymbol: false,
            verOneLower: false,
            verOneUpper: false,
            verUniqueMatche: false,
            validPassword: false,
            successAlert: false,
            successMessage: '',
            successIcon: null,
            //User Data

        };
    },
    methods: {
        //New Pass
        async newPassword() {
            if(this.validPassword == true){
                await axios.post('api/v1/auth/password-reset', {
                    email: this.userEmail,
                    password: this.password,
                    password_confirmation: this.cPassword,
                    token: this.token
                })
                .then((success) => {
                    //Alert Content
                    this.successAlert = true;
                    this.successMessage = success.data.message;
                    this.successIcon = 'like.svg';
                })
                .catch((error) => {
                    this.successAlert = true;
                    this.successMessage = error.response.data;
                    this.successIcon = 'warning-red.svg';
                })
            }
        },
        checkPassword() {
            this.passwordLength = this.password.length;
            const format = /[ !@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/;
            //Use 8-32 characters
            if (this.passwordLength > 8) {
                this.verCharacters = true;
            } else {
                this.verCharacters = false;
            }
            //Use at least one number
            this.verOneNumber = /\d/.test(this.password);
            //Use at least one symbol
            this.verOneSymbol = format.test(this.password);
            //Use at least one lower case
            this.verOneLower = /[a-z]/.test(this.password);
            //Use at least one upper case
            this.verOneUpper = /[A-Z]/.test(this.password);
            //New & confirm password matches
            if(this.password == this.cPassword){
                this.verUniqueMatche = true;
            }else{
                this.verUniqueMatche = false;
            }

            //Check if all verifications are true
            if (this.verCharacters === true && this.verOneNumber === true && this.verOneSymbol === true && this.verOneLower === true && this.verOneUpper === true && this.verUniqueMatche === true) {
                this.validPassword = true;
            } else {
                this.validPassword = false;
            }
        }
    }
}
</script>

<style scoped>
</style>
