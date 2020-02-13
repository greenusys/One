<style>
.dropbtn {
  background-color: #3498DB;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
  background-color: #2980B9;
}

.dropdown {
  position: relative;
  display: inline-block;
}
.dropdown-menu{
	min-width: 7rem;
    padding: 0;
}
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}
.people-profile 
	{
		height: 75px;
		width: 80px;
		margin-top: -30px;
		margin-left: 15px;
		border: 4px solid white;
		position: relative;
	}
	.dropdown_btn{
		position: relative;
    	display: inline-block;
	}
	.btn_ast{
		padding:5px;
		font-size: 13px;
	}


	.snd_msgs{
		font-size: 14px;
	    color: #797777;
	    display: block;
	    padding: 2px 12px;
	}
	.sndmsg:focus{
		    outline: 0;
			 box-shadow:none !important;
		border: none
	}

</style>

<div class="container" style="margin-top: 80px">
	<div class="row">

		<?php
		foreach ($search_friends as $friends) {
		?>
		<div class="col-md-10 ">
			<div class="">
				<div class="row profile-info-div bg-white shadow-sm p-2 w-75 m-auto">
				    <div class="col-sm-4">
					    <div>
						    <img src="<?=base_url()?>assets/img/Cover_Photo/<?=$friends['cover_photo']?>"  class="rounded-sm img-fluid">
						</div>
						 <img src="<?=base_url()?>assets/img/Profile_pic/<?=$friends['profile_picture']?>" class="rounded-circle img-fluid people-profile">
					</div>
					<div class="col-sm-5">
					    <a href="#"><h6 class="font-weight-bold text-info mt-2"><?=$friends['full_name']?></h6></a>
<!-- 						<h6 class="font-weight-normal text-dark ">Actor/Director at Bollywood</h6>
						<h6 class="font-weight-normal text-muted ">242 followers</h6> -->
					</div>
					<div class="col-sm-3">
						<div class="d-flex mt-2">
						    <div class="">
							    <button class="btn btn-primary btn_ast frnd_rst" id="" ><i class="fa fa-user-plus" aria-hidden="true"></i> Add Friend</button>
							  	<button class="btn btn-success btn_ast canl_rst" id="" ><i class="fa fa-user-times" aria-hidden="true"></i> Cancel Request</button>
							</div>
						   <div class="dropdown ml-2 sndmsg">
						    <button class="btn btn-default p-1 sndmsg" type="button" data-toggle="dropdown" ><i class="fa fa-ellipsis-v" aria-hidden="true"></i>
						    </button>
						    <ul class="dropdown-menu ">
						     
						      <li><a href="#" class="snd_msgs">Send Message</a></li>
						    </ul>
						</div>
						</div>
						<script>
							$(document).ready(function(){
								$(".canl_rst").hide();
								$(document).on("click",".btn_ast",function(){
									var scs = $(this).attr("class");
									if(scs=='btn btn-primary btn_ast frnd_rst'){
										$(this).hide();
										$(this).parent().find(".canl_rst").show();
									}else{
										$(this).hide();
										$(this).parent().find(".frnd_rst").show();
									}
								})
							})
						</script>
					</div>
				</div>
				
			</div>
		</div>
	<?php } ?>
	</div>
</div>
<!-- <div class="btn-container">
    <button id="click-to-show">Click to display popup</button>
</div>
 
<div id="div-to-toggle" style="display: none;">
    <button id="close-btn">X</button>
 
    <h1>This is heading</h1>
    <p>This a Paragraph in the div for demonstration.</p>
</div> -->

<!-- $(document).ready(function(){
    $('#frnd_rst').click(function (e) {
    	$(this).closest(".snd_msg_dv").hide();
        // if ($(e.target).attr('id') != 'close-btn') {
            $(this).find('#btn_scl').slideToggle();
            event.stopPropagation();
      //  }
    });
    $('body,.sndmsg').click(function () {
        $('#btn_scl').hide();
        //event.stopPropagation();
    })
}); -->
<script>
// $(document).ready(function(){
//     $('.frnd_rst').click(function (e) {
//         // if ($(e.target).attr('id') != 'close-btn') {
//         	$(this).parent().parent().find(".snd_msg_dv").hide();
//             $('.btn_scl').slideToggle();
//             event.stopPropagation();
//       //  }
//     });
//     $('body,#sdad').click(function () {
//         $(this).parent().parent().find('.btn_scl').hide();
//         $(this).parent().find(".snd_msg_dv").css('display','none');
//         //event.stopPropagation();
//     })
// });
</script>
<script>


// $(document).ready(function(){
//       $(document.body).click( function() {
//         // console.log("yes");
//       var x =$("#btn_scl").hide();
		
// 		   // alert($("#btn_scl").css("display"));
		
		         
// 	})
// });


//  $(document).on("click","#frnd_rst", function() {
//  	var x =$(this).find("#btn_scl").slideToggle();
//  	// alert(x);
// });

/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>