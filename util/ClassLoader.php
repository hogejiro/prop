<?php

final class ClassLoader
{
    private $dirs;

    public function register()
    {
        spl_autoload_register(array($this, 'loadClass'));
    }

    public function registerDir($dir)
    {
        $this->dirs[] = $dir;
    }

    public function loadClass($class)
    {
        foreach ($this->dirs as $dir) {
            $file = $dir . '/' . $class . '.php';
            if (file_exists($file)) {
                require_once $file;
                return;
            }
        }
    }
}
