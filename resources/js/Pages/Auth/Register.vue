<script setup lang="ts">
//layouts
import GuestLayout from "@/Layouts/GuestLayout.vue";

//components
import {
  FormControl,
  FormDescription,
  FormField,
  FormItem,
  FormLabel,
  FormMessage,
} from "@/Components/ui/form";
import { Button } from "@/Components/ui/button";
import { Input } from "@/Components/ui/input";
import Link from "@/Components/shared/Link.vue";

//assets
import Logo from "@assets/LOGO__ALT__TAIL__GRAY.png";

//Libs
import { ref, onMounted } from "vue";
import { toTypedSchema } from "@vee-validate/zod";
import * as z from "zod";
import { useForm } from "vee-validate";
import { router, Head } from "@inertiajs/vue3";

const usernameInput = ref<InstanceType<typeof Input> | null>(null);

const formSchema = toTypedSchema(
  z
    .object({
      name: z.string().min(2).max(20),
      email: z.string().email("Invalid email address"),
      password: z
        .string()
        .min(8, "Password must be at least 8 characters")
        .regex(
          /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/,
          "Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character"
        ),
      password_confirmation: z.string(),
    })
    .refine((data) => data.password === data.password_confirmation, {
      message: "Passwords don't match",
      path: ["password_confirmation"],
    })
);
const form = useForm({
  validationSchema: formSchema,
});
const onSubmit = form.handleSubmit((values) => {
  router.post("/register", values, {
    onSuccess: () => {
      console.log("Registration successful!");
      // Maybe redirect or show a success message
    },
    onError: (errors) => {
      console.error("Registration failed:", errors);
      // Handle errors, maybe display them to the user
    },
  });
});

onMounted(() => {
  usernameInput.value?.$el.focus();
});
</script>

<template>
  <GuestLayout>
    <Head title="Register" />
    <div class="grid grid-cols-1 xl:grid-cols-2 gap-8 xl:gap-16">
      <div>
        <form @submit.prevent="onSubmit">
          <FormField v-slot="{ componentField }" name="name">
            <FormItem>
              <FormLabel>Username</FormLabel>
              <FormControl>
                <Input
                  type="text"
                  placeholder="Sumerio"
                  v-bind="componentField"
                  ref="usernameInput"
                />
              </FormControl>
              <FormDescription>
                This is your public display name.
              </FormDescription>
              <FormMessage />
            </FormItem>
          </FormField>
          <FormField v-slot="{ componentField }" name="email">
            <FormItem>
              <FormLabel>Email</FormLabel>
              <FormControl>
                <Input
                  type="email"
                  placeholder="sumo_wallet@me.com"
                  v-bind="componentField"
                />
              </FormControl>
              <FormDescription>
                We promise not to send you any unnecessary emails.
              </FormDescription>
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
          <FormField v-slot="{ componentField }" name="password_confirmation">
            <FormItem>
              <FormLabel>Confirm Password</FormLabel>
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
          <Button type="submit" class="w-full mt-4" size="lg"> Submit </Button>
          <Link href="login" classes="mt-4 font-medium tracking-normal">
            Already have an ccount?&nbsp;<span class="font-bold"> Login</span>
          </Link>
        </form>
      </div>
      <div class="row-start-1 xl:col-start-2 relative">
        <h1 class="text-3xl font-serif font-semibold mb-4 xl:text-5xl xl:mb-6">
          Register
        </h1>
        <p class="xl:text-lg text-pretty xl:text-balance">
          Sumo's wallet is a simple and easy-to-use expense tracker. It's
          <span class="font-semibold">free</span> and you can spread the news to
          others. Sumo would like that.
        </p>
        <div
          class="w-36 absolute rotate-180 top-0 -translate-y-2/3 xl:translate-y-0 xl:rotate-0 xl:top-auto xl:bottom-0 right-0"
        >
          <img
            :src="Logo"
            alt="Sumo is waiting for you to sign up"
            class="w-full"
          />
        </div>
      </div>
    </div>
  </GuestLayout>
</template>
