<?php
  // For testing only; REMOVE BEFORE PRODUCTION!
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

  // Check if search_query AND search_by are filled
  if (!isset($_POST['all_search_field']) ||
  !isset($_POST['search_by'])) {
    debug_to_console($_POST['select_search_field']);
    debug_to_console($_POST['search_by']);
    died('There seems to be a problem with what you searched for.');
  }

  // Clean the input to prevent against injection attacks
  $searchQuery = mysqli_real_escape_string($link, $_POST['select_search_field'] );
  $searchBy = mysqli_real_escape_string($link, $_POST['search_by'] );

  $sql = "SELECT AccountNo,AcctStatus,TName,TAdd1,TPhone,TEmail,TDoB
  FROM accounts
  WHERE ('".$searchBy."')
  LIKE ('".$searchQuery."')";

  debug_to_console("Query to execute: $sql");

  //mysqli_query($link, $sql );

  // Are there any errors?
  if (mysqli_query($link, $sql)) {
    debug_to_console("Records query executed successfully.");
    dubug_to_console("Retrieving records.");
    echo "Retrieving the requested records.";
    // Go to another PHP file
    header('Location: results_search_select/index.php');
    die();
  } else {
    debug_to_console("Error: " . $sql . mysqli_error($link));
  }

  // Close the SQL socket connection
  mysqli_close($link);
?>
