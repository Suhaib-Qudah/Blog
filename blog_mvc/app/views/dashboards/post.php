<?php
require APPROOT."/views/includes/head.php";



?>
<?php require APPROOT."/views/includes/navbar.php"; ?>


<div class="dashboard-conteainer">
<div class="leftside">
<?php require APPROOT."/views/includes/sidebar.php"; ?>

</div>
<div class="content">
    <h1 class="title m-3">Users</h1>

<table class="user-table">
              <thead>
                  <th>#</th>
                  <th>Id</th>
                  <th>Title post</th>
                  <th>Author id</th>
                  <th colspan="3">Actions</th>
                  

              </thead>
              <tbody>

              <?php foreach($data['posts'] as $index => $post):?>
                <tr>
                <td><?php echo $index+1?></td>
                <td><?php echo $post->id;?></td>
                <td><?php echo $post->title;?></td>
                <td><?php echo $post->author;?></td>
                <td><a class="edit" href="#">Edit</a></td>
                <td><a class="view" href="#">View</a></td>
                <td><a class="delete" href="#">Delete</a></td>

              <?php endforeach?>
              </tbody>
          </table>
        </div>
              </div>

<?php require APPROOT."/views/includes/footer.php";?>


