<template>
    <router-link :to="link" class="content-card bg-white rounded-xl p-2 shadow-main flex items-center justify-between border-4" :class="active == 'true' ? 'border-green' : 'border-white'">
        <div>
            <h6 class="font-opensans-600 text-xs text-darker flex items-center">{{ cardTitle }} 
                <svg v-if="arrow == 'true'" xmlns="http://www.w3.org/2000/svg" width="7" height="12" viewBox="0 0 7 12" fill="none" class="ml-2.5">
                    <path d="M1 1.33341L5.66667 6.00008L1 10.6667" stroke="#1267E5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </h6>
            <p class="font-exo-600 text-darker text-2xl">
                {{ value }}
            </p>
        </div>
        <div class="p-1 lg:p-3 rounded bg-light-blue">
            <slot></slot>
        </div>
    </router-link>
</template>

<script>
export default  {
    setup: () => ({
        title: 'Content Card'
    }),
    props: ['cardTitle', 'value', 'link', 'arrow', 'active'],
}
</script>
