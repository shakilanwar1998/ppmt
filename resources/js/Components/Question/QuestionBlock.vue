<template>
    <div class="question-block">
        <div class="question">
            <h3 class="question-title" v-html="question.question"></h3>

            <QuestionImage v-if="question.image_url" :url=question.image_url />

            <h3  v-if="question.sub_question" class="mb-5 mt-5 question-title" v-html="question.sub_question"></h3>

            <QuestionImage v-if="question.sub_question_image" :url=question.sub_question_image />

            <ul class="list-group mt-5">

                <li class="items-center mb-5" style="padding-bottom: 20px">
                    <input type="radio" id="option-a" name="question" value="A" class="mr-2">
                    <span><label for="option-a" class="mr-4">A</label> <span style="padding-left: 20px">{{ question.option_a }}</span></span>
                </li>

                <li class="items-center mb-5" style="padding-bottom: 20px">
                    <input type="radio" id="option-b" name="question" value="B" class="mr-2">
                    <span><label for="option-b" class="mr-4">B</label> <span style="padding-left: 20px">{{ question.option_b }}</span></span>
                </li>
                <li class="items-center mb-5" style="padding-bottom: 20px">
                    <input type="radio" id="option-c" name="question" value="C" class="mr-2">
                    <span><label for="option-c" class="mr-4">C</label> <span style="padding-left: 20px">{{ question.option_c }}</span></span>
                </li>
                <li class="items-center mb-5" style="padding-bottom: 20px">
                    <input type="radio" id="option-d" name="question" value="D" class="mr-2">
                    <span><label for="option-d" class="mr-4">D</label> <span style="padding-left: 20px">{{ question.option_d }}</span></span>
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
