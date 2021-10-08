<?php

namespace Aurora;

class View {

    public static function render(string $path, array $params=[]) {
        $latte = new \Latte\Engine;

        $latte->setTempDirectory('./tmp');

        
        return $latte->renderToString('./views/'.$path.'.latte', $params);
    }


}