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
			<h5 class="font-weight-bold text-dark">Favourite Photos</h5>
		</div>
	</div>
		<?php
	foreach($favphoto as $favpic)
	{
	    if($favpic->contentType=='Photos')
	    {
	        $images_path=explode(',',$favpic->images_path);
	        $count=count($images_path);
	 ?>
    <div class="row mt-2">
        <?php
        for($i=0;$i<$count;$i++)
        {
        ?>
	    <div class="col-md-4 p-3">
		    <div class="card rounded-lg">
			    <img src="<?=base_url($images_path[$i])?>" class="rounded-lg fav-image-size" >
			</div>
		</div>
		<?php
        }
        ?>
	</div>
	 <?php
	    }
    }
    ?>
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
 



 
 