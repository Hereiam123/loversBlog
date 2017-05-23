<?php include 'includes/header.php' ; ?>

<?php

    //Create DB Object
    $db = new Database();

    $id = $_GET['id'];

    //Create Query
    $query = "SELECT * FROM posts WHERE id = ".$id;

    //Run Query
    $post = $db->select($query)->fetch_assoc();

    //Create Query
    $query = "SELECT * FROM categories";

    //Run Query
    $categories = $db->select($query);

?>

    <form method="post" action="edit_post.php">
      <div class="form-group">
        <label>Post Title</label>
        <input type="text" class="form-control" placeholder="Post Title" name="title" value="<?php echo $post['title']; ?>" >
      </div>
      <div class="form-group">
        <label>Post Text</label>
        <textarea name="body" class="form-control" placeholder="Put post text here">
            <?php echo $post['body']; ?>
        </textarea>
      </div>
      <div class="form-group">
        <label>Category</label>
        <select class="form-control" name="category">
          <?php while($row = $categories->fetch_assoc()) : ?>
          <?php if($row['id'] == $post['category']){
            $selected="selected";
          }
          else{
            $selected='';
          }
          ?>
          <option <?php echo $selected; ?> ><?php echo $row['name']; ?></option>
          <?php endwhile; ?>
        </select>
      </div>
      <div class="form-group">
        <label>Author</label>
        <input type="text" class="form-control" placeholder="Author Name" name="author" value="<?php echo $post['author']; ?>">
      </div>
      <div class="form-group">
        <label>Tags</label>
        <input type="text" class="form-control" placeholder="Enter tags" name="tags" value="<?php echo $post['tags']; ?>">
      </div>
      <div class="form-group">
        <input type="submit" value="Submit" class="btn btn-default" name="submit" />
        <a href="index.php" class="btn btn-default">Cancel</a>
        <input type="button" value="Delete" class="btn btn-danger" name="submit" />
      </div>
    </form>

<?php include 'includes/footer.php'; ?>