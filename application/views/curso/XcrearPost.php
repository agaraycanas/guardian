<?php
// Sólo AJAX
$ini = $body['anyoIni'];
$fin = $ini+1;
if ($body['status'] >= 0) {
	echo "{$body['status']}:Curso $ini - $fin creado correctamente";
}
else {
	echo "{$body['status']}:<b class=\"strong\">ERROR</b> Curso $ini - $fin ya está registrado";
}
?>