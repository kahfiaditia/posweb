<?php defined('BASEPATH') OR exit ('No direct script access allowed');

class item_m extends CI_Model
{
						public function get($id = null)
						{
							$this->db->select('p_item.*,category.name as category_name, units.name as units_name ');
							$this->db->from('p_item');
							$this->db->join('category','category.category_id = p_item.category_id');
							$this->db->join('units','units.units_id = p_item.units_id');
							if($id != null)
							{
								
								$this->db->where('item_id', $id);

							}
							
							$query = $this->db->get();
							return $query;
						}

						public function add($post)
						{
							$params = [
								'barcode' => $post['barcode'],
								'name' => $post['name'],
								'category_id' => $post['category'],
								'units_id' => $post['units'],
								'price' => $post['price'],
							];

							$this->db->insert('p_item', $params);

						}

						public function edit($post)
						{
							$params = [
								'barcode' => $post['barcode'],
								'name' => $post['item_name'],
								'category_id' => $post['category'],
								'units_id' => $post['units'],
								'price' => $post['price'],
								'updated' => date('Y-m-d H:i:s')
									];
									$this->db->where('item_id', $post['id']);
									$this->db->update('item', $params);
						}

						public function del($id)
						{
							$this->db->where('item_id', $id);
							$this->db->delete('item');
						}

						
}