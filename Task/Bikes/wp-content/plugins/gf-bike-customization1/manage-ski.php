<?php


/*
Made specially to manage bikes only
*/

class manageSki extends gfBikeManageCommon{

  protected static $_instance = null;

  protected $fieldInfo = [
    'folder' => 'json/ski/',    # Path relative to root plugin folder
    'fields' => ['ski','addon']
  ];

  // protected $frequency = [
  //   'bike'  => [ 'Half day', 'Full day', 'Day' ],
  //   'addon' => [ 'Price' ]
  // ];

  # TODO : Place check to verify if the row exists in table
  # Not implementing because I don't think this is going to be 
  # Udated to often.
  protected $vendorRowDetails = [
    'normal' => [
      'name' => [
        'label' => 'Shop Name',
        'required' => true
      ],
      'email' => [
        'label' => 'Email address',
        'required' => true
      ],
      'gear_rented' => [
        'label' => 'Type of gear rented',
        'required' => true
      ],
      'pickup' => [
        'type'  => 'radio',
        'label' => 'Pickup',
        'option' => [
          'Yes' => 'Yes', 
          'No'  => 'No'
        ]
      ],
      'policy' => [
        'type'     => 'textarea',
        'label'    => 'Policy',
        'required' => true
      ]
    ],
    'extended' => [
      'config' => [
        'folder' => 'json/ski/'
      ],
      'fields' => [
        'ski' => [
          'label'        => 'Ski',
          'frequency'    => ['1 day', '3 day', '5 Day', '7 Day'],
          'gFieldId'     => ['171'     ,'172'],
          'frequencyId'  => '169',
          'priceFieldId' => '173'
        ],
        'addon' => [
          'label'        => 'Addon',
          'frequency'    => ['Price'],
          'gFieldId'     => ['179'],
          'frequencyId'  => '170',
          'priceFieldId' => '175'
        ]
      ]
    ],
    'gravityForm'   => '6',
    'vendorId'      => '168',
    'numberFieldId' => '86'

  ];


  protected $nestedFields = [];
  protected $nestedObject = [];
  protected $uniqueKey    = 'ski';
  protected $viewFolder   = 'ski';
  protected $table        = 'ski_vendor';
  protected $gfbcTable    = 'ski';
  protected $pageName     = "manage-ski";



  #
  # 
  #
  public function __construct(){
  
    # Get addon JSON
    # Get Bike JSON

    global $wpdb;

    $this->table      = $wpdb->prefix . $this->table;
    $this->gfbcTable  = $wpdb->prefix . $this->gfbcTable;


    parent::__construct();

  }



  # We can't use this in common class
  public static function instance () {
    if ( is_null( self::$_instance ) ){
      self::$_instance = new self();       
    }
    return self::$_instance;
  } // End instance()

}

function manageSkiObject(){
  return manageSki::instance();
}

?>