<?php

namespace Modules\Common\Console;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class AppAdmin extends \Modules\Common\Console\Common\Stub
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:admin {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '创建后台控制器';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->argument('name');
        $app = ucfirst($name);
        if (!is_dir(base_path('/modules/'.$app))) {
            $this->error('应用不存在，请检查!');
            exit;
        }
        $fun = lcfirst($this->getAppName('类名'));
        $class = ucfirst($fun);
        $title = $this->ask('请输入菜单名称');

        $table = false;
        $modelClass = '\Modules\Common\Model\Base';
        if ($this->confirm('是否创建关联模型?')) {
            $table = $this->ask('请输入表名(英文+下划线)');
            $key = $this->ask('请输入主键');
            $tmpArr = explode('_', $table);
            $modelName = implode('', array_map(static function ($vo) {
                return ucfirst($vo);
            }, $tmpArr));
            $modelClass = "\\Modules\\$app\Model\\$modelName";
        }

        $route = false;
        $menu = false;
        if ($this->confirm('是否关联路由?')) {
            $route = true;
            if ($this->confirm('是否生成菜单?')) {
                $menu = true;
            }
        }

        // 创建控制器
        $this->generatorFile($app."/Admin/{$class}.php", __DIR__.'/Tpl/AppAdmin/Admin.stub', [
            'app' => $app,
            'title' => $title,
            'class' => $class,
            'modelClass' => $modelClass,
        ]);

        // 创建路由
        if ($route) {
            $routeFile = base_path('/modules/'.$app.'/Route/AuthAdmin.php');
            $routeContent = file_get_contents($routeFile);
            $routeContent = str_replace('    // Generate Route Make',
                <<<PHP
                    Route::group([
                        'auth_group' => '$title'
                    ], function () {
                        Route::manage(\\Modules\\$app\Admin\\$class::class)->make();
                    });
                    // Generate Route Make
                PHP
                , $routeContent);
            file_put_contents($routeFile, $routeContent);

            if ($menu) {
                $menuFile = base_path('/modules/'.$app.'/Service/Menu.php');
                $menuContent = file_get_contents($menuFile);
                $menuContent = str_replace('                            // Generate Menu Make',
                    <<<EOL
                        [
                            'name'  => '$title',
                            'url'   => 'admin.$name.$fun',
                        ],
                        // Generate Menu Make
                    EOL, $menuContent);
                file_put_contents($menuFile, $menuContent);
            }
        }

        //创建模型
        if ($table) {
            Schema::create($table, function (Blueprint $table) use ($key) {
                $table->increments($key);
                $table->integer('create_time');
                $table->integer('update_time');
            });
            $this->generatorFile($app."/Model/{$modelName}.php", __DIR__.'/Tpl/AppModel/Model.stub', [
                'app' => $app,
                'table' => $table,
                'modelName' => $modelName,
                'key' => $key,
            ]);
        }

        $this->info('创建模型成功');
    }

    public function getClass()
    {
        $model = $this->ask('请输入模型命名空间');
        if (!class_exists($model)) {
            $this->error('模型类不存在');
            return $this->getClass();
        }
        return $model;
    }

}
