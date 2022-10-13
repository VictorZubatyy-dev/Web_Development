<!--Name: Victor Zubatyy-->
<!--StudentID: D21125389-->
<!--Project Name: Web Dynamic Application-->
<!--Class: DT211/C-->
<?php session_start();?>
<?php include 'header_logout.php';

    echo "<h1>Welcome " .  $_SESSION["username"] . "</h1>";

//    logout button destroys the data within the session such as the variable pass and username which is needed for admin access
if (isset($_POST["logout"])){
    session_destroy();
    header("Location: index.php");
}
?>

<form action ="" method = "POST">
    <div class = "flex">
        <input class = "input-form" type = "submit" value="Logout" name="logout">
    </div>

<?php include "footer.php" ?>

