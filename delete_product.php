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
if (isset($_POST['delete'])){
    $product_id = $_POST['product_id'];
    if(!$product_id){
        echo "You did not enter a Product ID";
    }

    else {
        $i = 0;
        $conn = connect();
        $sql_count = "SELECT COUNT(*) as count FROM Product";
        $sql = "SELECT * FROM Product";
        $result = mysqli_query($conn, $sql);
        $result_count = mysqli_query($conn, $sql_count);
//        get num of rows associated to the Product table to check that there are records in the Product table
        $num_rows = mysqli_fetch_array($result_count);

        if ($result != null) {
            while ($row = mysqli_fetch_array($result)) {
//                need to check if ID exists in database
                if ($row['ProductID'] == $product_id) {
                    $sql = "DELETE FROM Product WHERE ProductID = $product_id";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        echo '<h3 class = "green">Successfully deleted the record</h3>';
                        break;
                    }
                }

//                only display the message once since in loop
                else{
                    if ($i == 0) {
                        echo '<h3 class = "red">Incorrect ID</h3>';
                        $i++;
                    }
                }
            }
        }


        if ($num_rows['count'] == 0){
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
    <h1 class = "login-h1">Delete Product in Pharmacy</h1>
    <div class = "product-search">
        <label class = "label-font" for="product_id">Enter the ProductID you want to delete: </label>
        <input type = "number" name="product_id">
    </div>
    <div class = "flex">
        <input class = "input-form" type = "submit" value="Delete" name="delete">
    </div>
    <div class = "flex">
        <input class = "input-form" type = "submit" value="Logout" name="logout">
    </div>

<?php include 'footer.php'; ?>
