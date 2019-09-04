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

function getWaggie() {
	$priceee = 0;
	$database = dbConnect();
    $query = $database->prepare("SELECT * FROM `winkelwaggie`");
    $query->execute();
    while ($results = $query->fetch(PDO::FETCH_ASSOC)) {
    	$priceee = $priceee + getPrice($results['id']);
    	echo '<div class="article">
				 		<div class="image">
				 			<img src="img/articles/'.$results['id'].'.jpg">
				 		</div>
				 		<div class="info">
				 			<p class="name">'.getName($results['id']).'</p>
					 		<p class="description">'.getDesc($results['id']).'</p>
					 		<p class="price">Ƒ'.getPrice($results['id']).',-</p>
				 		</div>
				 	</div>';
    }
	return $priceee;
}


function getName($id) {
	$database = dbConnect();
	$query = $database->prepare("SELECT `name` FROM `producten` WHERE id = :id");
	$query->execute(array('id' => $id));
	while ($results = $query->fetch(PDO::FETCH_ASSOC)) {
	    return $results['name'];
    }
}
function getDesc($id) {
	$database = dbConnect();
	$query = $database->prepare("SELECT `description` FROM `producten` WHERE id = :id");
	$query->execute(array('id' => $id));
	while ($results = $query->fetch(PDO::FETCH_ASSOC)) {
	    return $results['description'];
    }
}
function getPrice($id) {
	$database = dbConnect();
	$query = $database->prepare("SELECT `price` FROM `producten` WHERE id = :id");
	$query->execute(array('id' => $id));
	while ($results = $query->fetch(PDO::FETCH_ASSOC)) {
	    return $results['price'];
    }
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>80's Super Shop</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="winkelwaggie.css">
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
					<a href="/?cat=shirts">Shirts</a>
					<a href="/?cat=hoodies">Sweaters & Hoodies</a>
					<a href="/?cat=jackets">Jackets</a>
					<a href="/?cat=trousers">Trousers</a>
					<a href="/?cat=shoes">Shoes</a>
				</div>
				<div class="sideitem">
					<h2>LP’s</h2>
					<a href="/?cat=pop">Pop</a>
					<a href="/?cat=dance">Dance</a>
					<a href="/?cat=disco">Disco</a>
					<a href="/?cat=funk">Funk</a>
					<a href="/?cat=soul">Soul</a>
					<a href="/?cat=rock">Rock</a>
				</div>
				<div class="sideitem">
					<h2>Accesoires</h2>
					<a href="/?cat=glasses">Sunglasses</a>
					<a href="/?cat=games">Games</a>
					<a href="/?cat=radios">Radio’s</a>
					<a href="/?cat=turntables">Turntables</a>
					<a href="/?cat=cars">Cars</a>
					<a href="/?cat=badges">Badges</a>
				</div>
			</div>
			<div class="waggie">
				 <div class="items">
				 	<h2>Winkelwaggie</h2>
				 	<?php 
				 		$price = getWaggie();
				 	?>
				 	
				 </div>
				 <div class="prices">
				 	<table>
				 		<tr>
				 			<td>Totaal artikelen</td>
				 			<td>Ƒ<?php echo $price; ?>-</td>
				 		</tr>
				 		<tr>
				 			<td>Verzendkosten</td>
				 			<td>Ƒ7,85-</td>
				 		</tr>
				 		<tr>
				 			<td><hr>Totaal</td>
				 			<td><hr>Ƒ<?php echo $price + 7.85; ?>-</td>
				 		</tr>
				 	</table>
				 	<button>Afrekenen</button>
				 </div>
			</div>
		</div>
	</main>
</body>
</html>