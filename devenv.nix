{ pkgs, ... }: {
  packages = [ pkgs.nodejs-16_x pkgs.yarn pkgs.php80 ];

  languages.php.enable = true;
  services.mysql.enable = true;
}