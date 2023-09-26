<div class="col-lg-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <div class="card-tools">
                <a class="btn btn-block btn-sm btn-default btn-flat border-primary" href="./index.php?page=new_document"><i class="fa fa-plus"></i> Add New</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover table-bordered" id="list">
                <colgroup>
                    <col width="10%">
                    <col width="25%">
                    <col width="35%">
                    <col width="20%">
                    <col width="10%">
                </colgroup>

                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>User</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php // Replace the PHP code with dummy data for demonstration ?>
                    <tr>
                        <th class="text-center">1</th>
                        <td><b>Title 1</b></td>
                        <td><b class="truncate">Description 1</b></td>
                        <td>User 1</td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="#" class="btn btn-primary btn-flat">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="#" class="btn btn-info btn-flat">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <button type="button" class="btn btn-danger btn-flat delete_document" data-id="1">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th class="text-center">2</th>
                        <td><b>Title 2</b></td>
                        <td><b class="truncate">Description 2</b></td>
                        <td>User 2</td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="#" class="btn btn-primary btn-flat">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="#" class="btn btn-info btn-flat">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <button type="button" class="btn btn-danger btn-flat delete_document" data-id="2">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#list').dataTable();

        $('.delete_document').click(function () {
            _conf("Are you sure to delete this document?", "delete_document", [$(this).attr('data-id')]);
        });
    });

    function delete_document($id) {
        // Replace the AJAX code with your own implementation for deletion
        // For demonstration purposes, show an alert and then reload the page after 1.5 seconds
        start_load();
        setTimeout(function () {
            alert("Data successfully deleted");
            location.reload();
        }, 1500);
    }
</script>
