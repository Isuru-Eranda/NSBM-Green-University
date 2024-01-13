<?php

    if(isset($_GET["edit"])) {
        $category_id = $_GET["edit"];
        $sql_select_category = "SELECT * FROM `renthub_categories` WHERE category_id=$category_id;";
        $result_select_category = mysqli_query($conn,$sql_select_category);
        $row_select_category = mysqli_fetch_assoc($result_select_category);
        $category_name = $row_select_category["category_name"];
    }
    if(isset($_POST["update"])){
        $new_category_name = $_POST["category_name"];

        $sql_update_category = "UPDATE `renthub_categories` SET category_name='$new_category_name' WHERE category_id=$category_id;";
        $result_update_category = mysqli_query($conn, $sql_update_category);
        if ($result_update_category) {
            echo "<script>alert('Category updated successfully.'); window.location.href = 'categories.php?view';</script>";
        } else {
            echo "<script>alert('Error: Unable to update the category at the moment. Please try again later.');</script>";
        }
        }
?>
<form action="" method="post" class="p-4">
        <h2 class="mb-4">Category Info</h2>
        <div class="mb-3">
            <label for="category_name" class="form-label">Category Name:</label>
            <input type="text" id="category_name" name="category_name" value="<?php echo $category_name?>" class="form-control" required>
        </div>
        <div class="buttons">
    <a href="categories.php?view" class="left"><i class="fa-solid fa-arrow-left"></i> Back</a>
    <button type="submit" name="update" class="btn btn-custom">UPDATE CATEGORY</button>
    <a href="categories.php?delete=<?php echo $category_id?>" class="btn btn-danger">Delete Category</a>
    </div>
</form>

