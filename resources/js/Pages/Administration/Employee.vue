<script setup>
import ManagementLayout from '@/Layouts/ManagementLayout.vue';
import {
    CirclePlus,
    Search,
    Document,
    DocumentAdd,
    ArrowDown, Edit, Delete, FolderRemove
} from '@element-plus/icons-vue';

import EmployeeService from '@/Services/EmployeeService';
import useManager from '@/Composables/useManager';
import LoadingTemplate from '@/Components/LoadingTemplate.vue';

import { ref } from 'vue';
import DateHelper from '@/Utils/DateHelper';

const service = new EmployeeService();

const genders = ref([]);
const charges = ref([]);
const storeBranches = ref([]);
const search = ref('');
const formEmployeeRef = ref(null);

const {
    model: employee,
    entities: Employees,
    Main,
    opc,
    rules,
    handlerSubmit,
    handlerInputEnter,
    handlerEdit,
    handlerDelete,
    openModal,
    paginateData
} = useManager(service);

(async () => {
    try {
        await Main();
        genders.value = await service.getGenders();
        charges.value = await service.getCharges();
        storeBranches.value = await service.getStoreBranches();

        console.log(paginateData.value)

    } catch (error) {
        console.log(error)
        ElMessage.error('Oops, error loading data.')
    }
})();

const handleClose = (done) => {
    done();
}

const handleSubmit = async (form) => {
    if (!form) return
    await form.validate(async (valid, fields) => {
        if (valid) {
            await handlerSubmit(form);
        }
    })
}

const handleCurrentChange = (val) => {
  console.log(`current page: ${val}`)
}

</script>

<template>
    <management-layout title="Employee" :tag="`${2} count`">
        <template #description>
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Commodi voluptatum itaque pariatur aperiam illum
            corrupti cupiditate
        </template>


        <template #actions>
            <el-button type="primary" :icon="CirclePlus" v-on:click="openModal">Add Employee</el-button>
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
                <el-input v-model="search" style="width: 100%" v-on:change="handlerInputEnter" placeholder="Search"
                    :prefix-icon="Search" clearable />
            </div>
        </template>

        <template #content>
            <loading-template :loading="opc.table">
                <el-table :data="Employees" style="width: 100%">
                    <el-table-column fixed prop="id" label="ID" width="70" />
                    <el-table-column prop="DUI" label="DUI" width="100" />
                    <el-table-column label="Information" width="400">
                        <template #default="{ row }">
                            <div class="flex flex-col gap-y-1">
                                <div class="flex gap-x-3">
                                    <h4 class="text-gray-700 dark:text-gray-200">
                                        {{ `${row.names} ${row.last_names}` }}</h4>
                                    <el-tag type="primary" effect="light" round>
                                        {{ `Years old: ${DateHelper().calculateAge(row.age)}
                                        ${row.gender_name}` }}
                                    </el-tag>
                                </div>

                                <div class="flex gap-x-3">
                                    <p class="text-gray-500 dark:text-gray-400">{{ row.storebranch_name }}</p>

                                    <span>{{ `Hiring: ${row.hiring_date}` }}</span>

                                </div>
                            </div>
                        </template>
                    </el-table-column>
                    <el-table-column prop="charge_name" label="Charge" width="200" />
                    <el-table-column prop="code" label="code" width="100" />
                    <el-table-column prop="termination_date" label="Last day worked" width="200">
                        <template #default="{ row }">
                            <div class="flex gap-x-3">
                                <el-tag :type="row.termination_date != null ? 'danger' : 'success'" effect="light"
                                    round>
                                    {{ row.termination_date ?? 'Working' }}
                                </el-tag>
                            </div>
                        </template>
                    </el-table-column>

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

                    <el-table-column fixed="right" label="Actions" min-width="200">
                        <template #default="{ row }">
                            <el-button type="warning" v-on:Click="edit(row)" :icon="FolderRemove" plain></el-button>
                            <el-button type="primary" v-on:Click="handlerEdit(row)" :icon="Edit" plain></el-button>
                            <el-button type="danger" v-on:Click="handlerDelete(row)" :icon="Delete" plain></el-button>
                        </template>
                    </el-table-column>


                </el-table>

            </loading-template>

        </template>


        <template #footerContent> 
            <!-- TODO: Modal y la paginacion -->
            <el-dialog :before-close="handleClose" v-model="opc.modal" title="Employee Form" width="500">
                <loading-template :loading="opc.loading">
                    <el-form ref="formEmployeeRef" :rules="rules" :model="employee" label-position="top">

                        <div class="grid md:grid-cols-6 grid-cols-1 gap-x-3">
                            <div class="md:col-span-6">
                                <el-form-item label="Name" prop="names">
                                    <el-input v-model="employee.names" placeholder="Name"></el-input>
                                </el-form-item>
                            </div>

                            <div class="md:col-span-6">
                                <el-form-item label="Las name" prop="last_names">
                                    <el-input v-model="employee.last_names" placeholder="Name"></el-input>
                                </el-form-item>
                            </div>

                            <div class="md:col-span-2">
                                <el-form-item label="Birth date" prop="age">
                                    <el-date-picker style="width: 100%;" v-model="employee.age" type="date"
                                        placeholder="Selected date" />
                                </el-form-item>
                            </div>

                            <div class="md:col-span-4">
                                <el-form-item label="Code" prop="code">
                                    <el-input v-model="employee.code" placeholder="Code"></el-input>
                                </el-form-item>
                            </div>

                            <div class="md:col-span-4">
                                <el-form-item label="DUI" prop="DUI">
                                    <el-input v-model="employee.DUI" placeholder="dui"></el-input>
                                </el-form-item>
                            </div>

                            <div class="md:col-span-2">
                                <el-form-item label="Hiring date" prop="hiring_date">
                                    <el-date-picker style="width: 100%;" v-model="employee.hiring_date" type="date"
                                        placeholder="Selected date" />
                                </el-form-item>
                            </div>

                            <div class="md:col-span-2">
                                <el-form-item label="Charge" prop="charge_id">
                                    <el-select v-model="employee.charge_id" placeholder="Please select a charge">
                                        <el-option v-for="charge in charges" :key="charge.id" :label="charge.name"
                                            :value="charge.id" />
                                    </el-select>
                                </el-form-item>
                            </div>

                            <div class="md:col-span-4">
                                <el-form-item label="Store" prop="storebranch_id">
                                    <el-select v-model="employee.storebranch_id" placeholder="Please select a Store">
                                        <el-option v-for="store in storeBranches" :key="store.id" :label="store.name"
                                            :value="store.id" />
                                    </el-select>
                                </el-form-item>

                            </div>

                            <div class="md:col-span-2">
                                <el-form-item label="Gender" prop="gender_id">
                                    <el-select v-model="employee.gender_id" placeholder="Please select a gender">
                                        <el-option v-for="gender in genders" :key="gender.id" :label="gender.name"
                                            :value="gender.id" />
                                    </el-select>
                                </el-form-item>
                            </div>


                            <div class="md:col-span-6 text-end">
                                <el-button type="primary" v-on:click="handleSubmit(formEmployeeRef)">Save</el-button>
                            </div>


                        </div>
                    </el-form>
                </loading-template>


            </el-dialog>
        </template>

    </management-layout>
</template>