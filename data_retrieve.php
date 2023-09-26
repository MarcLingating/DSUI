
<!DOCTYPE html>
<html>
<head>
    <title>BE-Form-1-1</title>
    <style>
        body {
            background-color: #f7f7f7;
        }
        /* Glassmorphism styles for the form */
        .glass-container {
            background-color: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 10px;
            padding: 20px;
            max-width: 800px;
            margin: 0 auto;
            margin-top: 20px;
            margin-bottom: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        
        /* Glassmorphism styles for the form elements */
        .glass-container label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #000;
        }
        
        .glass-container select,
        .glass-container button {
            display: block;
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: none;
            border-radius: 4px;
            background-color: rgba(255, 255, 255, 0.7);
            color: #000000;
            font-size: 16px;
            font-family: Arial, sans-serif;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
        
        .glass-container button {
            background-color: #2196f3;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        
        .glass-container button:hover {
            background-color: #1e88e5;
        }
        #textFieldsContainer, #schoolsContainer, .card-header{
            background-color: #fff;
        }
        
        /* Glassmorphism styles for the table */
        
        /* Glassmorphism styles for the content container */
        .content-container {
            position: relative;
            background-color: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 10px;
            padding: 20px;
            margin: 0 auto;
            max-width: 90%;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            overflow: auto;
        }
        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        

        .fill-up-button:hover {
            background-color: #0066ff;
        }
        
        /* Container styles when index.php has width and height of 200% */
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            /* Change the background color to white */
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            /* Add a subtle box shadow */
            margin-left: 0;
        }
        
        th,
        td {
            padding: 10px;
            /* Increase the padding for better spacing */
            text-align: left;
            border-bottom: 1px solid rgba(0, 0, 0, 0.2);
            /* Darken the border color */
        }
        
        th {
            cursor: pointer;
            background-color: #f0f0f0;
            /* Change the background color for the header row */
        }
        
        /* CSS for the buttons */
        .action-button {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none;
        }
        
        .edit-button {
            background-color: #4caf50;
            /* Green color for the edit button */
        }
        
        .delete-button {
            background-color: #f44336;
            /* Red color for the delete button */
        }
        
        .view-button {
            background-color: #2196f3;
            /* Blue color for the view button */
        }
        
        /* CSS for button hover effect */
        .action-button:hover {
            opacity: 0.8;
            /* Reduce opacity on hover for a subtle effect */
        }
        
        /* CSS for button active effect */
        .action-button:active {
            transform: translateY(1px);
            /* Add a slight vertical shift on button press */
        }
        
        /* Text color and background opacity */
        .text {
            color: #000000;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 10px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <!-- Your HTML code for the page -->
    <div class="glass-container">
    
    <form method="POST">
    <?php
    include_once('connection.php');

    $database = new Connection();
    $pdo = $database->open();
    try {
        if (isset($_SESSION['login_schoolId']) && isset($_SESSION['login_schoolName'])) {
            $schoolId = $_SESSION['login_schoolId'];
            $schoolName = $_SESSION['login_schoolName'];

            // Query to fetch distinct titles and their status from 'upload_document' table
            $sql = "SELECT u.* 
                FROM upload_document u
                LEFT JOIN document_form d ON u.title = d.title AND u.document = d.document AND d.schoolName = :schoolName
                WHERE d.title IS NULL AND (u.status = 'Open' OR u.status = 'open')";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':schoolName', $schoolName);
            $stmt->execute();
            $documents = $stmt->fetchAll(PDO::FETCH_ASSOC);

        } else {
            echo "You have to log in first";
            exit; // or handle the error appropriately
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $database->close();
    ?>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="form">Form</label>
                <select class="form-control" id="form" name="documentform">
                    <option value="">Select a document</option>
                    <?php
                    if (isset($documents)) {
                        foreach ($documents as $document) {
                            $title = $document['title'];
                            $status = $document['status'];
                            $docs = $document['document'];

                            echo "<option value=\"$title\">Title: $title &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Document Name:($docs)</option>";
                        }
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="col-md-6"> </div>
        <div class="form-group"> </div>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary" name="retrieve">Select Title</button>
    </div>
</form>



</div>










<!-- Include any other content specific to the page -->

    <div class="card-header">
			<div class="card-tools">
        <?php
        // Display the "Fill Up" button
        $title = '';
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['retrieve'])) {
            $selectedDocument = $_POST['documentform'];
            if (!empty($selectedDocument)) {
                echo '<div class="button-container">';
                echo '<button type="button" class="btn btn-primary action-button fill-up-button" onclick="showTextFields()">Fill Up</button>';
                echo '<button type="button" class=" btn btn-secondary action-button back-button" onclick="goBack()">Back</button>';
                echo '</div>';
                $title = $selectedDocument;

            } else {
                // No document selected
                echo "Please select a document.";
            }
        }
        ?>
			</div>
		</div>

    <div id="schoolsContainer">
    <h1 class="text">Uploaded Document List</h1>
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
    <div class="col-lg-12">
    <div class="card card-outline card-primary">
        <div class="card-body">
            <table class="table tabe-hover table-bordered" id="list">
                <colgroup>
                    <col width="5%">
                    <col width="25%">
                    <col width="25%">
                    <col width="25%">
                    <col width="25%">
                </colgroup>
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Title</th>
                        <th>School Year</th>
                        <th>Dcoument</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
        $i = 1;
        $database = new Connection();
        $db = $database->open();
        try {
            if (isset($_SESSION['login_schoolId'])) {
                $schoolId = $_SESSION['login_schoolId'];
                $schoolName = $_SESSION['login_schoolName'];

                $sqlDocument = 'SELECT * FROM document_form WHERE schoolName = "'.$schoolName.'"';

                foreach ($db->query($sqlDocument) as $row){
                    ?>
                    <tr>
                        <td class="text-center"><?php echo $i++; ?></td>
                        <td><b><?php echo $row['title']; ?></b></td>
                        <td><b><?php echo $row['schoolyear']; ?></b></td>
                        <td><b><?php echo $row['document']; ?></b></td>
                        <td><b><?php echo $row['status']; ?></b></td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="#edit_<?php echo $row['id']; ?>" class="btn btn-success btn-sm" name = "edit" data-toggle="modal"><span class="fa fa-edit"></span> Edit</a>
                                <a href="#view_<?php echo $row['id']; ?>" class="btn btn-info btn-sm" data-toggle="modal"><span class="fa fa-eye"></span> View</a>
                                <a href="#delete_<?php echo $row['id']; ?>" class="btn btn-danger btn-sm delete_document"  data-id="<?php echo $row['id'] ?>" data-toggle="modal"><span class="fa fa-trash"></span> Delete</a>
                            </div>
                        </td>
                        <?php include('edit_delete_view_user_document.php'); ?>
                    </tr>
                    <?php
                }
            }
        } catch (PDOException $e) {
            echo "There is some problem in the query: " . $e->getMessage();
        }

        $database->close();
        ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>



<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['retrieve'])) {
    $title = '';

    if (!empty($_POST['documentform'])) {
        $title = $_POST['documentform'];
    } else {
        // No document selected
        echo "Please select a document.";
        exit; // Exit the script if no document is selected
    }

    $database = new Connection();
    $stmts = $database->open();

    $stmts = $pdo->prepare("SELECT id, title, dateupload, dateend, schoolyear, document, status FROM upload_document WHERE title = :title");
    $stmts->bindParam(':title', $title);
    $stmts->execute();
    $getData = $stmts->fetchAll(PDO::FETCH_ASSOC);

    if (count($getData) > 0) {
        // Display the data if found
        $document = $getData[0]['document'];
        $schoolyear = $getData[0]['schoolyear'];
    } else {
        // Document not found in the database
        echo "Document not found.";
        exit; // Exit the script if document not found
    }
}   
?>

<!-- HTML Section -->





    <form method="POST" action="config.php" enctype="multipart/form-data">
        <div class="container">
            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="<?php echo $title; ?>">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="schoolname">Name:</label>
                        <input type="text" class="form-control" id="schoolname" name="schoolName" value="<?php echo $_SESSION['login_name'] ?>">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="schoolname">School Name</label>
                        <input type="text" class="form-control" id="schoolname" name="schoolName" value="<?php echo $schoolName; ?>">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="schoolId">School Id</label>
                        <input type="text" class="form-control" id="schoolId" name="schoolId" value="<?php echo $schoolId; ?>">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="schoolyear">School Year</label>
                        <input type="text" class="form-control" id="schoolyear" name="schoolyear" value="<?php echo $schoolyear; ?>">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="status">Status</label>
                        <input type="text" class="form-control" id="status" name="status" value="Upload">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="document">Document</label>
                        <input type="text" class="form-control" id="document" name="document" value="<?php echo $document; ?>">
                    </div>
                </div>

                


                
            </div>

            

            <?php
try {
    // Create a new Connection instance
    $conn = new Connection();
    $db = $conn->open();

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['retrieve'])) {
        $selectedTitle = $_POST['documentform'];

        // Check if the document exists in both 'upload_document' and 'forms' tables
        $query = "SELECT COUNT(u.title) AS count FROM upload_document u INNER JOIN forms f ON u.document = f.document WHERE u.title = :title";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':title', $selectedTitle);
        $stmt->execute();
        $documentCount = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($documentCount['count'] > 0) {
            // Fetch the 'forms' data for the corresponding document
            $query = "SELECT * FROM forms WHERE document = (SELECT document FROM upload_document WHERE title = :title)";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':title', $selectedTitle);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            function displayTextField($value, $id, $name)
            {
                if (!empty($value)) {
                    echo '<div class="col-md-4">
                    <div class="form-group">
                        <label for="' . $id . '">' . $name . '</label>
                        <input type="text" class="form-control" id="' . $id . '" name="' . $id . '" placeholder="Enter ' . $name . '" value="' . $value . '">
                    </div>
                </div>';
                }
            }

            ?>

            <!-- Text Fields Display -->
            <div class="col-md-12">
                <h4>Fill Up:</h4>

                <?php
                for ($i = 1; $i <= 20; $i++) {
                    if (($i - 1) % 3 === 0) {
                        echo '<div class="row">';
                    }

                    $fieldName = 'textfield' . $i;
                    $fieldValue = $result[$fieldName] ?? '';
                    $fieldId = 'textfield' . $i;
                    $fieldNameText = 'Text Field ' . $i;

                    displayTextField($fieldValue, $fieldId, $fieldNameText);

                    if ($i % 3 === 0 || $i === 20) {
                        echo '</div>';
                    }
                }
                ?>
            </div>

            <!-- Display 'comment' and 'documentFile' fields -->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="comment">Comment</label>
                        <textarea class="form-control" id="comment" name="comment" rows="3"><?php echo $result['comment']; ?></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="documentFile">Document File</label>
                        <p><?php echo $result['documentFile']; ?></p>
                        <a href="sample.php?form_id=<?php echo $result['form_id']; ?>" class="btn btn-primary">Download Document</a>
                    </div>
                </div>

                
            </div>
            <div class="col-md-12">
                    <div class="form-group">
                        <label for="documentFile ">Insert File</label>
                        <input type="file" id="documentFile" class="documentFile" name="documentFile" >
                    </div>
                </div>

            <?php
        } else {
            echo "Document not found in both 'upload_document' and 'forms' tables.";
        }
    }
} catch (PDOException $e) {
    echo "Database connection failed: " . $e->getMessage();
}
?>


            

            <div class="form-group">
                <button type="submit" class="btn btn-success mt-3" name="add_form">Submit</button>
            </div>
        </div>
    </form>
</div>



        
    

    <script>
    // JavaScript for sorting the table
    function sortTable(columnIndex) {
      var table, rows, switching, i, x, y, shouldSwitch, switchCount = 0;
      table = document.getElementById("schoolsTable");
      switching = true;
      var descending = true;

      // Check if the table is currently sorted in descending order
      if (table.rows[1].getElementsByTagName("td")[columnIndex].innerHTML.toLowerCase() > table.rows[2].getElementsByTagName("td")[columnIndex].innerHTML.toLowerCase()) {
        descending = false;
      }

      while (switching) {
        switching = false;
        rows = table.rows;

        for (i = 1; i < (rows.length - 1); i++) {
          shouldSwitch = false;
          x = rows[i].getElementsByTagName("td")[columnIndex];
          y = rows[i + 1].getElementsByTagName("td")[columnIndex];

          // Compare the cell values based on the sorting order
          if (descending) {
            if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
              shouldSwitch = true;
              break;
            }
          } else {
            if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
              shouldSwitch = true;
              break;
            }
          }
        }

        if (shouldSwitch) {
          rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
          switching = true;
          switchCount++;
        }
      }

      // Update the values in the '#' column if a switch occurred during the loop
      if (switchCount > 0) {
        updateNumberColumn();
      } else {
        // Toggle the sorting order if no switches occurred
        descending = !descending;
        updateNumberColumn();
      }

      function updateNumberColumn() {
        var numberColumn = table.rows[0].cells[0];

        // Check the sorting order and update the values accordingly
        if (descending) {
          for (var i = 1; i < rows.length; i++) {
            rows[i].cells[0].innerHTML = rows.length - i;
          }
        } else {
          for (var i = 1; i < rows.length; i++) {
            rows[i].cells[0].innerHTML = i;
          }
        }
      }
    }
    window.addEventListener("DOMContentLoaded", function() {
    var schoolsContainer = document.getElementById("schoolsContainer");
    var textFieldsContainer = document.getElementById("textFieldsContainer");

    schoolsContainer.style.display = "block";
    textFieldsContainer.style.display = "none";
});
    function showTextFields() {
    var schoolsContainer = document.getElementById("schoolsContainer");
    var textFieldsContainer = document.getElementById("textFieldsContainer");

    schoolsContainer.style.display = "none";
    textFieldsContainer.style.display = "block";
}

    function goBack() {
    var schoolsContainer = document.getElementById("schoolsContainer");
    var textFieldsContainer = document.getElementById("textFieldsContainer");

    schoolsContainer.style.display = "block";
    textFieldsContainer.style.display = "none";
}
$(document).ready(function() {
    var maxFields = 20; // Maximum number of additional fields
    var fieldCount = 17; // Start from 17 to continue from textfield17

    // Add field button click event
    $('#addFieldBtn').click(function() {
        if (fieldCount >= maxFields) {
            alert('You have reached the maximum number of fields.');
            return;
        }

        fieldCount++;
        var newField = '<div class="row">' +
            '<div class="col-md-12">' +
            '<div class="form-group">' +
            '<label for="textfield' + fieldCount + '">Text Field ' + fieldCount + '</label>' +
            '<input type="text" class="form-control" id="textfield' + fieldCount + '" name="textfield' + fieldCount + '">' +
            '</div>' +
            '</div>' +
            '</div>';

        // Insert the new field in a new row
        $(newField).insertAfter('#form-group').hide().fadeIn();
    });
});
  </script>
  
</body>
</html>