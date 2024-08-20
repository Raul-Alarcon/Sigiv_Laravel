<script setup>
import { ref } from 'vue';
import { Menu as IconMenu } from '@element-plus/icons-vue'
import { Head } from '@inertiajs/vue3';


defineProps({
    title: String,
})

const isCollapse = ref(true)

</script>

<template>

    <div>
        <el-container style="height: 100vh">

            <Head :title="title" />

            <aside class="min-h-screen bg-white ">
                <el-menu :collapse="isCollapse" class="el-menu-vertical-demo h-full w-72" default-active="2">
                    <el-sub-menu index="1">
                        <template #title>
                            <el-icon><icon-menu /></el-icon>
                            <span>Navigator One</span>
                        </template>

                        <el-menu-item index="1-2">otra opcion</el-menu-item>

                        <el-sub-menu index="1-3">
                            <template #title>item four</template>
                            <el-menu-item index="1-3-1">item one</el-menu-item>
                        </el-sub-menu>
                    </el-sub-menu>
                    <el-menu-item index="2">
                        <el-icon><icon-menu /></el-icon>
                        <span>Navigator Two</span>
                    </el-menu-item>
                    <el-menu-item index="3" disabled>
                        <el-icon><icon-menu /></el-icon>
                        <span>Navigator Three</span>
                    </el-menu-item>
                    <el-menu-item index="4">
                        <el-icon><icon-menu /></el-icon>
                        <span>Navigator Four</span>
                    </el-menu-item>
                </el-menu>
            </aside>

            <el-container>
                <el-header style="text-align: right; font-size: 12px; position: relative;">
                    <div class="h-full flex items-center justify-between">
                    </div>
                </el-header>

                <el-main>

                    <div class="text-center">
                        <el-button v-on:click="isCollapse = !isCollapse"> Drawer</el-button>
                    </div>

                    <slot></slot>
                </el-main>
            </el-container>
        </el-container>
    </div>


</template>

<style>
/* Dark mode styles */
@media (prefers-color-scheme: dark) {
    .el-menu-vertical-demo {  
        border-right: none;
    }
 
    .el-menu--popup-container .el-menu .el-menu-item.is-active,
    .el-menu-vertical-demo .el-sub-menu.is-active,
    .el-menu-vertical-demo .el-sub-menu .el-sub-menu__title.is-active,
    .el-menu-vertical-demo .el-menu-item.is-active {    
        color: #ffd04b; 
    } 
    
    .el-menu-vertical-demo,
    .el-menu-vertical-demo .el-sub-menu__title,
    .el-menu--popup-container>ul,
    .el-menu-vertical-demo .el-sub-menu .el-menu-item {
        background-color: #333;
        /* Dark mode background color */
    }
 
    .el-menu-vertical-demo .el-menu-item,
    .el-menu--popup-container>ul> li,
    .el-menu--popup-container>ul> li .el-sub-menu__title,
    .el-menu-vertical-demo .el-sub-menu__title {  
        color: #fff; 
    }
 
    .el-menu--popup-container>ul> li:hover,
    .el-menu--popup-container>ul> li .el-sub-menu__title:hover,
    .el-menu-vertical-demo .el-menu-item:hover,
    .el-menu-vertical-demo .el-sub-menu__title:hover,
    .el-menu-vertical-demo .el-sub-menu .el-menu-item:hover {
        background-color: #444; 
    }  

    .el-menu--popup-container  {
        background-color: blue;
        border-color: #ffd04b;
        /* Dark mode background color */
    }
 
}
</style>