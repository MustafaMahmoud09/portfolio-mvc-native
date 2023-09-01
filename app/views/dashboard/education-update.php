<?php
       require_once 'header.php'; 
  ?>


   <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Education</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action = "<?= AUTHENTICATION_DOMAIN?>EducationAdmin/postUpdate/<?=$dataEducation['id']?>" method="post">
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputPassword1">Specialization</label>
                    <input type="text" name="specialization" class="form-control" value="<?=$dataEducation['specialization']?>" id="exampleInputPassword1" placeholder="specialization">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Institution</label>
                    <input type="text" name="institution" class="form-control" value="<?=$dataEducation['institution']?>" id="exampleInputEmail1" placeholder="institution">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <input type="text" name="description" class="form-control" value="<?=$dataEducation['description']?>" id="exampleInputPassword1" placeholder="description">
                  </div>    
                  <div class="form-group">
                    <label for="exampleInputPassword1">Time</label>
                    <input type="text" name="time" class="form-control" value="<?=$dataEducation['time']?>" id="exampleInputPassword1" placeholder="time">
                  </div>     
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="UpdateEducation" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>

  <?php
       require_once 'footer.php';
  ?>