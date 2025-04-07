<?php
// If the form is submitted
if(isset($_POST['submit'])){
    // Get the selected rating value
    $rating = $_POST['rating'];
    
    // Store the rating in a session or a database, here we use a session for simplicity
    session_start();
    $_SESSION['rating'] = $rating;
}

// If there's a stored rating in session, retrieve it
$stored_rating = isset($_SESSION['rating']) ? $_SESSION['rating'] : 0;

// Function to display stars
function displayStars($rating) {
    for ($i = 1; $i <= 5; $i++) {
        if ($i <= $rating) {
            echo '<span style="color: gold;">&#9733;</span>'; // Filled star
        } else {
            echo '&#9734;'; // Empty star
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>5 Star Rating System</title>
</head>
<body>
    <h1>Rate This Product</h1>

    <!-- Form to submit the rating -->
    <form method="POST">
        <label for="rating">Select Rating:</label><br>
        <input type="radio" name="rating" value="1" <?= $stored_rating == 1 ? 'checked' : ''; ?>> 1 Star
        <input type="radio" name="rating" value="2" <?= $stored_rating == 2 ? 'checked' : ''; ?>> 2 Stars
        <input type="radio" name="rating" value="3" <?= $stored_rating == 3 ? 'checked' : ''; ?>> 3 Stars
        <input type="radio" name="rating" value="4" <?= $stored_rating == 4 ? 'checked' : ''; ?>> 4 Stars
        <input type="radio" name="rating" value="5" <?= $stored_rating == 5 ? 'checked' : ''; ?>> 5 Stars
        <br>
        <input type="submit" name="submit" value="Submit Rating">
    </form>

    <h2>Your Rating:</h2>
    <?php
    // Display the stored rating as stars
    displayStars($stored_rating);
    ?>

</body>
</html>