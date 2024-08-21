<template>
    <nav class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
      <!-- Primary Navigation Menu -->
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
          <!-- Logo -->
          <div class="shrink-0 flex items-center">
            <Link :href="route('dashboard')">
              <ApplicationLogo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
            </Link>
          </div>
  
          <!-- Navigation Links (Desktop) -->
          <div class="hidden sm:flex sm:items-center sm:space-x-8">
            <NavLink :href="route('dashboard')" :active="route().current('dashboard')">
              Dashboard
            </NavLink>
            <NavLink v-if="!$page.props.auth.user" :href="route('welcome')">Accueil</NavLink>
            <NavLink v-if="!$page.props.auth.user" :href="route('portfolio')">Portfolio</NavLink>
            <NavLink v-if="!$page.props.auth.user" :href="route('services')">Services</NavLink>
            <NavLink v-if="!$page.props.auth.user" :href="route('experiences')">Experiences</NavLink>
            <NavLink v-if="!$page.props.auth.user" :href="route('blog')">Blog</NavLink>
            <NavLink v-if="!$page.props.auth.user" :href="route('contact-me')">Contact</NavLink>
          </div>
  
          <!-- Hamburger Button -->
          <div class="-me-2 flex items-center sm:hidden">
            <button @click="showingNavigationDropdown = !showingNavigationDropdown" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#FF2D20]">
              <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path :class="{ hidden: showingNavigationDropdown, 'inline-flex': !showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                <path :class="{ hidden: !showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
        </div>
      </div>
  
      <!-- Responsive Navigation Menu (Mobile) -->
      <div :class="{ block: showingNavigationDropdown, hidden: !showingNavigationDropdown }" class="sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
          <ResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')">Dashboard</ResponsiveNavLink>
          <ResponsiveNavLink v-if="!$page.props.auth.user" :href="route('welcome')">Accueil</ResponsiveNavLink>
          <ResponsiveNavLink v-if="!$page.props.auth.user" :href="route('portfolio')">Portfolio</ResponsiveNavLink>
          <ResponsiveNavLink v-if="!$page.props.auth.user" :href="route('services')">Services</ResponsiveNavLink>
          <ResponsiveNavLink v-if="!$page.props.auth.user" :href="route('experiences')">Experiences</ResponsiveNavLink>
          <ResponsiveNavLink v-if="!$page.props.auth.user" :href="route('blog')">Blog</ResponsiveNavLink>
          <ResponsiveNavLink v-if="!$page.props.auth.user" :href="route('contact-me')">Contact</ResponsiveNavLink>
        </div>
  
        <!-- Responsive Settings Options -->
        <div v-if="$page.props.auth.user" class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
          <div class="px-4">
            <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ $page.props.auth.user.name }}</div>
            <div class="font-medium text-sm text-gray-500">{{ $page.props.auth.user.email }}</div>
          </div>
  
          <div class="mt-3 space-y-1">
            <ResponsiveNavLink :href="route('profile.edit')">Profile</ResponsiveNavLink>
            <ResponsiveNavLink :href="route('logout')" method="post" as="button">Log Out</ResponsiveNavLink>
          </div>
        </div>
      </div>
    </nav>
  </template>
  
  <script>
  import ApplicationLogo from '@/Components/ApplicationLogo.vue';
  import { Link } from '@inertiajs/vue3';
  import NavLink from '@/Components/NavLink.vue';
  import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
  
  export default {
    components: {
      ApplicationLogo,
      Link,
      NavLink,
      ResponsiveNavLink
    },
    data() {
      return {
        showingNavigationDropdown: false,
        canLogin: this.$page.props.auth.user !== undefined // Assurez-vous que `canLogin` est défini ici
      };
    },
  };
  </script>
  