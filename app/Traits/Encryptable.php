<?php
namespace App\Traits;

use Illuminate\Support\Facades\Crypt;
trait Encryptable{
    protected array $encryptable = [];
    public function getAttribute($key){
        $value = parent::getAttribute($key);
        if($value !== null && in_array($key, $this->encryptable ?? [])){
            $value = Crypt::decryptString($value);
        }
        return $value;
    }
    public function setAttribute($key, $value){
        if($value && in_array($key, $this->encryptable)){
            $value = Crypt::encryptString($value);
        }
        return parent::setAttribute($key, $value);
    }
}
