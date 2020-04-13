<?php
  // For debugging only; REMOVE BEFORE PRODUCTION!
  ini_set('display_errors','1');

  // Allow console writing
  function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
      $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "');</script>";
  }

  $serverName = "localhost";
  $Uid = "mvwateradmin";
  $Pwd = "6jBNqnjTewdFnLW78fzkF7JFCCMtjAfrgEyZtZ5zxH3BSLRMrmybFNevE3sGjdmCxqrvwhgvT3GDvGp6Khve5ZJgYMY52JSZzptzZsZzfp6grFjG3S5qMSHXUk3LNSSu";
  $dbName = "mvwater";

  // Create SQL database connection
  $link = mysqli_connect($serverName, $Uid, $Pwd, $dbName);

  // Check SQL connection
  if (mysqli_connect_errno()) {
    die("Connection faied: " . $link->connect_error);
  }
  // Connection check complete, continue

  // Check if search_query is filled
  if (!isset($_POST['all_search_field'])) {
    debug_to_console($_POST['all_search_field']);
    died('There seems to be a problem with what you searched for.');
  }

  // Clean the input to prevent against injection attacks
  $searchQuery = mysqli_real_escape_string($link, $_POST['all_search_field'] );

  $sql = "SELECT AccountNo,AcctStatus,TName,TAdd1,TPhone,TEmail,TDoB
  FROM accounts WHERE AccountNo LIKE ('".$searchQuery."')
  OR AcctStatus LIKE ('".$searchQuery."')
  OR TName LIKE ('".$searchQuery."')
  OR TAdd1 LIKE ('".$searchQuery."')
  OR TPhone LIKE ('".$searchQuery."')
  OR TEmail LIKE ('".$searchQuery."')
  OR TDoB LIKE ('".$searchQuery."')";

  debug_to_console("Query to execute: $sql");

  $result = mysqli_query($link, $sql );

  // Are there any errors?
  if (mysqli_query($link, $sql)) {
    debug_to_console("Records query executed successfully.");
    debug_to_console("Retrieving records.");
    echo "Retrieving the requested records.";
    // Output the data from each row
    // Check to make sure we're not returning an empty query
    if (mysqli_num_rows($result) > 0) {
      // Iterate through rows
      while ($row = mysqli_fetch_assoc($result)) {
        echo "Account Number: ".$row["AccountNo"]."<br>";
        echo "Account Status: ".$row["AcctStatus"]."<br>";
        echo "Service Start Date: ".$row["SrtDate"]."<br>";
        echo "Tenant Name: ".$row["TName"]."<br>";
        echo "Tenant Address 1: ".$row["TAdd1"]."<br>";
        echo "Tenant Address 2: ".$row["TAdd2"]."<br>";
        echo "Tenant Address 3: ".$row["TAdd3"]."<br>";
        echo "Tenant Phone Number: ".$row["TPhone"]."<br>";
        echo "Tenant Email Address: ".$row["TEmail"]."<br>";
        echo "Tenant City: ".$row["TCity"]."<br>";
        echo "Tenant State: ".$row["TState"]."<br>";
        echo "Tenant Zip Code: ".$row["TZip"]."<br>";
        echo "Tenant Address 1: ".$row["TAdd1"]."<br>";
        echo "Tenant Driver's License Number: ".$row["TDL#"]."<br>";
        echo "Tenant Cell Phone Number: ".$row["TCell#"]."<br>";
        echo "Tenant Date of Birth: ".$row["TDoB"]."<br>";
      }
    } else {
      echo "0 results.";
    }
  } else {
    debug_to_console("Error: " . $sql . mysqli_error($link));
  }

  // Close the SQL socket connection
  mysqli_close($link);
?>
