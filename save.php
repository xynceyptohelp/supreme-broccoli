<?php
// Check if the request is a POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize user input
    $inputText = trim($_POST["user_input"] ?? '');

    if (!empty($inputText)) {
        // Define the filename
        $file = 'saved_text.txt';

        // Format the text with a timestamp
        $formattedText = "[" . date("Y-m-d H:i:s") . "] " . $inputText . PHP_EOL;

        // Attempt to write to the file
        if (file_put_contents($file, $formattedText, FILE_APPEND | LOCK_EX)) {
            echo "<p style='color: green;'> initializing.......<br>please wait</br></p>";
        } else {
            echo "<p style='color: red;'>? Failed to save text. Please check file permissions.</p>";
        }
    } else {
        echo "<p style='color: orange;'>?? No input provided.</p>";
    }
} else {
    echo "<p style='color: red;'>? Invalid request method.</p>";
}

// Optional: link back to form
echo "<p><a href='index.html'>Go back</a></p>";
?>
