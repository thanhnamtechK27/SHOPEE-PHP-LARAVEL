@extends("Frontend.layouts.app");
@section("content")

    <div class="blog-post-area">
        <h2 class="title text-center">Latest From our Blog</h2>
        <div class="single-blog-post">
            <h3>{{ $blog -> title }}</h3>
            <div class="post-meta">
                <ul>
                    <li><i class="fa fa-user"></i> Mac Doe</li>
                    <li><i class="fa fa-clock-o"></i> 1:33 pm</li>
                    <li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
                </ul>
            </div>
            <a href="">
                <img src="{{ url('upload/blog/avatar/' . $blog->avatar) }}" alt="">
            </a>
            <p>{{ $blog -> description }}</p>
            <div class="pager-area">
                <ul class="pager pull-right">
                    @if($prevBlog)
                    <li><a href="{{ url('/blog_detail/'. $prevBlog->id) }}">Prev</a></li>
                    @endif
                    @if($nextBlog)
                        <li><a href="{{ url('/blog_detail/'. $nextBlog->id) }}">Next</a></li>
                    @endif 
                </ul>
            </div>
        </div> 
        <div class="rating-area">
        <ul class="ratings">
			<li class="rate-this">Rate this item:</li>
			<li>
				<div class="rate">
					<div class="vote">
						<div class="star_1 ratings_stars"><input value="1" type="hidden"></div>
						<div class="star_2 ratings_stars"><input value="2" type="hidden"></div>
						<div class="star_3 ratings_stars"><input value="3" type="hidden"></div>
						<div class="star_4 ratings_stars"><input value="4" type="hidden"></div>
						<div class="star_5 ratings_stars"><input value="5" type="hidden"></div>
						<span class="rate-np">{{ $OVR_Rate }}</span>

					</div> 
				</div>
			</li>
			<li class="color">(6 votes)</li>
		</ul>

		<ul class="tag">
			<li>TAG:</li>
			<li><a class="color" href="">Pink <span>/</span></a></li>
			<li><a class="color" href="">T-Shirt <span>/</span></a></li>
			<li><a class="color" href="">Girls</a></li>
		</ul>
		</div><!--/rating-area-->
		<div class="socials-share">
			<a href=""><img src="{{ url('Frontend/images/blog/socials.png') }}" alt=""></a>
		</div><!--/socials-share-->
		<div class="response-area">
			<!-- Bổ sung form comment -->
			<form action = "" id="commentForm" class ="comment" style="margin-bottom: 20px;" method="post">
				<textarea placeholder="Viết bình luận" id="commentContent" style="width: 100%; height: 100px; padding: 10px; border: 1px solid #ccc; border-radius: 5px; resize: none; margin-bottom: 10px;"></textarea>
				<input type="hidden" id="blogId" value="{{ $blog->id }}">
				<input type="hidden" id="level" value="0">
				<input type="hidden" name="commentId" id="commentId" value="">
				<input type="submit" style="padding: 10px 20px; background-color: #007bff; color: #fff; border: none; border-radius: 5px; cursor: pointer;" value="Gửi bình luận"></input>
			</form>
			<h2> {{ count($comments) }} COMMENTS</h2>
				<ul class="media-list">
					@if(isset($comments))
						@foreach($comments as $comment)
							<!-- Hiển thị comment cha -->
							@if($comment->level == 0)
								<li class="media">
									<a class="pull-left" href="#">
										<img width="100px" class="media-object" src="{{ url('upload/user/avatar/' .$comment->avatar) }}" alt="">
									</a>
									<div class="media-body">
										<ul class="sinlge-post-meta">
											<li><i class="fa fa-user"></i>{{ $comment->name }}</li>
											<li><i class="fa fa-clock-o"></i> {{ $comment->thoi_gian }}</li>
										</ul>
										<p>{{ $comment->cmt }}</p>
										<!-- Thêm thuộc tính data-comment-id -->
										<a class="btn btn-primary reply-btn" href="#" data-comment-id="{{ $comment->id }}"><i class="fa fa-reply"></i>Reply</a>
										<!-- Hiển thị reply của comment cha -->
									
									</div>
								</li>
									@foreach($comments as $reply)
										@if($reply->level == $comment->id)
											<li class="media second-media">
												<a class="pull-left" href="#">
													<img width="100px" class="media-object" src="{{ url('upload/user/avatar/' .$reply->avatar) }}" alt="">
												</a>
												<div class="media-body">
													<ul class="sinlge-post-meta">
														<!-- <p>{{$reply->id_blog}}</p> -->
														<li><i class="fa fa-user"></i>{{ $reply->name }}</li>
														<li><i class="fa fa-clock-o"></i> {{ $reply->thoi_gian }}</li>
													</ul>
													<p>{{ $reply->cmt }}</p>
													<a class="btn btn-primary reply-btn" href="#" data-comment-id="{{ $reply->id }}"><i class="fa fa-reply"></i>Reply</a>
												</div>
											</li>
										@endif
									@endforeach
							@endif
						@endforeach
					@endif
				</ul>

									
					</div><!--/Response-area-->
    </div><!--/blog-post-area-->
@endsection
@section("js")
	<script>
			$(document).ready(function(){
				$.ajaxSetup({
						headers: {

							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						}
					});
				//vote
				$('.ratings_stars').hover(
					// Handles the mouseover
					function() {
						$(this).prevAll().andSelf().addClass('ratings_hover');
						// $(this).nextAll().removeClass('ratings_vote'); 
					},
					function() {
						$(this).prevAll().andSelf().removeClass('ratings_hover');
						// set_votes($(this).parent());
					}
				);

				$('.ratings_stars').click(function(){
					// // goi php vao 
					var checkLogin = "{{Auth::Check()}}";
					// alert()
					if(checkLogin){
						var rate = $(this).find("input").val();
						// alert(rate);
						if ($(this).hasClass('ratings_over')) {
								$('.ratings_stars').removeClass('ratings_over');
								$(this).prevAll().andSelf().addClass('ratings_over');
						} else {
							$(this).prevAll().andSelf().addClass('ratings_over');
						}
						// dung ajax gui qua controller va insert table rate
							$.ajax({
								type: 'POST',
								url: '{{ route("blog_rate_ajax") }}',
								data: {
									rate: rate,
									id_blog: "{{ $blog->id }}",
									id_user: "{{ Auth::id() }}",
								},
								success: function(data) {
									console.log(data.success);
								}
							});
						} 
						else {
							alert ("Vui long login de rate");
						}
					});
				
					// Comment:
					$('#commentForm').submit(function(e){
						e.preventDefault();
						var commentContent = $("#commentContent").val();
						var blogId = $("#blogId").val();
						var level = $("#level").val();
						// console.log(level);
						// Kiểm tra đăng nhập
						var isLoggedIn = "{{ Auth::check() }}";
						if (!isLoggedIn) {
							alert("Vui lòng đăng nhập để bình luận.");
							return;
						}
					
						// Gửi bình luận qua Ajax
						$.ajax({
							type: 'POST',
							url: '{{ route("comment") }}',
							data: {
								comment: commentContent,
								id_blog: "{{ $blog->id }}",
								level: level, 
							},
							success: function(data) {
								alert(data.message);
							},
							error: function(xhr, status, error) {
								var err = eval("(" + xhr.responseText + ")");
								alert("Error: " + err.message);
							}
						});
					});
				
				// Xử lý khi bấm vào nút "Replay"
				$('.btn-primary').click(function(e) {
					e.preventDefault();
					// Đặt giá trị của input blogId cho id của blog hiện tại
					$('#blogId').val('{{ $blog->id }}');
					// Lấy id của comment được chọn
					var commentId = $(this).closest('.media').find('.btn-primary').data('comment-id');
					console.log(commentId);
					// Đặt giá trị level cho comment mới bằng commentId
					var newCMT = $('#level').val(commentId);
					// Đặt giá trị của input level cho id của comment cha:
					$('#commentId').val(commentId);
					// Cuộn đến form comment
					$('#commentForm').get(0).scrollIntoView({ behavior: 'smooth' });
				});
		});
	</script>
@endsection