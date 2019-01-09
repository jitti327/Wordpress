<?php


/*
Made specially to manage bikes only
*/

class manageBikes extends gfBikeManageCommon{

  protected static $_instance = null;

  protected $fieldInfo = [
    'folder' => 'json/bike/',    # Path relative to root plugin folder
    'fields' => ['bike','addon']
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
        'validation' => 'required',
      ],
      'email' => [
        'label' => 'Email address',
      ],
      'gear_rented' => [
        'label' => 'Type of gear rented',
      ],
      'pickup' => [
        'type'  => 'radio',
        'label' => 'Pickup',
      ],
      'policy' => [
        'type'  => 'textarea',
        'label' => 'Policy',
      ]
    ],
    'extended' => [
      'config' => [
        'folder' => 'json/bike/'
      ],
      'fields' => [
        'bike' => [
          'label'        => 'Bike',
          'frequency'    => ['Half day', 'Full day', '24 hours'],
          'gFieldId'     => ['149'     ,'150'      , '151'],
          'frequencyId'  => '157',
          'priceFieldId' => '155'
        ],
        'addon' => [
          'label'        => 'Addon',
          'frequency'    => ['Price'],
          'gFieldId'     => ['107'],
          'frequencyId'  => '158',
          'priceFieldId' => '160'
        ]
      ]
    ],
    'gravityForm'   => '5',
    'vendorId'      => '156',
    'numberFieldId' => '86'

  ];


  protected $nestedFields = [];
  protected $nestedObject = [];
  protected $uniqueKey    = 'bike';
  protected $viewFolder   = 'bike';
  protected $table        = 'vendor';
  protected $gfbcTable    = 'bike';
  protected $pageName     = "manage-bikes";



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

function manageBikeObject(){
  return manageBikes::instance();
}

?>