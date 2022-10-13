<!--Name: Victor Zubatyy-->
<!--StudentID: D21125389-->
<!--Project Name: Web Dynamic Application-->
<!--Class: DT211/C-->
<?php session_start();?>
<?php include 'header_logout.php';
      include 'database.php';

        if ($_SESSION["pass"] != true){
            echo "<script>
                alert('you do not have permission to view this page');
                window.location.href='index.php';
                </script>";
        }

        if($_SESSION["username"] != "Victor"){
            echo "<script>
                alert('You are not authorised to view this page.');
                window.location.href='welcome.php';
            </script>";

        }

        if (isset($_POST["add"])) {
            $product = $_POST["product"];
            $description = $_POST["description"];
            $price = $_POST["price"];
            $stock = $_POST["stock"];

            $sql = "insert into Product (Product, Description, Price, Stock) VALUES ('$product', '$description', $price, $stock)";

            $conn = connect();

            $user_result = mysqli_query($conn, $sql);

            if ($user_result == true) {
                echo "<h3>New record created successfully</h3>";
            } else {
//                echo "Error: " . $sql . "<br>" . $_SESSION["conn"]->error;
                echo "You did not enter the correct values. Please try again.";
            }

        }

        if (isset($_POST["logout"])) {
            session_destroy();
            header("Location: index.php");
}
?>

<form action ="" method = "POST">
    <h1 class = "login-h1">Add Product to Pharmacy</h1>
    <div>
        <label class = "label-font" for="product">Product: </label>
        <input  type = "text" name="product">
    </div>

    <div>
        <label class = "label-font" for="user-password">Description: </label>
        <input type = "text" name="description">
    </div>
    <div>
        <label class = "label-font" for="user-password">Price: </label>
        <input type = "number" name="price">
    </div>
    <div>
        <label class = "label-font" for="user-password">Stock: </label>
        <input type = "number" name="stock">
    </div>
    <div class = "flex">
        <input class = "input-form" type = "submit" value="Add" name="add">
    </div>
    <div class = "flex">
        <input class = "input-form" type = "submit" value="Logout" name="logout">
    </div>
</form>


<?php include 'footer.php'; ?>


