<?php
namespace App\Console\Commands\Elasticsearch;

use Illuminate\Console\Command;

class Migrate extends Command
{
	protected $signature = 'es:migrate';
	protected $description = 'Elasticsearch 索引结构迁移';
	protected $es;

	public function __construct()
	{
		parent::__construct();
	}

	public function handle()
	{
		$this->es = app('es');
		// 索引类数组，先留空
		$indices  = [];
		// 遍历索引类数组
		foreach ($indices as $indexClass) {
			// 调用类数组的 getAliasName() 方法来获取索引别名
			$aliasName = $indexClass::getAliasName();
			$this->info('正在处理索引 '.$aliasName);
			// 通过 exists 方法判断这个别名是否存在
			if (!$this->es->indices()->exists(['index' => $aliasName])) {
				$this->info('索引不存在，准备创建');
				$this->createIndex($aliasName, $indexClass);
				$this->info('创建成功，准备初始化数据');
				$indexClass::rebuild($aliasName);
				$this->info('操作成功');
				continue;
			}
			// 如果索引已经存在，那么尝试更新索引，如果更新失败会抛出异常
			try {
				$this->info('索引存在，准备更新');
				$this->updateIndex($aliasName, $indexClass);
			} catch (\Exception $e) {
				$this->warn('更新失败，准备重建');
				$this->reCreateIndex($aliasName, $indexClass);
			}
			$this->info($aliasName.' 操作成功');
		}
	}

	protected function createIndex($aliasName, $indexClass)
	{
		// todo
	}

	protected function updateIndex($aliasName, $indexClass)
	{
		// todo
	}

	protected function reCreateIndex($aliasName, $indexClass)
	{
		// todo
	}
}