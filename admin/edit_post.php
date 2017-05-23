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

<?php

    //Check if form was submitted
    if(isset($_POST['Submit'])){
        $title = mysqli_real_escape_string($db->link, $_POST['title']);
        $body = mysqli_real_escape_string($db->link, $_POST['body']);
        $category = mysqli_real_escape_string($db->link, $_POST['category']);
        $author = mysqli_real_escape_string($db->link, $_POST['author']);
        $tags = mysqli_real_escape_string($db->link, $_POST['tags']);

        if($title == '' || $body == '' || $category == '' || $author == ''){
            //Set error
            $error = 'Please fill all required fields';
            echo $error;
        }
        else{
            $query = "UPDATE posts SET title = '$title',
                                       body = '$body',
                                       category = $category,
                                       author = '$author',
                                       tags = '$tags'
                                       WHERE id =".$id;

            $update_row = $db->update($query);
        }
    }

?>

<?php
    if(isset($_POST['Delete'])){
        $query = "DELETE FROM posts WHERE id=".$id;

        $delete_row = $db->delete($query);
    }
?>

    <form method="post" action="edit_post.php?id=<?php echo $id; ?>">
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
          <option <?php echo $selected; ?> value="<?php echo $row['id']; ?>" ><?php echo $row['name']; ?></option>
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
        <input type="submit" value="Submit" class="btn btn-default" name="Submit" />
        <a href="index.php" class="btn btn-default">Cancel</a>
        <input type="submit" value="Delete" class="btn btn-danger" name="Delete" />
      </div>
    </form>

<?php include 'includes/footer.php'; ?>