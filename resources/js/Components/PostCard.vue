<template>
    <div class="postCardContainer p-8">
        <h2 class="mb-4 font-bold text-lg">{{ post.title }}</h2>
        <p>{{ post.body }}</p>
    </div>
</template>

<script setup lang="ts">
const props = defineProps({ post: Object })
</script>

<style scoped lang="css">
/* ... */
</style>
