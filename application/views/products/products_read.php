<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Products Read</h2>
        <table class="table">
	    <tr><td>Name</td><td><?php echo $name; ?></td></tr>
	    <tr><td>Description</td><td><?php echo $description; ?></td></tr>
	    <tr><td>Price</td><td><?php echo $price; ?></td></tr>
	    <tr><td>Stock</td><td><?php echo $stock; ?></td></tr>
	    <tr><td>Point</td><td><?php echo $point; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('products') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>