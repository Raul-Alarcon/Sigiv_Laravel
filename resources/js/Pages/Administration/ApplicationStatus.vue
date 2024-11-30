<script setup>
import useManager from '@/Composables/useManager';
import ManagementLayout from '@/Layouts/ManagementLayout.vue';
import ApplicationStatusService from '@/Services/ApplicactionStatusService';
import { CirclePlus, Search } from '@element-plus/icons-vue';
import { ref } from 'vue';

const service = new ApplicationStatusService();
const search = ref('');

const { Main,
    opc,
    entities: applicationStatuses,
    handlerDelete,
    handlerEdit,
    model: applicationStatus,
    rules,
    handlerSubmit,
    handlerInputEnter, 
    openModal } = useManager(service);

(async () => {
    await Main();
})();



</script>
<template>
    <management-layout title="Application Status" :tag="`${applicationStatuses.length}`">

        <template #description>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illum laboriosam consequuntur</p>
        </template>

        <template #actions>
            <el-button type="primary" v-on:Click="openModal()" :icon="CirclePlus">Add Charger</el-button>
        </template>


        <template #searchContent>
            <div class="md:w-80">
                <el-input v-model="search" placeholder="Search.." v-on:change="handlerInputEnter" :prefix-icon="Search" style="width: 100%;" clearable></el-input>
            </div>
        </template>

        <template #content>
            <c-table :data="applicationStatuses" v-on:onEdit="handlerEdit" v-on:onDelete="handlerDelete" :is-manager="true"
                :model="applicationStatus" width-column="70-400-400" :loading="opc.table">
            </c-table>
        </template>

        <template #footerContent>
            <c-modal-form title="Charge Form" v-on:onSubmit="handlerSubmit" :loading="opc.loading" :show="opc.modal"
                :model="applicationStatus" :rules="rules" v-on:close="opc.modal = false" width="sm">

                <template #form-content="{ data, isLoading }">
                    <el-form-item label="Name" prop="name">
                        <el-input v-model="data.name" placeholder="Type Charger" clearable></el-input>
                    </el-form-item>

                    <el-form-item label="Description" prop="description">
                        <el-input v-model="data.description" type="textarea" placeholder="Type description" clearable></el-input>
                    </el-form-item>
                </template> 
            </c-modal-form>
        </template>
    </management-layout>
</template>
