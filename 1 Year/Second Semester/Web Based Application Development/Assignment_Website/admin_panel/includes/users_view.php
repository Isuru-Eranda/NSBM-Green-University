<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Type</th>
            <th style='text-align: center'>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $sql_select_users = "SELECT * FROM `renthub_users`;";
            $result_users = mysqli_query($conn, $sql_select_users);

            if (mysqli_num_rows($result_users) > 0) {
                while ($user = mysqli_fetch_assoc($result_users)) {
                    $user_id = $user['user_id'];
                    $user_name = $user['user_email'];
                    $user_type = $user['user_type'];
                    echo "<tr>
                            <td>$user_id</td>
                            <td>$user_name</td>
                            <td>$user_type</td>
                            <td style='text-align: center'>
                                <a href='users.php?edit=$user_id'><i class='fa-solid fa-chevron-right' style='color: #000000a1;font-size: 13px;'></i></i></a>
                            </td>
                        </tr>";
                }
            }
        ?>
    </tbody>
</table>