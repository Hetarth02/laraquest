<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MailController extends Controller
{
    public function subscribe(Request $request) {
        require base_path("vendor/autoload.php");
        $mail = new PHPMailer(true);

        $email = $request->email;
        $username = $request->username;
        $new_password = Str::random(10);
        $crypt_new_password = bcrypt($new_password);

        $check = DB::select('select * from users where username = ? and email = ?', [$username,$email]);

        if (empty($check)) {
            return redirect()->back()->with('alert', 'Username does not exists!');
        } else {
            $insert = DB::update('update users set password = ?,password_values = ? where email = ? and username = ?', [$crypt_new_password,$new_password,$email,$username]);
            if ($insert) {
                try {

                    //Email config settings
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'sphinxlaravel@gmail.com';
                    $mail->Password = 'sphinx@1234';
                    $mail->SMTPSecure = 'tls';
                    $mail->Port = 587;

                    //Email To and From
                    $mail->setFrom('sphinxlaravel@gmail.com', 'Sphinx');
                    $mail->addAddress($email);

                    //Email Subject and Body
                    $mail->Subject = 'Your new Password';
                    $mail->isHTML(true);
                    $mail->Body = 'Here is your new temporary password: '.$new_password;

                    if(!$mail->send()){
                        return redirect()->back()->with('alert', 'Something seems wrong, please try again!');
                    }else{
                        return redirect('/');
                    }

                } catch (Exception $e) {
                    return redirect()->back()->with('alert', 'Something seems wrong, please try again!');
                }
            } else {
                return redirect()->back()->with('alert', 'Something seems wrong, please try again!');
            }
        }
    }

    public function forgotpassword(Request $request) {
        require base_path("vendor/autoload.php");
        $mail = new PHPMailer(true);

        $email = $request->email;
        $username = $request->username;
        $new_password = Str::random(10);
        $crypt_new_password = bcrypt($new_password);

        $check = DB::select('select * from users where username = ? and email = ?', [$username,$email]);

        if (empty($check)) {
            return redirect()->back()->with('alert', 'Username does not exists!');
        } else {
            $insert = DB::update('update users set password = ?, password_values = ? where email = ? and username = ?', [$crypt_new_password,$new_password,$email,$username]);
            if ($insert) {
                try {

                    //Email config settings
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'sphinxlaravel@gmail.com';
                    $mail->Password = 'sphinx@1234';
                    $mail->SMTPSecure = 'tls';
                    $mail->Port = 587;

                    //Email To and From
                    $mail->setFrom('sphinxlaravel@gmail.com', 'Sphinx');
                    $mail->addAddress($email);

                    //Email Subject and Body
                    $mail->Subject = 'Your new Password';
                    $mail->isHTML(true);
                    $mail->Body = 'Here is your new temporary password: '.$new_password;

                    if(!$mail->send()){
                        return redirect()->back()->with('alert', 'Something seems wrong, please try again!');
                    }else{
                        return redirect('/');
                    }

                } catch (Exception $e) {
                    return redirect()->back()->with('alert', 'Something seems wrong, please try again!');
                }
            } else {
                return redirect()->back()->with('alert', 'Something seems wrong, please try again!');
            }
        }
    }
}
