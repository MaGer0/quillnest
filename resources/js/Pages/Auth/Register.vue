<template>
    <div
        class="w-full min-h-screen bg-linear-65 from-[#00bf8f] to-[#001510] flex justify-center items-center"
    >
        <div class="bg-white rounded-3xl shadow-lg py-12 px-16 max-w-md w-full">
            <form
                class="flex flex-col items-center justify-center"
                @submit.prevent="signup"
            >
                <div class="flex flex-col items-center mb-8">
                    <div class="font-extrabold text-[#1D1616] text-xl">
                        Sign Up
                    </div>
                    <div class="text-[#949BA0] font-base">
                        Please enter your details
                    </div>
                </div>
                <div class="flex flex-col gap-4 mb-8 w-full">
                    <div class="">
                        <label for="name" class="text-[#1D1616] font-bold pl-2"
                            >Name</label
                        >
                        <input
                            type="text"
                            v-model="form.name"
                            class="w-full border border-[#949BA0] rounded-lg px-4 py-3 focus:outline-none focus:border-[#00bf8f]"
                            placeholder="Enter your name"
                        />
                        <p class="text-red-500" v-if="errors.name">
                            {{ errors.name }}
                        </p>
                    </div>
                    <div class="">
                        <label for="email" class="text-[#1D1616] font-bold pl-2"
                            >Email</label
                        >
                        <input
                            type="email"
                            id="email"
                            v-model="form.email"
                            class="w-full border border-[#949BA0] rounded-lg px-4 py-3 focus:outline-none focus:border-[#00bf8f]"
                            placeholder="Enter your email"
                            autocomplete="email"
                        />
                        <p class="text-red-500" v-if="errors.email">
                            {{ errors.email }}
                        </p>
                    </div>
                    <div class="">
                        <label
                            for="password"
                            class="text-[#1D1616] font-bold pl-2"
                            >Password</label
                        >
                        <input
                            type="password"
                            id="password"
                            v-model="form.password"
                            class="w-full border border-[#949BA0] rounded-lg px-4 py-3 focus:outline-none focus:border-[#00bf8f]"
                            placeholder="Enter password"
                            autocomplete="current-password"
                        />
                        <p class="text-red-500" v-if="errors.password">
                            {{ errors.password }}
                        </p>
                    </div>
                </div>
                <div class="w-full flex flex-col gap-4 mb-8">
                    <input
                        type="submit"
                        value="Sign in"
                        class="bg-[#008463] text-white w-full font-bold py-3 px-4 rounded-lg cursor-pointer"
                    />
                    <div id="g_id_signin"></div>
                </div>
                <div class="flex flex-col items-center">
                    <div class="text-[#949BA0] font-base">
                        Don't have an account?
                    </div>
                    <Link
                        href="/register"
                        class="text-[#008463] font-bold cursor-pointer"
                    >
                        Sign Up
                    </Link>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup>
import { Link, useForm } from "@inertiajs/vue3";

defineProps({
    errors: Object,
});

let form = useForm({
    name: "",
    email: "",
    password: "",
});

function signup() {
    form.post("/signup");
}
</script>
