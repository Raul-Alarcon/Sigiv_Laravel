<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { defineProps } from 'vue';

defineProps({
    title: String,
    tag: String
})

</script>

<template>

    <app-layout :title="title">
        <div class="mx-auto">
            <div class="sm:flex sm:items-center sm:justify-between">

                <div>
                    <div class="flex items-center gap-x-3">
                        <h2 class="text-lg font-medium text-gray-800 dark:text-white">{{ title }}</h2>

                        <el-tag type="primary" effect="light" round>{{ tag }}</el-tag>
                    </div>

                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">
                        <slot name="description"></slot>
                    </p>
                </div>

                <div class="flex items-center mt-4 gap-x-3">
                    <slot name="actions"></slot>
                </div>
            </div>

            <div class="mt-6 md:flex md:items-center md:justify-between">
                <div>
                    <slot name="headerContent"></slot>
                </div>

                <div class="relative flex items-center mt-4 md:mt-0">
                    <slot name="searchContent"></slot>
                </div>
            </div>

            <div class="flex flex-col mt-6">
                <div class="-mx-4 -my-2 sm:-mx-6 lg:-mx-8">
                    <div class=" py-2  md:px-6 lg:px-8">
                        <slot name="content"></slot>
                    </div>
                </div>
            </div>

            <div class="mt-6 sm:flex sm:items-center sm:justify-between ">
                <slot name="footerContent"></slot>
            </div>
        </div>
    </app-layout>

</template>