{ pkgs ? import <nixpkgs> {} }:

pkgs.mkShell {
  buildInputs = [  
    pkgs.php82
    pkgs.php82Packages.box
    pkgs.mysql84
  ];
}
