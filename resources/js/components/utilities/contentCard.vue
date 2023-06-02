<template>
    <div class="content-card bg-white rounded-2xl shadow-main relative w-full" :class="this.class ? ''+this.class : 'p-4 '+this.class">
        <h6 v-if="cardTitle && cardTitle != 'Vendor Information' && cardTitle != 'User Info' && cardTitle != 'Assigned Agencies'
         && cardTitle != 'Profile' && cardTitle != 'Change Password' && cardTitle != 'Contact Us' && cardTitle != 'About' && cardTitle != 'Terms & Privacy'
         && cardTitle != 'Ticket Status' && cardTitle != 'Ticket Information' && cardTitle != 'Vendor' && cardTitle != 'Violations' && cardTitle != 'Assigned Agencies' && cardTitle != 'Comments' && cardTitle != 'Activity Log'"
         class="font-opensans-600 text-base text-dark mb-2.5">
            {{ cardTitle }}
        </h6>
        <h6 v-if="cardTitle == 'Vendor Information' || cardTitle == 'User Info' || cardTitle == 'Assigned Agencies'
         || cardTitle == 'Profile' || cardTitle == 'Change Password' || cardTitle == 'Contact Us' || cardTitle == 'About' || cardTitle == 'Terms & Privacy'
         || cardTitle == 'Ticket Status' || cardTitle == 'Ticket Information' || cardTitle == 'Vendor' || cardTitle == 'Violations' || cardTitle == 'Assigned Agencies' || cardTitle == 'Comments' || cardTitle == 'Activity Log'" class="text-blue-grey font-exo-600 text-xl pt-2 pl-2">{{ cardTitle }}</h6>
        <slot></slot>
    </div>
</template>

<script>
export default  {
    setup: () => ({
        title: 'Content Card'
    }),
    props: ['cardTitle', 'class'],
}
</script>
