<?php
defined('BASEPATH') or exit('no directory script allowed');
/**
 * @property CI_Session $session
 * @property CI_Form_validation $form_validation
 * @property CI_DB_query_builder $db
 * @property CI_Email $email
 * @property CI_Model $model
 */
class ProductModel extends CI_Model
{
  public function getAllProducts(string $id_product = null)
  {
    $query =  $id_product ? $this->db->get_where('tblproduct', ['product_id' => $id_product]) : $this->db->get('tblproduct');
    $result = $query->result_array();
    return $result;
  }

  public function getColumns()
  {
    $columns = $this->db->query('SHOW COLUMNS FROM tblproduct');
    $columns = $columns->result_array();
    $requiredColumns = array_filter($columns,fn($column) => is_null($column['Default']) && $column['Key'] !== 'PRI');
    return array_column($requiredColumns,'Field');
  }

  public function updateProduct($data,$id){
    $this->db->update('tblproduct',$data,['product_id' => $id]);
    return $this->db->affected_rows();
  }

  public function deleteProductByid($id_product)
  {
    $this->db->delete('tblproduct', ['product_id' => $id_product]);
    return $this->db->affected_rows();
  }

  public function postProduct($data)
  {
    $this->db->insert('tblproduct', $data);
    return $this->db->affected_rows();
  }
}
