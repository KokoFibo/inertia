<template>
    <div class="text-center mt-3">
        <Link
            class="me-3 fs"
            href="/"
            :class="{ selected: $page.component == 'Home' }"
            >Home
        </Link>
        <Link
            class="fs"
            href="/customer"
            :class="{ selected: $page.component == 'Index' }"
            >Customer</Link
        >
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/inertia-vue3";
</script>
<style scoped>
.selected {
    color: red;
    font-weight: bold;
}

.fs {
    font-size: 2rem;
}
</style>
