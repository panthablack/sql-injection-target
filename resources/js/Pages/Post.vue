<script setup>
import PostCard from '@/Components/PostCard.vue'
import AppLayout from '@/Layouts/AppLayout.vue'

const props = defineProps({ post: Object })
</script>

<template>
    <AppLayout title="Posts">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Post
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <PostCard :post="post" />
                </div>
            </div>
        </div>
    </AppLayout>
</template>