<script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
<script src="https://files.codepedia.info/files/uploads/iScripts/html2canvas.js"></script>


  <style>
  .carousel-control-next, .carousel-control-prev{
    height: 40px;
    top: 50% !important;
    width: 40px !important;
    background: black;
    border-radius: 50%;
  }
  .carousel-control-prev {
    left: 6px;
}
.carousel-control-next {
    right: 6px;
}
  .user_prof{
  	    height: 50px !important;
    width: 50px !important;
  }
  .midl_img{
  	    top: 7%;
    bottom: 7%;
  }
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
	.Pst_vw_{
		max-height: 500px;
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
	.emoji-menu{
		top: -230px;
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
			//echo $Detail[0]['post_files'];
				if($Detail[0]['post_type']){
					$imgArry=explode(',',$Detail[0]['post_files']);
					?>
						<div id="carouselExampleControls" class="carousel slide midl_img" data-ride="carousel">
							<div class="carousel-inner">
								<?php
								$i=1;
								$active='';

									foreach($imgArry as $img){
										if($i==1){
											$active='active';
										}
										$ext = pathinfo($img, PATHINFO_EXTENSION);   
										if($ext!='mp4'){
										?>
											<div class="carousel-item <?=$active?>">
												<img src="<?=base_url('assets/uploads/images/').$img?>" class="d-block w-100 Pst_vw_" alt="...">
											</div>
										<?php
											}else{ ?>
												<div class="carousel-item  <?=$active?>">
													<video controls class="w-100">
													  <source src="<?=base_url('assets/uploads/videos/').$img?>" type="video/mp4">
													  <!-- <source src="movie.ogg" type="video/ogg"> -->
														Your browser does not support the video tag.
													</video>
												</div>
										<?php	}

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
					       <img src="<?=base_url('assets/uploads/images/').$Detail[0]['profile_pic']?>" class="m-3 rounded-circle img-fluid user_prof">
					    </div>
					    <div class="col-sm-8">
					      <h6 class="font-weight-bold mt-3"><?=$Detail[0]['posted_by']?></h6>
						  <small class="font-weight-normal"><?=$Detail[0]['posted_on']?> &nbsp; <i class='fas fa-user-friends'></i></small>
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
		                            
		                              <a href="javascript:void(0)" class="dlt_post_" p_d=<?=$Detail[0]['post_id']?> >Delete</a>
		                              
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
                      <span> <img class="rounded-circle like_img" src="<?=base_url()?>assets/uploads/images/<?=$Detail[0]['total_comments'][$i]->profile_picture?>"></span>  
                  </div> 
                  <div class="col-md-10 comnt_text border-bottom">
                      <h6 class="font-weight-bold m-0" > <?=$Detail[0]['total_comments'][$i]->full_name?><small class="ml-3">
                      	<time class="timeago" datetime="<?=$Detail[0]['total_comments'][$i]->commented_on?>"></time></small></h6>
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
                
          
					<div class="p-2 w-90 bottom-sectionshadow-sm">
                 <div class="d-flex m-0">
                    <span> <img class="rounded-circle like_img" src="<?=base_url()?>assets/uploads/images/<?=$Detail[0]['profile_pic']?>"></span>
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
