<script setup>
import {Head, Link} from "@inertiajs/inertia-vue3";
import Main from "@/Layouts/Main";
import {Inertia} from "@inertiajs/inertia";

const props = defineProps({
    users: Array,
});

function destroy(id) {
    if (confirm("Ertu viss um að þú viljir eyða þessum notenda?")) {
        Inertia.delete(route("users.destroy", id));
    }
}
</script>

<template>
    <Head title="Notendur"/>

    <Main>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="mb-4 flex justify-end">
                    <button
                        class="rounded-md bg-green-200 text-green-900 px-6 py-2 shadow duration-150 ease-in-out hover:shadow-md"
                        @click="$inertia.visit(route('register'))"
                    >
                        Bæta við notenda
                    </button>
                </div>

                <div class="flex flex-col space-y-8">
                    <div class="w-full">
                        <h3 class="mb-3">Notendur</h3>
                        <div class="border-b border-gray-200 shadow">
                            <table class="w-full">
                                <thead class="bg-neutral-100">
                                <tr>
                                    <th class="px-6 py-4 text-sm">Nafn</th>
                                    <th class="px-6 py-4 text-sm">Netfang</th>
                                    <th class="px-6 py-4 text-sm">Staða</th>
                                    <th class="px-6 py-4 text-sm">Notandi síðan</th>
                                    <th class="px-6 py-4 text-sm"></th>
                                </tr>
                                </thead>
                                <tbody class="bg-white">
                                <tr
                                    class="whitespace-nowrap items-center"
                                    v-for="user in users"
                                >
                                    <td
                                        class="px-6 py-4 text-center"
                                        v-text="user.name"
                                    ></td>
                                    <td
                                        class="px-6 py-4 text-center"
                                        v-text="user.email"
                                    ></td>
                                    <td
                                        class="px-6 py-4 text-center"
                                        v-text="user.role"
                                    ></td>
                                    <td
                                        class="px-6 py-4 text-center"
                                        v-text="new Date(
                                            user.created_at
                                        ).toLocaleDateString('en-GB')"
                                    ></td>
                                    <td class="text-center">
                                        <button class="w-4 h-auto hover:text-red-600 duration-150 ease-in-out" v-if="$page.props.auth.user.id !== user.id" @click="destroy(user.id)">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                                 class="w-full h-full fill-current">
                                                <!-- Font Awesome Pro 5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) -->
                                                <path
                                                    d="M296 432h16a8 8 0 0 0 8-8V152a8 8 0 0 0-8-8h-16a8 8 0 0 0-8 8v272a8 8 0 0 0 8 8zm-160 0h16a8 8 0 0 0 8-8V152a8 8 0 0 0-8-8h-16a8 8 0 0 0-8 8v272a8 8 0 0 0 8 8zM440 64H336l-33.6-44.8A48 48 0 0 0 264 0h-80a48 48 0 0 0-38.4 19.2L112 64H8a8 8 0 0 0-8 8v16a8 8 0 0 0 8 8h24v368a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V96h24a8 8 0 0 0 8-8V72a8 8 0 0 0-8-8zM171.2 38.4A16.1 16.1 0 0 1 184 32h80a16.1 16.1 0 0 1 12.8 6.4L296 64H152zM384 464a16 16 0 0 1-16 16H80a16 16 0 0 1-16-16V96h320zm-168-32h16a8 8 0 0 0 8-8V152a8 8 0 0 0-8-8h-16a8 8 0 0 0-8 8v272a8 8 0 0 0 8 8z"/>
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </Main>
</template>
