<?php
  echo $message;
?>
<div class="wrap">
  <h1 class="wp-heading-inline">
    Country
  </h1>
  <a href="<?php echo admin_url('admin.php?page=manage-location-title','admin'); ?>&amp;action=add" class="page-title-action">Add New</a>
  <hr class="wp-header-end">
    <h2 class="screen-reader-text">
      Filter posts list
    </h2>
    <ul class="subsubsub">
      <li class="all">
        <a href="?page=manage-location-title" class="current" aria-current="page">
          All
        <span class="count">(2)</span>
        </a> |
      </li>
      <li class="publish">
        <a href="?page=manage-location-title">
          Published 
          <span class="count">(2)</span>
        </a>
      </li>
    </ul>
<form id="posts-filter" method="POST">

  <p class="search-box">
    <label class="screen-reader-text" for="post-search-input">Search Posts:</label>
    <input type="search" id="post-search-input" name="s" value="">
    <input type="submit" name="search" id="search-submit" class="button" value="Search Posts">
  </p> 
  <div class="tablenav top">
    <div class="alignleft actions bulkactions">
      <label for="bulk-action-selector-top" class="screen-reader-text">Select bulk action</label>
      <select name="action" id="bulk-action-selector-top">
        <option value="">Bulk Actions</option>
        <option value="trash">Move to Trash</option>
      </select>
      <input type="submit" name="submit" id="doaction" class="button action" value="Apply">
    </div>

    <div class="tablenav-pages one-page">
      <span class="displaying-num">2 items</span>
      <span class="pagination-links">
        <span class="tablenav-pages-navspan" aria-hidden="true">«</span>
        <span class="tablenav-pages-navspan" aria-hidden="true">‹</span>
        <span class="paging-input">
          <label for="current-page-selector" class="screen-reader-text">Current Page</label>
          <input class="current-page" id="current-page-selector" type="text" name="paged" value="1" size="1" aria-describedby="table-paging">
          <span class="tablenav-paging-text"> of
            <span class="total-pages">1</span>
          </span>
        </span>
        <span class="tablenav-pages-navspan" aria-hidden="true">›</span>
        <span class="tablenav-pages-navspan" aria-hidden="true">»</span>
      </span>
    </div>
    <br class="clear">
  </div>

  <table class="wp-list-table widefat fixed striped posts">
    <thead>
      <tr>
        <td id="cb" class="manage-column column-cb check-column">
          <label class="screen-reader-text" for="cb-select-all-1">Select All</label>
          <input id="cb-select-all-1" type="checkbox">
        </td>
        <th scope="col" id="title" class="manage-column column-title column-primary sortable desc">
          <a href="?page=manage-location-title?orderby=title&amp;order=asc">
            <span>Title</span>
            <span class="sorting-indicator"></span>
          </a>
        </th>
        <th scope="col" id="author" class="manage-column column-author">Description</th>
        <th scope="col" id="date" class="manage-column column-date sortable asc">
          <a href="?page=manage-location-title?orderby=date&amp;order=desc">
            <span>Created On</span>
            <span class="sorting-indicator"></span>
          </a>
        </th> 
        <th scope="col" class="manage-column column-date sortable asc">
          <a href="?page=manage-location-title?orderby=date&amp;order=desc">
            <span>Updated On</span>
            <span class="sorting-indicator"></span>
          </a>
        </th>
      </tr>
    </thead>

    <tbody id="the-list">
      <?php 
        foreach( $result as $row ){
      ?>
      <tr id="post-1" class="iedit author-self level-0 post-1 type-post status-publish format-standard hentry category-uncategorized">
        <th scope="row" class="check-column"> 
          <label class="screen-reader-text" for="cb-select-<?php echo $row->id; ?>""></label>
          <input id="cb-select-<?php echo $row->id; ?>" type="checkbox" name="post[]" value="<?php echo $row->id; ?>">
        </th>
        <td class="title column-title has-row-actions column-primary page-title" data-colname="Title">
          <div class="locked-info">
            <span class="locked-avatar"></span> 
            <span class="locked-text"></span>
          </div>
          <strong>
            <a class="row-title" href="?page=manage-location-title&action=edit&post=<?php echo $row->id; ?>" aria-label="“Hello world!” (Edit)"><?php echo $row->name; ?></a>
          </strong>
          <div class="row-actions">
            <span class="edit">
              <a href="?page=manage-location-title&action=edit&post=<?php echo $row->id; ?>">Edit</a> | 
            </span>
            <span class="trash">
              <a href="?page=manage-location-title&task=trash&post=<?php echo $row->id; ?>" class="submitdelete" aria-label="Move “Hello world!” to the Trash">Trash
              </a> | 
            </span>
          </div>
          <button type="button" class="toggle-row">
            <span class="screen-reader-text">Show more details</span>
          </button>
        </td>
        <td class="author column-author" data-colname="Author">
          <a href="?page=manage-location-title&action=edit&post=<?php echo $row->id; ?>"><?php echo $row->description; ?></a>
        </td>
        <td class="date column-date" data-colname="Date">Published<br>
          <abbr><?php echo $row->created_on; ?></abbr>
        </td>
        <td class="date column-date" data-colname="Date">Updated<br>
          <abbr><?php echo $row->updated_on; ?></abbr>
        </td>    
      </tr>
    <?php } ?>
    </tbody>

    <tfoot>
      <tr>
        <td class="manage-column column-cb check-column">
          <label class="screen-reader-text" for="cb-select-all-2">Select All</label>
          <input id="cb-select-all-2" type="checkbox">
        </td>
        <th scope="col" class="manage-column column-title column-primary sortable desc">
          <a href="?page=manage-location-title?orderby=title&amp;order=asc">
            <span>Title</span>
            <span class="sorting-indicator"></span>
          </a>
        </th>
        <th scope="col" class="manage-column column-author">Description</th>
        <th scope="col" class="manage-column column-date sortable asc">
          <a href="?page=manage-location-title?orderby=date&amp;order=desc">
            <span>Created On</span>
            <span class="sorting-indicator"></span>
          </a>
        </th>
        <th scope="col" class="manage-column column-date sortable asc">
          <a href="?page=manage-location-title?orderby=date&amp;order=desc">
            <span>Updated On</span>
            <span class="sorting-indicator"></span>
          </a>
        </th> 
      </tr>
    </tfoot>

  </table>
    <div class="tablenav bottom">

      <div class="alignleft actions bulkactions">
        <label for="bulk-action-selector-bottom" class="screen-reader-text">Select bulk action</label><select name="action2" id="bulk-action-selector-bottom">
          <option value="">Bulk Actions</option>
          <option value="trash">Move to Trash</option>
        </select>
        <input type="submit" id="doaction2" class="button action" value="Apply">
      </div>
      <div class="alignleft actions"></div>
      <div class="tablenav-pages one-page">
        <span class="displaying-num">2 items</span>
        <span class="pagination-links">
          <span class="tablenav-pages-navspan" aria-hidden="true">«</span>
        <span class="tablenav-pages-navspan" aria-hidden="true">‹</span>
        <span class="screen-reader-text">Current Page</span>
        <span id="table-paging" class="paging-input">
          <span class="tablenav-paging-text">1 of 
            <span class="total-pages">1</span>
          </span>
        </span>
        <span class="tablenav-pages-navspan" aria-hidden="true">›</span>
        <span class="tablenav-pages-navspan" aria-hidden="true">»</span></span>
    </div>
      <br class="clear">
    </div>

</form>