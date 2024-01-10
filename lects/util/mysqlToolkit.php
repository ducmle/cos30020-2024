<?php

/**
 * Return the connection information of $dbc
 */
function getDBConnectInfo($dbc) {
  $clientInfo = mysqli_get_client_info();
  $clientVer = mysqli_get_client_version();
  $hostInfo = mysqli_get_host_info($dbc);
  $protInfo = mysqli_get_proto_info($dbc);
  $serverInfo = mysqli_get_server_info($dbc);
  $serverVer = mysqli_get_server_version($dbc);

  $info = <<<BLK
  <h3>Connection information</h3>
  <ul>
    <li>client info: {$clientInfo}</li>
    <li>client version: {$clientVer}</li>
    <li>host info: {$hostInfo}</li>
    <li>protocol info: {$protInfo}</li>
    <li>server info: {$serverInfo}</li>
    <li>server version: {$serverVer}</li>
  </ul>
  BLK;
  echo $info;
}

/**
 * Connect to a pre-defined database and display its connection information 
 * USAGE:
 * http://localhost/dev/w08/mysqlConn.php?user=admin&pwd=password&db=test
*/
function mysqlConnect() {
  $host = "localhost";
  $user = $_POST["user"];
  $password = $_POST["pwd"];
  $dbConnect = @mysqli_connect(
    $host,
    $user,
    $password,
  ); 
  if ($dbConnect === false) {
    echo handleConnError($host);
    return;
  } else {
    echo "<p>Successfully connected to the MySQL server: $host, as user: '$user'</p>";
  }

  // display connection info
  if ($dbConnect) {
    getDBConnectInfo($dbConnect);
  }

  // error handling: use '@' to suppress error messages and terminate immediately!
  /* 
  $dbConnect = @mysqli_connect(
      $host,
      $user,
      $password,
    ) or die("<p>Unable to connect to MySQL server: $host</p>"
        . "<p>Error code " . mysqli_connect_errno()
        . ": " . mysqli_connect_error() . "</p>"); */

  // choose DB to connect
  $database = $_GET["db"];
  if (!isset($database)) {
    echo("You must specify a database");
  } else {
    $used = @mysqli_select_db($dbConnect, $database);
        // or die("<p>Database ($database) is not available.</p>");
    if ($used !== false) {
      echo "<p>Successfully opened database: $database.</p>";
    } else {
      echo "<p>Database ($database) is NOT available.</p>";
      echo handleFuncError($dbConnect);
    }
  }

  // perform statements over the connection

  // close the connection
  mysqli_close($dbConnect);
}

/** handle connection errors and return the error message */
function handleConnError($host) {
  $errNo =  mysqli_connect_errno();
  $errMsg = mysqli_connect_error();
  return <<<BLK
  <p>Unable to connect to MySQL server: $host</p>
  <ul>
    <li>Error no: $errNo</li>
    <li>Error content: $errMsg</li>
  BLK;
}

/** handle errors of the last MySQL function call on $dbConnect
 */
function handleFuncError($dbConnect) {
  $errNo = mysqli_errno($dbConnect);
  $errCode = mysqli_sqlstate($dbConnect);
  $errMsg = mysqli_error($dbConnect);
  return <<<BLK
   <ul>
    <li>Error no: $errNo</li>
    <li>Error code: $errCode</li>
    <li>Error message: $errMsg</li>
   </ul>
  BLK;
}

/** 
  USAGE:
  http://localhost/dev/w08/mysqlConn.php?user=admin&pwd=password&db=test
*/
function createMySQLConnect($host, $user, $password, $database = null) {
  $dbConnect = @mysqli_connect(
    $host,
    $user,
    $password,
    $database
  );
  
  return $dbConnect;
  /* if ($dbConnect === false) {
    // handleConnError($host);
    return false;
  } else {
    $used = mysqli_select_db($dbConnect, $database);
    if ($used === false) {
      return $used;
    } else {
      return $dbConnect;
    }
  } */
}

/* Create a database named $dbc */
function createDatabase($dbConnect, $db) {
  $sql = "create database $db";
  if (@!mysqli_select_db($dbConnect, $db)) {
    // database does not exist, create it
    return @mysqli_query($dbConnect, $sql);
  } else {  // database exists
    echo "<div>Database exists: $db</div>";
    return false;
  }
}


/** return FALSE if table does not exist and failed to create it, otherwise return TRUE
 */
function createTableIfNotExists($dbConnect, $tableName, $sqlCreateTable) {
  if ($result = @mysqli_query($dbConnect, "show tables like '".$tableName."'")) {
    if($result->num_rows < 1) {
      // table does NOT exists
      return @mysqli_query($dbConnect, $sqlCreateTable);
    }
  } else {
    return FALSE;
  }
}

/** 
  USAGE:
  http://localhost/dev/w08/mysqlConn.php?user=admin&pwd=password&db=test
*/
function mysqlConnectFull() {
  $host = "localhost";
  $user = $_POST["user"];
  $password = $_POST["pwd"];
  $database = $_POST["db"];
  $dbConnect = @mysqli_connect(
      $host,
      $user,
      $password,
      $database
    ) or die("<p>Unable to connect to the database server: $database</p>"
        . "<p>Error code " . mysqli_connect_errno()
        . ": " . mysqli_connect_error() . "</p>");

  echo "<p>Successfully connected to the database: $database</p>";

  // display connection information
  if ($dbConnect) {
    getDBConnectInfo($dbConnect);
  }

  // perform statements over the connection

  // close the connection
  mysqli_close($dbConnect);
}

/** 
 * A generic method to process SQL result set (does not depend on knowledge of the table structure) 
 * @param $dbConnect: connection object
 * @param $sql: the SELECT sql to execute
 * @param $fieldLabelMap: an associative array mapping field-name => field-label. This may also contain a "caption" key for the table caption.
*/
function readDataGeneric($dbConnect, $sql, $fieldLabelMap = NULL) {
  $result = mysqli_query($dbConnect, $sql);
  $view = NULL;
  if ($result === false) {
    $view = handleFuncError($dbConnect);
    return $view;
  }

  $caption = ($fieldLabelMap != NULL && key_exists("caption", $fieldLabelMap)) 
    ? $fieldLabelMap["caption"] : "Data table";

  $view= <<<BLK
  <h3>$caption</h3>
  <table width="100%" border="1">
    <tr>
      {{head}}
    </tr>
    {{body}}
  </table>
  BLK;

  // prepare the head section based on reading column information from the result
  // if $fieldLabelMap is specified then use it, otherwise use the column names
  $headTemp = <<<BLK
  <th>{{fieldName}}</th>
  BLK;
  $head = "";
  $fields = mysqli_fetch_fields($result);
  if ($fieldLabelMap != NULL) {
    // use specified column labels
    foreach ($fieldLabelMap as $fieldName => $fieldLabel) {
      foreach ($fields as $field) {
        if ($field->name == $fieldName) {
          $head .= str_replace("{{fieldName}}", $fieldLabel, $headTemp);
          break;
        }
      }
    }
  } else {
    // use column names
    foreach ($fields as $field) {
      $head .= str_replace("{{fieldName}}", $field->name, $headTemp);
    }
  }
  $view = str_replace("{{head}}", $head, $view);

  // prepare the body from the table records
  $fieldValTemp = <<<BLK
  <td>{{fieldVal}}</td>
  BLK;
  $rowTemp = <<<BLK
  <tr>
    {{fieldVals}}
  </tr>
  BLK;
  $body = "";

  $numFields = mysqli_num_fields($result);
  // Note: could also use mysqli_fetch_assoc with the field names (extracted above)
  $row = mysqli_fetch_row($result);
  while ($row) {
    $fieldVals = "";
    for ($col = 0; $col < $numFields; $col++) {
      $fieldVals .= str_replace("{{fieldVal}}", $row[$col], $fieldValTemp);
    }
    $body .= str_replace("{{fieldVals}}", $fieldVals, $rowTemp);
    // next row
    $row = mysqli_fetch_row($result);
  }

  $view = str_replace("{{body}}", $body, $view);
  // clear result set before closing the connection
  mysqli_free_result($result);

  return $view;
}

/** execute UPDATE $sql over $dbConnect and display the result */
function updateData($dbConnect, $sql) {
  $result = @mysqli_query($dbConnect, $sql);
  $view = "<h3>Update data</h3>";
  if ($result === false) {
    $view .= handleFuncError($dbConnect);
  } else {
    $rows = mysqli_affected_rows($dbConnect);
    $view .= <<<BLK
    <p>Successfully updated data</p>
    <p>$rows rows(s) affected</p>
    BLK;
  }

  return $view;
}

/** execute $sql and return the result; */
function updateQuery($dbConnect, $sql) {
  $result = @mysqli_query($dbConnect, $sql);
  return $result;
}