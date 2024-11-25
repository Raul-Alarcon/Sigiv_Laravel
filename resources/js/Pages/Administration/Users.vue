<script setup> 
import ManagementLayout from '@/Layouts/ManagementLayout.vue';
import { CirclePlus, Search , Document, DocumentAdd, ArrowDown } from '@element-plus/icons-vue';
import useManager from '@/Composables/useManager';
import UserCompanyService from '@/Services/UserCompanyService';
import { ref } from 'vue';

const service = new UserCompanyService();
const search =  ref("")

const { Main,
    opc,
    entities: users,
    handlerDelete,
    handlerEdit,
    model:user,
    rules,
    handlerSubmit,
    handlerInputEnter,
    handlerChangeStatus,
    openModal } = useManager(service);


(async () => {
    await Main();
})();

</script> 

<template>
    <management-layout title="Users" :tag="`${users.length} count`">
        <template #description> 
            asdkmlkjn
        </template>


        <template #actions>
            <el-button type="primary" :icon="CirclePlus" v-on:click="openModal">Add User</el-button>
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
                <el-input v-model="search" style="width: 100%" v-on:change="handlerInputEnter" placeholder="Search" :prefix-icon="Search" clearable/>
            </div>
        </template>

        <template #content>
            <c-table :data="users" v-on:onEdit="handlerEdit" v-on:onDelete="handlerDelete" :is-manager="true"
                :model="user" width-column="70-400-400" :loading="opc.table">
                <template #status="{ row }">
                    <el-switch v-model="row.status" v-on:change="handlerChangeStatus(row)"></el-switch>
                </template>
            </c-table>
        </template> 
        <template #footerContent>

            <c-modal-form title="User company Form" v-on:onSubmit="handlerSubmit" :loading="opc.loading" :show="opc.modal"
                :model="user" :rules="rules" v-on:close="opc.modal = false" width="sm">

                <template #form-content="{ data, isLoading }">
                    <el-form-item label="Name" prop="name">
                        <el-input v-model="data.name" placeholder="Type name" clearable></el-input>
                    </el-form-item>

                    <el-form-item label="Email" prop="email">
                        <el-input v-model="data.email" placeholder="Type email" clearable></el-input>
                    </el-form-item>

                    <el-form-item label="Password" prop="password">
                        <el-input v-model="data.password" placeholder="Type password" clearable></el-input>
                    </el-form-item>
                </template> 
            </c-modal-form>

        </template>

    </management-layout>
</template>