
@include('header')
<div class="mx-auto  max-w-7xl flex space-x-6 mt-6 min-h-screen">
    <div class="w-2/3">
        <div class="text-2xl">{{$classInfo->name}}</div>
        <div class="flex flex-col gap-6 pb-6 mt-5">
            @article(['limit' => 10, 'sub' => $classInfo->class_id,  'page' => true])

            <div class="flex items-start gap-4">
                <div class="flex-none w-32 h-32 bg-gray-300 bg-cover bg-center" style="background-image: url('{{$item->image}}')"></div>
                <div class="flex-grow">
                    <div class="text-gray-500">
                        <span class="text-blue-600">{{$item->class[0]->name}}</span> <span
                            class="mx-2 text-gray-300">/</span> {{date('m-d, Y')}}
                    </div>
                    <div>
                        <div class="mt-2 text-xl font-medium text-black">
                            <a href="{{route('web.article.info', ['id' => $item->article_id])}}">{{$item->title}}</a>
                        </div>
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
        <div class="text-2xl">栏目分类</div>
        <div class="mt-6">
            @articleclass(['assign' => 'subList', 'limit' => 0, 'sub' => $classInfo->class_id])
            @if(!$subList->count())
                @articleclass(['assign' => 'subList', 'limit' => 0, 'siblings' => $classInfo->class_id])
            @endif
                @foreach($subList as $item)
                    <a href="{{route('web.article.list', ['id' => $item->class_id])}}" class="block bg-gray-300 bg-cover bg-center mb-4 text-white text-lg" >
                        <div class="h-16 bg-black bg-opacity-20 p-6 flex items-center">
                            <div class="flex-grow">
                                {{$item->name}}
                            </div>
                            <div class="flex-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                                     stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                          d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                        </div>
                    </a>
                @endforeach
        </div>
    </div>
</div>

@include('footer')
