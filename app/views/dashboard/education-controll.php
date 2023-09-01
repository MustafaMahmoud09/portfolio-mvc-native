<?php
       require_once 'header.php'; 
?>

<div class="card">
              <div class="card-header">
                <h3 class="card-title">Education</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">ID</th>
                      <th>Specialization</th>
                      <th>Institution</th>
                      <th>Description</th>
                      <th>Delete</th>
                      <th>Update</th>
                    </tr>
                  </thead>

                  <tbody>
                 <?php if(!empty($dataEducation)):?>
                   <?php foreach($dataEducation as $oneEducation): ?>
                    <tr>
                      <td><?= $oneEducation['id']?></td>
                      <td><?= $oneEducation['specialization']?></td>
                      <td><?= $oneEducation['institution']?></td>
                      <td><?= $oneEducation['description']?></td>
                      <td><a href="<?=AUTHENTICATION_DOMAIN?>EducationAdmin\delete\<?=$oneEducation['id']?>" >Delete</a></td>
                      <td><a href="<?=AUTHENTICATION_DOMAIN?>EducationAdmin\update\<?=$oneEducation['id']?>" >Update</a></td>   
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