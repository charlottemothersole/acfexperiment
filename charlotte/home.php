<?php   
if( !defined( 'ABSPATH' ) ) { exit; }

/**
 * Template Name: home
 * 
 * @author         BrightMinded Ltd.
 * @copyright      2017
 * @license        Bespoke
 */

    get_header();
?>
<main>
    <section id='welcome-section'>
        <div id='welcome-overlay'>
            <?php 
            $home_heading = get_field('home-heading');
            $home_tagline = get_field('home-tagline');
            ?>
        <h1 class='hidden-home'><?php echo $home_heading ?> </h1>
        <h2 class='hidden-home'><?php echo $home_tagline ?> </h2>        
        </div>
    </section>
    <section id='contact'>
    <?php 
        $contact_heading = get_field('contact_heading');
        $name_field_placeholder = get_field('name_field_placeholder');
        $email_field_placeholder = get_field('email_field_placeholder');
        $message_field_placeholder = get_field('message_field_placeholder');
        $name_field_toggle = get_field('name_field_toggle');
        $form_row = get_field('form_row');
    ?>
        <h1 id='contact-header'><?php echo $contact_heading ?></h1>
        <!--action to be changed to link to php file if not hosted on github pages (currently using formspree as g/pages allows static pages only so not php!-->
        <form id='contact-form' action='http://formspree.io/charlottemothersole@gmail.com' method='POST'>

        <?php 
        //loop to add new selected html element + label element
        foreach($form_row as $form) {
            $element = $form['element'];
            $name = $form['element_name'];
            $required = $form['required'];
            $placeholder = $form['placeholder'];

            //inserting label html element
            echo "<label for='$name'></label>"; 

            //creating variable to test whether 'required' field is selected on wp. Needs empty string initially as can't assign variable to if statement
            $required_text='';
            if($required =='1') {
                $required_text='required';
            }

            //testing whether selected wp element is input or textarea then creating attributes based on that
            if($element =='input') {
                $type = $form['element_type'];
                echo "<input type='$type' name='$name' $required_text placeholder='$placeholder'>";
            } elseif ($element=='textarea'){
                echo "<textarea name='$name' rows='15' id='$name' form='contact-form' $required_text placeholder='$placeholder'></textarea>";
            }     
        }    
        ?>
            <!-- <label for='name'></label>
            <input type="text" name='name' id='name' required placeholder='<?php echo $name_field_placeholder ?>' class='<?php if($name_field_toggle!='1'){echo 'displaynone';} ?>'>
            <label for='email'></label>
            <input type='email' name='email' id='email' required  placeholder='<?php echo $email_field_placeholder ?>'>
            <label for='message'></label>
            <textarea name='message' rows='15' id='message' form='contact-form' required placeholder='<?php echo $message_field_placeholder ?>'></textarea>
            <div id='datestamp'>
                <label for='date'></label>
                <input type='date' name='date' id='date' readonly>
                <input type='time' name='time' id='time' readonly>
                <label for='submit'></label>                            
            </div> -->
            <input type='submit' name='submit' id='submit'>
        </form>
        
    </section>
    <?php 
/* to access footer.php*/
get_footer();
?>
