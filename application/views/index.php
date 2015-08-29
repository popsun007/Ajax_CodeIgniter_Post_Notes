<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta charset="utf-8">
        <title>Ajax Exercise</title>
        <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <style>
    	.col-md-4
    	{
    		margin-top: 20px;
    		border: 2px solid grey;
    		width: 250px;
    		height: 250px;
    		margin-right: 20px;
    		overflow: scroll;
    	}
    	h3
    	{
    		margin-top: 150px;
    	}
    </style>
    <script>
    	$(document).ready(function(){

    		// method 1// ************in json **************
    	// 	$.get('/notes/in_json', function(res){
    	// 		for(var i=0; i<res.notes.length; i++)
    	// 		{
					// $('.row').append("<div class='notes col-md-4'>" + res.notes[i]['message'] + "</div>");
    	// 		}
    	// 	}, "json");   

    	    // method 2// *****************in html ****************
    		// $.get('/notes/in_html', function(res){
    		// 	$('.row').html(res);
    		// });

    		// method 3 ************you can embed the partials/notes.php in this page right in the div.row

    		$('form').submit(function(){
    			$.post("/notes/add_note", $(this).serialize(), function(data){
    				console.log(data);
    				$('.row').append("<div class='col-md-4'>" + data.new_one + "</div>");
    				$('form').trigger("reset");
    			}, "json");

    			return false;
    		})
    	})
    </script>
    </head>

    <body>
    	<div class="container">
    		<h2>My Posts:</h2>
    		<div class="row">
<?php 
    			foreach ($notes as $note)
    			{
?>
	        	<div class="col-md-4">
	        		<span><?= $note['message']; ?></span>
	        	</div>
<?php 
		        }
?>
	        </div>
        	<h3>Add a note:</h3>
        	<form action="/notes/add_note" method="post">
	        	<textarea name="note"></textarea><br>
	        	<input type="submit" value="Post It!">
	        </form>
		</div>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </body>
</html>