<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Deletion</title>
</head>
<body>
    <h2>Are you sure you want to delete this news item?</h2>
    <p><strong>Title:</strong> <?php echo $news['title']; ?></p>
    <p><strong>Content:</strong> <?php echo $news['content']; ?></p>
    <p><strong>Created At:</strong> <?php echo $news['created_at']; ?></p>
    <a href="index.php?controller=news&action=destroy&id=<?php echo $news['id']; ?>">Yes</a>
    <a href="index.php?controller=admin&action=index">No</a>
</body>
</html>
