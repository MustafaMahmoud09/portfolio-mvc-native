
<?php
       require_once 'header.php'; 
  ?>


   <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Project</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action = "<?= AUTHENTICATION_DOMAIN?>/ProjectAdmin/postUpdate/<?= $dataProject['id']?>" method="post" enctype="multipart/form-data">
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputPassword1">Title</label>
                    <input type="text" value="<?= $dataProject['title']?>"name="title" class="form-control" id="exampleInputPassword1" placeholder="title">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <input type="text" value="<?= $dataProject['description']?>" name="description" class="form-control" id="exampleInputPassword1" placeholder="description">
                  </div>    
                  <div class="form-group">
                  <label>Date</label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" value="<?= $dataProject['date']?>"name="date" class="form-control datetimepicker-input" data-target="#reservationdate">
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                  <label>Category</label>
                  <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" name="category" data-select2-id="9" tabindex="-1" aria-hidden="true">
                      <?php foreach($dataCategory as $oneCategory):?>

                         <option value="<?= $oneCategory['id']?>"><?= $oneCategory['title']?></option>

                      <?php endforeach;?>  
                  </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="icon" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>     
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="updateProject" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>

  <?php
       require_once 'footer.php';
  ?>