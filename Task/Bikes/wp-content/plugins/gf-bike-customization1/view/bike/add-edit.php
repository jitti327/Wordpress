<?php $bike->renderCommon(); ?>
<div class="wrap">
  <form method="post">
    <table class="form-table">
      <tbody>
        <?php foreach($fields as $key => $value){ ?>

        <?php if(isset($value['type']) && $value['type'] == "radio"){ ?>

          <tr class="row-wrapper">
            <th scope="row"><label for="blogname">Pickup</label></th>
            <td>
              <?php
                global $wpdb;
                $id = $_GET['post'];
                $show = $wpdb->get_results("SELECT `pickup` FROM `wp_vendor` WHERE `id`= $id");
                
                if($show[0]->pickup == 'Yes'){?>
                  <input type="radio" name="pickup" id="pickup" value="Yes" checked="checked">Yes
                  <input type="radio" name="pickup" id="pickup" value="No">No
               <?php }else{ ?>
                <input type="radio" name="pickup" id="pickup" value="Yes">Yes
                <input type="radio" name="pickup" id="pickup" value="No" checked="checked">No
              <?php }?>
            </td>
          </tr>
        <?php }else{ ?>
          <?php if(isset($value['type']) && $value['type'] == "textarea"){ ?>
            <tr class="row-wrapper">
              <?php
                gfBikesCustomization()->generalAddtextField($key , $value['label'] , $default[$key] , 'Enter ' . $value['label'] );
              ?>
            </tr>
          <?php }else{ ?>
            <tr class="row-wrapper">
              <?php
                gfBikesCustomization()->generalAddField($key , $value['label'] , $default[$key] , 'Enter ' . $value['label'] );
              ?>
            </tr>
        <?php } ?>

        <?php } ?>

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