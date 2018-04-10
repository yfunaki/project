<?php 
include '../dbConnection.php';
$dbConn = getDatabaseConnection("otterstyle");

session_start();

if(!isset($_SESSION['cart']))
{
    $_SESSION['cart'] = array();
}
 
if(isset($_POST['productName']))
{
    $newItem = array();
    $newItem['name'] = $_POST['productName'];
    $newItem['price'] = $_POST['productPrice'];
    $newItem['size'] = $_POST['productSize'];
    $newItem['id'] = $_POST['productId'];
    
    foreach($_SESSION['cart'] as &$item)
    {
        if($newItem['id'] == $item['id'])
        {
            $item['quantity'] += 1;
            $found = true;
        }
    }
    
    if($found != true)
    {
        $newItem['quantity'] = 1;
        array_push($_SESSION['cart'], $newItem);
    }
}   

function display(){
    global $dbConn;

    $sql = "SELECT * FROM `product` WHERE 1";
		
    $stmt = $dbConn->query($sql);	
    $stmt->execute();
    $records = $stmt->fetchALL(PDO::FETCH_ASSOC);
    
    
     echo "<table border=1 id='customer'>";
        echo "<tr>";
            echo "<th>Item Name</th>";
            echo "<th>Price</td>";
            echo "<th> Size</th>";
            echo "<th>More Info</th>";
            echo "<th>Checkout</th>";
            echo "</tr>";
    
    foreach($records as $record){
        $productName = $record['productName'];
        $productPrice = $record['productPrice'];
        $productSize = $record['productSize'];
        $productId = $record['productId'];
                
        echo "<tr>";
        echo "<td>" . $productName . "</td> ";
        echo "<td>$" . $productPrice . "</td>";
        echo "<td>" . $productSize . "</td>";
        echo "<td>";
        echo "<a href='./moreinfo.php?itemId=" . $record['itemId'] . "' target='_blank'>More Info";
        echo "</td>";
        
        echo "<form method = 'post'>";
            echo "<input type = 'hidden' name = 'productName' value = '$productName'>";
            echo "<input type = 'hidden' name = 'productPrice' value = '$productPrice'>";
            echo "<input type = 'hidden' name = 'productSize' value = '$productSize'>";
            echo "<input type = 'hidden' name = 'productId' value = '$productId'>";
            
            if($_POST['productId'] == $productId)
            {
                echo '<td><button class = "btn btn-success">Added</button></td>';
            }
            else
            {
                echo '<td><button class = "btn btn-warning">Add</button></td>';
            }
        echo "</form>";      
                
        echo "</tr>";
        echo "</form>";
    }
    echo "</table>";
    
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
            
            <h1> Otterstyle Shop </h1>
            <br/>
            
            <!-- form to search/filter-->
            <form enctype="text/plain">
                <div class="form-group">
                    <label for="pName">Product Name</label>
                    <input type="text" class="form-control" name="query" id="pName" placeholder="Name">
                </div>
                <input type="submit" value="Submit" class="btn btn-default">
                <br /><br />

            </form>
            
            
        <br/>
        
        <!--display items-->
        <?=display(); ?>

                    <!-- Category for filtering-->
                    Category: 
                    <select name="category">
                        <option value=""> Select One </option>
                        <?=displayCategories();?>
                    </select>
                <br />
                
        
    </body>
    <footer>
        <hr>
            CST 336 Internet Programming 2018&copy; Funaki, Martinez, Peppmuller, Vucinich <br />
            <strong> Disclaimer: </strong> This information on this webpage is used only for academic purposes. <br />
    </footer>
</html>