<template>
    <div class="">
        <header
            class="bg-[#222831] text-[#EEEEEE] border-b-1 border-[#EEEEEE]/6 flex w-full px-20 py-4 justify-between"
        >
            <div class="font-bold text-2xl/tight flex items-center">
                <h1>Quillnest</h1>
                <div
                    class="flex gap-2 border-1 ml-5 py-2 pl-2 pr-4 rounded-lg border-[#EEEEEE]/6"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        class="lucide lucide-search-icon lucide-search"
                    >
                        <path d="m21 21-4.34-4.34" />
                        <circle cx="11" cy="11" r="8" />
                    </svg>
                    <input
                        type="text"
                        class="text-base font-light focus:outline-0"
                        placeholder="Search"
                    />
                </div>
            </div>
            <div class="flex items-center">
                <Link
                    class="py-2 px-3 border-1 border-[#FFD369] font-semibold text-[#FFD369] rounded-lg hover:cursor-pointer hover:bg-[#FFD369] hover:text-[#222831] transition ease-in-out duration-75"
                    as="button"
                    >Create Post
                </Link>
                <div class="">
                    <img
                        class="rounded-full w-10 h-auto ml-5"
                        src="https://lh3.googleusercontent.com/a/ACg8ocJ3GClKFxV3amxlxuxA43Zkr7zbcX5kdCRvw1syx8j_VCEVdM1A=s96-c"
                        alt=""
                    />
                </div>
            </div>
        </header>
        <main class="bg-[#222831] h-full">
            <slot />
        </main>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
</script>
