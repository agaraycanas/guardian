<?php
foreach ( $_POST as $k => $v ) {
	echo "$k: $v<br/>";
}

/*
 * $carpeta = "/assets/img/users/"; //Debe tener “apache” permiso de escritura en ella
 * copy ( $_FILES ['foto'] ['tmp_name'],$carpeta. $_POST['email]']);
 */
// $config['upload_path'] = './uploads/';



?>