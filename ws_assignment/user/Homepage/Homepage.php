<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>HomePage</title>
	<link rel="stylesheet" href="Style.css">
</head>

<body>

	<div class="header">
	<div class="container">
		<div class="navbar">
		<div class="logo">
			<img src="Logo.jpg" width="200px">
		</div>

		<nav>
			<ul>
				<li><a href="http://localhost/ws_assignment/user/customer_l_r/CustomerLogin.php">Login</a></li>
				<li><a href="http://localhost/ws_assignment/user/searchMenu.php">Menu</a></li>
				<li><a href="http://localhost/ws_assignment/user/cart.php">Cart</a></li>
			</ul>
		</nav>
			<img src="Cart.png" width="30px" height="30px">
		</div>

		<div class="row">
			<div class="col-2">
				<h1>EXPERIENCE PERFORMANCE WITH STYLE</h1>
				<a href="http://localhost/ws_assignment/user/searchMenu.php" class="btn">Explore Now &#8594;</a>
			</div>

			<div class="col-2">
				<img src="Kraken.jpeg">
			</div>
		</div>
	</div>
	</div>

	<h2>Featured Products</h2>

	<!-- Slideshow container -->
<div class="slideshow-container">

  <!-- Full-width images with number and caption text -->
  <div class="mySlides fade">
    <div class="numbertext">1 / 3</div>
    <img src="DEATHADDER.jpg" style="width:100%">
  </div>

  <div class="mySlides fade">
    <div class="numbertext">2 / 3</div>
    <img src="DEATHADDER.jpg" style="width:100%">
  </div>

  <div class="mySlides fade">
    <div class="numbertext">3 / 3</div>
    <img src="DEATHADDER.jpg" style="width:100%">
  </div>

  <!-- Next and previous buttons -->
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<!-- The dots/circles -->
<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
</div>



<div class="space">
</div>

<!---Footer------>
	<div class="footer">
  <p>Copyright © 2020 Spartan Inc. All rights reserved.</p>
</div>




<!------Script for image slider------->
<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}
</script>


</body>
</html>
