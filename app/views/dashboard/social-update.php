  <?php
       require_once 'header.php'; 
  ?>


   <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Social</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action = "<?= AUTHENTICATION_DOMAIN?>SocialAdmin/postUpdate/<?=$dataSocial['id']?>" method="post" >
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputPassword1">Title</label>
                    <input type="text" name="title" class="form-control" id="exampleInputPassword1" value="<?=$dataSocial['title']?>" placeholder="title">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Link</label>
                    <input type="text" name="link" class="form-control" id="exampleInputEmail1"  value="<?=$dataSocial['link']?>" placeholder="link">
                  </div>
   
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="updateSocial" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>

  <?php
       require_once 'footer.php';
  ?>