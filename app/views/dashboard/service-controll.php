<?php
       require_once 'header.php'; 
?>

<div class="card">
              <div class="card-header">
                <h3 class="card-title">Service</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">ID</th>
                      <th>Title</th>
                      <th>Description</th>
                      <th>Delete</th>
                      <th>Update</th>
                    </tr>
                  </thead>

                  <tbody>
                 <?php if(!empty($dataService)):?>
                   <?php foreach($dataService as $oneService): ?>
                    <tr>
                      <td><?= $oneService['id']?></td>
                      <td><?= $oneService['title']?></td>
                      <td><?= $oneService['description']?></td>
                      <td><a href="<?=AUTHENTICATION_DOMAIN?>ServicesAdmin\delete\<?=$oneService['id']?>" >Delete</a></td>
                      <td><a href="<?=AUTHENTICATION_DOMAIN?>ServicesAdmin\update\<?=$oneService['id']?>" >Update</a></td>   
                    </tr>
                    <?php endforeach;?>
                 <?php endif;?> 
                  </tbody>

                </table>
              </div>
</div>

 <?php
       require_once 'footer.php';
  ?>  