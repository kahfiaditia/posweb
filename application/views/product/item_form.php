<section class="content-header">
      <h1>
        Tambah Item Barang
        <small>Data Barang</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Tambah Barang</a></li>
        
      </ol>
</section>

    <!-- Main content -->
<section class="content">

     <div class="box">
        <div class="box-header">
            <h3 class="box-title">Form Data Barang</h3>
            <div class="pull-right">
                <a href="<?=site_url('item')?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i> Back
                </a>
            </div>


        </div>
        <div class="box-body">
            
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="<?=site_url("item/process")?>" method="post">
                        <div class="form-group">
                            <label> Barcode * </label>
                            <input type="hidden" name="id" value="<?=$row->item_id?>" class="form-control">
                            <input type="text" name="barcode" value="<?=$row->barcode?>" class="form-control" required>
                            
                        </div>
                        <div class="form-group">
                            <label for="name"> Name * </label>
                            <input type="text" name="name" id="name" value="<?=$row->name?>" class="form-control" required>
                            
                        </div>
                        <div class="form-group">
                            <label> Price * </label>
                            <input type="number" name="price" value="<?=$row->price?>" class="form-control" required>
                            
                        </div>
                        <div class="form-group">
                            <label> Kategori * </label>
                            <select name="category" class="form-control">
                                <option value="">-- Pilih --</option>
                                <?php foreach ($category->result() as $key => $data) { ?>
                                    <option value="<?=$data->category_id?>" <?=$data->category_id == $row->category_id ? "selected" : null?>><?=$data->name?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label> Units * </label>
                            <?php echo form_dropdown('units', $units, $selectedunits,
                            ['class'=>'form-control','required' =>'required']);?>
                        </div>
                        
                        <div class="form-group">
                                <button type="submit" name="<?=$page?>" class="btn btn-success btn-flat">
                                <i class="fa fa-paper-plane"></i> Save
                                </button>
                                <button type="reset" class="btn btn-flat">Reset</button>
                        </div>  
                    </form>

                </div>
            </div>

        </div>
        
     </div>

</section>