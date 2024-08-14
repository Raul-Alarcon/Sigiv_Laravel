<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { ref } from 'vue';

import { getInstance } from '@/Utils/Toast';
import { useToast } from 'primevue/usetoast';
import Modal from '@/Components/Modal.vue';
import { useForm } from '@inertiajs/vue3'
import { category, service } from '@/Services/CategoryService';


const categories = ref([]);

const toast = getInstance(useToast());
const options = ref([
    { label: 'Enable', value: 'Enable' },
    { label: 'Disable', value: 'Disable' }
]);
const selectionOption = ref({ label: 'Disable', value: 'Disable' }); 
const showModal = ref(false)
const loading = ref({
    button: false
});
const form = useForm({
    ...category
});




(async () => {
    try {
        let responce = await service.getAll();
        categories.value = responce.data;
    } catch (error) {
        toast.error('Error loading categories');
    }
})();

const handlerSwitchModal = () => {
    showModal.value = !showModal.value;
    form.reset();
}

const handlerSwitchStatus = async (data) => {
    try { 
        await service.updateStatus(data.id)
        toast.success('Category updated successfully');
    } catch (error) {
        const index = categories.value.findIndex(c => c.id === data.id)
        const category = categories.value[index];
        category.status = !category.status;
        categories.value[index] = category;
        toast.error('Error updating category');
    }
}

const onSelecctionCategory = (data) => {
    form.id = data.id;
    form.name = data.name;
    form.description = data.description; 
    form.status = data.status;
    showModal.value = true;
}


const handlerEdit = async () => {
    try {
        let category = service.ToModel(form); 
        category = await service.update(category.id, category)
        const index = categories.value.findIndex(c => c.id === category.id)
        categories.value[index] = category;
        toast.success('Category updated successfully');
        showModal.value = false;
        form.reset();
    } catch (error) {
        toast.error('Error updating category');
        console.log(error);
    }
    
}

const handlerDelete = async (category) => {
    try {
        await service.delete(category.id)
        categories.value = categories.value.filter(c => c.id !== category.id)
        toast.success('Category deleted successfully');
    } catch (error) {
        toast.error('Error deleting category');
    }
}


const handlerSelectedButton = () => {
    console.log(selectionOption.value)
}

const handlerPost = async () => {
    try {
        let category = service.ToModel(form)
        category =  await service.create(category)
        categories.value.push(category)
        toast.success('Category created successfully');  
    } catch (error) {
        toast.error('Error creating category');
    }
}

const handlerSubmit = async () => { 
    loading.value.button = true;
    if(form.id > 0 ) {  
        await handlerEdit();
    }
    else { 
       await handlerPost(); 
    }
    showModal.value = false;
    form.reset();
    loading.value.button = false;
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

                        <Tag severity="info" :value="`${categories.length} Count`" rounded>
                        </Tag>

                    </div>

                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">Lorem ipsum dolor sit, amet consectetur
                        adipisicing
                        elit.</p>
                </div>

                <div class="flex items-center mt-4 gap-x-3">
                    <Button label="Export" icon="pi pi-cloud-upload" severity="contrast"
                        outlined="">
                    </Button>

                    <Button label="Add Category" icon="pi pi-plus-circle" @click="handlerSwitchModal">
                    </Button>
                </div>
            </div>
            <div class="flex flex-col ">
                <DataTable :value="categories" row-hover class="!rounded-l-3xl !text-blue-800">

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
                            <ToggleSwitch v-model="data.status" v-on:change="handlerSwitchStatus(data)"></ToggleSwitch>
                        </template>
                    </Column>

                    <Column header="Actions" header-class="!flex !justify-center">
                        <template #body="{ data }">
                            <div class="flex justify-center space-x-3">
                                <Button @click="onSelecctionCategory(data)" icon="pi pi-pencil" rounded outlined aria-label="Edit">
                                </Button>
                                <Button @click="handlerDelete(data)" icon="pi pi-trash" severity="danger" rounded outlined aria-label="Delete">
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

                    <form @submit.prevent="handlerSubmit">
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
                                <Button label="Save" type="submit" :loading="loading.button" icon="pi pi-save"></Button>
                            </div>
                        </div>
                    </form>
                </div>
            </Modal>
        </div>
    </app-layout>
</template>