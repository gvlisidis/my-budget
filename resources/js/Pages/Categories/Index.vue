<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link  } from '@inertiajs/inertia-vue3';
import Pagination from "@/Components/Pagination.vue";

defineProps({
    categories: Object
})
</script>

<template>
    <Head title="Categories" />

    <AuthenticatedLayout>
        <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-md pb-6">
                    <div class="border-b-2 border-gray-400 flex items-center justify-between">
                        <p class="p-6 text-2xl font-semibold">Categories</p>
                        <div class="p-6">
                            <Link :href="route('categories.create')"
                               class="text-base bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-md">Create</Link>
                        </div>
                    </div>
                    <div>
                       <div v-for="category in categories.data" :key="category.id" class="bg-white border-b border-gray-100 flex items-center justify-between hover:bg-gray-100">
                           <p
                               class="w-80 px-6 py-4 font-medium text-gray-900 flex items-center">
                           {{ category.name }}
                           </p>
                           <div class="py-4 px-6 flex items-center space-x-4">
                               <a href="#"
                                  class="font-medium bg-orange-500 hover:bg-orange-600 text-white py-2 px-4 rounded-md">Edit</a>
                                   <a href="#"
                                           class="font-medium bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-md">
                                       Delete
                                   </a>
                           </div>
                       </div>
                        <div class="flex justify-center">
                            <Pagination class="mt-6" :links="categories.meta.links" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
