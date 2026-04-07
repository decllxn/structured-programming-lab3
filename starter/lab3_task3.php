<?php
/**
 * ICS 2371 — Lab 3: Control Structures I
 * Task 3: switch-case and match Expression [6 marks]
 *
 * @author     Declan Munene
 * @student    ENE212-0061/2023
 * @lab        Lab 3 of 14
 * @unit       ICS 2371
 * @date       April 7, 2026
 */

// ══════════════════════════════════════════════════════════════
// EXERCISE A — Day of Week Classifier
// ══════════════════════════════════════════════════════════════
$day = 3; 

echo "<h3>Exercise A: Day Classifier</h3>";
switch ($day) {
    case 1:
        echo "Monday — Lecture day<br>";
        break;
    case 2:
        echo "Tuesday — Lecture day<br>";
        break;
    case 3:
        echo "Wednesday — Lecture day<br>";
        break;
    case 4:
        echo "Thursday — Lecture day<br>";
        break;
    case 5:
        echo "Friday — Lecture day<br>";
        break;
    case 6:
    case 7:
        echo "Weekend<br>";
        break;
    default:
        echo "Invalid day number ($day). Please use 1-7.<br>";
        break;
}

// ══════════════════════════════════════════════════════════════
// EXERCISE B — HTTP Status Code Explainer
// ══════════════════════════════════════════════════════════════
$status_code = 404;

echo "<h3>Exercise B: HTTP Switch</h3>";
switch ($status_code) {
    case 200:
        echo "200: OK — request succeeded<br>";
        break;
    case 301:
        echo "301: Moved Permanently — resource relocated<br>";
        break;
    case 400:
        echo "400: Bad Request — client error<br>";
        break;
    case 401:
        echo "401: Unauthorized — authentication required<br>";
        break;
    case 403:
        echo "403: Forbidden — access denied<br>";
        break;
    case 404:
        echo "404: Not Found — resource missing<br>";
        break;
    case 500:
        echo "500: Internal Server Error — server fault<br>";
        break;
    default:
        echo "Unknown status code<br>";
        break;
}

// ══════════════════════════════════════════════════════════════
// EXERCISE C — PHP 8 match Expression
// ══════════════════════════════════════════════════════════════
echo "<h3>Exercise C: HTTP Match (PHP 8+)</h3>";

$message = match ($status_code) {
    200 => "OK — request succeeded",
    301 => "Moved Permanently — resource relocated",
    400 => "Bad Request — client error",
    401 => "Unauthorized — authentication required",
    403 => "Forbidden — access denied",
    404 => "Not Found — resource missing",
    500 => "Internal Server Error — server fault",
    default => "Unknown status code",
};

echo "HTTP Status $status_code: $message<br>";

// ══════════════════════════════════════════════════════════════
// EXERCISE D — Written Comparison (For your report)
// ══════════════════════════════════════════════════════════════
/*
  1. KEY DIFFERENCE: 
     'switch' uses loose comparison (==), meaning it will type-juggle (e.g., string "200" equals integer 200).
     'match' uses strict comparison (===), meaning both value AND type must be identical.

  2. EXAMPLE OF DIFFERENCE:
     If $status_code = "200" (a string):
     - switch ($status_code) case 200: would match and print "OK".
     - match ($status_code) 200 => : would NOT match and would go to 'default' (or throw an error).

  3. WHEN TO PREFER SWITCH:
     You might prefer 'switch' if you need to execute complex blocks of logic (multiple lines of code) 
     per case, or if you intentionally want to use "fall-through" logic (omitting breaks) to handle 
     multiple cases with the same code. 'match' is an expression that returns a value and is 
     best for simple mappings.
*/
?>