<template>
  <div class="py-4 pl-2 h-full">
    <div class="sidebar bg-lighter rounded-2xl h-full w-full overflow-hidden shadow-secondary">
      <div class="sidebar-header p-4 border border-t-0 border-x-0 border-b-1-light">
        <img src="/img/iris-logo-horizontal.svg" class="mx-auto w-[80px] h-[20px]">
      </div>
      <div class="sidebar-body bg-white py-0 px-2.5 h-full">
        <div class="agency-title w-full flex items-center pt-4 pb-3">
          <div class="rounded-full border mr-3 block">
            <img :src="agencyImg" style="width: 50px; height: 50px;max-width: 50px;max-height: 50px;padding: 7px;">
          </div>
          <p class="text-sm text-blue-grey font-opensans-600">{{ agencyName }}</p>
        </div>
        <router-link v-for="(page, index) in pages"
                     class="rounded w-full flex items-center mb-1 py-4.5 px-5 text-sm font-opensans-600  border-l-4 hover:bg-lighter"
                     :class="pageName === page.name ? 'border-blue bg-lighter' : 'bg-white border-transparent'"
                     :to="page.route">
          <div class="mr-3.5 relative">
            <component :is="page.icon" class="w-5 h-5"
                       :class="pageName === page.name ? 'text-blue' : 'text-blue-grey'"/>
          </div>
          <p :class="pageName === page.name ? 'text-blue' : 'text-blue-grey'">{{ page.name }}</p>
        </router-link>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios'
import {
  CogIcon,
  DocumentReportIcon,
  DocumentSearchIcon, HomeIcon,
  MailIcon,
  ShieldExclamationIcon,
  UserGroupIcon,
  UsersIcon
} from "@heroicons/vue/solid";

export default {
  setup: () => ({
    title: 'Sidebar'
  }),
  props: ['pageName', 'show'],
  async mounted() {
    this.getUser();
  },
  data() {
    return {
      agencyName: "",
      agencyImg: "",
      pages: [
        {
          name: "Dashboard",
          route: '/',
          icon: HomeIcon
        },
        {
          name: "Inbox",
          route: '/inbox',
          icon: MailIcon
        },
        {
          name: "Intelligence",
          route: '/intelligence',
          icon: ShieldExclamationIcon
        },
        {
          name: "Reported Vendors",
          route: '/reported-vendors',
          icon: UserGroupIcon,
        },
        {
          name: "Users",
          route: '/users',
          icon: UsersIcon
        },
        {
          name: "Reports",
          route: '/reports',
          icon: DocumentReportIcon,
        },
        {
          name: "Settings",
          route: '/settings',
          icon: CogIcon
        },
        {
          name: "Activity",
          route: '/activity',
          icon: DocumentSearchIcon,
        },
      ]
    };
  },
  methods: {
    //Get User
    async getUser() {
      this.pageNumber = 0;
      const response = await axios.get('api/v1/profile');
      //Filter User Data
      this.agencyName = response.data.data.assigned_agencies.agency;
      this.agencyImg = response.data.data.assigned_agencies.logo;
    },
  },
}
</script>
