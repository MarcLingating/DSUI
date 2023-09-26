<!-- Edit -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<div class="modal fade" id="edit_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
			<center><h4 class="modal-title" id="myModalLabel">Edit</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="edit_receive_document.php?id=<?php echo $row['id']; ?>">
            
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
                        <label class="control-label" style="position:relative; top:7px;">Date Upload</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="dateupload" name="dateupload" value="<?php echo $row['dateupload']; ?>" >
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-sm-2">
                        <label class="control-label" style="position:relative; top:7px;">Date End"</label>
                    </div>
                    <div class="col-sm-10">
                    <input type="text" class="form-control flatpickr-input" id="dateend" name="dateend" value="<?php echo $row['dateend']; ?>">
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
                            <option value="Open" <?php if ($row['status'] == 'Open') echo 'selected'; ?>>Open</option>
                            <option value="Close">Close</option>
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
                <button type="submit" name="editschool" class="btn btn-primary"><span class="glyphicon glyphicon-check"></span> Update</a>
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
                <center><h4 class="modal-title" id="myModalLabel">Delete Document</h4></center>
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
                        <label class="control-label" style="position:relative; top:7px;">Date Upload</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="dateupload" name="dateupload" value="<?php echo $row['dateupload']; ?>" disabled>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-sm-2">
                        <label class="control-label" style="position:relative; top:7px;">Date End"</label>
                    </div>
                    <div class="col-sm-10">
                    <input type="text" class="form-control flatpickr-input" id="dateend" name="dateend" value="<?php echo $row['dateend']; ?>" disabled>
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
                <a href="delete_receive_document.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Yes</a>
            </div>

        </div>
    </div>
</div>

<script>
  flatpickr("#dateend", {
    enableTime: true,
    dateFormat: "Y-m-d H:i:S", // Use uppercase H for 24-hour format and S for seconds
    time_24hr: true, // Add this line to use 24-hour time format
  });

  flatpickr("#dateupload", {
    enableTime: true,
    dateFormat: "Y-m-d H:i:S", // Use uppercase H for 24-hour format and S for seconds
    time_24hr: true, // Add this line to use 24-hour time format
    defaultDate: getCurrentDateTime(),
  });


</script>
