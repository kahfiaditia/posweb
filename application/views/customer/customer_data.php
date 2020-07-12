<section class="content-header">
      <h1>
        Data Customer
        <small>Customers</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Customer</a></li>
        
      </ol>
</section>

    <!-- Main content -->
<section class="content">

     <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Customers</h3>
            <div class="pull-right">
                <a href="<?=site_url('customer/add')?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-user-plus"></i> Tambah
                </a>
            </div>


        </div>
        <div class="box-body table-responsive">
            <!--<?php print_r($row->result())?>  -->

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Gender</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Created</th>
                        <th>Updated</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                <?php $no='1'; foreach ($row->result() as $key => $data) { ?>
                    <tr>
                        <td><?=$no++?>.</td>
                        <td><?=strtoupper($data->name)?></td>
                        <td><?=strtoupper($data->gender)?></td>
                        <td><?=strtoupper($data->phone)?></td>
                        <td><?=strtoupper($data->address)?></td>
                        <td><?=strtoupper($data->created)?></td>
                        <td><?=strtoupper($data->updated)?></td>
                        <td class="text-center" width="160px">
                            
                            <a href="<?=site_url('customer/edit/'.$data->customer_id)?>"  class="btn btn-primary btn-xs">
                                <i class="fa fa-pencil"></i> Edit
                            </a>
                            <a href="<?=site_url('customer/del/'.$data->customer_id)?>" onclick="return confirm('Apakah Anda Yakin di Hapus')" class="btn btn-warning btn-xs">
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