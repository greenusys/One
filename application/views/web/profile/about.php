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
<div class="col-md-9">
<?php
    $myAccount=0;
    if($user_id == $_SESSION['logged_in'][0]->user_id){
        $myAccount=1;
    }
?>
    <div class="border border-2 mt-4 bg-white rounded p-2">
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