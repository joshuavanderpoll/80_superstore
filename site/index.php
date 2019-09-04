<?php
function dbConnect() {
	$host = 'localhost';
	$database = 'supershop';
	$user = 'root';
	$password = '';

	try {
		$dsn = 'mysql:host=' . $host . ';dbname=' . $database;
		$connection = new PDO( $dsn, $user, $password );
		$connection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		$connection->setAttribute( PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
		$connection->setAttribute( PDO::ATTR_EMULATE_PREPARES, false );
		return $connection;
	} catch ( \PDOException $e ) {
		echo 'There is occured error while connecting to SQL: ' . $e->getMessage();
	}
}



	function getEverything() {
		$database = dbConnect();

		if(isset($_GET['cat'])) {
			$query = $database->prepare("SELECT * FROM `producten` WHERE category = :cat");
	   		$query->execute(array('cat' => $_GET['cat']));
		} else {
			$query = $database->prepare("SELECT * FROM `producten`");
	    	$query->execute();
		}
	    while ($results = $query->fetch(PDO::FETCH_ASSOC)) {
	        echo '<div onclick="window.location = \'product.php?id='.$results['id'].'\'" class="product">
						<img src="img/articles/'.$results['id'].'.jpg">
						<h2>'.$results['name'].'</h2>
						<p class="price">Ƒ'.$results['price'].',-</p>
					</div>';
    }
}



?>
<!DOCTYPE html>
<html>
<head>
	<title>80's Super Shop</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<main>
		<header>
			<a href="/"><h1>80’s Superstore</h1></a>
		</header>
		<div class="wrapper">
			<div class="sidebar">
				<div class="sideitem"><a href="winkelwaggie.php"><img src="img/winkelwaggie.svg"></a></div>
				<div class="sideitem">
					<h2>Clothing</h2>
					<a href="?cat=shirts">Shirts</a>
					<a href="?cat=hoodies">Sweaters & Hoodies</a>
					<a href="?cat=jackets">Jackets</a>
					<a href="?cat=trousers">Trousers</a>
					<a href="?cat=shoes">Shoes</a>
				</div>
				<div class="sideitem">
					<h2>LP’s</h2>
					<a href="?cat=pop">Pop</a>
					<a href="?cat=dance">Dance</a>
					<a href="?cat=disco">Disco</a>
					<a href="?cat=funk">Funk</a>
					<a href="?cat=soul">Soul</a>
					<a href="?cat=rock">Rock</a>
				</div>
				<div class="sideitem">
					<h2>Accesoires</h2>
					<a href="?cat=glasses">Sunglasses</a>
					<a href="?cat=games">Games</a>
					<a href="?cat=radios">Radio’s</a>
					<a href="?cat=turntables">Turntables</a>
					<a href="?cat=cars">Cars</a>
					<a href="?cat=badges">Badges</a>
				</div>
			</div>
			<div class="products">
				<?php
				getEverything();
				?>
			</div>
		</div>
	</main>
</body>
</html>