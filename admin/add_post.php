<?php include 'includes/header.php' ; ?>


<?php

    //Create DB Object
    $db = new Database();

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
            $query = "INSERT INTO posts (title, body, category, author, tags)
                VALUES ('$title', '$body', $category, '$author', '$tags')";

            $insert_row = $db->insert($query);
        }
    }

?>

<?php

    //Create Query
    $query = "SELECT * FROM categories";

    //Run Query
    $categories = $db->select($query);

?>

    <form method="post" action="add_post.php">
      <div class="form-group">
        <label>Post Title</label>
        <input type="text" class="form-control" placeholder="Post Title" name="title">
      </div>
      <div class="form-group">
        <label>Post Text</label>
        <textarea name="body" class="form-control" placeholder="Put post text here.">
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
        <input type="text" class="form-control" placeholder="Author Name" name="author">
      </div>
      <div class="form-group">
        <label>Tags</label>
        <input type="text" class="form-control" placeholder="Enter tags" name="tags">
      </div>
      <div class="form-group">
        <input type="submit" value="Submit" class="btn btn-default" name="Submit" />
        <a href="index.php" class="btn btn-default">Cancel</a>
      </div>
    </form>

<?php include 'includes/footer.php'; ?>