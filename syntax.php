<?php
/**
 * DokuWiki Plugin stellarium (Syntax Component)
 *
 * Replaces <stellarium>TARGET</stellarium> with a link to open Stellarium and focus on TARGET
 *
 * @license GPL 2 http://www.gnu.org/licenses/gpl-2.0.html
 * @author  Marc Bulling
 */
class syntax_plugin_stellarium extends \dokuwiki\Extension\SyntaxPlugin {
    /** @inheritDoc */
    public function getType() {
        return 'substition';
    }

    /** @inheritDoc */
    public function getPType() {
        return 'normal';
    }

    /** @inheritDoc */
    public function getSort() {
        return 500;
    }

    /** @inheritDoc */
    public function connectTo($mode) {
        $this
            ->Lexer
            ->addSpecialPattern('<stellarium>.*?</stellarium>', $mode, 'plugin_stellarium');
    }

    /** @inheritDoc */
    public function handle($match, $state, $pos, Doku_Handler $handler) {
        $content = substr($match, 12, -13); // Remove <stellarium> and </stellarium> tags
        return array(
            $content
        );
    }

    /** @inheritDoc */
    public function render($mode, Doku_Renderer $renderer, $data) {
        if ($mode !== 'xhtml') {
            return false;
        }
        $content = $data[0];
        $buttonId = 'stellarium-button-' . mt_rand(); // Unique button ID
        $renderer->doc .= "<a href='javascript:void(0)' id='{$buttonId}' data-content='{$content}' onclick=\"sendStellariumRequest('" . $buttonId . "','" . $this->getConf("server") . "','" . $this->getConf("password") . "')\">Open in Stellarium</a>";
        return true;
    }
}


