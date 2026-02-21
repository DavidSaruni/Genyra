<x-mail::message>
# Thank You for Contacting Genyra Group

Dear {{ $contact->name }},

Thank you for reaching out to us. We have received your message and our team is reviewing it.

## Your Original Message:
> {{ $contact->message }}

## Our Response:
{!! $replyMessage !!}

## Next Steps:
- If you have any additional questions, please don't hesitate to contact us
- We typically respond within 24-48 hours
- You can reach us directly at {{ config('mail.from.address') }}

---

Best regards,<br>
The Genyra Group Team<br>
{{ config('app.url') }}

Visit Our Website
</x-mail::button>
</x-mail::message>
