<template>
    <h4 class="font-semibold mt-2">Keywords</h4>
    <div class="mt-4 w-60 space-y-4" v-if="keywords !== null">
        <div class="flex justify-between" v-for="keyword in keywords" :key="keyword.id">
            <p>{{ keyword }}</p>

            <button class="ml-8">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                </svg>
            </button>
        </div>
    </div>
    <div class="mt-4 w-60 space-y-4" v-else>
        No keywords found
    </div>
</template>

<script setup>
    const props = defineProps({
        keywords: Object
    })
</script>

<style scoped>

</style>
