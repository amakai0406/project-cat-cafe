@extends('layouts.default')

@section('content')
<div class="container">
    <div style="text-align: center">
        <h1>猫カフェららべるについて</h1>
    </div>

    <div class="w_900 pt_40" style="text-align: center">

        <div>
            <p>猫カフェららべるでは、広々とした空間で様々な種類の猫たちが、自由に過ごしています。<br>
                写真を撮ったり、猫に触れたい、ソファーや床でゆっくりと寛いで頂けたら幸いです<br>本を読みながら、猫を眺めながら、どうぞ心ゆくまで癒しの時間をお過ごしくださいませ。</p>
        </div>
        <p>営業時間</p>
        <p>11：30～19：00（19：00～21：00は予約制）</p>
        <p>定休日</p>
        <p>木曜日(祝日の場合は振り替えあり)、水曜日※予約制（前日までに予約をお願いします。）<br>※上記期間とは別にお休みいただく場合もございます。</p>
        <p>駐車場</p>
        <p>6台</p>
        <p>定員</p>
        <p>10名</p>
    </div>
    <pre>



    </pre>
    <div style="text-align: center">
        <h2>★猫カフェららべるに新しい設備が導入されました！！★</h2>
    </div>
    <pre>

    </pre>
    <table class="table-auto w-full">
        </thead>
        <tbody>
            <form method="get">
                @foreach($facilities as $facility)
                    <tr>
                        <td class="flex px-4 py-3 items-center">
                            <img class="w-32 h-32 mr-auto object-cover rounded-md"
                                src="{{ asset('storage/' . $facility->image) }}" alt="">
                        </td>
                        <td class="font-medium text-center">{{ $facility->name }}</td>
                        <td class="font-medium text-center">{{ $facility->description }}</td>
                        <td class="font-medium text-center">{{ $facility->installed_at . 'に導入されました' }}</td>
                    </tr>
                @endforeach 
            </form>
        </tbody>
    </table>




    <div>

    </div>
</div>
@endsection