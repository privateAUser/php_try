<?php
    session_start();
    include('config.php');

    
    

    $firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
 
    $conn = OpenCon();

    $query = "SELECT * FROM students WHERE email='$email'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          echo "<center> This email address already registered.. <p>  <b>id:</b> " . $row["id"]. " &emsp;<b>name:</b> " . $row["firstname"]. " " . $row["lastname"]. "&emsp;<b>email:</b> " . $row["email"]."<p><br><a href=".$_SERVER['HTTP_REFERER'].">Back</a></center>";
        }
    } else {
        $query = "INSERT INTO students (firstname, lastname, email, gender) VALUES ('$firstname', '$lastname', '$email', '$gender')";
        if ($conn->query($query) === TRUE) {
            debug_to_console("New record created successfully");
            echo "<center>Registration is successfull !!! <br><br><a href=".$_SERVER['HTTP_REFERER'].">Back</a><center>";
        } else {
            debug_to_console("Error: " . $query . "<br>" . $conn->error);
        }
    }

    CloseCon($conn);
?>