<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';

// useForm membuat objek form yang otomatis mengelola nilai input dan pesan error
const form = useForm({
    kode_buku: '',
    judul: '',
    pengarang: '',
    penerbit: '',
    tahun: '',
    stok: 0,
});

// Dipanggil ketika tombol submit diklik
function submit() {
    // Mengirim data form ke method store() pada BookController
    form.post(route('books.store'));
}
</script>

<template>
    <Head title="Tambah Buku" />

    <AuthenticatedLayout>
        <h1>Tambah Buku</h1>

        <!-- @submit.prevent mencegah halaman reload, lalu menjalankan submit() -->
        <form @submit.prevent="submit">
            <div>
                <label>Kode Buku</label>
                <input v-model="form.kode_buku" type="text">
                <span v-if="form.errors.kode_buku">{{ form.errors.kode_buku }}</span>
            </div>

            <div>
                <label>Judul</label>
                <input v-model="form.judul" type="text">
                <span v-if="form.errors.judul">{{ form.errors.judul }}</span>
            </div>

            <div>
                <label>Pengarang</label>
                <input v-model="form.pengarang" type="text">
                <span v-if="form.errors.pengarang">{{ form.errors.pengarang }}</span>
            </div>

            <div>
                <label>Penerbit</label>
                <input v-model="form.penerbit" type="text">
                <span v-if="form.errors.penerbit">{{ form.errors.penerbit }}</span>
            </div>

            <div>
                <label>Tahun</label>
                <input v-model="form.tahun" type="text">
                <span v-if="form.errors.tahun">{{ form.errors.tahun }}</span>
            </div>

            <div>
                <label>Stok</label>
                <input v-model="form.stok" type="number">
                <span v-if="form.errors.stok">{{ form.errors.stok }}</span>
            </div>

            <button type="submit" :disabled="form.processing">Simpan</button>
        </form>
    </AuthenticatedLayout>
</template>