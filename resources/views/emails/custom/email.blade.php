<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $emailSubject }}</title>
    <style>
        @media only screen and (max-width: 480px) {
            .header-logo img { height: 36px !important; }
            .header-divider { display: none !important; }
            .header-tagline p { font-size: 9px !important; letter-spacing: 1px !important; }
            .main-content { padding: 24px 14px !important; }
            .main-title { font-size: 19px !important; }
        }
    </style>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333; margin: 0; padding: 0; background-color: #f8f9fa;">

    <!-- Header -->
    <div style="background-color: #1E3A6E; padding: 18px 16px;">
        <table style="max-width: 600px; margin: 0 auto; width: 100%; border-collapse: collapse;">
            <tr>
                <!-- Logo -->
                <td class="header-logo" style="vertical-align: middle; width: 1%; white-space: nowrap; padding-right: 14px;">
                    <img src="https://genyragroup.com/public/images/logo.jpeg"
                         alt="Genyra Group"
                         style="height: 48px; width: auto; display: block;">
                </td>
                <!-- Divider line -->
                <td class="header-divider" style="vertical-align: middle; width: 1%; white-space: nowrap; padding-right: 14px;">
                    <div style="width: 1px; height: 34px; background-color: rgba(240,236,228,0.3);"></div>
                </td>
                <!-- Tagline — single line on desktop, wraps gracefully on mobile -->
                <td class="header-tagline" style="vertical-align: middle;">
                    <p style="color: #f0ece4; margin: 0; font-size: 11px; letter-spacing: 2px; font-family: monospace; text-transform: uppercase; line-height: 1.6; white-space: nowrap;">
                        THINK &nbsp;·&nbsp; INNOVATE &nbsp;·&nbsp; SOLVE
                    </p>
                </td>
            </tr>
        </table>
    </div>

    <!-- Main Content -->
    <div class="main-content" style="max-width: 600px; margin: 0 auto; padding: 40px 20px; background-color: white;">

        <h1 class="main-title" style="color: #1E3A6E; font-size: 24px; margin-bottom: 20px;">{{ $emailSubject }}</h1>

        <div style="line-height: 1.7; color: #555;">
            {!! $emailMessage !!}
        </div>

        <!-- Divider -->
        <div style="border-top: 2px solid #e9ecef; margin: 40px 0;"></div>

        <!-- Signature -->
        <div style="text-align: center; margin-bottom: 30px;">
            <p style="margin: 0; font-size: 16px;">
                <strong style="color: #1E3A6E;">Best regards,</strong><br>
                <span style="color: #1E3A6E; font-size: 18px;">The genyra Group Team</span><br>
                <a href="https://genyragroup.com" style="color: #00A0C6; text-decoration: none; font-weight: 500;">genyragroup.com</a>
            </p>
        </div>

        <!-- CTA Button -->
        <div style="text-align: center; margin-top: 30px;">
            <a href="https://genyragroup.com"
               style="background: linear-gradient(135deg, #1E3A6E 0%, #00A0C6 100%);
                      color: white;
                      padding: 15px 35px;
                      text-decoration: none;
                      border-radius: 50px;
                      display: inline-block;
                      font-weight: 600;
                      font-size: 14px;
                      letter-spacing: 1px;
                      box-shadow: 0 4px 15px rgba(0,160,198,0.3);">
                Visit Our Website
            </a>
        </div>
    </div>

    <!-- Footer -->
    <div style="background-color: #1E3A6E; padding: 20px; text-align: center;">
        <p style="color: #f0ece4; margin: 0; font-size: 12px;">
            © {{ date('Y') }} genyra Group. All rights reserved.<br>
            <span style="opacity: 0.8; font-size: 11px; margin-top: 5px; display: block;">THINK &nbsp;·&nbsp; INNOVATE &nbsp;·&nbsp; SOLVE</span>
        </p>
    </div>

</body>
</html>