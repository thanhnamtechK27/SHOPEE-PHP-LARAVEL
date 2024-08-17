@extends("Frontend.layouts.app")
@section("content")
					<div class="blog-post-area">
						<h2 class="title text-center">Latest From our Blog</h2>
                        @foreach($blog as $blogs)
						<div class="single-blog-post">
							<h3>{{ $blogs -> title }}</h3>
							<div class="post-meta">
								<ul>
									<li><i class="fa fa-user"></i> Mac Doe</li>
									<li><i class="fa fa-clock-o"></i> 1:33 pm</li>
									<li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
								</ul>
								<span>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-half-o"></i>
								</span>
							</div>
							<a href="">
                                <img src="{{ url('upload/blog/avatar/' . $blogs->avatar) }}" alt="">
							</a>
							<p>{{ $blogs -> description}}</p>
							<a  class="btn btn-primary" href="{{ route ('blog_detail', ['id' => $blogs->id]) }}">Read More</a>
						</div>
                        @endforeach
					</div>
@endsection