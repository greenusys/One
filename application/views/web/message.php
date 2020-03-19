<?php 
$session= $this->session->userdata('logged_in');
$user_id = $session[0]->user_id;
$profile_picture = $session[0]->profile_picture;
?>
<!-- <html>
    <head>
        <title></title>
        <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
       
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.1/emojionearea.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.1/emojionearea.css"> -->
        <style>
              @import url(https://fonts.googleapis.com/css?family=Lato:400,700);
*, *:before, *:after {
  box-sizing: border-box;
}

#sidebar{
  display: none
}

.name{
  color: #424242;
}
.name:hover{
  color: #dc4734;
}
body {
  background: #C5DDEB;
  font: 14px/20px "Lato", Arial, sans-serif;
  padding: 40px 0;
  color: #424242;
}
.emojionearea, .emojionearea.form-control{
  /*height: 35px !important;*/
   height: 80px !important;
    padding: 5px;
}
.emojionearea .emojionearea-editor{
  /*height: 50px !important;*/
  padding: 5px !important;
    height: 66px !important;
  min-height: unset !important;
  max-height: unset !important;
}
.list{
    list-style:none;
}
/* .container {
  margin: 0 auto;
  width: 100%;
  background: #444753;
  border-radius: 5px;
} 
.list{
    list-style:none;
}
.people-list {
  width: 100%;
  /* float: left; */

.people-list .search {
  padding: 5px;
}
.people-list input {
     border-radius: 3px;
    border: none;
    padding: 9px;
      color: #aaa;
    background: #e2e2e28a;
    width: 100%;
    font-size: 16px;
}
/*.people-list .fa-search {
  position: relative;
  left: -31px;
  top: 17px;
}*/
.people-list ul {
  padding: 2px;
  height: 453px;
  overflow: auto;
}
.people-list ul li {
  padding-bottom: 20px;
}
.people-list img {
  float: left;
}
.people-list .about {
  float: left;
  /*margin-top: 8px;*/
}
.people-list .about {
  padding-left: 8px;
}
.people-list .status {
  color: #92959E;
}

.chat {
  width: 100%;
  /* float: left; */
  background: #F2F5F8;
  border-top-right-radius: 5px;
  border-bottom-right-radius: 5px;
  color: #434651;
}
.chat .chat-header {
  padding: 20px;
  border-bottom: 2px solid white;
}
.chat .chat-header img {
  float: left;
}
.chat .chat-header .chat-about {
  float: left;
  padding-left: 10px;
  margin-top: 6px;
}
.chat .chat-header .chat-with {
  font-weight: bold;
  font-size: 16px;
}
.chat .chat-header .chat-num-messages {
  color: #92959E;
}
.chat .chat-header .fa-star {
  float: right;
  color: #D8DADF;
  font-size: 20px;
  margin-top: 12px;
}
.chat .chat-history {
  background: white;
  padding: 30px 30px 20px;
  border-bottom: 2px solid white;
  overflow-y: scroll;
  height: 450px;
}
.chat .chat-history .message-data {
  margin-bottom: 15px;
}
.chat .chat-history .message-data-time {
  color: #a8aab1;
  padding-left: 6px;
}
.chat .chat-history .message {
  color: white;
  padding: 18px 20px;
  line-height: 26px;
  font-size: 16px;
  border-radius: 7px;
/*  margin-bottom: 30px;*/
  width: 80%;
  position: relative;
}
.chat .chat-history .message:after {
     bottom: 100%;
    left: -1%;
    border: solid transparent;
    content: " ";
    height: 0;
    top: 1%;
    width: 0;
    position: absolute;
    pointer-events: none;
    border-bottom-color: #86BB71;
    border-width: 10px;
    margin-left: -11px;
    transform: rotate(-84deg);
}
.chat .chat-history li {
  list-style:none;
}
.chat .chat-history .my-message {
  background: #86BB71;
}
.chat .chat-history .other-message {
  background: #94C2ED;
}
.chat .chat-history .other-message:after {
   border-bottom-color: #94C2ED;
       left: 102%;
    transform: rotate(93deg) !important;
    margin-left: -17px !important;
    border-width: 13px !important;
}
.chat .chat-message {
  padding: 10px;
}
.chat .chat-message textarea {
  width: 100%;
  border: none;
  padding: 10px 20px;
  font: 14px/22px "Lato", Arial, sans-serif;
  margin-bottom: 10px;
  border-radius: 5px;
  resize: none;
}
.chat .chat-message .fa-file-o, .chat .chat-message .fa-file-image-o {
  font-size: 16px;
  color: gray;
  cursor: pointer;
}
.chat .chat-message button {
  float: right;
  color: white;
  font-size: 16px;
  text-transform: uppercase;
  border: none;
  cursor: pointer;
  font-weight: bold;
      background: #119026;
}
.chat .chat-message button:hover {
  color: #75b1e8;
}

.online, .offline, .me {
  margin-right: 3px;
  font-size: 10px;
}

.online {
  color: #86BB71;
}

.offline {
  color: #E38968;
}

.me {
  color: #94C2ED;
}

.align-left {
  text-align: left;
}

.align-right {
  text-align: right;
}

.float-right {
  float: right;
}

.clearfix:after {
  visibility: hidden;
  display: block;
  font-size: 0;
  content: " ";
  clear: both;
  height: 0;
}
* {
  font-family: Arial, Helvetica, san-serif;
}
.row:after, .row:before {
  content: " ";
  display: table;
  clear: both;
}
.span6 {
  float: left;
  width: 48%;
  padding: 1%;
}

.emojionearea-standalone {
  float: right;
}
.emojionearea{
    width:100% !important;

    padding: 3px 43px 3px 7px;
}
 .search-btn {
    position: absolute;
    right: 13px;
    top: 72px;
    color: #aaa;
    border-radius: 3px;
    font-size: 16px;

  -webkit-transition: all 200ms ease-in-out;
  -moz-transition: all 200ms ease-in-out;
  transition: all 200ms ease-in-out;
}
  /*.search-btn:hover {
    color: #fff;
    background-color: #8FBE00;
  }*/
.dropdown-menu {
    position: absolute;
    top: 100%;
    right: 0px;
    left: unset;
    z-index: 1000;
    display: none;
    float: left;
    min-width: 10rem;
    padding: .5rem 0;
    margin: .125rem 0 0;
    font-size: 1rem;
    color: #212529;
    text-align: left;
    list-style: none;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid rgba(0,0,0,.15);
    border-radius: .25rem;
    
}

    .dropbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}
.dropbtn {
background:transparent;
  color: black;
  padding: 0px;
  font-size: 16px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
    min-width: 140px;
    z-index: 1;
    right: -4px;
    top: 15px;
}

.dropdown-content a {
    color: #797777;
    padding: 3px 11px;
    text-decoration: none;
  display: block;
  font-size: 12px;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: buttonface;}

  .pro_img{
      width: 43px;
    height: 43px;
  }

.head_msg{
      color: #aaa;
    padding: 5px 15px;

}
.emo_icons{
       position: absolute;
      top: 8px;
      font-size: 19px;
      right: 20px;
    }

 .divOutside {
            height: 20px;
            width: 20px;
            background-position: -1px -26px;
            background-repeat: no-repeat;
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABcAAABuCAYAAADMB4ipAAAHfElEQVRo3u1XS1NT2Rb+9uOcQF4YlAJzLymFUHaLrdxKULvEUNpdTnRqD532f+AHMLMc94gqR1Zbt8rBnUh3YXipPGKwRDoWgXvrYiFUlEdIkPPYZ/dAkwox5yQCVt/bzRrBPnt9e+211/etFeDQDu3ArL+/X37OeqmRWoH7+vpItfWawStF1tfXR+zW9xW5ne0p8loOcAKuCdwpRft60C8a+X5zTvebCqcAvmidf1GGHtqhHdpf1qqKzsrKipyensbi4iKWl5cBAMFgEG1tbYhGo2hpadlbmxseHpaDg4MAgI6ODng8HgBAPp/H/Pw8AODatWvo7e2tvUHrui7v3r2L+fl5XL58GVeuXIHH49m1N5/Py0ePHmF0dBQdHR24desWVFXdtYdXAn/48CHm5+dx8+ZNRKPRigEUDpuenpb3799H4YaOnWh5eVmOj48jFoshGo0STdPkwMCAXF5elqV7BgYGpKZpMhqNklgshrGxMbx580Y6gicSCTDGEIvFAADpdBqpVArJZLK4J5lMIpVKIZ1OAwBisRgYY0gkEs6Rp1IphMNh+Hw+AgCGYQAANE0r7in8Xfjm8/lIOBzGq1evnMHX19fR1NRU/D8UCoFzjnA4XFwLh8PgnCMUChXXmpqakM1mUfVBS62xsZHk83lZWi1nz579ZA0AhBDO4A0NDchkMsWSJIRAURRiVy26rktVVUkmk0EgEHAGP3XqFKamppDP56Vpmrhz5w5u374t/X4/OP+w3TRNZLNZ6LoO0zSRz+dlf38/Ll686Jzz8+fPQwiBeDwOt9tNrl+/jkwmU6yaQpVkMhncuHEDbrebxONxCCEQiUScIw8Gg+TBgwdyZGQEyWRSdnV1kVQqJYeGhrC6ugrGGEKhEHp7e3Hy5EmSTCblvXv30NPTg2AwSA6M/vF4HCMjI7b0/yzh8vv9AIBsNrt34aokuQsLC7skt729varkHtqftUFf++FHsrq0QN3eBvp68Tfvf9Mv12oFCYU7G//e9nVuO7dpNbe2W4M//yQr0p8yRvyBo1Zr++lwLcCt7afD/sBRizJGavrB1dDYYh47Htrq+Kb7jBNwxzfdZ44dD201NLaYVUkU7ozQpuAJBkARwnRZpunN5zaa5hJjiXLH05GeiMd7JEM5zzHGNQBGZvk/Iv0yYVWMvK0zKk1Dl6ahW5RQobjqdjy+wEZn9PKF0n2d0csXPL7AhuKq26GECtPQLdPQZVtn1LlB69p7yRVVSEiDEGJwRd12e4+8PR3piRQidnuPvOWKuk0IMSSkwRVV6Np7WVVbSqvGsgSnlKkAFNPQXdrOtuKqcxtcUTUAhmUJnVJmlleJo3CVHmAaOlPUOmYJkxFKibQsSRkXhr4juKIKO2BHVSwcoLrqCVdUYho6K3YYRRWmoUtdey/tgKtK7rUffiQAsLq08MnbNLe2WwBgB/zHzueFyD8nwlIfbvdx8eU0WV1aKD1cVAMs9+F2j9gUPEEKemEJIe3AnXy4XfkBoNKSZHNthWfX31EA69VKttyHVyIOY1wRwmS6tqNsrr31vXo5k/bUu4gT2cp9lhbm0rzCJpeUUrE0vS63+c7/6uXMbDUWl/ssLczNFrVFddUT09AZpUy1LKvO0DVfPrfR9HxqfNbuEe185l9MFX3o6tIC5YpKFLWOfdQQ93Zu49j0+FDCDtjOp1yaOQCYhs4Y40wI05XfWj8yPT40Ua2ey33mEmMTtp2IUEq0nW3FKeJPGPjRp1Iz2QUuLUu66txG9NLVSK3gBZ+C1lcE54oqKOOCK6rm8QU2unu+u1ANuNynvFsBAG1ubbdMQ5eGviMAFDuP0w3sfMpvQEtb24fOQncU1bXl8R7JnOu+ZNv97XxKJwY6+PNPsrm13drObVqUMlMIU5OWpVHOc96Go5lTnV2fzC/VfAozD7HTCa6olBBa1Imlhbmq2lLuQ5xaW6nCPfnln0Yt7bDUhzhps8cfKH5//uTXmvS81OeLdqI/ZoROzSZrHqG/OvOPzxuhK5VgJTvV2bW3EdqJRABwrvvS/kfoSkoZvXT1YEbociHr7vnuYEfogpBFL109HKH/h0fomnXg3Lff79r7/MmvVbWG7gX4QObzc99+Tz7mHKah05KcW6ahQ9feS6cbMCdgt7eBWJagjCuUAC5tZzuouuo0Spm0hElc9R4cbf4bVl8v1p6WUmCuqEwIs34ruxaeeTy4uJVd67As08UVlVmWoG5vA7FLG3WMmHEupVTyW+vh2cn4DADMTsaTuc21LiGEhzHOnQ6gNtMrJSBMCKHkNt999WLi0S7hejEZH81n174WpukiIMw0dKq66p3Bw50RwhUVXFGJKUy28Xal48VkfKrSlWenhsc23q2cEB9SR7iiItwZIbbgHn8AlDFCCMW7laXjqZnHjkNpaubJzNuVpWZCKChjxOMPVH/QlaW0f/G3ZLqWWl6ce/bvlddp7yFD/w8Z+njoX1+GoZMjgzMAMDkyeLAMnRh+uKveJ0YGD4ahEyODFRk6OfrL/hj67GnckaHPng7vjaGzyYmaGDr77KktQ38H8tqx8Wja+WIAAAAASUVORK5CYII=);
        }
        .emojionearea-button
        {
            opacity:0 !important;
        }
        
        .emojionearea .emojionearea-button.active + .emojionearea-picker-position-left, .emojionearea .emojionearea-button.active + .emojionearea-picker-position-right{
          margin-right: 0px !important;
          top: -280px !important;
        }
        </style>
        <script type="text/javascript" charset="utf-8">		
            var smiley_map = {};
            function insert_smiley(smiley, field_id) {
                var el = document.getElementById(field_id), newStart;

                if ( ! el && smiley_map[field_id]) {
                    el = document.getElementById(smiley_map[field_id]);

                    if ( ! el)
                        return false;
                }

                el.focus();
                
                smiley = " " + smiley;
                console.log(smiley);
                $.ajax({
                    url:'<?=base_url('Message/smilyImage')?>',
                    type:"post",
                    data:{smiley:smiley},
                    success:function(response){
                                console.log(response);
                                response=JSON.parse(response);
                                $('#message-to-send').append(response.img);
                                
                            }

                })
                if ('selectionStart' in el) {
                    newStart = el.selectionStart + smiley.length;

                    el.value = el.value.substr(0, el.selectionStart) +
                                    smiley +
                                    el.value.substr(el.selectionEnd, el.value.length);
                    el.setSelectionRange(newStart, newStart);
                }
                else if (document.selection) {
                    document.selection.createRange().text = smiley;
                }
            }
        </script> 
    </head>
    <body>
        <div class="container mt-5 clearfix">
        <div class="row">
            <div class="col-md-3 bg-white p-0" >
             
                <div class="people-list" id="people-list">
                   <div class="border-bottom head_msg"><h4>Messages</h4></div>
                    <div class="search my-3 px-3">
                        <input type="text" class="searchFriend" placeholder="search" />
                        <button class="search-btn btn"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </div>
                    <ul class="list" id="fLIs">
                      <?php
                        foreach ($MyMessages as $msg) {
                          # code...?>
                          <a href="javascript:void(0)" class="My-Friend" d-Store="<?=$msg->user_id?>" act="<?=$msg->msg_id?>">
                            <li class="clearfix px-2">
                              <img src="assets/img/Profile_Pic/<?=$msg->profile_picture?>" width="40px" height="40px" alt="avatar" this.src="'assets/img/Profile_Pic/default.png';" style="border-radius: 50%" >
                              <div class="about">
                                  <div class="name"><?=$msg->full_name?></div>
                                  <div class="status">
                                  <i class="fa fa-circle online"></i> <?=$msg->message_?>
                                  </div>
                              </div>
                            </li>
                          </a>
                          <?php
                        }
                      ?>
                       
                        
                    </ul>
                </div>
            </div>
            <style type="text/css">
              .orange{
                background: orange;
              }
              .padding_16{
                padding: 16px;
              }
              .rounded_{
                border-radius: 50px;
              }
              .sender{
                background: cornflowerblue;
                /*background:cadetblue;*/
              }
              .receiver{
                background: yellowgreen;

              }
              .t_right{
                text-align: right;
              }
            </style>
            <div class="col-md-9 bg-white p-0 border-left">
                <div class="chat" id="_chat" d-conversation="">
                    <div class="chat-header clearfix border-bottom">
                        <img src="" id="f_im" style="border-radius: 50%;" width="50px" height="50px" alt="avatar" />
                        
                        <div class="chat-about">
                        <div class="chat-with" >Chat with <span id="f_id"></span></div>
                        <div class="chat-num-messages">already <span id="t_ms"></span> messages</div>
                        </div>
                        <div class="float-right mt-2">
                          <div class="dropdown">
                            <button class="dropbtn"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></button>
                            <div class="dropdown-content bg-white">
                              <!-- <a href="#">Edit</a> -->
                              <a href="javascript:void(0)" class="dlt_post_" >Delete Conversation</a>
                              
                            </div>
                          </div>
                    </div> 
                    </div> <!-- end chat-header -->
                
                    <div class="chat-history">
                      <ul id="chPo" class="p-0">
                        <!-- <li style="width:80%" class="float-right my-1">
                          <div class="row text-white">
                            <div class="col-md-10  " >
                              <div class="row receiver p-1 rounded_">
                                <div class="col-md-2 padding_16" style=" font-size: 9px">
                                  1 Sec Ago
                                </div>
                                <div class="col-md-10 padding_16" style="text-align: right" >
                                  messa
                                </div>
                              </div>
                            </div>
                            <div class="col-md-1 px-3 py-1" ><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/chat_avatar_01_green.jpg"  width="30px" height="30px" alt="avatar" class="rounded-circle" /></div>
                          </div> 
                        </li>
                        <li style="width:80%" class="float-left my-1">
                          <div class="row text-white">
                            <div class="col-md-1 px-3 py-1" ><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/chat_avatar_01_green.jpg"  width="30px" height="30px" alt="avatar" class="rounded-circle" /></div>
                            <div class="col-md-10  " >
                              <div class="row sender p-1 rounded_">
                                <div class="col-md-10 padding_16 " >
                                  messa
                                </div>
                                 <div class="col-md-2 padding_16" style=" font-size: 9px">
                                  1 Sec Ago
                                </div>
                              </div>
                            </div>
                            
                          </div> 
                        </li> -->
                        <!-- <li style="width:80%" class="float-left my-1">
                          <div class="row text-white">
                            <div class="col-md-1 px-3 py-1" ><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/chat_avatar_01_green.jpg"  width="30px" height="30px" alt="avatar" class="rounded-circle" /></div>
                            <div class="col-md-9 padding_16 orange" >messa</div>
                            <div class="col-md-2 padding_16 orange" style=" font-size: 9px">1 Sec Ago</div>
                          </div> 
                        </li> -->
                      </ul>
                        
                    </div> <!-- end chat-history -->
                    
                    <div class="chat-message clearfix" >
                      <div class="row">
                        <div class="col-md-11">
                          <textarea id="emojionearea1"></textarea> 
                           <div class="d-flex emo_icons">
                            <label for="fileInput" class="mr-2">
                              <i class="fa fa-paperclip" aria-hidden="true"></i>
                            </label>
                            <input type="file" style="display: none"  id="fileInput" />
                             <div id="divOutside" class="divOutside">
                            </div>
                          </div> 
                        </div>
                        <div class="col-md-1">
                          <button id="aad" class="btn btn-success" d-stored=""  >Send</button> 
                         
                        </div>
                        <!-- <textarea name="message-to-send" id="message-to-send" placeholder ="Type your message" rows="3"></textarea> -->
                        
                          
                       <!--  <i class="fa fa-file-o"></i> &nbsp;&nbsp;&nbsp;
                        <i class="fa fa-file-image-o"></i> -->
                        
                        
                       
                    </div> <!-- end chat-message -->
                
                </div> <!-- end chat -->
                
            </div>
        </div>
     
            
          <script>
            var friend_id_for_rgl_fetch=0;
            // function getConversation(friend_id){
            //   console.log("Get Conversation Called");
            //   var profile_picture = '<?=$profile_picture?>';
            //   var user_id ='<?=$user_id?>';
            //   $.ajax({
            //     url:"<?=base_url('Message/getMyConversation')?>",
            //     type:"post",
            //     data:{friend:friend_id},
            //     success:function(response)
            //             {
            //                 console.log(response);
            //                 response=JSON.parse(response);
            //                 if(response.code==1){
            //                   $('#chPo').empty();
            //                   for(let i=0; i<response.msgs.length; i++){
            //                     console.log(response.msgs[i]);
            //                     console.log(response.msgs[i].message_type);
            //                     chatBox='';
            //                       if(response.msgs[i].sent_to!=user_id)
            //                       {
            //                         chatBox+='<li style="width:80%" class="float-right my-1">';
            //                         chatBox+='<div class="row text-white">';
            //                         chatBox+='<div class="col-md-10  " >';
            //                         chatBox+='<div class="row sender p-1 rounded_">';
            //                         chatBox+='<div class="col-md-2 padding_16" style=" font-size: 9px">'+response.msgs[i].sent_on+'</div>';
            //                         chatBox+='<div class="col-md-10 padding_16 t_right" >';
            //                         if(response.msgs[i].message_type==2){
            //                           chatBox+='<a href="'+response.msgs[i].message_+'" download>Download </a>';
            //                         }else if(response.msgs[i].message_type==1){
            //                           chatBox+='<img style="height:200px;width:100%" src="'+response.msgs[i].message_+'">';
            //                         }else{
            //                           chatBox+=response.msgs[i].message_;
            //                         }
            //                         chatBox+='</div>';
            //                         chatBox+='</div>';
            //                         chatBox+='</div>';
            //                         chatBox+='<div class="col-md-1 px-3 py-1" ><img src="assets/uploads/images/'+response.msgs[i].profile_picture+'"  width="40px" height="40px" alt="avatar" class="rounded-circle" /></div>';
            //                         chatBox+='</div>';
            //                         chatBox+='</li>';
            //                     }else{

            //                       chatBox+='<li style="width:80%" class="float-left my-1">';
            //                         chatBox+='<div class="row text-white">';
            //                         chatBox+='<div class="col-md-1 px-3 py-1" ><img src="assets/uploads/images/'+response.msgs[i].profile_picture+'"  width="40px" height="40px" alt="avatar" class="rounded-circle" /></div>';
            //                         chatBox+='<div class="col-md-10  " >';
            //                         chatBox+='<div class="row receiver p-1 rounded_">';
            //                         chatBox+='<div class="col-md-10 padding_16 " >';
            //                         if(response.msgs[i].message_type==2){
            //                           chatBox+='<a href="'+response.msgs[i].message_+'" download>Download </a>';
            //                         }else if(response.msgs[i].message_type==1){
            //                           chatBox+='<img style="height:200px;width:100%" src="'+response.msgs[i].message_+'">';
            //                         }else{
            //                           chatBox+=response.msgs[i].message_;
            //                         }
            //                         chatBox+='</div>';
            //                         chatBox+='<div class="col-md-2 padding_16" style=" font-size: 9px">1 Sec Ago  </div>';
            //                         chatBox+='</div>';
            //                         chatBox+='</div>';
            //                         chatBox+='</div>';
            //                         chatBox+='</li>';
            //                     }
            //                     var chatDiv=$('.chat-history');
            //                     chatDiv.stop().animate({ scrollTop: chatDiv[0].scrollHeight}, 200);
            //                     $('#chPo').append(chatBox);
            //                   }
            //                 }
            //             }
            //   });
            // }

          $("document").ready(function(){

              $("#fileInput").change(function() {
                  var formData = new FormData();
                  formData.append('image', $('input[type=file]')[0].files[0]); 
                  var myFd=$('#aad').attr('d-stored');
                  formData.append('friend_id',myFd);
                  $.ajax({
                  url:"<?=base_url()?>Message/sendFile",
                   type:"post",
                   data:formData,
                   contentType:false,
                   processData:false,
                   cache:false,
                  success:function(response)
                  {
                    var response = JSON.parse(response);
                    console.log(response);
                     if(response.code==1){
                       $("#fileInput").val(null);
                       getConversation(myFd);
                     }
                     else{
                       alert("File Is greater then described size");
                     }
                      //alert(response);
                      //$("#mydiv").load(location.href + " #mydiv");
                  }
              });
          });
          });

          $(document).on('click','#aad',function(){

            var message=$('#emojionearea1').val();
            var myFd=$(this).attr('d-stored');
            var conversation_id = $('#_chat').attr('d-conversation');
            // alert(myFd);
            // console.log(message);


            var profile_picture = '<?=$profile_picture?>';
            var newMessage='';
            newMessage+='<li style="width:80%" class="float-right my-1">';
            newMessage+='<div class="row text-white">';
            newMessage+='<div class="col-md-10  " >';
            newMessage+='<div class="row sender p-1 rounded_">';
            newMessage+='<div class="col-md-2 padding_16" style=" font-size: 9px">1 Sec Ago    </div>';
            newMessage+='<div class="col-md-10 padding_16 t_right" >'+message+
            '</div>';
            newMessage+='</div>';
            newMessage+='</div>';
            newMessage+='<div class="col-md-1 px-3 py-1" ><img src="assets/img/Profile_Pic/'+profile_picture+'"  width="40px" height="40px" alt="avatar" class="rounded-circle" /></div>';
            newMessage+='</div>';
            newMessage+='</li>';

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

                        $('#chPo').append(newMessage);
                        $('.chat-history').animate({scrollTop: $('.chat-history').prop("scrollHeight")}, 500);
                        // getConversation(myFd);
                      }
                    }
            });
          });
          $(document).ready(function() {
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

                $('#divOutside').click(function () {
                    $('.emojionearea-button').click()
                });       
            });
          </script>  
        </div> <!-- end container -->

      <script type="text/javascript">
        $(document).ready(function(){
          var myId='<?=$user_id?>';
            $.ajax({
              url:'<?=base_url('Message/getRecentChat')?>',
              type:"post",
              success:function(response){
                      console.log(response);
                      response=JSON.parse(response);
                      // console.log("Response: "+response.code);
                      if(response.code==1){
                        var msg_id=response.msgs[0].msg_id;
                        var user_id=response.msgs[0].user_id;
                        var profile_picture=response.msgs[0].profile_picture;
                        var name=response.msgs[0].full_name;
                        console.log("  ----> "+user_id);
                        var sent_to=0;
                        var sent_by=0;
                        var friendId=0;
                        if(sent_by==myId){
                          friendId=response.msgs[0].sent_to;
                        }else{
                          friendId=response.msgs[0].sent_by;
                        }
                        if(sent_to==myId){
                          friendId=response.msgs[0].sent_by;
                        }else{
                          friendId=response.msgs[0].sent_to;
                        }
                        neMess(msg_id,profile_picture,name,friendId);


                      }
                    }
            });
        });
        function init(){
          setInterval(function(){ 
            fetchUnreadMessage();
            // neMess(msg_id,profile_picture,name,foId);
          }, 1000);
        }
        function fetchUnreadMessageOn(conversation_id,element,foId){
          console.log("workgin Fine");
          var profile_picture = '<?=$profile_picture?>';
           var user_id ='<?=$user_id?>';
          $.ajax({
            url:"<?=base_url('Message/getUnreadMessage')?>",
            type:"post",
            data:{conv_id:conversation_id},
            success:function(response)
                    {
                        // console.log(response);
                        response=JSON.parse(response);
                        if(response.code==1){
                          var friendName=element.find('.name').text();
                          console.log(friendName);
                          $('#f_id').text(friendName);
                          $('#aad').attr('d-stored',foId);
                          var friendProfile=element.find('img').attr('src');
                          console.log(friendProfile);
                          $('#f_im').attr('src',friendProfile);
                          console.log("Total Messages : "+response.msgs.length);
                          $('#t_ms').text(response.msgs.length);
                          // $('#chPo').empty();
                          for(let i=0; i<response.msgs.length; i++){
                            chatBox='';
                            if(response.msgs[i].sent_to!=user_id){
                                
                               chatBox+='<li style="width:80%" class="float-right my-1">';
                                    chatBox+='<div class="row text-white">';
                                    chatBox+='<div class="col-md-10  " >';
                                    chatBox+='<div class="row sender p-1 rounded_">';
                                    chatBox+='<div class="col-md-10 padding_16 " >';
                                    if(response.msgs[i].message_type==2){
                                      chatBox+='<a href="'+response.msgs[i].message_+'" download>Download </a>';
                                    }else if(response.msgs[i].message_type==1){
                                      chatBox+='<img style="height:200px;width:100%" src="'+response.msgs[i].message_+'">';
                                    }else{
                                      chatBox+=response.msgs[i].message_;
                                    }
                                    chatBox+='</div>';
                                    chatBox+='<div class="col-md-2 padding_16" style=" font-size: 9px">'+response.msgs[i].sent_on+'</div>';
                                    
                                    chatBox+='</div>';
                                    chatBox+='</div>';
                                    chatBox+='<div class="col-md-1 px-3 py-1" ><img src="assets/uploads/images/'+response.msgs[i].profile_picture+'"  width="40px" height="40px" alt="avatar" class="rounded-circle" /></div>';
                                    chatBox+='</div>';
                                    chatBox+='</li>';
                            }else{

                                
                              chatBox+='<li style="width:80%" class="float-left my-1">';
                                    chatBox+='<div class="row text-white">';
                                    chatBox+='<div class="col-md-1 px-3 py-1" ><img src="assets/uploads/images/'+response.msgs[i].profile_picture+'"  width="40px" height="40px" alt="avatar" class="rounded-circle" /></div>';
                                    chatBox+='<div class="col-md-10  " >';
                                    chatBox+='<div class="row receiver p-1 rounded_">';
                                    chatBox+='<div class="col-md-10 padding_16 " >';
                                    if(response.msgs[i].message_type==2){
                                      chatBox+='<a href="'+response.msgs[i].message_+'" download>Download </a>';
                                    }else if(response.msgs[i].message_type==1){
                                      chatBox+='<img style="height:200px;width:100%" src="'+response.msgs[i].message_+'">';
                                    }else{
                                      chatBox+=response.msgs[i].message_;
                                    }
                                    chatBox+='</div>';
                                    chatBox+='<div class="col-md-2 padding_16" style=" font-size: 9px">'+response.msgs[i].sent_on+'  </div>';
                                    chatBox+='</div>';
                                    chatBox+='</div>';
                                    chatBox+='</div>';
                                    chatBox+='</li>';
                            }
                          $('#chPo').append(chatBox);
                          }
                        }
                    }
          });
        }
        function neMess(msg_id,profile_picture,name,foId){
          console.log(" Friend Id: "+msg_id);
          var user_id ='<?=$user_id?>';
          $.ajax({
            url:"<?=base_url('Message/getMyMessages')?>",
            type:"post",
            data:{conv_id:msg_id},
            success:function(response)
                    {
                        // console.log(response);
                        response=JSON.parse(response);
                        if(response.code==1){

                          var friendName=name;
                          console.log(friendName);
                          $('#f_id').text(friendName);
                          $('#aad').attr('d-stored',foId);
                          var friendProfile="assets/uploads/images/"+profile_picture;
                          console.log(friendProfile);
                          $('#f_im').attr('src',friendProfile);
                          console.log("Total Messages : "+response.msgs.length);
                          $('#t_ms').text(response.msgs.length);
                          $('#chPo').empty();
                          for(let i=0; i<response.msgs.length; i++){
                            chatBox='';
                            if(response.msgs[i].sent_to!=user_id){
                                
                              chatBox+='<li style="width:80%" class="float-right my-1">';
                                    chatBox+='<div class="row text-white">';
                                    chatBox+='<div class="col-md-10  " >';
                                    chatBox+='<div class="row sender p-1 rounded_">';
                                    chatBox+='<div class="col-md-10 padding_16 " >';
                                    if(response.msgs[i].message_type==2){
                                      chatBox+='<a href="'+response.msgs[i].message_+'" download>Download </a>';
                                    }else if(response.msgs[i].message_type==1){
                                      chatBox+='<img style="height:200px;width:100%" src="'+response.msgs[i].message_+'">';
                                    }else{
                                      chatBox+=response.msgs[i].message_;
                                    }
                                    chatBox+='</div>';
                                    chatBox+='<div class="col-md-2 padding_16" style=" font-size: 9px">'+response.msgs[i].sent_on+'</div>';
                                    
                                    chatBox+='</div>';
                                    chatBox+='</div>';
                                    chatBox+='<div class="col-md-1 px-3 py-1" ><img src="assets/uploads/images/'+response.msgs[i].profile_picture+'"  width="40px" height="40px" alt="avatar" class="rounded-circle" /></div>';
                                    chatBox+='</div>';
                                    chatBox+='</li>';
                            }else{

                                
                              chatBox+='<li style="width:80%" class="float-left my-1">';
                                    chatBox+='<div class="row text-white">';
                                    chatBox+='<div class="col-md-1 px-3 py-1" ><img src="assets/uploads/images/'+response.msgs[i].profile_picture+'"  width="40px" height="40px" alt="avatar" class="rounded-circle" /></div>';
                                    chatBox+='<div class="col-md-10  " >';
                                    chatBox+='<div class="row receiver p-1 rounded_">';
                                    chatBox+='<div class="col-md-10 padding_16 " >';
                                    if(response.msgs[i].message_type==2){
                                      chatBox+='<a href="'+response.msgs[i].message_+'" download>Download </a>';
                                    }else if(response.msgs[i].message_type==1){
                                      chatBox+='<img style="height:200px;width:100%" src="'+response.msgs[i].message_+'">';
                                    }else{
                                      chatBox+=response.msgs[i].message_;
                                    }
                                    chatBox+='</div>';
                                    chatBox+='<div class="col-md-2 padding_16" style=" font-size: 9px">'+response.msgs[i].sent_on+'  </div>';
                                    chatBox+='</div>';
                                    chatBox+='</div>';
                                    chatBox+='</div>';
                                    chatBox+='</li>';
                            }
                          $('#chPo').append(chatBox);
                          $('.chat-history').animate({scrollTop: $('.chat-history').prop("scrollHeight")}, 100);
                          }
                        }
                    }
          });
        }
         
        function getMessage(conversation_id, element="",foId){
          var profile_picture = '<?=$profile_picture?>';
           var user_id ='<?=$user_id?>';
          // setTimeInterval(getConversation(foId), 500);

          $.ajax({
            url:"<?=base_url('Message/getMyMessages')?>",
            type:"post",
            data:{conv_id:conversation_id},
            success:function(response)
                    {
                        // console.log(response);
                        response=JSON.parse(response);
                        if(response.code==1){

                          var friendName=element.find('.name').text();
                          console.log(friendName);
                          $('#f_id').text(friendName);
                          $('#aad').attr('d-stored',foId);
                          var friendProfile=element.find('img').attr('src');
                          console.log(friendProfile);
                          $('#f_im').attr('src',friendProfile);
                          console.log("Total Messages : "+response.msgs.length);
                          $('#t_ms').text(response.msgs.length);
                          $('#chPo').empty();
                          for(let i=0; i<response.msgs.length; i++){
                            // console.log(' Sent To: '+response.msgs[i].sent_to);
                            // console.log("Message: "+response.msgs[i].message_);
                            // var d_time=dateConversion(response.msgs[i].sent_on);
                            // dateAux = moment(response.msgs[i].sent_on,'DD-MM-YYYY hh:mm:ss');
                         
                            // console.log(" **** **** "+dateAux.toISOString() +" *****");
                            chatBox='';
                            if(response.msgs[i].sent_to!=user_id){
                                
                               chatBox+='<li style="width:80%" class="float-right my-1">';
                                    chatBox+='<div class="row text-white">';
                                    chatBox+='<div class="col-md-10  " >';
                                    chatBox+='<div class="row sender p-1 rounded_">';
                                    chatBox+='<div class="col-md-10 padding_16 " >';
                                    if(response.msgs[i].message_type==2){
                                      chatBox+='<a href="'+response.msgs[i].message_+'" download>Download </a>';
                                    }else if(response.msgs[i].message_type==1){
                                      chatBox+='<img style="height:200px;width:100%" src="'+response.msgs[i].message_+'">';
                                    }else{
                                      chatBox+=response.msgs[i].message_;
                                    }
                                    chatBox+='</div>';
                                    chatBox+='<div class="col-md-2 padding_16" style=" font-size: 9px">'+response.msgs[i].sent_on+'</div>';
                                    
                                    chatBox+='</div>';
                                    chatBox+='</div>';
                                    chatBox+='<div class="col-md-1 px-3 py-1" ><img src="assets/uploads/images/'+response.msgs[i].profile_picture+'"  width="40px" height="40px" alt="avatar" class="rounded-circle" /></div>';
                                    chatBox+='</div>';
                                    chatBox+='</li>';
                            }else{

                                
                              chatBox+='<li style="width:80%" class="float-left my-1">';
                                    chatBox+='<div class="row text-white">';
                                    chatBox+='<div class="col-md-1 px-3 py-1" ><img src="assets/uploads/images/'+response.msgs[i].profile_picture+'"  width="40px" height="40px" alt="avatar" class="rounded-circle" /></div>';
                                    chatBox+='<div class="col-md-10  " >';
                                    chatBox+='<div class="row receiver p-1 rounded_">';
                                    chatBox+='<div class="col-md-10 padding_16 " >';
                                    if(response.msgs[i].message_type==2){
                                      chatBox+='<a href="'+response.msgs[i].message_+'" download>Download </a>';
                                    }else if(response.msgs[i].message_type==1){
                                      chatBox+='<img style="height:200px;width:100%" src="'+response.msgs[i].message_+'">';
                                    }else{
                                      chatBox+=response.msgs[i].message_;
                                    }
                                    chatBox+='</div>';
                                    chatBox+='<div class="col-md-2 padding_16" style=" font-size: 9px">'+response.msgs[i].sent_on+'  </div>';
                                    chatBox+='</div>';
                                    chatBox+='</div>';
                                    chatBox+='</div>';
                                    chatBox+='</li>';



                             //  chatBox+='<li class="message-data clearfix">';
                             //  chatBox+='<div class="d-flex">';
                             // // chatBox+='<span class="message-data-time" >'+response.msgs[i].sent_on+'</span> &nbsp; &nbsp;';
                             //   //chatBox+='<div class="" >';
                              
                             //  // chatBox+='</div>';
                             //  chatBox+='<div class="message other-message float-right">';
                             //  if(response.msgs[i].message_type==2){
                             //  chatBox+='<a href="'+response.msgs[i].message_+'" download>Download </a>';
                             //  }
                             //  else if(response.msgs[i].message_type==1){
                             //      chatBox+='<img style="height:200px;width:100%" src="'+response.msgs[i].message_+'">';
                             //  }
                             //  else{
                             //  chatBox+=response.msgs[i].message_;
                             //  }
                             //  chatBox+='</div>';
                             //  chatBox+='<div class=""><img src="assets/img/Profile_Pic/'+response.msgs[i].profile_picture+'" class="pro_img rounded-circle ml-3"></div>';
                             //  chatBox+='</div><div class="text-right">'+
                             //            '<span class="message-data-time" >'+response.msgs[i].sent_on+'</span> &nbsp; &nbsp;</div>';
                             //  chatBox+='</li>';
                            }
                          $('#chPo').append(chatBox);
                          }
                        }
                    }
          });
        }
        $(document).on('click','.My-Friend',function(){
          $('#aad').removeAttr("disabled");
          var element=$(this);
          var conversation_id=element.attr('act');
          var foId=element.attr('d-store');
          console.log(" friend Id : "+foId+" Act Id: "+conversation_id);
          if(conversation_id!=""){
            
            $("#_chat").attr('d-store',conversation_id);
            getMessage(conversation_id,element,foId);
            setInterval(function(){ 
              fetchUnreadMessageOn(conversation_id,element,foId);
            }, 1000);
            // init(conversation_id,profile_picture,name,foId);
             $('.chat-history').animate({scrollTop: $('.chat-history').prop("scrollHeight")}, 500);
          }
        });
        function dateConversion(d_time){
          const d2 = new Date(d_time); 
          const year = d2.getFullYear(); // 2017
          const month = d2.getMonth(); // 11
          const dayOfMonth = d2.getDate(); // 7
          const hours = d2.getHours(); // 13
          const minutes = d2.getMinutes(); // 5
          const seconds = d2.getSeconds(); // 10
          const millis = d2.getMilliseconds(); // 0
          console.log('month: '+month);
          var y_cal;
          var m_cal;
          var Tyear=today_Year ();
          if((y_cal=Tyear-year)==0){
            console.log(" Same Year . "+y_cal);
            var c_mon=today_month();
            if((m_cal=c_mon-month)>0){
              console.log(m_cal+" month ago");
            }
          }else{
            console.log(y_cal+ " Year Ago . ");
          }
        }
        function today_Year (){
          var today = new Date();
          var year = today.getFullYear();
          return year;
        }
        function today_month (){
          var today = new Date();
          var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
          return mm;
        }
        function today_date (){
          var today = new Date();
          var dd = String(today.getDate()).padStart(2, '0');
          return dd;
        }
        function timeSince(date) {

          var seconds = Math.floor((new Date() - date) / 1000);

          var interval = Math.floor(seconds / 31536000);

          if (interval > 1) {
            return interval + " years";
          }
          interval = Math.floor(seconds / 2592000);
          if (interval > 1) {
            return interval + " months";
          }
          interval = Math.floor(seconds / 86400);
          if (interval > 1) {
            return interval + " days";
          }
          interval = Math.floor(seconds / 3600);
          if (interval > 1) {
            return interval + " hours";
          }
          interval = Math.floor(seconds / 60);
          if (interval > 1) {
            return interval + " minutes";
          }
          return Math.floor(seconds) + " seconds";
        }
        // var aDay = 24*60*60*1000
        // console.log(timeSince(new Date(Date.now()-aDay)));
        // console.log(timeSince(new Date(Date.now()-aDay*2)));
        // $(document).on('click','')
      </script>
       
       <script type="text/javascript">
         $(window).on('load',function(){
          $.ajax({
           url:'<?=base_url('Test/updateMessageStatus')?>',
          success:function(response){}
          })
        })
       </script>


    </body>
</html>