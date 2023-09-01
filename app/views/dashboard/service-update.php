  <?php
       require_once 'header.php'; 
  ?>

   <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Service</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action = "<?= AUTHENTICATION_DOMAIN?>ServicesAdmin/postUpdate/<?=$dataService['id']?>" method="post" enctype="multipart/form-data">
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputPassword1">Title</label>
                    <input type="text" name="title" value="<?=$dataService['title']?>"  class="form-control" id="exampleInputPassword1" placeholder="title">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <input type="text" name="description" value="<?=$dataService['description']?>" class="form-control" id="exampleInputEmail1" placeholder="description">
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="updateService" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>

  <?php
       require_once 'footer.php';
  ?>