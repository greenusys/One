<?php
else if($p_ost['post_type']==1){
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
              if(count($p_ost['total_comments'])>0){
              for($i=0; $i < count($p_ost['total_comments']); $i++){ ?>
              <div class="row mt-2 px-2">
                  <div class="col-md-1">
                      <span> <img class="rounded-circle like_img" src="<?=base_url()?>assets/img/Profile_Pic/<?=$p_ost['total_comments'][$i]->profile_picture?>"></span>  
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
                    $ext = pathinfo($postimages[$i], PATHINFO_EXTENSION);
                  
                    ?>
                  <div class="col-md-6 p-3">
                    <a class="" href="<?=base_url('Post/viewPost/').$p_ost['post_id']?>"><img class="img img-fluid rounded d-block post_image" src="<?php if ($ext=="mp4") :base_url().'assets/uploads/videos/'.$postimages[$i]?> ? base_url().'assets/uploads/images/'.$postimages[$i]?>"></a>
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
              if(count($p_ost['total_comments'])>0){
              for($i=0; $i < count($p_ost['total_comments']); $i++){ ?>
              <div class="row mt-2 px-2">
                  <div class="col-md-1">
                      <span> <img class="rounded-circle like_img" src="<?=base_url()?>assets/img/Profile_Pic/<?=$p_ost['total_comments'][$i]->profile_picture?>"></span>  
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
                if(count($p_ost['total_comments'])>0){
                for($i=0; $i < count($p_ost['total_comments']); $i++){ ?>
                  <div class="row mt-2 px-2">
                      <div class="col-md-1">
                          <span> <img class="rounded-circle like_img" src="<?=base_url()?>assets/img/Profile_Pic/<?=$p_ost['total_comments'][$i]->profile_picture?>"></span>  
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
                    </form>
                 </div>
              </div>

            </div>
          </div>
         <?php
       }
      }
    }