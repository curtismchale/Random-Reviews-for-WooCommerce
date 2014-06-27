<?php
/*
Plugin Name: SFN Random Reviews for WooCommerce
Plugin URI: http://sfndesign.com
Description: Randomizes the reviews for WooCommerce
Version: 1.0
Author: SFNdesign, Curtis McHale
Author URI: http://sfndesign.ca
License: GPLv2 or later
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

class SFN_Random_Comments{

	function __construct(){

		add_filter( 'comments_array', array( $this, 'randomize_comments' ), 10, 2 );

	} // construct

	/**
	 * Randomizes the reviews for a WooCommerce site
	 *
	 * @since 1.0
	 * @author SFNdesign, Curtis McHale
	 *
	 * @param array         $comments       required            The array of comments
	 * @param int           $post_id        requride            The post_id we are getting comments for
	 */
	public function randomize_comments( $comments, $post_id ){

		if ( get_post_type( $post_id ) !== 'product' ) return $comments;

		shuffle( $comments );

		return $comments;

	} // randomize_comments

} // SFN_Random_Comments

new SFN_Random_Comments();
