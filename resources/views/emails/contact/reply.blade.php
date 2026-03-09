<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Reply to your message - Genyra Group</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333; margin: 0; padding: 0; background-color: #f8f9fa;">
    
    <!-- Header with Logo -->
    <div style="background-color: #1E3A6E; padding: 30px 20px; text-align: center;">
        <div style="max-width: 600px; margin: 0 auto; display: flex; align-items: center; justify-content: space-between; gap: 20px;">
            <!-- Logo -->
            <div style="text-align: center;">
                <img src="https://genyragroup.com/public/images/logo.jpeg" alt="Genyra Group Logo" style="height: 50px; width: auto; margin-bottom: 5px;" onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                <!-- Fallback text logo if image fails -->
                <div style="display: none; color: #f0ece4; font-size: 28px; font-weight: bold; letter-spacing: 2px; line-height: 1;">
                    gen<span style="color: #00A0C6;">y</span>ra <span style="font-style: italic;">Group</span>
                </div>
            </div>
            <!-- Company Info -->
            <div style="text-align: left;">
                <p style="color: #f0ece4; margin: 3px 0 0 0; font-size: 11px; letter-spacing: 2px; font-family: monospace; text-transform: uppercase; line-height: 1;">
                    Think • Innovate • Solve
                </p>
            </div>
        </div>
    </div>
    
    <!-- Main Content -->
    <div style="max-width: 600px; margin: 0 auto; padding: 40px 20px; background-color: white;">
        
        <h1 style="color: #1E3A6E; font-size: 24px; margin-bottom: 20px;">Thank You for Contacting Genyra Group</h1>
        
        <p style="font-size: 16px; margin-bottom: 20px;">Dear {{ $contact->name }},</p>
        
        <p style="font-size: 16px; margin-bottom: 30px; line-height: 1.7;">
            Thank you for reaching out to us. We have received your message and our team is reviewing it. We appreciate your interest in Genyra Group and will respond to your inquiry promptly.
        </p>
        
        <!-- Original Message -->
        <div style="background: #f8f9fa; padding: 25px; border-left: 5px solid #1E3A6E; margin: 30px 0; border-radius: 0 8px 8px 0;">
            <h3 style="color: #1E3A6E; margin-top: 0; font-size: 18px;">Your Original Message:</h3>
            <p style="margin: 10px 0 0 0; font-style: italic; color: #555;">{{ $contact->message }}</p>
        </div>
        
        <!-- Response -->
        <div style="background: linear-gradient(135deg, #f0f8ff 0%, #e6f3ff 100%); padding: 25px; border-left: 5px solid #00A0C6; margin: 30px 0; border-radius: 0 8px 8px 0;">
            <h3 style="color: #00A0C6; margin-top: 0; font-size: 18px;">Our Response:</h3>
            <div style="margin: 15px 0 0 0; line-height: 1.7;">
                {!! $replyMessage !!}
            </div>
        </div>
        
        <!-- Next Steps -->
        <div style="margin: 40px 0;">
            <h3 style="color: #1E3A6E; font-size: 18px;">Next Steps:</h3>
            <ul style="color: #555; line-height: 1.8;">
                <li>If you have any additional questions, please don't hesitate to contact us</li>
                <li>We typically respond within 24-48 hours</li>
                <li>You can reach us directly at <a href="mailto:{{ config('mail.from.address') }}" style="color: #00A0C6; text-decoration: none;">{{ config('mail.from.address') }}</a></li>
            </ul>
        </div>
        
        <!-- Divider -->
        <div style="border-top: 2px solid #e9ecef; margin: 40px 0;"></div>
        
        <!-- Signature -->
        <div style="text-align: center; margin-bottom: 30px;">
            <p style="margin: 0; font-size: 16px;">
                <strong style="color: #1E3A6E;">Best regards,</strong><br>
                <span style="color: #1E3A6E; font-size: 18px;">The Genyra Group Team</span><br>
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
                      box-shadow: 0 4px 15px rgba(0, 160, 198, 0.3);
                      transition: all 0.3s ease;">
                Visit Our Website
            </a>
        </div>
    </div>
    
    <!-- Footer -->
    <div style="background-color: #1E3A6E; padding: 20px; text-align: center;">
        <p style="color: #f0ece4; margin: 0; font-size: 12px;">
            © {{ date('Y') }} genyra Group. All rights reserved.<br>
            <span style="opacity: 0.8; font-size: 11px; margin-top: 5px; display: block;">THINK · INNOVATE · SOLVE</span>
        </p>
    </div>
    
</body>
</html>
