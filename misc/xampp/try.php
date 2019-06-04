<?php

// Connects to the XE service (i.e. database) on the "localhost" machine
$conn = oci_connect('system', 'STUDENT', 'localhost:1521/xe');
if (!$conn) {
    $e = oci_error();
    echo "error";
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

// $stid = oci_parse($conn, 'SELECT * FROM employees');
// oci_execute($stid);

echo "<table border='1'>\n";

?>