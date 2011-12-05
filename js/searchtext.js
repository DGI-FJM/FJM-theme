if (Drupal.jsEnabled) {
  $(document).ready(function(){
 
    $('form#search-theme-form input.form-text').example(Drupal.t('Search'));
    $('form#search-box input.form-text').example(Drupal.t('Search'));
    $('form#search-block-form input.form-text').example(Drupal.t('Search'));    
    $('form#islandora-solr-simple-search-form input.form-text').example(Drupal.t('Search'));    
    $('form#ilives-solr-simple-search-block-form input.form-text').example(Drupal.t('Search'));    
    $('form#google-cse-searchbox-form input.form-text').example(Drupal.t('Search'));
    $('form#ilives-solr-search-block-form input.form-text').example('');
  });
}
