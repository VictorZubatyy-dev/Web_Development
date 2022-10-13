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
if (isset($_POST["view"])) {
//    querying
    $product = $_POST["product"];
    $conn = connect();
    $sql_count = "SELECT COUNT(*) as count FROM Product";
    $result_count = mysqli_query($conn, $sql_count);
    $num_rows = mysqli_fetch_array($result_count);

    if ($num_rows['count'] == 0){
        echo "
                <script>
                    alert('no records in database');
                </script>";
    }

    if (!$product) {
        $conn = connect();
        $sql = "SELECT * FROM Product";
        $result = mysqli_query($conn, $sql);
        if ($result) {
//            building a table to display for user
            echo '<table>';
            echo '<tr>';
            echo '  <th>ProductID </th>';
            echo '  <th>Product </th>';
            echo '  <th>Description </th>';
            echo '  <th>Price </th>';
            echo '  <th>Stock </th>';
            echo '</tr>';

            while ($row = mysqli_fetch_array($result)) {
                echo '<tr><td>' . $row['ProductID'] . '</td><td>'. $row['Product'] . '</td><td>' . $row['Description'] . '</td><td>' . $row['Price'] . '</td><td>' . $row['Stock'] . '</td></td>';
            }
            echo '</table>';
        }
    } else {
        $conn = connect();
        $sql = "SELECT * FROM Product where Product = '$product'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo '<table>';
            echo '<tr>';
            echo '  <th>ProductID </th>';
            echo '  <th>Product </th>';
            echo '  <th>Description </th>';
            echo '  <th>Price </th>';
            echo '  <th>Stock </th>';
            echo '</tr>';

            while ($row = mysqli_fetch_array($result)) {
                echo '<tr><td>' . $row['ProductID'] .'</td><td>' . $row['Product'] . '</td><td>' . $row['Description'] . '</td><td>' .$row['Price'] . '</td><td>' . $row['Stock'] . '</td></td>';
            }
            echo '</table>';
        }
    }
}



if (isset($_POST["logout"])){
    session_destroy();
    header("Location: index.php");
}



?>
<h1 class = "login-h1">View Product(s) in Pharmacy</h1>
<h2 class = "view-h2">To view all products just click the 'View' button</h2>
<form action ="" method = "POST">
    <div class = "product-search">
        <label class = "label-font" for="product">Product: </label>
        <input type = "text" name="product">
    </div>
    <div class = "flex">
        <input class = "input-form" type = "submit" value="View" name="view">
    </div>

    <div class = "flex">
        <input class = "input-form" type = "submit" value="Logout" name="logout">
    </div>
</form>

<?php include 'footer.php'; ?>
