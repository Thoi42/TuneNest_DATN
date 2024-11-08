<div style="max-width: 600px; margin: 20px auto; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 8px rgba(0,0,0,0.1); background-color: #ffffff;">
        
        <!-- Header -->
        <div style="background-color: #4CAF50; padding: 20px; text-align: center; color: #ffffff;">
            <h2 style="margin: 0;">Password Reset Request</h2>
        </div>

        <!-- Body Content -->
        <div style="padding: 20px; color: #333;">
            <h3 style="color: #333;">Hello, {{ $customer->name }}!</h3>
            <p style="font-size: 16px; line-height: 1.5;">
                We received a request to reset your password. Click the button below to set a new password. If you did not make this request, please ignore this email.
            </p>
            <div style="text-align: center; margin: 30px 0;">
                <a href="{{ url(route('customer.reset_password', ['token' => $token])) }}" style="background-color: #4CAF50; color: #ffffff; padding: 12px 20px; border-radius: 5px; text-decoration: none; font-size: 16px;">
                    Reset Your Password
                </a>
            </div>
            <p style="font-size: 14px; color: #777;">
                If the button above does not work, copy and paste the following link into your browser:
            </p>
            <p style="word-break: break-all; font-size: 14px; color: #4CAF50;">
                <a href="{{ url(route('customer.reset_password', ['token' => $token])) }}" style="color: #4CAF50; text-decoration: none;">
                    {{ url(route('customer.reset_password', ['token' => $token])) }}
                </a>
            </p>
            <p style="font-size: 14px; color: #777; margin-top: 20px;">
                Thank you,<br>
                The Support Team
            </p>
        </div>

        <!-- Footer -->
        <div style="background-color: #f4f4f4; padding: 15px; text-align: center; font-size: 12px; color: #777;">
            &copy; 2024 Your Company. All rights reserved.
        </div>
    </div>