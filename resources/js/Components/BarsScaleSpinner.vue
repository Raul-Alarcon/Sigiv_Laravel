<script setup>
import { defineProps } from 'vue';

defineProps({
    width: {
        type: Number,
        default: 35
    },
    height: {
        type: Number,
        default: 35
    },
    color: {
        type: String,
        default: '#000000'
    }
});
</script>

<template>

    <svg :width="width" :height="height" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" >
        <rect x="1" y="6" width="2.8" height="12" fill="var(--el-color-primary)">
            <animate id="spinner_CcmT" begin="0;spinner_IzZB.end-0.1s" attributeName="y" calcMode="spline" dur="0.6s"
                values="6;1;6" keySplines=".36,.61,.3,.98;.36,.61,.3,.98" />
            <animate begin="0;spinner_IzZB.end-0.1s" attributeName="height" calcMode="spline" dur="0.6s"
                values="12;22;12" keySplines=".36,.61,.3,.98;.36,.61,.3,.98" />
        </rect>
        <rect x="5.8" y="6" width="2.8" height="12" fill="var(--el-color-primary)">
            <animate begin="spinner_CcmT.begin+0.1s" attributeName="y" calcMode="spline" dur="0.6s" values="6;1;6"
                keySplines=".36,.61,.3,.98;.36,.61,.3,.98" />
            <animate begin="spinner_CcmT.begin+0.1s" attributeName="height" calcMode="spline" dur="0.6s"
                values="12;22;12" keySplines=".36,.61,.3,.98;.36,.61,.3,.98" />
        </rect>
        <rect x="10.6" y="6" width="2.8" height="12" fill="var(--el-color-primary)">
            <animate begin="spinner_CcmT.begin+0.2s" attributeName="y" calcMode="spline" dur="0.6s" values="6;1;6"
                keySplines=".36,.61,.3,.98;.36,.61,.3,.98" />
            <animate begin="spinner_CcmT.begin+0.2s" attributeName="height" calcMode="spline" dur="0.6s"
                values="12;22;12" keySplines=".36,.61,.3,.98;.36,.61,.3,.98" />
        </rect>
        <rect x="15.4" y="6" width="2.8" height="12" fill="var(--el-color-primary)">
            <animate begin="spinner_CcmT.begin+0.3s" attributeName="y" calcMode="spline" dur="0.6s" values="6;1;6"
                keySplines=".36,.61,.3,.98;.36,.61,.3,.98" />
            <animate begin="spinner_CcmT.begin+0.3s" attributeName="height" calcMode="spline" dur="0.6s"
                values="12;22;12" keySplines=".36,.61,.3,.98;.36,.61,.3,.98" />
        </rect>
        <rect x="20.2" y="6" width="2.8" height="12" fill="var(--el-color-primary)">
            <animate id="spinner_IzZB" begin="spinner_CcmT.begin+0.4s" attributeName="y" calcMode="spline" dur="0.6s"
                values="6;1;6" keySplines=".36,.61,.3,.98;.36,.61,.3,.98" />
            <animate begin="spinner_CcmT.begin+0.4s" attributeName="height" calcMode="spline" dur="0.6s"
                values="12;22;12" keySplines=".36,.61,.3,.98;.36,.61,.3,.98" />
        </rect>
    </svg>
    <!-- 
    <svg :width="width" :height="height" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <rect x="1" y="6" :width="width * 0.12" :height="height * 0.5" :fill="color">
            <animate id="spinner_CcmT" begin="0;spinner_IzZB.end-0.1s" attributeName="y" calcMode="spline" dur="0.6s"
                values="6;1;6" keySplines=".36,.61,.3,.98;.36,.61,.3,.98" />
            <animate begin="0;spinner_IzZB.end-0.1s" attributeName="height" calcMode="spline" dur="0.6s"
                values="12;22;12" keySplines=".36,.61,.3,.98;.36,.61,.3,.98" />
        </rect>
        <rect :x="width * 0.24" y="6" :width="width * 0.12" :height="height * 0.5" :fill="color">
            <animate begin="spinner_CcmT.begin+0.1s" attributeName="y" calcMode="spline" dur="0.6s" values="6;1;6"
                keySplines=".36,.61,.3,.98;.36,.61,.3,.98" />
            <animate begin="spinner_CcmT.begin+0.1s" attributeName="height" calcMode="spline" dur="0.6s"
                values="12;22;12" keySplines=".36,.61,.3,.98;.36,.61,.3,.98" />
        </rect>
        <rect :x="width * 0.44" y="6" :width="width * 0.12" :height="height * 0.5" :fill="color">
            <animate begin="spinner_CcmT.begin+0.2s" attributeName="y" calcMode="spline" dur="0.6s" values="6;1;6"
                keySplines=".36,.61,.3,.98;.36,.61,.3,.98" />
            <animate begin="spinner_CcmT.begin+0.2s" attributeName="height" calcMode="spline" dur="0.6s"
                values="12;22;12" keySplines=".36,.61,.3,.98;.36,.61,.3,.98" />
        </rect>
        <rect :x="width * 0.64" y="6" :width="width * 0.12" :height="height * 0.5" :fill="color">
            <animate begin="spinner_CcmT.begin+0.3s" attributeName="y" calcMode="spline" dur="0.6s" values="6;1;6"
                keySplines=".36,.61,.3,.98;.36,.61,.3,.98" />
            <animate begin="spinner_CcmT.begin+0.3s" attributeName="height" calcMode="spline" dur="0.6s"
                values="12;22;12" keySplines=".36,.61,.3,.98;.36,.61,.3,.98" />
        </rect>
        <rect :x="width * 0.84" y="6" :width="width * 0.12" :height="height * 0.5" :fill="color">
            <animate id="spinner_IzZB" begin="spinner_CcmT.begin+0.4s" attributeName="y" calcMode="spline" dur="0.6s"
                values="6;1;6" keySplines=".36,.61,.3,.98;.36,.61,.3,.98" />
            <animate begin="spinner_CcmT.begin+0.4s" attributeName="height" calcMode="spline" dur="0.6s"
                values="12;22;12" keySplines=".36,.61,.3,.98;.36,.61,.3,.98" />
        </rect>

        <rect :x="width * 0.84" y="6" :width="width * 0.12" :height="height * 0.5" :fill="color">
            <animate id="spinner_IzZB" begin="spinner_CcmT.begin+0.4s" attributeName="y" calcMode="spline" dur="0.6s"
                values="6;1;6" keySplines=".36,.61,.3,.98;.36,.61,.3,.98" />
            <animate begin="spinner_CcmT.begin+0.4s" attributeName="height" calcMode="spline" dur="0.6s"
                values="12;22;12" keySplines=".36,.61,.3,.98;.36,.61,.3,.98" />
        </rect>

        
    </svg> -->
</template>
