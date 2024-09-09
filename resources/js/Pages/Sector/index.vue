<script setup>
import CModalForm from '@/Components/CModalForm.vue';
import CTable from '@/Components/CTable.vue';
import ManagementLayout from '@/Layouts/ManagementLayout.vue';
import SectorService from '@/Services/SectorService.js';
import { CirclePlus } from '@element-plus/icons-vue';
import { reactive, ref } from 'vue';

const service = new SectorService();

const opc = reactive({ modal: false, loading: false, table: false });
const model = reactive({ ...service.model });
const formRules = reactive({ ...service.rules });
const sectors = ref([]);

const Main = async () => {
    try {
        opc.table = true;
        let response = await service.getAll();
        sectors.value = response.data;
    } catch (error) {
        service.opcElMessage.type = 'error';
        service.opcElMessage.message = error.message;
        ElMessage(service.opcElMessage);
    }
    opc.table = false;
}

(async () => {
    await Main();
})();


const openModal = () => {
    Object.assign(model, service.model);
    opc.modal = true;
}

const handlerUpdate = async (elForm) => {
    try {
        opc.loading = true;
        let sector = await service.update(model.id, model);
        let index = sectors.value.findIndex((sector) => sector.id === model.id);
        sectors.value[index] = sector;
        opc.modal = false;
        opc.loading = false;
    } catch (error) {
        service.opcElMessage.type = 'error';
        service.opcElMessage.message = error.message;
        console.log(error)
    }

    opc.modal = false;
    opc.loading = false;
    elForm.resetFields();
    ElMessage(service.opcElMessage);

}


const handlerChange = async (row) => {
    try {
        opc.table = true;
        await service.updateStatus(row.id);
        opc.table = false;
    } catch (error) {
        service.opcElMessage.type = 'error';
        service.opcElMessage.message = error.message;
    }

    opc.table = false;
    ElMessage(service.opcElMessage);

}

const handlerPost = async (elForm) => {
    try {
        opc.loading = true;
        let sector = await service.create(model);
        sectors.value.push(sector);
        opc.modal = false;
        opc.loading = false;
    } catch (error) {
        service.opcElMessage.type = 'error';
        service.opcElMessage.message = error.message;
    }

    opc.modal = false;
    opc.loading = false;
    elForm.resetFields();
    ElMessage(service.opcElMessage);
}

const handerSubmit = async (elForm) => {
    try {
        if(model.id != 0) {
            await handlerUpdate(elForm);
        } else {
            await handlerPost(elForm);
        }
    } catch (error) {
        console.log(error)
    }
}

const handlerEdit = (row) => {
    Object.assign(model, row);
    opc.modal = true;
}

const handerDelete = async (row) => {
    try {
        opc.table = true;
        await service.delete(row.id);
        sectors.value = sectors.value.filter((sector) => sector.id !== row.id);
    } catch (error) {
        service.opcElMessage.type = 'error';
        service.opcElMessage.message = error.message;
    }

    opc.table = false;
    ElMessage(service.opcElMessage);
}

</script>
<template>
    <management-layout title="Sector">

        <template #description>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illum laboriosam consequuntur</p>
        </template>

        <template #actions>
            <el-button type="primary" v-on:Click="openModal()" :icon="CirclePlus">Add Sector</el-button>
        </template>

        <template #content>
            <c-table :data="sectors" v-on:onEdit="handlerEdit" v-on:onDelete="handerDelete" :is-manager="true" :model="model" width-column="70-150-400-100" :loading="opc.table">
                <template #status="{ row }">
                    <el-switch v-model="row.status" v-on:change="handlerChange(row)"></el-switch>
                </template>
            </c-table>
        </template>

        <template #footerContent>
            <c-modal-form title="Sector Form" v-on:onSubmit="handerSubmit" :loading="opc.loading" :show="opc.modal"
                :model="model" :rules="formRules" v-on:close="opc.modal = false" width="sm">

                <template #form-conntent="{ data, isLoading }">
                    <el-form-item label="Name" prop="name">
                        <el-input v-model="data.name" placeholder="Name" clearable></el-input>
                    </el-form-item>

                    <el-form-item label="Description" prop="description">
                        <el-input v-model="data.description" type="textarea" placeholder="Description" :rows="4"
                            clearable></el-input>
                    </el-form-item>
                </template>

                <template #form-actions="{ data, isLoading }">
                    <el-switch v-model="data.status" :disabled="isLoading"></el-switch>
                </template>
            </c-modal-form>
        </template>
    </management-layout>
</template>
