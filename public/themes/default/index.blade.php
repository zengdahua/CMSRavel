@include('header')

<div class="mx-auto  max-w-7xl">
    <div class="flex mt-10 space-x-6">
        <div class="flex-grow w-2/3" x-data="{data: {}}" x-init="data = JSON.parse($el.getElementsByClassName('item')[0].getAttribute('data'))">
            <div class="bg-cover bg-center bg-gray-300 h-96"
                 :style="{'background-image': 'url('+data.image+')'}" >
                <div class=" flex items-end h-96 bg-black bg-opacity-20">
                    <div class="p-4 text-white">
                        <div><span x-text="data.class_name"></span> / <span x-text="data.time"></span></div>
                        <div class="font-medium mt-1" x-text="data.title">
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex mt-3">
                <div class="flex-none bg-white h-16 w-6 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                </div>
                <div class="flex-grow flex flex-nowrap w-1 items-center space-x-2 px-2 overflow-auto">
                    @article(['limit' => 20, 'image' => true])
                    <div @click="data = JSON.parse($el.getAttribute('data'))"
                         data='{"image" : "{{$item->image}}", "title": "{{$item->title}}", "class_name": "{{$item->class[0]->name}}", "time": "{{$item->create_time->format('m-d, Y')}}"}'
                         class="item bg-gray-300 bg-cover bg-cover h-16 w-16 flex-shrink-0" style="background-image: url('{{$item->image}}')"></div>
                    @endarticle
                </div>
                <div class="flex-none bg-white h-16 w-6 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </div>
            </div>
        </div>
        <div class="flex-none w-1/3" x-data="{tab: 0}">
            <div class="grid grid-cols-3 gap-6">
                @articleclass(['limit' => 3])
                    <div @click="tab = {{$key}}" class="cursor-pointer bg-white py-2 px-4 block text-center text-black font-medium " :class="{'bg-blue-600 text-white': tab === {{$key}}}">{{$item->name}}</div>
                @endarticleclass
            </div>

            <div>
                @articleclass(['limit' => 3, 'item' => $class])
                <div class="divide-y divide-dashed divide-gray-300 space-y-3.5" x-show="tab == {{$key}}">
                    @article(['limit' => 4,  'class' => $class->class_id])
                    <div class="flex space-x-6 items-center pt-3.5">
                        <div class="flex-none w-20 h-20 bg-gray-300 bg-cover bg-center" style="background-image: url('{{$item->image}}')"></div>
                        <div class="flex-grow">
                            <div class="text-gray-500">
                                <span class="text-blue-600">{{$item->class[0]->name}}</span> <span
                                    class="mx-2 text-gray-300">/</span> {{date('m-d, Y')}}
                            </div>
                            <div class="mt-1 font-medium text-black">
                                {{$item->title}}
                            </div>
                        </div>
                    </div>
                    @endarticle

                </div>
                @endarticleclass
            </div>
        </div>
    </div>

    <div class="text-2xl mt-12 mb-6 flex items-center">
        <div class="flex-grow">推荐文章</div>
        <div class="flex-none flex text-gray-400 space-x-2">
            <a href="#" class="flex items-center justify-center border border-gray-400 h-8 w-8">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M15 19l-7-7 7-7"/>
                </svg>
            </a>
            <a href="#" class="flex items-center justify-center border border-gray-400 h-8 w-8">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </div>
    </div>
    <div class="grid grid-cols-4 gap-6">
        @article(['limit' => 4, 'image' => true, 'attr' => 3])
        <div class="bg-cover bg-center bg-gray-300 h-96"
             style="background-image: url('{{$item->image}}')">
            <div class=" flex items-end h-96 bg-black bg-opacity-20">
                <div class="p-4 text-white ">
                    <div>{{$item->class[0]->name}} / {{$item->create_time->format('m-d, Y')}}</div>
                    <div class="font-medium mt-1">
                        {{$item->title}}
                    </div>
                </div>
            </div>
        </div>
        @endarticle
    </div>

    <div class="flex space-x-6">
        <div class="w-2/3">
            <div class="text-2xl mt-12 mb-6">最新文章</div>
            <div class="grid grid-cols-2 gap-6 border-b border-dashed border-gray-300 pb-6">
                @article(['limit' => 2, 'image' => true])
                <div>
                    <div class="h-56 bg-cover bg-center bg-gray-300"  style="background-image: url('{{$item->image}}')"></div>
                    <div class="text-gray-500 mt-4">
                        <span class="text-blue-600">{{$item->class[0]->name}}</span>
                        <span class="mx-2 text-gray-300">/</span> {{$item->create_time->format('m-d, Y')}}
                    </div>
                    <div class="font-medium text-lg mt-4">{{$item->title}}</div>
                    <div class="mt-4 leading-6">
                        {{Str::limit($item->content, 100)}}
                    </div>
                </div>
                @endarticle
            </div>
            <div class="grid grid-cols-2 gap-6 mt-4">

                @article(['limit' => 4, 'offset' => 2, 'image' => true])
                <div class="flex items-center gap-6 pb-4 border-b border-gray-300 border-dashed">
                    <div class="flex-none bg-cover bg-center bg-gray-300 w-20 h-20" style="background-image: url('{{$item->image}}')"></div>
                    <div class="flex-grow">
                        <div class="text-gray-500">
                            <span class="text-blue-600">{{$item->class[0]->name}}</span>
                            <span class="mx-2 text-gray-300">/</span> {{$item->create_time->format('m-d, Y')}}
                        </div>
                        <div class="font-medium text-base mt-2">
                            {{$item->title}}
                        </div>
                    </div>
                </div>
                @endarticle
            </div>
        </div>
        <div class="w-1/3">
            <div class="text-2xl mt-12 mb-6">浏览排名</div>
            <div class="divide-y divide-dotted divide-gray-300 divide-gray-200 flex flex-col space-y-3.5">

                @article(['limit' => 8, 'image' => true, 'sort' => ['view', 'desc']])
                <div class="flex items-center gap-6 {{$key ? 'pt-3.5' : ''}}">
                    <div class="flex-none bg-cover bg-center bg-gray-300 w-16 h-16" style="background-image: url('{{$item->image}}')"></div>
                    <div class="flex-grow">
                        <div class="text-gray-500">
                            <span class="text-blue-600">{{$item->class[0]->name}}</span>
                            <span class="mx-2 text-gray-300">/</span> {{$item->create_time->format('m-d, Y')}}
                        </div>
                        <div class="font-medium text-base mt-1">
                            {{$item->title}}
                        </div>
                    </div>
                    <div class="flex-none text-5xl flex justify-center items-center text-gray-300 font-bold">{{$key + 1}}</div>
                </div>
                @endarticle

            </div>
        </div>
    </div>


</div>

<div class="relative  mt-10">
    <div class="mx-auto  max-w-7xl z-10 relative">
        <div class="-ml-6 -mr-6">
            <div class="flex space-x-6 p-6 bg-gray-100">
                @article(['limit' => 2, 'image' => true, 'attr' => 4])
                <div class="w-1/2 bg-cover bg-center bg-gray-300 h-80 text-white"  style="background-image: url('{{$item->image}}')">
                    <div class="h-80 flex items-end bg-black bg-opacity-20">
                        <div class="p-6">
                            <div>{{$item->class[0]->name}} / {{$item->create_time->format('m-d, Y')}}</div>
                            <div class="text-3xl">{{$item->title}}</div>
                        </div>
                    </div>
                </div>
                @endarticle
            </div>
        </div>

    </div>
    <div class="absolute left-0 right-0 bottom-0 bg-gray-800 w-full h-1/2"></div>
</div>
<div class="relative">
    <div class="absolute left-0 right-0 top-0 bg-gray-800 w-full h-1/2"></div>

    <div class="mx-auto  max-w-7xl z-10 relative pt-1">
        <div class="-ml-6 -mr-6">
            <div class="text-2xl mt-12 mb-20 text-white">视频文章</div>
            <div class="bg-gray-100 flex space-x-6 p-6 pb-0 relative">
                <div class="w-2/3 relative -top-14">
                    @article(['limit' => 1, 'image' => true, 'model' => 2])
                    <div class="flex-none bg-cover bg-center bg-gray-300 h-96 bg-black">
                        <video class="h-96 w-full object-cover bg-black"  src="{{$item->form->data['file']}}" controls="controls">
                            您的浏览器不支持 video 标签。
                        </video>
                    </div>
                    <div class="bg-gray-200 px-6 py-6">
                        <div class="text-gray-500">
                            <span class="text-blue-600">{{$item->class[0]->name}}</span> <span
                                class="mx-2 text-gray-300">/</span> {{$item->create_time->format('m-d, Y')}}
                        </div>
                        <div class="font-medium text-lg mt-2">
                            {{$item->title}}
                        </div>
                    </div>
                    @endarticle
                </div>
                <div class="w-1/3">
                    <div class="text-2xl">热门视频</div>
                    <div>
                        @article(['limit' => 4, 'image' => true, 'model' => 2, 'attr' => 2])
                        <div class="flex items-center gap-6 pt-4">
                            <div class="flex-none bg-cover bg-center bg-gray-300 w-24 h-16" style="background-image: url('{{$item->image}}')"></div>
                            <div class="flex-grow">
                                <div class="font-medium text-base">
                                    {{$item->title}}
                                </div>
                                <div class="text-gray-500">
                                    {{$item->class[0]->name}}
                                </div>
                            </div>
                        </div>
                        @endarticle
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="mx-auto  max-w-7xl flex space-x-6">
    <div class="w-2/3">
        <div class="text-2xl">最新视频</div>
        <div class="grid grid-cols-2 gap-6 pb-6 mt-5">
            @article(['limit' => 8, 'image' => true, 'model' => 2])
            <div class="pb-6">
                <div class="h-56 bg-cover bg-center bg-gray-300" style="background-image: url('{{$item->image}}')"></div>
                <div class="text-gray-500 mt-4">
                    <span class="text-blue-600">{{$item->class[0]->name}}</span> <span
                        class="mx-2 text-gray-300">/</span> {{date('m-d, Y')}}
                </div>
                <div class="font-medium text-lg mt-4">{{$item->title}}</div>
                <div class="mt-4 leading-6">
                    {{$item->description}}
                </div>
            </div>
            @endarticle


        </div>
    </div>
    <div class="w-1/3">
        <div class="text-2xl">栏目分类</div>
        <div class="mt-6">
            @articleclass(['limit' => 0, 'model' => 2])
            <div class="bg-gray-300 bg-cover bg-center mb-4 text-white text-lg">
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
            </div>
            @endarticle



        </div>

        <div class="bg-gray-200 p-8 mt-14">
            <div class="text-xl font-medium">
                模板说明
            </div>
            <div class="mt-4 leading-6 text-base">
                @marker(['id' => 1])
            </div>
            <div class="mt-8 flex justify-end">
                <a href="" class="bg-blue-600 px-6 py-3 rounded shadow text-white">标签文档</a>
            </div>
        </div>
    </div>
</div>
@include('footer')
