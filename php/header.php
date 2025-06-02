<nav class="flex flex-col items-center justify-between
    h-fit w-full">
    <!-- Top Part of Nav -->
    <div class="grid grid-cols-3 items-center w-full
    border-b border-gray-400
    px-4 py-2">
        
        <!-- Account -->
        <div id="profile-picture"
            class="flex items-center justify-center
            bg-white
            h-10 w-10 rounded-full">
            <!-- Welcome user if signed in, sign in button if not
            </?php if ($userLoggedIn): ?>
                <span></?= $userInitials ?></span>
            </?php else: ?>
                <a href="/login.php">Sign In</a>
            </?php endif; ?> -->
        </div>

        <!-- Logo -->
        <div class="flex justify-self-center">
            <a href="index.php">
                <h4 class="text-white">Grandia Resort</h4>
            </a>
        </div>

        <!-- Hamburger (if screen width < 1024px) -->
        <div id="nav-hamburger"
        class="justify-self-end lg:hidden h-10 w-10">
            <svg viewBox="0 0 100 100" width="40" height="40">
                <rect fill="#FFF" y="15" width="100" height="8" rx="4"></rect>
                <rect fill="#FFF" x="20" y="45" width="80" height="8" rx="4"></rect>
                <rect fill="#FFF" x="40" y="75" width="60" height="8" rx="4"></rect>
            </svg>
        </div>
    </div>


    <!-- Bottom Part of Nav -->
    <!-- Facilities, Points of Interests, About Us -->
    <div class="hidden lg:flex justify-center
    border-b border-gray-400 h-fit w-full">
        <div class="flex flex-row items-center justify-center
        gap-16 px-4 py-2">
            <a href="#">Facilities</a>
            <a href="#">Places Nearby</a>
            <a href="#">About Us</a>
        </div>
    </div>
</nav>