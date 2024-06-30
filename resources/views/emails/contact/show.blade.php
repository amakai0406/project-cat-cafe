<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お問い合わせ詳細</title>
</head>

<body>
    <p>{{ $contact->name }} 様よりお問い合わせ下記の内容でお問い合わせがありました</p>
    <p>内容を確認しご対応をお願いします。</p>

    <p>【お問い合わせ内容】</p>
    <p>お名前: {{ $contact->name }}</p>
    <p>お名前（フリガナ）: {{ $contact->name_kana }}</p>
    <p>メールアドレス: {{ $contact->email }}</p>
    <p>電話番号: {{ $contact->phone }}</p>
    <p>お問い合わせ内容:<br>{{ $contact->body }}</p>

    <p>※このメールは配信専用のアドレスで配信されています。このメールに返信されても返信内容の確認およびご返答ができませんので、ご了承ください。</p>
</body>

</html>