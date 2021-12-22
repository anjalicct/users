<!DOCTYPE html>
<html>
<head> 
    <meta charset="utf-8">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> -->
        
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
        
        <!-- datepicker -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">

        <title>User Module</title>

        <!-- Scripts -->
        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<body>

    <div class="container pt-3">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-5 mb-4">
            {{ __('Users') }}
        </h2>
        <form action="{{ route('users.update',$user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-xl-12 m-auto">
                    <div class="card shadow">

                        <div class="card-body pl-4 pr-4">

                            <div class="row">

                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="name"> Name <span class="text-danger">*</span> </label>
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{ $user->name }}">
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="email"> Email <span class="text-danger">*</span> </label>
                                        <input type="text" name="email" id="email" class="form-control" placeholder="Email" value="{{ $user->email }}">
                                    </div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="name"> Image </label>
                                        <a href="{{ asset('/user_images/'. $user->id . '/' . $user->user_image) }}" target="_blank" >
                                            <img width="200" height="200" src="{{ asset('/user_images/'. $user->id . '/' . $user->user_image) }}" class="form-control-file col-xl-6" alt="Image not Found">
                                        </a>
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="name"> Upload New Image</label>
                                        <input type="file" name="user_image" id="user_image" class="form-control-file">
                                         <span class="text-danger"> Note : This will replace your old image.</span>
                                    </div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="is_admin"> Type <span class="text-danger">*</span> </label>
                                        <select name="is_admin" class="form-control">
                                            <option selected>Select Type</option>
                                            <option value="0" {{ $user->is_admin == "0" ? 'selected' : '' }}>User</option>
                                            <option value="1" {{ $user->is_admin == "1" ? 'selected' : '' }}>Admin</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="role_id"> Role <span class="text-danger">*</span> </label>
                                        <select name="role_id" class="form-control">
                                            <option disable selected value>Select Role</option>
                                            <option value="0" {{ $user->role_id == '0' ? 'selected' : ''}}> Default</option>
                                        </select>                             
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-xl-6 offset-lg-6 text-right">
                                    <button type="submit" class="btn btn-success"> Update </button>
                                    <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
                                </div>
                            </div>

                    </div>

                </div>
            </div>
    
        </form>
    </div>

</body>
</html>