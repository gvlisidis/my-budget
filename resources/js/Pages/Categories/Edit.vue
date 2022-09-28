<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import {onUpdated} from "vue";
import {useForm} from "@inertiajs/inertia-vue3";
import KeywordsList from "@/Components/Keywords/KeywordsList.vue";

const props = defineProps({
    category: Object
})

onUpdated(() => {
    // text content should be the same as current `count.value`
    formAddKeyword.reset('keyword')
})

const formUpdateName = useForm({
    name: props.category.data.name
})

const formAddKeyword = useForm({
    keyword: '',
    category_id: props.category.data.id
})

const update = () => {
    formUpdateName.patch(`/categories/${props.category.data.id}`);
};


const addKeyword = () => {
    formAddKeyword.post(route('keywords.store'),{
        onFinish: () => formAddKeyword.reset('keyword'),
    });
};

</script>


<template>
    <AuthenticatedLayout>
        <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-md">
                    <div class="flex flex-col space-y-6">
                        <div class="flex justify-between items-center border-b-2 border-gray-300">
                            <div class="py-3 px-6">
                                <h3 class="text-xl font-bold">{{ props.category.data.name }}</h3>
                            </div>
                        </div>
                    </div>

                    <div class="sm:px-6 lg:px-8 pb-10">
                        <form @submit.prevent="update" class="flex items-center mt-6">
                            <div class="flex space-x-4 items-center">
                                <InputLabel for="name" value="Name" class="text-lg font-semibold"/>
                                <TextInput id="name" type="text" class="mt-1 block w-full" v-model="formUpdateName.name" required autofocus autocomplete="name" />
                            </div>
                            <button class="font-medium ml-5 bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md" type="submit">Save</button>
                        </form>

                        <div class="mt-6 border-t border-gray-300">
                            <keywords-list :keywords="props.category.data.keywords.keywords"></keywords-list>

                            <form @submit.prevent="addKeyword" class="flex items-center mt-6">
                                <div class="flex space-x-4 items-center">
                                    <InputLabel for="keyword" value="Keyword" class="text-lg font-semibold"/>
                                    <TextInput id="keyword" type="text" class="mt-1 block w-full" v-model="formAddKeyword.keyword" required autofocus autocomplete="keyword" />
                                </div>
                                <button  class="font-medium ml-5 bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md"  type="submit">Add</button>
                            </form>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
