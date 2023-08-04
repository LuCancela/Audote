<?php

/**
 * REQUIRED SETTINGS
 *
 * You will probably need to change all of these settings for your own site.
 */

// The name and address which should be used for the sender details.
// The name can be anything you want, the address should be something in your own domain. It does not need to exist as a mailbox.
define('CONTACTFORM_FROM_ADDRESS', 'audote@gmail.com');
define('CONTACTFORM_FROM_NAME', 'Audote');

// The name and address to which the contact message should be sent.
// These details should NOT be the same as the sender details.
define('CONTACTFORM_TO_ADDRESS', '');
define('CONTACTFORM_TO_NAME', '');

// The details of your SMTP service, e.g. Gmail.
define('CONTACTFORM_SMTP_HOSTNAME', 'smtp.gmail.com');
define('CONTACTFORM_SMTP_USERNAME', 'naocompreaudote@gmail.com');
define('CONTACTFORM_SMTP_PASSWORD', 'xtgqacjsiybwugsr');

// The reCAPTCHA credentials for your site. You can get these at https://www.google.com/recaptcha/admin
// chaves para o localhost
define('CONTACTFORM_RECAPTCHA_SITE_KEY', '6Lfw82kmAAAAADAdio4fxWPTof-sJj6tZ2r9awwy');
define('CONTACTFORM_RECAPTCHA_SECRET_KEY', '6Lfw82kmAAAAAG-QqCbwh2OOqb7sKbMVIWgGavDe');

// chaves para o site audote.epizy.com
// define('CONTACTFORM_RECAPTCHA_SITE_KEY', '6LfpBGomAAAAAPW8KD8hN11bhAyThSwxkzKqP6P0');
// define('CONTACTFORM_RECAPTCHA_SECRET_KEY', '6LfpBGomAAAAAFjUY-KL_HrI-Kspp5wmiXpeRR7-');

/**
 * Optional Settings
 */

// The debug level for PHPMailer. Default is 0 (off), but can be increased from 1-4 for more verbose logging.
define('CONTACTFORM_PHPMAILER_DEBUG_LEVEL', 0);

// Which SMTP port and encryption type to use. The default is probably fine for most use cases.
define('CONTACTFORM_SMTP_PORT', 587);
define('CONTACTFORM_SMTP_ENCRYPTION', 'tls');

// Character encoding settings. The default is probably fine for most use cases.
define('CONTACTFORM_MAIL_CHARSET', 'iso-8859-1'); // Can be: us-ascii, iso-8859-1, utf-8. Default: iso-8859-1.
define('CONTACTFORM_MAIL_ENCODING', '8bit'); // Can be: 7bit, 8bit, base64, binary, quoted-printable. Default: 8bit.

// The language used for error message and the like.
// Supports 2 letter language codes, e.g. en, fr, es, cn. Default: en.
define('CONTACTFORM_LANGUAGE', 'en');
