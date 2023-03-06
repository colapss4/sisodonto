<?

namespace App\Services;

use Config\Services;

class EmailService
{
    private $email;

    public function __construct()
    {
        $this->email = Services::email();

        if (ENVIRONMENT == 'production') {
            //
        } else {
            $this->email->protocol = 'smtp';
            $this->email->SMTPHost = 'mailhog';
            $this->email->SMTPPort = 1025;
            $this->email->SMTPCrypto = null;
            $this->email->mailType = 'html';
        }
    }

    public function get()
    {
        return $this->email;
    }
}
