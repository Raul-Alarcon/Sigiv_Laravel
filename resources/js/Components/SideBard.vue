<script setup>
import { ref, defineEmits, defineProps, watch } from 'vue';
import { Menu as IconMenu } from '@element-plus/icons-vue';
import { Link, router } from '@inertiajs/vue3';
import { items } from '@/Utils/SideMenu';

const props = defineProps({
    collapse: Boolean
});


const emit = defineEmits(['update:visible']);

const isCollapse = ref(props.collapse);

watch(() => props.collapse, (collapse) => {
    isCollapse.value = collapse;
});


const Collapse = () => {
    emit('update:collapse', false);
};

const handleOpen = (key, keyPath) => {
    console.log(key, keyPath)
}
const handleClose = (key, keyPath) => {
    console.log(key, keyPath)
}


const click = (param) => {
    console.log(param)
    router.visit(param)
}


</script>
<template>
    <aside class="min-h-screen">
        <el-menu :collapse="isCollapse" class="el-menu-vertical-demo h-full w-72" default-active="1">
            <!-- Iteración de los elementos principales -->
            <template v-for="(item, index) in items" :key="index">
                <!-- Si el elemento tiene subelementos, renderiza un submenú -->
                <el-sub-menu v-if="item.items" :index="item.index">
                    <template #title>
                        <el-icon><icon-menu /></el-icon>
                        <span>{{ item.title }}</span>
                    </template>

                    <!-- Iteración de los submenús -->
                    <template v-for="(subItem, subIndex) in item.items" :key="subIndex">
                        <el-menu-item v-if="!subItem.subItems" :index="subItem.index" @click="click(subItem.link)">
                            <el-icon><icon-menu /></el-icon>
                            <span>{{ subItem.title }}</span>
                        </el-menu-item>

                        <!-- Si el submenú tiene más subelementos, los renderizamos aquí -->
                        <el-sub-menu v-if="subItem.subItems" :index="subItem.index">
                            <template #title>
                                <el-icon><icon-menu /></el-icon>
                                <span>{{ subItem.title }}</span>
                            </template>

                            <!-- Iteración de los sub-submenús -->
                            <el-menu-item v-for="(subSubItem, subSubIndex) in subItem.subItems" :key="subSubIndex"
                                :index="subSubItem.index" @click="click(subSubItem.link)">
                                <el-icon > <icon-menu /></el-icon>
                                <span>{{ subSubItem.title }}</span>
                            </el-menu-item>
                        </el-sub-menu>
                    </template>
                </el-sub-menu>

                <!-- Si el elemento no tiene submenú, renderiza como menú simple -->
                <el-menu-item v-else :index="item.index" @click="click(item.link)">
                    <el-icon><icon-menu /></el-icon>
                    <span>{{ item.title }}</span>
                </el-menu-item>
            </template>
        </el-menu>
    </aside>
</template>
