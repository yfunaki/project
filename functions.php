<?php
include '../dbConnection.php';
$dbConn = getDatabaseConnection("otterstyle");

    function displayCartCount()
    {
        echo count($_SESSION['cart']);
    }
    
    function displayCart()
    {
        if(isset($_SESSION['cart']))
        {
            echo "<table class = 'table'>";
            echo '<tr>';
            echo "<td><h3>Name<h3></td>";
            echo "<td><h3>Price<h3></td>";
            echo "<td><h3>Size<h3></td>";
            echo "<td><h3>Quantity<h3></td>";
            echo "<td><h3>Action<h3></td>";
            
            foreach($_SESSION['cart'] as $item)
            {
                $itemId = $item['id'];
                $itemQuant = $item['quantity'];
            
                echo '<tr>';
                
                echo "<td><h4>". $item['name'] . "</h4></td>";
                echo "<td><h4>$". $item['price'] . "</h4></td>";
                echo "<td><h4>". $item['size'] . "</h4></td>";
                echo "<td><h4>" . $itemQuant . "</h4></td>";
                
                // echo '<form method = "post">';
                // echo "<input type = 'hidden' name = 'itemId' value '$itemId'>";
                // echo "<td><input type = 'text' name = 'update' class = 'form-control' placeholder = '$itemQuant'></td>";
                // echo '<td><button class = "btn btn-danger">Update</button></td>';
                // echo '</form>';
                
                echo "<form method = 'post'>";
                echo "<input type = 'hidden' name = 'removeId' value = '$itemId'>";
                // echo "<td><input type = 'text' name = 'update' class = 'form-control' placeholder = '$itemQuant'></td>";
                echo '<td><button class = "btn btn-danger">Remove</button></td>';
                echo '</form>';
                
                echo '</tr>';
            }
            echo "</table>";
            echo "<br/>";
            
            echo "<form method = 'post'>";
            echo "<input type = 'submit' name = 'removeAll' value = 'Remove All'>";
            echo "</form>";
        }
    }
    function displayCategories(){
        global $dbConn;
        
        $sql = "SELECT catId, catName FROM `category` ORDER BY catName";
        
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($records as $record) {
        $id = $record['catId'];
        $name = $record['catName'];
            echo '<option value="'.$id.'">'.$name.'</option>';
        }
    }
?>