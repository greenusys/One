<style type="text/css">
  .postProfile-pic{
    width: 30px !important;
    height: : 30px !important;
  }
/*  .fa-address-card {
    border: 1px solid black;
    border-radius: 50%;
    padding: 10px;
}*/
.font14{
  font-size: 14px
}
.bio_text{
      line-height: 1.1;
      resize: vertical;
}
 .bio_btn{
      padding: 0px 9px !important;
    }
</style>

<script>
$( document ).ready(function(e) {
  $('.profile').addClass('active');
})
</script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
<script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <script src="https://files.codepedia.info/files/uploads/iScripts/html2canvas.js"></script>
 <!-- center panel -->
<div class="col-md-6 mt-3">
        <div class=" border-2 bg-white rounded ">
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
           <div id="divOutside" class="divOutside emoji-btn"></div>
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
            <!-- <div id="divOutside" class="divOutside">
            </div> -->
          <hr>
            <style>
            .tag_pht{
                font-size: 16px;
                padding: 4px;
                display: block;
            }
            .wdth_ht{
              width: 16px;
              height: 15px;
            }
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

            <div class=" col-md-4 text-center">
                <input class="hidden-xs-up" id="cbx" type="checkbox" name="optradio" value="post"/>
                <label class="cbx" for="cbx"></label><label class="lbl" for="cbx"><i class="far fa-address-card"></i> News Feed</label>
            </div>
            <div class=" col-md-4 text-center">
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
      <!--     <div class="form-check pl-5 py-2">
            <label class="form-check-label">
              <input type="checkbox" class="form-check-input mt-3" name="optradio" value="post"><i class="far fa-address-card"></i>
 News Feed
            </label>
          </div>
          <div class="form-check pl-5">
            <label class="form-check-label">
              <input type="checkbox" class="form-check-input mt-3" name="optradio" value="story"><img class="rounded-circle " src="<?=base_url('assets/webimg/face.png')?>" style="width: 15%"> Your Story
            </label>
          </div> -->
<div id="previewImage">
    </div>
          <div class="text-right pr-2">
             <input id="btn-Preview-Image"  class="btn btn-primary my-2 back_col border-0 px-4" type="submit" value="POST"/>
         <!--       <a id="btn-Convert-Html2Image" href="#">Download</a> -->
             <!-- <div id="match-button" >capture</div> -->
           <!--  <button type="submit" class="btn btn-primary my-2 back_col border-0 px-4" >POST</button> -->
          </div>
        </form>
      </div>
<!-----posts start here------>
      <div class="">

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
               <?php if($_SESSION['logged_in'][0]->user_id==$p_ost['user_id']){ ?>
                    <div class="float-right mt-2">
                          <div class="dropdown">
                            <button class="dropbtn"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></button>
                            <div class="dropdown-content bg-white">
                              <a href="#">Edit</a>
                              <a href="javascript:void(0)" class="dlt_post_" p_d=<?=$p_ost['post_id']?> >Delete</a>
                              
                            </div>
                          </div>
                    </div> 
                <?php } ?>
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
                <?php if($_SESSION['logged_in'][0]->user_id==$p_ost['user_id']){ ?>
                    <div class="float-right mt-2">
                          <div class="dropdown">
                            <button class="dropbtn"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></button>
                            <div class="dropdown-content bg-white">
                              <a href="#">Edit</a>
                              <a href="javascript:void(0)" class="dlt_post_" p_d=<?=$p_ost['post_id']?> >Delete</a>
                              
                            </div>
                          </div>
                    </div> 
                <?php } ?>
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
                    <a class="" href="#"><img class="img img-fluid rounded d-block post_image" src="<?=base_url()?>assets/uploads/images/<?=$postimages[$i]?>"></a>
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
                    <a class="" href="#"><img class="img img-fluid d-block post_image rounded" src="<?=base_url()?>assets/uploads/images/<?=$postimages[0]?>"></a>
                  </div>
                  <?php for ($i=1; $i < count($postimages); $i++) {
                    ?>
                   <div class="col-md-6 ">
                    <a class="" href="#"><img class="img img-fluid d-block ext_img rounded" src="<?=base_url()?>assets/uploads/images/<?=$postimages[$i]?>"></a>
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
                    <a class="" href="#"><img class="img img-fluid d-block ext_img rounded" src="<?=base_url()?>assets/uploads/images/<?=$postimages[$i]?>"></a>
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
                    <a class="" href="#">
                      <img class="img img-fluid d-block ext_img rounded" src="<?=base_url()?>assets/uploads/images/<?=$postimages[$i]?>"></a>

                  </div>
                   <?php
                    }
                    ?>
                    <div class="col-md-6 p-2 text-center">
                    <a class="" href="#">
                      <img class="img img-fluid d-block rounded post_image" src="<?=base_url()?>assets/uploads/images/<?=$postimages[4]?>"></a>
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
                    <a class="" href="#"><img class="img img-fluid d-block rounded" src="<?=base_url()?>assets/uploads/images/<?=$postimages[0]?>"></a>
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
                <?php 
                if($_SESSION['logged_in'][0]->user_id==$p_ost['user_id'])
                { 
                  ?>
                    <div class="float-right mt-2">
                          <div class="dropdown">
                            <button class="dropbtn"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></button>
                            <div class="dropdown-content bg-white">
                              <a href="#">Edit</a>
                              <a href="javascript:void(0)" class="dlt_post_" p_d=<?=$p_ost['post_id']?> >Delete</a>
                              
                            </div>
                          </div>
                    </div> 
                <?php } ?>
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
          
           <div class=" comments_list border-top ">
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
 <!--  <div id="postViews">
      </div> -->
</div>
    <!-- end center panel -->

    <style>
     
    </style>
     <!--right sidepanel -->
    <div class="col-md-3 border-left p-0 mt-3">
      <div class="bg-white">
        
        <nav>
          <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
              <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Intro</a>
              <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-active" role="tab" aria-controls="nav-profile" aria-selected="false">Friends</a>
              <a class="nav-item nav-link" id="nav-profile-photo" data-toggle="tab" href="#nav-photos" role="tab" aria-controls="nav-profile" aria-selected="false">Photos</a>
          </div>
        </nav>
        <script>
          $(document).on('submit','#addBio',function(e){
            e.preventDefault();
            var bio_graphy=$('#bio_graphy').val();
            var formData=new FormData($(this)[0]);
            $.ajax({
              url:"<?=base_url('Profile/addBio')?>",
              type:"post",
              cache:false,
              data:formData,
              contentType:false,
              processData:false,
              success:function(response){
                      response=JSON.parse(response);
                      if(response.code==1){
                        $('.bio_bl').show();
                        $('#b_io').html(bio_graphy);
                        $('.shw_bio_bl').hide();
                        $('#bio_graphy').val(bio_graphy);
                        // swal('Success!',  response.msg, 'success');
                      }else{
                        swal('Oops!',  response.msg, 'warning');
                      }
                    }
            });
          });
        </script>
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active p-2 font14" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">    
                <div class="text-center border-bottom">
                  <span><i class="fa fa-comment-o" aria-hidden="true"></i></span>
                  <div class="bio_bl">
                    <p id="b_io">
                    <?php
                        if($MyDetails[0]->bio_graphy!=""){
                          $bio=$MyDetails[0]->bio_graphy;
                        }else{
                          $bio="No Bio Added Yet.";
                        }

                    ?>
                    <?=$bio?>
                  
                    </p>
                    <?php
                      if($myId==1){
                        ?>
                           <a href="javascript:void(0)" id="ad_bio">Add Bio</a>
                        <?php
                      }
                    ?>
                   
                  </div>
                  <div class="shw_bio_bl" style="display: none">
                    <form id="addBio">
                      <textarea name="bio_graphy" id="bio_graphy"  class="form-control bio_text" rows="3"></textarea>
                      <div class="text-right"><label class="btn btn-primary bio_btn cncl_btn_ m-0 mr-2" >Cancel</label><button class="mr-2 btn btn-success bio_btn">Save</button></div>
                    </form>
                  </div>
                  <br>
                </div>
                <script>
                  $(document).on("click","#ad_bio",function(){
                      $(".shw_bio_bl").show();
                      $(".bio_bl").hide();

                  })
                   $(document).on("click",".cncl_btn_",function(){
                      $(".shw_bio_bl").hide();
                      $(".bio_bl").show();

                  })

                </script>
                <div class="p-2">
                  <ul>
                    <li class="row">
                      <div class="col-md-1 "><span><i class="fa fa-briefcase" aria-hidden="true"></i> </span></div>
                      <div class="col-md-10 pl-2">
                        
                        <?php
                          if(count($WorkDetails)>0){
                            echo $WorkDetails[0]->position;
                            echo '<a href=""> '.$WorkDetails[0]->company_name.'</a>';
                          }else{
                            echo '<a href="">Unemployed</a>';
                          }
                        ?>
                      </div>
                    </li>
                    <li class="row">
                      <div class="col-md-1 "><span><i class="fa fa-briefcase" aria-hidden="true"></i> </span></div>
                      <div class="col-md-10 pl-2">
                        Worked at 
                        <a href="">Student</a></div>
                    </li>
                    <li class="row">
                      <div class="col-md-1 "><span><i class="fa fa-graduation-cap" aria-hidden="true"></i> </span></div>
                      <div class="col-md-10 pl-2">
                        Studied College at 
                        <?php
                          if(count($UniversityDetails)>0){
                            echo '<a href="">'.$UniversityDetails[0]->university.'</a>';
                          }else{
                            echo '<a href="">Student</a>';
                          }
                        ?>
                        <!-- <a href="">Uttranchal University</a></div> -->
                    </li>
                    <li class="row">
                      <div class="col-md-1 "><span><i class="fa fa-graduation-cap" aria-hidden="true"></i> </span></div>
                      <div class="col-md-10 pl-2">
                        Studied at 
                        <?php
                          if(count($SchoolDetails)>0){
                            echo '<a href="">'.$SchoolDetails[0]->school.'</a>';
                          }else{
                            echo '<a href="">Student</a>';
                          }
                        ?>
                        </div>
                    </li>
                    <li class="row">
                      <div class="col-md-1 "><span><i class="fa fa-home" aria-hidden="true"></i> </span></div>
                      <div class="col-md-10 pl-2">
                        Lives in 
                        <a href="">Jaipur, India</a></div>
                    </li>
                    <li class="row">
                      <div class="col-md-1 "><span><i class="fa fa-map-marker" aria-hidden="true"></i> </span></div>
                      <div class="col-md-10 pl-2">
                        From 
                        <a href="">Jaipur</a></div>
                    </li>
                    <li class="row">
                      <div class="col-md-1 "><span><i class="fa fa-heart" aria-hidden="true"></i> </span></div>
                      <div class="col-md-10 pl-2">Single </div>
                    </li>

                    
                  </ul>
                </div>
          </div>
          <div class="tab-pane fade pt-3 font14" id="nav-active" role="tabpanel" aria-labelledby="nav-profile-tab">
           <!--  <h5>Diana Katherine <i class="fa fa-circle" aria-hidden="true" style="font-size: 12px"></i>
              </h5> -->

            <ul class="list-group">
              <?php
                foreach ($MyFriends as $frnd) {
                  # code...
                  ?>
                      <li class="list-group-item d-flex justify-content-between align-items-center">
                        <a href="javascript:void(0)" class="chatFriend" d-name="<?=$frnd->full_name?>" d-fNd="<?=$frnd->user_id?>">
                          <img class="rounded-circle " src="<?=base_url()?>assets/img/Profile_Pic/<?=$frnd->profile_picture?>" onerror="this.src='<?=base_url()?>assets/img/Profile_Pic/default.png';" width="40px" height="40px"><?=$frnd->full_name?>
                          <!-- <i class="fa fa-circle ml-auto" aria-hidden="true"></i> --> <i class="pl-3 fa fa-angle-right" aria-hidden="true"></i>
                        </a>
                      </li>
                  <?php
                }
              ?>
            </ul>
          </div>
          <div class="tab-pane fade pt-3" id="nav-photos" role="tabpanel" aria-labelledby="nav-profile-photo">
		    	<div class="card border-0">
		 			<div class="card-body p-1">
		        	 <h4>Photos</h4>
		        	 <hr>	
			          <div class="row page_st m-0">
					  <?php
						foreach($AllPosts as $post){
							if($post['post_type']==1){
								?>
									<div class="col-md-4 mt-2  px-1">
										<img src="<?=base_url('assets/uploads/images/').$post['post_files']?>" class="">
									</div>
								<?php
							}
						}
					  ?>
			          	
			          	
			          	
			          </div>
			        </div>
			        <div class="card-body p-1">
		        	 	<h4>Videos</h4>
		        	 	<hr>
			          <div class="row page_st m-0">
			          	<?php
						foreach($AllPosts as $post){
							if($post['post_type']==2){
								?>
									<div class="col-md-4 mt-2  px-1">
										<video width="50" height="50" controls>
										  <source src="<?=base_url('assets/uploads/videos/').$post['post_files']?>" type="video/mp4">
										  <source src="<?=base_url('assets/uploads/videos/').$post['post_files'] ?>" type="video/ogg">
										  Your browser does not support the video tag.
										</video>
										
									</div>
								<?php
							}
						}
					  ?>
			          </div>
			        </div>
			    </div>
          </div>
        </div>
         <div class="trend bg-white p-3 mt-3">
          <h6>TRENDING</h6>
            <ul class="list-group">
              <?php
              foreach ($Trending as $trending) {
              ?>
              <li class="list-group-item d-flex justify-content-between align-items-center px-1">
                <img class="img-fluid w-25" src="<?=base_url()?>assets/img/Profile_Pic/<?=$trending->profile_picture?>">
                <small><?=$trending->post?></small>
                <i class="fa fa-angle-right pl-1" aria-hidden="true"></i>
              </li>
              <?php
              }
              ?>
            </ul>
        </div>
      </div>
    </div>
	</div>
</section>
<script type="text/javascript">
  var user_id=<?=$_SESSION['logged_in'][0]->user_id?>;
  getMyPost(user_id);
  var lastId;
  var startId;
  var initial=0;

  function getMyPost(user_id){
    console.log("Scroll On Work.");
    $.ajax({
            url:"<?=base_url()?>APIController/getAllMyPost",
             type:"post",
             data:{user_id:user_id},
            success:function(response)
            {
              console.log(response);
              response=JSON.parse(response);
              if(response.code==1){
				  console.log("Inside If Loop :" +response.data.length);
                for(let i=0; i<response.data.length; i++){
					console.log("Inside For Loop");
                  if(response.data[i].post_id < lastId || initial==0 ){
                    initial=1;
					console.log("Post Type: "+response.data[i].post_type);
                    if(response.data[i].post_type == 0){
						console.log("Text Post");
                    var post='<div class="card mt-4">'+
                          '<div class="card-header">'+
                          '<a class="font-weight-bold" href="<?=base_url('Profile/')?>'+response.data[i].user_id+'"><img class="rounded-circle postProfile-pic" src="<?=base_url()?>assets/img/Profile_Pic/'+response.data[i].profile_pic+'" width="30">'+response.data[i].posted_by+'</a>'+
                          '<a class="" href="#"><img class="img-fluid float-right pt-3" src="assets/webimg/dots.png"></a>'+
                          
                          '</div>'+
						              '<div class="card-body text-justify">'+
						              '<p>'+response.data[i].post+'</p>'+
							             '</div>'+
                          '<div class="total row px-2 text-right">'+
                        '</div>'+
                        '<div class="card-footer">'+
                          '<div class="row text-center">'+
                            '<div class="col-md-4 manage  py-2">'+
                              '<div class="btn-like" ><a href="javascript:void(0)" class="likePost" d-Post='+response.data[i].post_id+'><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>Like</a> <span class="font-weight-bold"> '+response.data[i].total_likes+'</span></div>'+
                            '</div>'+
                            '<div class="col-md-4 manage  py-2">'+
                              '<div class="btn-comment"><a href=""><i class="fa fa-comment-o" aria-hidden="true"></i>Comment</a> <span class="font-weight-bold">'+response.data[i].total_comments+'</span></div>'+
                            '</div>'+
                            '<div class="col-md-4 manage  py-2">'+
                              '<div class="btn-share"><a href=""><i class="fa fa-share-square-o" aria-hidden="true"></i> Share</a><span class="font-weight-bold">'+response.data[i].total_share+'</span></div>'+
                            '</div>'+
                          '</div>'+
                        '</div>'+
                      '</div>';
                  }else if(response.data[i].post_type==1){
					  console.log("Image Post");
                    var post='<div class="card mt-4">'+
                          '<div class="card-header">'+
                          '<a class="font-weight-bold" href="<?=base_url('Profile/')?>'+response.data[i].user_id+'"><img class="rounded-circle  postProfile-pic" src="<?=base_url()?>assets/img/Profile_Pic/'+response.data[i].profile_pic+'" >'+response.data[i].posted_by+'</a>'+
                          '<a class="" href="#"><img class="img-fluid float-right pt-3" src="assets/webimg/dots.png"></a>'+
                         
                          '</div>'+
                          '<div class="card-body text-center">'+
						              '<p>'+response.data[i].post+'</p>'+
                          '<div class="post_img"><a class="" href="#"><img class="img img-fluid d-block" src="<?=base_url('assets/uploads/images/')?>'+response.data[i].post_files+'"></a>'+
                          '</div>'+
                          '</div>'+
                          '<div class="total row px-2 text-right">'+
                        '</div>'+
                        '<div class="card-footer">'+
                          '<div class="row text-center">'+
                            '<div class="col-md-4 manage  py-2">'+
                              '<div class="btn-like" ><a href="javascript:void(0)" class="likePost" d-Post='+response.data[i].post_id+'><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>Like</a> <span class="font-weight-bold"> '+response.data[i].total_likes+'</span></div>'+
                            '</div>'+
                            '<div class="col-md-4 manage  py-2">'+
                              '<div class="btn-comment"><a href=""><i class="fa fa-comment-o" aria-hidden="true"></i>Comment</a> <span class="font-weight-bold">'+response.data[i].total_comments+'</span></div>'+
                            '</div>'+
                            '<div class="col-md-4 manage  py-2">'+
                              '<div class="btn-share"><a href=""><i class="fa fa-share-square-o" aria-hidden="true"></i> Share</a><span class="font-weight-bold">'+response.data[i].total_share+'</span></div>'+
                            '</div>'+
                          '</div>'+
                        '</div>'+
                      '</div>';
                  }else{
					  console.log("Video Post");
                    var post='<div class="card mt-4">'+
                          '<div class="card-header">'+
                          '<a class="font-weight-bold" href="<?=base_url('Profile/')?>'+response.data[i].user_id+'"><img class="rounded-circle postProfile-pic" src="<?=base_url()?>assets/img/Profile_Pic/'+response.data[i].profile_pic+'" >'+response.data[i].posted_by+'</a>'+
                          '<a class="" href="#"><img class="img-fluid float-right pt-3" src="assets/webimg/dots.png"></a>'+
                          
                          '</div>'+
                          '<div class="card-body">'+
						              '<p>'+response.data[i].post+'</p>'+
                          '<video controls class="w-100">'+
                          '<source src="<?=base_url()?>assets/uploads/videos/'+response.data[i].post_files+'" type="video/mp4">'+
                          'Your browser does not support the video tag.'+
                        '</video>'+
                        '</div> '+ 
                          '<div class="total row px-2 text-right">'+
                        '</div>'+
                        '<div class="card-footer">'+
                          '<div class="row text-center">'+
                            '<div class="col-md-4 manage  py-2">'+
                              '<div class="btn-like" ><a href="javascript:void(0)" class="likePost" d-Post='+response.data[i].post_id+'><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>Like</a> <span class="font-weight-bold"> '+response.data[i].total_likes+'</span></div>'+
                            '</div>'+
                            '<div class="col-md-4 manage  py-2">'+
                              '<div class="btn-comment"><a href=""><i class="fa fa-comment-o" aria-hidden="true"></i>Comment</a> <span class="font-weight-bold">'+response.data[i].total_comments+'</span></div>'+
                            '</div>'+
                            '<div class="col-md-4 manage  py-2">'+
                              '<div class="btn-share"><a href=""><i class="fa fa-share-square-o" aria-hidden="true"></i> Share</a><span class="font-weight-bold">'+response.data[i].total_share+'</span></div>'+
                            '</div>'+
                          '</div>'+
                        '</div>'+
                      '</div>';
                  }
                   $('#postViews').append(post);
                   lastId=response.data[i].post_id;
                  }
                  
                }
                console.log("Last Post Id: "+lastId);
              }
            }
        });
  }


  // $(document).on('click','.likePost',function(){
  //   var post_id=$(this).attr('d-Post');
  //   $.ajax({
  //     url:"<?=base_url('APIController/likeOrdislike')?>",
  //     type:"post",
  //     data:{post_id:post_id,to_do:'like'},
  //     success:function(response){
  //       response=JSON.parse(response);
  //       if(response.code==1){
  //         swal("Good", response.msg, "success");
  //       }else{
  //         swal("Oops...!", response.msg, "warning");
  //       }
  //     }
  //   });
  // });


  $(window).scroll(function () {
    var scrollValue=Math.round($(window).scrollTop());
    var screenSize=Math.round($(window).height());
    var documentSize=Math.round($(document).height());
    var windowSection=documentSize - screenSize;
    console.log(windowSection-scrollValue+" dsf ");
    if(windowSection-scrollValue<=1){
      getMyPost(user_id);
    }
   

      });
 
</script>


<script>
  $("#add_post").submit(function(e){
        e.preventDefault();
        var formData= new FormData($(this)[0]);
        formData.append('u_id',<?=$user_id?>);
        var ext_array=[];
        var selection = document.getElementById('img_video');
        for (var i=0; i<selection.files.length; i++) {
            var ext = selection.files[i].name.substr(-3);
            ext_array.push(ext);
        }
        if ($.inArray('mp4', ext_array) != -1 && ($.inArray('jpg', ext_array) != -1 || $.inArray('jpeg', ext_array) != -1 || $.inArray('gif', ext_array) != -1 || $.inArray('png', ext_array) != -1)) {
            alert('Video and Image');
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
                            alert(response.msg);
                            // swal("Success", "Story Successfully", "success");
                            $("#add_post").trigger("reset");
                            // location.reload();
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
                            // location.reload();
                          }
                        }
                  });  
              }
            }
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
        console.log(response);
        response=JSON.parse(response);
      //   if(response.code==1){
      //      if(like=='fa fa-heart-o'){
      //          ele.parent().find('ul').find('.like_cont').html(parseInt(lcnt)+1);
      //          ele.find("i").attr("class","fa fa-heart");
      //       }else{
      //         ele.find("i").attr("class","fa fa-heart-o");
      //          ele.parent().find('ul').find('.like_cont').html(parseInt(lcnt)-1);
      //       }
      // //    swal("Good", response.msg, "success");
      //   }else{
      //   //  swal("Oops...!", response.msg, "warning");
      //   }
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
      $('.emojionearea-editor').css("min-height","9em");
      $('.emojionearea-editor').css("text-align","center");
      $('.emojionearea-editor').css("font-size","28px");
      $('.emojionearea-editor').css("background-size","cover");
      $('.emojionearea-editor').css("color","black");
      $('.emojionearea-editor').attr("id","screenshot");
  })
</script>
<script>

  $(document).ready(function() {
        $("#emojionearea1").emojioneArea({
            pickerPosition: "right",
            tonesStyle: "bullet",
            events: {
            keyup: function (editor, event) {
              countChar(this);
                console.log(editor.html());
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
  $(document).on('click','.tagfriend',function(){
   // $('.withs').css('display','flex');
   $('.withs').toggleClass ('expanded');

  });
</script>
<script>
 $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
  $(document).on('click','#aad',function(e){
    e.preventDefault();
    console.log($('#emojionearea1').val());
  });

  $(function () {
    $('.icontheme').click (function () {
        $(this).toggleClass ('expanded');
        $('.bgimgs').toggleClass ('expanded');
    });
});
  $(document).ready(function() {
        $("#emojionearea1").emojioneArea({
        
            pickerPosition: "right",
            tonesStyle: "bullet",
            events: {
                keyup: function (editor, event) {
                    console.log(editor.html());
                    console.log(this.getText());
                }
            }
        });

        $('#divOutside').click(function () {
                    $('.emojionearea-button').click()
                })        
    });


  $(document).ready(function(){
        var offset =10;
      $(window).scroll(function() {
          if($(window).scrollTop() == $(document).height() - $(window).height()) {
              // $.ajax({
              //     url:"<?=base_url('APIController/sharePost')?>",
              //     type:"post",
              //     data:{post_id:postId},
              //     success:function(res){
              //       res=JSON.parse(res);
              //       if(res.code==1){
                      
              //       }
              //     }
              // });
              var html='<div class="my-5"><h2>hello</h2>';
              $("#pst_shw_").append(html);
          }
      });
    })

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
   $(document).ready(function() {
            $(".timeago").each(function(){
                $(this).timeago();

            });
          });
</script>
