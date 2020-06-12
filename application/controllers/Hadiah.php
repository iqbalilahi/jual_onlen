<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Hadiah extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Products_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/hadiah/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/hadiah/index/';
            $config['first_url'] = base_url() . 'index.php/hadiah/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Products_model->total_rows($q);
        $products = $this->Products_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'products_data' => $products,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','hadiah/hadiah_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Products_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'name' => $row->name,
		'description' => $row->description,
		
		'stock' => $row->stock,
		'point' => $row->point,
	    );
            $this->template->load('template','hadiah/hadiah_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('hadiah'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('hadiah/create_action'),
	    'id' => set_value('id'),
	    'name' => set_value('name'),
	    'description' => set_value('description'),
	    'price' => set_value('price'),
	    'stock' => set_value('stock'),
	    'point' => set_value('point'),
	);
        $this->template->load('template','hadiah/hadiah_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'name' => $this->input->post('name',TRUE),
		'description' => $this->input->post('description',TRUE),
		'price' => $this->input->post('price',TRUE),
		'stock' => $this->input->post('stock',TRUE),
		'point' => $this->input->post('point',TRUE),
	    );

            $this->Products_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('hadiah'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Products_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('hadiah/update_action'),
		'id' => set_value('id', $row->id),
		'name' => set_value('name', $row->name),
		'description' => set_value('description', $row->description),
		'price' => set_value('price', $row->price),
		'stock' => set_value('stock', $row->stock),
		'point' => set_value('point', $row->point),
	    );
            $this->template->load('template','hadiah/hadiah_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('hadiah'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'name' => $this->input->post('name',TRUE),
		'description' => $this->input->post('description',TRUE),
		'price' => $this->input->post('price',TRUE),
		'stock' => $this->input->post('stock',TRUE),
		'point' => $this->input->post('point',TRUE),
	    );

            $this->Products_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('hadiah'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Products_model->get_by_id($id);

        if ($row) {
            $this->Products_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('hadiah'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('hadiah'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('name', 'name', 'trim|required');
	$this->form_validation->set_rules('description', 'description', 'trim|required');
	$this->form_validation->set_rules('price', 'price', 'trim|required');
	$this->form_validation->set_rules('stock', 'stock', 'trim|required');
	$this->form_validation->set_rules('point', 'point', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "hadiah.xls";
        $judul = "hadiah";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Name");
	xlsWriteLabel($tablehead, $kolomhead++, "Description");
	xlsWriteLabel($tablehead, $kolomhead++, "Price");
	xlsWriteLabel($tablehead, $kolomhead++, "Stock");
	xlsWriteLabel($tablehead, $kolomhead++, "Point");

	foreach ($this->Products_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->name);
	    xlsWriteLabel($tablebody, $kolombody++, $data->description);
	    xlsWriteNumber($tablebody, $kolombody++, $data->price);
	    xlsWriteNumber($tablebody, $kolombody++, $data->stock);
	    xlsWriteLabel($tablebody, $kolombody++, $data->point);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=hadiah.doc");

        $data = array(
            'products_data' => $this->Products_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('hadiah/hadiah_doc',$data);
    }

}

/* End of file Products.php */
/* Location: ./application/controllers/Products.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-06-11 14:21:59 */
/* http://harviacode.com */