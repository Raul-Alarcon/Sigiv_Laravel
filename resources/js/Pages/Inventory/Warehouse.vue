<script setup>
import ManagementLayout from '@/Layouts/ManagementLayout.vue';

import { CirclePlus, 
    Search, 
    Document, 
    DocumentAdd, 
    ArrowDown } from '@element-plus/icons-vue';

import ProductTab from './partial/ProductTab.vue';
import OutOfStockTab from './partial/OutOfStockTab.vue';
import { ref } from 'vue';

const tabPosition = ref('left')

const positionOptions = ['top', 'right', 'left']
</script>

<template>
    <management-layout title="Warehouse" tag="2">

        <template #description>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque dolore quaerat voluptate sunt delectus,
            reprehenderit quae dicta. Sit
        </template>

        <template #actions>
            <!-- <el-button type="primary" :icon="CirclePlus" v-on:click="openModal">Add request</el-button> -->
        </template>


        <template #headerContent> 
            <el-segmented
                v-model="tabPosition"
                :options="positionOptions"
                style="margin-bottom: 1rem"
                />

        </template>

        <template #searchContent>
            <!-- <div class="md:w-80 w-full">
                <el-input v-model="search" style="width: 100%" v-on:change="handlerInputEnter" placeholder="Search" :prefix-icon="Search" clearable/>
            </div> -->
        </template>

        <template #content> 
            <el-tabs :tab-position="tabPosition" style="" class="demo-tabs">
                <el-tab-pane label="Products">
                    <product-tab/>  
                </el-tab-pane>
                <el-tab-pane label="Out of stock">
                    <out-of-stock-tab/>
                </el-tab-pane>
                <el-tab-pane label="Request">Role</el-tab-pane> 
            </el-tabs>

        </template>

        <template #footerContent>
            <!-- modal -->
        </template>


    </management-layout>
</template>