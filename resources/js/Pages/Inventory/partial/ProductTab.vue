<script setup>
import {
    Search,
    MagicStick,
    Delete
} from '@element-plus/icons-vue';
import { ref } from 'vue';
import ProductService from '@/Services/ProductoService';
import useManager from '@/Composables/useManager';
import LoadingTemplate from '@/Components/LoadingTemplate.vue';
import { router } from '@inertiajs/vue3';
import { items } from '@/Utils/SideMenu';

const productService = new ProductService();
const search = ref('');
const select = ref('');
const status = ref([]);
const itemsStatus = ref([]);

const {
    Main,
    entities: products,
    handlerInputEnter,
    opc,
    handlerUpdateStatus,
    handlerDelete
} = useManager(productService);

(async () => {
    await Main();
    let productStatus = await productService.getStatus();
    itemsStatus.value = productStatus;

    itemsStatus.value = itemsStatus.value.filter((item) => item.id !== 0);

    status.value = productStatus;

    status.value.push({
        id: 0,
        name: 'All'
    });
})();

const onSelectedStatus = async (row, status) => {
    await handlerUpdateStatus(row.id, status);
}

const onFilterByStatus = async (status) => {
    if (status.id === 0) {
        handlerInputEnter('')
    }
    handlerInputEnter(status.id)
}

const navNewProduct = () => {
    router.visit('products');
}

</script>

<template>
    <section class="flex flex-col p-4 space-y-3 ">
        <div class="flex flex-col md:flex-row justify-between space-y-3 md:space-y-0">
            <div class="">

                <div class="md:w-96">
                    <el-input v-model="search" style="max-width: 600px" v-on:change="handlerInputEnter"
                        placeholder="Please input" class="input-with-select">
                        <template #prepend>
                            <el-button :icon="Search" />
                        </template>
                        <template #append>
                            <el-select v-model="select" placeholder="Select" style="width: 115px">
                                <el-option v-for="st in status" :key="st.id" :label="st.name" :value="st.id"
                                    v-on:click="onFilterByStatus(st)" />
                            </el-select>
                        </template>
                    </el-input>
                </div>
            </div>

            <div>
                <el-button v-on:click="navNewProduct">New Product</el-button>
            </div>
        </div>


        <div class="overflow-y-auto">
            <!-- main container -->
            <loading-template :loading="opc.table">
                <el-table :data="products">
                    <el-table-column fixed prop="id" label="ID" width="70" />

                    <el-table-column label="Information" width="300">
                        <template #default="{ row }">
                            <div class="flex flex-col gap-y-1">
                                <div class="flex gap-x-3">
                                    <h4 class="text-gray-700 dark:text-gray-200">
                                        {{ `${row.name}` }}</h4>

                                    <el-tag type="warning" effect="light" round>
                                        {{ row.product_status }}
                                    </el-tag>
                                </div>

                                <div class="flex gap-x-3">
                                    <p class="text-gray-500 dark:text-gray-400">{{ row.storeBrancheName }}</p>
                                </div>
                            </div>
                        </template>
                    </el-table-column>
                    <el-table-column prop="description" label="Description" width="350" />
                    <el-table-column prop="current_stock" label="Stock" width="70" />
                    <el-table-column prop="unit_price" label="Price c/u" width="100">
                        <template #default="{ row }">
                            <span>{{ `$${row.unit_price}` }}</span>
                        </template>
                    </el-table-column>
                    <el-table-column prop="category_name" label="Category" width="150" />
                    <el-table-column prop="supplier_name" label="Supplier" width="200" />


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

                            <div class="flex space-x-3 justify-center">
                                <el-dropdown placement="top-end" trigger="click">
                                    <el-button :icon="MagicStick"></el-button>
                                    <template #dropdown>
                                        <el-dropdown-menu>

                                            <div v-for="st in itemsStatus" :key="st.id">
                                                <el-dropdown-item v-on:click="onSelectedStatus(row, st)">
                                                    {{ st.name }}
                                                </el-dropdown-item>
                                            </div>


                                        </el-dropdown-menu>
                                    </template>
                                </el-dropdown>
                                <el-button type="danger" v-on:Click="handlerDelete(row)" :icon="Delete"
                                    plain></el-button>
                            </div>
                        </template>
                    </el-table-column>

                </el-table>
            </loading-template>
        </div>

    </section>
</template>