<?php
echo $_SERVER['REQUEST_METHOD'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // DataBase Connection--------------------------------------
    include "/xampp/htdocs/registration/src/assets/db_conn.php";
    ////--------------------------------------------------------
    $f_name = $_POST['inputFirstName'];
    $m_name = $_POST['inputMiddleName'];
    $l_name = $_POST['inputLastName'];
    $datepicker = $_POST['inputDatePicker'];
    $gender = $_POST['inputGender'];
    $qualification = $_POST['inputQualification'];
    $specialisation = $_POST['inputSpecialisation'];
    $institute = $_POST['inputInstitute'];
    $course = $_POST['inputCourse'];
    $description = $_POST['inputTextarea'];
    $declare = $_POST['inputDeclare'];

    // image uploading
    $name = $_FILES['inputImage']['name'];
    $tmp_name = $_FILES['inputImage']['tmp_name'];
    $path = 'upload/';
    move_uploaded_file($tmp_name, "upload/" . $name);
    $path = "upload/" . $name;

    // if ($_FILES['inputImage']['name']) {

    //     move_uploaded_file($_FILES['inputImage']['tmp_name'], "upload/" . time() .$_FILES['inputImage']['name']);

    //     $path = "upload/" . time() .$_FILES['inputImage']['name'];
        
        $sql = "INSERT INTO candidate_registration (first_name, mid_name, last_name, dob, gender, h_qualification, specialisation, college_name, course_enroll, image_file, descriptions, declaration ) VALUES ('$f_name','$m_name','$l_name','$datepicker','$gender','$qualification','$specialisation','$institute','$course','$path','$description','$declare')";
        $result = pg_query($dbconn, $sql);
    }
        
// }
