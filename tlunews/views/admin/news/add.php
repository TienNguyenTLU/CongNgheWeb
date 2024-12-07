<h2>Thêm Tin Tức Mới</h2>
<form method="POST" action="index.php?controller=news&action=store">
    <label for="title">Title:</label>
    <input type="text" name="title" placeholder="Tiêu đề" required></br>

    <label for="content">Content:</label>
    <textarea name="content" placeholder="Nội dung" required></textarea></br>

    <label for="image">Image:</label>
    <input type="text" name="image" placeholder="Ảnh tin tức"><br>
    <label for="category_id">Category:</label>
    <select name="category_id" required>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
    </select><br>

    <label for="created_at">Created_at:</label>
    <input type="date" name="created_at"><br>

    <button type="submit">Thêm</button>
    <a href="index.php?controller=admin&action=index">Back</a>
</form>
