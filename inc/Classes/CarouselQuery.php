<?php

class CarouselQuery {

    public function CarouselQuery() {
        $carousels = query_posts( array(
            'cat' => 2,
            'posts_per_page' => 3,
            'orderby' => 'date',
            'order' => 'DESC'
        ) );

        return $carousels;
    }

}


function carouselPosts() {
    $obj = new CarouselQuery();
    return $obj;
}