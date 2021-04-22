<?php


add_action( 'cmb2_admin_init', 'sp_poll_manager_meta_boxes' );
/**
 * Define the metabox and field configurations.
 */
function sp_poll_manager_meta_boxes() {

    /**
     * Initiate the metabox
     */
    $cmb = new_cmb2_box( array(
        'id'            => 'sp_poll_manager',
        'title'         => __( 'Poll Manager', 'cmb2' ),
        'object_types'  => array( 'page','post' ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
//        'show_names'    => true, // Show field names on the left
//         'cmb_styles' => false, // false to disable the CMB stylesheet
//         'closed'     => true, // Keep the metabox closed by default
    ) );

    // Check box
    $cmb->add_field( array(
        'name' => 'Enable This Poll',
        'desc' => 'Check to enable poll',
        'id'   => 'sp_poll_enable',
        'type' => 'checkbox',
    ) );

    // Regular text field
    $cmb->add_field( array(
        'name'       => __( 'Poll Title', 'cmb2' ),
        'desc'       => __( '', 'cmb2' ),
        'id'         => 'sp_poll_title',
        'type'       => 'text',
        'show_on_cb' => 'cmb2_hide_if_no_cats',
    ) );

    // Regular text field
    $cmb->add_field( array(
        'name'       => __( 'Create a Poll', 'cmb2' ),
        'desc'       => __( 'Create a poll to inform marketing strategy, get instant feedback, or predict voter behavior.', 'cmb2' ),
        'id'         => 'sp_poll',
        'type'       => 'text',
        'show_on_cb' => 'cmb2_hide_if_no_cats', // function should return a bool value
        // 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
        // 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
        // 'on_front'        => false, // Optionally designate a field to wp-admin only
         'repeatable'      => true,
    ) );

    $cmb->add_field( array(
        'name'             => 'Where Display',
        'desc'             => 'Select Option Where you want to display this Poll.',
        'id'               => 'sp_poll_display',
        'type'             => 'select',
        'default'          => 'after_post',
        'options'          => array(
            'after_post'   => __( 'After Post', 'cmb2' ),
            'before_post' => __( 'Before Post', 'cmb2' ),
            'full_content'     => __( 'Replace Content', 'cmb2' ),
        ),
    ) );



    // Add other metaboxes as needed

}