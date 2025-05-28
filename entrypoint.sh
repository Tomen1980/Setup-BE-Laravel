#!/bin/sh

# Jalankan composer install jika folder vendor tidak ada
if [ ! -d "vendor" ]; then
  echo "Installing composer dependencies..."
  composer install
fi

# Jalankan perintah utama
exec "$@"
