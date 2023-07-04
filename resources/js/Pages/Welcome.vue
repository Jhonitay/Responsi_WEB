<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { onMounted, ref } from "vue";
import { LottieAnimation } from "lottie-web-vue";
import WatermelonJSON from "../../../public/img/robot.json";

// Menginisialisasi variabel anim sebagai referensi Vue
let anim = ref();

// Menjalankan kode setelah komponen dipasang (mounted)
onMounted(() => {
    // Menunggu 500ms sebelum menjalankan kode berikutnya
    setTimeout(() => {
        // Menggunakan metode goToAndPlay dari animasi Lottie dengan parameter 150
        // untuk memulai animasi pada frame 150, dengan loop (true) 
        console.log(anim.value.goToAndPlay(150, true));
        // Memanggil objek anim.value untuk menjalankan animasi Lottie
        anim.value.play();
    }, 500);
});

// Mendefinisikan properti komponen
const props = defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: { type: String, required: true },
    phpVersion: { type: String, required: true },
    options: {
        theme: {
            controlsView: "standard",
            active: "light",
            light: {
                color: '#3D4852',
                backgroundColor: '#fff',
                opacity: '0.7',
            },
            dark: {
                color: '#fff',
                backgroundColor: '#202020',
                opacity: '0.7',
            },
        },
    },
});
</script>



<template>
    <Head title="Welcome" />
    <nav class="bg-white">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="/" class="flex items-center">
                <img src="img/logo_Web.png" class="h-8 mr-3" alt=" Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-dark">Dosen AI</span>
            </a>
            <div class="flex md:order-2">
                <div v-if="canLogin">
                    <button v-if="$page.props.auth.user" :href="route('dashboard')"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center mr-3 md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Dashboard</button>
                    <template v-else>
                        <Link :href="route('login')" type="button"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center mr-3 md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Log in</Link>
                    </template>
                </div>
                <button data-collapse-toggle="navbar-cta" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-cta" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul
                    class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 dark:border-gray-700">
                    <li>
                        <a href="#"
                            class="block py-2 pl-3 pr-4 text-dark bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-dark md:dark:text-blue-500"
                            aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="#about"
                            class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-dark md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-dark md:dark:hover:bg-transparent">About</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-dark md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-dark md:dark:hover:bg-transparent">Services</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-dark md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-dark md:dark:hover:bg-transparent">Pricing</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-dark md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-dark md:dark:hover:bg-transparent">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="bg-white dark:bg-gray-900">
        <div class="py-1 px-4 mx-auto max-w-screen-xl  lg:py-16 grid lg:grid-cols-2 gap-12 lg:gap-16">
            <div class="flex flex-col justify-center">
                <h1
                    class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                    Ketika Dosen Tapi Robot</h1>
                <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-400">Kenapa dosen AI selalu
                    datang terlambat? Karena dia sibuk memperbaiki bug di sistem 'waktunya' yang sering terjebak dalam loop
                    tak berujung, seperti mahasiswa yang mencoba menjelaskan mengapa tugasnya terlambat.</p>
                <div class="flex flex-col space-y-4 sm:flex-row sm:space-y-0 sm:space-x-4">
                    <a href="#"
                        class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                        Get started <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                    <a href="#"
                        class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-gray-900 rounded-lg border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                        Learn more </a>
                </div>
            </div>
            <div>
                <LottieAnimation :animation-data="WatermelonJSON" :auto-play="true" :height="100" :loop="true" :speed="1"
                    ref="anim" />
            </div>
        </div>
    </section>
    <section cclass="bg-grey-50" id="about">
        <div class="mx-auto max-w-screen-xl container flex flex-col items-center py-16 md:py-20 lg:flex-row">
            <div class="w-full text-center sm:w-3/4 lg:w-3/5 lg:text-left">
                <h2 class="font-header text-4xl font-semibold uppercase text-primary sm:text-5xl lg:text-6xl"> Who am I?
                </h2>
                <h4 class="pt-6 font-header text-xl font-medium text-black sm:text-2xl lg:text-3xl"> I'm Mas Mujiyanto, Your Favorite Teacher.</h4>
                <p class="pt-6 font-body leading-relaxed text-grey-20"> Seorang dosen AI robot dengan penuh percaya diri memasuki kelas, dan dengan nada yang arogan ia berkata, "Saya adalah dosen super canggih yang bisa menjawab semua pertanyaan dengan sempurna, kecuali pertanyaan 'Kapan libur semester?'" Para mahasiswa pun tertawa karena mereka tahu, meski AI robot pintar, ia tetap tidak bisa memahami keinginan mereka untuk beristirahat! </p>
                <div class="flex flex-col justify-center pt-6 sm:flex-row lg:justify-start">
                    <div class="flex items-center justify-center sm:justify-start">
                        <a href="https://www.instagram.com/mujiyantosvc/" class="font-body text-lg font-semibold uppercase text-grey-20"> Connect with me </a>
                        <div class="hidden sm:block">
                            <i class="bx bx-chevron-right text-2xl text-primary"></i>
                        </div>
                    </div>
                    <div class="flex items-center justify-center pt-5 pl-2 sm:justify-start sm:pt-0">
                        <a href="/">
                            <i class="bx bxl-facebook-square text-2xl text-primary hover:text-yellow"></i>
                        </a>
                        <a href="/" class="pl-4">
                            <i class="bx bxl-twitter text-2xl text-primary hover:text-yellow"></i>
                        </a>
                        <a href="/" class="pl-4">
                            <i class="bx bxl-dribbble text-2xl text-primary hover:text-yellow"></i>
                        </a>
                        <a href="/" class="pl-4">
                            <i class="bx bxl-linkedin text-2xl text-primary hover:text-yellow"></i>
                        </a>
                        <a href="/" class="pl-4">
                            <i class="bx bxl-instagram text-2xl text-primary hover:text-yellow"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="w-full pl-0 pt-10 sm:w-3/4 lg:w-2/5 lg:pl-12 lg:pt-0">
                <div>
                    <div class="flex items-end justify-between">
                        <h4 class="font-body font-semibold uppercase text-black"> HTML & CSS </h4>
                        <h3 class="font-body text-3xl font-bold text-primary">70%</h3>
                    </div>
                    <div class="mt-2 bg-lila w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                        <div class="bg-blue-600 h-2.5 rounded-full" style="width: 45%"></div>
                    </div>
                </div>
                <div class="pt-6">
                    <div class="flex items-end justify-between">
                        <h4 class="font-body font-semibold uppercase text-black"> HTML & CSS </h4>
                        <h3 class="font-body text-3xl font-bold text-primary">70%</h3>
                    </div>
                    <div class="mt-2 bg-lila w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                        <div class="bg-blue-600 h-2.5 rounded-full" style="width: 45%"></div>
                    </div>
                </div>
                <div class="pt-6">
                    <div class="flex items-end justify-between">
                        <h4 class="font-body font-semibold uppercase text-black"> HTML & CSS </h4>
                        <h3 class="font-body text-3xl font-bold text-primary">70%</h3>
                    </div>
                    <div class="mt-2 bg-lila w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                        <div class="bg-blue-600 h-2.5 rounded-full" style="width: 45%"></div>
                    </div>
                </div>
                <div class="pt-6">
                    <div class="flex items-end justify-between">
                        <h4 class="font-body font-semibold uppercase text-black"> HTML & CSS </h4>
                        <h3 class="font-body text-3xl font-bold text-primary">70%</h3>
                    </div>
                    <div class="mt-2 bg-lila w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                        <div class="bg-blue-600 h-2.5 rounded-full" style="width: 45%"></div>
                    </div>
                </div>
                <div class="pt-6">
                    <div class="flex items-end justify-between">
                        <h4 class="font-body font-semibold uppercase text-black"> HTML & CSS </h4>
                        <h3 class="font-body text-3xl font-bold text-primary">70%</h3>
                    </div>
                    <div class="mt-2 bg-lila w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                        <div class="bg-blue-600 h-2.5 rounded-full" style="width: 45%"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div className="mx-auto max-w-screen-xl  px-4 sm:px-6">
            <div className="grid sm:grid-cols-12 gap-8 py-8 md:py-12 border-t border-gray-200">
                <div className="sm:col-span-12 lg:col-span-3">
                    <div className="mb-2">
                        <Logo />
                    </div>
                    <div className="text-sm text-gray-600">
                        <img src="img/logo_Web.png" class="h-8 mr-3" alt=" Logo" />
                        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-dark">Dosen AI</span>
                    </div>
                </div>
                <div className="sm:col-span-6 md:col-span-3 lg:col-span-2">
                    <h6 className="text-gray-800 font-medium mb-2">Products</h6>
                    <ul className="text-sm">
                        <li className="mb-2">
                            <a href="#0"
                                className="text-gray-600 hover:text-gray-900 transition duration-150 ease-in-out">Web
                                Studio</a>
                        </li>
                        <li className="mb-2">
                            <a href="#0"
                                className="text-gray-600 hover:text-gray-900 transition duration-150 ease-in-out">DynamicBox
                                Flex</a>
                        </li>
                        <li className="mb-2">
                            <a href="#0"
                                className="text-gray-600 hover:text-gray-900 transition duration-150 ease-in-out">Programming
                                Forms</a>
                        </li>
                        <li className="mb-2">
                            <a href="#0"
                                className="text-gray-600 hover:text-gray-900 transition duration-150 ease-in-out">Integrations</a>
                        </li>
                        <li className="mb-2">
                            <a href="#0"
                                className="text-gray-600 hover:text-gray-900 transition duration-150 ease-in-out">Command-line</a>
                        </li>
                    </ul>
                </div>
                <div className="sm:col-span-6 md:col-span-3 lg:col-span-2">
                    <h6 className="text-gray-800 font-medium mb-2">Resources</h6>
                    <ul className="text-sm">
                        <li className="mb-2">
                            <a href="#0"
                                className="text-gray-600 hover:text-gray-900 transition duration-150 ease-in-out">Documentation</a>
                        </li>
                        <li className="mb-2">
                            <a href="#0"
                                className="text-gray-600 hover:text-gray-900 transition duration-150 ease-in-out">Tutorials
                                & Guides</a>
                        </li>
                        <li className="mb-2">
                            <a href="#0"
                                className="text-gray-600 hover:text-gray-900 transition duration-150 ease-in-out">Blog</a>
                        </li>
                        <li className="mb-2">
                            <a href="#0"
                                className="text-gray-600 hover:text-gray-900 transition duration-150 ease-in-out">Support
                                Center</a>
                        </li>
                        <li className="mb-2">
                            <a href="#0"
                                className="text-gray-600 hover:text-gray-900 transition duration-150 ease-in-out">Partners</a>
                        </li>
                    </ul>
                </div>
                <div className="sm:col-span-6 md:col-span-3 lg:col-span-2">
                    <h6 className="text-gray-800 font-medium mb-2">Company</h6>
                    <ul className="text-sm">
                        <li className="mb-2">
                            <a href="#0"
                                className="text-gray-600 hover:text-gray-900 transition duration-150 ease-in-out">Home</a>
                        </li>
                        <li className="mb-2">
                            <a href="#0"
                                className="text-gray-600 hover:text-gray-900 transition duration-150 ease-in-out">About
                                us</a>
                        </li>
                        <li className="mb-2">
                            <a href="#0"
                                className="text-gray-600 hover:text-gray-900 transition duration-150 ease-in-out">Company
                                values</a>
                        </li>
                        <li className="mb-2">
                            <a href="#0"
                                className="text-gray-600 hover:text-gray-900 transition duration-150 ease-in-out">Pricing</a>
                        </li>
                        <li className="mb-2">
                            <a href="#0"
                                className="text-gray-600 hover:text-gray-900 transition duration-150 ease-in-out">Privacy
                                Policy</a>
                    </li>
                </ul>
            </div>
            <div className="sm:col-span-6 md:col-span-3 lg:col-span-3">
                <h6 className="text-gray-800 font-medium mb-2">Subscribe</h6>
                <p className="text-sm text-gray-600 mb-4">Get the latest news and articles to your inbox every month.
                </p>
                <form>
                    <div className="flex flex-wrap mb-4">
                        <div className="w-full">
                            <label className="block text-sm sr-only" htmlFor="newsletter">Email</label>
                            <div className="relative flex items-center max-w-xs">
                                <input id="newsletter" type="email"
                                    className="form-input w-full text-gray-800 px-3 py-2 pr-12 text-sm"
                                    placeholder="Your email" required />
                                <button type="submit" className="absolute inset-0 left-auto" aria-label="Subscribe">
                                    <span className="absolute inset-0 right-auto w-px -ml-px my-2 bg-gray-300"
                                        aria-hidden="true"></span>
                                    <svg className="w-3 h-3 fill-current text-blue-600 mx-3 shrink-0"
                                        viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M11.707 5.293L7 .586 5.586 2l3 3H0v2h8.586l-3 3L7 11.414l4.707-4.707a1 1 0 000-1.414z"
                                            fillRule="nonzero" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div className="md:flex md:items-center md:justify-between py-4 md:py-8 border-t border-gray-200">
            <ul className="flex mb-4 md:order-1 md:ml-4 md:mb-0">
                <li>
                    <a href="#0"
                        className="flex justify-center items-center text-gray-600 hover:text-gray-900 bg-white hover:bg-white-100 rounded-full shadow transition duration-150 ease-in-out"
                        aria-label="Twitter">
                        <svg className="w-8 h-8 fill-current" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M24 11.5c-.6.3-1.2.4-1.9.5.7-.4 1.2-1 1.4-1.8-.6.4-1.3.6-2.1.8-.6-.6-1.5-1-2.4-1-1.7 0-3.2 1.5-3.2 3.3 0 .3 0 .5.1.7-2.7-.1-5.2-1.4-6.8-3.4-.3.5-.4 1-.4 1.7 0 1.1.6 2.1 1.5 2.7-.5 0-1-.2-1.5-.4 0 1.6 1.1 2.9 2.6 3.2-.3.1-.6.1-.9.1-.2 0-.4 0-.6-.1.4 1.3 1.6 2.3 3.1 2.3-1.1.9-2.5 1.4-4.1 1.4H8c1.5.9 3.2 1.5 5 1.5 6 0 9.3-5 9.3-9.3v-.4c.7-.5 1.3-1.1 1.7-1.8z" />
                        </svg>
                    </a>
                </li>
                <li className="ml-4">
                    <a href="#0"
                        className="flex justify-center items-center text-gray-600 hover:text-gray-900 bg-white hover:bg-white-100 rounded-full shadow transition duration-150 ease-in-out"
                        aria-label="Github">
                        <svg className="w-8 h-8 fill-current" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M16 8.2c-4.4 0-8 3.6-8 8 0 3.5 2.3 6.5 5.5 7.6.4.1.5-.2.5-.4V22c-2.2.5-2.7-1-2.7-1-.4-.9-.9-1.2-.9-1.2-.7-.5.1-.5.1-.5.8.1 1.2.8 1.2.8.7 1.3 1.9.9 2.3.7.1-.5.3-.9.5-1.1-1.8-.2-3.6-.9-3.6-4 0-.9.3-1.6.8-2.1-.1-.2-.4-1 .1-2.1 0 0 .7-.2 2.2.8.6-.2 1.3-.3 2-.3s1.4.1 2 .3c1.5-1 2.2-.8 2.2-.8.4 1.1.2 1.9.1 2.1.5.6.8 1.3.8 2.1 0 3.1-1.9 3.7-3.7 3.9.3.4.6.9.6 1.6v2.2c0 .2.1.5.6.4 3.2-1.1 5.5-4.1 5.5-7.6-.1-4.4-3.7-8-8.1-8z" />
                        </svg>
                    </a>
                </li>
                <li className="ml-4">
                    <a href="#0"
                        className="flex justify-center items-center text-gray-600 hover:text-gray-900 bg-white hover:bg-white-100 rounded-full shadow transition duration-150 ease-in-out"
                        aria-label="Facebook">
                        <svg className="w-8 h-8 fill-current" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M14.023 24L14 17h-3v-3h3v-2c0-2.7 1.672-4 4.08-4 1.153 0 2.144.086 2.433.124v2.821h-1.67c-1.31 0-1.563.623-1.563 1.536V14H21l-1 3h-2.72v7h-3.257z" />
                        </svg>
                    </a>
                </li>
            </ul>
            <div className="text-sm text-gray-600 mr-4">&copy; Amikom. All rights reserved.</div>
        </div>
    </div>
</footer></template>
<style>

</style>
