<script setup>
import CreatePostForm from '@/Components/CreatePostForm.vue'
import AppLayout from '@/Layouts/AppLayout.vue'
</script>

<template>
    <AppLayout title="Create Posts">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create Post
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <CreatePostForm />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
