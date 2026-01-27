#!/bin/bash

# --- Configuration ---
TARGET_DIR="/home/people/emc/www/htdocs/users/verification_restricted/global/"
SEARCH_STR="users/verification/"
REPLACE_STR="users/verification_restricted/"

# Initialize counter
count=0

# --- Safety Check ---
if [ ! -d "$TARGET_DIR" ]; then
    echo "Error: Directory $TARGET_DIR does not exist."
    exit 1
fi

echo "Searching in: $TARGET_DIR"
echo "Replacing '$SEARCH_STR' with '$REPLACE_STR'..."
echo "----------------------------------------------------"

# Find .php files, grep for the string, and loop through results
find "$TARGET_DIR" -type f -name "*.php" -print0 | xargs -0 grep -l "$SEARCH_STR" | while read -r file; do
    
    # Perform replacement
    # Note: If on macOS, use: sed -i '' "s|$SEARCH_STR|$REPLACE_STR|g" "$file"
    sed -i "s|$SEARCH_STR|$REPLACE_STR|g" "$file"
    
    echo "Updated: $file"
    
    # Increment the counter
    ((count++))
    
    # We export the count to a temporary file because while loops 
    # fed by pipes often run in a subshell, losing variable changes.
    echo $count > /tmp/script_count.tmp
done

# Retrieve the final count from the temp file if it exists
if [ -f /tmp/script_count.tmp ]; then
    final_count=$(cat /tmp/script_count.tmp)
    rm /tmp/script_count.tmp
else
    final_count=0
fi

echo "----------------------------------------------------"
echo "Process complete. Total files modified: $final_count"
