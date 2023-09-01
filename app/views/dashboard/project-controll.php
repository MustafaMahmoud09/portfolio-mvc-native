<?php
       require_once 'header.php'; 
?>

<div class="card">
              <div class="card-header">
                <h3 class="card-title">Project</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">ID</th>
                      <th>Title</th>
                      <th>Description</th>
                      <th>Date</th>
                      <th>Delete</th>
                      <th>Update</th>
                    </tr>
                  </thead>

                  <tbody>
      
                  <?php if(!empty($dataProject)):?>
                   <?php foreach($dataProject as $oneProject): ?>
                    <tr>
                      <td><?= $oneProject['id']?></td>
                      <td><?= $oneProject['title']?></td>
                      <td><?= $oneProject['description']?></td>
                      <td><?= $oneProject['date']?></td>
                      <td><a href="<?=AUTHENTICATION_DOMAIN?>ProjectAdmin\delete\<?=$oneProject['id']?>" >Delete</a></td>
                      <td><a href="<?=AUTHENTICATION_DOMAIN?>ProjectAdmin\update\<?=$oneProject['id']?>" >Update</a></td>   
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