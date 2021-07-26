<?php
$host="192.99.18.63:3306";
$usuario="vntsiste_root";
$senha ="!@Vt21!@";
$bd="vntsiste_bdaguasclaras";

$mysqli = new mysqli($host, $usuario, $senha, $bd);

if($mysqli->connect_errno)
	echo "Falha de conexão:(".$mysqli->connect_errno.") ".$mysqli->connect_error;

?>