<?php
       require_once 'header.php'; 
?>

<div class="card">
              <div class="card-header">
                <h3 class="card-title">Social</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">ID</th>
                      <th>Title</th>
                      <th>Link</th>
                      <th>Delete</th>
                      <th>Update</th>
                    </tr>
                  </thead>

                  <tbody>

                 <?php if(!empty($dataSocial)):?>
                   <?php foreach($dataSocial as $oneSocial): ?>
                    <tr>
                      <td><?= $oneSocial['id']?></td>
                      <td><?= $oneSocial['title']?></td>
                      <td><?= $oneSocial['link']?></td>
                      <td><a href="<?=AUTHENTICATION_DOMAIN?>SocialAdmin\delete\<?=$oneSocial['id']?>" >Delete</a></td>
                      <td><a href="<?=AUTHENTICATION_DOMAIN?>SocialAdmin\update\<?=$oneSocial['id']?>" >Update</a></td>   
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