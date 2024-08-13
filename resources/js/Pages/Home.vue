<template>
    <Head title="PPMT - Pythagoras Progressive Math Test" />
    <Header/>
    <div class="wrapper">
        <div class="container-xxl">
            <TopRank />
            <Exam />

        </div>
    </div>
</template>
<script setup lang="ts">
import Exam from "@/Components/Home/Exam.vue";
import {Head} from "@inertiajs/vue3";
import Header from "@/Components/App/Header.vue";
import TopRank from "@/Components/Home/TopRank.vue";
</script>
