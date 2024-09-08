<script setup> 
import { ref, reactive } from 'vue';
import Modal from '@/Components/Modal.vue';
import { category, service } from '@/Services/CategoryService';
import { Delete, Edit, Plus, Search, ArrowDown, Document, DocumentAdd, CirclePlus } from '@element-plus/icons-vue'
import ManagementLayout from '@/Layouts/ManagementLayout.vue';
import LoadingTemplate from '@/Components/LoadingTemplate.vue';
import { ElMessage } from 'element-plus';

const categories = ref([]);

const opElMessage = {
    showClose: true,
    message: "",
    type: 'success',
    plain: true
}
const ruleFormRef = ref();
const search = ref();
const showModal = ref(false)
const loadings = reactive({
    form: false,
    table: false
})
const form = reactive({
    ...category
});

const rules = reactive({
    name: [
        { required: true, message: "Please type the name", trigger: 'blur' }
    ],
    description: [
        { required: true, message: "Please type the description", trigger: 'blur' }
    ]
});

(async () => {
    try {
        let responce = await service.getAll();
        categories.value = responce.data;
        console.log(categories.value)
    } catch (error) {
        console.log(error)
    }
})();

const handlerModal = () => {
    form.id = 0;
    form.name = "";
    form.description = "";
    form.status = true;
    showModal.value = true;
}

const handlerSelection = (category) => {
    form.id = category.id;
    form.name = category.name;
    form.description = category.description;
    form.status = category.status;
    showModal.value = true;
}

const handlerChangeStatus = async (category) => {
    try {
        loadings.table = true;
        await service.updateStatus(category.id)
        opElMessage.message = "Category updated successfully"
    } catch (error) {
        const index = categories.value.findIndex(c => c.id === category.id)
        const category = categories.value[index];
        category.status = !category.status;
        categories.value[index] = category;
        opElMessage.message = "Error updating category"
    }
    loadings.table = false;
    ElMessage(opElMessage)
}

const handlerDelete = async (category) => {
    try {
        loadings.table = true;
        await service.delete(category.id)
        categories.value = categories.value.filter(c => c.id !== category.id)
        opElMessage.message = "Delete category successfully"
    } catch (error) {
        opElMessage.message = err.message;
        opElMessage.type = "error"
    }
    loadings.table = false;
    ElMessage(opElMessage);
}

const handlerPost = async (formel) => {
    try {
        loadings.form = true;
        let category = form;
        category = await service.create(category)
        categories.value.push(category)
        formel.resetFields()
        opElMessage.message = "Add a new Category"
    } catch (err) {
        opElMessage.message = err.message;
        opElMessage.type = "error"
    }
    showModal.value = false;
    loadings.form = false;
    ElMessage(opElMessage)
}

const handlerPut = async (formel) => {
    try {
        loadings.form = true;
        let category = form
        category = await service.update(category.id, category)
        const index = categories.value.findIndex(c => c.id === category.id)
        categories.value[index] = category;
        formel.resetFields()
        opElMessage.message = 'Category updated successfully';
    } catch (error) {
        opElMessage.message = 'Error updating category';
        opElMessage.type = "error"
    }

    form.id = 0;
    showModal.value = false;
    loadings.form = false;
    ElMessage(opElMessage)
}

const handlerSubmit = async (formel) => {
    if (!formel) return
    await formel.validate((valid, flields) => { 

        if (valid && form.id == 0) handlerPost(formel);  
        if (valid && form.id != 0) handlerPut(formel); 

    })
}

</script>
<template>
    <management-layout title="Categories" tag="220 categories">
        <template #description>
            <span>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Blanditiis sed</span>
        </template>

        <template #actions>
            <el-button type="primary" :icon="Plus" v-on:click="handlerModal">Add Category</el-button>
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
                <el-input v-model="search" style="width: 100%" placeholder="Search" :prefix-icon="Search" />
            </div>
        </template>

        <template #content>
            <loading-template :loading="loadings.table">
                <el-table :data="categories" style="width: 100%" max-height="400">
                    <el-table-column fixed="left" prop="id" label="Id" width="70"></el-table-column>
                    <el-table-column prop="name" label="Name" width="150"></el-table-column>
                    <el-table-column prop="description" label="Description" width="420"></el-table-column>

                    <el-table-column prop="status" label="Estado" width="100">
                        <template #default="{ row }">
                            <el-switch v-model="row.status" v-on:change="handlerChangeStatus(row)"></el-switch>
                        </template>
                    </el-table-column>

                    <el-table-column prop="created_at" label="Date of Creation" width="180">
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
                            <el-button type="primary" v-on:click="handlerSelection(row)" :icon="Edit" plain></el-button>
                            <el-button type="danger" v-on:click="handlerDelete(row)" :icon="Delete" plain></el-button>
                        </template>
                    </el-table-column>
                </el-table>
            </loading-template>
        </template>

        <template #footerContent>
            <modal title="Category Form" :show="showModal" v-on:close="showModal = false" max-width="sm">
                <el-form ref="ruleFormRef" :model="form" :rules="rules" label-position="top">
                    <loading-template :loading="loadings.form">

                        <el-form-item label="Name" prop="name">
                        <el-input v-model="form.name" placeholder="name.."></el-input>
                    </el-form-item>

                    <el-form-item label="Description" prop="description">
                        <el-input v-model="form.description" placeholder="description" type="textarea"
                            :rows="5"></el-input>
                    </el-form-item>

                    </loading-template>

                    <el-form-item>
                        <div class="w-full flex justify-between">
                            <el-switch v-model="form.status"></el-switch>
                            <el-button type="primary" :icon="CirclePlus" v-on:click="handlerSubmit(ruleFormRef)"
                                :loading="loadings.form">Save</el-button>
                        </div>
                    </el-form-item>
                </el-form>
            </modal>
        </template>
    </management-layout>
</template>