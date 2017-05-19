<!DOCTYPE html>

<html <?php echo language_attributes();?> >

<head>

    <?php wp_head(); ?>
 
	<style>
		.preloader-logo{
			top: 46% !important;
		}
		.preloader-preview-area{
			top: 40% !important; 	
		}
		/*@media handheld, only screen and (max-width: 1140px) {
			#st-container .mk-header.header-style-3 .mk-header-holder {
				position: fixed !important;
			}
		}	*/	
    </style>
    
</head>

<body <?php body_class(mk_get_body_class(global_get_post_id())); ?> <?php echo get_schema_markup('body'); ?> data-adminbar="<?php echo is_admin_bar_showing() ?>">
	<div id="st-container" class="st-container">
	<?php
		// Hook when you need to add content right after body opening tag. to be used in child themes or customisations.
		do_action('theme_after_body_tag_start');
	?>

	<!-- Target for scroll anchors to achieve native browser bahaviour + possible enhancements like smooth scrolling -->
	<div id="top-of-page"></div>
		<div id="mk-boxed-layout">
			<div id="mk-theme-container" <?php echo is_header_transparent('class="trans-header"'); ?>>

				<?php mk_get_header_view('styles', 'header-'.get_header_style());