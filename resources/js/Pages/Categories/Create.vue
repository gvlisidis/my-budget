<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, useForm} from '@inertiajs/inertia-vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';

const form = useForm({
    name: ''
});

const submit = () => {
    form.post(route('categories.store'), {
        onFinish: () => form.reset('name'),
    });
};

</script>

<template>
    <Head title="Categories" />

    <AuthenticatedLayout>
        <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-md">
                    <div class="bg-white shadow-sm sm:rounded-lg h-52 p-10 ">
                        <form @submit.prevent="submit" class="flex items-center">
                            <div>
                                <InputLabel for="name" value="Name" />
                                <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" required autofocus autocomplete="name" />
                                <InputError class="mt-2" :message="form.errors.name" />
                            </div>
                            <button class="font-medium ml-5 bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md" type="submit">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
