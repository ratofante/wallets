<script setup lang="ts"></script>

<template>
  <div class="container max-w-screen-lg">
    <div class="grid place-items-center w-full h-svh">
      <div
        class="relative bg-slate-50 border-xl rounded-xl w-full max-w-96 xl:max-w-full p-8 xl:p-16 shadow-md overflow-hidden"
      >
        <slot />
      </div>
    </div>
  </div>
</template>
