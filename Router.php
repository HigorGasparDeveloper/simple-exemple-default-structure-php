<?php

    $app->get("produto","ProductController::getAll");

    $app->post("produto", "ProductController::save");
    