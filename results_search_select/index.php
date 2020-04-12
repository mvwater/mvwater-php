<?php
  //results_search_select
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

  // Re-establish SQL database connection
  $link = mysqli_connect($serverName, $Uid, $Pwd, $dbName);

  // Check SQL connection
  if (mysqli_connect_errno()) {
    die("Connection faied: " . $link->connect_error);
  }
  // Connection check complete, continue

  // Pull SQL query from parent file
  debug_to_console($sql);
  $result = mysqli_query($link, $sql);

  if (mysqli_num_rows($result) > 0) {
    // Output data of each row
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

  mysqli_close($conn);
?>
