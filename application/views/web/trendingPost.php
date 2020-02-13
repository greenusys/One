
<div class="container card mt-5 w-50 shadow-lg p-4">
    <h5 class="font-weight-bold text-dark">Trending Posts</h5>
    <hr>
    
    <?php
        // print_r($Trending);
        foreach($Trending as $p_ost){
        
           if($p_ost['post_type']==0){
               
               ?>       
                        <div class="card mt-4">
                    <div class="card-header ">
            <div class="d-flex float-left">
             <div> 
                      <a class="font-weight-bold" href="#">
                 <img class="rounded-circle" src="<?=base_url('assets/webimg/face.png')?>" width="60">
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
                    <div class="card-body text-justify">
                        <p>
                        <?=$p_ost['post']?>
                        </p>
            
      
                    </div>
                    <!--<div class="total row px-2 text-right">
                      <div class="col-md-3 text-left"> 
                        <i class="fa fa-thumbs-o-up" aria-hidden="true"></i><span>200</span>
                      </div>
                      <div class="col-md-3"> 
                        <span>200</span><span> Comments</span>
                      </div>
                      <div class="col-md-3"> 
                        <span>200</span><span> Share</span>
                      </div>
                      <div class="col-md-3"> 
                        <span>200</span><span> views</span>
                      </div> */
                    </div>-->
                    <div class="card-footer p-0">
                      <div class="row ">
                        <div class="col-md-4 manage ">
                         <!--  <div class="btn-like" ><a href="javascript:void(0)" class="likePost" d-Post="<?=$p_ost['post_id']?>"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>Like</a> <span class="font-weight-bold likeValue"> <?=$p_ost['total_likes']?></span></div> -->
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
                  
                    <!-- <li><img class="rounded-circle like_img  like_img_marg45" src="<?=base_url('assets/webimg/face.png')?> "></li>
                    <li><img class="rounded-circle like_img like_img_marg45" src="<?=base_url('assets/webimg/face.png')?> "></li>
                    <li><img class="rounded-circle like_img like_img_marg45" src="<?=base_url('assets/webimg/face.png')?> "></li> -->
                   <?php 
                     if(count($p_ost['likes_data']) > 0){ ?>
                         <li><div class=" like_cont likeValue rounded-circle like_img_marg25"> <?=count($p_ost['total_likes'])?></div></li>
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
           <div class=" comments_list">
                <?php 
                //echo"hello";

                  //print_r($p_ost['total_comments']);
                if(count($p_ost['total_comments'])>0){
                ?>

                <?php for($i=0; $i < count($p_ost['total_comments']); $i++){ ?>
              <div class="row m-0">
                  <div class="col-md-1">
                      <span> <img class="rounded-circle like_img" src="<?=base_url()?>assets/img/Profile_Pic/<?=$MyDetails[0]->profile_picture?>"></span>  
                  </div>
                  <div class="col-md-10 comnt_text border-bottom">
                      <h6 class="font-weight-bold m-0" > <?=$p_ost['total_comments'][$i]->full_name?><small class="ml-3"><?=$p_ost['total_comments'][$i]->commented_on?></small></h6>
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
                          <textarea class="input-field cmnt_" data-emojiable="true" type="text" name="comment" id="comment" placeholder="Add a Message">  </textarea>
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
                <div class="card mt-4">
               <div class="card-header ">
            <div class="d-flex float-left">
             <div> 
              <a class="font-weight-bold" href="#">
                 <img class="rounded-circle" src="<?=base_url('assets/webimg/face.png')?>" width="60">
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
                    <div class="card-body text-center">
                        <p>
                        <?=$p_ost['post']?>
                        </p>
                      <div class="post_img"><a class="" href="#"><img class="img img-fluid d-block" src="<?=base_url()?>assets/uploads/images/<?=$p_ost['post_files']?>"></a></div>
                    </div>
                    
                    <div class="card-footer p-0">
                      <div class="row text-center">
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
                <span class=""><?=count($p_ost['likes_data'])?></span>
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
           <div class=" comments_list">
                <?php 
                //echo"hello";

                  //print_r($p_ost['total_comments']);
                if(count($p_ost['total_comments'])>0){
                ?>

                <?php for($i=0; $i < count($p_ost['total_comments']); $i++){ ?>
              <div class="row m-0">
                  <div class="col-md-1">
                      <span> <img class="rounded-circle like_img" src="<?=base_url()?>assets/img/Profile_Pic/<?=$MyDetails[0]->profile_picture?>"></span>  
                  </div>
                  <div class="col-md-10 comnt_text border-bottom">
                      <h6 class="font-weight-bold m-0" > <?=$p_ost['total_comments'][$i]->full_name?><small class="ml-3"><?=$p_ost['total_comments'][$i]->commented_on?></small></h6>
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
                          <textarea class="input-field cmnt_" data-emojiable="true" type="text" name="comment" id="comment" placeholder="Add a Message">  </textarea>
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
                <div class="card mt-4">
                     <div class="card-header ">
            <div class="d-flex float-left">
             <div> 
              <a class="font-weight-bold" href="#">
                 <img class="rounded-circle" src="<?=base_url('assets/webimg/face.png')?>" width="60">
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
                    
                    <div class="card-footer p-0">
                      <div class="row text-center">
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
           <hr>
           <div class=" comments_list">
              <?php 
                //echo"hello";

                  // print_r($p_ost['total_comments']);
                if(count($p_ost['total_comments'])>0){
                for($i=0; $i < count($p_ost['total_comments']); $i++){ ?>
                  <div class="row m-0">
                      <div class="col-md-1">
                          <span> <img class="rounded-circle like_img" src="<?=base_url()?>assets/img/Profile_Pic/<?=$MyDetails[0]->profile_picture?>"></span>  
                      </div>
                      <div class="col-md-10 comnt_text border-bottom">
                          <h6 class="font-weight-bold m-0" > <?=$p_ost['total_comments'][$i]->full_name?><small class="ml-3"><?=$p_ost['total_comments'][$i]->commented_on?></small></h6>
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
                          <textarea class="input-field cmnt_" data-emojiable="true" type="text" name="comment" id="comment" placeholder="Add a Message">  </textarea>
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
    ?>
  
   
	
</div>

<!-- <script>
	$(document).ready(function(){
	  $("#lov").hover(function(){
		  $("#lovlist").toggle();
	 });
 });
 </script>
 
 <script>
	$(document).ready(function(){
	  $("#likes").hover(function(){
		  $("#likeslist").toggle();
	 });
 });
 </script>
 
 <script>
	$(document).ready(function(){
	  $("#comment").hover(function(){
		  $("#commentlist").toggle();
	 });
 });
 </script> -->
<script type="text/javascript">
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
</script> 



 
 