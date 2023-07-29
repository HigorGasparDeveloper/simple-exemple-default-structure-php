<?php
    namespace app\models;

    final class ResponseModel {
        public int $status;
        public String $message;
        public array $data;
    }