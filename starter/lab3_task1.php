<?php
/**
 * ICS 2371 — Lab 3: Control Structures I
 * Task 1: Simple if and if-else — Warm-Up Exercises [5 marks]
 *
 * @author     Declan Munene
 * @student    ENE212-0061/2023
 * @lab        Lab 3 of 14
 * @unit       ICS 2371
 * @date       April 7, 2026
 */

// ══════════════════════════════════════════════════════════════
// EXERCISE A — Temperature Alert System
// ══════════════════════════════════════════════════════════════
// Declare $temperature = 39.2
$temperature = 39.2;

// Using separate if statements only (no else/elseif)
if ($temperature >= 36.1 && $temperature <= 37.5) {
    echo "Temperature ($temperature): Normal<br>";
}

if ($temperature > 37.5) {
    echo "Temperature ($temperature): Fever<br>";
}

if ($temperature < 36.1) {
    echo "Temperature ($temperature): Hypothermia Warning<br>";
}

// ══════════════════════════════════════════════════════════════
// EXERCISE B — Even or Odd
// ══════════════════════════════════════════════════════════════
$number = 47;

// Check if Even or Odd
if ($number % 2 == 0) {
    echo "$number is EVEN<br>";
} else {
    echo "$number is ODD<br>";
}

// Divisibility checks
echo ($number % 3 == 0) ? "$number is divisible by 3<br>" : "$number is NOT divisible by 3<br>";
echo ($number % 5 == 0) ? "$number is divisible by 5<br>" : "$number is NOT divisible by 5<br>";
echo ($number % 3 == 0 && $number % 5 == 0) ? "$number is divisible by both 3 and 5<br>" : "$number is NOT divisible by both 3 and 5<br>";


// ══════════════════════════════════════════════════════════════
// EXERCISE C — Comparison Chain
// ══════════════════════════════════════════════════════════════
$x = 10; $y = "10"; $z = 10.0;

echo "<h3>Exercise C Results:</h3>";
var_dump($x == $y);   // A: bool(true) - Equality (values match after type juggling)
var_dump($x === $y);  // B: bool(false) - Identity (int vs string)
var_dump($x == $z);   // C: bool(true) - Equality (values match)
var_dump($x === $z);  // D: bool(false) - Identity (int vs float)
var_dump($y === $z);  // E: bool(false) - Identity (string vs float)
var_dump($x <=> $y);  // F: int(0) - Spaceship operator returns 0 if values are equal


// ══════════════════════════════════════════════════════════════
// EXERCISE D — Null & Default Values
// ══════════════════════════════════════════════════════════════
echo "<h3>Exercise D Results:</h3>";

$username = null;
$display  = $username ?? "Guest";
echo "Welcome, $display<br>";

// Chained null coalescing
$config_val = null;
$env_val    = null;
$default    = "system_default";
$result     = $config_val ?? $env_val ?? $default;
echo "Config: $result<br>";

// Custom chained example: Checking for a user profile picture
$user_upload = null;
$gravatar_url = null;
$placeholder = "default_avatar.png";

$final_image = $user_upload ?? $gravatar_url ?? $placeholder;
echo "Profile Image: $final_image<br>";
?>