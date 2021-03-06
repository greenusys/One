
    <!-- <div class="container mt-5">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <a href="javascript:void(0)" class="btn btn-success float-right">Create Page</a>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <style>
        .modal-backdrop{
            opacity: 0 ;
        }
        .modal_max{
        	max-width: 700px !important
        }
    </style>

	<div class="container mt-5">
		<div class="row">
			<div class="col-md-6" >
			    <div class="card bg-light border border-secondary shadow p-5">
				    <div class="row">
                        <div class="col p-2" align="center">
                            <img src="<?=base_url('assets/img/')?>page.png"  width="60%" class="rounded-circle img-fluid create-profile">
                        </div>
				        
					</div>
					<div class="row mt-4">
				        <h5 class="font-weight-bold text-center m-auto">Business or brand</h5>
						<p class="text-center mt-2">Showcase your products and services, spotlight your brand and reach more customers on Facebook.</p>
					</div>
					<div class="row mt-5">
					    <button type="button" class="btn btn-info m-auto font-weight-bold" id="started1">Create Page</button>
					</div>
				</div>
			</div>
			 <div class="col-md-6">
			    <div class="card bg-light border border-secondary shadow p-5">
				    <div class="row" >
				        <div class="col p-2" align="center">
                            <img src="<?=base_url('assets/img/')?>onlineCom.jpg" width="60%" class="rounded-circle img-fluid create-profile">
                        </div>
				        
				        
					</div>
					<div class="row mt-4">
					    <h5 class="font-weight-bold m-auto">Community or public figure</h5>
						<p class="text-center mt-2">Connect and share with people in your community, organisation, team, group or club.</p>
					</div>
					<div class="row mt-5 ">
					    <button type="button" class="btn btn-secondary m-auto font-weight-bold" id="started2">Get Started</button>
					</div>
				</div>
			</div> 
		</div>
	</div>
    <script>

        $(document).on('submit','#createPage',function(e){
            e.preventDefault();
            var formData=new FormData($(this)[0]);
            $.ajax({
                url:"<?=base_url('Test/createPage')?>",
                type:"post",
                cache:false,
                contentType:false,
                processData:false,
                data:formData,
                success:function(response){
                            console.log(response);
                            response=JSON.parse(response);
                            $('#exampleModal').modal('hide');
                            if(response.code==1){
                                
                                swal("Congratulations", "Page Created Successfully.", "success");
                                // setTimeout(location.reload(),4000);
                            }else{
                                swal("Oops..!", "Failed To Create Page.", "info");
                                // location.reload();
                            }
                        }

            });
        });
    </script>
<!-- Modal -->
<div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal_max" role="document">
	
		<div class="modal-content p-3" id="get1">
		    <div class="modal-header">
			    
				<h5 class="modal-title" id="">Business or brand</h5>
				<!-- <p>Connect with customers, grow your audience and showcase your products with a free business Page.</p> -->
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
				
		    </div>
		    <div class="modal-body">
				<div class="row">
				    <div class="col-md-12">
						<form id="createPage">
							<div class="row form-group">
								<div class="col-md-6">
									<label class="w-100">Page Name
										<input type="text" class="form-control" name="upage_name" aria-describedby="emailHelp" placeholder="Name Your Page">
									</label>
								</div>
								<div class="col-md-6">
									<label class="w-100">Category
										<select class="form-control" name="category">
		                                    <option value="0"> Select </option>
		                                    <option value="1"> Entertainment </option>
		                                    <option value="2"> Travel </option>
		                                    <option value="3"> World </option>
		                                </select>
	                                </label>
											<!-- <input type="text" class="form-control" id="category" aria-describedby="emailHelp" placeholder="Add a category to describe your page"> -->
								</div>
							</div>

							<div class="row form-group">
								<div class="col-md-6">
									<label class="w-100">Address
										<input type="text" class="form-control" name="" placeholder="Enter Address">
									</label>
								</div>

								<div class="col-md-6">	
									<label class="w-100">City, State
										<input type="text" class="form-control" name="" placeholder="Enter City, State">
									</label>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-6">
										<label >Website
											<input type="text" class="form-control" name="upage_website" placeholder="Enter Mobile">
										</label>
									</div>
								
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-6">
										<label >Mobile
											<input type="text" class="form-control" name="upage_contact" placeholder="Enter Mobile">
										</label>
									</div>
									<div class="col-md-6">
										<label >Zipcode
											<input type="text" class="form-control" name="upage_pincode" placeholder="Enter Address">
										</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-6">
										<label >Page Image
											<input type="file" class="form-control" name="upage_profilepic">
										</label>
									</div>
									<div class="col-md-6">
										<label >Page Cover Image
											<input type="file" class="form-control" name="upage_coverpic">
										</label>
									</div>
								</div>
							</div>


                            <div class="modal-footer bg-light">
                                <button type="submit" class="btn btn-primary" id="getStatrted">Create</button>
                            </div>
						</form>
					</div>
				</div>
		    </div>
		    
		</div>
		
		<!-- <div class="modal-content p-3" id="get2">
		    <div class="modal-header">
			    <div class="row">
					<h5 class="modal-title" id="exampleModalLabel">Community or public figure</h5>
					<p>Connect with people in your community and share news about what's important to you with a free Facebook Page.</p>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				</div>
		    </div>
		    <div class="modal-body">
				<div class="row">
				    <div class="col-md-12">
						<form>
							<div class="form-group">
								<div class="row">
									<div class="col-sm-3">
										<label >Page name</label>
									</div>
									<div class="col-sm-9">
										<input type="text" class="form-control" id="first_name" aria-describedby="emailHelp" placeholder="Name Your Page">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class=" col-sm-3">
										<label >Category</label>
									</div>
									<div class="col-sm-9">
										<input type="text" class="form-control" id="middle_name" aria-describedby="emailHelp" placeholder="Add a category to describe your page">
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
		    </div>
		    <div class="modal-footer bg-light">
			    <button type="button" class="btn btn-primary">Continue</button>
		    </div>
		</div> -->
    </div>
</div>
		
<script>
	$(document).on('click','#started1',function(){
		// $("#get1").show();
		// $("#get2").hide();
		$('#exampleModal').modal('show');
	});
</script>

<script>
	// $(document).on('click','#started2',function(){
	// 	$("#get2").show();
	// 	$("#get1").hide();
	// 	$('#exampleModal').modal('show');
	// });
</script>
