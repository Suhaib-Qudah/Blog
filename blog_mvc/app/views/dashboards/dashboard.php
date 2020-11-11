<?php
require APPROOT."/views/includes/head.php";



?>
<?php require APPROOT."/views/includes/navbar.php"; ?>


<div class="dashboard-conteainer">
<div class="leftside">
    <ul>
    <?php require APPROOT."/views/includes/sidebar.php"; ?>


    </ul>
</div>
<div class="content">
    <h1 class="title m-3">Users</h1>

<table class="user-table">
              <thead>
                  <th>#</th>
                  <th>Id</th>
                  <th>Username</th>
                  <th>Admin privilege</th>
                  <th>Email</th>
                  <th>Phone Number</th>
                   <th>Make Admin</th>



              </thead>
              <tbody>

              <?php foreach($data as $index => $user):$id =$user->id?>
                <tr>
                <td><?php echo $index+1?></td>
                <td><?php echo $user->id;?></td>
                <td><?php echo $user->name;?></td>
                <td><?php echo $user->state;?></td>
                <td><?php echo $user->email;?></td>
                <td><?php echo $user->phone;?></td>
                <td><a class="btn btn-success" href="<?= URLROOT.'/dashboards/admin/' .$user->id?> ">  Make admin</a></td>
              <?php endforeach?>
              </tbody>
          </table>
        </div>
              </div>

<?php require APPROOT."/views/includes/footer.php";?>


