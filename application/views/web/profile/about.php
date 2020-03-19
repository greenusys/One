<style type="text/css">
  .postProfile-pic{
    width: 30px !important;
    height: : 30px !important;
  }
  .fa-address-card {
    border: 1px solid black;
    border-radius: 50%;
    padding: 10px;
}
.font14{
  font-size: 14px
}
.skils{
        color: rgba(0,0,0,.5) !important;
    font-size: 14px;
    font-weight: 600;
    text-transform: capitalize;
}
</style>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.0-beta/css/bootstrap-select.min.css">
<link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.0-beta/js/bootstrap-select.min.js"></script>
<script>
$( document ).ready(function(e) {
  $('.profile').addClass('active');
})
$(document).ready(function(){
    $(".m_about").addClass("active");
  })
</script>
<!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script> -->
<script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <script src="https://files.codepedia.info/files/uploads/iScripts/html2canvas.js"></script>
 <!-- center panel -->
<div class="col-md-9  ">
  <div class="row mt-5 p-2">
    <div class="col-md-4">
        <div class="card p-3"> 
            <ul class="nav nav-pills flex-column" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#work" role="tab" aria-controls="home" aria-selected="true">Work and education</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Places you've lived</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact and basic info</a>
              </li>
            </ul>
        </div>
    </div>
    <!-- /.col-md-4 -->
    <div class="col-md-8">
  <div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="work" role="tabpanel" aria-labelledby="home-tab">
<!-- <h2>work and Education</h2> -->
      
<?php
    $myAccount=0;
    if($user_id == $_SESSION['logged_in'][0]->user_id){
        $myAccount=1;
    }
?>
    <div class=" card rounded ">
        <div class="" id="work">
            <div class="col-md-12">
                <h6 class="text-secondary pb-2  author mt-3 mb-0">WORK</h6>
                    
                <?php
                    // print_r();
                    if(count($WorkDetails)>0){
                        echo '<ul class="mb-1">';
                        foreach($WorkDetails as $detail){
                            echo '<li><a href="javascript:void(0)" class="skils">'.$detail->company_name.'</a>
                                    <span class="text-primary ml-2 pointer p-1 editable" title="Edit"><i class="fas fa-pencil-alt"></i></span>
                                    <span class="text-success ml-2 pointer d-none p-1 save__" title="Save"><i class="fab fa-telegram-plane"></i></span>
                                    <span class="text-danger ml-2 delt_bn d-none pointer p-1" title="Delete"><i class="fas fa-trash-alt" ></i></span>
                                </li>';
                        }
                        echo '</ul>';
                    }
                ?>
                <?php
                    if($myAccount==1){
                        echo '<h6  class="text-info mt-0 fy "><a href="javascript:void(0)" id="add">Add a Workplace &nbsp; <span class="text-primary"> <i class="fas fa-arrow-alt-circle-down" style="font-size:18px"></i></span></a></h6> 
                        <hr>';
                    }
                ?>
                
          
            </div>
        </div>
        <script>
            $(document).on('submit','#addWorkplace',function(e){
                e.preventDefault();
                //alert('Working');
                var formData=new FormData($(this)[0]);
                $.ajax({
                    url:"<?=base_url('About/addWorkDetails')?>",
                    type:"post",
                    cache:false,
                    contentType:false,
                    processData:false,
                    data:formData,
                    success:function(response){
                        console.log(response);
                        response=JSON.parse(response);
                        if(response.code==1){
                            swal("Good job!", "Word Details Added Successfully.", "success");
                            $('#addWorkplace').hide();
                        }else{
                             swal("Oop!", response.msg, "info");
                        }

                    }
                });
            });
        </script>
        <div class="row card bg-light p-2" id="form1" style="display:none">
            <div class="offset-1 col-sm-11 mt-4">
                <form id="addWorkplace">
                    <div class="form-group">
                        <div class="row">
                            <div class="offset-1  col-sm-2">
                                <label for="exampleInputEmail1">Company </label>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="company" aria-describedby="emailHelp" placeholder="where have you worked?">
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="row">
                            <div class="offset-1  col-sm-2">
                                <label for="exampleInputEmail1">Position </label>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="position" aria-describedby="emailHelp" placeholder="what is your job title?">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="offset-1  col-sm-2">
                                <label for="exampleInputEmail1">Country </label>
                            </div>
                            <div class="col-sm-6">
                                <select name="country" class="countries form-control" id="countryId">
                                    <option value="">Select Country</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="offset-1  col-sm-2">
                                <label for="exampleInputEmail1">State </label>
                            </div>
                            <div class="col-sm-6">
                                <select name="state" class="states form-control" id="stateId">
                                    <option value="">Select State</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="offset-1  col-sm-2">
                                <label for="exampleInputEmail1">City/Town </label>
                            </div>
                            <div class="col-sm-6">
                                <select name="city" class="cities form-control" id="cityId">
                                    <option value="">Select City</option>
                                </select>                              
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="row">
                            <div class="offset-1 col-sm-2">
                                <label for="exampleInputEmail1">Description </label>
                            </div>
                            <div class="col-sm-6">
                                    <textarea class="form-control" name="description"></textarea>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="row">
                            <div class="offset-1 col-sm-2">
                                <label for="exampleInputEmail1">Time Period </label>
                            </div>
                            <div class="col-sm-6">
                                <label class="small-box"> 
                                    <input type="checkbox" checked="checked"> &nbsp; I currently work here
                                    <span class="checkmark"></span>
                                </label>
                                <br>
                                From <select name="workedFrom">
                                        <?php
                                            for($i=1975; $i<=date('Y');$i++){
                                                if($i==date('Y')){
                                                    
                                                    echo '<option value="'.$i.'" selected>'.$i.'</option>';
                                                }else{
                                                    echo '<option value="'.$i.'" >'.$i.'</option>';
                                                }
                                                
                                            }
                                        ?>
                                        
                                    </select> 
                                to  <select name="workedTo">
                                        <?php
                                            for($i=1975; $i<=date('Y');$i++){
                                                if($i==date('Y')){
                                                    echo '<option value="'.$i.'" selected>'.$i.'</option>';
                                                }else{
                                                    echo '<option value="'.$i.'" >'.$i.'</option>';
                                                }
                                                
                                            }
                                        ?>
                                    </select>
                            </div>
                        </div>
                    </div>
               
                    <div class="row">
                        <!-- <div class="col-sm-3">
                            <select class="bg-secondary text-white p-2 rounded" data-toggle="tooltip" data-placement="top" title="Public">
                                <option value="volvo">Public</option>
                                <option value="saab">Friends</option>
                                <option value="opel">Only me</option>
                                <option value="audi">Custom</option>
                                <option value="audi">Close Friends</option>
                            </select> 
                        </div> -->
                        <div class="col-sm-3">
                            <input type="submit" class="btn btn-primary" value="Save">
                        </div>
                            <div class="col-sm-2">
                            <button type="button" class="btn btn-secondary" id="cancel1">Cancel</button>
                        </div>
                    </div>
                </form>
                <hr>
            </div>
        </div>
        <script>
            $(document).on('submit','#addSkills',function(e){
                e.preventDefault();
                //alert('Working');
                var formData=new FormData($(this)[0]);
                $.ajax({
                    url:"<?=base_url('About/addSkills')?>",
                    type:"post",
                    cache:false,
                    contentType:false,
                    processData:false,
                    data:formData,
                    success:function(response){
                        console.log(response);
                        response=JSON.parse(response);
                        if(response.code==1){
                            swal("Good job!", "Skills Added Successfully.", "success");
                        }else{
                             swal("Oop!", response.msg, "info");
                        }
                    }
                });
            });
        </script>                    
        <div class="" id="skills">
            <div class="col-md-12">
                <h6 class="text-secondary pb-2 author mt-3 mb-0">PROFESSIONAL SKILLS</h6>
            
                         <?php
                    // print_r();
                    if(count($SkillDetails)>0){
                        echo '<ul class="mb-1">';
                        foreach($SkillDetails as $detail){
                            echo '<li><a href="javascript:void(0)" class="skils" >'.$detail->user_skill.'</a>
                                    <span class="text-primary ml-2 pointer p-1 editable" title="Edit"><i class="fas fa-pencil-alt"></i></span>
                                    <span class="text-success ml-2 pointer d-none p-1 save__" title="Save"><i class="fab fa-telegram-plane"></i></span>
                                    <span class="text-danger ml-2 delt_bn d-none pointer p-1" title="Delete"><i class="fas fa-trash-alt" ></i></span>
                                </li>';
                        }
                        echo '</ul>';
                    }
                ?> 

                <?php
                    if($myAccount==1){
                        echo '<h6 class="text-info mt-0 fy"><a href="javascript:void(0)" id="skill">Add a Professional Skill &nbsp; <span class="text-primary"> <i class="fas fa-arrow-alt-circle-down" style="font-size:18px"></i></span></a></h6> 
                        <hr>';
                    }
                ?>
                
          
            </div>
        </div>
        
        <div class=" card bg-light pb-2" id="form2" style="display:none">
            <div class="offset-1 col-sm-11 mt-4">
                <form id="addSkills">
                    <div class="form-group">
                        <div class="row">
                            <div class="  col-sm-3">
                                <label for="exampleInputEmail1">Professional Skills </label>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="professionSkills" aria-describedby="emailHelp">
                            </div>
                        </div>
                    </div>
                
                    <hr>
                    <div class="row">
                        <!-- <div class="col-sm-3">
                            <select class="bg-secondary text-white p-2 rounded" data-toggle="tooltip" data-placement="top" title="Public">
                                <option value="volvo">Public</option>
                                <option value="saab">Friends</option>
                                <option value="opel">Only me</option>
                                <option value="audi">Custom</option>
                                <option value="audi">Close Friends</option>
                            </select> 
                        </div> -->
                        <div class="col-sm-3">
                            <input type="submit" class="btn btn-primary" value="Save Changes">
                        </div>
                            <div class="col-sm-2">
                            <button type="button" class="btn btn-secondary" id="cancel2">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="" id="university">
            <div class="col-md-12">
                <h6 class="text-secondary pb-2 author mt-3 mb-0">UNIVERSITY</h6>
                <?php
                    // print_r();
                    if(count($UniversityDetails)>0){
                        echo '<ul class="mb-1">';
                        foreach($UniversityDetails as $detail){
                            echo '<li><a href="javascript:void(0)" class="skils" >'.$detail->university.'</a>
                                    <span class="text-primary ml-2 pointer p-1 editable" title="Edit"><i class="fas fa-pencil-alt"></i></span>
                                    <span class="text-success ml-2 pointer d-none p-1 save__" title="Save"><i class="fab fa-telegram-plane"></i></span>
                                    <span class="text-danger ml-2 delt_bn d-none pointer p-1" title="Delete"><i class="fas fa-trash-alt" ></i></span>
                                </li>';
                        }
                        echo '</ul>';
                    }
                ?>

                <?php
                    if($myAccount==1){
                        echo '<h6 class="text-info mt-0 fy"><a href="javascript:void(0)"  id="univ">Add a University&nbsp; <span class="text-primary"> <i class="fas fa-arrow-alt-circle-down" style="font-size:18px"></i></span></a></h6> 
                        <hr>';
                    }
                ?>
                
                
            </div>
        </div>
        <script>
            $(document).on('submit','#addUniversity',function(e){
                e.preventDefault();
                //alert('Working');
                var formData=new FormData($(this)[0]);
                $.ajax({
                    url:"<?=base_url('About/addUniversity')?>",
                    type:"post",
                    cache:false,
                    contentType:false,
                    processData:false,
                    data:formData,
                    success:function(response){
                        console.log(response);
                        response=JSON.parse(response);
                        if(response.code==1){
                            swal("Good job!", "University Added Successfully.", "success");
                        }else{
                             swal("Oop!", response.msg, "info");
                        }
                    }
                });
            });
        </script>   
        <div class=" card bg-light pb-2" id="form3" style="display:none">
            <div class="offset-1 col-sm-11 mt-4">
                <form id="addUniversity">
                    <div class="form-group">
                        <div class="row">
                            <div class="offset-1  col-sm-2">
                                <label for="exampleInputEmail1">University </label>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="university" aria-describedby="emailHelp" placeholder="what school/university did you attend ">
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="row">
                            <div class="offset-1 col-sm-2">
                                <label for="exampleInputEmail1">Time Period </label>
                            </div>
                            <div class="col-sm-6">
                                <!-- <label class="small-box"> 
                                    <input type="checkbox" checked="checked"> &nbsp; I currently work here
                                    <span class="checkmark"></span>
                                </label>
                                <br> -->
                                From <select name="from_">
                                        <?php
                                            for($i=1975; $i<=date('Y');$i++){
                                                if($i==date('Y')){
                                                    
                                                    echo '<option value="'.$i.'" selected>'.$i.'</option>';
                                                }else{
                                                    echo '<option value="'.$i.'" >'.$i.'</option>';
                                                }
                                                
                                            }
                                        ?>
                                    </select> 
                                to  <select name="to_">
                                        <?php
                                            for($i=1975; $i<=date('Y');$i++){
                                                if($i==date('Y')){
                                                    
                                                    echo '<option value="'.$i.'" selected>'.$i.'</option>';
                                                }else{
                                                    echo '<option value="'.$i.'" >'.$i.'</option>';
                                                }
                                                
                                            }
                                        ?>
                                    </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="row">
                            <div class="offset-1 col-sm-2">
                                <label for="exampleInputEmail1">Graduated </label>
                            </div>
                            <div class="col-sm-6">
                                <label class="small-box"> 
                                    <input type="checkbox" checked="checked" name="graduated">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="row">
                            <div class="offset-1 col-sm-2">
                                <label for="exampleInputEmail1">Description </label>
                            </div>
                            <div class="col-sm-6">
                                    <textarea class="form-control" name="description"></textarea>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="row">
                            <div class="offset-1  col-sm-2">
                                <label for="exampleInputEmail1">Course </label>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="course" aria-describedby="emailHelp" >
                            </div>
                        </div>
                    </div>
                    
                    <!-- <div class="form-group">
                        <div class="row">
                            <div class="offset-1  col-sm-2">
                                
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="city" aria-describedby="emailHelp">
                            </div>
                        </div>
                    </div> -->
<!--                     
                    <div class="form-group">
                        <div class="row">
                            <div class="offset-1  col-sm-2">
                                
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="city" aria-describedby="emailHelp">
                            </div>
                        </div>
                    </div>
                     -->
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3">
                                <label for="exampleInputEmail1">Attended for</label>
                            </div>
                            <div class="col-sm-9">
                            
                                <div class="checkbox c-radio needsclick ">
                                    <input type="radio" name="gender" value="male" class="btn1" checked="checked" id="post"> university<br>
                                </div>
                                <div class="checkbox c-radio needsclick">
                                    <input type="radio" name="gender" value="male" id="chk" onclick="ShowHideDiv(this)" > University (postgraduate)<br>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group" id="degree" style="display:none">
                        <div class="row">
                            <div class="offset-1  col-sm-2">
                                <label for="exampleInputEmail1">Degree </label>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="degree" aria-describedby="emailHelp" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- <div class="col-sm-3">
                            <select class="bg-secondary text-white p-2 rounded" data-toggle="tooltip" data-placement="top" title="Public">
                                <option value="volvo">Public</option>
                                <option value="saab">Friends</option>
                                <option value="opel">Only me</option>
                                <option value="audi">Custom</option>
                                <option value="audi">Close Friends</option>
                            </select> 
                        </div> -->
                        <div class="col-sm-3">
                            <input type="submit" class="btn btn-primary" value="Save Changes">
                        </div>
                            <div class="col-sm-2">
                            <button type="button" class="btn btn-secondary" id="cancel3">Cancel</button>
                        </div>
                    </div>
                </form>
                <hr>
                
            </div>
        </div>
        <script>
            $(document).on('submit','#addSchool',function(e){
                e.preventDefault();
                //alert('Working');
                var formData=new FormData($(this)[0]);
                $.ajax({
                    url:"<?=base_url('About/addSchool')?>",
                    type:"post",
                    cache:false,
                    contentType:false,
                    processData:false,
                    data:formData,
                    success:function(response){
                        console.log(response);
                        response=JSON.parse(response);
                        if(response.code==1){
                            swal("Good job!", "School Added Successfully.", "success");
                        }else{
                             swal("Oop!", response.msg, "info");
                        }
                    }
                });
            });
        </script>
        <div class="" id="school">
            <div class="col-md-12">
                <h6 class="text-secondary pb-2 author mt-3 mb-0">HIGH SCHOOL</h6>
               
                 <?php
                    // print_r();
                    if(count($SchoolDetails)>0){
                        echo '<ul class="mb-1">';
                        foreach($SchoolDetails as $detail){
                            echo '<li><a href="javascript:void(0)" class="skils">'.$detail->school .'</a>
                                    <span class="text-primary ml-2 pointer p-1 editable" title="Edit"><i class="fas fa-pencil-alt"></i></span>
                                    <span class="text-success ml-2 pointer d-none p-1 save__" title="Save"><i class="fab fa-telegram-plane"></i></span>
                                    <span class="text-danger ml-2 delt_bn d-none pointer p-1" title="Delete"><i class="fas fa-trash-alt" ></i></span>
                                    </li>';
                        }
                        echo '</ul>';
                    }
                ?>

                <?php
                    if($myAccount==1){
                        echo '<h6 class="text-info mt-0 fy"><a href="javascript:void(0)"  id="high">Add a High School &nbsp; <span class="text-primary"> <i class="fas fa-arrow-alt-circle-down" style="font-size:18px"></i></span></a></h6> 
                        <hr>';
                    }
                ?>
                
               
            </div>
        </div>
        <script type="text/javascript">
           
$(document).on('click','.editable',function() {
        
  var t = $(this).parent().find("a");          
  var input = $('<input>').attr('class', 'savable').val( t.text() );
  t.replaceWith( input ); 
  input.focus();
  var c = $(this).parent().find(".delt_bn").removeClass("d-none");
  $(this).parent().find(".save__").removeClass("d-none");
  $(this).addClass("d-none");
});

// $(document).on('blur','.savable',function() {

//   var input = $(this);      
//   var t = $('<a>').attr({href:"javascript:void(0)",class:"skils"}).text( input.val() );
//   input.replaceWith( t ); 
//   $(".delt_bn").addClass("d-none");
//    $(".save__").addClass("d-none");
//    $(".editable").removeClass("d-none");
//   // alert(c);

// });
$(document).on("click",".delt_bn",function(){
    alert("sdadsasda");
})
        </script>
        <div class="row card bg-light pb-2" id="form4" style="display:none">
            <div class="offset-1 col-sm-11 mt-4">
                <form id="addSchool">
                    <div class="form-group">
                        <div class="row">
                            <div class="offset-1  col-sm-2">
                                <label for="exampleInputEmail1">School </label>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="school" aria-describedby="emailHelp" placeholder="what school/university did you attend ">
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="row">
                            <div class="offset-1 col-sm-2">
                                <label for="exampleInputEmail1">Time Period </label>
                            </div>
                            <div class="col-sm-6">
                                <!-- <label class="small-box"> 
                                    <input type="checkbox" checked="checked"> &nbsp; I currently work here
                                    <span class="checkmark"></span>
                                </label>
                                <br> -->
                                From <select name="from_">
                                        <?php
                                            for($i=1975; $i<=date('Y');$i++){
                                                if($i==date('Y')){
                                                    
                                                    echo '<option value="'.$i.'" selected>'.$i.'</option>';
                                                }else{
                                                    echo '<option value="'.$i.'" >'.$i.'</option>';
                                                }
                                                
                                            }
                                        ?>
                                    </select> 
                                to  <select name="to_">
                                        <?php
                                            for($i=1975; $i<=date('Y');$i++){
                                                if($i==date('Y')){
                                                    
                                                    echo '<option value="'.$i.'" selected>'.$i.'</option>';
                                                }else{
                                                    echo '<option value="'.$i.'" >'.$i.'</option>';
                                                }
                                                
                                            }
                                        ?>
                                    </select>
                            </div>
                        </div>
                    </div>
                    
                    <!-- <div class="form-group">
                        <div class="row">
                            <div class="offset-1 col-sm-2">
                                <label for="exampleInputEmail1">Graduated </label>
                            </div>
                            <div class="col-sm-6">
                                <label class="small-box"> 
                                    <input type="checkbox" checked="checked" name="">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </div> -->
                    
                    <div class="form-group">
                        <div class="row">
                            <div class="offset-1 col-sm-2">
                                <label for="exampleInputEmail1">Description </label>
                            </div>
                            <div class="col-sm-6">
                                    <textarea class="form-control" name="description"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- <div class="col-sm-3">
                            <select class="bg-secondary text-white p-2 rounded" data-toggle="tooltip" data-placement="top" title="Public">
                                <option value="volvo">Public</option>
                                <option value="saab">Friends</option>
                                <option value="opel">Only me</option>
                                <option value="audi">Custom</option>
                                <option value="audi">Close Friends</option>
                            </select> 
                        </div> -->
                        <div class="col-sm-3">
                            <input type="submit" class="btn btn-primary" value="Save Changes">
                        </div>
                            <div class="col-sm-2">
                            <button type="button" class="btn btn-secondary" id="cancel4">Cancel</button>
                        </div>
                    </div>                
                </form>
                <hr>
                
            </div>
        </div>
    </div>
  </div>
  <div class="tab-pane fade card" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <div class="col-md-12">
        <h6 class="text-secondary pb-2 author mt-3 mb-0">OTHER PLACES LIVED</h6>
         <?php
            if($myAccount==1){
                echo '<h6 class="text-info mt-0 fy"><a href="javascript:void(0)"  id="place_places">Add a place &nbsp; <span class="text-primary"> <i class="fas fa-arrow-alt-circle-down" style="font-size:18px"></i></span></a></h6> 
                <hr>';
            }
        ?>
    </div>
  </div>
  <style>
.edt-bt{
    display: none;
}
.lt_blok button{
    font-size: 11px;
}
.add_int{
        padding: 2px;
    font-size: 12px;
    height: 20px;
}
.lt_blok{
    display: none;
}
.bootstrap-select>.dropdown-toggle {
    position: relative;
    width: 16%;
    padding-right: 25px;
    z-index: 1;
}
.bootstrap-select .dropdown-menu {
    min-width: 40%;
}
.add_int .dropdown-menu{
        font-size: 10px !important;
}
.bootstrap-select:not([class*=col-]):not([class*=form-control]):not(.input-group-btn){
    width:unset !important;
}
.about_wt{
        font-size: 12px;
    font-weight: bold;
}
.foo_select .dropdown-toggle{
    width: 55% !important;
       color: #495057 !important;
    background-color: #fff !important;
    background-clip: padding-box !important;
    border: 1px solid #ced4da !important;
    border-radius: .25rem !important;
}
</style>
  <script type="text/javascript">
      $(document).on("mouseover",".sh-edt",function(){
        $(this).find(".edt-bt").show();
      })
       $(document).on("mouseleave",".sh-edt",function(){
        $(".edt-bt").hide();
      })
       $(document).on("click",".edt-bt",function(){
        $(".edt-bt").hide();
      })
  </script>
  <script>
  $(document).on('click','.total_num',function(){
    var el=$(this);
    var namer=el.attr('namer');
    var phone=el.html();
    var id = el.attr('id');
    $('#number_id').val(phone);
    $('#locator').val(namer);
    $('.canceler').attr('prev_id');
    el.hide();
    $('.shw_phone_bl').show();
  })    

  $(document).on('click','.canceler',function(){
    $('.shw_phone_bl').hide();
    $('.total_num').show();
  })

  $(document).on("submit","#update_num",function(e){

    e.preventDefault();
    //alert('Working');
    var formData=new FormData($(this)[0]);
    $.ajax({
        url:"<?=base_url('About/updateNum')?>",
        type:"post",
        cache:false,
        contentType:false,
        processData:false,
        data:formData,
        success:function(response){
            console.log(response);
            response=JSON.parse(response);
            if(response.status==1){
                swal("Good job!", "Number Updated Successfully.", "success");
                location.reload();
            }else{
                 swal("Oop!", response.msg, "info");
            }
        }
    });
});

  </script>
  <div class="tab-pane fade card " id="contact" role="tabpanel" aria-labelledby="contact-tab">
    <div class="col-md-12">
        <h6 class="text-secondary pb-2 author mt-3 mb-0">CONTACT INFORMATION</h6>
        <hr class="mt-0">
        <div class="row">
            <div class="col-md-4">
                <span class="author">Mobile Phones</span>
            </div>
            <div class="col-md-8 ">
                <div class="sh-edt">
                   <?php 
                   if($phoneNumbers){ ?> 
                  <div class="shw_phone_bl" style="display: none">
                    <form id="update_num">
                      <input type="text" maxlength="20" minlength="9" name="updated_num" id="number_id" class="ml-1 add_int form-control">
                      <input type="hidden" name="location" id="locator" value="">
                      <div class="text-right"><label class="btn p-1 btn-primary bio_btn  m-0 mr-2 ranUse canceler">Cancel</label><button class="mr-2 btn btn-success p-1 bio_btn ranUse">Save</button></div>
                    </form>
                  </div>
                    <ul class="m-0 list-unstyled"><?php
                            if($phoneNumbers[0]=="" || $phoneNumbers[0]==NULL){
                                echo "<li class='about_wt'>Add phone number</li>";
                            }
                            $count=0;
                        foreach ($phoneNumbers as $phone) { 
                            
                            ?>
                            <li class="about_wt total_num" namer="<?=$count?>"><?=$phone?></li>
                        <?php  $count++;
                            }
                        ?>
                    </ul>
                <?php }else{
                        echo" Add Phone Number";
                    }
                ?>
                    <?php 
                        if($user_id == $_SESSION['logged_in'][0]->user_id){ ?>
                                <div class="float-right edt-bt" ><span class="text-primary pointer edit_shbtn">Edit</span></div>
                      <?php  } ?>  
                
                </div>
                <div class="lt_blok">
                    <form class="" id="add_phone">
                        <div class="aad_nmb" id="ad_num">
                            
                        </div>
                        <small class="text-primary pointer ant_nm"> + Another phone number</small>
                        <div class="">
                            <select id="mySelect" data-show-content="true" name="usd_phone_privacy" class="mySelect add_int">
                                
                                <option value="1" selected=""  data-content="<i class='fas fa-globe-asia'></i> Public"></option>
                                <option value="2" data-content="<i class='fas fa-user-friends'></i> Friends"></option>
                                <option value="3" data-content="<i class='fas fa-lock'></i> Onlyme"></option>
                            </select>

                          <button class="btn btn-primary py-1 px-2 ">Save Changes</button> <button type="button" class="can_btn btn border ml-2">Cancel</button></div>
                    </form>
                </div>
            </div>
        </div>
        <hr>
        <script>
          
              $(document).on("click",".ant_nm",function(){
                var check_length = $('.total_num').length;
                if (check_length>=2) {
                    swal("Sorry","Maximum Two Contact Numbers Are allowed","warning");
                }
                else{
                var html='<div class="d-flex mb-1"> '+
                            '<select class="form-control add_int w-50" name="country_code[]">'+
                                '<option selected="" value="+91">India +91</option>'+
                            '</select>'+
                            '<input type="tel" maxlength="10" minlength="9" name="usd_phone[]" class="ml-1 add_int form-control">'+
                        '</div>';
                $("#ad_num").append(html);     
                }       
            })


            $(document).on("submit","#add_phone",function(e){

                e.preventDefault();
                //alert('Working');
                var formData=new FormData($(this)[0]);
                $.ajax({
                    url:"<?=base_url('About/addPhone')?>",
                    type:"post",
                    cache:false,
                    contentType:false,
                    processData:false,
                    data:formData,
                    success:function(response){
                        console.log(response);
                        response=JSON.parse(response);
                        if(response.code==1){
                            swal("Good job!", "Number Added Successfully.", "success");
                        }else{
                             swal("Oop!", response.msg, "info");
                        }
                    }
                });
            });

            $(document).on("click",".edit_shbtn",function(){
                $(this).parent().parent().parent().find("#ad_num").empty();
                $(".lt_blok").hide();
                $(this).hide();
                 $(this).parent().parent().parent().parent().find(".det_shw").hide();
                $(this).parent().parent().parent().find(".lt_blok").show();
            })
              $(document).on("click",".can_btn",function(){
                 $(".det_shw").show();
                $(this).parent().parent().parent().hide();
                $(this).parent().parent().parent().parent().find(".edit_shbtn").show();
            })
          
        </script>
        <div class="row">
            <div class="col-md-4">
                <span class="author ">Address</span>
            </div>
            <div class="col-md-8">
                <div class="sh-edt">
                    <?php 
                  
                     if($address){ 
                        $usd_address= $address['usd_address'][0];
                        $usd_address1= $address['usd_address'][1];
                        $usd_address2= $address['usd_address'][2];
                        $usd_address3= $address['usd_address'][3];

                           echo '<span class="det_shw">'.$usd_address.', '.$usd_address1.', '. $usd_address2.', '. $usd_address3.'</span>';
                    } else{
                        $usd_address= '';
                        $usd_address1= '';
                        $usd_address2= '';
                        $usd_address3= '';
                        echo"Add Address";
                    }
                    ?>
          

                     <?php 
                        if($user_id == $_SESSION['logged_in'][0]->user_id){ ?>
                            <div class="float-right edt-bt" ><span class="text-primary pointer edit_shbtn">Edit</span></div>
                        <?php } ?>
                </div>
                <div class="lt_blok ">
                    <form id="add_address" >
                        <div class="aad_nmb">
                            <div class="row">
                                <label class="col-md-4 about_wt">Address</label>
                                <div class="col-md-8">
                                    <input type="text" name="address" value="<?= $usd_address ?>" class="form-control w-75 add_int">
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-4 about_wt">Town/City</label>
                                <div class="col-md-8">
                                    <input type="text" name="town"  value="<?= $usd_address1 ?>" class="form-control w-75 add_int">
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-4 about_wt">Zipcode</label>
                                <div class="col-md-8">
                                    <input type="text" name="zip"  value="<?= $usd_address2 ?>" class="form-control w-75 add_int">
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-4 about_wt">Neighbourhood</label>
                                <div class="col-md-8">
                                    <input type="text" name="ntbr"  value="<?= $usd_address3 ?>" class="form-control w-75 add_int">
                                </div>
                            </div>
                        </div>
                      
                        <div>
                            <select id="addressSelect" data-show-content="true" name="usd_phone_privacy" class="mySelect add_int">
                             
                                <option value="1" selected=""  data-content="<i class='fas fa-globe-asia'></i> Public"></option>
                                <option value="2" data-content="<i class='fas fa-user-friends'></i> Friends"></option>
                                <option value="3" data-content="<i class='fas fa-lock'></i> Onlyme"></option>
                            </select>
                            <button class="btn btn-primary py-1 px-2 ">Save Changes</button> <button type="button" class="can_btn btn border ml-2">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <hr>
        <script type="text/javascript">
                $(document).on("submit","#add_address",function(e){

                e.preventDefault();
                //alert('Working');
                var formData=new FormData($(this)[0]);
                $.ajax({
                    url:"<?=base_url('About/addAddress')?>",
                    type:"post",
                    cache:false,
                    contentType:false,
                    processData:false,
                    data:formData,
                    success:function(response){
                        console.log(response);
                        response=JSON.parse(response);
                        if(response.code==1){
                            swal("Good job!", "Address Added Successfully.", "success");
                             location.reload();
                        }else{
                             swal("Oop!", response.msg, "info");
                        }
                    }
                });
            });
        </script>
        <div class="row">
            <div class="col-md-4">
                <span class="author">Email</span>
            </div>
            <div class="col-md-8">
                <span>1 email address hidden from timeline</span>
            </div>
        </div>

         <h6 class="text-secondary pb-2 author mt-3 mb-0">WEBSITES AND SOCIAL LINKS</h6>
          <hr class="mt-0">
        <div class="row">
            <div class="col-md-4">
                <span class="author">Websites</span>
            </div>
            <div class="col-md-8">
                <div class="sh-edt">
                    <span class="det_shw"> https:</span>
                     <?php if($user_id == $_SESSION['logged_in'][0]->user_id){ ?>
                        <div class="float-right edt-bt" ><span class="text-primary pointer edit_shbtn">Edit</span></div>
                    <?php } ?>
                </div>
                 <div class="lt_blok ">
                    <form id="add_website">
                        <div class="aad_nmb mb-1" id="web_lst">
                            <input type="text" class="form-control add_int w-50" name="usd_website[]" required="">
                        </div>
                            <small class="text-primary pointer" id="ant_web"> + Another website</small>
                        <div>
                            <select id="websiteSelect" data-show-content="true" name="usd_website_privacy" class="mySelect add_int">
                               
                                <option value="1" selected="" data-content="<i class='fas fa-globe-asia'></i> Public"></option>
                                <option value="2" data-content="<i class='fas fa-user-friends'></i> Friends"></option>
                                <option value="3" data-content="<i class='fas fa-lock'></i> Onlyme"></option>
                            </select>
                            <button class="btn btn-primary py-1 px-2 ">Save Changes</button> <button type="button" class="can_btn btn border ml-2">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <hr>
         <script type="text/javascript">
                $(document).on("submit","#add_website",function(e){

                e.preventDefault();
                //alert('Working');
                var formData=new FormData($(this)[0]);
                $.ajax({
                    url:"<?=base_url('About/addWebsites')?>",
                    type:"post",
                    cache:false,
                    contentType:false,
                    processData:false,
                    data:formData,
                    success:function(response){
                        //console.log(response);
                        response=JSON.parse(response);
                        if(response.code==1){
                            swal("Good job!", "Website Added Successfully.", "success");
                             location.reload();
                        }else{
                             swal("Oop!", response.msg, "info");
                        }
                    }
                });
            });
        </script>

  <script>
  $(document).on('click','.total_links',function(){
    var el=$(this);
    var namer=el.attr('namer');
    var link=el.attr('link');
    var type=el.attr('typer');
    $('#link_id').val(link);
    $('#type_id').val(type);
    $('#locator_links').val(namer);
    el.hide();
    $('.shw_social_bl').show();
  })    

  $(document).on('click','.canceler_links',function(){
    $('.shw_social_bl').hide();
    $('.total_links').show();
  })

  $(document).on("submit","#update_social",function(e){

    e.preventDefault();
    //alert('Working');
    var formData=new FormData($(this)[0]);
    $.ajax({
        url:"<?=base_url('About/updateSocial')?>",
        type:"post",
        cache:false,
        contentType:false,
        processData:false,
        data:formData,
        success:function(response){
            //console.log(response);
            response=JSON.parse(response);
            if(response.status==1){
                swal("Good job!", "Links Updated Successfully.", "success");
                location.reload();
            }else{
                 swal("Oop!", response.msg, "info");
            }
        }
    });
});

  </script>
        <div class="row">
            <div class="col-md-4">
                <span class="author">Social links</span>
            </div>
                    <div class="shw_social_bl" style="display: none">
                    <form id="update_social">
                      <input type="text" name="updated_link" id="link_id" class="ml-1 add_int form-control">
                      <input type="text" name="update_type" id="type_id" class="ml-1 add_int form-control">
                      <input type="hidden" name="location" id="locator_links" value="">
                      <div class="text-right"><label class="btn p-1 btn-primary bio_btn  m-0 mr-2 ranUse canceler_links">Cancel</label><button class="mr-2 btn btn-success p-1 bio_btn ranUse">Save</button></div>
                    </form>
                  </div>
            <div class="col-md-8">
                        <ul class="m-0 list-unstyled"><?php
                          //  if($social_links['usd_social_link'][0]=="" || $social_links['usd_social_link'][0]==NULL){
                            if(!$social_links){
                                echo "<li class='about_wt'>Add Social Links</li>";
                            
                            }else{
                            $count=0;
                        for($i=0;$i<count($social_links['usd_social_link']);$i++) { 
                            
                            ?>
                            <li class="about_wt total_links" link="<?=$social_links['usd_social_link'][$i]?>" typer="<?=$social_links['usd_social_type'][$i]?>" namer="<?=$count?>"><?=$social_links['usd_social_type'][$i].":  ".$social_links['usd_social_link'][$i]?></li>
                        <?php  $count++;
                            }
                        }
                        ?>
                    </ul>
                <div class="sh-edt">
                    <span class="det_shw">Add More: </span>
                    <?php   if($user_id == $_SESSION['logged_in'][0]->user_id){ ?>
                        <div class="float-right edt-bt" ><span class="text-primary pointer edit_shbtn">Edit</span></div>
                    <?php } ?>
                </div>
                <div class="lt_blok ">
                    <form id="add_social">
                        <div class="aad_nmb mb-1" id="social_lst" > 
                            <div class="d-flex">   
                                <input type="text" class="form-control add_int w-50" name="social_links[]" required="">
                                <select class="form-control w-25 add_int" name="social_type[]" required="">
                                    <option  disabled="">Select</option>
                                    <option value="Instagram">Instagram</option>
                                    <option value="Twitter">Twitter</option>
                                </select> 
                             
                            </div>
                        </div>
                            <small class="text-primary pointer" id="ant_social"> + Add another social link</small>
                        <div>
                            <select id="socialSelect" data-show-content="true" name="usd_social_privacy" class="mySelect add_int">
                                <option value="1" selected="" data-content="<i class='fas fa-globe-asia'></i> Public"></option>
                                <option value="2" data-content="<i class='fas fa-user-friends'></i> Friends"></option>
                                <option value="3" data-content="<i class='fas fa-lock'></i> Onlyme"></option>
                            </select>
                            <button class="btn btn-primary py-1 px-2 ">Save Changes</button> <button type="button" class="can_btn btn border ml-2">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script type="text/javascript">
               $(document).on("submit","#add_social",function(e){

                    e.preventDefault();
                    //alert('Working');
                    var formData=new FormData($(this)[0]);
                    $.ajax({
                        url:"<?=base_url('About/addSocial')?>",
                        type:"post",
                        cache:false,
                        contentType:false,
                        processData:false,
                        data:formData,
                        success:function(response){
                            response=JSON.parse(response);
                            if(response.status==1){
                                swal("Good job!", "Social Links Added Successfully.", "success");
                                 location.reload();
                            }else{
                                 swal("Oop!", response.msg, "info");
                            }
                        }
                    });
                });


            $(document).on("click",".close_c",function(){
                $(this).parent().remove();
            })

              $(document).on("click","#ant_social",function(){
                var html='<div class="d-flex">'+   
                                '<input type="text" class="form-control add_int w-50" name="social_links[]">'+
                                '<select class="form-control w-25 add_int" name="social_type[]">'+
                                    '<option selected="" disabled="">Select</option>'+
                                    '<option value="Instagram">Instagram</option>'+
                                    '<option value="Twitter">Twitter</option>'+
                                '</select> '+
                                '<span class="ml-2 close_c"><i class="fas fa-times"></i></span>'+
                            '</div>';
                $("#social_lst").append(html);            
            })
                $(document).on("click","#ant_web",function(){
                var html='<input type="text" class="form-control mt-1 add_int w-50" name="usd_website[]">';
                $("#web_lst").append(html);            
            })
        </script>
        <h6 class="text-secondary pb-2 author mt-3 mb-0">WEBSITES AND SOCIAL LINKS</h6>
          <hr class="mt-0">

        <div class="row">
            <div class="col-md-5">
                <span class="author">Date of birth</span>
            </div>
            <div class="col-md-7">
                <div class="sh-edt">
      
                    <?php if($MyDetails[0]->date_of_birth){
                        echo'<span class="det_shw">'.$MyDetails[0]->date_of_birth.'</span>';
                     }else{ 
                        echo "Add Date of Birth";
                      } ?>
                        <?php   if($user_id == $_SESSION['logged_in'][0]->user_id){ ?>
                            <div class="float-right edt-bt" ><span class="text-primary pointer edit_shbtn">Edit</span></div>
                        <?php } ?>
                </div>
                <div class="lt_blok ">
                    <form id="add_dob">
                        <div class="aad_nmb mb-1" id="social_lst" > 
                            <div class="d-flex">   
                               
                                <select class="form-control w-25 add_int" required="" name="day">
                                    <option selected="" disabled="">- Day -</option>
                                    <option value="01">1</option>
                                    <option value="02">2</option>
                                    <option value="03">3</option>
                                    <option value="04">4</option>
                                    <option value="05">5</option>
                                    <option value="06">6</option>
                                    <option value="07">7</option>
                                    <option value="08">8</option>
                                    <option value="09">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>
                                </select>
                                <select class="form-control ml-2 w-25 add_int" required="" name="month">
                                    <option selected="" disabled="">- Month -</option>
                                    <option value="01">January</option>
                                    <option value="02">Febuary</option>
                                    <option value="03">March</option>
                                    <option value="04">April</option>
                                    <option value="05">May</option>
                                    <option value="06">June</option>
                                    <option value="07">July</option>
                                    <option value="08">August</option>
                                    <option value="09">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select> 
                                <select class="form-control ml-2 w-25 add_int" required=" " name="year">
                                    <option selected="" disabled="">- Year -</option>
                                    <option value="2020">2020</option>
                                    <option value="2019">2019</option>
                                    <option value="2018">2018</option>
                                    <option value="2017">2017</option>
                                    <option value="2016">2016</option>
                                    <option value="2015">2015</option>
                                    <option value="2014">2014</option>
                                    <option value="2013">2013</option>
                                    <option value="2012">2012</option>
                                    <option value="2011">2011</option>
                                    <option value="2010">2010</option>
                                    <option value="2009">2009</option>
                                    <option value="2008">2008</option>
                                    <option value="2007">2007</option>
                                    <option value="2006">2006</option>
                                    <option value="2005">2005</option>
                                    <option value="2004">2004</option>
                                    <option value="2003">2003</option>
                                    <option value="2002">2002</option>
                                    <option value="2001">2001</option>
                                    <option value="2000">2000</option>
                                    <option value="1999">1999</option>
                                    <option value="1998">1998</option>
                                    <option value="1997">1997</option>
                                    <option value="1996">1996</option>
                                    <option value="1995">1995</option>
                                    <option value="1994">1994</option>
                                    <option value="1993">1993</option>
                                    <option value="1992">1992</option>
                                    <option value="1991">1991</option>
                                    <option value="1990">1990</option>
                                    <option value="1989">1989</option>
                                    <option value="1988">1988</option>
                                    <option value="1987">1987</option>
                                    <option value="1986">1986</option>
                                    <option value="1985">1985</option>
                                    <option value="1984">1984</option>
                                    <option value="1983">1983</option>
                                    <option value="1982">1982</option>
                                    <option value="1981">1981</option>
                                    <option value="1980">1980</option>
                                    <option value="1979">1979</option>
                                    <option value="1978">1978</option>
                                    <option value="1977">1977</option>
                                    <option value="1976">1976</option>
                                    <option value="1975">1975</option>
                                    <option value="1974">1974</option>
                                    <option value="1973">1973</option>
                                    <option value="1972">1972</option>
                                    <option value="1971">1971</option>
                                </select> 
                                
                            </div>
                        </div>
                           
                        <div>
                            <select id="dobSelect" data-show-content="true" name="dob_privacy" class="mySelect add_int" title="Privacy">
                                <option value="1" selected="" data-content="<i class='fas fa-globe-asia'></i> Public"></option>
                                <option value="2" data-content="<i class='fas fa-user-friends'></i> Friends"></option>
                                <option value="3" data-content="<i class='fas fa-lock'></i> Onlyme"></option>
                            </select>
                            <button class="btn btn-primary py-1 px-2 ">Save Changes</button> <button type="button" class="can_btn btn border ml-2">Cancel</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <hr>
        <script type="text/javascript">
              $(document).on("submit","#add_dob",function(e){

                    e.preventDefault();
                    //alert('Working');
                    var formData=new FormData($(this)[0]);
                    $.ajax({
                        url:"<?=base_url('About/addDateOfBirth')?>",
                        type:"post",
                        cache:false,
                        contentType:false,
                        processData:false,
                        data:formData,
                        success:function(response){
                            console.log(response);
                            response=JSON.parse(response);
                            if(response.code==1){
                                swal("Good job!", "Date of Birth Added Successfully.", "success");
                                 location.reload();
                            }else{
                                 swal("Oop!", response.msg, "info");
                            }
                        }
                    });
                });
        </script>
        <!--   <div class="row">
            <div class="col-md-5">
                <span class="author">Year of birth</span>
            </div>
            <div class="col-md-7">
                <span>gres.com</span>
            </div>
        </div> -->
        <div class="row">
            <div class="col-md-5">
                <span class="author">Gender</span>
            </div>
            <div class="col-md-7">
                <div class="sh-edt">
                    <span class="det_shw"> <?=$MyDetails[0]->gender?></span>
                    <div class="float-right edt-bt" ><span class="text-primary pointer edit_shbtn">Edit</span></div>
                </div>
                <div class="lt_blok ">
                    <form id="add_gender">
                        <div class="aad_nmb mb-1" id="social_lst" > 
                            <div class="d-flex">   
                               
                                <select class="form-control w-25 add_int" name="gender" required="">
                                    <option class="Male">Male</option>
                                    <option class="Female">Female</option>
                                    <option class="Others">Others</option>
                                </select> 
                            
                            </div>
                        </div>
                         
                        <div><button class="btn btn-primary py-1 px-2 ">Save Changes</button> <button type="button" class="can_btn btn border ml-2">Cancel</button></div>
                    </form>
                </div>
            </div>
        </div>
        <hr>
         <script type="text/javascript">
              $(document).on("submit","#add_gender",function(e){

                    e.preventDefault();
                    //alert('Working');
                    var formData=new FormData($(this)[0]);
                    $.ajax({
                        url:"<?=base_url('About/addGender')?>",
                        type:"post",
                        cache:false,
                        contentType:false,
                        processData:false,
                        data:formData,
                        success:function(response){
                            console.log(response);
                            response=JSON.parse(response);
                            if(response.code==1){
                                swal("Good job!", "Date of Birth Added Successfully.", "success");
                                 location.reload();
                            }else{
                                 swal("Oop!", response.msg, "info");
                            }
                        }
                    });
                });
        </script>
        <div class="row">
            <div class="col-md-5">
                <span class="author">Interested in</span>
            </div>
            <div class="col-md-7">
                <div class="sh-edt">
                    <?php 

                        if($interestedIn){
                            echo '<span class="det_shw"> '.$interestedIn.'</span>';
                        }else{
                            echo"Add Interestedin";
                        }
                    ?>
                    
                     <?php   if($user_id == $_SESSION['logged_in'][0]->user_id){ ?>
                        <div class="float-right edt-bt" ><span class="text-primary pointer edit_shbtn">Edit</span></div>
                     <?php   } ?>
                </div>
                <div class="lt_blok ">
                    <form id="add_interest">
                        <div class="aad_nmb mb-1" id="social_lst" > 
                            <div class="d-flex">   
                                <label> <input type="checkbox" value="Women" class="int_check" name="interested[]"> Women</label>
                                
                                <label class="ml-2"> <input value="Men"  type="checkbox" class=""  name="interested[]"> Men</label>
                            </div>
                        </div>
                         
                        <div><button class="btn btn-primary py-1 px-2 ">Save Changes</button> <button type="button" class="can_btn btn border ml-2">Cancel</button></div>
                    </form>
                </div>
            </div>
        </div>
        <hr>
         <script type="text/javascript">
              $(document).on("submit","#add_interest",function(e){
                e.preventDefault();
                    var val = [];
                    $('.int_check').each(function(i){
                      val[i] = $(this).val();
                    });
 
            // alert(val);
                    var formData=new FormData($(this)[0]);
                    $.ajax({
                        url:"<?=base_url('About/addInterested')?>",
                        type:"post",
                        cache:false,
                        contentType:false,
                        processData:false,
                        data:formData,
                        success:function(response){
                            console.log(response);
                            response=JSON.parse(response);
                            if(response.code==1){
                                swal("Good job!", "Interested In Added Successfully.", "success");
                                location.reload();
                            }else{
                                 swal("Oop!", response.msg, "info");
                            }
                        }
                    });
                });

              
        </script>
        <div class="row">
            <div class="col-md-5">
                <span class="author">Languages</span>
            </div>
            <div class="col-md-7">
                <div class="sh-edt">
                    <?php 

                        if($languages){
                            echo '<span class="det_shw"> '.$languages.'</span>';
                        }else{
                            echo"Add Interestedin";
                        }
                    ?>
                    
                     <?php   if($user_id == $_SESSION['logged_in'][0]->user_id){ ?>
                        <div class="float-right edt-bt" ><span class="text-primary pointer edit_shbtn">Edit</span></div>
                    <?php } ?>
                </div>
                <div class="lt_blok ">
                    <form id="add_languages">
                        <div class="aad_nmb mb-1" id="social_lst" > 
                            <input type="hidden" name="languages" class="foo_data" >
                          <select class="form-control add_int foo_select selectpicker" id="foo" name="foo" name="" multiple required="">
                              <option value="Hindi" >Hindi</option>
                              <option value="English">English</option>
                            
                            </select>
                        </div>
                         
                        <div><button class="btn btn-primary py-1 px-2 ">Save Changes</button> <button type="button" class="can_btn btn border ml-2">Cancel</button></div>
                    </form>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-5">
                <span class="author">Relationship Status</span>
            </div>
                    <div class="shw_social_bl" style="display: none">
                    <form id="update_social">
                      <input type="text" name="updated_link" id="link_id" class="ml-1 add_int form-control">
                      <input type="text" name="update_type" id="type_id" class="ml-1 add_int form-control">
                      <input type="hidden" name="location" id="locator_links" value="">
                      <div class="text-right"><label class="btn p-1 btn-primary bio_btn  m-0 mr-2 ranUse canceler_links">Cancel</label><button class="mr-2 btn btn-success p-1 bio_btn ranUse">Save</button></div>
                    </form>
                  </div>
            <div class="col-md-7 sh-edt">
                  
                        
                <div class="sh-edt">
                          <?php 

                        if($relationshp){
                            echo '<span class="m-0 list-unstyled">'.$relationshp['rel_status'].'</span>';
                        }else{
                            echo'<span class="det_shw">Add Status</span>';
                        }
                    ?>
                    <?php   if($user_id == $_SESSION['logged_in'][0]->user_id){ ?>
                            <div class="float-right edt-bt" ><span class="text-primary pointer edit_shbtn">Update</span></div>
                    <?php } ?>
                </div>
                <div class="lt_blok ">
                    <form id="update_relationship">
                        <div class="aad_nmb mb-1"> 
                            <div class="d-flex">   
                                <select class="form-control w-50 add_int" name="rel_status" required="">
                                    <option value="Single">Single</option>
                                    <option value="In a relationshp">In a relationshp</option>
                                    <option value="Engaged">Engaged</option>
                                    <option value="Married">Married</option>
                                    <option value="In a civil union">In a civil union</option>
                                    <option value="In a domestic partnership">In a domestic partnership</option>
                                    <option value="In an open relationship">In an open relationship</option>
                                    <option value="It's complicated">It's complicated</option>
                                    <option value="Separated">Separated</option>
                                    <option value="Divorced">Divorced</option>
                                    <option value="Widowed">Widowed</option>
                                </select> 
                             
                            </div>
                            <button class="btn btn-primary py-1 px-2 ">Save Changes</button> <button type="button" class="can_btn btn border ml-2">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <hr>
         <script type="text/javascript">

                $(document).on("submit","#update_relationship",function(e){
                     e.preventDefault();
                    //alert('Working');
                  
                    var formData=new FormData($(this)[0]);
                  $.ajax({
                        url:"<?=base_url('About/update_relationship')?>",
                        type:"post",
                        cache:false,
                        contentType:false,
                        processData:false,
                        data:formData,
                        success:function(response){
                            //console.log(response);
                            response=JSON.parse(response);
                            if(response.status==1){
                                swal("Good job!", "Status Added Successfully.", "success");
                                location.reload();
                            }else{
                                 swal("Oop!", response.msg, "info");
                            }
                        }
                    });
                });
          
              $(document).on("submit","#add_languages",function(e){
                     e.preventDefault();
                    //alert('Working');
                  
                    var formData=new FormData($(this)[0]);
                  $.ajax({
                        url:"<?=base_url('About/addLanguages')?>",
                        type:"post",
                        cache:false,
                        contentType:false,
                        processData:false,
                        data:formData,
                        success:function(response){
                            console.log(response);
                            response=JSON.parse(response);
                            if(response.code==1){
                                swal("Good job!", "Languages Added Successfully.", "success");
                                 location.reload();
                            }else{
                                 swal("Oop!", response.msg, "info");
                            }
                        }
                    });
                });
        </script>
        <script type="text/javascript">
            $(function(){
              
                $("#foo").selectpicker();  
              
                let arr;
              
                $("#foo").on("change", function(event){
                  arr = []; 
                  $(this).find("option").each(function(){
                    if($(this).is(":selected")) {
                      let value = $(this).attr("value");
                      arr.push(value);
                    }
                  });
                 
                  $(".foo_data").val(arr);
                });
            });
        </script>
       <!--  <div class="row">
            <div class="col-md-5">
                <span class="author">Religious views</span>
            </div>
            <div class="col-md-7">
                <div class="sh-edt">
                    <span class="det_shw"> Hindi</span>
                    <div class="float-right edt-bt" ><span class="text-primary pointer edit_shbtn">Edit</span></div>
                </div>
                <div class="lt_blok ">
                    <form class="">
                        <div class="aad_nmb mb-1" id="social_lst" > 
                          <select class="form-control add_int selectpicker" id="foo" name="foo" multiple>
                              <option value="Hindi">Hindi</option>
                              <option value="English">English</option>
                            
                            </select>
                        </div>
                         
                        <div><button class="btn btn-primary py-1 px-2 ">Save Changes</button> <button type="button" class="can_btn btn border ml-2">Cancel</button></div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <span class="author">Political views</span>
            </div>
            <div class="col-md-7">
                <span>not interested</span>
            </div>
        </div> -->
       
    </div>
  </div>
</div>
    </div>
    <!-- /.col-md-8 -->
  </div>
  

<!-- /.container -->
    <script type="text/javascript">
          $('#mySelect').selectpicker();
            $('#addressSelect').selectpicker();
 $('#websiteSelect').selectpicker();
 $('#socialSelect').selectpicker();
  $('#dobSelect').selectpicker();

    </script>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
 </div>
    <!-- end center panel -->

</section>
<script type="text/javascript">
  var user_id=<?=$_SESSION['logged_in'][0]->user_id?>;
  getMyPost(user_id);
  var lastId;
  var startId;
  var initial=0;

  function getMyPost(user_id){
    console.log("Scroll On Work.");
    $.ajax({
            url:"<?=base_url()?>APIController/getAllMyPost",
             type:"post",
             data:{user_id:user_id},
            success:function(response)
            {
              console.log(response);
              response=JSON.parse(response);
              if(response.code==1){
                  console.log("Inside If Loop :" +response.data.length);
                for(let i=0; i<response.data.length; i++){
                    console.log("Inside For Loop");
                  if(response.data[i].post_id < lastId || initial==0 ){
                    initial=1;
                    console.log("Post Type: "+response.data[i].post_type);
                    if(response.data[i].post_type == 0){
                        console.log("Text Post");
                    var post='<div class="card mt-4">'+
                          '<div class="card-header">'+
                          '<a class="font-weight-bold" href="<?=base_url('Profile/')?>'+response.data[i].user_id+'"><img class="rounded-circle postProfile-pic" src="<?=base_url()?>assets/img/Profile_Pic/'+response.data[i].profile_pic+'" width="30">'+response.data[i].posted_by+'</a>'+
                          '<a class="" href="#"><img class="img-fluid float-right pt-3" src="assets/webimg/dots.png"></a>'+
                          
                          '</div>'+
                                      '<div class="card-body text-justify">'+
                                      '<p>'+response.data[i].post+'</p>'+
                                         '</div>'+
                          '<div class="total row px-2 text-right">'+
                        '</div>'+
                        '<div class="card-footer">'+
                          '<div class="row text-center">'+
                            '<div class="col-md-4 manage  py-2">'+
                              '<div class="btn-like" ><a href="javascript:void(0)" class="likePost" d-Post='+response.data[i].post_id+'><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>Like</a> <span class="font-weight-bold"> '+response.data[i].total_likes+'</span></div>'+
                            '</div>'+
                            '<div class="col-md-4 manage  py-2">'+
                              '<div class="btn-comment"><a href=""><i class="fa fa-comment-o" aria-hidden="true"></i>Comment</a> <span class="font-weight-bold">'+response.data[i].total_comments+'</span></div>'+
                            '</div>'+
                            '<div class="col-md-4 manage  py-2">'+
                              '<div class="btn-share"><a href=""><i class="fa fa-share-square-o" aria-hidden="true"></i> Share</a><span class="font-weight-bold">'+response.data[i].total_share+'</span></div>'+
                            '</div>'+
                          '</div>'+
                        '</div>'+
                      '</div>';
                  }else if(response.data[i].post_type==1){
                      console.log("Image Post");
                    var post='<div class="card mt-4">'+
                          '<div class="card-header">'+
                          '<a class="font-weight-bold" href="<?=base_url('Profile/')?>'+response.data[i].user_id+'"><img class="rounded-circle  postProfile-pic" src="<?=base_url()?>assets/img/Profile_Pic/'+response.data[i].profile_pic+'" >'+response.data[i].posted_by+'</a>'+
                          '<a class="" href="#"><img class="img-fluid float-right pt-3" src="assets/webimg/dots.png"></a>'+
                         
                          '</div>'+
                          '<div class="card-body text-center">'+
                                      '<p>'+response.data[i].post+'</p>'+
                          '<div class="post_img"><a class="" href="#"><img class="img img-fluid d-block" src="<?=base_url('assets/uploads/images/')?>'+response.data[i].post_files+'"></a>'+
                          '</div>'+
                          '</div>'+
                          '<div class="total row px-2 text-right">'+
                        '</div>'+
                        '<div class="card-footer">'+
                          '<div class="row text-center">'+
                            '<div class="col-md-4 manage  py-2">'+
                              '<div class="btn-like" ><a href="javascript:void(0)" class="likePost" d-Post='+response.data[i].post_id+'><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>Like</a> <span class="font-weight-bold"> '+response.data[i].total_likes+'</span></div>'+
                            '</div>'+
                            '<div class="col-md-4 manage  py-2">'+
                              '<div class="btn-comment"><a href=""><i class="fa fa-comment-o" aria-hidden="true"></i>Comment</a> <span class="font-weight-bold">'+response.data[i].total_comments+'</span></div>'+
                            '</div>'+
                            '<div class="col-md-4 manage  py-2">'+
                              '<div class="btn-share"><a href=""><i class="fa fa-share-square-o" aria-hidden="true"></i> Share</a><span class="font-weight-bold">'+response.data[i].total_share+'</span></div>'+
                            '</div>'+
                          '</div>'+
                        '</div>'+
                      '</div>';
                  }else{
                      console.log("Video Post");
                    var post='<div class="card mt-4">'+
                          '<div class="card-header">'+
                          '<a class="font-weight-bold" href="<?=base_url('Profile/')?>'+response.data[i].user_id+'"><img class="rounded-circle postProfile-pic" src="<?=base_url()?>assets/img/Profile_Pic/'+response.data[i].profile_pic+'" >'+response.data[i].posted_by+'</a>'+
                          '<a class="" href="#"><img class="img-fluid float-right pt-3" src="assets/webimg/dots.png"></a>'+
                          
                          '</div>'+
                          '<div class="card-body">'+
                                      '<p>'+response.data[i].post+'</p>'+
                          '<video controls class="w-100">'+
                          '<source src="<?=base_url()?>assets/uploads/videos/'+response.data[i].post_files+'" type="video/mp4">'+
                          'Your browser does not support the video tag.'+
                        '</video>'+
                        '</div> '+ 
                          '<div class="total row px-2 text-right">'+
                        '</div>'+
                        '<div class="card-footer">'+
                          '<div class="row text-center">'+
                            '<div class="col-md-4 manage  py-2">'+
                              '<div class="btn-like" ><a href="javascript:void(0)" class="likePost" d-Post='+response.data[i].post_id+'><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>Like</a> <span class="font-weight-bold"> '+response.data[i].total_likes+'</span></div>'+
                            '</div>'+
                            '<div class="col-md-4 manage  py-2">'+
                              '<div class="btn-comment"><a href=""><i class="fa fa-comment-o" aria-hidden="true"></i>Comment</a> <span class="font-weight-bold">'+response.data[i].total_comments+'</span></div>'+
                            '</div>'+
                            '<div class="col-md-4 manage  py-2">'+
                              '<div class="btn-share"><a href=""><i class="fa fa-share-square-o" aria-hidden="true"></i> Share</a><span class="font-weight-bold">'+response.data[i].total_share+'</span></div>'+
                            '</div>'+
                          '</div>'+
                        '</div>'+
                      '</div>';
                  }
                   $('#postViews').append(post);
                   lastId=response.data[i].post_id;
                  }
                  
                }
                console.log("Last Post Id: "+lastId);
              }
            }
        });
  }
  $(document).on('click','.likePost',function(){
    var post_id=$(this).attr('d-Post');
    $.ajax({
      url:"<?=base_url('APIController/likeOrdislike')?>",
      type:"post",
      data:{post_id:post_id,to_do:'like'},
      success:function(response){
        response=JSON.parse(response);
        if(response.code==1){
          swal("Good", response.msg, "success");
        }else{
          swal("Oops...!", response.msg, "warning");
        }
      }
    });
    

  });
  $(window).scroll(function () {
    var scrollValue=Math.round($(window).scrollTop());
    var screenSize=Math.round($(window).height());
    var documentSize=Math.round($(document).height());
    var windowSection=documentSize - screenSize;
    console.log(windowSection-scrollValue+" dsf ");
    if(windowSection-scrollValue<=1){
      getMyPost(user_id);
    }
   

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
<script type="text/javascript">
  $(document).on('click','.theme_',function()
  {
     var imgs=$(this).find('img').attr('src');
      //console.log(imgs);
      $('.emojionearea-editor').css('background','url('+imgs+')');
      $('.emojionearea-editor').css("min-height","9em");
      $('.emojionearea-editor').css("text-align","center");
      $('.emojionearea-editor').css("font-size","28px");
      $('.emojionearea-editor').css("background-size","cover");
      $('.emojionearea-editor').css("color","black");
      $('.emojionearea-editor').attr("id","screenshot");
  })
</script>
<script>

  $(document).ready(function() {
        $("#emojionearea1").emojioneArea({
            pickerPosition: "right",
            tonesStyle: "bullet",
            events: {
            keyup: function (editor, event) {
              countChar(this);
                console.log(editor.html());
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
  $(document).on('click','.tagfriend',function(){
   // $('.withs').css('display','flex');
   $('.withs').toggleClass ('expanded');

  });
</script>
<script>
 $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
  $(document).on('click','#aad',function(e){
    e.preventDefault();
    console.log($('#emojionearea1').val());
  });

  $(function () {
    $('.icontheme').click (function () {
        $(this).toggleClass ('expanded');
        $('.bgimgs').toggleClass ('expanded');
    });
});
  $(document).ready(function() {
        $("#emojionearea1").emojioneArea({
        
            pickerPosition: "right",
            tonesStyle: "bullet",
            events: {
                keyup: function (editor, event) {
                    console.log(editor.html());
                    console.log(this.getText());
                }
            }
        });

        $('#divOutside').click(function () {
                    $('.emojionearea-button').click()
                })        
    });
</script>
<script>
   $(document).ready(function(){
      $("#add").click(function(){
         $("#form1").toggle();
     });
 });
</script>   

<script>
   $(document).ready(function(){
      $("#cancel1").click(function(){
         $("#work").show();
         $("#form1").hide();
     });
 });
</script>

<script>
   $(document).ready(function(){
      $("#skill").click(function(){
         $("#form2").toggle();
     });
 });
</script>   

<script>
   $(document).ready(function(){
      $("#cancel2").click(function(){
         $("#skills").show();
         $("#form2").hide();
     });
 });
</script>

<script>
   $(document).ready(function(){
      $("#univ").click(function(){
         $("#form3").toggle();
     });
 });
</script>   

<script>
   $(document).ready(function(){
      $("#cancel3").click(function(){
         $("#university").show();
         $("#form3").hide();
     });
 });
</script>

<script>
   $(document).ready(function(){
      $("#high").click(function(){
         $("#form4").toggle();
     });
 });
</script>   

<script>
   $(document).ready(function(){
      $("#cancel4").click(function(){
         $("#school").show();
         $("#form4").hide();
     });
 });
</script>

<script>
   $(document).ready(function(){
      $("#chk").click(function(){
         $("#degree").show();
     });
 });
</script>   

<script>
   $(document).ready(function(){
      $("#post").click(function(){
         $("#degree").hide();
     });
 });
</script>   