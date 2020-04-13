#!/bin/bash

echo "Copying PHP version to HTML directory."

existingdirectory=/var/www/html/mvwater-php

if [-d "$existingdirectory" ]; then
  echo "PHP version directory: $existingdirectory exists!"
  echo "Removing $existingdirectory now."
  { #try
    sudo rm -rv $existingdirectory
    echo "$existingdirectory removed!"
  } || { #catch
    echo "PHP version directory removal failed!"
  }
else
  echo "Existing directory does not exist."
  echo "Current contents of your /var/www/html directory:"
  ls -la /var/www/html
  echo "Attempting to copy new mvwater-php directory."
  { #try
    echo "Copying new mvwater-php directory to your /var/www/html directory."
    sudo cp -r ../mvwater-php /var/www/html
  } || { #catch
    echo "mvwater-php copy failed!"
  }
  echo "Current contents of $existingdirectory"
  ls -la /var/www/html/mvwater-php
fi

echo "All done!"
