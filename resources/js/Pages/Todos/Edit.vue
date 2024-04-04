<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import { onMounted } from "vue";
import { initFlowbite } from "flowbite";
import { Inertia } from "@inertiajs/inertia";
//import { router } from '@inertiajs/vue3'

// initialize components based on data attribute selectors
onMounted(() => {
    initFlowbite();
});

const props = defineProps({
    todo: Object,
    image: String
});

const form = useForm({
  name: props.name,
  age: props.age,
  image: null,
})

// function updateTodo() {
//   form.post('/todos')
// }

function updateTodo() {
Inertia.post(`/todos/${props.todo.id}`, {
  _method: 'put',
  name: form.name,
  age: form.age,
  image: form.image
})}


</script>

<template>
    <Head title="Todos" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Todo List
            </h2>
        </template>

        <div class="py-12 bg-stone-800">
            <div class="max-w-lg mx-auto sm:px-6 lg:px-8">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <div
                        class="flex items-center justify-between flex-column md:flex-row flex-wrap space-y-4 md:space-y-0 py-4 bg-white "
                    >
                    <div class="w-full flex justify-end m-2 px-10">
                            <Link
                                :href="route('todos.index')"
                                class="group flex items-center gap-2 px-3 py-1.5 text-sm text-indigo-600 duration-150 bg-indigo-100 rounded-lg hover:bg-indigo-100"
                            >
                                <div
                                    class="inline-flex items-center justify-center w-7 h-7 mr-2 text-white transition-colors duration-150 bg-indigo-700 rounded-lg focus:shadow-outline group-hover:bg-indigo-800"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        class="w-6 h-6"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3"
                                        />
                                    </svg>
                                </div>
                                Back
                            </Link>
                        </div>
                        

                        <!-- form -->

                        <form class="max-w-sm mx-auto" @submit.prevent="updateTodo">
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
                                <div>
                                    <img :src="image" alt="image" class="w-32 h-32 pb-2" />
                                </div>
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
                                Update
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
