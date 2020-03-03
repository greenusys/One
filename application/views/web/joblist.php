

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style type="text/css">
   .top
   {
        margin-top:100px;
  }
  .line
  {
  	border:1px solid white;
  }
  .line:hover
  {
  	border:1px solid gray;
  } 
  hr {
    margin-top: 0rem;
    margin-bottom: 0rem;
    border: 0;
    border-top: 1px solid rgba(0,0,0,.1);
}  
.icon-size
{
	width: 8%;
    text-align: center;
} 
.modal-dialog 
{
    max-width: 800px;
    margin: 1.75rem auto;
} 
.margin
{
	margin-top: -30px;
}  
.style
{
	border: 2px solid blue;
    border-radius: 22px;
    padding: 7px;
}                                  	
</style>

    <div class="container top">
    	<?php 
// 	print_r($fetchjobpost);
// die();
?>
	    <div class="row">

	<?php foreach ($fetchjobpost as $jobs) {
	//print_r($jobs);
	 ?>
	
	    	<div class="col-sm-6">
	    		<div class="card bg-white p-4 line">
	    			<a href="http://greenusys.com/" class="text-dark"><h5 class="font-weight-bold"><?= $jobs->jobpost_title?></h5></a>
	    			<h6  data-toggle="modal" data-target="#exampleModal" id="comp"><?= $jobs->jobpost_company?></h6>
	    			<a href="http://greenusys.com/" class="text-dark"><h6><?= $jobs->name?></h6></a>
	    			<h6 class="font-weight-bold mt-2">&#8377;<?= $jobs->jobpost_salary?> / <?= ucwords($jobs->jobpost_salarytype)?></h6>
	    			<div class="row mt-2">
                        <div class="col-md-7 col-7">
                        	<h6 class="text-success">Apply securely with Indeed Resume</h6>
                        </div>
                         <div class="col-md-5 col-5">
                         	<h6><i class="fa fa-clock-o" style="font-size:24px;color:red"></i>&nbsp; Urgently hiring</h6>
                        </div>
	    			</div>
	    			<hr>
	    			<div class="row mt-3">
	    				<ul>
	    					<li><?= $jobs->jobpost_description?></li>
	    				</ul>
	    			</div>	
	    			<!-- <div class="row p-2">
	    				<div class="col-md-12">
	    				    <h6 class="font-weight-bold">Desired Experience:</h6>
	    				</div>
	    				<div class="col-md-12">
		    				<ul class="d-flex list-unstyled">
		    					<li class="rounded-lg border border-info p-1 ml-2">.Net</li>
		    					<li class="rounded-lg border border-info p-1  ml-2">Java</li>
		    					<li class="rounded-lg border border-info p-1  ml-2">React Js</li>
		    					<li class="rounded-lg border border-info p-1  ml-2">Python</li>
		    					<li class="rounded-lg border border-info p-1  ml-2">Angular Js</li>
		    				</ul>
		    			</div>
	    			</div> -->
	    			<div class="row p-2 d-flex">
	    				<h6>Job Posted : 5 days ago .</h6> &nbsp; &nbsp; &nbsp; &nbsp;
	    				<h6 class="text-primary ">Save Job</h6>
	    			</div>
	    		</div>
	    	</div>
	    <?php } ?>
	   <!--      <div class="col-sm-6">
	    		<div class="card bg-white p-4 ">
	    		</div>
	    	</div> -->
	    </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" id="require" style="display:none">
      <div class="modal-header">
      	<div class="row">
      		<div class="col-md-12">
	            <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Software Developer</h5>
	        </div>
	        <div class="col-md-12">
	            <h6>Greenusys Technology - Noida , Delhi NCR</h6>
	        </div>
	        <div class="col-md-12 d-flex">
	        	<button type="submit" class="btn btn-success text-white font-weight-bold float-right w-25 p-2" data-target="#exampleModal" id="apply">Apply Now</button>
	    	    <div class="bg-light p-2 rounded icon-size ml-4"><i class="fa fa-heart"></i></div>
	        </div>
	    </div>
	   
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row p-3"> 
            <div class="col-md-12">               
        	    <h6 class="font-weight-bold"><i class="fa fa-clock-o" style="font-size:24px;color:red"></i>&nbsp; Urgently hiring</h6>
        	</div>
        	<div class="col-md-12">
        	    <h6><i class="fa fa-map-marker" style="font-size:24px;color:black"></i>&nbsp; Noida , Delhi NCR</h6>
        	</div>
        	<div class="col-md-12">               
        	    <h6 ><i class="fa fa-money" style="font-size:24px;color:black"></i>&nbsp; &#8377; 10,00,000 - &#8377; 14,00,000 a Year</h6>
        	</div>
        	<div class="col-md-12">
        	    <h6><i class="fa fa-book" style="font-size:24px;color:black"></i>&nbsp; 5+ years experience</h6>
        	</div>
        </div>
        <hr>
        <div class="row p-3">
        	<h6 class="font-weight-bold">About Us</h6>
        	<p>At Codis we have developed pioneering software solutions and services for over 25 years. Recognised across the industry and with Sage awards to our name, we are a Microsoft Silver Partner in software development and a Sage Platinum Developer.</p>
        </div>
        <div class="row p-3 margin">
        	<h6 class="font-weight-bold">Job Summary</h6>
        	<p>We are looking for a Lead .Net Software Developer to join the team. We use the leading edge of technology (such as Azure, .net core, and functional languages) to develop new and innovative solutions for multinational corporations. Existing clients include Wagamama, Fitness First, Dominos Pizza, YHA and Merlin entertainments. Our software solutions are recognised for being innovative, elegant and efficient. Join us and help shape the future of large scale financial systems, as well as having the opportunity to work with some of the largest corporations around the World.</p>
        </div>
        <div class="row">
        	<div class="col-md-12">
        	    <h6 class="font-weight-bold">Requirements</h6>
        	</div>
        	<div class="col-md-12">
	        	<ul>
	        		<li> Be a graduate from a leading University.</li>
	        		<li> Hold a BSc in a computer-science, mathematics or science related degree.</li>
	        		<li> Possess a minimum of 5 years experience in .Net software development</li>
	        		<li> Comfortable with object oriented designs and methodologies such as IoC and SRP</li>
	        		<li> Willing to research into new topics and be willing to adapt to new principles.</li>
	        		<li> A good verbal and written communicator.</li>
	        	</ul>
	        </div>
        </div>
        <div class="row">
        	<div class="col-md-12">
        	    <h6 class="font-weight-bold">Experience:</h6>
        	</div>
        	<div class="col-md-12">
	        	<ul>
	        		<li>.Net: 1 year (Preferred)</li>
	        		<li> software development: 1 year (Preferred)</li>
	        		<li> total work: 1 year (Preferred)</li>
	        		<li> Java: 1 year (Preferred)</li>
	        	</ul>
	        </div>
        </div>
        <div class="row">
        	<div class="col-md-12">
        	    <h6 class="font-weight-bold">Education:</h6>
        	</div>
        	<div class="col-md-12">
	        	<ul>
	        		<li>M.C.A (Preferred)</li>
	        		<li>B.tech , B.E</li>
	        	 		
	        	</ul>
	        </div>
        </div>
        <div class="row">
        	<div class="col-md-12">
        	    <h6 class="font-weight-bold">Industry:</h6>
        	</div>
        	<div class="col-md-12">
	        	<ul>
	        		<li>Software Development</li>
	        	</ul>
	        </div>
        </div>
      </div>

      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>


    <div class="modal-content" id="form" style="display:none">
      <div class="modal-header">
      	<div class="row">
      		<div class="col-md-12">
	            <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Software Developer</h5>
	        </div>
	        <div class="col-md-12">
	            <h6>Greenusys Technology - Noida , Delhi NCR</h6>
	        </div>
	    </div>
	   
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form>
			<div class="form-group">
				<div class="row">
					<div class="offset-1 col-sm-2">
						<label for="exampleInputEmail1" class="label-style ml-5"> Name </label>
					</div>
					<div class="col-sm-6">
						<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
					</div>
				</div>
			</div>
			
			<div class="form-group">
				<div class="row">
					<div class="offset-1 col-sm-2">
						<label for="exampleInputEmail1" class="label-style ml-5">Email</label>
					</div>
					<div class="col-sm-6">
						<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
					</div>
				</div>
			</div>
			
			<div class="form-group">
				<div class="row">
					<div class=" col-sm-3">
						<label for="exampleInputEmail1" class="label-style">Phone Number (optional)</label>
					</div>
					<div class="col-sm-6">
						<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<div class=" col-sm-3">
						<label for="exampleInputEmail1" class="label-style ml-4">Resume (optional)</label>
					</div>
					<div class="col-sm-6">
						 <input type="file" id="myfile" name="myfile" class="style">
					</div>
				</div>
			</div>
			<div class="row p-3">
				<h6>To apply with your Indeed Resume,<span class="text-primary font-weight-bold"> sign in </span>- No Resume? <span class="text-primary font-weight-bold">Create one now</span></h6>
			</div>
			<div class="row p-3">
				<h6 class="text-primary font-weight-bold"><i class="fa fa-paperclip" style="font-size:24px"></i> Attach additional documents</h6>
			</div>
			<div class="row p-3">
				<button type="button" class="btn btn-primary w-25 font-weight-bold rounded-pill">Continue</button>
				<button type="button" class="btn btn-light">Cancel</button>
			</div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
	$(document).ready(function(){
		$("#comp").click(function(){
		$("#require").show();
		$("#form").hide();
		$('#exampleModal').modal('show');
	 });
  });
</script>

<script>
	$(document).ready(function(){
		$("#apply").click(function(){
		$("#form").show();
		$("#require").hide();
		$('#exampleModal').modal('show');
	 });
  });
</script>

 </body>
</html>
