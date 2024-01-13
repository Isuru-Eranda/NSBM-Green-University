<?php 
    if(isset($_GET["edit"])) {
        $user_id = $_GET["edit"];
        $sql_select_user = "SELECT * FROM `renthub_users` WHERE user_id=$user_id;";
        $result_select_user = mysqli_query($conn,$sql_select_user);
        $row_select_user = mysqli_fetch_assoc($result_select_user);
        $user_firstname = $row_select_user["user_firstname"];
        $user_lastname = $row_select_user["user_lastname"];
        $user_email = $row_select_user["user_email"];
        $user_contact = $row_select_user["user_contact"];
        $user_address = $row_select_user["user_address"];
        $user_address_city = $row_select_user["user_address_city"];
        $user_address_state = $row_select_user["user_address_state"];
        $user_type = $row_select_user["user_type"];
    }

    if(isset($_POST["update"])) {
        $new_user_type = $_POST["user_type"];
        $sql_update_user="UPDATE `renthub_users` SET user_type='$new_user_type' WHERE user_id='$user_id'";
        $result_update_user = mysqli_query($conn,$sql_update_user);
        if ($result_update_user) {
            echo "<script>alert('User updated successfully.'); window.location.href = 'users.php?view';</script>";
        } else {
            echo "<script>alert('Error: Unable to update the user at the moment. Please try again later.');</script>";
        }
    }
?>


<form action="" method="post" enctype="multipart/form-data" class="p-4">
    <h2 class="mb-4">User Info</h2>
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="user_firstname" class="form-label">First Name:</label>
            <input type="text" id="user_firstname" name="user_firstname" value="<?php echo $user_firstname?>" class="form-control" required disabled>
        </div>

        <div class="col-md-6">
            <label for="user_lastname" class="form-label">Last Name:</label>
            <input type="text" id="user_lastname" name="user_lastname" value="<?php echo $user_lastname?>" class="form-control" required disabled>
        </div>
    </div>

    <div class="mb-3">
        <label for="user_email" class="form-label">Email:</label>
        <input type="email" id="user_email" name="user_email" value="<?php echo $user_email?>" class="form-control" required disabled>
    </div>

    <div class="mb-3">
        <label for="user_address" class="form-label">Address:</label>
        <input type="text" id="user_address" name="user_address" value="<?php echo $user_address?>" class="form-control" required disabled>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
        <label for="user_address_state" class="form-label">State:</label>
        <input type="text" id="user_address_state" name="user_address_state" value="<?php echo $user_address_state?>" class="form-control" required disabled>
    </div>

    <div class="col-md-6">
        <label for="user_address_city" class="form-label">City:</label>
        <input type="text" id="user_address_city" name="user_address_city" value="<?php echo $user_address_city?>" class="form-control" required disabled>
    </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
        <label for="user_contact" class="form-label">Contact No:</label>
        <input type="text" id="user_contact" name="user_contact" value="<?php echo $user_contact?>" class="form-control" required disabled>
        </div>
        <div class="col-md-6">
        <label for="user_type" class="form-label">Type:</label>
        <select id="user_type" name="user_type" class="form-select" required>
            <?php
                    if($user_type == 'user') {
                        echo "<option value='user' selected>user</option>";
                    } else {
                        echo "<option value='user'>user</option>";
                    }
                    if($user_type == 'admin') {
                        echo "<option value='admin' selected>admin</option>";
                    } else {
                        echo "<option value='admin'>admin</option>";
                    }
            ?>
        </select>
    </div>
    </div>
    <div class="buttons">
    <a href="users.php?view" class="left"><i class="fa-solid fa-arrow-left"></i> Back</a>
    <button type="submit" name="update" class="btn btn-custom">UPDATE USER</button>
    <a href="users.php?delete=<?php echo $user_id?>" class="btn btn-danger">Delete User</a>
    </div>
</form>