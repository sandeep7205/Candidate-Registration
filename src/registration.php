<!-- ------- Include PostgresSQL DataBase Connection (db_conn.php)  --------- -->
<?php include "/xampp/htdocs/registration/src/assets/db_conn.php"; ?>
<!-- ------------------------------------------------------------------------ -->

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
    <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
    <title>Candidate Registration</title>
</head>

<body style="background-image: url(/registration/others/background.jpg); background-repeat: no-repeat; background-size: 100% 26%;">

    <!-- ----------------------- Inclue header.php file ------------------------- -->
    <?php include "/xampp/htdocs/registration/src/assets/header.php"; ?>
    <!-- ------------------------------------------------------------------------ -->

    <div class="container-fluid  mt-3 ">
        <div class="justify-content-center mt-4 pb-4 border rounded bg-white w-75 mx-auto">
            <h5 class="text-center  my-4 pb-3" style="color:rgb(20, 200, 190);">Candidate Registration</h5>
            <span id="response"></span>
            <div class="d-flex justify-content-center mt-4" id="divData" id="insertData">
                <form action="/registration/src/add.php" id="uploadForm" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="inputFirstName">First Name</label>
                            <input type="text" class="form-control border-dark" id="inputFirstName" name="inputFirstName" placeholder="Enter First Name" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="inputMiddleName">Middle Name</label>
                            <input type="text" class="form-control border-dark" id="inputMiddleName" name="inputMiddleName" placeholder="Enter Middle Name">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="inputLastName">Last Name</label>
                            <input type="text" class="form-control border-dark" id="inputLastName" name="inputLastName" placeholder="Enter Last Name" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3 mx-auto">
                            <label for="inputDatePicker">DOB</label>
                            <p><input type="text" class="form-control border-dark" id="inputDatePicker" name="inputDatePicker" placeholder="Select DOB" required></p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div>
                                <label for="inputGender">Gender</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inputGender" id="inputMale" value="male" required>
                                <label class="form-check-label" for="inputMale">MALE</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inputGender" id="inputFemale" value="female" required>
                                <label class="form-check-label" for="inputFemale">FEMALE</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <!-- ------------------------Highest Qualification-------------------------------------------- -->
                        <div class="form-group col-md-6 mb-4">
                            <label for="inputQualification">Highest Qualification</label>
                            <select id="inputQualification" class="form-control border-dark" name="inputQualification" required>
                                <option value="">Select</option>
                                <!-- ------Fetch respective Higher Qualifications from PgAdmin Database----------- -->
                                <?php
                                $query = "SELECT * FROM high_qualification";
                                $result = pg_query($dbconn, $query);
                                while ($row = pg_fetch_assoc($result)) {
                                    echo '<option value="' . $row["q_id"] . '">' . $row["qualification"] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <!-- -------------------------------------------------------------------------------------------- -->
                        <div class="form-group col-md-6 mb-4">
                            <label for="inputSpecialisation">Specialisation</label>
                            <select id="inputSpecialisation" class="form-control border-dark" name="inputSpecialisation" required>
                                <option value="">Select</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 mb-4">
                            <label for="validateInstitute">Name of School/College</label>
                            <input type="text" class="form-control border-dark" id="inputInstitute" name="inputInstitute" placeholder="Enter School/College" required>
                        </div>
                        <!-- ------------------------Course Enrollment-------------------------------------------- -->
                        <div class="form-group col-md-6 mb-4">
                            <label for="inputCourse">Which Course you want to Enroll for?</label>
                            <select id="inputCourse" class="form-control border-dark" name="inputCourse" required>
                                <option selected>Select Course</option>
                                <!-- ------Fetch respective Courses from PgAdmin Database----------- -->
                                <?php
                                $query = "SELECT * FROM course_enroll";
                                $result = pg_query($dbconn, $query);
                                while ($row = pg_fetch_assoc($result)) {
                                    echo '<option value="' . $row["course_id"] . '">' . $row["course"] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <!-- ---------------------------------------------------------------------------------------- -->
                    </div>
                    <!-- ------------------------Upoload Image------------------------------------------------------- -->
                    <div class="form-row">
                        <div class="form-group col-md-6 mb-4">
                            <label for="image">Upload Photo</label>
                            <div>
                                <img src="/registration/others/piclogo.JPG" id="frame" class="rounded-sm my-2 mr-3 " alt="..." width="85px" height="90px">
                                <label for="inputImage" class="badge badge-secondary" style="padding: 8px; background-color:#e9ecef; color: grey;">Browse Photo</label>
                                <input type="file" class="d-none" id="inputImage" name="inputImage" accept="image/png, image/jpeg" onchange="preview()" required>
                            </div>
                        </div>
                        <!-- ---------------------------------------------------------------------------------------- -->
                        <div class="form-group col-md-6 mb-4">
                            <label for="inputTextarea">Description</label>
                            <textarea id="inputTextarea" name="inputTextarea" rows="4" cols="50" placeholder="Why do you want to enroll for this course">
                        </textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="checked" id="inputDeclare" name="inputDeclare" time() required>
                            <label class="form-check-label" for="inputDeclare">
                                <em>I hereby declare that the details furnished above are true and correct to the best of my knowlage and belief.</em>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center m-2">
                        <button class="btn text-white btn-warning" type="submit" style="width: 100px;">SUBMIT</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- ----------------------- Inclue footer.php file ------------------------- -->
    <?php include "/xampp/htdocs/registration/src/assets/footer.php"; ?>
    <!-- ------------------------------------------------------------------------ -->

    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script> -->

    <!--------------- Date Picker for 'DOB form field' --------------------------------------------------------------------->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function() {
            $("#inputDatePicker").datepicker({
                changeMonth: true,
                changeYear: true
            });
        });
    </script>
    <!------------------------------------------------------------------------------------------------------------------------>
    <!------------ for fetching Specialisation dependent dropdown-------------------------------------------------------------------- -->
    <script type="text/javascript">
        $(document).ready(function() {
            $("#inputQualification").change(function() { //when any higher_qualification selected 'on_change' event will call 
                var hq_id = $(this).val(); //hq_id = highest qualification id
                $.ajax({
                    url: "/registration/src/assets/specialisationData.php",
                    type: "POST",
                    data: {
                        hq_id: hq_id
                    },
                    success: function(data) {
                        $("#inputSpecialisation").html(data);
                    }
                });
            });
        });
    </script>
    <!-- ------------------------------------------------------------------------------------------------------------------ -->
    <!---------------------------------- Preview image before uploding----------------------------------------------------- -->
    <script type="text/javascript">
        function preview() {
            frame.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
    <!-- ------------------------------------------------------------------------------------------------------------------ -->
    <!---------------------------------------------- use to Insert Data from (form) to add.php ---------------------------------------------->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#uploadForm').submit(function(valid) {
                valid.preventDefault();
                var f_name = $('#inputFirstName').val();
                var m_name = $('#inputMiddleName').val();
                var l_name = $('#inputLastName').val();
                var datepicker = $('#inputDatePicker').val();
                var gender = $('input[type="radio"]:checked').val();
                var qualification = $('#inputQualification').val();
                var specialisation = $('#inputSpecialisation').val();
                var institute = $('#inputInstitute').val();
                var course = $('#inputCourse').val();
                var image = $('#inputImage').val();
                var description = $('#inputTextarea').val();
                var declare = $('#inputDeclare').val();
                
                if (f_name != "" && l_name != "" && datepicker != "" && gender != "" && qualification != "" && specialisation != "" && institute != "" && course != "" && course != "" && declare != "") {

                    $.ajax({
                        url: $(this).attr('action'),
                        type: "POST",
                        data: new FormData(this), //use assigned names inside the form tag
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            $('#insertData').html(data);
                            // console.log(data);
                            location.reload();
                            alert("Data inserteded successfully");
                        },
                        error: function() {}
                    });
                } else {
                    alert('Please fill all the fields!');
                }

            });
        });
    </script>
    <!-- ------------------------------------------------------------------------------------------------------------------ -->

</body>

</html>