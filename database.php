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
            echo "<center><p><b>id:</b>  " . $row["id"] . " &emsp; <b>name:</b> " . $row["firstname"] . " " . $row["lastname"] . " &emsp;<b>email:</b> " . $row["email"]  . " <b> &emsp; gender:</b> ". $row["gender"] ."</p></center>";
        }
    }
    else {
        echo "No registered student !!";
    }
}

?>