<?php

defined('BASEPATH') or exit('no direct script access allowed');
/**
 * @property CI_Session $session
 * @property CI_Form_validation $form_validation
 * @property CI_DB_query_builder $db
 * @property CI_Email $email
 */
#[\AllowDynamicProperties]

class UserModel extends CI_Model
{
  public function getAllUser()
  {
    $query = $this->db->get('tbluser');
    return $query->result();
  }
}
