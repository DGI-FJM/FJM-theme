<?php

/**
 * @file islandora-solr-custom.tpl.php
 * Islandora solr search results template
 *
 * Variables available:
 * - $variables: all array elements of $variables can be used as a variable.
 *   e.g. $base_url equals $variables['base_url']
 * - $base_url: The base url of the current website. eg: http://example.com .
 * - $user: The user object.
 *
 * - $style: the style of the display ('div' or 'table'). Set in admin page
 *   by default. Overridden by the query value: ?display=foo
 * - $results: the array containing the solr search results
 * - $table_rendered: If the display style is set to 'table', this will
 *   contain the rendered table.
 *   For theme overriding, see: theme_islandora_solr_custom_table() 
 * - $switch_rendered: The rendered switch to toggle between display styles
 *    For theme overriding, see: theme_islandora_solr_custom_switch() 
 *
 * - Important! Replace the solr field names in the t() functions with
 *   human readable names.
 *
 */
?>

<?php print $switch_rendered; ?>

<?php if ($style == 'div'): ?>

<div class="islandora-solr-results" start="<?php print $record_start; ?>">
<?php if ($results == ''): print '<p>' . t('Your search yielded no results') . '</p>'; ?>
<?php else: ?>
<?php foreach ($results as $id => $result): ?>
<?php
  // string length
  $strlen = 80;
  $title = $result['mods_title_ms']['value'];
  if (strlen($title) > $strlen) {
    $title = substr($title, 0, $strlen) . '...';
  }

  if (empty($result['page']['value'])) {
    $link_url = $base_url . '/fedora/repository/' . $result['PID']['value'];
  }
  else {
    $link_url = $base_url . '/fedora/repository/' . $result['link_PID']['value'] . '?page=' . $result['page']['value'];
  }
  
  // Photo object should use parent's PID for TN
  if (!empty($result['parent_pid']['value'])) {
    $result['PID']['value'] = $result['parent_pid']['value'];
  }
?>
  <div class="islandora-solr-result">
    <a class="solr-field <?php print $result['PID']['class']; ?>" href="<?php print $link_url; ?>" title="<?php print $result['mods_title_ms']['value']; ?>">
      <span class="solr-img-wrapper">
        <img class="solr-img" src="<?php print $base_url . '/fedora/repository/' . $result['PID']['value'] . '/TN/TN'; ?>">
      </span>
      <span class="solr-title"><?php print $title; ?></span>
    </a>
  </div>
<?php endforeach; ?>
<?php endif; ?>
</div>

<?php elseif ($style == 'table'): ?>

  <?php print $table_rendered; ?>

<?php endif;
