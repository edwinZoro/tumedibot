<?php

namespace App\Models\Traits;

use Illuminate\Support\Facades\Crypt;

trait EncryptsAttributes
{
    public function getAttribute($key)
    {
        $value = parent::getAttribute($key);

        if (in_array($key, $this->encrypted ?? []) && $value !== null) {
            try {
                return Crypt::decryptString($value);
            } catch (\Throwable $e) {
                \Log::error("Decryption error for {$key}: " . $e->getMessage());
                return null;
            }
        }

        return $value;
    }

    public function setAttribute($key, $value)
    {
        if (in_array($key, $this->encrypted ?? []) && $value !== null) {
            try {
                $value = Crypt::encryptString($value);
            } catch (\Throwable $e) {
                \Log::error("Encryption error for {$key}: " . $e->getMessage());
                throw $e;
            }
        }

        parent::setAttribute($key, $value);
    }

    // Corrección clave: Ajustar parámetros para coincidir con la firma original
    public function getOriginal($key = null, $default = null)
    {
        $original = parent::getOriginal($key);

        if ($key !== null && in_array($key, $this->encrypted ?? [])) {
            try {
                return Crypt::decryptString($original);
            } catch (\Throwable $e) {
                \Log::error("Original decryption failed: $key - " . $e->getMessage());
                return $default;
            }
        }

        return $original;
    }
}