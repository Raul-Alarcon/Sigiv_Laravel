<script setup>
import ManagementLayout from '@/Layouts/ManagementLayout.vue';
import { CirclePlus, Search, 
    Document, 
    DocumentAdd,
    ArrowDown, 
    Edit, 
    Delete,
    FullScreen } from '@element-plus/icons-vue';

import ProductService from '@/Services/ProductoService';
import LoadingTemplate from '@/Components/LoadingTemplate.vue';
import useManager from '@/Composables/useManager';
import { reactive, ref } from 'vue';
import userBarCode from '@/Composables/userBarCode';

const service = new ProductService();
const showModal = ref(false);
const formRef = ref();
const barcode = ref('');
const barcodeShow = ref('');
const popoverRef = ref();

const categories = ref([]);
const suppliers = ref([]);
const storeBranch = ref([]);
const search = ref('');
const {
    generateBarCode,
    downloadBarCode,
    printBarcode
} = userBarCode(barcode);

const showCode = userBarCode(barcodeShow);

const {
    model: Product,
    entities: Products,
    Main,
    handlerSubmit,
    handlerDelete, 
    handlerEdit, 
    openModal,
    handlerInputEnter, 
    opc,
    rules } = useManager(service);



(async () => {
    try {
        await Main();
        categories.value = await service.getCategories();
        suppliers.value = await service.getSuppliers();
        storeBranch.value = await service.getStoreBranches();
    } catch (error) {
        console.log(error);
    }
})();



 

const handlerGenerateCode = (code) => {
    generateBarCode(code)
};

const handlerExportCode = (code, productName) => {
    if (productName === '') return;
    if (code.length <= 0) return;
    generateBarCode(code)
    downloadBarCode(productName)

}

const handlerPrintCode = (code, productName) => {
    if (productName === '') return;
    if (code.length <= 0) return;
    generateBarCode(code)
    printBarcode(productName)
}

const onSubmit = async (elForm) => {
    if (!elForm) return;
    await elForm.validate(async (valid) => {
        if (valid) {
            console.log(Product)
            await handlerSubmit(elForm);
        }
    });
}

const onShowPopover = (code) => { 
    showCode.generateBarCode(code) 
}

const prueba = () => {
    console.log('prueba')
}


const onExporteCode = (code, productName) => {
    if (productName === '') return;
    if (code.length <= 0) return;
    showCode.generateBarCode(code)
    showCode.downloadBarCode(productName)

}

const onPrintCode = (code, productName) => {
    if (productName === '') return;
    if (code.length <= 0) return;
    showCode.generateBarCode(code)
    showCode.printBarcode(productName)
}


</script>


<template>
    <management-layout title="Products" tag="2">

        <template #description>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque dolore quaerat voluptate sunt delectus,
            reprehenderit quae dicta. Sit provident perferendis quibusdam adipisci reiciendis et in dolor numquam,
            tempora blanditiis expedita!
 
        </template>

        <template #actions>
            <el-button type="primary" :icon="CirclePlus" v-on:click="openModal">Add Product</el-button>
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
            <!-- v-on:onEdit="handlerEdit" v-on:onDelete="handlerDelete"  -->
            <loading-template :loading="opc.table">
                <el-table :data="Products" style="width: 100%">
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
                    <el-table-column prop="barcode" label="Barcode" width="150">
                        <template #default="{ row }"> 
                            <div>
 
                                <el-popover v-on:show="prueba" placement="right" :width="250" trigger="click"  >
                                    <template #reference>
                                        <el-button  :icon="FullScreen" v-on:click="onShowPopover(row.barcode)"></el-button>
                                    </template> 

                                    <div class="flex space-y-3 flex-col">
                                        <div>
                                            <svg ref="barcodeShow">
                                            </svg>
                                        </div>

                                        <div class="text-end">
                                            <el-button  v-on:click="onExporteCode(row.barcode, row.name)">Download</el-button>
                                            <el-button  v-on:click="onPrintCode(row.barcode, row.name)">Print</el-button>

                                        </div>
                                    </div>
                                     
                                </el-popover>
                            </div>

                            
                        </template>
                    </el-table-column>
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
                            <el-button type="primary" v-on:Click="handlerEdit(row)" :icon="Edit" plain></el-button>
                            <el-button type="danger" v-on:Click="handlerDelete(row)" :icon="Delete" plain></el-button>
                        </template>
                    </el-table-column>

                </el-table>

            </loading-template>
        </template>

        <template #footerContent>

            <el-dialog v-model="opc.modal" title="Product Form" width="500">

                <loading-template :loading="opc.loading">
                    <el-form ref="formRef" :rules="rules" :model="Product" label-position="top">
                        <div class="grid grid-cols-1 md:grid-cols-6 gap-x-3">
                            <div class="md:col-span-4">
                                <el-form-item label="Name" prop="name">
                                    <el-input v-model="Product.name"></el-input>
                                </el-form-item>
                            </div>

                            <div class="md:col-span-2">
                                <el-form-item label="Category" prop="category_id">

                                    <el-select v-model="Product.category_id" placeholder="Please select a category">
                                        <el-option v-for="category in categories" :key="category.id"
                                            :label="category.name" :value="category.id" />
                                    </el-select>

                                    <!-- <el-input v-model="Product.category_id"></el-input> -->
                                </el-form-item>
                            </div>

                            <div class="md:col-span-3">
                                <el-form-item label="Suppliers" prop="supplier_id">

                                    <el-select v-model="Product.supplier_id" placeholder="Please select a supplier">
                                        <el-option v-for="supplier in suppliers" :key="supplier.id"
                                            :label="supplier.name" :value="supplier.id" />
                                    </el-select>
                                </el-form-item>
                            </div>

                            <div class="md:col-span-3">
                                <el-form-item label="Store" prop="storebranch_id">
                                    <el-select v-model="Product.storebranch_id" placeholder="Please select a store">
                                        <el-option v-for="store in storeBranch" :key="store.id" :label="store.name"
                                            :value="store.id" />
                                    </el-select>
                                </el-form-item>
                            </div>

                            <div class="md:col-span-2">
                                <el-form-item label="Barcode" prop="barcode">
                                    <el-input v-model="Product.barcode"></el-input>
                                </el-form-item>
                            </div>



                            <div class="md:col-span-2">
                                <el-form-item label="Stock" prop="current_stock">
                                    <el-input-number v-model="Product.current_stock" :min="1" />
                                </el-form-item>
                            </div>

                            <div class="md:col-span-2">
                                <el-form-item label="Minimun" prop="minimun_stock">
                                    <el-input-number v-model="Product.minimun_stock" :min="1"
                                        controls-position="right" />
                                </el-form-item>
                            </div>

                            <div class="md:col-span-6">
                                <el-form-item label="Description" prop="description">
                                    <el-input type="textarea" v-model="Product.description"></el-input>
                                </el-form-item>
                            </div>


                            <div class="md:col-span-2">
                                <el-form-item label="Unit price" prop="unit_price">
                                    <el-input-number v-model="Product.unit_price" :precision="2" :step="0.1" />
                                </el-form-item>
                            </div>

                            <div class="md:col-span-2">
                                <el-form-item label="Generate Code">
                                    <el-button style="width: 100%;"
                                        v-on:click="handlerGenerateCode(Product.barcode)">Generate</el-button>
                                </el-form-item>
                            </div>

                            <div class="md:col-span-2">
                                <el-form-item label="Download Code">
                                    <el-button style="width: 100%;"
                                        v-on:click="handlerExportCode(Product.barcode, Product.name)">Download</el-button>
                                </el-form-item>
                            </div>



                            <div class="md:col-span-6">
                                <div class="flex justify-center items-center w-[100%]">
                                    <svg ref="barcode">
                                    </svg>
                                </div>

                            </div>

                            <div class="md:col-span-6 flex justify-between items-center">
                                <el-form-item label="Print">
                                    <el-button style="width: 100%;"
                                        v-on:click="handlerPrintCode(Product.barcode, Product.name)">Export</el-button>
                                </el-form-item>

                                <el-button type="primary" v-on:click="onSubmit(formRef)">Save</el-button>
                            </div>

                        </div>
                    </el-form>

                </loading-template>


            </el-dialog>
        </template>


    </management-layout>
</template>