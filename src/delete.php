<?php
// DataBase Connection--------------------------------------
include "/xampp/htdocs/registration/src/assets/db_conn.php";
////--------------------------------------------------------

if (isset($_POST['dlt_id'])) {
    $delete_id = $_POST['dlt_id'];
        $dlt_sql = "DELETE FROM candidate_registration WHERE reg_id = $delete_id";
        $dlt_result = pg_query($dbconn, $dlt_sql);
        if ($dlt_result) {
            echo 'Record deleted successfully';
        }else {
            echo 'Record not exists';
        }
    }


