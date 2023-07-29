<?php 
  namespace app\controllers;

  use app\models\entities\Product;
  use app\models\ProductModel;
  use DateTime;

  class ProductController {
    private Product $product;
    private ProductModel $productModel;

    public function __construct()
    {
      $this->product = new Product();
      $this->productModel = new ProductModel();
    }

    public function index(){
      echo "Exibir tela de produto";
    }

    public function getAll() {
      $listAll = $this->productModel->getAll();
      header("Content-type: application/json");
      showJson($listAll, JSON_UNESCAPED_UNICODE);
    }

    public function save() {
      $product_name = $_POST['product_name'];
      $product_price = $_POST['product_price'];
      $recorded_datetime = date('Y-m-d H:i:s');

      $this->product->product_name = $product_name;
      $this->product->product_price = $product_price;
      $this->product->recorded_datetime = $recorded_datetime;

      $saveProduct = $this->productModel->save($this->product);
      header("Content-type: application/json");
      showJson($saveProduct, JSON_UNESCAPED_UNICODE);
    }
  }
?>