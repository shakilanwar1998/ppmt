<template>
    <div class="question-block">
        <div class="question">
            <h3 class="question-title" v-html="question.question"></h3>

            <QuestionImage v-if="question.image_url" :url=question.image_url />

            <h3 v-if="question.sub_question" class="mb-5 mt-5" v-html="question.sub_question" style="font-size: 20px;"></h3>

            <QuestionImage v-if="question.sub_question_image" :url=question.sub_question_image />

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
</template>

<script setup>

import QuestionImage from "@/Components/Question/QuestionImage.vue";

defineProps({
    question: {
        type: Object,
    }
});

</script>
