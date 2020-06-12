<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA PRODUCTS</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Name <?php echo form_error('name') ?></td><td><input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" /></td></tr>
	    
        <tr><td width='200'>Description <?php echo form_error('description') ?></td><td> <textarea class="form-control" rows="3" name="description" id="description" placeholder="Description"><?php echo $description; ?></textarea></td></tr>
	    <tr><td width='200'>Price <?php echo form_error('price') ?></td><td><input type="text" class="form-control" name="price" id="price" placeholder="Price" value="<?php echo $price; ?>" /></td></tr>
	    <tr><td width='200'>Stock <?php echo form_error('stock') ?></td><td><input type="text" class="form-control" name="stock" id="stock" placeholder="Stock" value="<?php echo $stock; ?>" /></td></tr>
	    <tr><td width='200'>Point <?php echo form_error('point') ?></td><td><input type="text" class="form-control" name="point" id="point" placeholder="Point" value="<?php echo $point; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('products') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>