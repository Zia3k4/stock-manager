<template>
    <div>
        <h1>dashboard supervisor 1</h1>
        <p>This is the dashboard supervisor1  page.</p>
    </div><DropdownLink :href="route('logout')" method="post" as="button">
    Log Out
</DropdownLink>

</template>
<script setup lang="ts">
import {Link} from "@inertiajs/vue3";
import DropdownLink from "@/Components/DropdownLink.vue";
</script>
