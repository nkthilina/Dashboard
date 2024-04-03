<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import { onMounted } from "vue";
import { initFlowbite } from "flowbite";

// initialize components based on data attribute selectors
onMounted(() => {
    initFlowbite();
});
const form = useForm({
  name: null,
  age: null,
  image: null,
})

function submit() {
  form.post('/todos')
}
</script>

<template>
    <Head title="Todos" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Todo List
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <div
                        class="flex items-center justify-between flex-column md:flex-row flex-wrap space-y-4 md:space-y-0 py-4 bg-white "
                    >
                        <div class="w-full flex justify-end m-2 px-10">
                            <!-- <button
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                            >
                                <Link :href="route('todos.index')">Back</Link>
                            </button> -->
                            <a
                                :href="route('todos.index')"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                >Back</a
                            >
                        </div>

                        <!-- form -->

                        <form class="max-w-sm mx-auto" @submit.prevent="submit">
                            <div class="mb-5 py-2">
                                <label
                                    for="text"
                                    class="block mb-2 text-sm font-medium text-gray-900"
                                    >Your name</label
                                >
                                <input
                                    v-model="form.name"
                                    type="text"
                                    id="text"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder=""
                                    required
                                />
                            </div>


                            <div class="mb-5 py-2">
                                <label
                                    for="age"
                                    class="block mb-2 text-sm font-medium text-gray-900"
                                    >Your age</label
                                >
                                <input
                                    v-model="form.age"
                                    type="number"
                                    id="age"
                                    name="age"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required
                                />
                            </div>

                            <div class="mb-5 py-2">
                                <label
                                    class="block mb-2 text-sm font-medium text-gray-900"
                                    for="user_avatar"
                                    >Upload file</label
                                >
                                <input
                                    @input="form.image = $event.target.files[0]"
                                    class="p-2.5 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-500 focus:outline-none  dark:border-gray-600 dark:placeholder-gray-400"
                                    aria-describedby="user_avatar_help"
                                    id="image"
                                    name="image"
                                    type="file"
                                />
                            </div>
                            <div class="flex items-start mb-5 p-2">
                                <div class="flex items-center h-5">
                                    <input
                                        id="remember"
                                        type="checkbox"
                                        value=""
                                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300  dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800"
                                        required
                                    />
                                </div>
                                <label
                                    for="remember"
                                    class="ms-2 text-sm font-medium text-gray-900 "
                                    >Remember me</label
                                >
                            </div>
                            <button
                                type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            >
                                Submit
                            </button>
                        </form>

                        <!-- end form -->
                    </div>

                    <!-- Edit user modal -->
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
