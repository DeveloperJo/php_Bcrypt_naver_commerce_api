<?php
namespace App\Common;

class Bcrypt
{
    private $rounds;
    private $secret_key;
 
    public function __construct($rounds = 12, $secret_key = '')
    {
        if (CRYPT_BLOWFISH != 1) {
            echo "Not supported.";
        }
 
        $this->rounds = $rounds;
        $this->secret_key = $secret_key;
    }
 
    public function hash($input)
    {
        $hash = crypt($input, $this->getSalt());
 
        if (strlen($hash) > 13)
            return base64_encode($hash);
 
        return false;
    }
 
    public function verify($input, $existingHash)
    {
        $hash = crypt($input, $existingHash);
 
        return $hash === $existingHash;
    }
 
    private function getSalt()
    {
        $salt = sprintf('$2a$%02d$', $this->rounds);
        $salt = $salt . $this->secret_key;
 
        return $salt;
    }
}
