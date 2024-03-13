<?php
// require_once("./mysqlToolkit.php");
require_once("../util/mysqlToolkit.php");

main();

function main() {
  //  1. connect to database and keep the connection object in a variable
  $host = "localhost";
  $db = "test";
  $dbConnect = createMySQLConnect($host, "admin", "password", $db);

  if ($dbConnect === false) {
    // echo "<p>Failed to connect to database: $db</p>";
    echo handleConnError($host);
  } else {
    // 2. manipulate data in the database
    echo "<p>Successfully connected to database: $db</p>";

    // check if a table exists
    $tableName = "inventory";
    $tableExist = isTableExist($dbConnect, $tableName);
    echo "<p>Table: <b>$tableName</b>: ". ($tableExist ? "EXISTS": "does NOT exist") . "</p>";

    // execute an SQL
    // using indexed array
    readDataSimpleIndexed($dbConnect);

    // using associative array
    readDataSimpleAssoc($dbConnect);
    
    // a generic method (does not depend on prior knowledge of the table structure)
    echo readDataGeneric($dbConnect, 
      // "select * from inventory"
      "select * from cars"
    );

    // INSERT, UPDATE, DELETE
    echo updateData($dbConnect, 
      // INSERT
      // "insert into inventory values(11, 'VinFast 2', 'VI11', 1001, 11)"
      // UPDATE
        // "update inventory set price = 3000 where make like 'VinFast%'"
      // DELETE
      "delete from inventory where quantity < 12"
    );

    readDataSimpleIndexed($dbConnect);

    // 3. close the connection
    mysqli_close($dbConnect);
  }
}

// execute a test SQL and display the result set using INDEXED array
function readDataSimpleIndexed($dbConnect) {
  $sql = "select * from inventory";
  $result = mysqli_query($dbConnect, $sql);
  if ($result === false) {
    echo handleFuncError($dbConnect);
    return;
  }

  $view = <<<BLK
  <h3>Using INDEXED array for row data</h3>
  <table width="100%" border="1">
    <tr>
      <th>Item number</th>
      <th>Make</th>
      <th>Model</th>
      <th>Price</th>
      <th>Quantity</th>
    </tr>
    {{body}}
  </table>
  BLK;
  
  $row = mysqli_fetch_row($result);
  $body = '';
  while ($row) {
    $body .= <<<ROW
      <tr>
        <td>{$row[0]}</td>
        <td>{$row[1]}</td>
        <td>{$row[2]}</td>
        <td>{$row[3]}</td>
        <td>{$row[4]}</td>
      </tr>
    ROW;
    // next row
    $row = mysqli_fetch_row($result);
  }

  $view = str_replace("{{body}}", $body, $view);

  echo $view;

  // clear result set before closing the connection
  mysqli_free_result($result);
}

// execute a test SQL and display the result set using ASSOCIATIVE array
function readDataSimpleAssoc($dbConnect) {
  $sql = "select * from inventory";
  $result = mysqli_query($dbConnect, $sql);
  if ($result === false) {
    echo handleFuncError($dbConnect);
    return;
  }

  $view= <<<BLK
  <h3>Using ASSOCIATIVE array for row data</h3>
  <table width="100%" border="1">
    <tr>
      <th>Item number</th>
      <th>Make</th>
      <th>Model</th>
      <th>Price</th>
      <th>Quantity</th>
    </tr>
    {{body}}
  </table>
  BLK;

  $row = mysqli_fetch_assoc($result);
  $body = '';
  while ($row) {
    $body .= <<<ROW
      <tr>
        <td>{$row["item_number"]}</td>
        <td>{$row["make"]}</td>
        <td>{$row["model"]}</td>
        <td>{$row["price"]}</td>
        <td>{$row["quantity"]}</td>
      </tr>
    ROW;
    // next row
    $row = mysqli_fetch_assoc($result);
  }

  $view = str_replace("{{body}}", $body, $view);

  echo $view;

  // clear result set before closing the connection
  mysqli_free_result($result);
}