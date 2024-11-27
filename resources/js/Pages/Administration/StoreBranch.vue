<script setup>
import useFile from '@/Composables/useFile';
import useManager from '@/Composables/useManager';
import ManagementLayout from '@/Layouts/ManagementLayout.vue';
import StoreBranchService from '@/Services/StoreBranchService';
import { CirclePlus, Search, UploadFilled, Edit, Delete } from '@element-plus/icons-vue';
import LoadingTemplate from '@/Components/LoadingTemplate.vue';
import { ref } from 'vue';

const service = new StoreBranchService();
const search = ref('');
const formStoreRef = ref(null);
const upload = ref(null)
const imgList = ref([]);

const file = useFile(upload);

const { Main,
    opc,
    entities: storeBranches,
    handlerDelete,
    handlerEdit,
    model: storeBranch,
    rules,
    handlerSubmit,
    handlerInputEnter, 
    openModal } = useManager(service);

(async () => {
    await Main();
})();

const handleModal = () => {
    imgList.value = [];
    openModal();
}

const handleClose = (done) => {
    done();
    imgList.value = [];
}

const handlerSuccess = (response, uploadFile) => {
    storeBranch.logo = response.url;
}

const beforeUpload = (rawFile) => {

    file.onBeforeUpload(rawFile);
};

const handleOnRemove = async (_file, fileList) => {
    file.onRemove(storeBranch.value.logo);
    storeBranch.logo = '';
}

const handleSubmit = async (formel) => {
    if (!formel) return
    await formel.validate(async (valid, fields) => {
        if (valid) {
            await handlerSubmit(formel);
            imgList.value = [];
        }
    })

}

const edit = (row) => {
    imgList.value = [{ url: row.logo }];
    handlerEdit(row);
}

const handleChange = (uploadFile, uploadFiles) => {
    console.log(imgList.value);
}




</script>
<template>
    <management-layout title="StoreBranch" :tag="`${storeBranches.length}`">

        <template #description>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illum laboriosam consequuntur</p>
        </template>

        <template #actions>
            <el-button type="primary" v-on:Click="handleModal()" :icon="CirclePlus">Add Charger</el-button>
        </template>


        <template #searchContent>
            <div class="md:w-80">
                <el-input v-model="search" placeholder="Search.." v-on:change="handlerInputEnter" :prefix-icon="Search" style="width: 100%;" clearable></el-input>
            </div>
        </template>

        <template #content>

            <loading-template :loading="opc.table">
                <el-table :data="storeBranches" style="width: 100%">
                    <el-table-column fixed prop="id" label="ID" width="70" />

                    <el-table-column label="Logo" width="70">
                        <template #default="{ row }">
                            <div class="flex items-center">
                                <img class="object-cover w-6 h-6 -mx-1 border-2 border-white rounded-full dark:border-gray-700 shrink-0"
                                    :src="row.logo" alt="">
                            </div>
                        </template>

                    </el-table-column>

                    <el-table-column label="Description" width="400">
                        <template #default="{ row }">
                            <div>
                                <h4 class="text-gray-700 dark:text-gray-200">{{ row.name }}</h4>
                                <p class="text-gray-500 dark:text-gray-400">{{ row.description }}</p>
                            </div>
                        </template>
                    </el-table-column>


                    <el-table-column label="NIT" prop="NIT" width="200" />
                    <el-table-column label="Opening date" width="200">
                        <template #default="{ row }">
                            {{ row.opening_date }}
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

                    <el-table-column fixed="right" label="Actions" min-width="130">
                        <template #default="{ row }">
                            <el-button type="primary" v-on:Click="edit(row)" :icon="Edit" plain></el-button>
                            <el-button type="danger" v-on:Click="handlerDelete(row)" :icon="Delete" plain></el-button>
                        </template>
                    </el-table-column>


                </el-table>
            </loading-template>
        </template>

        <template #footerContent>
            <el-dialog :before-close="handleClose" v-model="opc.modal" title="StoreBranch Form" width="500">
                <el-form ref="formStoreRef" :rules="rules" :model="storeBranch" label-position="top">

                    <div class="grid md:grid-cols-2 grid-cols-1 gap-x-3">
                        <div class="md:col-span-2">
                            <el-form-item label="Name" prop="name">
                                <el-input v-model="storeBranch.name" placeholder="Name"></el-input>
                            </el-form-item>
                        </div>

                        <div class="md:col-span-1">
                            <el-form-item label="NIT" prop="NIT">
                                <el-input v-model="storeBranch.NIT" placeholder="Name"></el-input>
                            </el-form-item>
                        </div>

                        <div class="md:col-span-1">
                            <el-form-item label="Opening Date" prop="opening_date">
                                <el-date-picker style="width: 100%;" v-model="storeBranch.opening_date" type="date"
                                    placeholder="Selected date" />
                            </el-form-item>
                        </div>

                        <div class="md:col-span-2">
                            <el-form-item label="Description" prop="description">
                                <el-input v-model="storeBranch.description" style="" :rows="3" type="textarea"
                                    placeholder="Description" />
                            </el-form-item>
                        </div>


                        <div class="md:col-span-2">

                            <el-form-item label="logo">
                                <el-upload v-model:file-list="imgList" style="width: 100%;" class="upload-demo"
                                    ref="upload" :action="route('upload_img')" :limit="1" :on-success="handlerSuccess"
                                    :before-upload="beforeUpload" :on-remove="handleOnRemove" :on-change="handleChange"
                                    list-type="picture">
                                    <el-button type="primary" plain>Click to upload</el-button>
                                    <template #tip>
                                        <div class="el-upload__tip">
                                            jpg/png files with a size less than 500kb
                                        </div>
                                    </template>
                                </el-upload>
                            </el-form-item>
                        </div>


                        <div class="col-span-2 text-end">
                            <el-button type="primary" v-on:Click="handleSubmit(formStoreRef)"
                                :icon="CirclePlus">Save</el-button>
                        </div>

                    </div>
                </el-form>

            </el-dialog>
        </template>
    </management-layout>
</template>
