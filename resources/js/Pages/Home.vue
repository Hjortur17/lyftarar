<script setup>
import { Head, Link } from "@inertiajs/inertia-vue3";
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
                <div class="mb-4 flex justify-end">
                    <button
                        class="rounded-md bg-white px-6 py-2 shadow duration-150 ease-in-out hover:shadow-md"
                    >
                        Bæta við lyftara
                    </button>
                </div>

                <div class="flex flex-col">
                    <div class="w-full">
                        <div class="border-b border-gray-200 shadow">
                            <table class="w-full">
                                <thead class="bg-neutral-100">
                                    <tr>
                                        <th class="px-6 py-4 text-sm">Gerð</th>
                                        <th class="px-6 py-4 text-sm">
                                            Tegund
                                        </th>
                                        <th class="px-6 py-4 text-sm">
                                            Árgerð
                                        </th>
                                        <th class="px-6 py-4 text-sm">
                                            Næsta skoðun
                                        </th>
                                        <th class="px-6 py-4 text-sm">
                                            Dísel/Rafmagn
                                        </th>
                                        <th class="px-6 py-4 text-sm">
                                            Staðsettur
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white">
                                    <tr
                                        class="whitespace-nowrap"
                                        v-for="lifts in forklifts"
                                    >
                                        <td class="px-6 py-4 text-center">
                                            <Link
                                                :href="
                                                    '/lyftarar/' + lifts.model
                                                "
                                                class="cursor-pointer duration-150 ease-in-out hover:text-blue-500"
                                                v-text="lifts.model"
                                            ></Link>
                                        </td>
                                        <td
                                            class="px-6 py-4 text-center"
                                            v-text="lifts.type"
                                        ></td>
                                        <td
                                            class="px-6 py-4 text-center"
                                            v-text="lifts.year"
                                        ></td>
                                        <td class="px-6 py-4 text-center">
                                            18/11/22
                                        </td>
                                        <td
                                            class="px-6 py-4 text-center"
                                            v-text="lifts.fuel"
                                        ></td>
                                        <td
                                            class="px-6 py-4 text-center"
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
