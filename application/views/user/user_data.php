<section class="content-header">
      <h1>
        User data
        <small>User Pengguna</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Users</a></li>
        
      </ol>
</section>

    <!-- Main content -->
<section class="content">

     <div class="box">
     	<div class="box-header">
     		<h3 class="box-title">Data user</h3>
     		<div class="pull-right">
     			<a href="<?=site_url('user/add')?>" class="btn btn-primary btn-flat">
     				<i class="fa fa-user-plus"></i> Create
     			</a>
     		</div>


     	</div>
     	<div class="box-body table-responsive">
     		<!--<?php print_r($row->result())?>  -->

     		<table class="table table-bordered table-striped">
     			<thead>
     				<tr>
     					<th>#</th>
     					<th>Username</th>
     					<th>Name</th>
     					<th>Address</th>
     					<th>Level</th>
     					<th>Action</th>
     				</tr>
     			</thead>
     			<tbody>

     			<?php $no='1'; foreach ($row->result() as $key => $data) { ?>
     				<tr>
     					<td><?=$no++?>.</td>
     					<td><?=strtoupper($data->username)?></td>
     					<td><?=strtoupper($data->name)?></td>
     					<td><?=strtoupper($data->address)?></td>
     					<td><?=strtoupper($data->level == 1? "admin" :  "kasir")?></td>
     					<td class="text-center" width="160px">
                            <form action="<?=site_url('user/del')?>" method="post">
     						<a href="<?=site_url('user/edit/'.$data->user_id)?>" class="btn btn-primary btn-xs">
     							<i class="fa fa-pencil"></i> Edit
     						</a>
     						
     							<input type="hidden" name="user_id" value="<?=$data->user_id?>">
	     						<button onclick="return confirm('Apakah Anda Yakin')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete
	     						</button>
	     					</form>
     					</td>
     				</tr>
     			<?php } ?>
     			</tbody>

     		</table>

     	</div>
     	
     </div>

</section>