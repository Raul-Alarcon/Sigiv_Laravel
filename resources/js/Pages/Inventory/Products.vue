<script setup>
import ManagementLayout from '@/Layouts/ManagementLayout.vue';
import { CirclePlus, Search, Document, DocumentAdd, ArrowDown } from '@element-plus/icons-vue';
import ProductService from '@/Services/ProductoService';
import useManager from '@/Composables/useManager';
import { reactive, ref } from 'vue'; 
import userBarCode from '@/Composables/userBarCode';

const service = new ProductService();
const showModal = ref(false);
const formRef = ref();
const barcode = ref('');

const categories = ref([]);
const suppliers = ref([]);

const {
    generateBarCode,
    downloadBarCode,
    printBarcode
} = userBarCode(barcode);

const {
    model: Product,
    entities: Products,
    Main,
    opc, 
    rules } = useManager(service);
 


( async () => {
    try {
        await Main(); 
        categories.value = await service.getCategories();
        suppliers.value = await service.getSuppliers();
    } catch (error) {
        console.log(error);
    } 
})();

 


const handlerModal = () => {
    showModal.value = !showModal.value;
};


const handlerGenerateCode = (code) => { 
    generateBarCode(code) 
};

const handlerExportCode  = (code, productName) => {
    if(productName === '') return;
    if (code.length <= 0) return;  
    generateBarCode(code) 
    downloadBarCode(productName)

}

const handlerPrintCode = (code, productName) => {
    if(productName === '') return;
    if (code.length <= 0) return;  
    generateBarCode(code) 
    printBarcode(productName)
}
 
 

</script>
 

<template>
    <management-layout title="Products" tag="2">

        <template #description>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque dolore quaerat voluptate sunt delectus,
            reprehenderit quae dicta. Sit provident perferendis quibusdam adipisci reiciendis et in dolor numquam,
            tempora blanditiis expedita!

            {{ Products }}
        </template>

        <template #actions>
            <el-button type="primary" :icon="CirclePlus" v-on:click="handlerModal">Add User</el-button>
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
                <!-- <el-input v-model="search" style="width: 100%" v-on:change="handlerInputEnter" placeholder="Search"
                    :prefix-icon="Search" clearable /> -->
            </div>
        </template>

        <template #content>
            <!-- v-on:onEdit="handlerEdit" v-on:onDelete="handlerDelete"  -->
            <c-table :data="Products" :is-manager="true"
                :model="Product" width-column="70-400-400" :loading="opc.table"> 
            </c-table>
        </template>

        <template #footerContent>

            <el-dialog v-model="showModal" title="Product Form" width="500">

                <el-form ref="formRef" :rules="rules" :model="Product" label-position="top">
                    <div class="grid grid-cols-1 md:grid-cols-6 gap-3">
                        <div class="md:col-span-4">
                            <el-form-item label="Name" prop="name">
                                <el-input v-model="Product.name"></el-input>
                            </el-form-item>
                        </div>

                        <div class="md:col-span-2">
                            <el-form-item label="Category" prop="category_id">

                                <el-select v-model="Product.category_id" placeholder="Please select a category">
                                    <el-option
                                        v-for="category in categories"
                                        :key="category.id"
                                        :label="category.name"
                                        :value="category.id"
                                    />
                                </el-select>

                                <!-- <el-input v-model="Product.category_id"></el-input> -->
                            </el-form-item>
                        </div>

                        <div class="md:col-span-3">
                            <el-form-item label="Suppliers" prop="supplier_id">

                                <el-select v-model="Product.supplier_id" placeholder="Please select a supplier">
                                    <el-option
                                        v-for="supplier in suppliers"
                                        :key="supplier.id"
                                        :label="supplier.name"
                                        :value="supplier.id"
                                    />
                                </el-select> 
                            </el-form-item>
                        </div>

                        <div class="md:col-span-3">
                            <el-form-item label="Product Status" prop="productstatus_id">
                                <el-input v-model="Product.productstatus_id"></el-input>
                            </el-form-item>
                        </div>

                        <div class="md:col-span-3">
                            <el-form-item label="Barcode" prop="barcode">
                                <el-input v-model="Product.barcode"></el-input>
                            </el-form-item>
                        </div>  

                       

                        <div class="md:col-span-1">
                            <el-form-item label="Stock" prop="stock">
                                <el-input v-model="Product.stock"></el-input>
                            </el-form-item>
                        </div>

                        <div class="md:col-span-2">
                            <el-form-item label="Minimun" prop="minimun_stock">
                                <el-input v-model="Product.minimun_stock"></el-input>
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
                                <el-button style="width: 100%;" v-on:click="handlerExportCode(Product.barcode,Product.name)">Download</el-button>
                            </el-form-item>
                        </div>

                        <div class="md:col-span-2">
                            <el-form-item label="Print">
                                <el-button style="width: 100%;" v-on:click="handlerPrintCode(Product.barcode, Product.name)">Export</el-button>
                            </el-form-item>
                        </div>


                        <div class="md:col-span-5">
                            <div class="flex justify-center items-center w-[100%]"> 
                                <svg ref="barcode">
                                </svg>
                            </div>
                            
                        </div>

                    </div>
                </el-form>

                <template #footer> 
                    <el-button type="primary" v-on:click="handlerSubmit" size="small">Save</el-button>
                </template>
            </el-dialog>
        </template>


    </management-layout>
</template>