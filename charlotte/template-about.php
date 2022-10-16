<?php  
/**
 * Template Name: about
 * 
 * @author         BrightMinded Ltd.
 * @copyright      2017
 * @license        Bespoke
 */
if( !defined( 'ABSPATH' ) ) { exit; }

    get_header();
?>
<section id='about'>
<?php 
    $about = get_field('about');
    $section_1 = get_field('section_1');
    $section_2 = get_field('section_2');
    /*section 1 variables*/
    $s1_blurb = $section_1['blurb'];
    $s1_url = $section_1['main_image']['img']['url'];
    $s1_alt_text = $section_1['main_image']['alt_text'];
    /*section 2 variables*/
    $s2_blurb = $section_2['text_2'];
    $s2_url = $section_2['image_2']['img']['url'];
    $s2_alt_text = $section_2['image_2']['alt_text'];
?>
    <h1 id='s1_heading'><?php echo $about ?></h1>
    <div id='section_1'>
        <p id='s1_blurb'><?php echo $s1_blurb ?></p>
        <img id='s1_img' src='<?php echo $s1_url ?>' alt='<?php echo $s1_alt_text ?>'/>
    </div>
    <div id='section_2'>
        <img id='s2_img' src='<?php echo $s2_url ?>' alt='<?php echo $s2_alt_text ?>'/>
        <p id='s2_blurb'><?php echo $s2_blurb ?></p>
    </div>
</section>
<?php 
/* to access footer.php*/
get_footer();
?>