<?php 
defined('BASEPATH') or exit('no directory script allowed');
/**
 * @property CI_Session $session
 * @property CI_Form_validation $form_validation
 * @property CI_DB_query_builder $db
 * @property CI_Email $email
 * @property CI_Model $model
 */
class ProductModel extends CI_Model{
  public function getAllProducts(){
    $query = $this->db->get('tblproduct');
    $result = $query->result_array();
    return $result;
  }
}