<?php
       require_once 'header.php'; 
?>

<div class="card">
              <div class="card-header">
                <h3 class="card-title">Skill</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">ID</th>
                      <th>Title</th>
                      <th>Ratio</th>
                      <th>Delete</th>
                      <th>Update</th>
                    </tr>
                  </thead>

                  <tbody>
                 <?php if(!empty($dataSkill)):?>
                   <?php foreach($dataSkill as $oneSkill): ?>
                    <tr>
                      <td><?= $oneSkill['id']?></td>
                      <td><?= $oneSkill['title']?></td>
                      <td><?= $oneSkill['ratio']?></td>
                      <td><a href="<?=AUTHENTICATION_DOMAIN?>SkillAdmin\delete\<?=$oneSkill['id']?>" >Delete</a></td>
                      <td><a href="<?=AUTHENTICATION_DOMAIN?>SkillAdmin\update\<?=$oneSkill['id']?>" >Update</a></td>   
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