<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body style="margin: 0; padding: 0; font-family: Arial, sans-serif; background-color: #f4f4f4;">
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse; background-color: #ffffff; margin-top: 20px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <tr>
            <td>
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                    <tr>
                        <td bgcolor="#464AC8" style="padding: 20px; text-align: center;">
                            <h5 style="color: #ffffff; margin: 0;">New Contact</h5>
                        </td>
                    </tr>
                    <tr>
                        <td style="background-color: #ffffff;padding: 20px" >
                            <div>
                                <label for="name" style="display: block; margin-bottom: 10px;">Name:</label>
                                <input id="name" type="text" disabled style="width: 100%; padding: 10px; box-sizing: border-box;" value="{{$name}}">
                            </div>
                            <div style="margin-top: 10px;">
                                <label for="email" style="display: block; margin-bottom: 10px;">Email:</label>
                                <input id="email" type="text" disabled style="width: 100%; padding: 10px; box-sizing: border-box;" value="{{$email}}">
                            </div>
                            <div style="margin-top: 10px;">
                                <label for="message" style="display: block; margin-bottom: 10px;">Message:</label>
                                <textarea id="message" disabled style="width: 100%; padding: 10px; box-sizing: border-box;">{{$comment}}</textarea>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style=" background-color: #e1e1e1;text-align: center; padding: 10px; font-size: 12px; color: #666;">
                            <p>This email is sent by Bootcoders</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
