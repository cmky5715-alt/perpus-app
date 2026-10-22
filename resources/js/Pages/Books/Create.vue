<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    kode_buku: '',
    judul: '',
    pengarang: '',
    penerbit: '',
    tahun: '',
    stok: 0,
});

function submit() {
    form.post('/books');
}
</script>

<template>
    <Head title="Tambah Buku" />

    <AuthenticatedLayout>
        <h1 class="text-2xl font-bold mb-4">Tambah Buku</h1>

        <form
            @submit.prevent="submit"
            class="bg-white rounded shadow p-6 max-w-xl space-y-4"
        >
            <div>
                <label class="block mb-1 font-medium">Kode Buku</label>
                <input v-model="form.kode_buku" type="text" class="w-full border rounded px-3 py-2" />
                <p v-if="form.errors.kode_buku" class="text-sm text-red-600 mt-1">{{ form.errors.kode_buku }}</p>
            </div>

            <div>
                <label class="block mb-1 font-medium">Judul</label>
                <input v-model="form.judul" type="text" class="w-full border rounded px-3 py-2" />
                <p v-if="form.errors.judul" class="text-sm text-red-600 mt-1">{{ form.errors.judul }}</p>
            </div>

            <div>
                <label class="block mb-1 font-medium">Pengarang</label>
                <input v-model="form.pengarang" type="text" class="w-full border rounded px-3 py-2" />
                <p v-if="form.errors.pengarang" class="text-sm text-red-600 mt-1">{{ form.errors.pengarang }}</p>
            </div>

            <div>
                <label class="block mb-1 font-medium">Penerbit</label>
                <input v-model="form.penerbit" type="text" class="w-full border rounded px-3 py-2" />
                <p v-if="form.errors.penerbit" class="text-sm text-red-600 mt-1">{{ form.errors.penerbit }}</p>
            </div>

            <div>
                <label class="block mb-1 font-medium">Tahun</label>
                <input v-model="form.tahun" type="text" maxlength="4" class="w-full border rounded px-3 py-2" />
                <p v-if="form.errors.tahun" class="text-sm text-red-600 mt-1">{{ form.errors.tahun }}</p>
            </div>

            <div>
                <label class="block mb-1 font-medium">Stok</label>
                <input v-model="form.stok" type="number" min="0" class="w-full border rounded px-3 py-2" />
                <p v-if="form.errors.stok" class="text-sm text-red-600 mt-1">{{ form.errors.stok }}</p>
            </div>

            <div class="flex gap-2">
                <button
                    type="submit"
                    :disabled="form.processing"
                    class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 disabled:opacity-50"
                >
                    Simpan
                </button>
                <Link href="/books" class="px-4 py-2 border rounded hover:bg-gray-100">
                    Batal
                </Link>
            </div>
        </form>
    </AuthenticatedLayout>
</template>