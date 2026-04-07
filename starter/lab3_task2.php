<?php
/**
 * ICS 2371 — Lab 3: Control Structures I
 * Task 2: JKUAT Grade Classification System [8 marks]
 *
 * @author     Declan Munene
 * @student    ENE212-0061/2023
 * @lab        Lab 3 of 14
 * @unit       ICS 2371
 * @date       April 7, 2026
 */

// ── Test Data Set A (Update these values for Sets B, C, D, and E) ──────────
$name  = "Declan Munene"; 
$cat1  = 8;  
$cat2  = 7;  
$cat3  = 9;  
$cat4  = 6;  
$exam  = 52; 

// ── STEP 1: Compute total ─────────────────────────────────────────────────
$total = $cat1 + $cat2 + $cat3 + $cat4 + $exam;

// ── STEP 2: Count CATs attended ───────────────────────────────────────────
$cats_attended = 0;
if ($cat1 > 0) $cats_attended++;
if ($cat2 > 0) $cats_attended++;
if ($cat3 > 0) $cats_attended++;
if ($cat4 > 0) $cats_attended++;

// ── STEP 3: Eligibility check (nested if) ─────────────────────────────────
$eligible = false;
$grade = "N/A";
$desc = "N/A";
$supp_status = "N/A";

if ($cats_attended >= 3 && $exam >= 20) {
    $eligible = true;
    
    // Grade classification
    if ($total >= 70) {
        $grade = "A";
        $desc = "Distinction";
    } elseif ($total >= 65) {
        $grade = "B+";
        $desc = "Credit Upper";
    } elseif ($total >= 60) {
        $grade = "B";
        $desc = "Credit Lower";
    } elseif ($total >= 55) {
        $grade = "C+";
        $desc = "Pass Upper";
    } elseif ($total >= 50) {
        $grade = "C";
        $desc = "Pass Lower";
    } elseif ($total >= 40) {
        $grade = "D";
        $desc = "Marginal Pass";
    } else {
        $grade = "E";
        $desc = "Fail";
    }

    // Supplementary ternary rule
    $supp_status = ($grade == "D") ? "Eligible for Supplementary Exam" : "Not eligible for supplementary";

} else {
    $eligible = false;
    $desc = "DISQUALIFIED — Exam conditions not met";
}

// ── STEP 4: Display formatted HTML report card ────────────────────────────
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>JKUAT Student Report Card</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; line-height: 1.6; }
        .report-card { border: 2px solid #2c3e50; padding: 20px; width: 500px; border-radius: 8px; }
        h2 { color: #2c3e50; border-bottom: 2px solid #2c3e50; padding-bottom: 10px; }
        .row { display: flex; justify-content: space-between; margin-bottom: 8px; border-bottom: 1px solid #eee; }
        .label { font-weight: bold; }
        .status-box { margin-top: 15px; padding: 10px; border-radius: 4px; font-weight: bold; text-align: center; }
        .eligible { background-color: #d4edda; color: #155724; }
        .disqualified { background-color: #f8d7da; color: #721c24; }
    </style>
</head>
<body>

<div class="report-card">
    <h2>Academic Report Card</h2>
    <div class="row"><span class="label">Student Name:</span> <span><?php echo $name; ?></span></div>
    <div class="row"><span class="label">CAT Scores:</span> <span><?php echo "$cat1, $cat2, $cat3, $cat4"; ?></span></div>
    <div class="row"><span class="label">Exam Score:</span> <span><?php echo $exam; ?> / 60</span></div>
    <div class="row"><span class="label">CATs Attended:</span> <span><?php echo $cats_attended; ?> / 4</span></div>
    <div class="row"><span class="label">Total Marks:</span> <span><?php echo $total; ?> / 100</span></div>
    
    <?php if ($eligible): ?>
        <div class="status-box eligible">
            Grade: <?php echo "$grade ($desc)"; ?><br>
            <?php echo $supp_status; ?>
        </div>
    <?php else: ?>
        <div class="status-box disqualified">
            <?php echo $desc; ?>
        </div>
    <?php endif; ?>
</div>

</body>
</html>