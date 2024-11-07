<template>
    <div class="postCardContainer p-8">
        <h2 class="mb-4 font-bold text-lg">{{ post.title }}</h2>
        <!-- NOT SAFE -->

        <p v-html="post.body"></p>

        <!-- NOT SAFE -->

        <!-- SAFE -->

        <!-- <p>{{ post.body }}</p> -->

        <!-- SAFE -->

        <!-- This looks like it is safe! <img style="display: none;" src="x" onerror="alert('Gotcha! (Really not safe!)')"></img> -->
    </div>
</template>

<script setup lang="ts">
const props = defineProps({ post: Object })
</script>

<style scoped lang="css">
/* ... */
</style>
