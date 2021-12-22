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
            {{ __('View Users') }}
            <a class="btn btn-info float-right ml-2" href="{{ route('users.index') }}"> Back</a>
            <a class="btn btn-primary float-right" href="{{ route('users.edit', $user->id) }}"> Edit </a>
        </h2>

        <table class="table table-bordered container table-hover">
            
            <tr>
                <td class="col-6"> User Name </td><td class="col-6">{{ $user->name }}</td>
            </tr>
            <tr>
                <td class="col-6"> User Email </td><td class="col-6" style="word-break:break-all;">{{ $user->email }}</td>
            </tr>
            <tr>
                <td class="col-6"> User Image </td>
                <td class="col-6">
                    <a href="{{ asset('/user_images/'. $user->id . '/' . $user->user_image) }}" target="_blank">
                        <img width="200" height="200" src="{{ asset('/user_images/'. $user->id . '/' . $user->user_image) }}" alt="Image not found.">
                    </a>
                </td>
            </tr>
            <tr>
                <td class="col-6"> User Type </td><td class="col-6">{{ $user->is_admin }}</td>
            </tr>
            <tr>
                <td class="col-6"> User Role </td><td class="col-6">{{ $user->role_id }}</td>
            </tr>
            <tr>
                <td class="col-6"> Created At </td><td class="col-6">{{ $user->created_at }}</td>
            </tr>
            <tr>
                <td class="col-6"> Updated At </td><td class="col-6">{{ $user->updated_at }}</td>
            </tr>

        </table>
    </div>

</body>
</html>