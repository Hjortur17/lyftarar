<template>
    <div class="min-h-screen flex">
        <aside class="w-1/5 h-screen grid grid-rows-3 content-between">
            <img src="/logo.png" alt="Þorbjörn merki" class="w-48 h-auto mx-auto pt-8 cursor-pointer" @click="$inertia.visit('/')">

            <ul class="mx-auto space-y-4">
                <li class="w-full cursor-pointer rounded-lg hover:bg-neutral-100 hover:bg-opacity-60 p-4 ease-in-out duration-150" :class="$page.component === 'Home' ? 'bg-neutral-100 bg-opacity-60 font-bold' : 'px-4 cursor-pointer'" @click="$inertia.visit('/')">Heim</li>
                <li class="w-full cursor-pointer rounded-lg hover:bg-neutral-100 hover:bg-opacity-60 p-4 ease-in-out duration-150" :class="$page.component === 'Forklifts' ? 'bg-neutral-100 bg-opacity-60 font-bold' : 'px-4 cursor-pointer'" @click="$inertia.visit('/lyftarar')">Lyftarar</li>
                <li class="w-full cursor-pointer rounded-lg hover:bg-neutral-100 hover:bg-opacity-60 p-4 ease-in-out duration-150" :class="$page.component === 'Services' ? 'bg-neutral-100 bg-opacity-60 font-bold' : 'px-4 cursor-pointer'" @click="$inertia.visit('/saga')">Þjónustusaga</li>
                <li class="w-full cursor-pointer rounded-lg hover:bg-neutral-100 hover:bg-opacity-60 p-4 ease-in-out duration-150" :class="$page.component === 'Equipments' ? 'bg-neutral-100 bg-opacity-60 font-bold' : 'px-4 cursor-pointer'" @click="$inertia.visit('/tæki')">Mastur/Ámoksturstæki</li>
            </ul>
            <div></div>
        </aside>
        <!-- Page Content -->
        <main class="relative h-full w-full">
            <!-- Page Heading -->
            <header class="flex h-32 items-center">
                <Navbar></Navbar>
            </header>

            <slot />
        </main>
    </div>
</template>

<script setup>
import Navbar from "../Components/Navbar";
import { Link } from "@inertiajs/inertia-vue3";
</script>
