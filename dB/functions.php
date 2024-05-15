<?php
// Function to clean input data
function clean_input($data)
{
    // Remove whitespace from the beginning and end of the string
    $data = trim($data);
    
    // Remove backslashes
    $data = stripslashes($data);
    
    // Convert special characters to HTML entities to prevent XSS attacks
    $data = htmlspecialchars($data);
    
    // Return the cleaned data
    return $data;
}

// Function to format a name by capitalizing the first letter of each word
function fix_name($data)
{
    // Convert the string to lowercase
    $data = strtolower($data);
    
    // Capitalize the first letter of each word
    $data = ucwords($data, " ");
    
    // Return the formatted name
    return $data;
}
function removeLastChars($string) {
    return substr($string, 0, -3);
}
