<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MailController extends Controller
{
    public function sub_mail()
    {
        //Including dependencies and generating new PHPMailer instance
        require base_path("vendor/autoload.php");
        $mail = new PHPMailer(true);

        //Selecting only users which have bookmarks and making an email array
        $check = DB::select('select email from users where user_subs <> "[]"');
        for ($i=0; $i < count($check); $i++) { 
            $mail_to_users[$i] = $check[$i]->email;
        }

        if (empty($mail_to_users)) {
            return 0;
        } else {
            //Sending email to each and every email address in the above defined array
            foreach ($mail_to_users as $mail_to_users) {
                try {
                    //Email config settings
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com'; //Host is gmail
                    $mail->SMTPAuth = true;
                    $mail->Username = 'test@gmail.com'; //Your E-mail
                    $mail->Password = '1234'; //Your E-mail password
                    $mail->SMTPSecure = 'tls';
                    $mail->Port = 587;
    
                    //Email To and From
                    $mail->setFrom('test@gmail.com', 'Laraquest');
                    $mail->addAddress($mail_to_users);
    
                    //Email Subject and Body
                    $mail->Subject = 'New Updates';
                    $mail->isHTML(true);
                    $mail->Body = 'There are new updates in your subscribed threads.<br>Hop on to see if your issue is resolved or not?';
    
                    if(!$mail->send()){
                        return 1;
                    }else{
                        return 0;
                    }
    
                } catch (Exception $e) {
                    return 0;
                }
            }
        }
    }

    public function forgot_password(Request $request)
    {
        //Including dependencies and generating new PHPMailer instance
        require base_path("vendor/autoload.php");
        $mail = new PHPMailer(true);

        $email = $request->email;
        $username = $request->username;
        //Generating and encrypting new password
        $new_password = Str::random(10);
        $crypt_new_password = bcrypt($new_password);

        $check = DB::select('select * from users where username = ? and email = ?', [$username,$email]);

        //Checking if User Credentials are correct or if the specified user exists
        if (empty($check)) {
            return redirect()->back()->with('alert', 'Username does not exists!');
        } else {
            //Updating old password with new password
            $insert = DB::update('update users set password = ?, password_values = ? where email = ? and username = ?', [$crypt_new_password,$new_password,$email,$username]);

            if ($insert) {
                try {
                    //Email config settings
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com'; //Host is gmail
                    $mail->SMTPAuth = true;
                    $mail->Username = 'test@gmail.com'; //Your E-mail
                    $mail->Password = '1234'; //Your E-mail password
                    $mail->SMTPSecure = 'tls';
                    $mail->Port = 587;

                    //Email To and From
                    $mail->setFrom('test@gmail.com', 'Laraquest');
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
                    //E-mail related exceptions
                    return redirect()->back()->with('alert', 'Something seems wrong, please try again!');
                }
            } else {
                //Database related error
                return redirect()->back()->with('alert', 'Something seems wrong, please try again!');
            }
        }
    }
}
