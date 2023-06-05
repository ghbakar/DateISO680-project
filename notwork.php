<?php
$input_file = 'date-input.txt';
$output_file = 'date-output.txt';

// Function to convert date string to ISO 8601 format
function convert_to_iso_date($date_str)
{
    // Define an array of different date formats
    $formats = [
        'm#d#y',      // 09#65#21
        'M d, y',     // Dec 26, 75
        'd*m*Y',      // 15*10*1981
        'Y-m-d',      // 1964-01-10
        'm/d/y',      // 01/11/55
    ];

    // Try each format and return the first successful conversion
    foreach ($formats as $format) {
        $date = DateTime::createFromFormat($format, $date_str);
        if ($date !== false) {
            return $date->format('Y-m-d');
        }
    }

    // Return null if no conversion was successful
    return null;
}

// Read input file and convert dates
$dates = file($input_file, FILE_IGNORE_NEW_LINES);
$converted_dates = array_map('convert_to_iso_date', $dates);

echo '<pre>';
print_r($converted_dates);
echo '</pre>';

// Write converted dates to output file
// file_put_contents($output_file, implode("\n", $converted_dates));



/*

  unset($match[0]);


            // if (is_string($match[1])) {
            //     $day   = $match[2];
            //     $month = $meseci[$match[1]];
            //     $year  =  $year = (strlen($match[3]) < 4) ?  '19' . $match[3] : $match[3];

            //     return $year . '-' . $month . '-' . $day;
            // }

            sort($match);

            if ($match[1] >=  12 &&  $match[1] <=  31) {
                $day   = $match[1];
                $month = $match[0];
            } else {
                $day   = $match[1];
                $month = $match[0];
            }

            if ($match[2] > 23) {
                $year = (strlen($match[2]) < 4) ?  '19' . $match[2] : $match[2];
            } else {
                $year = '20' . $match[2];
            }


            return $year . '-' . $month . '-' . $day;

*/