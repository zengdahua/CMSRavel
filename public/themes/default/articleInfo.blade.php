
@include('header')
<div class="mx-auto  max-w-7xl flex space-x-6 mt-6 min-h-screen">
    <div class="w-3/4">
        <div class="bg-white rounded flex flex-row px-4">
            <div class="py-4 mr-2">
                <a href="{{route('web.index')}}">首页</a>
            </div>
        @articleclass(['limit' => 0, 'parent' => $info->class[0]->class_id])
            <div class="py-4 mr-2">&rsaquo;&rsaquo;</div>
            <div class="py-4 mr-2"> {{$item->name}}</div>
        @endarticleclass
        </div>
        <div class="bg-white p-8 mt-5">
        <div class="text-2xl text-center">{{$info->title}}</div>
        <div class="text-center text-gray-500 mt-5 flex justify-center gap-4">
            <div>发布: {{$info->create_time->format('Y-m-d H:i')}}</div>
            <div>编辑: {{$info->auth ?: '未知'}}</div>
        </div>
        <div class="flex flex-col gap-6 pb-6 mt-5 text-base mt-2">
            {!! $info->content !!}
        </div>
        </div>
    </div>

    <div class="w-1/4">
        <div class="text-2xl">栏目分类</div>
        <div class="mt-6">
            @articleclass(['limit' => 0, 'siblings' => $info->class[0]->class_id])
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
            @endarticleclass
        </div>
    </div>
</div>

@include('footer')
