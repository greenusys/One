
<!------------main _container------>
<style type="text/css">
  .activi{
    text-decoration: none !important;
  }
  .activi:hover{
    color: orange;
  }
 .z_leftba{
    z-index: -1;
 }

</style>
<section class="container">
  <div class="row">
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
     <!--right sidepanel -->
    <div class="col-md-3 p-0  mt-3">
     
            <div class="card p-2 font14" id="nav-home">    
                <div class="text-center border-bottom mar_t70">
                  <span class="text_ora"><i class="fa fa-comment-o" aria-hidden="true"></i></span>
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
                      <textarea name="bio_graphy" id="bio_graphy"  class="form-control bio_text" rows="3"><?=$bio?></textarea>
                      <div class="text-right"><label class="btn p-1 btn-primary bio_btn cncl_btn_ m-0 mr-2 ranUse">Cancel</label><button class="mr-2 btn btn-success p-1 bio_btn ranUse">Save</button></div>
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
                      <div class="col-md-1 ">
                        <span class="text_ora"><i class="fa fa-briefcase" aria-hidden="true"></i> </span>
                      </div>
                      <div class="col-md-10 pl-2">
                        
                        <?php
                          if(count($WorkDetails)>0){
                            echo ucwords($WorkDetails[0]->position);
                            echo '<a href="" class="text-capitalize"> '.$WorkDetails[0]->company_name.'</a>';
                          }else{
                            echo '<a href="">Unemployed</a>';
                          }
                        ?>
                      </div>
                    </li>
            <!--         <li class="row">
                      <div class="col-md-1 "><span><i class="fa fa-briefcase" aria-hidden="true"></i> </span></div>
                      <div class="col-md-10 pl-2">
                        Worked at 
                        <a href="">Student</a></div>
                    </li> -->
                    <li class="row">
                      <div class="col-md-1 "><span class="text_ora"><i class="fa fa-graduation-cap" aria-hidden="true"></i> </span></div>
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
                      <div class="col-md-1 ">
                        <span class="text_ora"><i class="fa fa-graduation-cap" aria-hidden="true"></i> </span>
                      </div>
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
                      <div class="col-md-1 ">
                        <span class="text_ora"><i class="fa fa-home" aria-hidden="true"></i> </span>
                      </div>
                      <div class="col-md-10 pl-2">
                        Lives in 
                        <a href="">Jaipur, India</a></div>
                    </li>
                  <!--   <li class="row">
                      <div class="col-md-1 "><span><i class="fa fa-map-marker" aria-hidden="true"></i> </span></div>
                      <div class="col-md-10 pl-2">
                        From 
                        <a href="">Jaipur</a></div>
                    </li> -->
                    <li class="row">
                      <div class="col-md-1 "><span class="text_ora"><i class="fa fa-heart" aria-hidden="true"></i> </span></div>
                      <div class="col-md-10 pl-2">Single </div>
                    </li>

                    
                  </ul>
                </div>
          </div>
    
        
       
              <div class="card mt-3">
          <div class="p-3">
            <h4 class="widget-title">Page Feed</h4>
          </div>
        <div class="card-body pt-0">
           <div class="row page_st m-0 p-2">
              <?php
               // print_r($AllPosts);
               // die;
              if(count($AllPosts)>0){
                foreach ($AllPosts as $post) {
                   $post_file=$post['post_files'];
                   $post_file=explode(',', $post_file);
                  # code...
               //    print_r($post);
               // die;
                  if($post['post_type']==1){
                    ?>
                     <div class="col-md-4 mt-2 px-1">
                        <a href="<?=base_url('Post/viewPost/').$post['post_id']?>" class="d-block">
                          <img src="<?=base_url()?>assets/uploads/images/<?=$post_file[0]?>" class="">
                        </a>
                     </div>
                    <?php
                  }else if($post['post_type']==2){

                    ?>
                    <a href="<?=base_url('Post/viewPost/').$post['post_id']?>">
                      <div class="col-md-4 mt-2 px-1">
                        <video  width="60" >
                          <source src="<?=base_url()?>assets/uploads/videos/<?=$post_file[0]?>" type="video/mp4">
                         
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
