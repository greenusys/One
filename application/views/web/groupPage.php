<style>
  .flw_img{
    width: 40px;
    height: 40px;
  }
  .group-image-size{
	  height:215px;
  }
  .group-img-size{
	  height:140px;
  }
  .btn{
	  width:100%;
  }
  .centered 
   {
       position: absolute;
       top: 50%;
       left: 50%;
       transform: translate(-50%, -50%);
   }
  </style>
  

<!--     <div class="container-fluid  bg-white border-bottom border-top" style="margin-top:80px; !important">
	    <div class="container">
			<div class="row">
				<nav class="navbar navbar-expand-lg navbar-light">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
						<div class="navbar-nav">
						  <a class="nav-item nav-link text-dark active" href="allpage.php">All</a>
						  <a class="nav-item nav-link text-dark" href="postpage.php">Posts</a>
						  <a class="nav-item nav-link text-dark" href="peoplepage.php">People</a>
						  <a class="nav-item nav-link text-dark" href="photopage.php">Photos</a>
						  <a class="nav-item nav-link text-dark" href="videopage.php">Videos</a>
						  <a class="nav-item nav-link text-dark" href="page.php">Pages</a>
						  <a class="nav-item nav-link text-dark" href="placepage.php">Places</a>
						  <a class="nav-item nav-link text-dark" href="grouppage.php">Groups</a>
						  <a class="nav-item nav-link text-dark" href="apppage.php">Apps</a>
						   <a class="nav-item nav-link text-dark" href="eventpage.php">Events</a>
						  <a class="nav-item nav-link text-dark" href="linkpage.php">Links</a>
						</div>
					</div>
				</nav>
			</div>
		</div>
    </div>
 -->	<div class="container card shadow-sm p-4 " style="margin-top:80px; !important">
		<div class="row">
			<div class="col-md-11">
				<h5 class="font-weight-bold text-dark">Suggested for you</h5>
				<h6 class="font-weight:normal;">Groups you might be interested in</h6>
			</div>
			<div class="col-md-1">
				<a href="#"><h6 class="text-primary font-weight-normal mt-3">See All</h6></a>
			</div>
		</div>
		<div class="row mt-2">
			<?php
			// for($i=0;$i<4;$i++)
			foreach($allGroups as $group)
			{
				$memberArray=explode(',',$group->group_members);
			?>
				<div class="col-md-3 ">
					<div class="suggest-group">
						<img src="<?=base_url('assets/uploads/groupCoverPhoto/').$group->group_cover_photo?>" class="group-image-size" width="100%">
						<div class="row p-4">
							<h6 class="font-weight-bold text-dark "><?=$group->group_name?></h6>
							<h6 class="font-weight-normal"><?=count($memberArray)?>  members • 350 posts a day</h6>
							<button type="button" class="btn btn-success" id="join">Join</button>
							<button type="button" class="btn btn-success" id="request" style="display:none">Requested</button>
						</div>
					</div>
				</div>
			<?php
				}
			?>	
		</div>
	</div>

<div class="container card mt-5  shadow-sm p-4">
   <div class="row">
		<div class="col-md-11">
			<h5 class="font-weight-bold text-dark">Friends' groups</h5>
			<h6 class="font-weight:normal;">Groups that your friends are in</h6>
		</div>
		<div class="col-md-1">
			<a href="#"><h6 class="text-primary font-weight-normal mt-3">See All</h6></a>
		</div>
	</div>
	<hr>
    <div class="row mt-2">
	    <?php
        // for($i=0;$i<2;$i++)
        foreach($allGroups as $group)
		{
            $memberArray=explode(',',$group->group_members);
            ?>
			<div class="col-md-6">
				<div class="card mb-3 bg-light" style="max-width: 540px;">
					<div class="row no-gutters">
						<div class="col-md-4">
						  <img src="<?=base_url('assets/uploads/groupCoverPhoto/').$group->group_cover_photo?>" class="card-img group-img-size">
						</div>
						<div class="col-md-8">
							<div class="card-body p-2">
								<h5 class="card-title mb-0"><?=$group->group_name?></h5>
								<p class="card-text mb-2"><?=count($memberArray)?> members • 10 posts a week</p>
								<div class="row">
									<div class="col-sm-2">
									   <img src="<?=base_url('assets/sonali/latest/social/')?>image/profile.jpeg" class="flw_img rounded-circle img-fluid group-profile">
									</div>
									 <div class="col-sm-2">
									   <img src="<?=base_url('assets/sonali/latest/social/')?>image/photo.jpeg" class="flw_img rounded-circle img-fluid group-profile">
									</div>
									 <div class="col-sm-2">
									   <img src="<?=base_url('assets/sonali/latest/social/')?>image/profile.jpeg" class="flw_img rounded-circle img-fluid group-profile">
									</div>
								</div>
								<div class="row">
								    <div class="col-sm-6">
										<small class="font-weight-bold mt-2 fs">8 friends are members</small>
									</div>
									<div class="col-sm-6">
										<button type="button" class="join-butn px-2 btn-success btn  w-100" id="join1">Join</button>
								        <button type="button" class="join-butn  w-100" id="request1" style="display:none">Requested</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php
			}
		?>	
	</div>
</div>

<div class="container card mt-5  shadow-sm p-4">
   <div class="row">
	   <div class="col-md-11">
			<h5 class="font-weight-bold text-dark">Categories</h5>
			<h6 class="font-weight:normal;">Find a group by browsing top categories</h6>
		</div>
		<div class="col-md-1">
			<a href="#"><h6 class="text-primary font-weight-normal mt-3">See All</h6></a>
		</div>
	</div>
    <div class="row mt-2">
    <?php
        // for($i=0;$i<4;$i++)
        foreach($allGroups as $group)
		{
            $memberArray=explode(',',$group->group_members);
        ?>
			<div class="col-md-3">
                <div class="card rounded-lg">
                    <img src="<?=base_url('assets/uploads/groupCoverPhoto/').$group->group_cover_photo?>" class="rounded-lg group-image-size" style="height:200px !important">
                    <a href="#"><div class="centered font-weight-bold text-white"><?=$group->group_category?></div></a>
                </div>
            </div>
		<?php
			}
		?>
	    
		<!-- <div class="col-md-3">
		    <div class="card rounded-lg">
			    <img src="<?=base_url('assets/sonali/latest/social/')?>image/coverphoto.jpg" class="rounded-lg group-image-size">
				<a href="#"><div class="centered font-weight-bold text-white">Relationship & Identity</div></a>
			</div>
		</div>
		<div class="col-md-3">
		    <div class="card rounded-lg">
			    <img src="<?=base_url('assets/sonali/latest/social/')?>image/profile.jpeg" class="rounded-lg group-image-size">
				<a href="#"><div class="centered font-weight-bold text-white">Civics & Community</div></a>
			</div>
		</div>
		<div class="col-md-3">
		    <div class="card rounded-lg">
			    <img src="<?=base_url('assets/sonali/latest/social/')?>image/images.jpg" class="rounded-lg group-image-size">
				<a href="#"><div class="centered font-weight-bold text-white">Buy & Sell</div></a>
			</div>
		</div> -->
	</div>
</div>

<div class="container card mt-5  shadow-sm p-4">
    <div class="row">
		<div class="col-md-11">
			<h5 class="font-weight-bold text-dark">Popular near you</h5>
			<h6 class="font-weight:normal;">Groups that people in your area are in</h6>
		</div>
		<div class="col-md-1">
			<a href="#"><h6 class="text-primary font-weight-normal mt-3">See All</h6></a>
		</div>
	</div>
    <div class="row mt-2">
	    <?php
		 foreach($allGroups as $group)
         {
             $memberArray=explode(',',$group->group_members);
		?>
			<div class="col-md-6">
				<div class="card mb-3 bg-light" style="max-width: 540px;">
					<div class="row no-gutters">
						<div class="col-md-4">
						  <img src="<?=base_url('assets/uploads/groupCoverPhoto/').$group->group_cover_photo?>" class="card-img group-img-size">
						</div>
						<div class="col-md-8">
							<div class="card-body">
								<h5 class="card-title"><?=$group->group_name?></h5>
								<p class="card-text"><?=count($memberArray)?> members • 140 posts a day</p>
								<div class="row">
									<button type="button" class="join-butn px-2 btn-success btn " id="join2" style="width:120px; float:left">Join</button>
									<button type="button" class="join-butn px-2 btn-success btn  w-100" id="request2" style="display:none">Requested</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php
			}
		?>	
	</div>
</div>

<div class="container card mt-5  shadow-sm p-4">
    <h5 class="font-weight-bold text-dark">More suggestions</h5>
	<div class="row mt-2">
	    <?php
			 foreach($allGroups as $group)
             {
                 $memberArray=explode(',',$group->group_members);?>
			<div class="col-md-6">
				<div class="card mb-3 bg-light" style="max-width: 540px;">
					<div class="row no-gutters">
						<div class="col-md-4">
						  <img src="<?=base_url('assets/uploads/groupCoverPhoto/').$group->group_cover_photo?>" class="card-img group-img-size" >
						</div>
						<div class="col-md-8">
							<div class="card-body">
								<h5 class="card-title"><?=$group->group_name?></h5>
								<p class="card-text"><?=count($memberArray)?> members • 10 posts a year</p>
								<div class="row">
									<button type="button" class="join-butn px-2 btn-success btn  w-100" id="join2">Join</button>
									<button type="button" class="join-butn px-2 btn-success btn  w-100" id="request2" style="display:none">Requested</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php
			}
		?>	
	</div>
</div>

 
 <script>
$(document).ready(function(){
   $("#join").click(function(){
	 $("#request").show();
	 $("#join").hide();
  });
});
</script>

<script>
$(document).ready(function(){
   $("#request").click(function(){
	 $("#join").show();
	 $("#request").hide();
  });
});
</script>

<script>
$(document).ready(function(){
   $("#join1").click(function(){
	 $("#request1").show();
	 $("#join1").hide();
  });
});
</script>

<script>
$(document).ready(function(){
   $("#request1").click(function(){
	 $("#join1").show();
	 $("#request1").hide();
  });
});
</script>

<script>
$(document).ready(function(){
   $("#join2").click(function(){
	 $("#request2").show();
	 $("#join2").hide();
  });
});
</script>

<script>
$(document).ready(function(){
   $("#request2").click(function(){
	 $("#join2").show();
	 $("#request2").hide();
  });
});
</script>



