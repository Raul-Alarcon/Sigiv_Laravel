<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { ref } from 'vue';

import { getInstance } from '@/Utils/Toast';
import { useToast } from 'primevue/usetoast';
import Modal from '@/Components/Modal.vue';
import { useForm } from '@inertiajs/vue3'
import { category, service } from '@/Services/CategoryService';


defineProps({
    categories: {
        type: Array,
        required: true
    }
});

const toast = getInstance(useToast());
const options = ref([
    { label: 'Enable', value: 'Enable' },
    { label: 'Disable', value: 'Disable' }
]);
const selectionOption = ref({ label: 'Disable', value: 'Disable' });
const loading = ref(false);
const showModal = ref(false)
const form = useForm({
    ...category
});


const handlerEdit = (category) => {
    toast.success('Edit category with id: ' + category.id);
    console.log("Estamos editando la categoria con id: " + category.id);
}

const handlerDelete = (category) => {
}


const handlerSelectedButton = () => {
    console.log(selectionOption.value)
}

const handlerChangeStatus = (category) => {
    // loading.value = true;
    // setTimeout(() => {
    //     toast.add({ severity: 'success', summary: 'Status', detail: 'Change status category with id: ' + category.id, life: 3000 });
    //     loading.value = false;
    // }, 3000);
}

</script>

<template>

    <app-layout :title="'Categories'">
        <Toast /> 
        <!-- component -->
        <div class=" px-4 mx-auto pt-7 md:pt-10">
            <div class="sm:flex sm:items-center sm:justify-between">
                <div>
                    <div class="flex items-center gap-x-3">
                        <h2 class="text-lg font-medium text-gray-800 dark:text-white">Categories</h2>

                        <Tag severity="info" :value="`${(parseInt(categories.values.length) + 1)} Count`" rounded>
                        </Tag>

                    </div>

                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">Lorem ipsum dolor sit, amet consectetur
                        adipisicing
                        elit.</p>
                </div>

                <div class="flex items-center mt-4 gap-x-3">
                    <Button label="Export" @click="handlerEdit" icon="pi pi-cloud-upload" severity="contrast"
                        outlined="">
                    </Button>

                    <Button label="Add Category" icon="pi pi-plus-circle" @click="showModal = true">
                    </Button>
                </div>
            </div>
            <div class="flex flex-col ">
                <DataTable :value="categories" row-hover :loading="loading" class="!rounded-l-3xl !text-blue-800">

                    <template #header>
                        <div class="mt-6 md:flex md:items-center md:justify-between mb-4">
                            <div
                                class="inline-flex overflow-hidden bg-white border divide-x rounded-lg dark:bg-gray-900 rtl:flex-row-reverse dark:border-gray-700 dark:divide-gray-700">


                                <SelectButton v-model="selectionOption" :options="options" aria-labelledby="custom"
                                    option-label="label" data-key="value" allowEmpty :invalid="selectionOption === null"
                                    @change="handlerSelectedButton">
                                </SelectButton>

                            </div>

                            <div class="relative flex items-center mt-4 md:mt-0">

                                <IconField>
                                    <InputIcon>
                                        <i class="pi pi-search" />
                                    </InputIcon>
                                    <InputText placeholder="Keyword Search" class="md:w-96" />
                                </IconField>
                            </div>
                        </div>
                    </template>

                    <template #empty>
                        Aun no tienes registrs de categorias que mostrar
                    </template>
                    <Column header="ID" field="id"></Column>
                    <Column header="Name" field="name"></Column>
                    <Column header="Description" field="description"></Column>
                    <Column header="Status">
                        <template #body="{ data }">
                            <Tag :severity="(data.status ? 'succser' : 'danger')"
                                :value="(data.status ? 'Active' : 'Inactive')"></Tag>
                        </template>
                    </Column>
                    <Column header="Switch">
                        <template #body="{ data }">
                            <ToggleSwitch v-model="data.status" v-on:change="handlerChangeStatus(data)"></ToggleSwitch>
                        </template>
                    </Column>

                    <Column header="Actions" header-class="!flex !justify-center">
                        <template #body="{ data }">
                            <div class="flex justify-center space-x-3">
                                <Button icon="pi pi-pencil" rounded outlined aria-label="Edit">
                                </Button>
                                <Button icon="pi pi-trash" severity="danger" rounded outlined aria-label="Delete">
                                </Button>
                            </div>
                        </template>
                    </Column>
                </DataTable>
            </div>

            <Modal :show="showModal" @close="showModal = false" maxWidth="sm">
                <div class="px-3 py-5 md:px-6 md:py-9 space-y-4">

                    <div class="flex justify-between items-center">
                        <h2 class="font-semibold text-lg uppercase">Category Form</h2>

                        <Button icon="pi pi-times" outlined severity="secondary" @click="showModal = false">
                        </Button>

                    </div>

                    <form @submit.prevent="service.create">
                        <div class="grid gap-4">
                            <label for="nameCategory" class="flex flex-col-reverse">
                                <InputText v-model="form.name" id="nameCategory" placeholder="Name for category">
                                </InputText>
                                <span class="font-semibold text-gray-600">Name</span>
                            </label>

                            <label for="descriptionCategory" class="flex flex-col-reverse">
                                <Textarea v-model="form.description" placeholder="Description for category"
                                    :rows="4"></Textarea>
                                <span class="font-semibold text-gray-600">Description</span>
                            </label>

                            <div class="flex justify-between space-x-4 items-center">
                                <ToggleSwitch v-model="form.status"></ToggleSwitch>
                                <Button label="Save" type="submit" icon="pi pi-save"></Button>
                            </div>
                        </div>
                    </form>
                </div>
            </Modal>
        </div>
    </app-layout>
</template>