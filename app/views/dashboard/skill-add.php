 <?php
       require_once 'header.php'; 
  ?>


   <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?=AUTHENTICATION_DOMAIN?>SkillAdmin\postAdd" method="post">
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputPassword1">Title</label>
                    <input type="text" name="title" class="form-control" id="exampleInputPassword1" placeholder="title">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Ratio</label>
                    <input type="text" name="ratio" class="form-control" id="exampleInputEmail1" placeholder="ratio">
                  </div>       
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="addSkill" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>

  <?php
       require_once 'footer.php';
  ?>