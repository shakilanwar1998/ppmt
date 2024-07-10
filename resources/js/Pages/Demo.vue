<template>
    <Head title="Demo Question" />

    <div class="date-timer-block">
        <div class="container-xxl">
            <div class="timer-date-inner">
                <div class="row justify-content-between">
                    <div class="col-6">
                        <div class="date-block">
                            <p class="date-timer-text">Date: <span id="date">13 / 06 / 2024</span></p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="timer-block">
                            <p class="date-timer-text">Timer: <span id="date">13 / 06 / 2024</span></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-title-block">
                <h1 class="main-title text-center">IGCSE PROGRESSIVE MATH TEST</h1>
            </div>

            <QuestionBlock :question=question />

        </div>
    </div>
</template>


<script setup lang="ts">
import {Head, usePage} from "@inertiajs/vue3";
import QuestionBlock from "@/Components/Question/QuestionBlock.vue";

const {question} = usePage().props

</script>
