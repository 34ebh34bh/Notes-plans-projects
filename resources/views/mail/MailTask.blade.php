<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Новый план</title>
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
            content: "📅";
            font-size: 28px;
            margin-right: 10px;
        }

        .section {
            margin-bottom: 20px;
        }

        .label {
            font-weight: 600;
            color: #34495e;
            display: block;
            margin-bottom: 6px;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .value {
            font-size: 16px;
            color: #2c3e50;
            padding-left: 4px;
        }

        a.button-link {
            display: inline-block;
            margin-top: 25px;
            padding: 12px 20px;
            background-color: #2a7de1;
            color: #ffffff;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
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
    <div class="header">Новый план создан</div>

    <div class="section">
        <div class="label">Пользователь</div>
        <div class="value">{{ $user->name }}</div>
    </div>

    <div class="section">
        <div class="label">Название плана</div>
        <div class="value">{{ $task->title }}</div>
    </div>

    <div class="section">
        <div class="label">Описание</div>
        <div class="value">{{ $task->description }}</div>
    </div>

    <a class="button-link" href="{{ route('PlanShow', $task->id) }}">Перейти к плану</a>

    <div class="footer">
        Это автоматическое уведомление. Пожалуйста, не отвечайте на это письмо.
    </div>
</div>
</body>
</html>
