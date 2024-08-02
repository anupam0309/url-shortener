<?php
include('config.php');

if (isset($_POST['link'])) {
    $link = $_POST['link'];
    $short_link = $_POST['short_link'];
    $txt = $_POST['txt'];

    // Sanitize input
    $link = mysqli_real_escape_string($con, $link);
    $short_link = mysqli_real_escape_string($con, $short_link);
    $txt = mysqli_real_escape_string($con, $txt);

    // Check if short_link already exists
    $checkQuery = "SELECT * FROM shorturl WHERE short_link='$short_link'";
    $result = mysqli_query($con, $checkQuery);
    if (mysqli_num_rows($result) > 0) {
        echo "Short Link already exists";
    } else {
        // Insert new record
        $insertQuery = "INSERT INTO shorturl (link, short_link, txt, status, hit_count) VALUES ('$link', '$short_link', '$txt', '1', '0')";
        mysqli_query($con, $insertQuery);
        header('Location: list.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>URL Shortener - Add Link</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="heading">
    <h1>URL Shortener</h1>
    </div>
    <div class="container">
        <header>
            <h2>Add New Short Link</h2>
        </header>
        <main>
            <form method="post">
                <div class="form-group">
                    <label for="link">Link:</label>
                    <input type="text" id="link" name="link" placeholder="Enter the full URL" required>
                </div>
                <div class="form-group">
                    <label for="short_link">Short Link:</label>
                    <input type="text" id="short_link" name="short_link" placeholder="Enter a short link" required>
                </div>
                <div class="form-group">
                    <label for="txt">Description:</label>
                    <input type="text" id="txt" name="txt" placeholder="Enter a description" required>
                </div>
                <button type="submit">Add Link</button>
            </form>
            <a href="list.php" class="nav-link">Back to List</a>
        </main>
    </div>
</body>
</html>

