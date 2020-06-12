<tr class="row-keranjang">
	<td class="name">
		<?= $this->input->post('name') ?>
		<input type="hidden" name="name_hidden[]" value="<?= $this->input->post('name') ?>">
	</td>
	<td class="price">
		<?= $this->input->post('price') ?>
		<input type="hidden" name="price_hidden[]" value="<?= $this->input->post('price') ?>">
	</td>
	<td class="jumlah">
		<?= $this->input->post('jumlah') ?>
		<input type="hidden" name="jumlah_hidden[]" value="<?= $this->input->post('jumlah') ?>">
	</td>
	<td class="satuan">
		<?= strtoupper($this->input->post('satuan')) ?>
		<input type="hidden" name="satuan_hidden[]" value="<?= $this->input->post('satuan') ?>">
	</td>
	<td class="sub_total">
		<?= $this->input->post('sub_total') ?>
		<input type="hidden" name="sub_total_hidden[]" value="<?= $this->input->post('sub_total') ?>">
	</td>
	<td class="aksi">
		<button type="button" class="btn btn-danger btn-sm" id="tombol-hapus" data-nama-barang="<?= $this->input->post('name') ?>"><i class="fa fa-trash"></i></button>
	</td>
</tr>