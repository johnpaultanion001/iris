<template>
    <AlertTop :alertIcon="'/img/icon/'+successIcon" :active="successAlert" :content="successMessage" v-if="successAlert" @close="closeAlert" />
    <div ref="Ticket Status"></div>
    <PageLayout :pageName="title">
        <div class="grid grid-cols-8 gap-y-3 gap-x-7 mb-6 pt-4">
            <div class="col-span-8">
                <h1>Ticket #{{ id }}</h1>
            </div>
            <div class="col-span-8 lg:col-span-2 xl:col-span-2 pt-2">
                <div class="invisible lg:visible w-1/6 xl:w-1/5 fixed pr-1.5">
                    <div class="content-card bg-white rounded-2xl shadow-main relative w-full">
                        <div class="bg-white w-full rounded-2xl p-4">
                            <button @click="scrollToDiv('Ticket Status')" class="rounded w-full flex items-center text-start mb-1 py-4.5 px-2 text-sm font-opensans-600  border-l-4 hover:bg-lighter" :class="sectionName === 'Ticket Status' ? 'border-green bg-lighter' : 'bg-white border-transparent'">
                                <div class="mr-3.5 relative">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8 16C12.4183 16 16 12.4183 16 8C16 3.58172 12.4183 0 8 0C3.58172 0 0 3.58172 0 8C0 12.4183 3.58172 16 8 16ZM11.7071 6.70711C12.0976 6.31658 12.0976 5.68342 11.7071 5.29289C11.3166 4.90237 10.6834 4.90237 10.2929 5.29289L7 8.58579L5.70711 7.29289C5.31658 6.90237 4.68342 6.90237 4.29289 7.29289C3.90237 7.68342 3.90237 8.31658 4.29289 8.70711L6.29289 10.7071C6.68342 11.0976 7.31658 11.0976 7.70711 10.7071L11.7071 6.70711Z" :fill="sectionName === 'Ticket Status' ? '#1267E5' : '#8898AA'"/>
                                    </svg>
                                </div>
                                <p :class="sectionName === 'Ticket Status' ? 'text-blue' : 'text-darkgrey'">Ticket Status</p>
                            </button>
                            <button @click="scrollToDiv('Ticket Info')" class="rounded w-full flex items-center text-start mb-1 py-4.5 px-2 text-sm font-opensans-600  border-l-4 hover:bg-lighter" :class="sectionName === 'Ticket Info' ? 'border-green bg-lighter' : 'bg-white border-transparent'">
                                <div class="mr-3.5 relative">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16 8C16 12.4183 12.4183 16 8 16C3.58172 16 0 12.4183 0 8C0 3.58172 3.58172 0 8 0C12.4183 0 16 3.58172 16 8ZM9 4C9 4.55228 8.55228 5 8 5C7.44772 5 7 4.55228 7 4C7 3.44772 7.44772 3 8 3C8.55228 3 9 3.44772 9 4ZM7 7C6.44772 7 6 7.44772 6 8C6 8.55229 6.44772 9 7 9V12C7 12.5523 7.44772 13 8 13H9C9.55228 13 10 12.5523 10 12C10 11.4477 9.55228 11 9 11V8C9 7.44772 8.55228 7 8 7H7Z" :fill="sectionName === 'Ticket Info' ? '#1267E5' : '#8898AA'"/>
                                    </svg>
                                </div>
                                <p :class="sectionName === 'Ticket Info' ? 'text-blue' : 'text-darkgrey'">Ticket Info</p>
                            </button>
                            <button @click="scrollToDiv('Vendor')" class="rounded w-full flex items-center text-start mb-1 py-4.5 px-2 text-sm font-opensans-600  border-l-4 hover:bg-lighter" :class="sectionName === 'Vendor' ? 'border-green bg-lighter' : 'bg-white border-transparent'">
                                <div class="mr-3.5 relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="15" viewBox="0 0 14 15" fill="none">
                                        <path d="M7 6C8.65685 6 10 4.65685 10 3C10 1.34315 8.65685 0 7 0C5.34315 0 4 1.34315 4 3C4 4.65685 5.34315 6 7 6Z" :fill="sectionName === 'Vendor' ? '#1267E5' : '#8898AA'"/>
                                        <path d="M0 15C0 11.134 3.13401 8 7 8C10.866 8 14 11.134 14 15H0Z" :fill="sectionName === 'Vendor' ? '#1267E5' : '#8898AA'"/>
                                    </svg>
                                </div>
                                <p :class="sectionName === 'Vendor' ? 'text-blue' : 'text-darkgrey'">Vendor</p>
                            </button>
                            <button @click="scrollToDiv('ViolationsSection')" class="rounded w-full flex items-center text-start mb-1 py-4.5 px-2 text-sm font-opensans-600  border-l-4 hover:bg-lighter" :class="sectionName === 'ViolationsSection' ? 'border-green bg-lighter' : 'bg-white border-transparent'">
                                <div class="mr-3.5 relative">
                                    <svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M6.25706 1.09882C7.02167 -0.26048 8.97875 -0.260481 9.74336 1.09882L15.3237 11.0194C16.0736 12.3526 15.1102 13.9999 13.5805 13.9999H2.4199C0.890251 13.9999 -0.0731769 12.3526 0.676753 11.0194L6.25706 1.09882ZM9.00012 11C9.00012 11.5523 8.55241 12 8.00012 12C7.44784 12 7.00012 11.5523 7.00012 11C7.00012 10.4477 7.44784 10 8.00012 10C8.55241 10 9.00012 10.4477 9.00012 11ZM8.00012 3C7.44784 3 7.00012 3.44772 7.00012 4V7C7.00012 7.55228 7.44784 8 8.00012 8C8.55241 8 9.00012 7.55228 9.00012 7V4C9.00012 3.44772 8.55241 3 8.00012 3Z" :fill="sectionName === 'ViolationsSection' ? '#1267E5' : '#8898AA'"/>
                                    </svg>
                                </div>
                                <p :class="sectionName === 'ViolationsSection' ? 'text-blue' : 'text-darkgrey'">Violations</p>
                            </button>
                            <button @click="scrollToDiv('Assigned Agencies')" class="rounded w-full flex items-center text-start mb-1 py-4.5 px-2 text-sm font-opensans-600  border-l-4 hover:bg-lighter" :class="sectionName === 'Assigned Agencies' ? 'border-green bg-lighter' : 'bg-white border-transparent'">
                                <div class="mr-3.5 relative">
                                    <svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M1 2C1 0.89543 1.89543 0 3 0H11C12.1046 0 13 0.895431 13 2V14C13.5523 14 14 14.4477 14 15C14 15.5523 13.5523 16 13 16H10C9.44771 16 9 15.5523 9 15V13C9 12.4477 8.55229 12 8 12H6C5.44772 12 5 12.4477 5 13V15C5 15.5523 4.55228 16 4 16H1C0.447715 16 0 15.5523 0 15C0 14.4477 0.447715 14 1 14V2ZM4 3H6V5H4V3ZM6 7H4V9H6V7ZM8 3H10V5H8V3ZM10 7H8V9H10V7Z" :fill="sectionName === 'Assigned Agencies' ? '#1267E5' : '#8898AA'"/>
                                    </svg>
                                </div>
                                <p :class="sectionName === 'Assigned Agencies' ? 'text-blue' : 'text-darkgrey'">Assigned Agencies</p>
                            </button>
                            <button @click="scrollToDiv('Comments')" class="rounded w-full flex items-center text-start mb-1 py-4.5 px-2 text-sm font-opensans-600  border-l-4 hover:bg-lighter" :class="sectionName === 'Comments' ? 'border-green bg-lighter' : 'bg-white border-transparent'">
                                <div class="mr-3.5 relative">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M16 2V10C16 11.1046 15.1046 12 14 12H9L4 16V12H2C0.895431 12 0 11.1046 0 10V2C0 0.895431 0.895431 0 2 0H14C15.1046 0 16 0.895431 16 2ZM5 5H3V7H5V5ZM7 5H9V7H7V5ZM13 5H11V7H13V5Z" :fill="sectionName === 'Comments' ? '#1267E5' : '#8898AA'"/>
                                    </svg>
                                </div>
                                <p :class="sectionName === 'Comments' ? 'text-blue' : 'text-darkgrey'">Comments</p>
                            </button>
                            <button @click="scrollToDiv('Activity Log')" class="rounded w-full flex items-center text-start mb-1 py-4.5 px-2 text-sm font-opensans-600  border-l-4 hover:bg-lighter" :class="sectionName === 'Activity Log' ? 'border-green bg-lighter' : 'bg-white border-transparent'">
                                <div class="mr-3.5 relative">
                                    <svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0.999998 0C0.447715 0 0 0.447715 0 1C0 1.55228 0.447715 2 0.999998 2H12C12.5523 2 13 1.55228 13 1C13 0.447715 12.5523 0 12 0H0.999998Z" :fill="sectionName === 'Activity Log' ? '#1267E5' : '#8898AA'"/>
                                        <path d="M0.999998 4C0.447715 4 0 4.44772 0 5C0 5.55228 0.447715 6 0.999998 6H7.99999C8.55227 6 8.99999 5.55228 8.99999 5C8.99999 4.44772 8.55227 4 7.99999 4H0.999998Z" :fill="sectionName === 'Activity Log' ? '#1267E5' : '#8898AA'"/>
                                        <path d="M0.999998 8C0.447715 8 0 8.44772 0 9C0 9.55229 0.447715 10 0.999998 10H4.99999C5.55228 10 5.99999 9.55229 5.99999 9C5.99999 8.44772 5.55228 8 4.99999 8H0.999998Z" :fill="sectionName === 'Activity Log' ? '#1267E5' : '#8898AA'"/>
                                        <path d="M13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44771 11 5L11 10.5858L9.70709 9.29289C9.31657 8.90237 8.6834 8.90237 8.29288 9.29289C7.90236 9.68342 7.90236 10.3166 8.29288 10.7071L11.2929 13.7071C11.4804 13.8946 11.7348 14 12 14C12.2652 14 12.5196 13.8946 12.7071 13.7071L15.7071 10.7071C16.0976 10.3166 16.0976 9.68342 15.7071 9.29289C15.3166 8.90237 14.6834 8.90237 14.2929 9.29289L13 10.5858L13 5Z" :fill="sectionName === 'Activity Log' ? '#1267E5' : '#8898AA'"/>
                                    </svg>
                                </div>
                                <p :class="sectionName === 'Activity Log' ? 'text-blue' : 'text-darkgrey'">Activity Log</p>
                            </button>
                        </div>
                        <div class="bg-light-blue w-full p-4 h-full rounded-b-2xl">
                            <button class="border border-blue text-blue mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-transparent hover:bg-white-25 text-sm font-opensans-600 mx-0 sm:mx-2 py-2.5 px-5 rounded-full flex items-center justify-center">                
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="16" viewBox="0 0 14 16" fill="none" class="mr-2">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0 15C-2.41411e-08 14.4477 0.447715 14 1 14H13C13.5523 14 14 14.4477 14 15C14 15.5523 13.5523 16 13 16H1C0.447715 16 2.41411e-08 15.5523 0 15ZM3.29289 7.29289C3.68342 6.90237 4.31658 6.90237 4.70711 7.29289L6 8.58579L6 1C6 0.447716 6.44771 2.41411e-08 7 0C7.55228 -2.41411e-08 8 0.447715 8 1L8 8.58579L9.29289 7.29289C9.68342 6.90237 10.3166 6.90237 10.7071 7.29289C11.0976 7.68342 11.0976 8.31658 10.7071 8.70711L7.70711 11.7071C7.51957 11.8946 7.26522 12 7 12C6.73478 12 6.48043 11.8946 6.29289 11.7071L3.29289 8.70711C2.90237 8.31658 2.90237 7.68342 3.29289 7.29289Z" fill="#1267E5"/>
                                </svg>Export
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-8 lg:col-span-6 xl:col-span-6">
                <div class="grid grid-cols-12 gap-3 mb-6 pt-2">
                    <div class="col-span-12" ref="">
                        <ContentCard>
                            <div class="grid grid-cols-2 gap-3 mb-6 pt-2 flex items-center px-2">
                                <div class="col-span-2 md:col-span-1">
                                    <div class="flex items-center justify-start">
                                        <h2 class="mr-5 text-black font-exo-600 text-2xl">Ticket #{{ id }}</h2>
                                        <div class="flex items-center justify-start" v-for="item in ticketInfo.assigned_agencies">
                                            <img :src="item.logo" class="w-10 h-10 mr-2 object-contain border border-light rounded rounded-full">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-2 md:col-span-1">
                                    <div class="flex items-center justify-start md:justify-end">
                                        <p class="font-inter-400 text-xs mr-2.5" style="color:#525F7F;">Severity: <span class="font-opensans-600">{{ ticketInfo.severity }}</span></p>
                                        <div class="ml-1 rounded-full" style="background:#F2994A; height:8px; width:32px;"></div>
                                        <div class="ml-1 rounded-full" :style="ticketInfo.severity != 'LOW' ? 'background:#F2994A;' : 'background:#D9D9D9;'" style="height:8px; width:32px;"></div>
                                        <div class="ml-1 rounded-full" :style="ticketInfo.severity == 'HIGH' ? 'background:#F2994A;' : 'background:#D9D9D9;'" style="height:8px; width:32px;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="px-10 py-5 flex items-center justify-between border-b border-light mx-2 scroll-style overflow-auto" style="min-width: 110px;">
                                <div class="text-center">
                                    <svg width="31" height="23" viewBox="0 0 31 23" fill="none" xmlns="http://www.w3.org/2000/svg" class="m-auto">
                                        <path d="M15.5 14.7C17.2673 14.7 18.7 13.2673 18.7 11.5C18.7 9.73269 17.2673 8.3 15.5 8.3C13.7327 8.3 12.3 9.73269 12.3 11.5C12.3 13.2673 13.7327 14.7 15.5 14.7Z" :fill="ticketInfo.status == 'FOR_REVIEW' ? '#1267E6' : '#888C93'"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0.232422 11.5001C2.27122 5.00866 8.33568 0.300003 15.4999 0.300003C22.6641 0.300003 28.7285 5.00861 30.7674 11.4999C28.7286 17.9913 22.6641 22.7 15.4999 22.7C8.33569 22.7 2.27126 17.9914 0.232422 11.5001ZM21.8999 11.5C21.8999 15.0346 19.0346 17.9 15.5 17.9C11.9654 17.9 9.09999 15.0346 9.09999 11.5C9.09999 7.96538 11.9654 5.1 15.5 5.1C19.0346 5.1 21.8999 7.96538 21.8999 11.5Z" :fill="ticketInfo.status == 'FOR_REVIEW' ? '#1267E6' : '#888C93'"/>
                                    </svg>
                                    <p :class="ticketInfo.status == 'FOR_REVIEW' ? 'text-blue' : 'text-blue-grey'" class="text-xs font-opensans-600 mt-3">For Review</p>
                                </div>
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="14" viewBox="0 0 17 14" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.5429 0.292893C8.93342 -0.0976311 9.56659 -0.0976311 9.95711 0.292893L15.9571 6.29289C16.3476 6.68342 16.3476 7.31658 15.9571 7.70711L9.95711 13.7071C9.56659 14.0976 8.93342 14.0976 8.5429 13.7071C8.15237 13.3166 8.15237 12.6834 8.5429 12.2929L12.8358 8L1.25 8C0.697716 8 0.25 7.55228 0.25 7C0.25 6.44771 0.697716 6 1.25 6H12.8358L8.5429 1.70711C8.15237 1.31658 8.15237 0.683417 8.5429 0.292893Z" fill="#CED4DA"/>
                                    </svg>
                                </div>
                                <div class="text-center">
                                    <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg" class="m-auto">
                                        <path d="M0.700195 13.8C0.700195 12.4745 1.77471 11.4 3.1002 11.4C4.42568 11.4 5.5002 12.4745 5.5002 13.8V23.4C5.5002 24.7255 4.42568 25.8 3.1002 25.8C1.77471 25.8 0.700195 24.7255 0.700195 23.4V13.8Z" :fill="ticketInfo.status == 'ACKNOWLEDGED' ? '#1267E6' : '#888C93'"/>
                                        <path d="M7.10019 13.5333V22.2223C7.10019 23.4344 7.785 24.5424 8.86911 25.0845L8.94886 25.1243C9.83754 25.5687 10.8175 25.8 11.811 25.8H20.4768C22.0022 25.8 23.3155 24.7233 23.6147 23.2276L25.5347 13.6276C25.9307 11.6474 24.4162 9.8 22.3968 9.8H16.7002V3.4C16.7002 1.63269 15.2675 0.199997 13.5002 0.199997C12.6165 0.199997 11.9002 0.916341 11.9002 1.8V2.86666C11.9002 4.25143 11.4511 5.59885 10.6202 6.70666L8.3802 9.69333C7.54933 10.8011 7.10019 12.1486 7.10019 13.5333Z" :fill="ticketInfo.status == 'ACKNOWLEDGED' ? '#1267E6' : '#888C93'"/>
                                    </svg>
                                    <p :class="ticketInfo.status == 'ACKNOWLEDGED' ? 'text-blue' : 'text-blue-grey'" class="text-xs font-opensans-600 mt-3">Acknowledged</p>
                                </div>
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="14" viewBox="0 0 17 14" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.5429 0.292893C8.93342 -0.0976311 9.56659 -0.0976311 9.95711 0.292893L15.9571 6.29289C16.3476 6.68342 16.3476 7.31658 15.9571 7.70711L9.95711 13.7071C9.56659 14.0976 8.93342 14.0976 8.5429 13.7071C8.15237 13.3166 8.15237 12.6834 8.5429 12.2929L12.8358 8L1.25 8C0.697716 8 0.25 7.55228 0.25 7C0.25 6.44771 0.697716 6 1.25 6H12.8358L8.5429 1.70711C8.15237 1.31658 8.15237 0.683417 8.5429 0.292893Z" fill="#CED4DA"/>
                                    </svg>
                                </div>
                                <div class="text-center">
                                    <svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg" class="m-auto">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M13.5002 26.3C20.5694 26.3 26.3002 20.5692 26.3002 13.5C26.3002 6.43075 20.5694 0.699997 13.5002 0.699997C6.43095 0.699997 0.700195 6.43075 0.700195 13.5C0.700195 20.5692 6.43095 26.3 13.5002 26.3ZM15.1002 7.1C15.1002 6.21634 14.3839 5.5 13.5002 5.5C12.6165 5.5 11.9002 6.21634 11.9002 7.1V13.5C11.9002 13.9243 12.0688 14.3313 12.3688 14.6314L16.8943 19.1569C17.5191 19.7817 18.5322 19.7817 19.157 19.1569C19.7819 18.532 19.7819 17.5189 19.157 16.8941L15.1002 12.8373V7.1Z" :fill="ticketInfo.status == 'ON_GOING' ? '#1267E6' : '#888C93'"/>
                                    </svg>
                                    <p :class="ticketInfo.status == 'ON_GOING' ? 'text-blue' : 'text-blue-grey'" class="text-xs font-opensans-600 mt-3">On-going</p>
                                </div>
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="14" viewBox="0 0 17 14" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.5429 0.292893C8.93342 -0.0976311 9.56659 -0.0976311 9.95711 0.292893L15.9571 6.29289C16.3476 6.68342 16.3476 7.31658 15.9571 7.70711L9.95711 13.7071C9.56659 14.0976 8.93342 14.0976 8.5429 13.7071C8.15237 13.3166 8.15237 12.6834 8.5429 12.2929L12.8358 8L1.25 8C0.697716 8 0.25 7.55228 0.25 7C0.25 6.44771 0.697716 6 1.25 6H12.8358L8.5429 1.70711C8.15237 1.31658 8.15237 0.683417 8.5429 0.292893Z" fill="#CED4DA"/>
                                    </svg>
                                </div>
                                <div class="text-center">
                                    <svg width="30" height="28" viewBox="0 0 30 28" fill="none" xmlns="http://www.w3.org/2000/svg" class="m-auto">
                                        <path d="M17.3732 0.433334L15.9332 1.87333L18.0665 4.00667C18.3598 4.34 18.5065 4.72667 18.5065 5.16667C18.5065 5.60667 18.3598 6.02 18.0665 6.31333L13.3332 11.1267L14.6665 12.5667L19.5065 7.75333C20.2132 6.96667 20.5598 6.1 20.5598 5.16667C20.5598 4.23333 20.2132 3.35333 19.5065 2.56667L17.3732 0.433334ZM12.0665 3.12667L10.6265 4.56667L11.4398 5.31333C11.7332 5.60667 11.8798 6.00667 11.8798 6.5C11.8798 6.99333 11.7332 7.39333 11.4398 7.68667L10.6265 8.43333L12.0665 9.87333L12.8132 9.06C13.5198 8.27333 13.8798 7.42 13.8798 6.5C13.8798 5.54 13.5198 4.67333 12.8132 3.87333L12.0665 3.12667ZM25.9998 5.24667C25.0798 5.24667 24.2265 5.60667 23.4398 6.31333L15.9332 13.8333L17.3732 15.1667L24.8132 7.75333C25.1465 7.42 25.5465 7.24667 25.9998 7.24667C26.4532 7.24667 26.8532 7.42 27.1865 7.75333L27.9998 8.56667L29.3732 7.12667L28.6265 6.31333C27.8398 5.60667 26.9598 5.24667 25.9998 5.24667ZM7.33317 9.16667L0.666504 27.8333L19.3332 21.1667L7.33317 9.16667ZM23.3332 13.2467C22.3998 13.2467 21.5465 13.6067 20.7465 14.3133L18.6265 16.4333L20.0665 17.8733L22.1865 15.7533C22.5198 15.42 22.8932 15.2467 23.3332 15.2467C23.7732 15.2467 24.1732 15.42 24.5065 15.7533L26.6665 17.8733L28.0665 16.5L25.9332 14.3133C25.1465 13.6067 24.2665 13.2467 23.3332 13.2467Z" :fill="ticketInfo.status == 'RESOLVED' ? '#1267E6' : '#888C93'"/>
                                    </svg>
                                    <p :class="ticketInfo.status == 'RESOLVED' ? 'text-blue' : 'text-blue-grey'" class="text-xs font-opensans-600 mt-3">Resolved</p>
                                </div>
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="2" height="70" viewBox="0 0 2 70" fill="none">
                                        <line x1="1.25" y1="70" x2="1.25" y2="-2.18557e-08" stroke="#CED4DA"/>
                                    </svg>
                                </div>
                                <div class="text-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 27 27" fill="none" class="m-auto">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M26.3002 13.5C26.3002 20.5692 20.5694 26.3 13.5002 26.3C6.43095 26.3 0.700195 20.5692 0.700195 13.5C0.700195 6.43075 6.43095 0.699997 13.5002 0.699997C20.5694 0.699997 26.3002 6.43075 26.3002 13.5ZM19.0628 21.3251C17.4934 22.4427 15.5736 23.1 13.5002 23.1C8.19826 23.1 3.9002 18.8019 3.9002 13.5C3.9002 11.4266 4.55749 9.50676 5.67508 7.93743L19.0628 21.3251ZM21.3255 19.0623L7.93785 5.67472C9.50714 4.55723 11.4269 3.9 13.5002 3.9C18.8021 3.9 23.1002 8.19806 23.1002 13.5C23.1002 15.5733 22.443 17.493 21.3255 19.0623Z" :fill="ticketInfo.status == 'INVALID' ? '#FF4500' : '#888C93'"/>
                                    </svg>
                                    <p :class="ticketInfo.status == 'INVALID' ? 'text-red' : 'text-blue-grey'" class="text-xs font-opensans-600 mt-3">Invalid</p>
                                </div>
                            </div>
                            <div class="flex items-center justify-between w-full pt-5 flex-wrap">
                                <div v-if="ticketInfo.status != 'INVALID' && ticketInfo.status != 'RESOLVED'" class="flex items-center justify-start flex-wrap w-full md:w-auto">
                                    <button @click="openModal('ticketStatusModal')" class="whitespace-nowrap mt-1 md:mt-0 min-w-0 min-w-110 w-full md:w-fit bg-blue text-sm font-opensans-600 mr-0 md:mr-2 py-2.5 px-5 shadow-main text-white rounded-full flex items-center justify-center">
                                        Update Ticket Status
                                    </button>
                                    <button @click="openModal('modalSeverity'); severity = this.ticketInfo.severity" class="border border-blue whitespace-nowrap mt-1 md:mt-0 min-w-0 min-w-110 w-full md:w-fit bg-white text-sm font-opensans-600 mr-0 md:mr-2 py-2.5 px-5 text-blue rounded-full flex items-center justify-center">
                                        Update Severity
                                    </button>
                                    <router-link :to="'/edit-ticket/'+id" class="border border-blue whitespace-nowrap mt-1 md:mt-0 min-w-0 min-w-110 w-full md:w-fit bg-white text-sm font-opensans-600 py-2.5 px-5 text-blue rounded-full flex items-center justify-center">
                                        Edit
                                    </router-link>
                                </div>
                                <div v-if="ticketInfo.status == 'RESOLVED'" class="flex items-center justify-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="18" viewBox="0 0 19 18" fill="none">
                                        <path d="M11.1087 0.708336L10.2087 1.60834L11.542 2.94167C11.7253 3.15 11.817 3.39167 11.817 3.66667C11.817 3.94167 11.7253 4.2 11.542 4.38334L8.58366 7.39167L9.41699 8.29167L12.442 5.28334C12.8837 4.79167 13.1003 4.25 13.1003 3.66667C13.1003 3.08334 12.8837 2.53334 12.442 2.04167L11.1087 0.708336M7.79199 2.39167L6.89199 3.29167L7.40033 3.75834C7.58366 3.94167 7.67533 4.19167 7.67533 4.5C7.67533 4.80834 7.58366 5.05834 7.40033 5.24167L6.89199 5.70834L7.79199 6.60834L8.25866 6.1C8.70033 5.60834 8.92533 5.075 8.92533 4.5C8.92533 3.9 8.70033 3.35834 8.25866 2.85834L7.79199 2.39167M16.5003 3.71667C15.9253 3.71667 15.392 3.94167 14.9003 4.38334L10.2087 9.08334L11.1087 9.91667L15.7587 5.28334C15.967 5.075 16.217 4.96667 16.5003 4.96667C16.7837 4.96667 17.0337 5.075 17.242 5.28334L17.7503 5.79167L18.6087 4.89167L18.142 4.38334C17.6503 3.94167 17.1003 3.71667 16.5003 3.71667M4.83366 6.16667L0.666992 17.8333L12.3337 13.6667L4.83366 6.16667ZM14.8337 8.71667C14.2503 8.71667 13.717 8.94167 13.217 9.38334L11.892 10.7083L12.792 11.6083L14.117 10.2833C14.3253 10.075 14.5587 9.96667 14.8337 9.96667C15.1087 9.96667 15.3587 10.075 15.567 10.2833L16.917 11.6083L17.792 10.75L16.4587 9.38334C15.967 8.94167 15.417 8.71667 14.8337 8.71667V8.71667Z" fill="#54A581"/>
                                    </svg>
                                    <p class="font-inter-400 text-sm text-blue-grey ml-3"><span class="font-inter-700">Resolved</span> as of {{ format_date(ticketInfo.activity_log['0']['0']['created_at']) }}</p>
                                </div>
                                <div v-if="ticketInfo.status == 'INVALID'" class="flex items-center justify-start">
                                    <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M16 8.5C16 12.9183 12.4183 16.5 8 16.5C3.58172 16.5 0 12.9183 0 8.5C0 4.08172 3.58172 0.5 8 0.5C12.4183 0.5 16 4.08172 16 8.5ZM11.4766 13.3907C10.4958 14.0892 9.29586 14.5 8 14.5C4.68629 14.5 2 11.8137 2 8.5C2 7.20414 2.41081 6.00423 3.1093 5.02339L11.4766 13.3907ZM12.8908 11.9765L4.52354 3.6092C5.50434 2.91077 6.7042 2.5 8 2.5C11.3137 2.5 14 5.18629 14 8.5C14 9.7958 13.5892 10.9957 12.8908 11.9765Z" fill="#FF4500"/>
                                    </svg>
                                    <p class="font-inter-400 text-sm text-blue-grey ml-3"><span class="font-inter-700">Invalid</span> as of {{ format_date(ticketInfo.activity_log['0']['0']['created_at']) }}</p>
                                </div>
                                <button v-if="ticketInfo.isFollow == 1" @mouseover="followingtext = 'Unfollow'" @mouseleave="followingtext = 'Following'" @click.prevent="openModal('unfollow')" class="border hover:border-red hover:text-red border-green mt-1 md:mt-0 min-w-0 md:min-w-110 w-full md:w-fit bg-white text-sm font-opensans-600 py-2.5 px-5 text-green rounded-full flex items-center justify-center">
                                    {{ followingtext }}
                                </button>
                                <button v-if="ticketInfo.isFollow == 0" @click.prevent="openModal('follow')" class="bg-green border border-green mt-1 md:mt-0 min-w-0 md:min-w-110 w-full md:w-fit text-sm font-opensans-600 py-2.5 px-5 text-white rounded-full flex items-center justify-center">
                                    {{ followtext }}
                                </button>
                            </div>
                            <div ref="Ticket Info"></div>
                        </ContentCard>
                    </div>

                    <div class="col-span-12">
                        <ContentCard cardTitle="Ticket Information">
                            <div class="block px-2 py-4 scroll-style overflow-auto">
                                <table class="table-fixed w-full" style="min-width: 400px;">
                                    <tbody>
                                        <tr class="border-b border-light relative">
                                            <td class="py-3 text-blue-grey text-base font-exo-400 w-1/2 md:w-1/3 xl:w-1/4 whitespace-nowrap">Product/Service</td>
                                            <td class="py-3 text-black text-lg font-exo-600">{{ ticketInfo.product_service }}</td>
                                        </tr>
                                        <tr class="border-b border-light relative">
                                            <td class="py-3 text-blue-grey text-base font-exo-400 w-1/2 md:w-1/3 xl:w-1/4 whitespace-nowrap">Complaint</td>
                                            <td class="py-3 text-black text-base font-exo-400">{{ ticketInfo.complaint }}</td>
                                        </tr>
                                        <tr class="border-b border-light relative">
                                            <td class="py-3 text-blue-grey text-base font-exo-400 w-1/2 md:w-1/3 xl:w-1/4 whitespace-nowrap">Platform</td>
                                            <td class="py-3 text-black text-base font-exo-400">{{ ticketInfo.platform }}</td>
                                        </tr>
                                        <tr class="border-b border-light relative">
                                            <td class="py-3 text-blue-grey text-base font-exo-400 w-1/2 md:w-1/3 xl:w-1/4 whitespace-nowrap">Link</td>
                                            <td class="py-3 text-blue text-base font-exo-400"><a :href="ticketInfo.link" download>{{ ticketInfo.link }}</a></td>
                                        </tr>
                                        <tr class="border-b border-light relative">
                                            <td class="py-3 text-blue-grey text-base font-exo-400 w-1/2 md:w-1/3 xl:w-1/4 whitespace-nowrap">Created By</td>
                                            <td class="py-3 text-black text-base font-exo-400">{{ ticketInfo.created_by }}</td>
                                        </tr>
                                        <tr class="border-b border-light relative">
                                            <td class="py-3 text-blue-grey text-base font-exo-400 w-1/2 md:w-1/3 xl:w-1/4 whitespace-nowrap">Reported By</td>
                                            <td class="py-3 text-black text-base font-exo-400">
                                                <div v-for="(reporter, index) in ticketInfo.reported_by">
                                                    <span v-if="index == '0'">{{ reporter.first_name }}</span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="border-b border-light relative">
                                            <td class="py-3 text-blue-grey text-base font-exo-400 w-1/2 md:w-1/3 xl:w-1/4 whitespace-nowrap">Email Address</td>
                                            <td class="py-3 text-black text-base font-exo-400">
                                                <div v-for="(reporter, index) in ticketInfo.reported_by">
                                                    <span v-if="index == '0'">{{ reporter.email }}</span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="border-b border-light relative">
                                            <td class="py-3 text-blue-grey text-base font-exo-400 w-1/2 md:w-1/3 xl:w-1/4 whitespace-nowrap">Mobile Number</td>
                                            <td class="py-3 text-black text-base font-exo-400">
                                                <div v-for="(reporter, index) in ticketInfo.reported_by">
                                                    <span v-if="index == '0'">{{ reporter.mobile_number }}</span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="border-b border-light relative">
                                            <td class="py-3 text-blue-grey text-base font-exo-400 w-1/2 md:w-1/3 xl:w-1/4 whitespace-nowrap">Date Submitted</td>
                                            <td class="py-3 text-black text-base font-exo-400">{{ format_date(ticketInfo.date_submitted) }}</td>
                                        </tr>
                                        <tr class="relative">
                                            <td class="py-3 text-blue-grey text-base font-exo-400 w-1/2 md:w-1/3 xl:w-1/4 whitespace-nowrap">Attatched Documents</td>
                                            <td class="text-black text-base font-exo-400 flex item-center justify-start flex-wrap">
                                                <div @click.prevent="openLightboxSingle(ticketInfo.additional_documents_file)" class="cursor-pointer rounded w-30 h-30 bg-light flex items-center justify-center mr-5 my-3 p-2" style="background: #D9D9D">
                                                    <img :src="ticketInfo.additional_documents_file">
                                                </div>
                                                <!-- Multiple items Lightbox -->
                                                <!-- <div v-for="(item, index) in additional_documents_file">
                                                    <div @click.prevent="openLightbox(index)" class="cursor-pointer rounded w-30 h-30 bg-light flex items-center justify-center mr-5 my-3 p-2" style="background: #D9D9D">
                                                        <img :src="item">
                                                    </div>
                                                </div> -->
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </ContentCard>
                        <div ref="Vendor"></div>
                    </div>

                    <div class="col-span-12" v-for="vendor in ticketInfo.vendor">
                        <ContentCard cardTitle="Vendor Information">
                            <div class="block px-2 pt-4 pb-2 scroll-style overflow-auto">
                                <table class="table-fixed w-full" style="min-width: 400px;">
                                    <tbody>
                                        <tr class="border-b border-light relative">
                                            <td class="py-3 text-blue-grey text-base font-exo-400 w-1/2 md:w-1/3 xl:w-1/4 whitespace-nowrap">Vendor Name</td>
                                            <td class="py-3 text-black text-base font-exo-400">{{ vendor.vendor_name }}</td>
                                        </tr>
                                        <tr class="border-b border-light relative">
                                            <td class="py-3 text-blue-grey text-base font-exo-400 w-1/2 md:w-1/3 xl:w-1/4 whitespace-nowrap">Email Address</td>
                                            <td class="py-3 text-black text-base font-exo-400">{{ vendor.email }}</td>
                                        </tr>
                                        <tr class="border-b border-light relative">
                                            <td class="py-3 text-blue-grey text-base font-exo-400 w-1/2 md:w-1/3 xl:w-1/4 whitespace-nowrap">Mobile Number</td>
                                            <td class="py-3 text-black text-base font-exo-400">{{ vendor.mobile_number }}</td>
                                        </tr>
                                        <tr class="relative">
                                            <td class="py-3 text-blue-grey text-base font-exo-400 w-1/2 md:w-1/3 xl:w-1/4 whitespace-nowrap">City</td>
                                            <td class="py-3 text-black text-base font-exo-400">{{ vendor.city }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="flex items-center justify-start w-full pt-5">
                                    <router-link :to="'/vendor-profile/'+vendor.id" class="mt-1 md:mt-0 min-w-0 md:min-w-110 w-full md:w-fit bg-blue text-sm font-opensans-600 mr-2 py-2.5 px-5 shadow-main text-white rounded-full flex items-center justify-center">
                                        View Profile
                                    </router-link>
                                    <button @click="openModal('updateModal')" class="border border-blue mt-1 md:mt-0 min-w-0 md:min-w-110 w-full md:w-fit bg-white text-sm font-opensans-600 py-2.5 px-5 text-blue rounded-full flex items-center justify-center">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </ContentCard>
                    </div>
                    <div ref="ViolationsSection"></div>

                    <div class="col-span-12">
                        <ContentCard cardTitle="Violations">
                            <div class="block p-2">
                                <div class="grid grid-cols-2 gap-y-5 gap-x-3">
                                    <div class="col-span-2">
                                        <div class="scroll-style overflow-auto mb-4 scroll-style overflow-auto">
                                            <table class="table-auto w-full" style="min-width: 400px;">
                                                <tbody>
                                                    <tr class="border-b border-light relative" v-for="(violation, index) in selectedViolations">
                                                        <td>
                                                            <div class="flex items-center flex-nowrap h-15">
                                                                <p class="font-inter-400 text-base text-blue-grey w-fit mr-4">{{ index + 1 }}</p>
                                                                <p class="font-inter-400 text-base text-black truncate">{{ violation.violation }}</p>
                                                            </div>
                                                        </td>
                                                        <td class="cursor-pointer flex items-center ml-10 flex-nowrap h-15">
                                                            <svg v-if="violation.amount" @click.prevent="openModal('modalEditAmount');" class="mr-2" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.5858 0.585786C11.3668 -0.195262 12.6332 -0.195262 13.4142 0.585786C14.1953 1.36683 14.1953 2.63316 13.4142 3.41421L12.6213 4.20711L9.79289 1.37868L10.5858 0.585786Z" fill="#1267E5"/>
                                                                <path d="M8.37868 2.79289L0 11.1716V14H2.82842L11.2071 5.62132L8.37868 2.79289Z" fill="#1267E5"/>
                                                            </svg>
                                                            <p v-if="violation.amount" class="font-inter-400 text-base text-black whitespace-nowrap">Php {{ violation.amount }}</p>
                                                            <p v-if="!violation.amount" @click.prevent="openModal('modalAddAmount'); modalTicketID = violation.id" class="font-opensans-600 text-base whitespace-nowrap" style="color:#5E72E4;">Add Amount</p>
                                                        </td>
                                                    </tr>
                                                    <tr class="relative">
                                                        <td>
                                                            <div class="flex items-center flex-nowrap h-15">
                                                                <p class="font-inter-700 text-base text-black">Total Fine</p>
                                                            </div>
                                                        </td>
                                                        <td class="cursor-pointer flex items-center ml-10 flex-nowrap h-15">
                                                            <p class="font-inter-700 text-base text-black">Php {{ total }}</p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="flex items-center justify-start w-full">
                                            <button @click="openModal('modalViolation');" class="mt-1 md:mt-0 min-w-0 md:min-w-110 w-full md:w-fit bg-blue text-sm font-opensans-600 mr-2 py-2.5 px-5 shadow-main text-white rounded-full flex items-center justify-center">
                                                Add
                                            </button>
                                            <button @click="updateViolation()" class="border border-blue mt-1 md:mt-0 min-w-0 md:min-w-110 w-full md:w-fit bg-white text-sm font-opensans-600 py-2.5 px-5 text-blue rounded-full flex items-center justify-center">
                                                Update
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </ContentCard>
                        <div ref="Assigned Agencies"></div>
                    </div>

                    <div class="col-span-12">
                        <ContentCard cardTitle="Assigned Agencies">
                            <div class="block px-2 py-4">
                                <div class="grid grid-cols-5 gap-y-5 gap-x-5 mt-2">
                                    <div v-for="item in selectedAgencies" class="col-span-2 sm:col-span-1">
                                        <div class="">
                                            <img :src="item.logo" class="w-full mx-auto max-w-30 rounded-full border-light border object-contain" style="max-height: 7.5rem;">
                                            <p class="text-blue-grey font-opensans-600 text-xxs text-center my-3 ellipsis-2" style="height: 34px;">{{ item.agency }}</p>
                                            <p v-if="ticketInfo.status != 'INVALID' && ticketInfo.status != 'RESOLVED'" @click="removeChecked(item.code)" class="cursor-pointer font-opensans-600 text-xxs text-center my-3" style="color: #EB5757">Remove</p>
                                        </div>
                                    </div>
                                    <div v-if="ticketInfo.status != 'INVALID' && ticketInfo.status != 'RESOLVED'" @click="openModal('modalAgencies')" class="cursor-pointer col-span-2 sm:col-span-1">
                                        <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 120 120" fill="none" class="w-full mx-auto max-w-30 rounded-full">
                                            <circle cx="60" cy="60" r="59.5" stroke="#1267E5"/>
                                            <path d="M60 48V60M60 60V72M60 60H72M60 60L48 60" stroke="#1267E6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        <p class="text-blue font-opensans-600 text-xxs text-center my-3">ADD AGENCY</p>
                                    </div>
                                </div>
                                <div v-if="ticketInfo.status != 'INVALID' && ticketInfo.status != 'RESOLVED'" class="flex items-center justify-start w-full pt-5">
                                    <button @click="updateAgency()" class="border border-blue mt-1 md:mt-0 min-w-0 md:min-w-110 w-full md:w-fit bg-white text-sm font-opensans-600 py-2.5 px-5 text-blue rounded-full flex items-center justify-center">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </ContentCard>
                        <div ref="Comments"></div>
                    </div>

                    <div class="col-span-12">
                        <ContentCard cardTitle="Comments">
                            <div class="block p-2">
                                <table class="table-fixed w-full">
                                    <tbody v-for="(item, index) in ticketInfo.comments">
                                        <tr class="relative" v-for="(comment, index) in item">
                                            <td class="py-3" :class="item.length == index +1 ? 'pb-10 border-0' : 'border-b border-light'">
                                                <div class="flex items-start justify-start">
                                                    <img :src="comment.profile" class="w-9 h-9 rounded-full object-cover mr-4">
                                                    <div>
                                                        <p class="font-opensans-600 text-base" style="color: #32325D;">{{ comment.author }}</p>
                                                        <p class="font-opensans-600 text-xs text-blue-grey">{{ comment.agency }} <span class="opacity-50">•</span> <span class="opacity-50">{{ format_date(comment.comment_at) }}</span></p>
                                                        <p class="font-inter-400 text-base text-black mt-3.5">{{ comment.comment }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="flex items-center justify-start">
                                    <img :src="userImg" class="w-12 h-12 rounded-full object-cover mr-4">
                                    <input type="text" placeholder="Type comment" v-model="commentsinput" id="commentsinput" class="my-2 w-full secondary-input mr-2" />
                                    <button @click="submitComment()" class="mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-blue text-sm font-opensans-600 py-2.5 px-5 text-white rounded flex items-center justify-center" style="height: 43px">
                                        Comment
                                    </button>
                                </div>
                            </div>
                        </ContentCard>
                        <div ref="Activity Log"></div>
                    </div>

                    <div class="col-span-12">
                        <ContentCard cardTitle="Activity Log">
                            <div class="block px-2 py-6">
                                <table class="table-fixed w-full" v-for="item in ticketInfo.activity_log">
                                    <tbody>
                                        <tr class="relative" v-for="(activity, index) in item">
                                            <td class="">
                                                <div class="flex items-start justify-start">
                                                    <div class="mr-4 pt-1">
                                                        <div class="block">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M13.865 9.7454C13.3995 9.2334 12.8875 8.65158 12.8875 7.53449V5.62613C12.8875 3.04285 10.6068 0.7854 8.00024 0.7854C5.3937 0.7854 3.11297 3.06613 3.11297 5.67267V7.53449C3.11297 8.65158 2.60097 9.2334 2.13552 9.7454C1.76315 10.1643 1.41406 10.5599 1.41406 11.165C1.41406 12.445 4.06715 13.3061 8.00024 13.3061C11.9333 13.3061 14.5864 12.445 14.5864 11.165C14.5864 10.5832 14.2373 10.1643 13.865 9.7454Z" fill="#5E72E4"/>
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.00015 13.7716C7.27869 13.7716 6.58051 13.7483 5.95215 13.6785C6.20815 14.5628 7.02269 15.1912 8.00015 15.1912C8.9776 15.1912 9.79215 14.5396 10.0481 13.6785C9.41979 13.7483 8.7216 13.7716 8.00015 13.7716Z" fill="#5E72E4"/>
                                                            </svg>
                                                        </div>
                                                        <div v-if="index != index.length" style="width:2px; height:100%; background:#CED4DA; margin: 5px auto; min-height: 60px;"></div>
                                                    </div>
                                                    <div>
                                                        <p class="font-opensans-600 text-base" style="color: #32325D;">{{ activity.action }} {{ activity.activity }}</p>
                                                        <p class="font-opensans-600 text-xs text-blue-grey mt-1"><span class="opacity-50">{{ format_date(activity.created_at) }}</span></p>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </ContentCard>
                    </div>


                </div>
            </div>
        </div>
    </PageLayout>

    <div v-if="lightbox" class="lightbox p-5 prevent-select">
        <div>
            <img :src="currentItem">
        </div>
        <svg @click="lightbox = false" width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg" class="cursor-pointer lb-close">
            <path d="M1 13.5L13 1.5M1 1.5L13 13.5" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        <svg @click="prevLightbox(currentItemID)" width="9" height="16" viewBox="0 0 9 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="cursor-pointer lb-prev">
            <path d="M8 15L1 8L8 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        <svg @click="nextLightbox(currentItemID)" width="9" height="16" viewBox="0 0 9 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="cursor-pointer lb-next">
            <path d="M0.999999 1L8 8L1 15" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </div>
    
    <Modal v-show="modalActive && showModal == 'follow'" @close="closeModal">
        <template v-slot:body>
            <img src="/img/icon/follow-modal.svg" class="mb-6">
            <h5 class="font-exo-600 text-xl text-dark2 mb-4">Follow Ticket #{{ id }}</h5>
            <p class="font-inter-400 text-lg text-dark2 mb-11">By following this ticket you’ll be notified about any updates.</p> 
        </template>
        <template v-slot:footer>
            <div class="flex items-center justify-end w-full">
                <button @click="closeModal" class="border border-blue mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-white text-sm font-opensans-600 mr-4 py-2.5 px-5 text-blue rounded-lg flex items-center justify-center">
                    Cancel
                </button>
                <button @click="followTicket(id)" class="mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-blue text-sm font-opensans-600 py-2.5 px-5 shadow-main text-white rounded-lg flex items-center justify-center">
                    Follow Ticket
                </button>
            </div>
        </template>
    </Modal>
    <Modal v-show="modalActive && showModal == 'unfollow'" @close="closeModal">
        <template v-slot:body>
            <img src="/img/icon/unfollow-modal.svg" class="mb-6">
            <h5 class="font-exo-600 text-xl text-dark2 mb-4">Follow Ticket #{{ id }}</h5>
            <p class="font-inter-400 text-lg text-dark2 mb-11">By unfollowing this ticket you’ll no longer be notified about any updates.</p> 
        </template>
        <template v-slot:footer>
            <div class="flex items-center justify-end w-full">
                <button @click="closeModal" class="border border-blue mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-white text-sm font-opensans-600 mr-4 py-2.5 px-5 text-blue rounded-lg flex items-center justify-center">
                    Cancel
                </button>
                <button @click="unfollowTicket(id)" class="mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-blue text-sm font-opensans-600 py-2.5 px-5 shadow-main text-white rounded-lg flex items-center justify-center">
                    Unfollow Ticket
                </button>
            </div>
        </template>
    </Modal>
    <Modal modalTitle="Add Agencies" v-show="modalActive && showModal == 'modalAgencies'" @close="closeModal">
        <template v-slot:body>
            <form onsubmit="return false"  class="block">
                <div class="grid grid-cols-2 gap-y-6 gap-x-3">
                    <div class="col-span-2">
                        <p class="text-black font-inter-400 text-sm">Once ticket is submitted, we’ll automatically send a notification to the assigned agencies</p>
                    </div>
                    <div class="col-span-2">
                        <div class="relative w-full">
                            <input type="text" v-model="filterSearchAgency" placeholder="Search" name="selectagencies" id="selectagencies" class="my-2 w-full secondary-input" style="padding-left: 35px;"/>
                            <img src="/img/icon/search.svg" class="search-img" style="top: 23px;">
                        </div>
                        <div v-for="(agency, index) in allAgencies" ref="allAgencies" class="py-2">
                            <label class="cursor-pointer flex items-center">
                                <input type="checkbox" @change.prevent="agencyChecked(agency.code, agency.index, $event)" :value="agency.id" v-model="chosenAgencies">
                                <img :src="agency.logo" class="w-15 h-15 mx-4 rounded-full object-contain border-light border">
                                <p class="font-inter-400 text-black font-base">{{ agency.agency }}</p>
                            </label>
                        </div>
                    </div>
                </div>
            </form>
        </template>
        <template v-slot:footer>
            <div class="flex items-center justify-end w-full">
                <button @click="closeModal" class="border border-blue mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-white text-sm font-opensans-600 mr-2 py-2.5 px-5 text-blue rounded-lg flex items-center justify-center">
                    Close
                </button>
                <button @click="addCheckedAgencies()" class="mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-blue text-sm font-opensans-600 py-2.5 px-5 shadow-main text-white rounded-lg flex items-center justify-center">
                    Add
                </button>
            </div>
        </template>
    </Modal>
    
    <Modal modalTitle="Add Violation" v-show="modalActive && showModal == 'modalViolation'" @close="closeModal">
        <template v-slot:body>
            <form onsubmit="return false"  class="block">
                <div class="grid grid-cols-2 gap-y-6 gap-x-3">
                    <div class="col-span-2">
                        <div class="relative w-full">
                            <input type="text" v-model="filterSearchViolation" placeholder="Search" name="selectviolations" id="selectviolations" class="my-2 w-full secondary-input" style="padding-left: 35px;"/>
                            <img src="/img/icon/search.svg" class="search-img" style="top: 23px;">
                        </div>
                        <div class="py-2">
                            <label class="cursor-pointer flex items-start" v-for="(violation, index) in allViolations">
                                <input type="checkbox" class="mt-1" @change.prevent="violationChecked(violation.id, violation.index, $event)" :value="violation.id" v-model="chosenViolations">
                                <p class="font-inter-400 text-black font-base mx-4 ellipsis-2" style="height: 46px;">{{ violation.violation }}</p>
                            </label>
                        </div>
                    </div>
                </div>
            </form>
        </template>
        <template v-slot:footer>
            <div class="flex items-center justify-end w-full">
                <button @click="closeModal" class="border border-blue mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-white text-sm font-opensans-600 mr-2 py-2.5 px-5 text-blue rounded-lg flex items-center justify-center">
                    Close
                </button>
                <button @click="addCheckedViolation()" class="mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-blue text-sm font-opensans-600 py-2.5 px-5 shadow-main text-white rounded-lg flex items-center justify-center">
                    Update
                </button>
            </div>
        </template>
    </Modal>
    
    <Modal modalTitle="Add Amount" v-show="modalActive && showModal == 'modalAddAmount'" @close="closeModal">
        <template v-slot:body>
            <form onsubmit="return false"  class="block">
                <div class="grid grid-cols-2 gap-y-6 gap-x-3">
                    <div class="col-span-2">
                        <div class="relative w-full">
                            <input type="text" v-model="violationAmount" placeholder="Search" name="selectviolations" id="selectviolations" class="my-2 w-full secondary-input" style="padding-left: 47px;"/>
                            <p class="php font-inter-700 text-blue-grey">Php</p>
                        </div>
                    </div>
                </div>
            </form>
        </template>
        <template v-slot:footer>
            <div class="flex items-center justify-end w-full">
                <button @click="closeModal" class="border border-blue mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-white text-sm font-opensans-600 mr-2 py-2.5 px-5 text-blue rounded-lg flex items-center justify-center">
                    Cancel
                </button>
                <button class="mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-blue text-sm font-opensans-600 py-2.5 px-5 shadow-main text-white rounded-lg flex items-center justify-center">
                    Add
                </button>
            </div>
        </template>
    </Modal>
    
    <Modal modalTitle="Severity" v-show="modalActive && showModal == 'modalSeverity'" @close="closeModal">
        <template v-slot:body>
            <p class="font-inter-400 text-base text-black mb-5">Choose the severity of the ticket</p>
            <div class="grid grid-cols-3 gap-y-3 gap-x-3">
                <div class="col-span-1">
                    <button @click="severity = 'LOW'" :class="severity == 'LOW' ? 'opacity-100' : 'opacity-50'" class="p-6 w-full font-opensans-600 hover:opacity-100 text-black text-base rounded-lg" style="background: #FFD600;">
                        Low
                    </button>
                </div>
                <div class="col-span-1">
                    <button @click="severity = 'MEDIUM'" :class="severity == 'MEDIUM' ? 'opacity-100' : 'opacity-50'" class="p-6 w-full font-opensans-600 hover:opacity-100 text-black text-base rounded-lg" style="background: #F2994A;">
                        Medium
                    </button>
                </div>
                <div class="col-span-1">
                    <button @click="severity = 'HIGH'" :class="severity == 'HIGH' ? 'opacity-100' : 'opacity-50'" class="p-6 w-full font-opensans-600 hover:opacity-100 text-black text-base rounded-lg" style="background: #FA3A0E;">
                        High
                    </button>
                </div>
            </div>
        </template>
        <template v-slot:footer>
            <div class="flex items-center justify-end w-full">
                <button @click="closeModal" class="border border-blue mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-white text-sm font-opensans-600 mr-2 py-2.5 px-5 text-blue rounded-lg flex items-center justify-center">
                    Cancel
                </button>
                <button @click="submitSeverity()" class="mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-blue text-sm font-opensans-600 py-2.5 px-5 shadow-main text-white rounded-lg flex items-center justify-center">
                    Add
                </button>
            </div>
        </template>
    </Modal>
    
    <Modal modalTitle="Edit Amount" v-show="modalActive && showModal == 'modalEditAmount'" @close="closeModal">
        <template v-slot:body>
            <form onsubmit="return false"  class="block">
                <div class="grid grid-cols-2 gap-y-6 gap-x-3">
                    <div class="col-span-2">
                        <div class="relative w-full">
                            <input type="text" v-model="violationAmount" placeholder="Enter amount" name="selectviolations" id="selectviolations" class="my-2 w-full secondary-input" style="padding-left: 47px;"/>
                            <p class="php font-inter-700 text-blue-grey">Php</p>
                        </div>
                    </div>
                </div>
            </form>
        </template>
        <template v-slot:footer>
            <div class="flex items-center justify-end w-full">
                <button @click="closeModal" class="border border-blue mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-white text-sm font-opensans-600 mr-2 py-2.5 px-5 text-blue rounded-lg flex items-center justify-center">
                    Cancel
                </button>
                <button @click="editAmount()" class="mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-blue text-sm font-opensans-600 py-2.5 px-5 shadow-main text-white rounded-lg flex items-center justify-center">
                    Save
                </button>
            </div>
        </template>
    </Modal>

    <Modal modalTitle="Ticket Status" v-show="modalActive && showModal == 'ticketStatusModal'" @close="closeModal">
        <template v-slot:body>
            <form onsubmit="return false"  class="block">
                <div class="grid grid-cols-2 gap-y-6 gap-x-3">
                    <div class="col-span-2">
                        <p class="text-black font-inter-400 text-sm">Once updated, we’ll automatically send a notification to the assigned agencies & customer</p>
                    </div>
                    <div class="col-span-2">
                        <div class="relative w-full">
                            <div class="flex items-center justify-start my-3">
                                <input type="radio" v-model="currentTicketStatus" value="FOR_REVIEW" id="foereview" class="mr-2.5"/>
                                <label for="foereview" class="text-base text-blue-grey text-xs font-inter-700">For Review</label>
                            </div>
                            <div class="flex items-center justify-start my-3">
                                <input type="radio" v-model="currentTicketStatus" value="ACKNOWLEDGED" id="acknowledged" class="mr-2.5"/>
                                <label for="acknowledged" class="text-base text-blue-grey text-xs font-inter-700">Acknowledged</label>
                            </div>
                            <div class="flex items-center justify-start my-3">
                                <input type="radio" v-model="currentTicketStatus" value="ON_GOING" id="ongoing" class="mr-2.5"/>
                                <label for="ongoing" class="text-base text-blue-grey text-xs font-inter-700">On-going</label>
                            </div>
                            <div class="flex items-center justify-start my-3">
                                <input type="radio" v-model="currentTicketStatus" value="RESOLVED" id="resolved" class="mr-2.5"/>
                                <label for="resolved" class="text-base text-blue-grey text-xs font-inter-700">Resolved <span class="text-blue font-opensans-400">(0/2)</span></label>
                            </div>
                            <div class="flex items-center justify-start my-3">
                                <input type="radio" v-model="currentTicketStatus" value="INVALID" id="invalid" class="mr-2.5"/>
                                <label for="invalid" class="text-base text-blue-grey text-xs font-inter-700">Invalid</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-2">
                        <div class="relative w-full">
                            <label for="statusComment" class="text-base text-blue-grey text-xs font-inter-700">Status Update Comments</label>
                            <textarea type="text" v-model="statusComment" placeholder="Write comment" name="statusComment" id="statusComment" class="mt-2 w-full main-textarea"></textarea>
                        </div>
                        <div v-if="currentTicketStatus == 'RESOLVED' || currentTicketStatus == 'INVALID'" class="info-warning mt-4 flex w-full rounded border border-light bg-greygrey p-4">
                            <div class="block mr-4"><img src="/img/icon/info.png"></div>
                            <p class="font-inter-400 text-black text-sm">Once you update this ticket to <b class="font-opensans-700">{{ currentTicketStatus }}</b>, you can no longer update the information</p>
                        </div>
                    </div>
                </div>
            </form>
        </template>
        <template v-slot:footer>
            <div class="flex items-center justify-end w-full">
                <button @click="closeModal" class="border border-blue mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-white text-sm font-opensans-600 mx-0 sm:mx-2 py-2.5 px-5 text-blue rounded-lg flex items-center justify-center">
                    Close
                </button>
                <button @click.prevent="updateTicketStatus(id)" class="mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-blue text-sm font-opensans-600 mx-0 sm:mx-2 py-2.5 px-5 shadow-main text-white rounded-lg flex items-center justify-center">
                    Update
                </button>
            </div>
        </template>
    </Modal>
    
    <Modal modalTitle="Vendor Information" v-show="modalActive && showModal == 'updateModal'" @close="closeModal">
        <template v-slot:body>
            <form onsubmit="return false"  class="block">
                <div class="grid grid-cols-2 gap-y-6 gap-x-3">
                    <div class="col-span-2">
                        <div class="relative w-full">
                            <label for="vendorname" class="text-base text-blue-grey text-xs font-inter-700">Vendor Name</label>
                            <input type="text" v-model="vname" placeholder="Name" name="vendorname" id="vendorname" class="mt-2 w-full secondary-input"/>
                        </div>
                    </div>
                    <div class="col-span-2">
                        <div class="relative w-full">
                            <label for="email" class="text-base text-blue-grey text-xs font-inter-700">Email Address</label>
                            <input type="email" v-model="vemail" placeholder="Email" name="email" id="email" class="mt-2 w-full secondary-input"/>
                        </div>
                    </div>
                    <div class="col-span-2">
                        <div class="relative w-full">
                            <label for="mobile" class="text-base text-blue-grey text-xs font-inter-700">Mobile Number</label>
                            <input type="text" v-model="vmobile" placeholder="Mobile Number" name="mobile" id="mobile" class="mt-2 w-full secondary-input"/>
                        </div>
                    </div>
                    <div class="col-span-2">
                        <label for="city" class="text-base text-blue-grey text-xs font-inter-700">City</label>
                        <div class="mt-2 w-full secondary-input" style="padding: 4px 0 0 0">
                            <v-select :filter="fuseSearch" :options="cities" :get-option-label="(option) => option.name" placeholder="Choose" v-model="vcity"  :reduce="cities => cities.name">
                                <template #option="{ name }">
                                    {{ name }} 
                                </template>
                            </v-select>
                        </div>
                    </div> 
                </div>
            </form>
        </template>
        <template v-slot:footer>
            <div class="flex items-center justify-end w-full">
                <button @click="closeModal" class="border border-blue mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-white text-sm font-opensans-600 mr-4 py-2.5 px-5 text-blue rounded-lg flex items-center justify-center">
                    Close
                </button>
                <button @click="updateVendor()" class="mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-blue text-sm font-opensans-600 py-2.5 px-5 shadow-main text-white rounded-lg flex items-center justify-center">
                    Update
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
import 'vue-select/dist/vue-select.css';
import AlertTop from '../../utilities/alertTop.vue'
import vSelect from 'vue-select'
import Fuse from 'fuse.js'
import moment from 'moment'

export default {
    setup: () => ({
        title: 'Ticket Information'
    }),
    data () {
        return{
            id: this.$route.params.id,
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
            //Agencies
            allAgencies: [],
            selected: [],
            filterSearchAgency: '',
            checkedAgencies: [],
            selectedAgencies: [],
            chosenAgencies: [],
            arrayAgencies: [],
            //Cities
            filteredCities: [],
            cityDD: false,
            cities: [{name: 'Alaminos'}, {name: 'Angeles City'}, {name: 'Antipolo'}, {name: 'Bacolod'}, {name: 'Bacoor'}, {name: 'Bago'}, {name: 'Baguio'}, {name: 'Bais'}, {name: 'Balanga'}, {name: 'Baliwag'}, {name: 'Batac'}, {name: 'Batangas City'}, {name: 'Bayawan'}, {name: 'Baybay'}, {name: 'Bayugan'}, {name: 'Biñan'}, {name: 'Bislig'}, {name: 'Bogo'}, {name: 'Borongan'}, {name: 'Butuan'}, {name: 'Cabadbaran'}, {name: 'Cabanatuan'}, {name: 'Cabuyao'}, {name: 'Cadiz'}, {name: 'Cagayan de Oro'}, {name: 'Calaca'}, {name: 'Calamba'}, {name: 'Calapan'}, {name: 'Calbayog'}, {name: 'Caloocan'}, {name: 'Candon'}, {name: 'Canlaon'}, {name: 'Carcar'}, {name: 'Catbalogan'}, {name: 'Cauayan'}, {name: 'Cavite City'}, {name: 'Cebu City'}, {name: 'Cotabato City'}, {name: 'Dagupan'}, {name: 'Danao'}, {name: 'Dapitan'}, {name: 'Dasmariñas'}, {name: 'Davao City'}, {name: 'Digos'}, {name: 'Dipolog'}, {name: 'Dumaguete'}, {name: 'El Salvador'}, {name: 'Escalante'}, {name: 'Gapan'}, {name: 'General Santos'}, {name: 'General Trias'}, {name: 'Gingoog'}, {name: 'Guihulngan'}, {name: 'Himamaylan'}, {name: 'Ilagan'}, {name: 'Iligan'}, {name: 'Iloilo City'}, {name: 'Imus'}, {name: 'Iriga'}, {name: 'Isabela'}, {name: 'Kabankalan'}, {name: 'Kidapawan'}, {name: 'Koronadal'}, {name: 'La Carlota'}, {name: 'Lamitan'}, {name: 'Laoag'}, {name: 'Lapu-Lapu City'}, {name: 'Las Piñas'}, {name: 'Legazpi'}, {name: 'Ligao'}, {name: 'Lipa'}, {name: 'Lucena'}, {name: 'Maasin'}, {name: 'Mabalacat'}, {name: 'Makati'}, {name: 'Malabon'}, {name: 'Malaybalay'}, {name: 'Malolos'}, {name: 'Mandaluyong'}, {name: 'Mandaue'}, {name: 'Manila'}, {name: 'Marawi'}, {name: 'Marikina'}, {name: 'Masbate City'}, {name: 'Mati'}, {name: 'Meycauayan'}, {name: 'Muñoz'}, {name: 'Muntinlupa'}, {name: 'Naga'}, {name: 'Naga'}, {name: 'Navotas'}, {name: 'Olongapo'}, {name: 'Ormoc'}, {name: 'Oroquieta'}, {name: 'Ozamiz'}, {name: 'Pagadian'}, {name: 'Palayan'}, {name: 'Panabo'}, {name: 'Parañaque'}, {name: 'Pasay'}, {name: 'Pasig'}, {name: 'Passi'}, {name: 'Puerto Princesa'}, {name: 'Quezon City'}, {name: 'Roxas'}, {name: 'Sagay'}, {name: 'Samal'}, {name: 'San Carlos'}, {name: 'San Carlos'}, {name: 'San Fernando'}, {name: 'San Fernando'}, {name: 'San Jose'}, {name: 'San Jose del Monte'}, {name: 'San Juan'}, {name: 'San Pablo'}, {name: 'San Pedro'}, {name: 'Santa Rosa'}, {name: 'Santo Tomas'}, {name: 'Santiago'}, {name: 'Silay'}, {name: 'Sipalay'}, {name: 'Sorsogon City'}, {name: 'Surigao City'}, {name: 'Tabaco'}, {name: 'Tabuk'}, {name: 'Tacloban'}, {name: 'Tacurong'}, {name: 'Tagaytay'}, {name: 'Tagbilaran'}, {name: 'Taguig'}, {name: 'Tagum'}, {name: 'Talisay'}, {name: 'Talisay'}, {name: 'Tanauan'}, {name: 'Tandag'}, {name: 'Tangub'}, {name: 'Tanjay'}, {name: 'Tarlac City'}, {name: 'Tayabas'}, {name: 'Toledo'}, {name: 'Trece Martires'}, {name: 'Tuguegarao'}, {name: 'Urdaneta'}, {name: 'Valencia'}, {name: 'Valenzuela'}, {name: 'Victorias'}, {name: 'Vigan'}, {name: 'Zamboanga City'}], 
            //Ticket info
            ticketInfo: [],
            //Comment
            commentsinput: '',
            //Update Status
            currentTicketStatus: null,
            statusComment: null,
            //Follow
            followingtext: 'Following',
            followtext: 'Follow',
            //Severity
            severity: null,
            //Violations
            allViolations: [],
            filterSearchViolation: '',
            checkedViolations: [],
            selectedViolations: [],
            chosenViolations: [],
            arrayViolations: [],
            violationAmount: '',
            //User
            userImg: '',
            //Lightbox
            lightbox: false,
            additional_documents_file: ['/img/background-banner.svg', '/img/iris-logo.png', '/img/iris-logo-blue.png', '/img/background-login.png'],
            currentItem: '',
            currentItemID: 0,
            //Vendor Info
            vendor: [],
            vname: '',
            vemail: '',
            vmobile: '',
            vcity: ''
        };
    },
    components: { PageLayout, ContentCard, Modal, AlertTop, vSelect },
    watch: {
        filterSearchAgency: function() {
            this.getAgencies();
        },
        filterSearchViolation: function() {
            this.getViolations();
        }
    },
    computed: {
        total: function(){
            return this.selectedViolations.reduce(function(total, item){
                return total + parseInt(item.amount); 
            },0);
        },
    },
    async mounted(){
        this.getAgencies();
        this.getTicket();
        this.getViolations();
        this.getUser();
    },
    methods: {
        //Lightbox
        openLightboxSingle(item){
            this.lightbox = true;
            this.currentItem = item;
        },
        openLightbox(id){
            const file = this.additional_documents_file.filter((a, index) => (index == id));
            this.lightbox = true;
            this.currentItem = file;
            this.currentItemID = id;
        },
        prevLightbox(id){
            if(this.currentItemID == 0){
                this.currentItemID = this.additional_documents_file.length - 1;
            }else{
                this.currentItemID = id - 1;
            }
            this.openLightbox(this.currentItemID)
        },
        nextLightbox(id){
            if(this.currentItemID == this.additional_documents_file.length - 1){
                this.currentItemID = 0;
            }else{
                this.currentItemID = id + 1;
            }
            this.openLightbox(this.currentItemID)
        },
        //Get User
        async getUser(){
            this.pageNumber = 0;
            const response = await axios.get('api/v1/profile');
            //Filter User Data
            this.userImg = response.data.data.profile;
        },
        //Get Ticket
        async getTicket(){
            const response = await axios.get('api/v1/tickets/'+this.id);
            //Filter Ticket Data
            this.ticketInfo = response.data.data;

            //clone Ticket Agencies to Selected Agencies
            const selectedAgencies = []
            const checkedAgencies = []
            const chosenAgencies = []
            const arrayAgencies = []
            this.ticketInfo.assigned_agencies.map(function(value, key) {
                selectedAgencies.push(value);
                checkedAgencies.push(value);
                chosenAgencies.push(value.id);
                arrayAgencies.push({agency_id: value.id});
            });
            this.chosenAgencies = chosenAgencies
            this.arrayAgencies = arrayAgencies
            this.checkedAgencies = checkedAgencies
            this.selectedAgencies = selectedAgencies

            
            //clone Ticket Violations to Selected Violations
            const selectedViolations = []
            const checkedViolations = []
            const chosenViolations = []
            const arrayViolations = []
            this.ticketInfo.violations['0'].map(function(value, key) {
                selectedViolations.push(value);
                chosenViolations.push(value.id);
                checkedViolations.push(value);
                arrayViolations.push({violation: value.violation, amount: value.amount});
            });
            this.checkedViolations = checkedViolations
            this.arrayViolations = arrayViolations
            this.chosenViolations = chosenViolations
            this.selectedViolations = selectedViolations
        },
        //Get Agencies
        async getAgencies(){
            const response = await axios.get('api/v1/agencies');
            //Filter Agencies Ticket
            this.allAgencies = response.data.data.filter((a) => (a.agency.includes(this.filterSearchAgency) ||  a.agency.toLowerCase().includes(this.filterSearchAgency)));
        },
        //Get checked agencies
        agencyChecked(code, index, $event){
            const checked = $event.target.checked;
            const agencies = this.allAgencies.filter((a) => (a.code == code));
            
            if(checked){
                this.checkedAgencies.push(agencies['0']); 
            }else{
                this.checkedAgencies.splice(agencies['0'], 1);
            }
        },
        //Add checked agencies
        addCheckedAgencies(){
            //clone checked Agencies to selected Agencies
            this.selectedAgencies = this.checkedAgencies
            this.closeModal();
        },
        //Update Agencies
        async updateAgency(){
            //clone Ticket Agencies to Selected Agencies
            const arrayAgencies = []
            this.selectedAgencies.map(function(value, key) {
                arrayAgencies.push({agency_id: value.id});
            });
            this.arrayAgencies = arrayAgencies

            //Post
            await axios.post('api/v1/ticket/assigned_agencies', {
                ticket_id: this.id,
                agencies: this.arrayAgencies
            })
            .then((success) => {
                //Alert Content
                this.successAlert = true;
                this.successMessage = 'Successfully updated';
                this.successIcon = 'like.svg';
                this.getTicket();
            })
            .catch((error) => {
                console.log(error)
            })
        },
        //Remove checked agencies
        removeChecked(code){
            const index = this.selectedAgencies.findIndex(item => item.code === code)
            if (index !== -1) {
                this.selectedAgencies.splice(index, 1)
            }

            //clone
            const checkedAgencies = []
            const chosenAgencies = []
            this.selectedAgencies.map(function(value, key) {
                checkedAgencies.push(value);
                chosenAgencies.push(value.id);
            });
            this.chosenAgencies = chosenAgencies
            this.checkedAgencies = checkedAgencies
        },
        //Get Violations
        async getViolations(){
            const response = await axios.get('api/v1/list_violations');
            //Filter Agencies Ticket
            this.allViolations = response.data.data.filter((a) => (a.violation.includes(this.filterSearchViolation) ||  a.violation.toLowerCase().includes(this.filterSearchViolation)));
        },
        //Get checked Violations
        violationChecked(id, index, $event){
            const checked = $event.target.checked;
            const violations = this.allViolations.filter((a) => (a.id == id));
            
            if(checked){
                this.checkedViolations.push(violations['0']); 
            }else{
                this.checkedViolations.splice(violations['0'], 1);
            }

            console.log(this.checkedViolations)
            console.log(this.selectedViolations)
        },
        //Add checked agencies
        addCheckedViolation(){
            this.selectedViolations = this.checkedViolations
            this.closeModal();
        },
        //Update Violations
        async updateViolation(){
            const arrayViolations = []
            this.selectedViolations.map(function(value, key) {
                arrayViolations.push({violation: value.violation, amount: value.amount});
            });
            this.arrayViolations = arrayViolations

            //Post
            await axios.post('api/v1/ticket/violations', {
                ticket_id: this.id,
                violations: this.arrayViolations
            })
            .then((success) => {
                //Alert Content
                this.successAlert = true;
                this.successMessage = 'Successfully updated';
                this.successIcon = 'like.svg';
                this.getTicket();
            })
            .catch((error) => {
                console.log(error)
            })
        },
        editAmount(){
            const violation = this.selectedViolations.filter((a) => (a.id == this.modalTicketID));
            violation['0'].amount = this.violationAmount
            this.closeModal();
        },
        addAmount(){
            const violation = this.selectedViolations.filter((a) => (a.id == this.modalTicketID));
            violation['0'].amount = this.violationAmount
            this.closeModal();
        },
        //Cities Search
        fuseSearch(options, search) {
        const fuse = new Fuse(options, {
            keys: ['0'],
            shouldSort: true,
        })
        return search.length
            ? fuse.search(search).map(({ item }) => item)
            : fuse.list
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
        //Format Display Settings
        format_date(value){
            if (value) {
                return moment(String(value)).format('LL')
            }
        },
        //Submit Comment
        async submitComment(){
            const inputs =  {
                ticket_id: this.id,
                comment: this.commentsinput,
            };

            await axios.post('api/v1/ticket/comment', inputs, {
                header: {
                    'Accept': 'application/json', 
                    'Content-Type': 'application/json', 
                },
            })
            .then((res) => {
                this.getTicket();
            })
            .catch((error) => {
                console.log(inputs)
            })
        },
        //Follow Ticket
        async followTicket(ticketID) {
            await axios.post('/api/v1/ticket/update_follow', {
                ticket_id: ticketID,
                isFollow: 1
            })
            .then((res) => {
                this.closeModal();
                //Alert Content
                this.successAlert = true;
                this.successMessage = 'Following Ticket #' + this.id;
                this.successIcon = 'favorite-active.svg';
            })
            .catch((error) => {
                console.log(error.response.data.message || error.message)
            })
            //Refresh Data
            this.getTicket();
        },
        //Unfollow Ticket
        async unfollowTicket(ticketID) {
            await axios.post('/api/v1/ticket/update_follow', {
                ticket_id: ticketID,
                isFollow: 0
            })
            .then((res) => {
                this.closeModal();
                //Alert Content
                this.successAlert = true;
                this.successMessage = 'Unfollowing Ticket #' + this.id;
                this.successIcon = 'unfollow.svg';
            })
            .catch((error) => {
                console.log(error.response.data.message || error.message)
            })
            //Refresh Data
            this.getTicket();
        },
        //Update Severity
        async submitSeverity() {
            await axios.post('/api/v1/ticket/update_severity', {
                ticket_id: this.id,
                severity: this.severity
            })
            .then((res) => {
                this.closeModal();
                //Alert Content
                this.successAlert = true;
                this.successMessage = 'Update Ticket #' + this.id + " severity";
                this.successIcon = 'like.svg';
            })
            .catch((error) => {
                console.log(error.response.data.message || error.message)
            })
            //Refresh Data
            this.getTicket();
        },
        async updateTicketStatus(ticketID){
            await axios.post('/api/v1/ticket/update_status', {
                ticket_id: ticketID,
                status: this.currentTicketStatus,
                comment: this.statusComment
            })
            .then((res) => {
                this.closeModal();
                //Reset Data
                this.statusComment = null;
                this.currentTicketStatus = null;
                //Alert Content
                this.successAlert = true;
                this.successMessage = 'Ticket #' + this.id + ' is updated';
                this.successIcon = 'like.svg';
            })
            .catch((error) => {
                console.log(error.response.data.message || error.message)
            })
            //Refresh Data
            this.getTicket();
        },
        //Update Vendor
        async updateVendor() {
            await axios.put('api/v1/reported_vendors/1', {
                vendor_name: this.vname,
                email: this.vemail,
                mobile_number: this.vmobile,
                city: this.vcity
            })
            .then((success) => {
                //Alert Content
                this.successAlert = true;
                this.successMessage = 'Successfully updated';
                this.successIcon = 'like.svg';
                this.closeModal()
            })
            .catch((error) => {
                this.successAlert = true;
                this.successMessage = "Please enter a valid Email or Mobile Number";
                this.successIcon = 'warning-red.svg';
            })
        },
    },
}
</script>