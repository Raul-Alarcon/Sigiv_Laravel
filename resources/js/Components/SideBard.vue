<script setup>
import { ref, watch, defineProps, defineEmits } from 'vue';
import { Link, router } from '@inertiajs/vue3';
import { items } from '@/Utils/SideMenu'; 

const props = defineProps({
    visible: Boolean
});

const emit = defineEmits(['update:visible']);

const visible = ref(props.visible);

watch(() => props.visible, (newValue) => {
    visible.value = newValue;
});


const closeDrawer = () => {
    emit('update:visible', false);
};


</script>
<template>

    <aside
        class="fixed w-72 md:w-80 md:pt-16 md:ml-10 -translate-x-full  md:translate-x-0 transition-transform top-0 left-0 h-screen"
        :class="[
            visible ? 'translate-x-0 z-50' : ''
        ]" aria-label="Sidebar">


        <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-slate-900">
            <span class="md:hidden flex w-full justify-between items-center px-2 py-3">
                <h2 class="text-2xl font-semibold text-gray-700">SIGIV</h2>
                <span>
                    <Button icon="pi pi-times" outlined severity="contrast" @click="closeDrawer">
                    </Button>
                </span>
            </span>



            <ul class="flex flex-col w-full h-full gap-2 flex-nowrap pb-7">
                <li v-for="(group, index) in items" :key="index" class="px-0">
                    <span v-ripple
                        class="flex font-medium text-xs cursor-pointer text-gray-400 my-4 uppercase overflow-clip px-3">{{
                            group.title }}</span>
                    <ul v-if="group.items.length > 0" class="overflow-hidden">
                        <li v-for="(item, x) in group.items" :key="x" class="px-0 mx-0">

                            <!-- Links -->
                            <Link v-if="!item.subItems" v-ripple :href="route(`${item.link}`)"
                                class="flex flex-row flex-nowrap items-center h-12 px-3 rounded-lg text-gray-500 hover:bg-slate-200 dark:hover:bg-gray-700 ">
                                <i :class="item.icon" style="font-size: 1.3rem;"></i>
                                <span class="ml-3 text-nowrap">{{ item.title }}</span>
                            </Link>


                            <span v-if="item.subItems" v-ripple v-styleclass="{
                                selector: '@next',
                                enterFromClass: 'hidden',
                                enterActiveClass: 'animate-slidedown',
                                leaveToClass: 'hidden',
                                leaveActiveClass: 'animate-slideup'
                            }"
                                class="flex flex-row items-center h-12 px-3 overflow-hidden rounded-lg text-gray-500 hover:bg-slate-200 dark:hover:bg-gray-700 cursor-pointer">
                                <i :class="item.icon" style="font-size: 1.3rem;"></i>
                                <span class="ml-3 text-nowrap">{{ item.title }}</span>
                                <span
                                    class="flex items-center justify-center text-sm text-gray-500 font-semibol h-6 px-2 cursor-pointer rounded-full ml-auto">
                                    <i class="pi pi-angle-down" style="font-size: 1.2rem;"></i>
                                </span>
                            </span>

                            <ul v-if="item.subItems" class="overflow-hidden">
                                <li v-for="(subItem, y) in item.subItems" :key="y">


                                    <Link v-ripple :href="route(`${subItem.link}`)"
                                        class="flex flex-row items-center h-12 pl-7 rounded-lg text-gray-500 hover:bg-slate-200 dark:hover:bg-gray-700">

                                        <i :class="subItem.icon" style="font-size: 1.3rem;"></i>
                                        <span class="ml-3 text-nowrap">{{ subItem.title }}</span>
                                    </Link>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>  
        </div>
    </aside>

    <!-- <Drawer :visible="visible" @update:visible="emit('update:visible', $event)"  >
        <template #container="{ closeCallback }">
            <div class="flex flex-col h-full">
                <div class="flex items-center justify-between px-6 pt-4 shrink-0">
                    <span class="inline-flex items-center gap-2">
                        <svg width="35" height="40" viewBox="0 0 35 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M25.87 18.05L23.16 17.45L25.27 20.46V29.78L32.49 23.76V13.53L29.18 14.73L25.87 18.04V18.05ZM25.27 35.49L29.18 31.58V27.67L25.27 30.98V35.49ZM20.16 17.14H20.03H20.17H20.16ZM30.1 5.19L34.89 4.81L33.08 12.33L24.1 15.67L30.08 5.2L30.1 5.19ZM5.72 14.74L2.41 13.54V23.77L9.63 29.79V20.47L11.74 17.46L9.03 18.06L5.72 14.75V14.74ZM9.63 30.98L5.72 27.67V31.58L9.63 35.49V30.98ZM4.8 5.2L10.78 15.67L1.81 12.33L0 4.81L4.79 5.19L4.8 5.2ZM24.37 21.05V34.59L22.56 37.29L20.46 39.4H14.44L12.34 37.29L10.53 34.59V21.05L12.42 18.23L17.45 26.8L22.48 18.23L24.37 21.05ZM22.85 0L22.57 0.69L17.45 13.08L12.33 0.69L12.05 0H22.85Z"
                                fill="var(--p-primary-color)" />
                            <path
                                d="M30.69 4.21L24.37 4.81L22.57 0.69L22.86 0H26.48L30.69 4.21ZM23.75 5.67L22.66 3.08L18.05 14.24V17.14H19.7H20.03H20.16H20.2L24.1 15.7L30.11 5.19L23.75 5.67ZM4.21002 4.21L10.53 4.81L12.33 0.69L12.05 0H8.43002L4.22002 4.21H4.21002ZM21.9 17.4L20.6 18.2H14.3L13 17.4L12.4 18.2L12.42 18.23L17.45 26.8L22.48 18.23L22.5 18.2L21.9 17.4ZM4.79002 5.19L10.8 15.7L14.7 17.14H14.74H15.2H16.85V14.24L12.24 3.09L11.15 5.68L4.79002 5.2V5.19Z"
                                fill="var(--p-text-color)" />
                        </svg>
                        <span class="font-semibold text-2xl text-primary">Your Logo</span>
                    </span>
                    <span>
                        <Button type="button" @click="closeCallback" icon="pi pi-times" rounded outlined></Button>
                    </span>
                </div>
                <div class="overflow-y-auto">
                    <ul class="list-none p-4 m-0">
                        <li>
                            <div v-ripple v-styleclass="{
                                selector: '@next',
                                enterFromClass: 'hidden',
                                enterActiveClass: 'animate-slidedown',
                                leaveToClass: 'hidden',
                                leaveActiveClass: 'animate-slideup'
                            }"
                                class="p-4 flex items-center justify-between text-surface-500 dark:text-surface-400 cursor-pointer p-ripple">
                                <span class="font-medium">FAVORITES</span>
                                <i class="pi pi-chevron-down"></i>
                            </div>
                            <ul class="list-none p-0 m-0 overflow-hidden">
                                <li>
                                    <a v-ripple
                                        class="flex items-center cursor-pointer p-4 rounded text-surface-700 hover:bg-surface-100 dark:text-surface-0 dark:hover:bg-surface-800 duration-150 transition-colors p-ripple">
                                        <i class="pi pi-home mr-2"></i>
                                        <span class="font-medium">Dashboard</span>
                                    </a>
                                </li>
                                <li>
                                    <a v-ripple
                                        class="flex items-center cursor-pointer p-4 rounded text-surface-700 hover:bg-surface-100 dark:text-surface-0 dark:hover:bg-surface-800 duration-150 transition-colors p-ripple">
                                        <i class="pi pi-bookmark mr-2"></i>
                                        <span class="font-medium">Bookmarks</span>
                                    </a>
                                </li>
                                <li>
                                    <a v-ripple v-styleclass="{
                                        selector: '@next',
                                        enterFromClass: 'hidden',
                                        enterActiveClass: 'animate-slidedown',
                                        leaveToClass: 'hidden',
                                        leaveActiveClass: 'animate-slideup'
                                    }"
                                        class="flex items-center cursor-pointer p-4 rounded text-surface-700 hover:bg-surface-100 dark:text-surface-0 dark:hover:bg-surface-800 duration-150 transition-colors p-ripple">
                                        <i class="pi pi-chart-line mr-2"></i>
                                        <span class="font-medium">Reports</span>
                                        <i class="pi pi-chevron-down ml-auto"></i>
                                    </a>
                                    <ul
                                        class="list-none py-0 pl-4 pr-0 m-0 hidden overflow-y-hidden transition-all duration-[400ms] ease-in-out">
                                        <li>
                                            <a v-ripple v-styleclass="{
                                                selector: '@next',
                                                enterFromClass: 'hidden',
                                                enterActiveClass: 'animate-slidedown',
                                                leaveToClass: 'hidden',
                                                leaveActiveClass: 'animate-slideup'
                                            }"
                                                class="flex items-center cursor-pointer p-4 rounded text-surface-700 hover:bg-surface-100 dark:text-surface-0 dark:hover:bg-surface-800 duration-150 transition-colors p-ripple">
                                                <i class="pi pi-chart-line mr-2"></i>
                                                <span class="font-medium">Revenue</span>
                                                <i class="pi pi-chevron-down ml-auto"></i>
                                            </a>
                                            <ul
                                                class="list-none py-0 pl-4 pr-0 m-0 hidden overflow-y-hidden transition-all duration-[400ms] ease-in-out">
                                                <li>
                                                    <a v-ripple
                                                        class="flex items-center cursor-pointer p-4 rounded text-surface-700 hover:bg-surface-100 dark:text-surface-0 dark:hover:bg-surface-800 duration-150 transition-colors p-ripple">
                                                        <i class="pi pi-table mr-2"></i>
                                                        <span class="font-medium">View</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a v-ripple
                                                        class="flex items-center cursor-pointer p-4 rounded text-surface-700 hover:bg-surface-100 dark:text-surface-0 dark:hover:bg-surface-800 duration-150 transition-colors p-ripple">
                                                        <i class="pi pi-search mr-2"></i>
                                                        <span class="font-medium">Search</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a v-ripple
                                                class="flex items-center cursor-pointer p-4 rounded text-surface-700 hover:bg-surface-100 dark:text-surface-0 dark:hover:bg-surface-800 duration-150 transition-colors p-ripple">
                                                <i class="pi pi-chart-line mr-2"></i>
                                                <span class="font-medium">Expenses</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a v-ripple
                                        class="flex items-center cursor-pointer p-4 rounded text-surface-700 hover:bg-surface-100 dark:text-surface-0 dark:hover:bg-surface-800 duration-150 transition-colors p-ripple">
                                        <i class="pi pi-users mr-2"></i>
                                        <span class="font-medium">Team</span>
                                    </a>
                                </li>
                                <li>
                                    <a v-ripple
                                        class="flex items-center cursor-pointer p-4 rounded text-surface-700 hover:bg-surface-100 dark:text-surface-0 dark:hover:bg-surface-800 duration-150 transition-colors p-ripple">
                                        <i class="pi pi-comments mr-2"></i>
                                        <span class="font-medium">Messages</span>
                                        <span
                                            class="inline-flex items-center justify-center ml-auto bg-primary text-primary-contrast rounded-full"
                                            style="min-width: 1.5rem; height: 1.5rem">3</span>
                                    </a>
                                </li>
                                <li>
                                    <a v-ripple
                                        class="flex items-center cursor-pointer p-4 rounded text-surface-700 hover:bg-surface-100 dark:text-surface-0 dark:hover:bg-surface-800 duration-150 transition-colors p-ripple">
                                        <i class="pi pi-calendar mr-2"></i>
                                        <span class="font-medium">Calendar</span>
                                    </a>
                                </li>
                                <li>
                                    <a v-ripple
                                        class="flex items-center cursor-pointer p-4 rounded text-surface-700 hover:bg-surface-100 dark:text-surface-0 dark:hover:bg-surface-800 duration-150 transition-colors p-ripple">
                                        <i class="pi pi-cog mr-2"></i>
                                        <span class="font-medium">Settings</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="list-none p-4 m-0">
                        <li>
                            <div v-ripple v-styleclass="{
                                selector: '@next',
                                enterFromClass: 'hidden',
                                enterActiveClass: 'animate-slidedown',
                                leaveToClass: 'hidden',
                                leaveActiveClass: 'animate-slideup'
                            }"
                                class="p-4 flex items-center justify-between text-surface-500 dark:text-surface-400 cursor-pointer p-ripple">
                                <span class="font-medium">APPLICATION</span>
                                <i class="pi pi-chevron-down"></i>
                            </div>
                            <ul class="list-none p-0 m-0 overflow-hidden">
                                <li>
                                    <a v-ripple
                                        class="flex items-center cursor-pointer p-4 rounded text-surface-700 hover:bg-surface-100 dark:text-surface-0 dark:hover:bg-surface-800 duration-150 transition-colors p-ripple">
                                        <i class="pi pi-folder mr-2"></i>
                                        <span class="font-medium">Projects</span>
                                    </a>
                                </li>
                                <li>
                                    <a v-ripple
                                        class="flex items-center cursor-pointer p-4 rounded text-surface-700 hover:bg-surface-100 dark:text-surface-0 dark:hover:bg-surface-800 duration-150 transition-colors p-ripple">
                                        <i class="pi pi-chart-bar mr-2"></i>
                                        <span class="font-medium">Performance</span>
                                    </a>
                                </li>
                                <li>
                                    <a v-ripple
                                        class="flex items-center cursor-pointer p-4 rounded text-surface-700 hover:bg-surface-100 dark:text-surface-0 dark:hover:bg-surface-800 duration-150 transition-colors p-ripple">
                                        <i class="pi pi-cog mr-2"></i>
                                        <span class="font-medium">Settings</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="mt-auto">
                    <hr class="mb-4 mx-4 border-t border-0 border-surface-200 dark:border-surface-700" />
                    <a v-ripple
                        class="m-4 flex items-center cursor-pointer p-4 gap-2 rounded text-surface-700 hover:bg-surface-100 dark:text-surface-0 dark:hover:bg-surface-800 duration-150 transition-colors p-ripple">
                        <Avatar image="https://primefaces.org/cdn/primevue/images/avatar/amyelsner.png"
                            shape="circle" />
                        <span class="font-bold">Amy Elsner</span>
                    </a>
                </div>
            </div>
        </template>
</Drawer> -->
</template>
