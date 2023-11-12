<?php

namespace SendMail;

use DateTime;
use DateTimeZone;
use PHPMailer\PHPMailer\PHPMailer;

require './system/libraries/libphp-phpmailer/src/PHPMailer.php';

require './system/libraries/libphp-phpmailer/src/SMTP.php';

// require './application/controller/EmailController.php';


class ConfigMail
{

    public $email;
    public $Subject_title;
    public $context_body;
    public $message = '';

    function __construct($email, $Subject_title)
    {
        $this->email = $email;
        $this->Subject_title = $Subject_title;
        // $this->context_body = $context_body;
    }

    // templte ApprovalMail
    function ApproveEamil($value)
    {
        $date = new DateTime('now', new DateTimeZone('Asia/Bangkok'));
        $body = '
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Email</title>
        </head>
        <body>
            <div class="card mb-3">
                <img style="width: 8%; margin-top: 50px;" src="https://aifgrouplaos.la/AIFv2/public/img/aif_favicon.png" alt="AIF-Group">
                <div>
                    <div style="margin-top: 10px;">
                        <h2>' . $value->msg . '</h2>
                        <div>
                            <h4>Requester name: ' . $value->requester_name . '</h4>
                            <h4 style="font-family:Phetsarath OT">Car name: ' . $value->carname . '</h4>
                            <div><b>Location:</b> ' . $value->location . '</div>
                            <div style="margin-top: 10px;"><b>Departure date:</b> ' . $value->departdate . '</div>
                            <div style="margin-top: 10px;"><b>Purpose:</b> ' . $value->purpose . '</div>
                        

                           
                        </div>
                        <div style="margin-top: 30px;">
                            <a href="' . $value->url . '" class="btn btn-success">Takecar link</a>
                        </div>
                    </div>
                </div>
            </div>
        </body>

        </html>
        ';
        return $body;
    }
    function ApproveEamil_stationary($value)
    {
        $date = new DateTime('now', new DateTimeZone('Asia/Bangkok'));
        $body = '
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Email</title>
        </head>
        <body>
            <div class="card mb-3">
                <img style="width: 8%; margin-top: 50px;" src="https://aifgrouplaos.la/AIFv2/public/img/aif_favicon.png" alt="AIF-Group">
                <div>
                    <div style="margin-top: 10px;">
                        <h2>' . $value->msg . '</h2>
                        <div>
                            <h4>Request code: ' . $value->reqCode . '</h4>
                            <h4>Requester name: ' . $value->requester_name . '</h4>
                            <h4 style="font-family:Phetsarath OT">Product Name: ' . $value->pname . '</h4>
                            <div><b>QTY requested:</b> ' . $value->qty_request . '</div>
                            <div style="margin-top: 10px;"><b>Requested date:</b> ' . $value->daterequest . '</div>
                            <div style="margin-top: 10px;"><b>Purpose:</b> ' . $value->remarks . '</div>
                        

                           
                        </div>
                        <div style="margin-top: 30px;">
                            <a href="' . $value->url . '" class="btn btn-success">View link</a>
                        </div>
                    </div>
                </div>
            </div>
        </body>

        </html>
        ';
        return $body;
    }
    function RejectEamil_stationary($value)
    {
        $date = new DateTime('now', new DateTimeZone('Asia/Bangkok'));
        $body = '
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Email</title>
        </head>
        <body>
            <div class="card mb-3">
                <img style="width: 8%; margin-top: 50px;" src="https://aifgrouplaos.la/AIFv2/public/img/aif_favicon.png" alt="AIF-Group">
                <div>
                    <div style="margin-top: 10px;">
                        <h2>' . $value->msg . '</h2>
                        <div>
                            <h4>Request code: ' . $value->reqCode . '</h4>
                            <h4>Requester name: ' . $value->requester_name . '</h4>
                            <h4 style="font-family:Phetsarath OT">Product Name: ' . $value->pname . '</h4>
                            <div><b>QTY requested:</b> ' . $value->qty_request . '</div>
                            <div style="margin-top: 10px;"><b>Requested date:</b> ' . $value->daterequest . '</div>
                            <div style="margin-top: 10px;"><b>Purpose:</b> ' . $value->remarks . '</div>
                        

                           
                        </div>
                        <div style="margin-top: 30px;">
                            <a href="' . $value->url . '" class="btn btn-success">View link</a>
                        </div>
                    </div>
                </div>
            </div>
        </body>

        </html>
        ';
        return $body;
    }

    // Request Mail
    function RequestEamil($value)
    {
        $date = new DateTime('now', new DateTimeZone('Asia/Bangkok'));
        $body = '
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Email</title>
        </head>
        <body>
            <div class="card mb-3">
                <img style="width: 8%; margin-top: 50px;" src="https://aifgrouplaos.la/AIFv2/public/img/aif_favicon.png" alt="AIF-Group">
                <div>
                    <div style="margin-top: 10px;">
                        <h2>' . $value->msg . '</h2>
                        <div>
                        <h4>Requester name: ' . $value->requester_name . '</h4>
                        <h4 style="font-family:Phetsarath OT">Car name: ' . $value->carname . '</h4>
                        <div><b>Location:</b> ' . $value->location . '</div>
                        <div style="margin-top: 10px;"><b>Departure date:</b> ' . $value->departdate . '</div>
                        <div style="margin-top: 10px;"><b>Purpose:</b> ' . $value->purpose . '</div>
                            
                        </div>
                        <div style="margin-top: 30px;">
                            <a href="' . $value->url . '" class="btn btn-success">View details link</a>
                        </div>
                    </div>
                </div>
            </div>
        </body>

        </html>
        ';
        return $body;
    }
    function InformStock_Eamil_template($value)
    {
        $date = new DateTime('now', new DateTimeZone('Asia/Bangkok'));
        $body = '
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Email</title>
        </head>
        <body>
            <div class="card mb-3">
                <img style="width: 8%; margin-top: 50px;" src="https://aifgrouplaos.la/AIFv2/public/img/aif_favicon.png" alt="AIF-Group">
                <div>
                    <div style="margin-top: 10px;">
                        <h2>' . $value->msg . '</h2>
                        <div>
                        <h4>Stock name: ' . $value->pname . '</h4>
                        <h4 style="font-family:Phetsarath OT">Quantity: ' . $value->totalqty . '</h4>
                      
                            
                        </div>
                        <div style="margin-top: 30px;">
                            <a href="' . $value->url . '" class="btn btn-success">View Stock link</a>
                        </div>
                    </div>
                </div>
            </div>
        </body>

        </html>
        ';
        return $body;
    }

    // Submit Mail
    function SubmitEamil($value)
    {
        $daterequest = new DateTime('now', new DateTimeZone('Asia/Bangkok'));
        $body = '
            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Email</title>
            </head>
            <body>
                <div class="card mb-3">
                    <img style="width: 8%; margin-top: 50px;" src="https://aifgrouplaos.la/AIFv2/public/img/aif_favicon.png" alt="AIF-Group">
                    <div>
                        <div style="margin-top: 10px;">
                            <h2>' . $value->msg . '</h2>
                            <div>
                            <h4>Requester name: ' . $value->requester_name . '</h4>
                            <h4 style="font-family:Phetsarath OT">Car name: ' . $value->carname . '</h4>
                            <div><b>Location:</b> ' . $value->location . '</div>
                            <div style="margin-top: 10px;"><b>Departure date:</b> ' . $value->departdate . '</div>
                            <div style="margin-top: 10px;"><b>Purpose:</b> ' . $value->purpose . '</div>
                   
                            </div>
                            <div style="margin-top: 30px;">
                                <a href="' . $value->url . '" class="btn btn-success">Approve link</a>
                            </div>
                        </div>
                    </div>
                </div>
            </body>

            </html>
            ';
        return $body;
    }

    // Reject the request
    function RejectionEamil($value)
    {
        $date = new DateTime('now', new DateTimeZone('Asia/Bangkok'));
        $body = '
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Email</title>
        </head>
        <body>
            <div class="card mb-3">
                <img style="width: 8%; margin-top: 50px;" src="https://aifgrouplaos.la/AIFv2/public/img/aif_favicon.png" alt="AIF-Group">
                <div>
                    <div style="margin-top: 10px;">
                        <h2>' . $value->msg . '</h2>
                        <div>
     
                        <h4>Requester name: ' . $value->requester_name . '</h4>
                        <h4 style="font-family:Phetsarath OT">Car name: ' . $value->carname . '</h4>
                        <div><b>Location:</b> ' . $value->location . '</div>
                        <div style="margin-top: 10px;"><b>Departure date:</b> ' . $value->departdate . '</div>
                        <div style="margin-top: 10px;"><b>Purpose:</b> ' . $value->purpose . '</div>
                           
                        </div>
                        <div style="margin-top: 30px;">
                            <a href="' . $value->url . '" class="btn btn-success">View Rejected link</a>
                        </div>
                    </div>
                </div>
            </div>
        </body>

        </html>

      


        ';
        return $body;
    }

    function getSendEamil($body)
    {
        // Config Mail
        $conn = new PHPMailer();
        $conn->isSMTP();
        $conn->SMTPAuth = true;
        $conn->SMTPSecure = SMTP_ENCRYPTION;
        $conn->Host = SMTP_HOST;
        $conn->Port = SMTP_PORT;
        $conn->Username = SMTP_USERNAME;
        $conn->Password = SMTP_PASS;

        // from email address
        $conn->setFrom(SMTP_USERNAME);
        $conn->Subject = $this->Subject_title;

        //   Receipt eamil Adress
        $conn->AddAddress($this->email);
 
        $conn->isHTML(true);

        // ====================
      
        // ====================

        // Context Body
        $conn->Body = $body;


        if (!$conn->send()) {
            $this->message = 'Can`t Sender Context to Email this !!!';
        } else {
            $this->message = 'Email has been sent to ' . $this->email;
        }

        return $this->message;
    }
}

// Object User
class RequestUser
{

    public $msg;
    public $carname;
    public $requester_name;
    public $location;
    public $departdate;
    public $purpose;
    public $URL;


    function __construct($url, $title, $carname, $requester_name, $location, $departdate,$purpose)
    {
        $this->URL = $url;
        $this->msg = $title;
        $this->carname = $carname;
        $this->requester_name = $requester_name;
        $this->location = $location;
        $this->departdate = $departdate;
        $this->purpose = $purpose;

    }
    public function getUser()
    {
        $obj = (object)[
            'url' => $this->URL,
            'msg' => $this->msg,
            'carname' => $this->carname,
            'requester_name' => $this->requester_name,
            'location' => $this->location,
            'departdate' => $this->departdate,
            'purpose' => $this->purpose,

        ];
        return $obj;
    }
 
 
   
}

// ==========================
class RequestUser_stationary_request
{

    public $msg;
    public $reqCode;
    public $requester_name;
    public $pname;
    public $qty_request;
    public $daterequest;
    public $remarks;
    public $URL;


    function __construct($url, $title, $reqCode, $requester_name, $pname, $qty_request,$daterequest,$remarks)
    {
        $this->URL = $url;
        $this->msg = $title;
        $this->reqCode = $reqCode;
        $this->pname = $pname;
        $this->requester_name = $requester_name;
        $this->qty_request = $qty_request;
        $this->daterequest = $daterequest;
        $this->remarks = $remarks;

    }
    public function getUser_admin_approve()
    {
        $obj = (object)[
            'url' => $this->URL,
            'msg' => $this->msg,
            'reqCode' => $this->reqCode,
            'pname' => $this->pname,
            'requester_name' => $this->requester_name,
            'qty_request' => $this->qty_request,
            'daterequest' => $this->daterequest,
            'remarks' => $this->remarks,

        ];
        return $obj;
    }
 
 
   
}

// =======================
class Inform_stock
{

    public $msg;
    public $pname;
    public $totalqty;
    public $URL;


    function __construct($url, $title,$pname, $totalqty)
    {
        $this->URL = $url;
        $this->msg = $title;
        $this->pname = $pname;
        $this->totalqty = $totalqty;
      

    }
    public function Systeminform_stock()
    {
        $obj = (object)[
            'url' => $this->URL,
            'msg' => $this->msg,
            'pname' => $this->pname,
            'totalqty' => $this->totalqty,

        ];
        return $obj;
    }
}
