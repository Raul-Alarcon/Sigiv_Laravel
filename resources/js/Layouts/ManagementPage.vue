<script setup>
import ManagementLayout from './ManagementLayout.vue';
import {
    Delete, Edit, Plus,
    Search, ArrowDown, Document,
    DocumentAdd, CirclePlus
} from '@element-plus/icons-vue'

import Modal from '@/Components/Modal.vue';
import LoadingTemplate from '@/Components/LoadingTemplate.vue';
import { ref, reactive, watch } from 'vue';

const props = defineProps({
    title: String,
    tableData: Array,
    modelName: String,
    formRules: Object,
    model: Object,
    modalWidth: {
        type: String,
        default: 'md'
    }
})

const list = ref(props.tableData);
const formRef = ref();
const loadings = reactive({
    form: false,
    table: false
})
const opc = reactive({ modal: false })


watch(() => props.tableData, (newData) => {
    list.value = newData;
}, { immediate: true })

const handlerModal = () => {
    opc.modal = true;
}


const onSelect = (row) => {  
    Object.assign(props.model, row);
    opc.modal = true;
}


const handlerSumit = async (formel) => {
    if (!formel) return;
    await formel.validate((valid, fields) => {
        if (valid) { 
            console.log(props.model)
        }
    });
}

</script>
<template>
    <management-layout :title="title">
        <template #description>
            <slot name="description"></slot>
        </template>

        <template #actions>
            <el-button type="primary" :icon="Plus" v-on:click="handlerModal">Add {{ modelName }}</el-button>
        </template>

        <template #content>
            <loading-template :loading="loadings.table">
                <el-table :data="list" style="width: 100%" max-height="400">
                    <slot name="table-columns" />

                    <el-table-column prop="created_at" label="Date of creation" width="180">
                        <template #default="{ row }">
                            <span class="text-nowrap">{{ row.created_at }}</span>
                        </template>
                    </el-table-column>
                    <el-table-column prop="updated_at" label="Date of update" width="180">
                        <template #default="{ row }">
                            <span class="text-nowrap">{{ row.updated_at }}</span>
                        </template>
                    </el-table-column>

                    <el-table-column fixed="right" label="Actions" min-width="130">
                        <template #default="{ row }">
                            <el-button type="primary" v-on:click="onSelect(row)" :icon="Edit" plain></el-button>
                            <el-button type="danger" :icon="Delete" plain></el-button>
                        </template>
                    </el-table-column>
                </el-table>
            </loading-template>
        </template>

        <template #footerContent>
            <modal :title="title" :show="opc.modal" v-on:close="opc.modal = false" :maxWidth="modalWidth">
                <el-form ref="formRef" :rules="formRules" :model="model" label-position="top">
                    <loading-template :loading="loadings.form">
                        <slot name="form" :data="model"></slot>
                    </loading-template>

                    <el-form-item>
                        <div class="w-full flex justify-between">
                            <slot name="form-actions" :data="model"></slot>
                            <el-button type="primary" v-on:click="handlerSumit(formRef)">Save</el-button>
                        </div>
                    </el-form-item>
                </el-form>
            </modal>
        </template>

    </management-layout>
</template>