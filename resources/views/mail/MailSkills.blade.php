<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Новый навык</title>
    <style>
        body {
            font-family: 'Segoe UI', Roboto, sans-serif;
            background-color: #f4f7fa;
            color: #2c3e50;
            padding: 40px 10px;
        }

        .container {
            background-color: #ffffff;
            border-radius: 16px;
            max-width: 600px;
            margin: auto;
            padding: 40px 30px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.05);
            border: 1px solid #e6edf5;
        }

        .header {
            font-size: 26px;
            font-weight: 700;
            margin-bottom: 30px;
            color: #2a7de1;
            display: flex;
            align-items: center;
        }

        .header::before {
            content: "🧠";
            font-size: 28px;
            margin-right: 12px;
        }

        .section {
            margin-bottom: 24px;
        }

        .label {
            font-weight: 600;
            color: #34495e;
            display: block;
            margin-bottom: 6px;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .value {
            font-size: 16px;
            color: #2c3e50;
            padding-left: 2px;
        }

        a.button-link {
            display: inline-block;
            margin-top: 25px;
            padding: 12px 22px;
            background-color: #2a7de1;
            color: #ffffff;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        a.button-link:hover {
            background-color: #1f6cd0;
        }

        .footer {
            margin-top: 40px;
            font-size: 12px;
            color: #95a5a6;
            text-align: center;
        }

        @media (max-width: 640px) {
            .container {
                padding: 25px 20px;
            }
            .header {
                font-size: 22px;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">Новый навык добавлен</div>

    <div class="section">
        <div class="label">Пользователь</div>
        <div class="value">{{ $skill->user->name }}</div>
    </div>

    <div class="section">
        <div class="label">Навык</div>
        <div class="value">{{ $skill->name }}</div>
    </div>

    <div class="section">
        <div class="label">Уровень навыка</div>
        <div class="value">{{ $skill->level }}</div>
    </div>

    <a class="button-link" href="{{ route('SkillShow', $skill->id) }}">Посмотреть навык</a>

    <div class="footer">
        Это автоматическое уведомление. Пожалуйста, не отвечайте на это письмо.
    </div>
</div>
</body>
</html>
