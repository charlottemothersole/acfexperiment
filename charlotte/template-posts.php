<?php  
/**
 * Template Name: posts
 * 
 * @author         BrightMinded Ltd.
 * @copyright      2017
 * @license        Bespoke
 */
if( !defined( 'ABSPATH' ) ) { exit; }

    get_header();

    //defining variables
    $all_posts = get_posts();
?>

<section id='posts'>    
    <div id='posts-container'>
        <?php foreach($all_posts as $single_post) {
            $all_tags = get_the_tags($single_post);  
        ?>
            <a class='post-link' href='<?php echo get_permalink($single_post); ?>'>
                <div class='post-preview'>
                    <h1 class='post-header'> <?php echo get_the_title($single_post); ?> </h1>
                    <div class='tag-list'>
            <?php 
             if($all_tags) {
                foreach($all_tags as $tag) {
                    $tag_name= $tag->name;
                    echo "<div class='tag-item'>$tag_name</div>";
                }
             }
            ?> 
                    </div>
                    <div class='post-content module'> 
                        <div id='thumbnail-container'> <?php  echo get_the_post_thumbnail($single_post); ?> </div> 
                        <p id='excerpt'><?php echo get_the_excerpt($single_post); ?></p>
                    </div> 
                    
                </div>        
            </a> 
        <?php
        }
        ?>        
    </div>
    
    <div id='sidebar-container'>
    <?php get_template_part('partials/sidebar'); ?>
    </div>
</section>

<?php 

/* to access footer.php*/
get_footer();
?>