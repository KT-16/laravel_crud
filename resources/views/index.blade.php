

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
        <link rel="stylesheet" href="{{asset('asset/my.css')}}">

    
    <style>
        table {
            padding: 13px;
            border-spacing: 15px;
            border: 1px solid;
            margin: top 20px;
            border-collapse: collapse;
            width: 1000px;
        }

        th,
        td {
            padding: 13px;
        }
    </style>
</head>
<body>
        <div class="topnav">
                <h1>INTERNSHIP PORTAL</h1>
                <a class="nav-link" href="/logout">Logout</a>
            </div>
            <br><br><br>
            <h1 style="text-align:center;margin-top:10px;">WELCOME</h1>
            <div class="container">

                <a href="/new" class="text-light">
                    <button type="submit" class="btn btn-dark" style="margin-bottom:10px;">New user</button>
                </a>
        <table>  
        <thead>  

        <tr>
                    <td>ID</td> 
                    <td scope="col">Name</td>
                    <td scope="col">Mail</td>
                    <td scope="col">Address</td>
                    <td scope="col">Password</td>
                    <td scope="col">Period</td>
                    <td scope="col">Language</td>
                    <td scope="col">File</td>
                    <td scope="col">Operations</td>
         </tr>
        
        </thead>  
        <tbody> 
        
        @foreach($cruds as $crud) 
       
                <tr>  
                    <td>{{$crud->id}}</td>
                    <td>{{$crud->name}}</td>  
                    <td>{{$crud->email}}</td>  
                    <td>{{$crud->address}}</td>  
                    <td>{{$crud->password}}</td>  
                    <td>{{$crud->period}}</td>  
                    <td>{{$crud->lang}}</td>  
                    <td>{{$crud->file}}</td> 
        <td> 
                        <form method="post" action="/delete/{{$crud->id}}" >  
                        @csrf  
                        {{method_field('DELETE')}}
                        <button  class="btn btn-danger" type="submit">Delete</button>  
                        </form>  
        </td>  
        <td >  
                        <form method="GET" action="/edit/{{$crud->id}}">  
                        @csrf  
                        
                        <button class="btn btn-success" type="submit">Edit</button>  
                        </form>  
        </td>  
        
                </tr>  
        @endforeach  
        </tbody>  
        </table>  
</body>
</html>