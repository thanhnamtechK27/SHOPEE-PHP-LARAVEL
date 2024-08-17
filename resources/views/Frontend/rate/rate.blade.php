<!DOCTYPE html>
<html>
  <head>
    <meta content="" name="keywords">
    <meta content="" name="description">
    <meta content="" name="copyright">
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <meta content="ja" http-equiv="Content-Language">
    <meta content="text/css" http-equiv="Content-Style-Type">
    <meta content="text/javascript" http-equiv="Content-Script-Type">
    <meta id="viewport" name="viewport" content="" />
    <script>
        if(screen.width <= 736){
            document.getElementById("viewport").setAttribute("content", "width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no");
        }
    </script>
    <title>Ohana</title>
    <link type="text/css" rel="stylesheet" href="Frontend/rate/css/rate.css">
    <script src="js/jquery-1.9.1.min.js"></script>
    <script>
    	
    	$(document).ready(function(){
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

			// Xử lý sự kiện click và gửi yêu cầu đánh giá bằng Ajax
            $('.ratings_stars').click(function(){
                var ratingValue = $(this).find("input").val();
                
                $.ajax({
                    url: '{{ route("rate") }}',
                    type: 'POST',
                    data: {
                        id_rate: ratingValue,
                        id_blog: id_blog // Thay id_blog bằng ID thực của bài viết
                    },
                    success: function(response) {
                        alert(response.success);
                        // Cập nhật số sao và tính trung bình khi cần
                    },
                    error: function(xhr, status, error) {
                        alert(xhr.responseText);
                    }
                });
            });
		});
    </script>
  </head>
  <body>
       <body>
        <!-- begin header --> 
       

                    
            <div class="rate">
                <div class="vote">
                    <div class="star_1 ratings_stars"><input value="1" type="hidden"></div>
                    <div class="star_2 ratings_stars"><input value="2" type="hidden"></div>
                    <div class="star_3 ratings_stars"><input value="3" type="hidden"></div>
                    <div class="star_4 ratings_stars"><input value="4" type="hidden"></div>
                    <div class="star_5 ratings_stars"><input value="5" type="hidden"></div>
                    <span class="rate-np">4.5</span>
                </div> 
            </div>
                           
                    
 </body>
</html>