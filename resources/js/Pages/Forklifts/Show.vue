<template>
    <Head :title="forklift.model"/>

    <Main>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="mb-8 flex flex-row items-center justify-between">
                    <h2 class="text-4xl" v-text="forklift.type"></h2>
                    <div class="flex space-x-4">
                        <button
                            @click="deleteForklift()"
                            class="rounded-md bg-red-300 px-6 py-2 text-red-800 shadow duration-150 ease-in-out hover:shadow-md"
                        >
                            Eyða
                        </button>

                        <button
                            @click="showUpdateForm = !showUpdateForm"
                            class="rounded-md bg-green-300 px-6 py-2 text-green-800 shadow duration-150 ease-in-out hover:shadow-md"
                        >
                            Uppfæra
                        </button>
                    </div>
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
                        {{ forklift.next_inspection }}
                    </p>
                    <p>
                        <span class="font-bold uppercase">Staðsettur:</span>
                        {{ forklift.location }}
                    </p>
                    <p>
                        <span class="font-bold uppercase">Auka númer:</span>
                        {{ forklift.extra_number }}
                    </p>
                    <p>
                        <span class="font-bold uppercase">Reikning staða:</span>
                        {{ forklift.bill ? 'Greitt' : 'Ekki greitt' }}
                    </p>
                </div>

                <div
                    class="mt-12 mb-6 flex flex-row items-center justify-between space-x-4"
                >
                    <h2 class="text-2xl font-bold">Þjónustusaga</h2>
                    <button
                        class="rounded-md bg-blue-200 text-blue-900 px-6 py-2 text-green-800 shadow duration-150 ease-in-out hover:shadow-md"
                        @click="showServiceForm = !showServiceForm"
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
                        <th class="px-6 py-4 text-left text-sm">
                            Athugasemnd
                        </th>
                        <th class="px-6 py-4 text-left text-sm">
                            Klárað
                        </th>
                        <th class="px-6 py-4 text-left text-sm"></th>
                    </tr>
                    </thead>
                    <tbody class="bg-white">
                    <tr v-for="service in forklift.services">
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
                        <td
                            class="px-6 py-4 text-left"
                            v-text="service.done ? 'Já' : 'Nei'"
                        ></td>
                        <td class="text-center">
                            <button class="w-4 h-auto hover:text-green-600 duration-150 ease-in-out"
                                    @click="completeService(service.id)">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                     class="w-full h-full fill-current">
                                    <!-- Font Awesome Pro 5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) -->
                                    <path
                                        d="M413.505 91.951L133.49 371.966l-98.995-98.995c-4.686-4.686-12.284-4.686-16.971 0L6.211 284.284c-4.686 4.686-4.686 12.284 0 16.971l118.794 118.794c4.686 4.686 12.284 4.686 16.971 0l299.813-299.813c4.686-4.686 4.686-12.284 0-16.971l-11.314-11.314c-4.686-4.686-12.284-4.686-16.97 0z"/>
                                </svg>
                            </button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="mt-12 mb-6 flex flex-row items-center justify-between space-x-4"
                >
                    <h2 class="text-2xl font-bold">Mastur / Ámoksturtæki</h2>
                    <button
                        class="rounded-md bg-blue-200 text-blue-900 px-6 py-2 text-green-800 shadow duration-150 ease-in-out hover:shadow-md"
                        @click="showEquipmentForm = !showEquipmentForm"
                    >
                        Bæta við mastri/tæki
                    </button>
                </div>

                <table class="w-full shadow-md">
                    <thead class="bg-neutral-100">
                    <tr>
                        <th class="px-6 py-4 text-sm">Titill</th>
                        <th class="px-6 py-4 text-sm">Týpa</th>
                        <th class="px-6 py-4 text-sm">Serial</th>
                        <th class="px-6 py-4 text-sm"></th>
                    </tr>
                    </thead>
                    <tbody class="bg-white">
                    <tr class="" v-for="equipment in forklift.equipments">
                        <td
                            class="px-6 py-4 text-center"
                            v-text="equipment.title"
                        ></td>
                        <td
                            class="px-6 py-4 text-center"
                            v-text="equipment.type"
                        ></td>
                        <td
                            class="px-6 py-4 text-center"
                            v-text="equipment.serial"
                        ></td>
                        <td class="text-center">
                            <button class="w-4 h-auto hover:text-red-600 duration-150 ease-in-out"
                                    @click="removeEquipment(equipment.id)">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                     class="w-full h-full fill-current">
                                    <!-- Font Awesome Pro 5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) -->
                                    <path
                                        d="M296 432h16a8 8 0 0 0 8-8V152a8 8 0 0 0-8-8h-16a8 8 0 0 0-8 8v272a8 8 0 0 0 8 8zm-160 0h16a8 8 0 0 0 8-8V152a8 8 0 0 0-8-8h-16a8 8 0 0 0-8 8v272a8 8 0 0 0 8 8zM440 64H336l-33.6-44.8A48 48 0 0 0 264 0h-80a48 48 0 0 0-38.4 19.2L112 64H8a8 8 0 0 0-8 8v16a8 8 0 0 0 8 8h24v368a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V96h24a8 8 0 0 0 8-8V72a8 8 0 0 0-8-8zM171.2 38.4A16.1 16.1 0 0 1 184 32h80a16.1 16.1 0 0 1 12.8 6.4L296 64H152zM384 464a16 16 0 0 1-16 16H80a16 16 0 0 1-16-16V96h320zm-168-32h16a8 8 0 0 0 8-8V152a8 8 0 0 0-8-8h-16a8 8 0 0 0-8 8v272a8 8 0 0 0 8 8z"/>
                                </svg>
                            </button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="fixed inset-0 z-20 h-screen w-full" id="overlay" v-if="showUpdateForm">
                <form
                    @submit.prevent="submitUpdateForm"
                    class="absolute z-30 w-2/6 rounded-md bg-white p-6 space-y-6"
                >
                    <h3 class="text-xl">Uppfæra lyftara</h3>

                    <div class="flex flex-col space-y-2">
                        <label for="model" class="text-sm uppercase font-bold text-neutral-500">Gerð</label>
                        <input
                            class="rounded p-2 leading-tight bg-transparent text-neutral-400 border-2 border-neutral-400 focus:border-blue-500 outline-none"
                            id="model"
                            disabled
                            v-model="form.model"
                        />
                    </div>

                    <div class="flex flex-col space-y-2">
                        <label for="location" class="text-sm uppercase font-bold text-neutral-500">Staðsettur</label>
                        <select
                            class="rounded p-2 leading-tight bg-transparent text-neutral-900 border-2 border-neutral-400 focus:border-blue-500 outline-none"
                            id="location"
                            v-model="form.location"
                        >
                            <option value="Salthús">Salthús</option>
                            <option value="Frystihús">Frystihús</option>
                            <option value="Vogar">Vogar</option>
                            <option value="Ekki vitað">Ekki vitað</option>
                        </select>
                    </div>
                    <div class="flex flex-col space-y-2">
                        <label for="extra-number"
                               class="text-sm uppercase font-bold text-neutral-500">Auka númer</label>
                        <input
                            class="rounded p-2 leading-tight bg-transparent text-neutral-900 border-2 border-neutral-400 focus:border-blue-500 outline-none"
                            id="extra-number"
                            v-model="form.extra_number"
                        />
                    </div>
                    <div class="flex flex-col space-y-2">
                        <label for="owner"
                               class="text-sm uppercase font-bold text-neutral-500">Eigandi</label>
                        <input
                            class="rounded p-2 leading-tight bg-transparent text-neutral-900 border-2 border-neutral-400 focus:border-blue-500 outline-none"
                            id="owner"
                            v-model="form.owner"
                        />
                    </div>
                    <div class="flex flex-col space-y-2">
                        <label for="next-inspection"
                               class="text-sm uppercase font-bold text-neutral-500">Næsta skoðun</label>
                        <input
                            class="rounded p-2 leading-tight bg-transparent text-neutral-900 border-2 border-neutral-400 focus:border-blue-500 outline-none"
                            id="next-inspection"
                            v-model="form.next_inspection"
                        />
                    </div>
                    <div class="flex flex-col space-y-2">
                        <label for="bill" class="text-sm uppercase font-bold text-neutral-500">Reikningur</label>
                        <select
                            class="rounded p-2 leading-tight bg-transparent text-neutral-900 border-2 border-neutral-400 focus:border-blue-500 outline-none"
                            id="bill"
                            v-model="form.bill"
                        >
                            <option value="1">Greitt</option>
                            <option value="0">Ekki greitt</option>
                        </select>
                    </div>
                    <div class="flex flex-row space-x-4 justify-end">
                        <button
                            class="font-bold uppercase text-sm text-neutral-500 hover:text-red-600 duration-150 ease-in-out"
                            @click="showUpdateForm = !showUpdateForm">
                            Hætta við
                        </button>
                        <SubmitButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Uppfæra
                        </SubmitButton>
                    </div>
                </form>
            </div>

            <div class="fixed inset-0 z-20 h-screen w-full" id="overlay" v-if="showServiceForm">
                <form
                    @submit.prevent="submitServiceForm"
                    class="absolute z-30 w-2/6 rounded-md bg-white p-6 space-y-6"
                >
                    <h3 class="text-xl">Bæta við þjónustu</h3>

                    <div class="flex flex-col space-y-2">
                        <label for="priority" class="text-sm uppercase font-bold text-neutral-500">Forgangur</label>
                        <select
                            class="rounded p-2 leading-tight bg-transparent text-neutral-900 border-2 border-neutral-400 focus:border-blue-500 outline-none"
                            aria-label="Default select example"
                            id="priority"
                            v-model="serviceForm.priority"
                        >
                            <option value="Lítil">Lítil</option>
                            <option value="Miðlungs">Miðlungs</option>
                            <option value="Mikill">Mikill</option>
                        </select>
                    </div>
                    <div class="flex flex-col space-y-2">
                        <label for="type" class="text-sm uppercase font-bold text-neutral-500">Viðgerð</label>
                        <input
                            class="rounded p-2 leading-tight bg-transparent text-neutral-900 border-2 border-neutral-400 focus:border-blue-500 outline-none"
                            id="type"
                            v-model="serviceForm.type"
                        />
                    </div>
                    <div class="flex flex-col space-y-2">
                        <label for="description"
                               class="text-sm uppercase font-bold text-neutral-500">Athugasemnd</label>
                        <textarea
                            class="rounded p-2 leading-tight bg-transparent text-neutral-900 border-2 resize-none border-neutral-400 focus:border-blue-500 outline-none"
                            rows="3"
                            id="description"
                            v-model="serviceForm.description"
                        />
                    </div>
                    <div class="col-span-1">
                        <div class="block mt-4">
                            <label class="flex items-center">
                                <input name="done" type="checkbox" :true-value="true" :false-value="false"
                                       v-model="serviceForm.done"
                                       class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300">
                                <span class="ml-2 text-sm text-gray-600 font-semibold">Þetta er klárað</span>
                            </label>
                        </div>
                    </div>

                    <div class="flex flex-row space-x-4 justify-end">
                        <button
                            class="font-bold uppercase text-sm text-neutral-500 hover:text-red-600 duration-150 ease-in-out"
                            @click="showServiceForm = !showServiceForm">
                            Hætta við
                        </button>
                        <SubmitButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Bæta við
                        </SubmitButton>
                    </div>
                </form>
            </div>

            <div class="fixed inset-0 z-20 h-screen w-full" id="overlay" v-if="showEquipmentForm">
                <form
                    @submit.prevent="submitEquipmentForm"
                    class="absolute z-30 w-2/6 rounded-md bg-white p-6 space-y-6"
                >
                    <h3 class="text-xl">Bæta við tæki</h3>

                    <div class="flex flex-col space-y-2">
                        <label for="title" class="text-sm uppercase font-bold text-neutral-500">Tæki</label>
                        <select
                            class="rounded p-2 leading-tight bg-transparent text-neutral-900 border-2 border-neutral-400 focus:border-blue-500 outline-none"
                            aria-label="Default select example"
                            id="title"
                            v-model="equipmentForm.title"
                        >
                            <option v-for="equipment in equipments" :value="equipment.title"
                                    @click="setEquipmentForm(equipment)">{{ equipment.title + ' - ' + equipment.type }}
                            </option>
                        </select>
                    </div>
                    <div class="flex flex-col space-y-2">
                        <label for="type" class="text-sm uppercase font-bold text-neutral-500">Týpa</label>
                        <input
                            class="rounded p-2 leading-tight bg-transparent text-neutral-400 border-2 border-neutral-400 focus:border-blue-500 outline-none"
                            id="type"
                            disabled
                            v-model="equipmentForm.type"
                        />
                    </div>
                    <div class="flex flex-col space-y-2">
                        <label for="serial" class="text-sm uppercase font-bold text-neutral-500">Serial</label>
                        <input
                            class="rounded p-2 leading-tight bg-transparent text-neutral-400 border-2 border-neutral-400 focus:border-blue-500 outline-none"
                            id="serial"
                            disabled
                            v-model="equipmentForm.serial"
                        />
                    </div>

                    <div class="flex flex-row space-x-4 justify-end">
                        <button
                            class="font-bold uppercase text-sm text-neutral-500 hover:text-red-600 duration-150 ease-in-out"
                            @click="showEquipmentForm = !showEquipmentForm">
                            Hætta við
                        </button>
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
import {Head, useForm} from "@inertiajs/inertia-vue3";
import Main from "@/Layouts/Main";
import {ref} from "vue";
import {Inertia} from "@inertiajs/inertia";
import SubmitButton from '@/Components/Button.vue';

const props = defineProps({
    forklift: Object,
    equipments: Array
});

let showServiceForm = ref(false);
let showUpdateForm = ref(false);
let showEquipmentForm = ref(false);

const form = useForm({
    ...props.forklift
});

const serviceForm = useForm({
    forklift: props.forklift.id,
    priority: null,
    type: null,
    description: null,
    done: false,
});

const equipmentForm = useForm({
    forklift: props.forklift.id,
    equipment: null
});

const deleteForklift = () => {
    let answer = confirm(
        "Ertu viss um að þú vilt eyða þessum lyftara? Lyftaranum verður eytt og allri þjónustusögunni hans"
    );

    if (answer) {
        form.delete(route('forklifts.destroy', props.forklift.id));
    }
};

const submitServiceForm = () => {
    serviceForm.post('/saga/bæta', {
        onSuccess: () => {
            serviceForm.reset()
        },
        onFinish: () => (showServiceForm.value = false),
    });
};

const submitUpdateForm = () => {
    form.put('/lyftarar/' + props.forklift.id, {
        onSuccess: () => {
            form.reset()
        },
        onFinish: () => (showUpdateForm.value = false),
    });
};

const submitEquipmentForm = () => {
    equipmentForm.put('/tæki/tengja', {
        onSuccess: () => {
            equipmentForm.reset()
        },
        onFinish: () => (showEquipmentForm.value = false),
    });
};

const setEquipmentForm = (equipment) => {
    equipmentForm.equipment = equipment.id;
    equipmentForm.type = equipment.type;
    equipmentForm.serial = equipment.serial;
};

function removeEquipment(equipment) {
    if (confirm("Ertu viss um að þú fjarlæga þessu tæki?")) {
        Inertia.put(route("equipments.remove"), {
            equipment,
            forklift: props.forklift.id
        });
    }
}

function completeService(id) {
    if (confirm("Er þetta búið?")) {
        Inertia.patch(route("services.update", id), {
            done: true
        });
    }
}
</script>

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
