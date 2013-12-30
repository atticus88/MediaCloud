define supervisord::program (
  $command                  = 'php artisan queue:listen --timeout=14400',
  $process_name             = '%(program_name)s%(process_num)s',
  $numprocs                 = '8',
  $directory                = '/var/www/',
  $umask                    = '022',
  $priority                 = '999',
  $autostart                = true,
  $autorestart              = true,
  $startsecs                = '1',
  $startretries             = '3',
  $exitcodes                = '0,2',
  $stopsignal               = 'TERM',
  $stopwaitsecs             = '10',
  $user                     = 'root',
  $redirect_stderr          = false,
  $stdout_logfile           = 'AUTO',
  $stdout_logfile_maxbytes  = '50MB',
  $stdout_logfile_backups   = '10',
  $stdout_capture_maxbytes  = '0',
  $stdout_events_enabled    = false,
  $stderr_logfile           = 'AUTO',
  $stderr_logfile_maxbytes  = '50MB',
  $stderr_logfile_backups   = '10',
  $stderr_capture_maxbytes  = '0',
  $stderr_events_enabled    = false,
  $environment              = '',
  $serverurl                = 'AUTO'
) {
  file { "/etc/supervisor/conf.d/${name}.conf":
    ensure  => 'present',
    content => template('supervisord/program.conf.erb'),
    owner   => 'root',
    group   => 'root',
    mode    => '0644',
    require => Class['supervisord']
  }
}
