<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrazco Email Template</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;700&display=swap" rel="stylesheet">
</head>
<body style="background-color: #E3E3E3;">
    <table style="width: 100%;" cellpadding="0" cellspacing="0">
        <tr>
            <td>
                <table style="width: 100%; max-width: 750px; margin: auto;" cellpadding="0" cellspacing="0">
                    <tr>
                        <td style="padding: 25px; text-align: center;">
                            <img src="https://carrazco.itulwebdev.com/images/login-logo.png" alt="">
                        </td>
                    </tr>
                    <tr>
                        <td style="background-color: #33424E; border-radius: 5px; padding: 35px 80px;">
                            <table style="width: 100%;" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td>
                                        <h2 style=" font-family: 'Open Sans', sans-serif; font-size: 24px; font-weight: 300; color: #FFFFFF; margin-bottom: 35px;">Forgot Password?</h2>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p style=" font-family: 'Open Sans', sans-serif; font-size: 14px; margin-bottom: 0px; margin-top: 0px; font-weight: 400; color: #A2B7C9;">
                                            A password reset request has been initiated. <a href="{{ route('ResetPasswordGet', $token) }}" style="color: #77C2FF; text-decoration: none;">Click here to reset your password</a>
                                        </p>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="height: 35px;"></td>
                                </tr>


                                <tr>
                                    <td style="background-color: #47555F; border-radius: 5px; padding: 30px;">
                                        <a href="#" style="text-decoration: none;">
                                        <table style="background-color: #D07946; border-radius: 4px; margin: auto; font-size: 12px; color: #fff; font-weight: bold; font-family: 'Open Sans', sans-serif;">
                                            <tr>
                                                <td style="text-align: center; width: 250px; padding: 8px 15px; text-transform: uppercase;">
                                                    <a href="{{ route('ResetPasswordGet', $token) }}"style="color: White">Reset
                                                    Password</a>
                                                </td>
                                            </tr>
                                        </table>
                                    </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="height: 30px;"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <p style=" font-family: 'Open Sans', sans-serif; font-size: 14px; margin-bottom: 0px; margin-top: 0px; font-weight: 400; color: #A2B7C9;">
                                            Or, you can copy the url below and paste it into your browser:
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="height: 10px;"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="#" style="font-family: 'Open Sans', sans-serif; font-size: 14px; text-decoration: none; margin-bottom: 0px; margin-top: 0px; font-weight: 400; color: #77C2FF;">
                                            {{ route('ResetPasswordGet', $token) }}

                                    </td>
                                </tr>
                                <tr>
                                    <td style="height: 25px;"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <hr style="background-color: #62676c; height: 1px; border: none; margin-left: -80px; margin-right: -80px;">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="height: 25px;"></td>
                                </tr>
                                <tr>
                                    <td style="color: #A2B7C9; font-family: 'Open Sans', sans-serif; font-size: 14px;">
                                        Having issues signing into your account? Please <a href="#" style="color: #77C2FF; text-decoration: none;">contact Us</a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
