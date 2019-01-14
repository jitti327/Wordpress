<?php

class entryInformation{

  ## Get row title
  public function getRowInformation( $formId, $feilds, $entry ){

    $temp = array();
    foreach( $feilds as $feild ){

       $feildTitle = $this->getEntryTitle( $formId, $feild );
       $feildValue = $this->getEntryValue( $entry, (string)$feild );

       $temp['label'][] = $feildTitle;
       $temp['value'][] = $feildValue;

    }

    $label = implode( " ", $temp['label'] );
    $value = implode( " ", $temp['value'] );

    return [ $label => $value ];
  }

  ## Get feild title
  public function getEntryTitle( $formId, $feildId ){

    $form = GFAPI::get_form( $formId );
    foreach( $form['fields'] as $field ){

        switch (gettype($feildId)) {
          case 'double':
             $feildBaseId = floor($feildId);  
             if( $field->id == $feildBaseId ){
                foreach( $field->inputs as $choice ){
                  if( $choice['id'] == $feildId ){
                    return $choice['label'];
                  } 
                }
             }
          break;

          default:
             if( $field->id == $feildId ){
                return $field->label;
             }
          break;
       }
    }
  }

  ## Get feild Value
  public function getEntryValue( $entry, $feildId ){
    return rgar( $entry, $feildId );
  }

  ## Get entry information
  public function getRowInfo($array, $entry , $formId){

    $tableRow = [];

    foreach($array as $infoTitle => $singleSection){

      $tableRow[$infoTitle] = [];
      foreach($singleSection as $value){

         switch (gettype($value)) {
           case 'integer':
             // Fetch title and value form entry
              $feildTitle = $this->getEntryTitle( $formId, $value );
              $feildValue = $this->getEntryValue( $entry, $value );
              $tableRow[$infoTitle][$feildTitle] = $feildValue;
              # code...
             break;

            case 'array':
              $rowInfo = $this->getRowInformation( $formId, $value, $entry);
              $tableRow[$infoTitle]= array_merge( $tableRow[$infoTitle], $rowInfo ) ;
            break;
           
           default:
             # code...
            break;
         }

      }
    }
    return $tableRow;
  }

  public function entryDetails( $entry, $infoArray ){
      $detailArray = $this->getRowInfo($infoArray, $entry, $entry['form_id'] );
      return $detailArray;
  }

  public function getRowHTML( $colType ="info", $colFirstInfo ="", $colSecondInfo ="" ){

    switch ($colType) {
      case 'header':
        $bgcolor = 'bgcolor="#548d3d"';
        $fontWeight = 800;
      break;

      case 'sub-header':
       $bgcolor = 'bgcolor="#eeeeee"';
       $fontWeight = 800;
      break;

      default:
        $bgcolor = '';
        $fontWeight = 400;
        break;
    }

    $row = '<tr> 
              <td style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: '.$fontWeight.'; line-height: 24px; padding: 15px 10px 5px 10px;" '.$bgcolor.' align="left" width="75%"> 
                  '.$colFirstInfo.' 
              </td>
              <td style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: '.$fontWeight.'; line-height: 24px; padding: 15px 10px 5px 10px;" '.$bgcolor.' align="left" width="25%" > 
                  '.$colSecondInfo.' 
              </td>
            </tr>';

    return $row;
  }

}
?>