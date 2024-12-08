<h2>Chỉnh Sửa Tin Tức</h2>
<form method="POST" action="index.php?controller=news&action=update&id=<?= $news['id'] ?>" enctype="multipart/form-data">
    <label for="title">Title:</label>
    <input type="text" name="title" class="form-control <?= isset($errors['title']) ? 'is-invalid' : '' ?>" value="<?= $news['title'] ?? '' ?>" >
    <?php if (isset($errors['title'])): ?>
        <div class="invalid-feedback"><?= $errors['title'] ?></div>
    <?php endif; ?><br>

    <label for="content">Content:</label>
    <textarea name="content" class="form-control <?= isset($errors['content']) ? 'is-invalid' : '' ?>" ><?= $news['content'] ?? '' ?></textarea>
    <?php if (isset($errors['content'])): ?>
        <div class="invalid-feedback"><?= $errors['content'] ?></div>
    <?php endif; ?><br>

    <label for="image">Image:</label>
    <input type="file" name="image" class="form-control <?= isset($errors['image']) ? 'is-invalid' : '' ?>" accept="image/*">
    <?php if (isset($errors['image'])): ?>
        <div class="invalid-feedback"><?= $errors['image'] ?></div>
    <?php endif; ?><br>

    <label for="category_id">Category:</label>
    <select name="category_id" class="form-control <?= isset($errors['category_id']) ? 'is-invalid' : '' ?>" >
        <?php 
        $categories = [
            '1' => 'Chính trị',
            '2' => 'Kinh tế',
            '3' => 'Văn hóa',
            '4' => 'Khoa học',
            '5' => 'Giải trí',
            '6' => 'Thể thao',
            '7' => 'Giáo dục',
            '8' => 'Sức khỏe',
            '9' => 'Công nghệ',
            '10' => 'Môi trường',
        ];
        foreach ($categories as $id => $name): ?>
           <option value="<?= $id ?>" <?= ($news['category_id'] == $id) ? 'selected' : '' ?>>
                <?= $name ?>
            </option>

        <?php endforeach; ?>
    </select>
    <?php if (isset($errors['category_id'])): ?>
        <div class="invalid-feedback"><?= $errors['category_id'] ?></div>
    <?php endif; ?><br>

    <label for="created_at">Created_at:</label>
    <input type="date" name="created_at" class="form-control <?= isset($errors['created_at']) ? 'is-invalid' : '' ?>" value="<?= $news['created_at'] ?? '' ?>" >
    <?php if (isset($errors['created_at'])): ?>
        <div class="invalid-feedback"><?= $errors['created_at'] ?></div>
    <?php endif; ?><br>

    <button type="submit" class="btn btn-primary">Cập Nhật</button>
    <a href="index.php?controller=admin&action=index" class="btn btn-secondary">Back</a>
</form>
