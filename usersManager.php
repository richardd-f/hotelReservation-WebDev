<?php 
require_once "function/loginRegister.php";
kickIfNotAdmin();

require_once "function/userAccount.php";
$allUserData = getAllUserData();

?>

<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="style/output.css" rel="stylesheet" />
    <link rel="icon" href="imgs/logo/logo-grandia.svg" type="image">
    <title>User Manager</title>
    <script src="script/jquery.js"></script>
</head>

<body class="w-full min-h-screen relative select-none">
    
    <section id="hero" class="absolute top-0 left-0 -z-1 h-dvh overflow-hidden">
        <?php require_once("php/header2.php") ?>
        <img class=" fixed top-0 left-0 w-full h-full object-cover opacity-60" style="" src="imgs/hero-landing.webp" alt="">    
    </section>
    
    <!-- User Manager Container -->
    <div class="max-w-3xl mx-auto mt-24 p-6 sm:p-10 relative z-10 bg-brand-black/80 backdrop-blur-sm rounded-[2rem] shadow-lg">
        <h2 class="text-center text-4xl font-bold mb-8 text-white">User Manager</h2>
        
        <!-- Header Row -->
        <div class="flex justify-between items-center w-full border-b border-gray-600 pb-4 mb-4 px-4">
            <p class="font-bold text-lg text-gray-300 w-3/5">User Email</p>
            <p class="font-bold text-lg text-gray-300 w-2/5 text-center">Administrator</p>
        </div>

        <!-- User List Container -->
        <div id="user-list-container" class="flex flex-col gap-2">
            
            <?php foreach ($allUserData as $user) : ?>
                <div class="user-row flex justify-between items-center w-full bg-gray-800/50 hover:bg-gray-800/80 p-4 rounded-lg transition-colors duration-200">
                    
                    <!-- Display user's email -->
                    <p class="w-3/5 truncate" title="<?= htmlspecialchars($user['email']) ?>">
                        <?= htmlspecialchars($user['email']) ?>
                    </p>
                    
                    <div class="w-2/5 flex justify-center">
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" value=""  class="admin-toggle sr-only peer" data-user-id="<?= $user['user_id'] ?>" <?php if ($user['isAdmin']) echo 'checked'; ?>>                        
                            <div class="w-14 h-8 bg-gray-600 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[4px] after:left-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all peer-checked:bg-blue-600"></div>
                        </label>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>


    <script src="script/util.js"></script>
    <script>
        
        $('.admin-toggle').click(function(e){
            userId = e.target.dataset.userId;
            isAdmin = e.target.checked;
            console.log(userId);
            console.log(isAdmin);
            fetch('api/updateUserRole.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    userId: userId,
                    isAdmin: isAdmin,
                }),
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    console.log('User role updated successfully!');
                } else {
                    console.error('Failed to update user role:', data.error);
                    target.checked = !isAdmin;
                }
            })
            .catch(error => {
                console.error('Network error:', error);
                target.checked = !isAdmin;
            });
        });
        
    </script>
    
</body>
</html>