<script setup>
import {defineEmits, ref } from 'vue' 

const emit = defineEmits(['drawerClick'])

const handlerDrawerClick = () => {
    emit('drawerClick')
}

</script>
<template>
    <nav class="flex fixed top-0 z-40 justify-between min-w-full">
        <div
            class="flex justify-between items-center py-2 md:py-4  px-6 md:px-20 bg-white dark:bg-slate-900 dark:text-gray-400 dark:shadow-xl shadow-sm  w-full">
            <span>
                <li class="pi pi-prime"></li>
            </span>
            <div class="flex space-x-3 flex-nowrap">

                <!-- contenido -->
                <span @click="handlerDrawerClick"
                    class="hover:bg-slate-200 p-2 rounded-md md:hidden items-center justify-center">
                    <i class="pi pi-bars"></i>
                </span>
            </div>
        </div>
    </nav>
</template>