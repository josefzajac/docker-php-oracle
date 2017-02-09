<?php

$connection = oci_pconnect('sysmte', 'oracle', 'oracle_node:1521/XEXDB');

$id = '21';
$stmt = oci_parse($connection, "BEGIN select users.email into :output_param from users where user_id=:user_id; END;");


oci_bind_by_name($stmt, ':user_id', $id, 20);
oci_bind_by_name($stmt, ':output_param', $result, 20);

//Bind Cursor
$p_cursor = oci_new_cursor($connection);
oci_bind_by_name($stmt, ':p_cursor', $p_cursor, -1, OCI_B_CURSOR);

// Execute Statement
oci_execute($stmt);
oci_execute($p_cursor, OCI_DEFAULT);

oci_fetch_all($p_cursor, $cursor, null, null, OCI_FETCHSTATEMENT_BY_ROW);

echo $result;
echo '<br>';
var_dump($cursor);

die();
