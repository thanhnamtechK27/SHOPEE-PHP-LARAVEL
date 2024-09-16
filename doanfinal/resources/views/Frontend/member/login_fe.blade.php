@extends("Frontend.layouts.app")
@section("content")
			<div class="container">
				<div class="row">
					<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form" style="width: 300px; margin-left:320px; padding: 20px; border: 1px solid #ddd; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); background-color: #fff;">
					<h2 style="text-align: center; margin-bottom: 20px; color: GREEN;font-weight: bold;">LOGIN YOUR ACOUNT</h2>
					<form action="{{ route('check_login')}}" method="POST" style="display: flex; flex-direction: column;">
						@if(session('success'))
							<div class="alert alert-success alert-dismissible" style="background-color: #dff0d8; color: #3c763d; padding: 10px; border: 1px solid #d0e9c6; border-radius: 4px; margin-bottom: 15px;">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true" style="background: none; border: none; font-size: 20px; color: #3c763d;">×</button>
								<h4 style="margin: 0; font-size: 16px;"><i class="icon fa fa-check" style="margin-right: 5px;"></i> Thông báo!</h4>
								{{session('success')}}
							</div>
						@endif
						@if($errors->any())
							<div class="alert alert-danger alert-dismissible" style="background-color: #f2dede; color: #a94442; padding: 10px; border: 1px solid #ebccd1; border-radius: 4px; margin-bottom: 15px;">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true" style="background: none; border: none; font-size: 20px; color: #a94442;">×</button>
								<h4 style="margin: 0; font-size: 16px;"><i class="icon fa fa-ban" style="margin-right: 5px;"></i> Thông báo!</h4>
								<ul style="margin: 0; padding-left: 20px;">
									@foreach($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
						@endif

						@csrf
						<input type="hidden" name="logged_in" value="1">
						<input type="email" placeholder="Email Address" name="email" style="padding: 10px; margin-bottom: 15px; border: 1px solid #ddd; border-radius: 4px; font-size: 14px;">
						<input type="password" placeholder="Password" name="password" style="padding: 10px; margin-bottom: 15px; border: 1px solid #ddd; border-radius: 4px; font-size: 14px;">
						<span style="display: flex; align-items: center; margin-bottom: 15px;">
							<input type="checkbox" class="checkbox" style="margin-right: 10px;">
							Keep me signed in
						</span>
						<button type="submit" class="btn btn-default" style="padding: 10px; border: none; border-radius: 4px; background-color: GREEN; color: #fff; font-size: 16px; cursor: pointer;">
							Login
						</button>
					</form>
				</div>
				</div>
			</div>
		</div>
@endsection
