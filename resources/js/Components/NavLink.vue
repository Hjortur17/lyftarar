<script setup>
import { computed } from "vue";
import { Link } from "@inertiajs/inertia-vue3";

const props = defineProps(["href", "active"]);

const classes = computed(() =>
    props.active
        ? "px-1 pt-3 font-medium focus:outline-none font-bold transition duration-150 ease-in-out"
        : "px-1 pt-3 font-medium focus:outline-none transition duration-150 ease-in-out"
);
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>
