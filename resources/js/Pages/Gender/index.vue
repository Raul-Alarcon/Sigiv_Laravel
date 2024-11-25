<script setup>
import useManager from '@/Composables/useManager';
import ManagementLayout from '@/Layouts/ManagementLayout.vue';
import GeneresService from '@/Services/GeneresService';
import { CirclePlus, Search } from '@element-plus/icons-vue';
import { ref } from 'vue';

const service = new GeneresService();
const search = ref('');

const { Main,
    opc,
    entities,
    handlerDelete,
    handlerEdit,
    model,
    rules,
    handlerSubmit,
    handlerInputEnter,
    handlerChangeStatus,
    openModal } = useManager(service);

(async () => {
    await Main();
})();



</script>
<template>
    <management-layout title="Genres" :tag="`${entities.length}`">

        <template #description>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illum laboriosam consequuntur</p>
        </template>

        <template #actions>
            <el-button type="primary" v-on:Click="openModal()" :icon="CirclePlus">Add Gender</el-button>
        </template>


        <template #searchContent>
            <div class="md:w-80">
                <el-input v-model="search" placeholder="Search.." v-on:change="handlerInputEnter" :prefix-icon="Search" style="width: 100%;" clearable></el-input>
            </div>
        </template>

        <template #content>
            <c-table :data="entities" v-on:onEdit="handlerEdit" v-on:onDelete="handlerDelete" :is-manager="true"
                :model="model" width-column="70-400-400" :loading="opc.table">
                <template #status="{ row }">
                    <el-switch v-model="row.status" v-on:change="handlerChangeStatus(row)"></el-switch>
                </template>
            </c-table>
        </template>

        <template #footerContent>
            <c-modal-form title="Genres Form" v-on:onSubmit="handlerSubmit" :loading="opc.loading" :show="opc.modal"
                :model="model" :rules="rules" v-on:close="opc.modal = false" width="sm">

                <template #form-content="{ data, isLoading }">
                    <el-form-item label="Name" prop="name">
                        <el-input v-model="data.name" placeholder="Type Gender" clearable></el-input>
                    </el-form-item>
                </template>

                <template #form-actions="{ data, isLoading }">
                    <el-switch v-model="data.status" :disabled="isLoading"></el-switch>
                </template>
            </c-modal-form>
        </template>
    </management-layout>
</template>
