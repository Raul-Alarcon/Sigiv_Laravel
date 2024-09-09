<script setup>
import ManagementPage from '@/Layouts/ManagementPage.vue';
import SectorService from '@/Services/SectorService.js';
import { reactive, ref } from 'vue';

import CTable from '@/Components/CTable.vue';
import CModalForm from '@/Components/CModalForm.vue';

const service = new SectorService();


const modal = ref(false);
const loading = ref(false);

const model = reactive({ ...service.model });
const formRules = reactive({ ...service.rules });

const sectors = ref([]);

(async () => {
    try {
        let response = await service.getAll();
        console.log(response)
        sectors.value = response.data;
    } catch (error) {
        console.log(error)
    }
})();


const handerSubmit = (elForm) => {
    loading.value = true
    setTimeout( () => {
        loading.value =  false;
        console.log(model)
    }, 2000)
}

</script>
<template>

    <div class="flex w-full justify-center">
        <el-button type="primary" v-on:click="modal = true">Show</el-button>

        <c-modal-form title="Sector Form" v-on:onSubmit="handerSubmit" :loading="loading" :show="modal" :model="model" :rules="formRules" v-on:close="modal = false"
            width="sm">

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
    </div>

    <!-- <c-table :data="sectors" :is-manager="true" 
     :model="model"
        width-column="70-150-400-100">
        <template #status="{ row }">
            <el-switch v-model="row.status"></el-switch>
        </template>
</c-table> -->


    <!-- <management-page :table-data="sectors" title="Sectors" model-name="Sector" :model="model" :form-rules="formRules" modal-width="sm">
        <template #description> 
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. At quae aspernatur obcaecati</p>
        </template>

        <template #table-columns> 
            <el-table-column prop="id" label="Id" width="70" fixed="left"></el-table-column>
            <el-table-column prop="name" label="Name" width="150"></el-table-column>
            <el-table-column prop="description" label="Description" width="400"></el-table-column>
            <el-table-column prop="status" label="Status" width="100">
                <template #default="{ row }">
                    <el-switch v-model="row.status"></el-switch>
                </template>
            </el-table-column>  
        </template>

        <template #form="{ data }"> 
            <el-form-item label="Name" prop="name">
                <el-input v-model="data.name" placeholder="Name" clearable></el-input>
            </el-form-item>

            <el-form-item label="Description" prop="description">
                <el-input v-model="data.description" type="textarea" placeholder="Description" :rows="4" clearable></el-input>
            </el-form-item> 
        </template>

        <template #form-actions="{ data }">
            <el-switch v-model="data.status"></el-switch>
        </template>
    </management-page> -->
</template>
