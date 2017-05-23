<?php include 'includes/header.php' ; ?>

<?php

    //Create DB Object
    $db = new Database();

    $id = $_GET['id'];

    //Create Query
    $query = "SELECT * FROM categories WHERE id = ".$id;

    //Run Query
    $category = $db->select($query)->fetch_assoc();

    //Create Query
    $query = "SELECT * FROM categories";

    //Run Query
    $categories = $db->select($query);

?>

    <form method="post" action="edit_category.php">
      <div class="form-group">
        <label>Category Name</label>
        <input type="text" class="form-control" placeholder="Category Name" name="name" value="<?php echo $category['name']; ?>" >
      </div>
      <div class="form-group">
        <input type="submit" value="Submit" class="btn btn-default" name="Submit" />
        <a href="index.php" class="btn btn-default">Cancel</a>
        <input type="button" value="Delete" class="btn btn-danger" name="submit" />
      </div>
    </form>

<?php include 'includes/footer.php'; ?>