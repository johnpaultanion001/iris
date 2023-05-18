<template>
    <div class="content-card bg-white rounded-2xl p-4 shadow-main relative w-full">
        <h6 v-if="cardTitle && cardTitle != 'Vendor Information' && cardTitle != 'User Info' && cardTitle != 'Assigned Agencies'
         && cardTitle != 'Profile' && cardTitle != 'Change Password' && cardTitle != 'Contact Us' && cardTitle != 'About' && cardTitle != 'Terms & Privacy'"
         class="font-opensans-600 text-base text-dark mb-2.5">
            {{ cardTitle }}
        </h6>
        <h6 v-if="cardTitle == 'Vendor Information' || cardTitle == 'User Info' || cardTitle == 'Assigned Agencies'
         || cardTitle != 'Profile' || cardTitle != 'Change Password' || cardTitle != 'Contact Us' || cardTitle != 'About' || cardTitle != 'Terms & Privacy'" class="text-blue-grey font-exo-600 text-xl pt-2 pl-2">{{ cardTitle }}</h6>
        <slot></slot>
    </div>
</template>

<script>
export default  {
    setup: () => ({
        title: 'Content Card'
    }),
    props: ['cardTitle'],
}
</script>
