

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
        table,th,td {
            background-color:rgb(200, 188, 220);
            padding: 13px;
            border: 1px solid;
            margin: top 20px;
            width: 1000px;
            font-style:bold;
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
                    <td scope="col"><b>ID</b></td> 
                    <td scope="col"><b>Name</b></td>
                    <td scope="col"><b>Mail</b></td>
                    <td scope="col"><b>Address</b></td>
                    <td scope="col"><b>Password</b></td>
                    <td scope="col"><b>Period</b></td>
                    <td scope="col"><b>Language</b></td>
                    <td scope="col"><b>File</b></td>
                    <td colspan="2"><b>Operations</b></td>
                    
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