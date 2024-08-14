<script setup>
import { ref, defineProps } from 'vue';
import { Head } from '@inertiajs/vue3'; 
import SideBard from '@/Components/SideBard.vue';
import NavBard from '@/Components/NavBard.vue';

defineProps({
    title: String,
});
 
const expandDrawer = ref(false) 

const handlerDrawer = () => {
    expandDrawer.value = !expandDrawer.value
}; 

</script>

<template>
    <div> 
        <Head :title="title" />  
        <nav-bard @drawer-click="handlerDrawer"></nav-bard>
        <side-bard :visible="expandDrawer" @update:visible="handlerDrawer"> </side-bard> 
        <main class="px-6 md:ml-80 mt-16 text-justify"> 
            <slot></slot>
        </main>
    </div>
</template>
