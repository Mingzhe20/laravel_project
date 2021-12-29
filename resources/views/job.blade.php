<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <div class="container">
        <div class="row row-cols-lg-3 row-cols-md-2 row-cols-1">
            @foreach($jobs as $job)
            <div class="col my-2">
                <div class="card h-100">
                    <div class="card-header">
                        {{$job->job_title}}
                    </div>
                    <div class="card-body">
                        <h5>{{$job->job_desc}}</h5>
                        <p>{{$job->job_requirement}}</p>
                        <p>{{$job->job_type}}</p>
                    </div>
                    <div class="card-footer text-end">
                        <a class="btn btn-outline-primary" href="/apply/{{$job->job_id}}">Apply</a>
                    </div>
                </div>
            </div>

            @endforeach
        </div>

    </div>
    <div class="container my-3">
        <div class="row justify-content-center">
            <div class="col-4">
                <form action="" method="post">
                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                   
                    @csrf

                    <input type="hidden" name="admin_id" value="1">

                    <div class="form-floating my-1">
                        <input type="text" class="form-control @error('job_title')is-invalid @enderror" name="job_title" placeholder="Job Title" value="{{old('job_title')}}">
                        <label>Job Title</label>
                        @error('job_title')
                               <div class="invalid-feedback">
                               {{$message}}
                               </div>
                         @enderror
                    </div>



                    <div class="form-floating my-1">
                        <input type="text" name="job_department" class="form-control" placeholder="Department" value="{{old('job_department')}}">
                        <label>Department</label>
                    </div>

                    <div class="form-floating my-1">
                        <input type="text" name="job_desc" class="form-control" placeholder="Description">
                        <label>Description</label>
                    </div>

                    <div class="form-floating my-1">
                        <input type="text" name="job_requirement" class="form-control" placeholder="Requirement">
                        <label>Requirement</label>
                    </div>

                    <div class="form-floating my-1">
                        <input type="text" name="job_type" class="form-control" placeholder="Type">
                        <label>Type</label>
                    </div>

                    <div class="form-floating my-1">
                        <input type="text" name="job_location" class="form-control" placeholder="Location">
                        <label>Location</label>
                    </div>

                    <div class="form-floating my-1">
                        <input type="number" name="salary" class="form-control" placeholder="Salary" min="0">
                        <label>Salary</label>
                    </div>

                    <div class="form-floating my-1">
                        <input type="date" name="start_date" class="form-control" placeholder="Start Date">
                        <label>Start Date</label>
                    </div>

                    <div class="form-floating my-1">
                        <input type="date" name="end_date" class="form-control" placeholder="End Date">
                        <label>End Date</label>
                    </div>

                    <button type="submit" class="btn btn-outline-success">Submit</button>
                    <input type="reset" class="btn btn-outline-secondary">
                </form>
            </div>
            
        </div>
    </div>

    <div class="container">
        <table class="table table-light table-striped table-hover table-bordered">
            <thead class="table-primary">
                <tr>
                    <th><input type="checkbox" id="checkAll"></th>
                    <th>Job ID</th>
                    <th>Admin ID</th>
                    <th>Title</th>
                    <th>Department</h>
                    <th>Description</th>
                    <th>Requirement</th>
                    <th>Type</th>
                    <th>Location</th>
                    <th>Salary</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jobs as $job)

                <tr>
                    <td><input type="checkbox" name="checked" class="check" value="{{$job->job_id}}"></td>
                    <td>{{$job->job_id}}</td>
                    <td>{{$job->admin_id}}</td>
                    <td>{{$job->job_title}}</td>
                    <td>{{$job->job_department}}</td>
                    <td>{{$job->job_desc}}</td>
                    <td>{{$job->job_requirement}}</td>
                    <td>{{$job->job_type}}</td>
                    <td>{{$job->job_location}}</td>
                    <td>{{$job->salary}}</td>
                    <td>{{$job->start_date}}</td>
                    <td>{{$job->end_date}}</td>
                    <td>
                        <a class="btn btn-outline-primary edit">Edit</a>
                        <a href="/test/delete/{{$job->job_id}}" class="btn btn-outline-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>


        </table>
        <button class="btn btn-danger mb-4" id="deleteChecked">Delete Checked</button>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        @csrf
                        <input type="hidden" name="admin_id" value="1" id="admin_id">
                        <input type="hidden" name="job_id" id="job_id" value="">

                        <div class="form-floating my-1">
                            <input type="text" class="form-control" name="job_title" id="title" placeholder="Job Title">
                            <label>Job Title</label>
                            
                        </div>

                        <div class="form-floating my-1">
                            <input type="text" name="job_department" class="form-control" id="department" placeholder="Department">
                            <label>Department</label>
                        </div>

                        <div class="form-floating my-1">
                            <input type="text" name="job_desc" id="desc" class="form-control" placeholder="Description">
                            <label>Description</label>
                        </div>

                        <div class="form-floating my-1">
                            <input type="text" name="job_requirement" class="form-control" id="requirement" placeholder="Requirement">
                            <label>Requirement</label>
                        </div>

                        <div class="form-floating my-1">
                            <input type="text" name="job_type" class="form-control" id="type" placeholder="Type">
                            <label>Type</label>
                        </div>

                        <div class="form-floating my-1">
                            <input type="text" name="job_location" class="form-control" id="location" placeholder="Location">
                            <label>Location</label>
                        </div>

                        <div class="form-floating my-1">
                            <input type="number" name="salary" class="form-control" id="salary" placeholder="Salary">
                            <label>Salary</label>
                        </div>

                        <div class="form-floating my-1">
                            <input type="date" name="start_date" class="form-control" id="startdate" placeholder="Start Date">
                            <label>Start Date</label>
                        </div>

                        <div class="form-floating my-1">
                            <input type="date" name="end_date" id="enddate" class="form-control" placeholder="End Date">
                            <label>End Date</label>
                        </div>


                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="update">Update</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#checkAll').click(function() {
                $('input:checkbox.check').prop('checked', this.checked);
            });
            $('#deleteChecked').click(function() {

                var checked = $('.check:checked').map(function() {
                    return $(this).val();
                }).get();

                for (i = 0; i < checked.length; i++) {
                    $.ajax({
                        type: "DELETE",
                        url: '/api/job/' + checked[i],
                        success: function(data) {
                            console.log(data);

                        },
                        error: function(data) {
                            console.log('Error:', data);
                        }
                    });
                }

                alert("Deleted!");
                location.reload();
            });


            $('.edit').on('click', function() {
                $('#staticBackdrop').modal('show');

                $tr = $(this).closest('tr');
                var data = $tr.children('td').map(function() {
                    return $(this).text();
                }).get();

                console.log(data);


                $('#job_id').val(data[1]);
                $('#title').val(data[3]);
                $('#department').val(data[4]);
                $('#desc').val(data[5]);
                $('#requirement').val(data[6]);
                $('#type').val(data[7]);
                $('#location').val(data[8]);
                $('#salary').val(data[9]);
                $('#startdate').val(data[10]);
                $('#enddate').val(data[11]);
            });

            $('#update').click(function() {


                var id = $('#job_id').val();

                var formData = {
                    admin_id: $('#admin_id').val(),
                    job_title: $('#title').val(),
                    job_department: $('#department').val(),
                    job_desc: $('#desc').val(),
                    job_requirement: $('#requirement').val(),
                    job_type: $('#type').val(),
                    job_location: $('#location').val(),
                    salary: $('#salary').val(),
                    start_date: $('#startdate').val(),
                    end_date: $('#enddate').val()
                };

                $.ajax({
                    type: "PUT",
                    url: '/api/job/' + id,
                    data: formData,
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        alert("Job Updated!");
                        location.reload();
                    },
                    error: function(data) {
                        console.log('Error:', data);
                    }
                });
            });
        });
    </script>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>