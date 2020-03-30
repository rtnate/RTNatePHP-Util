<?php

namespace RTNatePHP\Util;

class FileLoader
{
    const MODE_LOAD_FILE_LIST = 0;
    const MODE_LOAD_PHP_CLASSES = 1;
    const MODE_LOAD_PHP_ARRAYS = 2;

    protected $dir;
    protected $search;
    protected $files = [];
    protected $mode = 0;
    protected $rootPath = "/";
    protected $rootNamespace = "\\";

    public function __construct($searchPath, int $mode)
    {
        $this->search = $searchPath;
        $this->mode = $mode;
    }

    public function setPsr4(string $rootPath, string $rootNamespace)
    {
        $this->rootPath = $rootPath;
        $this->rootNamespace = $rootNamespace;
    }

    protected function buildFileList()
    {
        $files = glob($this->search);
        if (is_array($files))
        {
            return $files;
        }
        else return [];
    }

    protected function getArrays(array $files)
    {
        $results = [];
        foreach ($files as $filename)
        {
            if (file_exists($filename))
            {
                $data = include($filename);
                if (is_array($data))
                {
                   $results[$filename] = $data;
                }
            }
        }
        return $results;
    }

    protected function getClasses(array $files)
    {
        $results = [];
        foreach ($files as $filename)
        {
            if (file_exists($filename))
            {
                $info = pathinfo($filename);
                if ($info['extension'] != 'php') continue;
                $directory = $info['dirname'];
                $subPath = str_replace($this->rootPath, '', $directory);
                $namespace = str_replace("/", "\\", $subPath);
                $namespace = "{$this->rootNamespace}\\{$namespace}";
                $className = $info['filename'];
                $fullClass = $namespace."\\".$className;
                if (class_exists($fullClass))
                {
                   $results[$filename] = $fullClass;
                }
            }
        }
        return $results;
    }

    public function load()
    {
        $files = $this->buildFileList();

        switch ($this->mode)
        {
            case self::MODE_LOAD_FILE_LIST: 
                return $files;
            case self::MODE_LOAD_PHP_ARRAYS:
                return $this->getArrays($files);
            case self::MODE_LOAD_PHP_CLASSES: 
                return $this->getClasses($files);
            default: 
                return [];
        }
    }
}