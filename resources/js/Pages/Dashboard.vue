<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
import RadioButton from 'primevue/radiobutton';

import { ref } from 'vue';

const ingredient = ref('');

</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <i class="pi pi-check"></i>
                <i class="pi pi-times"></i>
                <span class="pi pi-search"></span>
                <span class="pi pi-user"></span>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="card flex justify-center">
                        <div class="flex flex-wrap gap-4">
                            <div class="flex items-center">
                                <RadioButton v-model="ingredient" inputId="ingredient1" name="pizza" value="Cheese" />
                                <label for="ingredient1" class="ml-2">Cheese</label>
                            </div>
                            <div class="flex items-center">
                                <RadioButton v-model="ingredient" inputId="ingredient2" name="pizza" value="Mushroom" />
                                <label for="ingredient2" class="ml-2">Mushroom</label>
                            </div>
                            <div class="flex items-center">
                                <RadioButton v-model="ingredient" inputId="ingredient3" name="pizza" value="Pepper" />
                                <label for="ingredient3" class="ml-2">Pepper</label>
                            </div>
                            <div class="flex items-center">
                                <RadioButton v-model="ingredient" inputId="ingredient4" name="pizza" value="Onion" />
                                <label for="ingredient4" class="ml-2">Onion</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
