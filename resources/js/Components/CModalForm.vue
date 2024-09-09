<script setup> 
import Modal from './Modal.vue';
import LoadingTemplate from './LoadingTemplate.vue';
import { CirclePlus } from '@element-plus/icons-vue';

import { ref } from 'vue'; 

const props = defineProps({
    title: String, 
    show: {
        required: true,
        type: Boolean,
        default: false
    },
    width: {
        type: String,
        default: 'md'
    }, 
    rules : {
        required: true, 
        type: Object
    },
    model: {
        required: true, 
        type: Object
    }, 
    loading: {
        type: Boolean, 
        default: false
    }
})

const emits = defineEmits(['close','onSubmit']);
const formRef = ref();

const onClose = (formel) => {
    if(!formel) return;
    formel.resetFields(); 
    emits('close', formel);
}


const handlerSumit = async (formel) => {
    if (!formel) return;
    await formel.validate((valid, fields) => {
        if (valid) { 
            emits('onSubmit', formel);
        }
    });
}

</script>
<template>
    <modal :title="title" :show="show" v-on:close="onClose(formRef)" :maxWidth="width">
        <el-form ref="formRef" :rules="rules" :model="model" label-position="top">
            <loading-template :loading="loading" :isLoading="loading">
                <slot name="form-conntent" :data="model"></slot>
            </loading-template>

            <el-form-item>
                <div class="w-full flex " :class="$slots['form-actions']? 'justify-between': 'justify-end'">
                    <slot name="form-actions" :data="model" :isLoading="loading"></slot>
                    <el-button type="primary" v-on:click="handlerSumit(formRef)" :icon="CirclePlus">Save</el-button>
                </div>
            </el-form-item>
        </el-form>
    </modal>
</template>