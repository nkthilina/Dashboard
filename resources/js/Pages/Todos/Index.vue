<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
import { onMounted } from "vue";
import { initFlowbite } from "flowbite";

// initialize components based on data attribute selectors
onMounted(() => {
    initFlowbite();
});

const props = defineProps({
    todos: Array
});

// console.log(props.todos);
</script>

<template>
    <Head title="Todos" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Todo List
            </h2>
        </template>

        <!-- table -->
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <div
                        class="flex items-center justify-between flex-column md:flex-row flex-wrap space-y-4 md:space-y-0 py-4 bg-white dark:bg-gray-400"
                    >
                        <div class="w-full flex justify-end m-2 px-10">
                            <!-- <button
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                            >
                                <a :href="route('todos.create')">Add</a>
                            </button> -->
                            <a
                                :href="route('todos.create')"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                >Add</a
                            >
                        </div>
                    </div>
                    <table
                        class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"
                    >
                        <thead
                            class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-200 dark:text-gray-400"
                        >
                            <tr>
                                <th scope="col" class="p-4"></th>
                                <th scope="col" class="px-6 py-3">Name</th>
                                <th scope="col" class="px-6 py-3">Image</th>
                                <th scope="col" class="px-6 py-3">Age</th>
                                <th scope="col" class="px-6 py-3">Status</th>
                                <th scope="col" class="px-6 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="todo in todos"
                                :key="todo.id"
                                class="bg-white border-b dark:bg-gray-500 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
                            >
                                <td class="w-4 p-4"></td>
                                <th
                                    scope="row"
                                    class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white"
                                >
                                    <div class="">
                                        <div class="text-base font-semibold">
                                            {{ todo.name }}
                                        </div>
                                    </div>
                                </th>
                                <td class="px-6 py-4">
                                    <img
                                        :src="todo.image"
                                        class="w-10 h-10 rounded"
                                    />
                                </td>
                                <td class="px-6 py-4">{{ todo.age }}</td>
                                <td class="px-6 py-4">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800"
                                        >Active</span
                                    >
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-slate-800"
                                        >Inactive</span
                                    >
                                </td>
                                <td class="px-6 py-4 flex space-x-4">
                                    <!-- Modal toggle -->
                                    <Link
                                        :href="`/todos/${todo.id}/edit`"
                                        type="button"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                                        >Edit user</Link
                                    >
                                    <Link
                                        :href="`/todos/${todo.id}/edit`"
                                        method="delete"
                                        as="button"
                                        type="button"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                                        >Delete user</Link
                                    >
                                    <a
                                        href="#"
                                        type="button"
                                        data-modal-target="editUserModal"
                                        data-modal-show="editUserModal"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                                        >Delete user</a
                                    >
                                    <button @click="deleteTodo(todo.id)">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- Edit user modal -->
                    <div
                        id="editUserModal"
                        tabindex="-1"
                        aria-hidden="true"
                        class="fixed top-0 left-0 right-0 z-50 items-center justify-center hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full"
                    >
                        <div class="relative w-full max-w-2xl max-h-full">
                            <!-- Modal content -->
                            <form
                                class="relative bg-white rounded-lg shadow dark:bg-gray-700"
                            >
                                <!-- Modal header -->
                                <div
                                    class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600"
                                >
                                    <h3
                                        class="text-xl font-semibold text-gray-900 dark:text-white"
                                    >
                                        Edit user
                                    </h3>
                                    <button
                                        type="button"
                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-hide="editUserModal"
                                    >
                                        <svg
                                            class="w-3 h-3"
                                            aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 14 14"
                                        >
                                            <path
                                                stroke="currentColor"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"
                                            />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <div class="p-6 space-y-6">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-3">
                                            <label
                                                for="first-name"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                                >First Name</label
                                            >
                                            <input
                                                type="text"
                                                name="first-name"
                                                id="first-name"
                                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Bonnie"
                                                required=""
                                            />
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <label
                                                for="last-name"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                                >Last Name</label
                                            >
                                            <input
                                                type="text"
                                                name="last-name"
                                                id="last-name"
                                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Green"
                                                required=""
                                            />
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <label
                                                for="email"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                                >Email</label
                                            >
                                            <input
                                                type="email"
                                                name="email"
                                                id="email"
                                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="example@company.com"
                                                required=""
                                            />
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <label
                                                for="phone-number"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                                >Phone Number</label
                                            >
                                            <input
                                                type="number"
                                                name="phone-number"
                                                id="phone-number"
                                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="e.g. +(12)3456 789"
                                                required=""
                                            />
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <label
                                                for="department"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                                >Department</label
                                            >
                                            <input
                                                type="text"
                                                name="department"
                                                id="department"
                                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Development"
                                                required=""
                                            />
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <label
                                                for="company"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                                >Company</label
                                            >
                                            <input
                                                type="number"
                                                name="company"
                                                id="company"
                                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="123456"
                                                required=""
                                            />
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <label
                                                for="current-password"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                                >Current Password</label
                                            >
                                            <input
                                                type="password"
                                                name="current-password"
                                                id="current-password"
                                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="••••••••"
                                                required=""
                                            />
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <label
                                                for="new-password"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                                >New Password</label
                                            >
                                            <input
                                                type="password"
                                                name="new-password"
                                                id="new-password"
                                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="••••••••"
                                                required=""
                                            />
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal footer -->
                                <div
                                    class="flex items-center p-6 space-x-3 rtl:space-x-reverse border-t border-gray-200 rounded-b dark:border-gray-600"
                                >
                                    <button
                                        type="submit"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                    >
                                        Save all
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- end Edit user modal -->
                </div>
            </div>
        </div>
        <!-- end table -->
    </AuthenticatedLayout>
</template>
