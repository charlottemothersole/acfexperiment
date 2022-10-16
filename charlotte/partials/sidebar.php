<?php  

if( !defined( 'ABSPATH' ) ) { exit; }

$toggle_sidebar= get_field('show_sidebar');
// $tags = get_field('tag_category');
$all_social_media=get_field('social_media', 'options');
$sidebar_links=get_field('sidebar','options');
$all_tags = get_tags();



if($toggle_sidebar){
?>    
    
<div id='sidebar' class='sidebar-active'>
    <p id='sidebar-exit' class='js-hide-on-active'>Close</p>
    <p id='sidebar-dots' class='hide'>...</p>  
    <?php
        $sidebar_logo=get_field('sidebar_logo','options');
        $logo_url=$sidebar_logo['url'];
        $logo_alt=$sidebar_logo['alt'];
    
    echo "<img class='sidebar_logo js-hide-on-active' src='$logo_url' alt='$logo_alt'/>";
    ?>  
    <ul id='sidebar-links' class='js-hide-on-active'>
        <?php
        $all_links = [];
        foreach($sidebar_links as $sidebar_link) {
            $text = $sidebar_link['sidebar_text'];
            $url=$sidebar_link['sidebar_link']['url'];  
            $all_links[]=$url;          
        }
        ?>
        <li id='latest-posts' ><a class='sidebar-link' href='<?php echo $all_links[0]; ?>'>Latest Posts</a></li>
        <li id='archived-posts'><a  class='sidebar-link' href='<?php echo $all_links[1]; ?>'>Archived Posts</a></li>
        <li id='posts-by-category' class='sidebar-list'><a  class='sidebar-link' href='<?php echo $all_links[2]; ?>'><span id='span-hover'>Posts By Category</span></a></li>
            <!-- <ul id='category-links'> -->
<?php 
            // foreach($all_tags as $tag) {               
            //     $tag_name = $tag->name;
            //     $tag_url = get_tag_link($tag);
            //     echo "<li class='sidebar-link'><a href='$tag_url'>$tag_name </a></li>";    
            // }
?>
            <!-- </ul>  -->
        <!-- </li>        -->
    </ul>
    
    <div id='sidebar-footer' class='js-hide-on-active'>

    <?php
    foreach($all_social_media as $social_media) {        
        $social_media_icon = $social_media['social_media_logo']['url'];
        $social_media_alt_text = $social_media['social_media_logo']['alt'];
        $social_media_link = $social_media['social_media_link'];
        echo "<a class='sidebar-footer-link' href='$social_media_link' target='_blank'>
            <img src='$social_media_icon' alt='$social_media_alt_text'></a>";
    }
    ?>
    </div>
</div>
    
<?php
}
?>