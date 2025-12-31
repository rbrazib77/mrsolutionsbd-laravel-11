<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Account Opened - {{ config('app.name') }}</title>
    <style>
        body,
        table,
        td,
        a {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        table {
            border-collapse: collapse !important;
        }

        img {
            border: 0;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
        }

        /* Responsive styles */
        @media screen and (max-width:600px) {
            .wrapper {
                width: 100% !important;
                max-width: 100% !important;
                padding: 12px !important;
            }

            .content {
                padding: 24px !important;
            }

            .btn {
                display: block !important;
                width: 100% !important;
                text-align: center !important;
            }

            .h1 {
                font-size: 22px !important;
            }

            .panel td {
                display: block !important;
                width: 100% !important;
                text-align: left !important;
            }
        }


        .wrapper {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
        }

        .content {
            padding: 48px;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
        }

        .h1 {
            font-size: 32px;
            font-weight: 700;
            margin: 0 0 12px 0;
            color: #fe000c;
            text-align: center;
            font-family: "Roboto", sans-serif;
            text-transform: uppercase;
        }

        .lead {
            font-size: 16px;
            color: #444;
            margin: 0 0 32px 0;
            text-align: center;
            line-height: 1.6;
        }

        .panel {
            background: #f9fafc;
            border-radius: 10px;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.05);
            margin-bottom: 28px;
            width: 100%;
        }

        .panel td {
            padding: 18px 20px;
            font-family: inherit;
            font-size: 15px;
        }

        .panel tr+tr td {
            border-top: 1px solid #e5e9f0;
        }

        .cred-key {
            color: #333333;
            font-weight: 600;
        }

        .cred-val {
            color: #0b5cff;
            font-weight: 700;
            text-align: right;
        }

        .btn {
            background: #fe000c;
            color: #ffffff !important;
            text-decoration: none;
            display: inline-block;
            padding: 14px 26px;
            border-radius: 6px;
            font-weight: 600;
            font-size: 15px;
            margin-top: 20px;
        }

        .btn:hover {
            background: #fe000c;
        }

        .muted {
            color: #7a7a7a;
            font-size: 13px;
            text-align: center;
            margin-top: 24px;
            line-height: 1.5;
        }

        body,
        td {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
        }
    </style>
</head>

<body style="margin:0; padding:20px; background:#f2f4f6;">
    <table width="100%" cellpadding="0" cellspacing="0" role="presentation">
        <tr>
            <td align="center">
                <table class="wrapper" cellpadding="0" cellspacing="0" role="presentation">
                    <tr>
                        <td class="content"
                            style="padding:48px; background:#ffffff; border-radius:12px; box-shadow:0 3px 10px rgba(0,0,0,0.08);">

                            <table width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                <tr>
                                    <td>
                                        <h1 class="h1">Sk Solutions bd</h1>
                                        <p class="lead"><Strong>{{ $created_by }}</Strong> account opened
                                            successfully. Please use
                                            the information below to login.</p>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <table class="panel" cellpadding="0" cellspacing="0" role="presentation">
                                            <tr>
                                                <td class="cred-key">Email Address</td>
                                                <td class="cred-val">{{ $email }}</td>
                                            </tr>
                                            <tr>
                                                <td class="cred-key">Password</td>
                                                <td class="cred-val">{{ $password }}</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="text-align:center;">
                                        <a href="{{ url('/admin/solutions/sk/login') }}" class="btn">Login to your
                                            account</a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <p class="muted">If you did not expect this email, please contact the
                                            administrator or ignore this message.</p>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="padding-top:24px; text-align:center;">
                                        <p style="margin:0; font-size:14px; color:#444;">
                                            Thanks,<br>
                                            {{ config('app.name') }}<br>
                                            Website: <a href="{{ config('app.url') }}"
                                                style="color:#0b5cff; text-decoration:none;">{{ config('app.url') }}</a>
                                        </p>
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
