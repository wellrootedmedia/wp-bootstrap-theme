<?php

class IndexQuery {

    public function IndexQuery() {
        $indexes = query_posts( array(
            'posts_per_page' => -1,
            'cat' => '-2',
            'orderby' => 'date',
            'order' => 'DESC'
        ) );

        return $indexes;
    }

}


function indexPosts() {
    $obj = new IndexQuery();
    return $obj;
}