<script setup>
import { ref } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link } from '@inertiajs/vue3';

const showingNavigationDropdown = ref(false);
</script>

<template>
    <div>
        <div class="min-h-screen bg-gray-800 text-gray-100">
            <nav class="bg-gray-900 border-b border-gray-700">
                <!-- Primary Navigation Menu -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <!-- Logo -->
                            <div class="shrink-0 flex items-center">
                                <Link :href="route('welcome')">
                                    <ApplicationLogo
                                    class="block h-9 w-auto fill-current text-blue-500"
                                    />
                                </Link>
                            </div>
                            
                            <!-- Navigation Links -->
                            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                                <NavLink v-if="$page.props.auth.user" class="text-white" :href="route('dashboard')" :active="route().current('dashboard')">
                                    Dashboard
                                </NavLink>
                                <NavLink class="text-white" :href="route('welcome')" :active="route().current('welcome')">
                                    Accueil
                                </NavLink>
                                <NavLink class="text-white" :href="route('about-me')" :active="route().current('about-me')">
                                    A propos
                                </NavLink>
                                <NavLink class="text-white" :href="route('contact-me')" :active="route().current('contact-me')">
                                    Contact
                                </NavLink>
                                <NavLink class="text-white" :href="route('portfolio')" :active="route().current('portfolio')">
                                    Portfolio
                                </NavLink>
                                <NavLink class="text-white" :href="route('blog')" :active="route().current('blog')">
                                    Blog
                                </NavLink>
                            </div>
                        </div>

                        <!-- Hamburger -->
                        <div class="-me-2 flex items-center sm:hidden">
                            <button
                                @click="showingNavigationDropdown = !showingNavigationDropdown"
                                class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-300 hover:bg-gray-700 focus:outline-none focus:bg-gray-700 focus:text-gray-300 transition duration-150 ease-in-out"
                            >
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path
                                        :class="{
                                            hidden: showingNavigationDropdown,
                                            'inline-flex': !showingNavigationDropdown,
                                        }"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16"
                                    />
                                    <path
                                        :class="{
                                            hidden: !showingNavigationDropdown,
                                            'inline-flex': showingNavigationDropdown,
                                        }"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"
                                    />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Responsive Navigation Menu -->
                <div
                    :class="{ block: showingNavigationDropdown, hidden: !showingNavigationDropdown }"
                    class="sm:hidden bg-gray-900"
                >
                    <div class="pt-2 pb-3 space-y-1">
                        <ResponsiveNavLink v-if="$page.props.auth.user" class="text-white" :href="route('dashboard')" :active="route().current('dashboard')">
                            Dashboard
                        </ResponsiveNavLink>
                        <ResponsiveNavLink class="text-white" :href="route('welcome')" :active="route().current('welcome')">
                            Accueil
                        </ResponsiveNavLink>
                        <ResponsiveNavLink class="text-white" :href="route('about-me')" :active="route().current('about-me')">
                            A propos
                        </ResponsiveNavLink>
                        <ResponsiveNavLink class="text-white" :href="route('contact-me')" :active="route().current('contact-me')">
                            Contact
                        </ResponsiveNavLink>
                        <ResponsiveNavLink class="text-white" :href="route('portfolio')" :active="route().current('portfolio')">
                            Portfolio
                        </ResponsiveNavLink>
                        <ResponsiveNavLink class="text-white" :href="route('blog')" :active="route().current('blog')">
                            Blog
                        </ResponsiveNavLink>
                    </div>
                </div>
            </nav>

            <!-- Page Heading -->
            <header class="bg-gray-800 shadow" v-if="$slots.header">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header" />
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <slot />
            </main>
        </div>
    </div>
</template>
