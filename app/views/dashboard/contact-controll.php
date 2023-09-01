<?php
       require_once 'header.php'; 
?>

<div class="card">
              <div class="card-header">
                <h3 class="card-title">Contact</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Subject</th>
                      <th>Message</th>
                      <th>Delete</th>
                    </tr>
                  </thead>

                  <tbody>
                 <?php if(!empty($dataContact)):?>
                   <?php foreach($dataContact as $oneContact): ?>
                    <tr>
                      <td><?= $oneContact['id']?></td>
                      <td><?= $oneContact['name']?></td>
                      <td><?= $oneContact['email']?></td>
                      <td><?= $oneContact['subject']?></td>
                      <td><?= $oneContact['message']?></td>
                      <td><a href="<?=AUTHENTICATION_DOMAIN?>ContactAdmin\delete\<?=$oneContact['id']?>" >Delete</a></td>
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