<?php  

if( !defined( 'ABSPATH' ) ) { exit; }

$side_tab= get_field('side_tab','options');
$toggle = get_field('side_toggle');
$url = $side_tab['tab_link'];
$text = $side_tab['tab_text'];

if($toggle){
?>    
<a id='contact-tab' 
class='contact-tab' 
href='<?php echo $url ?>' 
target='_blank'><?php echo $text ?></a>
<?php
}
?>