<br>
<br>
<div class="app-content content">
      <div class="content-wrapper">
       

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Basic Tables</h4>
				<a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
				<div class="heading-elements">
					<ul class="list-inline mb-0">
						<li><a data-action="collapse"><i class="ft-minus"></i></a></li>
						<li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
						<li><a data-action="expand"><i class="ft-maximize"></i></a></li>
						<li><a data-action="close"><i class="ft-x"></i></a></li>
					</ul>
				</div>
			</div>
			<div class="card-content collapse show">
				<div class="card-body">
				
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th>#</th>
									<th>Image</th>
									<th>Username</th>
									<th>Email</th>
									<th>Number</th>
								</tr>
							</thead>
							<tbody>
							    <?php
							    $i=1;
							    foreach($user as $value)
							    { ?>
							        <tr>
									<th scope="row"><?php echo $i;?></th>
									<td><img scr="<?php echo base_url()?>images/<?php echo $value['image'];?>"></td>
									<td><?php echo $value['username'];?></td>
									<td><?php echo $value['email'];?></td>
									<td><?php echo $value['number'];?></td>
									<?php $i++?>
								</tr>
							  <?php  }
							    ?>
								
							
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>