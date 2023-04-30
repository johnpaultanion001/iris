<template>
    <Layout headerBg="/img/background-password.png" :headerTitle="'Hi, ' + userFirstName" headerText="Secure your account by creating a new password">
        <form class="block">
            <div class="block relative pt-4 pb-2">
                <label for="password" class="text-base text-blue-grey text-xs font-inter-700">New password</label>
                <input @input="checkPassword" v-if="showPassword" type="text" name="newpassword" id="newpassword" class="mt-1 w-full main-input" v-model="password"/>
                <input @input="checkPassword" v-else type="password" name="newpassword" id="newpassword" class="mt-1 w-full main-input" v-model="password"/>
                <button type="button" class="show-icon" @click="{this.showPassword = !this.showPassword;}">
                    <img src="/img/icon/show.png" class="w-5">
                </button>
                <button v-if="showPassword" type="button" class="show-icon" @click="{this.showPassword = !this.showPassword;}">
                    <img src="/img/icon/show-active.png" class="w-5">
                </button>
            </div>
            <div class="block relative py-2">
                <label for="password" class="text-base text-blue-grey text-xs font-inter-700">Re-enter new password</label>
                <input @input="checkPassword" v-if="showPassword" type="text" name="c-password" id="c-password" class="mt-1 w-full main-input" v-model="cPassword"/>
                <input @input="checkPassword" v-else type="password" name="c-password" id="c-password" class="mt-1 w-full main-input" v-model="cPassword"/>
                <button type="button" class="show-icon" @click="{this.showCPassword = !this.showCPassword;}">
                    <img src="/img/icon/show.png" class="w-5">
                </button>
                <button v-if="showCPassword" type="button" class="show-icon" @click="{this.showCPassword = !this.showCPassword;}">
                    <img src="/img/icon/show-active.png" class="w-5">
                </button>
            </div>
            <div class="password-checklist mt-2.5">
                <p class="flex items-center mb-3 font-inter-400 text-xs" :class="{ 'opacity-40': !verCharacters }"><img src="/img/icon/check-active.png" class="w-3.5 h-2.5 mr-2.5"> Use 8-32 characters</p>
                <p class="flex items-center mb-3 font-inter-400 text-xs" :class="{ 'opacity-40': !verOneNumber }"><img src="/img/icon/check-active.png" class="w-3.5 h-2.5 mr-2.5"> Use at least one number</p>
                <p class="flex items-center mb-3 font-inter-400 text-xs" :class="{ 'opacity-40': !verOneSymbol }"><img src="/img/icon/check-active.png" class="w-3.5 h-2.5 mr-2.5"> Use at least one symbol</p>
                <p class="flex items-center mb-3 font-inter-400 text-xs" :class="{ 'opacity-40': !verOneLower }"><img src="/img/icon/check-active.png" class="w-3.5 h-2.5 mr-2.5"> Use at least one lower case letter</p>
                <p class="flex items-center mb-3 font-inter-400 text-xs" :class="{ 'opacity-40': !verOneUpper }"><img src="/img/icon/check-active.png" class="w-3.5 h-2.5 mr-2.5"> Use at least one upper case letter</p>
                <p class="flex items-center mb-4.5 font-inter-400 text-xs" :class="{ 'opacity-40': !verUniqueMatche }"><img src="/img/icon/check-active.png" class="w-3.5 h-2.5 mr-2.5"> New & confirm password matches</p>
            </div>
            <div class="block pt-4">
                <input type="submit" id="" value="Update password" class="cursor-pointer shadow-main rounded-lg w-full p-3 bg-blue text-white font-opensans-600 text-sm">
            </div>
        </form>
    </Layout>
</template>

<script>
import Layout from './layout.vue'

export default {
    setup: () => ({
        title: 'New Password'
    }),
    components: { Layout },
    data() {
        return {
            userFirstName: 'Juana',
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
            validPassword: false
        };
    },
    methods: {
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
            if (this.verCharacters === true && this.verOneNumber === true && this.verOneSymbol === true && this.verOneLower === true) {
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