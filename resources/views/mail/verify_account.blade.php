<div style="max-width: 600px; margin: 20px auto; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 8px rgba(0,0,0,0.1); background-color: #ffffff;">
        
    <!-- Header -->
    <div style="background-color: #007bff; padding: 20px; text-align: center; color: #ffffff;">
        <h2 style="margin: 0;">Verify Your Account</h2>
    </div>

    <!-- Body Content -->
    <div style="padding: 20px; color: #333;">
        <h3 style="color: #333;">Hello, {{ $account->name }}!</h3>
        <p style="font-size: 16px; line-height: 1.5;">
            Welcome! To complete your registration, please verify your email address by clicking the button below. If you did not create an account, please ignore this email.
        </p>
        <div style="text-align: center; margin: 30px 0;">
            <a href="{{ route('customer.verify', ['email' => $account->email]) }}" style="background-color: #007bff; color: #ffffff; padding: 12px 20px; border-radius: 5px; text-decoration: none; font-size: 16px;">
                Verify Your Account
            </a>
        </div>
        <p style="font-size: 14px; color: #777;">
            If the button above does not work, copy and paste the following link into your browser:
        </p>
        <p style="word-break: break-all; font-size: 14px; color: #007bff;">
            <a href="{{ route('customer.verify', ['email' => $account->email]) }}" style="color: #007bff; text-decoration: none;">
                {{ route('customer.verify', ['email' => $account->email]) }}
            </a>
        </p>
        <p style="font-size: 14px; color: #777; margin-top: 20px;">
            Thank you,<br>
            The Support Team
        </p>
    </div>

    <!-- Footer -->
    <div style="background-color: #f4f4f4; padding: 15px; text-align: center; font-size: 12px; color: #777;">
        &copy; 2024 TuneNest. All rights reserved.
    </div>
</div>