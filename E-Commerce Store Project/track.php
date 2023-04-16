<?php
    echo "Tracking Order Page";
	try{
	$dsn = "mysql:host=courses;dbname=z1892226";
	$pdo = new PDO($dsn, 'z1892226', '2002Feb20');
	
	$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    
    
        $stmt=$pdo->prepare("SELECT * FROM ORDERS WHERE PHONE=?");
        $stmt->execute(array($_POST['phone']));
        $orders=$stmt->fetchAll(PDO::FETCH_ASSOC);

    
}
catch(PDOexception $e)
	{
		echo "Connection to Database failed: " . $e->getMessage();
	}//End Catch

?>

<html>
<title>Track Order</title>
    <body>
        <form action="" method="post">
        Enter Phone Number: <input type="text" name="phone" placeholder="123-456-7899"><br><br>
        <input type="submit" name="find" value="Track Order">

        </form> 
        
        <?php foreach ($orders as $order): ?>

        <p>Tracking Id: </p><span> <?=$order['TRACKINGID']?></span>
        <p>Full Name: </p><span><?=$order['FULLNAME']?></span>
        <p>Status: </p><span><?=$order['STATUS']?></span>
        <?php endforeach; ?>
        <br>
        <form action="products.php" method="post">
            <input type="submit" value="Continue Shopping" name="cont">
        </form>


    </body>
</html>