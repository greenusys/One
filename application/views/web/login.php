<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 <script src="https://code.jquery.com/jquery-1.12.4.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <title>Lane Crowd</title>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/login.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
 <style type="text/css">

 	.modal2 {
    display:none;
    position:fixed;
    z-index:1000;
    top:0;
    left:0;
    height:100%;
    width:100%;
    background: rgba( 255, 255, 255, .8 ) 
                url('http://i.stack.imgur.com/FhHRx.gif') 
                50% 50% 
                no-repeat;
}

/* When the body has the loading class, we turn
   the scrollbar off with overflow:hidden */
body.loading .modal2 {
    overflow: hidden;   
}

/* Anytime the body has the loading class, our
   modal element will be visible */
body.loading .modal2 {
    display: block;
}
 </style>
  <body style="padding-top: 95px;background: url('<?=base_url()?>assets/img/banner/banner.png')">

<div class="cont">
<form id="login_user">
  <div class="form sign-in">
   <div class="text-center lduser"> <img src="assets/img/img1.png" class=" border-rounded rounded-circle" width="100px" height="100px"></div>
    <h2>Welcome back,</h2>
    <label>
      <span>Email/Phone </span>
      <input type="text"  name="email" class="email_in" />
    </label>
    <label>
      <span>Password</span>
      <input type="password" name="password" />
    </label>
    <div class="text-center mt-2"><a href=""  class="text-center forgot-pass" data-toggle="modal" data-target="#myModal">Forgot password?</a></div>
    <button type="submit" class="submit">Sign In</button>
 <!--    <button type="button" class="fb-btn">Connect with <span>facebook</span></button> -->
  </div>
</form>


  <div class="sub-cont">
    <div class="img">
      <div class="img__text m--up">

        <div>
          <h5>Recent Login</h5>
         
          <ul class="list-unstyled d-flex justify-content-center">
            <?php
              if(isset($_COOKIE['log_data'])){
                //  setcookie('log_data', null, -1, "/");
              $cookie_data=unserialize($_COOKIE['log_data']);
              foreach($cookie_data as $data_){
                  ?>
                    <li class="m-1 smal_img"><img src="assets/img/Profile_Pic/<?=$data_->profile_picture?>" ldemail="<?=$data_->email?>" alt="" class=" border-rounded rounded-circle">
                      <span><i class="fa fa-times-circle-o font20" aria-hidden="true"></i></span> 
                    </li>
                  <?php
                }

              }
            ?>
            <!-- <li class="m-1 smal_img"><img src="assets/img/img1.png" ldemail="example1@gmail.com" alt="" class=" border-rounded">
              <span><i class="fa fa-times-circle-o font20" aria-hidden="true"></i></span> 
            </li>
            <li class="m-1 smal_img"><img src="assets/img/img2.png" ldemail="example2@gmail.com" alt="" class=" border-rounded">
                <span><i class="fa fa-times-circle-o font20" aria-hidden="true"></i></span>
            </li>
            <li class="m-1 smal_img"><img src="assets/img/img3.png" ldemail="example3@gmail.com" alt="" class=" border-rounded"> 
               <span><i class="fa fa-times-circle-o font20" aria-hidden="true"></i></span>
            </li>
            <li class="m-1 smal_img"><img src="assets/img/img1.png" ldemail="example4@gmail.com" alt="" class=" border-rounded">
                <span><i class="fa fa-times-circle-o font20" aria-hidden="true"></i></span>
            </li> -->
            
          </ul>
        </div>
        <h2 class="mt-5">New here?</h2>
        <p>Sign up and discover great amount of new opportunities!</p>
      </div>

      <script type="text/javascript">
        $(document).on("click",".smal_img img",function(){
          // alert($(this).attr("src"));
          $(".lduser img").attr("src",$(this).attr("src"));
          $(".lduser").show();
          $(".email_in").val($(this).attr("ldemail"));
        })
         $(document).on("keyup",".email_in",function(e){
        
         if(e.keyCode == 8){
          $(".lduser").hide();
        }
         })
         $(document).on("click",".font20",function(){
      
              $(this).parent().parent().remove();
         })
      </script>

      <div class="img__text m--in">
       <h2 >One of us?</h2>
        <p>If you already has an account, just sign in. We've missed you!</p>
      </div>
      <div class="img__btn">
        <span class="m--up">Sign Up</span>
        <span class="m--in">Sign In</span>
      </div>
    </div>
    <div class="form sign-up">
     <form id="signup">
      <h2>Time to feel like home,</h2>
      <label>
        <span>Full Name</span>
        <input type="text" required="" name="name" />
      </label>
      <label>
        <span>Email/Phone </span>
        <input type="text" required="" name="email_phone"/>
      </label>
      <label>
        <span>Password</span>
        <input type="password" id="password" required="" name="password" />
      </label>
       <label>
        <span>Confirm Password</span>
        <input type="password" required="" name="cpassword" />
      </label>
      <button type="submit" id="submit" class="submit">Sign Up</button>
	</form>
    </div>
  </div>
</div>

<!-- <a href="https://dribbble.com/shots/3306190-Login-Registration-form" target="_blank" class="icon-link">
  <img src="http://icons.iconarchive.com/icons/uiconstock/socialmedia/256/Dribbble-icon.png" class=" ">
</a>
<a href="https://twitter.com/NikolayTalanov" target="_blank" class="icon-link icon-link--twitter">
  <img src="https://cdn1.iconfinder.com/data/icons/logotypes/32/twitter-128.png" class=" ">
</a> -->
<script>
  document.querySelector('.img__btn').addEventListener('click', function() {
    document.querySelector('.cont').classList.toggle('s--signup');
  });

</script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
            <h4 class="modal-title">OTP Confirmation</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
    
      </div>
      <div class="modal-body">
        <form id="otp_verify">
          <div class="">
            <h6 class="text-center">Please Enter the OTP which is sent to your registered Email/Phoneno</h6>
            <label>
              <span>Enter OTP</span>
              <input type="text" name="verify_otp" />
            </label>
            <div id="user_data"></div>
             <button type="submit" class="submit">Confirm OTP</button>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<div class="modal2"><!-- Place at bottom of page --></div>
  </body>
</html>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script type="text/javascript">
$body = $("body");

$(document).on({
    ajaxStart: function() { $body.addClass("loading");    },
     ajaxStop: function() { $body.removeClass("loading"); }    
});


jQuery.validator.addMethod("alphanumeric", function(value, element) {
    return this.optional(element) || /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/i.test(value);
}, "Minimum eight characters, at least one letter, one number and one special character");

jQuery.validator.addMethod("email_phone", function(value, element) {
    return this.optional(element) || /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/i.test(value) || /[0-9 -()+]+$/i.test(value);
}, "Email or Phone Number Only");

jQuery('#signup').validate({
            rules : {
            	email_phone : {
            		email_phone:true,
                minlength:10
            	},
                password : {
                    alphanumeric:true
                },
                cpassword : {
                    equalTo : "#password",
                }
            }
        })

$('input').on('keyup', function() {
    if ($("#signup").valid()) {
        $('#submit').prop('disabled', false);  
    } else {
        $('#submit').prop('disabled', 'disabled');
    }
});

$("#signup").submit(function(e){
        e.preventDefault();
        var formData= new FormData($(this)[0]);
        $.ajax({
            url:"<?=base_url()?>signup_otp",
             type:"post",
             data:formData,
             contentType:false,
             processData:false,
             cache:false,

            success:function(response)
            {
              var response=JSON.parse(response);
              if(response.status==1){
                var html='';
                html+='<input type="hidden" name="name" value="'+response.name+'">'+
                      '<input type="hidden" name="password" value="'+response.password+'">'+
                      '<input type="hidden" name="email" value="'+response.email+'">'+
                      '<input type="hidden" name="otp" value="'+response.otp+'">';
                $('#user_data').empty();
                $('#user_data').append(html);
                $('#myModal').modal('show');
              }
              else{
                swal ( "User Already Exists" ,  "Please Login or goto Forgot Password!" ,  "error" );
              }
            }
        });
    });

$("#otp_verify").submit(function(e){
        e.preventDefault();
        var formData= new FormData($(this)[0]);
        $.ajax({
            url:"<?=base_url()?>signup",
             type:"post",
             data:formData,
             contentType:false,
             processData:false,
             cache:false,
            success:function(response)
            {
              var response=JSON.parse(response);
              if(response.status==1){
                swal("User Registred Successfully!", "Please Login!", "success");
                window.location.href='<?=base_url()?>';
              }
            }
        });
    });

$("#login_user").submit(function(e){
        e.preventDefault();
        var formData= new FormData($(this)[0]);
        $.ajax({
            url:"<?=base_url()?>Login/signin",
             type:"post",
             data:formData,
             contentType:false,
             processData:false,
             cache:false,
            success:function(response)
            {
               var response=JSON.parse(response);
              if(response.status==1){
                //swal("User Registred Successfully!", "Please Login!", "success");
                window.location.href='<?=base_url()?>Home';
              }
              else if(response.status=="0"){
                swal(response.msg, "Please Check Credentials!", "error");
              }
            }
        });
    });
</script>