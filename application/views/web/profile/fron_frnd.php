

<!------------main _container------>
<style type="text/css">
  .activi{
    text-decoration: none !important;
  }
  .activi:hover{
    color: orange;
  }
</style>
<section class="container">
  <div class="row">
  
    <div class="col-md-12">
        
        <nav>
          <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
              <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Friends</a>
              <!-- <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-active" role="tab" aria-controls="nav-profile" aria-selected="false">Pending Requests</a> -->
            <!--   <a class="nav-item nav-link" id="nav-profile-photo" data-toggle="tab" href="#nav-photos" role="tab" aria-controls="nav-profile" aria-selected="false">Photos</a> -->
          </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active pt-4" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="row">
              <?php
              // print_r(count($MyFriends));
              foreach ($MyFriends as $Friend) {
                # code...
                ?>
                  <div class="col-md-4">
                    <div class="">
                      <img src="<?=base_url()?>assets/img/Cover_Photo/<?=$Friend->cover_photo?>" class="img-fluid w-100" onerror="this.src='<?=base_url()?>assets/img/Cover_Photo/default.jpg';" height="130px">
                    </div>
               
                      <div class="d-flex height65">
                        <div class="col-md-4 pr-0 mt-n4">
                          <img src="<?=base_url()?>assets/img/Profile_Pic/<?=$Friend->profile_picture?>" onerror="this.src='<?=base_url()?>assets/img/Profile_Pic/default.png';" class="img_bordr rounded-circle img-fluid">
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
          </div>
         
        </div>
    </div>
    <!-- end center panel -->
 
  
  </div>
</section>
<script type="text/javascript">
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