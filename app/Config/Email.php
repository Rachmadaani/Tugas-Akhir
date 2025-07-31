<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Email extends BaseConfig
{
    public string $fromEmail  = 'cseventolahraga@gmail.com'; // Ganti dengan email kamu
    public string $fromName   = 'Admin Event';
    public string $recipients = '';

    public string $userAgent = 'CodeIgniter';
    public string $protocol  = 'smtp';
    public string $SMTPHost  = 'smtp.gmail.com';
    public string $SMTPUser  = 'cseventolahraga@gmail.com'; // Ganti dengan email kamu
    public string $SMTPPass  = 'blsnivvpfkskbblb'; // Ganti dengan App Password Gmail kamu
    public int    $SMTPPort  = 587;
    public bool   $SMTPKeepAlive = false;
    public string $SMTPCrypto = 'tls';

    public bool   $wordWrap = true;
    public int    $wrapChars = 76;
    public string $mailType = 'text';
    public string $charset  = 'UTF-8';
    public bool   $validate = true;
    public int    $priority = 3;
    public string $CRLF = "\r\n";
    public string $newline = "\r\n";
    public bool   $BCCBatchMode = false;
    public int    $BCCBatchSize = 200;
    public bool   $DSN = false;
}
