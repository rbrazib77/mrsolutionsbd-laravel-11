<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    <style>
        @media only screen and (max-width: 600px) {
            .card {
                width: 100% !important;
                padding: 25px 20px !important;
            }

            h2 {
                font-size: 18px !important;
            }

            .btn a {
                display: block !important;
                width: 100% !important;
                text-align: center !important;
            }
        }
    </style>
</head>

<body style="margin:0; padding:0; font-family: Arial, sans-serif; background-color:#2563eb;">

    <!-- Wrapper -->
    <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%"
        style="background-color:#ed1b24; margin:0; padding:40px 15px;">
        <tr>
            <td align="center">

                <!-- Card -->
                <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="500" class="card"
                    style="background-color:#ffffff; border-radius:12px; box-shadow:0 6px 20px rgba(0,0,0,0.15);">
                    <tr>
                        <td style="padding:40px 30px; text-align:center;">

                            <!-- Logo -->
                            <div
                                style="font-size:18px; font-weight:bold; letter-spacing:2px; color:#111827; margin-bottom:5px;text-transform:uppercase;">
                                SK Solutions
                            </div>

                            <!-- Title -->
                            <h2 style="font-size:20px; font-weight:600; color:#111827; margin:15px 0 25px;">
                                Reset your password
                            </h2>

                            <!-- Message -->
                            <div
                                style="text-align:left; color:#374151; font-size:15px; line-height:1.6; margin-bottom:25px;">
                                <p style="margin:0 0 10px;"><strong>Hey {{ $user->name ?? 'Admin' }},</strong></p>
                                <p style="margin:0 0 10px;">Need to reset your password? No problem! Just click the
                                    button below and you’ll be on your way.</p>
                                <p style="margin:0;">If you did not make this request, please ignore this email.</p>
                            </div>

                            <!-- Button -->
                            <table role="presentation" border="0" cellpadding="0" cellspacing="0" align="center"
                                class="btn" style="margin-top:20px;">
                                <tr>
                                    <td align="center" bgcolor="#2563eb" style="border-radius:8px;">
                                        <a href="{{ $url }}"
                                            style="display:inline-block; padding:14px 28px; font-size:15px; font-weight:600; color:#ffffff; text-decoration:none; border-radius:8px; background-color:#ed1b24;">
                                            Reset your password
                                        </a>
                                    </td>
                                </tr>
                            </table>

                        </td>
                    </tr>
                </table>
                <!-- End Card -->

            </td>
        </tr>
    </table>
    <!-- End Wrapper -->

</body>

</html>
