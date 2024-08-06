<script setup>
import Modal from '@/Components/Modal.vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import { sector, services } from '@/models/Sectors';
import { useForm } from '@inertiajs/vue3';
import { useToast } from 'primevue/usetoast';
import { ref } from 'vue';


defineProps({
    sectors: {
        type: Array,
        required: true
    }
});

const toast = useToast();
const options = ref([
    { label: 'Enable', value: 'Enable' },
    { label: 'Disable', value: 'Disable' }
]);
const selectionOption = ref({ label: 'Disable', value: 'Disable' });
const loading = ref(false);
const loadingButton = ref(false);
const showModal = ref(false);
const formSector = useForm({...sector});
const selectedSector = ref(null);

const handlerEdit = (sector) => {
    showModal.value = true;
    formSector.name = sector.name;
    formSector.description = sector.description;
    formSector.status = sector.status;
    selectedSector.value = sector;
}

const handlerDelete = async (sector) => {
    loading.value = true;
    const result = await services.delete(sector.id);
    console.log(result);
    loading.value = false;
    window.location.reload();
}

const handlerSelectedButton = () => {
    console.log(selectionOption.value)
}

const handlerChangeStatus = async (sector) => {
    loading.value = true;
    const result = await services.updateStatus(sector.id);
    console.log(result);
    loading.value = false;
    window.location.reload();
}

const haddlerSubmit = async () => {
    loadingButton.value = true;
    const sector = {
        name: formSector.name,
        description: formSector.description,
        status: formSector.status
    }
    if(selectedSector.value) {
        sector.id = selectedSector.value.id;
        const result = await services.update(sector);
        console.log(result);
        showModal.value = false;
        selectedSector.value = null;
        formSector.reset();
        loadingButton.value = false;
        window.location.reload();
        return;
    }
    const result = await services.store(sector);
    console.log(result);
    showModal.value = false;
    loadingButton.value = false;
    formSector.reset();
    window.location.reload();
}
</script>

<template>

    <app-layout :title="'Sectors'">
        <Toast />

        <!-- component -->
        <section class="container px-4 mx-auto pt-7 md:pt-10">
            <div class="sm:flex sm:items-center sm:justify-between">
                <div>
                    <div class="flex items-center gap-x-3">
                        <h2 class="text-lg font-medium text-gray-800 dark:text-white">Sectors</h2>

                        <Tag severity="info" :value="`${(parseInt(sectors.values.length) + 1)} Count`" rounded>
                        </Tag>
                    </div>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">Lorem ipsum dolor sit, amet consectetur
                        adipisicing
                        elit.
                    </p>
                </div>
                <div class="flex items-center mt-4 gap-x-3">
                    <Button label="Export" icon="pi pi-cloud-upload" severity="contrast" outlined="">
                    </Button>

                    <Button label="Add Sector" icon="pi pi-plus-circle" @click="showModal = true">
                    </Button>
                </div>
            </div>
            <div class="flex flex-col ">
                <DataTable :value="sectors" row-hover :loading="loading" class="!rounded-l-3xl !text-blue-800">

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
                                 </IconField>
                            </div>
                        </div>
                    </template>

                    <template #empty>
                        Aun no tienes registros de categorias que mostrar
                    </template>
                    <Column header="ID" field="id" sortable ></Column>
                    <Column header="Name" field="name" sortable ></Column>
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
                                <Button @click="handlerEdit(data)" icon="pi pi-pencil" rounded outlined aria-label="Edit">
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
                        <h2 class="font-semibold text-lg uppercase">Sector Form</h2>

                        <Button icon="pi pi-times" outlined severity="secondary" @click="showModal = false">
                        </Button>

                    </div>

                    <form @submit.prevent="haddlerSubmit">
                        <div class="grid gap-4">
                            <label for="nameSector" class="flex flex-col-reverse">
                                <InputText v-model="formSector.name" id="nameSector" placeholder="Name for sector">
                                </InputText>
                                <span class="font-semibold text-gray-600">Name</span>
                            </label>

                            <label for="descriptionSector" class="flex flex-col-reverse">
                                <Textarea v-model="formSector.description" placeholder="Description for sector" :rows="4">
                                </Textarea>
                                <span class="font-semibold text-gray-600">Description</span>
                            </label>

                            <div class="flex justify-between space-x-4 items-center">
                                <ToggleSwitch v-model="formSector.status">
                                </ToggleSwitch>
                                <Button :loading="loadingButton" type="submit" label="Save" icon="pi pi-save">
                                </Button>
                            </div>
                        </div>
                    </form>

                </div>
            </Modal>
        </section>
    </app-layout>
</template>
