<script setup>
import { Head, Link } from "@inertiajs/inertia-vue3";
import Main from "@/Layouts/Main";

const props = defineProps({
    services: Array,
});
</script>

<template>
    <Head title="Þjónustusaga" />

    <Main>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="flex flex-col space-y-8">
                    <div class="w-full">
                        <h3 class="mb-3">Þjónustusaga</h3>
                        <div class="border-b border-gray-200 shadow">
                            <table class="w-full">
                                <thead class="bg-neutral-100">
                                    <tr>
                                        <th class="px-6 py-4 text-sm">Forgangur</th>
                                        <th class="px-6 py-4 text-sm">Tegund</th>
                                        <th class="px-6 py-4 text-sm">Athugasemd</th>
                                        <th class="px-6 py-4 text-sm">Lyftari</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white">
                                    <tr
                                        class="whitespace-nowrap"
                                        v-for="service in services"
                                    >
                                        <td
                                            class="px-6 py-4 text-center"
                                            v-text="service.priority"
                                        ></td>
                                        <td
                                            class="px-6 py-4 text-center"
                                            v-text="service.type"
                                        ></td>
                                        <td
                                            class="px-6 py-4 text-center"
                                            v-text="service.description"
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
