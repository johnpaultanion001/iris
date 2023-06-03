import {createRouter, createWebHistory} from "vue-router";
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
import axios from 'axios'

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
    path: '/forgot-password/:token',
    component: newPassword
  },
  //Pages
  {
    path: '/',
    component: dashboard,
    meta: {
      requiresAuth: true
    }
  },
  {
    path: '/inbox',
    component: inbox,
    meta: {
      requiresAuth: true
    }
  },
  {
    path: '/intelligence/:status',
    component: tickets,
    meta: {
      requiresAuth: true
    }
  },
  {
    path: '/intelligence',
    component: tickets,
    meta: {
      requiresAuth: true
    }
  },
  {
    path: '/create-ticket',
    component: createTicket,
    meta: {
      requiresAuth: true
    }
  },
  {
    path: '/edit-ticket/:id',
    component: editTicket,
    meta: {
      requiresAuth: true
    }
  },
  {
    path: '/ticket-information/:id',
    component: ticketInformation,
    meta: {
      requiresAuth: true
    }
  },
  {
    path: '/reported-vendors',
    component: reportedVendors,
    meta: {
      requiresAuth: true
    }
  },
  {
    path: '/vendor-profile/:id',
    component: vendorProfile,
    meta: {
      requiresAuth: true
    }
  },
  {
    path: '/users',
    component: users,
    meta: {
      requiresAuth: true
    }
  },
  {
    path: '/create-user',
    component: createUser,
    meta: {
      requiresAuth: true
    }
  },
  {
    path: '/edit-user/:id',
    component: editUser,
    meta: {
      requiresAuth: true
    }
  },
  {
    path: '/profile/:id',
    component: userProfile,
    meta: {
      requiresAuth: true
    }
  },
  {
    path: '/reports',
    component: reports,
    meta: {
      requiresAuth: true
    }
  },
  {
    path: '/settings',
    component: settings,
    meta: {
      requiresAuth: true
    }
  },
  {
    path: '/activity',
    component: activity,
    meta: {
      requiresAuth: true
    }
  },
]

const router = createRouter({
  history: createWebHistory(),
  routes,
})


router.beforeEach(async (to, from, next) => {
  if (to.matched.some(record => record.meta.requiresAuth)) {
    const response = await axios.get('api/v1/profile')
      .then((res) => {
        next()
      })
      .catch((error) => {
        next({path: '/login'})
      })
    console.clear('');
  } else {
    const response = await axios.get('api/v1/profile')
      .then((res) => {
        next({path: '/'})
      })
      .catch((error) => {
        next()
      })
    console.clear('');
  }
})

export default router
