<template>
    <nav class="mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between">
            <form class="flex flex-col" @submit.prevent="searchForm">
                <label class="mb-2 text-sm font-bold uppercase">
                    Leita að lyftara
                </label>

                <div
                    class="relative mb-3 flex w-full flex-wrap items-stretch focus:text-neutral-900"
                >
                    <span
                        class="absolute z-10 h-full w-8 items-center justify-center rounded bg-transparent py-3 pl-3 text-center leading-tight text-neutral-400 focus:text-neutral-900"
                    >
                        JL-
                    </span>
                    <input
                        v-model="searchForm.model"
                        type="text"
                        @keydown.enter="submitSearchForm()"
                        placeholder="0000"
                        class="relative w-48 rounded border-0 bg-white px-2 py-3 pl-10 leading-tight text-neutral-400 shadow outline-none focus:text-neutral-900 focus:outline-none"
                    />
                </div>

                <span v-if="$page.props.errors.search" class="text-sm text-red-600">{{ $page.props.errors.search }}</span>
            </form>

            <!-- Navigation Links -->
            <!--            <div class="hidden space-x-8 sm:-my-px sm:flex items-center">-->
            <!--                <BreezeNavLink-->
            <!--                    :href="route('home')"-->
            <!--                    :active="route().current('home')"-->
            <!--                >-->
            <!--                    Heim-->
            <!--                </BreezeNavLink>-->
            <!--            </div>-->

            <div class="hidden sm:ml-6 sm:flex sm:items-center">
                <!-- Settings Dropdown -->
                <div class="relative ml-3">
                    <BreezeDropdown align="right" width="48">
                        <template #trigger>
                            <span class="inline-flex rounded-md">
                                <button
                                    type="button"
                                    class="inline-flex items-center rounded-md border border-transparent bg-white px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out hover:text-gray-700 focus:outline-none"
                                >
                                    {{ $page.props.auth.user.name }}

                                    <svg
                                        class="ml-2 -mr-0.5 h-4 w-4"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20"
                                        fill="currentColor"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd"
                                        />
                                    </svg>
                                </button>
                            </span>
                        </template>

                        <template #content>
                            <BreezeDropdownLink
                                :href="route('logout')"
                                method="post"
                                as="button"
                            >
                                Útskrá
                            </BreezeDropdownLink>
                        </template>
                    </BreezeDropdown>
                </div>
            </div>
        </div>
    </nav>
</template>

<script setup>
import {useForm} from "@inertiajs/inertia-vue3";
import {ref} from "vue";
import BreezeDropdown from "@/Components/Dropdown.vue";
import BreezeDropdownLink from "@/Components/DropdownLink.vue";

const showingNavigationDropdown = ref(false);

const searchForm = useForm({
    model: null
})

const submitSearchForm = () => {
    searchForm
        .transform((data) => ({
            model: 'JL-' + data.model
        }))
        .post('/lyftarar/leita', {
            onSuccess: () => {
                searchForm.reset()
            },
        });
};
</script>
