<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Detail</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2 class="text-center text-primary">News Detail</h2>
        <?php if (isset($news)): ?>
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <!-- Title: 30% width -->
                        <div class="col-md-4">
                            <strong>Title:</strong>
                        </div>
                        <!-- Title Content: 70% width -->
                        <div class="col-md-8">
                            <?php echo $news['title']; ?>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <strong>Category:</strong>
                        </div>
                        <div class="col-md-8">
                            <?php echo $news['category_name']; ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <strong>Created At:</strong>
                        </div>
                        <div class="col-md-8">
                            <?php echo $news['created_at']; ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <strong>Content:</strong>
                        </div>
                        <div class="col-md-8">
                            <?php echo $news['content']; ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <strong>Image:</strong>
                        </div>
                        <div class="col-md-8">
                        <?php if (!empty($news['image'])): ?>
                            <img src="images/<?php echo $news['image']; ?>" alt="News Image" class="img-fluid" width="100" height="100">
                        <?php else: ?>
                            <p>No Image</p>
                        <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <a href="index.php?controller=news&action=index" class="btn btn-secondary btn-sm">Back to News List</a>
                    <a href="index.php?controller=news&action=edit&id=<?php echo $news['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                </div>
            </div>
        <?php else: ?>
            <div class="alert alert-danger mt-3" role="alert">
                News not found!
            </div>
        <?php endif; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
