<?php
include('config.php');

if (isset($_GET['short_link'])) {
    $short_link = mysqli_real_escape_string($con, $_GET['short_link']);
    $res = mysqli_query($con, "SELECT link FROM shorturl WHERE short_link='$short_link' AND status='1'");
    
    if ($res && mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
        $link = $row['link'];
        mysqli_query($con, "UPDATE shorturl SET hit_count = hit_count + 1 WHERE short_link='$short_link'");
        header('Location: ' . $link);
        exit();
    } else {
        echo "Link not found or inactive.";
    }
}
?>
