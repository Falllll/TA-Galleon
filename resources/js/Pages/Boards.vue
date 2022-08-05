<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import {Head, InertiaLink} from '@inertiajs/inertia-vue3';
import {PlusIcon} from '@heroicons/vue/solid';

const props = defineProps({
  boards: Array,
});
</script>

<template>
  <Head title="Boards"/>

  <BreezeAuthenticatedLayout>
    <div class="px-4 py-6 h-full bg-gray-50">
      <div class="mx-auto max-w-5xl">
        <div class="px-3 flex items-center mb-4">
          <h3 class="font-black text-gray-700">My boards</h3>
          <button class="inline-flex items-center px-3 py-2 ml-4 font-medium bg-gray-100 rounded hover:bg-gray-200">
            <PlusIcon class="-ml-1 w-4 h-4"/>
            <span class="ml-1">Create board</span>
          </button>
        </div>

        <ul class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
          <li
            v-for="board in boards"
            :key="board.id"
            class="relative bg-blue-600 hover:bg-blue-700 rounded-md min-h-[7rem]">
            <InertiaLink :href="route('boards.show', {board: board.id})"
                         class="absolute inset-0 p-3 text-lg font-bold text-white">
              {{ board.name }}
            </InertiaLink>
          </li>
        </ul>
      </div>
    </div>
  </BreezeAuthenticatedLayout>
</template>
