<?php 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="style/output.css" rel="stylesheet" />
    <title>Grandia Resort</title>
    <script src="script/jquery.js"></script>
    
    <!-- litepicker for daterange -->
    <link href="https://cdn.jsdelivr.net/npm/litepicker/dist/css/litepicker.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/litepicker/dist/litepicker.js"></script>
    <!-- alpine js -->
     <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>

<body class="w-full">
    
    <section id="hero" class="relative top-0 left-0 z-0 h-dvh overflow-hidden">
        <?php require_once("php/header2.php") ?>
        <img class=" absolute top-0 left-0" style="mask-image: linear-gradient(to right, rgba(0,0,0,0.2), rgba(0,0,0,1)); -webkit-mask-image: linear-gradient(to right, rgba(0,0,0,0.2), rgba(0,0,0,1));" src="imgs/hero-landing.webp" alt="">
        
        <!-- HERO CONTAINER : BIG LOGO & CTA BOX -->
        <div class="heroContainer absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full h-3/5 flex justify-center flex-col lg:flex-row items-center gap-[5rem] px-20">
            <!-- LOGO -->
            <svg class="fill-brand-gold aspect-square h-[80%] filter drop-shadow-[0_6px_10px_black]" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 779.83 468.89">
                <path class="cls-1" d="M102.64,271.61v-23.66s-12.6-8.17-38.47-8.17S0,258.33,0,298.33s28.09,62.98,58.55,62.98,44.09-10.38,44.09-10.38v-37.62s1.7-7.49,7.83-7.49v-4.47h-35.74v4.3s8.85,3.23,8.85,7.66v32.6s-1.91,6.17-19.28,6.17-43.02-13.91-43.02-49.15,12.77-54.3,40.85-54.3,34.53,23.15,34.53,23.15l5.98-.17Z"/>
                <path class="cls-1" d="M130.81,354.38c5.87,0,8.04-9.06,8.04-9.06v-89.74c0-6.64-8.04-10.21-8.04-10.21v-2.94h49.4c16.6,0,34.98,11.62,34.98,32.17s-25.28,29.36-25.28,29.36c0,0,27.19,40.85,30.77,45.19s11.23,6,11.23,6v3.06h-28.6l-31.53-51.19h-13.4v38.04c0,6.89,9.06,9.19,9.06,9.19v3.96h-36.64v-3.83ZM158.04,250.5v47.74h19.4s18.38-3.06,18.38-21.87-14.81-25.87-18.89-25.87h-18.89Z"/>
                <path class="cls-1" d="M242.77,354.25c6.64-2.3,11.36-11.49,11.36-11.49l35.74-100.34h13.79l39.32,99.83c2.55,6.77,10.6,12.64,10.6,12.64v3.32h-36.64v-3.57c9.19-2.55,6-11.11,6-11.11l-9.96-24.77h-40.47l-6.77,21.96c-3.32,10.47,6.77,13.79,6.77,13.79v3.7h-29.74v-3.96ZM276.53,310.59h33.77l-17.49-44.36-16.28,44.36Z"/>
                <path class="cls-1" d="M368.77,358.5h29.02v-4.17s-7.66-2.98-9.02-9.7v-75.74l69.62,89.62h10.04v-102.21s1.53-8.85,9.36-10.89v-4.09h-28.77v5.62s5.62.85,7.49,9.02v72.17l-64.51-85.7h-22.13v4.17s6.13,1.87,7.15,8.51v90.04s-1.32,6-8.26,9.17v4.19Z"/>
                <path class="cls-1" d="M496.74,354.16c5-1.11,6.83-7.32,6.83-7.32v-91.6c-.45-5.94-6.83-9.06-6.83-9.06v-3.77h59.17s48.34,4.85,48.34,57.49-51.02,58.46-51.02,58.46h-56.49v-4.2ZM522.72,251.7v98.89h23.49s37.62-3.06,37.62-45.45-13.62-47.15-36.6-53.45h-24.51Z"/>
                <path class="cls-1" d="M621.79,358.37h35.81v-3.86s-7.79-4.21-7.79-9.26v-90.96s1.72-6,7.79-8.17v-3.7h-35.81v3.06s9.83,4.47,9.83,9.83v89.11s-1.44,10.21-9.86,10.21l.03,3.73Z"/>
                <path class="cls-1" d="M670.55,354.5c4.34,0,10.81-10.38,10.81-10.38l37.28-101.7h12.6l41.53,104.34c1.79,3.66,7.06,8.26,7.06,8.26v3.35h-36.38v-4.12c10.09,0,6.64-11.36,6.64-11.36l-8.81-23.74h-40.6l-7.28,21.96c-2.68,10.21,8.3,13.53,8.3,13.53v3.73h-31.15v-3.86ZM704.51,310.25h33.7l-16.85-43.57-16.85,43.57Z"/>
                <path class="cls-1" d="M138.04,176.46s37.45-17.7,57.79-36.77c0,0,36.68-30.98,56.09-53.79s41.87-40.17,61.62-43.23,34.38-9.87,62.98-33.36,40.85,4.09,48,10.55,39.74,51.74,39.74,51.74c0,0,9.7,11.49,20.17,5.11,0,0,12.26-3.57,21.96,3.57s80.68,89.96,109.28,96.17c0,0-27.32,5.45-53.11-19.83,0,0-18.64-12.77-57.19-61.28,0,0-7.4-9.96-21.7-2.3,0,0-9.7,8.94-22.47-6.38,0,0-20.68-16.85-52.34-62.3,0,0-8.68-19.66-26.04-1.02,0,0-39.57,34.98-73.79,34.72,0,0-26.3,7.66-3.83,15.57,0,0,3.57,2.81,55.66,9.45,0,0,32.94,8.43,18.64,32.94s16.85,29.62,16.85,29.62c0,0,78.89,7.66,85.79,51.57,0,0-23.74-25.02-87.32-35.74s-65.62-22.72-46.47-38.3,28.34-24-15.32-28.6-49.53-13.28-51.83-17.62c0,0-58.72,64.85-90.64,85.79s-52.51,13.7-52.51,13.7Z"/>
                <path class="cls-1" d="M189.02,468.12v-53.87h27.19s14.94,2.55,14.94,16.85-11.49,16.47-11.49,16.47l13.79,20.55h-12l-12-18.26h-11.49v18.26h-8.94ZM198.21,422.55v17.49h14.43s9.19-1.15,9.19-8.74-8.94-8.74-8.94-8.74h-14.68Z"/>
                <path class="cls-1" d="M484.19,468.12v-53.87h27.19s14.94,2.55,14.94,16.85-11.49,16.47-11.49,16.47l13.79,20.55h-12l-12-18.26h-11.49v18.26h-8.94ZM493.38,422.55v17.49h14.43s9.19-1.15,9.19-8.74-8.94-8.74-8.94-8.74h-14.68Z"/>
                <polygon class="cls-1" points="261.7 414.25 300.34 414.25 300.34 423.53 270.81 423.53 270.81 437.23 297.62 437.23 297.62 446.33 270.72 446.33 270.72 459.18 300.34 459.18 300.34 468.12 262.04 468.12 261.7 414.25"/>
                <path class="cls-1" d="M443.7,440.8c0,10.65-8.32,19.28-18.57,19.28s-18.57-8.63-18.57-19.28,8.32-19.28,18.57-19.28,18.57,8.63,18.57,19.28ZM424.87,413.36c-15.62,0-28.28,12.43-28.28,27.77s12.66,27.77,28.28,27.77,28.28-12.43,28.28-27.77-12.66-27.77-28.28-27.77Z"/>
                <polygon class="cls-1" points="550.94 414.25 593.7 414.25 593.7 423.82 577.11 423.82 577.11 468.12 567.4 468.12 567.4 423.82 550.94 423.82 550.94 414.25"/>
                <path class="cls-1" d="M328.68,459.87s8.43,9.02,21.36,9.02,20.34-8.85,20.34-14.81-2.89-14.81-17.87-17.7-15.66-14.13-2.98-14.13c0,0,6.13-.94,12.51,5.02l6.21-7.32s-8.26-6.98-18.72-6.98-19.15,7.83-19.15,15.57,1.87,13.45,16.77,16.6,18.72,12,2.89,14.47c0,0-10.98.17-15.74-7.06l-5.62,7.32Z"/>
            </svg>

            <!-- CTA Box -->
            <div class="flex justify-center drop-shadow-xl duration-200 border-[0.25rem] border-brand-gold hover:border-brand-gold-light bg-brand-black h-[4rem] rounded-full min-w-sm w-1/2 z-3">
                <!-- INPUT DATE CONTAINER -->
                <div class="dateInput h-full w-full flex items-center justify-center pl-5 gap-1">
                    <svg class="stroke-current text-brand-gold aspect-square h-[70%]" viewBox="0 0 24 24" fill="none">
                    <path d="M3 9H21M7 3V5M17 3V5M6 13H8M6 17H8M11 13H13M11 17H13M16 13H18M16 17H18M6.2 21H17.8C18.9201 21 19.4802 21 19.908 20.782C20.2843 20.5903 20.5903 20.2843 20.782 19.908C21 19.4802 21 18.9201 21 17.8V8.2C21 7.07989 21 6.51984 20.782 6.09202C20.5903 5.71569 20.2843 5.40973 19.908 5.21799C19.4802 5 18.9201 5 17.8 5H6.2C5.0799 5 4.51984 5 4.09202 5.21799C3.71569 5.40973 3.40973 5.71569 3.21799 6.09202C3 6.51984 3 7.07989 3 8.2V17.8C3 18.9201 3 19.4802 3.21799 19.908C3.40973 20.2843 3.71569 20.5903 4.09202 20.782C4.51984 21 5.07989 21 6.2 21Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <input id="date-range" class="border p-2 rounded text-brand-gold bg-transparent border-none placeholder-brand-gold focus:outline-none" placeholder="Select date range" />
                    <script>
                        const picker = new Litepicker({
                            element: document.getElementById('date-range'),
                            singleMode: false, // Enables date range
                            format: 'YYYY-MM-DD', // Format you want
                            numberOfMonths: 2, // Optional: shows 2 months side by side
                            numberOfColumns: 2,
                            autoApply: true, // Optional: applies the date immediately on selection
                        });
                    </script>
                </div>

                <!-- INPUT PEOPLE AMOUNT CONTAINER -->
                <div x-data="peopleCounter()" class="countPeopleInput h-full w-full flex items-center justify-center pl-5 gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 610 610" class="fill-brand-gold aspect-square h-[50%]">
                        <path d="M248.07 -12.79c-72.13 0-131.34 59.25-131.34 131.39 0 38.92 17.25 74.07 44.45 98.21-102.69 38.04-175.8 141.41-175.8 261.04A35.04 35.04 0 0 0 20.43 513h168.53c6.89-25.46 17.92-49.15 32.46-70.07H58.24c15.49-97.42 95.14-170.55 189.83-170.55 13.12 0 25.94 1.45 38.36 4.13 4.26-42.81 34.6-78.31 74.73-90.32 11.58-19.54 18.25-42.28 18.25-66.47 0-72.14-59.21-131.39-131.34-131.39zm0 70.07c34.24 0 61.27 27.03 61.27 61.32s-27.03 61.33-61.27 61.33-61.27-27.03-61.27-61.33 27.03-61.32 61.27-61.32z"/>
                        <path d="M405.68 197.48c-57.71 0-105.07 47.4-105.07 105.11 0 31.14 13.8 59.26 35.56 78.57-82.15 30.43-140.63 113.13-140.63 208.83a28.03 28.03 0 0 0 28.03 28.03h182.12 182.11a28.03 28.03 0 0 0 28.03-28.03c0-95.7-58.48-178.4-140.63-208.83 21.76-19.31 35.56-47.43 35.56-78.57 0-57.71-47.37-105.11-105.07-105.11zm0 56.06c27.39 0 49.02 21.62 49.02 49.06s-21.62 49.06-49.02 49.06-49.02-21.63-49.02-49.06 21.63-49.06 49.02-49.06zm0 171.19c75.75 0 139.47 58.51 151.87 137.24H405.68 253.81c12.4-78.73 76.12-137.24 151.87-137.24z"/>
                    </svg>
                    <input type="text" readonly class="text-brand-gold bg-transparent border-none placeholder-brand-gold cursor-pointer" :value="`${adult} Adult${adult > 1 ? 's' : ''}, ${child} Child${child > 1 ? 'ren' : ''}`" @click="open = !open">
                    
                    <!-- Dropdown -->
                    <div x-show="open" @click.outside="open = false" class="absolute top-full mt-2 w-60 bg-white text-black rounded-xl shadow-lg p-4 z-50">
                        <!-- Adult -->
                        <div class="flex justify-between items-center mb-3">
                            <span>Adult</span>
                            <div class="flex items-center gap-2">
                                <button class="px-2 py-1 bg-gray-200 rounded" @click="adult = Math.max(0, adult - 1)">−</button>
                                <span x-text="adult"></span>
                                <button class="px-2 py-1 bg-gray-200 rounded" @click="adult++">+</button>
                            </div>
                        </div>
    
                        <!-- Child -->
                        <div class="flex justify-between items-center">
                            <span>Child</span>
                            <div class="flex items-center gap-2">
                                <button class="px-2 py-1 bg-gray-200 rounded" @click="child = Math.max(0, child - 1)">−</button>
                                <span x-text="child"></span>
                                <button class="px-2 py-1 bg-gray-200 rounded" @click="child++">+</button>
                            </div>
                        </div>
                    </div>
                    <script>
                        function peopleCounter() {
                            return {
                                open: false,
                                adult: 1,
                                child: 2
                            };
                        }
                    </script>
                </div>
                </div>
            </div>
        </div>
    </section>

    <main class="block max-w-7xl m-auto">
        <section>
            <div class="flex-center flex-col section-pad">
                <h1>Who Are We</h1>
                <p>Grandia Resort is a 5-star luxury escape nestled along pristine beaches, offering unrivaled hospitality, fine dining, and exquisite accommodations for the discerning traveler.</p>
            </div>
    
            <div class="flex-center flex-col section-pad">
                <h2 class="self-center">Our Services</h2>
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                    <div class="bg-brand-purple flex-center flex-col element-pad">
                      <!-- Logo -->
                      <h3 class="text-center">Dining</h3>x
                      <p>Short paragraph that describe dining</p>
                    </div>
                    <div class="bg-brand-purple flex-center flex-col element-pad">
                      <!-- Logo -->
                      <h3 class="text-center">Stuff</h3>
                      <p>Short paragraph that describe dining</p>
                    </div>
                    <div class="bg-brand-purple flex-center flex-col element-pad">
                      <!-- Logo -->
                      <h3 class="text-center">Events</h3>
                      <p>Short paragraph that describe dining</p>
                    </div>
                </div>
            </div>
        </section>
    
        <section class="flex flex-col lg:flex-row w-full h-256">
            <!-- Text -->
            <div class="lg:w-2/5 flex flex-col justify-center z-10 section-pad h-full">
                <h2>Luxurious Rooms</h2>
                <p>This is a good room wow This is a good room wow This is a good room wow</p>
            </div>

            <!-- Image -->
            <div class="lg:w-3/5 relative overflow-hidden flex items-stretch h-auto">
                <!-- Background Image -->
                <img src="imgs/room-1.jpg"
                    alt="Resort Room"
                    class="w-full h-auto object-cover" />
                
                <!-- Gradient Overlay -->
                <div class="absolute inset-0 bg-gradient-to-b lg:bg-gradient-to-r from-brand-black to-transparent"></div>
            </div>
        </section>
    </main>

    <?php require_once "php/footer.php"?>
</body>
</html>
