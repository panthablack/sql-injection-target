<template>
    <div class="createPostFormContainer p-8">
        <form
            action="/posts/store"
            method="POST"
            @submit.prevent="onSubmit"
        >
            <div class="inputGroupContainer mb-4 flex gap-4 w-full">
                <div class="flex-grow">
                    <InputLabel
                        for="title"
                        value="Title"
                    />
                    <TextInput
                        id="title"
                        v-model="form.title"
                        type="text"
                        class="mt-1 block w-full"
                        required
                        autofocus
                    />
                    <InputError
                        class="mt-2"
                        :message="form.errors.title"
                    />
                </div>
                <div class="flex-grow">
                    <InputLabel
                        for="body"
                        value="Body"
                    />
                    <TextInput
                        id="body"
                        v-model="form.body"
                        type="text"
                        class="mt-1 block w-full"
                        required
                        autofocus
                    />
                    <InputError
                        class="mt-2"
                        :message="form.errors.body"
                    />
                </div>

            </div>
            <div class="text-right">
                <PrimaryButton type="submit">Submit</PrimaryButton>
            </div>
        </form>
    </div>
</template>

<script setup lang="ts">
import InputError from '@/Components/InputError.vue'
import InputLabel from '@/Components/InputLabel.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import TextInput from '@/Components/TextInput.vue'
import { router, useForm, usePage } from '@inertiajs/vue3'

const form = useForm({
    title: '',
    body: '',
})

const onSubmit = () => {

    const page = usePage()

    router.post('/posts/store', {
        _token: (page.props.csrf_token) as string || '',
        title: form.title,
        body: form.body,
    })
}
</script>

<style scoped lang="css">
/* ... */
</style>
