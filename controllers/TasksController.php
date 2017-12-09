<?php
/**
 * Created by PhpStorm.
 * User: vacho
 * Date: 19-11-17
 * Time: 12:11 PM
 */
class OaWorktrackerReportsTasksController {

  /**
   * This method that will be called for the 'foo/bar' path.
   *
   * @path => 'tasks-json',
   * @access callback => TRUE,
   * @title => 'Tasks json',
   */
  function getTasks() {

    //dpm($_GET['sections']);

    $data  = EntitiesData::getDatas(
      'node',
      'oa_worktracker_task',
      'field_code field_oa_worktracker_task_status oa_section_ref(node) field_oa_worktracker_priority field_oa_worktracker_duedate field_oa_worktracker_assigned_to(user,field_user_display_name)',
      ''
      );
    $priority = "";

    $i = 0;
    foreach ($data AS $single_data) {
      switch ($single_data['field_oa_worktracker_priority']) {
        case '2':
          $priority = 'Low';
          break;
        case '5':
          $priority = 'Normal';
          break;
        case '8':
          $priority = 'Hight';
          break;
      }
      $data[$i]['field_oa_worktracker_priority'] = $priority;
      $data[$i]['field_oa_worktracker_task_status'] = t($single_data['field_oa_worktracker_task_status']);
      $data[$i]['created'] = format_date($single_data['created'], 'medium', '', NULL, 'es');
      $duedate = strtotime($single_data['field_oa_worktracker_duedate']);
      $data[$i]['field_oa_worktracker_duedate'] = format_date($duedate, 'medium', '', NULL, 'es');
      $i++;
    }

    return drupal_json_output($data);

  }

}