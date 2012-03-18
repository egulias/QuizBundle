<?php

/**
 * This file is part of the EguliasQuizBundle package.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

spl_autoload_register(function($class)
{
  if (0 === strpos($class, 'Egulias\\QuizBundle\\')) {
    $path = __DIR__ . '/../' . implode('/', array_slice(explode('\\', $class), 2)) . '.php';
    if (!stream_resolve_include_path($path)) {
      return false;
    }
    require_once $path;
    return true;
  }
});

