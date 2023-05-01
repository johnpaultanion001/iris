<template>
    <div class="navigation grid gap-1 grid-cols-5 xl:grid-cols-6 mb-4">
        <div class="col-span-1 flex items-center">
            <router-link to="/"><img src="/img/icon/home-white.png"> </router-link>
        </div>
        <div class="col-span-1 flex items-center">
            <button @click="setMenu"><img src="/img/icon/menu-white.png"> </button>
        </div>
        <div class="col-span-3 xl:col-span-4 flex items-center">
            <div class="w-full flex items-center justify-end">
                <img :src="userImg" class="mr-2 w-9 h-9 rounded-full"> 
                <p class="text-base text-white font-inter-700">Hi, {{ userFirstName }} 👋</p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    setup: () => ({
        title: 'Navidation'
    }),
    data() {
        return {
            userFirstName: "Jesse",
            userImg: "/img/user-photo.png",
        };
    },
    emits: ["menu"],
    methods: {
        setMenu() {
            this.$emit("menu", true);
        },
    },
}
</script>
