<?php 

// $sensitiveData = "Krossing";
// $salt = bin2hex(random_bytes(16)); // generate random salt
// $pepper = "ASecretPepperString";


// $dataToHash = $sensitiveData . $salt . $pepper;
// $hash = hash("sha256", $dataToHash); // sha256 - hashing algorythm

// /*-----*/

// $sensitiveData = "Krossing";

// $storedSalt = $salt;
// $storedHash = $hash;
// $pepper = "ASecretPepperString";

// $dataToHash = $sensitiveData . $salt . $pepper;

// $verificationHash = hash("sha256", $dataToHash);

// if($storedHash === $verificationHash) {
//     echo "The data are the same.";
//     echo "<br>";
//     echo $storedHash;
//     echo "<br>";
//     echo $verificationHash;
// } else {
//     echo "The data are NOT the same.";
//     echo "<br>";
//     echo $storedHash;
//     echo "<br>";
//     echo $verificationHash;
// }

$pwdSignup = "Krossing";

$options = [
    'cost' => 12
];

$hashedPwd = password_hash($pwdSignup, PASSWORD_BCRYPT, $options);

$pwdLogin = "Krossing";
password_verify($pwdLogin, $hashedPwd);

if(password_verify($pwdLogin, $hashedPwd)) {
    echo "They are the same.";
} else {
    echo "They are not the same.";
}
