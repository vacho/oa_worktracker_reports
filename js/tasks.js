jQuery(document).ready(function(){
  //jQuery(".chosen-select").chosen({disable_search_threshold: 10});

  //jQuery("#task-status").chosen();
  jQuery("#duedate, #startdate").datepicker(
      { dateFormat: 'M d yy' }
  );
});