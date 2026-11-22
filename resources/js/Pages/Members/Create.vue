<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { useForm, Link } from '@inertiajs/vue3';

const form = useForm({
    nama: '',
    nis_nim: '',
    no_hp: '',
    foto: null,
});

function simpan() {
    // Inertia otomatis mengubah request menjadi multipart/form-data karena ada file (foto)
    form.post(route('members.store'));
}
</script>

<template>
    <AuthenticatedLayout>
        <div class="p-4">
            <h1 class="text-xl font-bold mb-4">Tambah Anggota</h1>

            <form @submit.prevent="simpan" class="space-y-3 max-w-md">
                <div>
                    <label class="block">Nama</label>
                    <input v-model="form.nama" type="text" class="border w-full px-2 py-1">
                    <div v-if="form.errors.nama" class="text-red-600 text-sm">{{ form.errors.nama }}</div>
                </div>

                <div>
                    <label class="block">NIS/NIM</label>
                    <input v-model="form.nis_nim" type="text" class="border w-full px-2 py-1">
                    <div v-if="form.errors.nis_nim" class="text-red-600 text-sm">{{ form.errors.nis_nim }}</div>
                </div>

                <div>
                    <label class="block">No. HP</label>
                    <input v-model="form.no_hp" type="text" class="border w-full px-2 py-1">
                    <div v-if="form.errors.no_hp" class="text-red-600 text-sm">{{ form.errors.no_hp }}</div>
                </div>

                <div>
                    <label class="block">Foto (JPG/PNG, maksimal 2 MB)</label>
                    <input
                        type="file"
                        accept="image/*"
                        @input="form.foto = $event.target.files[0]"
                        class="block mt-1"
                    >
                    <div v-if="form.errors.foto" class="text-red-600 text-sm">{{ form.errors.foto }}</div>
                </div>

                <div class="pt-2 flex items-center gap-3">
                    <button type="submit" :disabled="form.processing" class="bg-blue-600 text-white px-4 py-1 rounded">
                        Simpan
                    </button>
                    <Link href="/members" class="text-gray-600">Batal</Link>
                </div>
            </form>
        </div>
    </AuthenticatedLayout>
</template>