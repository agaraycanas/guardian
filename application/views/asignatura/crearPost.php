<?php
// Sólo AJAX
if ($body['status'] >= 0) {
	echo "0:Asignatura {$body['alias']} creada correctamente";
}
else {
	echo "{$body['status']}:<b class=\"strong\">ERROR</b> Asignatura {$body['alias']} ya está registrada para el nivel {$body['nivel']} de ese ciclo";
}
?>