<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>New Contact Submission</title>
	</head>
	<body style="margin:0;padding:0;background:#f6f8fb;font-family:Arial,Helvetica,sans-serif;color:#111;">
		@php
			// normalize contact to object
			$c = isset($contact) ? (is_array($contact) ? (object)$contact : $contact) : (object)[];
		@endphp
		<table cellpadding="0" cellspacing="0" border="0" width="100%" style="background:#f6f8fb;padding:24px 0;">
			<tr>
				<td align="center">
					<table cellpadding="0" cellspacing="0" border="0" width="600" style="background:#ffffff;border-radius:8px;overflow:hidden;">
						<tr>
							<td style="padding:20px 24px;border-bottom:1px solid #eef2f6;text-align:center;">
								<!-- Logo -->
                                <img src="https://genyragroup.com/images/logo.jpeg" alt="Genyra Group" height="40">
							</td>
						</tr>

						<tr>
							<td style="padding:24px;">
								<h2 style="margin:0 0 12px 0;font-size:20px;color:#0b1220;">New Contact Form Submission</h2>
								<p style="margin:0 0 18px 0;color:#556272;">You have received a new message from the website contact form. Details below.</p>

								<table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin:12px 0 20px 0;">
									<tr>
										<td style="padding:8px 0;font-weight:600;color:#0b1220;width:120px;">Name</td>
										<td style="padding:8px 0;color:#334155;">{{ $c->name ?? 'N/A' }}</td>
									</tr>
									<tr>
										<td style="padding:8px 0;font-weight:600;color:#0b1220;">Email</td>
										<td style="padding:8px 0;color:#334155;">{{ $c->email ?? 'N/A' }}</td>
									</tr>
									<tr>
										<td style="padding:8px 0;font-weight:600;color:#0b1220;">Phone</td>
										<td style="padding:8px 0;color:#334155;">{{ $c->phone ?? 'N/A' }}</td>
									</tr>
								</table>

								<div style="margin:16px 0;padding:14px;border-radius:6px;background:#f8fafc;border:1px solid #eef2f6;">
									<div style="font-weight:600;color:#0b1220;margin-bottom:8px;">Subject</div>
									<div style="color:#334155;">{{ $c->subject ?? 'No subject provided' }}</div>
								</div>

								<div style="margin:16px 0;padding:14px;border-radius:6px;background:#f8fafc;border:1px solid #eef2f6;">
									<div style="font-weight:600;color:#0b1220;margin-bottom:8px;">Message</div>
									<div style="color:#334155;white-space:pre-wrap;">{{ $c->message ?? 'No message provided' }}</div>
								</div>

								<p style="color:#6b7280;margin:18px 0 24px 0;">Please review this inquiry and respond to the sender within <strong>24-48 business hours</strong>.</p>

								<p style="text-align:left;margin:0 0 8px 0;">
									<a href="" style="display:inline-block;padding:10px 16px;background:#0ea5e9;color:#ffffff;border-radius:6px;text-decoration:none;font-weight:600;">View All Messages</a>
								</p>
							</td>
						</tr>

						<tr>
							<td style="padding:16px 24px;background:#f1f5f9;border-top:1px solid #e6eef8;">
								<table width="100%">
									<tr>
										<td style="vertical-align:middle;">
											<span style="vertical-align:middle;color:#0b1220;font-weight:700;">Genyra Group Contact System</span>
										</td>
										<td style="text-align:right;vertical-align:middle;color:#6b7280;font-size:13px;">&copy; {{ date('Y') }} Genyra Group Limited</td>
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
