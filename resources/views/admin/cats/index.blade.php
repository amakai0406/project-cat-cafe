@extends('layouts.admin')

@section('content')
<section>
    <div class="mb-6 py-4 bg-white rounded">
        <div class="flex px-6 pb-4 border-b">
            <h2 class="text-xl font-bold">猫一覧</h2>
        </div>
    </div>
    <table class="table-auto w-full">
        <thead>
            <tr class="text-xs text-gray-500 text-left">
                <th class="font-medium text-center">
                    <div>
                        <div>
                            名前( 種類 )
                        </div>
                        <div>
                            性別・生年月日
                        </div>
                    </div>
                </th>
                <th class="font-medium">紹介文</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cats as $cat)
                <tr @class(['text-sm', 'bg-gray-50' => $loop->odd])>

                    <td class="flex px-4 py-3 items-center">
                        <img class="w-12 h-12 mr-4 object-cover rounded-md" src="/images/placeholders/cats/cat1.jpg" alt="">
                        <div>
                            <div class="ml-4 font-medium">{{ $cat->name . "($cat->breed)" }}</div>
                            <div>
                                <div class="text-ml-4 font-medium text-center">
                                    @if ($cat->gender == 1)
                                        オス
                                    @elseif ($cat->gender == 2)
                                        メス
                                    @else
                                        不明
                                    @endif
                                    ・
                                    {{ $cat->date_of_birth}}
                                </div>
                            </div>

                        </div>
                    </td>

                    </td>
                    <td class="font-medium">{{ $cat->introduction }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>

</section>
@endsection