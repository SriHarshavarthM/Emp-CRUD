<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Employees</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 style="text-align: center ; padding:20px;">Employees</h1>
                <div><a href="{{url('add-emp')}}" class="btn btn-primary m-3" >Add Employee</a></div>
                    @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif
                <table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>First name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Mobile</th>
            <th>Address</th>
        </tr>
    </thead>
    <tbody>
        @php $i = 1; @endphp
        @foreach ($data as $employee)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $employee->firstname }}</td>
                <td>{{ $employee->lastname }}</td>
                <td>{{ $employee->email }}</td>
                <td>Hidden</td>
                <td>{{ $employee->mobile }}</td>
                <td>{{ $employee->address }}</td>
             <td>
    <a href="{{ url('edit-emp/'.$employee->id) }}" class="btn btn-sm btn-warning me-2">Edit</a>
    <a href="{{ url('delete-emp/'.$employee->id) }}" class="btn btn-sm btn-danger">Delete</a>
</td>

            </tr>
        @endforeach
    </tbody>
</table>

            </div>
        </div>
    </div>
</body>
</html>