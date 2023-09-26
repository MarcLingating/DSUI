<?php
    // Check if the user is logged in and has a role
    if (isset($_SESSION['login_type'])) {
        $userRole = $_SESSION['login_type'];
    } else {
        $userRole = 'client'; // Default to 'client' if the role is not set
    }
?>

<style>
.container-fluid {
  background-color: #f5f5f5;
  padding: 20px;
}

.col-lg-12 {
  display: flex;
  justify-content: center;
}

.table-container {
  display: flex;
  justify-content: center;
}

.table {
  width: 100%;
  max-width: 100%;
  border-collapse: collapse;
  table-layout: fixed;
}

.table thead th {
  background-color: #f5f5f5;
  cursor: pointer;
  padding: 10px;
  text-align: left;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}

.table tbody td {
  padding: 10px;
  vertical-align: middle;
  border-bottom: 1px solid #ddd;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}

.table tbody td img {
  width: 50px; /* Modify the width as desired */
  height: auto;
  object-fit: contain;
  cursor: pointer;
}

/* Add this CSS code to style the modal dialog */

.enlarge-image {
  display: none;
  position: fixed;
  z-index: 9999;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.9);
  overflow: auto;
}

.enlarge-content {
  margin: auto;
  display: block;
  width: 100%;
  height: 100%;
  object-fit: contain;
}

.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
  cursor: pointer;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
}

</style>

<div class="container-fluid">
  
      <?php if ($userRole === '1'): ?>
        <a href="#addnew" class="btn btn-primary" data-toggle="modal"><span class="fa fa-plus"></span> Post New</a><br><br>
      <?php endif; ?>
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
      <div class="table-container">
        <table id="announcement-table" class="table">
          <thead>
            <!-- <th>ID</th> -->
            <th data-sort="desc">Date Uploaded</th>
            <th>Picture</th>
            <th>Description</th>
            <th data-sort="desc">Date Event</th>
            <?php if ($userRole === '1'): ?><th>Action</th><?php endif; ?>
          </thead>
          <tbody>
            <?php
              //include our connection
              include_once('connection.php');
              $database = new Connection();
              $db = $database->open();
              try{ 
                $sql = 'SELECT * FROM announcement';
                
                // Check if a sort parameter is provided
                if (isset($_GET['sort'])) {
                  $sort = ($_GET['sort'] === 'desc') ? 'desc' : 'asc';
                  $sql .= ' ORDER BY dateupload ' . $sort;
                }

                foreach ($db->query($sql) as $row) {
            ?>
            <tr>
              <!-- <td><?php echo $row['id']; ?></td> -->
              <td><?php echo $row['dateupload']; ?></td>
              <td>
                <?php
                  $imagePath = $row['image'];
                  if (file_exists($imagePath)) {
                    echo '<img src="' . $imagePath . '" onclick="enlargeImage(this)">';
                  } else {
                    echo 'Image not found. File Path: ' . $imagePath;
                  }
                ?>
              </td>
              <td><?php echo $row['description']; ?></td>
              <td><?php echo $row['dateevent']; ?></td>
              <?php if ($userRole === '1'): ?>
              <td>
                <a href="#edit_<?php echo $row['id']; ?>" class="btn btn-success btn-sm" data-toggle="modal"><span class="fa fa-edit"></span> Edit</a>
                <a href="#delete_<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" data-toggle="modal"><span class="fa fa-eye"></span> Delete</a>
              </td>
              <?php endif; ?>
              <?php include('edit_delete_announcement.php'); ?>
            </tr>
            <?php 
              
              }
            }
            catch(PDOException $e){
              echo "There is some problem in connection: " . $e->getMessage();
            }

            //close connection
            $database->close();

            ?>
          </tbody>
        </table>
      </div>
    </div>
  

<!-- The modal dialog to display the enlarged image -->
<div id="enlarge" class="enlarge-image">
  <span class="close" onclick="closeModal()">&times;</span>
  <img id="enlargedImg" class="enlarge-content">
</div>

<script>
// JavaScript function to enlarge the clicked image
function enlargeImage(image) {
  var modal = document.getElementById("enlarge");
  var modalImg = document.getElementById("enlargedImg");

  modal.style.display = "flex";
  modalImg.src = image.src;
}

// JavaScript function to close the modal dialog
function closeModal() {
  var modal = document.getElementById("enlarge");
  modal.style.display = "none";
}

// JavaScript function to handle sorting
function handleSort(column) {
  var sort = column.dataset.sort === "desc" ? "asc" : "desc";
  var url = window.location.href;
  var delimiter = url.indexOf("?") !== -1 ? "&" : "?";
  var sortParam = "sort=" + sort;

  // Check if the URL already contains a sort parameter
  if (url.indexOf("sort=") > -1) {
    // Sort parameter exists, replace its value
    url = url.replace(/sort=(\w+)/, sortParam);
  } else {
    // Sort parameter does not exist, append it
    url += delimiter + sortParam;
  }

  // Redirect to the updated URL
  window.location.href = url;
}

// Get the announcement table element
var table = document.getElementById("announcement-table");

// Get the table headers
var headers = table.getElementsByTagName("th");

// Add click event listeners to the headers for sorting
for (var i = 0; i < headers.length; i++) {
  headers[i].addEventListener("click", function() {
    handleSort(this);
  });
}
</script>

<?php include('add_modal.php'); ?>
