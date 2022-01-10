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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- for paigination -->
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script> -->
    <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
    <title>List of Candidates</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }
    </style>
    <!-- <script>
        $(document).ready(function() {
            $('#candidateData').DataTable();
        });
    </script> -->
</head>

<body>
    <!-- View Modal -->
    <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Candidate Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" onclick="location.reload(true);">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-border">
                        <tbody>

                            <tr>
                                <td colspan="2"><span id="image"><img class="rounded mx-auto d-block" id="view_image" src="" alt="" width="120px" height="130px"></span></td>
                            </tr>
                            <tr>
                                <td>Reg. Id. :</td>
                                <td><span id="view_id"></span></td>
                            </tr>
                            <tr>
                                <td>Name :</td>
                                <td id="view_name"></td>
                            </tr>
                            <tr>
                                <td>DOB :</td>
                                <td id="view_dob"></td>
                            </tr>
                            <tr>
                                <td>Gender :</td>
                                <td id="view_gender"></td>
                            </tr>
                            <tr>
                                <td>Highest Qualification :</td>
                                <td id="view_qualification"></td>
                            </tr>
                            <tr>
                                <td>Specialisation :</td>
                                <td id="view_specialisation"></td>
                            </tr>
                            <tr>
                                <td>School/Collage :</td>
                                <td id="view_institute"></td>
                            </tr>
                            <tr>
                                <td>Course_enroll :</td>
                                <td id="view_course"></td>
                            </tr>
                            <tr>
                                <td>Description :</td>
                                <td id="view_description"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="location.reload(true);">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
        </div>
    </div>


    <!-- Update Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" onclick="location.reload(true);">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid  mt-3 ">
                        <div class="justify-content-center mt-4 pb-4 border rounded bg-white w-75 mx-auto">
                            <h5 class="text-center  my-4 pb-3" style="color:rgb(20, 200, 190);">Edit Candidate Registration</h5>
                            <span id="response"></span>
                            <div class="d-flex justify-content-center mt-4" id="divData">
                                <form id="uploadForm" enctype="multipart/form-data">
                                    <input type="hidden" name="id" id="reg_id">
                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <label for="editFirstName">First Name</label>
                                            <input type="text" class="form-control border-dark" id="edit_FirstName" name="editFirstName" placeholder="Enter First Name">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="editMiddleName">Middle Name</label>
                                            <input type="text" class="form-control border-dark" id="edit_MiddleName" name="editMiddleName" placeholder="Enter Middle Name">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="editLastName">Last Name</label>
                                            <input type="text" class="form-control border-dark" id="edit_LastName" name="editLastName" placeholder="Enter Last Name">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3 mx-auto">
                                            <label for="editDatePicker">DOB</label>
                                            <p><input type="text" class="form-control border-dark" id="edit_DatePicker" name="editDatePicker" placeholder="Select DOB"></p>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div>
                                                <label for="editGender">Gender</label>
                                            </div>
                                            <div class="form-check form-check-inline" id="edit">
                                                <input class="form-check-input" type="radio" name="editGender" id="edit_Male" value="male">
                                                <label class="form-check-label" for="edit_Male">MALE</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="editGender" id="edit_Female" value="female">
                                                <label class="form-check-label" for="editFemale">FEMALE</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <!-- ------------------------Highest Qualification-------------------------------------------- -->
                                        <div class="form-group col-md-6 mb-4">
                                            <label for="editQualification">Highest Qualification</label>
                                            <select id="edit_Qualification" class="form-control border-dark" name="editQualification">
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
                                            <label for="editSpecialisation">Specialisation</label>
                                            <select id="edit_Specialisation" class="form-control border-dark" name="editSpecialisation">
                                                <option value="">Select</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6 mb-4">
                                            <label for="editInstitute">Name of School/College</label>
                                            <input type="text" class="form-control border-dark" id="edit_Institute" name="editInstitute" placeholder="Enter School/College">
                                        </div>
                                        <!-- ------------------------Course Enrollment-------------------------------------------- -->
                                        <div class="form-group col-md-6 mb-4">
                                            <label for="editCourse">Which Course you want to Enroll for?</label>
                                            <select id="edit_Course" class="form-control border-dark" name="editCourse">
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
                                                <span id="user_image">
                                                    <img id="use_image" src="" alt="" width="90px" height="95px">
                                                </span>
                                                <label for="inputImage" class="badge badge-secondary" style="padding: 8px; background-color:#e9ecef; color: grey;">Browse Photo</label>
                                                <input type="file" class="d-none" id="inputImage" name="inputImage" accept="image/png, image/jpeg" onchange="preview()">
                                            </div>
                                        </div>
                                        <!-- ---------------------------------------------------------------------------------------- -->
                                        <div class="form-group col-md-6 mb-4">
                                            <label for="inputTextarea">Description</label>
                                            <textarea id="inputTextarea" name="inputTextarea" rows="4" cols="45" placeholder="Why do you want to enroll for this course">
                        </textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="checked" id="inputDeclare" name="inputDeclare">
                                            <label class="form-check-label" for="inputDeclare">
                                                <em>I hereby declare that the details furnished above are true and correct to the best of my knowlage and belief.</em>
                                            </label>
                                        </div>
                                    </div>
                                    <!-- <div class="d-flex justify-content-center m-2">
                                        <button class="btn text-white btn-warning" type="submit" style="width: 100px;">SUBMIT</button>
                                    </div> -->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="update" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="location.reload();">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- ---------------------------------------------------------------------------------------------------------------------------------- -->
    <!-- Candidate Table -->
    <h4 class="text-center my-3" style="color:rgb(20, 200, 190);">List of Candidates</h4>
    <div class="col-md-4 form-group mx-auto">
        <input type="text" id="search" class="form-control" autocomplete="off" placeholder="Search here.."><br>
    </div>
    <!-- <a href="add.html">Add New Data</a><br /><br /> -->
    <div class="table-responsive">
        <table class="table table-bordered table-sm text-center" id="dataTable">
            <thead>
                <tr>
                    <th scope="col">Sl no.</th>
                    <th scope="col">Reg. Id.</th>
                    <th scope="col">Name</th>
                    <!-- <th scope="col">DOB</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Higher Qualification</th>
                    <th scope="col">Specialisation</th>
                    <th scope="col">Name of College</th>
                    <th scope="col">Enrolled Course</th>
                    <th scope="col">Image</th>
                    <th scope="col">Description</th> -->
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody id="candidateData">


            </tbody>
        </table>
    </div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->


    <!---------------------------------------------- use to fetch Data &live search in a table by using view.php ---------------------------------------------->

    <!---jQuery ajax live search --->
    <script type="text/javascript">
        $(document).ready(function() {
            // fetch data from table without reload/refresh page
            loadData();

            function loadData(query) {
                $.ajax({
                    url: '/registration/src/view.php',
                    type: "POST",
                    chache: false,
                    data: {
                        query: query
                    },
                    success: function(response) {
                        $("#candidateData").html(response);
                    }
                });
            }

            // live search data from table without reload/refresh page
            $("#search").keyup(function() {
                var search = $(this).val();
                if (search != "") {
                    loadData(search);
                } else {
                    loadData();
                }
            });
        });
    </script>
    <!----------------------------------------------- use to delete data by using delet.php --------------------------------------------->

    <script type="text/javascript">
        $(document).on('click', '#deleteData', function() {
            var dlt_id = $(this).attr('data-val');
            if (confirm("Are you want to delete this record?")) {
                $.ajax({
                    url: '/registration/src/delete.php',
                    type: "POST",
                    data: {
                        dlt_id: dlt_id
                    },
                    success: function(data) {
                        location.reload();
                        alert(data);

                    }
                });
            }
        });
    </script>
    <!-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- > -->
    <!-- Custom event to select specialisation dropdown accoring to high_qualification -->
    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('update:sp', function(event, hq_id, options, sp_ele) {
                if (!sp_ele) {
                    sp_ele = 'edit_Specialisation';
                }
                var op = options;
                var $sp = $('#' + sp_ele);
                if (hq_id) {
                    $.ajax({
                        url: "/registration/src/assets/specialisationData.php",
                        type: "POST",
                        data: {
                            hq_id: hq_id
                        },
                        success: function(data) {
                            $sp.html(data);
                            $('#edit_Specialisation option[value="' + op + '"]').attr("selected", "selected");
                        }
                    });
                }
            });
        });
    </script>

    <!---------------------------------- Preview image before uploding----------------------------------------------------- -->
    <script type="text/javascript">
        function preview() {
            use_image.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
    <!-- ------------------------------------------------------------------------------------------------------------------ -->
    <!-- ------------------------------------------------VIEW MODAL------------------------------------------------------------------ -->
    <script type="text/javascript">
        $(document).on('click', '.viewData', function() {
            var id = $(this).attr('data-val');
            $.ajax({
                url: '/registration/src/edit_userdata.php',
                type: "POST",
                data: {
                    id: id
                },
                dataType: "JSON",
                success: function(data) {
                    // var data = $.parseJSON(data);
                    // alert(data.qualification);

                    var image = $("#view_image");
                    image.attr('src', data.image_file);
                    $('#view_id').text(data.reg_id);
                    $('#view_name').text(data.f_name + " " + data.m_name + " " + data.l_name);
                    $('#view_dob').text(data.dob);
                    $('#view_gender').text(data.gender);
                    $('#view_qualification').text(data.qualification);
                    $('#view_specialisation').text(data.branch);
                    $('#view_institute').text(data.collage_name);
                    $('#view_course').text(data.course);
                    $('#view_description').text(data.descriptions);
                }
            })
        });
    </script>


    <!--edit user data-- > -->
    <script type="text/javascript">
        $(document).on('click', '.editData', function() {
            var id = $(this).attr('data-val');
            // alert(id);
            $.ajax({
                url: '/registration/src/edit_userdata.php',
                type: "POST",
                data: {
                    id: id
                },
                success: function(data) {
                    var data = $.parseJSON(data);
                    $('#reg_id').val(data.reg_id);
                    $('#edit_FirstName').val(data.f_name);
                    $('#edit_MiddleName').val(data.m_name);
                    $('#edit_LastName').val(data.l_name);
                    $('#edit_DatePicker').val(data.dob);
                    $("input[name='editGender'][value=" + data.gender + "]").prop('checked', true); //for radio field

                    $('#edit_Qualification').val(data.h_qualification).trigger('change');
                    $(document).trigger('update:sp', [data.h_qualification, data.specialisation, 'edit_specialisation']);

                    $('#edit_Institute').val(data.collage_name);
                    $('#edit_Course').val(data.course_enroll);
                    $('#inputTextarea').val(data.descriptions);
                    $("input[name='inputDeclare'][value=" + data.declaration + "]").prop('checked', true);

                    var image = $("#use_image");
                    image.attr('src', data.image_file);
                
                }
            })
        });

        // <!--Udate user-------------------------------------------------------------------------------------- >
        $(document).ready(function() {
            $('#update').click(function(valid) {
                valid.preventDefault();
                var form_data = new FormData($('#uploadForm')[0]);
                var reg_id = $('#reg_id').val();
                var f_name = $('#edit_FirstName').val();
                var m_name = $('#edit_MiddleName').val();
                var l_name = $('#edit_LastName').val();
                var datepicker = $('#edit_DatePicker').val();
                var gender = $('input[type="radio"]:checked').val();
                var qualification = $('#edit_Qualification').val();
                var specialisation = $('#edit_Specialisation').val();
                var institute = $('#edit_Institute').val();
                var course = $('#edit_Course').val();
                var image = $('#inputImage').val();
                var description = $('#inputTextarea').val();
                var declare = $('#inputDeclare').val();
                console.log(course);
                console.log(image);

                if (f_name != "" && l_name != "" && datepicker != "" && gender != "" && qualification != "" && specialisation != "" && institute != "" && course != "" && image != "" && description != "" && declare != "") {
                    // console.log(f_name);
                    $.ajax({
                        url: '/registration/src/update.php',
                        type: "POST",
                        data: form_data, //use assigned names inside the form tag
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            // console.log(data);
                            $('#output').html(data);
                            alert(data);
                            location.reload();
                            // alert("Data updated successfully")
                        }
                    });
                }
            });
        });
    </script>

    <!--------------- Date Picker for 'DOB form field' --------------------------------------------------------------------->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function() {
            $("#edit_DatePicker").datepicker({
                changeMonth: true,
                changeYear: true
            });
        });
    </script>
    <!------------------------------------------------------------------------------------------------------------------------>
    <!------------ for fetching Specialisation dependent dropdown-------------------------------------------------------------------- -->
    <script type="text/javascript">
        $(document).ready(function() {
            $("#edit_Qualification").change(function() { //when any higher_qualification selected 'on_change' event will call 
                var hq_id = $(this).val(); //hq_id = highest qualification id
                $.ajax({
                    url: "/registration/src/assets/specialisationData.php",
                    type: "POST",
                    data: {
                        hq_id: hq_id
                    },
                    success: function(data) {
                        $("#edit_Specialisation").html(data);
                    }
                });
            });
        });
    </script>
    <!-- ------------------------------------------------------------------------------------------------------------------ -->

</body>

</html>