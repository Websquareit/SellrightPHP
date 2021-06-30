<br>
<br>
<div class="app-content content">
      <div class="content-wrapper">
       
	<div class="col-xl-6 col-md-12">
			<div class="card">
				<div class="card-content">
					<div class="card-body">
						<h1 class="card-title">Profile Update Form</h1>
						<!--<h6 class="card-subtitle text-muted">Support card subtitle</h6>-->
					</div>
					<div class="card-body">
					     <form class="form" method="post" action="<?php echo base_url()?>index.php/welcome/update_profile" enctype="multipart/form-data">
					    <?php
					    foreach($header as $value)
					    {
					        ?>
					       
							<div class="form-body">
								<div class="form-group">
									<label for="donationinput1" class="sr-only">User Name</label>
									<input type="text" id="donationinput1" class="form-control" placeholder="User Name" name="username" value="<?php echo $value['username'];?>">
									<input type="hidden" name="id" value="<?php echo $value['uid'];?>">
								</div>
								
								<div class="form-group">
									<label for="donationinput3" class="sr-only">E-mail</label>
									<input type="email" id="donationinput3" class="form-control" placeholder="E-mail" name="email" value="<?php echo $value['email'];?>">
								</div>
                                
                                <div class="form-group">
									<label for="donationinput3" class="sr-only">Password</label>
									<input type="password" id="donationinput3" class="form-control" placeholder="Password" name="password" value="<?php echo $value['password'];?>">
								</div>
                                
								<div class="form-group">
									<label for="donationinput4" class="sr-only">Contact Number</label>
									<input type="text" id="donationinput4" class="form-control" placeholder="Phone Number" name="number" value="<?php echo $value['number'];?>">
								</div>
								<div class="form-group">
									<label for="donationinput7" class="sr-only">Image</label>
									<img src="<?php echo base_url('images/'.$value['image'])?>">
									<input type="file" name="pimage"  rows="5" class="form-control square" placeholder="Image">
									<input type="hidden" name="img" value="<?php echo $value['image']; ?>">
								</div>

							</div>
							<div class="form-actions center">
								<button type="submit" class="btn btn-outline-primary">Send</button>
							</div>
					
					 <?php   }
					    ?>
							</form>
					</div>
				</div>
			</div>
		</div>