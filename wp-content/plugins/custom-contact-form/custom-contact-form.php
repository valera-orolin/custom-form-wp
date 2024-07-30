<?php
/*
Plugin Name: Custom Contact Form
Description: A custom contact form plugin to send emails and integrate with HubSpot.
Version: 1.0
Author: Valeryia Matveyeva
*/

add_shortcode('custom_contact_form', 'render_custom_contact_form');

function render_custom_contact_form() {
    ob_start();
    ?>
    <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
        <input type="hidden" name="action" value="submit_contact_form">
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" value="Valeryia" required>
        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" value="Matveyeva" required>
        <label for="subject">Subject:</label>
        <input type="text" id="subject" name="subject" value="Message Subject" required>
        <label for="message">Message:</label>
        <textarea id="message" name="message" required>This is a test message</textarea>
        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" value="valera.orolin@gmail.com" required>
        <button type="submit">Submit</button>
    </form>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const urlParams = new URLSearchParams(window.location.search);
            const status = urlParams.get('status');
            if (status === 'success') {
                alert('Email sent successfully!');
            } else if (status === 'error') {
                alert('Error: Invalid email address.');
            }
        });
    </script>
    <?php
    return ob_get_clean();
}

add_action('admin_post_nopriv_submit_contact_form', 'handle_contact_form_submission');
add_action('admin_post_submit_contact_form', 'handle_contact_form_submission');

function handle_contact_form_submission() {

    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        error_log('Error Sending Email');
        wp_redirect(add_query_arg('status', 'error', wp_get_referer()));
        exit;
    }

    $first_name = sanitize_text_field($_POST['first_name']);
    $last_name = sanitize_text_field($_POST['last_name']);
    $subject = sanitize_text_field($_POST['subject']);
    $message = wp_kses_post($_POST['message']);
    $email = sanitize_email($_POST['email']);

    $headers = array('Content-Type: text/html; charset=UTF-8');
    wp_mail($email, $subject, $message, $headers);

    error_log("Email sent to: $email\nMessage: $message\n");

    $url = 'https://api.hubapi.com/crm/v3/objects/contacts/';

    $data = array(
        'properties' => array(
            'email' => $email,
            'firstname' => $first_name,
            'lastname' => $last_name
        )
    );

    $args = array(
        'body' => json_encode($data),
        'headers' => array(
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . HUBSPOT_API_KEY
        )
    );

    $response = wp_remote_post($url, $args);

    error_log('Hubspot response: ' . print_r($response, true));

    wp_redirect(add_query_arg('status', 'success', wp_get_referer()));
    exit;
}
