<?php
// Function to check if the input contains blacklisted words
function containsBlacklistedWords($input) {
    // List of blacklisted words
    $blacklistedWords = array("onload=", 
"script",
"eval(",
"document.cookie",
"document.location",
"window.location",
"window.open(",
"iframe",
"src=",
"javascript:",
"vbscript:",
"expression(",
"onerror=",
"onmouseover=",
"onmouseenter=",
"onclick=",
"ondblclick=",
"onfocus=",
"onblur=",
"onchange=",
"onsubmit=",
"onreset=",
"onselect=",
"onkeydown=",
"onkeypress=",
"onkeyup=",
"onmousedown=",
"onmousemove=",
"onmouseup=");


    // Check if the input contains any blacklisted words
    foreach ($blacklistedWords as $word) {
        if (strpos($input, $word) !== false) {
            return true; // Blacklisted word found
        }
    }
    return false; // No blacklisted words found
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the username input
    $username = $_POST["username"];

    // Check if input contains blacklisted words
    if (containsBlacklistedWords($username)) {
        echo "Input contains blacklisted words. Please try again.";
    } else {
        // Process the input (e.g., insert into database)
        // In this demonstration, we're just displaying the input
        echo "User Input: " . $username;
    }
}
?>

<html>
<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Username: <input type="text" name="username">
        <input type="submit" value="Submit">
    </form>
</body>
</html>
