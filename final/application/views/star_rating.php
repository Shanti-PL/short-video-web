<html>
<head>
    <title>Star Rating System</title>
    
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
 <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    
</head>
<body>
 <div class="container box">
  <h3 align="center">Star Rating System</h3>
  <br />
  <span id="business_list"></span>
 </div>
</body>
</html>

<script>
$(document).ready(function(){

    load_data();

    function load_data()
    {
    $.ajax({
    url:"<?php echo base_url(); ?>star_rating/fetch",
    method:"POST",
    success:function(data)
    {
        $('#business_list').html(data);
    }
    })
 }

 $(document).on('mouseenter', '.rating', function(){
    var index = $(this).data('index');
    var post_id = $(this).data('post_id');
    remove_background(post_id);
    for(var count = 1; count <= index; count++)
    {
    $('#'+post_id+'-'+count).css('color', '#ffcc00');
    }
    });

    function remove_background(post_id)
    {
    for(var count = 1; count <= 5; count++)
    {
    $('#'+post_id+'-'+count).css('color', '#ccc');
    }
 }

 $(document).on('click', '.rating', function(){
    var index = $(this).data('index');
    var post_id = $(this).data('post_id');
    $.ajax({
    url:"<?php echo base_url(); ?>star_rating/insert",
    method:"POST",
    data:{index:index, post_id:post_id},
    success:function(data)
    {
        load_data();
        alert("You have rate "+index +" out of 5");
    }
    })
 });

 $(document).on('mouseleave', '.rating', function(){
    var index = $(this).data('index');
    var business_id = $(this).data('post_id');
    var rating = $(this).data('rating');
    remove_background(post_id);
    for(var count = 1; count <= rating; count++)
    {
    $('#'+post_id+'-'+count).css('color', '#ffcc00');
    }
 });

});
</script>