<?php include('db_connect.php') ?>
<!-- Info boxes -->
<?php if($_SESSION['login_type'] == 1): ?>
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Users</span>
                <span class="info-box-number">
                  <?php echo $conn->query("SELECT * FROM users where type = 2")->num_rows; ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
           <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-folder"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Documents</span>
                <span class="info-box-number">
                  <?php echo $conn->query("SELECT * FROM documents  where user_id = {$_SESSION['login_id']}")->num_rows; ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
      </div>

<?php else: ?>


  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SOCMOBNET - SOCIAL MOBILIZATION AND NETWORKING</title>
    
</head>
<body>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                Welcome <?php echo $_SESSION['login_name'] ?>!
            </div>
        </div>
    </div>

        <div class="notification-container">
            <h2>New Document</h2>
            <hr>
            <div class="notification-text">
            <?php
require_once 'connection.php';

// Create an instance of the Connection class
$db = new Connection();

try {
    if (isset($_SESSION['login_schoolId']) && isset($_SESSION['login_schoolName'])) {
        $schoolId = $_SESSION['login_schoolId'];
        $schoolName = $_SESSION['login_schoolName'];

        // Open a connection to the database
        $conn = $db->open();

        // SQL query to select data from 'upload_document' where 'title' and 'document' don't match 'document_form'
        $sql = "SELECT u.*
                FROM upload_document u
                LEFT JOIN document_form d ON u.title = d.title AND u.document = d.document AND d.schoolName = :schoolName
                WHERE d.title IS NULL AND (u.status = 'Open' OR u.status = 'open')";


        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':schoolName', $schoolName, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

       
        
        function getCurrentDateTime() {
            // Set the desired timezone (e.g., 'America/New_York')
            date_default_timezone_set('Asia/Manila');
        
            $today = new DateTime();
            $formattedDateTime = $today->format('y-m-d H:i:s');
            return $formattedDateTime;
        }
        
        if ($stmt->rowCount() > 0) {
            // Create an array to store rows with upload times
            $dataWithTime = array();
        
            // Populate the array with rows and upload times
            foreach ($result as $row) {
                $uploadTime = strtotime($row["dateupload"]);
                $currentTime = strtotime(getCurrentDateTime());
                $timeDifference = $currentTime - $uploadTime;
        
                // Convert $currentTime to a 24-hour format
                $currentTime24 = date("H:i", $currentTime);
        
                $dataWithTime[] = array(
                    "row" => $row,
                    "uploadTime" => $uploadTime,
                    "timeDifference" => $timeDifference,
                    "currentTime24" => $currentTime24
                );
            }
        
            // Sort the array by upload time in descending order (newest to latest)
            usort($dataWithTime, function ($a, $b) {
                return $b["uploadTime"] - $a["uploadTime"];
            });
        
            // Output data
            foreach ($dataWithTime as $data) {
                $row = $data["row"];
                $uploadTime = $data["uploadTime"];
                $isNew = true; // Assume it's new
        
                $timeDifference = $data["timeDifference"];
                $currentTime24 = $data["currentTime24"];
        
                if ($timeDifference < 3600) {
                    // Less than 1 hour ago
                    $timeAgo = floor($timeDifference / 60) . " minutes ago";
                } elseif ($timeDifference < 86400) {
                    // Less than 24 hours ago
                    $timeAgo = floor($timeDifference / 3600) . " hours ago";
                } else {
                    // 1 day or more ago
                    $daysAgo = floor($timeDifference / 86400);
                    $timeAgo = $daysAgo . " day" . ($daysAgo > 1 ? "s" : "") . " ago";
        
                    // Remove 'New' label for uploads more than 10 hours ago
                    if ($timeDifference >= 36000) {
                        $isNew = false;
                    }
                }
        
                echo "<div id='title-" . $row["id"] . "' class='notification-text " . ($isNew ? 'new' : '') . "'>" . $row["title"];
        
                if ($isNew) {
                    echo " <span class='new-label'>New</span>";
                    
                }
        
                $currentDateTime = getCurrentDateTime();
                echo "<p class='times'>uploaded: " . $timeAgo . "</p>";
                
                echo "<p class='endtimes'>Until: " . date("M. j Y", strtotime($row['dateend'])) . "</p>";
                echo "<a class='Anobtn-primary btn-sm open' href='./index.php?page=data_retrieve' >Open</a><br>"  ."</p>";
                
        
                echo "</div> ";
            }
        }
        
         else {
            echo "No records found.";
        }
    }
} catch (PDOException $e) {
    echo "There is some problem in connection: " . $e->getMessage();
} finally {
    // Close the database connection
    $db->close();
}
?>


            </div>
        </div>



</body>
</html>

      

  
  

<?php endif; ?>
