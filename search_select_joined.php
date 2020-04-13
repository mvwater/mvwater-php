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
  !isset($_POST['search_by']) ||
  !isset($_POST['search_attribute'])) {
    debug_to_console($_POST['select_search_field']);
    debug_to_console($_POST['search_by']);
    debug_to_console($_POST['search_attribute']);
    echo "There seems to be a problem with what you searched for.<br>";
  }

  // Clean the input to prevent against injection attacks
  $searchQuery = mysqli_real_escape_string($link, $_POST['select_search_field'] );
  $searchBy = mysqli_real_escape_string($link, $_POST['search_by'] );
  $searchAttribute = mysqli_real_escape_string($link, $_POST['search_attribute'] );

if ($searchAttribute == "comments" && $searchBy == "TAdd1") {
  // Generate SQL Query
  $sql = "SELECT AccountNo,Comment
  FROM comments
  INNER JOIN accounts
  ON comments.AccountNo = accounts.AccountNo
  WHERE accounts.TAdd1
  LIKE ('".$searchQuery."')";
  // Generate links and a result
  debug_to_console("Query to execute: $sql");
  $result = mysqli_query($link, $sql );
  // Do some error checking
  if (mysqli_query($link, $sql)) {
    debug_to_console("Records query executed successfully.");
    debug_to_console("Retrieving records.");
    echo "Retrieving the requested records.<br>";
    if (mysqli_num_rows($result) > 0) {
      // Output data of each row
      while ($row = mysqli_fetch_assoc($result)) {
        echo "Account Number: ".$row["AccountNo"]."<br>";
        echo "Comment: ".$row["Comment"]."<br>";
        echo "Address: ".$row["accounts.AccountNo"]."<br>";
        echo "<br>";
        echo "<hr>";
      }
    } else {
        echo "0 results.";
    }
  } else {
    debug_to_console("Error: " . $sql . mysqli_error($link));
  }
} else if ($searchAttribute == "comments" && $searchBy == "AccountNo") {
  // Generate SQL Query
  $sql = "SELECT AccountNo,Comment
  FROM comments
  WHERE AccountNo
  LIKE ('".$searchQuery."')";
  // Generate links and a result
  debug_to_console("Query to execute: $sql");
  $result = mysqli_query($link, $sql );
  // Do some error checking
  if (mysqli_query($link, $sql)) {
    debug_to_console("Records query executed successfully.");
    debug_to_console("Retrieving records.");
    echo "Retrieving the requested records.<br>";
    if (mysqli_num_rows($result) > 0) {
      // Output data of each row
      while ($row = mysqli_fetch_assoc($result)) {
        echo "Account Number: ".$row["AccountNo"]."<br>";
        echo "Comment: ".$row["Comment"]."<br>";
        echo "<br>";
        echo "<hr>";
      }
    } else {
        echo "0 results.";
    }
  } else {
    debug_to_console("Error: " . $sql . mysqli_error($link));
  }
} else if ($searchAttribute == "consumptionhistory" && $searchBy == "TAdd1") {
  // Generate SQL Query
  $sql = "SELECT AccountNo,Bill_date,Beg_read,End_read,Read_date,Service,Cons,Amount,Penalty
  FROM consumptionhistory
  INNER JOIN accounts
  ON consumptionhistory.AccountNo = accounts.AccountNo
  WHERE accounts.TAdd1
  LIKE ('".$searchQuery."')";
  // Generate links and a result
  debug_to_console("Query to execute: $sql");
  $result = mysqli_query($link, $sql );
  // Do some error checking
  if (mysqli_query($link, $sql)) {
    debug_to_console("Records query executed successfully.");
    debug_to_console("Retrieving records.");
    echo "Retrieving the requested records.<br>";
    if (mysqli_num_rows($result) > 0) {
      // Output data of each row
      while ($row = mysqli_fetch_assoc($result)) {
        echo "Account Number: ".$row["AccountNo"]."<br>";
        echo "Address: ".$row["accounts.TAdd1"];
        echo "Bill Date: ".$row["Bill_date"]."<br>";
        echo "Beginning Reading: ".$row["Beg_read"]."<br>";
        echo "Ending Reading: ".$row["End_read"]."<br>";
        echo "Reading Date: ".$row["Read.date"]."<br>";
        echo "Service Type: ".$row["Service"]."<br>";
        echo "Consumption: ".$row["Cons"]."<br>";
        echo "Amount: ".$row["Amount"]."<br>";
        echo "Penalty: ".$row["Amount"]."<br>";
        echo "<br>";
        echo "<hr>";
      }
    } else {
        echo "0 results.";
    }
  } else {
    debug_to_console("Error: " . $sql . mysqli_error($link));
  }
} else if ($searchAttribute == "consumptionhistory" && $searchBy == "AccountNo") {
  // Generate SQL Query
  $sql = "SELECT AccountNo,Bill_date,Beg_read,End_read,Read_date,Service,Cons,Amount,Penalty
  FROM consumptionhistory
  WHERE AccountNo
  LIKE ('".$searchQuery."')";
  // Generate links and a result
  debug_to_console("Query to execute: $sql");
  $result = mysqli_query($link, $sql );
  // Do some error checking
  if (mysqli_query($link, $sql)) {
    debug_to_console("Records query executed successfully.");
    debug_to_console("Retrieving records.");
    echo "Retrieving the requested records.<br>";
    if (mysqli_num_rows($result) > 0) {
      // Output data of each row
      while ($row = mysqli_fetch_assoc($result)) {
        echo "Account Number: ".$row["AccountNo"]."<br>";
        echo "Bill Date: ".$row["Bill_date"]."<br>";
        echo "Beginning Reading: ".$row["Beg_read"]."<br>";
        echo "Ending Reading: ".$row["End_read"]."<br>";
        echo "Reading Date: ".$row["Read.date"]."<br>";
        echo "Service Type: ".$row["Service"]."<br>";
        echo "Consumption: ".$row["Cons"]."<br>";
        echo "Amount: ".$row["Amount"]."<br>";
        echo "Penalty: ".$row["Amount"]."<br>";
        echo "<br>";
        echo "<hr>";
      }
    } else {
        echo "0 results.";
    }
  } else {
    debug_to_console("Error: " . $sql . mysqli_error($link));
  }
} else if ($searchAttribute == "paymenthistory" && $searchBy == "TAdd1") {
  // Generate SQL Query
  $sql = "SELECT Payment_Key,AccountNo,Pay_date,Amount_Paid,Type,Reference,Batch,Seq
  FROM paymenthistory
  INNER JOIN accounts
  ON paymenthistory.AccountNo = accounts.AccountNo
  WHERE accounts.TAdd1
  LIKE ('".$searchQuery."')";
  // Generate links and a result
  debug_to_console("Query to execute: $sql");
  $result = mysqli_query($link, $sql );
  // Do some error checking
  if (mysqli_query($link, $sql)) {
    debug_to_console("Records query executed successfully.");
    debug_to_console("Retrieving records.");
    echo "Retrieving the requested records.<br>";
    if (mysqli_num_rows($result) > 0) {
      // Output data of each row
      while ($row = mysqli_fetch_assoc($result)) {
        echo "Account Number: ".$row["AccountNo"]."<br>";
        echo "Address: ".$row["accounts.TAdd1"]."<br>";
        echo "Internal Payment ID (this is auto-generated): ".$row["Payment_Key"]."<br>";
        echo "Payment Date: ".$row["'Pay date'"]."<br>";
        echo "Amount Paid: ".$row["'Amount Paid'"]."<br>";
        echo "Type: ".$row["Type"]."<br>";
        echo "Reference: ".$row["Reference"]."<br>";
        echo "Batch: ".$row["Batch"]."<br>";
        echo "Sequence: ".$row["Seq"]."<br>";
        echo "<br>";
        echo "<hr>";
      }
    } else {
        echo "0 results.";
    }
  } else {
    debug_to_console("Error: " . $sql . mysqli_error($link));
  }
} else if ($searchAttribute == "paymenthistory" && $searchBy == "AccountNo") {
  // Generate SQL Query
  $sql = "SELECT Payment_Key,AccountNo,Pay_date,Amount_Paid,Type,Reference,Batch,Seq
  FROM paymenthistory
  WHERE AccountNo
  LIKE ('".$searchQuery."')";
  // Generate links and a result
  debug_to_console("Query to execute: $sql");
  $result = mysqli_query($link, $sql );
  if (mysqli_query($link, $sql)) {
    debug_to_console("Records query executed successfully.<br>");
    debug_to_console("Retrieving records.<br>");
    echo "Retrieving the requested records.<br>";
    if (mysqli_num_rows($result) > 0) {
      // Output data of each row
      while ($row = mysqli_fetch_assoc($result)) {
        echo "Account Number: ".$row["AccountNo"]."<br>";
        echo "Internal Payment ID (this is auto-generated): ".$row["Payment_Key"]."<br>";
        echo "Payment Date: ".$row["'Pay date'"]."<br>";
        echo "Amount Paid: ".$row["'Amount Paid'"]."<br>";
        echo "Type: ".$row["Type"]."<br>";
        echo "Reference: ".$row["Reference"]."<br>";
        echo "Batch: ".$row["Batch"]."<br>";
        echo "Sequence: ".$row["Seq"]."<br>";
        echo "<br>";
        echo "<hr>";
      }
    } else {
        echo "0 results.";
    }
  } else {
    debug_to_console("Error: " . $sql . mysqli_error($link));
  }
} else if ($searchAttribute == "receivableshistory" && $searchBy == "TAdd1") {
  $sql = "SELECT Receiv_Key,AccountNo,Invoice,Inv_date,Amount,To_post,Amt_paid,Paid_date,Refer,Balance
  FROM receivableshistory
  INNER JOIN accounts
  ON receivableshistory.AccountNo = accounts.AccountNo
  WHERE accounts.TAdd1
  LIKE ('".$searchQuery."')";
  // Generate links and a result
  debug_to_console("Query to execute: $sql");
  $result = mysqli_query($link, $sql );
  if (mysqli_query($link, $sql)) {
    debug_to_console("Records query executed successfully.");
    debug_to_console("Retrieving records.");
    echo "Retrieving the requested records.<br>";
    if (mysqli_num_rows($result) > 0) {
      // Output data of each row
      while ($row = mysqli_fetch_assoc($result)) {
        echo "Account Number: ".$row["AccountNo"]."<br>";
        echo "Address: ".$row["accounts.TAdd1"]."<br>";
        echo "Internal Receivable ID (this is auto-generated): ".$row["Receiv_Key"]."<br>";
        echo "Invoice: ".$row["Invoice"]."<br>";
        echo "Invoice Date: ".$row["Inv_date"]."<br>";
        echo "To post: ".$row["To_post"]."<br>";
        echo "Amount paid: ".$row["Amt_paid"]."<br>";
        echo "Paid Date: ".$row["Paid_date"]."<br>";
        echo "Reference Number: ".$row["'Refer#'"]."<br>";
        echo "Balance: ".$row["Balance"]."<br>";
        echo "<br>";
        echo "<hr>";
      }
    } else {
        echo "0 results.";
    }
  } else {
    debug_to_console("Error: " . $sql . mysqli_error($link));
  }
} else if ($searchAttribute == "receivableshistory" && $searchBy == "AccountNo") {
  // Generate SQL Query
  $sql = "SELECT Receiv_Key,AccountNo,Invoice,Inv_date,Amount,To_post,Amt_paid,Paid_date,Refer,Balance
  FROM receivableshistory
  WHERE AccountNo
  LIKE ('".$searchQuery."')";
  // Generate links and a result
  debug_to_console("Query to execute: $sql");
  $result = mysqli_query($link, $sql );
  if (mysqli_query($link, $sql)) {
    debug_to_console("Records query executed successfully.");
    debug_to_console("Retrieving records.");
    echo "Retrieving the requested records.<br>";
    if (mysqli_num_rows($result) > 0) {
      // Output data of each row
      while ($row = mysqli_fetch_assoc($result)) {
        echo "Account Number: ".$row["AccountNo"]."<br>";
        echo "Internal Receivable ID (this is auto-generated): ".$row["Receiv_Key"]."<br>";
        echo "Invoice: ".$row["Invoice"]."<br>";
        echo "Invoice Date: ".$row["Inv_date"]."<br>";
        echo "To post: ".$row["To_post"]."<br>";
        echo "Amount paid: ".$row["Amt_paid"]."<br>";
        echo "Paid Date: ".$row["Paid_date"]."<br>";
        echo "Reference Number: ".$row["'Refer#'"]."<br>";
        echo "Balance: ".$row["Balance"]."<br>";
        echo "<br>";
        echo "<hr>";
      }
    } else {
        echo "0 results.";
    }
  } else {
    debug_to_console("Error: " . $sql . mysqli_error($link));
  }
} else {
  echo "Something went wrong. Were all of your search queries right?";
}

  // Close the SQL socket connection
  mysqli_close($link);
?>
