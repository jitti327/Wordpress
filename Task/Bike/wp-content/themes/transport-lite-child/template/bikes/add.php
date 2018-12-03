<?php
  if($validationError === true){
    echo $nameError;
  }
  echo $message;
?>
<style type="text/css">  
  div#mn {
    display: none;
    float: right;
    width: 97%;
  }
  
  ul.down{
    display: none;
    margin :0px 0 0 28px;
  }
  ul.end {
    display: none;
    margin :0px 0 0 28px;
  }
  ul.tri {
    display: none;
    margin :0px 0 0 28px;
  }
  ul.cs {
    display: none;
    margin :0px 0 0 28px;
  }
</style>
  <div class="wrap">
    <form method="post">
      <table class="form-table">
        <tbody>
          <tr>
            <th scope="row">Category :</th>
            <td>
              <fieldset>
                <legend class="screen-reader-text">
                  <span>Category :</span>
                </legend>
                <!-- genralLables(name , type , id , value , display name)      -->
                <?php
                  genralLables('bike[road_bike]' , 'checkbox' , 'road' , 'Road Bike' , 'Road Bike' );
                  priceField('road_bike_input' , 'rd' , 'number', 'rd_bike' , '' , '$');
                ?>
                <br>

                <?php
                  genralLables('bike[cruiser_bike]' , 'checkbox' , 'cruiser' , 'Cruiser Bike' , 'Cruiser Bike' );
                  priceField('cruiser_bike_input' , 'cr' , 'number', 'cr_bike' , '' , '$');
                ?>
                <br>

                <?php
                  genralLables('bike[mountain_bike]' , 'checkbox' , 'mountain' , 'Mountain Bike' , 'Mountain Bike' );
                  priceField('mountain_bike_input' , 'mou' , 'number', 'mn_bike' , '' , '$');
                ?>

                <div id="mn">
                  <div>
                    <?php
                      genralLables('bike[mountain_bike][bike_type][downhill_bike]' , 'checkbox' , 'downhill' , 'Downhill' , 'Downhill' );
                      priceField('downhill_bike' , 'dow' , 'number', 'dm_bike' , '' , '$');
                    ?>                      
                  </div>
                  <ul class="down" id="down">
                    <li>
                      <?php
                        genralLables('sub' , 'checkbox' , 'demo' , 'Demo' , 'Demo' );
                        priceField('price' , 'dm' , 'number', 'dm_price' , '' , '$');
                      ?>
                    </li>
                    <li>
                      <?php
                        genralLables('sub' , 'checkbox' , 'premium' , 'Premium' , 'Premium' );
                        priceField('price' , 'pr' , 'number', 'pr_price' , '' , '$');
                      ?>
                    </li>
                    <li>
                      <?php
                        genralLables('sub' , 'checkbox' , 'standard' , 'Standard' , 'Standard' );
                        priceField('price' , 'st' , 'number', 'st_price' , '' , '$');
                      ?>
                    </li>
                  </ul>
                  <div>
                    <?php
                      genralLables('bike[mountain_bike][bike_type][enduro_bike]' , 'checkbox' , 'enduro' , 'Enduro' , 'Enduro' );
                      priceField('enduro_bike' , 'endur' , 'number', 'en_bike' , '' , '$');
                    ?>
                  </div>
                  <ul class="end" id="end">
                    <li>
                      <?php
                        genralLables('sub' , 'checkbox' , 'demo1' , 'Demo' , 'Demo' );
                        priceField('price' , 'dm1' , 'number', 'dm_price' , '' , '$');
                      ?>
                    </li>
                    <li>
                      <?php
                        genralLables('sub' , 'checkbox' , 'premium1' , 'Premium' , 'Premium' );
                        priceField('price' , 'pr1' , 'number', 'pr_price' , '' , '$');
                      ?>
                    </li>
                    <li>
                      <?php
                        genralLables('sub' , 'checkbox' , 'standard1' , 'Standard' , 'Standard' );
                        priceField('price' , 'st1' , 'number', 'st_price' , '' , '$');
                      ?>
                    </li>                      
                  </ul>
                  <div>
                    <?php
                      genralLables('bike[mountain_bike][bike_type][trail_bike]' , 'checkbox' , 'trail' , 'Trail' , 'Trail / All Mountain' );
                      priceField('trail_bike' , 'tril' , 'number', 'tril_bike' , '' , '$');
                    ?>
                  </div>
                  <ul class="tri" id="tri">
                    <li>
                      <?php
                        genralLables('sub' , 'checkbox' , 'demo2' , 'Demo' , 'Demo' );
                        priceField('price' , 'dm2' , 'number', 'dm_price' , '' , '$');
                      ?>
                    </li>
                    <li>
                      <?php
                        genralLables('sub' , 'checkbox' , 'premium2' , 'Premium' , 'Premium' );
                        priceField('price' , 'pr2' , 'number', 'pr_price' , '' , '$');
                      ?>
                    </li>
                    <li>
                      <?php
                        genralLables('sub' , 'checkbox' , 'standard2' , 'Standard' , 'Standard' );
                        priceField('price' , 'st2' , 'number', 'st_price' , '' , '$');
                      ?>
                    </li>
                  </ul>
                  <div>
                    <?php
                      genralLables('bike[mountain_bike][bike_type][cross_bike]' , 'checkbox' , 'cross' , 'Cross' , 'Cross country Full Suspension' );
                      priceField('cross_bike' , 'crs' , 'number', 'crs_bike' , '' , '$');
                    ?>
                  </div>
                  <ul class="cs" id="cs">
                    <li>
                      <?php
                        genralLables('sub' , 'checkbox' , 'demo3' , 'Demo' , 'Demo' );
                        priceField('price' , 'dm3' , 'number', 'dm_price' , '' , '$');
                      ?>
                    </li>
                    <li>
                      <?php
                        genralLables('sub' , 'checkbox' , 'premium3' , 'Premium' , 'Premium' );
                        priceField('price' , 'pr3' , 'number', 'pr_price' , '' , '$');
                      ?>
                    </li>
                    <li>
                      <?php
                        genralLables('sub' , 'checkbox' , 'standard3' , 'Standard' , 'Standard' );
                        priceField('price' , 'st3' , 'number', 'st_price' , '' , '$');
                      ?>
                    </li>
                  </ul> 
                </div>
                <br>
                <?php
                  genralLables('bike[fat_bike]' , 'checkbox' , 'fat' , 'Fat Bike' , 'Fat Bike' );
                  priceField('fat_bike_input' , 'ft' , 'number', 'ft_bike' , '' , '$');
                ?>
                <br>

                <?php
                  genralLables('bike[electric_bike]' , 'checkbox' , 'electric' , 'Electric Bike' , 'Electric Bike' );
                  priceField('electric_bike_input' , 'el' , 'number', 'el_bike' , '' , '$');
                ?>
                <br>

                <?php
                  genralLables('bike[hybrid_bike]' , 'checkbox' , 'hybrid' , 'Hybrid Bike' , 'Hybrid Bike' );
                  priceField('hybrid_bike_input' , 'hy' , 'number', 'hy_bike' , '' , '$');
                ?>
              </fieldset>
            </td>
          </tr>

          <tr>
            <th scope="row">Add On :</th>
            <td>
              <fieldset>
                <legend class="screen-reader-text">
                  <span>Add On :</span>
                </legend>

                <?php
                  genralLables('add_on' , 'checkbox' , 'damage' , 'Damage' , 'Damage protection' );
                  priceField('protect' , 'dmg' , 'number', 'damaged' , '' , '$');
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
                  priceField('ElbowArmor' , 'elb' , 'number', 'Elbow' , '' , '$');
                ?>
                <br>

                <?php
                  genralLables('add_on' , 'checkbox' , 'db' , 'Dnhelmet' , 'Downhill helmet' );
                  priceField('Downhill' , 'dt' , 'number', 'Downhill' , '' , '$');
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

    performTask('#road' , '#rd');       // for Road bike and its pricefield

    performTask('#cruiser' , '#cr');    // For Cruiser bike and its pricefield

    performTask('#mountain' , '#mou');   // For Mountain bike and its pricefield 
    performTask('#mountain' , '#mn');   // For Mountain bike and its sub Category 
    // Start Here
    performTask('#downhill' , '#dow'); // For sub Category Downhill and its pricefield
    performTask('#downhill' , '#down'); // For sub Category Downhill and its further sub Category
    performTask('#demo' , '#dm');       // For further sub category demo and its pricefield
    performTask('#premium' , '#pr');    // For further sub category premium and its pricefield
    performTask('#standard' , '#st');   // For further sub category standard and its pricefield

    performTask('#enduro' , '#endur');    // For sub category enduro and its pricefield
    performTask('#enduro' , '#end');    // For sub category enduro and its further sub category
    performTask('#demo1' , '#dm1');       // For further sub category demo and its pricefield
    performTask('#premium1' , '#pr1');    // For further sub category premium and its pricefield
    performTask('#standard1' , '#st1');   // For further sub category standard and its pricefield

    performTask('#trail' , '#tril');     // For sub category trail and its pricefield
    performTask('#trail' , '#tri');     // For sub category trail and its further sub category
    performTask('#demo2' , '#dm2');       // For further sub category demo and its pricefield
    performTask('#premium2' , '#pr2');    // For further sub category premium and its pricefield
    performTask('#standard2' , '#st2');   // For further sub category standard and its pricefield

    performTask('#cross' , '#crs');      // For sub category trail and its pricefield
    performTask('#cross' , '#cs');      // For sub category trail and its further sub category
    performTask('#demo3' , '#dm3');       // For further sub category demo and its pricefield
    performTask('#premium3' , '#pr3');    // For further sub category premium and its pricefield
    performTask('#standard3' , '#st3');   // For further sub category standard and its pricefield

    // End Here

    performTask('#fat' , '#ft');      // For Category Fat Bike and its pricefield
    
    performTask('#electric' , '#el');      // For Category Electric Bike and its pricefield
    
    performTask('#hybrid' , '#hy');      // For Category Hybrid Bike and its pricefield

    performTask('#damage' , '#dmg');       // for Road add_on and its pricefield

    performTask('#pedals' , '#pd');    // For Cruiser add_on and its pricefield

    performTask('#helmet' , '#hel');   // For Mountain add_on and its pricefield

    performTask('#lock' , '#lk');      // For Category Fat Bike and its pricefield
    
    performTask('#rack' , '#rk');      // For Category Electric Bike and its pricefield
    
    performTask('#leg' , '#lg');      // For Category Hybrid Bike and its pricefield

    performTask('#neck' , '#nk');   // For Mountain add_on and its pricefield

    performTask('#elbow' , '#elb');      // For Category Fat Bike and its pricefield
    
    performTask('#db' , '#dt');      // For Category Electric Bike and its pricefield
    
    performTask('#full' , '#armor');      // For Category Hybrid Bike and its pricefield
  });
</script>