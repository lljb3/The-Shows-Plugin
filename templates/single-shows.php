<?php
/*
Template Name: Single - Event Page
*/
?>

<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header' ) ); ?>

<!-- Main Information -->
<div class="container-fluid" id="main">
    <div <?php body_class('row'); ?>>
        <div class="col-md-12 page-container">

			<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/header' ) ); ?>
            <!-- Content Information -->
            <?php $attachment_id = get_post_thumbnail_id(); $bg_url = wp_get_attachment_image_src($attachment_id, 'full', false); ?>
            <div class="row <?php global $post; echo get_post($post)->post_name; ?>-main single-show-main" id="content">
                <div class="col-md-10 col-md-offset-1" id="container">
                    <div class="content-box">
                        <h3 class="has-title"><?php the_title(); ?></h3>
                        <div class="has-text">
                            <time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate>
                                <?php 
                                    $post_id = get_the_id();
                                    $date_time = get_post_meta($post_id,'event_info_date-time',true);
                                    
                                    echo date('F j, Y, g:i a',strtotime($date_time)); echo '<br />';
                                ?>
                            </time>
                            <div class="event-content">
                                <?php
                                    $post_id = get_the_id();
                                    $tickets = get_post_meta($post_id,'event_info_ticket-url',true);
                                    $location = get_post_meta($post_id,'event_info_city-state',true);
                                    
                                    echo $location; echo '<br />';
                                    if ( !empty( $tickets ) ) {
                                        echo '<a href="' . $tickets . '" target="_blank">Get Tickets</a>';
                                    }
                                ?>
                                <div class="go-back"><a href="/shows">We Gotta Go Back!</a></div>
                            <!-- end .event-content --></div>
                        <!-- end .has-text --></div>
                        <div class="event-thumbnail"><?php the_post_thumbnail( 'medium', array('class'=>"img-responsive attachment-post-thumbnail")); ?></div>
                    <!-- end .content-box --></div>
                <!-- end .col-md-8 --></div>
            <!-- end .row --></div>
            <!-- Background Information -->
            <div class="<?php global $post; echo get_post($post)->post_name; ?>-container single-show-container" id="content-bg">
                <?php if (!empty($attachment_id)) { ?>
                    <img src="<?php echo $bg_url[0]; ?>" class="background img-responsive center-block" />
                <?php } elseif (empty($attachment_id)) { ?>
                    <?php $page_id = get_post_thumbnail_id('11'); $alt_bg_url = wp_get_attachment_image_src($page_id, 'full', false); ?>
                    <img src="<?php echo $alt_bg_url[0]; ?>" class="background img-responsive center-block" />
                <?php } ?>
            <!-- end #content-bg --></div>
        <!-- end .col-md-12 --></div>
    <!-- end .body-class --></div>
<!-- end #main --></div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>