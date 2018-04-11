<?php
    include '../dbConnection.php';
    $dbConn = getDatabaseConnection("otterstyle");
   
    function displayInfo()
    {
        $proId = $_GET['productId'];
        global $dbConn;
        $sql = "SELECT * FROM `product` WHERE productId LIKE '$proId'";
        $stmt = $dbConn->query($sql);
        $stmt->execute();
        $record = $stmt->fetch(PDO::FETCH_ASSOC);
            
        $productName = $record['productName'];
        $productPrice = $record['productPrice'];
        $productSize = $record['productSize'];
        $productId = $record['productId'];
        $productColor = $record['productColor'];
        $productGender = $record['productGender'];
        $productDescription = $record['productDescription'];
        $productImage = $record['productImage'];        
                
        echo "<tr>";
        echo "<td>" . $productName . "</td> ";
        echo "</br>";
        echo "<td>Price: $" . $productPrice . "     </td>";
        echo "<td>Color: " . $productColor . "      </td>";
        echo "<td>Gender: " . $productGender . "</td> ";
        echo "</br>";
        echo "<td>" . $productDescription . "</td>";
        echo "</br>";
        echo "<img src='" . $productImage . "' width='200' /><br/>";
        echo "<td>";
        echo "</td>";
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        
        <title> Otterstyle Store </title>
        <style>
            @import url("styles.css");
        </style>
    </head>
    <body>
        <div class='container'>
        <div class='text-center'>
            
            <!--bootstrap navigation-->
            <nav class='navbar navbar-default - navbar-fixed-top'>
                <div class='container-fluid'>
                    <div class='navbar-header'>
                        <a class='navbar-brand' href='#'>Otterstyle Shop</a>
                    </div>
                    <ul class='nav navbar-nav'>
                        <li><a href='index.php'>Home</a></li>
                        <li><a href='cart.php'>Cart</a></li>
                    </ul>
                </div>
            </nav>
            <br /> <br /> <br />
            <!--display item info-->
            <?=displayInfo(); ?>

                   
                
        
    </body>
    <footer>
        <hr>
            CST 336 Internet Programming 2018&copy; Funaki, Martinez, Peppmuller, Vucinich <br />
            <strong> Disclaimer: </strong> This information on this webpage is used only for academic purposes. <br />
    </footer>
</html>