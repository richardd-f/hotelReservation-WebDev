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
</head>

<body>
    <?php require_once("php/header.php") ?>
    
    <header id="hero" class="m-header m-header-big element-pad
    bg-[url('/imgs/hero-landing.webp')]">
    </header>

    <section>
        <div class="flex-center content-max-width flex-col section-pad">
            <h1>Who Are We</h1>
            <p>Grandia Resort is a 5-star luxury escape nestled along pristine beaches, offering unrivaled hospitality, fine dining, and exquisite accommodations for the discerning traveler.</p>
        </div>

        <div class="flex-center flex-col content-max-width section-pad">
            <h2 class="self-center">Our Services</h2>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                <div class="bg-brand-purple flex-center flex-col element-pad">
                  <!-- Logo -->
                  <h3 class="text-center">Dining</h3>
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


    <section>
        <div>
            
        </div>
        <div>

        </div>
    </section>

    <?php require_once "php/footer.php"?>
</body>
</html>
