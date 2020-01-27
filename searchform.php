<?php
/**
 * Template for displaying search forms in Twenty Seventeen
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ) ?>">
    <input type="search" id="s" class="search-input" placeholder="Поиск" value="<?php echo get_search_query(); ?>" name="s" />
    <input type="submit" class="search-btn" id="searchsubmit"  value="">
</form>