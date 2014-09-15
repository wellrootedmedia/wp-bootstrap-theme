<?php
include( get_stylesheet_directory() . '/inc/Classes/IndexQuery.php');

function getIndexQueryCall() {
    $getIndexQueryCall = indexPosts();

    return $getIndexQueryCall;
}

function getIndexPosts() {
    return getIndexQueryCall()->IndexQuery();
}
