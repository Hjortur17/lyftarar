<template>
    <Head title="Bæta við lyftara"/>

    <Main>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="mb-8 flex flex-row items-center justify-between">
                    <h2 class="text-4xl">Bæta við lyftara</h2>
                </div>

                <form
                    @submit.prevent="submitForm"
                    class="grid grid-cols-1 xl:grid-cols-2 gap-6">
                    <div class="col-span-1 space-y-2">
                        <label for="type" class="font-bold">Gerð</label>
                        <input
                            class="rounded p-2 leading-tight w-full bg-white text-neutral-400 focus:text-neutral-900 border-2 border-neutral-400 focus:border-blue-500 outline-none ease-in-out duration-75"
                            id="type"
                            v-model="form.type"
                        />
                        <small v-if="form.errors.type" class="text-red-600 font-bold">{{ form.errors.type }}</small>
                    </div>

                    <div class="col-span-1 space-y-2">
                        <label for="year" class="font-bold">Árgerð</label>
                        <input
                            class="rounded p-2 leading-tight w-full bg-white text-neutral-400 focus:text-neutral-900 border-2 border-neutral-400 focus:border-blue-500 outline-none ease-in-out duration-75"
                            id="year"
                            v-model="form.year"
                        />
                        <small v-if="form.errors.year" class="text-red-600 font-bold">{{ form.errors.year }}</small>
                    </div>

                    <div class="col-span-1 space-y-2">
                        <label for="model" class="font-bold">JL Númer</label>
                        <div
                            class="relative mb-3 flex w-full flex-wrap items-stretch focus:text-neutral-900"
                        >
                            <span
                                class="absolute z-10 h-full w-8 items-center justify-center rounded bg-transparent py-3 pl-3 text-center leading-tight text-neutral-400 focus:text-neutral-900 -mt-0.5"
                            >
                                JL-
                            </span>
                            <input
                                v-model="form.model"
                                type="text"
                                class="relative w-full rounded p-2 pl-10 leading-tight w-full bg-white text-neutral-400 focus:text-neutral-900 border-2 border-neutral-400 focus:border-blue-500 outline-none ease-in-out duration-75"
                            />
                        </div>
                        <small v-if="form.errors.model" class="text-red-600 font-bold">{{ form.errors.model }}</small>
                    </div>

                    <div class="col-span-1 space-y-2">
                        <label for="serial" class="font-bold">Serial númer</label>
                        <input
                            class="rounded p-2 leading-tight w-full bg-white text-neutral-400 focus:text-neutral-900 border-2 border-neutral-400 focus:border-blue-500 outline-none ease-in-out duration-75"
                            id="serial"
                            v-model="form.serial"
                        />
                        <small v-if="form.errors.serial" class="text-red-600 font-bold">{{ form.errors.serial }}</small>
                    </div>

                    <div class="col-span-1 space-y-2">
                        <label for="fuel" class="font-bold">Rafmagn/Dísel</label>
                        <select
                            class="rounded p-2 leading-tight w-full bg-white text-neutral-400 focus:text-neutral-900 border-2 border-neutral-400 focus:border-blue-500 outline-none ease-in-out duration-75"
                            id="fuel"
                            v-model="form.fuel"
                        >
                            <option value="Rafmagn">Rafmagn</option>
                            <option value="Dísel">Dísel</option>
                        </select>
                        <small v-if="form.errors.fuel" class="text-red-600 font-bold">{{ form.errors.fuel }}</small>
                    </div>

                    <div class="col-span-1 space-y-2">
                        <label for="next_inspection" class="font-bold">Næsta skoðun</label>
                        <input
                            class="rounded p-2 leading-tight w-full bg-white text-neutral-400 focus:text-neutral-900 border-2 border-neutral-400 focus:border-blue-500 outline-none ease-in-out duration-75"
                            id="next_inspection"
                            v-model="form.next_inspection"
                        />
                        <small v-if="form.errors.next_inspection" class="text-red-600 font-bold">{{ form.errors.next_inspection }}</small>
                    </div>

                    <div class="col-span-1 space-y-2">
                        <label for="owner" class="font-bold">Eigandi</label>
                        <input
                            class="rounded p-2 leading-tight w-full bg-white text-neutral-400 focus:text-neutral-900 border-2 border-neutral-400 focus:border-blue-500 outline-none ease-in-out duration-75"
                            id="owner"
                            v-model="form.owner"
                        />
                        <small v-if="form.errors.owner" class="text-red-600 font-bold">{{ form.errors.owner }}</small>
                    </div>

                    <div class="col-span-1 space-y-2">
                        <label for="location" class="font-bold">Staðsetning</label>
                        <select
                            class="rounded p-2 leading-tight w-full bg-white text-neutral-400 focus:text-neutral-900 border-2 border-neutral-400 focus:border-blue-500 outline-none ease-in-out duration-75"
                            id="location"
                            v-model="form.location"
                        >
                            <option value="Salthús">Salthús</option>
                            <option value="Frystihús">Frystihús</option>
                            <option value="Vogar">Vogar</option>
                            <option value="Ekki vitað">Ekki vitað</option>
                        </select>
                        <small v-if="form.errors.location" class="text-red-600 font-bold">{{ form.errors.location }}</small>
                    </div>

                    <div class="col-span-1 space-y-2">
                        <label for="extra_number" class="font-bold">Auka númer</label>
                        <input
                            class="rounded p-2 leading-tight w-full bg-white text-neutral-400 focus:text-neutral-900 border-2 border-neutral-400 focus:border-blue-500 outline-none ease-in-out duration-75"
                            id="extra_number"
                            v-model="form.extra_number"
                        />
                        <small v-if="form.errors.extra_number" class="text-red-600 font-bold">{{ form.errors.extra_number }}</small>
                    </div>

                    <div class="col-span-1 space-y-2">
                        <label for="bill" class="font-bold">Reikningstaða</label>
                        <select
                            class="rounded p-2 leading-tight w-full bg-white text-neutral-400 focus:text-neutral-900 border-2 border-neutral-400 focus:border-blue-500 outline-none ease-in-out duration-75"
                            id="bill"
                            v-model="form.bill"
                        >
                            <option value="1">Greitt</option>
                            <option value="0">Ekki greitt</option>
                        </select>
                        <small v-if="form.errors.bill" class="text-red-600 font-bold">{{ form.errors.bill }}</small>
                    </div>

                    <div class="col-span-1 xl:col-span-2 flex justify-end">
                        <button
                            class="rounded-md bg-green-200 text-green-900 px-6 py-2 text-green-800 shadow duration-150 ease-in-out hover:shadow-md"
                            type="submit"
                            :disabled="form.processing"
                        >
                            Bæta við
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </Main>
</template>

<script setup>
import {Head, useForm} from "@inertiajs/inertia-vue3";
import Main from "@/Layouts/Main";

const form = useForm({
    type: null,
    year: null,
    model: null,
    serial: null,
    fuel: null,
    next_inspection: null,
    owner: 'Þorbjörn',
    location: null,
    extra_number: null,
    bill: null
});

const submitForm = () => {
    form.post('/lyftarar/bæta');
};
</script>
