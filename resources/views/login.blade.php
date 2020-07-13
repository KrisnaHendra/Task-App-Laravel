<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Task Synchronize</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/login/css/my-login.css')}}">
  <!-- <link rel="icon" type="text/css" href="{{ URL::asset('assets/login/css/my-login.css')}}"> -->
  <link rel="shortcut icon" href="{{ URL::asset('assets/login/img/task.png') }}"/>
</head>

<body class="my-login-page" style="background-color:#4d8bff;">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper mt-5 mb-5">
					<div class="card fat">
						<div class="card-body">
              <div class="text-center">
                <img src="{{ URL::asset('assets/login/img/task.png') }}" alt="logo" class="text-center mb-2" width="90px">
              </div>
							@if (Session::has('message'))
							<div class="alert alert-danger alert-dismissable" role="alert">
								 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
										 <span aria-hidden="true">×</span>
								 </button>
								 <p class="mb-0">{!! session('message') !!}</p>
						 </div>
							@endif
							<form method="POST" class="my-login-validation" novalidate="" action="{{ url('login') }}">
                {{ csrf_field() }}
								<div class="form-group">
									<label for="email">Email Address</label>
									<input id="email" type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" value="" required autofocus>
                  @if ($errors->has('email'))
                  <div class="invalid-feedback">
										{{ $errors->first('email') }}
									</div>
                  @endif
								</div>

								<div class="form-group">
									<label for="password">Password
										<a href="" class="float-right">
											Forgot Password?
										</a>
									</label>
									<input id="password" type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password" required data-eye>
                  @if ($errors->has('password'))
                  <div class="invalid-feedback">
                    {{ $errors->first('password') }}
                  </div>
                  @endif
								</div>

								<div class="form-group m-0">
									<button type="submit" class="btn btn-primary btn-block">
										Login
									</button>
								</div>
								<div class="mt-3 text-center">
									Don't have an account? <a href="{{ url('register') }}">Create Account</a>
								</div>
							</form>
						</div>
					</div>
					<!-- <div class="footer">
						Copyright &copy; 2017 &mdash; Your Company
					</div> -->
				</div>
			</div>
		</div>
	</section>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="{{ URL::asset('assets/login/js/my-login.js')}}"></script>
</body>
</html>
