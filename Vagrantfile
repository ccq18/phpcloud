# -*- mode: ruby -*-
# vi: set ft=ruby :


Vagrant.configure("2") do |config|

  config.vm.box = "ubuntu/trusty64"
  config.vm.network "forwarded_port", guest: 80, host: 8081
  config.vm.network "forwarded_port", guest: 6377, host: 6376
  config.vm.network "private_network", ip: "192.168.2.234"
  config.vm.synced_folder ".", "/vagrant", type: "nfs"

  config.vm.provision :ansible do |ansible|
     ansible.playbook = "provisioning/vagrant-url.yml"
     ansible.groups = {
       "vagrant" => ["default"]
     }
  end

end
