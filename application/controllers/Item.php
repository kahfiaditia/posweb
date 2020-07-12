<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Item extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		check_not_login();

		$this->load->model(['item_m','category_m','units_m']);
	}
	
	public function index() 
	{
	
	$data['row'] = $this->item_m->get();
	$this->template->load('template', 'product/item_data',$data);
	}

	public function add()
	{
		$item = new stdClass();
		$item->item_id = null;
		$item->barcode = null;
		$item->name = null;
		$item->price = null;
		$item->category_id = null;

		$query_category = $this->category_m->get();
		$query_units = $this->units_m->get();
		$units[null] = '- Pilih -';
		foreach ($query_units->result() as $unt) {
			$units[$unt->units_id] = $unt->name;
		}

		$data = array(
				'page' => 'add',
				'row' => $item,
				'category' =>$query_category,
				'units' =>$units, 'selectedunits' =>null,
				
		);
		$this->template->load('template','product/item_form',$data);
	}

	public function edit($id)
	{
		$query = $this->item_m->get($id);
		if($query->num_rows() > 0)
		{
			$item = $query->row();
			$query_category = $this->category_m->get();
			$query_units = $this->units_m->get();
			$units[null] = '- Pilih -';
			foreach ($query_units->result() as $unt) {
				$units[$unt->units_id] = $unt->name;
		}

		$data = array(
				'page' => 'edit',
				'row' => $item,
				'category' => $query_category,
				'units' => $units, 'selectedunits' =>$item->units_id,
				
		);
		$this->template->load('template','product/item_form',$data);
			
		} else {
			echo "<script>alert('Data Tidak ditemukan');";
			echo "window.location='".site_url('item_data')."';</script>";
		}
	}
	
	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add']))
		{
			$this->item_m->add($post);
		} else if (isset($_POST['edit']))
		{
			$this->item_m->edit($post);
		}
		
			if($this->db->affected_rows() > 0)
		{
			$this->session->set_flashdata('success','Data Berhasil disimpan');	
		}
			redirect('item');
	}

	public function del($id)
	{
		$this->item_m->del($id);
		if($this->db->affected_rows()>0){
			$this->session->set_flashdata('success','Data Berhasil dihapus');
		}
			redirect('item');
		
	}

									

}