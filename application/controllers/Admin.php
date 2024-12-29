<?php

/**
 * @property CI_Session $session
 * @property CI_Form_validation $form_validation
 * @property CI_DB_query_builder $db
 * @property CI_Email $email
 */

#[\AllowDynamicProperties]
class Admin extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('session');
  }

  public function index()
  {
    $user = $this->session->userdata('userCredentials');
    $user = $this->db->get_where('tbluser', ['user_role' => $user['user_role']])->row_array();
    $sidebar = $this->load->view('templates/sidebar', [], true);
    $this->load->view('templates/auth_header', [
      'page_name' => 'Admin',
      'css_page' => "/fromthemarketplace/index.css",
      'sidebar' => $sidebar,
      'js_controller_custom' => "fromthemarketplace/js/admin.js"
    ]);
    $this->load->view('admin/index',['userCredentials' => $this->session->userdata('userCredentials')]);
    $this->load->view('templates/auth_footer');
  }
}
