<link href='bootstrap.min.css' rel='stylesheet'>
<div class="container">
  
  <h2>Add form</h2>
  <form action="list.php" method="post">
    <div class="row col-md-6">
    <div class="form-group">
      <label for="email">Name:</label>
      <input type="text" required class="form-control" name="name" placeholder="Enter name">
    </div>
    <div class="form-group">
      <label for="pwd">Email:</label>
      <input type="text" required class="form-control" name="email" placeholder="Enter Email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" required class="form-control" name="pass" placeholder="Choose Password">
    </div>
    <div class="form-group">
      <label for="pwd">Age:</label>
      <input type="text" required class="form-control" name="age" placeholder="age">
    </div>
     <div class="form-group">
      <label for="pwd">Description:</label>
      <input type="text" required class="form-control" name="desc" placeholder="desc">
    </div>
  
    <button type="submit" name="add" value="add" class="btn btn-default">Add</button>
   </div>
  </form>
</div>