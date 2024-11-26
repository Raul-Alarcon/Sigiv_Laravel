<script setup>  
import ManagementLayout from '@/Layouts/ManagementLayout.vue';
import { CirclePlus, Search , Document, DocumentAdd, ArrowDown } from '@element-plus/icons-vue';
</script> 

<template> 
    <management-layout title="Warehouse request" tag="2">

        <template #description>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque dolore quaerat voluptate sunt delectus, reprehenderit quae dicta. Sit
        </template>

        <template #actions>
            <el-button type="primary" :icon="CirclePlus" v-on:click="openModal">Add request</el-button>
        </template>


        <template #headerContent>
            <el-dropdown placement="bottom" trigger="click">
                <el-button>
                    Export
                    <el-icon class="el-icon--right"><arrow-down /></el-icon>
                </el-button>
                <template #dropdown>
                    <el-dropdown-menu>
                        <el-dropdown-item :icon="DocumentAdd">Excel</el-dropdown-item>
                        <el-dropdown-item :icon="Document">PDF</el-dropdown-item>
                    </el-dropdown-menu>
                </template>
            </el-dropdown>
        </template>

        <template #searchContent>
            <div class="md:w-80 w-full">
                <el-input v-model="search" style="width: 100%" v-on:change="handlerInputEnter" placeholder="Search" :prefix-icon="Search" clearable/>
            </div>
        </template>

        <template #content> 
            <label>Tabla de contenido</label>
        </template>

        <template #footerContent>
            <!-- modal -->
        </template>


    </management-layout>
</template>