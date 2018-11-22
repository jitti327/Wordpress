<div class="wrap">
  <h1 class="wp-heading-inline">
    Country
  </h1>
  <a href="<?php echo admin_url('admin.php?page=location-country-ref','admin'); ?>" class="page-title-action">Add New</a>
  <hr class="wp-header-end">
    <h2 class="screen-reader-text">
      Filter posts list
    </h2>
    <ul class="subsubsub">
      <li class="all">
        <a href="edit.php?post_type=post" class="current" aria-current="page">
          All
        <span class="count">(2)</span>
        </a> |
      </li>
      <li class="publish">
        <a href="edit.php?post_status=publish&amp;post_type=post">
          Published 
          <span class="count">(2)</span>
        </a>
      </li>
    </ul>
<form id="posts-filter" method="get">

  <p class="search-box">
    <label class="screen-reader-text" for="post-search-input">Search Posts:</label>
    <input type="search" id="post-search-input" name="s" value="">
    <input type="submit" id="search-submit" class="button" value="Search Posts">
  </p> 
  <div class="tablenav top">
    <div class="alignleft actions bulkactions">
      <label for="bulk-action-selector-top" class="screen-reader-text">Select bulk action</label>
      <select name="action" id="bulk-action-selector-top">
        <option value="-1">Bulk Actions</option>
        <option value="edit" class="hide-if-no-js">Edit</option>
        <option value="trash">Move to Trash</option>
      </select>
      <input type="submit" id="doaction" class="button action" value="Apply">
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
          <a href="http://localhost/wordpress/wp-admin/edit.php?orderby=title&amp;order=asc">
            <span>Title</span>
            <span class="sorting-indicator"></span>
          </a>
        </th>
        <th scope="col" id="author" class="manage-column column-author">Description</th>
        <th scope="col" id="date" class="manage-column column-date sortable asc">
          <a href="http://localhost/wordpress/wp-admin/edit.php?orderby=date&amp;order=desc">
            <span>Date</span>
            <span class="sorting-indicator"></span>
          </a>
        </th> 
      </tr>
    </thead>

    <tbody id="the-list">
      <tr id="post-1" class="iedit author-self level-0 post-1 type-post status-publish format-standard hentry category-uncategorized">
        <th scope="row" class="check-column"> 
          <label class="screen-reader-text" for="cb-select-1">Select Hello world!</label>
          <input id="cb-select-1" type="checkbox" name="post[]" value="1">
          <div class="locked-indicator">
            <span class="locked-indicator-icon" aria-hidden="true"></span>
            <span class="screen-reader-text">“Hello world!” is locked</span>
          </div>
        </th>
        <td class="title column-title has-row-actions column-primary page-title" data-colname="Title">
          <div class="locked-info">
            <span class="locked-avatar"></span> 
            <span class="locked-text"></span>
          </div>
          <strong>
            <a class="row-title" href="http://localhost/wordpress/wp-admin/post.php?post=1&amp;action=edit" aria-label="“Hello world!” (Edit)">Hello world!</a>
          </strong>

          <div class="hidden" id="inline_1">
            <div class="post_title">Hello world!</div>
            <div class="post_name">hello-world</div>
            <div class="post_author">1</div>
            <div class="comment_status">open</div>
            <div class="ping_status">open</div>
            <div class="_status">publish</div>
            <div class="jj">20</div>
            <div class="mm">11</div>
            <div class="aa">2018</div>
            <div class="hh">07</div>
            <div class="mn">13</div>
            <div class="ss">02</div>
            <div class="post_password"></div>
            <div class="page_template">default</div>
            <div class="post_category" id="category_1">1</div>
            <div class="tags_input" id="post_tag_1"></div>
            <div class="sticky"></div>
            <div class="post_format"></div>
          </div>
          <div class="row-actions">
            <span class="edit">
              <a href="http://localhost/wordpress/wp-admin/post.php?post=1&amp;action=edit" aria-label="Edit “Hello world!”">Edit
              </a> | 
            </span>
            <span class="inline hide-if-no-js">
              <a href="#" class="editinline" aria-label="Quick edit “Hello world!” inline">Quick&nbsp;Edit
              </a> | 
            </span>
            <span class="trash">
              <a href="http://localhost/wordpress/wp-admin/post.php?post=1&amp;action=trash&amp;_wpnonce=69bd7aba62" class="submitdelete" aria-label="Move “Hello world!” to the Trash">Trash
              </a> | 
            </span>
            <span class="view">
              <a href="http://localhost/wordpress/2018/11/20/hello-world/" rel="bookmark" aria-label="View “Hello world!”">View
              </a>
            </span>
          </div>
          <button type="button" class="toggle-row">
            <span class="screen-reader-text">Show more details</span>
          </button>
        </td>
        <td class="author column-author" data-colname="Author">
          <a href="edit.php?post_type=post&amp;author=1">Jatinder kumar</a>
        </td>
        <td class="date column-date" data-colname="Date">Published<br>
          <abbr title="2018/11/20 7:13:02 am">2018/11/20</abbr>
        </td>   
      </tr>
    </tbody>

    <tfoot>
      <tr>
        <td class="manage-column column-cb check-column">
          <label class="screen-reader-text" for="cb-select-all-2">Select All</label>
          <input id="cb-select-all-2" type="checkbox">
        </td>
        <th scope="col" class="manage-column column-title column-primary sortable desc">
          <a href="http://localhost/wordpress/wp-admin/edit.php?orderby=title&amp;order=asc">
            <span>Title</span>
            <span class="sorting-indicator"></span>
          </a>
        </th>
        <th scope="col" class="manage-column column-author">Description</th>
        <th scope="col" class="manage-column column-date sortable asc">
          <a href="http://localhost/wordpress/wp-admin/edit.php?orderby=date&amp;order=desc">
            <span>Date</span>
            <span class="sorting-indicator"></span>
          </a>
        </th>  
      </tr>
    </tfoot>

  </table>
    <div class="tablenav bottom">

      <div class="alignleft actions bulkactions">
        <label for="bulk-action-selector-bottom" class="screen-reader-text">Select bulk action</label><select name="action2" id="bulk-action-selector-bottom">
          <option value="-1">Bulk Actions</option>
          <option value="edit" class="hide-if-no-js">Edit</option>
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