</!DOCTYPE html>
<?php
	include ("../utils/connect.php");

	// Gets value sent over search form
	$query = $_GET['query'];

	// Changes characters used in html to their equivalents
	$query = htmlspecialchars($query);
	$raw_results = $mysqli -> query("SELECT product_id, product_name, product_price, product_image, product_price_discount FROM products
	    WHERE (`product_name` LIKE '%".$query."%') OR (`product_category` LIKE '%".$query."%')");
			
	// Close database connection
  $mysqli -> close();
?>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Magazin animale</title>
	<link href='pet-shop.css' rel='stylesheet'>
</head>
<body>
	<div id="header">
		<div id="logoWrapper">
			<img src="./../icons/logo.jpg">
		</div>
		<div id="searchBoxWrapper">
			<form action="search.php" method="GET">
				<input id="searchBox" type="text" name="query" placeholder="Cauta un produs...">
			</form>
		</div>
		<div id="menuIcons">
			<div id="accountWrapper">
				<img id="accountIcon" class="menuIconsColorFilter" src="../icons/user.svg">
				<span>Contul meu</span>
				<span id="pointingTriangle">&#9660;</span>
			</div>
			<div id="shoppingCartWrapper">
				<img id="shoppingCartIcon" class="menuIconsColorFilter" src="../icons/shopping-cart.svg">
				<span>Cos de cumparaturi</span>
				<span id="pointingTriangle">&#9660;</span>
			</div>
		</div>
	</div>
	<div id="content">
		<div id="sideBar">
			<ul>
				<li><a href="pet-shop-all.php">Toate produsele</a></li>
				<div class="navSeparator"></div>
				<ul>
					<li class="category_a"><a href="pet-shop-dogs.php">Câini</a>
						<ul>
							<li	class="category_b"><a href="pet-shop-dogs-dry-food.php">Hrana uscata caini</a></li>
							<li	class="category_b"><a href="pet-shop-dogs-wet-food.php">Hrana umeda caini</a></li>
							<li	class="category_b"><a href="pet-shop-dogs-accessories.php">Accesorii caini</a></li>
						</ul>
					</li>
					<div class="navSeparator"></div>
					<li class="category_a"><a href="pet-shop-cats.php">Pisici</a>
						<ul>
							<li class="category_b"><a href="pet-shop-cats-dry-food.php">Hrana uscata pisici</a></li>
							<li class="category_b"><a href="pet-shop-cats-wet-food.php">Hrana umeda pisici</a></li>
							<li class="category_b"><a href="pet-shop-cats-accessories.php">Accesorii pisici</a></li>
						</ul>
					</li>
					<div class="navSeparator"></div>
					<li class="category_a">
						<a href="pet-shop.php">Produse la ofertă</a>
					</li>
				</ul>
			</ul>
		</div>
		<div id="productsList">
			<h1 id="discounts">Rezultate căutare</h1>
			<div id="list">
				<?php
					if ($raw_results -> num_rows > 0) { // If there are products with discounts...
	          while($row = $raw_results -> fetch_assoc()) {

							// Calculate old price
							$oldPrice = $row["product_price"] + $row["product_price_discount"];

							echo "<div class=\"product\">"
								 . "	<div class=\"productImageWrapper\">"
								 . "		<img src=\"./../produc_imgs/" . $row["product_image"] . "\">"
								 . "	</div>"
								 . "	<div class=\"productName\">" . $row["product_name"] . "</div>"
								 . "	<div class=\"productPrice\">"
								 . "		<span class=\"oldPrice\">" . $oldPrice . "</span>"
								 . "		<span class=\"newPrice\">" . $row["product_price"] . "</span>"
								 . "	</div>"
								 . "</div>";

	            // echo "<tr><td>" . $row["product_name"]. "</td><td>"
	            // . $row["product_price"]. "</td><td>"
	            // . $row["product_category"]. "</td><td>"
	            // . $row["product_availability"]. "</td><td>"
	            // . $row["product_price_discount"]. "</td><td><a href=\"edit-product.php?product_id=" . $row["product_id"] . "\"><img src=\"../icons/edit.svg\"></a>"
	            // . "</td><td><a href=\"products.php?delete=" . $row["product_id"] . "\"><img src=\"../icons/delete.svg\"></a>"
	            // . "</td></tr>";
	          }
					} else {
						echo "There are no discounts available.";
					}
				?>
			</div>
		</div>
	</div>
	<div id="emptySpace"></div>
	<!-- <nav>
		<ul>
			<li><a>Câini</a>
        <ul>
					<li><a>Hrana uscata caini</a></li>
					<li><a>Hrana umeda caini</a></li>
					<li><a>Accesorii caini</a></li>
				</ul>
			</li>
			<li><a>Pisici</a>
				<ul>
					<li><a>Hrana uscata pisici</a></li>
					<li><a>Hrana umeda pisici</a></li>
					<li><a>Accesorii pisici</a></li>
				</ul>
			</li>
			<li><a>Top mărci </a></li>
			<li><a>Promoții </a></li>
			<li><a>Noutăți </a></li>
		</ul>
		<div id="menuIcons">
			<div id="menuIconsWrapper">
				<img id="searchIcon" class="menuIconsColorFilter" src="../icons/search.svg">
				<img id="shoppingCartIcon" class="menuIconsColorFilter" src="../icons/shopping-cart.svg">
				<div id="userIconWrapper">
          <img id="userIcon" class="menuIconsColorFilter" src="../icons/user.svg">
					<div id="loginBox">Intră în contul tău și ai control complet asupra ofertelor!<br>
						<button type="button">Login</button>
            <button type="button"><a href="register.php">Register</a></button>
					</div>
				</div>
			</div>
		</div>
	</nav> -->
</body>
</html>
