<template>
    <Head title="Nýskrá"/>

    <Main>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="mb-8 flex flex-row items-center justify-between">
                    <h2 class="text-4xl">Bæta við notenda</h2>
                </div>

                <form
                    @submit.prevent="submitForm"
                    class="w-3/5 grid grid-cols-1 gap-6">
                    <div class="col-span-1 space-y-2">
                        <label for="title" class="font-bold">Tæki</label>
                        <input
                            class="rounded p-2 leading-tight w-full bg-white text-neutral-400 focus:text-neutral-900 border-2 border-neutral-400 focus:border-blue-500 outline-none ease-in-out duration-75"
                            id="title"
                            v-model="form.title"
                            required autofocus
                        />
                        <small v-if="form.errors.title" class="text-red-600 font-bold">{{ form.errors.title }}</small>
                    </div>

                    <div class="col-span-1 space-y-2">
                        <label for="type" class="font-bold">Týpa</label>
                        <input
                            class="rounded p-2 leading-tight w-full bg-white text-neutral-400 focus:text-neutral-900 border-2 border-neutral-400 focus:border-blue-500 outline-none ease-in-out duration-75"
                            id="type"
                            v-model="form.type"
                            required autofocus
                        />
                        <small v-if="form.errors.type" class="text-red-600 font-bold">{{ form.errors.type }}</small>
                    </div>

                    <div class="col-span-1 space-y-2">
                        <label for="serial" class="font-bold">Seríal númer</label>
                        <input
                            class="rounded p-2 leading-tight w-full bg-white text-neutral-400 focus:text-neutral-900 border-2 border-neutral-400 focus:border-blue-500 outline-none ease-in-out duration-75"
                            id="serial"
                            v-model="form.serial"
                            required autofocus
                        />
                        <small v-if="form.errors.serial" class="text-red-600 font-bold">{{
                                form.errors.serial
                            }}</small>
                    </div>

                    <div class="flex items-center justify-end col-span-1">
                        <SubmitButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Bæta við
                        </SubmitButton>
                    </div>
                </form>
            </div>
        </div>
    </Main>
</template>

<script setup>
import SubmitButton from '@/Components/Button.vue';
import {Head, useForm} from "@inertiajs/inertia-vue3";
import Main from "@/Layouts/Main";

const form = useForm({
    title: null,
    type: null,
    serial: null,
});

const submitForm = () => {
    form.post('/tæki/bæta');
};
</script>
