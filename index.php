<!DOCTYPE html>
<html>

<head>
  <title> Registration Page </title>
</head>

<body bgcolor="Lightskyblue">
  <br>
  <br>
  <form action="registration.php" method="post" name="registration>
    <div class=" container">
    <center>
      <h1> Student Registeration Form</h1>
    </center>
    <hr>
    <br>
    <center>
      <label> Firstname: </label>
      <input type="text" name="firstname" size="25" pattern="[a-zA-Z0-9]+" required />
      <br>
      <br>
      <label> Lastname: </label>
      <input type="text" name="lastname" size="25" required />
      <br>
      <br> Email: <input type="email" id="email" name="email" required />
      <br>
      <br>
      <br>
      <label> Gender : </label>
      <input type="radio" name="gender" value="male" checked /> Male
      <input type="radio" name="gender" value="female" /> Female
      <br>
      <br>
      <br>
      <br>
      <input type="submit" name="register" value="Register" />
    </center>

    <br>
    <br>
    <br>
    <br>
    <hr>
    <center>
      <h1> Registered Students </h1>

    </center>

    </div>
  </form>

  <center>
  <div>
    <?php
      include 'database.php';
      getStudentList();
    ?>
  </div>
  <hr>
  </center>

</body>
</html>