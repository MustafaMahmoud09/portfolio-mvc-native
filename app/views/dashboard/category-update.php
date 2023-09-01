<?php
       require_once 'header.php'; 
  ?>


   <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?=AUTHENTICATION_DOMAIN?>CategoryAdmin\postUpdate\<?= $dataCategory['id']?>" method="post">
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputPassword1">Title</label>
                    <input type="text" value="<?=$dataCategory['title']?>" name="title" class="form-control" id="exampleInputPassword1" placeholder="title">
                  </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit"  name="updateCategory" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>

  <?php
       require_once 'footer.php';
  ?>