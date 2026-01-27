#!/bin/bash

# --- Configuration ---
# Replace these with your actual paths
SOURCE="/home/people/emc/www/htdocs/users/verification/global/gefs/expr/"
DESTINATION="/home/people/emc/www/htdocs/users/verification_restricted/global/aigefs/dev/"

# --- Execution ---
# Check if source exists
if [ ! -d "$SOURCE" ]; then
    echo "Error: Source directory $SOURCE does not exist."
    exit 1
fi

echo "Starting copy from $SOURCE to $DESTINATION"

# rsync flags:
# -a: Archive mode (preserves permissions, symlinks, and recurses)
# -v: Verbose (shows you what is happening)
# --exclude: Tells rsync to skip specific patterns
rsync -av \
  --exclude='*.png' \
  --exclude='*.gif' \
  "$SOURCE" "$DESTINATION"

echo "Done! Images were excluded."
