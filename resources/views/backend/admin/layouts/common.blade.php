<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- My CSS -->
	<link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/fonts/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/summernote-0.8.18-dist/summernote-bs4.css') }}">

    
	<title>Popapa</title>
</head>

<body>
    
    
    <!-- SIDEBAR -->
	@include('backend.admin.layouts.sidebar')
	<!-- SIDEBAR -->
    
    
    
	<!-- CONTENT -->
	@include('backend.admin.layouts.main')
	<!-- CONTENT -->
    
	<script src="{{ asset('backend/js/jquery-3.4.1.js') }}"></script>
	<script src="{{ asset('frontend/js/bootstrap.bundle.js') }}"></script>
	<script src="{{ asset('backend/summernote-0.8.18-dist/summernote-bs4.js') }}"></script>
	<script>
		$(document).ready(function(){
			$('#summernote').summernote({
				tabsize:2,
				height:280
			});
		});
	</script>
    
</body>

</html>