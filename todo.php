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

    $input = trim(fgets(STDIN));

    if ($upper == true) {
        $input = strtoupper($input);
    }

    return $input;
}

function sort_menu($items, $sorted_input){

    var_dump($sorted_input);

    switch($sorted_input) {
        case 'a':
            // Run the sort function on list items.
            sort($items);
            //var_dump($items);
            return $items;
            break;
        case 'z':
            rsort($items);
            return $items;
            break;
        // case 'o':
        //     $sorted = ;
        //     return $sorted;
        //     break;
        // case 'r':
        //     $sorted = ;
        //     return $sorted;
        //     break;
    }
    
    
    
}



do {
    // Iterate through list items
    // foreach ($items as $key => $item) {
    //     // Display each item and a newline
       
    //     echo "[{$key}] {$item}\n";
    echo(list_items($items));
   

    

    // Show the menu options
    echo '(N)ew item, (R)emove item, (S)ort, (Q)uit : ';

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
    } 
    elseif ($input == 'R') {
        // Remove which item?
        echo 'Enter item number to remove: ';
        // Get array key
        $key = trim(fgets(STDIN));

         // Remove from array
        unset($items[$key]);
    }
    elseif ($input == 'S') {
        echo 'Enter (A)-Z, (Z)-A, (O)rder entered, or (R)everse  ';
        $sorted_input = get_input();
        $items = sort_menu($items, $sorted_input);
    }
// Exit when input is (Q)uit
} while ($input != 'Q');

// Say Goodbye!
echo "Goodbye!\n";

// Exit with 0 errors
exit(0);