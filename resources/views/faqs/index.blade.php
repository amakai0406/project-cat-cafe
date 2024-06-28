<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <h1>よくある質問</h1>
    <style>
        .faq-item {
            margin-bottom: 10px;
        }

        .faq-question {
            cursor: pointer;
            padding: 10px;
            background-color: #f1f1f1;
            border: 1px solid #ccc;
        }

        .faq-answer {
            display: none;
            padding: 10px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-top: none;
        }
    </style>
</head>

<body>
    @foreach($faqs as $faq)
        <div class="faq-item">
            <div class="faq-question">{{ 'Q: ' . $faq->question }}</div>
            <div class="faq-answer">{{ 'A: ' . $faq->answer }}</div>
        </div>
    @endforeach

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const faqQuestions = document.querySelectorAll('.faq-question');

            faqQuestions.forEach(question => {
                question.addEventListener('click', function () {
                    const answer = this.nextElementSibling;
                    if (answer.style.display === 'block') {
                        answer.style.display = 'none';
                    } else {
                        answer.style.display = 'block';
                    }
                });
            });
        });
    </script>
</body>

</html>