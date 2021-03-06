<?php
// Create array to hold list of todo items
$items = [];

// Iterate through list items
function list_items($items) {
    $string = '';
    foreach ($items as $key => $item) {
        $key++;
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
        
        
        $filename = get_input();
        $handle = fopen($filename, 'r');
        $contents = fread($handle, filesize($filename));
        $contentsArray = explode("\n", $contents);
        
        fclose($handle);

        return $contentsArray;
        
}
//Liz's code
// function saveFile($items) {
//     $fileName = getInput();
//         if (file_exists($fileName)) {
//         fwrite(STDOUT, "File already exists. Save and replace existing file? [Y}es or [No]");
//         $confirm = getInput();
//             if ($confirm == 'n') {
//                 frwrite(STDOUT, 'Save Cancelled.' . PHP_EOL);
//       } else{
//         $openFile = fopen($fileName, 'w+');
//         foreach ($items as $listItem) {
//         fwrite($openFile, $listItem . PHP_EOL);
//     }
//     }


function save($items) {
    
    

}


function add_new($items) {

    
    // Add entry to list array
    $new_item = get_input();
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
    echo '(Op)en, (N)ew item, (R)emove item, (S)ort, (Sa)ve, (Q)uit : ';

    // Get the input from user
     $input = get_input(true);
    // Use trim() to remove whitespace and newlines
    

    // $input = trim(strtoupper(fgets(STDIN)));
    //could have also used $input = strtoupper(trim(fgets(STDIN)));

    // Check for actionable input
    if ($input == 'N') {
        // Ask for entry
        echo 'Enter item: ';
        
        $items = add_new($items);    
    } 
    elseif ($input == 'R') {
        // Remove which item?
        echo 'Enter item number to remove: ';
        // Get array key
        $key = get_input();
        $key--;
         // Remove from array
        unset($items[$key]);
    }
    elseif ($input == 'S') {
        
        //add option to exit
        echo 'Enter (A)-Z, (Z)-A, (O)rder entered, or (R)everse  ';
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
        echo "Please enter file name: ";
        //print_r(open());
        $fileArray = open();
        $items = (array_merge($items, $fileArray));
 
    }
    
    elseif ($input == 'SA') {
        echo "Choose a file to save: ";
        $filename = strtolower(get_input());
        //I don't understand this line. Ask Ryan.
        //$fileName = $items[0];
        
        if (file_exists($filename)){
                echo "You are about to overwrite this file. Do you want to proceed? Enter Y for yes or any other key for no.";
                
                if (get_input() == "Y"){

                    $handle = fopen($input, 'w');
                    fclose($handle);   
                   
                } 
                else {
                    break;
                }
        } 
        else {
            $handle = fopen($input, 'a');
            foreach ($items as $item) {
                fwrite($handle, PHP_EOL . $item);
            }
            fclose($handle);
        }
        
    }
        
        
// Exit when input is (Q)uit
} while ($input != 'Q');

// Say Goodbye!
echo "Goodbye!\n";

// Exit with 0 errors
exit(0);