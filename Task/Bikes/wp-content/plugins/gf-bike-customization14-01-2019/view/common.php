<style type="text/css">
  
  .single-level-bike-info > table .price-field,
  .inner-children-info{
    display: none;
  }
  
  .show-children > table .price-field{
    display: inline;
  }
  
  .show-children > .inner-children-info{
    display: block;
  }
  label.price-field {
    padding: 0px 0px 0px 54px;
  }
  table{
    width: 100%;
  }
  .form-table td{
    margin:0;
    padding:0;
  }
  .row-wrapper > td{
    padding-bottom: 20px;
  }
  .top > td{
    padding-bottom: 20px;
  }
  .single-level-bike-info table td{
    width:200px;
  }

  /*
  .single-level-bike-info table{
    box-shadow:0px 2px 0px 0px #c7c7c7;
    padding:10px 0;
  }
  */

  td.top{
    vertical-align: top;
    font-weight: bold;
  }
</style>

<script type="text/javascript">
  jQuery(document).ready(function($){

    function manageCheckboxPrices(checkbox){
      if(checkbox.is(':checked')){
        checkbox.closest('.single-level-bike-info').addClass('show-children');
      }else{
        checkbox.closest('.single-level-bike-info').removeClass('show-children');        
      }
    }

    $('.ids-nested-checkbox').click(function(){
      manageCheckboxPrices($(this));
    });

    $('.ids-nested-checkbox').each(function(){
      manageCheckboxPrices($(this));
    });    
  });
</script>