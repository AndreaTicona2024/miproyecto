<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Email extends BaseConfig
{
    public string $fromEmail  = 'tuemail@gmail.com'; // Tu dirección de correo electrónico de Gmail
    public string $fromName   = 'Tu Nombre o Empresa'; // El nombre que aparecerá en el correo

    /**
     * The "user agent"
     */
    public string $userAgent = 'CodeIgniter';

    /**
     * The mail sending protocol: mail, sendmail, smtp
     */
    public string $protocol = 'smtp'; // Usa 'smtp' para enviar correos a través de SMTP

    /**
     * SMTP Server Hostname
     */
    public string $SMTPHost = 'smtp.gmail.com'; // Servidor SMTP de Gmail

    /**
     * SMTP Username
     */
    public string $SMTPUser = 'tuemail@gmail.com'; // Tu dirección de correo electrónico de Gmail

    /**
     * SMTP Password
     */
    public string $SMTPPass = 'tucontraseña'; // Tu contraseña de Gmail o contraseña de aplicación

    /**
     * SMTP Port
     */
    public int $SMTPPort = 587; // Puerto para TLS (STARTTLS)

    /**
     * SMTP Timeout (in seconds)
     */
    public int $SMTPTimeout = 60; // Timeout en segundos

    /**
     * Enable persistent SMTP connections
     */
    public bool $SMTPKeepAlive = false;

    /**
     * SMTP Encryption.
     *
     * @var string '', 'tls' or 'ssl'. 'tls' will issue a STARTTLS command
     *             to the server. 'ssl' means implicit SSL. Connection on port
     *             465 should set this to ''.
     */
    public string $SMTPCrypto = 'tls'; // Usa 'tls' para STARTTLS

    /**
     * Enable word-wrap
     */
    public bool $wordWrap = true;

    /**
     * Character count to wrap at
     */
    public int $wrapChars = 76;

    /**
     * Type of mail, either 'text' or 'html'
     */
    public string $mailType = 'html'; // Cambia a 'html' si estás enviando correos en formato HTML

    /**
     * Character set (utf-8, iso-8859-1, etc.)
     */
    public string $charset = 'UTF-8';

    /**
     * Whether to validate the email address
     */
    public bool $validate = false;

    /**
     * Email Priority. 1 = highest. 5 = lowest. 3 = normal
     */
    public int $priority = 3;

    /**
     * Newline character. (Use “\r\n” to comply with RFC 822)
     */
    public string $CRLF = "\r\n";

    /**
     * Newline character. (Use “\r\n” to comply with RFC 822)
     */
    public string $newline = "\r\n";

    /**
     * Enable BCC Batch Mode.
     */
    public bool $BCCBatchMode = false;

    /**
     * Number of emails in each BCC batch
     */
    public int $BCCBatchSize = 200;

    /**
     * Enable notify message from server
     */
    public bool $DSN = false;
}
