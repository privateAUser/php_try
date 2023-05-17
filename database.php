<?php

function debug_to_console($data)
{
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);
    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

function OpenCon()
{
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "test";
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n" . $conn->error);

    if ($conn->connect_errno) {
        debug_to_console("Connect failed: %s<br />" + $conn->connect_errno);
    }

    debug_to_console("Connected successfully.");
    return $conn;
}

function CloseCon($conn)
{
    $conn->close();
}

function getStudentList()
{
    $conn = OpenCon();

    $query = "SELECT * FROM students";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "id:  " . $row["id"] . " - Name: " . $row["firstname"] . " " . $row["lastname"] . "    email: " . $row["email"]  . "<br>";
        }
    }
    else {
        echo "No registered student !!";
    }
}

?>