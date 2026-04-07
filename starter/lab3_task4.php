<?php
/**
 * ICS 2371 — Lab 3: Control Structures I
 * Task 4: Nested Conditions — Loan Eligibility Checker [6 marks]
 *
 * @author     Declan Munene
 * @student    ENE212-0061/2023
 * @lab        Lab 3 of 14
 * @unit       ICS 2371
 * @date       April 7, 2026
 */

// ── Test data (Update these values to run Sets A through E) ────────────────
$enrolled       = true;
$gpa            = 2.0;
$annual_income  = 50000;
$previous_loan  = true;

// Initialize decision variables
$decision = "";
$is_eligible = false;

// ── STEP 1: Outer enrollment check (Nested Logic) ──────────────────────────
if ($enrolled) {
    
    // INNER CHECK 1 — GPA requirement
    if ($gpa >= 2.0) {
        
        // INNER CHECK 2 — Household income bracket
        if ($annual_income < 100000) {
            $decision = "Eligible — Full loan award";
            $is_eligible = true;
        } elseif ($annual_income < 250000) {
            $decision = "Eligible — Partial loan (75%)";
            $is_eligible = true;
        } elseif ($annual_income < 500000) {
            $decision = "Eligible — Partial loan (50%)";
            $is_eligible = true;
        } else {
            $decision = "Not eligible — household income exceeds threshold";
            $is_eligible = false;
        }

        // ADDITIONAL RULE — Ternary for renewal vs new application
        // Appended only if the student passed all inner checks
        if ($is_eligible) {
            $decision .= ($previous_loan) ? " | Renewal application" : " | New application";
        }

    } else {
        $decision = "Not eligible — GPA below minimum (2.0)";
    }

} else {
    $decision = "Not eligible — must be an active student";
}

// ── STEP 2: Display result ────────────────────────────────────────────────
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HELB Eligibility Result</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f7f6; padding: 40px; }
        .container { background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); max-width: 600px; margin: auto; }
        h2 { color: #2c3e50; border-bottom: 2px solid #3498db; padding-bottom: 10px; }
        .data-row { display: flex; justify-content: space-between; padding: 10px 0; border-bottom: 1px solid #eee; }
        .label { font-weight: bold; color: #7f8c8d; }
        .value { color: #2c3e50; }
        .decision-box { margin-top: 25px; padding: 20px; border-radius: 8px; font-weight: bold; text-align: center; font-size: 1.1em; }
        .success { background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .fail { background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
    </style>
</head>
<body>

<div class="container">
    <h2>HELB Loan Application Status</h2>
    
    <div class="data-row">
        <span class="label">Enrollment Status:</span>
        <span class="value"><?php echo $enrolled ? "Active Student" : "Not Enrolled"; ?></span>
    </div>
    
    <div class="data-row">
        <span class="label">Current GPA:</span>
        <span class="value"><?php echo number_format($gpa, 1); ?> / 4.0</span>
    </div>
    
    <div class="data-row">
        <span class="label">Annual Household Income:</span>
        <span class="value">KES <?php echo number_format($annual_income); ?></span>
    </div>
    
    <div class="data-row">
        <span class="label">Application History:</span>
        <span class="value"><?php echo $previous_loan ? "Previous Loan Beneficiary" : "First-time Applicant"; ?></span>
    </div>

    <div class="decision-box <?php echo $is_eligible ? 'success' : 'fail'; ?>">
        RESULT: <?php echo $decision; ?>
    </div>
</div>

</body>
</html>