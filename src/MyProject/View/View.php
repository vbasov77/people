<?php

declare(strict_types=1);

namespace MyProject\View;

class View
{
    private $templatesPath;

    private $extraVars = [];

    public function __construct(string $templatesPath)
    {
        $this->templatesPath = $templatesPath;
    }

    /**
     * @param string $templateName
     * @param array $vars
     * @param int $code
     * @return void
     */
    public function renderHtml(string $templateName, array $vars = [], int $code = 200): void
    {
        http_response_code($code);
        extract($this->extraVars);
        extract($vars);
        ob_start();
        include $this->templatesPath . '/' . $templateName;
        $buffer = ob_get_contents();
        ob_end_clean();
        echo $buffer;
    }

    /**
     * @param $data
     * @param int $code
     * @return void
     */
    public function displayJson($data, int $code = 200): void
    {
        header('Content-type: application/json; charset=utf-8');
        http_response_code($code);
        echo json_encode($data);
    }
}