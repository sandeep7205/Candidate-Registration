<?php
// DataBase Connection--------------------------------------
include "/xampp/htdocs/registration/src/assets/db_conn.php";
////--------------------------------------------------------
if (isset($_POST['id'])) {
    $id = $_POST['id'];   
    $f_name = $_POST['editFirstName'];
    $m_name = $_POST['editMiddleName'];
    $l_name = $_POST['editLastName'];
    $datepicker = $_POST['editDatePicker'];
    $gender = $_POST['editGender'];
    $qualification = $_POST['editQualification'];
    $specialisation = $_POST['editSpecialisation'];
    $institute = $_POST['editInstitute'];
    $course = $_POST['editCourse'];
    $description = $_POST['inputTextarea'];
    // $declare = $_POST['inputDeclare'];

    $name = $_FILES['inputImage']['name'];
    $tmp_name = $_FILES['inputImage']['tmp_name']; 
    $path = 'upload/';
    move_uploaded_file($tmp_name, "upload/" .$name);
    $path = "upload/" . $name;

        $sql= "UPDATE candidate_registration SET first_name='$f_name', mid_name='$m_name', last_name='$l_name', dob='$datepicker', gender='$gender', h_qualification='$qualification', specialisation='$specialisation', college_name='$institute', course_enroll='$course', image_file='$path', descriptions='$description' WHERE reg_id='$id'";
        $result = pg_query($dbconn, $sql);
        if($result){
            echo "Updated Successfully";
        }else {
            echo "Error in Updating record";
        }
}

// declaration='$declare',

?>