<?php
                $search = isset($_GET['search']) ? $_GET['search'] : '';
                $query = "SELECT * FROM create_book WHERE book_name LIKE '%$search%' OR author_name LIKE '%$search%'";
                $query_run = mysqli_query($con, $query);
                $total_pages = ceil(mysqli_num_rows($query_run) / 10);
                $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                $offset = ($current_page - 1) * 10;
                $query .= " LIMIT $offset, 10";

                $query_run = mysqli_query($con, $query);

                if (mysqli_num_rows($query_run) > 0) {
                    foreach ($query_run as $row) {
                ?>
                        <tr>
                            <td><img src="<?= $row['img_url'] ?>" height="100px"></td>
                            <td><?php echo $row['book_id']; ?></td>
                            <td><?php echo $row['author_name']; ?></td>
                            <td><?php echo $row['book_name']; ?></td>
                            <td><?php echo $row['book_description']; ?></td>
                            <td><?php echo $row['img_url']; ?></td>
                            <td><a href="../view/bookedit.view.php?id= <?php echo $row['id']?>"><button type="submit_edit" class="btn btn-success">EDIT</button></a></td>
                            <td><button type="button" class="btn btn-danger deletebtn" data-id="<?php echo $row['book_id']; ?>">DELETE</button></td>
                        </tr>
                    <?php
                    }
                    // Pagination
                    if ($total_pages > 1) {
                    ?>
                        <tr>
                            <td colspan="8">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-center">
                                        <?php
                                        for ($i = 1; $i <= $total_pages; $i++) {
                                            $active = ($i == $current_page) ? ' active' : '';
                                            echo '<li class="page-item' . $active . '"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
                                        }
                                        ?>
                                    </ul>
                                </nav>
                            </td>
                        </tr>
                    <?php
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="8">No records found.</td>
                    </tr>
                <?php
                }
                ?>