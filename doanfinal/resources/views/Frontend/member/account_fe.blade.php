@extends("Frontend.layouts.app")
@section("content")

<section>
		<div class="container">
			<div class="row">
				@if(!request()->is('account_fe') && !request()->is('account_fe/*'))
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Account</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							
							
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="{{ route('account_fe') }}">account</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="{{ route('my_product') }}">My product</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Add Product</a></h4>
								</div>
							</div>
							
						</div><!--/category-products-->						
					</div>
				</div>
				@endif
				<div class="col-sm-9">
					<div class="blog-post-area">
						<h2 class="title text-center">Update user</h2>
						 <div class="signup-form"><!--sign up form-->
							<form method="post" action="{{ route('update_account')}}" enctype="multipart/form-data">
								@if(session('success'))
									<div class="alert alert-success alert-dismissible">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<h4><i class="icon fa fa-check"></i> Thông báo!</h4>
										{{ session('success') }}
									</div>
								@endif
								@if($errors->any())
									<div class="alert alert-danger alert-dismissible">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<h4><i class="icon fa fa-check"></i> Thông báo!</h4>
										<ul>
											@foreach($errors->all() as $error)
												<li>{{ $error }}</li>
											@endforeach
										</ul>
									</div>
								@endif
								@csrf  
								<input type="text" name="name" value="{{ $user->name }}" />
								<input type="email" name="email" placeholder="Email Address" value="{{ $user->email }}"/>
								<input type="password" name="password" placeholder="Password" value="{{ $user->password }}"/>
								<input type="text" name="phone" placeholder="Phone" value="{{ $user->phone }}"/>
								<input type="text" name="message" placeholder="Message" value="{{ $user->message }}"/>
								<input type="text" name="address" placeholder="Address" value="{{ $user->address }}"/>
								<input type="text" placeholder="ID Country" name="id_country" value="{{ $user->id_country }}">
								<input type="text" placeholder="Level" name="level" value="{{ $user->level }}">
								<input type="file" name="avatar"/>
								<input type="submit" value="UPDATE" style="background-color:#00CC99; color: white; font-weight: bold;" class="btn btn-default">
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection