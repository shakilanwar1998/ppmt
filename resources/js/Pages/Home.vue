<template>
    <Head title="PPMT - Pythagoras Progressive Math Test"/>
    <Header/>
    <div class="wrapper">
        <div class="container-xxl">
            <TopRank/>
            <div class="stemp-card">
                <ResultsCount />
                <div class="stamp-card-block">
                    <Exam/>
                </div>

                <Pagination/>
            </div>
        </div>
    </div>

    <Footer/>

</template>
<script setup lang="ts">
import Exam from "@/Components/Home/Exam.vue";
import {Head} from "@inertiajs/vue3";
import Header from "@/Components/App/Header.vue";
import TopRank from "@/Components/Home/TopRank.vue";
import ResultsCount from "@/Components/Exam/ResultsCount.vue";
import Pagination from "@/Components/App/Pagination.vue";
import Footer from "@/Components/App/Footer.vue";
</script>
