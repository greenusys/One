  <?php 
//print_r($_SESSION['logged_in']); 
   $session=$this->session->userdata('logged_in');
      $user_bio=$session[0]->bio_graphy;
    

      function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}
  ?>
<style>
    .randflow:hover{
        cursor:pointer;
        background:#ffbc00;
    }
</style>
  <script>
  $(document).ready(function() {
    $('.home').addClass('active');
  });
  $(document).on('click','.follow_user_',function(){
      var full_name=$(this).attr('d-name');
      swal("Good job!", "Now you follow "+full_name, "success");
      $("#folllw").load(" #folllw > *");
  });
</script>
<script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <script src="https://files.codepedia.info/files/uploads/iScripts/html2canvas.js"></script>
  <style type="text/css">

  </style>


<div class="container mt-5">
  <div class="row">
    <!-- left sidepanel -->
    <div class="col-md-3  pt-4 bgdefault">
      <div class="card head text-center  bg-white ">
        <div class="usr_back back_cover">
          <figure class="profile-banner-small">
              <!-- <a href="profile.html"> -->
                  <img src="<?=base_url()?>assets/uploads/images/<?=$MyDetails[0]->cover_photo?>" class="w-100 " onerror="this.src='<?=base_url()?>assets/uploads/images/default.jpg';"> 

              <!-- </a> -->
            <!-- <img src="<?=base_url()?>assets/uploads/images/<?=$MyDetails[0]->cover_photo?>"  class="w-100 "> -->
         </figure>
        </div>
        <div class="usr_pro"><img class="img img-fluid w-50" src="<?=base_url()?>assets/uploads/images/<?=$MyDetails[0]->profile_picture?>" onerror="this.src='<?=base_url()?>assets/uploads/images/default.png';" style="border-radius: 50%;height: 124px;width: 124px !important;"></div>
        <h6 class="mt-80 author"> <?=$MyDetails[0]->full_name?></h6>
        
        <small class="profile-desc"><?=$user_bio?></small>
        <hr>
        <ul class="ml-4 mt-4 list-unstyled text-left colblack">
          <li class="row">
             <!-- <i class="fa fa-users ranUse  mt-3 col-md-1" aria-hidden="true"></i><a class=" menu_botttom col-md-9" href="<?=base_url('Friends/getFrnd/')?>">Friends</a> -->
          </li>
          <li class="row">

            <!--<i class="fa fa-user-plus ranUse mt-3 col-md-1" aria-hidden="true"></i><a class=" menu_botttom col-md-9" href="<?=base_url()?>test/SuggestionFriends">Find Friend</a>-->
          </li>
          <li class="row">
            <i class="fa fa-star ranUse mt-3 col-md-1" aria-hidden="true"></i><a class=" menu_botttom col-md-9" href="<?=base_url('Test/favourite')?>">Favourites</a>
          </li>
          <li class="row">
             <i class="fa fa-bookmark ranUse mt-3 col-md-1" aria-hidden="true"></i><a class=" menu_botttom col-md-9" href="#"  data-toggle="modal" data-target="#addJobsModal">Post Job</a>
          </li>
          <!-- <li class="row">
             <i class="fa fa-bookmark ranUse mt-3 col-md-1" aria-hidden="true"></i><a class=" menu_botttom col-md-9" href="#">Bookmark</a>
          </li> -->
          <li class="row">
             <i class="fa fa-users ranUse mt-3 col-md-1" aria-hidden="true"></i><a class=" menu_botttom col-md-9" href="<?=base_url('Test/group')?>">Group</a>
          </li>
    <!--       <li class="row" >
             <i class="fa fa-users ranUse mt-3 col-md-1" aria-hidden="true"></i><a class=" menu_botttom col-md-9" href="<?=base_url('Test/group')?>">Add Jobs</a>
          </li> -->

           <li class="row">
            <i class="fa fa-file-text ranUse mt-3 col-md-1" aria-hidden="true"></i>
            <a href="#other-fruits" id="pages_s_" class="nav-link w-100 menu_botttom col-md-9" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="other-fruits">
               Page
               <span class="float-right"><i class="fas fa-angle-down "></i></span>
              </a>

              <ul id="other-fruits" class="flex-column collapse">
                <li class="nav-item">
                  <a href="<?=base_url('Test/page')?>" class="nav-link"> 
                     <i class="fa fa-pencil" aria-hidden="true"></i> 
                     Create Page
                  </a>
                </li>
                <li class="nav-item ">
                  <a href="#" class="nav-link">
                     <i class="fa fa-pencil" aria-hidden="true"></i> 
                     View Page
                  </a>
                </li>
              </ul> 
          </li>
              <!-- /Sub Nav -->
             <!-- <i class="fa fa-file-text ranUse mt-3 col-md-1" aria-hidden="true"></i><a class=" menu_botttom col-md-9" href="<?=base_url('Test/page')?>">Page</a> -->
          <!-- </li> -->
        <!--     <li class="row">
             <i class="fa fa-calendar ranUse mt-3 col-md-1" aria-hidden="true"></i><a class=" menu_botttom col-md-9" href="#">Events</a>
          </li>
          <li class="row">
             <i class="fa fa-sun ranUse mt-3 col-md-1" aria-hidden="true"></i><a class=" menu_botttom col-md-9" href="#">Weather</a>
          </li> -->
        </ul>
      </div>

      <div class="card mt-3">
        <!--   <div class="p-3">
            <h4 class="widget-title">Weather</h4>
          </div> -->
        <div class="card-body p-0">
          <div class="m-0 ">
            <div class="bg-color py-4">
             <div class="d-flex  px-4 text-white p-2">
                  <div class="">
                    <span class="text-white font32" ><span class="current_temp"></span><sup class="temp_we">o</sup>C</span>
                  </div>
                    <div class="m-2">
                      <span class="high_temp"></span><sup>o</sup>C <sub>H</sub><br>
                      <span class="low_temp"></span><sup>o</sup>C <sub>L</sub>
                    </div>
                    <div class="text-right  ml-4">
                      <img src="" class="w-100 temp_icon">
                    </div>
              </div>
              <div class=" px-4 text-center m-auto">
                 
                     <h5 class="text-white mt-3 temp_desc" ></h5>
                
              </div>
                <div class="d-flex  px-4 justify-content-center">
                    <div  class="">
                     <span class="text-white font_12">Humadity: <span class="humadity">67</span><sup>o</sup></span>
                    </div>
                    <div class="ml-3">
                      <span class="text-white font_12">Chance Of Rain: <span class="rain_chance">49</span>%</span>
                    </div>
                </div>
                <div class="mt-3 mb-3" style="background: #2486eab3">
                    <div class="">
                        <ul  class="forecast-container list-unstyled days_wea m-0 d-flex text-white justify-content-center">
                          
                          
                        </ul>
                    </div>
                </div>
                <div class="text-center text-white">
                  <h5 class="mb-0 "><?=date('l, F d')?><sup>th</sup></h5>
                  <span class="font_12 city_name"></span>
                </div>

            </div>
          </div>  
        </div>
      </div>

      <!-- id="w_t_follow" -->
      <div class="card mt-3" id="folllw">
        <div class="p-3">
          <h4 class="widget-title">Whom to follow?</h4>
        </div>
        <div class="card-body p-0">
          <ul class="list-unstyled">
             <?php
              // print_r($RandomPeople);
             
              foreach ($RandomPeople as $user) {
                $nameArrI=explode(" ",$user->full_name);
                ?>
                 <li class="row mx-0 folow_rw ">
                    <div class="col-md-3 pt-1">
                      <a href="<?=base_url('Profile/').$user->user_id?>">
                        <img class="rounded-circle " src="<?=base_url()?>assets/uploads/images/<?=$user->profile_picture?>" onerror="this.src='<?=base_url()?>assets/uploads/images/default.png';" width="40px" height="40px">
                      </a>
                    </div>
                    <div class="col-md-9 p-0">
                      <span class=" author"><?=$user->full_name?></span>
                      <div class="">
                        <a href="javascript:void(0)" d-id="<?=$user->user_id?>" d-name="<?=$user->full_name?>" class="follow_user_"><label class="randflow"><small class="text-white">Follow</small></label></a> 
                        
                      </div>
                    </div>
                  </li>
                <?php
              }
            ?>
          </ul>
        </div>
      </div>
    </div>
    <!-- End left sidepanel -->
    <!-- center panel -->
    <div class="col-md-6">
       <div class="card rounded mt-4">
        <div class="card-body">
          <div class="MultiCarousel float-left px-2" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
            <div class="MultiCarousel-inner float-left">
              <a href="javascript:void(0)" id="addStatus">
                <div class="item">
                    <div class="pad15">
                      <?php
                      $i=1;
                        foreach($myStatus as $status){
                         $nameArr=explode(" ",$status->full_name);
                         $statusFiles=explode(",",$status->story_files);
                    // print_r($statusFiles);
                          if($status->story_type==1 && $i==1){
                          ?><a href="javascript:void(0)" d-By="<?=$status->full_name?>" d-Gen="<?=$status->user_id?>"  d-img="<?=$status->story_files?>" class="my_status">
                            <div class="item">
                                <div class="pad15">
                                  <img class="rounded-circle stry_img" src="<?=base_url('assets/stories/images/').$statusFiles[0]?>">
                                       <h6><?=$nameArr[0]?></h6>
                                </div>
                            </div>
                          </a>
                          <?php
                          }
                          $i++;
                        }
                      ?>
                      
                             
                    </div>
                </div>
              </a>
                <?php
                // print_r($FriendsStatus);
                // die;
                if($FriendsStatus!=false){
                  foreach ($FriendsStatus as $status) {
                    # code...
                    $nameArr=explode(" ",$status->full_name);
                    // print_r($nameArr);
                    if($status->story_type==1){
                    ?><a href="javascript:void(0)" d-By="<?=$status->full_name?>" d-Gen="<?=$status->user_id?>" class="usr_status">
                      <div class="item">
                          <div class="pad15">
                            <img class="rounded-circle stry_img" src="<?=base_url('assets/stories/images/').$status->story_files?>">
                                 <h6><?=$nameArr[0]?></h6>
                          </div>
                      </div>
                    </a>
                    <?php
                    }
                  }
                }
                ?>
            </div>
            <button class="btn btn-sm btn-primary leftLst"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
            <button class="btn btn-sm btn-primary rightLst  position-absolute"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
          </div>
        </div>
      </div>
      <div class="border border-2 bg-white rounded mt-4">
        <form class="chkpost" id="add_post"> 
    <!-- <textarea class="form-control border-0" name="about" placeholder="Share and Update..."></textarea> -->
         <div class="">
          <textarea id="emojionearea1" name="post"></textarea>        
        <!-- <label><span id="chars" class="lead">140</span></label> characters left -->
          <div class="d-flex">
          <i class="pl-2 fa fa-angle-left icontheme"></i>
          <ul class="d-flex list-unstyled px-3 bgimgs">
            <?php
              for($i=1; $i<=8; $i++){
                ?>
                   <li class="w-st">
                    <a href="javascript:void(0)" class="theme_">
                      <img class="w-100 border" src="<?=base_url('assets/webimg/theme/').$i.'.jpg'?>" />
                    </a>
                    
                  </li>
                <?php
              }
            ?>
        
          </ul>
          </div>
           <div id="divOutside" class="divOutside emoji-btn">
         </div>
            <div class="row mx-0 my-2 withs" style="display: none">
              <div class="col-md-2 pr-0 text-center bgdefault">  
                <label for="tags">With</label>
              </div>
              <div class="col-md-10 px-0">
               <!--  <input class="form-control" type="text" name="tag" id="tags"> -->
                <select class="js-example-basic-multiple" id="Tag_friends" name="friends[]" multiple="multiple">
                  <?php
                  foreach ($MyFriends as $frnds) {
                  ?>
                  <option value="<?=$frnds->user_id?>"><?=$frnds->full_name?></option>
                <?php } ?>
                </select>
              </div>
            </div>
          
            </div>
          <hr>
          <style>
           
          </style>
          <script type="text/javascript">
            window.onload = function(){
        
    //Check File API support
    if(window.File && window.FileList && window.FileReader)
    {
        var filesInput = document.getElementById("img_video");
        
        filesInput.addEventListener("change", function(event){
            
            var files = event.target.files; //FileList object
            var output = document.getElementById("result");
            
            for(var i = 0; i< files.length; i++)
            {
                var file = files[i];
                
                //Only pics
                // if(!file.type.match('image'))
                //   continue;
                
                var picReader = new FileReader();
                
                picReader.addEventListener("load",function(event){
                    
                    var picFile = event.target;
                    var checker = '<?=base_url()?>assets/img/default_video.png';
                    var div = document.createElement("div");
                    div.setAttribute("class","col-md-2 mt-2");
                    div.innerHTML = '<img class="thumbnail " height="80px" width="80px" onerror="this.onerror=null;this.src=\''+checker+'\';" src=\'' + picFile.result + '\'' +
                            '/>';
                    
                    output.insertBefore(div,null);            
                
                });
                
                 //Read the image
                picReader.readAsDataURL(file);
            }                               
           
        });
    }
    else
    {
        console.log("Your browser does not support File API");
    }
}
    
          </script>
          <div class="row mx-0 my-1 ">
            <div class="col-md-2 ">
              <div class="  text-center">
              <a class="text-dark tag_pht posttab text-decoration-none tagfriend " href="javascript:void(0)" title="Tag Friends"><i class="fas fa-user-plus"></i></a></div>
            </div>
            <div class="col-md-2 ">
              <div class="posttab text-center">
               <input type="file" id="img_video" class="d-none" name="files[]" multiple="">
               <label for="img_video" class=" text-dark tag_pht m-0" title="Add Photo/Videos"><i class="fas fa-camera"></i></label>
             </div>
            </div> 

            <div class=" col-md-4 mt-2 text-center">
                <input class="hidden-xs-up" id="cbx" type="checkbox" name="optradio" value="post"/>
                <label class="cbx" for="cbx"></label><label class="lbl" for="cbx"><i class="far fa-address-card"></i> News Feed</label>
            </div>
            <div class=" col-md-4 mt-2 text-center">
               <input class="hidden-xs-up" id="cbx2" type="checkbox" name="optradio" value="story" />
                <label class="cbx" for="cbx2"></label><label class="lbl" for="cbx2"> My Story</label>
            </div>
      <!--       <div class="col-md-3 posttab">
              <img class="img-fluid" src="<?=base_url('assets/webimg/emoji.png')?>"> Feelings
            </div>   -->
        <!--       <div class="col-md-2 text-center">
                <img class="img-fluid" src="<?=base_url('assets/webimg/dots.png')?>">
              </div>     -->  
          </div>
<!--           <div class="row mx-0 my-1">
            <div class="form-check col-md-6 pl-5 py-2">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input mt-3" name="optradio" value="post"><i class="far fa-address-card"></i>
                  News Feed
              </label>
            </div>
            <div class="form-check col-md-6 pl-5 py-2">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input mt-3" name="optradio" value="story"><img class="rounded-circle " src="<?=base_url()?>assets/uploads/images/<?=$MyDetails[0]->profile_picture?>" style="width: 40px;height: 40px"> Your Story
              </label>
            </div>
          </div> -->

            <output id="result" class="row m-0"  > </output>         
<div id="previewImage">
    </div>
          <div class="text-right pr-2">
             <input id="btn-Preview-Image"  class="btn btn-primary my-2 back_col border-0 px-4" type="submit" value="POST"/>
          </div>
        </form>
      </div>
	  <div class="" id="pst_shw_">
	  <?php
  //   print_r($AllPosts);
    if( count($AllPosts)>0){
        foreach($AllPosts as $p_ost){
        $post_user_id=$p_ost['user_id'];
       if($p_ost['post_type']==0){
         ?>
        <div class="card mt-4 p-2">
          <div class="card-header ">
            <div class="d-flex float-left">
             <div> 
              <a class="font-weight-bold" href="<?=base_url('Profile/'.$post_user_id)?>">
                 <img class="rounded-circle mr-2" src="<?=base_url()?>assets/uploads/images/<?=$p_ost['profile_pic']?>" width="40"  height="40">
               </a>
             </div>
            <div>
              <a class="font-weight-bold " href="<?=base_url('Profile/'.$post_user_id)?>">  
               <?=$p_ost['posted_by']?>
              </a>
              <br>
                <small>
                 <?php echo time_elapsed_string($p_ost['posted_on']);?>
                </small>
            </div>
           
           </div>
          <div class="float-right d-flex mt-2">
            <div class="">
               <?php
              $user_id;
              $post_id=$p_ost['post_id'];
              $this->db->where(array('user_id'=>$user_id,'post_id'=>$post_id));
              $re=$this->db->get('user_fav_section')->result();
              if(count($re)==0){
              ?>
                  <span class="favrt" post_id="<?=$p_ost['post_id']?>" title="favourite"><i class="far fa-star"></i></span>
              <?php
              }else{?>
                  <span class="favrt star" post_id="<?=$p_ost['post_id']?>" title="favourite"><i class="fas fa-star text-gold"></i></span>
              <?php }
              ?>
              <!-- <span><i class="fas fa-star"></i></span> -->
            </div>
            <?php if($_SESSION['logged_in'][0]->user_id==$p_ost['user_id']){ ?>
                <div class="dropdown ml-3">
                  <button class="dropbtn"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></button>
                  <div class="dropdown-content bg-white">
                    <a href="javascript:void(0)"  class="edit_post" p_d="<?=$p_ost['post_id']?>">Edit</a>
                    <a href="javascript:void(0)" class="dlt_post_" p_d="<?=$p_ost['post_id']?>" >Delete</a>
                    
                  </div>
                </div>
                <?php } ?>
          </div> 
                
          </div>
          <div class="card-body text-justify">
            <p>
            <?=$p_ost['post']?>
            </p>
          </div>
          <div class="my-2 p-0">
            <div class="row m-0 ">
            <div class="col-md-4 manage ">
              <div class="text-center px-3 py-1">
                <div class="btn-like d-flex" ><a href="javascript:void(0)" class="text-danger likePost" d-Post="<?=$p_ost['post_id']?>">
              <?php 

                if(count($p_ost['likes_data']) > 0){
                foreach ($p_ost['likes_data'] as $likedata) {
                 // print_r($likedata->profile_picture);
                  if($_SESSION['logged_in'][0]->user_id==$likedata->user_id){ ?>
                   <i class="fa fa-heart " aria-hidden="true"></i>
                 <?php   break;
                  }else{ ?>
                    <i class="fa fa-heart-o" aria-hidden="true"></i>
                 <?php }
                }
              }else{ ?>
                     <i class="fa fa-heart-o" aria-hidden="true"></i>
          <?php    }
              ?>
                  Like &nbsp;</a> 
                  <ul class="list-unstyled d-flex m-0">
                      <?php
                         $sno=1;
                        foreach ($p_ost['likes_data'] as $likedata) { 
                         
                            if($sno <= 5){
                            
                              if($sno==1){ ?>

                                   <li><img class="rounded-circle like_img " src="<?=base_url('assets/uploads/images/').$likedata->profile_picture?> "></li>

                          <?php }else{    ?>
                                <li><img class="rounded-circle like_img like_img_marg25" src="<?=base_url('assets/uploads/images/').$likedata->profile_picture?> "></li>
                     <?php  
                            }
                         }
                        $sno++;
                       }
                    ?>
                   <?php 
                     if(count($p_ost['likes_data']) > 0){ ?>
                         <li><div class=" like_cont likeValue rounded-circle like_img_marg25"> <?=$p_ost['total_likes']?></div></li>
                    <?php  
                        }else{ ?>
                            <li><div class=" like_cont likeValue rounded-circle "> <?=$p_ost['total_likes']?></div></li> 
                   <?php } ?>
                  </ul>
                </div> 
              </div>
            </div>
            <div class="col-md-4 manage px-3 py-1">
              <div class="btn-comment post-btns">
                <a href="<?=base_url('Post/viewPost/').$p_ost['post_id']?>"><i class="fa fa-comment-o" aria-hidden="true"></i> Comments</a> 
                <span class=""><?=count($p_ost['total_comments'])?></span>
              </div>
            </div>
            <div class="col-md-4 manage px-3 py-1">
              <div class="btn-share post-btns">
                <a href="javascript:void(0)" class="shareThisPost" d-ost="<?=$p_ost['post_id']?>"><i class="fa fa-share-square-o" aria-hidden="true"></i> Share</a>
                <span class=""><?=$p_ost['total_share']?></span>
              </div>
            </div>
            </div>
           
          </div>
          <hr>
           <div class=" comments_list border-top">
                <?php 
                if(count($p_ost['total_comments'])>0){
                ?>

                <?php for($i=0; $i < count($p_ost['total_comments']); $i++){ ?>

              <div class="row mt-2 px-2">
                  <div class="col-md-1">
                      <a href="<?=base_url('Profile/'.$p_ost['total_comments'][$i]->user_id)?>"> <img class="rounded-circle like_img" src="<?=base_url()?>assets/uploads/images/<?=$p_ost['total_comments'][$i]->profile_picture?>"></a>  
                  </div> 
                  <div class="col-md-10 comnt_text border-bottom">
                      <h6 class="font-weight-bold m-0" > <a href="<?=base_url('Profile/'.$p_ost['total_comments'][$i]->user_id)?>"><?=$p_ost['total_comments'][$i]->full_name?></a><small class="ml-3">
                         <?php echo time_elapsed_string($p_ost['total_comments'][$i]->commented_on)?></small></h6>
                      <p class=""><?=$p_ost['total_comments'][$i]->comment?></p>
                  </div>
                  <div class="col-md-1">
                      <?php
                       if(($_SESSION['logged_in'][0]->user_id==$p_ost['total_comments'][$i]->user_id) OR ($_SESSION['logged_in'][0]->user_id==$p_ost['user_id']) ){ ?>
                          <div class="dropdown">
                            <button class="dropbtn"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></button>
                            <div class="dropdown-content bg-white">
                            <?php  if($_SESSION['logged_in'][0]->user_id ==$p_ost['total_comments'][$i]->user_id ){   ?>
                              <a href="javascript:void(0)" class="edit_comment" c_d="<?=$p_ost['total_comments'][$i]->id?>">Edit</a>
                            <?php }  ?>
                              
                              <a href="javascript:void(0)" class="dlt_comnt_" c_d="<?=$p_ost['total_comments'][$i]->id?>">Delete</a>
                            </div>
                          </div>
                      <?php } ?>
                  </div>
              </div>
            <?php } 
          }?>
                <div class="p-2">
                 <div class="d-flex m-0">
                    <span> <img class="rounded-circle like_img" src="<?=base_url()?>assets/uploads/images/<?=$MyDetails[0]->profile_picture?>"></span>
                    <form method="POST" class="w-100 ad_cmnt" >
                      <div class="pl-2 w-100 _input">
                     <p class="lead emoji-picker-container">
                          <textarea class="input-field cmnt_" data-emojiable="true" type="text" name="comment"  placeholder="Add a Message">  </textarea>
                            <!-- <input type="text" class="form-control" name="comment" data-emojiable="true"> -->
                        </p> 

                              <input type="hidden" name="post_id" class="poster_class" value="<?=$post_id?>">
                      </div>
                      <!------contenteditable  data-text="Write a comment"------>
                     <!--  <div class="cmnt_icons">
                          <span title="Insert an emoji"> <i class="fa fa-smile-o" aria-hidden="true"></i>  </span> 
                           <label for="camera"><span title="Attach a photo or video"> <i class="fa fa-camera" aria-hidden="true"></i></span> </label>
                           <input type="file" id="camera" name="camera" class="d-none" >
                      </div> -->
                    </form>
                 </div>
                </div>
           
            </div>
          </div>
         <?php
       }else if($p_ost['post_type']==1){
         ?>
        <div class="card mt-4 p-2">
         <div class="card-header border-0">
            <div class="d-flex float-left">
             <div> 
              <a class="font-weight-bold" href="<?=base_url('Profile/'.$post_user_id)?>">
                 <img class="rounded-circle mr-2" src="<?=base_url()?>assets/uploads/images/<?=$p_ost['profile_pic']?>" width="40"  height="40">
               </a>
             </div>
            <div>
              <a class="font-weight-bold " href="<?=base_url('Profile/'.$post_user_id)?>">  
               <?=$p_ost['posted_by']?>
              </a>  <span style="color:#616770"><?=$p_ost['post_head']?></span>
              <br>
                <small>
                    <?php echo time_elapsed_string($p_ost['posted_on']);?>
                </small>
            </div>      
           </div>
              
                    <div class="float-right d-flex mt-2">
                      <div class="">  
                          <?php
                        $user_id;
                        $post_id=$p_ost['post_id'];
                        $this->db->where(array('user_id'=>$user_id,'post_id'=>$post_id));
                        $re=$this->db->get('user_fav_section')->result();
                        if(count($re)==0){
                        ?>
                        <span class="favrt" post_id="<?=$p_ost['post_id']?>" title="favourite"><i class="far fa-star"></i></span>
                        <?php
                        }else{?>
                        <span class="favrt star" post_id="<?=$p_ost['post_id']?>" title="favourite"><i class="fas fa-star text-gold"></i></span>
                        <?php }
                        ?>
                      </div>
                      <?php if($_SESSION['logged_in'][0]->user_id==$p_ost['user_id']){ ?>
                          <div class="dropdown ml-3">
                            <button class="dropbtn"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></button>
                            <div class="dropdown-content bg-white">
                              <a href="javascript:void(0)"  class="edit_post" p_d="<?=$p_ost['post_id']?>">Edit</a>
                              <a href="javascript:void(0)" class="dlt_post_" p_d=<?=$p_ost['post_id']?> >Delete</a>
                              
                            </div>
                          </div>
                      <?php } ?>
                    </div> 
                
             <!-- <a class="" href="#"><img class="img-fluid float-right pt-3" src="<?=base_url('assets/webimg/dots.png')?>"></a> -->
            
          <!--   <div class="titles mt-1">
            <p class="pl-2">CAA के विरोध के नाम पर विपक्ष भड़का रहा है उपद्रवियों को?</p>
            </div> -->
          </div>
          <div class="card-body pt-0 pb-0">
            <?php if($p_ost['post']){ ?>
                  <p>
                    <?=$p_ost['post']?>
                  </p>
           <?php  } ?>

           
            <?php
            $postimages=$p_ost['post_files'];
            $postimages=explode(',', $postimages);
              if(count($postimages)==2)
              {
              ?>
                <div class="post_img row">
                  <?php for ($i=0; $i < count($postimages); $i++) {
                    ?>
                  <div class="col-md-6 p-3">
                    <a class="" target="_blank" href="<?=base_url('Post/viewPost/').$p_ost['post_id']?>"><img class="img img-fluid rounded d-block post_image" src="<?=base_url()?>assets/uploads/images/<?=$postimages[$i]?>"></a>
                  </div>
                   <?php
                    }
                    ?>
                </div>
            <?php
            }
            elseif (count($postimages)==3) 
            {
              ?>
                <div class="post_img row">
                  <div class="col-md-12 p-3">
                    <a class="" target="_blank" href="<?=base_url('Post/viewPost/').$p_ost['post_id']?>"><img class="img img-fluid d-block post_image rounded" src="<?=base_url()?>assets/uploads/images/<?=$postimages[0]?>"></a>
                  </div>
                  <?php for ($i=1; $i < count($postimages); $i++) {
                    ?>
                   <div class="col-md-6 ">
                    <a class="" href="<?=base_url('Post/viewPost/').$p_ost['post_id']?>"><img class="img img-fluid d-block ext_img rounded" src="<?=base_url()?>assets/uploads/images/<?=$postimages[$i]?>"></a>
                  </div>
                   <?php
                    }
                    ?>
                </div>
            <?php
            }
            elseif (count($postimages)==4) 
            {
              ?>
                <div class="post_img row">
                  <?php for ($i=0; $i < count($postimages); $i++) {
                    ?>
                   <div class="col-md-6 pt-3">
                    <a class="" target="_blank" href="<?=base_url('Post/viewPost/').$p_ost['post_id']?>"><img class="img img-fluid d-block ext_img rounded" src="<?=base_url()?>assets/uploads/images/<?=$postimages[$i]?>"></a>
                  </div>
                   <?php
                    }
                    ?>
                </div>
            <?php
            }
            elseif (count($postimages)>4) 
            {
              ?>
                <div class="post_img row">
                  <?php for ($i=0; $i <3; $i++) {
                    ?>
                   <div class="col-md-6 pt-3">
                    <a class="" target="_blank" href="<?=base_url('Post/viewPost/').$p_ost['post_id']?>">
                      <img class="img img-fluid d-block ext_img rounded" src="<?=base_url()?>assets/uploads/images/<?=$postimages[$i]?>"></a>

                  </div>
                   <?php
                    }
                    ?>
                    <div class="col-md-6 p-2 text-center">
                    <a class="" href="<?=base_url('Post/viewPost/').$p_ost['post_id']?>">
                      <img class="img img-fluid d-block rounded post_image" src="<?=base_url()?>assets/uploads/images/<?=$postimages[4]?>">
                    </a>
                      <div class="position-absolute h-100 w-100 bg-dark " style="left: 0%;top:0px;padding-top: 8rem !important;opacity: 0.5">
                      </div>
                      <a class="position-absolute" href="<?=base_url('Post/viewPost/').$p_ost['post_id']?>" style="top:115px"> <h2 class="text-white"><strong><?=(count($postimages)-4)?>+</strong></h2></a>
                  </div>
                    
                </div>
            <?php
            }
            else
            {
              ?>
                <div class="post_img row">
                   <div class="col-md p-3">
                    <a class="d-flex justify-content-center" href="<?=base_url('Post/viewPost/').$p_ost['post_id']?>"><img class="img img-fluid d-block rounded" src="<?=base_url()?>assets/uploads/images/<?=$postimages[0]?>"></a>
                  </div>
                </div>
            <?php
            }
            ?>
            
          </div>
          
          <div class="my-2 p-0">
            <div class="d-flex text-center">
            <div class="col-md-4 manage ">
              <div class="text-center px-3 py-1">
                <div class="btn-like d-flex" ><a href="javascript:void(0)" class="text-danger likePost" d-Post="<?=$p_ost['post_id']?>">
              <?php 

                  if(count($p_ost['likes_data']) > 0){
                  foreach ($p_ost['likes_data'] as $likedata) {
                   // print_r($likedata->profile_picture);
                    if($_SESSION['logged_in'][0]->user_id==$likedata->user_id){ ?>
                     <i class="fa fa-heart " aria-hidden="true"></i>
                   <?php   break;
                    }else{ ?>
                      <i class="fa fa-heart-o" aria-hidden="true"></i>
                   <?php }
                  }
                }else{ ?>
                       <i class="fa fa-heart-o" aria-hidden="true"></i>
            <?php    }
                ?>
            Like &nbsp;</a> 
                  <ul class="list-unstyled d-flex m-0">
                    <?php

                         $sno=1;
                        foreach ($p_ost['likes_data'] as $likedata) { 
                         
                            if($sno <= 5){
                             
                              if($sno==1){ ?>
                                   <li><img class="rounded-circle like_img " src="<?=base_url('assets/uploads/images/').$likedata->profile_picture?> "></li>
                      <?php }else{    ?>
                            <li><img class="rounded-circle like_img like_img_marg25" src="<?=base_url('assets/uploads/images/').$likedata->profile_picture?> "></li>
                   <?php 
                            }
                         }
                        $sno++;
                       }
                    ?>
                    <?php 
                     if(count($p_ost['likes_data']) > 0){ ?>
                         <li><div class=" like_cont likeValue rounded-circle like_img_marg25"> <?=$p_ost['total_likes']?></div></li>
                    <?php  
                        }else{ ?>
                            <li><div class=" like_cont likeValue rounded-circle "> <?=$p_ost['total_likes']?></div></li> 
                   <?php } ?>
                   
                  </ul>
                </div>   
              </div>  
            </div>
            <div class="col-md-4 manage px-3 py-1">
              <div class="btn-comment post-btns">
                 <a class="" href="<?=base_url('Post/viewPost/').$p_ost['post_id']?>"><i class="fa fa-comment-o" aria-hidden="true"></i> Comments</a>
                <span class=""><?=count($p_ost['total_comments'])?></span>
              </div>
            </div>
            <div class="col-md-4 manage px-3 py-1">
              <div class="btn-share post-btns">
                <a href="javascript:void(0)" class="shareThisPost" d-ost="<?=$p_ost['post_id']?>"><i class="fa fa-share-square-o" aria-hidden="true"></i> Share</a>
                <span class=""><?=$p_ost['total_share']?></span>
              </div>
            </div>
            </div>
          </div>
          
           <div class=" comments_list border-top">
                <?php 
                //echo"hello";

                  //print_r($p_ost['total_comments']);
                if(count($p_ost['total_comments'])>0){
                ?>

                <?php for($i=0; $i < count($p_ost['total_comments']); $i++){ ?>
              <div class="row mt-2 px-2">
                  <div class="col-md-1">
                      <a href="<?=base_url('Profile/'.$p_ost['total_comments'][$i]->user_id)?>"><img class="rounded-circle like_img" src="<?=base_url()?>assets/uploads/images/<?=$p_ost['total_comments'][$i]->profile_picture?>"></a>  
                  </div>
                  <div class="col-md-10 comnt_text border-bottom">
                      <h6 class="font-weight-bold m-0" ><a href="<?=base_url('Profile/'.$p_ost['total_comments'][$i]->user_id)?>"> <?=$p_ost['total_comments'][$i]->full_name?></a><small class="ml-3">
                       <?php echo time_elapsed_string($p_ost['total_comments'][$i]->commented_on)?>
                      </small></h6>
                      <p class=""><?=$p_ost['total_comments'][$i]->comment?></p>
                  </div>
                  <div class="col-md-1">
                   <?php if(($_SESSION['logged_in'][0]->user_id==$p_ost['total_comments'][$i]->user_id) OR ($_SESSION['logged_in'][0]->user_id==$p_ost['user_id']) ){ ?>
                      <div class="dropdown">
                        <button class="dropbtn"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></button>
                        <div class="dropdown-content bg-white">
                             <?php  if($_SESSION['logged_in'][0]->user_id ==$p_ost['total_comments'][$i]->user_id ){   ?>
                                <a href="javascript:void(0)" class="edit_comment" c_d="<?=$p_ost['total_comments'][$i]->id?>">Edit</a>
                            <?php }  ?>
                          <a href="javascript:void(0)" class="dlt_comnt_" c_d="<?=$p_ost['total_comments'][$i]->id?>">Delete</a>
                          
                        </div>
                      </div>
                    <?php } ?>
                  </div>
              </div>
            <?php } 
          }?>
                <div class="p-2">
                 <div class="d-flex m-0">
                    <span> <img class="rounded-circle like_img" src="<?=base_url()?>assets/uploads/images/<?=$MyDetails[0]->profile_picture?>"></span>
                    <form method="POST" class="w-100 ad_cmnt" >
                      <div class="pl-2 w-100 _input">
                        <p class="lead emoji-picker-container">
                          <textarea class="input-field cmnt_" data-emojiable="true" type="text" name="comment"  placeholder="Add a Message">  </textarea>
                        </p>
                               <input type="hidden" name="post_id" class="poster_class" value="<?=$post_id?>">
                      </div>
                      <!------contenteditable  data-text="Write a comment"------>
                     <!--  <div class="cmnt_icons">
                          <span title="Insert an emoji"> <i class="fa fa-smile-o" aria-hidden="true"></i>  </span> 
                           <label for="camera"><span title="Attach a photo or video"> <i class="fa fa-camera" aria-hidden="true"></i></span> </label>
                           <input type="file" id="camera" name="camera" class="d-none" >
                      </div> -->
                    </form>
                 </div>
                </div>

            </div>
          </div>
         <?php
       }
       else if($p_ost['post_type']==3)
       {
        ?>
       <div class="card mt-4 p-2">
         <div class="card-header border-0">
            <div class="d-flex float-left">
             <div> 
              <a  class="font-weight-bold" href="<?=base_url('Profile/'.$post_user_id)?>">
                 <img class="rounded-circle mr-2" src="<?=base_url()?>assets/uploads/images/<?=$MyDetails[0]->profile_picture?>" width="40"  height="40">
               </a>
             </div>
            <div>
              <a class="font-weight-bold " href="<?=base_url('Profile/'.$post_user_id)?>">  
               <?=$p_ost['posted_by']?></a>
              <br>
                <small>
                    <?php echo time_elapsed_string($p_ost['posted_on']);?>
                </small>
            </div>
                 
           </div>   
          <div class="float-right d-flex mt-2">
                <div class="">  
                  <?php
                    $user_id;
                    $post_id=$p_ost['post_id'];
                    $this->db->where(array('user_id'=>$user_id,'post_id'=>$post_id));
                    $re=$this->db->get('user_fav_section')->result();
                    if(count($re)==0){
                      ?>
                         <span class="favrt" post_id="<?=$p_ost['post_id']?>" title="favourite"><i class="far fa-star"></i></span>
                      <?php
                      }else{?>
                         <span class="favrt star" post_id="<?=$p_ost['post_id']?>" title="favourite"><i class="fas fa-star text-gold"></i></span>
                    <?php }
                    ?>
                  </div>
             <?php if($_SESSION['logged_in'][0]->user_id==$p_ost['user_id']){ ?>
                  <div class="dropdown ml-3">
                    <button class="dropbtn"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></button>
                    <div class="dropdown-content bg-white">
                      <a href="javascript:void(0)"  class="edit_post" p_d="<?=$p_ost['post_id']?>">Edit</a>
                      <a href="javascript:void(0)" class="dlt_post_" p_d="<?=$p_ost['post_id']?>" >Delete</a>
                      
                    </div>
                  </div>
              <?php } ?>
          </div> 
          </div>
          <div class="card-body pt-0 pb-0">
            <?php if($p_ost['post']){ ?>
                  <p>
                    <?=$p_ost['post']?>
                  </p>
           <?php  }
            $postimages=$p_ost['post_files'];
            $postimages=explode(',', $postimages);
              if(count($postimages)==2)
              {
              ?>
                <div class="post_img row">
                  <?php for ($i=0; $i < count($postimages); $i++) 
                  {
                    $ext = pathinfo($postimages[$i], PATHINFO_EXTENSION);                             
                    ?>             
                    <?php
                    if($ext=='mp4')
                    {
                      $video=base_url().'assets/uploads/videos/'.$postimages[$i];
                      ?>
                       <div class="col-md-6 p-3">
                    <a class="" href="<?=base_url('Post/viewPost/').$p_ost['post_id']?>">
                      <video controls class="w-100">
                       <source src="<?= $video?>" type="video/mp4">
                  
                      Your browser does not support the video tag.
                    </video></a>
                   </div>
                    <?php
                  }
                  else
                  {
                    $images=base_url().'assets/uploads/images/'.$postimages[$i];
                    ?>
                    <div class="col-md-6 p-3">
                      <a class="" href="<?=base_url('Post/viewPost/').$p_ost['post_id']?>"><img class="img img-fluid rounded d-block post_image" src="<?= $images ?>">
                      </a>
                    </div>
                    <?php
                  }
                    ?>
                  
                   <?php
                    }
                    ?>
                </div>
            <?php
            }
            elseif (count($postimages)==3) 
            {
             
              ?>
                <div class="post_img row">
                <?php
                 $ext = pathinfo($postimages[0], PATHINFO_EXTENSION);
                // print_r($ext);
                if($ext=='mp4')
                {
                $video=base_url().'assets/uploads/videos/'.$postimages[0];
                ?>
                  <div class="col-md-12 p-3">
                    <a class="" href="<?=base_url('Post/viewPost/').$p_ost['post_id']?>">
                      <video controls class="w-100">
                       <source src="<?= $video?>" type="video/mp4">
                  
                      Your browser does not support the video tag.
                    </video></a>
                  </div>
                 <?php
                }
                else
                {
                  $images=base_url().'assets/uploads/images/'.$postimages[0];
                  ?>
                   <div class="col-md-12 p-3">
                    <a class="" href="<?=base_url('Post/viewPost/').$p_ost['post_id']?>"><img class="img img-fluid d-block post_image rounded" src="<?=$images?>"></a>
                  </div>
                  <?php
                } 
                for ($i=1; $i < count($postimages); $i++) 
                {
                  $ext = pathinfo($postimages[$i], PATHINFO_EXTENSION);                
                  if($ext=='mp4')
                  {
                    $video=base_url().'assets/uploads/videos/'.$postimages[$i];
                    ?>
                    <div class="col-md-6 p-3">
                      <a class="" href="<?=base_url('Post/viewPost/').$p_ost['post_id']?>">
                        <video controls class="w-100">
                         <source src="<?= $video?>" type="video/mp4">
                    
                        Your browser does not support the video tag.
                      </video></a>
                    </div>
                    <?php
                    }
                    else
                    {
                      $images=base_url().'assets/uploads/images/'.$postimages[$i];
                      ?>
                      <div class="col-md-6 p-3">
                        <a class="" href="<?=base_url('Post/viewPost/').$p_ost['post_id']?>"><img class="img img-fluid rounded d-block post_image" src="<?= $images ?>">
                        </a>
                      </div>
                      <?php
                    }
                  }
                  ?>
                </div>
            <?php
            }
            elseif (count($postimages)==4) 
            {
              ?>
                <div class="post_img row">
                  <?php for ($i=0; $i < count($postimages); $i++) {
                   $ext = pathinfo($postimages[$i], PATHINFO_EXTENSION);                             
                    ?>             
                    <?php
                    if($ext=='mp4')
                    {
                      $video=base_url().'assets/uploads/videos/'.$postimages[$i];
                      ?>
                       <div class="col-md-6 p-3">
                    <a class="" href="<?=base_url('Post/viewPost/').$p_ost['post_id']?>">
                      <video controls class="w-100">
                       <source src="<?= $video?>" type="video/mp4">
                  
                      Your browser does not support the video tag.
                    </video></a>
                   </div>
                    <?php
                  }
                  else
                  {
                    $images=base_url().'assets/uploads/images/'.$postimages[$i];
                    ?>
                    <div class="col-md-6 p-3">
                      <a class="" href="<?=base_url('Post/viewPost/').$p_ost['post_id']?>"><img class="img img-fluid rounded d-block post_image" src="<?= $images ?>">
                      </a>
                    </div>
                    <?php
                  }
                    ?>
                   <?php
                    }
                    ?>
                </div>
            <?php
            }
            elseif (count($postimages)>4) 
            {
              ?>
                <div class="post_img row">
                  <?php for ($i=0; $i <3; $i++) {
                    $ext = pathinfo($postimages[$i], PATHINFO_EXTENSION);                             
                    ?>             
                    <?php
                    if($ext=='mp4')
                    {
                      $video=base_url().'assets/uploads/videos/'.$postimages[$i];
                      ?>
                       <div class="col-md-6 p-3">
                    <a class="" href="<?=base_url('Post/viewPost/').$p_ost['post_id']?>">
                      <video controls class="w-100">
                       <source src="<?= $video?>" type="video/mp4">
                  
                      Your browser does not support the video tag.
                    </video></a>
                   </div>
                    <?php
                  }
                  else
                  {
                    $images=base_url().'assets/uploads/images/'.$postimages[$i];
                    ?>
                    <div class="col-md-6 p-3">
                      <a class="" href="<?=base_url('Post/viewPost/').$p_ost['post_id']?>"><img class="img img-fluid rounded d-block post_image" src="<?= $images ?>">
                      </a>
                    </div>
                    <?php
                  }
                    ?>
                   <?php
                    }
                    ?>
                    <?php
                       $ext = pathinfo($postimages[4], PATHINFO_EXTENSION);  
                       if($ext=='mp4')
                       {
                        $video=base_url().'assets/uploads/videos/'.$postimages[4];
                        ?>
                        <div class="col-md-6 p-2 text-center">
                          <a class="" href="<?=base_url('Post/viewPost/').$p_ost['post_id']?>">
                              <video controls class="w-100">
                               <source src="<?= $video?>" type="video/mp4">
                          
                              Your browser does not support the video tag.
                            </video></a>
                            <div class="position-absolute h-100 w-100 bg-dark " style="left: 0%;top:0px;padding-top: 8rem !important;opacity: 0.5">
                            </div>
                            <a class="position-absolute" href="#" style="    top: 58px;left: 106px;"> <h2 class="text-white"><strong>+<?=(count($postimages)-4)?></strong></h2></a>
                        </div>
                      <?php
                      }
                      else
                      {
                        $images=base_url().'assets/uploads/images/'.$postimages[4];
                      ?>
                      <div class="col-md-6 p-2 text-center">
                        <a class="" href="<?=base_url('Post/viewPost/').$p_ost['post_id']?>">
                          <img class="img img-fluid d-block rounded post_image" src="<?=$images?>">
                        </a>
                          <div class="position-absolute h-100 w-100 bg-dark " style="left: 0%;top:0px;padding-top: 8rem !important;opacity: 0.5">
                          </div>
                          <a class="position-absolute" href="#" style=" top: 58px;left: 106px;"> <h2 class="text-white"><strong>+<?=(count($postimages)-4)?></strong></h2></a>
                      </div>
                      <?php
                      }
                    ?>
                    
                    
                </div>
            <?php
            }
            else
            {
              ?>
                <div class="post_img row">
                  <?php
                   $ext = pathinfo($postimages[0], PATHINFO_EXTENSION);                             
                    ?>             
                    <?php
                    if($ext=='mp4')
                    {
                      $video=base_url().'assets/uploads/videos/'.$postimages[0];
                      ?>
                      <div class="col-md p-3">
                      <a class="" href="<?=base_url('Post/viewPost/').$p_ost['post_id']?>">
                        <video controls class="w-100">
                         <source src="<?= $video?>" type="video/mp4">
                    
                        Your browser does not support the video tag.
                      </video></a>
                  </div>
                    <?php
                  }
                  else
                  {
                    $images=base_url().'assets/uploads/images/'.$postimages[0];
                    ?>
                        <div class="col-md p-3">
                        <a class="" href="<?=base_url('Post/viewPost/').$p_ost['post_id']?>"><img class="img img-fluid d-block rounded" src="<?=$images?>"></a>
                      </div>
                    <?php
                  }
                    ?>
                </div>
            <?php
            }
            ?>
            
          </div>
          <div class="my-2 p-0">
            <div class="d-flex text-center">
            <div class="col-md-4 manage ">
              <div class="text-center px-3 py-1">
                <div class="btn-like d-flex" ><a href="javascript:void(0)" class="text-danger likePost" d-Post="<?=$p_ost['post_id']?>">
              <?php 

                  if(count($p_ost['likes_data']) > 0){
                  foreach ($p_ost['likes_data'] as $likedata) {
                   // print_r($likedata->profile_picture);
                    if($_SESSION['logged_in'][0]->user_id==$likedata->user_id){ ?>
                     <i class="fa fa-heart " aria-hidden="true"></i>
                   <?php   break;
                    }else{ ?>
                      <i class="fa fa-heart-o" aria-hidden="true"></i>
                   <?php }
                  }
                }else{ ?>
                       <i class="fa fa-heart-o" aria-hidden="true"></i>
            <?php    }
                ?>
            Like &nbsp;</a> 
                  <ul class="list-unstyled d-flex m-0">
                    <?php

                         $sno=1;
                        foreach ($p_ost['likes_data'] as $likedata) { 
                         
                            if($sno <= 5){
                             
                              if($sno==1){ ?>
                                   <li><img class="rounded-circle like_img " src="<?=base_url('assets/uploads/images/').$likedata->profile_picture?> "></li>
                      <?php }else{    ?>
                            <li><img class="rounded-circle like_img like_img_marg25" src="<?=base_url('assets/uploads/images/').$likedata->profile_picture?> "></li>
                   <?php 
                            }
                         }
                        $sno++;
                       }
                    ?>
                    <?php 
                     if(count($p_ost['likes_data']) > 0){ ?>
                         <li><div class=" like_cont likeValue rounded-circle like_img_marg25"> <?=$p_ost['total_likes']?></div></li>
                    <?php  
                        }else{ ?>
                            <li><div class=" like_cont likeValue rounded-circle "> <?=$p_ost['total_likes']?></div></li> 
                   <?php } ?>
                   
                  </ul>
                </div>   
              </div>  
            </div>
            <div class="col-md-4 manage px-3 py-1">
              <div class="btn-comment post-btns">
                <a href="<?=base_url('Post/viewPost/').$p_ost['post_id']?>"><i class="fa fa-comment-o" aria-hidden="true"></i> Comments</a>
                <span class=""><?=count($p_ost['total_comments'])?></span>
              </div>
            </div>
            <div class="col-md-4 manage px-3 py-1">
              <div class="btn-share post-btns">
                <a href="javascript:void(0)" class="shareThisPost" d-ost="<?=$p_ost['post_id']?>"><i class="fa fa-share-square-o" aria-hidden="true"></i> Share</a>
                <span class=""><?=$p_ost['total_share']?></span>
              </div>
            </div>
            </div>
          </div>
          
           <div class=" comments_list border-top">
            <?php 
              if(count($p_ost['total_comments'])>0){
              for($i=0; $i < count($p_ost['total_comments']); $i++){ ?>
              <div class="row mt-2 px-2">
                  <div class="col-md-1">
                      <a href="<?=base_url('Profile/'.$p_ost['total_comments'][$i]->user_id)?>"> <img class="rounded-circle like_img" src="<?=base_url()?>assets/uploads/images/<?=$p_ost['total_comments'][$i]->profile_picture?>"></a>  
                  </div>
                  <div class="col-md-10 comnt_text border-bottom">
                      <h6 class="font-weight-bold m-0" > <a href="<?=base_url('Profile/'.$p_ost['total_comments'][$i]->user_id)?>"><?=$p_ost['total_comments'][$i]->full_name?></a><small class="ml-3">
                  <?php echo time_elapsed_string($p_ost['total_comments'][$i]->commented_on)?>
                      </small></h6>
                      <p class=""><?=$p_ost['total_comments'][$i]->comment?></p>
                  </div>
                  <div class="col-md-1">
                   <?php if(($_SESSION['logged_in'][0]->user_id==$p_ost['total_comments'][$i]->user_id) OR ($_SESSION['logged_in'][0]->user_id==$p_ost['user_id']) ){ ?>
                      <div class="dropdown">
                        <button class="dropbtn"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></button>
                        <div class="dropdown-content bg-white">
                             <?php  if($_SESSION['logged_in'][0]->user_id ==$p_ost['total_comments'][$i]->user_id ){   ?>
                                <a href="javascript:void(0)" class="edit_comment" c_d="<?=$p_ost['total_comments'][$i]->id?>">Edit</a>
                            <?php }  ?>
                          <a href="javascript:void(0)" class="dlt_comnt_" c_d="<?=$p_ost['total_comments'][$i]->id?>">Delete</a>
                          
                        </div>
                      </div>
                    <?php } ?>
                  </div>
              </div>
            <?php } 
          }?>
            <div class="p-2">
             <div class="d-flex m-0">
                <span> <img class="rounded-circle like_img" src="<?=base_url()?>assets/uploads/images/<?=$MyDetails[0]->profile_picture?>"></span>
                <form method="POST" class="w-100 ad_cmnt" >
                   <div class="pl-2 w-100 _input">
                        <p class="lead emoji-picker-container">
                          <textarea class="input-field cmnt_" data-emojiable="true" type="text" name="comment"  placeholder="Add a Message">  </textarea>
                        </p>
                               <input type="hidden" name="post_id" class="poster_class" value="<?=$post_id?>">
                      </div>
                </form>
             </div>
            </div>

            </div>
          </div>
        <?php
       }
       else{
         ?>
        <div class="card mt-4 p-2">
           <div class="card-header ">
            <div class="d-flex float-left">
             <div> 
              <a class="font-weight-bold" href="<?=base_url('Profile/'.$post_user_id)?>">
                 <img class="rounded-circle mr-2" src="<?=base_url()?>assets/uploads/images/<?=$p_ost['profile_pic']?>" width="40"  height="40">
               </a>
             </div>
            <div>
              <a class="font-weight-bold " href="<?=base_url('Profile/'.$post_user_id)?>">  
                <?=$p_ost['posted_by']?>
              </a>
              <br>
                <small>
                  <?php echo time_elapsed_string($p_ost['posted_on']);?>
                  <!-- <time class="timeago" datetime=" <?=$p_ost['posted_on']?>"></time> -->

                </small>
            </div>
                
           </div>
               
                    <div class="float-right d-flex mt-2">
                      <div class="">  
                          <?php
                        $user_id;
                        $post_id=$p_ost['post_id'];
                        $this->db->where(array('user_id'=>$user_id,'post_id'=>$post_id));
                        $re=$this->db->get('user_fav_section')->result();
                        if(count($re)==0){
                        ?>
                        <span class="favrt" post_id="<?=$p_ost['post_id']?>" title="favourite"><i class="far fa-star"></i></span>
                        <?php
                        }else{?>
                        <span class="favrt star" post_id="<?=$p_ost['post_id']?>" title="favourite"><i class="fas fa-star text-gold"></i></span>
                        <?php }
                        ?>
                      </div>
                       <?php 
                          if($_SESSION['logged_in'][0]->user_id==$p_ost['user_id'])
                          { 
                        ?>
                          <div class="dropdown ml-3">
                            <button class="dropbtn"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></button>
                            <div class="dropdown-content bg-white">
                              <a href="javascript:void(0)"  class="edit_post" p_d="<?=$p_ost['post_id']?>">Edit</a>
                              <a href="javascript:void(0)" class="dlt_post_" p_d="<?=$p_ost['post_id']?>" >Delete</a>
                              
                            </div>
                          </div>
                          <?php } ?>
                    </div> 
                
             <!-- <a class="" href="#"><img class="img-fluid float-right pt-3" src="<?=base_url('assets/webimg/dots.png')?>"></a> -->
            
          <!--   <div class="titles mt-1">
            <p class="pl-2">CAA के विरोध के नाम पर विपक्ष भड़का रहा है उपद्रवियों को?</p>
            </div> -->
          </div>
          <div class="card-body">
          <p>
            <?=$p_ost['post']?>
            </p>
            <div class="">
               <a class="" href="<?=base_url('Post/viewPost/').$p_ost['post_id']?>">
            <video controls class="w-100">
            <source src="<?=base_url()?>assets/uploads/videos/<?=$p_ost['post_files']?>" type="video/mp4">
          
          Your browser does not support the video tag.
          </video>
        </a>
          </div>  
          </div>
          
          <div class="my-2 p-0">
            <div class="d-flex text-center">
              <div class="col-md-4 manage  ">
              <!--   <div class="btn-like" ><a href="javascript:void(0)" class="likePost" d-Post="<?=$p_ost['post_id']?>"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>Like</a> <span class="font-weight-bold likeValue"> <?=$p_ost['total_likes']?></span></div> -->
                <div class="text-center px-3 py-1">
                  <div class="btn-like d-flex" ><a href="javascript:void(0)" class="text-danger likePost" d-Post="<?=$p_ost['post_id']?>">

                    <?php 

                    if(count($p_ost['likes_data']) > 0){
                    foreach ($p_ost['likes_data'] as $likedata) {
                     // print_r($likedata->profile_picture);
                      if($_SESSION['logged_in'][0]->user_id==$likedata->user_id){ ?>
                       <i class="fa fa-heart " aria-hidden="true"></i>
                     <?php   break;
                      }else{ ?>
                        <i class="fa fa-heart-o" aria-hidden="true"></i>
                     <?php }
                    }

                  }else{ ?>
                         <i class="fa fa-heart-o" aria-hidden="true"></i>
              <?php    }
                  ?>
                  Like &nbsp;</a> 
                    <ul class="list-unstyled d-flex m-0">
                      <?php
                           $sno=1;
                          foreach ($p_ost['likes_data'] as $likedata) { 
                            
                              if($sno <= 5){
                               
                                if($sno==1){ ?>
                                     <li><img class="rounded-circle like_img " src="<?=base_url('assets/uploads/images/').$likedata->profile_picture?> "></li>
                        <?php }else{    ?>
                              <li><img class="rounded-circle like_img like_img_marg25" src="<?=base_url('assets/uploads/images/').$likedata->profile_picture?> "></li>
                     <?php 
                              }
                           }
                          $sno++;
                         }
                      ?>
                      <?php 
                     if(count($p_ost['likes_data']) > 0){ ?>
                         <li><div class=" like_cont likeValue rounded-circle like_img_marg25"> <?=$p_ost['total_likes']?></div></li>
                    <?php  
                        }else{ ?>
                            <li><div class=" like_cont likeValue rounded-circle "> <?=$p_ost['total_likes']?></div></li> 
                   <?php } ?>
                    </ul>
                </div> 
              </div>
            </div>
            <div class="col-md-4 manage  px-3 py-1">
              <div class="btn-comment post-btns">
                <a href="<?=base_url('Post/viewPost/').$p_ost['post_id']?>"><i class="fa fa-comment-o" aria-hidden="true"></i> Comments</a>
                 <span class=""><?=count($p_ost['likes_data'])?></span>
               </div>
            </div>
            <div class="col-md-4 manage  px-3 py-1">
              <div class="btn-share post-btns">
                <a href="javascript:void(0)" class="shareThisPost" d-ost="<?=$p_ost['post_id']?>"><i class="fa fa-share-square-o" aria-hidden="true"></i> Share</a>
                <span class=""><?=$p_ost['total_share']?></span>
              </div>
            </div>
            </div>
          </div>
          
           <div class=" comments_list border-top">
              <?php 
            
                  // print_r($p_ost['total_comments']);
                if(count($p_ost['total_comments'])>0){
                for($i=0; $i < count($p_ost['total_comments']); $i++){ ?>
                  <div class="row mt-2 px-2">
                      <div class="col-md-1">
                         <a href="<?=base_url('Profile/'.$p_ost['total_comments'][$i]->user_id)?>"> <img class="rounded-circle like_img" src="<?=base_url()?>assets/uploads/images/<?=$p_ost['total_comments'][$i]->profile_picture?>"></a>  
                      </div>
                      <div class="col-md-10 comnt_text border-bottom">
                          <h6 class="font-weight-bold m-0" > <a href="<?=base_url('Profile/'.$p_ost['total_comments'][$i]->user_id)?>"><?=$p_ost['total_comments'][$i]->full_name?></a><small class="ml-3">
                           <?php echo time_elapsed_string($p_ost['total_comments'][$i]->commented_on)?>
                          </small></h6>
                          <p class=""><?=$p_ost['total_comments'][$i]->comment?></p>
                      </div>
                      <div class="col-md-1">
                         <?php if(($_SESSION['logged_in'][0]->user_id==$p_ost['total_comments'][$i]->user_id) OR ($_SESSION['logged_in'][0]->user_id==$p_ost['user_id']) ){ ?>
                            <div class="dropdown">
                              <button class="dropbtn"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></button>
                              <div class="dropdown-content bg-white">
                                   <?php  if($_SESSION['logged_in'][0]->user_id ==$p_ost['total_comments'][$i]->user_id ){   ?>
                                        <a href="javascript:void(0)" class="edit_comment" c_d="<?=$p_ost['total_comments'][$i]->id?>">Edit</a>
                                  <?php }  ?>
                                <a href="javascript:void(0)" class="dlt_comnt_" c_d="<?=$p_ost['total_comments'][$i]->id?>">Delete</a>
                                
                              </div>
                            </div>
                        <?php } ?>
                      </div>
                  </div>
             <?php 
              }

          }?>
              <div class="p-2">
                 <div class="d-flex m-0">
                    <span> <img class="rounded-circle like_img" src="<?=base_url()?>assets/uploads/images/<?=$MyDetails[0]->profile_picture?>"></span>
                    <form method="POST" class="w-100 ad_cmnt" >
                      <div class="pl-2 w-100 _input">
                        <p class="lead emoji-picker-container">
                          <textarea class="input-field cmnt_" data-emojiable="true" type="text" name="comment"  placeholder="Add a Message">  </textarea>
                        </p>
                              <input type="hidden" name="post_id" class="poster_class" value="<?=$post_id?>">
                      </div>
                      <!------contenteditable  data-text="Write a comment"------>
                     <!--  <div class="cmnt_icons">
                          <span title="Insert an emoji"> <i class="fa fa-smile-o" aria-hidden="true"></i>  </span> 
                           <label for="camera"><span title="Attach a photo or video"> <i class="fa fa-camera" aria-hidden="true"></i></span> </label>
                           <input type="file" id="camera" name="camera" class="d-none" >
                      </div> -->
                    </form>
                 </div>
              </div>

            </div>
          </div>
         <?php
       }
       
     }
    }else{
      echo '<div class="card"><div class="alert alert-info">No Post Found.</div></div>';
    }
	   
	  ?>
       </div>
          <!-- <div class="" id="scrollpost"> 
          </div> -->
    </div>
    <!-- end center panel -->
    <!--right sidepanel -->
    <div class="col-md-3  pt-3 bgdefault">
      
      <div class="">
        <div class="card mt-2">
          <div class="p-3">
            <div class="d-flex">
              <h4 class="widget-title">Jobs</h4>
              <a href="<?=base_url('Jobs/jobslist')?>" class="btn btn-primary jobs_btn" >See All</a>
            </div>
            <div class="mt-4">
              <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
             <!--    <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol> -->
                <div class="carousel-inner">
                    <?php 
                         $i=0;
                          foreach($fetchjobpost as $FJB)
                          {
                              
                            // print_r($FJB);
                            $img=$FJB->jobpost_image;
                            //   $myImages=explode(',',$FJB->jobpost_image);
                            if($i==0)
                            {
                                $st="active";
                            }
                            else{
                                $st="";
                            }
                            
                            ?>
                            <div class="carousel-item <?=$st?>">
                                <div class="">
                                  <div class="">
                                     <img src="<?=base_url().'assets/jobpost/'.$img?>" class="d-block w-100" alt="..."  onerror="this.src='<?=base_url()?>assets/img/jobs.jpg';">
                                  </div>
                                  <div class="row m-0">
                                      <div class="col-md-8 p-0">
                                        <ul class="unstyled m-0">
                                         <li><small><?=$FJB->jobpost_title?></small></li>
                                         <li class="line_het"><span class="author"><?=$FJB->jobpost_description?></span></li>
                                         <li><small>Dehradun - Full Time</small></li>
                                      </div>
                                      
                                      <div class="col-md-4 p-0">
                                        <button class="btn btn-primary p-1 mt-3 fy jobposter" job_id="<?=$FJB->jobpost_id?>">Apply Now</button>
                                      </div>
                                  </div>
                                </div>
                              </div>
                            <?php
                            $i++;
                             
                          }
                          ?>
                  
                 
                  
                </div>
                <a class="carousel-control-prev carousel_arrow_set" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next carousel_arrow_set" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>
          </div>
    
        </div>
        
      </div>
      <div class="card mt-3" id="page_you_may_like">
        <div class="p-3">
          <h4 class="widget-title">Page You May Like</h4>
        </div>
        <div class="card-body p-0">
          <ul class="list-unstyled">
             <?php
             //  print_r($fetchPages);
             // die;
              foreach ($fetchPages as $user) {
                $nameArrI=explode(" ",$user['full_name']);
                $category='';
                switch ($user['category']) {
                  case 1:$category="Personal Blog";break;
                  case 2:$category="Product & Services";break;
                  case 3:$category="Shopping & Retail";break;
                  case 4:$category="Health & Beauty";break;
                  case 5:$category="Super Market & Convenience";break;
                  
                  default:$category="Others";
                    # code...
                    break;
                }
                ?>
                 <li class="row mx-0 folow_rw ">
                    <div class="col-md-3 pt-1">
                      <a href="<?=base_url('Profile/').$user['user_id']?>">
                        <img class="rounded-circle " src="<?=base_url()?>assets/img/Profile_Pic/<?=$user['upage_profilepic']?>" onerror="this.src='<?=base_url()?>assets/img/Profile_Pic/default.png';" width="40px" height="40px">
                      </a>
                    </div>
                    <div class="col-md-7 p-0">
                      <span class=" author"><?=$user['full_name']?></span>
                      <div class="mt-n2"> <small><?=$category?></small> <small class="text-danger">Likes: <?=$user['total_likes']?></small></div>
                    </div>
                    <div class="col-md-2 p-0">
                      <a href="javascript:void(0)" class="likeThisPage" page="<?=$user['page_id']?>">
                        <span class="text-danger pge_lke">
                          
                          
                          <i class="fa <?= ($user['like'] == 1 ? 'fa-heart' : 'fa-heart-o');?>" aria-hidden="true"></i>
                        </span>
                      </a>  
                    </div>
                  </li>
                <?php
              }
            ?>
          </ul>
        </div>
      </div>
      <?php if(count($birthdays)>0):?>
       <div class="card mt-3">
        <!--   <div class="p-3">
            <h4 class="widget-title">Birthday</h4>
          </div> -->
        <div class="card-body p-0">
            <div id="carouselExampleIndicators1" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  <?php
                  $counter=1;
                  foreach ($birthdays as $birth) {
                  ?>
                    <div class="carousel-item <?php if($counter==1)echo "active"?>">
                      <div class=" " style="background: url('<?=base_url()?>assets/img/birthday.jpg');background-size: cover;">
                          <div class="p-4">
                            <div class="text-center"><img src="<?=base_url()?>assets/img/cake.svg" style="width:44px;" ><br></div>

                             <div class="p-4">
                             <h4 class="ml-2 text-white"><?=$birth->full_name?>'s Birthday</h4>
                             <span class=" text-white">is on <?=date('d-m-Y',strtotime($birth->date_of_birth))?></span>
                             <p class="text-white">Leave a message with your best wishes on his/her profile page!</p>
                           </div>
                           
                          </div>
                      </div>
                    </div>
                  <?php $counter=2; } ?>
                </div>
                <a class="carousel-control-prev carousel_arrow_set" href="#carouselExampleIndicators1" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next carousel_arrow_set" href="#carouselExampleIndicators1" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>  
        </div>
      </div>
    <?php endif;?>
      <div class="card mt-3" id="">
        <div class="p-3 d-flex">
          <h4 class="widget-title">Advertisement</h4>
          <a href="javascript:void(0)" class="btn btn-primary ads_btn float-right jobs_btn" >Post Ad.</a>
        </div>
        <div class="card-body p-3">
            <!-- <a href="#"><img src="<?=base_url()?>/assets/img/advertize.jpg" class="img-fluid"></a> -->
            <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
             <!--    <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol> -->
                <div class="carousel-inner">
                    <?php 
                    // print_r($fetchAds);
                         $i=0;
                          foreach($fetchAds as $FJB)
                          {
                              
                            // print_r($FJB);
                            $img=$FJB->ad_image;
                            //   $myImages=explode(',',$FJB->jobpost_image);
                            if($i==0)
                            {
                                $st="active";
                            }
                            else{
                                $st="";
                            }
                            
                            ?>
                            <div class="carousel-item <?=$st?>">
                                <div class="">
                                  <div class="">
                                     <a href="<?=$FJB->ad_url?>"><img src="<?=base_url('assets/Ads/').$img?>" class="d-block w-100" alt="..."  onerror="this.src='<?=base_url()?>assets/img/jobs.jpg';"></a>
                                  </div>
                                 <span><strong>Posted By:</strong> <a href="<?=base_url('Profile/').$FJB->user_id?>"><?=$FJB->full_name?></a></span>
                                </div>
                              </div>
                            <?php
                            $i++;
                             
                          }
                          ?>
                  
                 
                  
                </div>
                <a class="carousel-control-prev carousel_arrow_set" href="#carouselExampleIndicators2" role="button" data-slide="prev" style="background: blue;padding: 11px;">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next carousel_arrow_set" href="#carouselExampleIndicators2" role="button" data-slide="next" style="background: blue;padding: 11px;">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
        </div>
      </div>
    </div>
    <!--End right sidepanel -->
  </div>
</div>
<style>
.pge_lke{
  font-size: 18px;
    padding-top: 8px;
}
.loading1
{
   width:0px;
   height:10px;
   background-color:white;   
   border: 1px solid #484646;
   border-radius: 8px;
  
}
.pane_img
{
    position: relative;
  /*  top:20px;
    height: 100px;
    width: 300px;  */
    display:none;
}
.sback_{
  width: 33.33%; 
  background-color : #1f1f1f66;
  border-radius: 10px;
}
  </style>


<script type="text/javascript">
  $(document).on('click','.likeThisPage',function(){

    var element=$(this);
    var page=$(this).attr('page');
    // console.log(element.find('span').find('i'));
    var i=element.find('span').find('i');
    if(i.hasClass('fa-heart')){
      i.removeClass('fa-heart');
      console.log("User Dis Like This Page.");
      i.addClass('fa-heart-o');
      var todo=0;
    }else{
      console.log("User Like This Page.");
      i.removeClass('fa-heart-o');
      i.addClass('fa-heart');
      var todo=1;
    }
    $.ajax({
      url:"<?=base_url('Page/actPage')?>",
      type:"post",
      data:{todo:todo,page:page},
      success:function(response){
        // console.log(response);
        // $("#page_you_may_like").load(location.href+"#page_you_may_like");
      }
    });

  });
$(document).ready(function(){
var story_cnt ;
  $(document).on('click','#addStatus',function(){
    $('#postStatus').modal('show');
  });

 $(document).on('click','.my_status',function(){
    var status_=$(this).attr('d-img');
    var name_=$(this).attr('d-By');
    var profile_=<?=$_SESSION['logged_in'][0]->user_id;?>;
    var html='';
    var  html11='';
    $('#redirecTo').attr('href',"<?=base_url('Profile/')?>"+profile_);
    $('#stImg').attr('src',status_);

    $.ajax({
      url:"<?=base_url('Home/getStatusFor')?>",
      type:"post",
      data:{profile_,profile_},
      success:function(response){
        // console.log(response);
        response=JSON.parse(response);
         story_cnt = response.data.length;
        console.log(response.data);
        if(response.code==1){
          $('#stry_shw_').empty();
          $('#stry__e').empty();         
          $(".sback_").css("width", "calc(100% / "+story_cnt+")");
          for(var i =0 ; i < response.data.length;i++){
            html11+= '<div class="sback_"><div class="loading1"></div></div>';
          }
          $('#stry__e').append(html11);
          html+='';
          for(var i =0 ; i < response.data.length;i++){

              html+= '<div class="pane_img" style=""><img src="<?=base_url()?>assets/stories/images/'+response.data[i].story_files+'" class="img-fluid"></div>';
          }
          $('#stry_shw_').append(html);
        }
        showpanel();
      }
    })
  $('#statusModal').modal('show');
  });

  $(document).on('click','.usr_status',function(){
    var status_=$(this).find('img').attr('src');
    var name_=$(this).attr('d-By');
    var profile_=$(this).attr('d-Gen');
    var html='';
    var  html11='';
    $('#redirecTo').attr('href',"<?=base_url('Profile/')?>"+profile_);
    $('#stImg').attr('src',status_);

    $.ajax({
      url:"<?=base_url('Home/getStatusFor')?>",
      type:"post",
      data:{profile_,profile_},
      success:function(response){
        response=JSON.parse(response);
         story_cnt = response.data.length;
        console.log(response.data);
        if(response.code==1){

        $('#stry_shw_').empty();
        $('#stry__e').empty();         

        $(".sback_").css("width", "calc(100% / "+story_cnt+")");

          for(var i =0 ; i < response.data.length;i++){
               html11+= '<div class="sback_"><div class="loading1"></div></div>';
            }
          $('#stry__e').append(html11);

          html+='';
          for(var i =0 ; i < response.data.length;i++){

              html+= '<div class="pane_img" style=""><img src="<?=base_url()?>assets/stories/images/'+response.data[i].story_files+'" class="img-fluid"></div>';
          }
          $('#stry_shw_').append(html);
        }

           showpanel();
      }
    })
  $('#statusModal').modal('show');
  });

var currentIndex = 0;

function showpanel() 
{
  $(".pane_img").hide();
  $(".pane_img").eq(currentIndex).show();
  $(".loading1").eq(currentIndex).css("width", "0%");
  $(".loading1").eq(currentIndex).css("background-color", "white");
   // $(".loading1").eq(currentIndex).css("border-radius", "10px");
   // $(".loading1").eq(currentIndex).css("border", "1px solid #484646");
    currentIndex++;
    if (currentIndex > story_cnt-1) {
        currentIndex = 0;
    }
    console.log(currentIndex);
    $('.loading1').eq(currentIndex).animate({
        width: '100%'
    }, 6000, "linear", showpanel);
}

  $(document).ready(function() {
      $('.js-example-basic-multiple').select2();
  });

$(function () {
    $('.icontheme').click (function () {
        $(this).toggleClass ('expanded');
        $('.bgimgs').toggleClass ('expanded');
    });
});

});
</script>
<script type="text/javascript">
  $(document).on('click','.likePost',function(){
	  var ele=$(this);
    var post_id=ele.attr('d-Post');
	  // var likes=ele.find('likeValue').html();
	// console.log(likes);
var like = ele.find("i").attr("class");
 var lcnt = $(this).parent().find('ul').find('.like_cont').html();
  var post_id=ele.attr('d-Post');
    $.ajax({
      url:"<?=base_url('APIController/likeOrdislike')?>",
      type:"post",
      data:{post_id:post_id,to_do:'like'},
      success:function(response){
        response=JSON.parse(response);
        if(response.code==1){
			     if(like=='fa fa-heart-o'){
               ele.parent().find('ul').find('.like_cont').html(parseInt(lcnt)+1);
               ele.find("i").attr("class","fa fa-heart");
            }else{
              ele.find("i").attr("class","fa fa-heart-o");
               ele.parent().find('ul').find('.like_cont').html(parseInt(lcnt)-1);
            }
      //    swal("Good", response.msg, "success");
        }else{
        //  swal("Oops...!", response.msg, "warning");
        }
      }
    })
  });
</script>
<script type="text/javascript">
  $(document).on('click','.theme_',function()
  {
     var imgs=$(this).find('img').attr('src');
      //console.log(imgs);
      $('.emojionearea-editor').css('background','url('+imgs+')');
      $('.emojionearea-editor').css("min-height","12em");
      $('.emojionearea-editor').css("text-align","center");
      $('.emojionearea-editor').css("font-size","28px");
      $('.emojionearea-editor').css("background-size","cover");
      $('.emojionearea-editor').css("color","black");
      $('.emojionearea-editor').attr("id","screenshot");
  })
</script>

<script>
  $(document).on('click','.tagfriend',function(){
   // $('.withs').css('display','flex');
   $('.withs').toggleClass ('expanded');
  });
</script>
<script>

  $(document).ready(function() {
    $(document).on('click','#on_off_line',function(){
      console.log(' == '+$(this).val());
    });
        $("#emojionearea1").emojioneArea({
            pickerPosition: "right",
            tonesStyle: "bullet",
            events: {
            keyup: function (editor, event) {
              countChar(this);
                //console.log(editor.html());
               console.log(this.getText());
            }
          }
        });
        $('#divOutside').click(function () {
          $('.emojionearea-button').click()
        })        
    });
   function countChar(val) {
            var len = val.getText().length;
            if (len >= 140) {
                 /*  val.value = val.content.substring(0, 140) */;
                 $('#chars').text(0); 
                    $('.emojionearea-editor').css('background','transparent');
                    $('.emojionearea-editor').css("min-height","8em");
                    $('.emojionearea-editor').css("max-height","15em");
                    $('.emojionearea-editor').css("font-size","inherit");
            } 
            else 
            {
                // $('#chars').text(140 - len);
            }
        }
</script>
<script>
  $("#add_post").submit(function(e){
        e.preventDefault();
        var formData= new FormData($(this)[0]);
        // formData.append('user_id',user_id);
        var ext_array=[];
        var selection = document.getElementById('img_video');
        for (var i=0; i<selection.files.length; i++) {
            var ext = selection.files[i].name.substr(-3);
            ext_array.push(ext);
            // console.log(ext);
            // console.log(ext_array);
        }
        if ($.inArray('mp4', ext_array) != -1 && ($.inArray('jpg', ext_array) != -1 || $.inArray('jpeg', ext_array) != -1 || $.inArray('gif', ext_array) != -1 || $.inArray('png', ext_array) != -1)) {
            //alert('Video and Image');
            formData.append('post_type','3');
        }
        else if($.inArray('mp4', ext_array) != -1){
          if(ext_array.length > 1){
              formData.append('post_type','3');
            }else{
              formData.append('post_type','2');
            }
          }
        else if($.inArray('jpg', ext_array) != -1 || $.inArray('jpeg', ext_array) != -1 || $.inArray('gif', ext_array) != -1 || $.inArray('png', ext_array) != -1){
          formData.append('post_type','1');
        }
        else{
          formData.append('post_type','0');
          // alert('Text Only');
        }
         var bg=$('.emojionearea-editor').css('background');
          if(bg!='rgba(0, 0, 0, 0) none repeat scroll 0% 0% / auto padding-box border-box')
          { 
            var getCanvas;
             html2canvas($('#screenshot'),{
            allowTaint:false,
            useCORS :true
          }).then(function (canvas) {
          // global variable
            // var element = $("#screenshot");
            // html2canvas(element, {
            // onrendered: function (canvas) {
           // $("#previewImage").append(canvas);
            getCanvas = canvas;
            var imgageData = getCanvas.toDataURL("image/png");             
            formData.append('imgageData',imgageData);
            run();
           });
        }

          else
          {
              run();
          }
            function run()
            {
              var posted_on = [];
              $.each($("input[name='optradio']:checked"), function(){
                  posted_on.push($(this).val());
              });
              var myString= posted_on.join(",");
              var arr=myString.split(',');
              for(var i=0;i<arr.length;i++)
              {
                if(arr[i]=='story')
                {
                  story();
                }
                else if(arr[i]=='post' && arr[i+1]=='story')
                {
                  post();
                  story();
                  break;
                }
                else
                {
                  post();
                }
            }
            function story()
            {
              $.ajax({
                url:"<?=base_url()?>Home/addstories",
                 type:"post",
                 data:formData,
                 contentType:false,
                 processData:false,
                 cache:false,

                success:function(response)
                {
                  console.log(response);
                  response=JSON.parse(response);
                  if(response.status==1){
                   // alert(response.msg);
                    // swal("Success", "Story Successfully", "success");
                    $("#add_post").trigger("reset");
                    location.reload();
                  }
                }
              });  
            }
            function post()
            {
                 $.ajax({
                    url:"<?=base_url()?>APIController/addPost",
                     type:"post",
                     data:formData,
                     contentType:false,
                     processData:false,
                     cache:false,

                    success:function(response)
                    {
                      // console.log(response);
                      response=JSON.parse(response);
                      if(response.status==1){
                        alert(response.msg);
                        // swal("Success", "Story Successfully", "success");
                        $("#add_post").trigger("reset");
                        location.reload();
                      }
                    }
                });  
              }
            }
          });


</script>

<script type="text/javascript">
  $(function() {
    $.fn.scrollBottom = function() {
        return $(document).height() - this.scrollTop() - this.height();
    };

    var $el = $('#w_t_follow');
    var $window = $(window);

    $window.bind("scroll resize", function() {
        var gap = $window.height() - $el.height() - 10;
        var visibleFoot = 630 - $window.scrollBottom();
        var scrollTop = $window.scrollTop()
        
        if(scrollTop < 630 + 10){
            $el.css({
                top: (630 - scrollTop) + "px",
                bottom: "auto"
            });
        }else if (visibleFoot > gap) {
            $el.css({
                top: "auto",
                bottom: visibleFoot + "px"
            });
        } else {
            $el.css({
                top: 80,
                bottom: "auto"
            });
        }
    });
});
</script>

<!-- <script type="text/javascript">
  $(document).on("click",".btn-comment",function(){
      $(this).parent().parent().parent().find(".comments_list").slideToggle();
  })
</script> -->


<script>
$(function () {

    // Initializes and creates emoji set from sprite sheet
    window.emojiPicker = new EmojiPicker({
        emojiable_selector: '[data-emojiable=true]',
        assetsPath: 'http://onesignal.github.io/emoji-picker/lib/img/',
          popupButtonClasses: 'fa fa-smile-o',
          events: {
            keyup: function (editor, event) {
              countChar(this);
                console.log(editor.html());
                console.log(this.getText());
            }
          }
    });

    window.emojiPicker.discover();
});
     
$(document).ready(function(){
  // var offset =5;
  // var limit=0;   
  var offset = 5;
  $(window).scroll(function() 
  {
    //console.log($(document).height() - $(window).height());
    if($(window).scrollTop() +1 >= $(document).height() - $(window).height()) {
      // limit=limit+5;
      // offset = limit + offset;
     
      getAjaxData(offset);
       offset = offset + 5;
      }
      // getAjaxData(offset);
      //  offset = offset + 5;
  });
})
// Timestamp JQUERY CONVERTER
function time2TimeAgo(ts) {
    // This function computes the delta between the
    // provided timestamp and the current time, then test
    // the delta for predefined ranges.

    var d=new Date();  // Gets the current time
    var nowTs = Math.floor(d.getTime()/1000); // getTime() returns milliseconds, and we need seconds, hence the Math.floor and division by 1000
    var seconds = nowTs-ts;

    // more that two days
    if (seconds > 2*24*3600) {
       return "a few days ago";
    }
    // a day
    if (seconds > 24*3600) {
       return "yesterday";
    }

    if (seconds > 3600) {
       return "a few hours ago";
    }
    if (seconds > 1800) {
       return "Half an hour ago";
    }
    if (seconds > 60) {
       return Math.floor(seconds/60) + " minutes ago";
    }
}


function getAjaxData(offset)
{
  console.log(offset);
  limit=5;
  $.ajax({
    url:"<?=base_url('APIController/scrollfetchpost')?>",
    type:"post",
    data:{offset:offset,limit:limit},
    success:function(res)
    { 
      res=JSON.parse(res); 
      console.log(res.data);   
      if(res.code==1)
      {
        var count=(res.data).length;
        var user_id=<?=$_SESSION['logged_in'][0]->user_id?>;
        var my_profilepic='<?=$MyDetails[0]->profile_picture?>';
        if(count>0)
        {
          var html='';
          for (var i=0; i<count; i++) 
          {
            
            if((res.data[i].post_type)==0)
            {
              html+='<div class="card mt-4 p-2"><div class="card-header"><div class="d-flex float-left"><div><a class="font-weight-bold" href="<?=base_url()?>Profile/'+res.data[i].posted_by+'"><img class="rounded-circle mr-2" src="<?=base_url()?>assets/uploads/images/'+res.data[i].profile_pic+'" width="40"  height="40"></a></div><div><a class="font-weight-bold " href="#">'+res.data[i].posted_by+'</a><br><small><time class="timeago" datetime="'+res.data[i].posted_on+'"></time></small></div></div>';
                html+='<div class="float-right d-flex mt-2">';
                html+='<div class="">';
                var count_fav=(res.data[i].fav).length;
                if(count_fav==0)
                {
                  html+='<span class="favrt" post_id="'+res.data[i].post_id+'" title="favourite"><i class="far fa-star"></i></span>';
                }
                else
                {
                  html+='<span class="favrt star" post_id="'+res.data[i].post_id+'" title="favourite"><i class="fas fa-star text-gold"></i></span>';
                } 
                html+='</div>';
                if(user_id==res.data[i].user_id)
                {
                  html+='<div class="dropdown ml-3"><button class="dropbtn"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></button><div class="dropdown-content bg-white"><a href="javascript:void(0)"  class="edit_post"  p_d="'+res.data[i].post_id+'">Edit</a><a href="javascript:void(0)" class="dlt_post_" p_d="'+res.data[i].post_id+'" >Delete</a></div></div></div>'; 
                }
              html+='</div></div>';
              // html+='</div>';
              html+='<div class="card-body text-justify"><p>'+res.data[i].post+'</p></div><div class="my-2 p-0"><div class="row m-0"><div class="col-md-4 manage "><div class="text-center px-3 py-1"><div class="btn-like d-flex" ><a href="javascript:void(0)" class="text-danger likePost" d-Post="'+res.data[i].post_id+'">';
              var countlikes=(res.data[i].likes_data).length;
              //console.log(countlikes);

              if((countlikes)>0)
              { 
                for(var j=0;j<countlikes;j++)
                { 
                  if(user_id==(res.data[i].likes_data[j].user_id))
                  { 
                    html+='<i class="fa fa-heart " aria-hidden="true"></i>';
                    break;
                  }
                  else
                  { 
                    html+='<i class="fa fa-heart-o" aria-hidden="true"></i>';
                  }
                }
              }
              else
              {
                html+='<i class="fa fa-heart-o" aria-hidden="true"></i>';
              }
              html+='Like</a>';
              html+='<ul class="list-unstyled d-flex m-0">';
              var sno=1;
              for(var j=0;j<countlikes;j++) 
              { 
                if(sno <= 5)
                {
                  if(sno==1)
                  {
                    html+='<li><img class="rounded-circle like_img " src="<?=base_url()?>assets/uploads/images/'+res.data[i].likes_data[j].profile_picture+'"></li>';
                  }
                  else
                  {
                    html+='<li><img class="rounded-circle like_img like_img_marg25" src="<?=base_url()?>assets/uploads/images/'+res.data[i].likes_data[j].profile_picture+'"></li>';
                  }
                }    
                sno++;
              }
              if((countlikes)>0)
              {
                html+='<li><div class=" like_cont likeValue rounded-circle like_img_marg25">'+res.data[i].total_likes+'</div></li>';
              }
              else
              { 
                html+='<li><div class=" like_cont likeValue rounded-circle ">'+res.data[i].total_likes+'</div></li>';
              }
              var countcomment=(res.data[i].total_comments).length;
              html+='</ul></div></div></div><div class="col-md-4 manage px-3 py-1"><div class="btn-comment post-btns"><a href="javascript:void(0)"><i class="fa fa-comment-o" aria-hidden="true"></i> Comments</a><span class="">'+countcomment+'</span></div></div>';
              html+='<div class="col-md-4 manage px-3 py-1"><div class="btn-share post-btns">';
              html+='<a href="javascript:void(0)" class="shareThisPost" d-ost="'+res.data[i].post_id+'"><i class="fa fa-share-square-o" aria-hidden="true"></i> Share</a>';
              html+='<span class="">'+res.data[i].total_share+'</span></div></div></div></div><hr>';
              html+='<div class=" comments_list border-top">';
              if((countcomment)>0)
              {
                for(var k=0; k < countcomment; k++)
                {
                  html+='<div class="row mt-2 px-2">';
                  html+='<div class="col-md-1">';
                  html+='<a href="<?=base_url()?>assets/uploads/images/'+res.data[i].total_comments[k].user_id+'"><img class="rounded-circle like_img" src="<?=base_url()?>assets/uploads/images/'+res.data[i].total_comments[k].profile_picture+'"></a></div>';
                  html+='<div class="col-md-10 comnt_text border-bottom">';
                  html+='<h6 class="font-weight-bold m-0" ><a href="<?=base_url()?>assets/uploads/images/'+res.data[i].total_comments[k].user_id+'">'+res.data[i].total_comments[k].full_name+'</a><small class="ml-3">'+res.data[i].total_comments[k].commented_on+'</small></h6>';
                  html+='<p class="">'+res.data[i].total_comments[k].comment+'</p></div>';
                 html+='<div class="col-md-1">';
                  if((user_id==res.data[i].user_id) || (user_id==res.data[i].total_comments[k].commented_by_))
                  {
                    html+='<div class="dropdown"><button class="dropbtn"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></button><div class="dropdown-content bg-white">';    
                    if(user_id==res.data[i].total_comments[k].commented_by_) 
                    {
                      html+='<a href="javascript:void(0)"  data-toggle="modal" data-target="#commntModal">Edit</a>';
                    }
                     html+='<a href="javascript:void(0)" class="dlt_comnt_" c_d="'+res.data[i].total_comments[k].id+'">Delete</a>';
                   
                   html+='</div></div>';
                  }
                  html+='</div></div>';
                } 
              }
              html+='<div class="p-2"><div class="d-flex m-0"><span> <img class="rounded-circle like_img" src="<?=base_url()?>assets/uploads/images/'+my_profilepic+'"></span>';
              html+='<form method="POST" class="w-100 ad_cmnt" >';
              html+='<div class="pl-2 w-100 _input">';
              html+='<p class="lead emoji-picker-container">';
              html+='<textarea class="input-field cmnt_" data-emojiable="true" type="text" name="comment"  placeholder="Add a Message"></textarea>';
              html+='</p>';
              html+='<input type="hidden" name="post_id"  class="poster_class" value="'+res.data[i].post_id+'">';
              html+='</div>';
              html+='</form>';
              html+='</div></div>';
              html+='</div></div>';
            }
            else if(res.data[i].post_type==1)
            {
              html+='<div class="card mt-4"><div class="card-header "><div class="d-flex float-left"><div>';
              html+='<a class="font-weight-bold" href="<?=base_url()?>Profile/'+res.data[i].posted_by+'">';
              html+='<img class="rounded-circle mr-2" src="<?=base_url()?>assets/uploads/images/'+res.data[i].profile_pic+'" width="40"  height="40">';
              html+='</a></div><div>';
              html+='<a class="font-weight-bold "  href="#">'+res.data[i].posted_by+'</a><span style="color:#616770">'+res.data[i].post_head+'</span><br><small><time class="timeago" datetime="'+res.data[i].posted_on+'"></time></small></div></div>';
                html+='<div class="float-right d-flex mt-2">';
                html+='<div class="">';
                var count_fav=(res.data[i].fav).length;
                if(count_fav==0)
                {
                  html+='<span class="favrt" post_id="'+res.data[i].post_id+'" title="favourite"><i class="far fa-star"></i></span>';
                }
                else
                {
                  html+='<span class="favrt star" post_id="'+res.data[i].post_id+'" title="favourite"><i class="fas fa-star text-gold"></i></span>';
                } 
                html+='</div>';
                if(user_id==res.data[i].user_id)
                {
                  html+='<div class="dropdown ml-3"><button class="dropbtn"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></button><div class="dropdown-content bg-white"><a href="javascript:void(0)"  class="edit_post"  p_d="'+res.data[i].post_id+'">Edit</a><a href="javascript:void(0)" class="dlt_post_" p_d="'+res.data[i].post_id+'" >Delete</a></div></div></div>'; 
                }
              html+='</div></div>';
              html+='<div class="card-body py-0">';
              if(res.data[i].post!=null){
                   html+='<p>'+res.data[i].post+'</p>';
              }
            
              var postimages=res.data[i].post_files;
              postimages=postimages.split(",");
              var countimg=postimages.length;
              if(countimg==2)
              {
                html+='<div class="post_img row">';
                for (var m=0; m < countimg; m++) 
                {
                  html+='<div class="col-md-6 p-3">';
                    html+='<a class="" href="<?=base_url()?>Post/viewPost/'+res.data[i].post_id+'"><img class="img img-fluid d-block post_image rounded" src="<?=base_url()?>assets/uploads/images/'+postimages[m]+'"></a>';
                  html+='</div>';
                }
                html+='</div>';
              }
              else if (countimg==3) 
              {
                html+='<div class="post_img row">';
                html+='<div class="col-md-12 p-3">';
                html+='<a class="" href="<?=base_url()?>Post/viewPost/'+res.data[i].post_id+'"><img class="img img-fluid d-block post_image rounded" src="<?=base_url()?>assets/uploads/images/'+postimages[0]+'"></a>';
                html+='</div>';
                for (var m=1; m < countimg; m++) 
                {
                  html+='<div class="col-md-6">';
                  html+='<a class="" href="<?=base_url()?>Post/viewPost/'+res.data[i].post_id+'"><img class="img img-fluid d-block ext_img rounded" src="<?=base_url()?>assets/uploads/images/'+postimages[m]+'"></a>';
                  html+='</div>';
                }
                  html+='</div>';
              }
              else if(countimg ==4) 
              {
                html+='<div class="post_img row">';
                for (var m=0; m < countimg; m++) 
                {
                  html+='<div class="col-md-6 pt-3">';
                  html+='<a class="" href="<?=base_url()?>Post/viewPost/'+res.data[i].post_id+'"><img class="img img-fluid d-block ext_img rounded"  src="<?=base_url()?>assets/uploads/images/'+postimages[m]+'"></a>';
                  html+='</div>';
                }
                html+='</div>';
              }
              else if (countimg>4) 
              {
                html+='<div class="post_img row">';
                for (var m=0; m <3; m++) 
                {
                  html+='<div class="col-md-6 pt-3">';
                  html+='<a class="" href="<?=base_url()?>Post/viewPost/'+res.data[i].post_id+'">';
                  html+='<img class="img img-fluid d-block ext_img rounded"  src="<?=base_url()?>assets/uploads/images/'+postimages[m]+'"></a>';
                  html+='</div>';
                }
                html+='<div class="col-md-6 p-2 text-center">';
                html+='<a class="" href="<?=base_url()?>Post/viewPost/'+res.data[i].post_id+'">';
                html+='<img class="img img-fluid d-block  post_image rounded"  src="<?=base_url()?>assets/uploads/images/'+postimages[4]+'"></a>';
                html+='<div class="position-absolute h-100 w-100 bg-dark " style="left: 0%;top:0px;padding-top: 8rem !important;opacity: 0.5">';
                html+='</div>';
                html+='<a class="position-absolute" href="#" style="top:115px"> <h2 class="text-white"><strong>'+((countimg)-4)+'+</strong></h2></a>';
                html+='</div>';   
                html+='</div>';
              }
              else
              {
                html+='<div class="post_img row">';
                html+='<div class="col-md p-3">';
                html+='<a class="d-flex justify-content-center" href="<?=base_url()?>Post/viewPost/'+res.data[i].post_id+'"><img class="img img-fluid d-block rounded" src="<?=base_url()?>assets/uploads/images/'+postimages[0]+'"></a>';
                html+='</div>';
                html+='</div>';
              }
              html+='</div>';
              html+='<div class="my-2 p-0">';
              html+='<div class="d-flex text-center">';
              html+='<div class="col-md-4 manage">';
              html+='<div class="text-center px-3 py-1">';
              html+='<div class="btn-like d-flex"><a href="javascript:void(0)" class="text-danger likePost" d-Post="'+res.data[i].post_id+'">';
               var countlikes=(res.data[i].likes_data).length;
              //console.log(countlikes);

              if((countlikes)>0)
              { 
                for(var j=0;j<countlikes;j++)
                { 
                  if(user_id==(res.data[i].likes_data[j].user_id))
                  { 
                    html+='<i class="fa fa-heart " aria-hidden="true"></i>';
                    break;
                  }
                  else
                  { 
                    html+='<i class="fa fa-heart-o" aria-hidden="true"></i>';
                  }
                }
              }
              else
              {
                html+='<i class="fa fa-heart-o" aria-hidden="true"></i>';
              }
              html+='Like</a>';
              html+='<ul class="list-unstyled d-flex m-0">';
              var sno=1;
              for(var j=0;j<countlikes;j++) 
              { 
                if(sno <= 5)
                {
                  if(sno==1)
                  {
                    html+='<li><img class="rounded-circle like_img " src="<?=base_url()?>assets/uploads/images/'+res.data[i].likes_data[j].profile_picture+'"></li>';
                  }
                  else
                  {
                    html+='<li><img class="rounded-circle like_img like_img_marg25" src="<?=base_url()?>assets/uploads/images/'+res.data[i].likes_data[j].profile_picture+'"></li>';
                  }
                }    
                sno++;
              }
              if((countlikes)>0)
              {
                html+='<li><div class=" like_cont likeValue rounded-circle like_img_marg25">'+res.data[i].total_likes+'</div></li>';
              }
              else
              { 
                html+='<li><div class=" like_cont likeValue rounded-circle ">'+res.data[i].total_likes+'</div></li>';
              }
              var countcomment=(res.data[i].total_comments).length;
              html+='</ul></div></div></div><div class="col-md-4 manage px-3 py-1"><div class="btn-comment post-btns"><a href="javascript:void(0)"><i class="fa fa-comment-o" aria-hidden="true"></i> Comments</a><span class="">'+countcomment+'</span></div></div>';
              html+='<div class="col-md-4 manage px-3 py-1"><div class="btn-share post-btns">';
              html+='<a href="javascript:void(0)" class="shareThisPost" d-ost="'+res.data[i].post_id+'"><i class="fa fa-share-square-o" aria-hidden="true"></i> Share</a>';
              html+='<span class="">'+res.data[i].total_share+'</span></div></div></div></div><hr>';
              html+='<div class=" comments_list border-top">';
              if((countcomment)>0)
              {
                for(var k=0; k < countcomment; k++)
                {
                  html+='<div class="row mt-2 px-2">';
                  html+='<div class="col-md-1">';
                  html+='<a href="<?=base_url()?>assets/uploads/images/'+res.data[i].total_comments[k].user_id+'"><img class="rounded-circle like_img" src="<?=base_url()?>assets/uploads/images/'+res.data[i].total_comments[k].profile_picture+'"></a></div>';
                  html+='<div class="col-md-10 comnt_text border-bottom">';
                  html+='<h6 class="font-weight-bold m-0" ><a href="<?=base_url()?>assets/uploads/images/'+res.data[i].total_comments[k].user_id+'">'+res.data[i].total_comments[k].full_name+'</a><small class="ml-3">'+res.data[i].total_comments[k].commented_on+'</small></h6>';
                  html+='<p class="">'+res.data[i].total_comments[k].comment+'</p></div>';
                 html+='<div class="col-md-1">';
                  if((user_id==res.data[i].user_id) || (user_id==res.data[i].total_comments[k].commented_by_))
                  {
                    html+='<div class="dropdown"><button class="dropbtn"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></button><div class="dropdown-content bg-white">';    
                    if(user_id==res.data[i].total_comments[k].commented_by_) 
                    {
                      html+='<a href="javascript:void(0)"  data-toggle="modal" data-target="#commntModal">Edit</a>';
                    }
                     html+='<a href="javascript:void(0)" class="dlt_comnt_" c_d="'+res.data[i].total_comments[k].id+'">Delete</a>';
                   
                   html+='</div></div>';
                  }
                  html+='</div></div>';
                } 
              }
              html+='<div class="p-2"><div class="d-flex m-0"><span> <img class="rounded-circle like_img" src="<?=base_url()?>assets/uploads/images/'+my_profilepic+'"></span>';
              html+='<form method="POST" class="w-100 ad_cmnt" >';
              html+='<div class="pl-2 w-100 _input">';
              html+='<p class="lead emoji-picker-container">';
              html+='<textarea class="input-field cmnt_" data-emojiable="true" type="text" name="comment"  placeholder="Add a Message"></textarea>';
              html+='</p>';
              html+='<input type="hidden" class="poster_class" name="post_id" value="'+res.data[i].post_id+'">';
              html+='</div>';
              html+='</form>';
              html+='</div></div>';
              html+='</div></div>';

            }
            else if(res.data[i].post_type==3)
            {
              html+='<div class="card mt-4 p-2"><div class="card-header border-0"><div class="d-flex float-left"><div>';
              html+='<a class="font-weight-bold" href="<?=base_url()?>Profile/'+res.data[i].posted_by+'">';
              html+='<img class="rounded-circle mr-2" src="<?=base_url()?>assets/uploads/images/'+res.data[i].profile_pic+'" width="40"  height="40">';
              html+='</a></div><div>';
              html+='<a class="font-weight-bold "  href="<?=base_url()?>Profile/'+res.data[i].posted_by+'">'+res.data[i].posted_by+'</a><br><small><time class="timeago" datetime="'+res.data[i].posted_on+'"></time></small></div></div>';
                html+='<div class="float-right d-flex mt-2">';
                html+='<div class="">';
                var count_fav=(res.data[i].fav).length;
                if(count_fav==0)
                {
                  html+='<span class="favrt" post_id="'+res.data[i].post_id+'" title="favourite"><i class="far fa-star"></i></span>';
                }
                else
                {
                  html+='<span class="favrt star" post_id="'+res.data[i].post_id+'" title="favourite"><i class="fas fa-star text-gold"></i></span>';
                } 
                html+='</div>';
                if(user_id==res.data[i].user_id)
                {
                  html+='<div class="dropdown ml-3"><button class="dropbtn"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></button><div class="dropdown-content bg-white"><a href="javascript:void(0)"  class="edit_post"  p_d="'+res.data[i].post_id+'">Edit</a><a href="javascript:void(0)" class="dlt_post_" p_d="'+res.data[i].post_id+'" >Delete</a></div></div></div>'; 
                }
              html+='</div></div>';
              html+='<div class="card-body py-0">';
              if(res.data[i].post!=null){
                   html+='<p>'+res.data[i].post+'</p>';
              }
            
              var postimages=res.data[i].post_files;
              postimages=postimages.split(",");
              var countimg=postimages.length;
              if(countimg==2)
              {
                html+='<div class="post_img row">';
                for (var m=0; m < countimg; m++) 
                {
                  // var file_ext = postimages[m].split('.').pop();
                  var file_ext = postimages[m].split('.').pop().toLowerCase();
                  if(file_ext=='mp4')
                  {
                    var video='<?=base_url()?>assets/uploads/videos/'+postimages[m]+'';
                    html+='<div class="col-md-6 p-3">';
                      html+='<a class="" href="<?=base_url()?>Post/viewPost/'+res.data[i].post_id+'"><video controls class="w-100"><source src="'+video+'" type="video/mp4">Your browser does not support the video tag.</video></a>';
                    html+='</div>';
                  }
                  else
                  {
                     var image='<?=base_url()?>assets/uploads/images/'+postimages[m]+'';
                    html+='<div class="col-md-6 p-3">';
                      html+='<a class="" href="<?=base_url()?>Post/viewPost/'+res.data[i].post_id+'"><img class="img img-fluid d-block post_image rounded" src="'+image+'"></a>';
                     html+='</div>';
                  }
                }
                  html+='</div>';  
              }
              else if (countimg==3) 
              { html+='<div class="post_img row">';
                  var file_ext = postimages[0].split('.').pop().toLowerCase();
                  if(file_ext=='mp4')
                  {
                    var video='<?=base_url()?>assets/uploads/videos/'+postimages[0]+'';
                    html+='<div class="col-md-12 p-3">';
                    html+='<a class="" href="<?=base_url()?>Post/viewPost/'+res.data[i].post_id+'"><video controls class="w-100"><source src="'+video+'" type="video/mp4">Your browser does not support the video tag.</video></a>';
                    html+='</div>';
                  }
                  else
                  {
                    var image='<?=base_url()?>assets/uploads/images/'+postimages[0]+'';
                    html+='<div class="col-md-12 p-3">';
                     html+='<a class=""href="<?=base_url()?>Post/viewPost/'+res.data[i].post_id+'"><img class="img img-fluid d-block post_image rounded" src="'+image+'"></a>';
                    html+='</div>';
                  }
                  for (var m=1; m < countimg; m++) 
                  {
                    var file_ext = postimages[m].split('.').pop().toLowerCase();
                    if(file_ext=='mp4')
                    {
                      var video='<?=base_url()?>assets/uploads/videos/'+postimages[m]+'';
                      html+='<div class="col-md-6 p-3">';
                        html+='<a class="" href="<?=base_url()?>Post/viewPost/'+res.data[i].post_id+'"><video controls class="w-100"><source src="'+video+'" type="video/mp4">Your browser does not support the video tag.</video></a>';
                      html+='</div>';
                    }
                    else
                    {
                       var image='<?=base_url()?>assets/uploads/images/'+postimages[m]+'';
                      html+='<div class="col-md-6 p-3">';
                        html+='<a class=""href="<?=base_url()?>Post/viewPost/'+res.data[i].post_id+'"><img class="img img-fluid d-block post_image rounded" src="'+image+'"></a>';
                       html+='</div>';
                    }
                  }
                  html+='</div>';
              }
              else if(countimg ==4) 
              {
                html+='<div class="post_img row">';
                for (var m=0; m < countimg; m++) 
                {
                  var file_ext = postimages[m].split('.').pop().toLowerCase();
                  if(file_ext=='mp4')
                  {
                    var video='<?=base_url()?>assets/uploads/videos/'+postimages[m]+'';
                    html+='<div class="col-md-6 p-3">';
                      html+='<a class="" href="<?=base_url()?>Post/viewPost/'+res.data[i].post_id+'"><video controls class="w-100"><source src="'+video+'" type="video/mp4">Your browser does not support the video tag.</video></a>';
                    html+='</div>';
                  }
                  else
                  {
                     var image='<?=base_url()?>assets/uploads/images/'+postimages[m]+'';
                    html+='<div class="col-md-6 p-3">';
                      html+='<a class=""href="<?=base_url()?>Post/viewPost/'+res.data[i].post_id+'"><img class="img img-fluid d-block post_image rounded" src="'+image+'"></a>';
                     html+='</div>';
                  }
                }
                html+='</div>';
              }
              else if (countimg>4) 
              {
                html+='<div class="post_img row">';
                for (var m=0; m <3; m++) 
                {
                  var file_ext = postimages[m].split('.').pop().toLowerCase();
                    if(file_ext=='mp4')
                    {
                      var video='<?=base_url()?>assets/uploads/videos/'+postimages[m]+'';
                      html+='<div class="col-md-6 p-3">';
                        html+='<a class="" href="<?=base_url()?>Post/viewPost/'+res.data[i].post_id+'"><video controls class="w-100"><source src="'+video+'" type="video/mp4">Your browser does not support the video tag.</video></a>';
                      html+='</div>';
                    }
                    else
                    {
                       var image='<?=base_url()?>assets/uploads/images/'+postimages[m]+'';
                      html+='<div class="col-md-6 p-3">';
                        html+='<a class=""href="<?=base_url()?>Post/viewPost/'+res.data[i].post_id+'"><img class="img img-fluid d-block post_image rounded" src="'+image+'"></a>';
                       html+='</div>';
                    }
                }
                var file_ext = postimages[0].split('.').pop().toLowerCase();
                  if(file_ext=='mp4')
                  {
                    var video='<?=base_url()?>assets/uploads/videos/'+postimages[0]+'';
                    html+='<div class="col-md-6 p-2 text-center">';
                    html+='<a class="" href="<?=base_url()?>Post/viewPost/'+res.data[i].post_id+'"><video controls class="w-100"><source src="'+video+'" type="video/mp4">Your browser does not support the video tag.</video></a>';
                    html+='<div class="position-absolute h-100 w-100 bg-dark " style="left: 0%;top:0px;padding-top: 8rem !important;opacity: 0.5">';
                    html+='</div>';
                    html+='<a class="position-absolute" href="#" style="top:115px"> <h2 class="text-white"><strong>'+((countimg)-4)+'+</strong></h2></a>';
                   html+='</div>';   
                    html+='</div>';
                  }
                  else
                  {
                    var image='<?=base_url()?>assets/uploads/images/'+postimages[0]+'';
                    html+='<div class="col-md-6 p-2 text-center">';
                    html+='<a class=""href="<?=base_url()?>Post/viewPost/'+res.data[i].post_id+'"><img class="img img-fluid d-block post_image rounded" src="'+image+'"></a>';
                    html+='<div class="position-absolute h-100 w-100 bg-dark " style="left: 0%;top:0px;padding-top: 8rem !important;opacity: 0.5">';
                    html+='</div>';
                    html+='<a class="position-absolute" href="#" style="top:115px"> <h2 class="text-white"><strong>'+((countimg)-4)+'+</strong></h2></a>';
                   html+='</div>';   
                    html+='</div>';
                  }
              
              }
              else
              {
                html+='<div class="post_img row">';
                var file_ext = postimages[0].split('.').pop().toLowerCase();
                if(file_ext=='mp4')
                {
                  var video='<?=base_url()?>assets/uploads/videos/'+postimages[0]+'';
                  html+='<div class="col-md p-2">';
                    html+='<a class="" href="<?=base_url()?>Post/viewPost/'+res.data[i].post_id+'"><video controls class="w-100"><source src="'+video+'" type="video/mp4">Your browser does not support the video tag.</video></a>';
                  html+='</div>';
                }
                else
                {
                   var image='<?=base_url()?>assets/uploads/images/'+postimages[0]+'';
                  html+='<div class="col-md-6 p-2">';
                    html+='<a class="d-flex justify-content-center" href="<?=base_url()?>Post/viewPost/'+res.data[i].post_id+'"><img class="img img-fluid d-block post_image rounded" src="'+image+'"></a>';
                   html+='</div>';
                }
                html+='</div>';
              }
              html+='</div>';
              html+='<div class="my-2 p-0">';
              html+='<div class="d-flex text-center">';
              html+='<div class="col-md-4 manage">';
              html+='<div class="text-center px-3 py-1">';
              html+='<div class="btn-like d-flex"><a href="javascript:void(0)" class="text-danger likePost" d-Post="'+res.data[i].post_id+'">';
               var countlikes=(res.data[i].likes_data).length;
              //console.log(countlikes);

              if((countlikes)>0)
              { 
                for(var j=0;j<countlikes;j++)
                { 
                  if(user_id==(res.data[i].likes_data[j].user_id))
                  { 
                    html+='<i class="fa fa-heart " aria-hidden="true"></i>';
                    break;
                  }
                  else
                  { 
                    html+='<i class="fa fa-heart-o" aria-hidden="true"></i>';
                  }
                }
              }
              else
              {
                html+='<i class="fa fa-heart-o" aria-hidden="true"></i>';
              }
              html+='Like</a>';
              html+='<ul class="list-unstyled d-flex m-0">';
              var sno=1;
              for(var j=0;j<countlikes;j++) 
              { 
                if(sno <= 5)
                {
                  if(sno==1)
                  {
                    html+='<li><img class="rounded-circle like_img " src="<?=base_url()?>assets/uploads/images/'+res.data[i].likes_data[j].profile_picture+'"></li>';
                  }
                  else
                  {
                    html+='<li><img class="rounded-circle like_img like_img_marg25" src="<?=base_url()?>assets/uploads/images/'+res.data[i].likes_data[j].profile_picture+'"></li>';
                  }
                }    
                sno++;
              }
              if((countlikes)>0)
              {
                html+='<li><div class=" like_cont likeValue rounded-circle like_img_marg25">'+res.data[i].total_likes+'</div></li>';
              }
              else
              { 
                html+='<li><div class=" like_cont likeValue rounded-circle ">'+res.data[i].total_likes+'</div></li>';
              }
              var countcomment=(res.data[i].total_comments).length;
              html+='</ul></div></div></div><div class="col-md-4 manage px-3 py-1"><div class="btn-comment post-btns"><a href="javascript:void(0)"><i class="fa fa-comment-o" aria-hidden="true"></i> Comments</a><span class="">'+countcomment+'</span></div></div>';
              html+='<div class="col-md-4 manage px-3 py-1"><div class="btn-share post-btns">';
              html+='<a href="javascript:void(0)" class="shareThisPost" d-ost="'+res.data[i].post_id+'"><i class="fa fa-share-square-o" aria-hidden="true"></i> Share</a>';
              html+='<span class="">'+res.data[i].total_share+'</span></div></div></div></div><hr>';
              html+='<div class=" comments_list border-top">';
              if((countcomment)>0)
              {
                for(var k=0; k < countcomment; k++)
                {
                  html+='<div class="row mt-2 px-2">';
                  html+='<div class="col-md-1">';
                  html+='<a href="<?=base_url()?>assets/uploads/images/'+res.data[i].total_comments[k].user_id+'"><img class="rounded-circle like_img" src="<?=base_url()?>assets/uploads/images/'+res.data[i].total_comments[k].profile_picture+'"></a></div>';
                  html+='<div class="col-md-10 comnt_text border-bottom">';
                  html+='<h6 class="font-weight-bold m-0" ><a href="<?=base_url()?>assets/uploads/images/'+res.data[i].total_comments[k].user_id+'">'+res.data[i].total_comments[k].full_name+'</a><small class="ml-3">'+res.data[i].total_comments[k].commented_on+'</small></h6>';
                  html+='<p class="">'+res.data[i].total_comments[k].comment+'</p></div>';
                 html+='<div class="col-md-1">';
                  if((user_id==res.data[i].user_id) || (user_id==res.data[i].total_comments[k].commented_by_))
                  {
                    html+='<div class="dropdown"><button class="dropbtn"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></button><div class="dropdown-content bg-white">';    
                    if(user_id==res.data[i].total_comments[k].commented_by_) 
                    {
                      html+='<a href="javascript:void(0)"  data-toggle="modal" data-target="#commntModal">Edit</a>';
                    }
                     html+='<a href="javascript:void(0)" class="dlt_comnt_" c_d="'+res.data[i].total_comments[k].id+'">Delete</a>';
                   
                   html+='</div></div>';
                  }
                  html+='</div></div>';
                } 
              }
              html+='<div class="p-2"><div class="d-flex m-0"><span> <img class="rounded-circle like_img" src="<?=base_url()?>assets/uploads/images/'+my_profilepic+'"></span>';
              html+='<form method="POST" class="w-100 ad_cmnt" >';
              html+='<div class="pl-2 w-100 _input">';
              html+='<p class="lead emoji-picker-container">';
              html+='<textarea class="input-field cmnt_" data-emojiable="true" type="text" name="comment"  placeholder="Add a Message"></textarea>';
              html+='</p>';
              html+='<input type="hidden" class="poster_class" name="post_id" value="'+res.data[i].post_id+'">';
              html+='</div>';
              html+='</form>';
              html+='</div></div>';
              html+='</div></div>';

            }



            else
            {                    
             html+='<div class="card mt-4 p-2"><div class="card-header"><div class="d-flex float-left"><div><a class="font-weight-bold" href="<?=base_url()?>Profile/'+res.data[i].posted_by+'"><img class="rounded-circle mr-2" src="<?=base_url()?>assets/uploads/images/'+res.data[i].profile_pic+'" width="40"  height="40"></a></div><div><a class="font-weight-bold " href="#">'+res.data[i].posted_by+'</a><br><small><time class="timeago" datetime="'+res.data[i].posted_on+'"></time></small></div></div>';
                html+='<div class="float-right d-flex mt-2">';
                html+='<div class="">';
                var count_fav=(res.data[i].fav).length;
                if(count_fav==0)
                {
                  html+='<span class="favrt" post_id="'+res.data[i].post_id+'" title="favourite"><i class="far fa-star"></i></span>';
                }
                else
                {
                  html+='<span class="favrt star" post_id="'+res.data[i].post_id+'" title="favourite"><i class="fas fa-star text-gold"></i></span>';
                } 
                html+='</div>';
                if(user_id==res.data[i].user_id)
                {
                  html+='<div class="dropdown ml-3"><button class="dropbtn"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></button><div class="dropdown-content bg-white"><a href="javascript:void(0)"  class="edit_post"  p_d="'+res.data[i].post_id+'">Edit</a><a href="javascript:void(0)" class="dlt_post_" p_d="'+res.data[i].post_id+'" >Delete</a></div></div></div>'; 
                }
              html+='</div>';
              // html+='</div>';
              html+='<div class="card-body">';
              html+='<p>'+res.data[i].post+'</p>';
              html+='<div class="">';
              html+=' <a class="" href="<?=base_url()?>Post/viewPost/'+res.data[i].post_id+'"><video controls class="w-100">';
              html+='<source src="<?=base_url()?>assets/uploads/videos/'+res.data[i].post_files+'" type="video/mp4">';
              html+='</video></a>';
              html+='</div>';
              html+='</div>';  
              html+='<div class="my-2 p-0">';
              html+='<div class="d-flex text-center">';
              html+='<div class="col-md-4 manage">';
              html+='<div class="text-center px-3 py-1">';
              html+='<div class="btn-like d-flex"><a href="javascript:void(0)" class="text-danger likePost" d-Post="'+res.data[i].post_id+'">';
               var countlikes=(res.data[i].likes_data).length;
              //console.log(countlikes);

              if((countlikes)>0)
              { 
                for(var j=0;j<countlikes;j++)
                { 
                  if(user_id==(res.data[i].likes_data[j].user_id))
                  { 
                    html+='<i class="fa fa-heart " aria-hidden="true"></i>';
                    break;
                  }
                  else
                  { 
                    html+='<i class="fa fa-heart-o" aria-hidden="true"></i>';
                  }
                }
              }
              else
              {
                html+='<i class="fa fa-heart-o" aria-hidden="true"></i>';
              }
              html+='Like</a>';
              html+='<ul class="list-unstyled d-flex m-0">';
              var sno=1;
              for(var j=0;j<countlikes;j++) 
              { 
                if(sno <= 5)
                {
                  if(sno==1)
                  {
                    html+='<li><img class="rounded-circle like_img " src="<?=base_url()?>assets/uploads/images/'+res.data[i].likes_data[j].profile_picture+'"></li>';
                  }
                  else
                  {
                    html+='<li><img class="rounded-circle like_img like_img_marg25" src="<?=base_url()?>assets/uploads/images/'+res.data[i].likes_data[j].profile_picture+'"></li>';
                  }
                }    
                sno++;
              }
              if((countlikes)>0)
              {
                html+='<li><div class=" like_cont likeValue rounded-circle like_img_marg25">'+res.data[i].total_likes+'</div></li>';
              }
              else
              { 
                html+='<li><div class=" like_cont likeValue rounded-circle ">'+res.data[i].total_likes+'</div></li>';
              }
              var countcomment=(res.data[i].total_comments).length;
              html+='</ul></div></div></div><div class="col-md-4 manage px-3 py-1"><div class="btn-comment post-btns"><a href="javascript:void(0)"><i class="fa fa-comment-o" aria-hidden="true"></i> Comments</a><span class="">'+countcomment+'</span></div></div>';
              html+='<div class="col-md-4 manage px-3 py-1"><div class="btn-share post-btns">';
              html+='<a href="javascript:void(0)" class="shareThisPost" d-ost="'+res.data[i].post_id+'"><i class="fa fa-share-square-o" aria-hidden="true"></i> Share</a>';
              html+='<span class="">'+res.data[i].total_share+'</span></div></div></div></div><hr>';
              html+='<div class=" comments_list border-top">';
              if((countcomment)>0)
              {
                for(var k=0; k < countcomment; k++)
                {
                  html+='<div class="row mt-2 px-2">';
                  html+='<div class="col-md-1">';
                  html+='<a href="<?=base_url()?>assets/uploads/images/'+res.data[i].total_comments[k].user_id+'"><img class="rounded-circle like_img" src="<?=base_url()?>assets/uploads/images/'+res.data[i].total_comments[k].profile_picture+'"></a></div>';
                  html+='<div class="col-md-10 comnt_text border-bottom">';
                  html+='<h6 class="font-weight-bold m-0" ><a href="<?=base_url()?>assets/uploads/images/'+res.data[i].total_comments[k].user_id+'">'+res.data[i].total_comments[k].full_name+'</a><small class="ml-3">'+res.data[i].total_comments[k].commented_on+'</small></h6>';
                  html+='<p class="">'+res.data[i].total_comments[k].comment+'</p></div>';
                 html+='<div class="col-md-1">';
                  if((user_id==res.data[i].user_id) || (user_id==res.data[i].total_comments[k].commented_by_))
                  {
                    html+='<div class="dropdown"><button class="dropbtn"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></button><div class="dropdown-content bg-white">';    
                    if(user_id==res.data[i].total_comments[k].commented_by_) 
                    {
                      html+='<a href="javascript:void(0)"  data-toggle="modal" data-target="#commntModal">Edit</a>';
                    }
                     html+='<a href="javascript:void(0)" class="dlt_comnt_" c_d="'+res.data[i].total_comments[k].id+'">Delete</a>';
                   
                   html+='</div></div>';
                  }
                  html+='</div></div>';
                } 
              }
              html+='<div class="p-2"><div class="d-flex m-0"><span> <img class="rounded-circle like_img" src="<?=base_url()?>assets/uploads/images/'+my_profilepic+'"></span>';
              html+='<form method="POST" class="w-100 ad_cmnt" >';
              html+='<div class="pl-2 w-100 _input">';
              html+='<p class="lead emoji-picker-container">';
              html+='<textarea class="input-field cmnt_" data-emojiable="true" type="text" name="comment"  placeholder="Add a Message"></textarea>';
              html+='</p>';
              html+='<input type="hidden" class="poster_class" name="post_id" value="'+res.data[i].post_id+'">';
              html+='</div>';
              html+='</form>';
              html+='</div></div>';
              html+='</div></div></div>';
              
            }
             // $("#pst_shw_").empty();
            
          }       
          $("#pst_shw_").append(html);  
          $(function () {
              // Initializes and creates emoji set from sprite sheet
              window.emojiPicker = new EmojiPicker({
                  emojiable_selector: '[data-emojiable=true]',
                  assetsPath: 'http://onesignal.github.io/emoji-picker/lib/img/',
                    popupButtonClasses: 'fa fa-smile-o',
                    events: {
                      keyup: function (editor, event) {
                        countChar(this);
                          console.log(editor.html());
                          console.log(this.getText());
                      }
                    }
              });
             window.emojiPicker.discover();
          });               
           $(".timeago").timeago();
        }
      }
    }
  });
} 
</script>
     <script type="text/javascript">
      $(document).on('click','.shareThisPost',function(){
        var postId=$(this).attr('d-ost');
        //console.log("Posted Id: "+postId);
        $.ajax({
          url:"<?=base_url('APIController/sharePost')?>",
          type:"post",
          data:{post_id:postId},
          success:function(res){
            res=JSON.parse(res);
            if(res.code==1){
              location.reload();
            }
          }
        });
      });
         // $(document).ready(function() {
         //  alert("sdadasd");
         //    $(".timeago").each(function(){
         //        $(this).timeago();

         //    });
         //  });
      </script>



<!-- <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.."> -->

<!-- <table id="myTable">
  <tr class="header">
    <th style="width:60%;">Name</th>
    <th style="width:40%;">Country</th>
  </tr>
  <tr>
    <td>Alfreds Futterkiste</td>
    <td>Germany</td>
  </tr>
  <tr>
    <td>Berglunds snabbkop</td>
    <td>Sweden</td>
  </tr>
  <tr>
    <td>Island Trading</td>
    <td>UK</td>
  </tr>
  <tr>
    <td>Koniglich Essen</td>
    <td>Germany</td>
  </tr>
</table>


<script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script> -->
<script>
  $(document).on('click','.jobposter',function(){
    var job_id = $(this).attr('job_id');
    $('#jobpost_id').val(job_id);
    $('#jobsModal').modal('show');
  })

  $(document).ready(function(){
    $("#add_resume").submit(function(e){
        e.preventDefault();
        var formData= new FormData($(this)[0]);
        $.ajax({
            url:"<?=base_url()?>APIController/upload_resume",
             type:"post",
             data:formData,
             contentType:false,
             processData:false,
             cache:false,

            success:function(response)
            {
              if (response==1) {
                swal('Success','Resume Uploaded Successfully','success');
                $('#jobsModal').modal('hide');
              }
              else{
                swal('OOPS','Please upload resume in pdf,docx or doc format','warning');
              }
                // if(response=="1"){
                //   alert("Size Added Successfully");
                //   $("#fresher").load(location.href + " #fresher");
                //   $('#size').trigger("reset");
                // }
                // else{
                //   alert("Failed");
                // }
                //location.reload();
            }
        });
    });
});
</script>
<!-- Jobs Modal -->
<div class="modal fade" id="jobsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Apply For Job</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="">
          <form id="add_resume">
            <label class="author">Upload Resume
               <input type="file" name="file"  accept=".pdf,.docx,.doc" required="">
            </label>
            <input type="hidden" value="" name="jobpost_id" id="jobpost_id">
            <div class="text-center">
              <button class="btn btn-success" type="submit">Apply</button>
            </div>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
      </div>
    </div>
  </div>
</div>

          <!-- addJobsModal -->
<div class="modal fade" id="addJobsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Jobs</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="">
          <form class="" id="jobpost" method="" action="">
             <div class="row px-3">
              <label class="form-group w-100">Company Name
                <input type="text" class="form-control" name="jobpost_company" placeholder="Company Name" required="">
              </label>
            </div>
             <div class="row px-3">
              <label class="form-group w-100">Job Title
                <input type="text" class="form-control" name="jobpost_title" placeholder="Job Title" required="">
              </label>
            </div>
             <div class="row px-3">
              <label class="form-group w-100">Job Description<br>
                <textarea name="jobpost_description" class="form-control"  placeholder="Job Description" required=""></textarea>
              </label>
              </div>
            <div class="row">
                <div class="col-md-4">
               <label><strong>Country </strong>:</label>
                  	<select  class="countries order-alpha input-style form-control " autocomplete="false" required name="country" id="countryId__">
						<option value="">Select Country</option>
						<?php
                      foreach ($fetchCountries as $FC) 
                      {
                        echo '<option value="'.$FC->country_id.'">'.$FC->name.'</option>';
            
                      }
                      ?>  
					</select></div>
					  <div class="col-md-4">
                      <label><strong>State </strong>:</label>
                	<select name="state" class="states order-alpha input-style form-control " autocomplete="false" required id="stateId">
						<option value="0">Select State</option>
					
					</select>
              </div>
              <div class="col-md-3">
                    <label><strong>City </strong>:</label>
                	<select name="city" class="cities order-alpha cit input-style form-control " autocomplete="false" required id="cityId">
						<option value="0">Select City</option>
					</select>
              </div>
					
            </div>
             
              <div class="row">
                <div class="col-md-6">
                  <label class="form-group w-100">Salary
                    <input type="number" class="form-control" name="jobpost_salary" placeholder="Salary" required=""> 
                  </label>
                </div>
                <div class="col-md-6">
                  <label class="form-group w-100">Salary Type
                    <select name="jobpost_salarytype" class="form-control" required="">
                      <option selected="" disabled="">Select Type</option>
                      <option value=" hour">per hour</option>
                      <option value=" day">per day</option>
                      <option value=" week">per week</option>
                      <option value=" two weeks">per two weeks</option>
                      <option value=" month">per month</option>
                      <option value=" year">per year</option>
                      <option value=" time">one time</option>
                    </select>
                  </label>
                </div>
              </div>
              <div class="row px-3">
                <label class="form-group w-100">Job Type
                  <select name="jobpost_jobtype" class="form-control" required="">
                    <option selected="" disabled="">Select Type</option>
                    <option value="Full-time">Full-time</option>
                    <option value="Part-time">Part-time</option>
                    <option value="Internship">Internship</option>
                    <option value="Volunteer">Volunteer</option>
                    <option value="Contract">Contract</option>
                
                  </select>
                </label>
              </div>  
             
              <div class="row px-3"> 
              <label class="form-group w-100">Image
                <input type="file" name="userfile" > 
              </label>  
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-success">Post</button>
              </div>
          </form>
        </div>
      </div>
  <!--     <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>
<div id="advertisementModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Post Your Ad For Free</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>
      <div class="modal-body">
        <form id="postNewAdd">
          <div class="form-group">
            <label>Select Ads Category:</label>
            <select class="form-control" name="adsCate">
              <option value="0">Select</option>
              <?php
                foreach ($adsCategory as $key => $value):
                  # code...
                  echo '<option value="'.$value->ad_cat_id.'">'.$value->category_name.'</option>';
                endforeach;

              ?>
              
            </select>
          </div>
          <div class="form-group" align="center">
            <label>Post Ad Image:</label>
            <input type='file' id="imgInp"  name="adImage" multiple>
            <img id="blah" src="#" alt="your image"  style="max-height: 300px; max-width: 400px;" onerror="this.src='<?=base_url()?>assets/img/adDummy.jpeg';">
            <!-- <input type="file" name=""> -->
          </div>
          <div class="form-group">
            <label>Ad URL:</label>
            <input type="url" name="ad_url" class="form-control">
          </div>
          <div class="form-group">
            
            <input type="submit" value="Post" class="btn btn-success">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
      </div>
    </div>

  </div>
</div>
<script>
      function readURL(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();
          
          reader.onload = function(e) {
            $('#blah').attr('src', e.target.result);
          }
          
          reader.readAsDataURL(input.files[0]);
        }
      }

      $("#imgInp").change(function() {
        readURL(this);
      });
      $(document).on('submit','#postNewAdd',function(e){
        e.preventDefault();
        var formData=new FormData($(this)[0]);
        $.ajax({
          url:"<?=base_url('Advertisement/AddAds')?>",
          type:"post",
          enctype: 'multipart/form-data',
          cache:false,
         
          contentType:false,
          processData:false,
          data:formData,
          success:function(response){
            response=JSON.parse(response);
            if(response.status==1){
              swal("Success", "Add Posted Successfully", "success");
            }else{
              swal("Ooops!", response.msg, "info");
            }
            $('#postNewAdd').trigger("reset");
            // $('#blah')
            $("#postNewAdd").load(location.href + " #postNewAdd");
          }
        });
      });
      $(document).on('click','.ads_btn',function(){
        $('#advertisementModal').modal('show');
      });
       $(document).ready(function(){
            $("#jobpost").submit(function(e){
                e.preventDefault();
                var formData= new FormData($(this)[0]);
                
                $.ajax({
                    url:"<?=base_url('Test/AddJobPost')?>",
                     type:"post",
                     data:formData,
                     enctype:"multipart/form-data",
                     contentType:false,
                     processData:false,
                     cache:false,
                    success:function(response)
                    {
                     var obj=JSON.parse(response);
                     console.log(obj.status);
                     if(obj.status==0)
                     {
                      alert(obj.message);
                     }
                     if(obj.status==1)
                     {
                      alert(obj.message);
                     }
                     if(obj.status==2)
                     {
                      alert(obj.message);
                     }
                     location.reload();
                    }
                });
            });

        });

    </script>
     <script>
        $(document).ready(function(){
          $('#countryId__').on('change',function(){
            var countryid=$(this).val();
            // alert(countryid);
            $.ajax({
              url:"<?=base_url('Test/get_States')?>",
              type:"post",
              data:{countryid:countryid},
              success:function(response)
              {
                //   console.log(response.data);
                  response=JSON.parse(response);
                    // console.log(response);
                  if(response.code==1)
                  {
                    
                    for (var i = 0; i <response.data.length; i++) 
                    {
                        var html;
                        // console.log(response.data[i].name);
                        html+='<option value="'+response.data[i].states_id+'">'+response.data[i].name+'</option>';
                        // html+="<option value="'+response.data[i].id+'">" + response.data[i].name + "</option>";
                       
                        $('#stateId').append(html);
                    }
                }
                else
                  {
                      
                  }
                  
              }
                  
              });
            })
          })
       
      </script>
       <script>
        $(document).ready(function(){
          $('#stateId').on('change',function(){
            var stateId=$(this).val();
            // alert(stateId);
            $.ajax({
              url:"<?=base_url('Test/get_Cities')?>",
              type:"post",
              data:{stateId:stateId},
              success:function(response)
              {
                //   console.log(response.data);
                  response=JSON.parse(response);
                    // console.log(response);
                  if(response.code==1)
                  {
                    
                   for (var i = 0; i <response.data.length; i++) 
                    {
                        var html;
                        
                        html+='<option value="'+response.data[i].cities_id+'">'+response.data[i].name+'</option>';
                       
                       
                        $('#cityId').append(html);
                    }
                }
                else
                  {
                    //   html+="<option>" + response.data[i].name + "</option>";
                       
                    //     $('#stateId').append(html);
                  }
                  
              }
                  
              });
            })
          })
       
      </script>
    


 <script type="text/javascript">
    // $(document).on("click",".favrt",function(){
    //   var cls = $(this).attr("class");
    //   if(cls=='favrt'){
    //     $(this).html('<i class="fas fa-star text-gold"></i>');
    //     $(this).addClass("star");
    //   }else{
    //     $(this).html('<i class="far fa-star"></i>');
    //     $(this).removeClass("star");
    //   }
    // })
  </script>
