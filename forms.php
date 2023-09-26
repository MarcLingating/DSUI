<body>
  <div class="glass-container">
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
    <form method="post" action="add_forms.php" enctype="multipart/form-data">
      <label for="formId">Form ID:</label>
      <input type="text" id="formId" name="form_id" class="glass-input" placeholder="Enter Form ID">
      
      <label for="formName">Form Name:</label>
      <input type="text" id="formName" name="document" class="glass-input" placeholder="Enter Form Name">
      
      <h3>Data to Fill up:</h3>
      <div class="row form-group">
        <div class="col-md-12">
          <label for="comment">Comment</label>
        <textarea type="comment" id="comment" class="glass-input" name="comment" placeholder="Enter Comment"></textarea>
        <label for="file">Insert File</label>
        <input type="file" id="file" class="glass-input" name="documentFile" >
        </div>
      </div>
      <div class="input-row">
        <input type="text" id="textfield1" class="glass-input" name="textfield1" placeholder="Textfield 1">
        <input type="text" id="textfield2" class="glass-input" name="textfield2" placeholder="Textfield 2">
        <input type="text" id="textfield3" class="glass-input" name="textfield3" placeholder="Textfield 3">
        </div>
        <div class="input-row">
        <input type="text" id="textfield4" class="glass-input" name="textfield4" placeholder="Textfield 4">
        <input type="text" id="textfield5" class="glass-input" name="textfield5" placeholder="Textfield 5">
        <input type="text" id="textfield6" class="glass-input" name="textfield6" placeholder="Textfield 6">
        </div>
        <div class="input-row">
        <input type="text" id="textfield7" class="glass-input" name="textfield7" placeholder="Textfield 7">
        </div>
        

            
      <button type="submit" name="addform">Submit</button>
    </form>
  </div>
</body>
</html>
