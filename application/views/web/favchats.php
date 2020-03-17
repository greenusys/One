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

<div class="container card mt-5 w-50 shadow-lg p-4">
    <div class="row">
		<div class="col-md-10">
			<h5 class="font-weight-bold text-dark">Favourite Chat</h5>
		</div>
	</div>
	<hr>
	<?php
	$limit=0;
	foreach($favchat as $favconv)
	{
	    if($limit<3)
	    {
    	    if($favconv->contentType=='Chats')
    	    {
    	        $posted_on=$favconv->sent_on;
    	        $posted_on=date("Y-m-d", strtotime($posted_on));
    	 ?>
        <div class="row mt-1">
    		<div class="col-sm-2">
    		   <img src="<?=base_url('assets/uploads/images/'.$favconv->profile_picture)?>" class="rounded-circle img-fluid image-post">
    		</div>
    		<div class="col-sm-8">
    			<a href="#"><h6 class="mt-2"><span class="font-weight-bold text-info mt-4"><?= $favconv->full_name?> </span></a> </h6>
    			<h6 class="font-weight-normal">Friend</h6>
    		</div>
    	</div>
        <div class="row">
    	    <div class="offset-2 col-md-7">
    		   <h6 class="mt-2"><span><?= $posted_on?> </span> &nbsp; <i class='fas fa-user-friends'></i>  &nbsp; <span><?= $favconv->full_name?> Send a message</span></h6>
    		</div>
    	</div>
    	 <?php
	    }
	    $limit++;
	    }
    }
    ?>
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
 



 
 