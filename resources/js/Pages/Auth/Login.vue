<script setup lang="ts">
//layouts
import GuestLayout from "@/Layouts/GuestLayout.vue";

//components
import {
  FormControl,
  FormField,
  FormItem,
  FormLabel,
  FormMessage,
} from "@/Components/ui/form";
import { Button } from "@/Components/ui/button";
import { Input } from "@/Components/ui/input";
import Link from "@/Components/shared/Link.vue";

//assets
import Logo from "@assets/LOGO__MAIN.png";

//Libs
import { ref, onMounted } from "vue";
import { toTypedSchema } from "@vee-validate/zod";
import * as z from "zod";
import { useForm } from "vee-validate";
import { router, Head } from "@inertiajs/vue3";

const userEmailInput = ref<InstanceType<typeof Input> | null>(null);

const formSchema = toTypedSchema(
  z.object({
    email: z.string().email("Must be a valid email"),
    password: z.string(),
  })
);

const form = useForm({
  validationSchema: formSchema,
});

const onSubmit = form.handleSubmit((values) => {
  router.post("/login", values, {
    onSuccess: () => {
      console.log("Login successful");
    },
    onError: (errors) => {
      console.log("Login failed", errors);
    },
  });
});

onMounted(() => {
  userEmailInput.value?.$el.focus();
});
</script>

<template>
  <GuestLayout>
    <Head title="Login" />
    <div class="grid grid-cols-1 xl:grid-cols-2 gap-8 xl:gap-16 min-h-1/2">
      <div class="relative">
        <h1 class="text-3xl font-serif font-semibold mb-4 xl:text-5xl xl:mb-6">
          Login
        </h1>
        <p class="xl:text-lg text-pretty xl:text-balance italic">
          "... and remember the saying:<br />
          In Sumo we <span class="font-semibold">trust</span>".
        </p>
        <img
          :src="Logo"
          alt="Sumo is waiting for you to sign in"
          class="w-36 absolute right-0 xl:right-auto xl:bottom-0 z-0"
        />
      </div>
      <div class="relative z-10">
        <form @submit.prevent="onSubmit">
          <FormField v-slot="{ componentField }" name="email">
            <FormItem>
              <FormLabel>Email</FormLabel>
              <FormControl>
                <Input
                  type="email"
                  placeholder="user@email.com"
                  v-bind="componentField"
                  ref="userEmailInput"
                />
              </FormControl>
              <FormMessage />
            </FormItem>
          </FormField>
          <FormField v-slot="{ componentField }" name="password">
            <FormItem>
              <FormLabel>Password</FormLabel>
              <FormControl>
                <Input
                  type="password"
                  placeholder="•••••••••"
                  v-bind="componentField"
                />
              </FormControl>
              <FormMessage />
            </FormItem>
          </FormField>
          <Button type="submit" class="w-full mt-4" size="lg"> Enter </Button>
          <Link href="register" classes="mt-4 font-medium tracking-normal">
            Don't have an account?&nbsp;<span class="font-bold">Sign up</span>
          </Link>
        </form>
      </div>
    </div>
  </GuestLayout>
</template>
