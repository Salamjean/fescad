<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Statut de votre réservation - FESCAD</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            background-color: #1e4356;
            color: #ffffff;
            padding: 15px;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }

        .content {
            padding: 20px;
            line-height: 1.6;
            color: #333333;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 12px;
            color: #999999;
        }

        .status-badge {
            display: inline-block;
            padding: 8px 15px;
            border-radius: 20px;
            font-weight: bold;
            color: white;
            text-transform: uppercase;
        }

        .accepted {
            background-color: #28a745;
        }

        .rejected {
            background-color: #dc3545;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>FESCAD - Réservation</h1>
        </div>
        <div class="content">
            <p>Bonjour <strong>{{ $reservation->name }}</strong>,</p>

            <p>Nous vous informons que votre demande de réservation pour :
                <strong>{{ $reservation->type == 'ticket' ? 'Billet' : 'Stand' }}</strong>
                a été traitée.
            </p>

            <p style="text-align: center; margin: 30px 0;">
                <span class="status-badge {{ $status == 'accepted' ? 'accepted' : 'rejected' }}">
                    {{ $status == 'accepted' ? 'ACCEPTED' : 'REFUSED' }}
                </span>
            </p>

            @if($status == 'accepted')
                <p>Félicitations ! Votre réservation a été confirmée. Nous avons hâte de vous voir au festival.</p>
                <p>Vous recevrez prochainement des détails supplémentaires concernant votre accès.</p>
            @else
                <p>Nous sommes désolés, mais nous ne pouvons pas donner une suite favorable à votre demande pour le moment.
                </p>
                <p>N'hésitez pas à nous contacter pour plus d'informations.</p>
            @endif

            <p>Cordialement,<br>L'équipe du FESCAD</p>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} Festival Culturel et Artistique d'Adjamé. Tous droits réservés.
        </div>
    </div>
</body>

</html>