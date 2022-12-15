<!doctype html>
<html lang="en">

<head>

  <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
        <link rel="stylesheet" href="{{asset('asset/my.css')}}">
        <script src="{{asset('asset/my.js')}}"></script>

  <title>Login</title>
  <style>
    label {
      font-size: larger;
      color: black;
    }

    form {
      display: flex;
      width: 100%;
      justify-content: center;
      align-items: center;
      flex-direction: column;
    }

    button {
      padding: 15px;
      margin: 10px 0px;
      width: 80px;
      margin-left: 100px;
    }
  </style>
</head>

<body>
  <div class="topnav">
    <h1>INTERNSHIP PORTAL</h1>
    <a class="nav-link" href="/create">Register</a>
  </div>
  <br><br><br>
 

  <h1 class="text-center">LOG IN</h1>
  <form name="addform" method="post" onsubmit="return validateForm()" enctype="multipart/form-data" action="loginverify">@csrf
    <div class="form-group col-md-6">
    
    <div class="form-group">
                    <label for="name">Email</label>
                    <input type="email" class="form-control" id="email" name="email"  placeholder="Enter your email" autocomplete="off" >
                    <b><label id="mailerror" style="visibility:hidden; color:red; ">Email Is Requierd</label></b>
                    <b><label id="msg" style="color:red;"></label></b>
                    <b> <span style="color:red;">@error('email'){{$message}}@enderror</span></b>
                </div>

      <div>
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password"  placeholder="Enter Password" autocomplete="off">
        <b><label id="passworderror" style="visibility:hidden; color:red; ">This Field Is Requierd</label></b>
        <b> <span style="color:red;">@error('password') {{$message}}@enderror</span></b>
      </div>
    </div>

    <button type="submit" class="btn btn-primary">
      login
    </button>
  </form>
 
</body>
</html>