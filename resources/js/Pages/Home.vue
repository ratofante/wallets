<script setup lang="ts">
//Components
import GuestLayout from "@/Layouts/GuestLayout.vue";
import Button from "@/Components/ui/button/Button.vue";
import { Link } from "@inertiajs/vue3";

//Assets
import Logo from "@assets/LOGO__ALT__TAILESS.png";
</script>

<template>
  <GuestLayout>
    <!-- Mobile View -->
    <div class="pb-4 pt-24 sm:pt-32 xl:hidden">
      <img
        :src="Logo"
        alt="Sumo, a big cat with a wallet"
        class="absolute top-0 rotate-180 -translate-x-1/2 -translate-y-1/2 w-36 left-1/2"
      />
      <h1 class="font-serif text-6xl font-bold text-center sm:text-7xl">
        Sumo's <br />Wallet
      </h1>
      <p class="my-2 font-medium text-center sm:text-lg sm:my-4">
        Your everyday <br />
        expense tracker
      </p>
      <Button
        class="w-fit mx-auto mt-8 mb-12 text-center flex items-center"
        as-child
      >
        <Link :href="route('register')"> Join </Link>
      </Button>
      <Button variant="link" as-child class="mx-auto w-fit flex items-center">
        <Link
          :href="route('login')"
          class="block text-xs font-semibold text-center text-primary sm:text-base"
          >Already have an account?</Link
        >
      </Button>
    </div>
    <!-- Desktop View -->
    <div class="hidden xl:flex justify-center w-full">
      <div class="flex py-24 gap-8">
        <div class="w-60">
          <img :src="Logo" alt="Sumo, a big cat with a wallet" class="w-full" />
        </div>
        <div class="flex flex-col justify-center">
          <h1 class="text-7xl font-bold font-serif tracking-tight">
            Sumo's Wallet
          </h1>
          <p class="font-medium text-xl mt-4 leading-8">
            Your everyday expense tracker and <br />
            loyal finance companion.
          </p>
          <div class="flex gap-4 mt-2">
            <Link :href="route('register')">
              <Button class="w-36 my-4" size="lg">Sign Up</Button>
            </Link>
            <Link :href="route('login')">
              <Button class="w-36 my-4" size="lg" variant="outline"
                >Login</Button
              >
            </Link>
          </div>
        </div>
      </div>
    </div>
  </GuestLayout>
</template>
