<?php
defined('BASEPATH') or exit('no directory script access allowed');
/**
 * @property CI_Session $session
 * @property CI_Form_validation $form_validation
 * @property CI_DB_query_builder $db
 * @property CI_Email $email
 */
#[\AllowDynamicProperties]
class User extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('ProductModel', 'productModel');
    $this->load->library('session');
  }
  public function index()
  {
    $user = $this->session->userdata('userCredentials');
    $user = $this->db->get_where('tbluser', [
      'user_name' => $user['user_name']
    ])->row_array();

    $navbar = '';

    if ($user) {
      $navbar = $this->load->view('templates/navbar', ['userCredentials' => $user], true);
    }

    $products = $this->productModel->getAllProducts();

    $this->load->view('templates/auth_header', [
      'page_name' => 'Electro Mall Home',
      'css_page' => "fromthemarketplace/client.css",
      'js_controller_custom' => "fromthemarketplace/js/home.js",
      'navbar' => $navbar
    ]);

    $this->load->view('user/home', [
      'products' => $products
    ]);
    $this->load->view('templates/auth_footer');
  }
}
