class beanstalkd {
	package { 'beanstalkd':
		ensure => present,
		require => Exec['apt-get update'],
	}

	file { '/etc/init/beanstalkd.conf':
		ensure 	=> file,
		owner 	=> 'root',
		group 	=> 'root',
		mode 	=> '0655',
		source 	=> "puppet:///modules/beanstalkd/beanstalkd.conf",
	}

	# service { 'beanstalkd':
	# 	ensure		=> running,
	# 	enable		=> true,
	# 	subscribe	=> File['/etc/beanstalkd'],
	# }
}