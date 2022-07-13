<!DOCTYPE html>
<html lang="en">
<head>
  <title>User Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
  <?php 
  $this->load->view('signup/include/load-style');
  ?>
  
</head>
<body>

<div class="container">
  <h2>CI3-HMVC User Register</h2>
  <?php 
  if($this->session->flashdata('Success')):
    echo "<h2>".$this->session->flashdata('Success')."</h2>";

    if($this->session->flashdata('Error')):
        echo "<h2>".$this->session->flashdata('Error')."</h2>";

    endif;
  endif;

  ?>
  <form action="<?php echo site_url('signup/submit')?>" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label for="name">Name:</label>

      <div class="error"><?php echo form_error('name'); ?></div>

      <input type="text" class="form-control"  id="name" placeholder="Enter name" name="name" value="<?php echo set_value('name')?>">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>

      <div class="error"><?php echo form_error('email'); ?></div>

      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo set_value('email')?>" >
    </div>
    <div class="form-group">
      <label for="mobile">Mobile:</label>

      <div class="error"><?php echo form_error('mobile'); ?></div>

      <input type="text" class="form-control" id="mobile" placeholder="Enter mobile" name="mobile" value="<?php echo set_value('mobile')?>">   
    </div>
    
    <button type="submit" class="btn btn-success">Submit</button>
  </form>
</div>
<?php 
  $this->load->view('signup/include/load-script');
  ?>
</body>
</html>
