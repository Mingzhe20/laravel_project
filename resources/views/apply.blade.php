<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <div class="container my-3">
        <div class="row">
            <div class="col" style="max-width:600px;">
                <form class="form" method="post" action="" enctype="multipart/form-data">
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
                    <div class="row">
                        <h4>Intern Details</h4>
                        <div class="col">
                            <div class="form-floating my-1">
                                <input type="text" class="form-control" name="intern_name" placeholder="Name">
                                <label>Name</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating my-1">
                                <input type="tel" class="form-control" name="intern_phone" placeholder="Phone">
                                <label>Phone</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating my-1">
                                <input type="email" class="form-control" name="intern_email" placeholder="Email">
                                <label>Email</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating my-1">
                                <input type="date" class="form-control" name="time_to_start" placeholder="Coure Start Date">
                                <label>Coure Start Date</label>
                            </div>
                        </div>

                        <div class="col">

                            <div class="form-floating my-1">
                                <input type="date" class="form-control" name="time_to_end" placeholder="Coure End Date">
                                <label>Coure End Date</label>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col">
                            <div class="form-floating my-1">
                                <input type="file" name="resume" class="form-control p-5" placeholder="Resume">
                                <label>Resume</label>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <h4 class="my-1">Education</h4>
                            <div class="form-floating my-1">
                                <input type="text" class="form-control" name="current_edu_level" placeholder="Current Education Level">
                                <label>Current Education Level</label>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-floating my-1">
                                <input type="text" class="form-control" name="current_edu_institution" placeholder="Education Institution">
                                <label>Education Institution</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating my-1">
                                <input type="text" class="form-control" name="current_institution_location" placeholder="Education Location">
                                <label>Education Location</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating my-1">
                                <input type="text" class="form-control" name="study_field" placeholder="Study Field">
                                <label>Study Field</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating my-1">
                                <input type="text" class="form-control" name="grad_period" placeholder="Grad Period">
                                <label>Grad Period</label>
                            </div>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col">
                            <button type="submit" class="btn btn-outline-success">Submit</button>
                            <input type="reset" class="btn btn-outline-secondary">
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>



</body>

</html>