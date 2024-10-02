<?php
/**
 * 產生隨機UUIDv4。
 * @return 字串 UUID
 */
function generate_uuid()
{
    // 檢查php版本是否大於7
    $b = PHP_MAJOR_VERSION < 7 ? openssl_random_pseudo_bytes(16) : random_bytes(16);
    $b[6] = chr(ord($b[6]) & 0x0f | 0x40);
    $b[8] = chr(ord($b[8]) & 0x3f | 0x80);
    return  vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($b), 4));
}