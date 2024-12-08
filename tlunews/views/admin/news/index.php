<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Admin Dashboard - News List</h2>
        <?php if (isset($_SESSION['message'])): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['message']; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php unset($_SESSION['message']);?>
        <?php endif; ?>


        <a href="index.php?controller=news&action=add" class="btn btn-primary mb-3">Add New News</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Image</th>
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
                        <td>
                            <?php if (!empty($item['image'])): ?>
                                <img src="images/<?php echo $item['image']; ?>" alt="News Image" width="70" height="70">
                            <?php else: ?>
                                <p>No Image</p>
                            <?php endif; ?>
                        </td>
                        <td><?php echo $item['category_name']; ?></td>
                        <td><?php echo $item['created_at']; ?></td>
                        <td>
                            <a href="index.php?controller=news&action=edit&id=<?php echo $item['id']; ?>" class="btn btn-warning">Edit</a>
                            <a href="index.php?controller=news&action=delete&id=<?php echo $item['id']; ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="d-flex justify-content-between align-items-center">
            <a href="index.php?controller=admin&action=logout" class="btn btn-danger">Logout</a>
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <li class="page-item <?php echo $currentPage == 1 ? 'disabled' : ''; ?>">
                    <a class="page-link" href="index.php?controller=news&action=index&page=<?php echo $currentPage - 1; ?>">Previous</a>
                </li>
                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <li class="page-item <?php echo $i == $currentPage ? 'active' : ''; ?>">
                        <a class="page-link" href="index.php?controller=news&action=index&page=<?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>
                <?php endfor; ?>
                    <li class="page-item <?php echo $currentPage == $totalPages ? 'disabled' : ''; ?>">
                        <a class="page-link" href="index.php?controller=news&action=index&page=<?php echo $currentPage + 1; ?>">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
