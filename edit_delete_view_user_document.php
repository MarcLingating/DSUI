<!-- Edit -->
<div class="modal fade" id="edit_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
			<center><h4 class="modal-title" id="myModalLabel">Edit Forms</h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="edit_user_file_form.php?id=<?php echo $row['id']; ?>"  enctype="multipart/form-data">
            
                <div class="row form-group">
                    <div class="col-sm-2">
                        <label class="control-label" style="position:relative; top:7px;">Title:</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="title" value="<?php echo $row['title']; ?>">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-sm-2">
                        <label class="control-label" style="position:relative; top:7px;">School Name</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="schoolName" name="schoolName" value="<?php echo $row['schoolName']; ?>" >
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-sm-2">
                        <label class="control-label" style="position:relative; top:7px;">School ID</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="schoolId" name="schoolId" value="<?php echo $row['schoolId']; ?>" >
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-sm-2">
                        <label class="control-label" style="position:relative; top:7px;">Insert File"</label>
                    </div>
                    <div class="col-sm-10">
                    <input type="file" class="form-control" id="documentFile" name="documentFile" ">
                    <?php if (!empty($row['documentFile'])): ?>
                            <p>Current File: <?php echo $row['documentFile']; ?></p>
                        <?php else: ?>
                            <p>No file</p>
                        <?php endif; ?>
                </div>
                </div>


                <div class="row form-group">
                    <div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Document:</label>
                    </div>
                    <div class="col-sm-10">
						<input type="text" class="form-control" name="document" value="<?php echo $row['document']; ?>">
					</div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Status:</label>
                    </div>
                    <div class="col-sm-10">
                        <select class="form-control" name="status">
                            <option value="Upload"><?php echo $row['status']; ?></option>
                            <option value="Un-Upload">Un-Upload</option>
                        </select>
                    </div>

                </div>

                <div class="row form-group">
                    <div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">School Year:</label>
                    </div>
                    <div class="col-sm-10">
						<input type="text" class="form-control" name="schoolyear" value="<?php echo $row['schoolyear']; ?>">
					</div>
                </div>
				

            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" name="editdocument" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="edit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Update</a>
			</form>
            </div>

        </div>
    </div>
</div>

<!-- View -->
<div class="modal fade" id="view_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
			<center><h4 class="modal-title" id="myModalLabel">View</h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form>
            
                <div class="row form-group">
                    <div class="col-sm-2">
                        <label class="control-label" style="position:relative; top:7px;">Title:</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="title" value="<?php echo $row['title']; ?>" disabled>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-sm-2">
                        <label class="control-label" style="position:relative; top:7px;">School Name</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="dateupload" name="dateupload" value="<?php echo $row['schoolName']; ?>" disabled>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-sm-2">
                        <label class="control-label" style="position:relative; top:7px;">Insert File</label>
                    </div>
                    <div class="col-sm-10">
                    <input type="file" class="form-control flatpickr-input" id="dateend" name="dateend" " disabled>
                    <?php if (!empty($row['documentFile'])): ?>
                            <p>Current File: <?php echo $row['documentFile']; ?></p>
                        <?php else: ?>
                            <p>No file</p>
                        <?php endif; ?>
                </div>
                </div>


                <div class="row form-group">
                    <div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Document:</label>
                    </div>
                    <div class="col-sm-10">
						<input type="text" class="form-control" name="document" value="<?php echo $row['document']; ?>" disabled>
					</div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Status:</label>
                    </div>
                    <div class="col-sm-10">
                        <select class="form-control" name="status" disabled>
                            <option value="Upload"><?php echo $row['status']; ?></option>
                            <option value="Un-Upload">Un-Upload</option>
                        </select>
                    </div>

                </div>

                <div class="row form-group">
                    <div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">School Year:</label>
                    </div>
                    <div class="col-sm-10">
						<input type="text" class="form-control" name="schoolyear" value="<?php echo $row['schoolyear']; ?>" disabled>
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
                <center><h4 class="modal-title" id="myModalLabel">Delete</h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">	
            	<p class="text-center">Are you sure you want to Delete</p>
				<div class="row form-group">
                    <div class="col-sm-2">
                        <label class="control-label" style="position:relative; top:7px;">Title:</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="title" value="<?php echo $row['title']; ?>" disabled>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Document:</label>
                    </div>
                    <div class="col-sm-10">
						<input type="text" class="form-control" name="document" value="<?php echo $row['document']; ?>" disabled>
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

                <div class="row form-group">
                    <div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">School Year:</label>
                    </div>
                    <div class="col-sm-10">
						<input type="text" class="form-control" name="schoolyear" value="<?php echo $row['schoolyear']; ?>" disabled>
					</div>
                </div>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <a href="delete_user_document.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Yes</a>
            </div>

        </div>
    </div>
</div>

