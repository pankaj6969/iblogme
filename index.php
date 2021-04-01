<?php
$db=mysqli_connect("localhost","root","","contactapp");
if(!$db){
    echo"error";
}
if (isset($_POST['ADD']))
{
    $Name=$_POST['Name'];
    $Email=$_POST['Email'];
    $Phone=$_POST['Phone'];
    $sql="INSERT INTO `contacts` (Name, Email, Phone) VALUES ( '$Name', '$Email', '$Phone')";
    mysqli_query($db,$sql);
}
if(isset($_POST['Delete'])){
    $Name=$_POST['ID'];
    $delete1 ="DELETE FROM contacts WHERE ID='$Name'";
    mysqli_query($db,$delete1);
}
$sql=" SELECT * FROM contacts";
$result=mysqli_query($db,$sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contactApp</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <div class="main">
        <h2>Add Contact</h2>
        <hr>
        <form action="index.php" method="post">
            <div class="fill">
                <!-- <label for="FirstName">First Name</label><br> -->
                Name
                <input type="text" name="Name" id="FirstName" required>
            </div>
            <div class="fill">
                <!-- <label for="LastName"> Last Name</label><br> -->
                Email
                <input type="text" name="Email" id="LastName" required>
            </div>
            <div class="fill">
                Phone
                <input type="number" name="Phone" id="Number" required>
            </div>
            <div >
                <input type="submit"  class="btn" value="ADD" name="ADD">
            </div>
        </form>
        <form action="show.php" method="show.php">
            <input type="submit"  class="btn" value="SHOW" name="SHOW">
            </form>
        <hr>
        <table >
            <td>Name</td>
            <td>Email</td>
            <td>Phone</td>
            <?php
            while($row=mysqli_fetch_array($result))
            {
                echo"<tr>";
                // echo"<td>".$row['ID']."</td> ";
                echo"<td>".$row['Name']."</td> ";
                echo"<td>".$row['Email']."</td> ";
                echo"<td>".$row['Phone']."</td> ";
                echo"<form action='index.php' method='post'>";
                echo"<input type='hidden' name='ID' value=".$row['ID'].">";
                echo"<td><input type='submit' class='btn' name='Delete' value='Delete'>";
                echo"</form>";
                echo"</tr>";
            }
            ?>
        </table>
    </div>
</body>

</html>