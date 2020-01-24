<?php
namespace app\engine;


class Autoload
{
//	private $path = [
//		'models',
//		'engine',
//	];

	public function loadClass($className)
	{
//		foreach ($this->path as $path) {
//			$fileName = "../{$path}/{$className}.php";
//			var_dump($className);
//			if (file_exists($fileName)) {
//				include $fileName;
//				break;
//			}
//		}
		$filename = str_replace(['app', '\\'], ['..', '/'], $className) . '.php';
//		var_dump($filename);
		if (file_exists($filename)) {
			include $filename;
		}
	}

}
