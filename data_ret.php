<?php

  $flowquery = "SELECT * FROM waterflow ORDER BY flow_cdate DESC ";
  $flowresult = mysqli_query($conn, $flowquery);
  while ($row = mysqli_fetch_assoc($flowresult)) {
      $data_flow[] = $row['flow_readings'];
  }

  $levelquery = "SELECT * FROM waterlevel ORDER BY level_cdate DESC";
  $levelresult = mysqli_query($conn, $levelquery);
  while ($row = mysqli_fetch_assoc($levelresult)) {
      $data_level[] = $row['level_readings'];
  }

  $acidquery = "SELECT * FROM acidity ORDER BY acid_cdate DESC";
  $acidresult = mysqli_query($conn, $acidquery);
  while ($row = mysqli_fetch_assoc($acidresult)) {
      $data_acid[] = $row['acid_readings'];
      $data_acid_action[] = $row['action'];
  }

  $tdsquery = "SELECT * FROM total_dissolved_solids ORDER BY tds_cdate DESC";
  $tdsresult = mysqli_query($conn, $tdsquery);
  while ($row = mysqli_fetch_assoc($tdsresult)) {
      $data_tds[] = $row['tds_readings'];
      $data_tds_action[] = $row['action'];
  }

  $tempquery = "SELECT * FROM temperature ORDER BY temp_cdate DESC";
  $tempresult = mysqli_query($conn, $tempquery);
  while ($row = mysqli_fetch_assoc($tempresult)) {
      $data_temp[] = $row['temp_readings'];
      $date_temp[] = $row['temp_cdate'];
  }
?>

<?php
  $tempvalue = $data_temp[0];
  $tempcdate = date("F j - h:i A", strtotime($date_temp[0]));
  $tempvalue_prev =  $data_temp[1];
  $tempvalue_comp = $data_temp[0] - $data_temp[1];
  
  if ($tempvalue_comp < 0) {
    $tempclass = 'text-success';
    $tempicon = 'bx bx-chevron-down';
  } else {
    $tempclass = 'text-danger';
    $tempicon = 'bx bx-chevron-up';
  }
?>

<?php
  $flowvalue = $data_flow[0];
  $flowvalue_prev =  $data_flow[1];
  $flowvalue_comp = $data_flow[0] - $data_flow[1];
  
  if ($flowvalue_comp < 0) {
    $class = 'text-danger';
    $icon = 'bx bx-down-arrow-alt';
  } else {
    $class = 'text-success';
    $icon = 'bx bx-up-arrow-alt';
  }
?>

<?php
  $levelvalue = $data_level[0];
  $levelvalue_prev =  $data_level[1];
  $levelvalue_comp = $data_level[0] - $data_level[1];
  
  if ($levelvalue_comp < 0) {
    $levelclass = 'text-danger';
    $levelicon = 'bx bx-down-arrow-alt';
  } else {
    $levelclass = 'text-success';
    $levelicon = 'bx bx-up-arrow-alt';
  }
?>

<?php
  $acidvalue = $data_acid[0];
  $acidvalue_prev =  $data_acid[1];
  $acidvalue_comp = $data_acid[0] - $data_acid[1];
  
  if ($acidvalue_comp < 0) {
    $acidclass = 'text-danger';
    $acidicon = 'bx bx-down-arrow-alt';
  } else {
    $acidclass = 'text-success';
    $acidicon = 'bx bx-up-arrow-alt';
  }
?>

<?php
  $tdsvalue = $data_tds[0];
  $tdsvalue_prev =  $data_tds[1];
  $tdsvalue_comp = $data_tds[0] - $data_tds[1];
  
  if ($tdsvalue_comp < 0) {
    $tdsclass = 'text-danger';
    $tdsicon = 'bx bx-down-arrow-alt';
  } else {
    $tdsclass = 'text-success';
    $tdsicon = 'bx bx-up-arrow-alt';
  }
?>