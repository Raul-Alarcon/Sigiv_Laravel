<script setup>
import ManagementLayout from '@/Layouts/ManagementLayout.vue';
import {
    CirclePlus,
    Search,
    Document,
    DocumentAdd,
    ArrowDown, 
    MagicStick,
    Delete,
    Notification
} from '@element-plus/icons-vue';
import { ref } from 'vue';

import useManager from '@/Composables/useManager';
import ProductOutService from '@/Services/ProductOutService';
import LoadingTemplate from '@/Components/LoadingTemplate.vue';

import { usePage } from '@inertiajs/vue3';

const page = usePage();

const service = new ProductOutService();

const search = ref('');
const products_select = ref([]);
const elform = ref();

const {
    Main,
    entities: products,
    model,
    opc,
    openModal,
    rules, 
    handlerSubmit
} = useManager(service);

(async () => {
    await Main();
    products_select.value = await service.getProducts();
})();


const onSubmit = async (form) => {
    if (!form) return;
    await form.validate(async (valid) => {
        if (valid) {
            // console.log(Product)
            model.user_id = page.props.auth.user.id;
            await handlerSubmit(form);
        }
    });
}

</script>

<template>
    <management-layout title="Warehouse request" tag="2">

        <template #description>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque dolore quaerat voluptate sunt delectus,
            reprehenderit quae dicta. Sit
            
        </template>

        <template #actions>
            <el-button type="primary" :icon="CirclePlus" v-on:click="openModal">Add request</el-button>
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
                <el-input v-model="search" style="width: 100%" v-on:change="handlerInputEnter" placeholder="Search"
                    :prefix-icon="Search" clearable />
            </div>
        </template>

        <template #content> 

            <loading-template :loading="opc.loading">
                <el-table :data="products">
                    <el-table-column fixed prop="id" label="ID" width="70"></el-table-column>
                    <el-table-column label="Information" width="300">
                        <template #default="{ row }">
                            <div class="flex flex-col gap-y-1">
                                <div class="flex gap-x-3">
                                    <h4 class="text-gray-700 dark:text-gray-200">
                                        {{ `${row.product_name}` }}</h4> 
                                </div> 
                            </div>
                        </template>
                    </el-table-column>

                    <el-table-column label="Status" width="300">
                        <template #default="{ row }">
                            <el-tag type="primary" effect="light" round>
                                        {{ row.status_name }}
                                    </el-tag>
                        </template>
                    </el-table-column>

                    <el-table-column prop="user_name" label="User" width="400"></el-table-column>

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

                            <div class="flex space-x-3 justify-center">
                                <el-dropdown placement="top-end" trigger="click">
                                    <el-button :icon="MagicStick"></el-button>
                                    <template #dropdown>
                                        <el-dropdown-menu>

                                            <!-- <div v-for="st in itemsStatus" :key="st.id">
                                                <el-dropdown-item v-on:click="onSelectedStatus(row, st)">
                                                    {{ st.name }}
                                                </el-dropdown-item>
                                            </div> -->


                                        </el-dropdown-menu>
                                    </template>
                                </el-dropdown>

                                <el-button type="primary" v-on:Click="onPurchaseItem(row)" :icon="Notification"
                                    plain></el-button>

                                <el-button type="danger" v-on:Click="handlerDelete(row)" :icon="Delete"
                                    plain></el-button>
                            </div>
                        </template>
                    </el-table-column>

                </el-table>

            </loading-template>
        </template>

        <template #footerContent>
            <!-- modal -->
            <el-dialog v-model="opc.modal" width="400">
                <loading-template :loading="opc.loading">
                    <el-form ref="elform" :rules="rules" :model="model" label-position="top">

                        <el-form-item label="Product" prop="product_id">
                            <el-select v-model="model.product_id" placeholder="Please select a product">
                                <el-option v-for="p in products_select" :key="p.id" :label="p.name" :value="p.id" />
                            </el-select>
                        </el-form-item>

                        <el-form-item label="Description" prop="description" style="width: 100%;">
                            <el-input type="textarea" v-model="model.description"></el-input>
                        </el-form-item>

                        <div class="flex pt-3 justify-end w-full">
                            <el-button type="primary" v-on:click="onSubmit(elform)">Save</el-button>
                        </div> 
                    </el-form>
                </loading-template>
            </el-dialog>
        </template>


    </management-layout>
</template>