<script setup lang="ts">
import { Button } from "@/Components/ui/button";
import { Link } from "@inertiajs/vue3";

defineProps({
  href: {
    type: String,
    required: true,
  },
  classes: {
    type: String,
    required: false,
  },
});
</script>

<template>
  <Button variant="link" size="link" as-child :class="classes">
    <Link :href="route(href)">
      <slot />
    </Link>
  </Button>
</template>
