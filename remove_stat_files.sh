#!/bin/bash

TARGET_DIR="/home/people/emc/www/htdocs/users/verification_restricted/global/"

if [ ! -d "$TARGET_DIR" ]; then
    echo "Directory not found: $TARGET_DIR"
    exit 1
fi

# Count files before deleting
FILE_COUNT=$(find "$TARGET_DIR" -type f -name "*.stat" | wc -l)

if [ "$FILE_COUNT" -gt 0 ]; then
    # Perform the recursive deletion
    find "$TARGET_DIR" -type f -name "*.stat" -delete
    echo "Cleanup complete. Removed $FILE_COUNT .stat files."
else
    echo "No .stat files found to remove."
fi
