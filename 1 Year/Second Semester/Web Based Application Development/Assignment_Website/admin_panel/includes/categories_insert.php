<?php
    if(isset($_POST["submit"])){
        $category_name = $_POST["category_name"];

        $sql_check_duplicate = "SELECT * FROM `renthub_categories` WHERE category_name='$category_name';";
        $result_duplicate_check = mysqli_query($conn, $sql_check_duplicate);
        $row_count = mysqli_num_rows($result_duplicate_check);

        if ($row_count != 0) {
            echo "<script>alert('Error: This category already exists. Please choose a different category.')</script>";
        } else {
            $sql_insert_category = "INSERT INTO `renthub_categories` (category_name) VALUES ('$category_name');";
            $result_insert = mysqli_query($conn, $sql_insert_category);

            if ($result_insert) {
                echo "<script>alert('Success: Category \"$category_name\" has been added.'); window.location.href = 'categories.php?view';</script>";
            } else {
                echo "<script>alert('Error: Unable to add the category at the moment. Please try again later.')</script>";
            }
        }
    }
?>
<form action="#" method="post" class="p-4">
        <h2 class="mb-4">Create New Category</h2>
        <div class="mb-3">
            <label for="newCategory" class="form-label">Category Name:</label>
            <input type="text" id="newCategory" name="category_name" class="form-control" required>
        </div>
        <button type="submit" name="submit" class="btn btn-custom">Create Category</button>
</form>

