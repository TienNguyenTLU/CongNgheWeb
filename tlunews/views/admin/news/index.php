<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
    <h2>Admin Dashboard - News List</h2>
    <a href="index.php?controller=admin&action=add">Add New News</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Content</th>
                <th>Category</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($news as $item): ?>
                <tr>
                    <td><?php echo $item['id']; ?></td>
                    <td><?php echo $item['title']; ?></td>
                    <td><?php echo $item['content']; ?></td>
                    <td><?php echo $item['category_id']; ?></td>
                    <td><?php echo $item['created_at']; ?></td>
                    \>
                    <td>
                        <a href="index.php?controller=admin&action=edit&id=<?php echo $item['id']; ?>">Edit</a>
                        <a href="index.php?controller=admin&action=delete&id=<?php echo $item['id']; ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="index.php?controller=admin&action=logout">Logout</a>
</body>
</html>
