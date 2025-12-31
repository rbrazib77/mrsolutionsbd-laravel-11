<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Message</title>
</head>

<body style="margin:0; padding:0; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background:#f4f4f7;">

    <table width="100%" cellpadding="0" cellspacing="0" style="padding:20px 0; background:#f4f4f7;">
        <tr>
            <td align="center">

                <table width="600" cellpadding="0" cellspacing="0"
                    style="background:#ffffff; border-radius:8px; overflow:hidden; box-shadow:0 4px 12px rgba(0,0,0,0.1);">

                    <!-- Header with logo -->
                    <tr>
                        <td style="background:#ed1b24; color:#ffffff; padding:20px; text-align:center;">
                            {{-- Logo --}}
                            <img src="https://imgur.com/a/9rEprql" alt="{{ config('app.name') }}"
                                style="max-width:150px; height:auto; display:block; margin:0 auto 10px;">
                            <h1 style="margin:0; font-size:22px; color:#f9f9f9">New Contact Message</h1>
                        </td>
                    </tr>

                    <!-- Body -->
                    <tr>
                        <td style="padding:25px;">

                            {{-- Subject Badge --}}
                            <p style="margin-bottom:20px;">
                                <strong>Subject:</strong>
                                <span
                                    style="display:inline-block; background:#ffc107; color:#333; padding:2px 8px; border-radius:5px; font-size:14px;">
                                    {{ $subject }}
                                </span>
                            </p>

                            {{-- User Info --}}
                            <p style="font-size:16px; color:#333; margin-bottom:10px;"><strong>Name:</strong>
                                {{ $name }}</p>
                            <p style="font-size:16px; color:#333; margin-bottom:10px;"><strong>Email:</strong>
                                {{ $email }}</p>
                            <p style="font-size:16px; color:#333; margin-bottom:10px;"><strong>Phone:</strong>
                                {{ $phone }}</p>

                            {{-- Message Panel --}}
                            <div
                                style="background:#f9f9f9; padding:15px; border-radius:5px; color:#555; font-size:15px; line-height:1.5; margin-top:15px;">
                                {{ $message }}
                            </div>

                            {{-- CTA Button --}}
                            <div style="text-align:center; margin-top:25px;">
                                <a href="{{ url('/') }}" target="_blank"
                                    style="display:inline-block; padding:12px 25px; background:#ed1b24; color:#fff; text-decoration:none; border-radius:5px; font-weight:bold;">Visit
                                    Website</a>
                            </div>

                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="background:#f1f1f1; text-align:center; padding:15px; font-size:13px; color:#777;">
                            &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>

</body>

</html>
