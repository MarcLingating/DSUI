<?php
// Ensure you have a valid selected title from list.php
if (isset($_GET['selected_title'])) {
    $selectedTitle = $_GET['selected_title'];

    try {
        include_once('connection.php');
        $database = new Connection();
        $db = $database->open();

        // Query to retrieve data from document_form based on the selected title
        $sql = "SELECT * FROM document_form WHERE title = :title";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':title', $selectedTitle);
        $stmt->execute();

        // Fetch the data into an array
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Close the first query
        $stmt->closeCursor();

        // Initialize a counter for the table rows
        $rowNumber = 1;
        ?>
        <div class="col-lg-12">
            <div class="card card-outline card-primary">
                <div class="card-header"></div>
                <div class="card-body">
                    <?php
                    // Display the title regardless of whether data exists
                    echo '<h1>Title: ' . htmlspecialchars($selectedTitle) . '</h1>';
                    ?>
                    <table class="table table-hover table-bordered" id="list">
                        <colgroup>
                            <col width="5%">
                            <col width="15%">
                            <col width="15%">
                            <col width="5%">
                            <col width="15%">
                            <col width="10%">
                            <col width="20%">
                        </colgroup>
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>School Year</th>
                                <th>School ID</th>
                                <th>School Name</th>
                                <th>Document</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Check if data exists
                            if (!empty($data)) {
                                // Fetch and display the data
                                foreach ($data as $row) {
                            ?>
                                    <tr>
                                        <td class="text-center"><?= $rowNumber++ ?></td>
                                        <td><?= htmlspecialchars($row['title']) ?></td>
                                        <td><?= htmlspecialchars($row['status']) ?></td>
                                        <td><?= htmlspecialchars($row['schoolyear']) ?></td>
                                        <td><?= htmlspecialchars($row['schoolId']) ?></td>
                                        <td><?= htmlspecialchars($row['schoolName']) ?></td>
                                        <td><?= htmlspecialchars($row['document']) ?></td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                            <a href="download_user_file.php?id=<?php echo $row['id']; ?>" class="btn btn-success btn-sm"><span class="fa fa-download"></span> Download</a>
                                            <a href="download_user_file.php?id=<?php echo $row['id']; ?>" class="btn btn-info btn-sm"><span class="fa fa-eye"></span> View</a>
                                            <a href="#delete_<?php echo $row['id']; ?>" class="btn btn-danger btn-sm delete_document" data-id="<?php echo $row['id'] ?>" data-toggle="modal"><span class="fa fa-trash"></span> Delete</a>

                                            </div>
                                        </td>
                                    </tr>
                            <?php
                                }
                            } else {
                                // If no data, display an empty row
                            ?>
                               
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php
    } catch (PDOException $e) {
        // Handle database errors here, e.g., log the error or display a user-friendly message.
        echo "Database Error: " . $e->getMessage();
    }
}
?>
