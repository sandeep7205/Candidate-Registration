<?php
// DataBase Connection--------------------------------------
include "/xampp/htdocs/registration/src/assets/db_conn.php";
////--------------------------------------------------------

$id = $_POST['id'];
$sql = "SELECT candidate_registration.*, high_qualification.*, specialisation.*,course_enroll.* FROM candidate_registration join high_qualification on candidate_registration.h_qualification =high_qualification.q_id join specialisation on candidate_registration.specialisation = specialisation.s_id join course_enroll on candidate_registration.course_enroll = course_enroll.course_id WHERE reg_id=$id";
$result = pg_query($dbconn, $sql);
if (pg_num_rows($result) > 0) {
    while ($row = pg_fetch_assoc($result)) {
        $viewData['reg_id'] = $row["reg_id"];
        $viewData['f_name'] = $row["first_name"];
        $viewData['m_name'] = $row["mid_name"];
        $viewData['l_name'] = $row["last_name"];
        $viewData['dob'] = $row["dob"];
        $viewData['gender'] = $row["gender"];
        $viewData['h_qualification'] = $row["h_qualification"];
        $viewData['qualification'] = $row["qualification"];
        $viewData['specialisation'] = $row["specialisation"];
        $viewData['branch'] = $row["branch"];
        $viewData['collage_name'] = $row["college_name"];
        $viewData['course_enroll'] = $row["course_enroll"];
        $viewData['course'] = $row["course"];
        $viewData['image_file'] = $row["image_file"];
        $viewData['descriptions'] = $row["descriptions"];
        $viewData['declaration'] = $row["declaration"];

    }
    echo json_encode($viewData);
} else { ?>
    <tr>
        <td>No data found!</td>
    </tr>
<?php
}
?>