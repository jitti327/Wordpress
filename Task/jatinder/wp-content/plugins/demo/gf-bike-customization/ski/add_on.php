<div class="wrap">
    <form method="post">
      <table class="form-table">
        <tbody>
          <tr>
            <th scope="row">Add On :</th>
            <td>
              <fieldset>
                <legend class="screen-reader-text">
                  <span>Add On :</span>
                </legend>

                <?php
                  genralLables('add_on' , 'checkbox' , 'damage' , 'Damage' , 'Damage protection' );
                  priceField('protect' , 'dm' , 'number', 'damaged' , '' , '$');
                ?>
                <br>

                <?php
                  genralLables('add_on' , 'checkbox' , 'pedals' , 'Pedals' , 'Pedals' );
                  priceField('Pedals' , 'pd' , 'number', 'pedal' , '' , '$');
                ?>
                <br>

                <?php
                  genralLables('add_on' , 'checkbox' , 'helmet' , 'Helmet' , 'Helmet' );
                  priceField('Helmet' , 'hel' , 'number', 'helmet' , '' , '$');
                ?>
                <br>
                <?php
                  genralLables('add_on' , 'checkbox' , 'lock' , 'Lock' , 'Bike Lock' );
                  priceField('Bike' , 'lk' , 'number', 'Locked' , '' , '$');
                ?>
                <br>

                <?php
                  genralLables('add_on' , 'checkbox' , 'rack' , 'Rack' , 'Bike Rack' );
                  priceField('Rack' , 'rk' , 'number', 'Rack' , '' , '$');
                ?>
                <br>

                <?php
                  genralLables('add_on' , 'checkbox' , 'leg' , 'Armor' , 'Leg Armor' );
                  priceField('Armor' , 'lg' , 'number', 'Armor' , '' , '$');
                ?>
                <br>

                <?php
                  genralLables('add_on' , 'checkbox' , 'neck' , 'NkArmor' , 'Neck Armor' );
                  priceField('NeckArmor' , 'nk' , 'number', 'Neck' , '' , '$');
                ?>
                <br>

                <?php
                  genralLables('add_on' , 'checkbox' , 'elbow' , 'ElArmor' , 'Elbow Armor' );
                  priceField('ElbowArmor' , 'el' , 'number', 'Elbow' , '' , '$');
                ?>
                <br>

                <?php
                  genralLables('add_on' , 'checkbox' , 'down' , 'Dnhelmet' , 'Downhill helmet' );
                  priceField('Downhill' , 'dn' , 'number', 'Downhill' , '' , '$');
                ?>
                <br>

                <?php
                  genralLables('add_on' , 'checkbox' , 'full' , 'Full' , 'Full Armor Package' );
                  priceField('FullPackage' , 'armor' , 'number', 'Package' , '' , '$');
                ?>
              </fieldset>
            </td>
          </tr>
        </tbody>
      </table>
        <?php generalbutton('add' , 'Save Changes' ); ?>
    </form> 
  </div>
<script type="text/javascript">
  jQuery(document).ready(function(){

     function performTask(id , actid){
      jQuery(id).on('change',function(){
      var st = this.checked;
      if(st){
        jQuery(actid).show();
      }
      else{
        jQuery(actid).hide();
      }
    });
    };

    performTask('#damage' , '#dm');       // for Road add_on and its pricefield

    performTask('#pedals' , '#pd');    // For Cruiser add_on and its pricefield

    performTask('#helmet' , '#hel');   // For Mountain add_on and its pricefield

    performTask('#lock' , '#lk');      // For Category Fat Bike and its pricefield
    
    performTask('#rack' , '#rk');      // For Category Electric Bike and its pricefield
    
    performTask('#leg' , '#lg');      // For Category Hybrid Bike and its pricefield

    performTask('#neck' , '#nk');   // For Mountain add_on and its pricefield

    performTask('#elbow' , '#el');      // For Category Fat Bike and its pricefield
    
    performTask('#down' , '#dn');      // For Category Electric Bike and its pricefield
    
    performTask('#full' , '#armor');      // For Category Hybrid Bike and its pricefield
  });
</script>