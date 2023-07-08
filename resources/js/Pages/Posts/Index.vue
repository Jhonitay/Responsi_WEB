<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { useForm, Head, Link } from '@inertiajs/vue3';

defineProps({
    posts: Array,
});
const form = useForm({});
function destroy(id) {
    if (confirm("Are you sure you want to Delete")) {
        form.delete(route('posts.destroy', id));
    }
}
</script>
<template>
    <Head title="Posts" />
    <AuthenticatedLayout>
            <template #header>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Posts</h2>
            </template>
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-2 lg:px-2 space-y-6">
                    <div class="p-4 sm:p-4 bg-white shadow sm:rounded-lg">
                        <Link
                            :href="route('posts.create')"
                            as="button"
                            class="mr-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                        >
                            Tambah
                        </Link>
                    </div>
                    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                       <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Konten</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tgl Terbit</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Penulis</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            <!-- Baris 1 -->
                            <tr v-for="post in posts" >
                                <td class="px-6 py-4 whitespace-nowrap">{{ post.id }}</td>
                                <td class="px-6 py-4 ">{{ post.judul }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ post.kategori }}</td>
                                <td class="px-6 py-4 ">{{ post.konten }}</td>
                                <td class="px-6 py-4 whitespace-nowrap"> {{ post.creted_at }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ post.penulis }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <a :href="route('posts.edit', post.id)" class="mr-2 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Edit
                                        </a>
                                       <button
                                                @click="destroy(post.id)"
                                                tabIndex="-1"
                                                type="button"
                                                className="mx-1 px-4 py-2 text-sm text-white bg-red-500 rounded"
                                            >Hapus</button>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </AuthenticatedLayout>
</template>