<?php

include "connection.php";

?>

<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
<div class="col-lg-4">
  <h2>Basic Database Connection</h2>
  <form action="" name="form1" method="post">
    <div class="form-group">
      <label for="firstname">First Name:</label>
      <input type="text" class="form-control" id="firstname" placeholder="Enter firstname" name="firstname">
    </div>
    <div class="form-group">
      <label for="lastname">Last Name:</label>
      <input type="text" class="form-control" id="lastname" placeholder="Enter lastname" name="lastname">
    </div>
    <div class="form-group">
      <label for="email">E-mail:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="contact">Contact:</label>
      <input type="text" class="form-control" id="contact" placeholder="Enter contact no." name="contact">
    </div>

    
    <button type="submit" name="insert" class="btn btn-default">Insert</button>
    <button type="submit" name="update" class="btn btn-default">Update</button>
    <button type="submit" name="delete" class="btn btn-default">Delete</button>
  </form>
</div>
</div>

<div class="col-lg-12">
<table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Contact</th>
      </tr>
    </thead>
    <tbody>
      
        <?php

            $res = mysqli_query($link, "select * from table1");
            while($row = mysqli_fetch_array($res)){
                echo"<tr>";
                echo"<td>"; echo $row["Id"]; echo"</td>";
                echo"<td>"; echo $row["firstname"]; echo"</td>";
                echo"<td>"; echo $row["lastname"]; echo"</td>";
                echo"<td>"; echo $row["email"]; echo"</td>";
                echo"<td>"; echo $row["contact"]; echo"</td>";
                echo"</tr>";
            }

        ?>
      
    </tbody>
  </table>
</div>

<?php

if(isset($_POST["insert"])){

    mysqli_query($link, "insert into table1 values(NULL, '$_POST[firstname]', '$_POST[lastname]', '$_POST[email]', '$_POST[contact]')");

}

if(isset($_POST["delete"])){

    mysqli_query($link, "delete from table1 where firstname='$_POST[firstname]'") or die (mysqli_error($link));

}

?>

</div>

</body>
</html>