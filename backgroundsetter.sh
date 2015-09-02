#!/bin/bash
filename="$(ls images | sort -R | tail -1)"
gsettings set org.gnome.desktop.background picture-uri file://"$PWD"/images/"$filename"
