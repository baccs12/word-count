<?php
if(isset($_POST['Submit'])){
    // loop through the uploaded files
    foreach ($_FILES as $key => $value){
        $image_tmp = $value['tmp_name'];
        $image = $value['name'];
        $image_file = "{$UPLOADDIR}{$image}";

        // move the file to the permanent location
        if(move_uploaded_file($image_tmp,$image_file)){
            echo <<<HEREDOC
<div style="float:right;margin-right:10px">
    <img src="{$image_file}" alt="file not found" /></br>
</div>
HEREDOC;
        }
        else{
            echo "<h1>image file upload failed, image too big after compression</h1>";
        }
    }
}
else{
    ?>
<form name='newad' method='post' enctype='multipart/form-data' action=''>
    <table>
    <tr>
        <td><input type='file' name='image'></td>
    </tr>
    <tr>
        <td><input name='Submit' type='submit' value='Upload image'></td>
    </tr>
</table>
</form>
<?php
}
?>




<?php
$text = file_get_contents("alice.txt");
$texts = strtolower($text);
preg_split('/\s+/', $texts);
function sortcount($texts){
/**
 * call file and count similar strings
 */


$words = str_word_count($texts, 1);
$frequency = array_count_values($words);

ksort($frequency);
echo '<pre>';
/**
 * all strings
 */
print_r($frequency);
arsort($frequency);

print_r(array_slice($frequency, 0 ,20));
}

sortcount($texts);


// $file = file('todo.csv');
// foreach($file as $k)
//     $csv[] = explode(',', $k);

// print_r($csv);

echo "<html><body><table>\n\n";
$f = fopen("todo.csv", "r");
while (($line = fgetcsv($f)) !== false) {
        echo "<tr>";
        foreach ($line as $cell) {
                echo "<td>" . htmlspecialchars($cell) . "</td>";
        }
        echo "</tr>\n";
}
fclose($f);
echo "\n</table></body></html>";
?>

