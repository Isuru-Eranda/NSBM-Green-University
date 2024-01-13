<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Image</th>
            <th>Price</th>
            <th>Status</th>
            <th style='text-align: center'>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $sql_select_products = "SELECT * FROM `renthub_products`;";
            $result_products = mysqli_query($conn, $sql_select_products);

            if (mysqli_num_rows($result_products) > 0) {
                while ($product = mysqli_fetch_assoc($result_products)) {
                    $product_id = $product['product_id'];
                    $product_name = $product['product_name'];
                    $product_image = $product['product_image'];
                    $product_price = $product['product_price'];
                    $product_status = $product['status'];

                    echo "<tr>
                            <td>$product_id</td>
                            <td>$product_name</td>
                            <td><img src='includes/product_images/$product_image' alt='$product_name' height='40px'></td>
                            <td>$product_price</td>
                            <td>$product_status</td>
                            <td style='text-align: center'>
                                <a href='products.php?edit=$product_id'><i class='fa-solid fa-chevron-right' style='color: #000000a1;font-size: 13px;'></i></i></a>
                            </td>
                        </tr>";
                }
            }
        ?>
        <tr>
            <td colspan=6><a href="products.php?insert">+ Create New Vehicle</a></td>
        </tr>
    </tbody>
</table>