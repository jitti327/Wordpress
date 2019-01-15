jQuery( document ).ready(function($){

  
  function getAttribute(elem){

    // Finding the information for class attributes
    var classPrefix = {
     "parentId"  : "js-parent-id-",
     "itemId"    : "js-id-",
     "fieldId"   : "js-field-id-",
     "priceId"   : "js-price-field-",
     "price"     : "js-price-value-",
     "setFields" : "js-set-fields-",
     "jsFormId"  : "js-form-id-"
    };


    var detailsFound   = {};
    var wrapperElement = $(elem).closest('.js-dynamic-field');

    // console.log(wrapperElement);
    // console.log(wrapperElement.attr('class'));

    // if(typeof(wrapperElement.attr('class')) == 'undefined'){
    //   return console.log('ok finally we found it');
    // }
    var classDetails   = wrapperElement.attr('class').split(' ');

    $.each(classPrefix, function(cKey, cPrefix){
      $.each(classDetails, function(index, className){
        className = $.trim(className);
        if( className.indexOf(cPrefix) !== -1){
          detailsFound[cKey] = className.replace(cPrefix, "");
          return false;
        }
        detailsFound[cKey] = "" ;
      });
    });

    return detailsFound;

  }

  $('.js-dynamic-field input').change(function(){

    var detailsFound = getAttribute(this);
  
    // Show or hide children
    // Now hidding and showing based on result fetched

    var gfFieldId = detailsFound.setFields.split(",");
    var formId    = detailsFound.jsFormId;
    var parentId  = detailsFound.parentId;
    var fieldId   = detailsFound.fieldId;
    var itemId    = detailsFound.itemId;
    var priceId   = detailsFound.priceId;
    var price     = detailsFound.price;


    // Check for empty formId and gfieldID

    if(formId == "" || gfFieldId == "" || parentId == ""){
      return;
    }

    var startFrom = gfFieldId.indexOf(fieldId); // Get position of fieldId

    if(startFrom == gfFieldId.length || startFrom == -1){ // Last element of select hierarchy 
      console.log('Invalid Field ID found');
      return;
    }


    $fieldType = $(this).attr('type');

    console.log('Field Type is', $fieldType);

    var sFieldId = gfFieldId.slice(startFrom + 1);


    // In this case we need to save price in different fields
    if($fieldType == 'checkbox'){

      $.each(gfFieldId, function(key, fieldId){
        
        // Show or hide children
        // Now hidding and showing based on result fetched

        var parentId = "#input_" + formId + "_" + fieldId;
        price    = 0;

        $(parentId).find('input').each(function(){
          if($(this).prop('checked')){
            var detailsFound = getAttribute(this);
            console.log(this, detailsFound.price);
            if(detailsFound.price !== ""){
              price += parseFloat(detailsFound.price);
              console.log('Addition of price');
            }      
          }
        });

        console.log('Price after addition in loop', price);
      });
    }
   

    // Get price of each field then add it
    $.each(sFieldId, function(key, fieldId){
      var parentId = "#input_" + formId + "_" + fieldId;
      $(parentId).find('.js-dynamic-field input').prop('checked', false);
      console.log($parentId);
      
      $(parentId).find('.js-dynamic-field').addClass('bgf-hidden');
      $(parentId).find('.js-dynamic-field.js-parent-id-'+itemId).removeClass('bgf-hidden');
    });





    if(priceId !== "" && price !== ""){
      // Update the price
      $('#input_'+formId+'_'+priceId ).val(price);
      $('#input_'+formId+'_'+priceId ).change();
    }


    // Update Price if it is present
  });


});