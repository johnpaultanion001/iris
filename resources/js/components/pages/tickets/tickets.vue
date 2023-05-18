<template>
    <PageLayout :pageName="title">        
        <TicketsList vendorID="" colVendor="on" colSeverity="on" />
    </PageLayout>
</template>

<script>

import PageLayout from '../../pageLayout.vue'
import TicketsList from './ticketsList.vue'

export default {
    setup: () => ({
        title: 'Tickets',
    }),
    components: { TicketsList, PageLayout},
}
</script>