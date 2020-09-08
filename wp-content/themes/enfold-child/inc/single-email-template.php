
<?php 
/*
* Single Email Template
*/

// global $post;
// echo '<pre>';
// print_r( get_post_meta($post->ID) );
// echo '</pre>';
?>
<div class="entry-content-wrapper clearfix standard-content">
    <?php the_content(); ?>
</div>

<style>
    form#emailSend input[type="mail"] {
    width: 100%;
    max-width: 80%;
    padding: 10px;
    border-color: #999;
    border-width: 1px;
    float: left;
    line-height: 23px;
    margin-right: 20px;
}
</style>