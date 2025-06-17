<template>
    <div>
        <h1>Funcionarios Index</h1>
        <p>This is the funcionarios index page.</p>
    </div>
</template>
<script setup>
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';
import { usePage } from '@inertiajs/vue3';

defineProps({
    title: {
        type: String,
        default: 'Funcionarios Index',
        array: true,
    },
});

</script>
