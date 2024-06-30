@extends('layouts.admin')

@section('content')
<section class="py-8">
    <div class="container px-4 mx-auto">
        <div class="py-4 bg-white rounded">
            <form action="{{ route('admin.faqs.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="flex px-6 pb-4 border-b">
                    <h3 class="text-xl font-bold">質問の追加</h3>
                    <div class="ml-auto">
                        <button type="submit"
                            class="py-2 px-3 text-xs text-white font-semibold bg-indigo-500 rounded-md">追加する</button>
                    </div>
                </div>

                <div class="pt-4 px-6">
                    <!-- ▼▼▼▼エラーメッセージ▼▼▼▼　-->
                    @if($errors->any())
                        <div class="mb-8 py-4 px-6 border border-red-300 bg-red-50 rounded">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li class="text-red-400">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <!-- ▲▲▲▲エラーメッセージ▲▲▲▲　-->
                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-2" for="question">質問</label>
                        <input id="question" class="block w-full px-4 py-3 mb-2 text-sm bg-white border rounded"
                            type="text" name="question" value="{{old('question') }}">
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-2" for="answer">答え</label>
                        <input id="answer" class="block w-full px-4 py-3 mb-2 text-sm bg-white border rounded"
                            type="text" name="answer" value="{{old('answer') }}">
                    </div>
                </div>
        </div>
        </form>
    </div>
    </div>
</section>

@endsection