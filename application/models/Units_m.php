<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Units_m extends CI_Model
{
	public function get($id = null)
	{
		$this->db->from('units');
		if($id != null)
		{
			$this->db->where('units_id', $id);
		}

		$query = $this->db->get();
		return $query;
	}

	public function add($post)
	{
		$params = [
			'name' => $post['units_name'],
		];
		$this->db->insert('units', $params);
	}

	public function edit($post)
	{
		$params = [
			'name' => $post['units_name'],
		];
		$this->db->where('units_id', $post['id']);
		$this->db->update('units', $params);
	}

	public function del($id)
	{
		$this->db->where('units_id', $id);
		$this->db->delete('units');
	}
}