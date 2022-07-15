<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">


  <style>
    .error{
        color: red;
    }
  </style>
  
</head>
<body>

<div class="container">

<div class="row">
    <div style="margin-top: 20px;">
    <a class="btn btn-info" href="<?php echo site_url('book/bookview')?>">Add Book</a>
    <a class="btn btn-info" href="<?php echo site_url('book/list-book')?>">List all Books</a>

    </div>

</div>
  <h2>Register Books</h2>
  <form action="<?php echo site_url('book/submit')?>" method="POST" enctype="multipart/form-data" name="frm-create-book" id="frm-create-book">
    <div class="form-group">
      <label for="name">Book Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="<?php echo set_value('name')?>">
      <span class="error"><?php echo form_error('name')?></span>
    </div>
    <div class="form-group">
      <label for="author">Book Author:</label>
      <input type="text" class="form-control" id="author" placeholder="Enter author" name="author" value="<?php echo set_value('author')?>">
      <span class="error"><?php echo form_error('author')?></span>
    </div>
    <div class="form-group">
      <label for="publication">Book Publication:</label>
      <input type="text" class="form-control" id="publication" placeholder="Enter publication" name="publication" value="<?php echo set_value('publication')?>">
      <span class="error"><?php echo form_error('publication')?></span>
    </div>
    <div class="form-group">
      <label for="description">Book Description:</label>
      <input type="text" class="form-control" id="description" placeholder="Enter description" name="description" value="<?php echo set_value('description')?>">
      <span class="error"><?php echo form_error('description')?></span>
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
</body>
</html>

