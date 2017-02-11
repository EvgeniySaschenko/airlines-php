<h1 class="title-page text-center text-uppercase"> <?= $user[0]['last_name_'.$lang].' '.$user[0]['name_'.$lang].' '.$user[0]['first_name_'.$lang]; ?> </h1>
<div class="user">
  <table class="table table-striped table-bordered">
    <tbody>
      <!--Photo-->
      <tr class="user__photo_mobile">
        <td class="hidden-lg hidden-md hidden-sm visible-xs-12" colspan="2">
          <img class="user__photo-img img-rounded img-responsive center-block" src="<?= checkFileSign('images/user/'.$user[0]['id'].'.'.$user[0]['extension']); ?>" alt="<?= $user[0]['last_name_'.$lang]; ?>">
        </td>
      </tr>
      <tr class="user__photo">
        <td class="col-lg-2 col-md-3 col-sm-3 hidden-xs" rowspan="12">
          <img class="user__photo-img img-rounded img-responsive center-block" src="<?= checkFileSign('images/user/'.$user[0]['id'].'.'.$user[0]['extension']); ?>">
        </td>
      </tr>
      <!--User info-->
      <tr class="user__rank">
        <td class="title-row text-bold col-lg-3 col-md-3 col-sm-3 col-xs-6"> <?= $word[15]['name_'.$lang]; ?> </td>
        <td class="value-cell col-lg-7 col-md-6 col-sm-6 col-xs-6"> <?= $user[0]['rank_'.$lang]; ?> </td>
      </tr>
      <tr class="user__full-name">
        <td class="title-row text-bold"> <?= $word[46]['name_'.$lang]; ?> </td>
        <td class="value-cell"> <?= $user[0]['last_name_'.$lang].' '.$user[0]['name_'.$lang].' '.$user[0]['first_name_'.$lang]; ?> </td>
      </tr>
      <tr class="user__date-birth">
        <td class="title-row text-bold"> <?= $word[5]['name_'.$lang]; ?> </td>
        <td class="value-cell"> <?= convertDate($user[0]['date_birth']); ?> </td>
      </tr>
      <tr class="user__phone--personal">
        <td class="title-row text-bold"> <?= $word[6]['name_'.$lang]; ?> </td>
        <td class="value-cell"> <?= phone($user[0]['phone']); ?> </td>
      </tr>
      <tr class="user__phone--work">
        <td class="title-row text-bold"> <?= $word[7]['name_'.$lang]; ?> </td>
        <td class="value-cell"> <?= phone($user[0]['phone_corp']); ?> </td>
      </tr>
      <tr class="user__mail">
        <td class="title-row text-bold"> <?= $word[310]['name_'.$lang]; ?> </td>
        <td class="value-cell"> <?= checkEmptyOr0($user[0]['mail']); ?> </td>
      </tr>
      <tr class="user__mail">
        <td class="title-row text-bold"> <?= $word[311]['name_'.$lang]; ?> </td>
        <td class="value-cell"> <?= checkEmptyOr0($user[0]['mail_2']); ?> </td>
      </tr>
      <tr class="user__skype">
        <td class="title-row text-bold"> <?= $word[312]['name_'.$lang]; ?> </td>
        <td class="value-cell"> <?= $user[0]['skype']; ?> </td>
      </tr>
      <tr class="user__address">
        <td class="title-row text-bold"> <?= $word[4]['name_'.$lang]; ?> </td>
        <td class="value-cell"> <?= $user[0]['address_'.$lang]; ?> </td>
      </tr>
      <tr class="user__additional-info">
        <td class="title-row text-bold"> <?= $word[313]['name_'.$lang]; ?> </td>
        <td class="value-cell"> <?= $user[0]['additional_info']; ?> </td>
      </tr>
      <tr class="user__signature">
        <td class="title-row text-bold"> <?= $word[84]['name_'.$lang]; ?> </td>
        <td class="value-cell">
          <img class="user__signature-img" src="<?= checkFileSign('images/user/signature/'.$user[0]['id'].'.jpg'); ?>" alt="<?= $word[84]['name_'.$lang]; ?>">
        </td>
      </tr>
    </tbody>
  </table>
</div>

<div class="nav-tabs--user">
  <!-- Навигация -->
  <ul class="nav nav-tabs" role="tablist">
    <li class="active">
      <a href="#docUser" aria-controls="docUser" role="tab" data-toggle="tab">
        <span class="hidden-xs"><span class="fa fa-file-text"></span> <?= $word[75]['name_'.$lang]; ?></span>
        <span class="hidden-lg hidden-md hidden-sm visible-xs"> <span class="fa fa-file-text"></span> <?= $word[85]['name_'.$lang]; ?> </span>
      </a>
  </li>
    <li>
      <a href="#docUserReceived" aria-controls="docUserReceived" role="tab" data-toggle="tab">
        <span class="hidden-xs"><span class="fa fa-envelope"></span> <?= $word[94]['name_'.$lang]; ?></span>
        <span class="hidden-lg hidden-md hidden-sm visible-xs"> <span class="fa fa-envelope"></span> <?= $word[85]['name_'.$lang]; ?> </span>
      </a>
    </li>
  </ul>
  <!-- Содержимое вкладок -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="docUser">
      <?php include('templates/doc-user.php'); ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="docUserReceived">
      <?php include('templates/doc-user-received.php'); ?>
    </div>
  </div>
</div>