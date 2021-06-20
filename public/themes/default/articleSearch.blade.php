
@include('header')
<style>
    .search-list strong {
        color:red;
    }
</style>
<div class="mx-auto  max-w-7xl flex space-x-6 mt-6 min-h-screen">
    <div class="w-2/3">
        <div class="text-2xl">{{$keyword}} 搜索结果</div>
        <div class="flex flex-col gap-6 pb-6 mt-5 search-list">
            @article(['limit' => 10, 'class' => $classInfo->class_id,  'page' => true, 'keyword' => $keyword])


            <div class="flex items-start gap-4">
                <div class="flex-none w-32 h-32 bg-gray-300 bg-cover bg-center" style="background-image: url('{{$item->image}}')"></div>
                <div class="flex-grow">
                    <div class="text-gray-500">
                        <span class="text-blue-600">{{$item->class[0]->name}}</span> <span
                            class="mx-2 text-gray-300">/</span> {{date('m-d, Y')}}
                    </div>
                    <div>
                        <div class="mt-2 text-xl font-medium text-black">{!! $item->title !!}</div>
                        <div class="mt-2 text-base">
                            {!! $item->description !!}
                        </div>
                    </div>

                </div>
            </div>
            @endarticle

        </div>
        <div>@paginate('paginate')</div>
    </div>
    <div class="w-1/3">
        <div class="text-2xl">热门标签</div>
        <div class="mt-6 flex flex-wrap gap-2">
            @tags()
            <a href="{{route('web.article.tags', ['tag' => $item->name])}}" class="cursor-pointer block py-2 px-4 bg-blue-200 rounded text-blue-600">{{$item->name}}</a>
            @endtags
        </div>
    </div>
</div>

@include('footer')
