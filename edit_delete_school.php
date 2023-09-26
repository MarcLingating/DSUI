<!-- Edit -->
<div class="modal fade" id="edit_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
			<center><h4 class="modal-title" id="myModalLabel">Edit School</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="edit_school.php?id=<?php echo $row['id']; ?>">
            
                <div class="row form-group">
                    <div class="col-sm-2">
                        <label class="control-label" style="position:relative; top:7px;">School ID:</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="schoolId" value="<?php echo $row['schoolId']; ?>">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-sm-2">
                        <label class="control-label" style="position:relative; top:7px;">School Name:</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="schoolName" value="<?php echo $row['schoolName']; ?>">
                    </div>
                </div>

				<div class="row form-group">
                    <div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">District:</label>
                    </div>
                    <div class="col-sm-10">
						<input type="text" class="form-control" name="district" value="<?php echo $row['district']; ?>">
					</div>
                </div>

                <div class="row form-group">
                    <div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Status:</label>
                    </div>
                    <div class="col-sm-10">
						<input type="text" class="form-control" name="status" value="<?php echo $row['status']; ?>">
					</div>
                </div>
				

            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="editschool" class="btn btn-primary"><span class="glyphicon glyphicon-check"></span> Update</a>
			</form>
            </div>

        </div>
    </div>
</div>


<!-- View -->
<div class="modal fade" id="view_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
			<center><h4 class="modal-title" id="myModalLabel">Edit School</h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form>
            
            <div class="row form-group">
                    <div class="col-sm-2">
                        <label class="control-label" style="position:relative; top:7px;">School ID:</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="schoolId" value="<?php echo $row['schoolId']; ?>" disabled>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-sm-2">
                        <label class="control-label" style="position:relative; top:7px;">School Name:</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="schoolName" value="<?php echo $row['schoolName']; ?>" disabled>
                    </div>
                </div>

				<div class="row form-group">
                    <div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">District:</label>
                    </div>
                    <div class="col-sm-10">
						<input type="text" class="form-control" name="district" value="<?php echo $row['district']; ?>" disabled>
					</div>
                </div>

                <div class="row form-group">
                    <div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Status:</label>
                    </div>
                    <div class="col-sm-10">
						<input type="text" class="form-control" name="status" value="<?php echo $row['status']; ?>" disabled>
					</div>
                </div>

				

            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
			</form>
            </div>

        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">               
                <center><h4 class="modal-title" id="myModalLabel">Delete School</h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">	
            	<p class="text-center">Are you sure you want to Delete</p>
				<div class="row form-group">
                    <div class="col-sm-2">
                        <label class="control-label" style="position:relative; top:7px;">School ID:</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="schoolId" value="<?php echo $row['schoolId']; ?>" disabled>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-sm-2">
                        <label class="control-label" style="position:relative; top:7px;">School Name:</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="schoolName" value="<?php echo $row['schoolName']; ?>" disabled>
                    </div>
                </div>

				<div class="row form-group">
                    <div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">District:</label>
                    </div>
                    <div class="col-sm-10">
						<input type="text" class="form-control" name="district" value="<?php echo $row['district']; ?>" disabled>
					</div>
                </div>

                <div class="row form-group">
                    <div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Status:</label>
                    </div>
                    <div class="col-sm-10">
						<input type="text" class="form-control" name="status" value="<?php echo $row['status']; ?>" disabled>
					</div>
                </div>  
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <a href="delete_school.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Yes</a>
            </div>

        </div>
    </div>
</div>