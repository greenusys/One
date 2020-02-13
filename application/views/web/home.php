  <?php 
//print_r($_SESSION['logged_in']); 
   $session=$this->session->userdata('logged_in');
      $user_bio=$session[0]->bio_graphy;
  ?>

  <script>
  $(document).ready(function() {
    $('.home').addClass('active');
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
                  <img src="<?=base_url()?>assets/img/Cover_Photo/<?=$MyDetails[0]->cover_photo?>" class="w-100 "> 

              <!-- </a> -->
            <!-- <img src="<?=base_url()?>assets/img/Cover_Photo/<?=$MyDetails[0]->cover_photo?>" class="w-100 "> -->
         </figure>
        </div>
        <div class="usr_pro"><img class="img img-fluid w-50" src="<?=base_url()?>assets/img/Profile_Pic/<?=$MyDetails[0]->profile_picture?>" onerror="this.src='<?=base_url()?>assets/img/Profile_Pic/default.png';" style="border-radius: 50%;height: 124px;width: 124px !important;"></div>
        <h6 class="mt-80 author"> <?=$MyDetails[0]->full_name?></h6>
        
        <small class="profile-desc"><?=$user_bio?></small>
        <hr>
        <ul class="ml-4 mt-4 list-unstyled text-left colblack">
          <li class="row">
             <!-- <i class="fa fa-users ranUse  mt-3 col-md-1" aria-hidden="true"></i><a class=" menu_botttom col-md-9" href="<?=base_url('Friends/getFrnd/')?>">Friends</a> -->
          </li>
          <li class="row">

            <i class="fa fa-user-plus ranUse mt-3 col-md-1" aria-hidden="true"></i><a class=" menu_botttom col-md-9" href="<?=base_url()?>test/SuggestionFriends">Find Friend</a>
          </li>
          <li class="row">
            <i class="fa fa-star ranUse mt-3 col-md-1" aria-hidden="true"></i><a class=" menu_botttom col-md-9" href="<?=base_url('Test/favourite')?>">Favourites</a>
          </li>
          <li class="row">
             <i class="fa fa-bookmark ranUse mt-3 col-md-1" aria-hidden="true"></i><a class=" menu_botttom col-md-9" href="#">Bookmark</a>
          </li>
          <li class="row">
             <i class="fa fa-users ranUse mt-3 col-md-1" aria-hidden="true"></i><a class=" menu_botttom col-md-9" href="<?=base_url('Test/group')?>">Group</a>
          </li>
<!--           <li class="row">
            <i class="fa fa-file-text ranUse mt-3 col-md-1" aria-hidden="true"></i>
            <a href="#other-fruits" class="nav-link w-100 menu_botttom col-md-9" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="other-fruits">
                
                Page
              </a>

              <ul id="other-fruits" class="flex-column collapse">
                <li class="nav-item">
                  <a href="<?=base_url('Test/page')?>" class="nav-link"> -->
                    <!-- <i class="fa fa-pencil" aria-hidden="true"></i> -->
        <!--             Create Page
                  </a>
                </li>
                <li class="nav-item ">
                  <a href="#" class="nav-link"> -->
                    <!-- <i class="fa fa-pencil" aria-hidden="true"></i> -->
               <!--      View Page
                  </a>
                </li>
              </ul> -->
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
      <!-- id="w_t_follow" -->
      <div class="card mt-3" id="">
        <div class="p-3">
          <h4 class="widget-title">Who to follow?</h4>
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
                <select class="js-example-basic-multiple" name="friends[]" multiple="multiple">
                  <option value="Deepak">Deepak Nouliya</option>
                  <option value="Rahul">Rahul</option>
                  <option value="Ravish">Ravish</option>
                  <option value="Shivam">Shivam</option>
                  <option value="Shubham">Shubham</option>
                  <option value="Kaif">Kaif</option>
                </select>
              </div>
            </div>
          
            </div>
          <hr>
          <style>
           
          </style>
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
                <input type="checkbox" class="form-check-input mt-3" name="optradio" value="story"><img class="rounded-circle " src="<?=base_url()?>assets/img/Profile_Pic/<?=$MyDetails[0]->profile_picture?>" style="width: 40px;height: 40px"> Your Story
              </label>
            </div>
          </div> -->
<div id="previewImage">
    </div>
          <div class="text-right pr-2">
             <input id="btn-Preview-Image"  class="btn btn-primary my-2 back_col border-0 px-4" type="submit" value="POST"/>
          </div>
        </form>
      </div>
	  <div class="" id="pst_shw_">
	  <?php
    // print_r($AllPosts);
    if( count($AllPosts)>0){
        foreach($AllPosts as $p_ost){
       if($p_ost['post_type']==0){
         ?>
        <div class="card mt-4 p-2">
          <div class="card-header ">
            <div class="d-flex float-left">
             <div> 
              <a class="font-weight-bold" href="#">
                 <img class="rounded-circle mr-2" src="<?=base_url()?>assets/img/Profile_Pic/<?=$MyDetails[0]->profile_picture?>" width="40"  height="40">
               </a>
             </div>
            <div>
              <a class="font-weight-bold _use_n" href="#">  
               <?=$p_ost['posted_by']?>
              </a>
              <br>
                <small>
                  
                 <time class="timeago" datetime=" <?=$p_ost['posted_on']?>"></time>
                </small>
            </div>
           
           </div>
               
                    <div class="float-right d-flex mt-2">
                      <div class="">
                        <span class="favrt" title="favourite"><i class="far fa-star"></i></span>
                        <!-- <span><i class="fas fa-star"></i></span> -->
                      </div>
                      <?php if($_SESSION['logged_in'][0]->user_id==$p_ost['user_id']){ ?>
                          <div class="dropdown ml-3">
                            <button class="dropbtn"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></button>
                            <div class="dropdown-content bg-white">
                              <a href="#">Edit</a>
                              <a href="javascript:void(0)" class="dlt_post_" p_d=<?=$p_ost['post_id']?> >Delete</a>
                              
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
          <div class="mb-2 p-0">
            <div class="row ">
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

                                   <li><img class="rounded-circle like_img " src="<?=base_url('assets/img/Profile_Pic/').$likedata->profile_picture?> "></li>

                          <?php }else{    ?>
                                <li><img class="rounded-circle like_img like_img_marg25" src="<?=base_url('assets/img/Profile_Pic/').$likedata->profile_picture?> "></li>
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
                <a href="javascript:void(0)"><i class="fa fa-comment-o" aria-hidden="true"></i> Comments</a> 
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
                //echo"hello";

                  //print_r($p_ost['total_comments']);
                if(count($p_ost['total_comments'])>0){
                ?>

                <?php for($i=0; $i < count($p_ost['total_comments']); $i++){ ?>
              <div class="row mt-2 px-2">
                  <div class="col-md-1">
                      <span> <img class="rounded-circle like_img" src="<?=base_url()?>assets/img/Profile_Pic/<?=$MyDetails[0]->profile_picture?>"></span>  
                  </div> 
                  <div class="col-md-10 comnt_text border-bottom">
                      <h6 class="font-weight-bold m-0" > <?=$p_ost['total_comments'][$i]->full_name?><small class="ml-3"><time class="timeago" datetime=" <?=$p_ost['total_comments'][$i]->commented_on?>"></time></small></h6>
                      <p class=""><?=$p_ost['total_comments'][$i]->comment?></p>
                  </div>
                  <div class="col-md-1">
                      <?php if($_SESSION['logged_in'][0]->user_id==$p_ost['user_id']){ ?>
                          <div class="dropdown">
                            <button class="dropbtn"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></button>
                            <div class="dropdown-content bg-white">
                              <a href="#">Edit</a>
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
                    <span> <img class="rounded-circle like_img" src="<?=base_url()?>assets/img/Profile_Pic/<?=$MyDetails[0]->profile_picture?>"></span>
                    <form method="POST" class="w-100 ad_cmnt" >
                      <div class="pl-2 w-100 _input">
                        <p class="lead emoji-picker-container">
                          <textarea class="input-field cmnt_" data-emojiable="true" type="text" name="comment"  placeholder="Add a Message">  </textarea>
                        </p>
                              <input type="hidden" name="post_id" value="<?=$p_ost['post_id']?>">
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
              <a class="font-weight-bold" href="#">
                 <img class="rounded-circle mr-2" src="<?=base_url()?>assets/img/Profile_Pic/<?=$MyDetails[0]->profile_picture?>" width="40"  height="40">
               </a>
             </div>
            <div>
              <a class="font-weight-bold _use_n" href="#">  
               <?=$p_ost['posted_by']?>
              </a>
              <br>
                <small>
                    <time class="timeago" datetime=" <?=$p_ost['posted_on']?>"></time>
                </small>
            </div>
                 
           </div>
              
                    <div class="float-right d-flex mt-2">
                      <div class="">  
                         <span class="favrt" title="favourite"><i class="far fa-star"></i></span>
                      </div>
                      <?php if($_SESSION['logged_in'][0]->user_id==$p_ost['user_id']){ ?>
                          <div class="dropdown ml-3">
                            <button class="dropbtn"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></button>
                            <div class="dropdown-content bg-white">
                              <a href="#">Edit</a>
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
                    <a class="" href="<?=base_url('Post/viewPost/').$p_ost['post_id']?>"><img class="img img-fluid rounded d-block post_image" src="<?=base_url()?>assets/uploads/images/<?=$postimages[$i]?>"></a>
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
                    <a class="" href="<?=base_url('Post/viewPost/').$p_ost['post_id']?>"><img class="img img-fluid d-block post_image rounded" src="<?=base_url()?>assets/uploads/images/<?=$postimages[0]?>"></a>
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
                    <a class="" href="<?=base_url('Post/viewPost/').$p_ost['post_id']?>"><img class="img img-fluid d-block ext_img rounded" src="<?=base_url()?>assets/uploads/images/<?=$postimages[$i]?>"></a>
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
                    <a class="" href="<?=base_url('Post/viewPost/').$p_ost['post_id']?>">
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
                      <a class="position-absolute" href="#" style="top:115px"> <h2 class="text-white"><strong><?=(count($postimages)-4)?>+</strong></h2></a>
                  </div>
                    
                </div>
            <?php
            }
            else
            {
              ?>
                <div class="post_img row">
                   <div class="col-md p-3">
                    <a class="" href="<?=base_url('Post/viewPost/').$p_ost['post_id']?>"><img class="img img-fluid d-block rounded" src="<?=base_url()?>assets/uploads/images/<?=$postimages[0]?>"></a>
                  </div>
                </div>
            <?php
            }
            ?>
            
          </div>
          
          <div class="mb-2 p-0">
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
                                   <li><img class="rounded-circle like_img " src="<?=base_url('assets/img/Profile_Pic/').$likedata->profile_picture?> "></li>
                      <?php }else{    ?>
                            <li><img class="rounded-circle like_img like_img_marg25" src="<?=base_url('assets/img/Profile_Pic/').$likedata->profile_picture?> "></li>
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
                <a href="javascript:void(0)"><i class="fa fa-comment-o" aria-hidden="true"></i> Comments</a>
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
                      <span> <img class="rounded-circle like_img" src="<?=base_url()?>assets/img/Profile_Pic/<?=$MyDetails[0]->profile_picture?>"></span>  
                  </div>
                  <div class="col-md-10 comnt_text border-bottom">
                      <h6 class="font-weight-bold m-0" > <?=$p_ost['total_comments'][$i]->full_name?><small class="ml-3">
                        <time class="timeago" datetime=" <?=$p_ost['total_comments'][$i]->commented_on?>"></time>
                      </small></h6>
                      <p class=""><?=$p_ost['total_comments'][$i]->comment?></p>
                  </div>
                  <div class="col-md-1">
                    <?php if($_SESSION['logged_in'][0]->user_id==$p_ost['user_id']){ ?>
                      <div class="dropdown">
                        <button class="dropbtn"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></button>
                        <div class="dropdown-content bg-white">
                          <a href="#">Edit</a>
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
                    <span> <img class="rounded-circle like_img" src="<?=base_url()?>assets/img/Profile_Pic/<?=$MyDetails[0]->profile_picture?>"></span>
                    <form method="POST" class="w-100 ad_cmnt" >
                      <div class="pl-2 w-100 _input">
                        <p class="lead emoji-picker-container">
                          <textarea class="input-field cmnt_" data-emojiable="true" type="text" name="comment"  placeholder="Add a Message">  </textarea>
                        </p>
                              <input type="hidden" name="post_id" value="<?=$p_ost['post_id']?>">
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
       }else{
         ?>
        <div class="card mt-4 p-2">
           <div class="card-header ">
            <div class="d-flex float-left">
             <div> 
              <a class="font-weight-bold" href="#">
                 <img class="rounded-circle mr-2" src="<?=base_url()?>assets/img/Profile_Pic/<?=$MyDetails[0]->profile_picture?>" width="40"  height="40">
               </a>
             </div>
            <div>
              <a class="font-weight-bold _use_n" href="#">  
                <?=$p_ost['posted_by']?>
              </a>
              <br>
                <small>
                  <time class="timeago" datetime=" <?=$p_ost['posted_on']?>"></time>

                </small>
            </div>
                
           </div>
               
                    <div class="float-right d-flex mt-2">
                      <div class="">  
                         <span class="favrt" title="favourite"><i class="far fa-star"></i></span>
                      </div>
                       <?php 
                          if($_SESSION['logged_in'][0]->user_id==$p_ost['user_id'])
                          { 
                        ?>
                          <div class="dropdown ml-3">
                            <button class="dropbtn"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></button>
                            <div class="dropdown-content bg-white">
                              <a href="#">Edit</a>
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
          <div class="card-body text-center">
          <p>
            <?=$p_ost['post']?>
            </p>
            <div class="">
            <video controls class="w-100">
            <source src="<?=base_url()?>assets/uploads/videos/<?=$p_ost['post_files']?>" type="video/mp4">
          
          Your browser does not support the video tag.
          </video>
          </div>  
          </div>
          
          <div class="mb-2 p-0">
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
                                     <li><img class="rounded-circle like_img " src="<?=base_url('assets/img/Profile_Pic/').$likedata->profile_picture?> "></li>
                        <?php }else{    ?>
                              <li><img class="rounded-circle like_img like_img_marg25" src="<?=base_url('assets/img/Profile_Pic/').$likedata->profile_picture?> "></li>
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
                <a href="javascript:void(0)"><i class="fa fa-comment-o" aria-hidden="true"></i> Comments</a>
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
                //echo"hello";

                  // print_r($p_ost['total_comments']);
                if(count($p_ost['total_comments'])>0){
                for($i=0; $i < count($p_ost['total_comments']); $i++){ ?>
                  <div class="row mt-2 px-2">
                      <div class="col-md-1">
                          <span> <img class="rounded-circle like_img" src="<?=base_url()?>assets/img/Profile_Pic/<?=$MyDetails[0]->profile_picture?>"></span>  
                      </div>
                      <div class="col-md-10 comnt_text border-bottom">
                          <h6 class="font-weight-bold m-0" > <?=$p_ost['total_comments'][$i]->full_name?><small class="ml-3">
                            <time class="timeago" datetime=" <?=$p_ost['total_comments'][$i]->commented_on?>"></time>
                          </small></h6>
                          <p class=""><?=$p_ost['total_comments'][$i]->comment?></p>
                      </div>
                      <div class="col-md-1">
                        <?php if($_SESSION['logged_in'][0]->user_id==$p_ost['user_id']){ ?>
                            <div class="dropdown">
                              <button class="dropbtn"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></button>
                              <div class="dropdown-content bg-white">
                                <a href="#">Edit</a>
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
                    <span> <img class="rounded-circle like_img" src="<?=base_url()?>assets/img/Profile_Pic/<?=$MyDetails[0]->profile_picture?>"></span>
                    <form method="POST" class="w-100 ad_cmnt" >
                      <div class="pl-2 w-100 _input">
                        <p class="lead emoji-picker-container">
                          <textarea class="input-field cmnt_" data-emojiable="true" type="text" name="comment"  placeholder="Add a Message">  </textarea>
                        </p>
                              <input type="hidden" name="post_id" value="<?=$p_ost['post_id']?>">
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
            <h4 class="widget-title">Jobs</h4>
            <div class="">
              <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
             <!--    <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol> -->
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <div class="">
                      <div class="">
                        <img src="<?=base_url()?>assets/uploads/images/Post-image-2020-01-31-08-37-181.jpg" class="d-block w-100" alt="...">
                      </div>
                      <div class="row m-0">
                          <div class="col-md-8 p-0">
                            <ul class="unstyled m-0">
                             <li><small>Uttrakhand -Greenusys</small></li>
                             <li class="line_het"><span class="author">Web Content Writer</span></li>
                             <li><small>Dehradun - Full Time</small></li>
                          </div>
                          <div class="col-md-4 p-0">
                            <button class="btn btn-primary p-1 mt-3 fy" data-toggle="modal" data-target="#jobsModal">Apply Now</button>
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <div class="">
                      <div class="">
                        <img src="<?=base_url()?>assets/uploads/images/Post-image-2020-01-31-08-37-180.jpg" class="d-block w-100" alt="...">
                      </div>
                      <div class="row m-0">
                          <div class="col-md-8 p-0">
                            <ul class="unstyled m-0">
                             <li><small>Uttrakhand -Greenusys</small></li>
                             <li class="line_het"><span class="author">Web Content Writer</span></li>
                             <li><small>Dehradun - Full Time</small></li>
                          </div>
                          <div class="col-md-4 p-0">
                            <button class="btn btn-primary p-1 mt-3 fy" data-toggle="modal" data-target="#jobsModal">Apply Now</button>
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <div class="">
                      <div class="">
                        <img src="<?=base_url()?>assets/uploads/images/Post-image-2020-01-31-08-37-181.jpg" class="d-block w-100" alt="...">
                      </div>
                      <div class="row m-0">
                          <div class="col-md-8 p-0">
                            <ul class="unstyled m-0">
                             <li><small>Uttrakhand -Greenusys</small></li>
                             <li class="line_het"><span class="author">Web Content Writer</span></li>
                             <li><small>Dehradun - Full Time</small></li>
                          </div>
                          <div class="col-md-4 p-0">
                            <button class="btn btn-primary p-1 mt-3 fy" data-toggle="modal" data-target="#JobsModal">Apply Now</button>
                          </div>
                      </div>
                    </div>
                  </div>
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
      <div class="card mt-3" id="">
        <div class="p-3">
          <h4 class="widget-title">Page You May Like</h4>
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
                        <img class="rounded-circle " src="<?=base_url()?>assets/img/Profile_Pic/<?=$user->profile_picture?>" onerror="this.src='<?=base_url()?>assets/img/Profile_Pic/default.png';" width="40px" height="40px">
                      </a>
                    </div>
                    <div class="col-md-7 p-0">
                      <span class=" author"><?=$user->full_name?></span>
                      <div class="mt-n2"> <small>Adventure</small></div>
                    </div>
                    <div class="col-md-2 p-0">
                      <span class="text-danger pge_lke"><i class="fa fa-heart-o" aria-hidden="true"></i></span>
                    </div>
                  </li>
                <?php
              }
            ?>
          </ul>
        </div>
      </div>
      <div class="card mt-3" id="">
        <div class="p-3">
          <h4 class="widget-title">Advertizement</h4>
        </div>
        <div class="card-body p-3">
            <a href="#"><img src="<?=base_url()?>/assets/img/advertize.jpg" class="img-fluid"></a>
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
        }
        if ($.inArray('mp4', ext_array) != -1 && ($.inArray('jpg', ext_array) != -1 || $.inArray('jpeg', ext_array) != -1 || $.inArray('gif', ext_array) != -1 || $.inArray('png', ext_array) != -1)) {
           // alert('Video and Image');
            formData.append('post_type','3');
        }
        else if($.inArray('mp4', ext_array) != -1){
          // alert('video only');
          formData.append('post_type','2');
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
                      console.log(response);
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
    if($(window).scrollTop() == $(document).height() - $(window).height()) {
      // limit=limit+5;
      // offset = limit + offset;
     
      getAjaxData(offset);
       offset = offset + 5;
      }
  });
})
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
              html+='<div class="card mt-4"><div class="card-header"><div class="d-flex "><div><a class="font-weight-bold" href="#"><img class="rounded-circle mr-2" src="<?=base_url()?>assets/img/Profile_Pic/'+my_profilepic+'" width="40"  height="40"></a></div><div><a class="font-weight-bold _use_n" href="#">'+res.data[i].posted_by+'</a><br><small><time class="timeago" datetime="'+res.data[i].posted_on+'"></time></small></div></div>';
              if(user_id==res.data[i].user_id)
              {
                html+='<div class="float-right mt-2"><div class="dropdown"><button class="dropbtn"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></button><div class="dropdown-content bg-white"><a href="#">Edit</a><a href="javascript:void(0)" class="dlt_post_" p_d="'+res.data[i].post_id+'" >Delete</a></div></div></div>'; 
              }
              html+='</div><div class="card-body text-justify"><p>'+res.data[i].post+'</p></div><div class="mb-2 p-0"><div class="row "><div class="col-md-4 manage "><div class="text-center px-3 py-1"><div class="btn-like d-flex" ><a href="javascript:void(0)" class="text-danger likePost" d-Post="'+res.data[i].post_id+'"></a>';
              var countlikes=(res.data[i].likes_data).length;
              // console.log(countlikes);
              if((countlikes)!=null)
              {
                for(var j=0;j<countlikes;j++)
                {
                  if(user_id==(res.data[i].user_id))
                  { 
                    html+='<i class="fa fa-heart " aria-hidden="true"></i>';
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
                    html+='<li><img class="rounded-circle like_img " src="<?=base_url()?>assets/img/Profile_Pic/'+res.data[i].likes_data[j].profile_picture+'"></li>';
                  }
                  else
                  {
                    html+='<li><img class="rounded-circle like_img like_img_marg25" src="<?=base_url()?>assets/img/Profile_Pic/'+res.data[i].likes_data[j].profile_picture+'"></li>';
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
                  html+='<span> <img class="rounded-circle like_img" src="<?=base_url()?>assets/img/Profile_Pic/'+my_profilepic+'"></span></div>';
                  html+='<div class="col-md-10 comnt_text border-bottom">';
                  html+='<h6 class="font-weight-bold m-0" >'+res.data[i].total_comments[k].commented_by_+'<small class="ml-3">'+res.data[i].total_comments[k].commented_on+'</small></h6>';
                  html+='<p class="">'+res.data[i].total_comments[k].comment+'</p></div>';
                  html+='<div class="col-md-1">';
                  if(user_id==res.data[i].user_id)
                  {
                    html+='<div class="dropdown"><button class="dropbtn"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></button><div class="dropdown-content bg-white"><a href="#">Edit</a><a href="javascript:void(0)" class="dlt_comnt_" c_d="'+res.data[i].total_comments[k].id+'">Delete</a></div></div>';
                  }
                  html+='</div></div>';
                } 
              }
              html+='<div class="p-2"><div class="d-flex m-0"><span> <img class="rounded-circle like_img" src="<?=base_url()?>assets/img/Profile_Pic/'+my_profilepic+'"></span>';
              html+='<form method="POST" class="w-100 ad_cmnt" >';
              html+='<div class="pl-2 w-100 _input">';
              html+='<p class="lead emoji-picker-container">';
              html+='<textarea class="input-field cmnt_" data-emojiable="true" type="text" name="comment"  placeholder="Add a Message"></textarea>';
              html+='</p>';
              html+='<input type="hidden" name="post_id" value="'+res.data[i].post_id+'">';
              html+='</div>';
              html+='</form>';
              html+='</div></div>';
              html+='</div></div>';
            }
            else if(res.data[i].post_type==1)
            {
              html+='<div class="card mt-4"><div class="card-header "><div class="d-flex float-left"><div>';
              html+='<a class="font-weight-bold" href="#">';
              html+='<img class="rounded-circle mr-2" src="<?=base_url()?>assets/img/Profile_Pic/'+my_profilepic+'" width="40"  height="40">';
              html+='</a></div><div>';
              html+='<a class="font-weight-bold _use_n"  href="#">'+res.data[i].posted_by+'</a><br><small><time class="timeago" datetime="'+res.data[i].posted_on+'"></time></small></div></div>';
              if(user_id==res.data[i].user_id)
              {
                html+='<div class="float-right mt-2">';
                html+='<div class="dropdown">';
                html+='<button class="dropbtn"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></button>';
                html+='<div class="dropdown-content bg-white">';
                html+='<a href="#">Edit</a>';
                html+='<a href="javascript:void(0)" class="dlt_post_" p_d="'+res.data[i].post_id+'">Delete</a></div></div></div>';
              }
              html+='</div>';
              html+='<div class="card-body">';
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
                  html+='<div class="col-md-6 p-2">';
                    html+='<a class="" href="#"><img class="img img-fluid d-block post_image rounded" src="https://localhost/BrainT/newLane/assets/uploads/images/'+postimages[m]+'"></a>';
                  html+='</div>';
                }
                html+='</div>';
              }
              else if (countimg==3) 
              {
                html+='<div class="post_img row">';
                html+='<div class="col-md-12 p-2">';
                html+='<a class="" href="#"><img class="img img-fluid d-block post_image rounded" src="https://localhost/BrainT/newLane/assets/uploads/images/'+postimages[0]+'"></a>';
                html+='</div>';
                for (var m=1; m < countimg; m++) 
                {
                  html+='<div class="col-md-6 p-2">';
                  html+='<a class="" href="#"><img class="img img-fluid d-block post_image rounded" src="https://localhost/BrainT/newLane/assets/uploads/images/'+postimages[m]+'"></a>';
                  html+='</div>';
                }
                  html+='</div>';
              }
              else if(countimg ==4) 
              {
                html+='<div class="post_img row">';
                for (var m=0; m < countimg; m++) 
                {
                  html+='<div class="col-md-6 p-2">';
                  html+='<a class="" href="#"><img class="img img-fluid d-block post_image rounded"  src="https://localhost/BrainT/newLane/assets/uploads/images/'+postimages[m]+'"></a>';
                  html+='</div>';
                }
                html+='</div>';
              }
              else if (countimg>4) 
              {
                html+='<div class="post_img row">';
                for (var m=0; m <3; m++) 
                {
                  html+='<div class="col-md-6 p-2">';
                  html+='<a class="" href="#">';
                  html+='<img class="img img-fluid d-block post_image rounded" src="https://localhost/BrainT/newLane/assets/uploads/images/'+postimages[m]+'"></a>';
                  html+='</div>';
                }
                html+='<div class="col-md-6 p-2 text-center">';
                html+='<a class="" href="#">';
                html+='<img class="img img-fluid d-block  post_image rounded"  src="https://localhost/BrainT/newLane/assets/uploads/images/'+postimages[4]+'"></a>';
                html+='<div class="position-absolute h-100 w-100 bg-dark " style="left: 0%;top:0px;padding-top: 8rem !important;opacity: 0.5">';
                html+='</div>';
                html+='<a class="position-absolute" href="#" style="top:115px"> <h2 class="text-white"><strong>'+((countimg)-4)+'+</strong></h2></a>';
                html+='</div>';   
                html+='</div>';
              }
              else
              {
                html+='<div class="post_img row">';
                html+='<div class="col-md p-2">';
                html+='<a class="" href="#"><img class="img img-fluid d-block rounded" src="<?=base_url()?>assets/uploads/images/'+postimages[0]+'"></a>';
                html+='</div>';
                html+='</div>';
              }
              html+='</div>';
              html+='<div class="mb-2 p-0">';
              html+='<div class="d-flex text-center">';
              html+='<div class="col-md-4 manage ">';
              html+='<div class="text-center px-3 py-1">';
              html+='<div class="btn-like d-flex" ><a href="javascript:void(0)" class="text-danger likePost" d-Post="'+res.data[i].post_id+'">';
              var countlikes=(res.data[i].likes_data).length;
              if((countlikes)!=null)
              {
                for(var j=0;j< countlikes;j++)
                {
                  if(user_id==(res.data[i].user_id))
                  { 
                    html+='<i class="fa fa-heart " aria-hidden="true"></i>';
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
              for(var j=0;j< countlikes;j++) 
              { 
                if(sno <= 5)
                {
                  if(sno==1)
                  {
                    html+='<li><img class="rounded-circle like_img " src="<?=base_url()?>assets/img/Profile_Pic/'+res.data[i].likes_data[j].profile_picture+'"></li>';
                  }
                  else
                  {
                    html+='<li><img class="rounded-circle like_img like_img_marg25" src="<?=base_url()?>assets/img/Profile_Pic/'+res.data[i].likes_data[j].profile_picture+'"></li>';
                  }
                }    
                sno++;
              }
              if(countlikes>0)
              {
                html+='<li><div class=" like_cont likeValue rounded-circle like_img_marg25">'+res.data[i].total_likes+'</div></li>';
              }
              else
              { 
                html+='<li><div class=" like_cont likeValue rounded-circle ">'+res.data[i].total_likes+'</div></li>';
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
                  html+='<span> <img class="rounded-circle like_img" src="<?=base_url()?>assets/img/Profile_Pic/'+my_profilepic+'"></span></div>';
                  html+='<div class="col-md-10 comnt_text border-bottom">';
                  html+='<h6 class="font-weight-bold m-0" >'+res.data[i].total_comments[k].commented_by_+'<small class="ml-3">'+res.data[i].total_comments[k].commented_on+'</small></h6>';
                  html+='<p class="">'+res.data[i].total_comments[k].comment+'</p></div>';
                  html+='<div class="col-md-1">';
                  if(user_id==res.data[i].user_id)
                  {
                    html+='<div class="dropdown"><button class="dropbtn"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></button><div class="dropdown-content bg-white"><a href="#">Edit</a><a href="javascript:void(0)" class="dlt_comnt_" c_d="'+res.data[i].total_comments[k].id+'">Delete</a></div></div>';
                  }
                  html+='</div></div>';
                } 
              }
              html+='<div class="p-2"><div class="d-flex m-0"><span> <img class="rounded-circle like_img" src="<?=base_url()?>assets/img/Profile_Pic/'+my_profilepic+'"></span>';
              html+='<form method="POST" class="w-100 ad_cmnt" >';
              html+='<div class="pl-2 w-100 _input">';
              html+='<p class="lead emoji-picker-container">';
              html+='<textarea class="input-field cmnt_" data-emojiable="true" type="text" name="comment"  placeholder="Add a Message"></textarea>';
              html+='</p>';
              html+='<input type="hidden" name="post_id" value="'+res.data[i].post_id+'">';
              html+='</div>';
              html+='</form>';
              html+='</div></div>';
              html+='</div></div>';

            }
            else
            {                    
              html+='<div class="card mt-4"><div class="card-header"><div class="d-flex "><div><a class="font-weight-bold" href="#"><img class="rounded-circle mr-2" src="<?=base_url()?>assets/img/Profile_Pic/'+my_profilepic+'" width="40"  height="40"></a></div><div><a class="font-weight-bold _use_n" href="#">'+res.data[i].posted_by+'</a><br><small><time class="timeago" datetime="'+res.data[i].posted_on+'"></time></small></div></div>';
              if(user_id==res.data[i].user_id)
              {
                html+='<div class="float-right mt-2">';
                html+='<div class="dropdown">';
                html+='<button class="dropbtn"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></button>';
                html+='<div class="dropdown-content bg-white">';
                html+='<a href="#">Edit</a>';
                html+='<a href="javascript:void(0)" class="dlt_post_" p_d="'+res.data[i].post_id+'">Delete</a></div></div></div>';
              }
              html+='</div>';
              html+='<div class="card-body">';
              html+='<p>'+res.data[i].post+'</p>';
              html+='<div class="">';
              html+='<video controls class="w-100">';
              html+='<source src="<?=base_url()?>assets/uploads/videos/'+res.data[i].post_files+'" type="video/mp4">';
              html+='</video>';
              html+='</div>';
              html+='</div>';     
              html+='<div class="mb-2 p-0">';
              html+='<div class="flex text-center">';
              html+='<div class="col-md-4 manage ">';
              html+='<div class="text-center px-3 py-1">';
              html+='<div class="btn-like d-flex" ><a href="javascript:void(0)" class="text-danger likePost" d-Post="'+res.data[i].post_id+'">';
              var countlikes=(res.data[i].likes_data).length;
              if((countlikes)!=null)
              {
                for(var j=0;j< countlikes;j++)
                {
                  if(user_id==(res.data[i].user_id))
                  { 
                    html+='<i class="fa fa-heart" aria-hidden="true"></i>';
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
              for(var j=0;j< countlikes;j++) 
              { 
                if(sno <= 5)
                {
                  if(sno==1)
                  {
                    html+='<li><img class="rounded-circle like_img " src="<?=base_url()?>assets/img/Profile_Pic/'+res.data[i].likes_data[j].profile_picture+'"></li>';
                  }
                  else
                  {
                    html+='<li><img class="rounded-circle like_img like_img_marg25" src="<?=base_url()?>assets/img/Profile_Pic/'+res.data[i].likes_data[j].profile_picture+'"></li>';
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
                  html+='<span> <img class="rounded-circle like_img" src="<?=base_url()?>assets/img/Profile_Pic/'+my_profilepic+'"></span></div>';
                  html+='<div class="col-md-10 comnt_text border-bottom">';
                  html+='<h6 class="font-weight-bold m-0" >'+res.data[i].total_comments[k].commented_by_+'<small class="ml-3">'+res.data[i].total_comments[k].commented_on+'</small></h6>';
                  html+='<p class="">'+res.data[i].total_comments[k].comment+'</p></div>';
                  html+='<div class="col-md-1">';
                  if(user_id==res.data[i].user_id)
                  {
                    html+='<div class="dropdown"><button class="dropbtn"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></button><div class="dropdown-content bg-white"><a href="#">Edit</a><a href="javascript:void(0)" class="dlt_comnt_" c_d="'+res.data[i].total_comments[k].id+'">Delete</a></div></div>';
                  }
                  html+='</div></div>';
                } 
              }
              html+='<div class="p-2"><div class="d-flex m-0"><span> <img class="rounded-circle like_img" src="<?=base_url()?>assets/img/Profile_Pic/'+my_profilepic+'"></span>';
              html+='<form method="POST" class="w-100 ad_cmnt" >';
              html+='<div class="pl-2 w-100 _input">';
              html+='<p class="lead emoji-picker-container">';
              html+='<textarea class="input-field cmnt_" data-emojiable="true" type="text" name="comment"  placeholder="Add a Message"></textarea>';
              html+='</p>';
              html+='<input type="hidden" name="post_id" value="'+res.data[i].post_id+'">';
              html+='</div>';
              html+='</form>';
              html+='</div></div>';
              html+='</div></div>';
              
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
        console.log("Posted Id: "+postId);
        $.ajax({
          url:"<?=base_url('APIController/sharePost')?>",
          type:"post",
          data:{post_id:postId},
          success:function(res){
            res=JSON.parse(res);
            if(res.code==1){
              
            }
          }
        });
      });
         $(document).ready(function() {
            $(".timeago").each(function(){
                $(this).timeago();

            });
          });
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
          <form method="POST" action="">
            <label class="author">Upload Resume
               <input type="file" name="" class="form-control">
            </label>

            <div class="text-center">
              <button class="btn btn-success">Apply</button>
            </div>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


 <script type="text/javascript">
              $(document).on("click",".favrt",function(){
                var cls = $(this).attr("class");
                if(cls=='favrt'){
                  $(this).html('<i class="fas fa-star text-gold"></i>');
                  $(this).addClass("star");
                }else{
                  $(this).html('<i class="far fa-star"></i>');
                  $(this).removeClass("star");
                }
              })
            </script>