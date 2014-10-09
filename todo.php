<?php
//start array key at 1 instead of 0
$items = [];
array_unshift($items, "phoney");
unset($items[0]);

// Create array to hold list of todo items


// Iterate through list items
function list_items($items) {
    $string = '';
    foreach ($items as $key => $item) {
        $string .= "[{$key}] {$item}". PHP_EOL;
    }
return $string;
}

// The loop!
function get_input($upper = false){
        $input = trim(strtoupper (fgets(STDIN)));
        return $input;
    }



do {
    // Iterate through list items
    // foreach ($items as $key => $item) {
    //     // Display each item and a newline
       
    //     echo "[{$key}] {$item}\n";
    echo(list_items($items));
   

    

    // Show the menu options
    echo '(N)ew item, (R)emove item, (Q)uit : ';

    // Get the input from user
    // Use trim() to remove whitespace and newlines
    

    $input = get_input(true);
    // $input = trim(strtoupper(fgets(STDIN)));
    //could have also used $input = strtoupper(trim(fgets(STDIN)));

    // Check for actionable input
    if ($input == 'N') {
        // Ask for entry
        echo 'Enter item: ';
        // Add entry to list array
        $items[] = trim(fgets(STDIN));
    } elseif ($input == 'R') {
        // Remove which item?
        echo 'Enter item number to remove: ';
        // Get array key
        $key = trim(fgets(STDIN));
       
        // Remove from array
        unset($items[$key]);
    }
// Exit when input is (Q)uit
} while ($input != 'Q');

// Say Goodbye!
echo "Goodbye!\n";

// Exit with 0 errors
exit(0);