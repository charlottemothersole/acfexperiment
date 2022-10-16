<?php  
/**
 * Template Name: tags-search
 * 
 * @author         BrightMinded Ltd.
 * @copyright      2017
 * @license        Bespoke
 */
if( !defined( 'ABSPATH' ) ) { exit; }

    get_header();
    
    $all_tags = get_tags();
?>

<section id='tag'>
    <h1 id='tag-heading'>Posts By Tags</h1>
    <div id='tag-photo'>
        <div id='tag-overlay'>
            <div class='tags-list'>
                <?php 
                foreach($all_tags as $tag) {
                    $tag_name = $tag->name;
                    $tag_url = get_tag_link($tag);
                    echo "<a class='tag-link' target='_blank' href='$tag_url'><p class='single-tag'>#$tag_name</p></a>";
                }
                ?>
            </div>
        </div>
    </div>
</section>

<?php 
/* to access footer.php*/
get_footer();
?>