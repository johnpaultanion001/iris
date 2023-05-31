<template>
    <div ref="Profile"></div>
    <AlertTop :alertIcon="'/img/icon/'+successIcon" :active="successAlert" :content="successMessage" v-if="successAlert" @close="closeAlert" />
    <PageLayout :pageName="title">
        <div class="grid grid-cols-8 gap-y-3 gap-x-7 mb-6 pt-4">
            <div class="col-span-8">
                <h1> {{ title }} </h1>
            </div>
            <div class="col-span-8 lg:col-span-2 xl:col-span-2 pt-2">
                <div class="invisible lg:visible w-1/6 xl:w-1/5 fixed pr-1.5">
                    <ContentCard cardTitle="">
                        <div class="bg-white w-full py-0 px-0 h-full">
                            <button @click="scrollToDiv('Profile')" class="rounded w-full flex items-center text-start mb-1 py-4.5 px-2 text-sm font-opensans-600  border-l-4 hover:bg-lighter" :class="sectionName === 'Profile' ? 'border-green bg-lighter' : 'bg-white border-transparent'">
                                <div class="mr-3.5 relative">
                                    <img v-if="sectionName === 'Profile'" src="/img/icon/profile-active.png" class="absolute">
                                    <img src="/img/icon/profile.png"> 
                                </div>
                                <p :class="sectionName === 'Profile' ? 'text-blue' : 'text-darkgrey'">Profile</p>
                            </button>
                            <button @click="scrollToDiv('Change Password')" class="rounded w-full flex items-center text-start mb-1 py-4.5 px-2 text-sm font-opensans-600  border-l-4 hover:bg-lighter" :class="sectionName === 'Change Password' ? 'border-green bg-lighter' : 'bg-white border-transparent'">
                                <div class="mr-3.5 relative">
                                    <img v-if="sectionName === 'Change Password'" src="/img/icon/changepass-active.png" class="absolute"> 
                                    <img src="/img/icon/changepass.png"> 
                                </div>
                                <p :class="sectionName === 'Change Password' ? 'text-blue' : 'text-darkgrey'">Change Password</p>
                            </button>
                            <button @click="scrollToDiv('Contact Us')" class="rounded w-full flex items-center text-start mb-1 py-4.5 px-2 text-sm font-opensans-600  border-l-4 hover:bg-lighter" :class="sectionName === 'Contact Us' ? 'border-green bg-lighter' : 'bg-white border-transparent'">
                                <div class="mr-3.5 relative">
                                    <img v-if="sectionName === 'Contact Us'" src="/img/icon/contactus-active.png" class="absolute"> 
                                    <img src="/img/icon/contactus.png"> 
                                </div>
                                <p :class="sectionName === 'Contact Us' ? 'text-blue' : 'text-darkgrey'">Contact Us</p>
                            </button>
                            <button @click="scrollToDiv('About')" class="rounded w-full flex items-center text-start mb-1 py-4.5 px-2 text-sm font-opensans-600  border-l-4 hover:bg-lighter" :class="sectionName === 'About' ? 'border-green bg-lighter' : 'bg-white border-transparent'">
                                <div class="mr-3.5 relative">
                                    <img v-if="sectionName === 'About'" src="/img/icon/about-active.png" class="absolute"> 
                                    <img src="/img/icon/about.png"> 
                                </div>
                                <p :class="sectionName === 'About' ? 'text-blue' : 'text-darkgrey'">About</p>
                            </button>
                            <button @click="scrollToDiv('Terms & Privacy')" class="rounded w-full flex items-center text-start mb-1 py-4.5 px-2 text-sm font-opensans-600  border-l-4 hover:bg-lighter" :class="sectionName === 'Terms & Privacy' ? 'border-green bg-lighter' : 'bg-white border-transparent'">
                                <div class="mr-3.5 relative">
                                    <img v-if="sectionName === 'Terms & Privacy'" src="/img/icon/terms-active.png" class="absolute"> 
                                    <img src="/img/icon/terms.png"> 
                                </div>
                                <p :class="sectionName === 'Terms & Privacy' ? 'text-blue' : 'text-darkgrey'">Terms & Privacy</p>
                            </button>
                        </div>
                    </ContentCard>
                </div>
            </div>
            <div class="col-span-8 lg:col-span-6 xl:col-span-6">
                <div class="grid grid-cols-12 gap-3 mb-6 pt-2">
                    <div class="col-span-12" ref="Profile">
                        <ContentCard>
                            <div class="block md:flex justify-start p-3.5">
                                <div class="cursor-pointer mx-0 mb-4 md:my-0 md:mr-4">
                                    <div class="w-36 h-36">
                                        <img :src="userInfo.profile" class="rounded-2xl w-full h-full object-cover">
                                    </div>
                                    <div class="flex items-center justify-center mt-2">
                                        <label class="cursor-pointer flex items-center justify-center">
                                            <img src="/img/icon/photo-blue.png" class="mr-1.5">
                                            <p class="m-0 text-blue font-opensans-600 text-sm">Change</p> 
                                            <input type="file" name="documents" @change="onFileChange($event)" id="documents" hidden>
                                        </label>
                                    </div>
                                </div>
                                <div class="mx-0 mt-4 md:my-0 md:ml-4">
                                    <table class="table-fixed w-full">
                                        <tbody>
                                            <tr class="border-b border-light relative">
                                                <td class="py-3 text-blue-grey text-base font-exo-400 w-1/2 sm:w-1/2 xl:w-1/4 whitespace-nowrap">Name</td>
                                                <td class="py-3 text-black text-xl font-exo-400">{{ userInfo.name }}</td>
                                            </tr>
                                            <tr class="border-b border-light relative">
                                                <td class="py-3 text-blue-grey text-base font-exo-400 w-1/2 sm:w-1/2 xl:w-1/4 whitespace-nowrap">Username</td>
                                                <td class="py-3 text-black text-base font-exo-400">{{ userInfo.email }}</td>
                                            </tr>
                                            <tr class="border-b border-light relative">
                                                <td class="py-3 text-blue-grey text-base font-exo-400 w-1/2 sm:w-1/2 xl:w-1/4 whitespace-nowrap">Email Address</td>
                                                <td class="py-3 text-black text-base font-exo-400">{{ userInfo.email }}</td>
                                            </tr>
                                            <tr class="border-b border-light relative">
                                                <td class="py-3 text-blue-grey text-base font-exo-400 w-1/2 sm:w-1/2 xl:w-1/4 whitespace-nowrap">Mobile Number</td>
                                                <td class="py-3 text-black text-base font-exo-400">{{ userInfo.mobile_number }}</td>
                                            </tr>
                                            <tr class="border-b border-light relative">
                                                <td class="py-3 text-blue-grey text-base font-exo-400 w-1/2 sm:w-1/2 xl:w-1/4 whitespace-nowrap">Agency</td>
                                                <td class="py-3 text-black text-base font-exo-400">{{ userInfo.agency }}</td>
                                            </tr>
                                            <tr class="border-b border-light relative">
                                                <td class="py-3 text-blue-grey text-base font-exo-400 w-1/2 sm:w-1/2 xl:w-1/4 whitespace-nowrap">Date Created</td>
                                                <td class="py-3 text-black text-base font-exo-400">{{ userInfo.created_at }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div ref="Change Password"></div>
                        </ContentCard>
                    </div>

                    <div class="col-span-12">
                        <ContentCard cardTitle="Change Password">
                            <div class="block p-2">
                                <div class="block relative pb-2">
                                    <label for="currentpassword" class="text-base text-blue-grey text-xs font-inter-700">Current password</label>
                                    <input @input="checkPassword" v-if="showCurrentPassword" type="text" name="currentpassword" id="currentpassword" class="mt-1 w-full main-input" v-model="currentpassword"/>
                                    <input @input="checkPassword" v-else type="password" name="currentpassword" id="currentpassword" class="mt-1 w-full main-input" v-model="currentpassword"/>
                                    <button type="button" class="show-icon" @click="{this.showCurrentPassword = !this.showCurrentPassword;}">
                                        <img src="/img/icon/show.png" class="w-5">
                                    </button>
                                    <button v-if="showCurrentPassword" type="button" class="show-icon" @click="{this.showCurrentPassword = !this.showCurrentPassword;}">
                                        <img src="/img/icon/show-active.png" class="w-5">
                                    </button>
                                </div>
                                <div class="block relative pb-2">
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
                                    <input @input="checkPassword" v-if="showCPassword" type="text" name="c-password" id="c-password" class="mt-1 w-full main-input" v-model="cPassword"/>
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
                                <div class="flex pt-2">
                                    <button @click="changePassword()" :class="validPassword ? 'opacity-100' : 'opacity-50'" class="w-fit cursor-pointer shadow-main rounded-full min-w-160 p-3 bg-blue text-white font-opensans-600 text-sm">Update Password</button>
                                </div>
                            </div>
                            <div ref="Contact Us"></div>
                        </ContentCard>
                    </div>

                    <div class="col-span-12">
                        <ContentCard cardTitle="Contact Us">
                            <div class="block px-2">
                                <table class="table-fixed w-full">
                                    <tbody>
                                        <tr class="border-b border-light relative">
                                            <td class="py-3 text-blue-grey text-base font-exo-400 w-1/2 md:w-1/3 xl:w-1/4 whitespace-nowrap">Location</td>
                                            <td class="py-3 text-black text-xl font-exo-400">Value</td>
                                        </tr>
                                        <tr class="border-b border-light relative">
                                            <td class="py-3 text-blue-grey text-base font-exo-400 w-1/2 md:w-1/3 xl:w-1/4 whitespace-nowrap">Email Address</td>
                                            <td class="py-3 text-black text-base font-exo-400">{{ userInfo.email }}</td>
                                        </tr>
                                        <tr class="relative">
                                            <td class="py-3 text-blue-grey text-base font-exo-400 w-1/2 md:w-1/3 xl:w-1/4 whitespace-nowrap">Mobile Number</td>
                                            <td class="py-3 text-black text-base font-exo-400">{{ userInfo.mobile_number }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </ContentCard>
                        <div ref="About"></div>
                    </div>

                    <div class="col-span-12">
                        <ContentCard cardTitle="About">
                            <div class="block px-2">
                                <p class="mt-4 mb-3 font-inter-400 font-base text-black">Lorem ipsum dolor sit amet consectetur. Adipiscing proin tortor pulvinar pellentesque faucibus eget maecenas. Sed sed aliquam faucibus maecenas. Felis malesuada maecenas sapien rhoncus enim risus arcu pulvinar. Velit eu nibh tincidunt rhoncus integer in hendrerit felis a. Ut vestibulum ac elementum aliquet est amet vulputate ornare. Facilisis egestas volutpat ut etiam in quisque diam risus. At tincidunt bibendum sollicitudin nec magnis. Donec arcu elementum massa magnis nunc mattis nam faucibus.</p>
                                <p class="font-inter-400 text-base text-blue-grey">v1-11.10.2022</p>
                            </div>
                        </ContentCard>
                        <div ref="Terms & Privacy"></div>
                    </div>

                    <div class="col-span-12">
                        <ContentCard cardTitle="Terms & Privacy">
                            <div class="block py-4 px-2">
                                <div class="block lg:flex items-center justify-start">
                                    <div class="">
                                        <router-link to="/terms" class="border border-blue mt-1 lg:mt-0 min-w-160 w-full lg:w-fit bg-white text-sm font-opensans-600 mr-4 py-2.5 px-5 text-blue rounded-lg flex items-center justify-center">
                                            Terms & Conditions
                                        </router-link>
                                    </div>
                                    <div class="">
                                        <router-link to="/privacy-policy" class="border border-blue mt-1 lg:mt-0 min-w-160 w-full lg:w-fit bg-white text-sm font-opensans-600 mr-4 py-2.5 px-5 text-blue rounded-lg flex items-center justify-center">
                                            Privacy Policy
                                        </router-link>
                                    </div>
                                </div>
                            </div>
                        </ContentCard>
                    </div>
                </div>
            </div>
        </div>
    </PageLayout>
</template>

<script>

import PageLayout from '../../pageLayout.vue'
import ContentCard from '../../utilities/contentCard.vue'
import Modal from '../../utilities/modal.vue'
import axios from 'axios'
import 'vue-select/dist/vue-select.css'
import AlertTop from '../../utilities/alertTop.vue'

export default {
    setup: () => ({
        title: 'Settings'
    }),
    data () {
        return{
            sectionName: '',
            //Modal
            showModal: '',
            modalActive: false,
            modalTicketID: '',
            successAlert: false,
            successMessage: '',
            successIcon: null,
            //Password
            currentpassword:null,
            showCurrentPassword: false,
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
            //User info
            userInfo: []
        };
    },
    components: { PageLayout, ContentCard, Modal, AlertTop },
    async mounted() {
        this.getUser();
    },
    methods: {
        //Get User
        async getUser(){
            const response = await axios.get('api/v1/profile');
            //Filter User Data
            this.userInfo = response.data.data;
        },
        //Scroll to Div
        scrollToDiv(section) {
            this.$refs[section].scrollIntoView({ behavior: "smooth" });
            this.sectionName = section;
        },
        //Alert
        async closeAlert() {
            this.successAlert = false
        },
        //Modals
        openModal(itemID){
            document.querySelector('body').style.overflow = 'hidden';
            this.showModal = itemID;
            this.modalActive = true;
        },
        closeModal() {
            if(this.modalActive == true){
                document.querySelector('body').style.overflow = 'auto';
                this.modalActive = false;
            }
        },
        //Password
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
        },
        //Input File Photo
        async onFileChange($event) {
            var files = $event.target.files || $event.dataTransfer.files;
            if (!files.length)
            return;
            this.additional_documents_file = files['0']['name'];

            
            await axios.post('/api/v1/user/change_photo', {
                profile: files['0']['name'],
            })
            .then((success) => {
                //Alert Content
                if(success.data.success){
                    this.successAlert = true;
                    this.successMessage = 'Photo updated';
                    this.successIcon = 'like.png';
                    this.getUser();
                }else{
                    this.successAlert = true;
                    this.successMessage = 'Error occured. Please try again';
                    this.successIcon = 'warning-red.png';
                }
            })
            .catch((error) => {
                this.successAlert = true;
                this.successMessage = error;
                this.successIcon = 'warning-red.png';
            })
        },
        //Change Password
        async changePassword() {
            if(this.validPassword == true){
                await axios.post('/api/v1/user/change_password', {
                    current_password: this.currentpassword,
                    new_password: this.password,
                    confirm_password: this.cPassword
                })
                .then((success) => {
                    //Alert Content
                    if(success.data.success){
                        this.successAlert = true;
                        this.successMessage = 'Password successfully updated';
                        this.successIcon = 'like.png';
                    }else{
                        this.successAlert = true;
                        this.successMessage = success.data.errors.current_password['0'];
                        this.successIcon = 'warning-red.png';
                    }
                })
                .catch((error) => {
                    this.successAlert = true;
                    this.successMessage = error;
                    this.successIcon = 'warning-red.png';
                })
            }
        },
    },
}
</script>