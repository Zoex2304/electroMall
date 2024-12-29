<?php
defined('BASEPATH') or exit('no direct script allowed');

use Restserver\Libraries\REST_Controller;

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';
class Product extends REST_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('ProductModel', 'productModel');
  }
  public function index_get()
  {
    $idParam = $this->get('id_product');

    $allPrd = $this->productModel->getAllProducts($idParam) ?? [];

    $this->response([
      'status' => !empty($allPrd) ? true : false,
      'message' => !empty($allPrd) ? 'success' : 'no data found',
      'data' => $allPrd
    ], !empty($allPrd) ? REST_Controller::HTTP_OK : REST_Controller::HTTP_NOT_FOUND);
  }

  public function index_delete()
  {
    $product_id = $this->delete('product_id');
    $affected = $this->productModel->deleteProductByid($product_id);

    $status = $affected > 0 ? true : false;
    $message = $affected > 0 ? 'deleted' : ($product_id ? 'notfound' : 'include');
    $httpStatus = $affected > 0 ? REST_Controller::HTTP_OK : ($product_id ? REST_Controller::HTTP_NO_CONTENT : REST_Controller::HTTP_BAD_GATEWAY);

    $this->response([
      'status' => $status,
      'product_id' => $product_id,
      'message' => $message,
      'http_status' => $httpStatus
    ]);
  }

  public function index_put()
  {
    $product_id = $this->put('product_id');
    $columns = $this->productModel->getColumns();
    $data = array_combine($columns, array_map(fn($key) => $this->put($key), $columns));

    $affected = $this->productModel->updateProduct($data, $product_id);

    $status = $affected > 0 ? true : false;
    $message = $affected > 0 ? 'updated' : 'id not found';
    $httpStatus = $affected > 0 ? REST_Controller::HTTP_OK : REST_Controller::HTTP_NOT_FOUND;
    $this->response([
      'status' => $status,
      'message' => $message,
    ], $httpStatus);
  }
  public function index_post()
  {
    $columns = $this->productModel->getColumns();
    $data = array_combine($columns, array_map(fn($key) => $this->post($key), $columns));

    if (empty(array_filter($data))) {
      $this->response([
        'status' => false,
        'message' => 'no data attached'
      ], REST_Controller::HTTP_BAD_GATEWAY);
      return;
    }

    $missingData = array_filter($data, fn($m) => empty($m));

    if (!empty($missingData)) {
      $this->response([
        'status' => false,
        'message' => 'incomplete data'
      ], REST_Controller::HTTP_UNPROCESSABLE_ENTITY);
      return;
    }

    $affected = $this->productModel->postProduct($data);

    if ($affected) {
      $this->response([
        'status' => true,
        'message' => 'added',
        'httpStatus' => REST_Controller::HTTP_CREATED
      ]);
    }
  }
}
