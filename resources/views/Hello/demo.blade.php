<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<head>
	<title>Form</title>
</head>
<body>
	
	<div class="card col-md-6 offset-3" style="margin-top: 40px;">
		<div class="card-header text-center">
			LogIn
		</div>
		<div class="card-body">
        @if(Session::has('success'))
        <div class="alert alert-success">
        {{Session::get('success')}}
        </div>
        
        @endif

        @if(Session::has('fail'))
        <div class="alert alert-danger">
        {{Session::get('fail')}}
        </div>
        @endif

		@if($message=Session::get('error'))
        <div class="alert alert-danger alert-block">
			<button type="button" class="close" data-dismiss="alert">X</button>
			<strong>{{$message}}</strong>
        </div>
        @endif

        <form method="post" action="{{route('user.add')}}">
            @csrf
				<div class="form-group">
					<label>Email:</label>
					<input type="text" class="form-control" placeholder="please enter your email" name="username"  required>
                    <span style="color:red">@error('username'){{$message}} @enderror </span>
				</div>
				<div class="form-group">
					<label>Password:</label>
					<input type="password" class="form-control" placeholder="Enter your password" name="password"  required>
                    <span style="color:red">@error('password'){{$message}} @enderror </span>

				</div>
				<div class="col-md-6 offset-5">
					<button type="submit" class="btn btn-lg btn-primary" name="submit">Login</button>
				</div>
			</form>
		</div>
	</div>
</body>
</html>