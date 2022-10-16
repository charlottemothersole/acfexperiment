<?php  
/**
 * Template Name: archive-search
 * 
 * @author         BrightMinded Ltd.
 * @copyright      2017
 * @license        Bespoke
 */
if( !defined( 'ABSPATH' ) ) { exit; }

    get_header();

    //defining variables
    //database query 
    $query = "SELECT YEAR(post_date) AS `year`, MONTH(post_date) AS `month`, count(ID) as posts ";
    $query.= "FROM $wpdb->posts WHERE post_type = 'post' AND post_status = 'publish' ";
    $query.= "GROUP BY YEAR(post_date), MONTH(post_date) ORDER BY post_date DESC";
    //results of query
    $results = $wpdb->get_results( $query ); // query returns results in format: [{ year, month, count }, { year, month, count }...]

    // get unique years
    //create empty array for all the years captured from query
    $post_years =[];
    //iterate over each result one object at a time
    foreach ($results as $item) {
        //identify any years in current object and push to empty array
        $post_years[]=$item->year;
    }
    //retain only unique years in array
    $unique_years =array_unique($post_years);

    //for each year, get months for the year
    //create empty array for ALL years and months per year
    $post_years_months = []; // [key] = months[], where key = year
    //iterate over years one at time
    foreach ($unique_years as $year) {
        //create empty array for CURRENT year's months
        $months = [];
        
        // iterate over each query result one at time
        foreach ($results as $result) {
            //if result year matches our current year...
            if ($result->year == $year) {
                //then push result(inc year, month and post count)to empty array
                $months[] = $result;                
            }
        }

        // push current year and all associated months to empty array
        $post_years_months[$year] = $months;
    }

    
    

    $month_as_string = [
        1   =>  'January',
        2   =>  'February',
        3   =>  'March',
        4   =>  'April',
        5   =>  'May',
        6   =>  'June',
        7   =>  'July',
        8   =>  'August',
        9   =>  'September',
        10  =>  'October',
        11  =>  'November',
        12  =>  'December'
    ];
?>

<section id='archive'>
    <h1 id='archive-heading'>Older Posts</h1>
    <div id='archive-photo'>
        <div id='archive-overlay'>
            <?php foreach($unique_years as $year) {
                echo "<div class='archive-dates'>";
                echo "<p class='archive-year'>$year</p>";
                echo "<div class='archive-months'>";
                
                $months = $post_years_months[$year];
                foreach($months as $month) {                    
                    $month_number = $month->month;
                    $month_name = $month_as_string[$month_number];
                    $month_link = get_month_link($year, $month->month);
                    $month_post_count = $month->posts;
                    echo "<a class='archive-link' target='_blank' href='$month_link'><p class='archive-month'>$month_name($month_post_count)</p></a>";
                }
                
                echo "</div>";
                echo "</div>";
            }
            ?>
        </div>
    </div>
</section>

<?php 
/* to access footer.php*/
get_footer();
?>