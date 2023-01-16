<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Edit User</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='Register.css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    
</head>
<body>
    <div class="registerform">
        <h1>Edit User Form</h1>
<?php 
    $conn = mysqli_connect('localhost', 'root', '', 'voting_system');
    if(isset($_GET['edit'])){
      $edit_email=$_GET['edit'];

    $select="select * from register where Email='$edit_email'";
    $run=mysqli_query($conn,$select);

      $row_user=mysqli_fetch_array($run);
      $FullName=$row_user['FullName'];
      $MobileNo=$row_user['MobileNo'];
      $Email=$row_user['Email'];
      $DOB=$row_user['DOB'];
      $Password=$row_user['Password'];

}
?>
        <form action="" method="POST" >
            <input type="text" name="FullName" value="<?php echo $FullName; ?>" required placeholder="Full Name">
            <input type="tel"  name="MobileNo" value="<?php echo $MobileNo; ?>" pattern="[1-9]{1}[0-9]{9}" maxlength="10" required placeholder="Mobile NO"><br>
            <input type="email" name="Email" value="<?php echo $edit_email; ?>" required placeholder="Email">
            <input type="date" name="DOB" value="<?php echo $DOB; ?>" required placeholder="Date Of Birth"><br>
            <input type="password" name="Password" value="<?php echo $Password; ?>" required placeholder="Password">
            <input type="password" name="RePassword" required placeholder="ReEnter Password"><br>
            <button type="submit" name="submit" >Submit</button>
        </form>
    </div>

    <button class="open-button" onclick="back()">Back</button>

<script>
    function back(){
        window.location="adminPanel.php";
    }
</script>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "voting_system";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

if(isset($_POST['submit'])){
     $eFullName=$_POST['FullName'];
     $eMobileNo=$_POST['MobileNo'];
     $eEmail=$_POST['Email'];
     $eDOB=$_POST['DOB'];
     $ePassword=$_POST['Password'];
     $eRePassword=$_POST['RePassword'];

if($ePassword==$eRePassword){

   $update="update register set FullName='$eFullName',MobileNo='$eMobileNo',DOB='$eDOB',Password='$ePassword' where  Email='$edit_email'";

   $run_update=mysqli_query($conn,$update);
   if($run_update===true){
       echo "<H5 style='color:green;text-align:center;'>Successfully Updated</h5>";
   }else{
       echo "<center><H5 style='color:red;text-align:center;'>Not Inseted</h5></center>".mysqli_error($conn);
   }
}else{
    echo "<H5 style='color:red;text-align:center;'>Password is not Matched with RE-Entered Password</h5>";
}
}

?>
</body>
</html>lo