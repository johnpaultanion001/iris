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
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
                                        <path d="M7.5 6C9.15685 6 10.5 4.65685 10.5 3C10.5 1.34315 9.15685 0 7.5 0C5.84315 0 4.5 1.34315 4.5 3C4.5 4.65685 5.84315 6 7.5 6Z" :fill="sectionName === 'Profile' ? '#1267E5' : '#8898AA'"/>
                                        <path d="M0.5 15C0.5 11.134 3.63401 8 7.5 8C11.366 8 14.5 11.134 14.5 15H0.5Z" :fill="sectionName === 'Profile' ? '#1267E5' : '#8898AA'"/>
                                    </svg>
                                </div>
                                <p :class="sectionName === 'Profile' ? 'text-blue' : 'text-darkgrey'">Profile</p>
                            </button>
                            <button @click="scrollToDiv('Change Password')" class="rounded w-full flex items-center text-start mb-1 py-4.5 px-2 text-sm font-opensans-600  border-l-4 hover:bg-lighter" :class="sectionName === 'Change Password' ? 'border-green bg-lighter' : 'bg-white border-transparent'">
                                <div class="mr-3.5 relative">
                                    <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M2.5 7V5C2.5 2.23858 4.73858 0 7.5 0C10.2614 0 12.5 2.23858 12.5 5V7C13.6046 7 14.5 7.89543 14.5 9V14C14.5 15.1046 13.6046 16 12.5 16H2.5C1.39543 16 0.5 15.1046 0.5 14V9C0.5 7.89543 1.39543 7 2.5 7ZM10.5 5V7H4.5V5C4.5 3.34315 5.84315 2 7.5 2C9.15685 2 10.5 3.34315 10.5 5Z" :fill="sectionName === 'Change Password' ? '#1267E5' : '#8898AA'"/>
                                    </svg>
                                </div>
                                <p :class="sectionName === 'Change Password' ? 'text-blue' : 'text-darkgrey'">Change Password</p>
                            </button>
                            <button @click="scrollToDiv('Contact Us')" class="rounded w-full flex items-center text-start mb-1 py-4.5 px-2 text-sm font-opensans-600  border-l-4 hover:bg-lighter" :class="sectionName === 'Contact Us' ? 'border-green bg-lighter' : 'bg-white border-transparent'">
                                <div class="mr-3.5 relative">
                                    <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2.5 3C2.5 2.44772 2.94772 2 3.5 2H5.65287C6.14171 2 6.5589 2.35341 6.63927 2.8356L7.37858 7.27147C7.45075 7.70451 7.23206 8.13397 6.8394 8.3303L5.29126 9.10437C6.40756 11.8783 8.62168 14.0924 11.3956 15.2087L12.1697 13.6606C12.366 13.2679 12.7955 13.0492 13.2285 13.1214L17.6644 13.8607C18.1466 13.9411 18.5 14.3583 18.5 14.8471V17C18.5 17.5523 18.0523 18 17.5 18H15.5C8.3203 18 2.5 12.1797 2.5 5V3Z" :fill="sectionName === 'Contact Us' ? '#1267E5' : '#8898AA'"/>
                                    </svg>
                                </div>
                                <p :class="sectionName === 'Contact Us' ? 'text-blue' : 'text-darkgrey'">Contact Us</p>
                            </button>
                            <button @click="scrollToDiv('About')" class="rounded w-full flex items-center text-start mb-1 py-4.5 px-2 text-sm font-opensans-600  border-l-4 hover:bg-lighter" :class="sectionName === 'About' ? 'border-green bg-lighter' : 'bg-white border-transparent'">
                                <div class="mr-3.5 relative">
                                    <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M18.5 10C18.5 14.4183 14.9183 18 10.5 18C6.08172 18 2.5 14.4183 2.5 10C2.5 5.58172 6.08172 2 10.5 2C14.9183 2 18.5 5.58172 18.5 10ZM11.5 6C11.5 6.55228 11.0523 7 10.5 7C9.94772 7 9.5 6.55228 9.5 6C9.5 5.44772 9.94772 5 10.5 5C11.0523 5 11.5 5.44772 11.5 6ZM9.5 9C8.94772 9 8.5 9.44772 8.5 10C8.5 10.5523 8.94772 11 9.5 11V14C9.5 14.5523 9.94772 15 10.5 15H11.5C12.0523 15 12.5 14.5523 12.5 14C12.5 13.4477 12.0523 13 11.5 13V10C11.5 9.44772 11.0523 9 10.5 9H9.5Z" :fill="sectionName === 'About' ? '#1267E5' : '#8898AA'"/>
                                    </svg>
                                </div>
                                <p :class="sectionName === 'About' ? 'text-blue' : 'text-darkgrey'">About</p>
                            </button>
                            <button @click="scrollToDiv('Terms & Privacy')" class="rounded w-full flex items-center text-start mb-1 py-4.5 px-2 text-sm font-opensans-600  border-l-4 hover:bg-lighter" :class="sectionName === 'Terms & Privacy' ? 'border-green bg-lighter' : 'bg-white border-transparent'">
                                <div class="mr-3.5 relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="16" viewBox="0 0 13 16" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0.5 2C0.5 0.895432 1.39543 0 2.5 0H7.08579C7.61622 0 8.12493 0.210714 8.5 0.585786L11.9142 4C12.2893 4.37507 12.5 4.88378 12.5 5.41421V14C12.5 15.1046 11.6046 16 10.5 16H2.5C1.39543 16 0.5 15.1046 0.5 14V2ZM2.5 8C2.5 7.44772 2.94772 7 3.5 7H9.5C10.0523 7 10.5 7.44772 10.5 8C10.5 8.55229 10.0523 9 9.5 9H3.5C2.94772 9 2.5 8.55229 2.5 8ZM3.5 11C2.94772 11 2.5 11.4477 2.5 12C2.5 12.5523 2.94772 13 3.5 13H9.5C10.0523 13 10.5 12.5523 10.5 12C10.5 11.4477 10.0523 11 9.5 11H3.5Z" :fill="sectionName === 'Terms & Privacy' ? '#1267E5' : '#8898AA'"/>
                                    </svg>
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
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="14" viewBox="0 0 16 14" fill="none" class="mr-1.5">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M2 2C0.895431 2 0 2.89543 0 4V12C0 13.1046 0.895431 14 2 14H14C15.1046 14 16 13.1046 16 12V4C16 2.89543 15.1046 2 14 2H12.4142C12.149 2 11.8946 1.89464 11.7071 1.70711L10.5858 0.585787C10.2107 0.210714 9.70201 0 9.17157 0H6.82843C6.29799 0 5.78929 0.210713 5.41421 0.585786L4.29289 1.70711C4.10536 1.89464 3.851 2 3.58579 2H2ZM8 11C9.65685 11 11 9.65685 11 8C11 6.34315 9.65685 5 8 5C6.34315 5 5 6.34315 5 8C5 9.65685 6.34315 11 8 11Z" fill="#1267E5"/>
                                            </svg>
                                            <p class="m-0 text-blue font-opensans-600 text-sm">Change</p>
                                            <input type="file" name="profile" @change="onFileChange()" id="profile" hidden ref="profileImage">
                                        </label>
                                    </div>
                                </div>
                                <div class="mx-0 mt-4 md:my-0 md:ml-4 scroll-style overflow-auto">
                                    <table class="table-fixed w-full" style="min-width: 400px;">
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
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none" :style="showCurrentPassword ? 'fill: #1267E5' : 'fill: #CED4DA'">
                                            <path d="M10 12.9697C11.1046 12.9697 12 12.0743 12 10.9697C12 9.86516 11.1046 8.96973 10 8.96973C8.89544 8.96973 8.00001 9.86516 8.00001 10.9697C8.00001 12.0743 8.89544 12.9697 10 12.9697Z"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0.457764 10.9698C1.73202 6.91264 5.52232 3.96973 9.99997 3.96973C14.4776 3.96973 18.2679 6.91261 19.5422 10.9697C18.2679 15.0268 14.4776 17.9697 9.99995 17.9697C5.52232 17.9697 1.73204 15.0269 0.457764 10.9698ZM14 10.9697C14 13.1789 12.2091 14.9697 10 14.9697C7.79087 14.9697 6.00001 13.1789 6.00001 10.9697C6.00001 8.76059 7.79087 6.96973 10 6.96973C12.2091 6.96973 14 8.76059 14 10.9697Z"/>
                                        </svg>
                                    </button>
                                </div>
                                <div class="block relative pb-2">
                                    <label for="password" class="text-base text-blue-grey text-xs font-inter-700">New password</label>
                                    <input @input="checkPassword" v-if="showPassword" type="text" name="newpassword" id="newpassword" class="mt-1 w-full main-input" v-model="password"/>
                                    <input @input="checkPassword" v-else type="password" name="newpassword" id="newpassword" class="mt-1 w-full main-input" v-model="password"/>
                                    <button type="button" class="show-icon" @click="{this.showPassword = !this.showPassword;}">
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
                                    <button type="button" class="show-icon" @click="{this.showCPassword = !this.showCPassword;}">
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
                                        New & confirm password matches</p>
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
    <Modal v-show="modalActive && showModal == 'modalSubmit'" @close="closeModal">
      <template v-slot:body>
        <img src="/img/icon/modal-send.svg" class="mb-6">
        <h5 class="font-exo-600 text-xl text-dark2 mb-4">Change your profile photo</h5>
        <p class="font-inter-400 text-lg text-dark2 mb-11">Are you sure you want to change your photo?</p>
      </template>
      <template v-slot:footer>
        <div class="flex items-center justify-end w-full">
          <button @click="closeModal"
                  class="border border-blue mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-white text-sm font-opensans-600 mx-0 sm:mx-2 py-2.5 px-5 text-blue rounded-lg flex items-center justify-center">
            Cancel
          </button>
          <button @click="changePhoto()"
                  class="mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-blue text-sm font-opensans-600 mx-0 sm:mx-2 py-2.5 px-5 shadow-main text-white rounded-lg flex items-center justify-center">
            Yes
          </button>
        </div>
      </template>
    </Modal>
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
            userInfo: [],
            selected_docu: []
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
        async onFileChange() {
          this.profileImage = this.$refs.profileImage.files[0];
          this.openModal('modalSubmit');
        },
        async changePhoto(){
          const formData = new FormData();
          formData.append('profile', this.profileImage);
            const headers = { 'Content-Type': 'multipart/form-data' };
            await axios.post('/api/v1/user/'+this.userInfo.id+'/change_profile', formData, { headers }).then((success) => {
              if(success.data.success){
                  this.successAlert = true;
                  this.successMessage = 'Profile image updated';
                  this.successIcon = 'like.svg';
                  this.userInfo.profile = success.data.profile;
                  this.userImg = success.data.profile;
              } else {
                this.successAlert = true;
                this.successMessage = success.data.errors.current_password['0'];
                this.successIcon = 'warning-red.svg';
              }
              this.closeModal();
          }).catch((error) => {
              this.successAlert = true;
              this.successMessage = error.response.data.errors.profile[0];
              this.successIcon = 'warning-red.svg';
              this.closeModal();
          });
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
                        this.successIcon = 'like.svg';
                    }else{
                        this.successAlert = true;
                        this.successMessage = success.data.errors.current_password['0'];
                        this.successIcon = 'warning-red.svg';
                    }
                })
                .catch((error) => {
                    this.successAlert = true;
                    this.successMessage = error;
                    this.successIcon = 'warning-red.svg';
                })
            }
        },
    },
}
</script>
