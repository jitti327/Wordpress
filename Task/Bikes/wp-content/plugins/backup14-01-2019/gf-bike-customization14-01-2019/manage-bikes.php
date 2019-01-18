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
        'type'  => 'textarea',
        'label' => 'Policy',
        'required' => true
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
          'gFieldId'     => [
            ['149', '150', '151'],
            ['213', '214', '215'],
            ['220', '221', '222'],
            ['227', '228', '229'],
            ['234', '235', '236'],
            ['241', '242', '243']
          ],
          'frequencyId'  => '157',
          'priceFieldId' => ['155', '216','223','230','237','244']
        ],
        'addon' => [
          'label'        => 'Addon',
          'frequency'    => ['Price'],
          'gFieldId'     => [
            ['107'],
            ['121'],
            ['128'],
            ['142'],
            ['182'],
            ['206']
          ],
          'frequencyId'  => '158',
          'priceFieldId' => ['160','218','225','232','239','246']
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