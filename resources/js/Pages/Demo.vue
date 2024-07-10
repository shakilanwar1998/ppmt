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
            <div class="question-block">
                <div class="question">
                    <h3 class="question-title">{{ question.question }}</h3>

                    <div class="question-image" v-if="question.image_url">
                        <img :src=question.image_url alt="">
                    </div>

                    <ul class="list-group mt-5">
                        <li class="flex items-center mb-5">
                            <input type="radio" id="option-a" name="question" value="A" class="mr-2">
                            <label for="option-a" class="mr-4">A</label> {{ question.option_a }}
                        </li>
                        <li class="flex items-center mb-5">
                            <input type="radio" id="option-b" name="question" value="B" class="mr-2">
                            <label for="option-b" class="mr-4">B</label> {{ question.option_b }}
                        </li>
                        <li class="flex items-center mb-5">
                            <input type="radio" id="option-c" name="question" value="C" class="mr-2">
                            <label for="option-c" class="mr-4">C</label> {{ question.option_c }}
                        </li>
                        <li class="flex items-center mb-5">
                            <input type="radio" id="option-d" name="question" value="D" class="mr-2">
                            <label for="option-d" class="mr-4">D</label> {{ question.option_d }}
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</template>


<script setup lang="ts">
import {Head, usePage} from "@inertiajs/vue3";

const {question} = usePage().props

</script>
