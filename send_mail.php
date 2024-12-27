<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Ensure all fields are filled
    if (!empty($name) && !empty($email) && !empty($message)) {
        // Email subject
        $subject = 'Message from Food Connect Contact Form';

        // Email content
        $email_content = "Name: $name\n";
        $email_content .= "Email: $email\n\n";
        $email_content .= "Message:\n$message\n";

        // Email headers
        $headers = "From: $email\n";
        $headers .= "Reply-To: $email";

        // Send email
        $to = 'foodConnect@gmail.com';
        if (mail($to, $subject, $email_content, $headers)) {
            echo '<script>alert("Messag<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Ensure all fields are filled
    if (!empty($name) && !empty($email) && !empty($message)) {
        // Email subject and content
        $subject = 'Message from Food Connect Contact Form';
        $email_content = "Name: $name\n";
        $email_content .= "Email: $email\n\n";
        $email_content .= "Message:\n$message\n";

        // Email headers
        $headers = "From: $email\n";
        $headers .= "Reply-To: $email";

        // Send email
        $to = 'foodConnect@gmail.com';
        if (mail($to, $subject, $email_content, $headers)) {
            // Email sent successfully, now send data to external endpoint
            $endpoint = 'https://formpost.app/shanenoronha133.com'; // Replace with your actual endpoint
            $postData = array(
                'name' => $name,
                'email' => $email,
                'message' => $message
            );

            // Initialize cURL session
            $ch = curl_init($endpoint);

            // Set cURL options
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            // Execute cURL session
            $response = curl_exec($ch);
            curl_close($ch);

            // Handle response (optional)
            if ($response) {
                echo '<script>alert("Message sent successfully. We will get back to you soon."); window.location.href="contact.html";</script>';
            } else {
                echo '<script>alert("Message sent successfully, but data could not be sent to external endpoint."); window.location.href="contact.html";</script>';
            }
        } else {
            echo '<script>alert("Message could not be sent. Please try again later."); window.location.href="contact.html";</script>';
        }
    } else {
        echo '<script>alert("All fields are required."); window.location.href="contact.html";</script>';
    }
}
?>
e sent successfully. We will get back to you soon."); window.location.href="contact.html";</script>';
        } else {
            echo '<script>alert("Message could not be sent. Please try again later."); window.location.href="contact.html";</script>';
        }
    } else {
        echo '<script>alert("All fields are required."); window.location.href="contact.html";</script>';
    }
}
?>
