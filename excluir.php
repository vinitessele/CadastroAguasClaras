<?php
$id = null;
if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}
		include 'Conexao.php';
	    $sql_code = "delete from cadastro where id='$id'";
		$sql_query=$mysqli->query($sql_code) or die($mysqli->error);
		
		if($sql_query)
			echo "
				<script>
				alert('excluido com sucesso');
					location.href='index.php';
				</script>";
		else
			"
			<script>
				alert('Não foi possível excluir o cadastro');
				location.href='index.php';
			</script>";
?>
