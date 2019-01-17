jQuery( document ).ready(function($){

  var defaultValue = 1;

  jQuery('#input_1_3').change(function() {

    var First              = Date.parse($('#input_1_2').datepicker('getDate'));
    var Second             = Date.parse($(this).datepicker('getDate'));

    var millisecondsPerDay = 1000 * 60 * 60 * 24;
    var millisBetween      = (Second - First);
    var days               = millisBetween / millisecondsPerDay;
    var diff               = jQuery("#input_1_4").val(days);
    var frequency          = jQuery("#input_1_5").val(diff.val() - 1 + " Day");
  });

});