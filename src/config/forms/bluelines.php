<?php
    /**
     * Created by PhpStorm.
     * User: Shawn
     * Date: 6/7/2017
     * Time: 5:57 PM
     */

    return [
        "field_types" => ["featured_image" => "file", "featured" => "select", "status" => "select"],
        "labels" => ["featured_image" => "Select and Upload Feature Image (jpeg, png, bmp, gif) ", "title" => "The title of your post", "excerpt" => "Brief Summary"],
        "options" => ["status" => ["DRAFT" => "DRAFT", "PENDING_REVIEW" => "PENDING REVIEW", "PUBLISHED" => "PUBLISH", "ARCHIVED" => "ARCHIVED"]]
    ];
