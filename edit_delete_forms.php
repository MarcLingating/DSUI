<!-- Edit -->
<div class="modal fade" id="edit_<?php echo $row['form_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
			<center><h4 class="modal-title" id="myModalLabel">Edit Forms</h4></center>
             
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="edit_forms.php?id=<?php echo $row['id']; ?>" enctype="multipart/form-data">
            
                <div class="row form-group">
                    <div class="col-sm-2">
                        <label class="control-label" style="position:relative; top:7px;">Form ID:</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="form_id" value="<?php echo $row['form_id']; ?>">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-sm-2">
                        <label class="control-label" style="position:relative; top:7px;">Form Name:</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="document" value="<?php echo $row['document']; ?>">
                    </div>
                </div>

                <div class="row form-group">
                    
                    <div class="col-md-12">
                        <label class="control-label" style="position:relative; top:7px;">Comment:</label>
                        <input type="text" class="form-control" name="comment" value="<?php echo $row['comment']; ?>">
                    </div>
                    
                    <div class="col-md-12">
                        <label class="control-label" style="position:relative; top:7px;">File:</label>
                        <input type="file" class="form-control" name="documentFile" value="<?php echo $row['documentFile']; ?>" > 
                        <?php if (!empty($row['documentFile'])): ?>
                            <p>Current File: <?php echo $row['documentFile']; ?></p>
                        <?php else: ?>
                            <p>No file</p>
                        <?php endif; ?>
                    </div>
                </div>

				<div class="row form-group">
                    <div class="col-md-4">
						<label class="control-label" style="position:relative; top:7px;">Textfield 1:</label>
						<input type="text" class="form-control" name="textfield1" value="<?php echo $row['textfield1']; ?>">
					</div>
                    <div class="col-md-4">
						<label class="control-label" style="position:relative; top:7px;">Textfield 2:</label>
						<input type="text" class="form-control" name="textfield2" value="<?php echo $row['textfield2']; ?>">
					</div>
                    <div class="col-md-4">
						<label class="control-label" style="position:relative; top:7px;">Textfield 3:</label>
						<input type="text" class="form-control" name="textfield3" value="<?php echo $row['textfield3']; ?>">
					</div>
                    </div>

                    <div class="row form-group">
                    <!-- Textfield 4 -->
                    <div class="col-md-4">
                        <label class="control-label" style="position:relative; top:7px;">Textfield 4:</label>
                        <input type="text" class="form-control" name="textfield4" value="<?php echo $row['textfield4']; ?>">
                    </div>

                    <!-- Textfield 5 -->
                    <div class="col-md-4">
                        <label class="control-label" style="position:relative; top:7px;">Textfield 5:</label>
                        <input type="text" class="form-control" name="textfield5" value="<?php echo $row['textfield5']; ?>">
                    </div>

                    <!-- Textfield 6 -->
                    <div class="col-md-4">
                        <label class="control-label" style="position:relative; top:7px;">Textfield 6:</label>
                        <input type="text" class="form-control" name="textfield6" value="<?php echo $row['textfield6']; ?>">
                    </div>
				</div>

                <div class="row form-group">
                    <!-- Textfield 7 -->
                    <div class="col-md-12">
                        <label class="control-label" style="position:relative; top:7px;">Textfield 7:</label>
                        <input type="text" class="form-control" name="textfield7" value="<?php echo $row['textfield7']; ?>">
                    </div>
                    
                </div>
                    
                

				

            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="edit" class="btn btn-primary"><span class="glyphicon glyphicon-check"></span> Update</a>
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
			<center><h4 class="modal-title" id="myModalLabel">View Form</h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form>
            
                <div class="row form-group">
                    <div class="col-sm-2">
                        <label class="control-label" style="position:relative; top:7px;">Form ID:</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="form_id" value="<?php echo $row['form_id']; ?>" disabled>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-sm-2">
                        <label class="control-label" style="position:relative; top:7px;">Form Name:</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="document" value="<?php echo $row['document']; ?>" disabled>
                    </div>
                </div>

                <div class="row form-group">
                    
                    <div class="col-md-12">
                        <label class="control-label" style="position:relative; top:7px;">Comment:</label>
                        <input type="text" class="form-control" name="comment" value="<?php echo $row['comment']; ?>" disabled>
                    </div>
                    
                    <div class="col-md-12">
                        <label class="control-label" style="position:relative; top:7px;">File:</label>
                        <input type="file" class="form-control" name="documentFile" disabled>
                        <?php if (!empty($row['documentFile'])): ?>
                            <p>Current File: <?php echo $row['documentFile']; ?></p>
                        <?php else: ?>
                            <p>No file</p>
                        <?php endif; ?>
                    </div>
                </div>

                    <?php
                            $fieldCounter = 0;
                            for ($j = 1; $j <= 7; $j++) {
                                $textfieldValue = $row['textfield' . $j];
                                if (!empty($textfieldValue)) {
                                    if ($fieldCounter % 3 == 0) {
                                        if ($fieldCounter != 0) {
                                            echo '</div>'; // Close previous row
                                        }
                                        echo '<div class="row">'; // Start a new row
                                    }
                                    ?>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label" style="position:relative; top:7px;">Textfield <?php echo $j ?>:</label>
                                            <input type="text" class="form-control" name="textfield<?php echo $j ?>" value="<?php echo $textfieldValue; ?>" disabled>
                                        </div>
                                    </div>
                                    <?php
                                    $fieldCounter++;
                                }
                            }
                            if ($fieldCounter != 0) {
                                echo '</div>'; // Close the last row
                            }
                    ?>

				

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
                <center><h4 class="modal-title" id="myModalLabel">Delete Form</h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">	
            	<p class="text-center">Are you sure you want to Delete</p>
				<div class="row form-group">
                    <div class="col-sm-2">
                        <label class="control-label" style="position:relative; top:7px;">Form ID:</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="form_id" value="<?php echo $row['form_id']; ?>" disabled>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-sm-2">
                        <label class="control-label" style="position:relative; top:7px;">Form Name:</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="document" value="<?php echo $row['document']; ?>" disabled>
                    </div>
                </div>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <a href="delete_forms.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" name="delete"><span class="glyphicon glyphicon-trash"></span> Yes</a>

            </div>

        </div>
    </div>
</div>