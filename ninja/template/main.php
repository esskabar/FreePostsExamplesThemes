<?php ?>
<?php
if ( is_home() ) {
	get_template_part( 'template/main', 'home' );
}
if ( is_single() ) {
	get_template_part( 'template/main', 'single' );
	get_template_part( 'template/aside', 'home' );
}
if ( is_category() ) {
	get_template_part( 'template/category' );
	get_template_part( 'template/aside', 'home' );
}
if ( is_author() ) {
	get_template_part( 'template/author' );
	get_template_part( 'template/aside', 'home' );
}
if ( is_page() ) {
	get_template_part( 'template/page' );
	get_template_part( 'template/aside', 'home' );
}
if ( is_search() ) {
	get_template_part( 'template/search' );
	get_template_part( 'template/aside', 'home' );
}
?>
