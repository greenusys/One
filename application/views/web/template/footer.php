<?php 

  $session=$this->session->userdata('logged_in');
$profile_picture = $session[0]->profile_picture;
?>


<!--Comment Modal -->
<div class="modal fade" id="commntModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Comment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="pl-2 w-100 _input d-flex">
             <span> <img class="rounded-circle like_img" src="<?=base_url()?>assets/uploads/images/<?=$MyDetails[0]->profile_picture?>"></span>
            <p class="ml-1 lead w-100 emoji-picker-container">
              <textarea class="input-field cmnt_" id="comment_para" data-emojiable="true" type="text" name="comment"  placeholder="Add a Message">  </textarea>
                <!-- <input type="text" class="form-control" name="comment" data-emojiable="true"> -->
            </p> 

                  <input type="hidden" name="comnt_id" id="comment_id" value="">
          </div>
          <div class="float-right">
            <button class="btn btn-success p-1 fy update_comment">Update</button>
            <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-info ml-2 fy p-1">Cancel</button>
          </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="postTextEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="pl-2 w-100 _input d-flex">
               <span> <img class="rounded-circle like_img" src="<?=base_url()?>assets/uploads/images/<?=$MyDetails[0]->profile_picture?>"></span>
              <p class="ml-1 lead w-100 emoji-picker-container">
                <textarea class="input-field cmnt_" id="post_para" data-emojiable="true" type="text" name="comment"  placeholder="Add a Message">  </textarea>
                  <!-- <input type="text" class="form-control" name="comment" data-emojiable="true"> -->
              </p> 

                    <input type="hidden" name="comnt_id" id="poster_id" value="">
            </div>
            <div class="float-right">
              <button class="btn btn-success p-1 fy update_post_text">Update</button>
              <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-info ml-2 fy p-1">Cancel</button>
            </div>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).on('click','.update_comment',function(){
    var comment=$('#comment_para').parent().find(".emoji-wysiwyg-editor").html();
    var c_id=$('#comment_id').val();
    $.ajax({
      type:'POST',
      data:{
        comment:comment,
        c_id:c_id
      },
      url:'<?=base_url()?>APIController/editcomment',
      success:function(response){
        var response=JSON.parse(response);
        if(response.code==1){
          location.reload();
        }

      }
    })
  })

$(document).on('click','.edit_post',function(){
  var post_id=$(this).attr('p_d');
  $.ajax({
    type:'POST',
    data:{
      post_id:post_id
    },
    url:'<?=base_url()?>APIController/fetch_post_by_id',
    success:function(response){
      var html='';
      var response = JSON.parse(response);
      if (response.status==1) {
        if (response.data[0].post_type!=0) {
          var post_files = response.data[0].post_files;
          var arr = post_files.split(',');
          for(var i=0;i<arr.length;i++){
            var extension = arr[i].replace(/^.*\./, '');
            if (extension=="mp4") {
              html+='<div class="slideobject">'+
                    '<video controls="" class="w-100">'+
                       '<source src="<?=base_url()?>assets/uploads/videos/'+arr[i]+'" type="video/mp4">'+
                      'Your browser does not support the video tag.'+
                    '</video>'+
                    '</div>';
            }
            else{
              html+='<img src="<?=base_url()?>assets/uploads/images/'+arr[i]+'" class="slideobject"/>';
            }
          }
          $('#post_img_text').parent().find(".emoji-wysiwyg-editor").html(response.data[0].post);
          $('#post_img_id').val(response.data[0].post_id);
          $('#SlideShow').empty();
          $('#SlideShow').append(html); 
          $('#postEditModal').modal('show');
          $('#SlideShow').SlideShow({
                  slideDuration: 8000,
                  transSpeed: 300,
                  loop: false,
                  infobar: false
          });
        }
        else{
          $('#poster_id').val(response.data[0].post_id);
          $('#post_para').parent().find(".emoji-wysiwyg-editor").html(response.data[0].post);
          $('#postTextEditModal').modal('show');
        }
      }
    }
  })
})


$(document).on('click','.update_post_text',function(){
  var post=$('#post_para').val();
  var post_id=$('#poster_id').val();
  $.ajax({
    type:'POST',
    data:{
      post:post,
      post_id:post_id
    },
    url:'<?=base_url()?>APIController/update_post_text',
    success:function(response){
      var response = JSON.parse(response);
      if (response.status==1) {
        location.reload();
      }
    }
  })
})

$(document).on('click','.post_img_update',function(){
  var post = $('#post_img_text').val();
  var post_id = $('#post_img_id').val();
    $.ajax({
    type:'POST',
    data:{
      post:post,
      post_id:post_id
    },
    url:'<?=base_url()?>APIController/update_post_text',
    success:function(response){
      var response = JSON.parse(response);
      if (response.status==1) {
        location.reload();
      }
    }
  })
})
</script>


<!--Post Edit Modal -->
<div class="modal fade" id="postEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal_width" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-0">
          <div class="container-fluid">
            <div class="">
              <div class="card mt-4 p-2">
          <div class="card-header ">
            <div class="d-flex float-left">
             <div> 
              <a class="font-weight-bold" href="#">
                 <img class="rounded-circle mr-2" src="<?=base_url()?>assets/uploads/images/<?=$MyDetails[0]->profile_picture?>" width="40"  height="40">
               </a>
             </div>
            <div>
              <a class="font-weight-bold _use_n" href="#">  
               <?=$MyDetails[0]->full_name?>
              </a>
              <br>
            </div>
           
           </div>
              
                
          </div>
        <link href="<?=base_url()?>assets/dist/demo.css" type="text/css" rel="stylesheet" />
<!--         <script src="http://code.jquery.com/jquery-latest.js"></script> -->
        <link href="<?=base_url()?>assets/dist/jquery-slideshow.css" type="text/css" rel="stylesheet" />
        <script src="<?=base_url()?>assets/dist/jquery.slideshow.js" type="text/javascript"></script>          
          <div class="card-body row text-justify">
            <div class="col-md-12">
                      <div id="holder">
            <div id="SlideShow">

            </div>
        </div>
      </div>
<!--                <div id="carouselExampleIndicators_post" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators_post" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators_post" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators_post" data-slide-to="2"></li>
                  </ol>
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img class="d-block w-100 post_ht" src="<?=base_url()?>assets/uploads/images/profile1.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100 post_ht" src="<?=base_url()?>assets/uploads/images/profile3.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100 post_ht" src="<?=base_url()?>assets/uploads/images/profile2.jpg" alt="Third slide">
                    </div>
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleIndicators_post" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleIndicators_post" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
              </div> -->
            <div class="col-md-12">
              <p>
                <textarea name="" class="w-100" data-emojiable="true" id="post_img_text"></textarea>
                <input type="hidden" value="" id="post_img_id">
              </p> 
              <div class="float-right">
                <button class="btn btn-success p-1 fy post_img_update">Update</button>
                <button type="button" class="btn btn-info ml-2 fy p-1">Cancel</button>
              </div>
            </div>
      
          </div>
        </div>

            </div>
          </div> 
            
      </div>

    </div>
  </div>
</div>

<!-------footer ajax-------->
<script type="text/javascript">
    $(document).on("click",".favrt",function(){
      var el= $(this);
      var cls = el.attr("class");
      var post_id = el.attr('post_id');
      var fav_id = el.attr('fav_id');
     // alert(fav_id);
      var fvrt = 1;
      $.ajax({
        type:'POST',
        data:{
          post_id:post_id,fav_id:fav_id,
          fvrt:fvrt
        },
        url:'<?=base_url()?>Test/makefavrt',
        success:function(response){
          var response = JSON.parse(response);
          if(response.status==1){
            el.html('<i class="fas fa-star text-gold"></i>');
            el.addClass("star");
          }
          else if(response.status==2){
            el.html('<i class="far fa-star"></i>');
            el.removeClass("star");
          }
          else{
            alert('Something went wrong');
          }
        }
      })
      // if(cls=='favrt'){
      //   $(this).html('<i class="fas fa-star text-gold"></i>');
      //   $(this).addClass("star");
      // }else{
      //   $(this).html('<i class="far fa-star"></i>');
      //   $(this).removeClass("star");
      // }
    })
  </script>
<script type="text/javascript">
$(document).on('click','.edit_comment',function(){
  var el=$(this);
  var comment_id=el.attr('c_d');
  $('#comment_id').val(comment_id);
  var para = el.parent().parent().parent().parent().find("p").html();
  $('#comment_para').parent().find(".emoji-wysiwyg-editor").html(para);
  $('#commntModal').modal('show');
})

</script>
<style type="text/css">
  /** {
  box-sizing: border-box;
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
}*/
/*body {
  background-color: #f1f1f1;
  display: flex;
  font-family: 'Lato', sans-serif;
  font-size: 0.875rem;
  font-weight: 400;
  color: #2c3e50;
  height: 100vh;
  overflow-y: hidden;
}*/
/* CUSTOM SCROLLBAR FOR CHATBOX */
.senDMes{

    border: 1px solid #b1b1b1;
    background: border-box;

}
.mBar{

}
.chats{
  /*border: 1px solid red;*/
  /*background: cadetblue;*/
}
.newMs{
  border: 1px solid red;
}
.chats::-webkit-scrollbar { width: 0.125rem; }
.chats::-webkit-scrollbar-thumb { background: #CFD8DC; }
.chats::-webkit-scrollbar-thumb:hover { background: #B0BEC5; }
/* INPUT TEXT PLACEHOLDER CUSTOMIZE */
::-webkit-input-placeholder { color: #B0BEC5; }
::-moz-placeholder { color: #B0BEC5; }
:-ms-input-placeholder { color: #B0BEC5; }
:-moz-placeholder { color: #B0BEC5; }

#viewport { 
  position: fixed;
    display: flex;
    flex: 1;
    justify-content: center;
    align-items: center;
    bottom: 0px;
}
#viewport > .chatbox {
  position: relative;
  display: table;
  float: left;
  margin-left: 2px;
left: 80px;
  width: 20rem;
  height: 22rem;
  background-color: white;
  box-shadow: 0 0.25rem 2rem rgba(38,50,56, 0.1);
  overflow: hidden;
     -webkit-transition:height, 0.5s linear;
    -moz-transition: height, 0.5s linear;
    -ms-transition: height, 0.5s linear;
    -o-transition: height, 0.5s linear;
    transition: height, 0.5s linear;
}

.viewport_ht2{
  height: 2rem !important;
      margin-top: 49.5%;
    -webkit-transition:height, 0.5s linear;
    -moz-transition: height, 0.5s linear;
    -ms-transition: height, 0.5s linear;
    -o-transition: height, 0.5s linear;
    transition: height, 0.5s linear;
}
#viewport > .chatbox > .chats {
  position: absolute;
  top: 38px; left: 0; bottom: 0; right: 0;  
  display: table-cell;
  vertical-align: bottom;
  padding: 0.3rem;
  /*
  overflow: auto;*/
}

#viewport > .chatbox > .chats > .chat_ud{
  /*bottom: 83px; */
    overflow: auto;
    height: 16rem;
    /* margin-bottom: 22px; */
    position: absolute;
    width: 100%;
    display: table-cell;
    vertical-align: bottom;
}
ul { padding: 0; }
ul > li {
  position: relative;
  list-style: none;
  display: block;
  /*margin-top: 1.5rem;*/
  /*margin: 1rem 0;*/
  transition: 0.5s all;
}
ul > li:after {
  display: table;
  content: '';
  clear: both;
}
.msg {    
  max-width: 85%;
  display: inline-block;
  padding: 0.5rem 1rem;
  line-height: 1rem;
  min-height: 2rem;
  font-size: 0.875rem;
  border-radius: 1rem;
  margin-bottom: 0.9rem;
  word-break: break-all;
  text-transform: capitalize;
}
.msg.him {
  float: left;
  background-color: #E91E63;
  color: #fff;
  border-bottom-left-radius: 0.125rem;
}
.msg.you {
  float: right;
  background-color: #ECEFF1;
  color: #607D8B;
  border-bottom-right-radius: 0.125rem;
}
.msg.load { 
  background-color: #F8BBD0; 
  border-bottom-left-radius: 0.125rem;
}
.msg > span {
  font-weight: 500;
  position: absolute;
}
.msg > span.partner {
  color: #8c9ba2;
  font-size: 0.7rem !important;
  top: 0;
  font-size: 0.675rem;
  margin-top: -1rem;
}
.msg > span.time {
      color: #00b1ff;
    font-size: 0.6rem;
    bottom: -0.35rem;
    display: none;

}
.msg:hover span.time { display: block; }
.msg.him > span { left: 0;   }
.msg.you > span { right: 0; }
.sendBox {
  position: absolute;
    left: 0;
    width: 100%;
    background: white;
    bottom: 0px;
        box-shadow: -2px 0px 5px 1px #00000057;
}
.sendBox input {
  font-family: 'Lato', sans-serif;
  font-size: 0.875rem;
  display: block;
  width: 100%;
  border: none;
  padding: 0.75rem 0.75rem;
  line-height: 1.25rem;
  border-top: 0.125rem solid #ECEFF1;
  transition: 0.5s ease-in-out;
}
input:hover,
input:focus,
input:active { 
  outline: none!important; 
/*  border-top: 0.125rem solid #E91E63;*/
}

/*  LOADING MESSAGE CSS */
.load .dot {
  display: inline-block;
  width: 0.375rem;
  height: 0.375rem;
  border-radius: 0.25rem;
  margin-right: 0.125rem;
  background-color: rgba(255,255,255,0.75); 
}
.load .dot:nth-last-child(1) {animation: loadAnim 1s .2s linear infinite;}
.load .dot:nth-last-child(2) {animation: loadAnim 1s .4s linear infinite;}
.load .dot:nth-last-child(3) {animation: loadAnim 1s .6s linear infinite;}
@keyframes loadAnim {
    0 {transform: translate(0,0);}
    25% {transform: translate(0,-0.25rem);}
    50% {transform: translate(0,0);}
}



.emojionearea-standalone {
  float: right;
}
.emojionearea{
    width:100% !important;
}
 .divOutside {
            height: 20px;
            width: 20px;
            background-position: -1px -26px;
            background-repeat: no-repeat;
            background-image: url(data:image/png;base64,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);
}
.emojionearea-button
{
    opacity:0 !important;
}

/*.emojionearea .emojionearea-button.active + .emojionearea-picker-position-left, .emojionearea .emojionearea-button.active + .emojionearea-picker-position-right{
  margin-right: 0px !important;
  top: -280px !important;
}*/
.name__{
  padding: 7px;
    top: 0px;
    color: white;
    background: darkred;
    z-index: 704;
    position: absolute;
    width: 100%;
}
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.1/emojionearea.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.1/emojionearea.css">
<script type="text/javascript">
    
       
    $(document).on('click','.chatFriend',function(){
      var f_Name=$(this).attr('d-name');
      var f_Id=$(this).attr('d-fNd');
      getConversation(f_Id);

      var parentString = '<div class="chatbox " id="'+f_Id+'"><div class="name__"><span clas="f_Nm">'+f_Name+'</span><span class="menus_ float-right"> <a href="javascript:void(0)" class="text-white minimize"><i class="fa fa-window-minimize" aria-hidden="true"></i></a><span class="m-3 close_chat"><i class="fa fa-times" aria-hidden="true"></i></span></span></div>'+
         '<div class="chats"><div class="chat_ud">'+
         '<ul id="f'+f_Id+'"></ul>'+
         '</div>'+
         '<div class="sendBox">'+
         '<input type="text" placeholder="Type Your Message Here..." class="newMs" d-Fr="'+f_Id+'" ></div>';  
        $('#viewport').append(parentString);
        
        $("#emojionearea1").emojioneArea({
              
                  pickerPosition: "right",
                  tonesStyle: "bullet",
                  events: {
                      keyup: function (editor, event) {
                          // console.log(editor.html());
                          // console.log(this.getText());
                      }
                  }
              });
        var chatDiv=$("#f"+f_Id).parent();
        chatDiv.stop().animate({ scrollTop: chatDiv[0].scrollHeight}, 200);
                


    });
    $(document).on('click','#divOutside2',function () {
            $('.emojionearea-button').click()
        });  
    $(document).on('keypress','.newMs',function(e){
      var this_element=$(this);
      var message=this_element.val();
      if(e.which == 13) {
        var frd=this_element.attr('d-Fr');
        sendMess(message,frd,this_element);
        this_element.val("");
        var chatDiv=$("#f"+frd).parent();
        chatDiv.stop().animate({ scrollTop: chatDiv[0].scrollHeight}, 1000);
      }
    });
    
    $(document).on("click",".minimize",function(){
      var ele =$(this);
      ele.parent().parent().parent().toggleClass("viewport_ht2");

    })
    $(document).on("click",".close_chat",function(){
      var ele =$(this);
      ele.parent().parent().parent().remove();

    })
  // HELPER FUNCTION
  // function getDateTime (t) {
  //  var month   = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']; 
  //  var d     = new Date(t/1000),
  //     month  = (month[d.getMonth()]),
  //     day    = d.getDate().toString(),
  //     hour   = d.getHours().toString(),
  //     min    = d.getMinutes().toString();
  //  (day.length < 2) ? day = '0' + day : '';
  //  (hour.length < 2) ? hour = '0' + hour : '';
  //  (min.length < 2) ? min = '0' + min : '';    
  //  var res = ''+month+' '+day+' '+hour+ ':' + min;
  //  return res;
  // }
  function getConversation(friend_id){
              $.ajax({
                url:"<?=base_url('Message/getMyConversation')?>",
                type:"post",
                data:{friend:friend_id},
                success:function(response)
                        {
                            // console.log(response);
                            response=JSON.parse(response);
                            if(response.code==1){
                              $('#f'+friend_id).empty();
                              for(let i=0; i<response.msgs.length; i++){
                                
                                msg='';
                                if(response.msgs[i].sent_to!=<?=$_SESSION['logged_in'][0]->user_id?>){

                                  msg+='<li><div class="msg you">';
                                  msg+='<span class="partner">'+response.msgs[i].full_name+'</span>';
                                  msg+=response.msgs[i].message_;
                                  msg+='<span class="time">Jan 18 23:24</span></div></li>';
                                  
                                }else{
                                  msg+='<li><div class="msg him">';
                                  msg+='<span class="partner">'+response.msgs[i].full_name+'</span>';
                                  msg+=response.msgs[i].message_;
                                  msg+='<span class="time">Jan 18 23:24</span></div></li>';
                                }
                              $('#f'+friend_id).append(msg);
                              }
                            }
                        }
              });
            }
            function sendMess(message,myFd,this_element){
              $.ajax({
                url:'<?=base_url('Message/sendMyMessages')?>',
                type:"post",
                data:{ message:message,friend:myFd},
                success:function(response){
                        // console.log(response);
                        response=JSON.parse(response);
                        console.log("Response: "+response.code);
                        if(response.code==1){
                          $('#emojionearea1').val("");
                          $('.emojionearea-editor').html("");
                          getConversation(myFd);
                        }
                      }
              });
            }
    
</script>

<div id="statusModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <div id="progressTimer"></div>
        <a href="" id="redirecTo"><h4 class="modal-title" id="prod_By"></h4></a>
        <button type="button" class="close" data-dismiss="modal">&times;</button>        
      </div>
      <div class="modal-body" >
        <div style="display:flex;position: absolute;z-index: 12;width: 93%;" id="stry__e" >
      <div class="s3">
        <div class="loading1"></div>
      </div>
      <div class="s3">
        <div class="loading1"></div>
      </div>
      <div class="s3">
        <div class="loading1"></div>
      </div>
    </div>
    <div id="stry_shw_">
      <div class="pane_img" style="background-color:#F00;"></div>
      <div class="pane_img" style="background-color:#0F0;"></div>
      <div class="pane_img" style="background-color:#00F;"></div>
    </div>

    <div class="mt-3">
      <ul class="list-unstyled m-0 d-flex">
        <li class="ml-2"><a href="#" class="text-dark"><span><i class="fa fa-smile-o" aria-hidden="true"></i></span></a></li>
        <li class="ml-2"><a href="#" class="text-dark"><span><i class="fa fa-paper-plane-o" aria-hidden="true"></i></span></a></li>
      </ul>
    </div>
        <!-- <div id="stry__e">
          <div class="loading1"></div>
        </div> -->
<!-- <div class="" id="stry_shw_">
  <div class="pane_img" style="background-color:#F00;"></div>
  <div class="pane_img" style="background-color:#0F0;"></div>
  <div class="pane_img" style="background-color:#00F;"></div>
</div> -->
      <!--   <img src="" class="img-fluid" id="stImg"> -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<div id="postStatus" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4><?=$MyDetails[0]->full_name?></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>
      <div class="modal-body">
        <img src="" class="img-fluid" id="">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<div id="viewport"></div>


<script>



// var currentIndex = 0;

// function showpanel() {
//     $(".pane_img").hide();
//     $(".pane_img").eq(currentIndex).show();
//     $(".loading1").eq(currentIndex).css("width", "0%");
//  $(".loading1").eq(currentIndex).css("background-color", "green");
//     currentIndex++;
//     if (currentIndex > 2) {
//         currentIndex = 0;
//     }
// console.log(currentIndex);
//     $('.loading1').eq(currentIndex).animate({
//         width: '100%'
//     }, 6000, "linear", showpanel);
// }

// showpanel();


$(document).on('keyup','.searchFriend',function(){
  // console.log('key');
  var key=$(this).val();
  if(key!=""){
    $.ajax({
      url:"<?=base_url('Message/getMyFriendList')?>",
      type:"post",
      data:{key:key},
      success:function(res){
        console.log(res);
        $('#fLIs').empty();
        res=JSON.parse(res);
        if(res.code==1){
          for(let i=0; i<res.data.length; i++){
          
            var flist='';
            flist+='<a href="javascript:void(0)" class="My-Friend seFnd" d-Store="'+res.data[i].user_id+'" t-act="'+res.data[i].profile_picture+'" act="0" d-name="'+res.data[i].full_name+'">';
                      flist+='<li class="clearfix px-2">';
                      flist+='<img src="assets/uploads/images/'+res.data[i].profile_picture+'" width="50px" height="50px" alt="avatar" this.src="assets/uploads/images/default.png;" style="border-radius: 50%" >';
                      flist+='<div class="about">';
                      flist+='<div class="name">'+res.data[i].full_name+'</div>';
                      flist+='<div class="status">';
                      flist+='<i class="fa fa-circle online"></i>';
                      flist+='</div>';
                      flist+='</div>';
                      flist+='</li>';
                      flist+='</a>';
                      $('#fLIs').append(flist);
          }
        }
        

      }
    });
  }
  
  
  // console.log(key);
});
$(document).on('click','.seFnd',function(){
  var name=$(this).attr('d-name');
  var user_id=$(this).attr('d-Store');
  var profile=$(this).attr('t-act');
  $('#f_id').text(name);
  $('#t_ms').text('0');
   $('#f_im').attr('src','assets/uploads/images/'+profile);
    $('#aad').attr('d-stored',user_id);
});


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
</script>

<script type="text/javascript">
   $(document).ready(function () {

  $(document).on("keypress",'.cmnt_',function (e) {

var keyCode = e.keyCode || e.which;
    if (keyCode === 13) {
       e.preventDefault();
     
//alert($(this).html());
        var text = $(this).html();
        var el=$(this);
   // var text =  text1.slice(0, -15);
      var pic='<?=$_SESSION['logged_in'][0]->profile_picture?>';
      var name='<?=$_SESSION['logged_in'][0]->full_name?>';
//alert(text);

      // $(".ad_cmnt").submit(function (ev) {
      //     ev.preventDefault();
        var post_id=$(this).parent().parent().find('.poster_class').val();
           // alert(post_id);
          // console.log(form);
         // var formdata = new FormData($(this)[0]);
        // formdata.append("comment",text);
       // formData.append("post_id",post_id);
      // for (var value of formdata.values()) {
     //    console.log(value); 
    // }
  
      //    console.log("hello");
          // var comment =$(this).val();
          // var post_id_comnt =$(this).attr("p_d");

          // console.log(comment);
          //  console.log(post_id_comnt);
          // Get input field values
             // var formData= new FormData($(this)[0]);
             $.ajax({
                        url:"<?=base_url()?>APIController/addComment",
                         type:"post",
                         data:{
                          post_id:post_id,
                          comment:text
                         },
                        success:function(response)
                        {
                          //console.log(response);
                          response=JSON.parse(response);
                          if(response.code==1){
                            var html='';
                            html+='<div class="row mt-2 px-2">'+
                          '<div class="col-md-1">'+
                              '<span> <img class="rounded-circle like_img" src="<?=base_url()?>assets/uploads/images/'+pic+'"></span>'+  
                          '</div>'+ 
                          '<div class="col-md-10 comnt_text border-bottom">'+
                              '<h6 class="font-weight-bold m-0" >'+name+'<small class="ml-3"></small></h6>'+
                              '<p class="">'+text+'</p>'+
                          '</div>'+
                          '<div class="col-md-1">'+
                                  '<div class="dropdown">'+
                                    '<button class="dropbtn"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></button>'+
                                    '<div class="dropdown-content bg-white">'+
                                      '<a href="javascript:void(0)" class="edit_comment" c_d="'+response.id+'">Edit</a>'+
                                      '<a href="javascript:void(0)" class="dlt_comnt_" c_d="'+response.id+'">Delete</a>'+
                                    '</div>'+
                                  '</div>'+
                          '</div>'+
                      '</div>';
                      el.parent().parent().parent().parent().parent().parent().prepend(html);
                         //alert(response.msg);
                            // swal("Success", "Story Successfully", "success");
                           // $('.ad_cmnt').trigger("reset");
                        //  location.reload();
                        el.html('');
                            
                          }
                         
                        }
                  });  
         
 
    }
  });

  $(document).on("click",".dlt_post_",function(){
    var ele =$(this);
     var post_id =ele.attr("p_d");
     $.ajax({
            url:"<?=base_url()?>APIController/deletePost",
             type:"post",
             data:{post_id:post_id},
             cache:false,

            success:function(response)
            {
              console.log(response);
              response=JSON.parse(response);
              if(response.code==1){
                  ele.parent().parent().parent().parent().parent().remove();
              } 
            }
      });  
  })

 $(document).on("click",".dlt_comnt_",function(){
    var ele =$(this);
     var c_id =ele.attr("c_d");
     $.ajax({
            url:"<?=base_url()?>APIController/deleteComment",
             type:"post",
             data:{c_id:c_id},
             cache:false,

            success:function(response)
            {
              console.log(response);
              response=JSON.parse(response);
              if(response.code==1){
                  ele.parent().parent().parent().parent().remove();
              } 
            }
      });  
  })

});
</script>

<!-- Sidebar  -->
        <nav id="sidebar" class="active">
            <div class="sidebar-header">
                   <button type="button" id="sidebarCollapse" class="float-right btn togle_icon text-white">
                        <i class="fas fa-arrow-left"></i>
                        <span></span>
                    </button>
                <form class="form-inline my-2"> 
              <input class="form-control w-100 searchFriend" type="search" placeholder="Search" >
            </form>
            </div>

            <ul class="list-unstyled components">
                <?php foreach ($MyFriends as $frnd) {
                  # code...
                  ?>
                <li>
                    <a href="jaascript:void(0)" class="chatFriend" d-name="<?=$frnd->full_name?>" d-fNd="<?=$frnd->user_id?>">
                        <span><img class="img slid_img rounded-circle" src="<?=base_url('assets/uploads/images/').$frnd->profile_picture ?>" >
                            <?php
                              if($frnd->login_Status==1){
                                echo '<span class="online_icon"></span>';
                              }
                              // else
                              // {
                              //   echo '<span class="online_icon" style="font-size:10px; color:red">offline</span>';
                              // }
                          ?> 


                           </span>
                        <span class="ml-2 author onln_usname dis_name">   <?=$frnd->full_name?></span>
                    </a>
                </li>
            <?php } ?>
                <li>
                    <a href="#">
                        <span><img class="img slid_img rounded-circle" src="<?=base_url()?>assets/uploads/images/profile2.jpg?>" ><span class="online_icon"></span> </span>
                        <span class="ml-2 author onln_usname dis_name">Portfolio</span>
                    </a>
                </li>
        
            </ul>

      
        </nav>

        <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(".onln_usname").toggleClass('dis_name');
            });
        });
    </script>
    <style>
    .components li{
      padding: 5px 0px ; 
      text-align: left;
    }
    .togle_icon{
      position: absolute;
    right: -32px;
    background: #ff441a;
    border: none;
    outline: none;
    box-shadow: none !important;
    }

    .online_icon{
          background: green;
        width: 10px;
        height: 10px;
        position: absolute;
        border-radius: 50px;
           left: 35px;

    }
.dis_name{
  display: none;
}
    .slid_img{
      width: 28px;
      height: 28px;
    }
#sidebar {
    min-width: 225px;
    max-width: 225px;
    background: white;
    color: #fff;
    height: 100vh;
    transition: all 0.3s;
        position: fixed;
    top: 60px;
    box-shadow: 0px 1px 15px 0px rgba(51, 51, 51, 0.2);

}

#sidebar.active {
    min-width: 60px;
    max-width: 60px;
    text-align: center;
}

#sidebar.active .sidebar-header h3,
#sidebar.active .CTAs {
    display: none;
}

#sidebar.active .sidebar-header strong {
    display: block;
}

#sidebar ul li a {
    text-align: left;
}

#sidebar.active ul li a {
      padding: 5px 10px;
    /*text-align: center;*/
    font-size: 0.85em;
}

#sidebar.active ul li a i {
    margin-right: 0;
    display: block;
    font-size: 1.8em;
    margin-bottom: 5px;
}

#sidebar.active ul ul a {
    padding: 5px 10px !important;
}

#sidebar.active .dropdown-toggle::after {
    top: auto;
    bottom: 10px;
    right: 50%;
    -webkit-transform: translateX(50%);
    -ms-transform: translateX(50%);
    transform: translateX(50%);
}

#sidebar .sidebar-header {
    padding: 8px;
    background: #ff441a;
}

#sidebar .sidebar-header strong {
    display: none;
    font-size: 1.8em;
}

#sidebar ul.components {
    padding: 10px 0;
    border-bottom: 1px solid #47748b;
}

#sidebar ul li a {
    padding: 5px 10px;
    font-size: 1.1em;
    /*display: block;*/
}

#sidebar ul li a:hover {
    color: #7386D5;
    background: #fff;
}

#sidebar ul li a i {
    margin-right: 10px;
}

/*#sidebar ul li.active>a,
a[aria-expanded="true"] {
    color: #fff;
    background: #6d7fcc;
}*/

a[data-toggle="collapse"] {
    position: relative;
}

.dropdown-toggle::after {
    display: block;
    position: absolute;
    top: 50%;
    right: 20px;
    transform: translateY(-50%);
}
/*
ul ul a {
    font-size: 0.9em !important;
    padding-left: 30px !important;
    background: #6d7fcc;
}

ul.CTAs {
    padding: 20px;
}

ul.CTAs a {
    text-align: center;
    font-size: 0.9em !important;
    display: block;
    border-radius: 5px;
    margin-bottom: 5px;
}

a.download {
    background: #fff;
    color: #7386D5;
}

a.article,
a.article:hover {
    background: #6d7fcc !important;
    color: #fff !important;
}
*/
/* ---------------------------------------------------
    CONTENT STYLE
----------------------------------------------------- */

#content {
    width: 100%;
    padding: 20px;
    min-height: 100vh;
    transition: all 0.3s;
}

/* ---------------------------------------------------
    MEDIAQUERIES
----------------------------------------------------- */

@media (max-width: 768px) {
    #sidebar {
        min-width: 80px;
        max-width: 80px;
        text-align: center;
        margin-left: -80px !important;
    }
    .dropdown-toggle::after {
        top: auto;
        bottom: 10px;
        right: 50%;
        -webkit-transform: translateX(50%);
        -ms-transform: translateX(50%);
        transform: translateX(50%);
    }
    #sidebar.active {
        margin-left: 0 !important;
    }
    #sidebar .sidebar-header h3,
    #sidebar .CTAs {
        display: none;
    }
    #sidebar .sidebar-header strong {
        display: block;
    }
    #sidebar ul li a {
        padding: 20px 10px;
    }
    #sidebar ul li a span {
        font-size: 0.85em;
    }
    #sidebar ul li a i {
        margin-right: 0;
        display: block;
    }
    #sidebar ul ul a {
        padding: 10px !important;
    }
    #sidebar ul li a i {
        font-size: 1.3em;
    }
    #sidebar {
        margin-left: 0;
    }
    #sidebarCollapse span {
        display: none;
    }
}
</style>



  <script type="text/javascript">
    $(document).ready(function(){
      if ("geolocation" in navigator){ //check geolocation available 
  //try to get user current location using getCurrentPosition() method
  navigator.geolocation.getCurrentPosition(function(position){ 
      console.log("Found your location \nLat : "+position.coords.latitude+" \nLang :"+ position.coords.longitude);
   var lat = position.coords.latitude;
   var long = position.coords.longitude;
   $.ajax({
        url: 'https://weather.cit.api.here.com/weather/1.0/report.json',
        type: 'GET',
        dataType: 'jsonp',
        jsonp: 'jsonpcallback',
        data: {
          product: 'forecast_7days_simple',
          // name: 'Dehradun',
          latitude:lat,
          longitude:long,
          app_id: '2VjNgfEaoOiJn6uaUBfW',
          app_code: '56TgYuCSqZewXbfLEYf6yQ'
        },
        success: function (data) {
          // alert(JSON.stringify(data));
        //  console.log(data);
          $(".city_name").html(data.dailyForecasts.forecastLocation.city+', '+data.dailyForecasts.forecastLocation.state);

           for(var i=1;i<=6;i++)
              {
                var hightemp = data.dailyForecasts.forecastLocation.forecast[i].highTemperature;
                hightemp=parseInt(hightemp);
                var lowtemp = data.dailyForecasts.forecastLocation.forecast[i].lowTemperature;
                var iconLink = data.dailyForecasts.forecastLocation.forecast[i].iconLink;
                var skyDescription = data.dailyForecasts.forecastLocation.forecast[i].skyDescription;
                var description = data.dailyForecasts.forecastLocation.forecast[i].description;
                var day = data.dailyForecasts.forecastLocation.forecast[i].weekday;
                var utctime = data.dailyForecasts.forecastLocation.forecast[i].utcTime;
                var windSpeed = data.dailyForecasts.forecastLocation.forecast[i].windSpeed;
                var windDesc = data.dailyForecasts.forecastLocation.forecast[i].windDesc;
                var city = data.dailyForecasts.forecastLocation.city;
              //  var state = data.dailyForecasts.forecastLocation.state;
            
            var html = '   <li>'+
                            '<div class="text-uppercase">'+day.slice(0, 3)+'</div>'+
                             '<div><span><img class="newimg" src='+iconLink+' alt="" width="20"></span></div>'+
                            '<span>'+parseInt(hightemp)+'<sup>o</sup> H</span><br>'+
                            '<span>'+parseInt(lowtemp)+'<sup>o</sup> L</span>'+
                          '</li>';

                $('.forecast-container').append(html);

              }
        }
      });
  $.ajax({
        url: 'https://weather.cit.api.here.com/weather/1.0/report.json',
        type: 'GET',
        dataType: 'jsonp',
        jsonp: 'jsonpcallback',
        data: {
          product: 'observation',
          // name: 'Dehradun',
          latitude:lat,
          longitude:long,
          app_id: '2VjNgfEaoOiJn6uaUBfW',
          app_code: '56TgYuCSqZewXbfLEYf6yQ'
        },
        success: function (data) {
          //console.log(data);
          var high  =data.observations.location[0].observation[0].highTemperature;
          var low  =data.observations.location[0].observation[0].lowTemperature;
          var current  =data.observations.location[0].observation[0].temperature;
          var rain  =data.observations.location[0].observation[0].precipitation3H;
          var humadity  =data.observations.location[0].observation[0].humidity;
          var icon  =data.observations.location[0].observation[0].iconLink;
          var desc  =data.observations.location[0].observation[0].skyDescription;
          //alert(high);
          if(rain=='*'){
            rain = 0;
          }
          $(".current_temp").html(parseInt(current));
          $(".high_temp").html(parseInt(high));    
          $(".low_temp").html(parseInt(low));
          $(".temp_icon").attr("src",icon);
          $(".temp_desc").html(desc);
          $(".humadity").html(humadity);
          $(".rain_chance").html(rain);
          
        }
      });


     
    });
}else{
  console.log("Browser doesn't support geolocation!");
}
    })

// $(document).ready(function(){
//   $(".like_cont").hover(function(){
//      $(this).parent().parent().parent().parent().find(".like_lst_").show();
//     }, function(){
//     $(this).parent().parent().parent().parent().find(".like_lst_").hide();
//   });
//   $(".like_lst_").hover(function(){
//      $(this).show();
//     }, function(){
//     $(this).hide();
//   });
// });
  </script>
</body>
</html>