<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Universities</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
            justify-content:center;
        }
        .content {
            width: 560px;
            text-align: left;
            line-height: 1.9;
            margin:auto;

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
    <table role="presentation" width="100%" bgcolor="#dbdad5" border="0" cellspacing="0" cellpadding="0" class="center_iOS">
        <tr>
            <td align="center" width="700" bgcolor="#ffffff" valign="top" style="width:700px;" class="w100pc">
                <table align="center" bgcolor="#fff" border="0" cellpadding="0" cellspacing="0" class="width-full" role="presentation" style="border-collapse: collapse !important; width: 700px;" width="700">
                    <tr>
                        <th align="center" valign="right" dir="ltr" class="header-text-div">
                            <img alt="" class="header-logo" src="https://i.ibb.co/zxbkt0t/university-logo-1-1-removebg-preview.png" style="width: 100px; margin-top: 20px;" />
                        </th>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <table role="presentation" width="100%" bgcolor="#dbdad5" border="0" cellspacing="0" cellpadding="0" class="center_iOS">
        <tr>
            <td align="center" width="700" bgcolor="#ffffff" valign="top" style="width:700px;" class="w100pc">
                <table bgcolor="#fff" border="0" cellpadding="0" cellspacing="0" class="width-full" role="presentation" style="border-collapse: collapse !important; width: 700px;" width="700">
                    <tr class="points-section">
                        <div class="content">
                            <p class="recipient">
                                Hi {{ $student->full_name }},
                            </p>
                            <p class="mail-text">
                                Thank you for reaching out to FindMyUniversities to explore the {{ $programName }} in the {{ $departmentNames }} at {{ $universityName }}! We hope you found the information you needed to take the next step in your academic journey.
                            </p>
                            <p>
                                <img src="https://i.ibb.co/cwXDwvs/2460166-1.png" style="width: 560px;" alt="">
                                <p style="width: fit-content; margin: auto;">
                                    <a href=" https://orchard.unboundcodes.com" class="more-btn">View more</a>
                                </p>
                            </p>
                            <p>
                                If you have any more questions or need further details, just reply to this email—we're here to assist! You can also stay updated with new programs and scholarships by visiting <a href=" https://orchard.unboundcodes.com">http://findmyuniversities.com</a>.
                            </p>
                            <p>
                                Wishing you the best of luck with your studies, and we hope to see you again soon!
                            </p>
                            <p class="regards">
                                Warm regards,<br>
                                FindMyUniversities Team
                            </p>
                        </div>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <table role="presentation" width="100%" bgcolor="#dbdad5" border="0" cellspacing="0" cellpadding="0" class="center_iOS">
        <tr>
            <td align="center" width="700" bgcolor="#ffffff" valign="top" style="width:700px; text-align:center;" class="w100pc">
                <table align="center" bgcolor="#fff" border="0" cellpadding="0" cellspacing="0" class="width-full" role="presentation" style="border-collapse: collapse !important; width: 700px; margin-bottom: 20px;" width="700">
                    <p>Follow us</p>
                    <p class="media-icons">
                        <a href="#"><i class="fa-brands fa-linkedin" style="color: #0077b5;"></i></a>
                        <a href="#"><i class="fa-brands fa-facebook" style="color: #0866ff;"></i></a>
                        <a href="#"><i class="fa-brands fa-instagram" style="color: #da3843;"></i></a>
                        <a href="#"><i class="fa-brands fa-twitter" style="color: #1c99e6;"></i></a>
                    </p>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>

