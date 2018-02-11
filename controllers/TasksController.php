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
          'fields' => NULL,
        ),
        'field_oa_worktracker_priority',
        'field_oa_worktracker_duedate',
        /*array(
          'field' => 'field_oa_worktracker_assigned_to',
          'entity_type' => 'user',
          'bundle' => NULL,
          'fields' => array(
            'field_user_display_name',
          )

        )*/
      ),
      'conditions' => $conditions_to_send
    );

    $data = EntitiesData::getData($params);
    $data[0]['priority'] = $priority;
    $data[0]['spaces'] = $spaces;
    $data[0]['status'] = $status;
    $i = 0;

    // Formating output
    foreach ($data AS $single_data) {
      foreach ($priority as $item) {
        if($single_data['field_oa_worktracker_priority'] == $item['id']) {
            $data[$i]['field_oa_worktracker_priority'] = $item['title'];
        }
      }
      foreach ($status as $item) {
        if($single_data['field_oa_worktracker_task_status'] == $item['id']) {
            $data[$i]['field_oa_worktracker_task_status'] = $item['title'];
        }
      }
      $data[$i]['created'] = format_date($single_data['created'], 'medium', '', NULL, 'es');
      $duedate = strtotime($single_data['field_oa_worktracker_duedate']);
      $data[$i]['field_oa_worktracker_duedate'] = format_date($duedate, 'medium', '', NULL, 'es');
      $i++;
    }

    return drupal_json_output($data);

  }

}
