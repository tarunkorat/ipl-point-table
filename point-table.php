<?php
include('main/simple_html_dom.php');

$url = "https://www.hindustantimes.com/cricket/ipl/points-table";
$html = file_get_html($url);


// Initialize array
$pointsTable = [];

// Find the correct table
$table = $html->find('table', 0); // Points Table

// echo $cols[0];die;
// echo $html;die;
if ($table) {
    foreach ($table->find('tr') as $i => $row) {
        if ($i === 0) continue; // Skip header

        $cols = $row->find('td');
        if (count($cols) >= 8) {
            // Extract image and name from $cols[1]
            $img = $cols[1]->find('img', 0);
            $teamImg = $img ? $img->getAttribute('data-src') : '';
            $teamName = trim($cols[1]->plaintext); // Includes text with team name

            $pointsTable[] = [
                'team_name' => $teamName,
                'team_logo' => $teamImg,
                'matches'   => trim($cols[2]->plaintext),
                'won'       => trim($cols[3]->plaintext),
                'lost'      => trim($cols[4]->plaintext),
                'tied'      => trim($cols[5]->plaintext),
                'nr'        => trim($cols[6]->plaintext),
                'points'    => trim($cols[7]->plaintext),
                'nrr'       => trim($cols[8]->plaintext),
            ];
        }

        // echo json_encode($pointsTable);
    }
} else {
    echo "Points table not found.";
    exit;
}
?>
