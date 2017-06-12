<?php
    /**
     * Created by PhpStorm.
     * User: Shawn
     * Date: 6/10/2017
     * Time: 12:45 AM
     */

    Html::macro("postImg", function ($imgSrc = null, $parameters = "?w=800") {

        $src = Storage::url($imgSrc);
        $img = "/extras/public{$src}{$parameters}";
        return $img;

    });

    Html::component("ckeditor", "bluelines::components.ckeditor", []);

    Html::component("blueTags", "bluelines::components.post-tags", ["tags" => [], "title"]);

    Html::component("blueCategories", "bluelines::components.post-categories", ["categories" => [], "title"]);
