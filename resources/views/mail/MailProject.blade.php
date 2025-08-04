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
            max-width: 620px;
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
            content: "📝";
            font-size: 28px;
            margin-right: 12px;
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
            letter-spacing: 0.4px;
        }

        .value {
            font-size: 16px;
            color: #2c3e50;
            line-height: 1.6;
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
            margin-top: 45px;
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
    <div class="header">Новый проект создан</div>

    <div class="section">
        <div class="label">Пользователь</div>
        <div class="value">{{ $project->user->name }}</div>
    </div>

    <div class="section">
        <div class="label">Название проекта</div>
        <div class="value">{{ $project->title }}</div>
    </div>

    <div class="section">
        <div class="label">Основное описание</div>
        <div class="value">{{ $project->description }}</div>
    </div>

    <div class="section">
        <div class="label">Необходимые навыки</div>
        <div class="value">{{ $project->skills }}</div>
    </div>

    <div class="section">
        <div class="label">Дополнительно</div>
        <div class="value">{{ $project->additions }}</div>
    </div>

    <a class="button-link" href="{{ route('ProjShow', $project->id) }}">Перейти к проекту</a>

    <div class="footer">
        Это автоматическое уведомление. Пожалуйста, не отвечайте на это письмо.
    </div>
</div>
</body>
</html>
