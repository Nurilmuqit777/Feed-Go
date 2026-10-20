<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
</head>

<body style=" margin: 0; padding: 0; background-color: #f5f5f5; font-family: Arial, sans-serif; ">

    <div style=" max-width: 650px; margin: 30px auto; background-color: #ffffff; border-radius: 16px; overflow: hidden; ">

        <div style=" background-color: #1B601E; padding: 30px; text-align: center; ">
            <img src="{{ asset('images/FeedGo.webp') }}" alt="FeedGo" style=" height: 50px; width: auto; ">
        </div>

        <div style="padding: 35px;">

            <h1 style=" margin-top: 0; color: #1B601E; font-size: 26px; ">
                {{ $title }}
            </h1>

            <div style=" color: #333333; font-size: 16px; line-height: 1.8; ">
                {!! $content !!}
            </div>

        </div>

        <div style="background-color: #f5f5f5;padding: 25px;text-align: center;color: #777777;font-size: 13px;">

            <p style="margin: 0 0 8px;">
                © {{ date('Y') }} FeedGo
            </p>

            <p style="margin: 0;">
                Solusi pakan ternak berbasis riset
                untuk produktivitas berkelanjutan.
            </p>

            <p style="margin: 15px 0 0;">

                <a href="{{ URL::signedRoute('newsletter.unsubscribe', ['email' => $subscriberEmail]) }}" style="color: #777777;text-decoration: underline;">
                    Berhenti berlangganan
                </a>

            </p>

        </div>

    </div>

</body>

</html>
