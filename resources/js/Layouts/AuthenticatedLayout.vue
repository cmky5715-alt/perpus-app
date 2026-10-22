<script setup>
import Sidebar from '@/Components/Sidebar.vue';
import { usePage } from '@inertiajs/vue3';

const page = usePage();
</script>

<template>
    <div class="flex min-h-screen">
        <Sidebar />

        <div class="flex-1">
            <header class="flex justify-between bg-white p-4 shadow">
                <span class="font-semibold">Dashboard</span>
                <span>{{ page.props.auth?.user?.name }}</span>
            </header>

            <main class="p-6">
                <slot />
            </main>
        </div>
    </div>
</template>
