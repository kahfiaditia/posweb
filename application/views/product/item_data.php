<section class="content-header">
      <h1>
        Data Item
        <small>Data Barang</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Items</a></li>
        
      </ol>
</section>

    <!-- Main content -->
<section class="content">
        <?php $this->view('messages')?>

        
     <div class="box">
     	<div class="box-header">
     		<h3 class="box-title">Produks Items</h3>
     		<div class="pull-right">
     			<a href="<?=site_url('item/add')?>" class="btn btn-primary btn-flat">
     				<i class="fa fa-user-plus"></i> Create Produk
     			</a>
     		</div>


     	</div>
     	<div class="box-body table-responsive">
     		<!--<?php print_r($row->result())?>  -->

     		<table class="table table-bordered table-striped" id="table1">
     			<thead>
     				<tr>
     					<th>#</th>
     					<th>Barcode</th>
                        <th>Nama</th>
                        <th>Price</th>
                        <th>Kategory</th>
                        <th>Units</th>
     					<th>Action</th>
     				</tr>
     			</thead>
     			<tbody>

     			<?php $no='1'; foreach ($row->result() as $key => $data) { ?>
     				<tr>
     					<td><?=$no++?>.</td>
     					<td><?=strtoupper($data->barcode)?></td>
     					<td><?=strtoupper($data->name)?></td>
     					<td><?=strtoupper($data->price)?></td>
                        <td><?=strtoupper($data->units_name)?></td>
                        <td><?=strtoupper($data->category_name)?></td>
     					<td class="text-center" width="160px">
                            
     						<a href="<?=site_url('item/edit/'.$data->item_id)?>"  class="btn btn-primary btn-xs">
     							<i class="fa fa-pencil"></i> Edit
     						</a>
     						<a href="<?=site_url('item/del/'.$data->item_id)?>" onclick="return confirm('Apakah Anda Yakin di Hapus')" class="btn btn-warning btn-xs">
     							<i class="fa fa-trash"></i> Delete
     						</a>
     							
     					</td>
     				</tr>
     			<?php } ?>
     			</tbody>

     		</table>

     	</div>
     	
     </div>

</section>