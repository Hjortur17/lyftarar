<template>
    <div class="min-h-screen bg-neutral-50">
        <!-- Page Content -->
        <main class="relative h-full w-full">
            <!-- Page Heading -->
            <header class="flex h-44 items-center bg-blue-500 text-blue-50">
                <Navbar></Navbar>
            </header>

            <slot />
        </main>
    </div>
</template>

<script setup>
import Navbar from "../Components/Navbar";
</script>
