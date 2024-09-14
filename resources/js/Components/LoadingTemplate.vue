<script setup>
import { defineProps } from 'vue';
import BarsScaleSpinner from './BarsScaleSpinner.vue';

defineProps({
    loading: {
        required: true,
        type: Boolean
    }
});

</script>
<template>
    <div class="relative">
        <div v-if="loading"
            class="absolute inset-0 flex justify-center items-center bg-transparent bg-opacity-30 backdrop-blur-sm z-50">
            <bars-scale-spinner></bars-scale-spinner>
        </div>
        <slot></slot>
    </div>
</template>