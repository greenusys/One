<style>
.fav-image-size{
	max-height:300px;
}
.image-post
{
    width: 75px;
    height: 75px;
}
</style>

<div class="container card mt-5 w-50 shadow-lg p-3">
    <div class="row">
	    <div class="col-md-10">
			<h5 class="font-weight-bold text-dark">Favourite Posts</h5>
		</div>
	</div>
	<hr>
	<?php

	foreach($favpost as $fav)
	{
	    if($fav->contentType=='Post')
	    {
	        $post_file=explode(',',$fav->post_files);
	         $post_file=$post_file[0];
	         $posted_on=$fav->posted_on;
	         $posted_on=date("Y-m-d", strtotime($posted_on));
	    ?>
    	<div class="row mt-1">
    		<div class="col-sm-2">
    		   <img src="<?=base_url('assets/img/Profile_Pic/'.$fav->profile_picture)?>" class="rounded-circle img-fluid image-post h-5">
    		</div>
    		<div class="col-sm-5">
    			<a href="#"><h6 class="mt-2"><span class="font-weight-bold text-info mt-4"><?=$fav->full_name?></span></a> </h6>
    			<h6 class="font-weight-normal">Friend</h6>
    			<h6 class="mt-2"><span><?=$posted_on?></span> &nbsp; <i class='fas fa-user-friends'></i>  &nbsp; <span><?=$fav->full_name?> added a new photo</span></h6>
    		</div>
    		<?php
    		if(!empty($fav->post_files))
    		{?>
    	    <div class="col-sm-5">
    	         <img src="<?=base_url('assets/uploads/images/'.$post_file)?>"  class="rounded img-fluid img-post">
    		</div>
    		<?php
    		}
    		else
    		{
    		 ?>
    		 <div class="col-sm-5">
    	         <h6><?=ucwords($fav->post)?></h6>
    		</div>
    		 <?php
    		}
    		?>
    	</div>
      
    	<hr>
    	<div class="row mt-2" >
    		<div class="col-sm-9">
    			<button type="button" id="likes" class="btn btn-primary rounded-circle"><i class="fa fa-thumbs-up" style="font-size:14px"></i></button> <?=$fav->total_likes?>

    		</div>
    		
    		<!--<div class="col-sm-3" id="comment" >-->
    		<!--	<h6 class="font-weight-normal" > <strong>86 Comments</strong></h6>-->
    		<!--</div>-->
    	</div>
    	<div class="row card list bg-dark p-2 position-fixed d-none" id="likeslist">
    		<ul class="text-white" style="list-style:none">
    			<li>Sonali Mishra</li> 
    			<li>Shivam Saini</li>
    			<li>Rahul Kumar</li>
    			<li>Deepak Nauliya</li>
    			<li>Ravish Beg</li>
    		</ul>								
    	</div>
    	<div class="row card bg-dark list1 p-2 position-fixed d-none" id="lovlist">
    		<ul class="text-white list-style-none">
    			<li>Sonali Mishra</li> 
    			<li>Abhishek</li>
    		</ul>								
    	</div>
    	<div class="row card bg-dark list2 p-2 position-fixed d-none" id="commentlist">
    		<ul class="text-white list-style-none">
    			<li>Sonali Mishra</li> 
    			<li>Abhishek</li>
    		</ul>								
    	</div>
    	<hr>
    <?php
	    }
    }?>
</div>


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
 



 
 