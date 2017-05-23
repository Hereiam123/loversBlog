<?php include 'includes/header.php' ; ?>


<?php

    //Create DB Object
    $db = new Database();

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
            $query = "INSERT INTO categories (name)
                VALUES ('$name')";

            $insert_row = $db->insert($query);
        }
    }

?>

    <form method="post" action="add_category.php">
      <div class="form-group">
        <label>Category Name</label>
        <input type="text" class="form-control" placeholder="Category Name" name="name">
      </div>
      <div class="form-group">
        <input type="submit" value="Submit" class="btn btn-default" name="Submit" />
        <a href="index.php" class="btn btn-default">Cancel</a>
      </div>
    </form>

<?php include 'includes/footer.php'; ?>