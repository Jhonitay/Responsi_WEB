<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm, usePage } from '@inertiajs/vue3';

defineProps({
    status: {
        type: String,
    },
});
const form = useForm({
    judul: '',
    kategori: '',
    konten: '',
    penulis: '',
});
const submit = () => {
    form.post(route('posts.store'));
};
</script>
<template>
    <Head title="Posts" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Add Posts</h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-2 lg:px-2 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <form name="createForm" @submit.prevent="submit" class="mt-6 space-y-6">
                <div>
                    <InputLabel for="judul" value="Judul" />

                    <TextInput
                        id="judul"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.judul"
                        required
                        autofocus
                        autocomplete="off"
                    />

                    <InputError class="mt-2" :message="form.errors.judul" />
                </div>

                <div>
                    <InputLabel for="kategori" value="kategori" />

                    <TextInput
                        id="kategori"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.kategori"
                        required
                        autocomplete="off"
                    />

                    <InputError class="mt-2" :message="form.errors.kategori" />
                </div>

                <div>
                    <InputLabel for="konten" value="konten" />

                    <TextInput
                        id="konten"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.konten"
                        required
                        autocomplete="off"
                    />

                    <InputError class="mt-2" :message="form.errors.konten" />
                </div>

                <div>
                    <InputLabel for="penulis" value="penulis" />

                    <TextInput
                        id="konten"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.penulis"
                        required
                        autocomplete="off"
                    />

                    <InputError class="mt-2" :message="form.errors.penulis" />
                </div>


                <div class="flex items-center gap-4">
                    <PrimaryButton :disabled="form.processing">Save</PrimaryButton>

                    <Transition enter-from-class="opacity-0" leave-to-class="opacity-0" class="transition ease-in-out">
                        <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Saved.</p>
                    </Transition>
                </div>
            </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>