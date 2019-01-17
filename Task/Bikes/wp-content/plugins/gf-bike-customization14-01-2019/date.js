jQuery( document ).ready(function(){

  var days = function() {

    var defaultValue = 1;
    var First        = Date.parse(jQuery('#input_1_2').datepicker('getDate'));
    var Second       = Date.parse(jQuery('#input_1_3').datepicker('getDate'));
    var diff         = jQuery("#input_1_4").val((Second - First) / (1000 * 60 * 60 * 24));
    var result       = diff.val();

    if((result <= 2) || (result == 0) || (result == NaN)){
      defaultValue;
    }
    if((result > 2) && (result <= 4)){
      defaultValue = 3;
    }
    if((result > 4) && (result <= 6)){
      defaultValue = 5;
    }
    if((result > 6)){
      defaultValue = 7;
    }
    var frequency = jQuery("#input_1_5").val(defaultValue +" Day");
  }

  jQuery('#input_1_2').change(days);
  jQuery('#input_1_3').change(days);

});