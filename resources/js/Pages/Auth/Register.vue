<script setup>
import SubmitButton from '@/Components/Button.vue';
import Main from "@/Layouts/Main";
import {Head, useForm} from '@inertiajs/inertia-vue3';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    reset_password: false,
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <Head title="Nýskrá"/>

    <Main>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="mb-8 flex flex-row items-center justify-between">
                    <h2 class="text-4xl">Bæta við notenda</h2>
                </div>

                <form
                    @submit.prevent="submit"
                    class="w-3/5 grid grid-cols-1 gap-6">
                    <div class="col-span-1 space-y-2">
                        <label for="name" class="font-bold">Nafn</label>
                        <input
                            class="rounded p-2 leading-tight w-full bg-white text-neutral-400 focus:text-neutral-900 border-2 border-neutral-400 focus:border-blue-500 outline-none ease-in-out duration-75"
                            id="name"
                            v-model="form.name"
                            required autofocus
                        />
                        <small v-if="form.errors.name" class="text-red-600 font-bold">{{ form.errors.name }}</small>
                    </div>

                    <div class="col-span-1 space-y-2">
                        <label for="email" class="font-bold">Netfang</label>
                        <input
                            class="rounded p-2 leading-tight w-full bg-white text-neutral-400 focus:text-neutral-900 border-2 border-neutral-400 focus:border-blue-500 outline-none ease-in-out duration-75"
                            type="email"
                            id="email"
                            v-model="form.email"
                            required autofocus
                        />
                        <small v-if="form.errors.email" class="text-red-600 font-bold">{{ form.errors.email }}</small>
                    </div>

                    <div class="col-span-1 space-y-2">
                        <label for="role" class="font-bold">Staða</label>
                        <select
                            class="rounded p-2 leading-tight w-full bg-white text-neutral-400 focus:text-neutral-900 border-2 border-neutral-400 focus:border-blue-500 outline-none ease-in-out duration-75"
                            id="role"
                            v-model="form.role"
                        >
                            <option value="Admin">Admin</option>
                            <option value="Verkstjóri">Verkstjóri</option>
                            <option value="Notandi">Notandi</option>
                        </select>
                        <small v-if="form.errors.password" class="text-red-600 font-bold">{{
                                form.errors.password
                            }}</small>
                    </div>

                    <div class="col-span-1 space-y-2">
                        <label for="password" class="font-bold">Lykilorð</label>
                        <input
                            class="rounded p-2 leading-tight w-full bg-white text-neutral-400 focus:text-neutral-900 border-2 border-neutral-400 focus:border-blue-500 outline-none ease-in-out duration-75"
                            id="password"
                            type="password"
                            v-model="form.password"
                            required autofocus
                        />
                        <small v-if="form.errors.password" class="text-red-600 font-bold">{{
                                form.errors.password
                            }}</small>
                    </div>

                    <div class="col-span-1 space-y-2">
                        <label for="password_confirmation" class="font-bold">Staðfesta lykilorð</label>
                        <input
                            class="rounded p-2 leading-tight w-full bg-white text-neutral-400 focus:text-neutral-900 border-2 border-neutral-400 focus:border-blue-500 outline-none ease-in-out duration-75"
                            id="password_confirmation"
                            type="password"
                            v-model="form.password_confirmation"
                            required autofocus
                        />
                        <small v-if="form.errors.password_confirmation"
                               class="text-red-600 font-bold">{{ form.errors.password_confirmation }}</small>
                    </div>

<!--                    <div class="col-span-1">-->
<!--                        <div class="block mt-4">-->
<!--                            <label class="flex items-center">-->
<!--                                <input name="reset_password" type="checkbox" v-model="form.reset_password"-->
<!--                                       class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300">-->
<!--                                <span class="ml-2 text-sm text-gray-600 font-semibold">Notandi þarf að endurstilla lykilorðið þegar hann innskráir sig fyrst</span>-->
<!--                            </label>-->
<!--                        </div>-->
<!--                    </div>-->

                    <div class="flex items-center justify-end col-span-1">
                        <SubmitButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Stofna
                        </SubmitButton>
                    </div>
                </form>
            </div>
        </div>
    </Main>
</template>
