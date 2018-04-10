<?php
    include 'functions.php';
    session_start();
    
    if(isset($_POST['removeId']))
    {
        foreach($_SESSION['cart'] as $itemKey => $item)
        {
            if($item['id'] == $_POST['removeId'])
            {
                unset($_SESSION['cart'][$itemKey]);
            }
        }
    }
    
    if(isset($_POST['removeAll']))
    {
        unset($_SESSION['cart']);
    }
    
    // if(isset($_POST['itemId']))
    // {
    //     foreach($_SESSION['cart'] as &$item)
    //     {
    //         if($item['id'] == $_POST['itemId'])
    //         {
    //             $item['quantity'] == $_POST['update'];
    //         }
    //     }
    // }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <title>Shopping Cart</title>
        <style>
            @import url("styles.css");
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='text-center'>
                
                <!-- Bootstrap Navagation Bar -->
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
                <h2>Shopping Cart</h2>
                <h3>Number of items in cart: <?php displayCartCount(); ?> </h3>
                <br/>
                <?php displayCart(); ?>
                <!-- Cart Items -->

            </div>
        </div>
    </body>
    <footer>
        <hr>
            CST 336 Internet Programming 2018&copy; Funaki, Martinez, Peppmuller, Vucinich <br />
            <strong> Disclaimer: </strong> This information on this webpage is used only for academic purposes. <br />
    </footer>
</html>