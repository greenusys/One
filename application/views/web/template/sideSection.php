
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
    <!-------------activity  start---->
    <div class="col-md-3 p-0 mar_t100">
      <div class="card ">
        <div class="p-3">
          <h4 class="widget-title">Recent Activity</h4>
        </div>
        <div class="card-body ">
          <div class="">
            <ul class="list-unstyled">
              <?php
                foreach ($FriendsActivity as $activity) {
                  # code...
                  ?>
                    <li><a href="<?=base_url('Profile/').$activity->user_id?>" class="activi"><strong><?=$activity->full_name?></strong> <small><?=$activity->activity_?></small></a></li>
                  <?php
                }
              ?>
              
              <!-- <li><span><i class="far fa-sticky-note"></i>   </span><strong>Deepak</strong> <small>update his picture</small></li>
              <li><span><i class="fas fa-pen-alt"></i>  </span><strong>Rahul</strong> <small>update his picture</small></li>
              <li><span><i class="fas fa-edit"></i>  </span><strong>Umesh</strong> <small>update his picture</small></li> -->
            </ul>
          </div>
          <div class="text-center">
            <a href="<?=base_url()?>Test/ActivityLogs"> <span>See More <i class="fas fa-angle-double-down"></i></span></a>
          </div>
        </div>
      </div>
      <div class="card mt-3">
        <div class="p-3">
          <h4 class="widget-title">Who to follow?</h4>
        </div>
        <div class="card-body">
          <ul class="list-unstyled">
            <?php
              // print_r($RandomPeople);
             
              foreach ($RandomPeople as $user) {
                $nameArrI=explode(" ",$user->full_name);
                ?>
                  <li class="row folow_rw ">
                    <div class="col-md-3 pt-1">
                      <a href="<?=base_url('Profile/').$user->user_id?>">
                        <img class="rounded-circle " src="<?=base_url()?>assets/img/Profile_Pic/<?=$user->profile_picture?>" onerror="this.src='<?=base_url()?>assets/img/Profile_Pic/default.png';" width="40px" height="40px">
                      </a>
                    </div>
                    <div class="col-md-9 p-0">
                      <span class=" author"><?=$user->full_name?></span>
                      <div class="">
                        <label class="randflow"><small class="text-white">Follow</small></label> 
                        
                      </div>
                    </div>
                  </li>
                <?php
              }
            ?>
          </ul>
          <div class="text-center">
             <a href="<?=base_url()?>test/SuggestionFriends" ><span>See More <i class="fas fa-angle-double-down"></i></span></a>
          </div>
        </div>
      </div>
      <div class="card mt-3">
          <div class="p-3">
            <h4 class="widget-title">Page Feed</h4>
          </div>
        <div class="card-body">
           <div class="row page_st">
              <?php
               // print_r($AllPosts);
               // die;
              if(count($AllPosts)>0){
                foreach ($AllPosts as $post) {
                  # code...
               //    print_r($post);
               // die;
                  if($post['post_type']==1){
                    ?>
                    <a href="<?=base_url('Post/viewPost/').$post['post_id']?>">
                      <div class="col-md-4 mt-2 px-1">
                        <img src="assets/uploads/images/<?=$post['post_files']?>" class="">
                      </div>
                    </a>
                    <?php
                  }else if($post['post_type']==2){
                    ?>
                    <a href="<?=base_url('Post/viewPost/').$post['post_id']?>">
                      <div class="col-md-4 mt-2 px-1">
                        <video  width="60" >
                          <source src="<?=base_url()?>assets/uploads/videos/<?=$post['post_files']?>" type="video/mp4">
                         
                          Your browser does not support the video tag.
                        </video>
                      </div>
                    </a>
                    <?php
                  }
                }
              }
              ?>
              
            </div>
        </div>
      </div>
    </div>
    <!-------------activity end---->