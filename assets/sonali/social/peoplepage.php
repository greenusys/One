<?php include 'header.php';?>
<div class="container mt-4">
    <div class="row profile-info-div shadow-sm p-2 w-75 m-auto">
	    <div class="col-sm-4">
		    <div>
			    <img src="image/coverphoto.jpg"  class="rounded-sm img-fluid">
			</div>
			 <img src="image/profile.jpeg" class="rounded-circle img-fluid people-profile">
		</div>
		<div class="col-sm-4">
		    <a href="#"><h6 class="font-weight-bold text-info mt-4">Sonali Mishra</h6></a>
		</div>
		<div class="col-sm-4">
		    <button type="button" class="btn btn-secondary mt-4" id="add"><i class="fa fa-user-plus"></i> Add Friend </button> 
			 <button type="button" class="btn btn-secondary mt-4" id="sent" style="display:none"><i class="fa fa-user-plus"></i> Friend Request Sent</button>
			<button type="button" class="btn btn-secondary mt-4" id="option"><i class="fa fa-caret-down" style="font-size:22px"></i></span></button>  
		</div>
	</div>
	<div class="row">
		<div class="offset-7 col-sm-3">		
			<div class="card shadow-sm mt-send" id="friend" style="display:none">
				<ul  style="list-style:none">
					<li class="bg">Get Notifications</li>
					<li class="bg">Close Friends</li>
					<li class="bg">Acquaintances</li>
					<li class="bg">Add to another List</li>
					<li class="bg" id="addfriend">Cancel Request</li>
				</ul>
			</div>
		</div>
    </div>
	<div class="row">
		<div class="offset-8 col-sm-2">		
			<div class="card shadow-sm mt-send" id="menu" style="display:none">
				<ul  style="list-style:none">
					<li>Send Message</li>
				</ul>
			</div>
		</div>
    </div>
</div>

<div class="container mt-4">
    <div class="row profile-info-div shadow-sm p-2 w-75 m-auto">
	    <div class="col-sm-4">
		    <div>
			    <img src="image/images.jpg"  class="rounded-sm img-fluid">
			</div>
			 <img src="image/photo.jpeg" class="rounded-circle img-fluid people-profile">
		</div>
		<div class="col-sm-4">
		    <a href="#"><h6 class="font-weight-bold text-info mt-3">Sonali Sona</h6></a>
			<h6 class="font-weight-normal text-dark ">Actor/Director at Bollywood</h6>
			<h6 class="font-weight-normal text-muted ">242 followers</h6>
		</div>
		<div class="col-sm-4">
		    <button type="button" class="btn btn-secondary mt-4" id="follow"><i class="fa fa-wifi"></i> Follow </button> 
			 <button type="button" class="btn btn-secondary mt-4" id="following" style="display:none"><i class="fa fa-check"></i> Following</button>
			<button type="button" class="btn btn-secondary mt-4" id="msg"><i class="fa fa-caret-down" style="font-size:22px"></i></span></button>  
		</div>
	</div>
	
	<div class="row">
		<div class="offset-8 col-sm-2">		
			<div class="card shadow-sm mt-send" id="send" style="display:none">
				<ul  style="list-style:none">
					<li>Send Message</li>
				</ul>
			</div>
		</div>
    </div>
</div>

<script>
	$(document).ready(function(){
	  $("#option").click(function(){
		  $("#menu").toggle();
	 });
 });
 </script>
 
 <script>
	$(document).ready(function(){
	  $("#msg").click(function(){
		  $("#send").toggle();
	 });
 });
 </script>
 
 <script>
$(document).ready(function(){
   $("#add").click(function(){
	 $("#sent").show();
	 $("#friend").show();
	 $("#add").hide();
  });
});
</script>

 <script>
$(document).ready(function(){
   $("#addfriend").click(function(){
	 $("#add").show();
	  $("#friend").hide();
	   $("#sent").hide();
  });
});
</script>

<script>
$(document).ready(function(){
   $("#follow").click(function(){
	 $("#following").show();
	  $("#follow").hide();
	  	
  });
});
</script>

<script>
$(document).ready(function(){
   $("#following").click(function(){
	 $("#follow").show();
	  $("#following").hide();
	  	
  });
});
</script>

