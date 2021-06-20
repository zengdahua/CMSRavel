<?php

namespace Modules\Common\Console;

class App extends \Modules\Common\Console\Common\Stub
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '创建应用';

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
        $name = $this->getAppName('应用名');
        $appDir = ucfirst($name);
        if (is_dir(base_path('/modules/' . $appDir))) {
            $this->error('应用已存在，请更换应用名!');
            exit;
        }
        $system = 0;
        if ($this->confirm('该应用是否系统模块?')) {
            $system = 1;
        }
        $title = $this->ask('请输入应用名称(中文)');
        $auth = $this->ask('请输入应用作者');
        $desc = $this->ask('请输入应用描述(中文)');
        $menu = $this->ask('请输入菜单名称(中文)');
        $id = (new \Godruoyi\Snowflake\Snowflake)->id();
        // 创建应用结构
        $this->generatorDir($appDir);
        $this->generatorDir($appDir . '/' . 'Admin');
        $this->generatorDir($appDir . '/' . 'Api');
        $this->generatorDir($appDir . '/' . 'Model');
        $this->generatorDir($appDir . '/' . 'Config');
        $this->generatorDir($appDir . '/' . 'Route');
        $this->generatorDir($appDir . '/' . 'Service');
        $this->generatorDir($appDir . '/' . 'View');
        $this->generatorDir($appDir . '/' . 'View/Admin');
        // 创建初始文件
        $this->generatorFile($appDir . '/' . 'Config/Config.php', __DIR__ . '/Tpl/App/Config.stub', [
            'system' => $system,
            'title' => $title,
            'auth' => $auth,
            'desc' => $desc,
            'id' => $id,
            'icon' => '',
        ]);
        $this->generatorFile($appDir . '/' . 'Service/Menu.php', __DIR__ . '/Tpl/App/Menu.stub', [
            'appDir' => $appDir,
            'name' => $name,
            'menu' => $menu,
            'icon' => '',
        ]);
        $this->generatorFile($appDir . '/' . 'Route/AuthAdmin.php', __DIR__ . '/Tpl/App/AuthAdmin.stub', [
            'title' => $title,
            'name' => $name,
        ]);
        $this->info('创建应用成功');
    }

}
