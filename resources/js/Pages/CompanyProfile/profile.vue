<script setup>
import useManager from '@/Composables/useManager';
import ManagementLayout from '@/Layouts/ManagementLayout.vue';
import ChargerService from '@/Services/chargerService';
import { CirclePlus, Search } from '@element-plus/icons-vue';
import { ref } from 'vue';

const service = new ChargerService();
const search = ref('');
const activeName = ref('first')

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
    <management-layout title="CompanyProfile" :tag="`${entities.length}`">

        <template #description>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illum laboriosam consequuntur</p>
        </template>

        <template #searchContent>
            <div class="md:w-80">
                <el-input v-model="search" placeholder="Search.." v-on:change="handlerInputEnter" :prefix-icon="Search"
                    style="width: 100%;" clearable></el-input>
            </div>
        </template>

        <template #content>
            <el-tabs v-model="activeName" class="demo-tabs" @tab-click="handleClick">
                <el-tab-pane label="Employes" name="first">
                    <el-button type="primary" v-on:click="openModal()" :icon="CirclePlus">Add Employe</el-button>
                    <c-table :data="entities" v-on:onEdit="handlerEdit" v-on:onDelete="handlerDelete" :is-manager="true"
                        :model="model" width-column="70-400-400" :loading="opc.table">
                        <template #status="{ row }">
                            <el-switch v-model="row.status" v-on:change="handlerChangeStatus(row)"></el-switch>
                        </template>
                    </c-table>
                </el-tab-pane>

                <el-tab-pane label="User" name="second">
                    <c-table :data="entities" v-on:onEdit="handlerEdit" v-on:onDelete="handlerDelete" :is-manager="true"
                        :model="model" width-column="70-400-400" :loading="opc.table">
                        <template #status="{ row }">
                            <el-switch v-model="row.status" v-on:change="handlerChangeStatus(row)"></el-switch>
                        </template>
                    </c-table>
                </el-tab-pane>

                <el-tab-pane label="Products" name="third">
                    <c-table :data="entities" v-on:onEdit="handlerEdit" v-on:onDelete="handlerDelete" :is-manager="true"
                        :model="model" width-column="70-400-400" :loading="opc.table">
                        <template #status="{ row }">
                            <el-switch v-model="row.status" v-on:change="handlerChangeStatus(row)"></el-switch>
                        </template>
                    </c-table>
                </el-tab-pane>
            </el-tabs>
        </template>

        <template #footerContent>
            <c-modal-form title="Employe Form" v-on:onSubmit="handlerSubmit" :loading="opc.loading" :show="opc.modal"
                :model="model" :rules="rules" v-on:close="opc.modal = false" width="lg">
                <template #form-content="{ data, isLoading }">
                    <el-form-item label="code" prop="code">
                        <el-input v-model="data.codigo" placeholder="Type code" clearable></el-input>
                    </el-form-item>
                    <el-form-item label="DUI" prop="DUI">
                        <el-input v-model="data.DUI" placeholder="Type DUI" clearable></el-input>
                    </el-form-item>
                    <el-form-item label="Name" prop="name">
                        <el-input v-model="data.name" placeholder="Type first name" clearable></el-input>
                    </el-form-item>
                    <el-form-item label="Last Name" prop="lastName">
                        <el-input v-model="data.lastName" placeholder="Type last name" clearable></el-input>
                    </el-form-item>
                    <el-form-item label="Age" prop="age">
                        <el-date-picker v-model="data.age" type="date" placeholder="Pick a date" :teleported="false"></el-date-picker>
                    </el-form-item>
                    <el-form-item label="Date of hire" prop="dateOfHire">
                        <el-date-picker v-model="data.dateOfHire" type="date" placeholder="Pick a date" :teleported="false"></el-date-picker>
                    </el-form-item>
                    <el-form-item label="Termination Date" prop="terminationDate">
                        <el-date-picker v-model="data.terminationDate" type="date" placeholder="Pick a date" :teleported="false"></el-date-picker>
                    </el-form-item>
                    <el-form-item label="Branch Office" prop="branchOffice">
                        <el-select v-model="data.branchOffice" placeholder="Pick a branch office">
                            <el-option v-for="sucursal in sucursales" :key="sucursal.id" :label="sucursal.nombre" :value="sucursal.id"></el-option>
                        </el-select>
                    </el-form-item>
                    <el-form-item label="Charge" prop="Charge">
                        <el-select v-model="data.Charge" placeholder="Select a charge">
                            <el-option v-for="cargo in cargos" :key="cargo.id" :label="cargo.nombre" :value="cargo.id"></el-option>
                        </el-select>
                    </el-form-item>
                    <el-form-item label="Gender" prop="Gender">
                        <el-select v-model="data.Gender" placeholder="Select a gender">
                            <el-option v-for="genero in generos" :key="genero.id" :label="genero.nombre" :value="genero.id"></el-option>
                        </el-select>
                    </el-form-item>
                </template>
            </c-modal-form>
        </template>

    </management-layout>
</template>
