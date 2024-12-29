<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * @property CI_Session $session
 * @property CI_Form_validation $form_validation
 * @property CI_DB_query_builder $db
 * @property CI_Email $email
 */

#[\AllowDynamicProperties]

class Auth extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->library('session');
  }
  public function index()
  {
    $this->form_validation->set_rules('user_email', 'Email', 'required|trim|valid_email');
    $this->form_validation->set_rules('user_password', 'Password', 'required|trim');

    if (!$this->form_validation->run()) {
      $this->load->view('templates/auth_header', ['page_name' => 'Electro Mall Login','css_page' => "/fromthemarketplace/register.css"]);
      $this->load->view('auth/login');
      $this->load->view('templates/auth_footer');
    } else {
      $this->_login();
    }
  }

  private function _login()
  {
    $email = $this->input->post('user_email');
    $password = $this->input->post('user_password');
    $user = $this->db->get_where('tbluser', ['user_email' => $email])->row_array();
    var_dump($user['user_isactive']);

    try {
      if (!$user) {
        throw new Exception('The email has not been registered');
      }

      if ($user['user_isactive'] !== '1') {
        throw new Exception('The email should be activated first!');
      }

      if (!password_verify($password, $user['user_password'])) {
        throw new Exception("Email or password is invalid");
      }
    } catch (Exception $e) {

      $this->session->set_flashdata('message', '<script>Swal.fire({
        title: "Unfortunately 💀!",
        text: "' . $e->getMessage() . '",
        icon: "error",
        });
        </script>');
      redirect('auth/index');
    }


    if ($user && $user['user_isactive']) {
      $this->session->set_userdata('userCredentials', [
        'user_email' => $user['user_email'],
        'user_name' => $user['user_name'],
        'user_role' => $user['user_role']
      ]);
      
      $_byRole = match($user['user_role']){
        'GRNT000191079151' => 'admin', 
        'GRNT000241029151' => 'user',
        'GRNT000311889151' => 'cs',
        'GRNT000416379151' => 'verifier'
      };
      
      redirect($_byRole);
      
    }
  }

  public function registration()
  {
    $this->form_validation->set_rules('user_name', 'Username', 'required|trim|alpha_numeric_spaces|min_length[3]|max_length[50]', [
      'alpha_numeric_spaces' => "Username can only contains letters, numbers, and spaces!",
      'min_length' => "Username must be atleast 3 characters!",
      'max_length' => "Username is too long!"
    ]);
    $this->form_validation->set_rules('user_email', 'Email', 'required|trim|valid_email|is_unique[tbluser.user_email]', [
      'is_unique' => 'This email is already registered'
    ]);

    $this->form_validation->set_rules('user_password', 'Password', 'required|trim|min_length[6]|max_length[20]|matches[user_password_confirm]', [
      'matches' => "password dont match!",
      'max_length' => "Password max is 20 characters!",
      'min_length' => "password must contains atleast 6 character"
    ]);

    $this->form_validation->set_rules('user_password_confirm', 'Password', 'required|trim|matches[user_password]');


    if ($this->form_validation->run() == false) {;
      $this->load->view('templates/auth_header', ['page_name' => 'Electro Mall Registration','css_page' => "/fromthemarketplace/register.css"]);
      $this->load->view('auth/registration');
      $this->load->view('templates/auth_footer');
    } else {
      $previousDataRegistration = [
        'user_name' => htmlspecialchars($this->input->post('user_name', true)),
        'user_email' => htmlspecialchars($this->input->post('user_email', true)),
        'user_password' => password_hash($this->input->post('user_password', true), PASSWORD_DEFAULT),
      ];
      $this->session->set_userdata('previousRegistrationData', $previousDataRegistration);
      redirect('auth/completeRegistration');
    }
  }

  public function completeRegistration()
  {
    $this->form_validation->set_rules('user_phoneNumber', 'Phone Number', 'required|trim|numeric|min_length[10]|max_length[15]', [
      'max_length' => "Phone number must not exceed 15 digits!",
      'min_length' => 'Phone number must be atleast 10 digits!'
    ]);

    $this->form_validation->set_rules('user_birth', "Birth Date", "required");
    $this->form_validation->set_rules('user_address', 'address', 'required');

    if (!$this->form_validation->run()) {
      $this->load->view('templates/auth_header',['page_name' => 'Electro Mall Login','css_page' => "/fromthemarketplace/register.css"]);
      $this->load->view('auth/completeRegistration');
      $this->load->view('templates/auth_footer');
    } else {
      $previousRegistrationData = $this->session->userdata('previousRegistrationData');
      $completedRegistrationData = array_merge($previousRegistrationData, [
        'user_phoneNumber' => htmlspecialchars($this->input->post('user_phoneNumber', true)),
        'user_birth' => htmlspecialchars($this->input->post('user_birth', true)),
        'user_address' => htmlspecialchars($this->input->post('user_address', true)),
        'user_profilePic' => 'default.jpg',
        'user_role' => 'GRNT000241029151',
        'user_isactive' => 1
      ]);

      $this->db->insert('tbluser', $completedRegistrationData, true);
      $this->session->unset_userdata('previousRegistrationData');
      $this->session->set_flashdata('message', '<script>Swal.fire({
          title: "Good job!",
          text: "You clicked the button!",
          icon: "success",
        });
      </script>');

      redirect('auth/index');
    }
  }

  public function logOut()
  {
    $this->session->unset_userdata('userCredentials');
    $this->session->set_flashdata('message', '<script>Swal.fire({
      title: "Log Out ?",
      text: "You just logout",
      icon: "success",
    });
  </script>');
    redirect('auth/index');
  }
}
