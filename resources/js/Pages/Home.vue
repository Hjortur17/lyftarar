<script setup>
import { Head, Link } from "@inertiajs/inertia-vue3";
import Main from "@/Layouts/Main";

const props = defineProps({
    forkliftsClasses: Array,
});
</script>

<template>
    <Head title="Heim" />

    <Main>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="flex flex-col space-y-8">
                    <div class="w-full" v-for="classes in forkliftsClasses">
                        <h3 class="mb-3">{{ classes.title }}</h3>
                        <div class="border-b border-gray-200 shadow">
                            <table class="w-full">
                                <thead class="bg-neutral-100">
                                    <tr>
                                        <th class="px-6 py-4 text-sm">JL númer</th>
                                        <th class="px-6 py-4 text-sm">Tegund</th>
                                        <th class="px-6 py-4 text-sm">Árgerð</th>
                                        <th class="px-6 py-4 text-sm">Næsta skoðun</th>
                                        <th class="px-6 py-4 text-sm">Staðsettur</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white">
                                    <tr
                                        class="whitespace-nowrap"
                                        v-for="forklift in classes.forklifts"
                                    >
                                        <td class="px-6 py-4 text-center">
                                            <Link
                                                :href="
                                                    '/lyftarar/' + forklift.model
                                                "
                                               class="cursor-pointer duration-150 ease-in-out hover:text-blue-500"
                                                v-text="forklift.model"
                                             ></Link>
                                        </td>
                                        <td
                                            class="px-6 py-4 text-center"
                                            v-text="forklift.type"
                                        ></td>
                                        <td
                                            class="px-6 py-4 text-center"
                                            v-text="forklift.year"
                                        ></td>
                                        <td class="px-6 py-4 text-center">
                                            18/11/22
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            {{ forklift.location == null ? 'N/A' : forklift.location }}
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
