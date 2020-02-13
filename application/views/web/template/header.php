  <!DOCTYPE html>
<html lang="en">
<head>
  	<title>Lanecrowd</title>
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

  	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
  	<!-- Toggle cdn https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css-->

  	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
  	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
  	<!-- Toggle cdn -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
  	<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
	<script type="text/javascript" src="<?=base_url('assets/js/crousel.js')?>"></script>
	<!-- Toggle cdn -->
   <!-- emoji link -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.1/emojionearea.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.1/emojionearea.css">
  <!-- end emoji link -->      
  <!-- Multiple select link -->  
  <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
       <!-- end Multiple select link -->  
   <link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/home.css')?>">
    <link rel="stylesheet" type="text/css" href="https://onesignal.github.io/emoji-picker/lib/css/emoji.css">
    <script src="https://onesignal.github.io/emoji-picker/lib/js/config.js"></script>
    <script src="https://onesignal.github.io/emoji-picker/lib/js/util.js"></script>
    <script src="https://onesignal.github.io/emoji-picker/lib/js/jquery.emojiarea.js"></script>
   <script src="https://onesignal.github.io/emoji-picker/lib/js/emoji-picker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-circle-progress/1.2.2/circle-progress.min.js"></script>
   <link href="https://fonts.googleapis.com/css?family=Crimson+Text&display=swap" rel="stylesheet"> 
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timeago/0.11.4/jquery.timeago.js"></script>

 <!-- <script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script> -->
    
</head>
<body>
	<style type="text/css">
body {
    color: #444444 !important;
    line-height: 1.7;
    font-size: 14px !important;
    font-weight: 400 !important;
    background-color: #f1f1f1 !important;
    font-family: "Roboto", sans-serif ;
}
@media only screen and (min-width: 1200px){
  .container, .container-lg, .container-md, .container-sm, .container-xl {
    max-width: 1200px;
  }
}
.card{
  box-shadow: 0px 1px 15px 0px rgba(51, 51, 51, 0.2);

}

.full-width {
  width: 100%;
  height: 100vh;
  display: flex;
}
.full-width .justify-content-center {
  display: flex;
  align-self: center;
  width: 100%;
}
.full-width .lead.emoji-picker-container {
  width: 300px;
  display: block;
}
.full-width .lead.emoji-picker-container input {
  width: 100%;
  height: 50px;
}

.emoji-wysiwyg-editor{
  height: auto !important;
}

/*body{
  font-family: 'Roboto,-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI","Helvetica Neue",Arial,sans-serif';
}*/
.badge {
      position: absolute;
    top: -3px;
   
    padding: 4px 4px;
    border-radius: 50%;
    background: red;
    color: white;
  }
/*  .badge_rt_notify{
    right: 19px;
    
  }*/
  .badge_rt{
     right: 11px;
    
  }
  a:hover{
    text-decoration: none !important;
  }
	.bgb
    {
      background:#231F20;
      /*#ff441a*/
    }
    input {
  outline: none;
}
input[type=search] {
  -webkit-appearance: textfield;
  -webkit-box-sizing: content-box;
  font-family: inherit;
  font-size: 100%;
}
input::-webkit-search-decoration,
input::-webkit-search-cancel-button {
  display: none; 
}


input[type=search] {
  background: #ededed url(https://static.tumblr.com/ftv85bp/MIXmud4tx/search-icon.png) no-repeat 9px center;
  border: solid 1px #ccc;
  padding: 3px 6px 5px 34px;
  width: 100px;
  
  -webkit-border-radius: 10em;
  -moz-border-radius: 10em;
  border-radius: 10em;
  
  -webkit-transition: all .5s;
  -moz-transition: all .5s;
  transition: all .5s;
}
input[type=search]:focus {
  width: 230px;
  background-color: #fff;

  
  -webkit-box-shadow: 0 0 5px rgba(109,207,246,.5);
  -moz-box-shadow: 0 0 5px rgba(109,207,246,.5);
  box-shadow: 0 0 5px rgba(109,207,246,.5);
}


input:-moz-placeholder {
  color: #999;
}
input::-webkit-input-placeholder {
  color: #999;
}

.emoji-btn{
    float: right;
    margin-top: -36px;
    margin-right: 4px;
}

.hintDiv{
position: absolute;
    background: white;
    /* border: 1px solid red; */
    top: 63px;
    margin-left: 0px;
  z-index: 122;
  width: 274px;
  height: auto;
  /* min-height: 100px; */
  max-height: 220px;
  overflow-y: scroll;
}
.cbx {
  position: relative;
  top: -1px;
  width: 17px;
  height: 17px;
  border: 1px solid #c8ccd4;
  border-radius: 3px;
  vertical-align: middle;
  transition: background 0.1s ease;
  cursor: pointer;
}
.cbx:after {
  content: '';
  position: absolute;
  top: 1px;
  left: 5px;
  width: 5px;
  height: 11px;
  opacity: 0;
  transform: rotate(45deg) scale(0);
  border-right: 2px solid #fff;
  border-bottom: 2px solid #fff;
  transition: all 0.3s ease;
  transition-delay: 0.15s;
}
.lbl {
  margin-left: 5px;
  vertical-align: middle;
  cursor: pointer;
}
#cbx:checked ~ .cbx {
  border-color: transparent;
  background: #6871f1;
  animation: jelly 0.6s ease;
}
#cbx:checked ~ .cbx:after {
  opacity: 1;
  transform: rotate(45deg) scale(1);
}
#cbx2:checked ~ .cbx {
  border-color: transparent;
  background: #6871f1;
  animation: jelly 0.6s ease;
}
#cbx2:checked ~ .cbx:after {
  opacity: 1;
  transform: rotate(45deg) scale(1);
}
.cntr {
  position: absolute;
  top: 50%;
  left: 0;
  width: 100%;
  text-align: center;
}
@-moz-keyframes jelly {
  from {
    transform: scale(1, 1);
  }
  30% {
    transform: scale(1.25, 0.75);
  }
  40% {
    transform: scale(0.75, 1.25);
  }
  50% {
    transform: scale(1.15, 0.85);
  }
  65% {
    transform: scale(0.95, 1.05);
  }
  75% {
    transform: scale(1.05, 0.95);
  }
  to {
    transform: scale(1, 1);
  }
}
@-webkit-keyframes jelly {
  from {
    transform: scale(1, 1);
  }
  30% {
    transform: scale(1.25, 0.75);
  }
  40% {
    transform: scale(0.75, 1.25);
  }
  50% {
    transform: scale(1.15, 0.85);
  }
  65% {
    transform: scale(0.95, 1.05);
  }
  75% {
    transform: scale(1.05, 0.95);
  }
  to {
    transform: scale(1, 1);
  }
}
@-o-keyframes jelly {
  from {
    transform: scale(1, 1);
  }
  30% {
    transform: scale(1.25, 0.75);
  }
  40% {
    transform: scale(0.75, 1.25);
  }
  50% {
    transform: scale(1.15, 0.85);
  }
  65% {
    transform: scale(0.95, 1.05);
  }
  75% {
    transform: scale(1.05, 0.95);
  }
  to {
    transform: scale(1, 1);
  }
}
@keyframes jelly {
  from {
    transform: scale(1, 1);
  }
  30% {
    transform: scale(1.25, 0.75);
  }
  40% {
    transform: scale(0.75, 1.25);
  }
  50% {
    transform: scale(1.15, 0.85);
  }
  65% {
    transform: scale(0.95, 1.05);
  }
  75% {
    transform: scale(1.05, 0.95);
  }
  to {
    transform: scale(1, 1);
  }
}

/*  .post_image
  {
    height: 100%;
  }*/
 .tag_pht{
      font-size: 16px;
      padding: 4px;
      display: block;
  }
  .wdth_ht{
    width: 16px;
    height: 15px;
  }
  .hidden-xs-up {
        display: none!important;
  }
  .ext_img{
        height: 196px;
  }
  #srchFndLs li{
    padding:5px 0px ;
  }
   .randflow{
    background: #ff441a;
    padding: 0px 10px;
    border-radius: 10px;
    }
    .folow_rw{
      margin-top: 5px;
      /*box-shadow: 0px 3px 7px 0px #00000026;*/
      padding: 2px;

    }
	</style>
<style type="text/css">
/*  .fa-address-card
  {
    border: 1px solid black;
    border-radius: 50%;
    padding: 10px;
  }*/
  .profile-banner-small {
    position: relative;
}
.profile-banner-small:before {
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    content: '';
    position: absolute;
    pointer-events: none;
    border: 10px solid rgba(198, 165, 107, 0.3);
}
.author {
    font-size: 14px;
    font-weight: 600;
    /*line-height: 1;*/
    text-transform: capitalize;
      color: #444444 !important
}
.author a {
    color: #333333;
}
.author a:hover {
    color: #dc4734;
    text-decoration: underline;
}
a:hover {
    color: #dc4734;
    text-decoration: underline;
}
.profile-desc {
    font-size: 13px;
    color: #666666;
        font-weight: 500;
    padding-top: 10px;
}
</style>


  <?php
    $session=$this->session->userdata('logged_in');
    $user_Id=$session[0]->user_id;
    // Get MY Notifications
    $notif=array("notify_to"=>$user_Id,"status_"=>0);
    $this->db->where($notif);
    $this->db->join('users','users.user_id=notifications_.notify_by');
    $myNotifications=$this->db->get('notifications_')->result();
    //Get My Messages
    $this->db->join('users','users.user_id=messages_.sent_by');
    $notif=array("sent_to"=>$user_Id,"read_status "=>0);
    $this->db->where($notif);
    $myMessages=$this->db->get('messages_')->result();

    $trending=$this->db->query("SELECT DISTINCT(a.post_id) ,a.*, u.*, p.*, SUM(a.like_or_dislike) as most FROM like_or_dislike as a JOIN post_ as p ON p.post_id=a.post_id JOIN users as u ON p.posted_by=u.user_id WHERE a.like_or_dislike=1 && p.post_type=0 GROUP BY a.post_id ORDER BY most DESC LIMIT 10")->result();
  // print_r($tending);
    // $myMessages=

    
  ?>
  <style>
  .notfication_text{
    font-size:13px;
    font-family: 'Crimson Text', serif;
  }
  </style>
  <script>
  $(document).ready(function(){
      $(document.body).click( function() {
        // console.log("yes");
         $(".notify-drop").hide();
      });
  });

</script>
  <script>
    $(document).on('click',"#notific",function(){
      $('.notifications_box').toggle();
    });
    $(document).on('click',"#openMessage",function(){
      $('.message_box').toggle();
    });
    $(document).on('keyup','#search-frnd',function(){
      var key_=$(this).val();
      if(key_!=""){
        $('.hintDiv').show();
        $.ajax({
          url:"<?=base_url('Test/searchFriend')?>",
          type:"post",
          data:{key:key_},
          success:function(res){
            console.log(res);
            res=JSON.parse(res);
            $('#srchFndLs').empty();
            if(res.code==1 && res.data.length!=0){
              for(let i=0; i<res.data.length; i++){
                var li='';
                li+='<li ><a class="d-flex" href="<?=base_url('Profile/')?>'+res.data[i].user_id+'"><figure class="m-0"><img style="border-radius:50%" src="<?=base_url('assets/img/Profile_Pic/')?>'+res.data[i].profile_picture +'" width="35px" height="35px"></figure><span class="author ml-1 my-auto"> '+res.data[i].full_name+' </span></a></li>';
                $('#srchFndLs').append(li);
              }
            }
          }
        });
      }else{
        $('.hintDiv').hide();
      }
      console.log(' Key : '+key_);
      
    });
  </script>
<!--     <div class="row hintDiv p-3" style="display:none">
      <div class="col">
          <ul id="srchFndLs" >
            
          </ul>
      </div>
    </div> -->
<section class="container-fluid bg-white fixed-top">
    <nav class="navbar navbar-expand-md navbar-light  container" >
      	<a class="navbar-brand" href=<?=base_url('Home')?>><img src="<?=base_url()?>assets/img/logo.png" ></a>
      	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        	<span class="navbar-toggler-icon"></span>
      	</button>
      	<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    	    <form class="form-inline my-2 my-lg-0" method="POST" action="<?=base_url()?>Test/searchResults"> 
    	        <input type="search" placeholder="Search" name="search-tag" id="search-frnd">
    	    </form>
          <div class="row hintDiv " style="display:none">
            <div class="col">
                <ul id="srchFndLs" >
                  
                </ul>
            </div>
          </div>
          <!-- test -->
        
          <!-- test end -->
    	    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
           
      	    	<li class="nav-item home mr-3">
      				<a class="nav-link p-1 text-center " href="<?=base_url('Home')?>"><span><i class="fa fa-home" aria-hidden="true"></i></span><div class="mt-n2">Home</div></a>
      			</li>
          		<li class="nav-item profile mr-3">
    	        	<a class="nav-link p-1 text-center " href="<?=base_url('Profile')?>"><span><i class="fa fa-user" aria-hidden="true"></i></span><div class="mt-n2">Profile</div></a>
          		</li>
          	<!-- 	<li class="nav-item trending">
    	        	<a class="nav-link p-1 text-center " href="<?=base_url('Post/trenDingPosts')?>"><span><i class="fa fa-bolt" aria-hidden="true"></i> -->
                  <!-- <span class="badge badge_rt"><?=count($trending)?></span>
                </span> -->
               <!--    <div class="mt-n2"> Trending</div></a>
          		</li> -->
    			<li class="nav-item messenger mr-3">
    				<a class="nav-link p-1 text-center " id="openMessage" href="javascript:void(0)"><span><i class="fa fa-comments-o" aria-hidden="true" title="Message"></i><span class="badge badge_rt_notify"><?=count($myMessages)?></span></span><div class="mt-n2">Messages</div></a>
    			  <ul class="dropdown-menu notify-drop p-3 message_box" style="width: 348px; height:348px; overflow-y:scroll">
              <div class="notify-drop-title">
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-6"><a href="<?=base_url('Message')?>">Messages (<b><?=count($myMessages)?></b>)</a></div>
                  <div class="col-md-6 col-sm-6 col-xs-6 text-right"><a href="" class="rIcon allRead" data-tooltip="tooltip" data-placement="bottom" title="close"><i class="fa fa-dot-circle-o"></i></a></div>
                </div>
              </div>
              <!-- end notify title -->
              <!-- notify content -->
              <div class="drop-content">
               
                <?php
                  foreach($myMessages as $msgs){
                      ?>
                        <li>
                          <div class="row p-1">
                      
                              <div class="col-md-2">
                                <img src="" onerror="this.src='<?=base_url()?>assets/img/Profile_Pic/default.png';" alt="" style="border-radius:50%" width="100%">
                              </div>
                              <div class="col-md-10">
                                <p class="notfication_text"><span><strong><?=$msgs->full_name?></strong> : </span><?=$msgs->message_?> <span class="time float-right">1 Seconds Ago</span></p>
                              </div>
                          </div>
                          <!-- <hr> -->
                        </li>
                      <?php
                  }
                ?>
              </div>
              <div class="notify-drop-footer text-center">
                <a href=""><i class="fa fa-eye"></i> Read More</a>
              </div>
            </ul>
          </li>		
      
           <li class="nav-item notification mr-3">
            <a class="nav-link p-1 text-center"  id="notific" href="javascript:void(0)"><span><i class="fa fa-bell-o" aria-hidden="true" title="Notification"></i><span class="badge badge_rt_notify"><?=count($myNotifications)?></span></span><div class="mt-n2">Notification</div></a>
            <ul class="dropdown-menu notify-drop p-3 notifications_box" style="width: 348px; height:348px">
              <div class="notify-drop-title">
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-6"><a href="<?=base_url('Test/notifications')?>">Notifications (<b><?=count($myNotifications)?></b>)</a></div>
                  <div class="col-md-6 col-sm-6 col-xs-6 text-right"><a href="" class="rIcon allRead" data-tooltip="tooltip" data-placement="bottom" title="close"><i class="fa fa-dot-circle-o"></i></a></div>
                </div>
              </div>
              <!-- end notify title -->
              <!-- notify content -->
              <div class="drop-content">
                <?php
                  foreach($myNotifications as $notifications){
                    // print_r($notifications);
                    ?>
                      <li>
                        <div class="row p-3">
                    
                            <div class="col-md-2">
                              <img src="<?=base_url('assets/img/Profile_Pic/').$notifications->profile_picture?>" onerror="this.src='<?=base_url()?>assets/img/Profile_Pic/default.png';" alt="" style="border-radius:50%" width="100%">
                            </div>
                            <div class="col-md-10">
                              <p class="notfication_text"><?=$notifications->notification_?><span class="time float-right"> 1 Seconds Ago</span></p>
                            </div>
                        
                        </div>
                        <hr>
                      </li>
                    <?php
                  }
                ?>
                
                <!-- <li>
                  <div class="row p-3">
               
                      <div class="col-md-2">
                        <img src="" onerror="this.src='<?=base_url()?>assets/img/Profile_Pic/default.png';" alt="" style="border-radius:50%" width="100%">
                      </div>
                      <div class="col-md-10">
                        <p class="notfication_text">Lorem ipsum sit dolor amet consilium. <span class="time">1 Seconds Ago</span></p>
                      </div>
                  
                  </div>
                  <hr>
                </li> -->
                <!-- <li>
                  <div class="row p-3">
               
                      <div class="col-md-2">
                        <img src="" onerror="this.src='<?=base_url()?>assets/img/Profile_Pic/default.png';" alt="" style="border-radius:50%" width="100%">
                      </div>
                      <div class="col-md-10">
                        <p class="notfication_text">Lorem ipsum sit dolor amet consilium. <span class="time">1 Seconds Ago</span></p>
                      </div>
                  
                  </div>
                  <hr>
                </li> -->
              </div>
              <div class="notify-drop-footer text-center">
                <a href=""><i class="fa fa-eye"></i> Read More</a>
              </div>
            </ul>
          </li> 
         <!--  <li class="nav-item messenger">
              <a class="nav-link" href="<?=base_url('Message')?>"><span><i class="fa fa-bolt" aria-hidden="true"></i></span><div class="mt-n2">Notification</div></a>
          </li>  -->
    			<li class="nav-item">
    				<a class="nav-link p-1 text-center" href="<?=base_url('Login/logout')?>"><span><i class="fa fa-power-off" aria-hidden="true"></i></span><div class="mt-n2">Logout</div></a>
    			</li>
    	    </ul>
      	</div>
    </nav>
</section>
<style>

</style>