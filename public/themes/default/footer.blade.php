
<div class="mt-16 bg-gray-800">
    <div class="mx-auto  max-w-7xl grid grid-cols-3 gap-6 text-white pt-6 pb-10">

        <div>
            <div class="text-xl my-4">文章</div>
            <div class="grid grid-cols-2 gap-2">
                @articleclass(['limit' => 6,  'model' => 1])
                <div>
                    <a href="">{{$item->name}}</a>
                </div>
                @endarticle
            </div>
        </div>
        <div>
            <div class="text-xl my-4">视频</div>
            <div class="grid grid-cols-2 gap-2">
                @articleclass(['limit' => 6,  'model' => 2])
                <div>
                    <a href="">{{$item->name}}</a>
                </div>
                @endarticle
            </div>
        </div>

        <div>
            <div class="text-xl my-4">友情链接</div>
            <div class="grid grid-cols-2 gap-2">
                @menu(['id' => 2])
                <div>
                    <a href="{{$item->url}}">{{$item->name}}</a>
                </div>
                @endmenu
            </div>
        </div>
    </div>
</div>

<div class="bg-gray-800  bg-opacity-95 text-gray-500 py-4">
    <div class="mx-auto  max-w-7xl flex items-center">
        <div class="flex-grow">© Copyright 2021, All Rights Reserved</div>
        <div class="flex-none flex space-x-6">
            @menu(['id' => 2])
            <a href="{{$item->url}}">{{$item->name}}</a>
            @endmenu
        </div>

    </div>
</div>
</body>
</html>
