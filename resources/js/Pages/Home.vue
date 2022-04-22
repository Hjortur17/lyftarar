<script setup>
import { Head } from "@inertiajs/inertia-vue3";
import Main from "@/Layouts/Main";

const props = defineProps({
    forklifts: Array,
});
</script>

<template>
    <Head title="Yfirlit" />

    <Main>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="flex flex-col">
                    <div class="w-full">
                        <div class="border-b border-gray-200 shadow">
                            <table class="w-full">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th
                                            class="px-6 py-2 text-sm text-gray-500"
                                        >
                                            Gerð
                                        </th>
                                        <th
                                            class="px-6 py-2 text-sm text-gray-500"
                                        >
                                            Tegund
                                        </th>
                                        <th
                                            class="px-6 py-2 text-sm text-gray-500"
                                        >
                                            Árgerð
                                        </th>
                                        <th
                                            class="px-6 py-2 text-sm text-gray-500"
                                        >
                                            Eigandi
                                        </th>
                                        <th
                                            class="px-6 py-2 text-sm text-gray-500"
                                        >
                                            Dísel/Rafmagn
                                        </th>
                                        <th
                                            class="px-6 py-2 text-sm text-gray-500"
                                        >
                                            Staðsettur
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white">
                                    <tr
                                        class="whitespace-nowrap"
                                        v-for="lifts in forklifts"
                                    >
                                        <td
                                            class="px-6 py-4 text-center text-gray-500"
                                            v-text="lifts.type"
                                        ></td>
                                        <td
                                            class="px-6 py-4 text-center text-gray-500"
                                            v-text="lifts.type"
                                        ></td>
                                        <td
                                            class="px-6 py-4 text-center text-gray-500"
                                            v-text="lifts.model"
                                        ></td>
                                        <td
                                            class="px-6 py-4 text-center text-gray-500"
                                            v-text="lifts.owner"
                                        ></td>
                                        <td
                                            class="px-6 py-4 text-center text-gray-500"
                                            v-text="lifts.fuel"
                                        ></td>
                                        <td
                                            class="px-6 py-4 text-center text-gray-500"
                                            v-text="lifts.location"
                                        ></td>
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
