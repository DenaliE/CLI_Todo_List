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

// Make selection input uppercase
function get_input($upper = false){

    $input = trim(fgets(STDIN));

    if ($upper == true) {
        $input = strtoupper($input);
    }

    return $input;
}

function sort_menu($items, $sorted_input) {

    //test var_dump($sorted_input);

    switch($sorted_input) {
        case 'a':
            // Run the sort function on list items.
            asort($items);
            //var_dump($items);
            return $items;
            break;
        case 'z':
            arsort($items);
            return $items;
            break;
        case 'o':
            ksort($items);
            return $items;
            break;
        //     $sorted = ;
        //     return $sorted;
        //     break;
        case 'r':
             krsort($items);
             return $items;
             break;
                
        //     $sorted = ;
        //     return $sorted;
        //     break;
    }
}

function open() {
        
        Echo "Please enter file name: ";
        $filename = trim(fgets(STDIN));
        $handle = fopen($filename, 'r');
        $contents = fread($handle, filesize($filename));
        $contentsArray = explode("\n", $contents);
        return $contentsArray;
        fclose($handle);
        
}

function add_new($items) {

    // Ask for entry
    echo 'Enter item: ';
    // Add entry to list array
    $new_item = trim(fgets(STDIN));
    
    echo "Do you want to add your new item to the end or the beginning?".PHP_EOL;
    echo "Enter F for front or B for back.".PHP_EOL;

    $input = get_input(true);

    if ($input == 'F') {
        
        array_unshift($items, $new_item);
        return $items;
    }
    elseif ($input == 'B') {
        
        array_push($items, $new_item);
        return $items;
    }
    else {
        // var_dump($items);
        echo "Please enter either F or B.";
  
     }
}
// _______________________________________
do {
    // Iterate through list items
    // foreach ($items as $key => $item) {
    //     // Display each item and a newline
       
    echo list_items($items); 
    
   
    // Show the menu options
    echo '(Op)en, (N)ew item, (R)emove item, (S)ort, (Q)uit : ';

    // Get the input from user
     $input = get_input(true);
    // Use trim() to remove whitespace and newlines
    

    // $input = trim(strtoupper(fgets(STDIN)));
    //could have also used $input = strtoupper(trim(fgets(STDIN)));

    // Check for actionable input
    if ($input == 'N') {
        $items = add_new($items); 
        //echo "[{$key}] {$item}\n";
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
        
        //add option to exit
        echo 'Enter (Op)en, (A)-Z, (Z)-A, (O)rder entered, or (R)everse  ';
        $sorted_input = get_input();
        $items = sort_menu($items, $sorted_input);
    }
    elseif ($input == 'L') {
        array_unshift($items);
    }
    elseif ($input == 'F') {
        array_pop($items);
    }

    elseif ($input == 'O') {
        
        //add option to reorder list
        echo 'Enter (A)-Z, (Z)-A, (O)rder entered, or (R)everse  ';
        $sorted_input = get_input();
        $items = sort_menu($items, $sorted_input);
    }

    elseif ($input == 'OP') {
        //add option to open a file
        
        //print_r(open());
        $file_Array = open();
        print_r(array_merge($items, $file_Array));

    
    }
// Exit when input is (Q)uit
} while ($input != 'Q');

// Say Goodbye!
echo "Goodbye!\n";

// Exit with 0 errors
exit(0);