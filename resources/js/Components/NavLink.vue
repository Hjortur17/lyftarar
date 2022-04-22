<script setup>
import { computed } from "vue";
import { Link } from "@inertiajs/inertia-vue3";

const props = defineProps(["href", "active"]);

const classes = computed(() =>
    props.active
        ? "inline-flex items-center px-1 pt-1 font-medium leading-5 focus:outline-none font-bold transition duration-150 ease-in-out"
        : "inline-flex items-center px-1 pt-1 font-medium leading-5 focus:outline-none transition duration-150 ease-in-out"
);
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>
