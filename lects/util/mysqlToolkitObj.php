<?php

/**
 * Return the connection information of $dbc
 */
function getDBConnectInfo($dbc) {
  $clientInfo = $dbc->get_client_info();
  $clientVer = $dbc->client_version;
  $hostInfo = $dbc->host_info;
  $protInfo = $dbc->protocol_version;
  $serverInfo = $dbc->server_info;
  $serverVer = $dbc->server_version;

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
  $user = $_GET["user"];
  $password = $_GET["pwd"];
  $dbConnect = @new mysqli(
    $host,
    $user,
    $password,
  ); 
  if ($dbConnect->connect_error) {
    echo handleConnError($dbConnect);
    return;
  } else {
    echo "<p>Successfully connected to the MySQL server: $host</p>";

    // display connection info
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
    $used = @$dbConnect->select_db($database);
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
  $dbConnect->close();
}

/** handle connection errors and return the error message */
function handleConnError($dbConnect) {
  $errNo =  $dbConnect->connect_errno;
  $errMsg = $dbConnect->connect_error;
  return <<<BLK
  <p>Unable to connect to MySQL server</p>
  <ul>
    <li>Error no: $errNo</li>
    <li>Error content: $errMsg</li>
  BLK;
}

/** handle errors of the last MySQL function call on $dbConnect
 */
function handleFuncError($dbConnect) {
  $errNo = $dbConnect->errno;
  $errCode = $dbConnect->sqlstate;
  $errMsg = $dbConnect->error;
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
function createMySQLConnect($host, $user, $password, $database) {
  $dbConnect = @new mysqli(
    $host,
    $user,
    $password,
  ); 
  if ($dbConnect->connect_error) {
    echo handleConnError($dbConnect);
    return false;
  } else {
    $used = $dbConnect->select_db($database);
    if ($used === false) {
      return $used;
    } else {
      return $dbConnect;
    }
  }
}

function readAttribValue($dbConnect, $table, $attribName) {
  $sql = "select $attribName from $table";
  $result = $dbConnect->query($sql);
  if ($result === false) {
    return NULL;
  } else {
    // assumes: one row
    $row = $result->fetch_row();
    $val = $row[0];
    // clear result set before closing the connection
    $result->free_result();

    return $val;
  }

}

function updateQuery($dbConnect, $sql) {
  $result = $dbConnect->query($sql);
  if ($result === false) {
    return NULL;
  } else {
    return $result;
  }
}


function updateNumericAttribValue($dbConnect, $table, $attribName, $val) {
  $sql = "update $table set $attribName = $val";
  $result = $dbConnect->query($sql);
  if ($result === false) {
    return NULL;
  } else {
    return $result;
  }
}

/** 
 * A generic method to process SQL result set (does not depend on knowledge of the table structure) 
 * @param $dbConnect: connection object
 * @param $sql: the SELECT sql to execute
 * @param $fieldLabelMap: an associative array mapping field-name => field-label. This may also contain a "caption" key for the table caption.
*/
function readDataGeneric($dbConnect, $sql, $fieldLabelMap = NULL) {
  $result = $dbConnect->query($sql);
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
  $fields = $result->fetch_fields();
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

  $numFields = $result->field_count;
  // Note: could also use mysqli_fetch_assoc with the field names (extracted above)
  $row = $result->fetch_row();
  while ($row) {
    $fieldVals = "";
    for ($col = 0; $col < $numFields; $col++) {
      $fieldVals .= str_replace("{{fieldVal}}", $row[$col], $fieldValTemp);
    }
    $body .= str_replace("{{fieldVals}}", $fieldVals, $rowTemp);
    // next row
    $row = $result->fetch_row();
  }

  $view = str_replace("{{body}}", $body, $view);
  // clear result set before closing the connection
  $result->free_result();

  return $view;
}
