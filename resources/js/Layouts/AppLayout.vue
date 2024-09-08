<script setup>
import { ref } from 'vue';
import { Head } from '@inertiajs/vue3';
import SideBard from '@/Components/SideBard.vue';
import NavBard from '@/Components/NavBard.vue';

import { useDark, useToggle } from '@vueuse/core';
const isDark = useDark();
const toggleDark = useToggle(isDark);


defineProps({
    title: String,
})

const isCollapse = ref(true)

</script>

<template> 
    <div>
        <el-container style="height: 100vh"> 
            <Head :title="title" /> 
            <side-bard :collapse="isCollapse"></side-bard>
            <el-container>
                <!-- <nav-bard></nav-bard>  -->
                <el-main> 
                    <div class="text-center">
                        <el-button v-on:click="isCollapse = !isCollapse"> Drawer</el-button>
                        <el-button type="primary" v-on:click="toggleDark()"> {{ isDark ? "Light" : "Dark" }}</el-button>
                    </div>
                    <div class="px-8">
                        <slot></slot> 
                    </div>
                </el-main>
            </el-container>
        </el-container> 
    </div> 
</template>  