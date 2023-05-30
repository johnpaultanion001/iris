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
                                    <img v-if="sectionName === 'Ticket Status'" src="/img/icon/ticketstatus-active.png" class="absolute">
                                    <img src="/img/icon/ticketstatus.png"> 
                                </div>
                                <p :class="sectionName === 'Ticket Status' ? 'text-blue' : 'text-darkgrey'">Ticket Status</p>
                            </button>
                            <button @click="scrollToDiv('Ticket Info')" class="rounded w-full flex items-center text-start mb-1 py-4.5 px-2 text-sm font-opensans-600  border-l-4 hover:bg-lighter" :class="sectionName === 'Ticket Info' ? 'border-green bg-lighter' : 'bg-white border-transparent'">
                                <div class="mr-3.5 relative">
                                    <img v-if="sectionName === 'Ticket Info'" src="/img/icon/about-active.png" class="absolute"> 
                                    <img src="/img/icon/about.png"> 
                                </div>
                                <p :class="sectionName === 'Ticket Info' ? 'text-blue' : 'text-darkgrey'">Ticket Info</p>
                            </button>
                            <button @click="scrollToDiv('Vendor')" class="rounded w-full flex items-center text-start mb-1 py-4.5 px-2 text-sm font-opensans-600  border-l-4 hover:bg-lighter" :class="sectionName === 'Vendor' ? 'border-green bg-lighter' : 'bg-white border-transparent'">
                                <div class="mr-3.5 relative">
                                    <img v-if="sectionName === 'Vendor'" src="/img/icon/profile-active.png" class="absolute"> 
                                    <img src="/img/icon/profile.png"> 
                                </div>
                                <p :class="sectionName === 'Vendor' ? 'text-blue' : 'text-darkgrey'">Vendor</p>
                            </button>
                            <button @click="scrollToDiv('Violations')" class="rounded w-full flex items-center text-start mb-1 py-4.5 px-2 text-sm font-opensans-600  border-l-4 hover:bg-lighter" :class="sectionName === 'Violations' ? 'border-green bg-lighter' : 'bg-white border-transparent'">
                                <div class="mr-3.5 relative">
                                    <img v-if="sectionName === 'Violations'" src="/img/icon/violations-active.png" class="absolute"> 
                                    <img src="/img/icon/violations.png"> 
                                </div>
                                <p :class="sectionName === 'Violations' ? 'text-blue' : 'text-darkgrey'">Violations</p>
                            </button>
                            <button @click="scrollToDiv('Assigned Agencies')" class="rounded w-full flex items-center text-start mb-1 py-4.5 px-2 text-sm font-opensans-600  border-l-4 hover:bg-lighter" :class="sectionName === 'Assigned Agencies' ? 'border-green bg-lighter' : 'bg-white border-transparent'">
                                <div class="mr-3.5 relative">
                                    <img v-if="sectionName === 'Assigned Agencies'" src="/img/icon/agencies-active.png" class="absolute"> 
                                    <img src="/img/icon/agencies.png"> 
                                </div>
                                <p :class="sectionName === 'Assigned Agencies' ? 'text-blue' : 'text-darkgrey'">Assigned Agencies</p>
                            </button>
                            <button @click="scrollToDiv('Comments')" class="rounded w-full flex items-center text-start mb-1 py-4.5 px-2 text-sm font-opensans-600  border-l-4 hover:bg-lighter" :class="sectionName === 'Comments' ? 'border-green bg-lighter' : 'bg-white border-transparent'">
                                <div class="mr-3.5 relative">
                                    <img v-if="sectionName === 'Comments'" src="/img/icon/comments-active.png" class="absolute"> 
                                    <img src="/img/icon/comments.png"> 
                                </div>
                                <p :class="sectionName === 'Comments' ? 'text-blue' : 'text-darkgrey'">Comments</p>
                            </button>
                            <button @click="scrollToDiv('Activity Log')" class="rounded w-full flex items-center text-start mb-1 py-4.5 px-2 text-sm font-opensans-600  border-l-4 hover:bg-lighter" :class="sectionName === 'Activity Log' ? 'border-green bg-lighter' : 'bg-white border-transparent'">
                                <div class="mr-3.5 relative">
                                    <img v-if="sectionName === 'Activity Log'" src="/img/icon/activitylog-active.png" class="absolute"> 
                                    <img src="/img/icon/activitylog.png"> 
                                </div>
                                <p :class="sectionName === 'Activity Log' ? 'text-blue' : 'text-darkgrey'">Activity Log</p>
                            </button>
                        </div>
                        <div class="bg-light-blue w-full p-4 h-full rounded-b-2xl">
                            <button class="border border-blue text-blue mt-1 md:mt-0 min-w-110 w-full md:w-fit bg-transparent hover:bg-white-25 text-sm font-opensans-600 mx-0 sm:mx-2 py-2.5 px-5 rounded-full flex items-center justify-center">
                                <img src="/img/icon/export-blue.png" class="mr-2">Export
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
                                            <img :src="'/img/'+item.logo" class="w-10 h-10 object-cover mr-2">
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
                            <div class="px-10 py-5 flex items-center justify-between border-b border-light mx-2">
                                <div class="text-center">
                                    <img :src="ticketInfo.status == 'FOR_REVIEW' ? '/img/icon/eye-active.png' : '/img/icon/eye-inactive.png'" class="m-auto">
                                    <p :class="ticketInfo.status == 'FOR_REVIEW' ? 'text-blue' : 'text-blue-grey'" class="text-xs font-opensans-600 mt-3">For Review</p>
                                </div>
                                <div>
                                    <img src="/img/icon/arrowright.png" class="">
                                </div>
                                <div class="text-center">
                                    <img :src="ticketInfo.status == 'ACKNOWLEDGED' ? '/img/icon/like-active.png' : '/img/icon/like-inactive.png'" class="m-auto">
                                    <p :class="ticketInfo.status == 'ACKNOWLEDGED' ? 'text-blue' : 'text-blue-grey'" class="text-xs font-opensans-600 mt-3">Acknowledged</p>
                                </div>
                                <div>
                                    <img src="/img/icon/arrowright.png" class="">
                                </div>
                                <div class="text-center">
                                    <img :src="ticketInfo.status == 'ON_GOING' ? '/img/icon/clock-active.png' : '/img/icon/clock-inactive.png'" class="m-auto">
                                    <p :class="ticketInfo.status == 'ON_GOING' ? 'text-blue' : 'text-blue-grey'" class="text-xs font-opensans-600 mt-3">On-going</p>
                                </div>
                                <div>
                                    <img src="/img/icon/arrowright.png" class="">
                                </div>
                                <div class="text-center">
                                    <img :src="ticketInfo.status == 'RESOLVED' ? '/img/icon/party-active.png' : '/img/icon/party-inactive.png'" class="m-auto">
                                    <p :class="ticketInfo.status == 'RESOLVED' ? 'text-blue' : 'text-blue-grey'" class="text-xs font-opensans-600 mt-3">Resolved</p>
                                </div>
                                <div>
                                    <img src="/img/icon/line.png" class="">
                                </div>
                                <div class="text-center">
                                    <img :src="ticketInfo.status == 'INVALID' ? '/img/icon/warning-red2.png' : '/img/icon/warning-inactive.png'" class="m-auto">
                                    <p :class="ticketInfo.status == 'INVALID' ? 'text-red' : 'text-blue-grey'" class="text-xs font-opensans-600 mt-3">Invalid</p>
                                </div>
                            </div>
                            <div class="flex items-center justify-between w-full pt-5">
                                <div class="flex items-center justify-start">
                                    <button @click="openModal('ticketStatusModal')" class="mt-1 md:mt-0 min-w-0 md:min-w-110 w-full md:w-fit bg-blue text-sm font-opensans-600 mr-2 py-2.5 px-5 shadow-main text-white rounded-full flex items-center justify-center">
                                        Update Ticket Status
                                    </button>
                                    <button @click="openModal('modalSeverity'); severity = this.ticketInfo.severity" class="border border-blue mt-1 md:mt-0 min-w-0 md:min-w-110 w-full md:w-fit bg-white text-sm font-opensans-600 mr-2 py-2.5 px-5 text-blue rounded-full flex items-center justify-center">
                                        Update Severity
                                    </button>
                                    <router-link to="/" class="border border-blue mt-1 md:mt-0 min-w-0 md:min-w-110 w-full md:w-fit bg-white text-sm font-opensans-600 py-2.5 px-5 text-blue rounded-full flex items-center justify-center">
                                        Edit
                                    </router-link>
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
                            <div class="block px-2 py-4">
                                <table class="table-fixed w-full">
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
                                            <td class="py-3 text-black text-base font-exo-400">
                                                <div class="rounded w-30 h-30 bg-light flex items-center justify-center" style="background: #D9D9D">
                                                    <img :src="ticketInfo.additional_documents_file">
                                                </div>
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
                            <div class="block px-2 pt-4 pb-2">
                                <table class="table-fixed w-full">
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
                                    <router-link to="/" class="mt-1 md:mt-0 min-w-0 md:min-w-110 w-full md:w-fit bg-blue text-sm font-opensans-600 mr-2 py-2.5 px-5 shadow-main text-white rounded-full flex items-center justify-center">
                                        View Profile
                                    </router-link>
                                    <button class="border border-blue mt-1 md:mt-0 min-w-0 md:min-w-110 w-full md:w-fit bg-white text-sm font-opensans-600 py-2.5 px-5 text-blue rounded-full flex items-center justify-center">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </ContentCard>
                        <div ref="Violations"></div>
                    </div>

                    <div class="col-span-12">
                        <ContentCard cardTitle="Violations">
                            <div class="block p-2">
                                <div class="grid grid-cols-2 gap-y-5 gap-x-3">
                                    <div class="col-span-2">
                                        <div class="scroll-style overflow-auto mb-4">
                                            <table class="table-auto w-full">
                                                <tbody>
                                                    <tr class="border-b border-light relative" v-for="(violation, index) in selectedViolations">
                                                        <td>
                                                            <div class="flex items-center flex-nowrap h-15">
                                                                <p class="font-inter-400 text-base text-blue-grey w-fit mr-4">{{ index + 1 }}</p>
                                                                <p class="font-inter-400 text-base text-black">{{ violation.violation }}</p>
                                                            </div>
                                                        </td>
                                                        <td class="cursor-pointer flex items-center ml-10 flex-nowrap h-15">
                                                            <img v-if="!violation.amount" @click.prevent="openModal('modalAddAmount'); modalTicketID = violation.id" src="/img/icon/edit-blue.png" class="mr-2">
                                                            <img v-if="violation.amount" @click.prevent="openModal('modalEditAmount'); modalTicketID = violation.id" src="/img/icon/edit-blue.png" class="mr-2">
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
                                    <div v-for="item in selectedAgencies" class="col-span-1">
                                        <div>
                                            <img :src="'/img/' + item.logo" class="w-full mx-auto max-w-30 rounded-full">
                                            <p class="text-blue-grey font-opensans-600 text-xxs text-center my-3 ellipsis-2" style="height: 34px;">{{ item.agency }}</p>
                                            <p @click="removeChecked(item.code)" class="cursor-pointer font-opensans-600 text-xxs text-center my-3" style="color: #EB5757">Remove</p>
                                        </div>
                                    </div>
                                    <div @click="openModal('modalAgencies')" class="cursor-pointer col-span-1">
                                        <img src="/img/icon/addphoto.png" class="w-full mx-auto max-w-30 rounded-full">
                                        <p class="text-blue font-opensans-600 text-xxs text-center my-3">ADD AGENCY</p>
                                    </div>
                                </div>
                                <div class="flex items-center justify-start w-full pt-5">
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
                                    <tbody v-for="item in ticketInfo.comments">
                                        <tr class="border-b border-light relative"  v-for="comment in item">
                                            <td class="py-3">
                                                <div class="flex items-start justify-start">
                                                    <img :src="comment.profile" class="w-9 h-9 rounded-full object-cover mr-4">
                                                    <div>
                                                        <p class="font-opensans-600 text-base" style="color: #32325D;">Name</p>
                                                        <p class="font-opensans-600 text-xs text-blue-grey">{{ comment.agency }} <span class="opacity-50">•</span> <span class="opacity-50">{{ format_date(comment.comment_at) }}</span></p>
                                                        <p class="font-inter-400 text-base text-black mt-3.5">{{ comment.comment }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="flex items-center justify-start mt-10">
                                    <img src="/img/user-photo.png" class="w-12 h-12 rounded-full object-cover mr-4">
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
                                                            <img src="/img/icon/bell-purple.png" class="">
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
    
    <Modal v-show="modalActive && showModal == 'follow'" @close="closeModal">
        <template v-slot:body>
            <img src="/img/icon/follow-modal.png" class="mb-6">
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
            <img src="/img/icon/unfollow-modal.png" class="mb-6">
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
            <form class="block">
                <div class="grid grid-cols-2 gap-y-6 gap-x-3">
                    <div class="col-span-2">
                        <p class="text-black font-inter-400 text-sm">Once ticket is submitted, we’ll automatically send a notification to the assigned agencies</p>
                    </div>
                    <div class="col-span-2">
                        <div class="relative w-full">
                            <input type="text" v-model="filterSearchAgency" placeholder="Search" name="selectagencies" id="selectagencies" class="my-2 w-full secondary-input" style="padding-left: 35px;"/>
                            <img src="/img/icon/search.png" class="search-img" style="top: 23px;">
                        </div>
                        <div v-for="(agency, index) in allAgencies" ref="allAgencies" class="py-2">
                            <label class="cursor-pointer flex items-center">
                                <input type="checkbox" @change.prevent="agencyChecked(agency.code, agency.index, $event)" :value="agency.id" v-model="chosenAgencies">
                                <img :src="'/img/' + agency.logo" class="w-15 h-15 mx-4 rounded-full">
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
            <form class="block">
                <div class="grid grid-cols-2 gap-y-6 gap-x-3">
                    <div class="col-span-2">
                        <div class="relative w-full">
                            <input type="text" v-model="filterSearchViolation" placeholder="Search" name="selectviolations" id="selectviolations" class="my-2 w-full secondary-input" style="padding-left: 35px;"/>
                            <img src="/img/icon/search.png" class="search-img" style="top: 23px;">
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
            <form class="block">
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
            <form class="block">
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
            <form class="block">
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
            violationAmount: ''

        };
    },
    components: { PageLayout, ContentCard, Modal, AlertTop },
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
    },
    methods: {
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
                this.successIcon = 'like.png';
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
                this.successIcon = 'like.png';
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
                this.successIcon = 'favorite-active.png';
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
                this.successIcon = 'unfollow.png';
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
                this.successIcon = 'like.png';
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
                this.successIcon = 'like.png';
            })
            .catch((error) => {
                console.log(error.response.data.message || error.message)
            })
            //Refresh Data
            this.getTicket();
        },
    },
}
</script>