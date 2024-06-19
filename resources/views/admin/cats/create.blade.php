@extends('layouts.admin')

@section('content')
<section class="py-8">
    <div class="container px-4 mx-auto">
        <div class="py-4 bg-white rounded">
            <form action="{{ route('admin.cats.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="flex px-6 pb-4 border-b">
                    <h3 class="text-xl font-bold">新規ねこ登録</h3>
                    <div class="ml-auto">
                        <button type="submit"
                            class="py-2 px-3 text-xs text-white font-semibold bg-indigo-500 rounded-md">登録</button>
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
                        <label class="block text-sm font-medium mb-2" for="title">名前</label>
                        <input id="title" class="block w-full px-4 py-3 mb-2 text-sm bg-white border rounded"
                            type="text" name="name" value="{{ $cat->name }}">
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-2" for="image">画像</label>
                        <div class="flex items-end">
                            <img id="previewImage" src="/images/admin/noimage.jpg"
                                data-noimage="/images/admin/noimage.jpg" alt="" class="rounded shadow-md w-64">
                            <input id="image" class="block w-full px-4 py-3 mb-2" type="file" accept='image/*'
                                name="image">
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-2" for="title">種類</label>
                        <input id="title" class="block w-full px-4 py-3 mb-2 text-sm bg-white border rounded"
                            type="text" name="breed" value="{{ $cat->breed }}">
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-2" for="gender">性別</label>
                        <div class="flex">
                            <select id="gender"
                                class="appearance-none block pl-4 pr-8 py-3 mb-2 text-sm bg-white border rounded"
                                name="gender">
                                <option value="">選択してください</option>
                                <option value="1" {{ $cat->gender == 1 ? 'selected' : '' }}>オス</option>
                                <option value="2" {{ $cat->gender == 2 ? 'selected' : '' }}>メス</option>

                            </select>
                            <div
                                class="pointer-events-none transform -translate-x-full flex items-center px-2 text-gray-500">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewbox="0 0 20 20">
                                    <path
                                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-2" for="title">生年月日</label>
                        <input id="title" class="block w-full px-4 py-3 mb-2 text-sm bg-white border rounded"
                            type="date" name="date_of_birth" value="{{ $cat->date_of_birth }}">
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-2" for="introduction">紹介文</label>
                        <textarea id="introduction" class="block w-full px-4 py-3 mb-2 text-sm bg-white border rounded"
                            name="introduction" rows="5">{{ old('introduction') }}</textarea>
                    </div>
                </div>
        </div>
        </form>
    </div>
    </div>
    <script>
        // 画像プレビュー
        document.getElementById('image').addEventListener('change', e => {
            const previewImageNode = document.getElementById('previewImage')
            const fileReader = new FileReader()
            fileReader.onload = () => previewImageNode.src = fileReader.result
            if (e.target.files.length > 0) {
                fileReader.readAsDataURL(e.target.files[0])
            } else {
                previewImageNode.src = previewImageNode.dataset.noimage
            }
        })
    </script>
</section>

@endsection