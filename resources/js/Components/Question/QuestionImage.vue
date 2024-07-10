<template>
    <div class="question-image">
        <img :src=url alt="">
    </div>
</template>

<script setup>
defineProps({
    url: {
        type: String,
    }
});
</script>
