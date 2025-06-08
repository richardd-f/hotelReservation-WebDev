<?php 
    require_once "function/loginRegister.php";
    require_once "function/bedRoom.php";
    
    $allRoomsData = getAllRooms();
    
    $loginStatus = checkLogin();
    kickIfNotAdmin();

    if(isset($_POST['form_identifier'])){
    $identifier = $_POST['form_identifier'];
    if($identifier == 'edit_existing_room'){
        $roomId = isset($_POST["room_id"]) ? $_POST["room_id"] : "";
        $roomType = isset($_POST["roomType"]) ? $_POST["roomType"] : "";
        $price = isset($_POST["price"]) ? $_POST["price"] : "";
        $bed_type_id = isset($_POST["bed_type_id"]) ? $_POST["bed_type_id"] : "";
        $facilities = isset($_POST["facilities"]) ? $_POST["facilities"] : "";
        // echo $roomId . "\n". $roomType."\n". $price."\n". $bed_type_id."\n". $facilities;
        // die();
        $status = updateRoom($roomId, $roomType, $price, $bed_type_id, json_decode($facilities, true));
        if($status[0]){
            header("Location: roomsManager.php");
        }

    }elseif ($identifier == 'delete_room') {
        header('Content-Type: application/json');
        try {
            $roomId = isset($_POST['room_id']) ? (int)$_POST['room_id'] : 0;

            if ($roomId > 0) {
                $status = deleteRoom($roomId); 
                if ($status[0]) {
                    echo json_encode(['success' => true]);
                } else {
                    echo json_encode(['success' => false, 'message' => $status[1]]);
                }
            } else {
                echo json_encode(['success' => false, 'message' => 'Invalid Room ID provided.']);
            }
        } catch (Throwable $e) {
            echo json_encode([
                'success' => false, 
                'message' => 'A server error occurred: ' . $e->getMessage()
            ]);
        }
        exit(); 
    }
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

<body class="w-full min-h-screen relative">
    
    <section id="hero" class="absolute top-0 left-0 -z-1 h-dvh overflow-hidden">
        <?php require_once("php/headerRoomsManager.php") ?>
        <img class=" fixed top-0 left-0 w-full h-full object-cover opacity-60" style="" src="imgs/hero-landing.webp" alt="">    
    </section>
    
    <!-- Rooms Container -->
    <div class="max-w-[60rem] m-auto mt-[6rem] p-10 flex-center flex-col relative z-2 bg-brand-black/80 backdrop-blur-sm rounded-[2rem]">
        <h2 class="self-center text-[3rem] mb-5">Rooms Manager</h2>
        
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
                        <button room-id="<?= $room['id']?>" class="editBtn bg-brand-black px-4 py-1 text-brand-gold duration-200 border-2 border-brand-black hover:border-brand-gold rounded-lg w-3/5">Edit </button>
                        <button room-id="<?= $room['id']?>"  class="deleteBtn bg-brand-black px-4 py-1 text-red-500 duration-200 border-2 border-brand-black hover:border-red-500 rounded-lg w-3/5">Delete </button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- POPUP MENU FOR EDITING ROOMS INFORMATION -->
    <div id="editRoomMenu" class="hidden fixed w-dvw h-dvh top-0 left-0 z-30 items-center justify-center bg-brand-black/40 backdrop-blur-sm">
        <form method="post" id="innerEditRoom" class="w-[45rem] h-fit bg-brand-black border-2 border-brand-gold rounded-lg text-brand-gold py-5 px-[3rem]">
            <!-- This form needs a different identifier for your backend -->
            <input type="hidden" name="form_identifier" value="edit_existing_room">
            <!-- This hidden input will hold the ID of the room being edited -->
            <input type="hidden" name="room_id" id="editRoomId">
            
            <h3 class="text-center mb-4 text-[2.5rem]">Edit Room</h3>
            
            <div id="editNameBox" class="inputContainer mb-3 flex justify-between w-full items-center">
                <label for="editRoomType" class="text-[1.5rem]">Room Type</label>
                <input name="roomType" type="text" id="editRoomType" class="focus:outline-brand-gold outline-2 placeholder:text-gray-500 px-4 py-2 w-[60%] bg-brand-black hover:bg-brand-gold text-brand-gold duration-200 hover:text-brand-black rounded-full border-2 border-brand-gold text-[1rem]">
            </div>

            <div id="editPriceBox" class="inputContainer mb-3 flex justify-between w-full items-center">
                <label for="editPrice" class="text-[1.5rem]">Price</label>
                <input name="price" type="number" id="editPrice" class="placeholder:text-gray-500 px-4 py-2 w-[60%] bg-brand-black hover:bg-brand-gold text-brand-gold duration-200 hover:text-brand-black rounded-full border-2 border-brand-gold text-[1rem] focus:outline-none">
            </div>

            <div id="editBedTypeBox" class="inputContainer mb-3 flex justify-between w-full items-center">
                <label for="editBedType" class="text-[1.5rem]">Bed Type</label>
                <select name="bed_type_id" id="editBedType" class="px-3 w-[60%] h-[3rem] bg-brand-black hover:bg-brand-gold text-brand-gold duration-200 hover:text-brand-black rounded-full border-2 border-brand-gold text-[1rem] focus:outline-none">
                    <option value="" disabled>Select a bed type</option>
                </select>
            </div>
            
            <!-- The facility component for the EDIT form -->
            <div id="editFacilityInputComponent" data-initial-facilities="">
                <div class="inputContainer mb-4 flex justify-between items-center w-full">
                    <label for="editFacilityInput" class="text-[1.5rem] text-brand-gold whitespace-nowrap pr-4">Facility</label>
                    <div class="flex items-center w-[70%] md:w-[60%] space-x-2">
                        <input type="text" id="editFacilityInput" placeholder="enter a facility" class="flex-grow w-full bg-brand-black text-brand-gold placeholder:text-gray-500 px-4 py-2 rounded-full border-2 border-brand-gold hover:bg-brand-gold hover:text-brand-black focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-brand-black focus:ring-brand-gold transition-colors duration-200">
                        <button id="addEditFacilityBtn" class="flex-shrink-0 bg-brand-gold hover:bg-opacity-80 text-brand-black rounded-full p-2 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-brand-black focus:ring-brand-gold transition-colors duration-200" aria-label="Add facility" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" /></svg>
                        </button>
                    </div>
                </div>
                <input type="hidden" id="editFacilitiesInput" name="facilities">
                <p class="text-sm text-gray-400 pl-[30%] md:pl-[40%] mt-2 -mb-1">Click a tag's text to edit.</p>
                <div id="editFacilityTagsContainer" class="flex flex-wrap gap-2 pl-[30%] md:pl-[40%] mt-2"></div>
            </div>

            <div class="row flex justify-evenly mt-7 ">
                <button id="cancelEditRoomBtn" type="button" class=" duration-200 text-[1.3rem] border-2 border-red-600 px-6 py-1 rounded-lg text-red-600 hover:bg-red-600 hover:text-brand-black">Cancel</button>
                <button id="saveEditRoomBtn" type="submit" class=" duration-200 text-[1.3rem] border-2 border-brand-gold px-6 py-1 rounded-lg text-brand-gold hover:bg-brand-gold hover:text-brand-black">Save Changes</button>
            </div>
        </form>
    </div>

    <script src="script/util.js"></script>
    

<!-- POPUP MENU EDITING ROOMS SCRIPT -->
<script>
    allRoomsData = <?= json_encode($allRoomsData)?>;

    const editFacilityManager = createTagManager({
        componentId: 'editFacilityInputComponent',
        inputId: 'editFacilityInput',
        addBtnId: 'addEditFacilityBtn',
        tagsContainerId: 'editFacilityTagsContainer',
        hiddenInputId: 'editFacilitiesInput',
        initialDataKey: 'initialFacilities',
        newIdPrefix: 'new_facility'
    });

    function populateEditForm(roomId) {
        // Find the specific room's data from the global array
        const roomData = allRoomsData.find(room => room.id == roomId);
        if (!roomData) {
            console.error("Could not find room data for ID:", roomId);
            return;
        }

        // Populate the simple input fields
        document.getElementById('editRoomId').value = roomData.id;
        document.getElementById('editRoomType').value = roomData.room_type;
        document.getElementById('editPrice').value = roomData.price;
        
        // Populate the bed type dropdown and set its value
        populateBedTypeDropdown('editBedType', roomData.bed_type_id);
        
        // Populate the facility manager
        const facilityComponent = document.getElementById('editFacilityInputComponent');
        // Set the initial data for the facility manager...
        facilityComponent.dataset.initialFacilities = JSON.stringify(roomData.facilities);
        
        console.log(roomData.facilities);
        
        // ...then initialize it to draw the tags.
        editFacilityManager.initialize();
    }


    $('.editBtn').click(function(e){
        roomId = e.target.getAttribute('room-id');
        editMenu = document.querySelector('#editRoomMenu');
        populateEditForm(roomId);
        editMenu.classList.remove('hidden');
        editMenu.classList.add('flex');
    });

    // Add a listener for the cancel button on the edit menu
    const cancelEditBtn = document.getElementById('cancelEditRoomBtn');
    if (cancelEditBtn) {
        cancelEditBtn.addEventListener('click', () => {
            document.getElementById('editRoomMenu').classList.add('hidden');
            document.getElementById('editRoomMenu').classList.remove('flex');
        });
    }

    // --- UPDATED DROPDOWN ---
    function populateBedTypeDropdown(selectElementId, selectedId = null) {
        const dataSourceElement = document.getElementById('manageBedTypesMenu');
        const bedTypeSelect = document.getElementById(selectElementId);
        if (!dataSourceElement || !bedTypeSelect) return;
        
        const initialDataString = dataSourceElement.dataset.initialBedTypes;
        try {
            const bedTypes = JSON.parse(initialDataString || '[]');
            while (bedTypeSelect.options.length > 1) bedTypeSelect.remove(1);
            bedTypes.forEach(bedType => {
                const option = document.createElement('option');
                option.value = bedType.id;
                option.textContent = bedType.name;
                bedTypeSelect.appendChild(option);
            });
            
            // If an ID to select was provided, set the value
            if(selectedId) {
                bedTypeSelect.value = selectedId;
            }

        } catch (e) {
            console.error("Failed to parse bed types data for dropdown.", e);
        }
    }
</script>

<!-- SCRIPT FOR DELETE ROOMS -->
<script>

    $('.deleteBtn').click(function(e){
        deleteButton = e.target;
        roomId = deleteButton.getAttribute('room-id');
        if (confirm(`Are you sure you want to delete room ID #${roomId}? This action cannot be undone.`)) {
                        
        const postData = new URLSearchParams();
        postData.append('form_identifier', 'delete_room');
        postData.append('room_id', roomId);

        fetch('roomsManager.php', {
            method: 'POST',
            body: postData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok.');
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                alert('Room deleted successfully!');
                // Remove the room card from the page for a smooth UX
                deleteButton.closest('.room').remove();
            } else {
                // Show the error message from the server
                alert('Error: ' .concat(data.message || 'An unknown error occurred.'));
            }
        })
        .catch(error => {
            console.error('Fetch error:', error);
            alert('A network error occurred. Please try again.');
        });
    }
    });
</script>

</body>
</html>
