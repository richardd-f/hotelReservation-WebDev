<?php 
    require_once "function/loginRegister.php";
    require_once "function/bedRoom.php";
    
    $allRoomsData = getAllRooms();
    
    $loginStatus = checkLogin();
    if(!$loginStatus[0]){
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
    <title>Booking Room</title>
    <script src="script/jquery.js"></script>
</head>

<body class="w-full relative select-none">
    
    <section id="hero" class="absolute top-0 left-0 -z-1 h-dvh overflow-hidden">
        <?php require_once("php/header2.php") ?>
        <img class=" fixed top-0 left-0 w-full h-full object-cover opacity-60" style="" src="imgs/hero-landing.webp" alt="">    
    </section>
    
    <!-- Choose Your Room -->
    <div class="max-w-[60rem] m-auto mt-[6rem] p-10 flex-center flex-col relative z-2 bg-brand-black/80 backdrop-blur-sm rounded-[2rem]">
        <h2 class="self-center text-[3rem] mb-[2.5rem] font-bold">Choose Your Room</h2>
        <!-- Room Card -->
        <?php foreach ($allRoomsData as $room) : ?>
            <div class="room bg-brand-purple p-3 mb-5 w-[40rem]">
                
                <!-- You can dynamically set the image source if you have image paths in your array -->
                <img class="h-full w-full object-cover m-auto" src="imgs/bed_rooms/deluxe room.jpg" alt="<?= htmlspecialchars($room['room_type']) ?>">
                
                <div class="descContainer px-5 py-2 flex justify-between">
                    <div class="leftDesc">
                        <h3 class="text-[2rem]"><?= htmlspecialchars($room['room_type']) ?></h3>
                        
                        <ul class="list-disc pl-6 pt-2">
                            <!-- Display the Bed Type -->
                            <li>Bed Type: <?= htmlspecialchars($room['bed_type']) ?></li>
                            
                            <!-- Loop through and display each facility -->
                            <?php foreach ($room['facilities'] as $facility) : ?>
                                <li><?= htmlspecialchars($facility["name"]) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    
                    <div class="rightDesc flex flex-col justify-start items-center gap-2">
                        <!-- Format the price with a thousands separator -->
                        <h3 class="font-bold text-[2rem]">Rp <?= number_format($room['price'], 0, ',', '.') ?> </h3>
                        <button class="bg-brand-black px-4 py-1 text-brand-gold duration-200 border-2 border-brand-black hover:border-brand-gold rounded-lg w-3/5">Select </button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <?php require_once "php/footer.php"?>
    <script src="script/util.js"></script>
</body>
</html>
