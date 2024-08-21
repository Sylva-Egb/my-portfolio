<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { defineProps } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
  title: {
    type: String,
    default: 'Welcome'
  },
  image: {
    type: String,
  }
});
</script>

<template>
  <GuestLayout>
    <template #header>
      <h1 class="text-2xl font-bold text-center dark:text-gray-200">
        {{ props.title }}
      </h1>
    </template>

    <div class="mt-8 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div>
        <div class="text-3xl font-bold">
          Je suis <span class="text-blue-500">EGBEWOLE Sylvanus</span>
        </div>

        <!-- Affichage de l'image -->
        <div class="mt-4">
            <img :src="image" alt="User Avatar" class="rounded-full w-32 h-32 object-cover mx-auto">
        </div>

        <div class="mt-6 text-center">
          <Link v-if="props.canLogin" :href="route('login')" class="text-blue-500 hover:text-blue-700">
            Log in
          </Link>
          <span v-if="props.canLogin && props.canRegister" class="mx-2">or</span>
          <Link v-if="props.canRegister" :href="route('register')" class="text-blue-500 hover:text-blue-700">
            Register
          </Link>
        </div>
      </div>
    </div>
  </GuestLayout>
</template>

<style scoped>
/* Add custom styles here if needed */
</style>
