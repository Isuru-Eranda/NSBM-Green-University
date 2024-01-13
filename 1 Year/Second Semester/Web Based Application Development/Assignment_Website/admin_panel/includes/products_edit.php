<?php
    if(isset($_GET["edit"])) {
        $product_id = $_GET["edit"];
        $sql_select_product = "SELECT * FROM `renthub_products` WHERE product_id=$product_id;";
        $result_select_product = mysqli_query($conn,$sql_select_product);
        $row_select_product = mysqli_fetch_assoc($result_select_product);
        $product_name = $row_select_product["product_name"];
        $product_price = $row_select_product["product_price"];
        $product_category_id = $row_select_product["category_id"];
        $product_desc = $row_select_product["product_desc"];
        $product_image = $row_select_product["product_image"];
        $product_keywords = $row_select_product["product_keywords"];
        $product_status = $row_select_product["status"];
    }
    if(isset($_POST["update"])){
        $new_product_name = $_POST["product_name"];
        $new_product_price = $_POST["product_price"];
        $new_product_category = $_POST["product_category"];
        $new_product_desc = $_POST["product_desc"];
        $new_product_image = $_FILES["product_image"]["name"];
        $new_product_tmpimage = $_FILES["product_image"]["tmp_name"];
        $new_product_keywords = $_POST["product_keywords"];
        $new_product_status = $_POST["product_status"];

        if (!empty($new_product_image)) {
            move_uploaded_file($new_product_tmpimage, "C:/xampp/htdocs/Assignment_Website/admin_panel/includes/product_images/$new_product_image");
        } else {
            $new_product_image = $product_image;
        }
        $sql_update_product = "UPDATE `renthub_products` SET product_name='$new_product_name',product_price=$new_product_price,category_id=$new_product_category,product_desc='$new_product_desc',product_image='$new_product_image',product_keywords='$new_product_keywords',status='$new_product_status' WHERE product_id=$product_id;";
        $result_update_product = mysqli_query($conn, $sql_update_product);
        if ($result_update_product) {
            echo "<script>alert('Product updated successfully.'); window.location.href = 'products.php?view';</script>";
        } else {
            echo "<script>alert('Error: Unable to update the product at the moment. Please try again later.');</script>";
        }
        }
?>
<form action="" method="post" enctype="multipart/form-data" class="p-4">
    <h2 class="mb-4">Vehicle Info</h2>
    <div class="row mb-3">
        <div class="col-md-4">
            <label for="productName" class="form-label">Vehicle Name:</label>
            <input type="text" id="productName" name="product_name" value="<?php echo $product_name;?>" class="form-control" required>
        </div>

        <div class="col-md-4">
            <label for="price" class="form-label">Price:</label>
            <input type="number" id="price" name="product_price" value="<?php echo $product_price;?>" class="form-control" required>
        </div>

        <div class="col-md-4">
            <label for="category" class="form-label">Category:</label>
            <select id="category" name="product_category" class="form-select" required>
                <?php
                $sql_select_categories = "SELECT * FROM `renthub_categories`;";
                $result_categories = mysqli_query($conn, $sql_select_categories);
    
                if (mysqli_num_rows($result_categories) > 0) {
                    while ($category = mysqli_fetch_assoc($result_categories)) {
                        $category_id = $category['category_id'];
                        $category_name = $category['category_name'];
                        if($category_id == $product_category_id) {
                            echo "<option value=$category_id selected>$category_name</option>";
                        } else {
                            echo "<option value=$category_id>$category_name</option>";
                        }
                    }
                }
                ?>
            </select>
        </div>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Description:</label>
        <textarea id="description" name="product_desc" rows="4" class="form-control" required><?php echo $product_desc;?></textarea>
    </div>

    <div class="mb-3">
        <label for="image" class="form-label">Image:</label>
        <input type="file" id="image" name="product_image" class="form-control" accept="image/*">
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
        <label for="keywords" class="form-label">Keywords (comma-separated):</label>
        <input type="text" id="keywords" name="product_keywords" value="<?php echo $product_keywords;?>" class="form-control" required>
        </div>
        <div class="col-md-6">
        <label for="status" class="form-label">Status:</label>
        <select id="status" name="product_status" class="form-select" required>
            <?php
                    if($product_status == 'true') {
                        echo "<option value='true' selected>true</option>";
                    } else {
                        echo "<option value='true'>true</option>";
                    }
                    if($product_status == 'false') {
                        echo "<option value='false' selected>false</option>";
                    } else {
                        echo "<option value='false'>false</option>";
                    }
            ?>
        </select>
    </div>
    </div>

    <div class="buttons">
    <a href="products.php?view" class="left"><i class="fa-solid fa-arrow-left"></i> Back</a>
    <button type="submit" name="update" class="btn btn-custom">UPDATE VEHICLE</button>
    <a href="products.php?delete=<?php echo $product_id?>" class="btn btn-danger">Delete Vehicle</a>
    </div>
</form>

