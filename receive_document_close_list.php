<div class="col-lg-12">
    <div class="card card-outline card-primary">
    <div class="col-md-5 center">
            <?php 

                if(isset($_SESSION['message'])){
            ?>
                <div class="alert alert-info text-center" style="margin-top:20px;">
                <?php  echo $_SESSION['message']; ?>
                </div>
            <?php
                unset($_SESSION['message']);
                }
            ?>
            </div>
    <div class="card-header">
        </div>
        <div class="card-body">
            <!-- ... (previous code) ... -->

<table class="table table-hover table-bordered" id="list">
    <colgroup>
        <col width="5%">
        <col width="12%">
        <col width="12%">
        <col width="12%">
        <col width="12%">
        <col width="12%">
        <col width="12%">
        <col width="12%">
    </colgroup>
    <thead>
        <tr>
            <th class="text-center">#</th>
            <th>Title</th>
            <th>Date Upload</th>
            <th>Date End</th>
            <th>School Year</th>
            <th>Document</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1; // Initialize the counter
        try {
            include_once('connection.php');
            $database = new Connection();
            $db = $database->open();

            $sql = "SELECT * FROM upload_document";

            foreach ($db->query($sql) as $row) {
                // Check if the status is 'Close' or 'close' before displaying the row
                if (strtolower($row['status']) === 'close') {
                    displayDocumentRow($row, $i); // Pass $i to the function
                    $i++;
                }
            }
        } catch (PDOException $e) {
            echo "An error occurred: " . $e->getMessage();
        }

        function displayDocumentRow($row, $counter) {
            ?>
            <!-- Display the HTML table row -->
            <tr>
                <td class="text-center"><?= $counter ?></td>
                <td><?= $row['title'] ?></td>
                <td><?= $row['dateupload'] ?></td>
                <td><?= $row['dateend'] ?></td>
                <td><?= $row['schoolyear'] ?></td>
                <td><?= $row['document'] ?></td>
                <td>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="statusDropdown" data-toggle="dropdown">
                            <?php echo $row['status']; ?>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="statusDropdown">
                            <a class="dropdown-item update-status" data-id="<?php echo $row['id']; ?>" data-status="Open" href="#">Open</a>
                            <a class="dropdown-item update-status" data-id="<?php echo $row['id']; ?>" data-status="Close" href="#">Close</a>
                        </div>
                    </div>
                </td>
                <td class="text-center">
                    <div class="btn-group">
                        <a href="#edit_<?php echo $row['id']; ?>" class="btn btn-success btn-sm" data-toggle="modal"><span class="fa fa-edit"></span> Edit</a>
                        <a href="./index.php?page=view_receive_document&selected_title=<?php echo $row['title']; ?>" class="btn btn-info btn-sm delete_document"><span class="fa fa-eye"></span> View</a>
                        <a href="#delete_<?php echo $row['id']; ?>" class="btn btn-danger btn-sm delete_document"  data-id="<?php echo $row['id'] ?>" data-toggle="modal"><span class="fa fa-trash"></span> Delete</a>
                    </div>
                </td>
                <?php include('edit_delete_receive_document.php'); ?>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>

<!-- ... (rest of the code) ... -->

        </div>
    </div>
</div>
<script>
$(".update-status").click(function(event) {
    event.preventDefault();
    var id = $(this).data("id");
    var status = $(this).data("status");
    
    console.log("Clicked on update status. ID: " + id + ", Status: " + status);
    
    $.ajax({
        url: "update_status.php",
        type: "POST",
        data: { id: id, status: status },
        success: function(response) {
            console.log("Update response:", response);
            
            // Check if the response is "close"
            if (response === "close") {
                // Do something when "close" is returned, for example:
                alert("The status is now closed.");
            } else {
                // Handle other responses
                // Add any necessary logic based on the response
            }
        },
        error: function(xhr, status, error) {
            console.error("Update error:", error);
        }
    });
});
</script>

