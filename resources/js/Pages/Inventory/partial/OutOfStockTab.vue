<script setup>
import {
    Search,
    MagicStick,
    Delete,
    Notification
} from '@element-plus/icons-vue';
import { ref } from 'vue';
import ProductService from '@/Services/ProductoService';
import useManager from '@/Composables/useManager';
import LoadingTemplate from '@/Components/LoadingTemplate.vue';
import { router } from '@inertiajs/vue3';
import { ElMessage, ElMessageBox } from 'element-plus';
import PurchaseService from '@/Services/PurchaseService';

import { usePage } from '@inertiajs/vue3';

const page = usePage();

const productService = new ProductService();
const search = ref('');
const select = ref('');
const status = ref([]);
const itemsStatus = ref([]);
const suppliers = ref([]);
const showPurchaseItem = ref(false);
const productSelected = ref(null);
const active = ref(0);

const stepCreatePurchase = ref(true);
const createDetailPurchase = ref(false)

const purchaseService = new PurchaseService();
const purchase = ref({ ...purchaseService.model });
const loading_purchase = ref(false);
const countProduct = ref(1);

const {
    entities: products,
    handlerInputEnter,
    opc,
    handlerUpdateStatus,
    handlerDelete,
    handlerSearch,
    openModal
} = useManager(productService);

(async () => {
    // await Main();

    await handlerSearch('filter_minimum_stock=true');
    let productStatus = await productService.getStatus();

    suppliers.value = await productService.getSuppliers();

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

const onPurchaseItem = (product) => {
    showPurchaseItem.value = true;
    productSelected.value = product;
}

const handleBeforeClose = (done) => {
    ElMessageBox.confirm('Are you sure to close the dialog?', 'Warning', {
        confirmButtonText: 'OK',
        cancelButtonText: 'Cancel',
        type: 'warning'
    }).then(async () => {
        stepCreatePurchase.value = true;
        createDetailPurchase.value = false;

        if (purchase.value.id > 0) {
            await handlerDeletePurche();
        }
        active.value = 0;
        done();
    }).catch(() => {
    });
}

const handlerSavePurche = async () => {
    try {
        loading_purchase.value = true;
        purchase.value.supplier_id = productSelected.value.supplier_id;
        purchase.value.user_id = page.props.auth.user.id;
        let _purchase = await purchaseService.create(purchase.value)
        console.log(_purchase)
        purchase.value = _purchase;
        loading_purchase.value = false;
    } catch (error) {
        console.log(error)
        ElMessage.error('Error al guardar la compra')
        loading_purchase.value = false;
    }
}


const handlerDeletePurche = async () => {
    try {
        loading_purchase.value = true;
        await purchaseService.delete(purchase.value.id)
        purchase.value = { ...purchaseService.model };
        loading_purchase.value = false;
    } catch (error) {
        console.log(error)
        ElMessage.error('Error al guardar la compra')
        loading_purchase.value = false;
    }
}


const next = async () => {

    console.log(active.value)
    if (active.value >= 1) {

        showPurchaseItem.value = false;
        stepCreatePurchase.value = true;
        createDetailPurchase.value = false;
        active.value = -1
        console.log(active.value)
    }

    if (active.value === 0) {
        stepCreatePurchase.value = false;

        await handlerSavePurche();

        createDetailPurchase.value = true;
        active.value++
    }

    if (active.value === -1) {
        active.value++
    }

}


</script>

<template>
    <section class="flex flex-col p-4 space-y-3 ">
        <div class="flex flex-col md:flex-row justify-between space-y-3 md:space-y-0">
            <div class=""> 
                <div class="md:w-96"> 
                </div>
            </div>

            <div>
                <el-button v-on:click="navNewProduct">New Product</el-button>
            </div>
        </div>


        <div class="overflow-y-auto"> 
            <!-- main container -->
            <loading-template :loading="opc.loading">
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

                    <el-table-column fixed="right" label="Actions" min-width="200">
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

                                <el-button type="primary" v-on:Click="onPurchaseItem(row)" :icon="Notification"
                                    plain></el-button>

                                <el-button type="danger" v-on:Click="handlerDelete(row)" :icon="Delete"
                                    plain></el-button>
                            </div>
                        </template>
                    </el-table-column>

                </el-table>
            </loading-template>
        </div>

        <el-dialog v-model="showPurchaseItem" :before-close="handleBeforeClose" width="500">

            <div class="flex flex-col">
                <loading-template :loading="loading_purchase">
                    <div class="relative cursor-pointer group z-10 px-10 pt-10 space-y-6 movie_info" data-lity=""
                        href="https://www.youtube.com/embed/aSHs224Dge0">
                        <div class="poster__info align-self-end w-full">
                            <div class="space-y-6 detail_info">
                                <div class="flex flex-col space-y-2 inner">
                                    <h3 class="text-2xl font-bold dark:text-white" data-unsp-sanitized="clean">
                                        {{ productSelected.name }}
                                    </h3>
                                    <div class="mb-0 text-lg text-gray-400">
                                        {{ productSelected.supplier_name }}
                                    </div>
                                </div>
                                <div class="flex flex-row justify-between datos">
                                    <div class="flex flex-col datos_col">
                                        <div class="popularity">{{ `$${productSelected.unit_price}` }}</div>
                                        <div class="text-sm text-gray-400">Unit price</div>
                                    </div>
                                    <div class="flex flex-col datos_col">
                                        <div class="release text-center">{{ productSelected.current_stock }}</div>
                                        <div class="text-sm text-gray-400">Current stock</div>
                                    </div>

                                    <div class="flex flex-col datos_col">
                                        <div class="release text-center">{{ `$${parseInt(productSelected.current_stock)
                                            *
                                            parseFloat(productSelected.unit_price)}` }}</div>
                                        <div class="text-sm text-gray-400">Total in stock</div>
                                    </div>

                                    <div class="flex flex-col datos_col">
                                        <div class="release">
                                            {{ `$${parseInt(countProduct) * parseFloat(productSelected.unit_price)}` }}
                                        </div>
                                        <div class="text-sm text-gray-400">Total purchase:</div>
                                    </div>
                                </div>
                                <div v-show="createDetailPurchase"class="flex flex-col overview">
                                    <div class="text-xs text-gray-400 mb-2">Count:</div>
                                    <el-input-number v-model="countProduct" :min="1" />
                                </div>
                            </div>
                        </div>
                    </div>


                </loading-template>

            </div>

            <template #footer>
                <el-button v-on:click="next">Next</el-button>
            </template>
        </el-dialog>

        <el-dialog v-model="opc.modal" title="Compra" width="500">
            <loading-template :loading="opc.loading">

            </loading-template>
        </el-dialog>

    </section>
</template>