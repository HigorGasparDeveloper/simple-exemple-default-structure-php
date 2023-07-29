<?php
    namespace app\models;

    use app\models\entities\Product;
    use app\repositories\ProductRepository;

    class ProductModel {
        private ProductRepository $productRepository;
        private ResponseModel $response;


        public function __construct() {
            $this->productRepository = new ProductRepository();
            $this->response = new ResponseModel();
        }

        public function getAll(): array {
            $status = 200;
            $message = "Sucesso ao listar.";
            $data = $this->productRepository->getAll();

            if (count($data) == 0) {
                $message = "Nenhum resultado foi encontrado.";
            }
            
            $this->response->status = $status;
            $this->response->message = $message;
            $this->response->data = $data;

            return (array) $this->response;
        }
    
        public function save(Product $product) :array{
            $status = 200;
            $message = "Sucesso ao cadastrar produto.";
            $data = [];

            $wasSaved = $this->productRepository->save($product);

            if (!$wasSaved) {
                $status = 400;
                $message = "Náo foi possível salvar o produto.";
            }

            $this->response->status = $status;
            $this->response->message = $message;
            $this->response->data = $data;
            

            return (array) $this->response;
        }
    }