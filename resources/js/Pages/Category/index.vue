<script setup>  
import ManagementLayout from '@/Layouts/ManagementLayout.vue';
import CategoryService from '@/Services/CategoryService';
import useManager from '@/Composables/useManager';
import { CirclePlus, Search , Document, DocumentAdd, ArrowDown } from '@element-plus/icons-vue'; 
import { ref } from 'vue';

const service = new CategoryService();
const search =  ref("")

const { 
    Main, 
    model : category,
    entities: categories, 
    openModal, 
    opc,
    rules,
    handlerSubmit, 
    handlerDelete, 
    handlerEdit,
    handlerInputEnter, 
    handlerChangeStatus
 } = useManager(service);


( async () => {
    await Main();
})();



</script>
<template>
    <management-layout title="Categories" :tag="`${categories.length} count`">
        <template #description>
            <span>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Blanditiis sed</span>
        </template>

        <template #actions>
            <el-button type="primary" :icon="CirclePlus" v-on:click="openModal">Add Category</el-button>
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
            <c-table :data="categories" :model="category" :is-manager="true" width-column="70-150-400-100" v-on:onDelete="handlerDelete" v-on:onEdit="handlerEdit" :loading="opc.table">
                <template #status="{ row }">
                    <el-switch v-model="row.status" v-on:change="handlerChangeStatus(row)"></el-switch>
                </template>
            </c-table>
        </template>

        <template #footerContent> 
            <c-modal-form title="Category form" :model="category" :show="opc.modal" :rules="rules" v-on:close="opc.modal = false" width="sm" v-on:onSubmit="handlerSubmit" :loading="opc.loading">

                <template #form-content="{ data, isLoading }"> 
                    <el-form-item label="Name" prop="name">
                        <el-input v-model="data.name" placeholder="name.."></el-input>
                    </el-form-item>

                    <el-form-item label="Description" prop="description">
                        <el-input v-model="data.description" placeholder="description" type="textarea"
                            :rows="5"></el-input>
                    </el-form-item>
                </template>

                <template #form-actions="{ data, isLoading }">
                    <el-switch v-model="data.status" :disabled="isLoading"></el-switch>
                </template> 
            </c-modal-form> 
        </template>
    </management-layout>
</template>