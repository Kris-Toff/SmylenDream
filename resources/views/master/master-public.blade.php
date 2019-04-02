<!DOCTYPE html>
<html lang="en">
<head>
		@include('pages.components.headers.head')
		
		<script src="/js/app.js"></script>
</head>
<body>
		@include('pages.components.headers.header')

		@include('pages.components.navigation.navbar')

		@yield('content')

		@include('pages.components.footer.footer')

  <div id="fb-root"></div>
  <script>
	(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
	</script>

<script>
	$(document).ready(function(){

		//Insert Comment
		$("#postComment").click(function(e){
			e.preventDefault();
			
			$("#postComment").text('Posting...');

			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			
			var post_id = $("#post_id").val();
			var name = $("#name").val();
			var body = $("#body").val(); 
			
			$.ajax({
				url: '/blog/post',
				type: 'POST',
				data: {
					post_id: post_id, 
					name: name, 
					body: body,
				},
				success: function(data) {
					var recent = '<div class="col-md-12 bg-lightgrey border rounded py-1 my-1">' +
									'<h5><strong>' + data.comment.name + '</strong></h5>' +
									'<p><strong style="font-size:12px;">' + data.comment.datePosted + '</strong></p>' +
									'<p>' + data.comment.body + '</p>' +
								'</div>';

					$(recent).prependTo("#recent");
					$('#commentForm').trigger("reset");	
				},
				complete: function() {
					$("#postComment").text('Post Comment');
				},
				error: function() {
					alert('Error posting');
				}
			});

		});

		//Load more comment
		var commentCount = 10;
		$("#loadMore").click(function(e){
			e.preventDefault();

			$("#loadMore").text('Loading');

			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

			commentCount += 5;
			var slug = $('input[name="slug"]').val();

			$.ajax({
				url: '/post/' + slug,
				type: 'POST',
				data: {commentCount: commentCount},
				success: function(data){
					if(data.comments.to >= data.total) {
						$("#loadMore").hide();
					}

					var recent = [];

					for (let index = 10; index < data.comments.data.length; index++) {
						
						recent += '<div class="col-md-12 bg-lightgrey border rounded py-1 my-1">' +
									'<h5><strong>' + data.comments.data[index].name + '</strong></h5>' +
									'<p><strong style="font-size:12px;">' + data.comments.data[index].created_at + '</strong></p>' +
									'<p>' + data.comments.data[index].body + '</p>' +
									'</div>';

					}
					
					$(recent).appendTo("#load");

				},
				complete: function() {
					$("#loadMore").text('Load more comments');
				},
				error: function() {
					alert('Error loading comments');
				}
			});

		});
	});
</script>

</body>
</html> 