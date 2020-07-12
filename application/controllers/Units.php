<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class units extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		check_not_login();

		$this->load->model('units_m');
	}
	
	public function index() 
	{
	
	$data['row'] = $this->units_m->get();
	$this->template->load('template', 'product/units_data',$data);
	}

	public function add()
	{
		$units = new stdClass();
		$units->units_id = null;
		$units->name = null;
		$data = array(
				'page' => 'add',
				'row' => $units
		);
		$this->template->load('template','product/units_form',$data);
	}

	public function edit($id)
	{
		$query = $this->units_m->get($id);
		if($query->num_rows() > 0)
		{
			$units = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $units
			);
			$this->template->load('template','product/units_form', $data);
		} else {
			echo "<script>alert('Data Tidak ditemukan');";
			echo "window.location='".site_url('units_data')."';</script>";
		}
	}
	
	public function process(){
	$post = $this->input->post(null, TRUE);
							if(isset($_POST['add'])){
								$this->units_m->add($post);

							}else if (isset($_POST['edit'])) {
								$this->units_m->edit($post);
								} 

								if($this->db->affected_rows() > 0)
								{
									$this->session->set_flashdata('success','Data Berhasil disimpan');	
								}
									redirect('units');
									
							}

	public function del($id)
							{
								$this->units_m->del($id);
								if($this->db->affected_rows()>0)
								{
									$this->session->set_flashdata('success','Data Berhasil dihapus');
								}
									redirect('units');
								
							}
}