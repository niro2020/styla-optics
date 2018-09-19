<?php

session_start();

$name = strip_tags(htmlspecialchars($_POST['name']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$message = strip_tags(htmlspecialchars($_POST['message']));


$to = "info@stylaoptics.com";
$subject = "Styla Optics - Contact Form";

$message = '
    <html>
    <head>
        <title>Styla Optics - Contact Form </title>
    </head>
    <body style="background-color: #F0F2F5; font-family:">
        <div style="text-align: left; background: white; padding: 40px; width: 500px; ">
            <div style="margin-bottom: 20px; background: red;color: white; font-size: 16px; padding: 10px;">Styla Optics - Contact Form</div>

            <div style="margin-top: 20px; background: #f9f6f6; padding: 10px;">
                
                <table>
                    <tr>
                        <td></td>
                        <td>
                            <table>
                                <tr>
                                    <td valign="top"><div style="color:#888888; font-size: 14px; font-weight: bold;">Name: </div></td>
                                    <td  valign="top"><div style="color:#696767; font-size: 13px; ">' . $name . '</div></td>
                                </tr>
                                <tr>
                                    <td valign="top"><div style="color:#888888; font-size: 14px; font-weight: bold;">Phone: </div></td>
                                    <td  valign="top"><div style="color:#696767; font-size: 13px; ">' . $phone . '</div></td>
                                </tr>
                                <tr>
                                    <td valign="top"><div style="color:#888888; font-size: 14px; font-weight: bold;">Email:</div></td>
                                    <td  valign="top"><div style="color:#696767; font-size: 13px;">' . $email . '</div></td>
                                </tr>
                                <tr>
                                    <td valign="top"> <div style="color:#888888; font-size: 14px; font-weight: bold;">Message:</div></td>
                                    <td  valign="top"><div style="color:#696767; font-size: 13px; ">' . $message . '</div></td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                </table>
            </div>

        </div>
    </body>
</html>';

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: '.$name. "\r\n";
$headers .= 'Cc: <noreply@stylaoptics.com>' . "\r\n";

if (mail($to, $subject, $message, $headers)) {
    $_SESSION['return_msg'] = '<div class = "alert alert-success r-sucess" role = "alert">
        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    Message Send Successfully..!
    </div >';

    header("Location: index.php#contact");
} else {
    $_SESSION['return_msg'] = '<div class="alert alert-danger r-fail" role="alert">
        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
        Message send Failed.Pls try again.
    </div>';
    header("Location: index.php#contact");
}
?>

