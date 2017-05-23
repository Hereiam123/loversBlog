<?php include 'includes/header.php' ; ?>
<?php
    //Create DB Object
    $db=new Database;

    //Make query
    $query="SELECT posts.*, categories.name FROM posts
    INNER JOIN categories ON posts.category = categories.id";

    //Run query
    $posts = $db->select($query);
?>

<table class="table table-striped">

    <tr>
        <th>Post ID#</th>
        <th>Post Title</th>
        <th>Category</th>
        <th>Author</th>
        <th>Date</th>
    </tr>

    <?php while($row=$posts->fetch_assoc()) : ?>
    <tr>
        <td><?php echo $row['id']; ?></th>
        <td><a href="edit_post.php?id=<?php echo $row['id'];?>"><?php echo $row['title']; ?></a></th>
        <td><?php echo $row['name']; ?></th>
        <td><?php echo $row['author']; ?></th>
        <td><?php echo formatDate($row['date']); ?></th>
    </tr>
    <?php endwhile; ?>

</table>

<table class="table table-striped">
    <tr>
        <th>Category ID#</th>
        <th>Category Name</th>
    </tr>
    <tr>
        <td></th>
        <td></th>
    </tr>
</table>

<?php include 'includes/footer.php'; ?>