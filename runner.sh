#!/bin/bash
if [ ! -d "images" ]; then
  mkdir images
fi
php ./script.php
bash ./backgroundsetter.sh
