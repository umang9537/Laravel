@extends('layouts.app')

@section('content')

{{-- Add Modal --}}
<div class="modal fade" id="AddStudentModal" tabindex="-1" aria-labelledby="AddStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="add_student" enctype="multipart/form-data">
            <div class="modal-header">
                <h5 class="modal-title" id="AddStudentModalLabel">Add Student Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <ul id="save_msgList"></ul>

                <div class="form-group mb-3">
                    <label for="">Full Name</label>
                    <input type="text" required class="name form-control"  name="name">
                </div>
                <div class="form-group mb-3">
                    <label for="">Course</label>
                    <input type="text" required class="course form-control" name="course">
                </div>
                <div class="form-group mb-3">
                    <label for="">Email</label>
                    <input type="text" required class="email form-control"  name="email">
                </div>
                <div class="form-group mb-3">
                    <label for="">Phone No</label>
                    <input type="text" required class="phone form-control"  name="phone">
                </div>
                
                <div class="row">
                    <div class="form-group col-6"> 
                        <label for="name">Gender</label><br>
                        <input type="radio" name="addgender" value="Male">
                        <label for="html">Male</label><br>
                        <input type="radio" name="addgender" value="Female" >
                        <label for="css">Female</label><br>
                    </div>
               
                    <div class="form-group col-6"> 
                        <label for="name">Hobbies</label><br>
                        <input type="checkbox" name="addhobbi[]" value="Music">
                        <label for="Music">Music</label><br>

                        <input type="checkbox" name="addhobbi[]" value="Reading">
                        <label for="Reading">Reading</label><br>

                        <input type="checkbox" name="addhobbi[]" value="Traveling">
                        <label for="Traveling">Traveling</label><br><br>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="avatar">Choose a profile picture:</label>
                    <input type="file" id="select_profile" name="select_profile" accept="image/png, image/jpeg" />
                    <img id="addimgs" width="170px" height="160px" class="d-none"></img>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary add_student">Save</button>
            </div>
            </form>

        </div>
    </div>
</div>


{{-- Edit Modal --}}
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="update_student" enctype="multipart/form-data">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit & Update Student Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <ul id="update_msgList"></ul>

                <input type="hidden" id="stud_id" />

                <div class="form-group mb-3">
                    <label for="">Full Name</label>
                    <input type="text" id="name" name="name" required class="form-control">
                </div>

                <div class="form-group mb-3">
                    <label for="">Course</label>
                    <input type="text" id="course" name="course" required class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">Email</label>
                    <input type="text" id="email" name="email" required class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">Phone No</label>
                    <input type="text" id="phone" name="phone" required class="form-control">
                </div>

                <div class="row">
                    <div class="form-group col-6"> 
                        <label for="name">Gender</label><br>
                        <input type="radio" id="html" name="gender" value="Male" 
                            {{ old('gender') == 'Male' ? 'checked' : '' }}>
                        <label for="html">Male</label><br>

                        <input type="radio" id="css" name="gender" value="Female" 
                            {{ old('gender') == 'Female' ? 'checked' : '' }}>
                        <label for="css">Female</label><br>
                    </div>
               
                    <div class="form-group col-6"> 
                        <label for="name">Hobbies</label><br>
                        <input type="checkbox" id="Music" name="hobbi[]" value="Music">
                        <label for="Music">Music</label><br>

                        <input type="checkbox" id="Reading" name="hobbi[]" value="Reading">
                        <label for="Reading">Reading</label><br>

                        <input type="checkbox" id="Traveling" name="hobbi[]" value="Traveling">
                        <label for="Traveling">Traveling</label><br><br>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="avatar">Choose a profile picture:</label>
                    <input type="file" id="edit_select_profile" name="edit_select_profile" accept="image/png, image/jpeg" />
                    <img id="imgs" width="170px" height="160px" class="d-none"></img>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary update_student">Update</button>
            </div>
            </form>

        </div>
    </div>
</div>
{{-- Edn- Edit Modal --}}


{{-- Delete Modal --}}
<div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Student Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4>Confirm to Delete Data ?</h4>
                <input type="hidden" id="deleteing_id">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary delete_student">Yes Delete</button>
            </div>
        </div>
    </div>
</div>
{{-- End - Delete Modal --}}

<div class="container py-5">
    <div class="row">
        <div class="col-md-12">

            <div id="success_message"></div>

            <div class="card">
                <div class="card-header">
                    <h4>
                        Student Data
                        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                            data-bs-target="#AddStudentModal">Add Student</button>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Course</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Gender</th>
                                <th>Hobbi</th>
                                <th>Image</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

<script>
    $(document).ready(function () {

        fetchstudent();

        function fetchstudent() {
            $.ajax({
                type: "GET",
                url: "/fetch-students",
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    $('tbody').html("");
                    $.each(response.students, function (key, item) {
                        $('tbody').append('<tr>\
                            <td>' + item.id + '</td>\
                            <td>' + item.name + '</td>\
                            <td>' + item.course + '</td>\
                            <td>' + item.email + '</td>\
                            <td>' + item.phone + '</td>\
                            <td>' + item.gender + '</td>\
                            <td>' + item.hobbi + '</td>\
                            <td><img src="' + "{{ asset('uploads/profile') }}/" + item.profile + '" alt="Profile Image" width="50" height="50"></td>\
                            <td><button type="button" value="' + item.id + '" class="btn btn-primary editbtn btn-sm">Edit</button></td>\
                            <td><button type="button" value="' + item.id + '" class="btn btn-danger deletebtn btn-sm">Delete</button></td>\
                        \</tr>');
                    });
                }
            });
        }

        $('#add_student').on('submit', function(e) {
            e.preventDefault();

            $('.add_student').text('Sending..');

            let formData = new FormData(this);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: "/students",
                data: formData,
                dataType: "json",
                processData: false,
                contentType: false,
                cache: false,
                success: function (response) {
                    // console.log(response);
                    if (response.status == 400) {
                        $('#save_msgList').html("");
                        $('#save_msgList').addClass('alert alert-danger');
                        $.each(response.errors, function (key, err_value) {
                            $('#save_msgList').append('<li>' + err_value + '</li>');
                        });
                        $('.add_student').text('Save');
                    } else {
                        $('#save_msgList').html("");
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('#AddStudentModal').find('input').val('');
                        $('.add_student').text('Save');
                        $('#AddStudentModal').modal('hide');
                        fetchstudent();
                    }
                }
            });

        });

        $(document).on('click', '.editbtn', function (e) {
            e.preventDefault();
            var stud_id = $(this).val();
            // alert(stud_id);
            $('#editModal').modal('show');
                $.ajax({
                type: "GET",
                url: "/edit-student/" + stud_id,
                success: function (response) {
                    if (response.status == 404) {
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('#editModal').modal('hide');
                    } else {
                        // Reset the form before populating
                        //$('#update_student')[0].reset();

                        // Set the student's existing data
                        $('#name').val(response.student.name);
                        $('#course').val(response.student.course);
                        $('#email').val(response.student.email);
                        $('#phone').val(response.student.phone);
                        $('#stud_id').val(stud_id);

                        // Reset gender selection and check the correct gender
                        $('input[name="gender"]').prop('checked', false);  // Reset the gender selection
                        $('input[name="gender"][value="' + response.student.gender + '"]').prop('checked', true);  // Set the correct gender

                        // Reset and check the hobbies
                        let hobbi = JSON.parse(response.student.hobbi || '[]');  // Safely parse hobbies, default to an empty array if null or undefined
                        $('input[name="hobbi[]"]').prop('checked', false);  // Uncheck all checkboxes

                        // Check only the matching hobbies
                        $('input[name="hobbi[]"]').each(function () {
                            if (hobbi.includes($(this).val())) {
                                $(this).prop('checked', true);
                            }
                        });

                        $("#imgs").attr('src',URL.createObjectURL(_file));
                    }
                }
            });
            $('.btn-close').find('input').val('');
        });

        $('#update_student').on('submit', function(e) {
            e.preventDefault();
            $('.update_student').text('Updating..');
            var id = $('#stud_id').val();
            let formData = new FormData(this);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "Post",
                enctype: 'multipart/form-data',
                url: "/update-student/" + id,
                data: formData,
                dataType: "json",
                processData: false,
                contentType: false,
                cache: false,
                success: function (response) {
                    // console.log(response);
                    if (response.status == 400) {
                        $('#update_msgList').html("");
                        $('#update_msgList').addClass('alert alert-danger');
                        $.each(response.errors, function (key, err_value) {
                            $('#update_msgList').append('<li>' + err_value +
                                '</li>');
                        });
                        $('.update_student').text('Update');
                    } else {
                        $('#update_msgList').html("");

                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('#editModal').find('input').val('');
                        $('.update_student').text('Update');
                        $('#editModal').modal('hide');
                        fetchstudent();
                    }
                }
            });
        });

        $(document).on('click', '.deletebtn', function () {
            var stud_id = $(this).val();
            $('#DeleteModal').modal('show');
            $('#deleteing_id').val(stud_id);
        });

        $(document).on('click', '.delete_student', function (e) {
            e.preventDefault();

            $(this).text('Deleting..');
            var id = $('#deleteing_id').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                url: "/delete-student/" + id,
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    if (response.status == 404) {
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('.delete_student').text('Yes Delete');
                    } else {
                        $('#success_message').html("");
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('.delete_student').text('Yes Delete');
                        $('#DeleteModal').modal('hide');
                        fetchstudent();
                    }
                }
            });
        });

    });

    $(document).on('change','#edit_select_profile',function(event){
        var files = event.target.files
        if (files.length > 0) {
            var _file = files[0];
            console.log(_file);
            var filename = _file.name;
            var filesize = _file.size;
            var extension = filename.split('.').pop().toLowerCase();
            if (extension == 'jpg' || extension == 'png' ) {
                if(filesize > 3145728){/*1048576-1MB(You can change the size as you want)*/
                        alert("File size too large! Please upload less than 3MB");
                        this.value = "";
                        return false;
                }
                $("#imgs").attr('src',URL.createObjectURL(_file));
            } else {
                alert('Please upload jpg,png file only.');
            }
        }
    });

    $(document).on('change','#select_profile',function(event){
        var files = event.target.files
        if (files.length > 0) {
            var _file = files[0];
            console.log(_file);
            var filename = _file.name;
            var filesize = _file.size;
            var extension = filename.split('.').pop().toLowerCase();
            if (extension == 'jpg' || extension == 'png' ) {
                if(filesize > 3145728){/*1048576-1MB(You can change the size as you want)*/
                        alert("File size too large! Please upload less than 3MB");
                        this.value = "";
                        return false;
                }
                $("#addimgs").attr('src',URL.createObjectURL(_file));
            } else {
                alert('Please upload jpg,png file only.');
            }
        }
    });
    
</script>

@endsection