<?php

defined('BASEPATH') or exit('no direct script allowed');
/**
 * @property CI_Session $session
 * @property CI_Form_validation $form_validation
 * @property CI_DB_query_builder $db
 * @property CI_Email $email
 */

#[\AllowDynamicProperties]
class Admin_controller extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('session');
  }

  protected function loadSidebar()
  {
    return $this->load->view('templates/sidebar', [], true);
  }

  protected function loadTemplate(string $view, array|string $data = [])
  {
    $data['sidebar'] = $this->loadSidebar();
    $this->load->view('templates/auth_header', $data);
    $this->load->view($view, $data);
    $this->load->view('templates/auth_footer');
  }
}
