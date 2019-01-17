jQuery( document ).ready(function($){

  jQuery('#input_1_2').val();
  jQuery('#input_1_3').val();

  var days = function() {

    var defaultValue       = 1;
    var First              = Date.parse($('#input_1_2').datepicker('getDate'));
    var Second             = Date.parse($('#input_1_3').datepicker('getDate'));
    var millisecondsPerDay = 1000 * 60 * 60 * 24;
    var millisBetween      = (Second - First);
    var days               = millisBetween / millisecondsPerDay;
    var diff               = jQuery("#input_1_4").val(days);

    if((diff.val() <= 2) || (diff.val() == 0) || (diff.val() == NaN)){
      var frequency = jQuery("#input_1_5").val(1 + " " + "Day");
      return;
    }
    if((diff.val() <= 4)){
      var frequency = jQuery("#input_1_5").val(3 + " " + "Day");
      return;
    }
    if((diff.val() <= 6)){
      var frequency = jQuery("#input_1_5").val(5 + " " + "Day");
      return;
    }
    if((diff.val() > 6)){
      var frequency = jQuery("#input_1_5").val(7 + " " + "Day");
      return;
    }
    // var frequency          = jQuery("#input_1_5").val(diff.val() - 1 + " " + "Day");
  }

    jQuery('#input_1_2').change(days);

    jQuery('#input_1_2').blur(days);

    jQuery('#input_1_2').keyup(days);

    jQuery('#input_1_3').change(days);

    jQuery('#input_1_3').blur(days);

    jQuery('#input_1_3').keyup(days);

});