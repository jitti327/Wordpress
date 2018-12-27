<?php $bike->renderCommon(); ?>
<div class="wrap">
  <form method="post">
    <table class="form-table">
      <tbody>
        <?php foreach($fields as $key => $value){ ?>
        <tr class="row-wrapper">
          <?php
            gfBikesCustomization()->generalAddField($key , $value['label'] , $default[$key] , 'Enter ' . $value['label'] );
          ?>
        </tr>
        <?php } ?>
        <?php foreach($extended as $key => $value){ ?>
        <tr class="row-wrapper">
          <td scope="row" class="top"> <b> <?php echo $value['label'] ?> : </b> </td>
          <td>
            <fieldset>
              <legend class="screen-reader-text">
                <span>Category :</span>
              </legend>
              <?php
                $bike->render($key, $default[$key]);
              ?>
            </fieldset>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
      <?php 
      $submitText = 'Submit';

      if($operation == 'edit'){
        $submitText = 'Update';
        ?>
        <input type="hidden" value="<?php echo $_GET['post']; ?>" name="vendor_id" />
        <?php
      }
      ?>
      <input type="hidden" value="<?php echo $operation; ?>" name="operation_type" />
      <?php gfBikesCustomization()->generalbutton('submit' , $submitText ); ?>
  </form> 
</div>