<!DOCTYPE html>
<html lang="en">
<head>
  <title>facebook post page </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
   <link href="css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <div class="container card shadow bg-dark mt-5 p-4">
		<div class="row">
		    <div class="col-sm-6 col-md-6 col-lg-6">
			    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
				    <div class="carousel-inner">
						<div class="carousel-item active">
						  <img src="image/photo.jpeg" class="d-block w-100" alt="...">
						</div>
						<div class="carousel-item">
						  <img src="image/profile.jpeg" class="d-block w-100" alt="...">
						</div>
						<div class="carousel-item">
						  <img src="image/photo.jpeg" class="d-block w-100" alt="...">
						</div>
				    </div>
					<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			    <!--<img src="image/photo.jpeg" class="img-fluid">--->
			</div>
		    <div class="offset-1 card col-sm-5 col-md-5 col-lg-5">
			    <div class=" view-section bg-light p-3">
			        <div class="row">
				        <div class="col-sm-3">
					       <img src="image/profile.jpeg" class="rounded-circle img-fluid profile-div">
					    </div>
					    <div class="col-sm-7">
					      <h6 class="font-weight-bold mt-3">Sonali Mishra</h6>
						  <h6 class="font-weight-normal">26 May &nbsp; <i class='fas fa-user-friends'></i></h6>
					    </div>
					    <div class="col-sm-2">
					       <i class="fa fa-caret-down" style="font-size:36px" id="option"></i>
					    </div>
				    </div>
					<div class="row">
					    <div class="offset-3 col-sm-9">
						    <h6 class="font-weight-normal"> Add a Description here</h6>
						</div>
					</div>
					<div class="row">
					    <div class="offset-4 col-sm-8">
						    <div class="card shadow-sm mt" id="menu" style="display:none">
							    <ul  style="list-style:none">
							        <li class="bg">Save Post</li>
									<li class="bg">Turn on notifications</li>
									<li class="bg">pin in tab</li>
									<li class="bg">Find support or report post</li>
							    </ul>
							</div>
						</div>
					</div>
					
					<div class="row mt-5">
					    <div class="col-sm-7">
						    <button type="button" class="btn btn-primary rounded-circle" data-toggle="modal" data-target="#exampleModal" id="like"><i class="fa fa-thumbs-up" style="font-size:14px"></i></button>
							  
							<button type="button" class="btn btn-danger rounded-circle" data-toggle="modal" data-target="#exampleModal" id="love"><i class="fa fa-heart" style="font-size:14px"></i></button> 100
							
							<div class="row card bg-dark mt-1 w-100 p-2 " id="likelist" style="display:none">
							    <ul class="text-white" style="list-style:none">
								    <li>Sonali Mishra</li> 
									<li>Shivam Saini</li>
									<li>Rahul Kumar</li>
									<li>Deepak Nauliya</li>
									<li>Ravish Beg</li>
                                </ul>								
						    </div>
							
							<div class="row card bg-dark mt-1 w-100 p-2 " id="lovelist" style="display:none">
							    <ul class="text-white" style="list-style:none">
								    <li>Sonali Mishra</li> 
									<li>Abhishek</li>
									
                                </ul>								
						    </div>
						</div>
						
						<div class="col-sm-5">
						     <h6 class="font-weight-normal" id="review"> <strong>104 Comments </strong></h6>
							<div class="row card bg-dark mt-1 w-100 p-2 " id="reviewlist" style="display:none">
								<ul class="text-white" style="list-style:none">
									<li>Sonali Mishra</li> 
									<li> prakhar Abhishek</li>
									<li> abhishek</li>
								</ul>								
						    </div>
						</div>
					</div>
					
					<hr>
					<div class="row emoji p-2 shadow-sm  rounded-pill" id="gif" style="display:none">
					    <div class="col-sm-2">
						   <img src="image/em1.gif" class="rounded-circle gif">
						</div>
						<div class="col-sm-2">
						    <img src="image/em2.gif" class="rounded-circle gif">
						</div>
						<div class="col-sm-2">
						    <img src="image/em3.gif" class="rounded-circle gif">
						</div>
						<div class="col-sm-2">
						    <img src="image/em4.gif" class="rounded-circle gif">
						</div>
						<div class="col-sm-2">
						    <img src="image/em5.gif" class="rounded-circle gif">
						</div>
						<div class="col-sm-2">
						    <img src="image/em6.gif" class="rounded-circle gif">
						</div>
	                </div>
					<div class="row">
					    <div class="offset-1 col-sm-3">
						    <div id="emoji"><i class="fa fa-thumbs-up" style="font-size:24px"></i> Like</div>
						</div>
						<div class="offset-3 col-sm-4" data-toggle="tooltip" data-placement="top" title="Leave a Comment">
						     <i class="fa fa-comments" style="font-size:24px"></i>   Comment
						</div>
					</div>
					<hr>
					<div class="row">
					    <div class="col-sm-12">
					       <h6 class="font-weight-normal text-info">View All Comments</h6>
						</div>
					</div>
					
					<div class="container" id="allcomment" style="display:none">	
						<div class="row mt-3">
							<div class="col-sm-2">
								<img src="image/profile.jpeg" class="rounded-circle img-fluid comment-profile">
							</div>
							<div class="col-sm-4">
								<h6 class="font-weight-bold mt-2 fs">Sonali Mishra</h6>
							</div>
							<div class="col-sm-2">
								 <div class="dropdown mr-1">
									<i class="fa fa-caret-down mt-2 " id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="10,20" data-toggle="tooltip" data-placement="top" title="Hide or report this" id="comment" ></i>
									<div class="dropdown-menu content-div" aria-labelledby="dropdownMenuOffset">
										<a class="dropdown-item" href="#"><button class="fs"> <i class="fa fa-close" style="color:gray"></i></button> Hide comment</a>
										<a class="dropdown-item" href="#">Find Support or report Comment</a>
									</div>
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="offset-2 col-sm-5">
								<img src="image/em2.gif" class="rounded-circle comment-size">
							</div>
						</div>
						
						<div class="row emoji p-2 shadow-sm  rounded-pill" id="gif1" style="display:none">
							<div class="col-sm-2">
							   <img src="image/em1.gif" class="rounded-circle gif">
							</div>
							<div class="col-sm-2">
								<img src="image/em2.gif" class="rounded-circle gif">
							</div>
							<div class="col-sm-2">
								<img src="image/em3.gif" class="rounded-circle gif">
							</div>
							<div class="col-sm-2">
								<img src="image/em4.gif" class="rounded-circle gif">
							</div>
							<div class="col-sm-2">
								<img src="image/em5.gif" class="rounded-circle gif">
							</div>
							<div class="col-sm-2">
								<img src="image/em6.gif" class="rounded-circle gif">
							</div>
						</div>
						
						<div class="row">
							<div class="offset-3 col-sm-2">
								<a href="#"><h6 class="font-weight:normal text-info fs" id="faceemoji">Like.<h6></a>
							</div>
							<div class="col-sm-2">
								<a href="#"><h6 class="font-weight:normal text-info fs" id="comment">Reply.<h6></a>
							</div>
							<div class="col-sm-2">
								<a href="#"><h6 class="font-weight:normal text-dark">2d<h6></a>
							</div>
						</div>
						
						<div class="row reply p-2 shadow-sm  rounded-pill" id="msg" style="display:none">
							<div class="col-sm-2">
							   <img src="image/profile.jpeg" class="rounded-circle img-fluid comment-profile">
							</div>
							<div class="col-sm-5">
							   <input type="text" name="name" placeholder="Write a reply ..." class="border-0 rounded-pill bg-light mt-2">
							</div>
							<div class="offset-1 col-sm-1">
							<i class="fa fa-smile-o mt-2" data-toggle="tooltip" data-placement="top" title="Insert an emoji" style="font-size:22px"></i>
								
							</div>
							<div class="col-sm-1">
								<label for="file">
									<i class="fa fa-camera mt-2"  data-toggle="tooltip" data-placement="top" title="Attach a Photo or Video" style="font-size:20px"></i>
									<!---<img id="blah" src="#">--->
									<input type='file' onchange="readURL(this);" id="file" style="display: none" name="image" accept="image/gif,image/jpeg,image/jpg,image/png" multiple="" data-original-title="upload photos">
								</label>
							</div>
						</div>
						
						<div class="row mt-3">
							<div class="col-sm-2">
								<img src="image/profile.jpeg" class="rounded-circle img-fluid comment-profile">
							</div>
							<div class="col-sm-8 comnt rounded-pill">
								<h6 class="font-weight-bold mt-2 fs">Sonali Mishra</h6><span>Looking very very gorgeous</span>
							</div>
							<div class="col-sm-2">
								 <div class="dropdown mr-1">
									<i class="fa fa-caret-down mt-2 " id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="10,20" data-toggle="tooltip" data-placement="top" title="Hide or report this" id="comment" ></i>
									<div class="dropdown-menu content-div" aria-labelledby="dropdownMenuOffset">
										<a class="dropdown-item" href="#"><button class="fs"> <i class="fa fa-close" style="color:gray"></i></button> Hide comment</a>
										<a class="dropdown-item" href="#">Find Support or report Comment</a>
									</div>
								</div>
							</div>
						</div>
						
						<div class="row emoji p-2 shadow-sm  rounded-pill" id="gif2" style="display:none">
							<div class="col-sm-2">
							   <img src="image/em1.gif" class="rounded-circle gif">
							</div>
							<div class="col-sm-2">
								<img src="image/em2.gif" class="rounded-circle gif">
							</div>
							<div class="col-sm-2">
								<img src="image/em3.gif" class="rounded-circle gif">
							</div>
							<div class="col-sm-2">
								<img src="image/em4.gif" class="rounded-circle gif">
							</div>
							<div class="col-sm-2">
								<img src="image/em5.gif" class="rounded-circle gif">
							</div>
							<div class="col-sm-2">
								<img src="image/em6.gif" class="rounded-circle gif">
							</div>
						</div>
						
						
						<div class="row mt-1">
							<div class="offset-3 col-sm-2">
								<a href="#"><h6 class="font-weight:normal text-info fs" id="textemoji">Like.<h6></a>
							</div>
							<div class="col-sm-2">
								<a href="#"><h6 class="font-weight:normal text-info fs" id="comnt">Reply.<h6></a>
							</div>
							<div class="col-sm-2">
								<a href="#"><h6 class="font-weight:normal text-dark">1w<h6></a>
							</div>
						</div>
						
						<div class="row reply p-2 shadow-sm  rounded-pill" id="msg1" style="display:none">
							<div class="col-sm-2">
							   <img src="image/profile.jpeg" class="rounded-circle img-fluid comment-profile">
							</div>
							<div class="col-sm-5">
							   <input type="text" name="name" placeholder="Write a reply ..." class="border-0 rounded-pill bg-light mt-2">
							</div>
							<div class="offset-1 col-sm-1">
							<i class="fa fa-smile-o mt-2" data-toggle="tooltip" data-placement="top" title="Insert an emoji" style="font-size:22px"></i>
								
							</div>
							<div class="col-sm-1">
								<label for="file">
									<i class="fa fa-camera mt-2"  data-toggle="tooltip" data-placement="top" title="Attach a Photo or Video" style="font-size:20px"></i>
									<!---<img id="blah" src="#">--->
									<input type='file' onchange="readURL(this);" id="file" style="display: none" name="image" accept="image/gif,image/jpeg,image/jpg,image/png" multiple="" data-original-title="upload photos">
								</label>
							</div>
						</div>
					</div>
                </div>    
                <div class="row bottom-section p-2 shadow-sm">
					<div class="col-sm-2">
					   <img src="image/profile.jpeg" class="rounded-circle img-fluid comment-profile">
					</div>
					<div class="col-sm-5">
					   <input type="text" name="name" placeholder="Write a reply ..." class="border-0 rounded-pill bg-light mt-2">
					</div>
					<div class="offset-1 col-sm-1">
					<i class="fa fa-smile-o mt-2" data-toggle="tooltip" data-placement="top" title="Insert an emoji" style="font-size:22px"></i>
						
					</div>
					<div class="col-sm-1">
						<label for="file">
							<i class="fa fa-camera mt-2"  data-toggle="tooltip" data-placement="top" title="Attach a Photo or Video" style="font-size:20px"></i>
							<!---<img id="blah" src="#">--->
							<input type='file' onchange="readURL(this);" id="file" style="display: none" name="image" accept="image/gif,image/jpeg,image/jpg,image/png" multiple="" data-original-title="upload photos">
						</label>
					</div>
				</div>			
			</div>
		</div>
	</div>
	
	


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
		<div class="modal-content" id="thumb" style="display:none">
		    <div class="modal-header border-bottom-0">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="tab">
					<div class="container">
						<button class="tablinks border-0" onclick="openCity(event, 'all')">All 104</button>
						<button class="tablinks border-0" onclick="openCity(event, 'likes')"><i class="fa fa-thumbs-up" style="font-size:21px;color:blue"></i></button>
						<button class="tablinks border-0" onclick="openCity(event, 'loves')"><i class="fa fa-heart" style="font-size:21px;color:red"></i></button>
						<button class="tablinks border-0" onclick="openCity(event, 'faces')"><i class='fas fa-surprise' style='font-size:21px;color:orange'></i></button>
					</div>
				</div>
				
				<hr>
				<div id='all' class="tabcontent">
					<div class="row mt-3">
						<div class="col-sm-2">
							<img src="image/profile.jpeg" class="rounded-circle img-fluid comment-profile">
						</div>
						<i class="fa fa-thumbs-up icon1"></i>
						<div class="col-sm-3">
							<h6 class="font-weight-bold mt-2 fs">Sonali Mishra</h6>
						</div>
						<div class="offset-2 col-sm-4">
							<button type="button" class="btn btn-secondary"><i class="fa fa-check"></i> Friends</button>							 
						</div>
					</div>
					<hr>
					<div class="row mt-3">
						<div class="col-sm-2">
							<img src="image/photo.jpeg" class="rounded-circle img-fluid comment-profile">
						</div>
						<i class="fa fa-heart icon2"></i>
						<div class="col-sm-3">
							<h6 class="font-weight-bold mt-2 fs">Neha  Mishra</h6>
						</div>
						<div class="offset-2 col-sm-4">
							<button type="button" class="btn btn-secondary"><i class="fa fa-file"></i> Message</button>							 
						</div>
					</div>
					<hr>
					<div class="row mt-3">
						<div class="col-sm-2">
							<img src="image/photo.jpeg" class="rounded-circle img-fluid comment-profile">
						</div>
						<i class="fas fa-surprise icon3"></i>
						<div class="col-sm-3">
							<h6 class="font-weight-bold mt-2 fs">Sonali Sona</h6>
						</div>
						<div class="offset-2 col-sm-4">
							<button type="button" class="btn btn-secondary"><i class="fa fa-user-plus"></i> Add Friend</button>							 
						</div>
					</div>
					<hr>
				</div>
				<hr>	
				<div id='likes' class="tabcontent">
					<div class="row mt-3">
						<div class="col-sm-2">
							<img src="image/profile.jpeg" class="rounded-circle img-fluid comment-profile">
						</div>
						<i class="fa fa-thumbs-up icon1"></i>
						<div class="col-sm-3">
							<h6 class="font-weight-bold mt-2 fs">Sonali Mishra</h6>
						</div>
						<div class="offset-2 col-sm-4">
							<button type="button" class="btn btn-secondary"><i class="fa fa-check"></i> Friends</button>			 
						</div>
					</div>	
				</div>
				<hr>
				<div id="loves" class="tabcontent">
					<div class="row mt-3">
						<div class="col-sm-2">
							<img src="image/photo.jpeg" class="rounded-circle img-fluid comment-profile">
						</div>
						<i class="fa fa-heart icon2"></i>
						<div class="col-sm-3">
							<h6 class="font-weight-bold mt-2 fs">Neha  Mishra</h6>
						</div>
						<div class="offset-2 col-sm-4">
							<button type="button" class="btn btn-secondary"><i class="fa fa-file"></i> Message</button>				 
						</div>
					</div>				
				</div>
				<hr>
				<div id="faces" class="tabcontent">
					<div class="row mt-3">
						<div class="col-sm-2">
							<img src="image/photo.jpeg" class="rounded-circle img-fluid comment-profile">
						</div>
						<i class="fas fa-surprise icon3"></i>
						<div class="col-sm-3">
							<h6 class="font-weight-bold mt-2 fs">Sonali Sona</h6>
						</div>
						<div class="offset-2 col-sm-4">
							<button type="button" class="btn btn-secondary"><i class="fa fa-user-plus"></i> Add Friend</button>							 
						</div>
					</div>				
				</div>
			</div>
		</div>
		
		<div class="modal-content" id="heart" style="display:none">
		    <div class="modal-header border-bottom-0">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="tab">
					<div class="container">
						<button class="tablinks all border-0" onclick="openCity(event, 'all1')">All 104</button>
						<button class="tablinks likes border-0" onclick="openCity(event, 'like1')"><i class="fa fa-thumbs-up" style="font-size:21px;color:blue"></i></button>
						<button class="tablinks loves border-0" onclick="openCity(event, 'love1')"><i class="fa fa-heart" style="font-size:21px;color:red"></i></button>
						<button class="tablinks faces border-0" onclick="openCity(event, 'face1')"><i class='fas fa-surprise' style='font-size:21px;color:orange'></i></button>
					</div>
				</div>
				
				<hr>
				<div id='all1' class="tabcontent">
					<div class="row mt-3">
						<div class="col-sm-2">
							<img src="image/profile.jpeg" class="rounded-circle img-fluid comment-profile">
						</div>
						<i class="fa fa-thumbs-up icon1"></i>
						<div class="col-sm-3">
							<h6 class="font-weight-bold mt-2 fs">Sonali Mishra</h6>
						</div>
						<div class="offset-2 col-sm-4">
							<button type="button" class="btn btn-secondary"><i class="fa fa-check"></i> Friends</button>							 
						</div>
					</div>
					<hr>
					<div class="row mt-3" >
						<div class="col-sm-2">
							<img src="image/photo.jpeg" class="rounded-circle img-fluid comment-profile">
						</div>
						<i class="fa fa-heart icon2"></i>
						<div class="col-sm-3">
							<h6 class="font-weight-bold mt-2 fs">Neha  Mishra</h6>
						</div>
						<div class="offset-2 col-sm-4">
							<button type="button" class="btn btn-secondary"><i class="fa fa-file"></i> Message</button>							 
						</div>
					</div>
					<hr>
					<div class="row mt-3">
						<div class="col-sm-2">
							<img src="image/photo.jpeg" class="rounded-circle img-fluid comment-profile">
						</div>
						<i class="fas fa-surprise icon3"></i>
						<div class="col-sm-3">
							<h6 class="font-weight-bold mt-2 fs">Sonali Sona</h6>
						</div>
						<div class="offset-2 col-sm-4">
							<button type="button" class="btn btn-secondary"><i class="fa fa-user-plus"></i> Add Friend</button>							 
						</div>
					</div>
					<hr>
				</div>
					
				<div id='like1' class="tabcontent">
					<div class="row mt-3">
						<div class="col-sm-2">
							<img src="image/profile.jpeg" class="rounded-circle img-fluid comment-profile">
						</div>
						<i class="fa fa-thumbs-up icon1"></i>
						<div class="col-sm-3">
							<h6 class="font-weight-bold mt-2 fs">Sonali Mishra</h6>
						</div>
						<div class="offset-2 col-sm-4">
							<button type="button" class="btn btn-secondary"><i class="fa fa-check"></i> Friends</button>			 
						</div>
					</div>	
					
				</div>
				
				<div id="love1" class="tabcontent">
					<div class="row mt-3">
						<div class="col-sm-2">
							<img src="image/photo.jpeg" class="rounded-circle img-fluid comment-profile">
						</div>
						<i class="fa fa-heart icon2"></i>
						<div class="col-sm-3">
							<h6 class="font-weight-bold mt-2 fs">Neha  Mishra</h6>
						</div>
						<div class="offset-2 col-sm-4">
							<button type="button" class="btn btn-secondary"><i class="fa fa-file"></i> Message</button>				 
						</div>
					</div>				
				</div>
				
				<div id="face1" class="tabcontent">
					<div class="row mt-3">
						<div class="col-sm-2">
							<img src="image/photo.jpeg" class="rounded-circle img-fluid comment-profile">
						</div>
						<i class="fas fa-surprise icon3"></i>
						<div class="col-sm-3">
							<h6 class="font-weight-bold mt-2 fs">Sonali Sona</h6>
						</div>
						<div class="offset-2 col-sm-4">
							<button type="button" class="btn btn-secondary"><i class="fa fa-user-plus"></i> Add Friend</button>							 
						</div>
					</div>				
				</div>
			</div>
		</div>
		
    </div>
 </div>
	
 <script>
     	$(document).ready(function(){
		  $("#emoji").hover(function(){
			  $("#gif").toggle();
		 });
	 });
 </script>
 
  <script>
     	$(document).ready(function(){
		  $("#faceemoji").hover(function(){
			  $("#gif1").toggle();
		 });
	 });
 </script>
 
 <script>
     	$(document).ready(function(){
		  $("#textemoji").hover(function(){
			  $("#gif2").toggle();
		 });
	 });
 </script>
	
 <script>
		$(document).ready(function(){
		  $("#option").click(function(){
			  $("#menu").toggle();
		 });
	 });
 </script>
 
 <script>
	$(document).ready(function(){
	  $("#comment").click(function(){
		  $("#msg").toggle();
	 });
 });
 </script>
 
 <script>
	$(document).ready(function(){
	  $("#comnt").click(function(){
		  $("#msg1").toggle();
	 });
 });
 </script>
 
 <script>
	$(document).ready(function(){
	  $("#like").hover(function(){
		  $("#likelist").toggle();
	 });
 });
 </script>
 
 <script>
	$(document).ready(function(){
	  $("#love").hover(function(){
		  $("#lovelist").toggle();
	 });
 });
 </script>
 
 <script>
	$(document).ready(function(){
	  $("#review").hover(function(){
		  $("#reviewlist").toggle();
	 });
 });
 </script>
 
 <script>
		$(document).ready(function(){
		  $("#review").click(function(){
			  $("#allcomment").toggle();
		 });
	 });
 </script>
 
 <script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
 </script>
 
 <script>
$(document).ready(function(){
 
  $("#like").click(function(){
	 $("#thumb").show();
	 $("#heart").hide();
	 $('#exampleModal').modal('show');
	 	
  });
});
</script>

<script>
$(document).ready(function(){
 
  $("#love").click(function(){
	  $("#heart").show();
	 $("#thumb").hide();
	 $('#exampleModal').modal('show');
  });
});
</script>

 <script>
	function openCity(evt, cityName) {
	  var i, tabcontent, tablinks;
	  tabcontent = document.getElementsByClassName("tabcontent");
	            
	  for (i = 0; i < tabcontent.length; i++) {
		tabcontent[i].style.display = "none";
	  }
	  tablinks = document.getElementsByClassName("tablinks");
	  for (i = 0; i < tablinks.length; i++) {
		tablinks[i].className = tablinks[i].className.replace(" active", "");
	  }
	  document.getElementById(cityName).style.display = "block";
	  evt.currentTarget.className += " active";
	}
 </script>


 
 
</body>
</html>