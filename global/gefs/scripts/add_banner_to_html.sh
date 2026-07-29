# -----------------------------------------------------------------------------
# add_script_to_html.sh
#
# Description:
#   This script recursively finds all .html files within a specified directory
#   (or the current directory if none is provided) and inserts a specific
#   JavaScript <script> tag just before the closing </head> tag.
#
#   It checks if the script tag already exists to prevent duplicates.
#
# Usage:
#   1. Save the script as 'add_script_to_html.sh'.
#   2. Make it executable: chmod +x add_script_to_html.sh
#   3. Run it in one of two ways:
#      - To search in the current directory: ./add_script_to_html.sh
#      - To search in a specific directory: ./add_script_to_html.sh /path/to/your/folder
#
# -----------------------------------------------------------------------------

# The directory to search in. Defaults to the current directory "." if no argument is given.
SEARCH_DIR="${1:-.}"

# The full script line to be added into the HTML files.
# Using single quotes to prevent shell expansion.
SCRIPT_LINE='<script src="https://www.weather.gov/source/nws/govshutdown.js" defer></script>'

# Sanitize SCRIPT_LINE to remove a potential trailing carriage return (^M).
# This prevents issues if the script itself is saved with Windows line endings.
SCRIPT_LINE="${SCRIPT_LINE%$'\r'}"

# A unique part of the script's src URL used to check if the script already exists.
# This avoids adding the script multiple times if the script is run more than once.
CHECK_PATTERN="www.weather.gov/source/nws/govshutdown.js"

# --- Script Start ---

# First, verify that the target directory actually exists.
if [ ! -d "$SEARCH_DIR" ]; then
    echo "Error: Directory '$SEARCH_DIR' not found."
    exit 1
fi

echo "🔍 Starting search for .html files in directory: '$SEARCH_DIR'"
echo "--------------------------------------------------------"

# Use 'find' to locate all files ending with .html in the specified directory and its subdirectories.
# The `while read -r` loop is a safe way to process filenames that might contain spaces.
find "$SEARCH_DIR" -type f -name "*.html" | while read -r html_file; do

    # Check if the script tag (using the unique pattern) already exists in the file.
    # The '-q' flag for grep makes it "quiet" – it just sets an exit status without producing output.
    if grep -q "$CHECK_PATTERN" "$html_file"; then
        echo "🟡 Skipping: '$html_file' (script tag already exists)"
    else
        # The file does not contain the script tag.
        # Now, check if a </head> tag exists to know where to insert the script.
        if grep -q "</head>" "$html_file"; then
            # Use 'sed' to perform an in-place edit (-i).
            # It finds the line with </head> and inserts the SCRIPT_LINE right before it.
            # Note: The syntax `i\` is for inserting a line before the matched pattern.
            sed -i "/<\/head>/i \\
$SCRIPT_LINE
" "$html_file"
            echo "✅ Added script to: '$html_file'"
        else
            echo "⚠️  Warning: No </head> tag found in '$html_file'. Could not add script."
        fi
    fi
done

echo "--------------------------------------------------------"
echo "🎉 Script finished."
