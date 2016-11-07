<?php
// Sólo AJAX
$status = $body['status'];
if ( $status >= 0) {
	echo "$status:Ciclos asociados correctamente";
}
else {
	echo "$status:ERROR al asociar los ciclos con el IES";
}
?>