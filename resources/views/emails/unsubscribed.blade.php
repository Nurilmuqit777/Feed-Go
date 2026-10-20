<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berhenti Berlangganan - Feed Go</title>
    <link rel="icon" href="{{ asset('images/FeedGo.webp') }}">
</head>

<body style="margin: 0; padding: 0; background-color: #f5f5f5; font-family: Arial, sans-serif;">

    <div style="max-width: 500px;margin: 80px auto;padding: 35px;background-color: white;border-radius: 16px;text-align: center;">

        <div style="width: 70px; height: 70px; margin: 0 auto 20px; border-radius: 50%; background-color: #E3EDDF; display: flex; align-items: center; justify-content: center; font-size: 35px; ">
            ✓
        </div>

        <h1 style=" margin: 0; color: #1B601E; font-size: 24px; ">
            Berhasil Berhenti Berlangganan
        </h1>

        <p style=" margin-top: 15px; color: #555555; line-height: 1.6; ">
            Anda tidak akan menerima newsletter FeedGo
            lagi melalui email ini.
        </p>

        <a href="{{ url('/') }}" style=" display: inline-block; margin-top: 15px; padding: 12px 20px; background-color: #1B601E; color: white; text-decoration: none; border-radius: 10px; font-size: 14px; ">
            Kembali ke FeedGo
        </a>

    </div>

</body>

</html>
