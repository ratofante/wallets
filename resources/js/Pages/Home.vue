<script setup lang="ts">
import { Button } from "@/Components/ui/button";
import { Switch } from "@/components/ui/switch";
</script>

<template>
    <div class="container max-w-screen-lg mx-auto">
        <h1 class="font-serif font-normal">Home</h1>
        <h1 class="font-serif font-medium">Home</h1>
        <h1 class="font-serif font-semibold">Home</h1>
        <h1 class="font-serif font-bold">Home</h1>
        <button class="text-black bg-rose-400">Button</button>
        <p class="font-normal text-rose-500">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit.
            Consequatur neque soluta eos!
        </p>
        <p class="font-medium">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit.
            Consequatur neque soluta eos!
        </p>
        <p class="font-semibold">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit.
            Consequatur neque soluta eos!
        </p>
        <p class="font-bold">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit.
            Consequatur neque soluta eos!
        </p>
        <Button variant="default" size="lg">Button</Button>
        <Switch />
    </div>
</template>
