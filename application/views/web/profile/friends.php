<style>

.gallery-title
{
    font-size: 36px;
    color: #42B32F;
    text-align: center;
    font-weight: 500;
    margin-bottom: 70px;
}
.gallery-title:after {
    content: "";
    position: absolute;
    width: 7.5%;
    left: 46.5%;
    height: 45px;
    border-bottom: 1px solid #5e5e5e;
}
.filter-button
{

  font-weight: 600;
  box-shadow: none;
  border-radius: 5px;
  text-align: center;
 

}
.filter-button:hover
{
 
  outline: none;
  font-weight: 600;
  color: #ff441a;

}
.btn-default:active .filter-button:active
{
   color: #ff441a;
}

.port-image
{
    width: 100%;
}

.gallery_product
{
    margin-bottom: 30px;
}
.gallery_product img
{
    width: 100%;
}
 .btn:focus {
    outline: 0;
     box-shadow: none !important;
}
.col_orng{
  color: #ff441a;
}
</style>
<script type="text/javascript">
  $(document).ready(function(){
    $(".m_friends").addClass("active");
  })
</script>
    <!-- center panel -->
    <div class="col-md-9">
         <div class=" mt-4 ">
          <div class="w-100">
            <!-- <button class="btn btn-default filter-button" data-filter="all">All</button> -->
            <div class="row px-3 py-2 m-0 bg-white">
                <div class="col-md-2 p-2">
                    <h5 class="m-0 font-weight-bold"> Friends ( <?=count($MyFriends)?> )</h5>
                </div>
                 
                <div class="col-md-4">
                  <div class="mt-1">
                    <form class="form-inline "> 
                        <input type="search" placeholder="Search" name="" id="search-frnd">
                    </form>
                  </div>
                </div>

                <div class="col-md-6 d-flex">

                  <button class="btn btn-default col_orng filter-button" data-filter="friends">Friends</button>
                    <?php
                      $_SESSION['logged_in'][0]->user_id
                    ?>
                    <?php
                    if($myId==1){
                      ?>
                        <button class="ml-2 btn btn-default filter-button" data-filter="requests">Requests</button>
                      <?php
                    }
                  ?>
                  <button class="btn btn-default  filter-button" data-filter="followers">Followers</button>
                  <button class="btn btn-default  filter-button" data-filter="followings">Followings</button>
                </div>
            </div>
           
         <!--    <button class="btn btn-default filter-button" data-filter="spray">Spray Nozzle</button>
            <button class="btn btn-default filter-button" data-filter="irrigation">Irrigation Pipes</button>    -->
        </div>
        <br/>


          <div class="card p-3">
           <div class="row filter friends m-0">
              <?php
              // print_r(count($MyFriends));
              foreach ($MyFriends as $Friend) {
                # code...
                ?>
                  <div class="col-md-4 ">
                    <div class="">
                      <img src="<?=base_url()?>assets/uploads/images/<?=$Friend->cover_photo?>" class="height65 img-fluid w-100" onerror="this.src='<?=base_url()?>assets/uploads/images/default.jpg';">
                    </div>
               
                      <div class="d-flex height65">
                        <div class="col-md-4 pr-0 mt-n4">
                          <img src="<?=base_url()?>assets/uploads/images/<?=$Friend->profile_picture?>" onerror="this.src='<?=base_url()?>assets/uploads/images/default.png';" class="img_bordr rounded-circle img-fluid">
                        </div>
                        <div class="col-md-8 p-1">
                            <a href="<?=base_url('Profile/').$Friend->user_id?>"><h6><?=$Friend->full_name?></h6></a>
                        </div>
                      </div>
                      <hr>
                  </div>
                <?php
              }
              ?>

            </div>
             <div class="row filter requests m-0" style="display: none">
                <?php
                foreach ($FriendRequests as $reqFr) {
                  # code...
                 //  print_r($reqFr);

                  ?>
                    <div class="col-md-4">
                      <div class="">
                        <img src="<?=base_url()?>assets/uploads/images/<?=$reqFr->cover_photo?>" class="height65 img-fluid w-100" onerror="this.src='<?=base_url()?>assets/img/Cover_Photo/default.jpg';">
                      </div>
                 
                        <div class="d-flex ">
                          <div class="col-md-4 pr-0 mt-n4">
                            <img src="<?=base_url()?>assets/uploads/images/<?=$reqFr->profile_picture?>" class="img_bordr rounded-circle img-fluid" onerror="this.src='<?=base_url()?>assets/img/Cover_Photo/default.jpg';">
                          </div>
                          <div class="col-md-8 p-1">
                              <a href="<?=base_url('Profile/'.$reqFr->sent_by)?>"><h6><?=$reqFr->full_name?></h6></a>
                          </div>
                        </div>
                        <div class="d-flex mt-3 justify-content-center">
                           <a class="btn btn_pad btn-success text-white accept-request" req="<?=$reqFr->req_id?>" action="1">Confirm</a>
                            <a class="ml-2 btn_pad btn btn-primary text-white delete-request" req="<?=$reqFr->req_id?>" action="0">Delete</a >
                        </div>
                        <hr>
                    </div>
                  <?php
                }
              ?>

            </div>
                       <div class="row filter followers m-0" style="display: none">
                <?php
                foreach ($MyFollowers as $followers) {
                  # code...
                  // print_r($followers);

                  ?>
                    <div class="col-md-4">
                      <div class="">
                        <img src="<?=base_url()?>assets/uploads/images/<?=$followers->cover_photo?>" class="height65 img-fluid w-100" onerror="this.src='<?=base_url()?>assets/img/Cover_Photo/default.jpg';">
                      </div>
                 
                        <div class="d-flex ">
                          <div class="col-md-4 pr-0 mt-n4">
                            <img src="<?=base_url()?>assets/uploads/images/<?=$followers->profile_picture?>" class="img_bordr rounded-circle img-fluid" onerror="this.src='<?=base_url()?>assets/img/Cover_Photo/default.jpg';">
                          </div>
                          <div class="col-md-8 p-1">
                              <a href="<?=base_url('Profile/'.$followers->follow_by)?>"><h6><?=$followers->full_name?></h6></a>
                          </div>
                        </div>
                      
                        <hr>
                    </div>
                  <?php
                }
              ?>

            </div>
                       <div class="row filter followings m-0" style="display: none">
                <?php
                foreach ($MyFollowings as $followings) {
                  # code...
                  // print_r($followings);

                  ?>
                    <div class="col-md-4">
                      <div class="">
                        <img src="<?=base_url()?>assets/uploads/images/<?=$followings->cover_photo?>" class="height65 img-fluid w-100" onerror="this.src='<?=base_url()?>assets/img/Cover_Photo/default.jpg';">
                      </div>
                 
                        <div class="d-flex ">
                          <div class="col-md-4 pr-0 mt-n4">
                            <img src="<?=base_url()?>assets/uploads/images/<?=$followings->profile_picture?>" class="img_bordr rounded-circle img-fluid" onerror="this.src='<?=base_url()?>assets/img/Cover_Photo/default.jpg';">
                          </div>
                          <div class="col-md-8 p-1">
                              <a href="<?=base_url('Profile/'.$followings->follow_to)?>"><h6><?=$followings->full_name?></h6></a>
                          </div>
                        </div>
                       
                        <hr>
                    </div>
                  <?php
                }
              ?>

            </div>
          </div>
        </div>
<script type="text/javascript">
  $(document).ready(function(){

    $(".filter-button").click(function(){
      $(".filter-button").removeClass("col_orng");
        $(this).addClass("col_orng");
        var value = $(this).attr('data-filter');
        
        if(value == "all")
        {
            //$('.filter').removeClass('hidden');
            $('.filter').show('1000');
        }
        else
        {
//            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
//            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
            $(".filter").not('.'+value).hide('3000');
            $('.filter').filter('.'+value).show('3000');
            
        }
    });
    
    if ($(".filter-button").removeClass("active")) {
$(this).removeClass("active");
}
$(this).addClass("active");

});
</script>


        <!------------nav start---------------->
     
    </div>
    <!-- end center panel -->
 
  
  </div>
</section>
<script type="text/javascript">
 
  $(document).on('click','.delete-request',function(){
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
              }
    });
  });
</script>