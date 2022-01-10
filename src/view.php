<?php
// DataBase Connection--------------------------------------
include "/xampp/htdocs/registration/src/assets/db_conn.php";
////--------------------------------------------------------

if (isset($_POST['query'])) {
    // $search = pg_escape_string($dbconn, $_POST['query']);
    //for search bar
    $sql = "SELECT candidate_registration.*, high_qualification.*, specialisation.*,course_enroll.* FROM candidate_registration join high_qualification on candidate_registration.h_qualification =high_qualification.q_id join specialisation on candidate_registration.specialisation = specialisation.s_id join course_enroll on candidate_registration.course_enroll = course_enroll.course_id WHERE reg_id || first_name || mid_name || last_name ||dob || gender|| qualification ||branch ||college_name ||course LIKE '%{$_POST['query']}%'";
} else {
    //fetch record to table
    $sql = "SELECT candidate_registration.*, high_qualification.*, specialisation.*,course_enroll.* FROM candidate_registration join high_qualification on candidate_registration.h_qualification =high_qualification.q_id join specialisation on candidate_registration.specialisation = specialisation.s_id join course_enroll on candidate_registration.course_enroll = course_enroll.course_id ORDER BY reg_id ASC";
}
$result = pg_query($dbconn, $sql);
$sl_no = 0;
if (pg_num_rows($result) > 0) {
    while ($row = pg_fetch_assoc($result)) {
        $sl_no += 1;
        echo '<tr class = "table">
                <th scope="row">' . $sl_no . '</th>
                <td>' . $row["reg_id"] . ' </td>
                <td>' . $row["first_name"] . ' ' . $row["mid_name"] . ' ' . $row["last_name"]  .  '</td>

                
                <td><a href="" class="badge badge-dark text-wrap p-2 viewData"  data-toggle= "modal" data-target="#viewModal" data-val=' . $row["reg_id"] . '>View</a>     
                <a href="" class="badge badge-dark text-wrap p-2 editData"  data-toggle= "modal" data-target="#editModal" data-val=' . $row["reg_id"] . '>Edit</a>     
                <a href="" class="badge badge-dark text-wrap p-2"  id="deleteData" data-val=' . $row["reg_id"] . '>Delete</a></td>
                </tr>';
            }
        } else { ?>
    <tr>
        <td>No Record Found</td>
        <tr>
            <?php
}
?>
   
    <!-- <td>' . $row["dob"] . ' </td>
    <td>' . $row["gender"] . ' </td>
    <td>' . $row["qualification"] . ' </td>
    <td>' . $row["branch"] . ' </td>
    <td>' . $row["college_name"] . ' </td>
    <td>' . $row["course"] . ' </td>
    <td><img src=' . $row["image_file"] . ' style = "width:100px; height : 100px;"></td>
    <td>' . $row["descriptions"] . ' </td> -->