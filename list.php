<?php
include('config.php');

if (isset($_GET['type']) && $_GET['type'] == 'delete') {
    $id = mysqli_real_escape_string($con, $_GET['id']);
    mysqli_query($con, "DELETE FROM shorturl WHERE id='$id'");
}

if (isset($_GET['type']) && $_GET['type'] == 'status') {
    $id = mysqli_real_escape_string($con, $_GET['id']);
    $status = mysqli_real_escape_string($con, $_GET['status']);
    $statusValue = ($status == 'active') ? '1' : '0';
    mysqli_query($con, "UPDATE shorturl SET status='$statusValue' WHERE id='$id'");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>URL Shortener - List</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Saved URLs</h1>
            <a href="form.php" class="nav-link">New URL?</a>
        </header>
        <main>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>URL Info</th>
                        <th>Short Link</th>
                        <th>Main Link</th>
                        <th>Hit Count</th>
                        <th>Actions</th>
                        <th>Copy URL</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result = mysqli_query($con, "SELECT * FROM shorturl");
                    while ($row = mysqli_fetch_assoc($result)) {
                        $shortenedURL = 'http://localhost/shortner/' . $row['short_link'];
                    ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['txt']; ?></td>
                        <td><?php echo $row['short_link']; ?></td>
                        <td><a href="<?php echo $row['link']; ?>" target="_blank"><?php echo $row['link']; ?></a></td>
                        <td><?php echo $row['hit_count']; ?></td>
                        <td>
                            <a href="?id=<?php echo $row['id']; ?>&type=delete" class="action-link">Delete</a>
                            <?php if ($row['status'] == 1) { ?>
                                <a href="?id=<?php echo $row['id']; ?>&type=status&status=deactive" class="action-link">Active</a>
                            <?php } else { ?>
                                <a href="?id=<?php echo $row['id']; ?>&type=status&status=active" class="action-link">Deactive</a>
                            <?php } ?>
                        </td>
                        <td>
                            <input type="text" id="shortURL-<?php echo $row['id']; ?>" value="<?php echo $shortenedURL; ?>" readonly>
                            <button class="copy-btn" data-id="<?php echo $row['id']; ?>">Copy</button>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </main>
    </div>
    <script src="js/script.js"></script>
</body>
</html>
