<!DOCTYPE html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to DingDong</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: gray;		
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1,h2 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	


	#body {
		margin: 15px 30px 15px 30px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
		background-color: white;
	}
	</style>
</head>
<body>

<div id="container">
	<h1 >Welcome to DingDong!</h1>


	<div id="body">
		<video controls="controls" class="col-6 offset-3">
			<source src="videos/gangsta.mov" type="video/mp4">
		</video>
		
	</div>
	<div class="col-4 offset-4">
		<h2 class="text-left">Comments</h2>
		<form method="post" accept-charset="utf-8" action="/final/welcome/add_comments">
   		
    	<br />
		<div class="container">
		<form method="POST" id="comment_form">
		<div class="form-group">
		<textarea name="comment_content" id="comment_content" class="form-control" placeholder="Enter Comment" rows="5"></textarea>
		</div>
		<div class="form-group">
		<input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" />
		</div>
		</form>
		<span id="comment_message"></span>
		<br />
		<div id="display_comment"></div>
		</div>
	</div>
	
	
</div>



