<script setup>
import ManagementLayout from '@/Layouts/ManagementLayout.vue';
import CompanyService from '@/Services/CompanyService';
import SectorService from '@/Services/SectorService';
import useCompany from '@/Composables/useCompany';
import LoadingTemplate from '@/Components/LoadingTemplate.vue';
import { View, Edit, Delete, UploadFilled } from '@element-plus/icons-vue';
import Modal from '@/Components/Modal.vue';
import { openBlock, ref } from 'vue';


const sectorService = new SectorService();
const companyService = new CompanyService();
const modal = ref(false)
const formRef = ref(null)
const sectors = ref([])
const sectorSelected = ref(null)

const { main,
    companies,
    loadings,
    company,
    rules } = useCompany(companyService);

(async () => {
    await main();
    sectors.value = (await sectorService.getAll()).data
})();

const handlerCloseModal = () => {
    modal.value = false
}

const handlerOpenModal = () => {
    modal.value = true
}

</script>
<template>
    <management-layout title="Companies" :tag="`2`">
        <template #description>
            <!-- {{ sectors }} -->
            <span>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Blanditiis sed</span>
        </template>

        <template #actions>
            <el-button type="primary" v-on:click="handlerOpenModal">Add Company</el-button>
        </template>

        <template #content>
            <loading-template :loading="loadings.table">
                <el-table :data="companies" style="width: 100%">
                    <el-table-column prop="id" label="Id" width="70" fixed="left"></el-table-column>
                    <el-table-column prop="name" label="Name" width="300" fixed="left"></el-table-column>
                    <el-table-column prop="description" label="Description" width="700"></el-table-column>
                    <el-table-column prop="email" label="EMAIL" width="300"></el-table-column>


                    <el-table-column prop="nrc" label="NRC/NIT" width="200">
                    </el-table-column>

                    <el-table-column prop="website" label="WEB" width="70">
                        <template #default="{ row }">

                            <el-tooltip effect="dark" :content="row.website" placement="top">
                                <el-button :href="row.website" tag="a" target="_blank" rel="noopener noreferrer"
                                    type="success" circle :icon="View" plain :disabled="row.website ? false : true">
                                </el-button>
                            </el-tooltip>


                        </template>
                    </el-table-column>

                    <el-table-column label="Status" width="70">
                        <template #default="{ row }">
                            <el-switch v-model="row.status"></el-switch>
                        </template>
                    </el-table-column>

                    <el-table-column label="Created at" width="200">
                        <template #default="{ row }">
                            <span class="text-nowrap">{{ row.created_at }}</span>
                        </template>
                    </el-table-column>

                    <el-table-column label="Updated at" width="200">
                        <template #default="{ row }">
                            <span class="text-nowrap">{{ row.updated_at }}</span>
                        </template>
                    </el-table-column>

                    <el-table-column fixed="right" label="Actions" min-width="130">
                        <template #default="{ row }">
                            <el-button type="primary" :icon="Edit" plain></el-button>
                            <el-button type="danger" :icon="Delete" plain></el-button>
                        </template>
                    </el-table-column>

                </el-table>
            </loading-template>

        </template>

        <template #footerContent>

            <el-dialog v-model="modal" title="COMPANY FORM" width="800">

                <el-form ref="formRef" :model="company" :rules="rules" label-position="top">

                    <div class="grid grid-cols-6 gap-3">

                        <div class="col-span-2 row-span-3">
                            <div>
                                <el-upload action="#" drag :auto-upload="false">
                                    <el-icon :size="30"><upload-filled /></el-icon>
                                    <div class="el-upload__text">
                                        Drop file here or <em>click to upload</em>
                                    </div>
                                    <template #tip>
                                        <div class="el-upload__tip">
                                            jpg/png files with a size less than 500kb
                                        </div>
                                    </template>
                                </el-upload>

                            </div>
                        </div>

                        <div class="col-span-4">
                            <el-form-item label="Name" prop="name">
                                <el-input placeholder="type name company" />
                            </el-form-item>
                        </div>

                        <div class="col-span-3">
                            <el-form-item label="NRC" prop="nrc">
                                <el-input placeholder="type nrc or nit" />
                            </el-form-item>
                        </div>

                        <div class="col-span-1">
                            <div class="pb-2">
                                <el-text>Sectors</el-text>
                            </div>
                            <el-select v-model="sectorSelected" placeholder="Select">
                                <el-option v-for="item in sectors" :key="item.id" :label="item.name" :value="item.id" />
                            </el-select>
                        </div>

                        <!-- 
                        <div class="col-span-1">
                            <el-form-item label="Logo" prop="logo">
                                <el-input placeholder="Select" />
                            </el-form-item>
                        </div> -->


                        <div class="col-span-6">
                            <el-form-item label="Email" prop="email">
                                <el-input placeholder="type email" />
                            </el-form-item>
                        </div>

                        <div class="col-span-4">
                            <el-form-item label="Website" prop="website">
                                <el-input placeholder="type website" />
                            </el-form-item>
                        </div>

                        <div class="col-span-2">
                            <div class=" pb-2">
                            <span class="demonstration">Date fundation</span>

                            </div>
                            <div>
                                <el-date-picker style="width: 100%;" v-model="value1" type="date" placeholder="Pick a date"/>
                            </div>
                        </div>

                       
                        <!-- <div class="col-span-6 md:col-span-2 space-y-1">
                            <label class="text-sm text-gray-200 font-light">Sectors</label>
                            <el-select v-model="sectorSelected" placeholder="Select">
                                <el-option v-for="item in sectors" :key="item.id" :label="item.name" :value="item.id" />
                            </el-select>
                        </div> -->

                        <div class="col-span-6">
                            <el-form-item label="Description" prop="description">
                                <el-input placeholder="description" type="textarea" :rows="5"></el-input>
                            </el-form-item>
                        </div>

                    </div>

                </el-form>


            </el-dialog>

            <!-- <modal :show="modal" title="Company form" v-on:close="handlerCloseModal" max-width="2xl">
                
            </modal>  -->
        </template>

    </management-layout>
</template>