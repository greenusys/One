<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/friends.css')?>">
<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/gallery.css')?>">
<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/profile.css')?>">

<?php 
  $session=$this->session->userdata('logged_in');
      $userID=$session[0]->user_id;

?>
<style type="text/css">
  .profile-upload {
    display: none;
}
.p-image {
    position: absolute;
    top: 40px;
    right: 22px;
    color: #666666;
    transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
    z-index: 1;
    font-size: 17px;

}
.p-image:hover {
  transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
}
.upload-buttons {
  font-size: 1.2em;
}

.upload-buttons:hover {
  transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
  color: #999;
}
.flw_btn_cover{
      background: #ff441a !important;
    padding: 10px !important;
    border-radius: 5px !important;
    font-weight: 600 !important;
}

.add-btn .accptFriendRequest:hover {
    color: #fff;
    background-color: #218838;
    border-color: #1e7e34;
}
.add-btn .accptFriendRequest{
    color: #fff;
    background-color: #28a745;
    border-color: #28a745;
}
</style>
<section class="container-fluid mt-5" id="action_area">
  <div class="feature-photo">
  <div class="row">
      <?php
        if(empty($Mycoverpic))
      {
        ?>
         <img src="<?=base_url()?>assets/uploads/images/<?=$MyDetails[0]->cover_photo?>" onerror="this.src='<?=base_url()?>assets/uploads/images/default.jpg';" alt="cover image" class="cover-pic img-fluid w-100" style="height: 350px">
     <?php
     }
      else
      {?>
        <a class="w-100" target="_blank" href="<?=base_url('Post/viewPost/').$Mycoverpic[0]->post_id?>" target="blank">
            <img src="<?=base_url()?>assets/uploads/images/<?=$MyDetails[0]->cover_photo?>" onerror="this.src='<?=base_url()?>assets/uploads/images/default.jpg';" alt="cover image" class="cover-pic img-fluid w-100" style="height: 350px">
        </a>
     <?php
     }
      ?>
  
  </div>
    <?php 
    //print_r($checkFollowings);
    //print_r($MyDetails);
   // echo $myId;
    ?>
      <div class="add-btn " >
        <!-- <span class="flw_btn_cover "><?=count($MyFollowers)?> Followers</span> -->
         <?php 

             if($MyDetails[0]->user_id != $userID){
                if($checkFollowings){
                 echo'<a href="javascript:void(0)" d-id="'.$MyDetails[0]->user_id.'" d-name="'.$MyDetails[0]->full_name.'" class="unfollow_user_ flw_btn_cover"><label class="text-white">Unfollow</label></a>';
                }else{
                   echo'<a href="javascript:void(0)" d-id="'.$MyDetails[0]->user_id.'" d-name="'.$MyDetails[0]->full_name.'" class="follow_user_ flw_btn_cover"><label class="text-white">Follow</label></a>';
                }
             }
         ?>
        
        <?php
        // echo 'My Id: '.$myId.' | Cancel Friend : '.$cancelFriend;
          if($myId==0 && $cancelFriend == 1){
            echo '<a href="#" title="" class="ml-2 " style="padding:10px !important" data-ripple="" id="unfriend" d-fnd="'.$user_id.'"> Unfriend</a>';
            
          }else if($myId==0 && $cancelFriend == 0){
            if(count($ReqStatus)>0){
            //  print_r($ReqStatus[0]['req_id']);
              if($ReqStatus[0]->sent_to== $userID){
                echo '<a href="javascript:void(0)" title="" style="padding:10px !important" class="accptFriendRequest accept-request"  action="1" req="'.$ReqStatus[0]->req_id.'" data-ripple="" >Accept Request</a>'; 
              }
            
           echo  '<a href="javascript:void(0)" title="" style="padding:10px !important" class="ml-2 sendFriendRequest" id="deleteReq" d-frnd="'.$user_id.'" data-ripple="" d-act="'.$ReqStatus[0]->req_id.'">Cancel Request</a>';
            }else{
              echo '<a href="javascript:void(0)" title="" style="padding:10px !important" class="sendFriendRequest" data-ripple="" id="sendReq" d-fnd="'.$user_id.'">Add Friend</a>';
            }
            
          }

        ?>
      </div>
      <script>
          $(document).on('click','.follow_user_',function(){
              var uId=$(this).attr('d-id');
              var name=$(this).attr('d-name');
              var ele = $(this);
              //console.log(' Action : '+toAct+' | '+reqId);
              $.ajax({
                url:"<?=base_url('APIController/FollowUser')?>",
                type:"post",
                data:{name:name,uId:uId,myid:'<?=$_SESSION['logged_in'][0]->user_id?>'},
                success:function(response){
                          response=JSON.parse(response);
                          if(response.code==1){
                            swal("Success!", response.data, "success");
                            ele.find("label").html("Unfollow");
                            ele.attr("class","unfollow_user_ flw_btn_cover");
                          }else{
                            swal("Oops!", response.data, "warning");
                          }
                          // console.log(response);
                        }
              });
          });

            $(document).on('click','.unfollow_user_',function(){
              var uId=$(this).attr('d-id');
              var name=$(this).attr('d-name');
              var ele = $(this);
              $.ajax({
                url:"<?=base_url('APIController/unFollowUser')?>",
                type:"post",
                data:{name:name,uId:uId,myid:'<?=$_SESSION['logged_in'][0]->user_id?>'},
                success:function(response){
                          response=JSON.parse(response);
                          if(response.code==1){
                            swal("Success!", response.data, "success");
                            ele.find("label").html("Follow");
                            ele.attr("class","follow_user_ flw_btn_cover");
                          }else{
                            swal("Oops!", response.data, "warning");
                          }
                          // console.log(response);
                        }
              });
          });

            $(document).on('click','.accept-request',function(){
              var toAct=$(this).attr('action');
              var reqId=$(this).attr('req');
              console.log(' Action : '+toAct+' | '+reqId);
              $.ajax({
                url:"<?=base_url('APIController/actionRequest')?>",
                type:"post",
                data:{toAct:toAct,reqId:reqId,myid:'<?=$_SESSION['logged_in'][0]->user_id?>'},
                success:function(response){
                          response=JSON.parse(response);
                          if(response.code==1){
                            swal("Success!", response.data, "success");
                            
                          }else{
                            swal("Oops!", response.data, "warning");
                          }
                          // console.log(response);
                        }
              });
            });


          $(document).on('click','#unfriend',function(){
          var sent_by=<?=$_SESSION['logged_in'][0]->user_id;?>;
          var sent_to=$(this).attr('d-fnd');
          var elem=$(this);
         // alert(sent_to);
          //swal("Friend Id: "+sent_to);
          // var sent_to=<?=$this->uri->segment(2);?>;
          $.ajax({
            url:'<?=base_url('APIController/UnFriend')?>',
          type:"post",
          data:{sent_by:sent_by,sent_to:sent_to},
          success:function(response){
            response=JSON.parse(response);
              if(response.code==1){
                swal("UnFriend ");
               // $('#action_area').load(document.URL +  ' #action_area');
                //elem.text('Friend Request Sent');
              }
            }
          });
        });

        $(document).on('click','#sendReq',function(){
          var sent_by=<?=$_SESSION['logged_in'][0]->user_id;?>;
          var sent_to=$(this).attr('d-fnd');
          var elem=$(this);
          //swal("Friend Id: "+sent_to);
          // var sent_to=<?=$this->uri->segment(2);?>;
          $.ajax({
            url:'<?=base_url('APIController/sendRequest')?>',
          type:"post",
          data:{sent_by:sent_by,sent_to:sent_to},
          success:function(response){
            response=JSON.parse(response);
              if(response.code==1){
                swal("Friend Request Sent.");
                $('#action_area').load(document.URL +  ' #action_area');
                //elem.text('Friend Request Sent');
              }
            }
          });
        });
        $(document).on('click','#deleteReq',function(){
          // var sent_by=<?=$_SESSION['logged_in'][0]->user_id;?>;
          var req=$(this).attr('d-act');
            var sent_to=$(this).attr('d-frnd');
          var elem=$(this);
          //swal("Friend Id: "+sent_to);
          // var sent_to=<?=$this->uri->segment(2);?>;
          $.ajax({
            url:'<?=base_url('APIController/deleteRequest')?>',
          type:"post",
          data:{req:req,sent_to:sent_to},
          success:function(response){
            response=JSON.parse(response);
              if(response.code==1){
                swal("Request Deleted.");
                $('#action_area').load(document.URL +  ' #action_area');
                //elem.text('Add Friend');
              }
            }
          });
        });


        
      </script>
      <?php
        if($myId==1){
          ?>
            <form class="edit-phto pointer">
              <i class="fa fa-camera-retro upload-button"></i>
              <label class="fileContainer pointer">
                Edit Cover Photo
              <input type="file" class="file-upload d-none" name="" >
              </label>
            </form>
          <?php
        }
      ?>
        
    </div>
 </section>
<section class="container-fluid bg-white"> 
  <div class="container">
  <div class="row">
    <div class="col-md-3 pr-0">
      <div class="mar_t110 usr_proImg">
    <?php
    if(empty($Myprofilepic))
      {
        ?>
         <img src="<?=base_url()?>assets/uploads/images/<?=$MyDetails[0]->profile_picture?>" alt="profile image" onerror="this.src='<?=base_url()?>assets/uploads/images/default.png';" class="profile-pic img-fluid">
     <?php
     }
      else
      {?>
        <a class="" target="_blank" href="<?=base_url('Post/viewPost/').$Myprofilepic[0]->post_id?>" target="blank">
            <img src="<?=base_url()?>assets/uploads/images/<?=$MyDetails[0]->profile_picture?>" alt="profile image" onerror="this.src='<?=base_url()?>assets/uploads/images/default.png';" class="profile-pic img-fluid">
        </a>
     <?php
     }
      ?>
       
      </div>
      <?php
        if($myId==1){
          ?>
            <div class="p-image pointer">
              <i class="fa fa-camera upload-buttons"></i>
                <input class="profile-upload" type="file" accept="image/*"/>
            </div>
          <?php
        }
      ?>
        
      
    </div>
    <div class="col-md-9 p-1">

      <div class="timeline-info">
        <ul class="d-flex list-unstyled m-0">
          <li class="admin-name">
            <h5><?=$MyDetails[0]->full_name?></h5>
          
          </li>
          <li>
            <?php
            if($MyDetails[0]->user_id!=$_SESSION['logged_in'][0]->user_id){
              ?>
                <a class="m_timeline" href="<?=base_url('Profile/').$MyDetails[0]->user_id?>" title="" data-ripple="">Timeline</a>
                <a class="m_photos" href="<?=base_url('Gallery/').$MyDetails[0]->user_id?>" title="" data-ripple="">Photos</a>
                <!-- <a class="m_videos" href="<?=base_url('Gallery/').$MyDetails[0]->user_id?>" title="" data-ripple="">Videos</a> -->
                <a class="m_friends" href="<?=base_url('Friends/').$MyDetails[0]->user_id?>" title="" data-ripple="">Friends</a>
                <a class="m_about" href="<?=base_url('About/').$MyDetails[0]->user_id?>" title="" data-ripple="">About</a>
                <!-- <a class="" href="groups.html" title="" data-ripple="">Groups</a> -->
                <!-- <a class="" href="about.html" title="" data-ripple="">about</a> -->
                <!-- <a class="active" href="#" title="" data-ripple="">more</a> -->
              <?php
            }else{
              ?>
              <a class="m_timeline" href="<?=base_url('Profile')?>" title="" data-ripple="">Timeline</a>
               
              <a class="m_photos" href="<?=base_url('Gallery')?>" title="" data-ripple="">Photos</a>
              <!-- <a class="m_videos" href="<?=base_url('Gallery')?>" title="" data-ripple="">Videos</a>  -->
              <a class="m_friends" href="<?=base_url('Friends')?>" title="" data-ripple="">Friends</a>
              <a class="m_about" href="<?=base_url('About')?>" title="" data-ripple="">About</a>
              <?php
            }
            ?>
            
          </li>
        </ul>
      </div>
    </div>  
  </div>
</div>
</section>
<script type="text/javascript">
  $(document).ready(function() {
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.cover-pic').attr('src', e.target.result);
            }
            var files=input.files[0];
            var myFormData = new FormData();
            myFormData.append('files', files);
            $.ajax({
            url:"<?=base_url('APIController/changecoverpic')?>",
            type:"post",
            cache: false,
              contentType: false,
              processData: false,
              data : myFormData,
              success: function(response){
              response=JSON.parse(response);
              if(response.status==1){
                //alert(response.msg);
                location.reload();
               }
            }
          });
           reader.readAsDataURL(input.files[0]);
       
        }
    }
      
    $(".file-upload").on('change', function(){
        readURL(this);
    });
    
    $(".upload-button").on('click', function() {
       $(".file-upload").click();
    });
});
</script>
<script type="text/javascript">
  $(document).ready(function() {
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.profile-pic').attr('src', e.target.result);
            }
            var files=input.files[0];
            var myFormData = new FormData();
            myFormData.append('files', files);
            $.ajax({
            url:"<?=base_url('APIController/changeprofilepic')?>",
            type:"post",
            cache: false,
              contentType: false,
              processData: false,
              data : myFormData,
              success: function(response){ 
              response=JSON.parse(response);
              if(response.status==1){
                //alert(response.msg);
                 location.reload();
               }
            }
          });
           reader.readAsDataURL(input.files[0]);
       
        }
    }
      
    $(".profile-upload").on('change', function(){
        readURL(this);
    });
    
    $(".upload-buttons").on('click', function() {
       $(".profile-upload").click();
    });
});
</script>