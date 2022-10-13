<!--Name: Victor Zubatyy-->
<!--StudentID: D21125389-->
<!--Project Name: Web Dynamic Application-->
<!--Class: DT211/C-->

<!--Run the index.php file first-->
<?php session_start();?>
<?php
//include the database php file to get the connection object for each php file we use that requires querying
//include the header file for the HTML navigation and other elements for site structure such as grid
    include 'database.php';
    include 'header.php';
?>

<?php
//get the connection object
$conn = connect();

//use isset function to check if the submit variable is set
if (isset($_POST["submit"])) {
    $user_name = $_POST["user-name"];
    $user_password = $_POST["user-password"];

//    querying
    $sql = "SELECT count(*) as count FROM Users where Name = '" . $user_name . "' and Password = '" . $user_password . "'";

    $user_result = mysqli_query($conn, $sql);

    $num_rows = mysqli_fetch_array($user_result);

    if ($num_rows['count'] > 0) {
        $_SESSION["username"] = $user_name;
        $_SESSION["pass"] = true;
        echo "<script>
                window.location.href='welcome.php';
                </script>";
    }

    else {
        echo "<script>alert('username and password are incorrect')</script>";
    }

}
?>
    <form action ="" method = "POST">
        <h1 class = "login-h1">LOGIN</h1>
            <div>
                <label class = "user-label" for="user-name">Username: </label>
                <input  type = "text" name="user-name">
            </div>

            <div>
                <label class = "password-label" for="user-password">Password: </label>
                <input type = "text" name="user-password">
            </div>
            <div class = "flex">
                <input class = "input-form" type = "submit" value="Submit" name="submit">
            </div>
    </form>
<?php include 'footer.php'; ?>


