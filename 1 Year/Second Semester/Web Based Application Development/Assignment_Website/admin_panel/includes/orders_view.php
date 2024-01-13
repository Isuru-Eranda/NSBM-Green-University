<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Invoice</th>
            <th>Vehicle</th>
            <th>From</th>
            <th>Status</th>
            <th>Payment</th>
            <th style='text-align: center'>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $sql_select_orders = "SELECT * FROM `renthub_orders`;";
            $result_select_orders = mysqli_query($conn, $sql_select_orders);

            if (mysqli_num_rows($result_select_orders) > 0) {
                while ($order = mysqli_fetch_assoc($result_select_orders)) {
                    $order_id = $order['order_id'];
                    $order_invoice = $order['order_invoice'];
                    $product_id = $order['product_id'];
                    $order_from = $order['order_from'];
                    $order_status = $order['order_status'];
                    $order_amount = $order['order_amount'];
                    $order_payment = $order['order_payment'];

                    $sql_select_products = "SELECT * FROM `renthub_products` WHERE product_id=$product_id";
                    $result_select_products = mysqli_query($conn,$sql_select_products);
                    $row_select_products = mysqli_fetch_assoc($result_select_products);
                    $product_name = $row_select_products["product_name"];

                    echo "<tr>
                            <td>$order_id</td>
                            <td>$order_invoice</td>
                            <td>$product_name</td>
                            <td>$order_from</td>
                            <td>$order_status</td>
                            <td>$order_payment</td>
                            <td style='text-align: center'>
                                <a href='orders.php?edit=$order_id'><i class='fa-solid fa-chevron-right' style='color: #000000a1;font-size: 13px;'></i></a>
                            </td>
                        </tr>";
                }
            } 
        ?>
    </tbody>
</table>