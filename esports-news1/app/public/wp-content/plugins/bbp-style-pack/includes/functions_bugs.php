<?php

//functions for bugs

//*******************************8remove reply.js and enquque our own
//https://bbpress.trac.wordpress.org/ticket/3327

global $bsp_style_settings_bugs ;

if ( !empty ($bsp_style_settings_bugs['activate_threaded_replies'])) {
add_action( 'wp_print_scripts', 'bsp_dequeue_reply', 100 );
add_action( 'wp_print_scripts', 'bsp_enqueue_reply_script', 101 );
}
	
function bsp_dequeue_reply() {
    wp_dequeue_script( 'bbpress-reply' );
}

function bsp_enqueue_reply_script () {
wp_enqueue_script( 'bsp-replyjs', plugins_url('js/bspreply.js',dirname( __FILE__ )), array( 'jquery' ));
}


//************************8Fix bbp last active time for sub forums

//dont run if they have bbp-last-active-time plugin enabled
if ( !empty ($bsp_style_settings_bugs['activate_last_active_time']) && !function_exists ('rew_run_walker_again')) {
add_action ('bbp_new_reply_post_extras' , 'bsp_run_walker_again' ) ;
}

function bsp_run_walker_again ($reply_id) {
	$reply_id = bbp_get_reply_id( $reply_id );
	$topic_id = bbp_get_reply_topic_id( $reply_id );
	$forum_id = bbp_get_reply_forum_id( $reply_id );
	$last_active_time = get_post_field( 'post_date', $reply_id );
	$ancestors = array_values( array_unique( array_merge( array( $topic_id, $forum_id ), (array) get_post_ancestors( $topic_id ) ) ) );
	bsp_update_reply_walker( $reply_id, $last_active_time, $forum_id, $topic_id, false );
}



function bsp_update_reply_walker( $reply_id, $last_active_time = '', $forum_id = 0, $topic_id = 0, $refresh = true ) {

	// Verify the reply ID
	$reply_id = bbp_get_reply_id( $reply_id );

	// Reply was passed
	if ( ! empty( $reply_id ) ) {

		// Get the topic ID if none was passed
		if ( empty( $topic_id ) ) {
			$topic_id = bbp_get_reply_topic_id( $reply_id );
		}

		// Get the forum ID if none was passed
		if ( empty( $forum_id ) ) {
			$forum_id = bbp_get_reply_forum_id( $reply_id );
		}
	}

	// Set the active_id based on topic_id/reply_id
	$active_id = empty( $reply_id ) ? $topic_id : $reply_id;

	// Setup ancestors array to walk up
	$ancestors = array_values( array_unique( array_merge( array( $topic_id, $forum_id ), (array) get_post_ancestors( $topic_id ) ) ) );

	// If we want a full refresh, unset any of the possibly passed variables
	if ( true === $refresh ) {
		$forum_id = $topic_id = $reply_id = $active_id = $last_active_time = 0;
	}

	// Walk up ancestors
	if ( ! empty( $ancestors ) ) {
		foreach ( $ancestors as $ancestor ) {

			// Reply meta relating to most recent reply
			if ( bbp_is_reply( $ancestor ) ) {
				// @todo - hierarchical replies

			// Topic meta relating to most recent reply
			} elseif ( bbp_is_topic( $ancestor ) ) {

				// Last reply and active ID's
				bbp_update_topic_last_reply_id ( $ancestor, $reply_id  );
				bbp_update_topic_last_active_id( $ancestor, $active_id );

				// Get the last active time if none was passed
				$topic_last_active_time = $last_active_time;
				if ( empty( $last_active_time ) ) {
					$topic_last_active_time = get_post_field( 'post_date', bbp_get_topic_last_active_id( $ancestor ) );
				}

				// Update the topic last active time regardless of reply status.
				// See https://bbpress.trac.wordpress.org/ticket/2838
				bbp_update_topic_last_active_time( $ancestor, $topic_last_active_time );

				// Only update reply count if we're deleting a reply, or in the dashboard.
				if ( in_array( current_filter(), array( 'bbp_deleted_reply', 'save_post' ), true ) ) {
					bbp_update_topic_reply_count(        $ancestor );
					bbp_update_topic_reply_count_hidden( $ancestor );
					bbp_update_topic_voice_count(        $ancestor );
				}

			// Forum meta relating to most recent topic
			} elseif ( bbp_is_forum( $ancestor ) ) {

				// Last topic and reply ID's
				bbp_update_forum_last_topic_id( $ancestor, $topic_id );
				bbp_update_forum_last_reply_id( $ancestor, $reply_id );

				// Last Active
				bbp_update_forum_last_active_id( $ancestor, $active_id );

				// Get the last active time if none was passed
				$forum_last_active_time = $last_active_time;
				if ( empty( $last_active_time ) ) {
					$forum_last_active_time = get_post_field( 'post_date', bbp_get_forum_last_active_id( $ancestor ) );
				}

				// Only update if reply is published
				if ( bbp_is_reply_published( $reply_id ) ) {
					bbp_update_forum_last_active_time( $ancestor, $forum_last_active_time );
				}

				// Counts
				// Only update reply count if we're deleting a reply, or in the dashboard.
				if ( in_array( current_filter(), array( 'bbp_deleted_reply', 'save_post' ), true ) ) {
					bbp_update_forum_reply_count( $ancestor );
				}
			}
		}
	}
}

//*****************8fix split topic if actions are registered by other plugins (such as theme my login)
//https://bbpress.trac.wordpress.org/ticket/3365


if ( !empty ($bsp_style_settings_bugs['variable_mismatch'])) {
add_filter ('bbp_get_topic_split_link', 'bsp_get_topic_split_link' , 10 , 3) ;
add_filter ('bbp_is_topic_split' , 'bsp_is_topic_split' ) ;
}

function bsp_get_topic_split_link( $retval, $r, $args ) {

                // Parse arguments against default values
                $r = bbp_parse_args( $args, array(
                        'id'          => 0,
                        'link_before' => '',
                        'link_after'  => '',
                        'split_text'  => esc_html__( 'Split',                           'bbpress' ),
                        'split_title' => esc_attr__( 'Split the topic from this reply', 'bbpress' )
                ), 'get_topic_split_link' );

                // Get IDs
                $reply_id = bbp_get_reply_id( $r['id'] );
                $topic_id = bbp_get_reply_topic_id( $reply_id );

                // Bail if no reply/topic ID, or user cannot moderate
                if ( empty( $reply_id ) || empty( $topic_id ) || ! current_user_can( 'moderate', $topic_id ) ) {
                        return;
                }

                $uri = add_query_arg( array(
                        'action'   => 'bbp-split-topic',
                        'reply_id' => $reply_id
                ), bbp_get_topic_edit_url( $topic_id ) );

                $retval = $r['link_before'] . '<a href="' . esc_url( $uri ) . '" title="' . $r['split_title'] . '" class="bbp-topic-split-link">' . $r['split_text'] . '</a>' . $r['link_after'];

                // Filter & return
                return apply_filters( 'bsp_get_topic_split_link', $retval, $r, $args );
        }


function bsp_is_topic_split() {

        // Assume false
        $retval = false;

        // Check topic edit and GET params
        if ( bbp_is_topic_edit() && ! empty( $_GET['action'] ) && ( 'bbp-split-topic' === $_GET['action'] ) ) {
                $retval = true;
        }

        // Filter & return
        return (bool) apply_filters( 'bsp_is_topic_split', $retval );
}


