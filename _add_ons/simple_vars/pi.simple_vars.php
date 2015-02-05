<?php

class Plugin_simple_vars extends Plugin {

    public function index() {
        $remove_underscored = $this->fetchParam('remove_underscored', true, null, true);

        $context = $this->context;

        foreach ($context as $key => $value) {
            if ($remove_underscored && $key[0] == '_') {
                unset($context[$key]);
            }
        }

        $vars = print_r($context, true);

        return "<hr /><div>All variables (including underscores: " . ($remove_underscored ? "false" : "true") . ")</div><pre>" . htmlspecialchars($vars) . "</pre><hr />";
    }

}
