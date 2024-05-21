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
    // Ensure IV length is correct (16 bytes)
    $iv = str_pad($iv, 16, "\0"); // Pad IV if necessary
    // Decrypt the data
    $decrypted = openssl_decrypt($encrypted_data, $cipher_method, $key, 0, $iv);
    // Convert the decrypted string to an integer
    $id = intval($decrypted);
    return $id;
}

$key = "y_super_secret_key_123";

?>