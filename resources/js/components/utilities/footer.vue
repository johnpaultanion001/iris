<template>
    <div class="footer grid gap-1 grid-cols-2 py-3.5">
        <div class="col-span-1">
            <p class="font-opensans-600 text-blue-grey text-sm">Copyright © 2022 IRIS by DTI Philippines</p>
        </div>
        <div class="col-span-1">
            <ul class="w-full flex justify-end">
                <li class="font-opensans-600 text-blue-grey hover:text-blue text-sm pl-7"><router-link to="/about-us">About Us</router-link></li>
                <li class="font-opensans-600 text-blue-grey hover:text-blue text-sm pl-7"><router-link to="/terms">Terms</router-link></li>
                <li class="font-opensans-600 text-blue-grey hover:text-blue text-sm pl-7"><router-link to="/privacy">Privacy</router-link></li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
    setup: () => ({
        title: 'Navidation'
    })
}
</script>
