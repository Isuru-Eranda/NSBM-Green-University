<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th style='text-align: center'>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $sql_select_categories = "SELECT * FROM `renthub_categories`;";
            $result_categories = mysqli_query($conn, $sql_select_categories);

            if (mysqli_num_rows($result_categories) > 0) {
                while ($category = mysqli_fetch_assoc($result_categories)) {
                    $category_id = $category['category_id'];
                    $category_name = $category['category_name'];

                    echo "<tr>
                            <td>$category_id</td>
                            <td>$category_name</td>
                            <td style='text-align: center'>
                                <a href='categories.php?edit=$category_id'><i class='fa-solid fa-chevron-right' style='color: #000000a1;font-size: 13px;'></i></i></a>
                            </td>
                        </tr>";
                }
            }
        ?>
        <tr>
            <td colspan=3><a href="categories.php?insert">+ Create New Category</a></td>
        </tr>
    </tbody>
</table>