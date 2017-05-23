<?php include 'includes/header.php' ; ?>

    <form method="post" action="add_category.php">
      <div class="form-group">
        <label>Category Name</label>
        <input type="text" class="form-control" placeholder="Category Name" name="name">
      </div>
      <div class="form-group">
        <input type="button" value="Submit" class="btn btn-default" name="submit" />
        <a href="index.php" class="btn btn-default">Cancel</a>
      </div>
    </form>

<?php include 'includes/footer.php'; ?>