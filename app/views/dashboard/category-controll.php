<?php
       require_once 'header.php'; 
?>

<div class="card">
              <div class="card-header">
                <h3 class="card-title">Category</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">ID</th>
                      <th>Title</th>
                      <th>Delete</th>
                      <th>Update</th>
                    </tr>
                  </thead>

                  <tbody>
                 <?php if(!empty($dataCategory)):?>
                   <?php foreach($dataCategory as $oneCategory): ?>
                    <tr>
                      <td><?= $oneCategory['id']?></td>
                      <td><?= $oneCategory['title']?></td>
                      <td><a href="<?=AUTHENTICATION_DOMAIN?>CategoryAdmin\delete\<?=$oneCategory['id']?>" >Delete</a></td>
                      <td><a href="<?=AUTHENTICATION_DOMAIN?>CategoryAdmin\update\<?=$oneCategory['id']?>" >Update</a></td>   
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