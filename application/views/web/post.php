<script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <script src="https://files.codepedia.info/files/uploads/iScripts/html2canvas.js"></script>
  <style>
    .profile-div
    {
	    height:75px;
		width:100px;
    }
	.comment-profile
	{
		height:42px;
		width:100px;
	}
	.bg
	{
		background-color:white;
		padding:5px;
	}
	.bg:hover
	{
		background-color: #645f5f;
		color:white;
	}
	.mt
	{
		margin-top:-40px;
	}
	.fs
	{
		font-size:13px;
	}
	.dropdown-item:focus, .dropdown-item:hover 
	{
       color: #16181b;
       text-decoration: none;
       color: white;
       background-color: #606162;
    }
	.content-div
	{
		position: absolute;
        will-change: transform;
        top: -20px;
        left: -95px;
        transform: translate3d(9px, 44px, 0px)
	}
	.emoji
	{
	   width:100%;
	   background-color:#d7d6d6;;
	   margin:0px auto;
	}
	.reply
	{
	   width:100%;
	   background-color:#d7d6d663;
	   margin:0px auto;
	}
	.comnt
	{
	   width:100%;
	   background-color:#d7d6d663;
	}
	.gif
	{
		height:46px;
	}
	.comment-size
	{
		height:120px;
	}
	.view-section
	{
        height:610px;
        overflow: auto;
    }
	.bottom-section
	{
		width: 100%;
		background-color: #f4efefe6;
		margin: 0px auto;
	}
	.icon1
	{
		font-size: 15px;
        color: blue;
        margin-top: 25px;
        border-radius: 50%;
        padding: 5px;
        margin-left: -22px;
        background-color: #80808033;
	}
	.icon2
	{
		font-size: 15px;
        color: red;
        margin-top: 25px;
        border-radius: 50%;
        padding: 5px;
        margin-left: -22px;
        background-color: #80808033;
	}
	.icon3
	{
		font-size: 15px;
        color: orange;
        margin-top: 25px;
        border-radius: 50%;
        padding: 5px;
        margin-left: -22px;
        background-color: #80808033;
	}
	
  </style>
<?php 

  $session=$this->session->userdata('logged_in');
    $user_Id=$session[0]->user_id;
    $profile_picture = $session[0]->profile_picture;
?>
    <div class="container card shadow mt-5 p-4" style="background-color:#00000094">
		<div class="row">
		<?php
	 //print_r($Detail);
		?> 
		    <div class="col-sm-7 col-md-7 col-lg-7 p-4">
			<?php
				if($Detail[0]['post_type']==1){
					$imgArry=explode(',',$Detail[0]['post_files']);
					?>
						<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<?php
								$i=1;
								$active='';

									foreach($imgArry as $img){
										if($i==1){
											$active='active';
										}
										?>
											<div class="carousel-item <?=$active?>">
												<img src="<?=base_url('assets/uploads/images/').$img?>" class="d-block w-100" alt="...">
											</div>
										<?php
										$i++;
										$active="";
									}
								?>
								
								<!-- <div class="carousel-item">
								<img src="image/profile.jpeg" class="d-block w-100" alt="...">
								</div>
								<div class="carousel-item">
								<img src="image/photo.jpeg" class="d-block w-100" alt="...">
								</div> -->
							</div>
							<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
								<span class="carousel-control-prev-icon" aria-hidden="true"></span>
								<span class="sr-only">Previous</span>
							</a>
							<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
								<span class="carousel-control-next-icon" aria-hidden="true"></span>
								<span class="sr-only">Next</span>
							</a>
						</div>
					<?php
				}

			?>
			    
			    <!--<img src="image/photo.jpeg" class="img-fluid"> class="profile-div"--->
			</div>
		    <div class=" card col-sm-5 col-md-5 col-lg-5">
			    <div class=" view-section bg-light p-3">
			        <div class="row">
				        <div class="col-sm-2">
					       <img src="<?=base_url('assets/img/Profile_Pic/').$Detail[0]['profile_pic']?>" class="m-3 rounded-circle img-fluid ">
					    </div>
					    <div class="col-sm-8">
					      <h6 class="font-weight-bold mt-3"><?=$Detail[0]['posted_by']?></h6>
						  <h6 class="font-weight-normal"><?=$Detail[0]['posted_on']?> &nbsp; <i class='fas fa-user-friends'></i></h6>
					    </div>
					    <div class="col-sm-2">
					      <div class="float-right d-flex mt-2">
		                      <div class="">
		                         <?php
		                      
		                        $post_id=$Detail[0]['post_id'];
		                        $this->db->where(array('user_id'=>$user_Id,'post_id'=>$post_id));
		                        $re=$this->db->get('user_fav_section')->result();
			                        if(count($re)==0){
			                        ?>
			                      	  <span class="favrt" post_id="<?=$post_id?>" title="favourite"><i class="far fa-star"></i></span>
			                        <?php
			                        }else{?>
			                      	  <span class="favrt star" post_id="<?=$post_id?>" title="favourite"><i class="fas fa-star text-gold"></i></span>
		                        <?php }
		                        ?>
		                        <!-- <span><i class="fas fa-star"></i></span> -->
		                      </div>
		                      <?php if($_SESSION['logged_in'][0]->user_id==$Detail[0]['user_id']){ ?>
		                          <div class="dropdown ml-3">
		                            <button class="dropbtn"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></button>
		                            <div class="dropdown-content bg-white">
		                            
		                              <a href="javascript:void(0)" class="dlt_post_" p_d=<?=$p_ost['post_id']?> >Delete</a>
		                              
		                            </div>
		                          </div>
		                          <?php } ?>
		                    </div> 
					    </div>
				    </div>
					<div class="row">
					    <div class="mt-2 pl-4">
						    <h6 class="font-weight-normal text-lowercase author"><?=$Detail[0]['post']?></h6>
						</div>
					</div>
				
					
					
					   <div class="row mt-4">
            <div class="col-md-4 manage ">
              <div class="text-center px-3 py-1">
                <div class="btn-like d-flex" ><a href="javascript:void(0)" class="text-danger likePost" d-Post="<?=$Detail[0]['post_id']?>">
              <?php 

                  if(count($Detail[0]['likes_data']) > 0){
                  foreach ($Detail[0]['likes_data'] as $likedata) {
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
                        foreach ($Detail[0]['likes_data'] as $likedata) { 
                         
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
                     if(count($Detail[0]['likes_data']) > 0){ ?>
                         <li><div class=" like_cont likeValue rounded-circle like_img_marg25"> <?=count($Detail[0]['total_likes'])?></div></li>
                    <?php  
                        }else{ ?>
                            <li><div class=" like_cont likeValue rounded-circle "> <?=count($Detail[0]['total_likes'])?></div></li> 
                   <?php } ?>
                   
                  </ul>
                </div> 
              </div>
            </div>
            <div class="col-md-4 manage px-3 py-1">
              <div class="btn-comment post-btns">
                <a href="javascript:void(0)"><i class="fa fa-comment-o" aria-hidden="true"></i> Comments</a> 
                <span class=""></span>
              </div>
            </div>
            <div class="col-md-4 manage px-3 py-1">
              <div class="btn-share post-btns">
                <a href="javascript:void(0)" class="shareThisPost" d-ost=""><i class="fa fa-share-square-o" aria-hidden="true"></i> Share</a>
                <span class=""></span>
              </div>
            </div>
            </div>
					<hr>
					  <div class=" comments_list border-top">
                <?php 
                //echo"hello";

                //  print_r($Detail[0]['total_comments']);
                if(count($Detail[0]['total_comments'])>0){
                ?>

                <?php for($i=0; $i < count($Detail[0]['total_comments']); $i++){ ?>
              <div class="row mt-2 px-2">
                  <div class="col-md-1">
                      <span> <img class="rounded-circle like_img" src="<?=base_url()?>assets/img/Profile_Pic/<?=$profile_picture?>"></span>  
                  </div> 
                  <div class="col-md-10 comnt_text border-bottom">
                      <h6 class="font-weight-bold m-0" > <?=$Detail[0]['total_comments'][$i]->full_name?><small class="ml-3"><time class="timeago" datetime=" <?=$Detail[0]['total_comments'][$i]->commented_on?>"></time></small></h6>
                      <p class=""><?=$Detail[0]['total_comments'][$i]->comment?></p>
                  </div>
                <div class="col-md-1">
                 <?php if(($_SESSION['logged_in'][0]->user_id==$Detail[0]['total_comments'][$i]->user_id) OR ($_SESSION['logged_in'][0]->user_id==$Detail[0]['user_id']) ){ ?>
                    <div class="dropdown">
                      <button class="dropbtn"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></button>
                      <div class="dropdown-content bg-white">
                           <?php  if($_SESSION['logged_in'][0]->user_id ==$Detail[0]['total_comments'][$i]->user_id ){   ?>
                                <a href="javascript:void(0)" class="edit_comment" c_d="<?=$Detail[0]['total_comments'][$i]->id?>">Edit</a>
                          <?php }  ?>
                        <a href="javascript:void(0)" class="dlt_comnt_" c_d="<?=$Detail[0]['total_comments'][$i]->id?>">Delete</a>
                        
                      </div>
                    </div>
                	<?php } ?>
              	</div>
             </div>
            <?php } 
          }?>
                
           
            </div>
					
				</div>    
				<div class="row emoji p-2 shadow-sm  rounded-pill" id="gifs" style="display:none">
					<div class="col-sm-2">
					<img src="<?=base_url('assets/img/')?>/em1.gif" class="rounded-circle gif">
					</div>
					<div class="col-sm-2">
						<img src="<?=base_url('assets/img/')?>/em2.gif" class="rounded-circle gif">
					</div>
					<div class="col-sm-2">
						<img src="<?=base_url('assets/img/')?>/em3.gif" class="rounded-circle gif">
					</div>
					<div class="col-sm-2">
						<img src="<?=base_url('assets/img/')?>/em4.gif" class="rounded-circle gif">
					</div>
					<div class="col-sm-2">
						<img src="<?=base_url('assets/img/')?>/em5.gif" class="rounded-circle gif">
					</div>
					<div class="col-sm-2">
						<img src="<?=base_url('assets/img/')?>/em6.gif" class="rounded-circle gif">
					</div>
				</div>
                <div class="row bottom-sectionshadow-sm">
					<div class="p-2 w-100">
                 <div class="d-flex m-0">
                    <span> <img class="rounded-circle like_img" src="<?=base_url()?>assets/img/Profile_Pic/<?=$Detail[0]['profile_pic']?>"></span>
                    <form method="POST" class="w-100 ad_cmnt" >
                      <div class="pl-2 w-100 _input">
                        <p class="lead emoji-picker-container">
                          <textarea class="input-field cmnt_" data-emojiable="true" type="text" name="comment"  placeholder="Add a Message">  </textarea>
                        </p>
                              <input type="hidden" name="post_id" value="<?=$Detail[0]['post_id']?>">
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
		</div>
	</div>
	
	

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
<!-- Modal -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
		<div class="modal-content" id="thumb" style="display:none">
		    <div class="modal-header border-bottom-0">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="tab">
					<div class="container">
						<button class="tablinks border-0" onclick="openCity(event, 'all')">All 104</button>
						<button class="tablinks border-0" onclick="openCity(event, 'likes')"><i class="fa fa-thumbs-up" style="font-size:21px;color:blue"></i></button>
						<button class="tablinks border-0" onclick="openCity(event, 'loves')"><i class="fa fa-heart" style="font-size:21px;color:red"></i></button>
						<button class="tablinks border-0" onclick="openCity(event, 'faces')"><i class='fas fa-surprise' style='font-size:21px;color:orange'></i></button>
					</div>
				</div>
				
				<hr>
				<div id='all' class="tabcontent">
					<?php
					foreach($Detail[0]['total_comments'] as $cmt){
						?>
							<div class="row mt-3">
								<div class="col-sm-2">
									<img src="<?=base_url('assets/img/Profile_Pic/').$cmt->profile_picture?>" class="rounded-circle img-fluid comment-profile">
								</div>
								<i class="fa fa-thumbs-up icon1"></i>
								<div class="col-sm-3">
									<h6 class="font-weight-bold mt-2 fs"><?=$cmt->full_name?></h6>
								</div>
								<div class="offset-2 col-sm-4">
									<button type="button" class="btn btn-secondary"><i class="fa fa-check"></i> Friends</button>							 
								</div>
							</div>
							<hr>
						<?php
					}
					foreach($Detail[0]['total_likes'] as $likes_){
						?>
							<div class="row mt-3">
								<div class="col-sm-2">
									<img src="<?=base_url('assets/img/Profile_Pic/').$likes_->profile_picture?>" class="rounded-circle img-fluid comment-profile">
								</div>
								<i class="fa fa-thumbs-up icon1"></i>
								<div class="col-sm-3">
									<h6 class="font-weight-bold mt-2 fs"><?=$likes_->full_name?></h6>
								</div>
								<div class="offset-2 col-sm-4">
									<button type="button" class="btn btn-secondary"><i class="fa fa-check"></i> Friends</button>							 
								</div>
							</div>
							<hr>
						<?php
					}
					//	echo '<li>'.$liked->full_name.'</li> ';
						?>
					
					<div class="row mt-3">
						<div class="col-sm-2">
							<img src="image/photo.jpeg" class="rounded-circle img-fluid comment-profile">
						</div>
						<i class="fa fa-heart icon2"></i>
						<div class="col-sm-3">
							<h6 class="font-weight-bold mt-2 fs">Neha  Mishra</h6>
						</div>
						<div class="offset-2 col-sm-4">
							<button type="button" class="btn btn-secondary"><i class="fa fa-file"></i> Message</button>							 
						</div>
					</div>
					<hr>
					<div class="row mt-3">
						<div class="col-sm-2">
							<img src="image/photo.jpeg" class="rounded-circle img-fluid comment-profile">
						</div>
						<i class="fas fa-surprise icon3"></i>
						<div class="col-sm-3">
							<h6 class="font-weight-bold mt-2 fs">Sonali Sona</h6>
						</div>
						<div class="offset-2 col-sm-4">
							<button type="button" class="btn btn-secondary"><i class="fa fa-user-plus"></i> Add Friend</button>							 
						</div>
					</div>
					<hr>
				</div>
				<hr>	
				<div id='likes' class="tabcontent">
					<?php
					foreach($Detail[0]['total_likes'] as $likes_){
						?>
							<div class="row mt-3">
								<div class="col-sm-2">
									<img src="<?=base_url('assets/img/Profile_Pic/').$likes_->profile_picture?>" class="rounded-circle img-fluid comment-profile">
								</div>
								<i class="fa fa-thumbs-up icon1"></i>
								<div class="col-sm-3">
									<h6 class="font-weight-bold mt-2 fs"><?=$likes_->full_name?></h6>
								</div>
								<div class="offset-2 col-sm-4">
									<button type="button" class="btn btn-secondary"><i class="fa fa-check"></i> Friends</button>			 
								</div>
							</div>	
							<hr>
						<?php
					}
					//	echo '<li>'.$liked->full_name.'</li> ';
					?>
					
				</div>
				<hr>
				<div id="loves" class="tabcontent">
					<?php
						foreach($Detail[0]['total_likes'] as $likes_){
							?>
								<div class="row mt-3">
									<div class="col-sm-2">
										<img src="image/photo.jpeg" class="rounded-circle img-fluid comment-profile">
									</div>
									<i class="fa fa-heart icon2"></i>
									<div class="col-sm-3">
										<h6 class="font-weight-bold mt-2 fs">Neha  Mishra</h6>
									</div>
									<div class="offset-2 col-sm-4">
										<button type="button" class="btn btn-secondary"><i class="fa fa-file"></i> Message</button>				 
									</div>
								</div>	
								<hr>
							<?php
						}
						//	echo '<li>'.$liked->full_name.'</li> ';
						?>
								
				</div>
				<hr>
				<div id="faces" class="tabcontent">
					<div class="row mt-3">
						<div class="col-sm-2">
							<img src="image/photo.jpeg" class="rounded-circle img-fluid comment-profile">
						</div>
						<i class="fas fa-surprise icon3"></i>
						<div class="col-sm-3">
							<h6 class="font-weight-bold mt-2 fs">Sonali Sona</h6>
						</div>
						<div class="offset-2 col-sm-4">
							<button type="button" class="btn btn-secondary"><i class="fa fa-user-plus"></i> Add Friend</button>							 
						</div>
					</div>				
				</div>
			</div>
		</div> -->
		
		<!-- <div class="modal-content" id="heart" style="display:none">
		    <div class="modal-header border-bottom-0">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="tab">
					<div class="container">
						<button class="tablinks all border-0" onclick="openCity(event, 'all1')">All 104</button>
						<button class="tablinks likes border-0" onclick="openCity(event, 'like1')"><i class="fa fa-thumbs-up" style="font-size:21px;color:blue"></i></button>
						<button class="tablinks loves border-0" onclick="openCity(event, 'love1')"><i class="fa fa-heart" style="font-size:21px;color:red"></i></button>
						<button class="tablinks faces border-0" onclick="openCity(event, 'face1')"><i class='fas fa-surprise' style='font-size:21px;color:orange'></i></button>
					</div>
				</div>
				
				<hr>
				<div id='all1' class="tabcontent">
					<div class="row mt-3">
						<div class="col-sm-2">
							<img src="image/profile.jpeg" class="rounded-circle img-fluid comment-profile">
						</div>
						<i class="fa fa-thumbs-up icon1"></i>
						<div class="col-sm-3">
							<h6 class="font-weight-bold mt-2 fs">Sonali Mishra</h6>
						</div>
						<div class="offset-2 col-sm-4">
							<button type="button" class="btn btn-secondary"><i class="fa fa-check"></i> Friends</button>							 
						</div>
					</div>
					<hr>
					<div class="row mt-3" >
						<div class="col-sm-2">
							<img src="image/photo.jpeg" class="rounded-circle img-fluid comment-profile">
						</div>
						<i class="fa fa-heart icon2"></i>
						<div class="col-sm-3">
							<h6 class="font-weight-bold mt-2 fs">Neha  Mishra</h6>
						</div>
						<div class="offset-2 col-sm-4">
							<button type="button" class="btn btn-secondary"><i class="fa fa-file"></i> Message</button>							 
						</div>
					</div>
					<hr>
					<div class="row mt-3">
						<div class="col-sm-2">
							<img src="image/photo.jpeg" class="rounded-circle img-fluid comment-profile">
						</div>
						<i class="fas fa-surprise icon3"></i>
						<div class="col-sm-3">
							<h6 class="font-weight-bold mt-2 fs">Sonali Sona</h6>
						</div>
						<div class="offset-2 col-sm-4">
							<button type="button" class="btn btn-secondary"><i class="fa fa-user-plus"></i> Add Friend</button>							 
						</div>
					</div>
					<hr>
				</div>
					
				<div id='like1' class="tabcontent">
					<div class="row mt-3">
						<div class="col-sm-2">
							<img src="image/profile.jpeg" class="rounded-circle img-fluid comment-profile">
						</div>
						<i class="fa fa-thumbs-up icon1"></i>
						<div class="col-sm-3">
							<h6 class="font-weight-bold mt-2 fs">Sonali Mishra</h6>
						</div>
						<div class="offset-2 col-sm-4">
							<button type="button" class="btn btn-secondary"><i class="fa fa-check"></i> Friends</button>			 
						</div>
					</div>	
					
				</div>
				
				<div id="love1" class="tabcontent">
					<div class="row mt-3">
						<div class="col-sm-2">
							<img src="image/photo.jpeg" class="rounded-circle img-fluid comment-profile">
						</div>
						<i class="fa fa-heart icon2"></i>
						<div class="col-sm-3">
							<h6 class="font-weight-bold mt-2 fs">Neha  Mishra</h6>
						</div>
						<div class="offset-2 col-sm-4">
							<button type="button" class="btn btn-secondary"><i class="fa fa-file"></i> Message</button>				 
						</div>
					</div>				
				</div>
				
				<div id="face1" class="tabcontent">
					<div class="row mt-3">
						<div class="col-sm-2">
							<img src="image/photo.jpeg" class="rounded-circle img-fluid comment-profile">
						</div>
						<i class="fas fa-surprise icon3"></i>
						<div class="col-sm-3">
							<h6 class="font-weight-bold mt-2 fs">Sonali Sona</h6>
						</div>
						<div class="offset-2 col-sm-4">
							<button type="button" class="btn btn-secondary"><i class="fa fa-user-plus"></i> Add Friend</button>							 
						</div>
					</div>				
				</div>
			</div>
		</div> -->
		
    <!-- </div>
 </div> -->
	
 <script>
     	$(document).ready(function(){
		  $("#emoji").hover(function(){
			  $("#gif").toggle();
		 });
	 });
 </script>
 
  <script>
     	$(document).ready(function(){
		  $("#faceemoji").hover(function(){
			  $("#gif1").toggle();
		 });
	 });
 </script>
 
 <script>
     	$(document).ready(function(){
		  $("#textemoji").hover(function(){
			  $("#gif2").toggle();
		 });
	 });
 </script>
	
 <script>
		$(document).ready(function(){
		  $("#option").click(function(){
			  $("#menu").toggle();
		 });
	 });
 </script>
 
 <script>
	$(document).ready(function(){
	  $("#comment").click(function(){
		  $("#msg").toggle();
	 });
 });
 </script>
 
 <script>
	$(document).ready(function(){
	  $("#comnt").click(function(){
		  $("#msg1").toggle();
	 });
 });
 </script>
 
 <script>
	$(document).ready(function(){
	  $("#like").hover(function(){
		  $("#likelist").toggle();
	 });
 });
 </script>
 
 <script>
	$(document).ready(function(){
	  $("#love").hover(function(){
		  $("#lovelist").toggle();
	 });
 });
 </script>
 
 <script>
	$(document).ready(function(){
	  $("#review").hover(function(){
		  $("#reviewlist").toggle();
	 });
 });
 </script>
 
 <script>
		$(document).ready(function(){
		  $("#review").click(function(){
			  $("#allcomment").toggle();
		 });
	 });
 </script>
 
 <script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
 </script>
 
 <script>
$(document).ready(function(){
 
  $("#like").click(function(){
	 $("#thumb").show();
	 $("#heart").hide();
	 $('#exampleModal').modal('show');
	 	
  });
});
$(document).on('click','#sendGif',function(){
	$('#gifs').toggle();
});
</script>

<script>
$(document).ready(function(){
 
  $("#love").click(function(){
	  $("#heart").show();
	 $("#thumb").hide();
	 $('#exampleModal').modal('show');
  });
});
</script>

 <script>
	function openCity(evt, cityName) {
	  var i, tabcontent, tablinks;
	  tabcontent = document.getElementsByClassName("tabcontent");
	            
	  for (i = 0; i < tabcontent.length; i++) {
		tabcontent[i].style.display = "none";
	  }
	  tablinks = document.getElementsByClassName("tablinks");
	  for (i = 0; i < tablinks.length; i++) {
		tablinks[i].className = tablinks[i].className.replace(" active", "");
	  }
	  document.getElementById(cityName).style.display = "block";
	  evt.currentTarget.className += " active";
	}
 </script>


 
 
</body>
</html>
