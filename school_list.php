<div class="col-lg-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered dataTable" id="list">
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
                <colgroup>
                    <col width="5%">
                    <col width=17%">
                    <col width="17%">
                    <col width="17%">
                    <col width="17%">
                    <col width="25%">
                </colgroup>
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>School ID</th>
                        <th>School Name</th>
                        <th>District</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $i = 1;
                $where = '';
try {
    include_once('connection.php');
    $database = new Connection();
    $db = $database->open();

    $sql = "SELECT * FROM school";
    foreach ($db->query($sql) as $row) {
?>

<!-- Now, inside your HTML table body, populate the rows with fetched data -->

    <tr>
        <td class="text-center"><?php echo $i++ ?></th>
        <td><?= $row['schoolId'] ?></td>
        <td><?= $row['schoolName'] ?></td>
        <td><?= $row['district'] ?></td>
        <td><?= $row['status'] ?></td>
        <td class="text-center">
            <div class="btn-group">
                <a href="#edit_<?php echo $row['id']; ?>" class="btn btn-success btn-sm" data-toggle="modal"><span class="fa fa-edit"></span> Edit</a>
		        <a href="#view_<?php echo $row['id']; ?>" class="btn btn-info btn-sm" data-toggle="modal"><span class="fa fa-eye"></span> View</a>
		        <a href="#delete_<?php echo $row['id']; ?>" class="btn btn-danger btn-sm delete_document"  data-id="<?php echo $row['id'] ?>" data-toggle="modal"><span class="fa fa-trash"></span> Delete</a>
	        </div>
        </td>
        <?php include('edit_delete_school.php'); ?>
    </tr>
    <?php
    }
} catch (PDOException $e) {
    // Handle any exceptions that occur during the database operations
    echo "An error occurred: " . $e->getMessage();
}
?>


                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#list').dataTable();

    });

</script>
