<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

  <div class="container">
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
    <form method="post" action="add_upload_document.php" enctype="multipart/form-data">
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" required>
      </div>

      <div class="form-group">
        <label for="schoolyear">School Year</label>
        <input type="text" class="form-control" id="schoolyear" name="schoolyear" value="<?php echo date('Y'); ?>" readonly>
      </div>
        
      <div class="date form-group">
  <label for="dateupload">Date Upload</label>
  <input type="text" class="form-control" id="dateupload" name="dateupload">
</div>

      <div class="form-group">
        <label for="dateend">End Date</label>
          <input type="text" class="form-control flatpickr-input" id="dateend" name="dateend">
      </div>

      <div class="form-group">
        <label for="status">Status</label>
          <select class="form-control" id="status" name="status">
              <option value="Open">Open</option>
              <option value="Close">Close</option>
          </select>
      </div>
        
      <div class="form-group">
        <?php
        include_once('connection.php');
        
        $database = new Connection();
        $db = $database->open();

        try {
          $stmt = $db->prepare("SELECT * FROM forms");
          $stmt->execute();
          $forms = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
          echo "Error: " . $e->getMessage();
        }

        $database->close();
        ?>

        <label for="form">Form</label>
        <select class="form-control" id="form" name="document">
          <?php foreach ($forms as $form) { ?>
            <option value="<?php echo $form['document']; ?>"><?php echo $form['document']; ?></option>
          <?php } ?>
        </select>

      </div>
        
      <button type="submit" class="btn btn-primary" name="add">Submit</button>
    </form>
  </div>

  <script>
  function getCurrentDateTime() {
    var today = new Date();
    var year = today.getFullYear();
    var month = (today.getMonth() + 1).toString().padStart(2, '0'); // Ensure two-digit month
    var day = today.getDate().toString().padStart(2, '0'); // Ensure two-digit day
    var hours = today.getHours().toString().padStart(2, '0'); // Ensure two-digit hours
    var minutes = today.getMinutes().toString().padStart(2, '0'); // Ensure two-digit minutes
    var seconds = today.getSeconds().toString().padStart(2, '0'); // Ensure two-digit seconds

    var formattedDateTime = year + '-' + month + '-' + day + ' ' + hours + ':' + minutes + ':' + seconds;
    return formattedDateTime;
  }

  flatpickr("#dateend", {
    enableTime: true,
    dateFormat: "Y-m-d H:i:S", // Use uppercase H for 24-hour format and S for seconds
    time_24hr: true, // Add this line to use 24-hour time format
  });

  flatpickr("#dateupload", {
    enableTime: true,
    dateFormat: "Y-m-d H:i:S", // Use uppercase Y for the year
    time_24hr: true, // Add this line to use 24-hour time format
    defaultDate: getCurrentDateTime(),
  });

  // Set the value of the disabled "School-year" field to the current date and time
  document.getElementById('dateupload').value = getCurrentDateTime();
</script>
</head>
</html>
