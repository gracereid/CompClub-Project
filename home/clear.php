<?php
session_start();
unset($_SESSION['ShoppingCart']);
			 header( 'Location: shop.php' ) ;

?>