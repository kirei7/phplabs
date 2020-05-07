<!doctype html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="main.css" type="text/css">
	<title>Document</title>
</head>
<body>
<script>
 function delProduct(product){
 	console.log(product);
 	let prod = document.getElementById(product);
 	prod.parentNode.removeChild(prod);
  	document.cookie = product + "=0; max-age=1";
 }
</script>
<?php
	$products = $_COOKIE; 
	echo '<div class="main-wrapper">';
	foreach($products as $product=>$val){
		if(stripos($product, 'Product') !== false){
			$val = explode('.,', $val);
			echo '
				<div class="element" id="'. $product.'">
					<button class="button" type="button" onclick="delProduct(\''. $product .'\')">Удалить из корзины</button>
					<div class="product">
						<div class="title">' . $val[0] . '</div>
						<div class="discription">' . $val[1] . '</div>
					</div>
				</div>
			';
		}
	}
	echo '</div>';
?>
<a href="index.php">Назад к списку товаров</a>
</body>
<script>
 function delProduct(product){
 	console.log(product);
 	let prod = document.getElementById(product);
 	prod.parentNode.removeChild(prod);
  	document.cookie = product + "=0; max-age=1";
 }
</script>
</html>
