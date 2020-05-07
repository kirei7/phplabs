<!doctype html>

<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="main.css" type="text/css">
	<title>Document</title>
</head>
<body>
<h1>Товары:</h1>
<?php

	$elements = [
		[
			id => "1",
			name => "Lorem ipsum dolor sit amet.",
			description => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
			Earum, voluptates, nulla? Quis, ipsum repellendus nobis corporis voluptatibus
			sapiente dolorum sed."],
	
		[
			id => "2",
			name => "Lorem ipsumsit amet.",
			description => "Lor repellendus nobis corporis voluptatibus
			sapiente dolorum sed."],
		[
			id => "3",
			name => "Lorem amet.",
			description => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
			Earum, voluptates, nulla? Quis, ipsums voluptatibus
			sapiente dolorum sed."]
	
	];
	echo '<div class="main-wrapper">';
	foreach($elements as $elemnt=>$val){

		echo '
			<div class="element">
				<button type="button" name="test" onclick="setProduct('. $val['id'].')">Добавить в корзину</button>
				<div class="product">
					<div class="title" id="title-'. $val['id'].'">' . $val['name'] . '</div>
					<div class="discription" id="description-'. $val['id'].'">' . $val['description'] . '</div>
				</div>
				<div class="product-is-set" id="check-'. $val['id'].'" style="'; 
		if($_COOKIE['Product_' . $val['id']]){ 
			echo "display:block;";
		}
		echo'">Добавлен</div>
			</div>
		';
	}
	echo '</div>';
?>
<a href="basket.php">Перейти в корзину</a>
</body>
<script>
function getCookie(name) {
	  let matches = document.cookie.match(new RegExp(
	    "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
	  ));
	  return matches ? decodeURIComponent(matches[1]) : undefined;
	}
 function setProduct(id){
 	let product_name = document.getElementById('title-' + id).innerHTML;
 	let product_description = document.getElementById('description-' + id).innerHTML;
 	let cookie = getCookie(String(id));
 	if(cookie === undefined){
 		document.cookie = 'Product_'+ id + '=' + [product_name,product_description] + ';path=http://lab.vntu.org/webusers/01-16-043';
 	} 
	let checker = document.getElementById('check-' + id);
	checker.style.display = 'block';
 }
 
</script>
</html>
