<script setup>
import PostCard from '@/Components/PostCard.vue'
import AppLayout from '@/Layouts/AppLayout.vue'

const props = defineProps({ posts: Array })
</script>

<template>
    <AppLayout title="Posts">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Posts
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <ul>
                        <li v-for="post in props.posts">
                            <PostCard :post="post" />
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
