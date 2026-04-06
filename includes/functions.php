<?php

require "Database.php";

$obj->select( 'admin_details' );

echo '<pre>';
print_r( $obj->getResult() );
echo '</pre>';

?>