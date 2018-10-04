<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <style>
        u + .body {
            line-height: 100% !important;
        }
    </style>
</head>
<body>
<table id="promotion" width="600" border="0" cellpadding="0" cellspacing="0"
       style="margin: 0 auto; font-family: Verdana, Arial;">
    <tr>
        <td style="background-color: #000000; text-align: center;">
            <img id="promotion_01" src="{{ asset('images/mail/potwierdzenie_mailing_01-compressor.jpg') }}" width="600"
                 height="82" border="0" alt="Russell Hobbs" style="float: left;"/>
        </td>
    </tr>
    <tr>
        <td style="background-color: #000000; text-align: center;">
            <h2 style="font-size: 14px; color: #ffffff; font-weight: 400; padding-top: 60px;"><strong>Dziękujemy za
                    udział w promocji Russell Hobbs!</strong> <br/>Kliknij na poniższy link, aby potwierdzić swoje
                zgłoszenie: <br/><br/><a href="{{ route('front.confirm.application', $details) }}"
                                         style="color: #ffffff; text-decoration: none; padding-top: 30px; display: inline-block;">{{ route('front.confirm.application', $details) }}</a>
            </h2>
        </td>
    </tr>
    <tr>
        <td style="background-color: #000000; text-align: center;">
            <img id="promotion_02"
                 src="{{ asset('images/mail/potwierdzenie_mailing_03-compressor.jpg') }}"
                 width="600" height="471" border="0" alt="Zespół Russell Hobbs" style="float: left;"/>
        </td>
    </tr>
    <tr>
        <td style="background-color: #000000; text-align: left;">
            <p style="font-size: 11px;color: #ffffff;margin-top: 15px; margin-bottom: 30px; padding: 0 30px;">
                Otrzymujesz tego maila, ponieważ wyraziłeś/aś zgodę na przetwarzanie danych przez SPECTRUM BRANDS POLAND
                sp. z o.o. z siedzibą w Warszawie, ul. Bitwy Warszawskiej 1920 r. 7A, 02-366 Warszawa, o numerze NIP
                951-19-83-304 wpisanym do rejestru z postanowieniem Sądu Rejonowego w Warszawie, XII Wydział
                Gospodarczy, pod nr KRS: 0000063377. </p>
        </td>
    </tr>
</table>
</body>
</html>
