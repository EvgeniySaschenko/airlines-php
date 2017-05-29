<h1 class="division-department__title-page title-page text-center text-uppercase">
  <?= $currentSection[0]['name_'.$lang]; ?> 
</h1>

<div class="division-department">
    <?php foreach($allDivisionDepartment as $divisionDepartment): ?>
    <h4 class="division-department_name">
        <?= $divisionDepartment['name_'.$lang]; ?> 
    </h4>
      <div class="division-department--box-user">
          <!--Позьзователи-->
          <?php foreach($allUserDivisionDepartment as $userDivisionDepartment): ?>
              <?php if($userDivisionDepartment['id_news'] == $divisionDepartment['id']): ?>


                <div class="division-department--user">
                    <div class="division-department--user-circle">
                      <?php if(!empty($userDivisionDepartment['extension'])): ?>
                        <img class="division-department--user-img" src="images/user/<?= $userDivisionDepartment['id_user']; ?>.<?= $userDivisionDepartment['extension']; ?>?v=3">
                      <?php else: ?>
                        <img class="division-department--user-img" src="images/user.png">
                      <?php endif; ?>
                    </div>
                    <div class="division-department--box-user-rank-name">
                      <!--Должность-->
                      <div class="division-department--user-rank">
                          <?= $userDivisionDepartment['rank_'.$lang]; ?>
                      </div>
                      <!--Имя-->
                      <div class="division-department--user-name">
                        <?= linkUser($userDivisionDepartment['id_section'], $userDivisionDepartment['id_user'], $userDivisionDepartment['last_name_'.$lang], $userDivisionDepartment['name_'.$lang], $userDivisionDepartment['first_name_'.$lang]); ?>
                      </div>
                    </div>
                </div>
              <?php endif; ?>
          <?php endforeach; ?>
         </div>
  
        <div class="division-department__text">
          <?= addParagraph($divisionDepartment['content_'.$lang]) ?>
        </div>
  
        <?php if(!empty($divisionDepartment['extension'])): ?>
            <div class="division-department__cover">
              <img class="division-department__cover--img" src="images/news/<?=$divisionDepartment['id'].'.'.$divisionDepartment['extension']?>">
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
</div>