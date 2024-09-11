<script setup>
import { ref, watch } from 'vue';
import LoadingTemplate from './LoadingTemplate.vue';
import { Edit, Delete } from '@element-plus/icons-vue';
const props = defineProps({
    data: Array,
    model: Object,
    widthColumn: {
        type: String, 
        default: ""
    },
    isManager: {
        type: Boolean,
        default: false
    }, 
    loading: {
        type: Boolean, 
        default: false
    }
})

const list = ref(props.data)  
const modelProps = Object.keys(props.model).map((key) => {
    return {
        prop: key,
        label: key.charAt(0).toUpperCase() + key.slice(1),
        width: '100'
    }
})

const width = props.widthColumn.split('-')

const emits = defineEmits(["onEdit", "onDelete"])

watch(() => props.data, (newData) => {
    list.value = newData
}, { immediate: true })


const onEdit = (row) => {
    emits('onEdit', row)
}

const onDelete = (row) => {
    emits('onDelete', row)
} 
</script>
<template>
    <loading-template :loading="loading">
        <el-table :data="list" style="width: 100%">
            <el-table-column v-for="(column, index) in modelProps" :prop="column.prop" :label="column.label"
                :width="width[index] || column.width" :key="index" :fixed="index === 0 ? 'left' : false">
 
                <template v-if="$slots[column.prop]" #default="{ row }">
                    <slot :name="column.prop" :row="row" />
                </template>
 
                <template v-else #default="{ row }">
                    <span>{{ row[column.prop] }}</span>
                </template>
            </el-table-column>

            <el-table-column v-if="isManager" prop="created_at" label="Date of creation" width="180">
                <template #default="{ row }">
                    <span class="text-nowrap">{{ row.created_at }}</span>
                </template>
            </el-table-column>

            <el-table-column v-if="isManager" prop="updated_at" label="Date of update" width="180">
                <template #default="{ row }">
                    <span class="text-nowrap">{{ row.updated_at }}</span>
                </template>
            </el-table-column>

            <el-table-column fixed="right" label="Actions" min-width="130">
                <template #default="{ row }">
                    <el-button type="primary" v-on:Click="onEdit(row)" :icon="Edit" plain></el-button>
                    <el-button type="danger" v-on:Click="onDelete(row)" :icon="Delete" plain></el-button>
                </template>
            </el-table-column>
        </el-table>
    </loading-template>
</template>