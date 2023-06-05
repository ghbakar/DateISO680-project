<?php


define('FILE_PATH', __DIR__ . DIRECTORY_SEPARATOR);

// TODO: SOON fix the script and apply SOLID principles 

/**
 * to define the Year, Month, Day
 */
function DateProccess(string $Date)
{

    $Months = array(
        'Jan' => "01",
        'Feb' => "02",
        'Mar' => "03",
        'Apr' => "04",
        'May' => "05",
        'Jun' => "06",
        'Jul' => "07",
        'Aug' => "08",
        'Sep' => "09",
        'Oct' => "10",
        'Nov' => "11",
        'Dec' => "12"
    );

    if (preg_match('/(\d{2})\*(\d{2})\*(\d{4})/', $Date, $match)) {
        [, $day, $month, $year] = $match;
        return $year . '-' . $month . '-' . $day;
    }

    if (preg_match('/(\d{2})\/(\d{2})\/(\d{2})/', $Date, $match)) {
        $match[3] = ($match[3] <= "23") ?  "20" . $match[3] : "19" . $match[3];
        [, $month, $day, $year] = $match;
        return $year . '-' . $month . '-' . $day;
    }

    if (preg_match('/([A-Za-z]{3}) (\d{2}), (\d{2})/', $Date, $match)) {
        $match[3] = ($match[3] <= "23") ?  "20" . $match[3] : "19" . $match[3];
        [, $month, $day, $year] = $match;
        return $year . '-' . $Months[$month] . '-' . $day;
    }

    if (preg_match('/(\d{2})\#(\d{2})\#(\d{2})/', $Date, $match)) {
        ($match[2] <= "23") ? $match[2] = "20" . $match[2] : $match[2] = "19" . $match[2];
        [, $month, $year, $day] = $match;
        return $year . '-' . $month . '-' . $day;
    }

    if (preg_match('/(\d{4})\-(\d{2})\-(\d{2})/', $Date, $match)) {
        [, $year, $month, $day] = $match;
        return $year . '-' . $month . '-' . $day;
    }
}


$fileContent = file('date-input.txt');

foreach ($fileContent as $Date) {
    file_put_contents('date-output.txt', DateProccess($Date) . "\n", 8);
}
