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

<?php

    //Check if form was submitted
    if(isset($_POST['Submit'])){

        //Assign variable name
        $name = mysqli_real_escape_string($db->link, $_POST['name']);

        //see if name is empty
        if($name == ''){
            //Set error
            $error = 'Please fill all required fields';
            echo $error;
        }
        else
        {
            $query = "UPDATE categories SET
                      name='$name' WHERE id = ".$id;

            $update_row = $db->update($query);
        }
    }

?>

<?php
    if(isset($_POST['Delete'])){
        $query = "DELETE FROM categories WHERE id=".$id;

        $delete_row = $db->delete($query);
    }
?>

    <form method="post" action="edit_category.php?id=<?php echo $id; ?>">
      <div class="form-group">
        <label>Category Name</label>
        <input type="text" class="form-control" placeholder="Category Name" name="name" value="<?php echo $category['name']; ?>" >
      </div>
      <div class="form-group">
        <input type="submit" value="Submit" class="btn btn-default" name="Submit" />
        <a href="index.php" class="btn btn-default">Cancel</a>
        <input type="submit" value="Delete" class="btn btn-danger" name="Delete" />
      </div>
    </form>

<?php include 'includes/footer.php'; ?>