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
        
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @elseif ($message = Session::get('warning'))
            <div class="alert alert-warning">
                <p>{{ $message }}</p>
            </div>
        @elseif ($message = Session::get('danger'))
            <div class="alert alert-danger">
                <p>{{ $message }}</p>
            </div>
        @endif
    
        <div class="row">
            <div class="col-md-11 m-auto"> 
                <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-5 mb-4">
                    {{ __('Users') }}
                    <a class="btn btn-success float-right" href="{{ route('users.create')}}"> Create</a>
                </h2>
                <div class="card shadow mt-2">
                    <div class="card-body pl-4 pr-4">
                        <table class="table table-bordered">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Type</th>
                                <th>Created At</th>
                                <th width="280px">Action</th>
                            </tr>
                            @foreach ($users as $user)
                            
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    {{($user->role_id)}}
                                </td>
                                <td>{{ ($user->is_admin == '1') ? 'Admin User' : 'User' }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>                    
                                    <a class="btn btn-info" href="{{ route('users.show', $user->id)}}">Show</a>
                    
                                    <a class="btn btn-primary" href="{{ route('users.edit', $user->id)}}">Edit</a>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div> 
        </div>
                    
        <div class="d-flex justify-content-center mt-2">
            {!! $users->links() !!}
        </div>
</body>
</html>