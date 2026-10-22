<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, usePage } from '@inertiajs/vue3';

defineProps({
    books: Object,
});

const page = usePage();
</script>

<template>
    <Head title="Data Buku" />

    <AuthenticatedLayout>
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-2xl font-bold">Data Buku</h1>
            <Link
                href="/books/create"
                class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700"
            >
                + Tambah Buku
            </Link>
        </div>

        <!-- Pesan sukses (muncul setelah buku berhasil disimpan) -->
        <div
            v-if="page.props.flash?.success"
            class="mb-4 p-3 bg-green-100 text-green-800 rounded"
        >
            {{ page.props.flash.success }}
        </div>

        <div class="bg-white rounded shadow overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="px-4 py-3">Kode</th>
                        <th class="px-4 py-3">Judul</th>
                        <th class="px-4 py-3">Pengarang</th>
                        <th class="px-4 py-3">Tahun</th>
                        <th class="px-4 py-3">Stok</th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="book in books.data"
                        :key="book.id"
                        class="border-t"
                    >
                        <td class="px-4 py-3">{{ book.kode_buku }}</td>
                        <td class="px-4 py-3">{{ book.judul }}</td>
                        <td class="px-4 py-3">{{ book.pengarang }}</td>
                        <td class="px-4 py-3">{{ book.tahun }}</td>
                        <td class="px-4 py-3">{{ book.stok }}</td>
                    </tr>
                    <tr v-if="books.data.length === 0">
                        <td colspan="5" class="px-4 py-6 text-center text-gray-500">
                            Belum ada data buku.
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Paginasi -->
        <div class="mt-4 flex flex-wrap gap-1">
            <template v-for="link in books.links" :key="link.label">
                <Link
                    v-if="link.url"
                    :href="link.url"
                    class="px-3 py-1 border rounded text-sm"
                    :class="link.active ? 'bg-blue-600 text-white' : 'bg-white hover:bg-gray-100'"
                    v-html="link.label"
                />
                <span
                    v-else
                    class="px-3 py-1 border rounded text-sm text-gray-400 bg-white"
                    v-html="link.label"
                />
            </template>
        </div>
    </AuthenticatedLayout>
</template>