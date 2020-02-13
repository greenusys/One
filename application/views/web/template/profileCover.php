<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/friends.css')?>">
<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/gallery.css')?>">
<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/profile.css')?>">
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
    z-index: 22;
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
      background: #ff441a;
    padding: 10px;
    border-radius: 5px;
    font-weight: 600;
}
</style>
<section class="container-fluid mt-5" id="action_area">
  <div class="feature-photo">
  <div class="row">
    <img src="<?=base_url()?>assets/img/Cover_Photo/<?=$MyDetails[0]->cover_photo?>" onerror="this.src='<?=base_url()?>assets/img/Cover_Photo/default.jpg';" alt="cover image" class="cover-pic img-fluid w-100" style="height: 350px">
  </div>
 
      <div class="add-btn " >
        <span class="flw_btn_cover "><?=count($MyFollowers)?> Followers</span>
        <?php
        // echo 'My Id: '.$myId.' | Cancel Friend : '.$cancelFriend;
          if($myId==0 && $cancelFriend == 1){
            echo '<a href="#" title="" class="ml-2 " style="padding:10px !important" data-ripple="">Cancel Friend</a>';
            
          }else if($myId==0 && $cancelFriend == 0){
            if(count($ReqStatus)>0){
            //  print_r($ReqStatus[0]['req_id']);
             echo '<a href="javascript:void(0)" title="" style="padding:10px !important" class=" btn btn-success" id="deleteReq" data-ripple="" d-act="'.$ReqStatus[0]['req_id'].'">Friend Request Sent</a>';
            }else{
              echo '<a href="javascript:void(0)" title="" style="padding:10px !important" class="sendFriendRequest" data-ripple="" id="sendReq" d-fnd="'.$user_id.'">Add Friend</a>';
            }
            
          }

        ?>
        
        
      </div>
 
      <script>
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
          var elem=$(this);
          //swal("Friend Id: "+sent_to);
          // var sent_to=<?=$this->uri->segment(2);?>;
          $.ajax({
            url:'<?=base_url('APIController/deleteRequest')?>',
          type:"post",
          data:{req:req},
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
            <form class="edit-phto">
              <i class="fa fa-camera-retro upload-button"></i>
              <label class="fileContainer">
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
        <img src="<?=base_url()?>assets/img/Profile_Pic/<?=$MyDetails[0]->profile_picture?>" alt="profile image" onerror="this.src='<?=base_url()?>assets/img/Profile_Pic/default.png';" class="profile-pic img-fluid">
      </div>
      <?php
        if($myId==1){
          ?>
            <div class="p-image">
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
                <a class="" href="<?=base_url('Profile/').$MyDetails[0]->user_id?>" title="" data-ripple="">Timeline</a>
                <a class="" href="<?=base_url('Gallery/').$MyDetails[0]->user_id?>" title="" data-ripple="">Photos</a>
                <a class="" href="<?=base_url('Gallery/').$MyDetails[0]->user_id?>" title="" data-ripple="">Videos</a>
                <a class="" href="<?=base_url('Friends/').$MyDetails[0]->user_id?>" title="" data-ripple="">Friends</a>
                <a class="" href="<?=base_url('About/').$MyDetails[0]->user_id?>" title="" data-ripple="">About</a>
                <!-- <a class="" href="groups.html" title="" data-ripple="">Groups</a> -->
                <!-- <a class="" href="about.html" title="" data-ripple="">about</a> -->
                <!-- <a class="active" href="#" title="" data-ripple="">more</a> -->
              <?php
            }else{
              ?>
              <a class="" href="<?=base_url('Profile')?>" title="" data-ripple="">Timeline</a>
               <a class="" href="<?=base_url('About')?>" title="" data-ripple="">About</a>
              <a class="" href="<?=base_url('Gallery')?>" title="" data-ripple="">Photos</a>
              <a class="" href="<?=base_url('Gallery')?>" title="" data-ripple="">Videos</a> 
              <a class="" href="<?=base_url('Friends')?>" title="" data-ripple="">Friends</a>
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