<?php
// Sólo AJAX
$ini = $body ['anyoIni'];
$fin = $ini + 1;
if ($body ['status'] >= 0) {
	echo "{$body['status']}:Slots para el curso $ini - $fin creados correctamente";
} else {
	echo "{$body['status']}:<b class=\"strong\">ERROR</b> Sólo se pueden crear slots para el curso $ini - $fin";
}
?>