<?php  
/**
 * Template Name: work
 * 
 * @author         BrightMinded Ltd.
 * @copyright      2017
 * @license        Bespoke
 */

if( !defined( 'ABSPATH' ) ) { exit; }

    get_header();
?>

<section id='projects'>
                
<div id='filler-top'>    
    <h1 id='project-header'><?php the_title() ?> </h1>
    <?php 
        $tagline = get_field('tagline'); 
    ?>  
    <h2 id='project-tagline'><?php echo $tagline ?> </h2>
    <?php the_post(); the_content(); ?>    
    
</div>
  
<svg id='project-svg-top' xmlns="http://www.w3.org/2000/svg" viewbox='0 0 100 100' height='100px' width='100%' preserveAspectRatio='none'>
    <polygon id='polygon' points='0,100 100,0 100,100' fill='rgba(77,0,17,1)'>
    </polygon>                          
</svg>
<div id='projects-container'>
    <div class='flexslider-container'>
        <div class="flexslider">
            <ul class="slides">
                <?php
                $projects = get_field('projects'); 
                foreach($projects as $project) {
                    $img_url = $project['image']['url'];
                    $description = $project['description'];
                    $target = $project['link']['target'];
                    $link = $project['link']['url'];
                    $alt_text = $project['alt_text'];
                    
                    echo "
                    <li>
                        <a class='flexslider-link' href='$link' target='$target'><img src='$img_url' alt='$alt_text'/>
                        <p class='flexslider-desc'>$description</p>                     
                        </a>
                    </li>";
                 }                
                ?>
            </ul>
        </div>   
    </div>       
</div>  
<svg id='project-svg-bottom' xmlns="http://www.w3.org/2000/svg" viewbox='0 0 100 100' height='100px' width='100%' preserveAspectRatio='none'>
    <polygon id='polygon' points='0,0 100,0 0,100' fill='rgba(77,0,17,1)'>
    </polygon>
    
</svg>  
<div id='contact-container'>
    <a class='contact-link hidden' target='_blank' href='https://github.com/charlottemothersole?tab=repositories'>
        <figure class='contact-tile'>
            <img class='icon' src='<?php echo get_template_directory_uri() ?>./github.png'/>
            <figcaption class='tile-caption'>View On Github</figcaption>
        </figure>
    </a>
    <a class='contact-link hidden contact-tile' href="">
        <div>
            <p>Contact Me!</p>
        </div>
    </a>      
</div>
             
<?php 
/* to access footer.php*/
get_footer();
?>
