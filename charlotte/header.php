<!DOCTYPE html>
<html>
    <head>
        <?php
            wp_head();
        ?>
        <title><?php
            wp_title();
             ?> </title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    </head>
    <body>
        <header>            
            <nav id='navbar' class='navbar'>
                <div id='logo'>
                    <img width='400px' src='<?php echo get_template_directory_uri() ?>./logo-small.png' alt='Site logo of heart enclosed inside html close tag'/>
                </div>
                    <!-- to display nav menu -->
                <a class='toggle-nav' href='#'>&#9776</a>
                <div class='nav'>
                    <?php wp_nav_menu( array( 
                        'theme_location' => 'header-menu', 
                        'menu_class'     => 'nav-menu',
                        ) );
                    ?> 
                </div>
                <!-- </ul> -->                
            </nav>            
        </header>
        <?php 
            get_template_part('partials/contact-tab');
            
        ?>