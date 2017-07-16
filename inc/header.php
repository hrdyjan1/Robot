<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title><?php echo $pageTitle; ?></title>

  <!-- TODO: Description -->
	<meta name="description" content="BiteCorn - description">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,400,600,700&amp;subset=latin-ext" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/interactions.css">
	<link rel="stylesheet" href="css/navigation.css">
	<link rel="stylesheet" href="css/carousel.css">
	<link rel="stylesheet" href="css/single-product.css">

</head>

<body>
	<div class="img-background">
		<div class="container">
			<header class="main-header clearfix">
				<a href="index.php">
					<img class="logo" src="img/corn.png">
				</a>
				<h1 class="name">Bite <span>Corn</span></h1>
			</header>

			<nav>
				<ul>
				  <li><a href="index.php">Home</a></li>
				  <li><a href="catalog.php">Categories</a>
						<ul>
							<li><a href="catalog.php?cat=games">Games</a></li>
							<li><a href="catalog.php?cat=os">OS</a></li>
					  </ul>
					</li>
				  <li><a href="#">Contact</a></li>
				  <li><a href="#">About</a></li>
					<li id="last-search">
						<div class="search-input">
					    <span class="icon">
								<!-- <img class="logo" src="img/search.svg"> -->
								<i class="material-icons">search</i>
					    </span>
					    <input type="search" id="search" placeholder="Search..." />
						</div>
					</li>
				</ul>
			</nav>
