#!/bin/sh

# Set up Laravel app. Run this script immediately after cloning the codebase.

# Exit if any subcommand fails
set -e

# Copy over configs
#if ! [ -f .env ]; then
#  cp .env.example .env
#fi

# Set up Laravel dependencies via Composer
composer install

# Add live remote
git remote add live ssh://grasseh@grasseh.com/~/grasseh.git
