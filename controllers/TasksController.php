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

    $spaces = EntitiesData::getDatas(
      'node',
      'oa_space',
      'path',
      ''
    );

    $priority[] = array(
      'id' => '2',
      'title' => t('Low'),
    );
    $priority[] = array(
      'id' => '5',
      'title' => t('Normal'),
    );
    $priority[] = array(
      'id' => '8',
      'title' => t('Hight'),
    );

    $status[] = array(
      'id' => 'open',
      'title' => t('Open'),
    );
    $status[] = array(
      'id' => 'duplicate',
      'title' => t('Duplicate'),
    );
    $status[] = array(
      'id' => 'deferred',
      'title' => t('Deferred'),
    );
    $status[] = array(
      'id' => 'closed',
      'title' => t('Closed')
    );


    $data = EntitiesData::getDatas(
      'node',
      'oa_worktracker_task',
      'field_code field_oa_worktracker_task_status oa_section_ref(node) field_oa_worktracker_priority field_oa_worktracker_duedate field_oa_worktracker_assigned_to(user,field_user_display_name)',
      ''
      );

    $data[0]['priority'] = $priority;
    $data[0]['spaces'] = $spaces;
    $data[0]['status'] = $status;
    $data[0]['pruebita'] = 'pruebita';
    $i = 0;
    foreach ($data AS $single_data) {

      $data[$i]['field_oa_worktracker_priority'] = $priority[$single_data['field_oa_worktracker_priority']];
      $data[$i]['field_oa_worktracker_task_status'] = t($single_data['field_oa_worktracker_task_status']);
      $data[$i]['created'] = format_date($single_data['created'], 'medium', '', NULL, 'es');
      $duedate = strtotime($single_data['field_oa_worktracker_duedate']);
      $data[$i]['field_oa_worktracker_duedate'] = format_date($duedate, 'medium', '', NULL, 'es');
      $i++;
    }

    //dpm($data);

    return drupal_json_output($data);

  }

}