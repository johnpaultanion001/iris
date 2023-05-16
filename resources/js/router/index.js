import { createRouter, createWebHistory } from "vue-router";
//Auth
import login from '../components/auth/login.vue'
import resetPassword from '../components/auth/resetPassword.vue'
import newPassword from '../components/auth/newPassword.vue'
//Not Found
import notFound from '../components/notFound.vue'
//Pages
import dashboard from '../components/pages/dashboard/dashboard.vue'
import inbox from '../components/pages/inbox/inbox.vue'
import tickets from '../components/pages/tickets/tickets.vue'
import createTicket from '../components/pages/tickets/createTicket.vue'
import editTicket from '../components/pages/tickets/editTicket.vue'
import ticketInformation from '../components/pages/tickets/ticketInformation.vue'
import reportedVendors from '../components/pages/reported-vendors/reportedVendors.vue'
import vendorProfile from '../components/pages/reported-vendors/vendorProfile.vue'
import users from '../components/pages/users/users.vue'
import createUser from '../components/pages/users/createUser.vue'
import editUser from '../components/pages/users/editUser.vue'
import userProfile from '../components/pages/users/userProfile.vue'
import reports from '../components/pages/reports/reports.vue'
import settings from '../components/pages/settings/settings.vue'
import activity from '../components/pages/activity/activity.vue'

const routes = [
    {
        path: '/:pathMatch(.*)*',
        component: notFound
    },
    {
        path: '/login',
        component: login
    },
    {
        path: '/reset-password',
        component: resetPassword
    },
    {
        path: '/new-password',
        component: newPassword
    },
    //Pages
    {
        path: '/',
        component: dashboard
    },
    {
        path: '/inbox',
        component: inbox
    },
    {
        path: '/tickets',
        component: tickets
    },
    {
        path: '/create-ticket',
        component: createTicket
    },
    {
        path: '/edit-ticket',
        component: editTicket
    },
    {
        path: '/ticket-information',
        component: ticketInformation
    },
    {
        path: '/reported-vendors',
        component: reportedVendors
    },
    {
        path: '/vendor-profile/:id',
        component: vendorProfile
    },
    {
        path: '/users',
        component: users
    },
    {
        path: '/create-user',
        component: createUser
    },
    {
        path: '/edit-user',
        component: editUser
    },
    {
        path: '/user-profile',
        component: userProfile
    },
    {
        path: '/reports',
        component: reports
    },
    {
        path: '/settings',
        component: settings
    },
    {
        path: '/activity',
        component: activity
    },
]

const router = createRouter({
    history: createWebHistory(),
    routes,
})

export default router