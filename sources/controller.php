<?php

function moulinette_get($var) {
  return htmlspecialchars(exec('sudo yunohost app setting torclient '.escapeshellarg($var)));
}

function moulinette_set($var, $value) {
  return exec('sudo yunohost app setting torclient '.escapeshellarg($var).' -v '.escapeshellarg($value));
}

function stop_service() {
  exec('sudo service ynh-torclient stop');
}

function start_service() {
  exec('sudo service ynh-torclient start', $output, $retcode);

  return $retcode;
}

function service_status() {
  exec('sudo service ynh-torclient status', $output);

  return $output;
}

function service_faststatus() {
  exec('sudo service ynh-torclient status', $output, $retcode);

  return $retcode;
}


dispatch('/', function() {

  set('status', service_faststatus() == 0);

  return render('settings.html.php');
});

dispatch_put('/settings', function() {

  $status = isset($_POST['status']) ? 1 : 0;

  moulinette_set('status', $status);

  if($status == 1) {
    $retcode = start_service();
  } else {
    $retcode = stop_service();
  }

  if($retcode == 0) {
    flash('success', T_('Configuration updated and service successfully reloaded'));
  } else {
    flash('error', T_('Configuration updated but service reload failed'));
  }

  redirect:
  redirect_to('/');
});

dispatch('/status', function() {
  $status_lines = service_status();
  $status_list = '';

  foreach($status_lines AS $status_line) {
    if(preg_match('/^\[INFO\]/', $status_line)) {
      $status_list .= '<li class="status-info">'.htmlspecialchars($status_line).'</li>';
    }
    elseif(preg_match('/^\[OK\]/', $status_line)) {
      $status_list .= '<li class="status-success">'.htmlspecialchars($status_line).'</li>';
    }
    elseif(preg_match('/^\[WARN\]/', $status_line)) {
      $status_list .= '<li class="status-warning">'.htmlspecialchars($status_line).'</li>';
    }
    elseif(preg_match('/^\[ERR\]/', $status_line)) {
      $status_list .= '<li class="status-danger">'.htmlspecialchars($status_line).'</li>';
    }
  }

  echo $status_list;
});

dispatch('/lang/:locale', function($locale = 'en') {
  switch ($locale) {
    case 'fr':
      $_SESSION['locale'] = 'fr';
      break;

    default:
      $_SESSION['locale'] = 'en';
  }

  if(!empty($_GET['redirect_to'])) {
    redirect_to($_GET['redirect_to']);
  } else {
    redirect_to('/');
  }
});