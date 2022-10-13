<!--Name: Victor Zubatyy-->
<!--StudentID: D21125389-->
<!--Project Name: Web Dynamic Application-->
<!--Class: DT211/C-->

<?php session_start();?>
<?php include 'header_logout.php';
    include 'database.php';
if($_SESSION["pass"] != true){
    echo "<script>
        alert('You are not authorised to view this page.');
        window.location.href='index.php';
    </script>";
}

if($_SESSION["username"] != "Victor"){
    echo "<script>
        alert('You are not authorised to view this page.');
        window.location.href='welcome.php';
    </script>";

}

if (isset($_POST['update'])) {
    $product_id = $_POST['product_id'];
    $column_name = $_POST['column-name'];
    $value = $_POST['value'];
    if (!$product_id) {
        echo 'You have not picked a product to update. <br> ';
    }

    if (!$column_name) {
        echo 'You have not picked a value to update. <br> ';
    }

    if (!$value) {
        echo 'You have not entered your new value. <br> ';
    }

    else {
        $conn = connect();
        $sql_count = "SELECT COUNT(*) as count FROM Product";
        $result_count = mysqli_query($conn, $sql_count);
        $num_rows = mysqli_fetch_array($result_count);
        $sql = "UPDATE Product SET $column_name ='$value' WHERE ProductID = $product_id";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "<h3 class = 'green'>Successfully updated record</h3>";
        }

        if(!$result){
            echo "You have not entered the correct values to edit this product";
        }

        if ($num_rows['count'] == 0) {
            echo "
                <script>
                    alert('no records in database');
                </script>";
        }
    }
}

if (isset($_POST["logout"])){
    session_destroy();
    header("Location: index.php");
}

?>
<form action ="" method = "POST">
    <h1 class = "login-h1">Update Product in Pharmacy</h1>
    <div class = "product-search">
        <label class = "label-font" for="product_id">Enter the ProductID you want to update: </label>
        <input type = "number" name="product_id">
    </div>
    <div class = "product-search">
        <label class = "label-font" for="column-name">What value do you want to update?: </label>
        <input type = "text" name="column-name">
    </div>
    <div class = "product-search">
        <label class = "label-font" for="value">Enter the new value: </label>
        <input type = "text" name="value">
    </div>
    <div class = "flex">
        <input class = "input-form" type = "submit" value="Update" name="update">
    </div>
    <div class = "flex">
        <input class = "input-form" type = "submit" value="Logout" name="logout">
    </div>
</form>

<?php include 'footer.php'; ?>
