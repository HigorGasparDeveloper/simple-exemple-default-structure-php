<?php
    namespace app\repositories;

    use app\database\Connection;
    use app\models\entities\Product;
    use PDO;

    class ProductRepository extends Connection{

        public function __construct()
        {
            parent::__construct();
            parent::connect();
        }
        
        public function getAll(): array {
            $list = array();
            $sql = "SELECT * FROM " . Product::NAME_TABLE;
            
            $result = $this->toExecuteCommand($sql);
            $list = $result->fetchAll(PDO::FETCH_ASSOC);

            return $list;
        }

        public function save(Product $product): bool {
            $isSuccess = true;
            $sql = "INSERT INTO " . Product::NAME_TABLE . " (product_name, product_price, recorded_datetime) VALUES (:name, :price, :datetime_rec)";
            
            $result = $this->toExecuteCommand($sql, [
                ":name" => $product->product_name, 
                ":price" => $product->product_price, 
                ":datetime_rec" => $product->recorded_datetime,
            ]);
            
            return $isSuccess;
        }
    }