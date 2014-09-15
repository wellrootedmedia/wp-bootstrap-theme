<?php
include( get_stylesheet_directory() . '/inc/Classes/CarouselQuery.php');

function getCarouselQueryCall() {
    $getCarouselQueryCall = carouselPosts();

    return $getCarouselQueryCall;
}

function getCarouselPosts() {
    return getCarouselQueryCall()->CarouselQuery();
}
