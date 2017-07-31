<?php 
$m = new MongoClient();
$db = $m->mydb;
$collection = $db->users;
$msg='';
//del
if(isset($_GET['del_id'])) 
{
  $collection->remove(array('_id'=>new MongoId($_GET['del_id'])));
  $msg='Record Deleted successfully.';
}
//add
if(isset($_POST['add'])) 
{
    $check = $collection->findOne(array('email'=>$_POST['email']));
    if(!empty($check)) 
    {
      $msg ="Email Id already exist";
    }
    else 
    {
      unset($_POST['add']);
      $collection->insert($_POST);
      $msg ="Data inserted successfully";
    }
    
}
//update
if(isset($_POST['id'])) 
{
    $refId= $_POST['id'];
    $collection->update(array('_id'=>new MongoId($refId)),array('$set'=>array('name'=>$_POST['name'],'email'=>$_POST['email'],'pass'=>$_POST['pass'],'age'=>$_POST['age'],'desc'=>$_POST['desc'])));
    $msg ="Data updated successfully";
}
//list result = db.users.findOne({"name":"Tom Benzamin"},{"address_ids":1})
$cursor = $collection->find();
?>
<link href='bootstrap.min.css' rel='stylesheet'>
<div class="container">
   <?php if($msg!='') { ?>
    <div class="alert alert-success"><i class="fa fa-check-circle"></i> <?php echo $msg;?><button type="button" class="close" data-dismiss="alert">×</button>
        </div>
  <?php } ?>
  <h2>User List</h2>
  <p><a href="add.php">Add New User</a></p>            
  <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Age</th>
        <th>Desc</th>
        <th>Action</th>
      </tr>
    </thead>
     <tbody>
      <?php foreach($cursor as $res) {   ?>
      <tr>
        <td><?php if(!empty($res['name']))  { echo $res['name'];  } ?></td>
        <td><?php if(!empty($res['email'])) { echo $res['email']; } ?></td>
        <td><?php if(!empty($res['age']))   { echo $res['age'];   } ?></td>
        <td><?php if(!empty($res['desc']))  { echo $res['desc'];  } ?></td>
        
        <td><a href="edit.php?id=<?php echo $res['_id'];?>">Edit</a>&nbsp;<a onclick="return confirm('Are you Sure?');" href="list.php?del_id=<?php echo $res['_id'];?>">Delete</a></td>
      </tr>
      <?php } ?>
    </tbody>
  
  </table>
</div>