<?php 
require_once "function/userInformation.php";

if(isset($_POST['form_identifier'])){
    $identifier = $_POST['form_identifier'];
    if($identifier == 'update_user_information' && isset($loginStatus[1])){
        $name = isset($_POST["name"]) ? $_POST["name"] : "";
        $email = isset($_POST["email"]) ? $_POST["email"] : "";
        $address = isset($_POST["address"]) ? $_POST["address"] : "";
        $birthdate = isset($_POST["birthdate"]) ? $_POST["birthdate"] : "";
        $gender = isset($_POST["gender"]) ? $_POST["gender"] : "";
        $phone = isset($_POST["phone_number"]) ? $_POST["phone_number"] : "";
        $status = saveUserInfo($loginStatus[1], $name, $email, $phone, $address, $birthdate, $gender);
        if($status[0]){
            echo "<script>window.alert('Data Updated!!')</script>";
            header("Location: index.php");
        }
    }
}


?>

<nav id="navBar" class="fixed select-none flex bg-gradient-to-b duration-1000 transition-transform ease-in-out from-brand-black via-brand-black/90 to-transparent h-[6rem] w-full z-20 top-0 left-0 px-[10%]">
    <div class="leftNav w-fit h-full flex justify-between items-center">
        <svg id="Layer_1" class="fill-brand-gold aspect-square h-[100%]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 779.83 468.89">
            <!-- <defs>
                <style>
                .cls-1 {
                    fill: red;
                    stroke-width: 0px;
                }
                </style>
            </defs> -->
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
    </div>
    <div class="rightNav w-full text-white flex justify-end items-center gap-5 text-center">
        <a class="text-lg border-b-2 border-b-transparent hover:border-b-brand-gold hover:text-brand-gold mr-4 w-[5rem]" href="">Facilities</a>
        <a class="text-lg border-b-2 border-b-transparent hover:border-b-brand-gold hover:text-brand-gold mr-4 w-[8rem]"  href="">Places nearby</a>
        <a class="text-lg border-b-2 border-b-transparent hover:border-b-brand-gold hover:text-brand-gold mr-4 w-[5rem]"  href="index.php#aboutUs">About us</a>
        <?php if($loginStatus[2]):?>
        <a class="text-lg border-b-2 border-b-transparent hover:border-b-brand-gold hover:text-brand-gold mr-4 w-[7.5rem]"  href="webManager.php">Web Manager</a>
        <?php endif;?>
        <?php if($loginStatus[0]): ?>
        <div class="relative">
            <button id="myProfileBtn" class="border-2 border-brand-gold px-4 py-1 rounded-md text-brand-gold text-[1rem]">My Profile</button>
            <div id="menuMyProfile" class="profileInfo hidden absolute top-full right-0 mt-3 w-[25rem] px-8 py-4 text-[1rem] rounded-lg border-2 border-brand-gold bg-brand-black ">
                <div class="flex justify-center items-center mb-2 gap-3">
                    <h3 class="text-[1.5rem] ">My Profile</h3>

                    <?php if($loginStatus[2]) : ?>
                    <p class="border-2 border-green-500 text-green-500 px-3 py-[0.25rem] text-[1rem] rounded-lg" >Admin</p>
                    <?php endif;?>
                
                </div>
                <div class="descContainer flex flex-col gap-1">
                    <div class="row flex justify-between">
                        <p class="text-[1rem] ">Name</p>
                        <p class="text-[1rem] "><?= isset($userInfo["name"]) ? $userInfo["name"] : ""?></p>
                    </div>
                    <div class="row flex justify-between">
                        <p class="text-[1rem] ">Email</p>
                        <p class="text-[1rem] "><?= isset($userInfo["email"]) ? $userInfo["email"] : ""?></p>
                    </div>
                    <div class="row flex justify-between">
                        <p class="text-[1rem] ">Phone</p>
                        <p class="text-[1rem] "><?= isset($userInfo["phone_number"]) ? $userInfo["phone_number"] : ""?></p>
                    </div>
                    <div class="row flex justify-between">
                        <p class="text-[1rem] ">Address</p>
                        <p class="text-[1rem] "><?= isset($userInfo["address"]) ? $userInfo["address"] : ""?></p>
                    </div>
                    <div class="row flex justify-between">
                        <p class="text-[1rem] ">Birthdate</p>
                        <p class="text-[1rem] "><?= isset($userInfo["birthdate"]) ? $userInfo["birthdate"] : ""?></p>
                    </div>
                    <div class="row flex justify-between">
                        <p class="text-[1rem] ">Gender</p>
                        <p class="text-[1rem] "><?= isset($userInfo["gender"]) ? $userInfo["gender"] : ""?></p>
                    </div>
                    <div class="row flex justify-evenly mt-4 ">
                        <button id="editProfileBtn" class=" duration-200 text-[1rem] border-2 border-brand-gold px-3 py-1 rounded-lg text-brand-gold hover:bg-brand-gold hover:text-brand-black">Edit Info</button>
                        <button onclick="window.location.href='index.php?logout=true'" class=" duration-200 text-[1rem] border-2 border-red-600 px-3 py-1 rounded-lg text-red-600 hover:bg-red-600 hover:text-brand-black">Logout</button>
                    </div>

                </div>

            </div>
        </div>

        </div>
        <?php else:?>
        <button onclick="window.location.href='login.php'" class="border-2 border-brand-gold px-4 py-1 rounded-md text-brand-gold text-[1rem]">Log In</button>
        <button onclick="window.location.href='register.php'" class=" px-4 py-1 rounded-md text-brand-black bg-brand-gold text-[1rem]">Register</button>
        <?php endif;?>

    </div>
</nav>
<!-- POP UP MENU FOR UPDATE USER INFORMATION -->
    <div id="editProfileMenu" class="editProfileInfo hidden fixed w-dvw h-dvh top-0 left-0 z-30 items-center justify-center bg-brand-black/40 backdrop-blur-sm">
        <form method="post" id="innerProfileMenu" class="w-[45rem] h-[30rem] bg-brand-black border-2 border-brand-gold rounded-lg text-brand-gold py-5 px-[3rem]">
            <input type="hidden" name="form_identifier" value="update_user_information">
            <h3 class="text-center mb-4 text-[2.5rem]">Update Profile</h3>
            
            <div id="nameBox" class="inputContainer mb-3 flex justify-between w-full text-[1rem]">
                <label for="name" class="text-[1.5rem]">Name</label>
                <input name="name" type="text" id="name" value="<?= isset($userInfo["name"]) ? $userInfo["name"] : ""?>" placeholder="enter your name here" class=" placeholder:text-gray-500 px-3 w-[60%] bg-brand-black hover:bg-brand-gold text-brand-gold duration-200 hover:text-brand-black rounded-full border-2 border-brand-gold text-[1rem] focus:outline-none" >
            </div>
            <div id="emailBox" class="inputContainer mb-3 flex justify-between w-full text-[1rem]">
                <label for="email" class="text-[1.5rem]">Email</label>
                <input name="email" type="email" id="email" value="<?= isset($userInfo["email"]) ? $userInfo["email"] : ""?>" placeholder="enter your email here" class=" placeholder:text-gray-500 px-3 w-[60%] bg-brand-black hover:bg-brand-gold text-brand-gold duration-200 hover:text-brand-black rounded-full border-2 border-brand-gold text-[1rem] focus:outline-none" >
            </div>
            <div id="phoneBox" class="inputContainer mb-3 flex justify-between w-full text-[1rem]">
                <label for="phoneNumber" class="text-[1.5rem]">Phone Number</label>
                <input name="phone_number" type="number" id="phoneNumber" value="<?= isset($userInfo["phone_number"]) ? $userInfo["phone_number"] : ""?>" type="number" placeholder="enter your phone number here" class=" placeholder:text-gray-500 px-3 w-[60%] bg-brand-black hover:bg-brand-gold text-brand-gold duration-200 hover:text-brand-black rounded-full border-2 border-brand-gold text-[1rem] focus:outline-none" >
            </div>
            <div id="addressBox" class="inputContainer mb-3 flex justify-between w-full text-[1rem]">
                <label for="address" class="text-[1.5rem]">Address</label>
                <input name="address" type="text"  id="address" value="<?= isset($userInfo["address"]) ? $userInfo["address"] : ""?>" placeholder="enter your address here" class=" placeholder:text-gray-500 px-3 w-[60%] bg-brand-black hover:bg-brand-gold text-brand-gold duration-200 hover:text-brand-black rounded-full border-2 border-brand-gold text-[1rem] focus:outline-none" >
            </div>
            <div id="birthdateBox" class="inputContainer mb-3 flex justify-between w-full text-[1rem]">
                <label for="birthdate" class="text-[1.5rem]">Birthdate</label>
                <input name="birthdate" type="date"  id="birthdate" value="<?= isset($userInfo["birthdate"]) ? $userInfo["birthdate"] : ""?>" placeholder="enter your birthdate here" class=" placeholder:text-gray-500 px-3 w-[60%] bg-brand-black hover:bg-brand-gold text-brand-gold duration-200 hover:text-brand-black rounded-full border-2 border-brand-gold text-[1rem] focus:outline-none" >
            </div>
            <div id="genderBox" class="inputContainer mb-3 flex justify-between w-full text-[1rem]">
                <label for="gender" class="text-[1.5rem]">Gender</label>
                <div class="radioContainer flex justify-left items-center w-[60%]">
                    <input name="gender" type="radio" value="MALE" id="genderMale" class="mr-1 focus:outline-none" <?= isset($userInfo["gender"]) ? $userInfo["gender"]=="MALE" ? "checked" : "" : ""?>>
                    <label for="genderMale">Male</label>
                    <input name="gender" type="radio" value="FEMALE" id="genderFemale" class="mr-1 ml-5 focus:outline-none" <?= isset($userInfo["gender"]) ? $userInfo["gender"]=="FEMALE" ? "checked" : "" : ""?>>
                    <label for="genderFemale">Female</label>
                </div>
            </div>
            <div class="row flex justify-evenly mt-4 ">
                <button id="cancelBtn" type="button" class=" duration-200 text-[1.3rem] border-2 border-red-600 px-6 py-1 rounded-lg text-red-600 hover:bg-red-600 hover:text-brand-black">Cancel</button>
                <button id="saveBtn" type="submit" class=" duration-200 text-[1.3rem] border-2 border-brand-gold px-6 py-1 rounded-lg text-brand-gold hover:bg-brand-gold hover:text-brand-black">Save</button>
            </div>
        </form>
    </div>

<script>
    let lastScroll = 0;
    const navbar = document.getElementById('navBar');
    window.onscroll = function(){
        currentScroll = window.pageYOffset;
        if (currentScroll > lastScroll && currentScroll > 800) {
            // Scrolling Down
            navbar.style.transform = 'translateY(-100%)';
        } else {
            // Scrolling Up
            navbar.style.transform = 'translateY(0)';
        }
        lastScroll = currentScroll;
    }

    myProfileIsClosed = true;
    $("#myProfileBtn").click(function(e){
        e.stopPropagation(); // clicking inside the menu won't close it
        if(myProfileIsClosed){
            $("#menuMyProfile").slideDown();
            myProfileIsClosed = false;
        }else{
            $("#menuMyProfile").slideUp();
            myProfileIsClosed = true;
        }
    });

    $("#menuMyProfile").click(function(e) {
        e.stopPropagation(); // clicking inside the menu won't close it
    });

    $(document).click(function() {
        if (!myProfileIsClosed) {
            $("#menuMyProfile").slideUp(); // hide menu if open
            myProfileIsClosed = true;
        }
    });

    // EDIT PROFILE MENU
    editProfileMenuIsOpen = false;
    editProfileMenu = document.querySelector("#editProfileMenu");
    classList = editProfileMenu.classList;

    $("#editProfileBtn").click(function(e){
        console.log("halo");
        if(editProfileMenuIsOpen){
            closeEditProfilMenu();
        }else{
            classList.remove('hidden')
            classList.add('flex');
            editProfileMenuIsOpen = true;
        }
    });

    $("#innerProfileMenu").click(function(e){
        e.stopPropagation();
    });

    $(document).click(function() {
        closeEditProfilMenu();
    });

    $("#cancelBtn").click(function(){
        closeEditProfilMenu();
    });

    function closeEditProfilMenu(){
        classList.add('hidden')
        classList.remove('flex'); // hide menu if open
        editProfileMenuIsOpen = false;
    }
</script>