<?php

/** *************************** RENDER TEST PAGE ********************************
 *******************************************************************************
 * This function renders the admin page and the example list table. Although it's
 * possible to call prepare_items() and display() from the constructor, there
 * are often times where you may need to include logic here between those steps,
 * so we've instead called those methods explicitly. It keeps things flexible, and
 * it's the way the list tables are used in the WordPress core.
 */
    
    //Create an instance of our package class...
    $testListTable = new Custom_Country_Table();
    //Fetch, prepare, sort, and filter our data...
    $testListTable->prepare_items();
    
    ?>
    <div class="wrap">        
      <div id="icon-users" class="icon32"><br/></div>
        <h1 class="wp-heading-inline">
          Countries
        </h1>
        <a href="<?php echo admin_url('admin.php?page=manage-bikes','admin'); ?>&amp;action=add" class="page-title-action">Add New</a>
        <!-- Forms are NOT created automatically, so you need to wrap the table in one to use features like bulk actions -->
      <form id="movies-filter" method="POST" action="">
          <!-- For plugins, we also need to ensure that the form posts back to our current page -->
          <input type="hidden" name="page" value="<?php echo $_REQUEST['page'] ?>" />
          <!-- Now we can render the completed list table -->
          <?php $testListTable->search_box('search','locate'); ?>
      </form>
      <form method="POST" action="">
          <?php $testListTable->display(); ?>
      </form>        
    </div>