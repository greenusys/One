<style>
.fav-image-size{
	max-height:300px;
}

</style>

<div class="container card mt-5 w-50 shadow-lg p-3">
    <div class="row">
	    <div class="col-md-10">
			<h5 class="font-weight-bold text-dark">Favourite Posts</h5>
		</div>
		<div class="col-md-2">
		    <a href="#"><h6 class="text-primary font-weight-normal ">See All</h6></a>
		</div>
	</div>
	<hr>
	<div class="row mt-1">
		<div class="col-sm-2">
		   <img src="<?=base_url('assets/sonali/latest/social/')?>image/img6.jpg" class="rounded-circle img-fluid image-post">
		</div>
		<div class="col-sm-8">
			<a href="#"><h6 class="mt-2"><span class="font-weight-bold text-info mt-4">Sonali Sona </span></a> </h6>
			<h6 class="font-weight-normal">Friend</h6>
		</div>
	</div>
    <div class="row">
	    <div class="offset-2 col-md-7">
		   <h6 class="mt-2"><span>26 May 2019</span> &nbsp; <i class='fas fa-user-friends'></i>  &nbsp; <span>Sonali Mishra added a new photo</span></h6>
		</div>
		<div class="col-md-3">
		    <img src="<?=base_url('assets/sonali/latest/social/')?>image/img3.jpg"  class="rounded img-fluid img-post">
		</div>
	</div>
	<hr>
	<div class="row mt-2" >
		<div class="col-sm-9">
			<button type="button" id="likes" class="btn btn-primary rounded-circle"><i class="fa fa-thumbs-up" style="font-size:14px"></i></button> 80
			<button type="button"  id="lov" class="btn btn-danger rounded-circle" data-toggle="modal" data-target="#exampleModal" ><i class="fa fa-heart" style="font-size:14px"></i></button> 100
		</div>
		
		<div class="col-sm-3" id="comment" >
			<h6 class="font-weight-normal" > <strong>86 Comments </strong></h6>
		</div>
	</div>
	<div class="row card list bg-dark p-2 position-fixed" id="likeslist" style="display:none">
		<ul class="text-white" style="list-style:none">
			<li>Sonali Mishra</li> 
			<li>Shivam Saini</li>
			<li>Rahul Kumar</li>
			<li>Deepak Nauliya</li>
			<li>Ravish Beg</li>
		</ul>								
	</div>
	<div class="row card bg-dark list1  p-2 position-fixed" id="lovlist" style="display:none">
		<ul class="text-white" style="list-style:none">
			<li>Sonali Mishra</li> 
			<li>Abhishek</li>
		</ul>								
	</div>
	<div class="row card bg-dark list2 p-2 position-fixed " id="commentlist" style="display:none">
		<ul class="text-white" style="list-style:none">
			<li>Sonali Mishra</li> 
			<li>Abhishek</li>
		</ul>								
	</div>
</div>

<div class="container card mt-3 w-50 shadow-lg p-4">
    <div class="row">
	   <div class="col-md-10">
			<h5 class="font-weight-bold text-dark">Favourite Photos</h5>
		</div>
		<div class="col-md-2">
			<a href="#"><h6 class="text-primary font-weight-normal ">See All</h6></a>
		</div>
	</div>
	
    <div class="row mt-2">
	    <div class="col-md-4">
		    <div class="card rounded-lg">
			    <img src="<?=base_url('assets/sonali/latest/social/')?>image/img5.jpg" class="rounded-lg fav-image-size" >
			</div>
		</div>
		<div class="col-md-4">
		    <div class="card rounded-lg">
			    <img src="<?=base_url('assets/sonali/latest/social/')?>image/img2.jpg" class="rounded-lg fav-image-size">
			</div>
		</div>
		<div class="col-md-4">
		    <div class="card rounded-lg">
			    <img src="<?=base_url('assets/sonali/latest/social/')?>image/img4.jpg" class="rounded-lg fav-image-size">
			</div>
		</div>
		
	</div>
</div>

<div class="container card mt-3 w-50 shadow-lg p-4">
    <div class="row">
		<div class="col-md-10">
			<h5 class="font-weight-bold text-dark">Favourite Chat</h5>
		</div>
		<div class="col-md-2">
			<a href="#"><h6 class="text-primary font-weight-normal ">See All</h6></a>
		</div>
	</div>
	<hr>
    <div class="row mt-1">
		<div class="col-sm-2">
		   <img src="<?=base_url('assets/sonali/latest/social/')?>image/img1.jpg" class="rounded-circle img-fluid image-post">
		</div>
		<div class="col-sm-8">
			<a href="#"><h6 class="mt-2"><span class="font-weight-bold text-info mt-4">Sonali Mishra </span></a> </h6>
			<h6 class="font-weight-normal">Friend</h6>
		</div>
	</div>
    <div class="row">
	    <div class="offset-2 col-md-7">
		   <h6 class="mt-2"><span>26 May 2019</span> &nbsp; <i class='fas fa-user-friends'></i>  &nbsp; <span>Sonali Sona Send a message</span></h6>
		</div>
	</div>
</div>

<br>
</br>

<script>
	$(document).ready(function(){
	  $("#lov").hover(function(){
		  $("#lovlist").toggle();
	 });
 });
 </script>
 
 <script>
	$(document).ready(function(){
	  $("#likes").hover(function(){
		  $("#likeslist").toggle();
	 });
 });
 </script>
 
 <script>
	$(document).ready(function(){
	  $("#comment").hover(function(){
		  $("#commentlist").toggle();
	 });
 });
 </script>
 



 
 