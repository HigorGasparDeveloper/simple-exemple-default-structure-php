<?php
    namespace app\models\entities;
    use DateTime;

    class Product {
        public int $id;
        public String $product_name;
        public float $product_price;
        public String $recorded_datetime;

        const NAME_TABLE = "product";
    }