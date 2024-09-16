@extends("Frontend.layouts.app")
@section("content")
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-sm-offset-3">
				<div class="login-form" style="margin-left: -210px;margin-top: -10px; background-color: #f9f9f9; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
					<h2 style="text-align: center; margin-bottom: 20px; color: green;font-weight: bold;">REGISTER</h2>
					<form action="{{ route('register_fe') }}" method="POST" enctype="multipart/form-data">
						@if(session('success'))
							<div class="alert alert-success alert-dismissible" style="margin-bottom: 20px; background-color: #d4edda; border-color: #c3e6cb; color: #155724; padding: 10px; border-radius: 4px;">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true" style="font-size: 1.2em; color: #155724;">&times;</button>
								<h4 style="margin-top: 0; font-size: 16px;"><i class="icon fa fa-check" style="color: #155724;"></i> Thông báo!</h4>
								{{session('success')}}
							</div>
						@endif
						@if($errors->any())
							<div class="alert alert-danger alert-dismissible" style="margin-bottom: 20px; background-color: #f8d7da; border-color: #f5c6cb; color: #721c24; padding: 10px; border-radius: 4px;">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true" style="font-size: 1.2em; color: #721c24;">&times;</button>
								<h4 style="margin-top: 0; font-size: 16px;"><i class="icon fa fa-exclamation-triangle" style="color: #721c24;"></i> Thông báo!</h4>
								<ul style="list-style: none; padding-left: 0; margin-top: 10px;">
									@foreach($errors->all() as $error)
										<li style="padding: 5px 0;">{{$error}}</li>
									@endforeach
								</ul>
							</div>
						@endif
						@csrf  
						<div class="row" style="margin-bottom: 15px;">
							<div class="col-md-6">
								<div class="form-group">
									<label for="name" style="color: #333; font-weight: bold; margin-bottom: 5px; font-size: 14px;">Full Name</label>
									<input type="text" name="name" id="name" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px;" />
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="example-email" style="color: #333; font-weight: bold; margin-bottom: 5px; font-size: 14px;">Email</label>
									<input type="email" name="email" id="example-email" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px;" />
								</div>
							</div>
						</div>
						<div class="row" style="margin-bottom: 15px;">
							<div class="col-md-6">
								<div class="form-group">
									<label for="password" style="color: #333; font-weight: bold; margin-bottom: 5px; font-size: 14px;">Password</label>
									<input type="password" name="password" id="password" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px;" />
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="phone" style="color: #333; font-weight: bold; margin-bottom: 5px; font-size: 14px;">Phone No</label>
									<input type="text" name="phone" id="phone" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px;" />
								</div>
							</div>
						</div>
						<div class="row" style="margin-bottom: 15px;">
							<div class="col-md-6">
								<div class="form-group">
									<label for="message" style="color: #333; font-weight: bold; margin-bottom: 5px; font-size: 14px;">Message</label>
									<textarea rows="5" id="message" name="message" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px;"></textarea>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="id_country" style="color: #333; font-weight: bold; margin-bottom: 5px; font-size: 14px;">Country ID</label>
									<input type="text" id="id_country" name="id_country" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px;" />
								</div>
							</div>
						</div>
						<div class="row" style="margin-bottom: 15px;">
							<div class="col-md-6">
								<div class="form-group">
									<label for="address" style="color: #333; font-weight: bold; margin-bottom: 5px; font-size: 14px;">Select Country</label>
									<select id="address" name="address" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px;">
										<option value="London">London</option>
										<option value="India">India</option>
										<option value="Usa">Usa</option>
										<option value="Canada">Canada</option>
										<option value="Thailand">Thailand</option>
										<option value="">-- Select --</option>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="avatar" style="color: #333; font-weight: bold; margin-bottom: 5px; font-size: 14px;">Avatar</label>
									<input type="file" id="avatar" name="avatar" ; border: 1px solid #ccc; border-radius: 4px; font-size: 14px;" />
								</div>
							</div>
						</div>
						<div class="row" style="margin-bottom: 15px;">
							<div class="col-md-6">
								<div class="form-group">
									<label for="level" style="color: #333; font-weight: bold; margin-bottom: 5px; font-size: 14px;">Level</label>
									<input type="text" name="level" id="level" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px;" />
								</div>
							</div>
						</div>
						<button type="submit" style="width: 100%; padding: 10px; border-radius: 4px; background-color: green; color: #fff; border: none; font-size: 16px; margin-top: 10px;">Register</button>
					</form>
				</div><!--/login form-->
			</div>
		</div>
	</div>
@endsection
