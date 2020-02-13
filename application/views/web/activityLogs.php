<style type="text/css">
	.back_nt{
		background: #d5e7f7;
		    box-shadow: 1px 2px 4px 0px #0000002e;
	}
.margt_5r{
	margin-top: 5rem;
}
</style>
<!-- <div class="container">
	<div class="row mt-3">
		<div class="col-md-6">
			<span class="notifi">Your Notification</span>
		</div>
		<div class="col-md-6">
			<a href="">Notification Setting</a>
		</div>
	</div>
	<hr>
<span class="text-secondary ">Get notifications via:</span><a href="">Text message</a> 
</div> -->
<div class="container margt_5r">
	<!-- <div class="border-bottom"><h4>Your Notification</h4></div> -->
	<div class="row border-bottom mt-3">
		<div class="col-md-6">
			<span class="notifi"><h4>Your Activity Logs</h4></span>
		</div>
		<div class="col-md-6 ">
			<div class="text-right">
				<!-- <a href="#">Notification Setting</a> -->
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<ul class="m-0">
				<?php
				foreach($myNotifications as $notification){
					//print_r($notification->notification_);
					?>
						<div class="back_nt row p-2 my-1">
							<div class="col-md-1">
								<img class="img rounded-pill" src="image/p5.jpg" onerror="this.src='<?=base_url()?>assets/img/Profile_Pic/default.png';" width="35" height="35">
							</div>
							<div class="col-md-10 p-1">
							<a href=""class="text-dark"><strong><?=$notification->full_name ?></strong> <?=$notification-> activity_ ?></a> 
							</div>
						</div>
					<?php }
				?>
			</ul>
		</div>
	</div>
</div>
<script>
	$(window).on('load',function(){
		$.ajax({
			url:'<?=base_url('Test/updateNotificationStatus')?>',
			type:"post",
			success:function(response){

			}
		});
	});
</script>