<?php


/**
 * @property CI_Session $session
 * @property CI_Form_validation $form_validation
 * @property CI_DB_query_builder $db
 * @property CI_Email $email
 */

#[\AllowDynamicProperties]
class ProductManagement extends Admin_controller
{
  public function __construct(){
    parent::__construct();

  }
 
}
