<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  
  <title>Add New School</title>
</head>
<body>

<div class="container">
  <h1 class="text-center">Add New School</h1>
  <?php 
    if(isset($_SESSION['message'])){
  ?>
    <div class="alert alert-info text-center" style="margin-top:20px;">
      <?php echo $_SESSION['message']; ?>
    </div>
  <?php
      unset($_SESSION['message']);
    }
  ?>
  <form method="post" action="add_school.php">
    <div class="form-group">
    <label for="schoolId">School ID</label>
    <input type="text" class="form-control" id="schoolId" name="schoolId" required>
      
    </div>
    <div class="form-group">
      <label for="schoolName">School Name</label>
      <input type="text" class="form-control" id="schoolName" name="schoolName" required>
    </div>
    <div class="form-group">
    <label for="district">District</label>
      <select class="form-control" id="district" name="district" required>
        <option value="">Select District</option>
        <option value="district1">District 1</option>
        <option value="district2">District 2</option>
        <option value="district3">District 3</option>
        <!-- Add more options as needed -->
      </select>
    </div>
    <div class="form-group">
      <label for="status">Status</label>
        <select class="form-control" id="status" name="status" required>
        <option value="">Select Status</option>
        <option value="active">Active</option>
        <option value="inactive">Inactive</option>
        <!-- Add more options as needed -->
        </select>
      
    </div>
    <button type="submit" class="btn btn-primary" name="add">Submit</button>
  </form>
</div>

</body>
</html>
