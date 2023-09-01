  <?php
       require_once 'header.php'; 
  ?>


   <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action = "<?= AUTHENTICATION_DOMAIN?>AboutAdmin/postUpdate" method="post" enctype="multipart/form-data">
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputPassword1">Name</label>
                    <input type="text" name="name" value = "<?= $dataAdmin['name']?>"class="form-control" id="exampleInputPassword1" placeholder="Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Title</label>
                    <input type="text" name="title" value = "<?= $dataAdmin['title']?>"class="form-control" id="exampleInputPassword1" placeholder="title">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" value = "<?= $dataAdmin['email']?>"class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Phone Number</label>
                    <input type="text" name="phone" value = "<?= $dataAdmin['phoneNumber']?>"class="form-control" id="exampleInputPassword1" placeholder="Phone Number">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <input type="text" name="description"value = "<?= $dataAdmin['description']?>" class="form-control" id="exampleInputPassword1" placeholder="Description">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Country</label>
                    <input type="text" name="country" value = "<?= $dataAdmin['country']?>"class="form-control" id="exampleInputPassword1" placeholder="Country">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">City</label>
                    <input type="text" name="city" value = "<?= $dataAdmin['city']?>" class="form-control" id="exampleInputPassword1" placeholder="City">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Degree</label>
                    <input type="text" name="degree" value = "<?= $dataAdmin['degree']?>" class="form-control" id="exampleInputPassword1" placeholder="Degree">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Profile Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="profile" class="custom-file-input" id="exampleInputFile">
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
                  <button type="submit" name="updateDataAdmin" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>

  <?php
       require_once 'footer.php';
  ?>