<?php 
    require_once "function/loginRegister.php";
    $loginStatus = checkLogin();
    if(!$loginStatus){
        header("Location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="style/output.css" rel="stylesheet" />
    <link rel="icon" href="imgs/logo/logo-grandia.svg" type="image">
    <title>Grandia Resort</title>
    <script src="script/jquery.js"></script>
</head>

<body class="w-full relative">
    
    <section id="hero" class="absolute top-0 left-0 -z-1 h-dvh overflow-hidden">
        <?php require_once("php/header2.php") ?>
        <img class=" fixed top-0 left-0 w-full h-full object-cover opacity-60" style="" src="imgs/hero-landing.webp" alt="">    
    </section>
    
    <!-- Choose Your Room -->
    <div class="max-w-[60rem] m-auto mt-[6rem] p-10 flex-center flex-col relative z-2 bg-brand-black">
        <h2 class="self-center text-[3rem] mb-5">Choose Your Room</h2>
        <!-- Room Card -->
            <div class="room bg-brand-purple p-3 mb-5 w-[40rem]">
                <img class="h-full w-full    object-cover m-auto" src="imgs/bed_rooms/deluxe room.jpg" alt="">
                <div class="descContainer px-5 py-2 flex justify-between">
                    <div class="leftDesc">
                        <h3 class="text-[2rem]">Deluxe Room</h3>
                        <ul class="list-disc pl-6 pt-2">
                            <li>Bed Type: </li>
                            <li>Smart TV 80 in</li>
                            <li>Double King Size Bed</li>
                            <li>Double King Size Bed</li>
                        </ul>
                    </div>
                    <div class="rightDesc flex flex-col justify-start items-center gap-2">
                        <h3 class="font-bold text-[2rem]">Rp 1.700.000</h3>
                        <button class="bg-brand-black px-4 py-1 text-brand-gold duration-200 border-2 border-brand-black hover:border-brand-gold rounded-lg w-3/5">Select</button>
                    </div>
                </div>
            </div>
            
            <div class="room bg-brand-purple p-3 mb-5 w-[40rem]">
                <img class="h-full w-full    object-cover m-auto" src="imgs/bed_rooms/deluxe room.jpg" alt="">
                <div class="descContainer px-5 py-2 flex justify-between">
                    <div class="leftDesc">
                        <h3 class="text-[2rem]">Deluxe Room</h3>
                        <ul class="list-disc pl-6 pt-2">
                            <li>Bed Type: </li>
                            <li>Smart TV 80 in</li>
                            <li>Double King Size Bed</li>
                            <li>Double King Size Bed</li>
                        </ul>
                    </div>
                    <div class="rightDesc flex flex-col justify-start items-center gap-2">
                        <h3 class="font-bold text-[2rem]">Rp 1.700.000</h3>
                        <button class="bg-brand-black px-4 py-1 text-brand-gold duration-200 border-2 border-brand-black hover:border-brand-gold rounded-lg w-3/5">Select</button>
                    </div>
                </div>
            </div>
    </div>

    <?php require_once "php/footer.php"?>
    <script src="script/util.js"></script>
</body>
</html>
