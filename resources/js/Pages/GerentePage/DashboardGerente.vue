<template>
    <h1>oi pagina do gerente</h1>
    <DropdownLink :href="route('logout')" method="post" as="button">
        Log Out
    </DropdownLink>
</template>
<script setup lang="ts">
import {Link} from "@inertiajs/vue3";
import DropdownLink from "@/Components/DropdownLink.vue";
</script>

