<?php
// DataBase Connection--------------------------------------
include "/xampp/htdocs/registration/src/assets/db_conn.php";
////--------------------------------------------------------
// fetch the specialisation list from specialisation table
$query = "SELECT * FROM specialisation WHERE h_q_id = '".$_POST["hq_id"]."'";
$result = pg_query($dbconn, $query);
$output = "<option value=''>Select</option>"; //use to concate the string comes from "high_qualification"table
while ($row = pg_fetch_assoc($result)) {
    $output .= "<option value='{$row['s_id']}'>{$row['branch']}</option>";
}
echo $output; //return all appended specialisation to [].ajax] (data) in index.php  