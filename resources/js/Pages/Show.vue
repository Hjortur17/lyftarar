<script setup>
import { Head, Link } from "@inertiajs/inertia-vue3";
import Main from "@/Layouts/Main";

const props = defineProps({
    forklift: Object,
});
</script>

<template>
    <Head :title="forklift.model" />
    <Main>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="mb-8 flex flex-row items-center justify-between">
                    <h2 class="text-4xl" v-text="forklift.type"></h2>
                    <button
                        class="rounded-md bg-red-300 px-6 py-2 text-red-800 shadow duration-150 ease-in-out hover:shadow-md"
                    >
                        Taka úr umferð
                    </button>
                </div>
                <div class="grid grid-cols-3 gap-1">
                    <p>
                        <span class="font-bold uppercase">Gerð:</span>
                        {{ forklift.model }}
                    </p>
                    <p>
                        <span class="font-bold uppercase">Serial númer:</span>
                        {{ forklift.serial }}
                    </p>
                    <p>
                        <span class="font-bold uppercase">Eigandi:</span>
                        {{ forklift.owner }}
                    </p>
                    <p>
                        <span class="font-bold uppercase">Dísel/Rafmagn:</span>
                        {{ forklift.fuel }}
                    </p>
                    <p>
                        <span class="font-bold uppercase">Næsta skoðun:</span>
                        18/07/22
                    </p>
                    <p>
                        <span class="font-bold uppercase">Staðsettur:</span>
                        {{ forklift.location }}
                    </p>
                    <p>
                        <span class="font-bold uppercase">Auka númer:</span>
                        000
                    </p>
                    <p>
                        <span class="font-bold uppercase">
                            Mastur/Ámoksturstæki:
                        </span>
                        F3365/2274/1494 - H21523J00180
                    </p>
                    <p>
                        <span class="font-bold uppercase">
                            Reikning staða:
                        </span>
                        X
                    </p>
                </div>

                <div
                    class="mt-12 mb-6 flex flex-row items-center justify-between space-x-4"
                >
                    <h2 class="text-2xl font-bold">Þjónustusaga</h2>
                    <button
                        class="rounded-md bg-white px-6 py-2 shadow duration-150 ease-in-out hover:shadow-md"
                    >
                        Bæta við þjónustu
                    </button>
                </div>

                <table class="w-full shadow-md">
                    <thead class="bg-neutral-100">
                        <tr>
                            <th class="px-6 py-4 text-sm">Dagsetning</th>
                            <th class="px-6 py-4 text-sm">Forgangur</th>
                            <th class="px-6 py-4 text-sm">Viðgerð</th>
                            <th class="w-7/12 px-6 py-4 text-left text-sm">
                                Athugasemnd
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        <tr class="" v-for="service in forklift.services">
                            <td
                                class="px-6 py-4 text-center"
                                v-text="
                                    new Date(
                                        service.created_at
                                    ).toLocaleDateString('en-GB')
                                "
                            ></td>
                            <td
                                class="px-6 py-4 text-center"
                                v-text="service.priority"
                            ></td>
                            <td
                                class="px-6 py-4 text-center"
                                v-text="service.type"
                            ></td>
                            <td
                                class="px-6 py-4 text-left"
                                v-text="service.description"
                            ></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </Main>
</template>

<style scoped></style>
