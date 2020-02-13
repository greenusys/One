
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
 <!-- <script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script> -->
    <script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <script src="https://files.codepedia.info/files/uploads/iScripts/html2canvas.js"></script>
<style>
    .profile-div
    {
	    height:75px;
		width:100px;
    }
	.comment-profile
	{
		height:42px;
		width:100px;
	}
	.bg
	{
		background-color:white;
		padding:5px;
	}
	.bg:hover
	{
		background-color: #645f5f;
		color:white;
	}
	.mt
	{
		margin-top:-40px;
	}
	.fs
	{
		font-size:13px;
	}
	.dropdown-item:focus, .dropdown-item:hover 
	{
       color: #16181b;
       text-decoration: none;
       color: white;
       background-color: #606162;
    }
	.content-div
	{
		position: absolute;
        will-change: transform;
        top: -20px;
        left: -95px;
        transform: translate3d(9px, 44px, 0px)
	}
	.emoji
	{
	   width:100%;
	   background-color:#d7d6d6;;
	   margin:0px auto;
	}
	.reply
	{
	   width:100%;
	   background-color:#d7d6d663;
	   margin:0px auto;
	}
	.comnt
	{
	   width:100%;
	   background-color:#d7d6d663;
	}
	.gif
	{
		height:46px;
	}
	.comment-size
	{
		height:120px;
	}
	.view-section
	{
        height:610px;
        overflow: auto;
    }
	.bottom-section
	{
		width: 100%;
		background-color: #f4efefe6;
		margin: 0px auto;
	}
	.icon1
	{
		font-size: 15px;
        color: blue;
        margin-top: 25px;
        border-radius: 50%;
        padding: 5px;
        margin-left: -22px;
        background-color: #80808033;
	}
	.icon2
	{
		font-size: 15px;
        color: red;
        margin-top: 25px;
        border-radius: 50%;
        padding: 5px;
        margin-left: -22px;
        background-color: #80808033;
	}
	.icon3
	{
		font-size: 15px;
        color: orange;
        margin-top: 25px;
        border-radius: 50%;
        padding: 5px;
        margin-left: -22px;
        background-color: #80808033;
	}
	.navbar-expand-lg .navbar-nav .nav-link 
	{
       padding-right: 2.5rem;
       padding-left: .5rem;
   }
	.people-profile 
	{
		height: 75px;
		width: 80px;
		margin-top: -30px;
		margin-left: 15px;
		border: 4px solid white;
		position: relative;
	}
	.profile-info-div
	{
		background-color:white;
		border:1px solid #80808042;
		border-radius:3px;
	}
	.mt-send
	{
	   margin-top:-55px;
	}
</style>

<div class="container mt-5">
  <div class="row">
    <?php
            foreach($People as $ppl){
                ?>
                    <div class="container mt-4">
                            <div class="row profile-info-div shadow-sm p-2 w-75 m-auto">
                                <div class="col-sm-4">
                                    <div>
                                        <img src="<?=base_url()?>assets/img/Cover_Photo/<?=$ppl->cover_photo?>"  class="rounded-sm img-fluid" onerror="this.src='<?=base_url()?>assets/img/Cover_Photo/default.jpg';">
                                    </div>
                                    <img src="<?=base_url()?>assets/img/Profile_Pic/<?=$ppl->profile_picture?>" onerror="this.src='<?=base_url()?>assets/img/Profile_Pic/default.png';" class="rounded-circle img-fluid people-profile">
                                </div>
                                <div class="col-sm-4">
                                    <a href="#"><h6 class="font-weight-bold text-info mt-4"><?=$ppl->full_name?></h6></a>
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
                <?php
            }

    ?>
    

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
