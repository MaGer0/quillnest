<template>
    <div
        class="w-full min-h-screen bg-linear-65 from-[#00bf8f] to-[#001510] flex justify-center items-center"
    >
        <div class="bg-white rounded-3xl shadow-lg py-12 px-16 max-w-md w-full">
            <form
                class="flex flex-col items-center justify-center"
                @submit.prevent="login"
            >
                <div class="flex flex-col items-center mb-8">
                    <div class="font-extrabold text-[#008463] text-xl">
                        Sign In
                    </div>
                    <div class="text-[#949BA0] font-base">
                        Please enter your details
                    </div>
                </div>
                <div class="flex flex-col gap-4 mb-8 w-full">
                    <div class="">
                        <label
                            for="email"
                            class="text-[#008463] text-lg font-bold pl-2"
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
                            class="text-[#008463] text-lg font-bold pl-2"
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
                        href="/signup"
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
import { Link, router, useForm } from "@inertiajs/vue3";
import { ref, onMounted } from "vue";

defineProps({
    errors: Object,
});

let form = useForm({
    email: "",
    password: "",
});

function login() {
    form.post("/login", {});
}

function decodeJWT(token) {
    let base64Url = token.split(".")[1];
    let base64 = base64Url.replace(/-/g, "+").replace(/_/g, "/");
    let jsonPayload = decodeURIComponent(
        atob(base64)
            .split("")
            .map(function (c) {
                return "%" + ("00" + c.charCodeAt(0).toString(16)).slice(-2);
            })
            .join("")
    );
    return JSON.parse(jsonPayload);
}

function googleLogin(response) {
    const jwt = response.credential;
    const user = decodeJWT(jwt);

    console.log("Decoded JWT:", user);
    console.log("Google Login Success");
    console.log(JSON.stringify(jwt));

    router.post("login/google", {
        token_id: jwt,
    });

    // fetch("http://127.0.0.1:8000/api/login/google", {
    //     method: "POST",
    //     headers: {
    //         Accept: "application/json",
    //         "Content-Type": "application/json",
    //     },
    //     body: JSON.stringify({ token_id: jwt }),
    // })
    //     .then((res) => {
    //         console.log("Response:", res);
    //         return res.json();
    //     })
    //     .then((data) => {
    //         console.log(data);
    //     })
    //     .catch((err) => {
    //         console.error("Error:", err);
    //     });
}

onMounted(() => {
    if (window.google) {
        google.accounts.id.initialize({
            client_id:
                "404358982388-kiio8f745uc7ljr0erq0bh8dgvg7vao9.apps.googleusercontent.com",
            callback: googleLogin,
        });

        google.accounts.id.renderButton(
            document.getElementById("g_id_signin"),
            {
                theme: "outline",
                size: "large",
            }
        );
    }
});
</script>
