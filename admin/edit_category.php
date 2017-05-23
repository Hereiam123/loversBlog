<?php include 'includes/header.php' ; ?>

    <form method="post" action="edit_category.php">
      <div class="form-group">
        <label>Category Name</label>
        <input type="text" class="form-control" placeholder="Category Name" name="name">
      </div>
      <div class="form-group">
        <input type="button" value="Submit" class="btn btn-default" name="submit" />
        <a href="index.php" class="btn btn-default">Cancel</a>
        <input type="button" value="Delete" class="btn btn-danger" name="submit" />
      </div>
    </form>

<?php include 'includes/footer.php'; ?>