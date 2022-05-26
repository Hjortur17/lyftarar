<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import Main from "@/Layouts/Main";
import { ref } from "vue";

const props = defineProps({
    forklift: Object
});

const showForm = ref(false);

const deleteForklift = () => {
    let answer = confirm(
        "Ertu viss um að þú vilt eyða þessum lyftara? Lyftaranum verður eytt og allri þjónustusögunni hans"
    );

    console.log(answer);
};

const createServiceForm = useForm({
    priority: "",
    type: "",
    description: ""
});

const submitServiceForm = () => {
    createServiceForm.post(route("login"), {
        onFinish: () => createServiceForm.reset("password")
    });
};
</script>

<template>
    <Head :title="forklift.model" />

    <Main>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="mb-8 flex flex-row items-center justify-between">
                    <h2 class="text-4xl" v-text="forklift.type"></h2>
                    <button
                        @click="deleteForklift()"
                        class="rounded-md bg-red-300 px-6 py-2 text-red-800 shadow duration-150 ease-in-out hover:shadow-md"
                    >
                        Eyða
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
                        class="rounded-md bg-green-200 px-6 py-2 text-green-800 shadow duration-150 ease-in-out hover:shadow-md"
                        @click="showForm"
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

        <div class="absolute inset-0 z-20 h-screen w-full" id="overlay" v-if="showForm">
            <form
                @submit.prevent="submitServiceForm"
                class="absolute z-30 w-2/6 rounded-md bg-white p-6 space-y-6"
            >
                <h3 class="text-xl">Bæta við þjónustu</h3>

                <div class="flex flex-col space-y-2">
                    <label for="priority" class="text-sm uppercase font-bold text-neutral-500">Forgangur</label>
                    <input
                        class="rounded px-1 py-2 leading-tight bg-transparent text-neutral-900 border-2 border-neutral-400 focus:border-blue-500 outline-none"
                        ref="input"
                        id="priority"
                    />
                </div>
                <div class="flex flex-col space-y-2">
                    <label for="type" class="text-sm uppercase font-bold text-neutral-500">Viðgerð</label>
                    <input
                        class="rounded px-1 py-2 leading-tight bg-transparent text-neutral-900 border-2 border-neutral-400 focus:border-blue-500 outline-none"
                        ref="input"
                        id="type"
                    />
                </div>
                <div class="flex flex-col space-y-2">
                    <label for="description" class="text-sm uppercase font-bold text-neutral-500">Athugasemnd</label>
                    <textarea
                        class="rounded px-1 py-2 leading-tight bg-transparent text-neutral-900 border-2 border-neutral-400 focus:border-blue-500 outline-none"
                        id="description"
                        rows="2"
                    />
                </div>
                <div class="flex flex-row space-x-4 justify-end">
                    <button class="font-bold uppercase text-sm text-neutral-500 hover:text-red-600 duration-150 ease-in-out">
                        Hætta við
                    </button>
                    <button class="rounded-md bg-green-300 px-6 py-2 text-green-800 shadow duration-150 ease-in-out hover:shadow-md">
                        Búa til
                    </button>
                </div>
            </form>
        </div>
    </Main>
</template>

<style scoped>
#overlay {
    background-color: rgba(16, 42, 67, 0.6);
}

form {
    left: 50%;
    top: 50%;
    -webkit-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
}
</style>
