<?php 
  $bike->renderCommon();
  print_r($error['common']);
?>
<div class="wrap">
  <form method="post"> 
    <table class="form-table">
      <tbody> 
        <?php foreach($fields as $key => $value){ ?>
          <?php
            $label = $value['label'];
            $validationError = (isset($error[$key])) ? $error[$key] : false;

            if(isset($value['required']) && $value['required'] === true){
              $label .= ' <b style="color: rgb(255,0,0)">*</b> ';
            }
          ?>

        <?php if(isset($value['type']) && $value['type'] == "radio"){ ?>

          <tr class="row-wrapper">
            <th scope="row"><label for="blogname"><?php echo $label; ?></label></th>
            <td>
              <?php foreach($value['option'] as $oKey => $oValue ){ ?>
                <input 
                  type="radio" 
                  name="<?php  echo $key; ?>" 
                  id="pickup" 
                  <?php echo ($default[$key] === $oKey)?"checked='checked'":""; ?> 
                  value="<?php echo $oKey; ?>"
                ><?php echo $oValue; ?>
              <?php } ?>
            </td>
          </tr>
        <?php }
          else{ ?>
            <?php if(isset($value['type']) && $value['type'] == "textarea"){ ?>
              <tr class="row-wrapper">
                <?php
                  gfBikesCustomization()->generalAddtextField($key , $label , $default[$key] , 'Enter ' . $value['label'] , $validationError);
                ?>

              </tr>
            <?php }
              else{ ?>
                <tr class="row-wrapper">
                  <?php
                    gfBikesCustomization()->generalAddField($key , $label , $default[$key] , 'Enter ' . $value['label'] , $validationError);
                  ?>
                </tr>
        <?php }
            }
          }
        ?>
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