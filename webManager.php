<?php 
    require_once "function/loginRegister.php";
    kickIfNotAdmin();
?>

<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="style/output.css" rel="stylesheet" />
    <link rel="icon" href="imgs/logo/logo-grandia.svg" type="image">
    <title>Web Manager</title>
    <script src="script/jquery.js"></script>
</head>

<body class="w-full min-h-screen relative flex justify-center">
    
    <section id="hero" class="absolute top-0 left-0 -z-1 h-dvh overflow-hidden">
        <?php require_once("php/header_admin.php") ?>
        <img class=" fixed top-0 left-0 w-full h-full object-cover opacity-60" style="" src="imgs/hero-landing.webp" alt="">    
    </section>
    
    <!-- place -->
    <div class="max-w-[60rem] m-auto p-10 flex justify-center flex-col relative z-2 bg-brand-black/80 backdrop-blur-sm rounded-[2rem]">
        <h2 class="self-center text-[2.5rem] mb-5">Website Manager</h2>
        
        <!-- application card: Rooms Management, Account Management -->
        <div class="cardContainer w-full flex justify-center gap-10 flex-wrap">
            
            <!-- Roome Manager Card -->
            <button onclick="window.location.href='roomsManager.php'" class="bg-brand-purple px-4 py-3 border-2 border-transparent hover:border-brand-gold duration-300  flex justify-center items-center gap-3 rounded-lg">
                <svg class="aspect-square w-[3rem] stroke-current text-brand-gold" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M3 21.0001L14 21V5.98924C14 4.6252 14 3.94318 13.7187 3.47045C13.472 3.05596 13.0838 2.74457 12.6257 2.59368C12.1032 2.42159 11.4374 2.56954 10.1058 2.86544L7.50582 3.44322C6.6117 3.64191 6.16464 3.74126 5.83093 3.98167C5.53658 4.19373 5.30545 4.48186 5.1623 4.8152C5 5.19312 5 5.65108 5 6.56702V21.0001M13.994 5.00007H15.8C16.9201 5.00007 17.4802 5.00007 17.908 5.21805C18.2843 5.4098 18.5903 5.71576 18.782 6.09209C19 6.51991 19 7.07996 19 8.20007V21.0001H21M11 12.0001H11.01" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <p>Rooms Manager</p>
            </button>
            
            <!-- Users Manager -->
            <button onclick="window.location.href='usersManager.php'" class="bg-brand-purple px-4 py-3  flex justify-center items-center gap-3 rounded-lg border-2 border-transparent hover:border-brand-gold duration-300">
                <svg class="fill-current text-brand-gold aspect-square w-[3rem]"  viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M9.6,3.32a3.86,3.86,0,1,0,3.86,3.85A3.85,3.85,0,0,0,9.6,3.32M16.35,11a.26.26,0,0,0-.25.21l-.18,1.27a4.63,4.63,0,0,0-.82.45l-1.2-.48a.3.3,0,0,0-.3.13l-1,1.66a.24.24,0,0,0,.06.31l1,.79a3.94,3.94,0,0,0,0,1l-1,.79a.23.23,0,0,0-.06.3l1,1.67c.06.13.19.13.3.13l1.2-.49a3.85,3.85,0,0,0,.82.46l.18,1.27a.24.24,0,0,0,.25.2h1.93a.24.24,0,0,0,.23-.2l.18-1.27a5,5,0,0,0,.81-.46l1.19.49c.12,0,.25,0,.32-.13l1-1.67a.23.23,0,0,0-.06-.3l-1-.79a4,4,0,0,0,0-.49,2.67,2.67,0,0,0,0-.48l1-.79a.25.25,0,0,0,.06-.31l-1-1.66c-.06-.13-.19-.13-.31-.13L19.5,13a4.07,4.07,0,0,0-.82-.45l-.18-1.27a.23.23,0,0,0-.22-.21H16.46M9.71,13C5.45,13,2,14.7,2,16.83v1.92h9.33a6.65,6.65,0,0,1,0-5.69A13.56,13.56,0,0,0,9.71,13m7.6,1.43a1.45,1.45,0,1,1,0,2.89,1.45,1.45,0,0,1,0-2.89Z"/></svg>
                <p>Users Manager</p>
            </button>
        </div>
    </div>

    <script src="script/util.js"></script>
</body>
</html>
