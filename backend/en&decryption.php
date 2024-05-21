<?php
function encryptId(int $id, string $key): string {
    // Use OpenSSL for encryption
    $cipher_method = 'AES-256-CBC';
    $iv_length = openssl_cipher_iv_length($cipher_method);
    $iv = openssl_random_pseudo_bytes($iv_length);
    $encrypted = openssl_encrypt($id, $cipher_method, $key, 0, $iv);
    return base64_encode($encrypted . '::' . $iv);
}

function decryptId(string $encryptedId, string $key): int {
    // Use OpenSSL for decryption
    $cipher_method = 'AES-256-CBC';
    list($encrypted_data, $iv) = explode('::', base64_decode($encryptedId), 2);
    return intval(openssl_decrypt($encrypted_data, $cipher_method, $key, 0, $iv));
}

/*
// Define a key for encryption and decryption
$key = "y_super_secret_key_123";

// ID to encrypt
$id = 2;

// Encrypt the ID
$encryptedId = encryptId($id, $key);
echo "Encrypted ID: $encryptedId\n";

// Decrypt the encrypted ID
$decryptedId = decryptId($encryptedId, $key);
echo "Decrypted ID: $decryptedId\n";

// Check if the original ID matches the decrypted ID
if ($id === $decryptedId) {
    echo "Encryption and decryption successful!\n";
} else {
    echo "Encryption and decryption failed!\n";
}
*/
?>