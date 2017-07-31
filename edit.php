<?php 
$m = new MongoClient();
$db = $m->mydb;
$collection = $db->users;
$msg='';
$res =array();
if(isset($_GET['id'])) 
{
  $res =$collection->findOne(array('_id'=>new mongoId($_GET['id'])));
}

?>
<link href='bootstrap.min.css' rel='stylesheet'>
<div class="container">
    <?php if($msg!='') { ?>
    <div class="alert alert-success"><i class="fa fa-check-circle"></i> <?php echo $msg;?><button type="button" class="close" data-dismiss="alert">×</button>
        </div>
  <?php } ?>
  <h2>Add form</h2>
  <form action="list.php" method="post">
    <div class="row col-md-6">
    <div class="form-group">
      <label for="email">Name:</label>
      <input type="hidden" name="id" value="<?php if(!empty($res['_id'])) { echo $res['_id']; }?>">
      <input type="text" required class="form-control" value="<?php if(!empty($res['name'])) { echo $res['name']; }?>" name="name" placeholder="Enter name">
    </div>
    <div class="form-group">
      <label for="pwd">Email:</label>
      <input type="text" required class="form-control" value="<?php if(!empty($res['email'])) { echo $res['email']; }?>" name="email" placeholder="Enter Email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" required class="form-control" value="<?php if(!empty($res['pass'])) { echo $res['pass']; }?>" name="pass" placeholder="Choose Password">
    </div>
    <div class="form-group">
      <label for="pwd">Age:</label>
      <input type="text" required class="form-control" name="age" value="<?php if(!empty($res['age'])) { echo $res['age']; }?>" placeholder="age">
    </div>
     <div class="form-group">
      <label for="pwd">Description:</label>
      <input type="text" required class="form-control" name="desc" value="<?php if(!empty($res['desc'])) { echo $res['desc']; }?>" placeholder="desc">
    </div>
  
    <button type="submit"  class="btn btn-default">Update</button>
   </div>
  </form>
</div>