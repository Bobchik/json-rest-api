# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|

  config.vm.box = "gbarbieru/xenial"
  
  #config.vm.box = "base"
  #config.vm.box_check_update = false

config.vm.network "forwarded_port", guest: 80, host: 8081

  # Create a forwarded port mapping which allows access to a specific port
  # within the machine from a port on the host machine and only allow access
  # via 127.0.0.1 to disable public access
  # config.vm.network "forwarded_port", guest: 80, host: 8080, host_ip: "127.0.0.1"

config.vm.network "private_network", ip: "192.168.33.11"

  # config.vm.network "public_network"
config.vm.synced_folder "./", "/var/www"

  config.vm.provider "virtualbox" do |vb|
    # Display the VirtualBox GUI when booting the machine
    vb.gui = false
  
    # Customize the amount of memory on the VM:
    vb.cpus = 2
    vb.memory = "2048"
  end

  config.vm.provision "shell", inline: <<-SHELL
	# Install git and php	
    sudo -s
    apt-get install -y software-properties-common python-software-properties
    add-apt-repository ppa:ondrej/php
    apt-get update
    apt-get install -y git zip 
    apt-get install -y php7.2 php7.2-zip php7.2-curl php7.2-mbstring php7.2-xml

    # Install composer.
    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
    php -r "if (hash_file('SHA384', 'composer-setup.php') === trim(file_get_contents('https://composer.github.io/installer.sig'))) { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
    php composer-setup.php
    php -r "unlink('composer-setup.php');"
    mv composer.phar /usr/local/bin/composer

    # Install docker and docker compose
    echo 'debconf debconf/frontend select Noninteractive' | debconf-set-selections
    curl -sSL https://get.docker.com/ | sh
    usermod -aG docker vagrant
    curl -L https://github.com/docker/compose/releases/download/1.21.2/docker-compose-`uname -s`-`uname -m` > /usr/local/bin/docker-compose
    chmod +x /usr/local/bin/docker-compose
  SHELL
end
