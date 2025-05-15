<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Universities admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            margin: 0 !important;
            font-family: "Montserrat", sans-serif;
        }

        .header-logo {
            width: 179px;
            padding: 10px;
        }

        .points-section {
            padding: 30px 20px;
            font-family: "Montserrat", sans-serif;
        }

        .content {
            width: 560px;
            text-align: left;
            line-height: 1.9;
        }

        .goals-section {
            font-family: "Montserrat", sans-serif;
        }

        .media-icons i {
            font-size: 30px;
            padding: 0px 15px;
        }

        .more-btn {
            background-color: #53b5ff;
            padding: 10px;
            border-radius: 15px;
            margin-top: 20px !important;
            text-decoration: none;
            color: #ffffff;
        }
    </style>
</head>

<body>
    <!-- ------------------------section 1------------------------------- -->
    <table role="presentation" width="100%" border="0" cellspacing="0" cellpadding="0"
        class="center_iOS">
        <tr>
            <td style="font-size:0px;" class="mobileHide">&nbsp;</td>
            <td align="center" width="700" bgcolor="#ffffff" valign="top" style="width:700px;" class="w100pc">
                <table align="center" bgcolor="#fff" border="0" cellpadding="0" cellspacing="0" class="width-full"
                    role="presentation" style="border-collapse: collapse !important; width: 700px;" width="700">
                    <tr>
                        <section class="header-section">
                            <th align="center" valign="right" dir="ltr" class="header-text-div">
                                <p style="margin: 0; height: 100px; margin-bottom: 40px;">
                                    <img alt="" class="header-logo"
                                        src="https://i.ibb.co/zxbkt0t/university-logo-1-1-removebg-preview.png"
                                        style="width: 100px; margin-top: 20px;" />
                                </p>
                            </th>
                        </section>
                    </tr>
                </table>
            </td>
            <td style="font-size:0px;" class="mobileHide">&nbsp;</td>
        </tr>
    </table>
    <!-- ------------------------section 2 content------------------------------- -->
    <table role="presentation" width="100%" border="0" cellspacing="0" cellpadding="0"
        class="center_iOS">
        <tr>
            <td style="font-size:0px;" class="mobileHide">&nbsp;</td>
            <td align="center" width="700" bgcolor="#ffffff" valign="top" style="width:700px;" class="w100pc">
                <table bgcolor="#fff" border="0" cellpadding="0" cellspacing="0" class="width-full" role="presentation"
                    style="border-collapse: collapse !important; width: 700px; margin-bottom: 30px;" width="700">
                    <tr class="points-section">
                        <div class="content" style="width: 560px; margin: auto;">
                            <p class="recipient">
                                Hello Admin,<br>
                                This is to inform you that a user has searched for a university in the system.
                            </p>
                            <p>
                                <img src="https://i.ibb.co/cwXDwvs/2460166-1.png" style="width: 560px;" alt="">
                            </p>
                            <p class="mail-text">   
                                Search Details:
                                <ul>
                                    <li><strong>University Name:</strong> {{ $student->university->name }}</li>
                                    <li><strong>Student Name:</strong> {{ $student->full_name }}</li>
                                    <li><strong>Email:</strong> {{ $student->email }}</li>
                                    <li><strong>Contact Number:</strong> {{ $student->phone }}</li>
                                    <li><strong>Message:</strong> {{ $student->message ?? 'N/A' }}</li>
                                    <li><strong>Search Date & Time:</strong> {{ now()->format('F d, Y, h:i A') }}</li>
                                </ul>
                            </p>
                            <p>
                            </p>
                            <p class="regards" style="margin-bottom: 0;">
                                If further action is required, please proceed accordingly.<br>
                                Best regards,<br>
                                findmyuniverties team .
                            </p>
                        </div>
                    </tr>
                </table>
            </td>
            <td style="font-size:0px;" class="mobileHide">&nbsp;</td>
        </tr>
    </table>
</body>

</html>