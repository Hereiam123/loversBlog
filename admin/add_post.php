<?php include 'includes/header.php' ; ?>

    <form method="post" action="add_post.php">
      <div class="form-group">
        <label>Post Title</label>
        <input type="text" class="form-control" placeholder="Post Title" name="title">
      </div>
      <div class="form-group">
        <label>Post Text</label>
        <text area name="body" class="form-control" placeholder="Put post text here.">
      </div>
      <div class="form-group">
        <label>Category</label>
        <select class="form-control" name="category">
          <option>News</option>
          <option>Events</option>
          <option></option>
          <option></option>
          <option></option>
        </select>
      </div>
      <div class="form-group">
        <label>Author</label>
        <input type="text" class="form-control" placeholder="Author Name" name="author">
      </div>
      <div class="form-group">
        <label>Tags</label>
        <input type="text" class="form-control" placeholder="Enter tags" name="tags">
      </div>
      <div class="form-group">
        <input type="button" value="Submit" class="btn btn-default" name="submit" />
        <a href="index.php" class="btn btn-default">Cancel</a>
      </div>
    </form>

<?php include 'includes/footer.php'; ?>