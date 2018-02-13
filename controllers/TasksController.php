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

    $params = array(
      'entity_type' => 'node',
      'bundle' => 'oa_space',
      'fields' => array(
        'path',
      )
    );
    $spaces = EntitiesData::getData($params);

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
    $status[] = array(
      'id' => 'resolved',
      'title' => t('Resolved')
    );

    if(!empty($_GET['filtering'])) { // compose filter conditions
      if(!empty($_GET['title'])) {
        $conditions_to_send[] = array(
          'type' => 'property_condition',
          'field' => 'title',
          'value' => $_GET['title'],
          'value_ini' => '%',
          'value_end' => '%',
          'operator' => 'like',
        );
      }
      if(!empty($_GET['code'])){
        $conditions_to_send[] = array(
          'type' => 'field_condition',
          'field' => 'field_code',
          'column' => 'value',
          'value' => $_GET['code'],
          'value_ini' => '%',
          'value_end' => '%',
          'operator' => 'like'
        );
      }
      if(!empty($_GET['status'])){
        $conditions_to_send[] = array(
          'type' => 'field_condition',
          'field' => 'field_oa_worktracker_task_status',
          'column' => 'value',
          'value' => $_GET['status'],
          'operator' => '='
        );
      }
      if(!empty($_GET['priority'])){
        $conditions_to_send[] = array(
          'type' => 'field_condition',
          'field' => 'field_oa_worktracker_priority',
          'column' => 'value',
          'value' => $_GET['priority'],
          'operator' => '='
        );
      }
      if( !empty($_GET['date_start']) && !empty($_GET['date_end']) ){
        $conditions_to_send[] = array(
          'type' => 'property_condition',
          'field' => 'created',
          'value_ini' => $_GET['date_start'],
          'value_end' => $_GET['date_end'],
          'operator' => 'BETWEEN'
        );
      }
    }

    $params = array(
      'entity_type' => 'node',
      'bundle' => 'oa_worktracker_task',
      'fields' => array(
        'field_code',
        'field_oa_worktracker_task_status',
        array(
          'field' => 'oa_section_ref',
          'entity_type' => 'node',
          'bundle' => 'oa_section',
          'fields' => array(
            array(
              'field' => 'og_group_ref',
              'entity_type' => 'node',
              'bundle' => 'oa_space',
            )
          )
        ),
        'field_oa_worktracker_priority',
        'field_oa_worktracker_duedate',
        array(
          'field' => 'field_oa_worktracker_assigned_to',
          'entity_type' => 'user',
        )
      ),
      'conditions' => $conditions_to_send
    );

    $data = EntitiesData::getData($params);

    // Formating output
    $is_deleted = FALSE;
    $total_filtered = 0;
    $total_open = 0; $total_duplicate = 0; $total_deferred = 0; $total_closed = 0; $total_resolved = 0;
    $total_delayed = 0;

    foreach ($data as $key => $value) {
      $is_deleted = FALSE;
      if(!empty($_GET['assigned']) && $value['field_oa_worktracker_assigned_to'][0]['name'] !== $_GET['assigned']){
        unset($data[$key]);
        $is_deleted = TRUE;
      }
      if(!empty($_GET['space']) && $value['oa_section_ref'][0]['og_group_ref'][0]['nid'] !== $_GET['space']){
        unset($data[$key]);
        $is_deleted = TRUE;
      }
      if(!$is_deleted) {
        foreach ($priority as $item) {
          if($value['field_oa_worktracker_priority'] == $item['id']) {
              $data[$key]['field_oa_worktracker_priority'] = $item['title'];
          }
        }
        foreach ($status as $item) {
          if($value['field_oa_worktracker_task_status'] == $item['id']) {
              $data[$key]['field_oa_worktracker_task_status'] = $item['title'];
          }
        }
        $data[$key]['created_formated'] = format_date($value['created'], 'medium', '', NULL, 'es');
        $duedate = strtotime($value['field_oa_worktracker_duedate']);
        $data[$key]['duedate_formated'] = format_date($duedate, 'medium', '', NULL, 'es');

        if($value['field_oa_worktracker_task_status'] == 'open'){
          $total_open++;
        }
        if($value['field_oa_worktracker_task_status'] == 'duplicate'){
          $total_duplicate++;
        }
        if($value['field_oa_worktracker_task_status'] == 'deferred'){
          $total_deferred++;
        }
        if($value['field_oa_worktracker_task_status'] == 'closed'){
          $total_closed++;
        }
        if($value['field_oa_worktracker_task_status'] == 'resolved'){
          $total_resolved++;
        }
        if($duedate < time() && $value['field_oa_worktracker_task_status'] != 'resolved' ){
          $total_delayed++;
        }

        $total_filtered++;
      }
    }

    $data['priority'] = $priority;
    $data['spaces'] = $spaces;
    $data['status'] = $status;
    $data['statistics'] = array(
      'total_tasks_filtered' => $total_filtered,
      'total_open' => $total_open,
      'total_duplicated' => $total_duplicate,
      'total_deferred' => $total_deferred,
      'total_closed' => $total_closed,
      'total_resolved' => $total_resolved,
      'total_delayed' => $total_delayed
    );

    return drupal_json_output($data);

  }

}
