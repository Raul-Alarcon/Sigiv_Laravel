<script setup> 
import ManagementLayout from '@/Layouts/ManagementLayout.vue';

import { CirclePlus, 
    Search ,
    Document, 
    DocumentAdd, 
    ArrowDown, 
    Edit, Delete } from '@element-plus/icons-vue';

import CustomerService from '@/Services/CustomerService';
import LoadingTemplate from '@/Components/LoadingTemplate.vue';
import useManager from '@/Composables/useManager';
import { ref } from 'vue';

const service = new CustomerService();
const search = ref('');
const genders = ref([]);
const formCustomerRef = ref(null);

const {
    Main, 
    entities: customers,
    model: customer,
    opc,
    openModal,
    rules,
    handlerSubmit, 
    handlerEdit,
    handlerDelete,
    handlerInputEnter
} = useManager(service);

( async () => {
    await Main();
    genders.value = await service.getGenders();    
})();

const onSubmit = async (elForm) => {
    if (!elForm) return
    await elForm.validate(async (valid, fields) => {
        if (valid) {
            await handlerSubmit(elForm);
        }
    }) 
};


</script> 

<template>
    <management-layout title="Customers" :tag="`${2} count`">
        <template #description>  
        </template>


        <template #actions>
            <el-button type="primary" :icon="CirclePlus" v-on:click="openModal">Add Customer</el-button>
        </template>


        <template #headerContent>
            <!-- <el-dropdown placement="bottom" trigger="click">
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
            </el-dropdown> -->
        </template>

        <template #searchContent>
            <div class="md:w-80 w-full">
                <el-input v-model="search" style="width: 100%" v-on:change="handlerInputEnter" placeholder="Search" :prefix-icon="Search" clearable/>
            </div>
        </template>

        <template #content>
            <loading-template :loading="opc.table">
                <el-table :data="customers" style="width: 100%">
                    <el-table-column fixed label="ID" prop="id" width="70"></el-table-column>

                    <el-table-column label="Information" width="400">
                        <template #default="{ row }">
                            <div class="flex flex-col gap-y-1">
                                <div class="flex gap-x-3">
                                    <h4 class="text-gray-700 dark:text-gray-200">
                                        {{ `${row.first_names} ${row.last_names}` }}</h4>

                                    <el-tag type="warning" effect="light" round>
                                        {{ row.gender_name }}
                                    </el-tag>
                                </div>

                                <div class="flex gap-x-3">
                                    <p class="text-gray-500 dark:text-gray-400">{{ row.email }}</p>
                                </div>
                            </div>
                        </template>
                    </el-table-column>

                    <el-table-column label="Phone number" prop="phone" width="150"></el-table-column>
                    <el-table-column label="Direcction" prop="direcction" width="400"></el-table-column>

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

                    <el-table-column fixed="right" label="Actions" min-width="150">
                        <template #default="{ row }">
                             
                            <el-button type="primary" v-on:Click="handlerEdit(row)" :icon="Edit" plain></el-button>
                            <el-button type="danger" v-on:Click="handlerDelete(row)" :icon="Delete" plain></el-button>
                        </template>
                    </el-table-column>

                </el-table>

            </loading-template>
        </template>


        <template #footerContent>
            <el-dialog v-model="opc.modal" title="Customer Form" width="500">
                <loading-template :loading="opc.loading">
                    <el-form ref="formCustomerRef" :rules="rules" :model="customer" label-position="top">

                        <div class="grid md:grid-cols-3 grid-cols-1 gap-x-3">

                            <div class="md:col-span-3">
                                <el-form-item label="Names" prop="first_names">
                                    <el-input v-model="customer.first_names" placeholder="Name" />
                                </el-form-item>

                            </div>

                            <div class="md:col-span-3">
                                <el-form-item label="Last names" prop="last_names">
                                    <el-input v-model="customer.last_names" placeholder="las names" />
                                </el-form-item> 
                            </div>

                            <div class="md:col-span-2">
                                <el-form-item label="DUI" prop="dui">
                                    <el-input v-model="customer.dui" placeholder="las names" />
                                </el-form-item>  
                            </div>

                            <div class="md:col-span-1">  
                                <el-form-item label="Birth date" prop="birth_date">
                                    <el-date-picker style="width: 100%;" v-model="customer.birth_date" type="date"
                                        placeholder="Selected date" />
                                </el-form-item>
                            </div>

                            <div class="md:col-span-3">
                                <el-form-item label="Email" prop="email">
                                    <el-input v-model="customer.email" placeholder="example_user@gmail.com" />
                                </el-form-item> 
                            </div>


                            <div class="md:col-span-2">
                                <el-form-item label="Phone" prop="phone">
                                    <el-input v-model="customer.phone" placeholder="phone" />
                                </el-form-item>  
                            </div>

                            <div class="md:col-span-1">    
                                <el-form-item label="Gender" prop="gender_id">
                                    <el-select v-model="customer.gender_id" placeholder="Please select a gender">
                                        <el-option v-for="gender in genders" :key="gender.id"
                                            :label="gender.name" :value="gender.id" />
                                    </el-select>
                                </el-form-item>
                            </div>

                            <div class="md:col-span-3">
                                <el-form-item label="Direcction" prop="direcction">
                                    <el-input type="textarea" v-model="customer.direcction"></el-input>
                                </el-form-item>
                            </div>

                            <div class="md:col-span-3 text-end"> 
                                <el-button type="primary" v-on:click="onSubmit(formCustomerRef)">Save</el-button>
                            </div>

                        </div>

                    </el-form>
                </loading-template>
            </el-dialog>

        </template>

    </management-layout>
</template>