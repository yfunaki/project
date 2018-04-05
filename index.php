<?php 
include '../dbConnection.php';
$dbConn = getDatabaseConnection("otterstyle");

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
            echo "<th>Size</td>";
            echo "<th>More Info</th>";
            echo "<th>Checkout</th>";
            echo "</tr>";
    
    foreach($records as $record){
        echo "<tr>";
        echo "<td>" . $record['productName']. "</td> ";
        echo "<td>" . $record['productPrice'] . "</td>";
        echo "<td>" . $record['productSize'] . "</td>";
        echo "<td>";
        echo "<a href='./moreinfo.php?itemId=" . $record['itemId'] . "' target='_blank'>More Info";
        echo "</td>";
        echo "<td> <input type='checkbox' value='" . $record['itemId'] . "' name='cart[]'> </td>";
        
        
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
    
}
?>	 

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
        <?=display(); ?>

    </body>
</html>