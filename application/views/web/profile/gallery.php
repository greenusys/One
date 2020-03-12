
<!-- for lightbox -->
<style>
/* Create four equal columns that floats next to eachother */
.column2 {
  float: left;
  width: 25%;
}

/* The Modal (background) */
.modal2 {
  display: none;
  position: fixed;
  z-index: 1;
  padding-top: 40px;
  left: 0;
  top: 50px;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: black;
}

/* Modal Content */
.modal-content2 {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  width: 90%;
  max-width: 1200px;
}

/* The Close Button */
.close2 {
  color: white;
  position: absolute;
  top: 10px;
  right: 25px;
  font-size: 35px;
  font-weight: bold;
}

.close2:hover,
.close2:focus {
  color: #999;
  text-decoration: none;
  cursor: pointer;
}

/* Hide the slides by default */
.mySlides {
  display: none;
}

/* Next & previous buttons */
.prev2,
.next2 {
    background:#b7b7b7;
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: white;
  font-weight: bold;
  font-size: 20px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
}

/* Position the "next button" to the right */
.next2 {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev2:hover,
.next2:hover {
  background-color: rgba(0, 0, 0, 0.8);
} 

/* Number text (1/3 etc) */
.numbertext2 {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* Caption text */
.caption-container2 {
  text-align: center;
  background-color: black;
  padding: 2px 16px;
  color: white;
}

img.demo2 {
    width:200px;
  opacity: 0.6;
}

.active,
.demo2:hover {
  opacity: 1;
}

img.hover-shadow {
  transition: 0.3s;
}

.hover-shadow:hover {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

.gallery-title
{
    font-size: 36px;
    color: #42B32F;
    text-align: center;
    font-weight: 500;
    margin-bottom: 70px;
}
.gallery-title:after {
    content: "";
    position: absolute;
    width: 7.5%;
    left: 46.5%;
    height: 45px;
    border-bottom: 1px solid #5e5e5e;
}
.filter-button
{

  font-weight: 600;
  box-shadow: none;
  border-radius: 5px;
  text-align: center;
 

}
.filter-button:hover
{
 
  outline: none;
  font-weight: 600;
  color: #ff441a;

}
.btn-default:active .filter-button:active
{
   color: #ff441a;
}

.port-image
{
    width: 100%;
}

.gallery_product
{
    margin-bottom: 30px;
}
.gallery_product img
{
    width: 100%;
}
 .btn:focus {
    outline: 0;
     box-shadow: none !important;
}
.col_orng{
  color: #ff441a;
}
</style>
<script type="text/javascript">
  $(document).ready(function(){
    $(".m_photos").addClass("active");
  })
</script>



 <!-- center panel -->
    <div class="col-md-9">
                 <div class=" mt-4 ">
          <div class="w-100">
            <!-- <button class="btn btn-default filter-button" data-filter="all">All</button> -->
            <div class="row px-3 py-2 m-0 bg-white">
                <div class="col-md-8 p-2">
                    <h5 class="m-0 font-weight-bold"> Gallery </h5>
                </div>
                 
           <!--      <div class="col-md-4">
                  <div class="mt-1">
                    <form class="form-inline "> 
                        <input type="search" placeholder="Search" name="" id="search-frnd">
                    </form>
                  </div>
                </div> -->

                <div class="col-md-4 d-flex">

                  <button class="btn btn-default col_orng filter-button" data-filter="photos">Photos</button>
                  <button class="ml-2 btn btn-default filter-button" data-filter="albums">Albums</button>
                  <button class="ml-2 btn btn-default filter-button" data-filter="videos">Videos</button>
                </div>
            </div>
           
         <!--    <button class="btn btn-default filter-button" data-filter="spray">Spray Nozzle</button>
            <button class="btn btn-default filter-button" data-filter="irrigation">Irrigation Pipes</button> -->
        </div>
        <br/>


          <div class="card p-3">
           <div class="row filter photos m-0">
            <div class="col-md-3 mt-2">
                <!-- <form method="post" action="#" id="drg">
                   <div class=" files">
                      <label class="" for="drag_imgs" ></label>
                      <input type="file" id="drag_imgs" class="form-control d-none" multiple="">
                      </div>
                </form> -->

                <!-- <form method="post" action="#" id="drg"> -->
                  <?php
                    if($myId==1){
                      ?>
                        <div class=" files">
                          <label class="uplPhoto" for="drag_imgs" ></label>
                          <input type="submit" id="drag_imgs" class="form-control d-none" >
                        </div>
                      <?php
                    }
                  ?>
                   
                <!-- </form> -->
              </div>


           <?php
                foreach ($AllPosts as $post) {
             //print_r($post);
                  if($post['post_type'] ==1){
                    $gallary=$post['post_files'];
                    $gallaryimg=explode(',',$gallary);
                    ?>
                      <div class="col-md-3 mt-2 p-1">
                        <div class="content">
                          <a href="<?=base_url('Post/viewPost/').$post['post_id']?>" target="_blank">
                            <div class="content-overlay"></div>
                            <img class="content-image" src="<?=base_url('assets/uploads/images/').$gallaryimg[0]?>">
                            <div class="content-details fadeIn-bottom fadeIn-right">
                              <div class="">

                                <div class="float-left"><p><span><?=count($post['likes_data'])?></span>  <i class="fa fa-heart " aria-hidden="true"></i></p></div>
                               

                                
                                <div class="float-right"><p><span><?=count($post['total_comments'])?></span> <i class="fa fa-comment-o" aria-hidden="true"></i></p></div>

                              </div>
                            
                            </div>
                          </a>
                        </div>
                    </div>
                    <?php
                  }
                }
              ?>

            </div>
             <div class="row filter albums m-0" style="display: none">
                <?php
                    if($myId==1){
                      ?>
                        <div class="mt-2 col-md-4 d-table ">
                            <div class="card card-block d-table-cell align-middle text-center border upload_block" data-toggle="modal" data-target="#myModal">
                              <div class="card-body">
                                <h2><i class="fa fa-plus-circle" aria-hidden="true"></i></h2>
                                <h4>Create an Album</h4>
                                <p>It only takes a few minutes!</p>
                            </div>
                            </div>
                        </div>
                      <?php
                    }
                  ?>

                  <?php if($ProfileImgs){ ?>
                    <div class="card mt-2 col-md-4 albums p-2">
                    <!-- <a href="javascript:void(0)"> -->
                 <!--      <div class="card-header d-flex mt-1 justify-content-center">
                         onclick="openModal(<?=$album->album_id?>);currentSlide(<?=$i?>)"
                      </div> -->
                      <div class="card-body p-0">
                        <a href="<?=base_url('Gallery/ProfileAlbum/profile/').$user_id?>">
                          <img src="<?=base_url().'assets/uploads/images/'.$ProfileImgs[0]->profile_path?>" class="h_220 img-fluid w-100">
                        </a>
                      </div>
                      <div class="card-footer p-2 deletealbum ">
                        <a href="<?=base_url('Gallery/ProfileAlbum/profile/').$user_id?>">
                          <h5 class="m-0 p-1 text-capitalize author float-left">Profile Pictures</h5>
                        </a>
                        <!-- <span val="" class=" float-right delt_img text-danger"><i class="fas fa-trash-alt"></i></span> -->
                      </div>
                    
                    <!-- </a> -->
                    </div>
                  <?php } ?>
                   <?php if($CoverImgs){ ?>
                     <div class="card mt-2 col-md-4 albums p-2">
                    <!-- <a href="javascript:void(0)"> -->
                 <!--      <div class="card-header d-flex mt-1 justify-content-center">
                         onclick="openModal(<?=$album->album_id?>);currentSlide(<?=$i?>)"
                      </div> -->
                      <div class="card-body p-0">
                        <a href="<?=base_url('Gallery/ProfileAlbum/cover/').$user_id?>">
                          <img src="<?=base_url().'assets/uploads/images/'.$CoverImgs[0]->cover_path?>" class="h_220 img-fluid w-100">
                        </a>
                      </div>
                      <div class="card-footer p-2 deletealbum ">
                        <a href="<?=base_url('Gallery/ProfileAlbum/cover/').$user_id?>">
                          <h5 class="m-0 p-1 text-capitalize author float-left">Cover Pictures</h5>
                        </a>
                        <!-- <span val="" class=" float-right delt_img text-danger"><i class="fas fa-trash-alt"></i></span> -->
                      </div>
                    
                    <!-- </a> -->
                    </div>
                  <?php } ?>
                   <?php
                $i=1;
                  foreach ($MyAlbum as $album) {
                    $album_id=$album->album_id;
                    $imgArr=explode(',',$album->images_path);
                    # code...?>
                    <div class="card mt-2 col-md-4 albums p-2">
                    <!-- <a href="javascript:void(0)"> -->
                 <!--      <div class="card-header d-flex mt-1 justify-content-center">
                         onclick="openModal(<?=$album->album_id?>);currentSlide(<?=$i?>)"
                      </div> -->
                      <div class="card-body p-0">
                        <a href="<?=base_url('Gallery/fetchAlbum/').$album_id?>">
                          <img src="<?=base_url().$imgArr[0]?>" class="h_220 img-fluid w-100">
                        </a>
                      </div>
                      <div class="card-footer p-2 deletealbum ">
                        <a href="<?=base_url('Gallery/fetchAlbum/').$album_id?>">
                          <h5 class="m-0 p-1 text-capitalize author float-left"><?=$album->album_title?></h5>
                        </a>
                        <span val="<?=$album_id?>" class=" float-right delt_img text-danger"><i class="fas fa-trash-alt"></i></span>
                      </div>
                    
                    <!-- </a> -->
                    </div>
                    <?php
                    $i++;
                  }
                ?>
            </div>
            <div class="row filter videos m-0" style="display: none">
               <?php
                    if($myId==1){
                      ?>
                        <div class="col-md-4 mt-2">
                          <form method="post" action="#" id="videos">
                              <div class=" files">
                                <label class="" for="drag_img"></label>
                                <input type="file" name="videos_name" id="drag_img" class="form-control d-none">
                              </div>
                              <button class="btn btn-success p-0 px-2" id="sub_btn" style="display: none;" type="submit">Submit</button><span class="slct_file"></span>
                          </form>
                        </div>
                      <?php
                    }
                  ?>
                
                <?php
                foreach ($MyPosts as $post) {
                  if($post->post_type==2){
                    ?>
                      <div class="mt-2 col-md-4">
                        <video width="100%"  controls>
                          <source src="<?=base_url('assets/uploads/videos/').$post->post_files?>" type="video/mp4">
                          <source src="<?=base_url('assets/uploads/videos/').$post->post_files?>" type="video/ogg">
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
<script type="text/javascript">
    $(document).on("change","#drag_img",function(){
      $("#sub_btn").show();
      var ct  = $(this)[0].files.length;
      $(".slct_file").html('  '+ct+' File Selected');
    })


  $(document).ready(function(){

    $(".filter-button").click(function(){
      $(".filter-button").removeClass("col_orng");
        $(this).addClass("col_orng");
        var value = $(this).attr('data-filter');
        
        if(value == "all")
        {
            //$('.filter').removeClass('hidden');
            $('.filter').show('1000');
        }
        else
        {
//            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
//            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
            $(".filter").not('.'+value).hide('3000');
            $('.filter').filter('.'+value).show('3000');
            
        }
    });
    
    if ($(".filter-button").removeClass("active")) {
$(this).removeClass("active");
}
$(this).addClass("active");

});
</script>

    </div>
    <!-- end center panel -->
</div>
</section>

<!-- Photos Modal -->
<div id="addPhotos" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title">Upload Photo</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      
      </div>
      <div class="modal-body">
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

          
          </div>
          <hr>
          <div class="row mx-0 my-2 fy">
           
            <div class="col-md-4 posttab">
               <input type="file" id="img_video" class="d-none" name="files[]" multiple="">
               <label for="img_video"><i class="fa fa-picture-o" aria-hidden="true"></i> Add photo/videos</label>
            </div> 
      <!--       <div class="col-md-3 posttab">
              <img class="img-fluid" src="<?=base_url('assets/webimg/emoji.png')?>"> Feelings
            </div>   -->
            <!-- <div class="col-md-2 text-center">
              <img class="img-fluid" src="<?=base_url('assets/webimg/dots.png')?>">
            </div>       -->
          </div>
          <!-- <div class="form-check pl-5 py-2">
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
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>



   <!-- Album Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title">Create an Album</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      
      </div>
      <div class="modal-body">
        <form method="POST" id="album">
          <div class="form-group">
          <!--   <label><strong>Album Title :</strong></label>
            -->
            <label for="title" class="inp">
              <input type="text" name="alb_title" id="alb_title"  class="">
              <span class="label">Album Title :</span>
              <span class="border"></span>
            </label>
        
          </div>
          <div class="form-group">
            <label for="description" class="inp">
              <textarea name="alb_desc"  id="alb_desc" placeholder="&nbsp;" class="" rows="2"> </textarea> 
              <span class="label">Album Description</span>
            
            </label>

          </div>
          <div class="form-group">
            <label for="ad_img" class="inp">
              <input type="file" id="ad_img" name="files[]"  class="mt-2" multiple="">
              <span class="label">Add Image</span>
            
            </label>
          </div>
          <div class="text-center"><button class="btn btn-success" type="submit">Add Album</button></div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<script type="text/javascript">
  $(document).on('click','.uplPhoto',function(){
  $('#addPhotos').modal('show');

  });
$("#album").submit(function(e){
      e.preventDefault();
      var formData= new FormData($(this)[0]);
      $.ajax({
          url:"<?=base_url()?>APIController/createalbum",
           type:"post",
           data:formData,
           contentType:false,
           processData:false,
           cache:false,
          success:function(response)
          {
            var response=JSON.parse(response);
            if(response.status==1)
            {
              alert(response.msg);
              location.reload();
            }
            else
            {
              alert(response.msg)
            }
          }
      });
  });
$("#videos").submit(function(e){
        e.preventDefault();
        var formData= new FormData($(this)[0]);
        $.ajax({
            url:"<?=base_url()?>APIController/insertvideo",
             type:"post",
             data:formData,
             contentType:false,
             processData:false,
             cache:false,
            success:function(response)
            {
              var response=JSON.parse(response);
              if(response.status==1)
              {
                alert(response.msg);
                location.reload();
              }
              else
              {
                alert(response.msg)
              }
            }
        });
    });
</script>
<!-- <script type="text/javascript">
  $('.file-upload').file_upload();
</script> -->
<style>
.inp {
  position: relative;
  margin: auto;
  width: 100%;
 
}
.inp .label {
  position: absolute;
  top: 16px;
  left: 0;
  font-size: 16px;
  color: #9098a9;
  font-weight: 500;
  transform-origin: 0 0;
  transition: all 0.2s ease;
}
.inp .border {
  position: absolute;
  bottom: 0;
  left: 0;
  height: 2px;
  width: 100%;
  background: #07f;
  transform: scaleX(0);
  transform-origin: 0 0;
  transition: all 0.15s ease;
}
.inp input, textarea {
  -webkit-appearance: none;
  width: 100%;
  border: 0;
  font-family: inherit;
  
  height: 48px;
  font-size: 16px;
  font-weight: 500;
  border-bottom: 2px solid #c8ccd4;
  background: none;
  border-radius: 0;
  color: #223254;
  transition: all 0.15s ease;
}
.inp input:hover, .inp textarea:hover {
  background: rgba(34,50,84,0.03);
}
.inp input:not(:placeholder-shown) + span,
.inp textarea:not(:placeholder-shown) + span {
  color: #5a667f;
  transform: translateY(-26px) scale(0.75);
}
.inp input:focus,
.inp textarea:focus {
  background: none;
  outline: none;
}
.inp input:focus + span,
.inp textarea:focus + span  {
  color: #07f;
  transform: translateY(-26px) scale(0.75);
}
.inp input:focus + span + .border,
.inp textarea:focus + span + .border {
  transform: scaleX(1);
}
  /*----drag and drop-----*/
  .files label {
    outline: 2px dashed #92b0b3;
   /* outline-offset: -10px;*/
    -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
    transition: outline-offset .15s ease-in-out, background-color .15s linear;
 padding: 70px 0px 83px 8%;
    text-align: center !important;
    margin: 0;
    width: 100% !important;
}
.files input:focus{     outline: 2px dashed #92b0b3;  outline-offset: -10px;
    -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
    transition: outline-offset .15s ease-in-out, background-color .15s linear; border:1px solid #92b0b3;
 }
.files{ position:relative}
.files:after {  pointer-events: none;
    position: absolute;
    top: 42px;
    left: 0;
    width: 30px;
    right: 0;
    height: 56px;
    content: "";
    background-image: url(https://image.flaticon.com/icons/png/128/109/109612.png);
    display: block;
    margin: 0 auto;
    background-size: 100%;
    background-repeat: no-repeat;
}
.color input{ background-color:#f1f1f1;}
.files:before {
    position: absolute;
    bottom: 10px;
    left: 0;  pointer-events: none;
    width: 100%;
    right: 0;
    height: 57px;
    content: "Select or drag it here. ";
    display: block;
    margin: 0 auto;
    color: #2ea591;
    font-weight: 600;
    text-transform: capitalize;
    text-align: center;
} 
</style>  
<script>
  $(document).on('click','.tagfriend',function(){
   // $('.withs').css('display','flex');
   $('.withs').toggleClass ('expanded');
  });
</script>
<script>

  $(document).ready(function() {
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
  });
  $(document).on('change','#btn-Preview-Image',function()
  {
     var imgs=$(this).find('img').attr('src');
      console.log(imgs);
      // $('.emojionearea-editor').css('background','url('+imgs+')');
      // $('.emojionearea-editor').css("min-height","12em");
      // $('.emojionearea-editor').css("text-align","center");
      // $('.emojionearea-editor').css("font-size","28px");
      // $('.emojionearea-editor').css("background-size","cover");
      // $('.emojionearea-editor').css("color","black");
      // $('.emojionearea-editor').attr("id","screenshot");
  })
  


//   function readURL(input) {
//   if (input.files && input.files[0]) {
//     var reader = new FileReader();
    
//     reader.onload = function(e) {
//       $('#blah').attr('src', e.target.result);
//     }
    
//     reader.readAsDataURL(input.files[0]);
//   }
// }

// $("#imgInp").change(function() {
//   readURL(this);
// });
</script>
<div id="albumModal" class="modal2">
  <span class="close2 cursor" onclick="closeModal()">&times;</span>
  <div class="modal-content2" >
    <div id="sli_" align="center">

    </div>
  
    <!-- Next/previous controls -->
    <a class="prev2" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next2" onclick="plusSlides(1)">&#10095;</a>

    <!-- Caption text -->
    <div class="caption-container2">
      <p id="caption"></p>
    </div>

    <!-- Thumbnail image controls -->
    <div id="img__">
    </div>

  </div>
</div> 
<script>
// Open the Modal
function openModal(album_id) {
console.log("ALbum Id: "+album_id);
var imgArr=[];
$.ajax({
    url:'<?=base_url('Gallery/getAlbum')?>',
    type:"post",
    data:{album_id:album_id},
    success:function(response){
        console.log(response);
        response=JSON.parse(response);
        $('#sli_').empty();
        $('#img__').empty();
        for(let i=0; i<response.album.length; i++){
            var di='';

            di+='<div class="mySlides">';
            di+='    <div class="numbertext2">'+i+' / '+response.album.length+'</div>';
            di+='    <img src="<?=base_url()?>'+response.album[i]+'" style="width:680px">';
            di+='</div>';


            var di_='';
            di_+='<div class="column2">';
            di_+='<img class="demo2" src="<?=base_url()?>'+response.album[i]+'" onclick="currentSlide('+i+')" alt="Nature">';
            di_+='</div>';
            $('#sli_').append(di);
            $('#img__').append(di_);
            
            document.getElementById("albumModal").style.display = "block";
            // imgArr.push(response.album[i].images_path);
        }
       
        // console.log(imgArr);
    }
});
  
}

// Close the Modal
function closeModal() {
  document.getElementById("albumModal").style.display = "none";
}

var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>

<script>
$(document).on("click",".delt_img",function(){
    var ele =  $(this);
    var album_id = ele.attr("val");
    console.log(album_id);
    $.ajax(
    {
      type: "POST",
      url:"<?=base_url('APIController/deletealbum')?>",
      data:{ album_id:album_id },
        success:function(data) 
        {
          data = JSON.parse(data);
          alert(data.msg);
          location.reload();
        }       
    });
  })
</script>