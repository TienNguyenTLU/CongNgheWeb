<h1>Sửa tin tức</h1>
<form method="POST" action="index.php?controller=admin&action=update&id=<?php echo $news['id']; ?>">
    <label for="title">Title:</label>
    <input type="text" name="title" value="<?php echo $news['title']; ?>" required><br>

    <label for="content">Content:</label>
    <textarea name="content" required><?php echo $news['content']; ?></textarea><br>

    <label for="image">Image:</label>
    <input type="text" name="image" value="<?php echo $news['image']; ?>"><br>

    <label for="category_id">Category:</label>
    <select name="category_id" required>
        <?php foreach ($categories as $category): ?>
            <option value="<?php echo $category['id']; ?>" 
                    <?php echo $news['category_id'] == $category['id'] ? 'selected' : ''; ?>>
                <?php echo $category['id']; ?>
            </option>
        <?php endforeach; ?><br>
    </select>
    <label for="image">Created_at:</label>
    <input type="date" name="created_at" value="<?php echo $news['created_at']; ?>"><br>

    <button type="submit">Cập Nhật</button>
    <a href="index.php?controller=admin&action=index">Back</a>
</form>
